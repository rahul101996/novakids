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

            
            $Total_Orders = getData2("SELECT * FROM `tbl_order` WHERE `order_status` = 'Delivered' AND YEAR(`order_date`) = $current_year");
            require 'views/index.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // printWithPre($_POST);
            // die();

            
        }
    }
}
