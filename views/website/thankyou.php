<?php

// printWithPre($OrderData);

$encodedAddress = urlencode($OrderData['address_line2'] . ", " . $OrderData['address_line1']);
?>
<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <div class="flex w-full min-h-screen">
        <!-- Left section -->
        <div class="w-[60%] bg-white p-8 shadow-sm">
            <div class="max-w-[90%] ml-16">
                <!-- Order confirmation header -->
                <div class="flex items-start mb-8">
                    <div class="rounded-full bg-gradient-to-r from-green-600 to-green-500 p-3 mr-4 shadow-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Order #<?= $OrderData['orderid'] ?></p>
                        <h1 class="text-3xl font-semibold text-gray-800 mt-1">Thank you, <?= $OrderData['fname'] ?> <?= $OrderData['lname'] ?>!</h1>
                    </div>
                </div>

                <!-- Map section -->
                <div class="bg-white rounded-xl border border-gray-100 mb-8 shadow-sm overflow-hidden">
                    <div class="relative h-64 w-full">
                        <iframe
                            class="w-full h-full "
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps?q=<?= $encodedAddress ?>&output=embed">
                        </iframe>
                        <div class="absolute top-4 left-4 bg-white rounded-lg shadow-sm px-4 py-3">
                            <p class="text-sm font-semibold text-gray-800"><?= $OrderData['city'] ?></p>
                            <!-- <p class="text-sm text-gray-600"><?= $OrderData['state'] ?></p> -->
                        </div>
                    </div>
                </div>

                <!-- Confirmation section -->

                <!-- Updates section -->

                <!-- Order details -->
                <div class="bg-white rounded-xl border border-gray-100 p-8 mb-6">
                    <h2 class="text-gray-800 font-semibold mb-8">Order details</h2>

                    <div class="grid grid-cols-2 gap-12">
                        <!-- Left column -->
                        <div class="space-y-8">
                            <div>
                                <h3 class="text-gray-600 text-sm font-semibold mb-3">Contact information</h3>
                                <p class="text-gray-800">+91 <?= $OrderData['mobile'] ?></p>
                            </div>




                        </div>

                        <!-- Right column -->
                        <div class="space-y-8">
                            <div>
                                <h3 class="text-gray-600 text-sm font-semibold mb-3">Payment method</h3>
                                <p class="text-gray-800"><?= $OrderData['payment_mode'] ?> - ₹<?= formatNumber($OrderData['total_amount'])  ?></p>
                            </div>


                        </div>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-gray-600 text-sm font-semibold mb-3">Shipping address</h3>
                        <div class="space-y-1">

                            <p class="text-gray-800 w-[80%]"><?= $OrderData['address_line1'] ?></p>
                            <p class="text-gray-800 w-[80%]"><?= $OrderData['address_line2'] ?></p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex items-center justify-between mt-8 mb-6">
                    <div class="flex items-center text-sm text-gray-600">
                        <span>Need help?</span>
                        <a href="/contact" class="text-black ml-1 hover:text-pink-600 hover:underline">Contact us</a>
                    </div>
                    <a href="/" class="relative bg-white inline-block px-6 py-2 rounded-md border border-black text-black group-hover:text-white font-semibold overflow-hidden group">
                        <span class="relative z-10 transition-colors duration-700 group-hover:text-white">
                            Continue shopping
                        </span>
                        <span class="absolute inset-0 bg-black transform scale-x-0 origin-left transition-transform duration-700 group-hover:scale-x-100"></span>
                    </a>
                </div>

                <div class="flex space-x-6 text-sm text-black">
                    <a href="#" class="hover:text-pink-600 hover:underline">Refund policy</a>
                    <a href="#" class="hover:text-pink-600 hover:underline">Shipping policy</a>
                    <a href="#" class="hover:text-pink-600 hover:underline">Privacy policy</a>
                    <a href="#" class="hover:text-pink-600 hover:underline">Terms of service</a>
                </div>
            </div>
        </div>

        <!-- Right section -->
        <div class="w-[40%] bg-gradient-to-br from-orange-50 to-rose-50 p-8 pr-16">
            <div class="flex items-center gap-2 w-full justify-center">
                <img src="/public/logos/nova_favicon.png" alt="Brand Logo" class="w-auto h-14 rounded-md object-cover mb-4">
                <img src="/public/logos/nova_logo-brnd-name.png" alt="Brand Logo" class="w-auto h-14 rounded-md object-cover mb-4">
            </div>

            <!-- Order summary -->
            <div class="space-y-6">
                <!-- Product 1 -->
                <div class="space-y-4 border-b pb-4 mb-4">
                    <!-- Product 1 -->
                    <?php
                    $totalAmount = 0;

                    foreach ($PurchaseItems as $key => $cid) {
                        $id = $cid["product"];
                        $variant_id = $cid['varient'];
                        $quantity = $cid['quantity'];
                        $vdata = getData2("SELECT tbl_variants.* , tbl_products.name as product_name, tbl_products.id as product_id, tbl_products.category as category FROM `tbl_variants` LEFT JOIN tbl_products ON tbl_variants.product_id = tbl_products.id WHERE tbl_variants.id = '$variant_id'")[0];
                        // echo $vdata['image'];
                        $images = array_reverse(json_decode($vdata['images'], true));
                        $variants = json_decode($vdata['options'], true);
                        $variants = json_decode($variants, true);
                        $totalprice = $vdata['price'] * $quantity;
                        $totalAmount += $totalprice;
                    ?>
                        <div class="flex items-center justify-between bg-white p-2">
                            <div class="flex items-center gap-3">
                                <img src="/<?= $images[0] ?>" class="w-16 h-20 object-cover">
                                <div>
                                    <h3 class="font-semibold text-base"><?= $vdata['product_name'] ?> x <span class="text-xs  px-3 bg-black text-white rounded-lg"> <?= $quantity ?></span></h3>
                                    <div class="flex gap-3 flex-wrap items-center justify-start">
                                        <?php
                                        foreach ($variants as $key => $variant) {
                                        ?>
                                            <p class="!mb-0 text-xs text-gray-600 uppercase"><?= $key ?>: <?= $variant ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <p class="font-semibold">₹<?= $totalprice ?></p>
                        </div>
                    <?php } ?>

                </div>

                <!-- Summary -->
                <div class="bg-white rounded-xl shadow-sm p-6 mt-8">
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Subtotal</span>
                            <span class="text-sm font-medium">₹<?= $totalAmount ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Shipping</span>
                            <span class="text-sm font-medium text-green-600">Free</span>
                        </div>
                        <div class="pt-4 border-t border-gray-100">
                            <div class="flex justify-between items-start">
                                <span class="text-base font-semibold">Total</span>
                                <div class="text-right">
                                    <span class="block text-xs text-gray-500 mb-1">Including ₹0.00 in taxes</span>
                                    <p class="text-lg font-semibold">₹<?= $totalAmount ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>