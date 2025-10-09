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
        $products = getData("tbl_products");
        if ($id != null) {
            $collection = getData2("SELECT * FROM `tbl_collection` WHERE `id` = $id ORDER BY `id` DESC LIMIT 1")[0];
            $collection_products = json_decode($collection['products'], true) ?? [];

            // In collection
            $inProducts = array_filter($products, function ($product) use ($collection_products) {
                return in_array($product['id'], $collection_products);
            });

            // Not in collection
            $products = array_filter($products, function ($product) use ($collection_products) {
                return !in_array($product['id'], $collection_products);
            });

            // $collection_products?
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {


            // printWithPre($collections);
            // printWithPre($collections);
            require 'views/products/add-collections.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // printWithPre($_POST);
            if (isset($_POST['add'])) {

                unset($_POST['old_vdata_image']);
                unset($_POST['add']);
                $_POST['products'] = json_encode($_POST['products']);

                // printWithPre($_FILES);

                $_POST['image'] = uploadFile($_FILES['collection_image'], "public/uploads/collection/");
                // die();

                $collection = add($_POST, "tbl_collection");
                if ($collection) {
                    $_SESSION['success'] = "Collection Added Successfully";
                    header('Location:/admin/collections');
                    exit();
                } else {
                    $_SESSION['err'] = "Failed to add collection";
                    header('Location:/admin/collections');
                    exit();
                }

            } else {
                // unset($_POST['old_vdata_image']);
                unset($_POST['update']);
                if (!empty($_POST['products'])) {

                    $_POST['products'] = array_merge($collection_products, $_POST['products']);
                    $_POST['products'] = json_encode($_POST['products']);
                } else {
                    $_POST['products'] = json_encode($collection_products);
                }
                if (isset($_FILES['collection_image']) && !empty($_FILES['collection_image']['name'])) {
                    $_POST['image'] = uploadFile($_FILES['collection_image'], "public/uploads/collection/");
                } else {
                    $_POST['image'] = $_POST['old_vdata_image'];
                }
                unset($_POST['old_vdata_image']);
                $collection = update($_POST, $id, "tbl_collection");
                if ($collection) {
                    $_SESSION['success'] = "Collection Updated Successfully";
                    header('Location:/admin/collections');
                    exit();
                } else {
                    $_SESSION['err'] = "Failed to update collection";
                    header('Location:/admin/collections');
                    exit();
                }
            }
        }
    }

    public function deleteCollection($id)
    {
        try {
            $this->db->beginTransaction();

            delete($id, "tbl_collection");

            $_SESSION['success'] = "Collection Deleted Successfully";

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
            echo $e->getMessage();
            $_SESSION['err'] = $e->getMessage();
        }

        redirect('/admin/collections');
    }

    
    public function ChangeCollectionStatus()
    {
        $response = [
            "success" => false,
            "message" => "Something went wrong"
        ];

        try {
            $_POST = json_decode(file_get_contents('php://input'), true);

            // printWithPre($_POST);
            // die();

            update(
                [
                    "status" => $_POST['status']
                ],
                $_POST['id'],
                "tbl_collection"
            );

            $response = [
                "success" => true,
                "message" => "Status Updated Successfully"
            ];

        } catch (Exception $e) {
            $this->db->rollBack();

            $response = [
                "success" => false,
                "message" => $e->getMessage()
            ];
        } finally {
            echo json_encode($response);
        }
    }
}
