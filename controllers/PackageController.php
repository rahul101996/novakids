<?php

class PackageController
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

        if ($id != null) {
            $package = getData2("SELECT * FROM `tbl_packaging` WHERE `id` = $id ORDER BY `id` DESC LIMIT 1")[0];
            // printWithPre($category);
        }


        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            // $collections = getData("tbl_packaging");
            // printWithPre($package);
            require 'views/master/add-packaging.php';
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //  printWithPre($_POST);
            //  printWithPre($_FILES);
            //  die();

            if (isset($_POST['add'])) {
                unset($_POST['add']);
                if (isset($_POST['is_default']) && $_POST['is_default'] == "on") {
                    updateSQL("UPDATE `tbl_packaging` SET `is_default` = 0", "tbl_packaging", "WHERE `is_default` = 1");
                    $_POST['is_default'] = 1;
                } else {
                    $_POST['is_default'] = 0;
                }
                // printWithPre($_POST);
                // die();
                //  $_POST['img'] = uploadFile($_FILES['img'], "public/uploads/category/");
                $package = add($_POST, "tbl_packaging");
                if ($package) {
                    $_SESSION['success'] = "Package Added Successfully";
                    header('Location:/admin/packages-list');
                    exit();
                } else {
                    $_SESSION['err'] = "Failed to add Package";
                    header('Location:/admin/packages-list');
                    exit();
                }
            } elseif (isset($_POST['update'])) {

                unset($_POST['update']);
                // if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != "") {
                //     $_POST['img'] = uploadFile($_FILES['img'], "public/uploads/category/");
                // }
                //   printWithPre($_POST);
                //   die();

                if (isset($_POST['is_default']) && $_POST['is_default'] == "on") {
                    $data = [
                        'is_default' => 0
                    ];
                    updateSQL( $data , "tbl_packaging", "`is_default` = '1'");
                    $_POST['is_default'] = 1;
                } else {
                    $_POST['is_default'] = 0;
                }

                $package = update($_POST, $id, "tbl_packaging");
                if ($package) {
                    $_SESSION['success'] = "Category Updated Successfully";
                    header('Location:/admin/packages-list');
                    exit();
                } else {
                    $_SESSION['err'] = "Failed to update category";
                    header('Location:/admin/packages-list');
                    exit();
                }
            }
        }
    }


    public  function PackageList()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $packages = getData("tbl_packaging");
            require 'views/master/packaging-list.php';
        }
    }
    public function DeletePackage($id)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $category = delete($id, "tbl_category");
            if ($category) {
                $_SESSION['success'] = "Category Deleted Successfully";
                header('Location:/admin/category-list');
                exit();
            } else {
                $_SESSION['err'] = "Failed to delete category";
                header('Location:/admin/category-list');
                exit();
            }
        }
    }
}
