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

            <button onclick="window.location.href='/shop'"
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
    </div>


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>