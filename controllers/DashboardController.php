<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/database.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LoginController.php";

class DashboardController extends LoginController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
        parent::__construct($this->db);
    }

    public function index()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Dashboard";
        $pageTitle = "Dashboard";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $current_year = date('Y');
            $employees = getData2("SELECT * FROM admin");

            $Courses_payments = getData2("SELECT course_payment.* , all_courses.name as course_name, online_users.fname as fname, online_users.lname as lname FROM course_payment LEFT JOIN all_courses ON course_payment.course_id = all_courses.id 
            LEFT JOIN online_users ON course_payment.user_id = online_users.id
            ORDER BY course_payment.`id` DESC");
            // printWithPre($Courses_payments);
            
            require 'views/index.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // printWithPre($_POST);
            // die();

            if (isset($_SESSION['role']) && $_SESSION['role'] == 35) {

                try {

                    if (update($_POST, $_SESSION['eid'], 'tbl_employees')) {
                        
                        update([
                            'name' => $_POST['name'],
                            'email' => $_POST['email'],
                            'phone' => $_POST['phone'],
                        ], $_SESSION['eid'], 'admin', 'eid');

                        $_SESSION['success'] = "Profile Updated Successfully";
                    } else {
                        $_SESSION['err'] = "Failed to update profile in employees table";
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                    $_SESSION['err'] = $e->getMessage();
                }

                redirect('/dashboard');
            }
        }
    }
}
