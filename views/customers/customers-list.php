<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";
$customers = [
    [
        "name" => "Manish Kukreja",
        "email" => 'XVc8o@example.com',
        "email_subscription" => "Not subscribed",
        "location" => "Ulhasnagar MH, India",
        "orders" => 2,
        "amount_spent" => 901.25
    ],
    [
        "name" => "Manish Kukreja",
        "email" => 'XVc8o@example.com',
        "email_subscription" => null,
        "location" => "Ulhasnagar MH, India",
        "orders" => 0,
        "amount_spent" => 0.00
    ],
    [
        "name" => "Kanchan Lund",
        "email" => 'qsqsB@example.com',
        "email_subscription" => null,
        "location" => "Ulhasnagar MH, India",
        "orders" => 1,
        "amount_spent" => 775.00
    ],
    [
        "name" => "raneabhi1988@gmail.com",
        "email" => "raneabhi1988@gmail.com",
        "email_subscription" => "Not subscribed",
        "location" => "Ulhasnagar MH, India",
        "orders" => 0,
        "amount_spent" => 0.00
    ],
    [
        "name" => "Bhavika Kukreja",
        "email" => 'tVd5t@example.com',
        "email_subscription" => null,
        "location" => "Ulhasnagar MH, India",
        "orders" => 1,
        "amount_spent" => 1599.00
    ],
    [
        "name" => "Test Gaurav",
        "email" => 'tVd5t@example.com',
        "email_subscription" => null,
        "location" => "Ulhasnagar MH, India",
        "orders" => 0,
        "amount_spent" => 0.00
    ],
    [
        "name" => "Test Gaurav",
        "email" => 'tVd5t@example.com',
        "email_subscription" => null,
        "location" => "Ulhasnagar MH, India",
        "orders" => 0,
        "amount_spent" => 0.00
    ],
    [
        "name" => "test gaurav",
        "email" => 'tVd5t@example.com',
        "email_subscription" => null,
        "location" => "Ulhasnagar MH, India",
        "orders" => 2,
        "amount_spent" => 3715.82
    ],
    [
        "name" => "Test Gaurav",
        "email" => 'tVd5t@example.com',
        "email_subscription" => null,
        "location" => "Ulhasnagar MH, India",
        "orders" => 1,
        "amount_spent" => 1337.50
    ],
    [
        "name" => "test gaurav",
        "email" => 'tVd5t@example.com',
        "email_subscription" => null,
        "location" => "Ulhasnagar MH, India",
        "orders" => 1,
        "amount_spent" => 1750.00
    ],
    [
        "name" => "test gaurav",
        "email" => 'tVd5t@example.com',
        "email_subscription" => null,
        "location" => "Ulhasnagar MH, India",
        "orders" => 0,
        "amount_spent" => 0.00
    ]
];

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
                <span class="text-xl font-semibold text-gray-800">Customers</span>
                <div>
                    <button class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Import</button>
                    <button class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Export</button>
                </div>
            </div>
            <div class="p-3 border-b border-gray-200">
                <div class="flex justify-between items-center">

                    <div class="flex items-center space-x-1">
                        <button class="bg-gray-200 text-gray-800 px-3 py-1.5 rounded-md text-sm font-medium">All</button>

                    </div>
                    <div class="flex items-center space-x-1">
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h18M3 12h18M3 16h18" stroke-opacity="0.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h12M3 12h6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="w-full text-sm">
                <!-- Table Header -->
                <div class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,2fr)_minmax(0,3fr)_minmax(0,1fr)_minmax(0,0.5fr)_minmax(0,0.5fr)] items-center gap-4 px-4 py-2 text-gray-500">
                    <span>Sr. No</span>
                    <span>Customer Name</span>
                    <span>E-mail</span>
                    <span>Address</span>
                    <span>Orders</span>
                    <span>Amount Spent</span>
                    <span>Status</span>
                </div>

                <?php foreach ($customers as $key => $customer) { ?>
                    <a href="/admin/customer-info" class="divide-y divide-gray-200 ">
                        <!-- Table Row -->
                        <div class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,2fr)_minmax(0,3fr)_minmax(0,1fr)_minmax(0,0.5fr)_minmax(0,0.5fr)] items-center gap-4 px-4 py-3 hover:bg-gray-50 text-gray-800">
                            <!-- Sr. No -->
                            <div class="flex items-center space-x-3">
                                <span><?= $key + 1 ?></span>
                                <svg class="h-4 w-4 text-gray-400 cursor-grab" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="6" r="1.5" />
                                    <circle cx="15" cy="6" r="1.5" />
                                    <circle cx="9" cy="12" r="1.5" />
                                    <circle cx="15" cy="12" r="1.5" />
                                    <circle cx="9" cy="18" r="1.5" />
                                    <circle cx="15" cy="18" r="1.5" />
                                </svg>
                            </div>

                            <!-- Customer Name -->
                            <div class="font-medium">
                                <div class="flex items-center justify-start gap-5">
                                    <?= $customer['name'] ?>
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <span class="text-green-500 font-semibold"><?= $customer['email'] ?></span>
                            </div>

                            <!-- Address -->
                            <div>
                                <p class="text-gray-500 font-semibold"><?= $customer['location'] ?></p>
                            </div>

                            <!-- Orders -->
                            <div>
                                <p class="text-gray-500 font-semibold"><?= $customer['orders'] ?> Orders</p>
                            </div>

                            <!-- Amount Spent -->
                            <div>
                                <p class="text-gray-500 font-semibold">₹ <?= $customer['amount_spent'] ?></p>
                            </div>

                            <!-- Action -->
                            <div class="flex space-x-2">
                                <span class="bg-green-200 text-green-600 py-1 px-2 rounded-full text-xs">Active</span>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>






        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
</body>

</html>