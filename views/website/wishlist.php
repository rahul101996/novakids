<?php
// printWithPre($_SESSION);
$page = 'Wishlist';
?>
<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/breadcrumb.php';
    ?>

    <div class="w-full mx-auto px-4 pb-8">
        <div class="text-center mb-10 max-md:mt-6">
            <h1 class="text-4xl font-bold text-gray-900">Wishlist</h1>
            <p class="text-gray-600 mt-2">
                Manage your wishlist and keep track of the products you love.
            </p>
            <div class="w-24 h-[3px] bg-[#f25b21] mt-3 mx-auto"></div>
        </div>
        <!-- Wishlist Content -->
        <?php
        if (isset($_SESSION['userid']) && !empty($_SESSION['userid']) && $_SESSION['type'] == "User") {
            $wishlists = getData2("SELECT * FROM `tbl_wishlist` WHERE `userid` = " . $_SESSION["userid"]);

            if (empty($wishlists)) {
        ?>
                <div class="text-center py-12 border border-gray-300 border-dashed w-[50%] max-md:w-[85%] mx-auto">
                    <!-- Heart Icon with Badge -->
                    <div class="relative inline-block mb-6">
                        <i class="fa-regular fa-heart text-6xl text-gray-400"></i>
                        <span
                            class="absolute -top-2 -right-3 bg-black text-white text-xs font-semibold rounded-full h-6 w-6 flex items-center justify-center">0</span>
                    </div>

                    <!-- Message -->
                    <p class="text-lg font-medium mb-2">Your Wishlist Is Currently Empty</p>
                    <p class="text-gray-500 text-sm mb-8">Click the <i class="fa-regular fa-heart"></i> icons to add products
                    </p>

                    <button onclick="window.location.href='/'"
                        class="flex-1 relative rounded-md overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black">
                        <span
                            class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                            Return to Shop
                        </span>
                        <span
                            class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                        </span>
                    </button>
                </div>
            <?php } else { ?>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 max-md:gap-3">
                    <?php
                    $wishlists = getData2("SELECT * FROM `tbl_wishlist` WHERE `userid` = " . $_SESSION["userid"]);

                    foreach ($wishlists as $key => $wishlist) {
                        $product = getData2("SELECT * FROM `tbl_products` WHERE `id` = " . $wishlist['product'])[0];
                        // $images = json_decode($product['product_images'], true);
                        // $images = array_reverse($images);
                        $SecondImage = true;
                        $varients = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = $product[id]")[0];
                        // printWithPre($varients);
                        $images = json_decode($varients['images'], true);
                        $images = array_reverse($images);
                        (isset($images[1])) ? $SecondImage = $images[1] : $SecondImage = $images[0];
                        $comparePrice = floatval($product['compare_price']);
                        $price = floatval($varients['price']);
                        $discountAmount = $comparePrice - $price;
                        $discountPercentage = $comparePrice > 0 ? round(($discountAmount / $comparePrice) * 100) : 0;

                        $name = str_replace(' ', '-', $product['name']);
                        $name = str_replace("'", '', $name);


                        // printWithPre($images);
                    ?>
                        <a href="/products/product-details/<?= $name ?>" class="block">
                            <div
                                class="group relative  cursor-pointer transition overflow-hidden">
                                <!-- Discount Badge -->
                                <span class="absolute top-2 left-2 max-md:top-0 max-md:left-0 bg-[#f25b21] text-white text-xs max-md:text-[11px] px-2 py-1 max-md:px-1.5 max-md:py-0.5 z-20">
                                    SAVE <?= $discountPercentage ?>%
                                </span>

                                <!-- Product Images -->
                                <div class="relative w-full h-[450px] max-md:h-[250px] overflow-hidden group">
                                    <!-- Default Image -->
                                    <img src="/<?= $images[0] ?>" alt="Product 1"
                                        class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                    <!-- Hover Image -->

                                    <img src="/<?= $SecondImage ?>" alt="Product 1 Hover"
                                        class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                    <!-- Add to favorites Icon (top-right) -->
                                    <button
                                        class="addToWishlistBtn absolute top-2 right-3 bg-[#f25b21] text-white h-10 w-10 max-md:h-6 max-md:w-6 flex items-center justify-center rounded-full  group-hover:opacity-100 z-20 stop-link">
                                        <i class="fas fa-heart max-md:text-xs"></i>
                                    </button>

                                    <!-- Add to Cart Icon -->
                                    <button
                                        class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                        <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                    </button>
                                    <input type="text" value="<?= $product['id'] ?>" class="ProductId">
                                </div>

                                <!-- Product Details -->
                                <div class="pt-4 w-full ">
                                    <h3 class="text-base font-semibold uppercase max-md:text-sm"><?= $product['name'] ?></h3>
                                    <div class="flex items-center justify-start gap-3 w-full">
                                        <p class="text-gray-500 line-through text-sm">₹
                                            <?= formatNumber($product['compare_price']) ?>.00
                                        </p>
                                        <p class="text-[#f25b21] font-bold">₹ <?= formatNumber($price) ?>.00</p>
                                    </div>
                                    <!-- reviews -->
                                    <div class="flex items-center justify-start space-x-1 hidden">
                                        <span class="text-yellow-500">★★★★★</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    <?php } ?>


                </div>

            <?php }
        } else {

            if (!isset($_SESSION['wishlist']) || empty($_SESSION['wishlist'])) {
            ?>
                <div class="text-center py-12 border border-gray-300 border-dashed w-[50%] max-md:w-[85%] mx-auto">
                    <!-- Heart Icon with Badge -->
                    <div class="relative inline-block mb-6">
                        <i class="fa-regular fa-heart text-6xl text-gray-400"></i>
                        <span
                            class="absolute -top-2 -right-3 bg-black text-white text-xs font-semibold rounded-full h-6 w-6 flex items-center justify-center">0</span>
                    </div>

                    <!-- Message -->
                    <p class="text-lg font-medium mb-2">Your Wishlist Is Currently Empty</p>
                    <p class="text-gray-500 text-sm mb-8">Click the <i class="fa-regular fa-heart"></i> icons to add products
                    </p>

                    <button onclick="window.location.href='/'"
                        class="flex-1 relative rounded-md overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black">
                        <span
                            class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                            Return to Shop
                        </span>
                        <span
                            class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                        </span>
                    </button>
                </div>


            <?php } else { ?>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 max-md:gap-3">
                    <?php
                    $wishlists = $_SESSION['wishlist'];
                    foreach ($wishlists as $key => $wishlist) {
                        $product = getData2("SELECT * FROM `tbl_products` WHERE `id` = " . $wishlist['product'])[0];
                        $images = json_decode($product['product_images'], true);
                        $images = array_reverse($images);
                        $SecondImage = true;
                        (isset($images[1])) ? $SecondImage = $images[1] : $SecondImage = $images[0];
                        $comparePrice = floatval($product['compare_price']);
                        $price = floatval($product['price']);
                        $discountAmount = $comparePrice - $price;
                        $discountPercentage = $comparePrice > 0 ? round(($discountAmount / $comparePrice) * 100) : 0;

                        $name = str_replace(' ', '-', $product['name']);
                        $name = str_replace("'", '', $name);

                        // printWithPre($images);
                    ?>
                        <a href="/products/product-details/<?= $name ?>" class="block">
                            <div
                                class="group relative  cursor-pointer transition overflow-hidden">
                                <!-- Discount Badge -->
                                <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                    SAVE <?= $discountPercentage ?>%
                                </span>

                                <!-- Product Images -->
                                <div class="relative w-full h-[450px] max-md:h-[250px] overflow-hidden group">
                                    <!-- Default Image -->
                                    <img src="/<?= $images[0] ?>" alt="Product 1"
                                        class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                    <!-- Hover Image -->

                                    <img src="/<?= $SecondImage ?>" alt="Product 1 Hover"
                                        class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                    <!-- Add to favorites Icon (top-right) -->
                                    <button
                                        class="addToWishlistBtn absolute top-2 right-3 bg-[#f25b21] text-white h-10 w-10 rounded-full  group-hover:opacity-100 z-20 stop-link">
                                        <i class="fas fa-heart"></i>
                                    </button>

                                    <!-- Add to Cart Icon -->
                                    <button
                                        class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                        <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                    </button>
                                    <input type="text" value="<?= $product['id'] ?>" class="ProductId">
                                </div>

                                <!-- Product Details -->
                                <div class="pt-4 w-full ">
                                    <h3 class="text-base font-semibold uppercase"><?= $product['name'] ?></h3>
                                    <div class="flex items-center justify-start gap-3 w-full">
                                        <p class="text-gray-500 line-through text-sm">₹
                                            <?= formatNumber($product['compare_price']) ?>.00
                                        </p>
                                        <p class="text-[#f25b21] font-bold">₹ <?= formatNumber($product['price']) ?>.00</p>
                                    </div>
                                    <!-- reviews -->
                                    <div class="flex items-center justify-start space-x-1 hidden">
                                        <span class="text-yellow-500">★★★★★</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    <?php } ?>


                </div>
        <?php  }
        } ?>
    </div>


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>