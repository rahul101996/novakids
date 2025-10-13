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

            <div class="w-full flex items-center justify-center p-4">
                <div class="w-[93%] grid grid-cols-3 items-center justify-center gap-3">
                    <div class="rounded-2xl border border-gray-200 bg-white p-3 md:p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 ">
                            <img src="/public/icons/order.png" class="h-7" alt="">
                        </div>

                        <div class="mt-2 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 ">Total Orders</span>
                                <h4 class="mt-2 text-title-sm font-bold text-gray-800 ">
                                    5,359
                                </h4>
                            </div>
                            <span class="flex items-center gap-1 rounded-full bg-error-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-error-600 ">


                                View
                            </span>

                        </div>
                    </div>
                    <div class="rounded-2xl border border-gray-200 bg-white p-3 md:p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 ">
                            <img src="/public/icons/order.png" class="h-7" alt="">

                        </div>

                        <div class="mt-2 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 ">Todays Orders</span>
                                <h4 class="mt-2 text-title-sm font-bold text-gray-800 ">
                                    3,782
                                </h4>
                            </div>

                            <span class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-success-600 ">


                                View
                            </span>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-gray-200 bg-white p-3 md:p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 ">
                            <img src="/public/icons/users.png" class="h-7" alt="">

                        </div>

                        <div class="mt-2 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 ">Total Users</span>
                                <h4 class="mt-2 text-title-sm font-bold text-gray-800 ">
                                    3,782
                                </h4>
                            </div>

                            <span class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-success-600 ">


                                View
                            </span>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-gray-200 bg-white p-3 md:p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 ">
                            <svg class="shopBag anarkali-svg-icon" width="24px" height="24px" fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <path d="m26 8.9a1 1 0 0 0 -1-.9h-3a6 6 0 0 0 -12 0h-3a1 1 0 0 0 -1 .9l-1.78 17.8a3 3 0 0 0 .78 2.3 3 3 0 0 0 2.22 1h17.57a3 3 0 0 0 2.21-1 3 3 0 0 0 .77-2.31zm-10-4.9a4 4 0 0 1 4 4h-8a4 4 0 0 1 4-4zm9.53 23.67a1 1 0 0 1 -.74.33h-17.58a1 1 0 0 1 -.74-.33 1 1 0 0 1 -.26-.77l1.7-16.9h2.09v3a1 1 0 0 0 2 0v-3h8v3a1 1 0 0 0 2 0v-3h2.09l1.7 16.9a1 1 0 0 1 -.26.77z">
                                </path>
                            </svg>
                        </div>

                        <div class="mt-2 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 ">Total Sales</span>
                                <h4 class="mt-2 text-title-sm font-bold text-gray-800 ">
                                    5,359
                                </h4>
                            </div>
                            <span class="flex items-center gap-1 rounded-full bg-error-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-error-600 ">


                                View
                            </span>

                        </div>
                    </div>
                    <div class="rounded-2xl border border-gray-200 bg-white p-3 md:p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 ">
                            <img src="/public/icons/t-shirt.png" class="h-7" alt="">

                        </div>

                        <div class="mt-2 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 ">Todays Orders</span>
                                <h4 class="mt-2 text-title-sm font-bold text-gray-800 ">
                                    3,782
                                </h4>
                            </div>

                            <span class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-success-600 ">


                                View
                            </span>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-gray-200 bg-white p-3 md:p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 ">
                            <img src="/public/icons/category.png" class="h-7" alt="">

                        </div>

                        <div class="mt-2 flex items-end justify-between">
                            <div>
                                <span class="text-sm text-gray-500 ">Total Category</span>
                                <h4 class="mt-2 text-title-sm font-bold text-gray-800 ">
                                    3,782
                                </h4>
                            </div>

                            <span class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-success-600 ">


                                View
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full flex items-center justify-center">
                <div class="w-[90%] flex items-center justify-center gap-3">

                    <div class="w-full flex items-start justify-center flex-col">
                        <span>Last 5 Customers</span>
                        <div class="w-full text-sm overflow-x-auto border rounded-lg bg-white mt-3">
                            <!-- Table Header -->
                            <div class="grid grid-cols-[50px_3fr_2fr_3fr] items-center gap-4 px-4 py-3 bg-gray-100 text-gray-600 font-semibold border-b">
                                <span>Sr. No</span>
                                <span>Customer Name</span>
                                <span>Phone</span>
                                <span>E-mail</span>
                            </div>

                            <!-- Table Row -->
                            <a href="/admin/customer-info/1" class="block hover:bg-gray-50 transition-colors duration-200">
                                <div class="grid grid-cols-[50px_3fr_2fr_3fr] items-center gap-4 px-4 py-3 text-gray-800 border-b">
                                    <!-- Sr. No -->
                                    <div class="flex items-center gap-2">
                                        <span>1</span>
                                        <svg class="h-4 w-4 text-gray-400 cursor-grab" viewBox="0 0 24 24" fill="currentColor">
                                            <circle cx="9" cy="6" r="1.5"></circle>
                                            <circle cx="15" cy="6" r="1.5"></circle>
                                            <circle cx="9" cy="12" r="1.5"></circle>
                                            <circle cx="15" cy="12" r="1.5"></circle>
                                            <circle cx="9" cy="18" r="1.5"></circle>
                                            <circle cx="15" cy="18" r="1.5"></circle>
                                        </svg>
                                    </div>

                                    <!-- Customer Name -->
                                    <div class="font-medium">
                                        Tushar Kandekar
                                    </div>

                                    <!-- Phone -->
                                    <div class="text-gray-600">
                                        +91 9876543210
                                    </div>

                                    <!-- E-mail -->
                                    <div class="text-green-600 font-medium truncate">
                                        tusharkandekars1@gmail.com
                                    </div>

                                    <!-- User From -->

                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="w-full flex items-start justify-center flex-col">
                        <span>Last 5 Orders</span>
                        <div class="w-full text-sm overflow-x-auto border rounded-lg bg-white
                        mt-3">
                            <!-- Table Header -->
                            <div class="grid grid-cols-[50px_3fr_2fr_3fr] items-center gap-4 px-4 py-3 bg-gray-100 text-gray-600 font-semibold border-b">
                                <span>Sr. No</span>
                                <span>Customer Name</span>
                                <span>Phone</span>
                                <span>E-mail</span>
                            </div>

                            <!-- Table Row -->
                            <a href="/admin/customer-info/1" class="block hover:bg-gray-50 transition-colors duration-200">
                                <div class="grid grid-cols-[50px_3fr_2fr_3fr] items-center gap-4 px-4 py-3 text-gray-800 border-b">
                                    <!-- Sr. No -->
                                    <div class="flex items-center gap-2">
                                        <span>1</span>
                                        <svg class="h-4 w-4 text-gray-400 cursor-grab" viewBox="0 0 24 24" fill="currentColor">
                                            <circle cx="9" cy="6" r="1.5"></circle>
                                            <circle cx="15" cy="6" r="1.5"></circle>
                                            <circle cx="9" cy="12" r="1.5"></circle>
                                            <circle cx="15" cy="12" r="1.5"></circle>
                                            <circle cx="9" cy="18" r="1.5"></circle>
                                            <circle cx="15" cy="18" r="1.5"></circle>
                                        </svg>
                                    </div>

                                    <!-- Customer Name -->
                                    <div class="font-medium">
                                        Tushar Kandekar
                                    </div>

                                    <!-- Phone -->
                                    <div class="text-gray-600">
                                        +91 9876543210
                                    </div>

                                    <!-- E-mail -->
                                    <div class="text-green-600 font-medium truncate">
                                        tusharkandekars1@gmail.com
                                    </div>

                                    <!-- User From -->

                                </div>
                            </a>
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