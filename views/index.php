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

        <main class="flex-1 md:ml-[16.5rem] md:mt-[3.7rem] bg-[#f1f1f1] rounded-tr-3xl py-7 h-[95vh] overflow-y-scroll">

            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-full flex items-center justify-center px-4">
                <div class="w-[73%] flex items-start justify-start text-[#4a4a4a] gap-3">
                    <div class="px-2 py-1 rounded-lg flex items-center justify-center bg-white text-sm font-semibold gap-2 border border-gray-500 border-b border-gray-700">
                        <i class="fa-regular fa-calendar"></i>
                        <span>Last 30 days</span>
                    </div>
                    <div class="px-2 py-1 rounded-lg flex items-center justify-center bg-white text-sm font-semibold gap-2 border border-gray-500 border-b border-gray-700">
                        <span>All Channels</span>
                    </div>

                </div>
            </div>
            <div class="w-full flex items-center justify-center p-4">
                <div class="w-[73%] flex items-start justify-start bg-white flex-col rounded-2xl border border-gray-200 p-2">
                    <div class="w-[100%] grid grid-cols-4 items-center justify-start gap-1">
                        <div class="w-full flex items-start justify-start flex-col bg-gray-100 p-2 px-3 rounded-xl">
                            <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                                Total Orders
                            </span>

                            <span class="mt-1 font-semibold"><?= $Total_Orders ?> --</span>
                        </div>
                        <div class="w-full flex items-start justify-start flex-col  p-2 px-3 rounded-xl">
                            <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                                Total Sales
                            </span>

                            <span class="mt-1 font-semibold">₹<?= formatNumber($Total_sales) ?> --</span>
                        </div>
                        <div class="w-full flex items-start justify-start flex-col  p-2 px-3 rounded-xl">
                            <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                                Todays Orders
                            </span>

                            <span class="mt-1 font-semibold"><?= $totalTodayOrders ?> --</span>
                        </div>
                        <div class="w-full flex items-start justify-start flex-col  p-2 px-3 rounded-xl">
                            <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                                Conversation rate
                            </span>

                            <span class="mt-1 font-semibold">0% --</span>
                        </div>
                    </div>
                    <canvas id="comparisonChart" class="!w-[100%] !h-[200px] mt-4"></canvas>
                </div>
            </div>

            <div class="w-full flex items-center justify-center pb-4">
                <div class="w-[70%] flex items-start justify-center gap-3 flex-col bg-white py-3 rounded-2xl">
                    <div class="w-full flex items-center justify-between">
                    <span class="flex items-center px-2 font-semibold">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"></path>
                        </svg>
                        Last 5 Orders
                    </span>
                    <a href="/admin/orders" class="bg-[#1a1a1a] mx-2 text-white text-sm px-3 py-1 rounded-lg text-decoration-none cursor-pointer font-semibold">View all</a>
                    </div>
                    <table class="w-full border border-gray-200">
                        <tr class="bg-[#f7f7f7] text-[#616161] border-y border-gray-200">
                            <th class="font-semibold py-2 px-3">Order</th>
                            <th class="font-semibold py-2 px-3">Date</th>
                            <th class="font-semibold py-2 px-3">Customer</th>
                            <th class="font-semibold py-2 px-3">Total</th>
                            <th class="font-semibold py-2 px-3">Delivery method</th>
                        </tr>
                        <?php
                        // printWithPre($Orders);
                        foreach ($Orders as $key => $order) {
                            if ($key > 4) break;
                        ?>
                            <tr class="bg-white text-black  border-b border-gray-200 group">
                                <td class="font-semibold text-sm py-2 px-3 group-hover:bg-[#f7f7f7]">#<?= $order['orderid'] ?></td>
                                <td class="font-normal text-sm py-2 px-3 text-[#303030] group-hover:bg-[#f7f7f7]"><?= formatDateTime($order['created_at']) ?></td>
                                <td class="font-normal text-sm py-2 px-3 text-[#303030] group-hover:bg-[#f7f7f7]"><?= $order['fname'] ?> <?= $order['lname'] ?></td>
                                <td class="font-semibold text-sm py-2 px-3 text-[#303030] group-hover:bg-[#f7f7f7]">₹<?= formatNumber($order['total_amount']) ?></td>
                                <td class="font-normal text-sm py-2 px-3 text-[#303030] group-hover:bg-[#f7f7f7]"><?= $order['payment_mode'] ?></td>
                            </tr>
                        <?php } ?>

                    </table>


                </div>
            </div>
        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>
        const ctx = document.getElementById("comparisonChart");

        const labels = [
            "Sep 16", "Sep 20", "Sep 24", "Sep 28",
            "Oct 2", "Oct 6", "Oct 10", "Oct 14"
        ];

        const data = {
            labels: labels,
            datasets: [{
                    label: "Sep 16–Oct 16, 2025",
                    data: [2, 4, 5, 6, 9, 7, 5, 3],
                    borderColor: "#0096F2",
                    backgroundColor: "#0096F2",
                    borderWidth: 2.5,
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    tension: 0.35,
                    fill: false,
                },
                {
                    label: "Aug 16–Sep 15, 2025",
                    data: [3, 8, 11, 7, 10, 8, 6, 4],
                    borderColor: "rgba(0,150,242,0.4)",
                    backgroundColor: "rgba(0,150,242,0.4)",
                    borderWidth: 2,
                    borderDash: [6, 4],
                    pointRadius: 3,
                    pointHoverRadius: 5,
                    tension: 0.35,
                    fill: false,
                },
            ],
        };

        const config = {
            type: "line",
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            usePointStyle: true,
                            pointStyle: "circle",
                            boxWidth: 6, // smaller legend circle
                            boxHeight: 6,
                            padding: 20, // adds space between items
                            font: {
                                size: 13,
                            },
                            color: "#9ca3af",
                        },
                    },
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            color: "#9ca3af",
                            font: {
                                size: 12
                            }
                        },
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: "#f3f4f6",
                            drawBorder: false
                        },
                        ticks: {
                            color: "#9ca3af",
                            font: {
                                size: 12
                            },
                            stepSize: 5
                        },
                    },
                },
            },
        };

        new Chart(ctx, config);
    </script>
</body>

</html>