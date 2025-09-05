<?php

class ModuleController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        // parent::__construct($this->db);
    }

    public function index()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Roles";
        $pageModule = "Roles";

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'views/master/role.php';
        }
    }

    public function addRole()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Roles";
        $pageModule = "Roles";

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $modules = $this->getAllModules();
            // $edit = false;
            require 'views/master/add-role.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->db->beginTransaction();
            try {
                $data = [
                    "role_name" => $_POST["role_name"],
                    "role_description" => $_POST["role_description"],
                    "created_date" => date("Y-m-d"),
                    "created_time" => date("H:i:s"),
                    "created_at" => date("Y-m-d H:i:s"),
                    "created_by" => $_SESSION["id"],
                ];
                $last_id = add($data, "roles");
                if ($last_id && !empty($_POST["page"])) {
                    $query = "INSERT INTO `role_permission` (role, page) VALUES ";
                    $rows = [];
                    $params = [];

                    foreach ($_POST["page"] as $index => $page) {
                        $rows[] = "(?, ?)";
                        $params[] = $last_id;
                        $params[] = $page;
                    }

                    $query .= implode(", ", $rows);
                    $stmt = $this->db->prepare($query);
                    $stmt->execute($params);
                }
                $this->db->commit();
                $_SESSION["success"] = "Role Added Successfully";
            } catch (Exception $e) {
                $this->db->rollBack();
                $_SESSION["err"] = "Something went wrong";
            }
            redirect("/master/roles");
        }
    }
    public function editRole($id)
    {
        function checkPageNumber($array, $pageNumber)
        {
            // printWithPre($array,$pageNumber);
            foreach ($array as $item) {
                if ($item['page'] == $pageNumber) {
                    return 'checked';
                }
            }
            return '';
        }
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Roles";
        $pageModule = "Roles";
        $edit = true;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $modules = $this->getAllModules();
            $editData = $this->getRoleById($id);

            $rolepages = $this->getAllRolePages($id);
            require 'views/master/add-role.php';
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->db->beginTransaction();

            $data = [
                "role_name" => $_POST["role_name"],
                "role_description" => $_POST["role_description"],
            ];

            update($data, $id, "roles");
            delete($id, "role_permission", "role");

            if (!empty($_POST["page"])) {
                $query = "INSERT INTO `role_permission` (role, page) VALUES ";
                $rows = [];
                $params = [];

                foreach ($_POST["page"] as $index => $page) {
                    $rows[] = "(?, ?)";
                    $params[] = $id;
                    $params[] = $page;
                }

                $query .= implode(", ", $rows);
                $stmt = $this->db->prepare($query);
                $stmt->execute($params);
            }
            $this->db->commit();
            $_SESSION["success"] = "Role Updated Successfully";
        }

        redirect("/master/edit-role/$id");
    }

    public function deleteRole($id)
    {
        if (delete($id, "roles", "id")) {
            delete($id, "role_permission", "role");
            $_SESSION["success"] = "Role Deleted Successfully";
        } else {
            $_SESSION["err"] = "Something went wrong";
        }

        redirect("/master/roles");
    }

    public function getAllModules()
    {
        try {
            $query = "SELECT * FROM module";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error if needed
            return [];
        }
    }

    public function getAllPages()
    {
        try {
            $query = "SELECT p.*,m.module_name FROM pages p left join module m on m.id = p.module";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error if needed
            return [];
        }
    }

    public function getPagesByModule($module)
    {
        try {
            $query = "SELECT * FROM pages WHERE module = :module";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':module', $module, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error if needed
            return [];
        }
    }

    public function insertRole()
    {
        try {
            $this->db->beginTransaction();

            $data = [
                "role_name" => $_POST["role_name"],
                "role_description" => $_POST["desc"],
                "created_date" => date("Y-m-d"),
                "created_time" => date("H:i:s"),
                "created_at" => date("Y-m-d H:i:s"),
                "created_by" => $_SESSION["id"],
            ];

            $columns = implode(", ", array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));

            $sql = "INSERT INTO roles (" . $columns . ") VALUES (" . $placeholders . ")";
            $stmt = $this->db->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            $stmt->execute();
            $last_id = $this->db->lastInsertId();

            if (!empty($_POST["page"])) {
                $query = "INSERT INTO `role_permission` (role, page) VALUES ";
                $rows = [];
                $params = [];

                foreach ($_POST["page"] as $index => $page) {
                    $rows[] = "(?, ?)";
                    $params[] = $last_id;
                    $params[] = $page;
                }

                $query .= implode(", ", $rows);
                $stmt = $this->db->prepare($query);
                $stmt->execute($params);
            }

            $this->db->commit();

            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
            // Log error if needed
            return false;
        }
    }

    public function updateRole($id)
    {
        try {
            $this->db->beginTransaction();

            $data = [
                "role_name" => $_POST["role_name"],
                "role_description" => $_POST["desc"],
            ];

            $set = [];
            foreach ($data as $key => $value) {
                $set[] = "$key = :$key";
            }
            $set = implode(", ", $set);

            $sql = "UPDATE `roles` SET $set WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(":id", $id);

            $stmt->execute();
            $last_id = $id;

            $queryPermissions = "DELETE FROM role_permission WHERE role = :id";
            $stmtPermissions = $this->db->prepare($queryPermissions);
            $stmtPermissions->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtPermissions->execute();

            $query = "INSERT INTO `role_permission` (role, page) VALUES ";
            $rows = [];
            $params = [];

            foreach ($_POST["page"] as $index => $page) {
                $rows[] = "(?, ?)";
                $params[] = $last_id;
                $params[] = $page;
            }

            $query .= implode(", ", $rows);
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);

            $this->db->commit();

            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
            // Log error if needed
            return false;
        }
    }

    public function getAllRoles()
    {
        try {
            $query = "SELECT * FROM roles";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error if needed
            return [];
        }
    }

    public function getRoleById($id)
    {
        try {
            $query = "SELECT * FROM roles WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error if needed
            return [];
        }
    }

    public function getAllRolePages($id)
    {
        try {
            $query = "SELECT * FROM role_permission WHERE role = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error if needed
            return [];
        }
    }

    public function deleteRoleById($id)
    {
        try {
            $this->db->beginTransaction();

            // First, delete related role permissions
            $queryPermissions = "DELETE FROM role_permission WHERE role = :id";
            $stmtPermissions = $this->db->prepare($queryPermissions);
            $stmtPermissions->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtPermissions->execute();

            // Then, delete the role itself
            $queryRole = "DELETE FROM roles WHERE id = :id";
            $stmtRole = $this->db->prepare($queryRole);
            $stmtRole->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtRole->execute();

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            // Log error if needed
            return false;
        }
    }

    public function addPage(array $data)
    {
        try {
            // Add the created_date, created_time, created_at fields
            // $data["created_date"] = date("Y-m-d");
            // $data["created_time"] = date("H:i:s");
            // $data["created_at"] = date("Y-m-d H:i:s");
            // $data["created_by"] = $_SESSION["id"];

            // Dynamically create columns and placeholders
            $columns = implode(", ", array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));

            // Prepare the SQL statement
            $sql = "INSERT INTO pages (" . $columns . ") VALUES (" . $placeholders . ")";
            // echo $sql;
            $stmt = $this->db->prepare($sql);
            // echo "hii";
            // Bind the values
            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            // Execute the statement
            $stmt->execute();

            return $this->db->lastInsertId();
        } catch (Exception $e) {
            // echo "hiiii";
            // error_log($e->getMessage()); // Uncomment if you wish to log errors
            return false;
        }
    }


    public function updateModule($data, $id)
    {
        try {
            $this->db->beginTransaction();
            $set = [];
            foreach ($data as $key => $value) {
                $set[] = "$key = :$key";
            }
            $set = implode(", ", $set);

            $sql = "UPDATE `module` SET $set WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(":id", $id);

            $stmt->execute();

            $this->db->commit();

            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
            // Log error if needed
            return false;
        }
    }

    public function updatePage($data, $id)
    {
        try {
            $this->db->beginTransaction();
            $set = [];
            foreach ($data as $key => $value) {
                $set[] = "$key = :$key";
            }
            $set = implode(", ", $set);

            $sql = "UPDATE `pages` SET $set WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->bindValue(":id", $id);

            $stmt->execute();

            $this->db->commit();

            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
            // Log error if needed
            return false;
        }
    }

    public function deleteModuleById($id)
    {
        try {
            $this->db->beginTransaction();

            // First, delete related role permissions
            $queryPermissions = "DELETE FROM module WHERE id = :id";
            $stmtPermissions = $this->db->prepare($queryPermissions);
            $stmtPermissions->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtPermissions->execute();

            // Then, delete the role itself

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            // Log error if needed
            return false;
        }
    }

    public function deletePageById($id)
    {
        try {
            $this->db->beginTransaction();

            // First, delete related role permissions
            $queryPermissions = "DELETE FROM pages WHERE id = :id";
            $stmtPermissions = $this->db->prepare($queryPermissions);
            $stmtPermissions->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtPermissions->execute();

            // Then, delete the role itself

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            // Log error if needed
            return false;
        }
    }

    public function getModuleById($id)
    {
        try {
            $query = "SELECT * FROM module 
                    WHERE id = :id
            ";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error if needed
            return [];
        }
    }

    public function getPageById($id)
    {
        try {
            $query = "SELECT * FROM pages
                    WHERE id = :id
            ";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error if needed
            return [];
        }
    }

    public function getAllAssignPages($id)
    {
        try {
            $query = "SELECT r.*,p.page,p.page_name,p.module FROM role_permission r 
                    left join pages p on p.id = r.page
                    WHERE role = :id
            ";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error if needed
            return [];
        }
    }



    public function Module()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Module";
        $pageModule = "Module";

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'views/module.php';
        }
    }

    public function addModule($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $editData = [];
            if ($id != null) {
                $editData = getDataById('module', $id)[0];
            } ?>
            <div class="modalForm">
                <div class="modal-header" style="background-color: #f7e2c7;">
                    <h5 class="modal-title !font-bold !text-[#78350f]">Add Module</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-xl text-red-600" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-3">
                        <div class="">
                            <label for="module" class="block text-sm font-medium text-gray-700">Module<strong class="ms-1 text-red-600">*</strong></label>
                            <input type="text" name="module" id="module" value="<?= (!empty($editData)) ? $editData["module"] : "" ?>" placeholder="Enter Module"
                                class="module mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="">
                            <label for="module_name" class="block text-sm font-medium text-gray-700">Module Name<strong class="ms-1 text-red-600">*</strong></label>
                            <input type="text" name="module_name" id="module_name" value="<?= (!empty($editData)) ? $editData["module_name"] : "" ?>" placeholder="Enter Module Name"
                                class="module_name mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    if (!empty($editData)) {
                    ?>
                        <button type="button" class="btn btn-primary" onclick="saveModule(this,<?= $id ?>)">Update</button>
                    <?php
                    } else {
                    ?>
                        <button type="button" class="btn btn-primary" onclick="saveModule(this)">Save</button>
                    <?php
                    }
                    ?>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        <?php
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = json_decode(file_get_contents('php://input'), true);
            // $_POST = json_decode($json, true);
            $response = [
                "success" => false,
                "message" => "Something Went Wrong"
            ];

            if ($id != null) {
                if (update($_POST, $id, 'module')) {
                    $response = [
                        "success" => true,
                        "post" => $_POST,
                        "message" => "Module Updated Successfully"
                    ];
                }
            } else {
                if (add($_POST, 'module', false)) {
                    $response = [
                        "success" => true,
                        "post" => $_POST,
                        "message" => "Module Added Successfully"
                    ];
                }
            }

            echo json_encode($response);
            die();
        }
    }

    public function getModules()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Modules";
        $pageModule = "Modules";
        $response = [
            "success" => false,
            "message" => "Something Wen't Wrong"
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $modules = $this->getAllModules();
            $response = [
                'success' => true,
                'message' => 'Module Fetched Successfully',
                'data' => $modules,
            ];
        }
        echo json_encode($response);
        die();
    }

    public function pages()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Pages";
        $pageModule = "Pages";

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'views/pages.php';
        }
    }

    public function addPages($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $modules = getData('module');

            $editData = [];
            if ($id != null) {
                $editData = getDataById('pages', $id)[0];
            } ?>
            <div class="modalForm">
                <div class="modal-header" style="background-color: #f7e2c7;">
                    <h5 class="modal-title !font-bold !text-[#78350f]">Add Page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-white text-xl" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-3">
                        <div class="">
                            <label for="page" class="block text-sm font-medium text-gray-700">Page<strong class="ms-1 text-red-600">*</strong></label>
                            <input type="text" name="page" id="page" value="<?= (!empty($editData)) ? $editData["page"] : "" ?>" placeholder="Enter Page"
                                class="page mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="">
                            <label for="page_name" class="block text-sm font-medium text-gray-700">Page Name<strong class="ms-1 text-red-600">*</strong></label>
                            <input type="text" name="page_name" id="page_name" value="<?= (!empty($editData)) ? $editData["page_name"] : "" ?>" placeholder="Enter Page Name"
                                class="page_name mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="">
                            <label for="module" class="block text-sm font-medium text-gray-700">Select Module<strong class="ms-1 text-red-600">*</strong></label>
                            <select name="module" class="selectElement module" id="">
                                <option value="">Select Module</option>
                                <?php foreach ($modules as $key => $value) { ?>
                                    <option value="<?= $value["id"] ?>" <?php if (!empty($editData) && $editData["module"] == $value["id"]) echo "selected" ?>><?= $value["module_name"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    if (!empty($editData)) {
                    ?>
                        <button type="button" class="btn btn-primary" onclick="savePage(this,<?= $id ?>)">Update</button>
                    <?php
                    } else {
                    ?>
                        <button type="button" class="btn btn-primary" onclick="savePage(this)">Save</button>
                    <?php
                    }
                    ?>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                </div>
            </div>
<?php
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = json_decode(file_get_contents('php://input'), true);
            // $_POST = json_decode($json, true);
            $response = [
                "success" => false,
                "message" => "Something Went Wrong"
            ];

            if ($id != null) {
                if (update($_POST, $id, 'pages')) {
                    $response = [
                        "success" => true,
                        "post" => $_POST,
                        "message" => "Pages Updated Successfully"
                    ];
                }
            } else {
                if (add($_POST, 'pages', false)) {
                    $response = [
                        "success" => true,
                        "post" => $_POST,
                        "message" => "Pages Added Successfully"
                    ];
                }
            }

            echo json_encode($response);
            die();
        }
    }

    public function getPages()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Pages";
        $pageModule = "Pages";
        $response = [
            "success" => false,
            "message" => "Something Wen't Wrong"
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $modules = $this->getAllPages();
            $response = [
                'success' => true,
                'message' => 'Pages Fetched Successfully',
                'data' => $modules,
            ];
        }
        echo json_encode($response);
        die();
    }
}
