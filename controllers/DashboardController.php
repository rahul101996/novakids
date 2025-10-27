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


            $Orders = getData2("SELECT created_date FROM `tbl_purchase` WHERE `status` != 'Cancelled'");

            $orderCounts = [];
            foreach ($Orders as $order) {
                $date = date('Y-m-d', strtotime($order['created_date'])); // format date
                if (!isset($orderCounts[$date])) {
                    $orderCounts[$date] = 0;
                }
                $orderCounts[$date]++;
            }

            $labels = array_keys($orderCounts);
            $orders_data = array_values($orderCounts);
        //     printWithPre($labels);
        //     printWithPre($data);
        //    echo json_encode($labels) ;
        //    echo json_encode($data);
        //     die();
            $Total_Orders = count($Orders);
            $today = date('Y-m-d'); // Current date (e.g., 2025-10-13)
            $todaysOrders = [];
            $Total_sales = 0;
            foreach ($Orders as $order) {

                $Total_sales += $order['total_amount'];
                // assuming created_date is in 'Y-m-d H:i:s' format
                if (strpos($order['created_date'], $today) === 0) {
                    $todaysOrders[] = $order;
                }
            }

            // Count total today's orders
            $totalTodayOrders = count($todaysOrders);

            $Users = getData2("SELECT * FROM `online_users`");
            $Total_Users = count($Users);

            $Products = getData2("SELECT * FROM `tbl_products`");
            $Total_Products = count($Products);

            $Category = getData2("SELECT * FROM `tbl_category`");
            $Total_Category = count($Category);
            // printWithPre($Total_Orders);
            require 'views/index.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // printWithPre($_POST);
            // die();


        }
    }
}
