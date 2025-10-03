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




            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Customer Profile - <?= $UserData['fname'] ?> <?= $UserData['lname'] ?></title>
                <script src="https://cdn.tailwindcss.com"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            </head>

            <body class="bg-gray-50">
                <!-- Header -->
                <div class="bg-white border-b px-6 py-4 flex items-center justify-between">
                    <div class="flex items-center space-x-3 justify-center">
                        <i class="fas fa-user text-gray-600 text-xl"></i>
                        <h1 class="text-xl font-semibold text-gray-900"><?= $UserData['fname'] ?> <?= $UserData['lname'] ?></h1>
                    </div>

                </div>

                <div class="max-w-7xl mx-auto p-6">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-4 gap-6 mb-6">
                        <div class="bg-white p-4 rounded-lg border">
                            <div class="text-sm text-gray-600 mb-1">Amount spent</div>
                            <div class="text-lg font-semibold">₹<?= $totalPurchase ?></div>
                        </div>
                        <div class="bg-white p-4 rounded-lg border">
                            <div class="text-sm text-gray-600 mb-1">Orders</div>
                            <div class="text-lg font-semibold"><?= $totalOrders ?></div>
                        </div>
                        <div class="bg-white p-4 rounded-lg border">
                            <div class="text-sm text-gray-600 mb-1">Customer since</div>
                            <div class="text-lg font-semibold"><?= implode(" ", $parts); ?></div>
                        </div>
                        <div class="bg-white p-4 rounded-lg border">
                            <div class="text-sm text-gray-600 mb-1">RFM group</div>
                            <div class="text-lg font-semibold">Active</div>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        <!-- Left Column - Orders -->
                        <div class="col-span-2 space-y-6">
                            <!-- Last Order -->
                            <div class="bg-white rounded-lg border">
                                <div class="p-4 border-b">
                                    <h2 class="font-semibold text-gray-900">Last order placed</h2>
                                </div>
                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center space-x-3">
                                            <span class="text-blue-600 font-medium">#<?= $LastOrder['orderid'] ?></span>
                                            <span class="px-2 py-1 text-xs font-medium bg-orange-100 text-orange-800 rounded"><?= $LastOrder['payment_status'] ?></span>
                                            <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded"><?= $LastOrder['payment_mode'] ?></span>
                                        </div>
                                        <span class="font-semibold">₹<?= formatNumber($LastOrder['total_amount']) ?></span>
                                    </div>
                                    <div class="text-sm text-gray-600 mb-4">
                                        <?= formatDateTime($LastOrder['created_at']) ?> from
                                        <i class="fas fa-store text-green-600 mx-1"></i>
                                        <span class="font-medium">Online Store</span>
                                    </div>

                                    <!-- Order Item -->
                                    <?php
                                    foreach ($products as $key => $product) {
                                        $images = json_decode($product['variant_images'], true);
                                        $variants = json_decode($product['variant_options'], true);
                                        $variants = json_decode($variants, true);

                                        $images = array_reverse($images);

                                    ?>
                                        <div class="w-full border border-gray-300 flex flex-col items-center">
                                            <div class="w-full p-2 flex items-center justify-between">
                                                <div class="w-[80%] flex items-start justify-start">
                                                    <img src="/<?= $images[0] ?>" class="h-24" alt="">
                                                    <div class="flex flex-col items-start justify-center ml-3">
                                                        <h3 class="font-semibold text-base !mb-0"><?= $product['product_name'] ?></h3>
                                                        <?php
                                                        foreach ($variants as $key => $variant) {
                                                        ?>
                                                            <p class="!mb-0 text-xs text-gray-600 uppercase"><?= $key ?>: <?= $variant ?></p>

                                                        <?php } ?>
                                                        <!-- <h3 class="text-sm text-gray-600">Size : XS</h3> -->
                                                        <h3 class="text-sm text-gray-600 mt-2"> <?= $product['quantity'] ?> x ₹<?= formatNumber($product['amount']) ?></h3>

                                                    </div>
                                                </div>
                                                <div class="w-[20%] flex items-center justify-center flex-col gap-2 font-semibold">
                                                   ₹<?= formatNumber($product['total_amount']) ?>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    <?php } ?>

                                    <!-- Action Buttons -->
                                    <div class="flex space-x-3 mt-4">
                                        <button class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                            View all orders
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Timeline -->
                            <div class="bg-white rounded-lg border hidden">
                                <div class="p-4 border-b">
                                    <h2 class="font-semibold text-gray-900">Timeline</h2>
                                </div>
                                <div class="p-4">
                                    <!-- Comment Input -->
                                    <div class="flex space-x-3 mb-4">
                                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-semibold">
                                            UC
                                        </div>
                                        <div class="flex-1">
                                            <textarea placeholder="Leave a comment..." class="w-full p-3 border border-gray-300 rounded-md resize-none" rows="2"></textarea>
                                            <div class="flex items-center justify-between mt-2">
                                                <div class="flex space-x-2 text-gray-400">
                                                    <i class="far fa-clock cursor-pointer hover:text-gray-600"></i>
                                                    <i class="far fa-smile cursor-pointer hover:text-gray-600"></i>
                                                    <i class="fas fa-hashtag cursor-pointer hover:text-gray-600"></i>
                                                    <i class="fas fa-link cursor-pointer hover:text-gray-600"></i>
                                                </div>
                                                <button class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-md hover:bg-gray-800">
                                                    Post
                                                </button>
                                            </div>
                                            <div class="text-xs text-gray-500 mt-2">Only you and other staff can see comments</div>
                                        </div>
                                    </div>

                                    <!-- Timeline Items -->
                                    <div class="space-y-6">
                                        <!-- June 18 -->
                                        <div class="text-sm font-medium text-gray-900 mb-3">June 18</div>

                                        <div class="flex space-x-3">
                                            <div class="w-2 h-2 bg-gray-400 rounded-full mt-2"></div>
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-900 mb-1">
                                                    Order Confirmation email for order <span class="font-medium">#USTITCH1014</span> sent to this customer (manish291082@yahoo.in).
                                                </div>
                                                <div class="flex items-center space-x-3">
                                                    <button class="text-sm text-blue-600 hover:underline">View email</button>
                                                    <span class="text-xs text-gray-500">6:57 PM</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex space-x-3">
                                            <div class="w-2 h-2 bg-gray-400 rounded-full mt-2"></div>
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-900 mb-1">
                                                    This customer placed order <span class="font-medium">#USTITCH1014</span> on Online Store (checkout #639171168833316).
                                                </div>
                                                <div class="text-xs text-gray-500">6:57 PM</div>
                                            </div>
                                        </div>

                                        <!-- June 15 -->
                                        <div class="text-sm font-medium text-gray-900 mb-3">June 15</div>

                                        <div class="flex space-x-3">
                                            <div class="w-2 h-2 bg-gray-400 rounded-full mt-2"></div>
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-900 mb-1">
                                                    Order Confirmation email for order <span class="font-medium">#USTITCH1006</span> sent to this customer (manish291082@yahoo.in).
                                                </div>
                                                <div class="flex items-center space-x-3">
                                                    <button class="text-sm text-blue-600 hover:underline">View email</button>
                                                    <span class="text-xs text-gray-500">11:18 AM</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex space-x-3">
                                            <div class="w-2 h-2 bg-gray-400 rounded-full mt-2"></div>
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-900 mb-1">
                                                    This customer placed order <span class="font-medium">#USTITCH1006</span> on Online Store (checkout #639102077579).
                                                </div>
                                                <div class="text-xs text-gray-500">11:18 AM</div>
                                            </div>
                                        </div>

                                        <!-- June 14 -->
                                        <div class="text-sm font-medium text-gray-900 mb-3">June 14</div>

                                        <div class="flex space-x-3">
                                            <div class="w-2 h-2 bg-gray-400 rounded-full mt-2"></div>
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-900 flex items-center space-x-2">
                                                    <i class="fas fa-store text-green-600"></i>
                                                    <span>Online Store created this customer.</span>
                                                </div>
                                                <div class="text-xs text-gray-500 mt-1">7:31 PM</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Customer Details -->
                        <div class="space-y-6">
                            <!-- Customer Info -->
                            <div class="bg-white rounded-lg border">
                                <div class="p-4 border-b flex items-center justify-between">
                                    <h2 class="font-semibold text-gray-900">Customer</h2>
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </div>
                                <div class="p-4 space-y-4">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Contact information</h3>
                                        <div class="flex items-center space-x-2">
                                            <a href="mailto:<?= $UserData['username'] ?>" class="text-blue-600 hover:underline text-sm"><?= $UserData['username'] ?></a>
                                            <button class="text-gray-400 hover:text-gray-600">
                                                <i class="far fa-copy text-xs"></i>
                                            </button>
                                        </div>
                                        <div class="text-sm text-gray-600 mt-1">Will receive notifications in English</div>
                                    </div>

                                    <div>
                                        <h3 class="text-xl font-medium text-gray-900 mb-2">Default address</h3>
                                        <div class="text-sm text-gray-600 leading-relaxed">
                                           <p class="text-sm text-gray-600 leading-relaxed"><?= $defaultAddress['address_line1'] ?>, <?= $defaultAddress['address_line2'] ?></p>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>

                            <!-- Store Credit -->


                            <!-- Tags -->


                            <!-- Notes -->

                        </div>
                    </div>
                </div>
            </body>

            </html>





        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
</body>

</html>