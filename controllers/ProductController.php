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
            // printWithPre($_POST);
            // $sizeChart = [];
            $sizeType = $_POST["sizeType"];
            $sizeVariant = $_POST["sizeVariant"];
            $sizeValues = $_POST["sizeValues"];
            $targetDir = 'public/uploads/product-images/';

            $result = [];
            $typeCount = count($sizeType);

            foreach ($sizeVariant as $i => $variant) {
                $startIndex = $i * $typeCount;
                $values = array_slice($sizeValues, $startIndex, $typeCount);
                $result[$variant] = array_combine($sizeType, $values);
            }
            // printWithPre($result);
            // die();
            $sizeImage = uploadFile($_FILES["sizeImage"], $targetDir);
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
                    'shortDescription' => $_POST['shortDescription'],
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
                    'product_images' => $productImagesJson, // Added here
                    'sizeChart' => json_encode($result),
                    'sizeDescription' => $_POST["sizeDescription"],
                    'sizeImage' => $sizeImage
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

    public function EditProducts($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Add Collection";
        $pageModule = "Add Collection";

        $db = getDBCon(); // PDO instance

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categories = getData("tbl_category");
            $packages = getData("tbl_packaging");
            $productData = getData2("SELECT * from tbl_products where id='$id'")[0];
            // printWithPre($productData);
            require 'views/products/edit-products.php';
        }
    }

    public function Inventory()
    {
        $products = getData2("SELECT tbl_variants.* , tbl_products.name as product_name FROM `tbl_variants` LEFT JOIN tbl_products ON tbl_variants.product_id = tbl_products.id WHERE 1 ORDER BY tbl_variants.id DESC");
        // printWithPre($products);
        include $_SERVER['DOCUMENT_ROOT'] . "/views/products/inventory.php";
    }

    public function updateQuantity()
    {
        // printWithPre($_POST);
        $response = [
            "success" => false,
            'message' => "something wen't wrong"
        ];
        try {
            $up = update(["$_POST[field]" => $_POST["quantity"]], $_POST["id"], "tbl_variants");
            if ($up) {
                $response = [
                    "success" => true,
                    "message" => "Variant Updated Successfully"
                ];
            } else {
                $response = [
                    "success" => false,
                    'message' => "something wen't wrong"
                ];
            }
        } catch (Exception $e) {
            $response = [
                "success" => false,
                'message' => "something wen't wrong"
            ];
        }
        echo json_encode($response);
    }



    public function OrderList()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Order List";
        $pageModule = "Order List";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/products/order-list.php';
        }
    }

    public function OrderDetails($order_id = null)
    {
        $response = [
            "success" => false,
            "message" => "Order Not Found"
        ];

        $data = getData2("SELECT * FROM `tbl_purchase` WHERE `orderid` = $order_id");

        foreach ($data as $key => $value) {
            $data[$key] = $value;
            $data[$key]['items'] = getData2("SELECT tpi.*, tp.*, tv.* FROM `tbl_purchase_item` tpi LEFT JOIN tbl_products tp ON tpi.product = tp.id LEFT JOIN tbl_variants tv ON tpi.varient = tv.id WHERE tpi.purchase_id = " . $value['id']);
        }

        if (!empty($data)) {
            $response = [
                "success" => true,
                "message" => "Order Found",
                "data" => $data
            ];
        }

        echo json_encode($response);
    }

    public function CancelOrderList()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Cancel Order List";
        $pageModule = "Cancel Order List";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/products/cancel-order-list.php';
        }
    }


    public function ChangeNewArrivalStatus()
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
                    "new_arrival" => $_POST['status']
                ],
                $_POST['id'],
                "tbl_products"
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


    public function ChangeProductStatus()
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
                "tbl_products"
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

    public function getSizeChart(){
        $id = $_GET["id"];
        $ProductData = getData2("SELECT tbl_products.*, tbl_category.category as category_name FROM `tbl_products` LEFT JOIN tbl_category ON tbl_products.category = tbl_category.id WHERE tbl_products.id = $id")[0];
        if(empty($ProductData) || empty($ProductData["sizeChart"])){
            echo json_encode([
                "success"=>false
            ]);
            die();
        }
        ob_start();
        $data = json_decode($ProductData["sizeChart"]);
        ?>
            <div class="bg-white shadow-lg w-[65%] max-md:w-[90%] max-h-[80vh] relative flex flex-col animate-slideDown">
                <!-- Close button -->
                <button onclick="document.getElementById('sizeChartModal').classList.add('hidden')"
                    class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 animate-rotate-pingpong">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>

                <!-- Header -->
                <div class="p-6 pb-2 flex-shrink-0">
                    <h2 class="text-2xl max-md:text-lg font-bold mb-1">SIZE CHART</h2>
                    <p class="text-sm text-gray-500">Reviews: Fits true to size</p>
                </div>

                <!-- Scrollable body -->
                <div class="p-6 pt-0 overflow-y-auto flex-1">
                    <!-- Measuring unit toggle (hidden for now) -->
                    <div class="flex items-center gap-2 mb-6">
                        <span class="text-gray-700 font-medium">Measuring Unit :</span>
                        <span>Inches</span>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-center text-gray-700">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3">Size</th>
                                <th class="p-3">Chest</th>
                                <th class="p-3">Length</th>
                                <th class="p-3">Sleeve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rowClass = "border-t";
                            foreach ($data as $size => $measurements) {
                                echo "<tr class='{$rowClass}'>";
                                echo "<td class='p-3'>{$size}</td>";
                                echo "<td class='p-3'>{$measurements->Chest}</td>";
                                echo "<td class='p-3'>{$measurements->Length}</td>";
                                echo "<td class='p-3'>{$measurements->Sleeve}</td>";
                                echo "</tr>";

                                // Alternate row color
                                $rowClass = ($rowClass === "border-t") ? "border-t bg-gray-50" : "border-t";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- How to Measure Section -->
                <div class="mt-8 border-t pt-6 flex flex-col md:flex-row items-center">
                    <!-- Text -->
                    <div class="w-full md:w-[60%]">
                        <?=$ProductData["sizeDescription"]?>
                    </div>
                    <!-- Image -->
                    <div class="w-full md:w-[40%] flex justify-center">
                        <img src="/<?=$ProductData["sizeImage"]?>" alt="How to measure T-shirt" class="h-72 max-md:h-64">
                    </div>
                </div>
            </div>
        <?php
        $html = ob_get_clean();

        echo json_encode([
            "success"=>true,
            "data"=>$html
        ]);
    }
}
