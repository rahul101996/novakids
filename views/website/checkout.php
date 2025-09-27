<?php
// printWithPre($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
    <!-- Breadcrumbs -->
    <div class="text-sm pt-6 px-6">
        <ol class="flex items-center space-x-2 text-gray-500">
            <li>
                <a href="/" class="hover:text-black">Home</a>
            </li>
            <li>
                <span class="mx-1">/</span>
            </li>
            <li class="text-black font-semibold">Privacy Policy</li>
        </ol>
    </div>

    <!-- Main Layout -->
    <main class="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-5 gap-10">

        <!-- LEFT: Checkout Sections -->
        <section class="md:col-span-3 space-y-6">
            <!-- Step 1: Shipping -->
            <div class="bg-white p-6">
                <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <span
                        class="w-8 h-8 flex items-center justify-center bg-[#f25b21] text-white rounded-full text-sm">1</span>
                    Shipping Information
                </h2>
                <form class="grid grid-cols-2 gap-4 mt-3">
                    <input type="text" placeholder="First Name" required class="border px-3 py-2 rounded col-span-1" value="<?= $userData['fname'] ?>">
                    <input type="text" placeholder="Last Name" required class="border px-3 py-2 rounded col-span-1" value="<?= $userData['lname'] ?>">
                    <input type="email" placeholder="Email Address" class="border px-3 py-2 rounded col-span-1" value="<?= $userData['username'] ?>">
                    <input type="text" placeholder="Phone Number" required class="border px-3 py-2 rounded col-span-1" value="<?= $userData['mobile'] ?>">
                    <input type="text" placeholder="Street Address" required
                        class="border px-3 py-2 rounded col-span-2">
                    <div class="grid grid-cols-3 gap-4 col-span-2">
                        <input type="text" placeholder="City" required class="border px-3 py-2 rounded ">

                        <select class="border px-3 py-2 rounded w-full">
                            <option value="" selected disabled>Select State</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                            <option disabled>──────────</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra & Nagar Haveli and Daman &
                                Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                        </select>

                        <input type="text" placeholder="Pincode" required class="border px-3 py-2 rounded ">
                    </div>
                </form>
            </div>

            <!-- Step 2: Delivery -->
            <div class="bg-white shadow-md rounded-2xl p-6 hidden">
                <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <span
                        class="w-8 h-8 flex items-center justify-center bg-[#f25b21] text-white rounded-full text-sm">2</span>
                    Delivery Options
                </h2>
                <div class="space-y-3">
                    <label
                        class="flex items-center justify-between border p-4 rounded-xl cursor-pointer hover:border-[#f25b21]">
                        <span>🚚 Standard (4-7 days)</span>
                        <input type="radio" name="delivery" checked>
                    </label>
                    <label
                        class="flex items-center justify-between border p-4 rounded-xl cursor-pointer hover:border-[#f25b21]">
                        <span>⚡ Express (2-4 days)</span>
                        <input type="radio" name="delivery">
                    </label>
                </div>
            </div>

            <!-- Step 3: Payment -->
            <div class="bg-white  p-6">
                <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                    <span
                        class="w-8 h-8 flex items-center justify-center bg-[#f25b21] text-white rounded-full text-sm">2</span>
                    Payment Method
                </h2>
                <div class="space-y-3">
                    <!-- Credit / Debit Card -->
                    <label
                        class="flex items-center justify-between border p-4 rounded-md cursor-pointer hover:border-[#f25b21]">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-credit-card text-[#f25b21]"></i>
                            Credit / Debit Card
                        </span>
                        <input type="radio" name="payment" checked>
                    </label>

                    <!-- UPI / Wallet -->
                    <label
                        class="flex items-center justify-between border p-4 rounded-md cursor-pointer hover:border-[#f25b21]">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-mobile-alt text-[#f25b21]"></i>
                            UPI / Wallet
                        </span>
                        <input type="radio" name="payment">
                    </label>

                    <!-- Cash on Delivery -->
                    <label
                        class="flex items-center justify-between border p-4 rounded-md cursor-pointer hover:border-[#f25b21]">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-money-bill-wave text-[#f25b21]"></i>
                            Cash on Delivery
                        </span>
                        <input type="radio" name="payment">
                    </label>
                </div>

            </div>
        </section>

        <!-- RIGHT: Order Summary (Sticky) -->
        <aside class="bg-gray-100 shadow-md  p-6 h-fit sticky top-28 md:col-span-2">
            <h2 class="text-lg font-bold mb-4">Order Summary</h2>
            <div class="space-y-4 border-b pb-4 mb-4">
                <!-- Product 1 -->
                <?php
                $totalAmount = 0;

                foreach ($cartData["cartid"] as $key => $cid) {
                    $id = $cartData["product"][$key];
                    $variant_id = $cartData['varient'][$key];
                    $quantity = $cartData['quantity'][$key];
                    $vdata = getData2("SELECT tbl_variants.* , tbl_products.name as product_name, tbl_products.id as product_id, tbl_products.category as category FROM `tbl_variants` LEFT JOIN tbl_products ON tbl_variants.product_id = tbl_products.id WHERE tbl_variants.id = '$variant_id'")[0];
                    // echo $vdata['image'];
                    $images = array_reverse(json_decode($vdata['images'], true));
                    $variants = json_decode($vdata['options'], true);
                    $variants = json_decode($variants, true);
                    $totalprice = $vdata['price'] * $quantity;
                    $totalAmount += $totalprice;
                ?>
                    <div class="flex items-center justify-between">
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
                <!-- Product 2 -->

            </div>

            <!-- Totals -->
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span>₹<?=$totalAmount ?></span>
                </div>
                <div class="flex justify-between">
                    <span>Shipping</span>
                    <span>₹0</span>
                </div>
                <div class="flex justify-between font-bold text-lg border-t pt-3">
                    <span>Total</span>
                    <span>₹<?= $totalAmount ?></span>
                </div>
            </div>

            <!-- Button -->
            <button
                class="relative mt-6 w-full font-semibold py-2 rounded-md border-2 border-black overflow-hidden group">
                <!-- Text -->
                <span class="relative z-10 text-white group-hover:text-black transition-colors duration-700">
                    Confirm & Place Order
                </span>
                <!-- Animated BG -->
                <span
                    class="absolute inset-0 bg-black transition-transform duration-700 origin-left group-hover:scale-x-0 scale-x-100"></span>
            </button>
        </aside>
    </main>


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>