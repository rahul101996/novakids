<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-gray-50">

    <div class="flex h-screen bg-gray-100">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');

        ?>

        <main class="flex-1 md:ml-60">
            
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>

            <div class="p-6 md:p-8">
                <div class="flex flex-wrap items-center gap-2 mb-6">
                    <button class="bg-white border rounded-md px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                        Last 30 days
                        <svg class="h-4 w-4 ml-1.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="bg-white border rounded-md px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-50 flex items-center">
                        All channels
                        <svg class="h-4 w-4 ml-1.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div class="flex items-center space-x-2 text-sm ml-auto">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                        </span>
                        <span class="text-gray-600">0 live visitors</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div>
                            <p class="text-sm text-gray-500">Sessions</p>
                            <p class="text-2xl font-semibold text-gray-800">525</p>
                            <div class="flex items-center text-sm text-green-600">
                                <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span>+12%</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Total sales</p>
                            <p class="text-2xl font-semibold text-gray-800">₹15,890.50</p>
                            <div class="flex items-center text-sm text-green-600">
                                <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                <span>+25%</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Orders</p>
                            <p class="text-2xl font-semibold text-gray-800">8</p>
                            <div class="flex items-center text-sm text-red-600">
                                <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                                <span>-5%</span>
                            </div>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Conversion rate</p>
                            <p class="text-2xl font-semibold text-gray-800">1.5%</p>
                        </div>
                    </div>
                    <div class="h-64 mt-8">
                        <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 800 250">
                            <line x1="0" y1="20" x2="800" y2="20" stroke="#e5e7eb" stroke-width="1" />
                            <line x1="0" y1="80" x2="800" y2="80" stroke="#e5e7eb" stroke-width="1" />
                            <line x1="0" y1="140" x2="800" y2="140" stroke="#e5e7eb" stroke-width="1" />
                            <line x1="0" y1="200" x2="800" y2="200" stroke="#e5e7eb" stroke-width="1" />
                            <line x1="0" y1="240" x2="800" y2="240" stroke="#e5e7eb" stroke-width="1" />

                            <path d="M 0 180 L 50 175 L 100 185 L 150 170 L 200 190 L 250 160 L 300 120 L 350 150 L 400 30 L 450 100 L 500 120 L 550 150 L 600 140 L 650 160 L 700 130 L 750 145 L 800 120" fill="none" stroke="#3b82f6" stroke-width="2" />

                            <text x="0" y="240" dy="-5" fill="#6b7280" font-size="12">0</text>
                            <text x="0" y="200" dy="4" fill="#6b7280" font-size="12">200</text>
                            <text x="0" y="140" dy="4" fill="#6b7280" font-size="12">400</text>
                            <text x="0" y="80" dy="4" fill="#6b7280" font-size="12">600</text>
                            <text x="0" y="20" dy="4" fill="#6b7280" font-size="12">800</text>
                        </svg>
                    </div>
                    <div class="text-center text-sm text-gray-500 mt-4 flex justify-center items-center gap-4">
                        <span>- Aug 1 - Sep 30, 2024</span>
                        <span>- Jul 4 - Sep 30, 2024</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <button class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex items-center justify-between hover:bg-gray-50 text-left">
                        <span class="font-medium text-gray-800">25 orders to fulfill</span>
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex items-center justify-between hover:bg-gray-50 text-left">
                        <span class="font-medium text-gray-800">18 payments to capture</span>
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <div>
                    <h2 class="text-lg font-semibold mb-4 flex items-center text-gray-800">
                        <svg class="h-5 w-5 mr-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                        Performance insights
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <h3 class="font-semibold text-gray-800">New customer acquisition!</h3>
                            <p class="text-gray-600 mt-2">Your store attracted 350 new customers this month.</p>
                            <a href="#" class="text-indigo-600 font-medium mt-4 inline-block hover:underline">Explore now</a>
                        </div>
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                            <h3 class="font-semibold text-gray-800">High average order value!</h3>
                            <p class="text-gray-600 mt-2">Customers spent ₹2,000 on average per order.</p>
                            <a href="#" class="text-indigo-600 font-medium mt-4 inline-block hover:underline">Continue</a>
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