<?php

class CategoryController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function index($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Add Category";
        $pageModule = "Add Category";

        if($id != null){
            $category = getData2("SELECT * FROM `tbl_category` WHERE `id` = $id ORDER BY `id` DESC LIMIT 1")[0];
            // printWithPre($category);
        }


        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
             
            // $collections = getData("tbl_collection");
            // printWithPre($collections);
            require 'views/master/add-category.php';
        }elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
            //  printWithPre($_POST);
            //  printWithPre($_FILES);
            //  die();
            
             if(isset($_POST['add'])){
                unset($_POST['add']);
                 $_POST['img'] = uploadFile($_FILES['img'], "public/uploads/category/");
            $category = add($_POST, "tbl_category");
            if($category){
                $_SESSION['success'] = "Category Added Successfully";
                header('Location:/admin/add-category');
                exit();
            }else{
                $_SESSION['err'] = "Failed to add category";
                header('Location:/admin/add-category');
                exit();
             }
            }elseif(isset($_POST['update'])){

                 unset($_POST['update']);
                 if(isset($_FILES['img']['name']) && $_FILES['img']['name'] != ""){
                     $_POST['img'] = uploadFile($_FILES['img'], "public/uploads/category/");
                 }
                                //   printWithPre($_POST);
                                //   die();

                 $category = update($_POST, $id, "tbl_category");
                 if($category){
                     $_SESSION['success'] = "Category Updated Successfully";
                     header('Location:/admin/category-list');
                     exit();
                 }else{
                     $_SESSION['err'] = "Failed to update category";
                     header('Location:/admin/category-list');
                     exit();
                 }

            }
        }
    }

    public  function CategoryList(){

        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $categories = getData("tbl_category");
            require 'views/master/category-list.php';
        }
    }
    public function DeleteCategory($id){
        
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $category = delete($id, "tbl_category");
            if($category){
                $_SESSION['success'] = "Category Deleted Successfully";
                header('Location:/admin/category-list');
                exit();
            }else{
                $_SESSION['err'] = "Failed to delete category";
                header('Location:/admin/category-list');
                exit();
            }
        }
    }
    
}
