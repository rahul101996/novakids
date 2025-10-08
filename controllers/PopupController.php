<?php

class PopupController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function index()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "POPUP COLLECTION";
        $pageModule = "POPUP COLLECTION";


        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $banners = getData("tbl_popup");
            // printWithPre($collections);
            require 'views/master/popups.php';
        }
    }
    public function AddPopUp($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Add Popup";
        $pageModule = "Add popup";
        $products = getData("tbl_popup");
        if ($id != null) {
            $popup = getData2("SELECT * FROM `tbl_popup` WHERE `id` = $id ORDER BY `id` DESC LIMIT 1")[0];
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {


            // printWithPre($collections);
            // printWithPre($collections);
            require 'views/master/add-popup.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {


            // printWithPre($_POST);
            // printWithPre($_FILES);
            // die();
            if (isset($_POST['add'])) {

                unset($_POST['old_image']);
                unset($_POST['add']);
                // $_POST['products'] = json_encode($_POST['products']);
                // die();
                // unset($_POST['products']);

                // printWithPre($_FILES);

                $_POST['img'] = uploadFile($_FILES['img'], "public/uploads/popups/");
                // printWithPre($_POST);

                // die();

                $collection = add($_POST, "tbl_popup");
                if ($collection) {
                    $_SESSION['success'] = "Collection Added Successfully";
                    header('Location:/admin/add-popup');
                    exit();
                } else {
                    $_SESSION['err'] = "Failed to add collection";
                    header('Location:/admin/add-popup');
                    exit();
                }
            } else {
                // unset($_POST['old_vdata_image']);
                // printWithPre($_POST);
                // printWithPre($_FILES);

                // die();
                unset($_POST['update']);

                if (isset($_FILES['img']) && !empty($_FILES['img']['name'])) {
                    $_POST['img'] = uploadFile($_FILES['img'], "public/uploads/popups/");
                } else {
                    $_POST['img'] = $_POST['old_image'];
                }
                unset($_POST['old_image']);
                $collection = update($_POST, $id, "tbl_popup");
                if ($collection) {
                    $_SESSION['success'] = "Collection Updated Successfully";
                    header('Location:/admin/add-popup');
                    exit();
                } else {
                    $_SESSION['err'] = "Failed to update collection";
                    header('Location:/admin/add-popup');
                    exit();
                }
            }
        }
    }
}
