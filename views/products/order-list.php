<?php


// if (isset($_POST['order_status'])) {

    // if ($_POST['order_status'] === 'Shipped') {

    //     // printWithPre($_POST);
    //     // die();

    //     $token = $PurchaseController->validshiprockettoken();
    //     // echo $token;
    //     // die();
    //     $placeordershiprocket = $PurchaseController->placeordershiprocket($token, $_POST['orderid']);
    //     // printWithPre($placeordershiprocket);
    //     // die();
    //     $placeordershiprocket = (array)$placeordershiprocket;
    //     if (!empty($placeordershiprocket['order_id']) && !empty($placeordershiprocket['shipment_id'])) {
    //         // echo "hii";
    //         // die();
    //         $orderplacedshiprocket = $PurchaseController->orderplacedshiprocket($placeordershiprocket['order_id'], $placeordershiprocket['channel_order_id'], $placeordershiprocket['shipment_id'], $_POST['order_status']);
    //         if ($orderplacedshiprocket) {
    //             $_SESSION["success"] = "Order Shipped to ShipRocket";
    //             header("Location: user-order.php");
    //             exit();
    //         } else {
    //             $_SESSION["err"] = "Order Not Shipped";
    //             header("Location: user-order.php");
    //             exit();
    //         }
    //     } else {
    //         // $placeordershiprocket;
    //         $_SESSION["err"] = $placeordershiprocket['message'];
    //         header("Location: user-order.php");
    //         exit();
    //     }

    //     // echo $orderplacedshiprocket;
    //     // echo $orerplacedshiprocket;
    //     // die();

    // }

    // if ($_POST['order_status'] === 'Cancelled') {
    //     // printWithPre($_POST);
    //     // die();

    //     $token = $PurchaseController->validshiprockettoken();
    //     // echo $token;
    //     // die();
    //     $ordercancel = $PurchaseController->ordercancel($token, $_POST['shipment_order_id']);
    //     // printWithPre($ordercancel);
    //     // die();
    //     if ($ordercancel['status_code'] == '200') {
    //         $ordercancelupdate = $PurchaseController->ordercancelupdate($_POST['orderid'], $_POST['purchase_id'], $_POST['order_status']);
    //         if ($ordercancelupdate) {
    //             $_SESSION["success"] = $ordercancel['message'];
    //             header("Location: user-order.php");
    //             exit();
    //         } else {
    //             $_SESSION["err"] = "Order Not Update";
    //             header("Location: user-order.php");
    //             exit();
    //         }
    //     } else {
    //         $_SESSION["err"] = $ordercancel['message'];
    //         header("Location: user-order.php");
    //         exit();
    //     }
    // }
    
    // if ($_POST['order_status'] === 'Complete') {
    //     // printWithPre($_POST);
    //     // die();
        
    //     $orderCompleteupdate = $PurchaseController->orderCompleteupdate($_POST['orderid'], $_POST['purchase_id'], $_POST['order_status']);
    //     if ($orderCompleteupdate) {
    //         $_SESSION["success"] = "Status Updated";
    //         header("Location: user-order.php");
    //         exit();
    //     } else {
    //         $_SESSION["err"] = "Order Not Update";
    //         header("Location: user-order.php");
    //         exit();
    //     }
    // }

// }

?>


<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-gray-100">

    <div class="flex h-screen ">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');


        ?>

        <main class="flex-1 md:ml-60">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>

            <div class="p-6">

                <div class="w-full flex items-center justify-between mb-4">
                    <span class="text-xl font-semibold text-gray-800"><?= $pageTitle ?></span>
                    <!-- <a href="/admin/add-product"
                    class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add Product</a> -->
                </div>
                <!-- <div class="p-3 border-b border-gray-200">
                <div class="flex justify-between items-center">

                    <div class="flex items-center space-x-1">
                        <button
                            class="bg-gray-200 text-gray-800 px-3 py-1.5 rounded-md text-sm font-medium">All</button>

                    </div>
                    <div class="flex items-center space-x-1">
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h18M3 12h18M3 16h18"
                                    stroke-opacity="0.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h12M3 12h6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div> -->

                <div class="p-3 overflow-x-auto" id="bottom-scroll">
                    <table class="w-full table-auto border border-gray-300 shadow-md rounded-lg">

                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Sr no.</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Order Id</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Purchase Date</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Email</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Mobile</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Delivery Address</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Delivery<br>Charges</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Payment By</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Payment Status</th>
                                <!-- <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Shipment Detail</th> -->
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Status</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Order Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach (getData2("Select * FROM `tbl_purchase` ORDER BY id desc") as $key => $value) { ?>
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <div class="flex">
                                            <?= $key + 1 ?> <a
                                                class="block px-4 py-2 text-md font-bol hover:bg-gray-200 hover:text-blue-600 transition-colors duration-200 text-center"
                                                href="?orderid=<?= $value['id'] ?>" data-toggle="modal"
                                                data-target="#infoModal" data-order-id="<?= $value['orderid'] ?>"
                                                onclick="getbillproduct('<?= $value['orderid'] ?>')" id="viewproduct"><i
                                                    class="fa-solid fa-eye"></i>
                                            </a>
                                            <!-- <span onclick="printMeYo('<?= $value['orderid'] ?>')"><i class="fa-solid fa-print"></i></span> -->
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300"><?= $value['orderid'] ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300 text-nowrap"><?= formatDate($value['created_date']) ?></td>
                                    <!-- <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">Bhavna  Sodi</td> -->
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300"><?= $value['email'] ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300"><?= $value['mobile'] ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <div class="w-[250px]">
                                            <?= $value['address_line1'] ?> <br>
                                            State : <?= $value['state'] ?><br>
                                            City : <?= $value['city'] ?><br>
                                            Pincode : <?= $value['pincode'] ?>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <?= !empty($value['delivery_charges']) ? $value['delivery_charges'] : 0 ?> </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <?= $value['payment_mode'] ?>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <?= $value['payment_status'] ?><br>
                                        Payment ID: <?= $value['razorpay_payment_id'] ?>
                                    </td>
                                    <!-- <td hidden="">
                                        Coupon Discount: <br>
                                        Total Amount:309 </td>
                                    <td class="hidden">
                                        <span class="w-40 flex">Order ID: </span>
                                        <span class="w-40 flex">Shipment ID: </span>
                                        <span class="w-40 flex">Courier: </span>
                                        <span class="w-40 flex">Expected Date: </span>
                                    </td> -->
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <span class="text-green-600">
                                            <?= $value['status'] ?> </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300 ">
                                        <form action="" method="post" class="flex items-center justify-center gap-2">
                                            <select name="order_status" id="" class="form-control !w-[150px]">
                                                <!-- <option value="Pending" class="text-md">Pending</option> -->
                                                <option value="Processing" selected="" class="text-md"
                                                    <?= $value['status'] == 'Processing' ?>>Processing</option>
                                                <option value="Shipped" class="text-md" <?= $value['status'] == 'Shipped' ?>>
                                                    Shipped</option>
                                                <option value="Cancelled" class="text-md" <?= $value['status'] == 'Cancelled' ?>>
                                                    Cancelled</option>
                                                <option value="Complete" class="text-md" <?= $value['status'] == 'Complete' ?>>
                                                    Complete</option>
                                            </select>
                                            <input type="hidden" name="purchase_id" value="50">
                                            <input type="hidden" name="orderid" value="5431758386371">
                                            <input type="hidden" name="shipment_order_id" value="">
                                            <input type="hidden" name="shipment_id" value="">
                                            <button type="button" class="btn btn-primary ">Submit</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- Modal HTML -->
                    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="infoModalLabel">Product Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="infoModalOrderBody">
                                    <div class="w-full p-[10px] flex flex-col justify-start" id="productDetailDiv">

                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sr No.</th>
                                                    <th>Image</th>
                                                    <th>Product</th>
                                                    <th>Variant</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="productTable">
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" class="text-right">Sub Total:</td>
                                                    <td id="sub_total"></td>
                                                </tr>
                                                <tr id="discountRow" hidden="">
                                                    <td colspan="6" class="text-right">Discount:<span
                                                            id="coupon_secret"></span></td>
                                                    <td id="discount"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="text-right">Delivery Charge:</td>
                                                    <td id="delivery"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="text-right text-bold">Total:</td>
                                                    <td id="total" class="text-bold"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-primary" onclick="printMeYo()">Print</button> -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>

    <script>
        async function getbillproduct(orderid) {

            console.log(orderid);
            try {
                const result = await fetch("/admin/get-order-details/" + orderid);
                const data = await result.json(); // read raw response

                // console.log(data);

                let html = "";
                let count = 0;
                let subtotal = 0;
                let delivery = data.data[0].delivery_charge || 0;
                if (data.success) {
                    // console.log(data.data);

                    data.data[0].items.forEach(product => {

                        let images = JSON.parse(product.images || "[]");
                        images = images[0];

                        // console.log(images);

                        let size = JSON.parse(product.size || "[]");
                        size = size["Size"] || "";

                        html += `<tr>
                                    <td>${++count}</td>
                                    <td>
                                        <img src="/${images}" alt="" class="w-[50px] h-[50px]"></td>
                                    <td>${product.name}</td>
                                    <td>${size}</td>
                                    <td>${product.quantity}</td>
                                    <td>${product.price}</td>
                                    <td>${product.total_amount}</td>
                                </tr>`;

                        subtotal += parseFloat(product.total_amount);
                    });

                    document.getElementById("productTable").innerHTML = html;
                    document.getElementById("sub_total").innerHTML = subtotal;
                    // document.getElementById("discount").innerHTML = data.data.discount;
                    document.getElementById("delivery").innerHTML = delivery;
                    document.getElementById("total").innerHTML = parseFloat(delivery) + parseFloat(subtotal);

                } else {
                    alert(data.message);
                }
            } catch (e) {
                console.error("Error:", e);
            }
        }

      
    </script>

</body>

</html>