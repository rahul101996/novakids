<?php

class CompanyController
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
        // $this->checkSession();
        $company = $this->getCompanyDetail();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {


            require 'views/master/company.php';
        } else {
            // printWithPre($_POST);
            // printWithPre($_FILES);
            // die();
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
                unset($_POST['old_image']);
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
                $_POST['logo'] = $_POST["old_image"];
                unset($_POST['old_image']);
            }
            // printWithPre($_POST);
            // printWithPre($_FILES);
            // die();
            if (add($_POST, 'company')) {
                $_SESSION["success"] = "Company Updated";
            } else {
                $_SESSION["err"] = "Something Went Wrong";
            }

            redirect("/admin/setting");
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
