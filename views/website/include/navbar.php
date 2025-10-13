<!-- Top Bar -->
<?php
// printWithPre($_SESSION);

$uniqueProducts = getData2("SELECT *
                                FROM `tbl_products`
                                ORDER BY RAND()
                                LIMIT 10;");

$navbar_heading = getData2("SELECT * FROM `tbl_nav_heading` ");

// printWithPre($uniqueProducts);

if (isset($_SESSION['userid']) && !empty($_SESSION['userid']) && $_SESSION['type'] == "User") {
    $count = 0;
    $count = count(getData2("SELECT * FROM `tbl_cart` WHERE `userid` = " . $_SESSION['userid']));
} else {


    $count = isset($_SESSION['cart']) && !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
}
if (isset($_SESSION['userid']) && !empty($_SESSION['userid']) && $_SESSION['type'] == "User") {
    $wishlistcount = 0;
    $wishlistcount = count(getData2("SELECT * FROM `tbl_wishlist` WHERE `userid` = " . $_SESSION["userid"]));
} else {


    $wishlistcount = isset($_SESSION['wishlist']) && !empty($_SESSION['wishlist']) ? count($_SESSION['wishlist']) : 0;
}
$currency = '₹';
$categories = getData("tbl_category");

?>
<style>
    .mega-menu {
        opacity: 0;
        margin-top: 5px;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .group:hover .mega-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .category-hover:hover {
        background: rgba(0, 0, 0, 0.02);
        border-color: rgba(0, 0, 0, 0.1);
    }

    .accent-hover:hover {
        color: #000;
        background: rgba(0, 0, 0, 0.05);
    }

    .search-expand {
        width: 0;
        opacity: 0;
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .search-expand.active {
        width: 200px;
        opacity: 10;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-slideDown {
        animation: slideDown 0.4s ease-out;
    }



    .loader-pulse {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(59, 130, 246, 0.3);
        border-radius: 50%;
        border-top-color: #3b82f6;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>

<!-- Tailwind Animations -->
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.6s ease-out;
    }
</style>

<nav class="sticky w-full flex flex-col items-center justify-between shadow-md z-50 top-0 bg-white">
    <div class="flex items-center justify-center w-full px-6 py-0.5 bg-black sticky top-0 z-50">
        <p id="rotating-text1" class="text-sm max-md:text-xs text-white font-medium tracking-wide"></p>
    </div>

    <div class="w-full max-md:w-[95vw] flex items-center justify-between ">

        <div class="flex items-center space-x-7 ml-5 max-md:hidden">
            <a href="/" class="block">
                <div class="flex items-center gap-1 relative">
                    <img src="/public/logos/nova_logo-brnd-name.png" alt="Brand Logo"
                        class="w-auto h-[6vh] rounded-md object-cover my-2 max-md:hidden">
                </div>
            </a>
        </div>


        <!-- Mobile Menu Toggle Button -->
        <div class="md:hidden flex items-center">
            <button id="menu-toggle" class="p-2">
                <svg class="svgBars anarkali-svg-icon" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="0" y1="12" x2="21" y2="12"></line>
                    <line x1="0" y1="6" x2="21" y2="6"></line>
                    <line x1="0" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>

            <button
                class="openSearch text-black max-md:text-xs rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95">
                <svg class="svgSearch anarkali-svg-icon" width="22" height="22" fill="currentColor" viewBox="0 0 48 48"
                    enable-background="new 0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path
                            d="m40.2850342 37.4604492-6.4862061-6.4862061c1.9657593-2.5733643 3.0438843-5.6947021 3.0443115-8.9884033 0-3.9692383-1.5458984-7.7011719-4.3530273-10.5078125-2.8066406-2.8066406-6.5380859-4.3525391-10.5078125-4.3525391-3.9692383 0-7.7011719 1.5458984-10.5078125 4.3525391-5.7939453 5.7944336-5.7939453 15.222168 0 21.015625 2.8066406 2.8071289 6.5385742 4.3530273 10.5078125 4.3530273 3.2937012-.0004272 6.4150391-1.0785522 8.9884033-3.0443115l6.4862061 6.4862061c.3901367.390625.9023438.5859375 1.4140625.5859375s1.0239258-.1953125 1.4140625-.5859375c.78125-.7807617.78125-2.0473633 0-2.828125zm-25.9824219-7.7949219c-4.234375-4.234375-4.2338867-11.1245117 0-15.359375 2.0512695-2.0507813 4.7788086-3.1806641 7.6796875-3.1806641 2.9013672 0 5.628418 1.1298828 7.6796875 3.1806641 2.0512695 2.0512695 3.1811523 4.7788086 3.1811523 7.6796875 0 2.9013672-1.1298828 5.628418-3.1811523 7.6796875s-4.7783203 3.1811523-7.6796875 3.1811523c-2.9008789.0000001-5.628418-1.1298827-7.6796875-3.1811523z">
                        </path>
                    </g>
                </svg>
            </button>
        </div>

        <!-- Logo- mobile -->
        <div class="flex items-center md:hidden mx-auto">
            <a href="/" class="block">
                <div class="flex items-center gap-1 relative">
                </div> <img src="/public/logos/nova_logo-brnd-name.png" alt="Logo" class="h-8">
            </a>
        </div>

        <div class="flex items-center absolute left-1/2 transform -translate-x-1/2 space-x-7 max-md:hidden">
            <div class="relative group">
                <a href="/new-arrivals"
                    class="text-gray-800  group duration-300 cursor-pointer <?= $pageTitle == 'New Arrivals' ? 'text-orange-500 border-b-2 border-orange-500' : '' ?>">NEW
                    ARRIVALS
                    <span
                        class="absolute -bottom-0 left-1/2 w-0 transition-all h-0.5 bg-[#f25b21] <?= $pageTitle == 'New Arrivals' ? 'w-3/6' : '' ?> group-hover:w-3/6"></span>
                    <span
                        class="absolute -bottom-0 right-1/2 w-0 transition-all h-0.5 bg-[#f25b21] <?= $pageTitle == 'New Arrivals' ? 'w-3/6' : '' ?> group-hover:w-3/6"></span>
                </a>
            </div>
            <?php


            foreach ($categories as $key => $value) {
                $category = strtolower(str_replace(" ", "-", $value['category']));
            ?>
                <div class="relative group">
                    <a href="/category/<?= $category ?>"
                        class="text-gray-800  group duration-300 cursor-pointer <?= $category == $category_name ? 'text-orange-500 border-b-2 border-orange-500' : '' ?>"><?= $value['category'] ?>
                        <span
                            class="absolute -bottom-0 left-1/2 w-0 transition-all h-0.5 bg-[#f25b21] <?= $category == $category_name ? 'w-3/6' : '' ?> group-hover:w-3/6"></span>
                        <span
                            class="absolute -bottom-0 right-1/2 w-0 transition-all h-0.5 bg-[#f25b21] <?= $category == $category_name ? 'w-3/6' : '' ?> group-hover:w-3/6"></span>
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="flex md:gap-1 items-center md:pr-12 max-md:pr-1 py-1.5">
            <div class="flex items-center max-md:hidden">
                <button
                    class="openSearch text-black p-2 max-md:text-xs rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95">
                    <svg class="svgSearch anarkali-svg-icon" width="24px" height="24px" fill="currentColor"
                        viewBox="0 0 48 48" enable-background="new 0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path
                                d="m40.2850342 37.4604492-6.4862061-6.4862061c1.9657593-2.5733643 3.0438843-5.6947021 3.0443115-8.9884033 0-3.9692383-1.5458984-7.7011719-4.3530273-10.5078125-2.8066406-2.8066406-6.5380859-4.3525391-10.5078125-4.3525391-3.9692383 0-7.7011719 1.5458984-10.5078125 4.3525391-5.7939453 5.7944336-5.7939453 15.222168 0 21.015625 2.8066406 2.8071289 6.5385742 4.3530273 10.5078125 4.3530273 3.2937012-.0004272 6.4150391-1.0785522 8.9884033-3.0443115l6.4862061 6.4862061c.3901367.390625.9023438.5859375 1.4140625.5859375s1.0239258-.1953125 1.4140625-.5859375c.78125-.7807617.78125-2.0473633 0-2.828125zm-25.9824219-7.7949219c-4.234375-4.234375-4.2338867-11.1245117 0-15.359375 2.0512695-2.0507813 4.7788086-3.1806641 7.6796875-3.1806641 2.9013672 0 5.628418 1.1298828 7.6796875 3.1806641 2.0512695 2.0512695 3.1811523 4.7788086 3.1811523 7.6796875 0 2.9013672-1.1298828 5.628418-3.1811523 7.6796875s-4.7783203 3.1811523-7.6796875 3.1811523c-2.9008789.0000001-5.628418-1.1298827-7.6796875-3.1811523z">
                            </path>
                        </g>
                    </svg>
                </button>
            </div>

            <button <?= isset($_SESSION['userid']) && !empty($_SESSION['userid']) ? 'onclick="window.location.href=\'/profile\'"' : 'id="openLogin"' ?>
                class="nav-text text-black p-2 max-md:p-1 rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95">
                <div class="max-md:hidden flex items-center justify-center gap-1">
                    <svg class="svgUser2 anarkali-svg-icon" enable-background="new 0 0 512 512" height="24px"
                        viewBox="0 0 512 512" width="24px" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <g>
                                <path
                                    d="m256 253.7c-62 0-112.4-50.4-112.4-112.4s50.4-112.4 112.4-112.4 112.4 50.4 112.4 112.4-50.4 112.4-112.4 112.4zm0-195.8c-46 0-83.4 37.4-83.4 83.4s37.4 83.4 83.4 83.4 83.4-37.4 83.4-83.4-37.4-83.4-83.4-83.4z">
                                </path>
                            </g>
                            <g>
                                <path
                                    d="m452.1 483.2h-392.2c-8 0-14.5-6.5-14.5-14.5 0-106.9 94.5-193.9 210.6-193.9s210.6 87 210.6 193.9c0 8-6.5 14.5-14.5 14.5zm-377-29.1h361.7c-8.1-84.1-86.1-150.3-180.8-150.3s-172.7 66.2-180.9 150.3z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <div>
                        <div class="font-thin text-xs flex flex-col items-start justify-start "><span class="text-gray-600">Hello,</span>
                            <span class="font-semibold uppercase tracking-wider">
                                <?php
                                if (isset($_SESSION['fname']) && trim($_SESSION['fname']) !== '') {
                                    echo $_SESSION['fname'] . ' ' . $_SESSION['lname'];
                                } elseif (isset($_SESSION['fname']) && trim($_SESSION['fname']) === '') {
                                    echo 'My Profile';
                                } else {
                                    echo 'Guest';
                                }
                                ?>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="md:hidden">
                    <svg class="svgUser2 anarkali-svg-icon" enable-background="new 0 0 512 512" height="22px"
                        viewBox="0 0 512 512" width="22px" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <g>
                                <path
                                    d="m256 253.7c-62 0-112.4-50.4-112.4-112.4s50.4-112.4 112.4-112.4 112.4 50.4 112.4 112.4-50.4 112.4-112.4 112.4zm0-195.8c-46 0-83.4 37.4-83.4 83.4s37.4 83.4 83.4 83.4 83.4-37.4 83.4-83.4-37.4-83.4-83.4-83.4z">
                                </path>
                            </g>
                            <g>
                                <path
                                    d="m452.1 483.2h-392.2c-8 0-14.5-6.5-14.5-14.5 0-106.9 94.5-193.9 210.6-193.9s210.6 87 210.6 193.9c0 8-6.5 14.5-14.5 14.5zm-377-29.1h361.7c-8.1-84.1-86.1-150.3-180.8-150.3s-172.7 66.2-180.9 150.3z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </div>
            </button>

            <div class="flex items-center max-md:hidden relative">
                <button onclick="window.location.href='/wishlist'"
                    class="nav-text text-black p-2 rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95">
                    <div class="max-md:hidden">
                        <svg class="svgLove anarkali-svg-icon" width="24px" height="24px" fill="currentColor"
                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m29.55 6.509c-1.73-2.302-3.759-3.483-6.031-3.509h-.076c-3.29 0-6.124 2.469-7.443 3.84-1.32-1.371-4.153-3.84-7.444-3.84h-.075c-2.273.026-4.3 1.207-6.059 3.549a8.265 8.265 0 0 0 1.057 10.522l11.821 11.641a1 1 0 0 0 1.4 0l11.82-11.641a8.278 8.278 0 0 0 1.03-10.562zm-2.432 9.137-11.118 10.954-11.118-10.954a6.254 6.254 0 0 1 -.832-7.936c1.335-1.777 2.831-2.689 4.45-2.71h.058c3.48 0 6.627 3.924 6.658 3.964a1.037 1.037 0 0 0 1.57 0c.032-.04 3.2-4.052 6.716-3.964a5.723 5.723 0 0 1 4.421 2.67 6.265 6.265 0 0 1 -.805 7.976z">
                            </path>
                        </svg>
                    </div>
                </button>
                <span
                    class="absolute -top-1 max-md:-top-2 -right-3 max-md:right-0 bg-[#f25b21] text-white text-xs h-5 w-5 flex items-center justify-center rounded-full shadow-md"
                    id="wishlist-count">
                    <?= $wishlistcount ?>
                </span>
            </div>

            <div class="relative max-md:mr-1">
                <button
                    class=" nav-text text-black p-2 max-md:p-1 rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95"
                    onclick="openCart()">
                    <div class="max-md:hidden">
                        <svg class="shopBag anarkali-svg-icon" width="24px" height="24px" fill="currentColor"
                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m26 8.9a1 1 0 0 0 -1-.9h-3a6 6 0 0 0 -12 0h-3a1 1 0 0 0 -1 .9l-1.78 17.8a3 3 0 0 0 .78 2.3 3 3 0 0 0 2.22 1h17.57a3 3 0 0 0 2.21-1 3 3 0 0 0 .77-2.31zm-10-4.9a4 4 0 0 1 4 4h-8a4 4 0 0 1 4-4zm9.53 23.67a1 1 0 0 1 -.74.33h-17.58a1 1 0 0 1 -.74-.33 1 1 0 0 1 -.26-.77l1.7-16.9h2.09v3a1 1 0 0 0 2 0v-3h8v3a1 1 0 0 0 2 0v-3h2.09l1.7 16.9a1 1 0 0 1 -.26.77z">
                            </path>
                        </svg>
                    </div>
                    <div class="md:hidden mt-1">
                        <svg class="shopBag anarkali-svg-icon" width="22px" height="22px" fill="currentColor"
                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m26 8.9a1 1 0 0 0 -1-.9h-3a6 6 0 0 0 -12 0h-3a1 1 0 0 0 -1 .9l-1.78 17.8a3 3 0 0 0 .78 2.3 3 3 0 0 0 2.22 1h17.57a3 3 0 0 0 2.21-1 3 3 0 0 0 .77-2.31zm-10-4.9a4 4 0 0 1 4 4h-8a4 4 0 0 1 4-4zm9.53 23.67a1 1 0 0 1 -.74.33h-17.58a1 1 0 0 1 -.74-.33 1 1 0 0 1 -.26-.77l1.7-16.9h2.09v3a1 1 0 0 0 2 0v-3h8v3a1 1 0 0 0 2 0v-3h2.09l1.7 16.9a1 1 0 0 1 -.26.77z">
                            </path>
                        </svg>
                    </div>
                </button>
                <span
                    class="absolute -top-1 max-md:-top-1 -right-3 max-md:-right-2 bg-[#f25b21] text-white text-xs h-5 w-5 flex items-center justify-center rounded-full shadow-md"
                    id="cart-count">
                    <?= $count ?>
                </span>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar (Mobile) -->
<div id="mobile-sidebar"
    class="fixed top-0 left-0 h-screen w-[85%] max-w-xs bg-white shadow-2xl transform -translate-x-full transition-transform duration-300 ease-in-out z-[100] overflow-y-auto">

    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-black">Boys Collection</h2>
        <button id="menu-close" class="text-gray-600 hover:text-black text-xl animate-rotate-pingpong">
            ✕
        </button>
    </div>

    <div class="px-4 py-6 space-y-6">
        <div class="space-y-3 flex flex-col">
            <div class="border-b border-gray-200">
                <a href="/new-arrivals" class="w-full flex justify-between items-center pb-4 text-gray-900 font-medium">
                    NEW ARRIVALS
                </a>
            </div>

            <?php
            foreach ($categories as $key => $value) {
                $category = strtolower(str_replace(" ", "-", $value['category']));
            ?>
                <div class="border-b border-gray-200">
                    <a href="/category/<?= $category ?>"
                        class="w-full flex justify-between items-center pb-4 text-gray-900 font-medium"><?= $value['category'] ?>
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="space-y-4">
            <h3 class="text-base font-semibold text-gray-900">Trending Products</h3>
            <div class="flex w-full gap-3 overflow-x-scroll">
                <!-- Product 1 -->
                <?php
                foreach ($uniqueProducts as $key => $product) {
                    if($key > 3) break;
                    $varients = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = $product[id]")[0];
                    // printWithPre($varients);
                    $images = json_decode($varients['images'], true);
                    $images = array_reverse($images);
                    $price = floatval($varients['price']);
                    $name = str_replace(' ', '-', $product['name']);
                    $name = str_replace("'", '', $name);
                ?>
                    <a href="/products/product-details/<?= $name ?>">
                        <div class="border overflow-hidden shadow-sm hover:shadow-md transition w-36 h-auto">
                            <img src="/<?= $images[0] ?>" alt="Product 1" class="w-full h-40 object-cover">
                            <div class="p-2">
                                <p class="text-sm font-medium text-gray-800 truncate"><?= $product['name'] ?></p>
                                <p class="text-xs text-[#f25b21]">$<?= $price ?></p>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>

            <a href="/shop"
                class="block text-center px-4 py-2 rounded-md border border-black font-semibold text-black hover:bg-black hover:text-white transition">
                View All
            </a>
        </div>

    </div>
</div>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black/40 hidden z-[90]"></div>

<!-- Script -->
<script>
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const sidebar = document.getElementById('mobile-sidebar');
    const overlay = document.getElementById('overlay');
    const accordionHeaders = document.querySelectorAll('.accordion-header');

    // Sidebar open/close
    menuToggle.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
    });

    menuClose.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });

    // Accordion toggle
    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const icon = header.querySelector('i');

            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180'); // rotate chevron
        });
    });
</script>

<div id="loginModal"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center hidden z-[9999]">
    <div
        class="relative flex flex-col md:flex-row w-[90%] md:w-[70%] max-w-5xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.5)] animate-fade-in">

        <button id="closeLogin"
            class="absolute top-3 right-3 z-40 text-gray-600 max-md:text-white hover:text-black text-xl animate-rotate-pingpong">
            ✕
        </button>

        <div
            class="flex flex-col justify-center items-center w-full md:w-[55%] bg-gradient-to-br from-gray-900 via-black to-gray-800 text-white p-10 max-md:p-4 relative">
            <div
                class="absolute -top-20 -left-20 w-60 h-60 bg-gradient-to-tr from-yellow-500/30 to-orange-500/20 rounded-full blur-3xl">
            </div>
            <img src="/public/logos/logo-white.png" alt="Logo" class="mb-6 max-md:mb-2 h-24 max-md:h-16 drop-shadow-lg">
            <h2 class="text-lg md:text-4xl font-extrabold text-center leading-snug tracking-tight">
                <!-- Unlock the <span class="text-orange-400">Spirit</span><br>
                Conquer the <span class="text-orange-400">Style</span> -->
                Unlock the <span class="text-orange-400">Style</span>
            </h2>
            <div class="mt-10 max-md:mt-4">
                <!-- Desktop/Tablet Grid -->
                <div class="hidden md:grid grid-cols-3 gap-6 text-center text-sm">
                    <div>
                        <p class="text-2xl">⭐</p>
                        <p class="mt-2 opacity-80">1,00,000+<br>Happy Customers</p>
                    </div>
                    <div>
                        <p class="text-2xl">⭐</p>
                        <p class="mt-2 opacity-80">Fast<br>24hr Shipping</p>
                    </div>
                    <div>
                        <p class="text-2xl">⭐</p>
                        <p class="mt-2 opacity-80">9,820+<br>Pincodes Reached</p>
                    </div>
                </div>

                <div class="md:hidden relative w-full overflow-hidden">
                    <div id="mobileCarousel" class="flex transition-transform duration-700 ease-in-out">
                        <div class="w-full flex-shrink-0 text-center text-sm">
                            <p class="text-2xl">⭐</p>
                            <p class="mt-2 opacity-80">1,00,000+ Happy Customers</p>
                        </div>
                        <div class="w-full flex-shrink-0 text-center text-sm">
                            <p class="text-2xl">⭐</p>
                            <p class="mt-2 opacity-80">Fast 24hr Shipping</p>
                        </div>
                        <div class="w-full flex-shrink-0 text-center text-sm">
                            <p class="text-2xl">⭐</p>
                            <p class="mt-2 opacity-80">9,820+ Pincodes Reached</p>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const mobileCarousel = document.getElementById("mobileCarousel");
                const mobileSlides = mobileCarousel.children.length;
                let mobileIndex = 0;

                setInterval(() => {
                    mobileIndex = (mobileIndex + 1) % mobileSlides;
                    mobileCarousel.style.transform = `translateX(-${mobileIndex * 100}%)`;
                }, 2500); // change every 2.5s
            </script>


        </div>

        <div class="flex flex-col justify-center w-full md:w-[45%] bg-white p-8 max-md:p-4 relative">
            <!-- <div
                class="absolute bottom-0 right-0 w-40 h-40 bg-gradient-to-tr from-yellow-400/20 to-orange-500/20 rounded-full blur-2xl">
            </div> -->

            <h3 class="text-2xl font-bold text-gray-900 text-center mb-4 max-md:mb-2">Start Your Style Journey</h3>

            <form action="/" method="POST" id="otp-form">
                <input type="text" placeholder="" name="username" class="hidden" id="username">
                <!-- <input type="text" placeholder="" name="from" class="hidden" id="user_from" value="otp"> -->
                <div class="flex items-center border rounded-lg overflow-hidden gap-2 mb-4" id="mobile-div">
                    <img src="/public/logos/india.png" class="h-7 pl-3" alt="">
                    <span class="pr-1 text-gray-600">+91</span> <input type="tel" placeholder="Enter mobile number"
                        name="mobile" id="mobile" class="w-full px-3 py-2 outline-none border-l">
                </div>
                <div class="relative font-inter antialiased hidden flex flex-col items-center justify-center"
                    id="otp-div">
                    <p>We have send verification code to </p>
                    <div><span id="mobile-span" class="font-bold"></span> &ensp; <span
                            class="text-xs text-green-500 p-1 px-2 border border-green-500 cursor-pointer"
                            onclick="EditotpNumber()">Edit</span></div>
                    <main class="relative flex flex-col justify-center mt-2 overflow-hidden">
                        <div class="w-full mx-auto">
                            <div class="flex justify-center w-full">

                                <div class="w-full mx-auto text-center bg-white  md:pt-3 rounded-xl">

                                    <div class="flex items-center justify-between gap-3 px-10 w-full">
                                        <input type="text"
                                            class="w-12 h-12 max-md:h-10 max-md:w-10 text-center text-2xl max-md:text-lg otp-input font-extrabold max-md:font-semibold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 max-md:p-2 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                            pattern="\d*" maxlength="1" />
                                        <input type="text"
                                            class="w-12 h-12 max-md:h-10 max-md:w-10 text-center text-2xl max-md:text-lg otp-input font-extrabold max-md:font-semibold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 max-md:p-2 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                            maxlength="1" />
                                        <input type="text"
                                            class="w-12 h-12 max-md:h-10 max-md:w-10 text-center text-2xl max-md:text-lg otp-input font-extrabold max-md:font-semibold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 max-md:p-2 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                            maxlength="1" />
                                        <input type="text"
                                            class="w-12 h-12 max-md:h-10 max-md:w-10 text-center text-2xl max-md:text-lg otp-input font-extrabold max-md:font-semibold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 max-md:p-2 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                            maxlength="1" />
                                    </div>

                                    <div class="w-full mx-auto mt-4 max-md:mt-1">
                                        <div class="text-center bg-white px-5 py-2 max-md:py-1 max-md:px-2 rounded-lg shadow-md">
                                            <div class="text-sm text-gray-600 mb-1">Code expires in</div>
                                            <div id="countdown" class="text-2xl max-md:text-base font-bold text-blue-600 font-mono">00:30
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full mx-auto mt-4">
                                        <button type="button" name="login" id="verifyOtp"
                                            class="relative w-full py-2 rounded-md font-semibold overflow-hidden group border-2 border-black">Verify
                                            OTP</button>
                                    </div>
                                    <div class="text-sm text-slate-500 mt-4 max-md:mt-2">Didn't receive code? <button type="button"
                                            class="font-medium text-indigo-500 hover:text-indigo-600"
                                            onclick="ResendOtp()">Resend</button></div>
                                </div>

                            </div>
                        </div>
                    </main>
                </div>
                <!-- <div class="flex items-center mb-6">
                    <input type="checkbox" id="offers" class="mr-2 rounded border-gray-400 text-black focus:ring-black">
                    <label for="offers" class="text-sm text-gray-600">Notify me with offers & updates</label>
                </div> -->

                <button
                    class="relative w-full py-2 rounded-md font-semibold overflow-hidden group border-2 border-black"
                    id="sendOtp" type="button">
                    <span class="relative z-10 text-black group-hover:text-white transition-colors duration-1500">Send
                        OTP</span>
                    <span
                        class="absolute inset-0 bg-black scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-700"></span>
                </button>

                <div>
                    <p class="text-center text-gray-500 my-3 max-md:mt-1">or</p>
                </div>

                <div id="g_id_onload" style="display:flex; align-items:center; justify-content:center"
                    data-client_id="188574937788-fn4td4evj5cqejhrgge28pf8129sa58q.apps.googleusercontent.com"
                    data-callback="handleCredentialResponse" data-auto_select="false">
                </div>
                <div class="g_id_signin max-md:mt-[-4%]" data-type="standard"></div>
                <input type="hidden" id="password" name="password" value="">
                <input type="hidden" id="from" name="from" value="otp">
                <!-- <input type="" id="username" name="username" value=""> -->
                <input type="hidden" id="fname" name="fname" value="">
                <input type="hidden" id="lname" name="lname" value="">
                <input type="hidden" value="">
            </form>

            <p class="text-xs text-gray-500 text-center mt-4">
                I accept that I have read & understood the
                <a href="#" class="underline hover:text-black">Privacy Policy</a> and
                <a href="#" class="underline hover:text-black">T&Cs</a>.
            </p>
        </div>
    </div>
</div>

<div id="searchOverlay"
    class="fixed inset-0 bg-black/50 z-50 hidden flex items-center justify-center transition-opacity duration-500">
    <div
        class="bg-white w-[50%] max-md:w-[100%] md:h-[78vh] lg:h-[75vh] max-md:h-[105vh] relative p-8 max-md:p-4 max-md:mt-8 shadow-lg animate-slideDown flex flex-col">
        <button id="closeSearch"
            class="absolute top-4 right-6 text-2xl text-gray-700 hover:text-black animate-rotate-pingpong">
            <i class="fas fa-times"></i>
        </button>

        <div class="shrink-0">
            <h2 class="text-2xl font-semibold text-center mb-4 max-md:my-4">What are you looking for</h2>
            <div class="w-full max-w-2xl mx-auto mb-6">
                <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                    <input type="text" id="searchInput" oninput="searchProducts()" placeholder="Search our store"
                        class="w-full px-4 py-2 outline-none text-gray-700">

                    <!-- <div id="searchResults" class="grid grid-cols-2 gap-4 mt-4"></div> -->
                    <button class="px-4 text-gray-500 hover:text-black">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto pr-2">

            <!-- Loader -->
            <div id="loader" class="hidden flex justify-center items-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                <span class="ml-2 text-gray-600">Searching...</span>
            </div>

            <!-- Search Results -->
            <div id="searchResults" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-1 w-full h-auto">
            </div>
        </div>
    </div>
</div>


<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<script src="https://accounts.google.com/gsi/client" async defer></script>

<!-- <script>
    google.accounts.id.initialize({
        client_id: "188574937788-fn4td4evj5cqejhrgge28pf8129sa58q.apps.googleusercontent.com",
        callback: handleCredentialResponse,
        use_fedcm_for_prompt: false // 👈 fallback if FedCM is blocked
    });
</script> -->

<script>
    // const messages = [
    //     ' Nova Kids – Style That Moves!',
    //     ' Free Delivery on Orders Over Rs.2000',
    //     ' Trendy Threads for Legends!',
    //     ' Cool Clothes for Cool Boys!',
    //     ' Gear Up for Adventures in Style!'
    // ];

    const messages = <?= json_encode($navbar_heading) ?>;

    let index = 0;
    const textElement = document.getElementById("rotating-text1");

    function showMessage() {
        textElement.classList.add("opacity-0");

        setTimeout(() => {
            // ✅ use the `heading` property from object
            textElement.textContent = messages[index].title;
            textElement.classList.remove("opacity-0");
        }, 500);

        index = (index + 1) % messages.length;
    }

    // ✅ initial text
    textElement.textContent = messages[index].title;
    index++;

    // Smooth transition class
    textElement.classList.add("transition-opacity", "duration-700", "opacity-100");

    // Rotate every 2s
    setInterval(showMessage, 2000);
</script>

<script>
    const openSearchButtons = document.querySelectorAll(".openSearch");
    const closeSearch = document.getElementById("closeSearch");
    const searchOverlay = document.getElementById("searchOverlay");

    // Add click event to all search buttons
    openSearchButtons.forEach(button => {
        button.addEventListener("click", () => {
            searchOverlay.classList.remove("hidden");
        });
    });

    // Close button
    closeSearch.addEventListener("click", () => {
        searchOverlay.classList.add("hidden");
    });

    // Close overlay when pressing ESC
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            searchOverlay.classList.add("hidden");
        }
    });
</script>


<!-- Login Script -->
<script>
    const openBtn = document.getElementById('openLogin');
    const closeBtn = document.getElementById('closeLogin');
    const modal = document.getElementById('loginModal');
    if (openBtn) {
        openBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });
    }

    function openLogin() {
        console.log("openLogin")
        modal.classList.remove('hidden');
    }

    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Optional: close when clicking outside modal
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
    const form = document.getElementById("otp-form");
    const inputs = [...form.querySelectorAll(".otp-input")];
    const submit = form.querySelector("button[type=button]");
    document.addEventListener("DOMContentLoaded", () => {


        const handleKeyDown = (e) => {
            // Allow only numeric keys, Backspace, Delete, Tab, or Meta
            if (
                !/^[0-9]{1}$/.test(e.key) &&
                e.key !== 'Backspace' &&
                e.key !== 'Delete' &&
                e.key !== 'Tab' &&
                !e.metaKey
            ) {
                e.preventDefault();
            }

            if (e.key === 'Delete' || e.key === 'Backspace') {
                const index = inputs.indexOf(e.target);

                // 🧹 Always clear current input value first
                inputs[index].value = '';

                // ⬅️ Then move focus to previous input (if not first)
                if (index > 0) {
                    inputs[index - 1].focus();
                }

                e.preventDefault(); // optional — prevents weird browser behavior
            }
        };

        const handleInput = (e) => {
            const {
                target
            } = e
            const index = inputs.indexOf(target)
            if (target.value) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus()
                } else {
                    submit.focus()
                }
            }
        }

        const handleFocus = (e) => {
            e.target.select()
        }

        const handlePaste = (e) => {
            e.preventDefault()
            const text = e.clipboardData.getData('text')
            if (!new RegExp(`^[0-9]{${inputs.length}}$`).test(text)) {
                return
            }
            const digits = text.split('')
            inputs.forEach((input, index) => input.value = digits[index])
            submit.focus()
        }

        inputs.forEach((input) => {
            input.addEventListener('input', handleInput)
            input.addEventListener('keydown', handleKeyDown)
            input.addEventListener('focus', handleFocus)
            input.addEventListener('paste', handlePaste)
        })
    })
    let timeLeft = 30; // 60 seconds = 1 minute
    const countdownEl = document.getElementById('countdown');
    let timerInterval;

    const sendOtp = document.getElementById('sendOtp');
    const mobileInput = document.getElementById('mobile');
    const OtpDiv = document.getElementById('otp-div');
    const verifyOtp = document.getElementById('verifyOtp');
    const mobileDiv = document.getElementById('mobile-div');
    const mobilespan = document.getElementById('mobile-span');
    const Username = document.getElementById('username');

    let currentOtp = null;
    let currentUserData = null;

    function updateTimer() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;

        countdownEl.textContent =
            `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        if (timeLeft === 0) {
            countdownEl.classList.remove('text-blue-600');
            countdownEl.classList.add('text-red-600');
            countdownEl.textContent = '00:00';
            clearInterval(timerInterval);

            document.getElementById("otp-div").classList.add("hidden");
            document.getElementById("mobile-div").classList.remove("hidden");
            sendOtp.classList.remove("hidden");

            console.log("Timer expired");
        } else {
            timeLeft--;
        }
    }

    sendOtp.addEventListener('click', async () => {
        if (mobileInput.value !== "" && mobileInput.value.length === 10) {
            const response = await axios.post('/api/send-otp', new URLSearchParams({
                phone: mobileInput.value,
            }));
            console.log(response.data);

            if (response.data.success) {
                // ✅ Save OTP + user
                window.currentOtp = response.data.otp;
                window.currentUserData = response.data.data;

                // 🔄 Reset and start timer
                timeLeft = 30;
                countdownEl.classList.add('text-blue-600');
                countdownEl.classList.remove('text-red-600');
                clearInterval(timerInterval);
                updateTimer();
                timerInterval = setInterval(updateTimer, 1000);

                mobilespan.innerHTML = '+91 ' + mobileInput.value;
                mobileDiv.classList.add('hidden');
                sendOtp.classList.add('hidden');
                OtpDiv.classList.remove('hidden');
            } else {
                toastr.error(response.data.message);
            }
        } else {
            toastr.error("Please Enter Valid number");
        }
    });

    verifyOtp.addEventListener('click', async () => {
        const otpInput = inputs.map(input => input.value).join("");

        if (otpInput === window.currentOtp) {
            Username.value = window.currentUserData.username;
            verifyOtp.type = "submit";
            verifyOtp.click();
        } else {
            toastr.error("OTP Verification Failed");
        }
    });

    function EditotpNumber() {
        mobileDiv.classList.remove('hidden');
        sendOtp.classList.remove('hidden');
        OtpDiv.classList.add('hidden');
    }

    async function ResendOtp() {
        if (mobileInput.value !== "" && mobileInput.value.length === 10) {
            try {
                const response = await axios.post('/api/send-otp', new URLSearchParams({
                    phone: mobileInput.value,
                }));

                if (response.data.success) {
                    // ✅ Save OTP again
                    console.log(response.data);
                    window.currentOtp = response.data.otp;
                    window.currentUserData = response.data.data;

                    // 🔄 Reset timer and UI
                    timeLeft = 60;
                    countdownEl.classList.add('text-blue-600');
                    countdownEl.classList.remove('text-red-600');
                    clearInterval(timerInterval);
                    updateTimer();
                    timerInterval = setInterval(updateTimer, 1000);

                    mobilespan.innerHTML = '+91 ' + mobileInput.value;
                    mobileDiv.classList.add('hidden');
                    sendOtp.classList.add('hidden');
                    OtpDiv.classList.remove('hidden');

                    toastr.success("OTP resent successfully");
                } else {
                    toastr.error(response.data.message);
                }
            } catch (error) {
                toastr.error("Failed to resend OTP");
                console.error(error);
            }
        } else {
            toastr.error("Please enter a valid number");
        }
    }
</script>
<script>
    const verifyOtp1 = document.getElementById('loginform');

    function handleCredentialResponse(response) {
        // decodeJwtResponse() is a custom function defined by you
        // to decode the credential response.
        const responsePayload = decodeJwtResponse(response.credential);
        console.log(responsePayload)
        console.log("ID: " + responsePayload.sub);
        console.log('Full Name: ' + responsePayload.name);
        console.log('Given Name: ' + responsePayload.given_name);
        console.log('Family Name: ' + responsePayload.family_name);
        console.log("Image URL: " + responsePayload.picture);
        console.log("Email: " + responsePayload.email);

        // document.getElementById("passemeail").removeAttribute('required');
        // document.getElementById("password").removeAttribute('required');


        document.getElementById("password").value = "zyxwvutsrqponmlkjihgfedcba";
        document.getElementById("fname").value = responsePayload.given_name
        document.getElementById("lname").value = responsePayload.family_name
        document.getElementById("mobile").value = ""
        document.getElementById("username").value = responsePayload.email
        document.getElementById("from").value = "google";
        // document.getElementById("loginform").click();
        verifyOtp.type = "submit"
        verifyOtp.click();


    }

    function decodeJwtResponse(token) {
        var base64Url = token.split('.')[1];
        var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
        var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
        }).join(''));

        return JSON.parse(jsonPayload);
    }
</script>

<script>
    let debounceTimer;


    async function searchProducts() {
        let ele = document.getElementById("searchInput");
        clearTimeout(debounceTimer);

        let search = ele.value.trim();

        // if search empty, clear results and hide loader
        // if (search == "") {
        //     document.getElementById("searchResults").innerHTML = "";
        //     document.getElementById("loader").classList.add("hidden");
        //     return;
        // }

        // show loader immediately when user starts typing
        document.getElementById("loader").classList.remove("hidden");
        document.getElementById("searchResults").innerHTML = "";

        debounceTimer = setTimeout(async () => {

            try {
                let res = await fetch("/api/search-product", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        search
                    })
                });

                let data = await res.json();
                console.log(data);

                if (data.success) {
                    let html = ``;

                    data.data.forEach(product => {
                        let parsed = JSON.parse(product.product_images);

                        let name = product.name.replace(/ /g, '-'); // Replace spaces with dashes
                        name = name.replace(/'/g, ''); // Remove all single quotes


                        html += `
                        <a href="/products/product-details/${name}" target="_blank" class="flex h-full w-full">
                            <div class="border overflow-hidden hover:shadow-md transition h-auto w-full">
                                <img src="/${parsed[0]}" alt="${product.name}" class="w-full h-40 object-cover">
                                <div class="p-2">
                                    <h3 class="font-semibold text-sm">${product.name}</h3>
                                    <p class="text-gray-500 text-sm">₹${product.price}</p>
                                </div>
                            </div>
                        </a>
                `;
                    });

                    document.getElementById("searchResults").innerHTML = html;
                } else {
                    // Handle no results case
                    document.getElementById("searchResults").innerHTML = `
                    <div class="text-center py-8 text-gray-500">
                        <p>No products found for "${search}"</p>
                    </div>
                `;
                }

            } catch (err) {
                console.error("Error:", err);
                // Show error message
                document.getElementById("searchResults").innerHTML = `
                <div class="text-center py-8 text-red-500">
                    <p>Error loading results. Please try again.</p>
                </div>
            `;
            } finally {
                // hide loader
                document.getElementById("loader").classList.add("hidden");
            }

        }, 500); // 500ms debounce
    }

    searchProducts();
</script>