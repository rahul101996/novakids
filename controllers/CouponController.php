<?php

class CouponController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function AddCoupons($id = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Add Coupon";
        $pageModule = "Add Coupon";


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($id != null) {
                $coupon = getData2("SELECT * FROM `tbl_coupons` WHERE `id` = $id ORDER BY `id` ASC LIMIT 1")[0];
            }
            require 'views/master/add-coupon.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST['add'])) {
                if (!empty($_POST['coupon_name']) && !empty($_POST['coupon_secret']) && !empty($_POST['discount'])) {

                    $coupon_name = $_POST['coupon_name'];
                    $coupon_secret = $_POST['coupon_secret'];
                    $discount = $_POST['discount'];

                    $this->insertCoupons($coupon_name, $coupon_secret, $discount);

                    header("Location: /admin/add-coupon");
                    exit();
                } else {
                    $_SESSION['err'] = "All fields are required";
                }
            } elseif (isset($_POST['update'])) {
                if (!empty($_POST['coupon_name']) && !empty($_POST['coupon_secret']) && !empty($_POST['discount'])) {
                    $this->updateCoupons($_GET['id'], $_POST['coupon_name'], $_POST['coupon_secret'], $_POST['discount']);
                    header("Location: /admin/add-coupon");
                    exit();
                }
            }
        }
    }
    public function CouponList($id = null) {

        $siteName = getDBObject()->getSiteName();
        $pageTitle = "Coupons List";
        $pageModule = "Coupons List";
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $coupons = getData("tbl_coupons");
            require 'views/master/coupons-list.php';
        }
    }
    public function DeleteCoupon($id) {
        
        $sql = "DELETE FROM tbl_coupons WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        header("Location: /admin/coupons-list");
        exit();
    }
    public function insertCoupons($coupon_name, $coupon_secret, $discount)
    {
        try {

            $sql = "INSERT INTO tbl_coupons (coupon_name, coupon_secret, discount) VALUES (:coupon_name, :coupon_secret, :discount)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":coupon_name", $coupon_name);
            $stmt->bindValue(":coupon_secret", $coupon_secret);
            $stmt->bindValue(":discount", $discount);
            $stmt->execute();

            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function updateCoupons($id, $coupon_name, $coupon_secret, $discount)
    {
        try {
            $sql = "UPDATE tbl_coupons SET coupon_name = :coupon_name, coupon_secret = :coupon_secret, discount = :discount WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            $stmt->bindValue(':coupon_name', $coupon_name);
            $stmt->bindValue(':coupon_secret', $coupon_secret);
            $stmt->bindValue(':discount', $discount);
            $stmt->bindValue(':id', $id);

            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // public function CustomersInfo($id = null)
    // {
    //     $siteName = getDBObject()->getSiteName();
    //     $pageTitle = "Products List";
    //     $pageModule = "Products List";
    //     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //         // $products = getData("tbl_products");
    //         require 'views/customers/customer-info.php';
    //     }
    // }
}
