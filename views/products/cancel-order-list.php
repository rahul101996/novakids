<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-[#1a1a1a] overflow-hidden">

    <div class="flex">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');

        ?>

        <main class="flex-1 md:ml-[16.5rem] md:mt-[3.7rem] bg-[#f1f1f1] rounded-tr-3xl  h-[92vh] overflow-y-scroll">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-full flex items-center justify-between p-3">
                <span class="text-xl font-semibold text-gray-800 flex">
                    <svg class="h-6 w-6 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"></path>
                    </svg>Cancel 
                    Orders</span>
                <div>

                    <button class="bg-gray-800 text-xs font-semibold py-1 px-4 rounded-lg text-white">Export</button>
                </div>
            </div>
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

                <div class="table-responsive">
                    <table class="w-full table-auto border border-gray-300 shadow-md rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Sr no.</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Purchase
                                    <br> Date
                                </th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Product
                                </th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">User</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Email</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Mobile</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                    Delivery<br>Address</th>



                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Total</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Payment By
                                </th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Payment
                                    Status</th>
                                <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Payment
                                    Return</th>
                                <!-- <th class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach (getData2("SELECT tp.*, tu.fname, tu.lname, tu.mobile FROM tbl_purchase tp LEFT JOIN online_users tu ON tp.userid = tu.id WHERE tp.status = 'Cancel'") as $key => $value) { ?>
                                <tr class="bg-red-100">
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">1</td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <div class="w-[150px]">
                                            <?= formatDate($value['created_date']) ?> </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <div class="flex">
                                            <button type="button" class="block px-4 py-2 text-md font-bol hover:bg-gray-200 hover:text-blue-600 transition-colors duration-200 text-center" data-toggle="modal" data-target="#infoModal"
                                                data-order-id="8811757741294" onclick="getbillproduct('<?= $value['orderid'] ?>')"
                                                id="viewproduct"><i class="fa-solid fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300"><?= $value['fname'] . " " . $value['lname'] ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <?= $value['username'] ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300"><?= $value['mobile'] ?></td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <div class="w-[250px]">
                                            <?= $value['address_line1'] ?> <br>
                                            <?= $value['address_line2'] ?> <br>
                                            State : <?= $value['state'] ?><br>
                                            City : <?= $value['city'] ?> <br>
                                            Pincode : <?= $value['pincode'] ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        ₹<?= formatNumber($value['total_amount']) ?> </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <?= $value['payment_mode'] ?> </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <?= $value['payment_status'] ?> </td>
                                    <td class="px-4 py-3 text-sm text-gray-800 border border-gray-300">
                                        <div class="relative inline-block w-14 mr-2 align-middle select-none">
                                            <input type="checkbox" id="togglr_1" onchange="updateStatus(this, 0)"
                                                class="sr-only peer">

                                            <label for="togglr_1"
                                                class="block overflow-hidden h-7 rounded-full bg-gray-200 cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-gray-100 before:content-[''] before:absolute before:top-0.5 before:left-0.5 before:bg-white before:border-2 before:border-gray-300 before:h-6 before:w-6 before:rounded-full before:transition-all before:duration-300 before:shadow-md peer-checked:before:translate-x-7 peer-checked:before:border-gray-100">
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
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

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
        </main>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>

    <script>
        async function getbillproduct(orderid) {
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

        async function updateStatus(ele, id) {
            let data = {
                id,
                status: ele.checked ? "1" : "0"
            };

            ele.disabled = true;
            const label = ele.nextElementSibling;
            label.classList.add('opacity-70');

            try {
                // let res = await fetch('/api/employee/status', {
                //     method: "POST",
                //     headers: { "Content-Type": "application/json" },
                //     body: JSON.stringify(data),
                // });

                // let response = await res.json();

                // if (response.success) {
                //     toastr.success(response.message);
                // } else {
                //     ele.checked = !ele.checked; // revert state
                //     toastr.error(response.message);
                // }
            } catch (e) {
                ele.checked = !ele.checked; // revert state on error
                toastr.error("Something went wrong!");
            } finally {
                ele.disabled = false;
                label.classList.remove('opacity-70');
            }
        }
    </script>

</body>

</html>