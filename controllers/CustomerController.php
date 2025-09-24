<?php

class CustomerController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }
    
    public function CustomersList($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Products List";
        $pageModule = "Products List";
        

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $customers = getData("online_users", true);
            require 'views/customers/customers-list.php';
        }
    }
    public function CustomersInfo($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Products List";
        $pageModule = "Products List";
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            // $products = getData("tbl_products");
            require 'views/customers/customer-info.php';
        }
    }
   
}
