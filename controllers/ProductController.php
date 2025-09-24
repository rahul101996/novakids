<?php

class ProductController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function ProductsList($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Products List";
        $pageModule = "Products List";


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $products = getData("tbl_products");
            require 'views/products/products-list.php';
        }
    }
    public function AddProducts($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Add Collection";
        $pageModule = "Add Collection";

        $db = getDBCon(); // PDO instance

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categories = getData("tbl_category");
            $packages = getData("tbl_packaging");
            require 'views/products/add-products.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                // Begin transaction
                $db->beginTransaction();

                // Handle product images upload
                $productImages = [];
                if (isset($_FILES['product_images'])) {
                    $images = $_FILES['product_images'];
                    foreach ($images['name'] as $key => $filename) {
                        $file = [
                            'name' => $images['name'][$key],
                            'type' => $images['type'][$key],
                            'tmp_name' => $images['tmp_name'][$key],
                            'error' => $images['error'][$key],
                            'size' => $images['size'][$key]
                        ];
                        $targetDir = 'public/uploads/product-images/';
                        $uploadedFile = uploadFile($file, $targetDir);
                        if ($uploadedFile) {
                            $productImages[] = $uploadedFile;
                        }
                    }
                }
                $productImagesJson = json_encode($productImages);

                // Prepare product data
                $data = [
                    'name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'category' => $_POST['category'],
                    'price' => $_POST['price'],
                    'compare_price' => $_POST['compare_price'],
                    'cost_per_item' => $_POST['cost_per_item'],
                    'profit' => $_POST['profit'],
                    'margin' => $_POST['margin'],
                    'track_quantity' => isset($_POST['track_quantity']) && $_POST['track_quantity'] ? 1 : 0,
                    'quantity' => $_POST['quantity'],
                    'continue_selling' => isset($_POST['continue_selling']) && $_POST['continue_selling'] ? 1 : 0,
                    'physical_product' => isset($_POST['physical_product']) && $_POST['physical_product'] ? 1 : 0,
                    'packaging' => $_POST['packaging'],
                    'status' => isset($_POST['status']) && $_POST['status'] ? 1 : 0,
                    'product_images' => $productImagesJson // Added here
                ];

                // Insert into tbl_products
                $productId = add($data, "tbl_products");

                if (!$productId) {
                    throw new Exception("Failed to add product.");
                }

                // Insert variants if available
                if (isset($_POST['variant_prices']) && isset($_POST['variant_quantities'])) {
                    $prices = $_POST['variant_prices'] ?? [];
                    $quantities = $_POST['variant_quantities'] ?? [];
                    $images = $_FILES['variant_images'] ?? [];
                    $options = $_POST['variant_options'] ?? [];

                    foreach ($prices as $index => $price) {
                        $price = floatval($price);
                        $quantity = intval($quantities[$index] ?? 0);

                        if ($price <= 0 || $quantity < 0) {
                            continue;
                        }

                        // Handle uploaded files for variant images
                        $uploadedFiles = [];
                        if (isset($images['name'][$index])) {
                            foreach ($images['name'][$index] as $key => $filename) {
                                $file = [
                                    'name' => $images['name'][$index][$key],
                                    'type' => $images['type'][$index][$key],
                                    'tmp_name' => $images['tmp_name'][$index][$key],
                                    'error' => $images['error'][$index][$key],
                                    'size' => $images['size'][$index][$key]
                                ];
                                $targetDir = 'public/uploads/product-images/';
                                $uploadedFile = uploadFile($file, $targetDir);
                                if ($uploadedFile) {
                                    $uploadedFiles[] = $uploadedFile;
                                }
                            }
                        }

                        $imagesJson = json_encode($uploadedFiles);
                        $optionDetail = isset($options[$index]) ? json_encode($options[$index]) : '';

                        // Prepare variant data
                        $variantData = [
                            'product_id' => $productId,
                            'price' => $price,
                            'quantity' => $quantity,
                            'images' => $imagesJson,
                            'options' => $optionDetail
                        ];

                        // Insert variant
                        $result = add($variantData, "tbl_variants");

                        if (!$result) {
                            throw new Exception("Failed to add variant at index $index.");
                        }
                    }
                }

                // Commit transaction if all successful
                $db->commit();

                $_SESSION['success'] = "Product and variants added successfully.";
                header('Location:/admin/add-product');
                exit();
            } catch (Exception $e) {
                // Rollback on error
                $db->rollBack();

                $_SESSION['err'] = "Error: " . $e->getMessage();
                echo $e->getMessage();
                // Optionally redirect or log error
            }
        }
    }

    public function Inventory()
    {
        $products = getData2("SELECT tbl_variants.* , tbl_products.name as product_name FROM `tbl_variants` LEFT JOIN tbl_products ON tbl_variants.product_id = tbl_products.id WHERE 1 ORDER BY tbl_variants.id DESC");
        // printWithPre($products);
        include $_SERVER['DOCUMENT_ROOT'] . "/views/products/inventory.php";
    }
}
