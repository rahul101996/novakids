<?php

class CollectionController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function index()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Collection";
        $pageModule = "Collection";

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            require 'views/products/add-collection.php';

        }
    }
}
