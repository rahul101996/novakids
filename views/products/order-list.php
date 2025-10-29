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
                    </svg>
                    Orders</span>
                <div>

                    <button id="exportOrdersBtn" class="bg-gray-800 text-sm font-semibold py-1 px-4 rounded-lg text-white">
                        Export
                    </button>

                </div>
            </div>
            <div class="w-full flex items-center justify-center">
                <div class="w-[97%] grid grid-cols-6 items-center justify-start gap-1 bg-white rounded-xl border border-gray-300 shadow-sm pl-1">
                    <div class="w-full flex items-start justify-start flex-col  p-2 px-3  relative hover:bg-gray-100 ">
                        <span class="text-sm font-semibold cursor-pointer time-toggle">
                            <i class="fa-regular fa-calendar" aria-hidden="true"></i> Today
                        </span>
                        <div class="w-[150%] flex items-start flex-col bg-white p-3 rounded-xl justify-center  absolute top-[153%] gap-3 z-50 left-0 shadow-md border border-gray-300 hidden" id="Timefilter">
                            <div class="w-full flex items-center justify-start gap-3">
                                <input type="radio" name="Timeperiod" value="today" class="accent-black hover:accent-pink-500 scale-150 cursor-pointer" checked>
                                <div class="flex flex-col items-start justify-center">
                                    <span class="font-bold">Today</span>
                                    <span class="text-sm text-gray-500">compared to yesterday up to current hour</span>
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-start gap-3">
                                <input type="radio" name="Timeperiod" value="week" class="accent-black hover:accent-pink-500 scale-150 cursor-pointer">
                                <div class="flex flex-col items-start justify-center">
                                    <span class="font-bold">Last 7 days</span>
                                    <span class="text-sm text-gray-500">compared to the previous 7 days</span>
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-start gap-3">
                                <input type="radio" name="Timeperiod" value="month" class="accent-black hover:accent-pink-500 scale-150 cursor-pointer">
                                <div class="flex flex-col items-start justify-center">
                                    <span class="font-bold">Last 30 days</span>
                                    <span class="text-sm text-gray-500">compared to the previous 30 days</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex items-start justify-start flex-col  p-2 px-3 border-x border-gray-300 h-full">
                        <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                            Orders
                        </span>

                        <span class="mt-1 font-semibold" id="total-orders"><?= $Total_orders ?> --</span>
                    </div>
                    <div class="w-full flex items-start justify-center flex-col  p-2 px-3 border-r border-gray-300 h-full">
                        <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                            Items Ordered
                        </span>

                        <span class="mt-1 font-semibold" id="total-items"><?= $Total_items ?> --</span>
                    </div>
                    <div class="w-full flex items-start justify-start flex-col  p-2 px-3 border-r border-gray-300 h-full">
                        <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                            Pending Orders
                        </span>

                        <span class="mt-1 font-semibold " id="pending-orders"><?= $Pending_orders ?> --</span>
                    </div>
                    <div class="w-full flex items-start justify-start flex-col  p-2 px-3 border-r border-gray-300 h-full">
                        <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                            Orders Complete
                        </span>

                        <span class="mt-1 font-semibold" id="complete-orders"><?= $Orders_complete ?> --</span>
                    </div>
                    <div class="w-full flex items-start justify-start flex-col  p-2 px-3 border-r border-gray-300 h-full">
                        <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                            Cancel Orders
                        </span>

                        <span class="mt-1 font-semibold" id="cancel-orders"><?= $Cancel_orders ?> --</span>
                    </div>
                </div>
            </div>
            <div class="w-full flex items-center justify-center pb-4 mt-4">
                <div class="w-[97%] flex items-start justify-center gap-3 flex-col bg-white rounded-2xl overflow-y-auto">
                    <div class="w-full flex items-center justify-between mt-2 px-2">
                        <div class="relative w-[45vw]">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#626262">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" placeholder="Search Customers" class="bg-white w-full pl-10 pr-4 py-1 rounded-xl  focus:border-gray-200 focus:bg-gray-100 placeholder:text-[#626262] outline-none transition">

                        </div>

                    </div>
                    <table class="w-full text-xs">
                        <!-- Table Header -->
                        <thead class="sticky top-0 left-0 shadow-sm z-10">
                            <tr class="bg-[#f7f7f7] text-[#616161] border-y border-gray-200">
                                <?php
                                $headers = ['Order', 'Date', 'Customer', 'total', 'Payment status', 'Items', 'Delivery status', 'Delivery Method'];
                                foreach ($headers as $header): ?>
                                    <th class="font-semibold py-2 px-3 w-[20%] <?= ($header == 'Amount spent' ? 'text-right' : 'text-left') ?> text-nowrap">
                                        <?= $header ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody id="TableBody">
                            <?php
                            if (!empty($orders)) {
                                foreach ($orders as $key => $value):
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
                                echo '<tr style=""><td colspan="8" class="text-center py-3 text-gray-500">No matching customers found</td></tr>';
                            } ?>
                        </tbody>

                        <!-- Table Footer (Pagination) -->
                        <tfoot class="sticky bg-[#f7f7f7] bottom-0 left-0 border-t border-gray-200 shadow-sm z-10">
                            <tr>
                                <td colspan="8" class="py-3 px-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Showing 1–10 of 50 customers</span>
                                        <div class="flex items-center gap-1">
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-100 transition">Prev</button>
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg bg-gray-100 font-medium">1</button>
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-100 transition">2</button>
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-100 transition">Next</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>



                </div>
            </div>

        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>
        const totalOrders = document.getElementById("total-orders");
        const itemsOrdered = document.getElementById("total-items");
        const pendingOrders = document.getElementById("pending-orders");
        const completedOrders = document.getElementById("complete-orders");
        const canceledOrders = document.getElementById("cancel-orders");

        function search() {
            const searchInput = document.querySelector('input[placeholder="Search Customers"]');
            const tableBody = document.querySelector("tbody");
            const tableRows = tableBody.querySelectorAll("tr");
            console.log(tableRows);
            // Create "no results" row
            const noResultRow = document.createElement("tr");
            noResultRow.innerHTML = `<td colspan="5" class="text-center py-3 text-gray-500">No matching customers found</td>`;
            noResultRow.style.display = "none";
            tableBody.appendChild(noResultRow);

            searchInput.addEventListener("keyup", function() {
                const searchTerm = this.value.toLowerCase().trim();
                let matchCount = 0;

                tableRows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    const isMatch = rowText.includes(searchTerm);
                    row.style.display = isMatch ? "" : "none";
                    if (isMatch) matchCount++;
                });

                // Show/hide "no results"
                noResultRow.style.display = matchCount === 0 ? "" : "none";
            });
        }
        search();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.querySelector('.time-toggle'); // span trigger
            const timeFilter = document.getElementById('Timefilter');

            toggleBtn.addEventListener('click', function(event) {
                event.stopPropagation(); // stop click from bubbling up
                timeFilter.classList.toggle('hidden');
            });

            // Close when clicking outside
            document.addEventListener('click', function(event) {
                if (!timeFilter.contains(event.target) && !toggleBtn.contains(event.target)) {
                    timeFilter.classList.add('hidden');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {


            document.querySelectorAll('input[name="Timeperiod"]').forEach(element => {
                element.addEventListener('click', async function() {
                    // console.log(this.value);
                    let time_period = this.value;
                    const request = await axios.post("", new URLSearchParams({
                        time_period: time_period
                    }));
                    console.log(request.data)
                    if (request.data.success) {
                        totalOrders.innerHTML = request.data.total_orders + ' ' + '--';
                        itemsOrdered.innerHTML = request.data.total_items + ' ' + '--';
                        pendingOrders.innerHTML = request.data.pending_orders + ' ' + '--';
                        completedOrders.innerHTML = request.data.orders_complete + ' ' + '--';
                        canceledOrders.innerHTML = request.data.cancel_orders + ' ' + '--';
                        document.getElementById('TableBody').innerHTML = '';
                        document.getElementById('TableBody').innerHTML = request.data.html;
                        search();

                    }
                    // getbillproduct(this.value);
                })
            })
        })
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
        document.getElementById("exportOrdersBtn").addEventListener("click", async () => {
            try {
                const response = await axios({
                    url: "/admin/export-orders",
                    method: "POST",
                    responseType: "blob",
                });

                // Create Blob URL for download
                const blob = new Blob([response.data], {
                    type: "text/csv"
                });
                const url = window.URL.createObjectURL(blob);

                const link = document.createElement("a");
                link.href = url;
                link.download = "orders.csv";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                window.URL.revokeObjectURL(url);
            } catch (error) {
                console.error("Export failed:", error);
                toastr.error("Something went wrong while exporting orders.");
            }
        });
    </script>

</body>

</html>