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
                                            data-order-id="<?= $value['orderid'] ?>" onclick="getbillproduct('50')"
                                            id="viewproduct"><i class="fa-solid fa-eye"></i>
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
                                        Pincode : <?= $value['pincode'] ?>
                                    </div>
                                </td>

                                <td>
                                    0 </td>
                                <td>
                                    <?= $value['payment_mode'] ?>
                                </td>
                                <td style="white-space: nowrap">
                                    <?= $value['payment_status'] ?><br>
                                    Payment ID: <?= $value['razorpay_payment_id'] ?>
                                </td>
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

    <script>
        async function getbillproduct(orderid) {
            // cdata = JSON.parse(cdata)
            console.log(orderid);
            const result = await axios.post('', new URLSearchParams({
                order_id: orderid,
            }));
            console.log("result_data", result.data)
            let tr = ``;
            let count = 1;
            let t = 0;
            result.data[0].forEach((ele, i) => {
                // console.log(ele);
                total_amount = parseInt(ele["amount"]) * parseInt(ele["quantity"]);
                t = t + parseInt(total_amount)
                tr += ` <tr>
                            <td class="px-4 py-2 border">${count++}</td>
                            <td class="px-4 py-2 border">
                                <div class="w-[125px] overflow-hidden">
                                    <img src="/admin/${ele['varient_images'][0]}" class="w-full h-full object-cover" alt="">
                                </div>
                            </td>
                            <td class="px-4 py-2 border">${ele['product']}</td>
                            <td class="px-4 py-2 border">
                                <div class="text-center mt-3">
                                    <span style="font-weight: bold;">Weight: ${ele['size']}</span>
                                   
                                </div>
                            </td>
                            <td class="px-4 py-2 border">${ele['quantity']}</td>
                            <td class="px-4 py-2 border">₹${ele['amount']}</td>
                            <td class="px-4 py-2 border">₹${total_amount}</td>
                        </tr>`;

                if (ele.coupon_secret != '') {
                    document.getElementById("coupon_secret").innerHTML = '(' + ele.coupon_secret + ')';
                    document.getElementById("discount").innerHTML = '- ' + ele.coupon_discount;
                    document.getElementById("discountRow").hidden = false;
                } else {
                    document.getElementById("discountRow").hidden = true;
                }

                document.getElementById("total").innerHTML = ele.total_amount;
                // let subtotal = ele.total_amount += ele.total_amount
            })
            if (result.data[2].length > 0) {

                tr += ` <tr>
                            <td colspan="7" class="bg-[#4c2e90]" class="text-white text-lg font-semibold w-full text-center items-center">
                            <div class="w-full flex items-center justify-center">
                            
                            <p class="text-white w-full text-center" style="text-align: center">Sample Products 🎁</p>
                            </div>
                            </td>
                        </tr>`;
                result.data[2].forEach((ele, i) => {
                    console.log(ele);
                    total_amount = parseInt(ele["selling_price"]) * parseInt(ele["sample_quantity"]);

                    tr += ` <tr>
                            <td class="px-4 py-2 border">${count++}</td>
                            <td class="px-4 py-2 border">
                                <div class="h-40 w-[125px] overflow-hidden">
                                    <img src="/admin/${ele['varient_images'][0]}" class="w-full h-full object-cover" alt="">
                                </div>
                            </td>
                            <td class="px-4 py-2 border">${ele['product']}
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="">
                                    <span style="font-weight: bold;">Weight: ${ele['size']}</span>
                                    
                                </div>
                            </td>
                            <td class="px-4 py-2 border">${ele['sample_quantity']}</td>
                            <td class="px-4 py-2 border"><div class="flex gap-2 bg-green-200 rounded-md px-3 py-1">
                                    <h3 class="text-sm font-semibold  text-nowrap flex gap-3"> <span class=" text-[10px] line-through text-green-400">₹ ${ele['selling_price']}</span><span class="text-green-600 text-xs">FREE</span></h3>
                                </div></td>
                            <td class="px-4 py-2 border">
                            <div class="flex gap-2 bg-green-200 rounded-md px-3 py-1">
                                    <h3 class="text-sm font-semibold  text-nowrap flex gap-3"> <span class=" text-[10px] line-through text-green-400">₹ ${total_amount}</span><span class="text-green-600 text-xs">Saved</span></h3>
                                </div>
                            </td>
                        </tr>`;



                    // let subtotal = ele.total_amount += ele.total_amount
                })
            }

            let productDetailDiv = `
                <span style="font-weight: bold; font-size: 1.5em;">${result.data[1].fname} ${result.data[1].lname}</span>
                <br>
                <span>
                    <span style="font-weight: bold;">Address</span>: ${result.data[1].address_line1} ${result.data[1].address_line2}
                </span>
                <br>
                <span>
                    <span style="font-weight: bold;">State</span>: ${result.data[1].state_name}
                </span>
                <br>
                <span>
                    <span style="font-weight: bold;">City</span>: ${result.data[1].city}
                </span>
                <br>
                <span>
                    <span style="font-weight: bold;">Pincode</span>: ${result.data[1].pincode}
                </span>
                <br>
                <span>
                    <span style="font-weight: bold;">Mobile</span>: ${result.data[1].mobile}
                </span>

            `

            document.getElementById("sub_total").innerHTML = t;
            document.getElementById("delivery").innerText = "₹" + result.data[0][0].delivery_charges
            document.getElementById("productTable").innerHTML = tr;
            document.getElementById("productDetailDiv").innerHTML = productDetailDiv

        }
f
    </script>

</body>

</html>