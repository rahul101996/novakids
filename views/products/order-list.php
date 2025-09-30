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
            <div class="w-full flex items-center justify-between p-3">
                <span class="text-xl font-semibold text-gray-800">Products</span>
                <a href="/admin/add-product"
                    class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add Product</a>
            </div>
            <div class="p-3 border-b border-gray-200">
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
            </div>

            <div class="table-responsive sticky-scrollbar p-6" id="bottom-scroll">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Sr no.</th>
                            <th>Order Id</th>
                            <th>Purchase<br>Date</th>
                            <!-- <th>Product</th> -->
                            <!-- <th>User</th> -->
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Delivery Address</th>
                            <!-- <th>Quantity</th> -->
                            <!-- <th>Price</th> -->
                            <th>Delivery<br>Charges</th>
                            <th>Payment By</th>
                            <th>Payment Status</th>
                            <!-- <th>Total</th> -->
                            <!-- <th>Discount</th> -->
                            <th class="hidden">Shipment Detail</th>
                            <th>Status</th>
                            <th>Order Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach (getData2("Select * FROM `tbl_purchase` ORDER BY id desc") as $key => $value) { ?>
                            <tr>
                                <td>
                                    <div class="flex">
                                        <?= $key + 1 ?> <a
                                            class="block px-4 py-2 text-md font-bol hover:bg-gray-200 hover:text-blue-600 transition-colors duration-200 text-center"
                                            href="?orderid=<?= $value['id'] ?>" data-toggle="modal" data-target="#infoModal"
                                            data-order-id="<?= $value['orderid'] ?>" onclick="getbillproduct('50')" id="viewproduct"><i
                                                class="fa-solid fa-eye"></i>
                                        </a>
                                        <span onclick="printMeYo('50')"><i class="fa-solid fa-print"></i></span>
                                    </div>
                                </td>
                                <td><?= $value['orderid'] ?></td>
                                <td><?= formatDate($value['created_date']) ?></td>
                                <!-- <td>Bhavna  Sodi</td> -->
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['mobile'] ?></td>
                                <td>
                                    <div class="w-[250px]">
                                        <?= $value['address_line1'] ?> <br>
                                        State : <?= $value['state'] ?><br>
                                        City : <?= $value['city'] ?><br>
                                        Pincode : <?= $value['pincode'] ?> </div>
                                </td>

                                <td>
                                    0 </td>
                                <td>
                                    <?= $value['payment_mode'] ?> </td>
                                <td style="white-space: nowrap">
                                    <?= $value['payment_status'] ?><br>
                                    Payment ID: <?= $value['razorpay_payment_id'] ?> </td>
                                <td hidden="">
                                    Coupon Discount: <br>
                                    Total Amount:309 </td>
                                <td class="hidden">
                                    <span class="w-40 flex">Order ID: </span>
                                    <span class="w-40 flex">Shipment ID: </span>
                                    <span class="w-40 flex">Courier: </span>
                                    <span class="w-40 flex">Expected Date: </span>
                                </td>
                                <td>
                                    <span class="text-green-600">
                                        <?= $value['status'] ?> </span>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <select name="order_status" id="" class="form-control w-52">
                                            <!-- <option value="Pending" class="text-md">Pending</option> -->
                                            <option value="Processing" selected="" class="text-md" <?= $value['status']  == 'Processing' ?>>Processing</option>
                                            <option value="Shipped" class="text-md" <?= $value['status']  == 'Shipped' ?>>Shipped</option>
                                            <option value="Cancelled" class="text-md" <?= $value['status']  == 'Cancelled' ?>>Cancelled</option>
                                            <option value="Complete" class="text-md" <?= $value['status']  == 'Complete' ?>>Complete</option>
                                        </select>
                                        <input type="hidden" name="purchase_id" value="50">
                                        <input type="hidden" name="orderid" value="5431758386371">
                                        <input type="hidden" name="shipment_order_id" value="">
                                        <input type="hidden" name="shipment_id" value="">
                                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
                                                <!-- <th>Discount</th> -->
                                                <th>Total</th>
                                                <!-- Add more columns as needed -->
                                            </tr>
                                        </thead>
                                        <tbody id="productTable">
                                            <!-- Data will be populated here via AJAX -->
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
                                <button type="button" class="btn btn-primary" onclick="printMeYo()">Print</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
</body>

</html>