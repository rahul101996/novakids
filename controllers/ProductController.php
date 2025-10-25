<?php

class ProductController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function ExportCollections($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Products List";
        $pageModule = "Products List";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            header("Content-Type: text/csv; charset=UTF-8");
            header("Content-Disposition: attachment; filename=collections.csv");
            header("Pragma: no-cache");
            header("Expires: 0");

            // Add UTF-8 BOM to fix ₹ and other Unicode chars
            echo "\xEF\xBB\xBF";

            $output = fopen("php://output", "w");

            // Write header row
            fputcsv($output, ['Collection ID', 'Collection Name', 'Products', 'Status', 'Created Date']);

            // Fetch all collections
            $collections = getData2("SELECT * FROM `tbl_collection` ORDER BY id DESC");

            foreach ($collections as $collection) {
                // Decode product IDs (they are stored as JSON)
                $productIds = json_decode($collection['products'], true);
                $productNames = [];

                if (!empty($productIds) && is_array($productIds)) {
                    // Get product names for these IDs
                    $ids = implode(',', array_map('intval', $productIds));
                    $products = getData2("SELECT name FROM `tbl_products` WHERE id IN ($ids)");
                    $productNames = array_column($products, 'name');
                }

                // Prepare CSV row
                fputcsv($output, [
                    $collection['id'],
                    $collection['name'],
                    !empty($productNames) ? implode(', ', $productNames) : 'No Products',
                    $collection['status'] == 1 ? 'Active' : 'Inactive',
                    $collection['created_at']
                ]);
            }

            fclose($output);
            exit;
        }
    }
    public function ExportProductsStock($id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            header("Content-Type: text/csv; charset=UTF-8");
            header("Content-Disposition: attachment; filename=products_stock.csv");
            header("Pragma: no-cache");
            header("Expires: 0");

            // Fix rupee/Unicode display issues
            echo "\xEF\xBB\xBF";

            $output = fopen("php://output", "w");

            // Write CSV header row
            fputcsv($output, ['Product Name', 'Variants', 'Unavailable', 'Committed', 'Available', 'On Hand']);

            // Fetch all products
            $products = getData2("SELECT tbl_variants.* , tbl_products.name as product_name FROM `tbl_variants` LEFT JOIN tbl_products ON tbl_variants.product_id = tbl_products.id WHERE 1 ORDER BY tbl_variants.id DESC");

            foreach ($products as $product) {
                // Decode images and variants
                $variants = json_decode($product['options'], true);
                $variants = json_decode($variants, true);

                $variantText = '';
                if (!empty($variants) && is_array($variants)) {
                    $parts = [];
                    foreach ($variants as $key => $value) {
                        $parts[] = "$key: $value";
                    }
                    $variantText = implode(', ', $parts);
                } else {
                    $variantText = 'N/A';
                }

                // Write row
                fputcsv($output, [
                    $product['product_name'],
                    $variantText,
                    $product['unavailable'],
                    $product['committed'],
                    $product['quantity'],
                    $product['on_hand']
                ]);
            }

            fclose($output);
            exit;
        }
    }
    public function ProductsList($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Products List";
        $pageModule = "Products List";


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $products = getData2("SELECT tp.*, tc.category AS category_name FROM `tbl_products` tp LEFT JOIN tbl_category tc ON tp.category = tc.id");
            $Active_products = 0;
            $New_arrivals = 0;
            $Out_of_stock = 0;
            foreach ($products as $key => $product) {
                $status = trim(strtolower($product['status'] ?? 0));
                $new = trim(strtolower($product['new_arrival'] ?? 0));
                if ($status == '1') {
                    $Active_products++;
                }
                if ($new == '1') {
                    $New_arrivals++;
                }

                $variants = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = '$product[id]'");

                foreach ($variants as $variant) {
                    if ((int)$variant['quantity'] <= 0) {
                        $Out_of_stock++;
                        break; // Stop checking once one variant is out of stock
                    }
                }
            }

            require 'views/products/products-list.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $this->OrderDetails($_POST['id']);
            if (isset($_POST['time_period'])) {
                $date = date('Y-m-d');
                $timePeriod = $_POST['time_period'];

                // Default value for fromdate
                $fromdate = $date;

                if (trim(strtolower($timePeriod)) == 'today') {
                    $fromdate = date('Y-m-d');
                } elseif ($timePeriod == 'week') {
                    $fromdate = date('Y-m-d', strtotime('-7 days'));
                } elseif ($timePeriod == 'month') {
                    $fromdate = date('Y-m-d', strtotime('-30 days'));
                }

                $data = getData2("SELECT tp.*, tc.category AS category_name FROM `tbl_products` tp LEFT JOIN tbl_category tc ON tp.category = tc.id WHERE tp.created_date BETWEEN '$fromdate' AND '$date'");

                $Active_products = 0;
                $New_arrivals = 0;
                $Out_of_stock = 0;


                ob_start();
                if (!empty($data)) {


                    foreach ($data as $key => $product) :
                        $status = trim(strtolower($product['status'] ?? 0));
                        $new = trim(strtolower($product['new_arrival'] ?? 0));

                        $images = json_decode($product['product_images'], true);
                        $images = array_reverse($images);
                        if ($status == '1') {
                            $Active_products++;
                        }
                        if ($new == '1') {
                            $New_arrivals++;
                        }

                        $variants = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = '$product[id]'");
                        $TotalVariants = count($variants);
                        $quantity = 0;
                        foreach ($variants as $variant) {

                            $quantity += $variant['quantity'];
                        }
                        foreach ($variants as $variant) {
                            if ((int)$variant['quantity'] <= 0) {
                                $Out_of_stock++;
                                break; // Stop checking once one variant is out of stock
                            }
                        }

                        //  printWithPre($PurchaseItems);
?>
                        <tr
                            class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 
                           hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] 
                           transition-all duration-200 ease-in-out">
                            <td class="font-semibold py-2 px-3 text-left">
                                <div class="flex items-center justify-start gap-6">
                                    <img src="/<?= $images[0] ?>" class="h-10 rounded" alt="">
                                    <?= $product['name'] ?>
                                </div>
                            </td>
                            <td class="font-semibold py-2 px-3 text-left">
                                <div class="relative inline-block w-14 mr-2 align-middle select-none">
                                    <input type="checkbox" id="togglr_status_<?= $product['id'] ?>"
                                        <?= $product['status'] == 1 ? 'checked' : '' ?>
                                        onchange="updateProductStatus(this, <?= $product['id'] ?>)"
                                        class="sr-only peer">

                                    <label for="togglr_status_<?= $product['id'] ?>"
                                        class="block overflow-hidden h-7 rounded-full bg-gray-200 cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-[#06402b] before:content-[''] before:absolute before:top-0.5 before:left-0.5 before:bg-sky-50 before:border-2 before:border-gray-300 before:h-6 before:w-6 before:rounded-full before:transition-all before:duration-300 before:shadow-md peer-checked:before:translate-x-7 peer-checked:before:border-sky-800">
                                        <span
                                            class="absolute inset-y-0 left-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-sky-50 peer-checked:translate-x-7">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span
                                            class="absolute inset-y-0 right-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td class="font-semibold py-2 px-3 text-left"><?= $quantity ?> in stock for <?= $TotalVariants ?> variants</td>
                            <td class="font-semibold py-2 px-3 text-left"><?= $product['category_name'] ?></td>
                            <td class="font-semibold py-2 px-3 text-left text-nowrap">₹ <?= formatNumber($product['price']) ?></td>

                            <td class="font-semibold py-2 px-3 text-left">
                                <div class="relative inline-block w-14 mr-2 align-middle select-none">
                                    <input type="checkbox" id="togglr_arrival_<?= $product['id'] ?>"
                                        <?= $product['new_arrival'] == 1 ? 'checked' : '' ?>
                                        onchange="updateNewArrival(this, <?= $product['id'] ?>)"
                                        class="sr-only peer">

                                    <label for="togglr_arrival_<?= $product['id'] ?>"
                                        class="block overflow-hidden h-7 rounded-full bg-gray-200 cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-[#06402b] before:content-[''] before:absolute before:top-0.5 before:left-0.5 before:bg-sky-50 before:border-2 before:border-gray-300 before:h-6 before:w-6 before:rounded-full before:transition-all before:duration-300 before:shadow-md peer-checked:before:translate-x-7 peer-checked:before:border-sky-800">
                                        <span
                                            class="absolute inset-y-0 left-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-sky-50 peer-checked:translate-x-7">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span
                                            class="absolute inset-y-0 right-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </label>
                                </div>
                            </td>
                            <td class="font-semibold py-2 px-3 text-right"><a href="/admin/edit-product/<?= $product['id'] ?>"
                                    class="text-blue-500 hover:text-blue-600"><i class="fa-solid fa-pen"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                } else {
                    ?>
                    <tr style="">
                        <td colspan="8" class="text-center py-3 text-gray-500">No matching customers found</td>
                    </tr>
                    <?php
                }
                $html = ob_get_clean();
                echo json_encode([
                    'html' => $html,
                    'data' => $data,
                    'success' => true,
                    'time_period' => $timePeriod,
                    'fromdate' => $fromdate,
                    'new_arrivals' => $New_arrivals,
                    'active_products' => $Active_products,
                    'out_of_stock' => $Out_of_stock,

                ]);
            }

            exit();
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

            $editData = [];
            if ($id != null) {
                $editData = getData2("SELECT * from tbl_products where id='$id'")[0];
            }

            // printWithPre($productData);
            require 'views/products/edit-products.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // printWithPre($_POST);
            // printWithPre($_FILES);
            // die();


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
                'status' => isset($_POST['status']) && $_POST['status'] == 'Active' ? 1 : 0,
                'sizeDescription' => $_POST["sizeDescription"],
            ];

            try {
                $db->beginTransaction();

                // Upload size image
                if (isset($_FILES["sizeImage"]) && $_FILES["sizeImage"]["error"] == 0) {
                    $data['sizeImage'] = uploadFile($_FILES["sizeImage"], $targetDir);
                }

                // Upload product images
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

                        if ($file['error'] != 0)
                            continue;

                        $uploadedFile = uploadFile($file, $targetDir);
                        if ($uploadedFile)
                            $productImages[] = $uploadedFile;
                    }
                }

                if (!empty($productImages))
                    $data['product_images'] = json_encode($productImages);
                if (!empty($result))
                    $data['sizeChart'] = json_encode($result);

                // printWithPre($data);

                update($data, $id, "tbl_products");

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
                        $optionDetail = isset($options[$index]) && !empty($options[$index]) ? json_encode($options[$index]) : '';


                        // Prepare variant data
                        $variantData = [
                            'product_id' => $id,
                            'price' => $price,
                            'quantity' => $quantity,
                            'images' => $imagesJson,
                            'options' => $optionDetail
                        ];

                        // printWithPre($variantData);
                        // var_dump($variantData['options'] != "" && $variantData['options'] != null) . " <br>";

                        // Insert variant
                        if ($variantData['options'] != "" && $variantData['options'] != null) {

                            // echo "hello" . $index;
                            add($variantData, "tbl_variants");
                        }
                    }
                }

                $db->commit();

                $_SESSION['success'] = "Product and variants updated successfully.";
            } catch (Exception $e) {
                $db->rollBack();
                echo "Error: " . $e->getMessage();
            }

            redirect("/admin/products-list");
        }
    }

    public function EditProductVariants($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Edit Product Variants";
        $pageModule = "Edit Product Variants";

        $db = getDBCon(); // PDO instance

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $editData = [];
            if ($id != null) {
                $editData = getData2("SELECT * from tbl_variants where id='$id'")[0];
            }

            require $_SERVER['DOCUMENT_ROOT'] . "/views/products/edit-product-variants.php";
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // printWithPre($_POST);
            // printWithPre($_FILES);
            // die();

            try {
                $db->beginTransaction();

                $targetDir = 'public/uploads/product-images/';

                $data = [
                    'product_id' => $_POST['product_id'],
                    'price' => $_POST['price'],
                    'quantity' => $_POST['quantity'],
                    'options' => json_encode(json_encode($_POST['options'])),
                ];


                // Delete selected images
                if (!empty($_POST['delete_images'])) {
                    foreach ($_POST['delete_images'] as $imgPath) {
                        if (file_exists($imgPath))
                            unlink($imgPath);
                    }
                }

                // Upload new images
                $uploadedImages = [];
                if (isset($_FILES['variant_images'])) {
                    foreach ($_FILES['variant_images']['name'] as $key => $filename) {
                        $file = [
                            'name' => $_FILES['variant_images']['name'][$key],
                            'type' => $_FILES['variant_images']['type'][$key],
                            'tmp_name' => $_FILES['variant_images']['tmp_name'][$key],
                            'error' => $_FILES['variant_images']['error'][$key],
                            'size' => $_FILES['variant_images']['size'][$key]
                        ];

                        if ($file['error'] != 0)
                            continue;

                        $uploadedFile = uploadFile($file, $targetDir);
                        if ($uploadedFile)
                            $uploadedImages[] = $uploadedFile;
                    }
                }

                // Combine old + new images
                $finalImages = array_merge(array_diff($_POST['allImages'] ?? [], $_POST['delete_images'] ?? []), $uploadedImages);

                $data['images'] = json_encode($finalImages);

                // printWithPre($data);

                // Update in DB
                update($data, $id, "tbl_variants");

                $db->commit();
                $_SESSION['success'] = "Product and variants updated successfully.";
            } catch (Exception $e) {
                $db->rollBack();
                echo "Error: " . $e->getMessage();
            }

            redirect("/admin/products-list");
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
            $date = date('Y-m-d');
            $orders = getData2("SELECT * FROM `tbl_purchase` WHERE `created_date` = '$date'");

            $Total_orders = count($orders) ?? 0;
            $Total_items = $Total_orders;
            $Pending_orders = 0;
            $Orders_complete = 0;
            $Cancel_orders = 0;

            if (!empty($orders)) {
                foreach ($orders as $order) {
                    $status = trim(strtolower($order['status'] ?? ''));

                    if ($status === 'Processing') {
                        $Pending_orders++;
                    } elseif ($status === 'cancel' || $status === 'Cancelled') {
                        $Cancel_orders++;
                    } elseif ($status === 'complete' || $status === 'Completed') {
                        $Orders_complete++;
                    }
                }
            }


            require 'views/products/order-list.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $this->OrderDetails($_POST['id']);
            if (isset($_POST['time_period'])) {
                $date = date('Y-m-d');
                $timePeriod = $_POST['time_period'];

                // Default value for fromdate
                $fromdate = $date;

                if (trim(strtolower($timePeriod)) == 'today') {
                    $fromdate = date('Y-m-d');
                } elseif ($timePeriod == 'week') {
                    $fromdate = date('Y-m-d', strtotime('-7 days'));
                } elseif ($timePeriod == 'month') {
                    $fromdate = date('Y-m-d', strtotime('-30 days'));
                }

                $data = getData2("SELECT * FROM `tbl_purchase` WHERE `created_date` BETWEEN '$fromdate' AND '$date'");
                $Total_orders = count($data) ?? 0;
                $Total_items = $Total_orders;
                $Pending_orders = 0;
                $Orders_complete = 0;
                $Cancel_orders = 0;


                ob_start();
                if (!empty($data)) {


                    foreach ($data as $key => $value) :
                        $status = trim(strtolower($order['status'] ?? ''));

                        if ($status === 'Processing') {
                            $Pending_orders++;
                        } elseif ($status === 'cancel' || $status === 'Cancelled') {
                            $Cancel_orders++;
                        } elseif ($status === 'complete' || $status === 'Completed') {
                            $Orders_complete++;
                        }
                        $PurchaseItems = getData2("SELECT * FROM `tbl_purchase_item` WHERE `purchase_id` = $value[id]");
                        //  printWithPre($PurchaseItems);
                    ?>
                        <tr
                            class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 
                           hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] 
                           transition-all duration-200 ease-in-out"
                            onclick="window.location.href='/admin/customer-info/<?= $id ?>'">
                            <td class="font-semibold py-2 px-3 text-left">#<?= $value['orderid'] ?></td>
                            <td class="font-semibold py-2 px-3 text-left"><?= formatDate($value['created_date']) ?></td>
                            <td class="font-semibold py-2 px-3 text-left"><?= $value['fname'] ?> <?= $value['lname'] ?></td>
                            <td class="font-semibold py-2 px-3 text-left">₹<?= formatNumber($value['total_amount']) ?></td>
                            <td class="font-semibold py-2 px-3 text-left"><?= $value['payment_status'] == 'Pending' ? '<span class="text-[#5e421a] bg-[#ffd6a4] px-2 rounded-md text-xs py-1"> Payment' . $value['payment_status'] . '</span>' : '<span class="text-green-800 bg-[#d1e7dd] px-2 rounded-md text-xs py-1">Payment' . $value['payment_status'] . '</span>' ?></td>
                            <td class="font-semibold py-2 px-3 text-left text-nowrap"><span class="flex"><?= count($PurchaseItems) ?> Items</span></td>

                            <td class="font-semibold py-2 px-3 text-left"><?= $value['status'] ?></td>
                            <td class="font-semibold py-2 px-3 text-right"><?= $value['payment_mode'] ?></td>
                        </tr>
                    <?php endforeach;
                } else {
                    ?>
                    <tr style="">
                        <td colspan="8" class="text-center py-3 text-gray-500">No matching customers found</td>
                    </tr>
<?php
                }
                $html = ob_get_clean();
                echo json_encode([
                    'html' => $html,
                    'data' => $data,
                    'success' => true,
                    'sql' => "SELECT * FROM `tbl_purchase` WHERE `created_date` BETWEEN '$fromdate' AND '$date'",
                    'time_period' => $timePeriod,
                    'fromdate' => $fromdate,
                    'todate' => $date,
                    'total_orders' => $Total_orders,
                    'total_items' => $Total_items,
                    'pending_orders' => $Pending_orders,
                    'orders_complete' => $Orders_complete,
                    'cancel_orders' => $Cancel_orders
                ]);
            }

            exit();
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
}
