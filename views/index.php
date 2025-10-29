<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>
<style>
    #comparisonChart {
        opacity: 0;
        transition: opacity 0.6s ease;
    }

    #comparisonChart.rendered {
        opacity: 1;
    }
</style>

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
                    <div id="dateRangeWrapper"
                        class="px-2 py-1 rounded-lg flex items-center justify-center bg-white text-sm font-semibold gap-2 border border-gray-500 border-b border-gray-700 cursor-pointer relative">
                        <i class="fa-regular fa-calendar"></i>
                        <span id="selectedRangeText">Last 30 days</span>

                        <!-- Dropdown -->
                        <div id="calendarDropdown"
                            class="hidden bg-white shadow-lg rounded-xl w-[820px] flex flex-col overflow-hidden border border-gray-200 absolute top-10 left-0 z-50">

                            <!-- Sidebar + Calendar -->
                            <div class="w-full flex">
                                <!-- Sidebar -->
                                <div class="w-[30%] border-r border-gray-200 overflow-y-auto max-h-[500px]">
                                    <span
                                        class="text-gray-700 font-semibold mb-3 bg-gray-100 flex p-2 w-full  border-b border-gray-200">Quick
                                        Ranges</span>
                                    <ul class="space-y-2 text-sm px-2" id="rangeList">
                                        <li><button class="w-full text-left hover:bg-gray-100 p-2 rounded-md"
                                                data-range="today">Today</button></li>
                                        <li><button class="w-full text-left hover:bg-gray-100 p-2 rounded-md"
                                                data-range="yesterday">Yesterday</button></li>
                                        <li class="h-[1px] w-full bg-gray-300"></li>
                                        <li><button class="w-full text-left hover:bg-gray-100 p-2 rounded-md" data-range="last7">Last 7
                                                days</button></li>
                                        <li><button
                                                class="w-full text-left bg-gray-200 font-medium p-2 rounded-md"
                                                data-range="last30">Last 30 days</button></li>
                                        <li><button class="w-full text-left hover:bg-gray-100 p-2 rounded-md" data-range="last90">Last 90
                                                days</button></li>
                                        <li><button class="w-full text-left hover:bg-gray-100 p-2 rounded-md" data-range="last365">Last 365
                                                days</button></li>
                                    </ul>
                                </div>

                                <!-- Calendar + Inputs -->
                                <div class="w-[70%] flex flex-col justify-start">
                                    <span
                                        class="text-gray-700 font-semibold mb-3 bg-gray-100 flex p-2 w-full  border-b border-gray-200"><span
                                            class="flex-1">Custom Range</span></span>

                                    <!-- Inputs -->
                                    <div class="flex space-x-3 mb-3 px-2">
                                        <input id="start-date" type="text" placeholder="Start date"
                                            class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
                                        <span class="text-gray-500 self-center">→</span>
                                        <input id="end-date" type="text" placeholder="End date"
                                            class="border border-gray-300 rounded-md px-3 py-2 w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none" />
                                    </div>

                                    <!-- Calendar -->
                                    <div id="litepicker" class="w-full px-2 pb-4"></div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="flex justify-end space-x-3 mt-auto border-t border-gray-300 p-2">
                                <button id="cancelBtn"
                                    class="px-4 py-1 text-xs rounded-md bg-white hover:bg-gray-100 text-gray-800 border border-gray-400">Cancel</button>
                                <button id="applyBtn" class="px-4 py-1 text-xs rounded-md bg-black text-white">Apply</button>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="px-2 py-1 rounded-lg flex items-center justify-center bg-white text-sm font-semibold gap-2 border border-gray-500 border-b border-gray-700">
                        <span>All Channels</span>
                    </div> -->

                </div>
            </div>

            <div class="w-full flex items-center justify-center p-4">
                <div class="w-[73%] flex items-start justify-start bg-white flex-col rounded-2xl border border-gray-200 p-2">
                    <div class="w-[100%] grid grid-cols-4 items-center justify-start gap-1">
                        <div class="w-full flex items-start justify-start flex-col bg-gray-100 p-2 px-3 rounded-xl">
                            <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                                Total Orders
                            </span>

                            <span class="mt-1 font-semibold" id="totalorders"><?= $Total_Orders ?> --</span>
                        </div>
                        <div class="w-full flex items-start justify-start flex-col  p-2 px-3 rounded-xl">
                            <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                                Total Sales
                            </span>

                            <span class="mt-1 font-semibold" id="totalsales">₹<?= formatNumber($Total_sales) ?> --</span>
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
    <?php
    // printWithPre($labels);
    // printWithPre($data);
    // die();
    ?>
    <script>
        let chartInstance = null; // global variable

        function generateGraph(initiallabels, initialdata) {
            const ctx = document.getElementById("comparisonChart");

            // Destroy previous instance if exists
            if (chartInstance) {
                chartInstance.destroy();
            }

            const data = {
                labels: initiallabels,
                datasets: [{
                    label: "Orders per Day",
                    data: initialdata,
                    borderColor: "#0096F2",
                    backgroundColor: "#0096F2",
                    borderWidth: 2.5,
                    pointRadius: 3,
                    pointHoverRadius: 6,
                    tension: 0.35,
                    fill: false,
                }],
            };

            const config = {
                type: "line",
                data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    // ✅ This makes sure it always animates
                    animations: {
                        y: {
                            duration: 800,
                            easing: 'easeOutBack',
                            from: (ctx) => {
                                // Start animation from zero each time
                                if (ctx.type === 'data') {
                                    return 0;
                                }
                            }
                        },
                        x: {
                            duration: 800,
                            easing: 'easeOutBack'
                        }
                    },

                    plugins: {
                        legend: {
                            position: "bottom",
                            labels: {
                                usePointStyle: true,
                                pointStyle: "circle",
                                boxWidth: 6,
                                boxHeight: 6,
                                padding: 20,
                                font: {
                                    size: 13
                                },
                                color: "#9ca3af",
                            },
                        },
                        tooltip: {
                            usePointStyle: true,
                            backgroundColor: "#111827",
                            titleFont: {
                                size: 13
                            },
                            bodyFont: {
                                size: 12
                            },
                            padding: 10,
                            cornerRadius: 6,
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
                                },
                            },
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: "#f3f4f6",
                                drawBorder: false,
                            },
                            ticks: {
                                color: "#9ca3af",
                                font: {
                                    size: 12
                                },
                                stepSize: 1,
                            },
                        },
                    },
                },
            };

            // ✅ Assign chart instance
            chartInstance = new Chart(ctx, config);
            setTimeout(() => {
                ctx.classList.add('rendered');
            }, 50);
        }


        generateGraph(<?= json_encode($labels) ?>, <?= json_encode($orders_data) ?>);
    </script>
    <script>
        const dropdown = document.getElementById("calendarDropdown");
        const trigger = document.getElementById("dateRangeWrapper");
        const startInput = document.getElementById("start-date");
        const endInput = document.getElementById("end-date");
        const rangeText = document.getElementById("selectedRangeText");
        const cancelBtn = document.getElementById("cancelBtn");
        const applyBtn = document.getElementById("applyBtn");

        // Toggle dropdown visibility
        rangeText.addEventListener("click", () => {
            dropdown.classList.toggle("hidden");
        });

        cancelBtn.addEventListener("click", () => dropdown.classList.add("hidden"));
        applyBtn.addEventListener("click", async () => {
            dropdown.classList.add("hidden");

            const startDate = startInput.value;
            const endDate = endInput.value;
            console.log(startDate);
            console.log(endDate);
            // Fire Axios POST request
            const request = await axios.post("/get-dashboard-data", new URLSearchParams({
                start_date: startDate,
                end_date: endDate
            }));
            console.log(request);
            if (request.data.success) {

                const labels = request.data.labels;
                const data = request.data.data;
                document.getElementById('totalorders').innerHTML = request.data.total_Orders + " --";
                document.getElementById('totalsales').innerHTML = "₹" + request.data.total_sales + " --";

                generateGraph(labels, data);
            }
        });

        // Default last 30 days
        const end = new Date();
        const start = new Date();
        start.setDate(end.getDate() - 29);

        startInput.value = start.toLocaleDateString("en-US", {
            month: "short",
            day: "numeric",
            year: "numeric"
        });
        endInput.value = end.toLocaleDateString("en-US", {
            month: "short",
            day: "numeric",
            year: "numeric"
        });

        // Initialize Litepicker
        const picker = new Litepicker({
            element: document.getElementById("litepicker"),
            inlineMode: true,
            singleMode: false,
            startDate: start,
            endDate: end,
            numberOfMonths: 2,
            numberOfColumns: 2,
            setup: (picker) => {
                picker.on('selected', (date1, date2) => {
                    startInput.value = date1.format('MMM D, YYYY');
                    endInput.value = date2.format('MMM D, YYYY');
                });
            }
        });

        // Update when user clicks quick range
        document.getElementById("rangeList").addEventListener("click", (e) => {
            if (e.target.tagName === "BUTTON") {
                const range = e.target.dataset.range;
                document.querySelectorAll("#rangeList button").forEach(btn => {
                    btn.classList.remove("bg-gray-200");
                });

                // Add active class to clicked button
                e.target.classList.add("bg-gray-200");
                const now = new Date();
                let s, en;
                switch (range) {
                    case "today":
                        s = en = now;
                        rangeText.textContent = "Today";
                        break;
                    case "yesterday":
                        s = en = new Date(now.setDate(now.getDate() - 1));
                        rangeText.textContent = "Yesterday";
                        break;
                    case "last7":
                        en = new Date();
                        s = new Date();
                        s.setDate(en.getDate() - 6);
                        rangeText.textContent = "Last 7 days";
                        break;
                    case "last30":
                        en = new Date();
                        s = new Date();
                        s.setDate(en.getDate() - 29);
                        rangeText.textContent = "Last 30 days";
                        break;
                    case "last90":
                        en = new Date();
                        s = new Date();
                        s.setDate(en.getDate() - 89);
                        rangeText.textContent = "Last 90 days";
                        break;
                    case "last365":
                        en = new Date();
                        s = new Date();
                        s.setDate(en.getDate() - 364);
                        rangeText.textContent = "Last 365 days";
                        break;
                }

                picker.setDateRange(s, en);
                startInput.value = s.toLocaleDateString("en-US", {
                    month: "short",
                    day: "numeric",
                    year: "numeric"
                });
                endInput.value = en.toLocaleDateString("en-US", {
                    month: "short",
                    day: "numeric",
                    year: "numeric"
                });
            }
        });
    </script>
</body>

</html>