<?php

$OrderDetails = getData2("SELECT tbl_purchase.*, indian_states.name AS state_name FROM tbl_purchase LEFT JOIN  indian_states ON tbl_purchase.state = indian_states.id WHERE tbl_purchase.userid = '$_SESSION[userid]' AND tbl_purchase.id = '2' ORDER BY tbl_purchase.id DESC LIMIT 1")[0];

// printWithPre($OrderDetails);

$products = getData2("SELECT tbl_purchase_item.*, tbl_products.name as product_name,
            tbl_variants.images as variant_images, tbl_variants.options as variant_options, tbl_variants.price as variant_price FROM `tbl_purchase_item` LEFT JOIN tbl_products ON tbl_purchase_item.product = tbl_products.id LEFT JOIN tbl_variants ON tbl_purchase_item.varient = tbl_variants.id WHERE tbl_purchase_item.purchase_id = '2' ORDER BY tbl_purchase_item.id DESC");

// printWithPre($products);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
</head>

<body style="font-family: Arial, sans-serif; font-size: 13px; color: #333;">

    <!-- Container -->
    <table width="600" align="center" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #ddd; background:#fff;">

        <!-- Header -->
        <tr>
            <td align="center" style="padding:15px; background:#e0eeff;">
                <!-- <img src="/public/logos/nova_favicon.png" alt="Roark" height="30"> -->
                <img src="/public/logos/nova_logo-brnd-name.png" alt="" height="30">
            </td>
        </tr>

        <!-- Title -->
        <tr>
            <td align="center" style="padding:20px; border-bottom:1px solid #eee; font-size:18px; f">
                ORDER CONFIRMATION
            </td>
        </tr>

        <!-- Order Info -->
        <tr>
            <td style="padding:20px;">
                <p><b>ORDER #<?= $OrderDetails['orderid']; ?></b> <span style="color:#f25b21; margin-left:10px;"><?= formatDate($OrderDetails['created_at']) ?></span></p>
                <p>Hi <?= $OrderDetails['fname']; ?> <?= $OrderDetails['lname']; ?>,</p>
                <p>Thank you for your purchase, this email confirms your order. We will send you another email as soon as it ships.</p>
            </td>
        </tr>

        <!-- Items -->
        <tr>
            <td style="padding:0 20px 20px;">
                <!-- Item 1 -->
                <?php
                foreach ($products as $key => $product) {
                    $images = json_decode($product['variant_images'], true);
                    $variants = json_decode($product['variant_options'], true);
                    $variants = json_decode($variants, true);

                    $images = array_reverse($images);

                ?>
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-bottom:1px solid #eee; margin-bottom:10px;">
                        <tr>
                            <td width="80" valign="top" style="padding: 10px;">
                                <img src="/<?= $images[0] ?>" alt="Shorts" width="80" style="border:1px solid #ddd;">
                            </td>
                            <td valign="top" style="padding-left:10px; font-size:13px;">
                                <p><b><?= $product['product_name'] ?></b></p>

                                <?php
                                foreach ($variants as $key => $variant) {
                                ?>
                                    <span class="!mb-0 text-sm text-gray-600" style="margin-top:20px"><?= $key ?>: <?= $variant ?></span>

                                <?php } ?>
                                <br>
                                <span class="text-sm text-gray-600 mt-3"> <?= $product['quantity'] ?> x ₹<?= formatNumber($product['amount']) ?></span>
                            </td>
                            <td valign="top" align="right" style="white-space:nowrap; font-weight:bold;">₹<?= $product['total_amount'] ?>.00</td>
                        </tr>
                    </table>
                <?php } ?>
                <!-- Item 2 -->

            </td>
        </tr>

        <!-- Summary -->
        <tr>
            <td style="padding:0px 20px 0px 20px ; font-size:13px;">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="color:gray; font-size:14px">Subtotal</td>
                        <td style="font-size:14px" align="right">₹<?= $OrderDetails['total_amount'] ?>.00</td>
                    </tr>
                    <tr >
                        <td style="color:gray; font-size:14px; padding-top:5px; padding-bottom:5px; ">Economy Shipping</td>
                        <td style="font-size:14px;" align="right">₹<?= $OrderDetails['delivery_charges'] ?>.00</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-top:1px solid #eee; padding-top:5px; font-weight:bold;">
                            <table width="100%">
                                <tr>
                                    <td>Total</td>
                                    <td align="right">₹<?= $OrderDetails['total_amount'] + $OrderDetails['delivery_charges']  ?>.00</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Payment Info -->
        <tr>
            <td style="padding:20px;">
                <p><b>Payment Info</b></p>
                <p style="color:gray; font-size:12px"><?= $OrderDetails['payment_mode'] ?> <span style="float:right;">₹<?= $OrderDetails['total_amount'] + $OrderDetails['delivery_charges'] ?>.00</span></p>
            </td>
        </tr>

        <!-- Shipping & Customer -->
        <tr>
            <td style="padding:20px;">
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr valign="top">
                        <td width="50%">
                            <p><b>Shipping Address</b></p>
                            <p style="width:90%; color:gray; font-size:12px"><?= $OrderDetails['address_line2'] ?> <?= $OrderDetails['address_line1'] ?> <br><br>
                                <?= $OrderDetails['city'] ?> -- <?= $OrderDetails['pincode'] ?><br>
                                <?= $OrderDetails['state_name'] ?>
                            </p>
                        </td>
                        <td width="50%">
                            <p><b>Customer</b></p>
                            <p style="width:90%; color:gray; font-size:12px"><?= $OrderDetails['fname'] ?> <?= $OrderDetails['lname'] ?><br>
                                <br>
                                Tel: <?= $OrderDetails['mobile'] ?><br>
                                Email: <?= $OrderDetails['email'] ?>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <!-- Button -->
        <tr>
            <td align="center" style="padding:20px;">
                <a href="#" style="background:#000; color:#fff; text-decoration:none; padding:10px 20px; font-size:13px; border-radius:3px;">VIEW ORDER STATUS</a>
            </td>
        </tr>

        <!-- Note -->
        <tr>
            <td align="center"  bgcolor="#f5f5f5" style="padding:15px; font-size:11px; color:#777;">
                If you have any questions, please contact us at <br>
                support@novauniverse.com or (855) 985-8398
            </td>
        </tr>

        <!-- Footer -->
        
    </table>

</body>

</html>