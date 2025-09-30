<?php

class WebsettingController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function home($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Home";
        $pageModule = "Home";


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/websetting/home.php';
        }
    }
}
