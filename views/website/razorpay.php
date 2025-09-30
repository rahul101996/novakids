<?php
// echo "<pre>";
// print_r($_POST);
$user = "";
include_once $_SERVER['DOCUMENT_ROOT'] . "/admin/config/conn.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/admin/controller/PurchaseController.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/admin/controller/CartController.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/admin/controller/CartController.php";

$cartController = new CartController($conn);
$PurchaseController = new PurchaseController($conn);

// $pageTitle = "User Orders";
// echo "<pre>";
// print_r($_POST);
// die();

if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['order_id'])) {

    
    $order_data = $PurchaseController->getOnlineOrderById($_POST['order_id']);
    // printWithPre($order_data);
    $order = json_decode($order_data['checkoutData']);
    $checkoutdata = (array)$order;
    // printWithPre($checkoutdata);
    // printWithPre($_SESSION);
    // die();

    $purchaseid = $PurchaseController->insertPurchase([
        "userid" => $_SESSION["userid"],
        "username" => $_SESSION["username"],
        "payment_mode" => $order_data['payment_mode'],
        "payment_status" => "Completed",
        "razorpay_payment_id" => $_POST['razorpay_payment_id'],
        "orderid" => $order_data["orderid"],
        "status" => "Processing",
        "total_amount" => $checkoutdata["allTotal"],
        "address_line1" => $checkoutdata["address_line1"],
        "address_line2" => $checkoutdata["address_line2"],
        "city" => $checkoutdata["city"],
        "state" => $checkoutdata["state"],
        "country" => $checkoutdata["country"],
        "pincode" => $checkoutdata["pin_code"],
        "mobile" => $checkoutdata["mobile"],
        "email" => $checkoutdata["email"],
        "fname" => $checkoutdata["fname"],
        "lname" => $checkoutdata["lname"],
        "additional" => $checkoutdata["additional"],
        "coupon_discount" => $checkoutdata["coupenDiscount"],
        "coupon_secret" => $checkoutdata["newDiscount"],
        "delivery_charges" => $checkoutdata["deliveryCharges"],
        "courier_company" => $_POST["deliveryCompany"],
        "courier_company_id" => $_POST["shippingCheckbox"],
        "expected_date" => $_POST["deliveryDate"],

    ]);

    // printWithPre($purchaseid);
    // die();

    if ($purchaseid) {
        // echo "Success";
        $cartController->deleteCartByUserId($_SESSION["userid"]);
        // printWithPre($purchaseid);
        // // echo $purchaseid[1];
        // die();
        $_SESSION["new_order"] = $purchaseid[0];
        $_SESSION["success"] = "Order Placed  Successfully ";
        // $_SESSION["thankyou"] = 'thankyou';
        header("Location: myprofile.php");
        exit();
        
    } else {
        // echo "Failed";
        // die();
        $_SESSION["err"] = "Can't Place Order";
        header("Location: checkout.php");
        exit();
    }
} else {
    // Reject this call
    // echo "not done";
    $_SESSION["err"] = "Payment Failed. Can't Place Order";
    header("Location: checkout.php");
    exit();
}

