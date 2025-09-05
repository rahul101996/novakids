<?php

class MasterController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function index()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Company";
        $pageModule = "Company";

        $company = $this->getCompanyDetail();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {


            require 'views/master/company.php';
        } else {
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {

                $file = [
                    'name' => $_FILES['logo']['name'],
                    'full_path' => $_FILES['logo']['tmp_name'],
                    'type' => $_FILES['logo']['type'],
                    'tmp_name' => $_FILES['logo']['tmp_name'],
                    'error' => $_FILES['logo']['error'],
                    'size' => $_FILES['logo']['size'],
                ];

                $_POST['logo'] = uploadFile($file, "public/logos/");
            } else {
                $_POST['logo'] = $company["logo"];
            }
            if (add($_POST, 'company')) {
                $_SESSION["success"] = "Company Updated";
            } else {
                $_SESSION["err"] = "Something Went Wrong";
            }
            redirect("company");
        }
    }

    public function getCompanyDetail()
    {
        try {
            $query = "SELECT * from company order by id desc limit 1";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function charges($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $siteName = getDBObject()->getSiteName();
            $pageTitle = "Charges";
            $pageModule = "Charges";

            $editData = [];
            if ($id != null) {
                $editData = getData2("SELECT * FROM tbl_charges WHERE id = $id")[0];
            }

            require 'views/master/charges.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // printWithPre($_POST);
            // die();

            try {
                $this->db->beginTransaction();

                if ($id == null) {

                    add($_POST, 'tbl_charges');
                    $_SESSION["success"] = "Charges Added";
                } else {

                    update($_POST, $id, 'tbl_charges');
                    $_SESSION["success"] = "Charges Updated";
                }

                $this->db->commit();
            } catch (Exception $e) {
                $this->db->rollBack();
                $_SESSION["err"] = $e->getMessage();
            }

            redirect("/master/charges");
        }
    }

    public function deleteCharges($id)
    {
        try {
            $this->db->beginTransaction();

            delete($id, "tbl_charges");
            $_SESSION['success'] = "Charges Deleted Successfully";

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();

            $_SESSION['err'] = $e->getMessage();
        }

        redirect("/master/charges");
    }

    public function expenseType($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $siteName = getDBObject()->getSiteName();
            $pageTitle = "Expense Type";
            $pageModule = "Expense Type";

            $editData = [];
            if ($id != null) {
                $editData = getData2("SELECT * FROM tbl_expense_type WHERE id = $id")[0];
            }

            require 'views/master/expense_type.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // printWithPre($_POST);
            // die();

            try {
                $this->db->beginTransaction();

                if ($id == null) {

                    add($_POST, 'tbl_expense_type');
                    $_SESSION["success"] = "Expense Type Added";
                } else {

                    update($_POST, $id, 'tbl_expense_type');
                    $_SESSION["success"] = "Expense Type Updated";
                }

                $this->db->commit();
            } catch (Exception $e) {
                $this->db->rollBack();
                $_SESSION["err"] = $e->getMessage();
            }

            redirect("/master/expense-type");
        }
    }

    public function deleteExpenseType($id)
    {
        try {
            $this->db->beginTransaction();

            delete($id, "tbl_expense_type");
            $_SESSION['success'] = "Expense Type Deleted Successfully";

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();

            $_SESSION['err'] = $e->getMessage();
        }

        redirect("/master/expense-type");
    }

    public function machine()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            if (isset($_GET["del"]) && !empty($_GET["del"])) {
                try {
                    if (delete($_GET["del"], "biomax_machines")) {
                        $_SESSION["success"] = "Machine Dleeted Successfully";
                    } else {
                        $_SESSION["err"] = "Can't Dleet Machine";
                    }
                } catch (Exception $e) {
                    $_SESSION["err"] = "Cant Delet Machine";
                }
                redirect("machine");
            } else {
                $siteName = getDBObject()->getSiteName();
                $pageTitle = "Machine";
                $pageModule = "Machine";
                $machines = getData("biomax_machines");
                require 'views/master/machine.php';
            }
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if (add($_POST, 'biomax_machines', false)) {
                    $_SESSION["success"] = "Machine Added";
                } else {
                    $_SESSION["err"] = "Something Went Wrong";
                }
            } catch (Exception $e) {
                // echo $e->getMessage();
                $_SESSION["err"] = "Something Went Wrong";
            }
            redirect("machine");
        }
    }
}
