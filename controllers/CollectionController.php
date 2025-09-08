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
             
            $collections = getData("tbl_collection");
            // printWithPre($collections);
            require 'views/products/collections.php';
        }
    }
    public function AddCollections($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Add Collection";
        $pageModule = "Add Collection";
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            if($id != null){
            $collection = getData2("SELECT * FROM `tbl_collection` WHERE `id` = $id ORDER BY `id` DESC LIMIT 1")[0];
            }
            // printWithPre($collections);
            // printWithPre($collections);
            require 'views/products/add-collections.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            
            // printWithPre($_POST);
            unset($_POST['products']);
            // printWithPre($_FILES);
            $_POST['image'] = uploadFile($_FILES['collection_image'], "public/uploads/collection/");
                        // die();

            $collection = add($_POST, "tbl_collection");
            if($collection){
                $_SESSION['success'] = "Collection Added Successfully";
                header('Location:/admin/collections');
                exit();
            }else{
                $_SESSION['err'] = "Failed to add collection";
                header('Location:/admin/collections');
                exit();
            }

        }
    }
    public function AddProducts($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Add Collection";
        $pageModule = "Add Collection";
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            // $collection = getData2("SELECT * FROM `tbl_collection` WHERE `id` = $id ORDER BY `id` DESC LIMIT 1")[0];
            // printWithPre($collections);
            // printWithPre($collections);
            require 'views/products/add-products.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            
            // printWithPre($_POST);
            unset($_POST['products']);
            // printWithPre($_FILES);
            $_POST['image'] = uploadFile($_FILES['collection_image'], "public/uploads/collection/");
                        // die();

            $collection = add($_POST, "tbl_collection");
            if($collection){
                $_SESSION['success'] = "Collection Added Successfully";
                header('Location:/admin/collections');
                exit();
            }else{
                $_SESSION['err'] = "Failed to add collection";
                header('Location:/admin/collections');
                exit();
            }

        }
    }
}
