<?php

class CustomerController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function CustomersOrders($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Products List";
        $pageModule = "Products List";

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $PurchaseData = getData2("SELECT * FROM `tbl_purchase` WHERE `userid` = $id ORDER BY `id` DESC ");
            require 'views/customers/customer-orders.php';
        }
    }
    public function CustomersList($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Products List";
        $pageModule = "Products List";


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $customers = getData("online_users", true);
            require 'views/customers/customers-list.php';
        }
    }
    public function CustomersInfo($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Customers Info";
        $pageModule = "Customers Info";
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // $products = getData("tbl_products");
            $UserData = getData2("SELECT * FROM online_users WHERE id = " . $id . "")[0];
            // printWithPre($UserData);
            $PurchaseData = getData2("SELECT * FROM `tbl_purchase` WHERE `userid` = $id ORDER BY `id` DESC ");
            // printWithPre($PurchaseData);


            $totalPurchase = array_sum(array_column($PurchaseData, 'total_amount'));
            $totalOrders = count($PurchaseData);
            // $totalActiveTime  = 
            $created_date = $UserData["created_at"];
            $today = date("Y-m-d"); // current date

            $date1 = new DateTime($created_date);
            $date2 = new DateTime($today);

            $diff = $date1->diff($date2);

            $parts = [];
            if ($diff->m > 0) {
                $parts[] = $diff->m . " Month" . ($diff->m > 1 ? "s" : "");
            }
            if ($diff->d > 0) {
                $parts[] = $diff->d . " Day" . ($diff->d > 1 ? "s" : "");
            }

            if (!empty($PurchaseData)) {
                $LastOrder = $PurchaseData[0];
                $LastOrderid = $LastOrder["id"];
                $products = getData2("SELECT tbl_purchase_item.*, tbl_products.name as product_name, tbl_variants.images as variant_images, tbl_variants.options as variant_options, tbl_variants.price as variant_price FROM `tbl_purchase_item` LEFT JOIN tbl_products ON tbl_purchase_item.product = tbl_products.id LEFT JOIN tbl_variants ON tbl_purchase_item.varient = tbl_variants.id WHERE tbl_purchase_item.purchase_id = $LastOrderid ORDER BY tbl_purchase_item.id DESC");
            }

            // printWithPre($LastOrder);



            $add = getData2("SELECT * FROM `tbl_user_address` WHERE `userid` = $id AND `status` = 1 ORDER BY `id` DESC ");
            $defaultAddress = [];
            if (!empty($add)) {
                $defaultAddress = $add[0];
            }
            $TimelineData = getData2("SELECT id, created_date, orderid, created_time, 'tbl_purchase' AS source
                                            FROM tbl_purchase 
                                            WHERE userid = $id

                                            UNION ALL

                                            SELECT id, created_date, NULL AS orderid, created_time, 'online_users' AS source
                                            FROM online_users 
                                            WHERE id = $id

                                            ORDER BY created_date DESC;

                                        ");
            $grouped = [];
            foreach ($TimelineData as $row) {
                $grouped[$row['created_date']][] = $row;
            }

            // If you want a clean indexed array
            $TimelineData = array_values($grouped);
            // printWithPre($TimelineData);

            // die();
            require 'views/customers/customer-info.php';
        }
    }


    public function CustomerReviews()
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Customer Reviews";
        $pageModule = "Customer Reviews";
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/customers/customer-reviews.php';
        }
    }

    public function CustomerReviewsStatus()
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
                "tbl_product_review"
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
