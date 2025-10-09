<?php

// printWithPre($_SESSION);

// printWithPre($ProductData);
$page = "product-details";
if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {


    $data = getData2("SELECT * FROM `tbl_wishlist` WHERE `product` = " . $ProductData['id'] . " AND `userid` = " . $_SESSION["userid"])[0];
} else {

    $data = checkExisteingWishlistSession($ProductData['id']);
    if ($data) {
        $data = ['id' => $data];
    } else {
        $data = [];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>


<body class="overflow-x-hidden archivo-narrow-k">

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <style>
        /* Position nav buttons top-right */
        .review-carousel .owl-nav {
            position: absolute;
            top: -58px;
            /* adjust as needed */
            right: 0;
            display: flex;
            gap: 8px;
        }

        /* Style nav buttons */
        .review-carousel .owl-nav button.owl-prev,
        .review-carousel .owl-nav button.owl-next {
            background-color: black !important;
            color: white !important;
            border-radius: 50%;
            /* makes it circular */
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px !important;
            line-height: 1;
            border: none !important;
        }

        /* Hover effect */
        .review-carousel .owl-nav button:hover {
            background-color: #333 !important;
        }

        /* Remove default focus outline */
        .review-carousel .owl-nav button:focus {
            outline: none !important;
        }
    </style>
    <style>
        .like-carousel .owl-nav {
            position: absolute;
            top: -60px;
            left: 90%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .like-carousel .owl-nav button span {
            font-size: 16px;
            padding: 6px 10px;
            background: #000000ff;
            color: white;
            border-radius: 9999px;
            transition: all 0.3s ease;
        }
    </style>
    <style>
        .image-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .image-hover:hover {
            transform: scale(1.05) rotate(1deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .accordion-content {
            height: 0;
            overflow: hidden;
            transition: height 0.6s ease;
        }

        .accordion.open .accordion-content {
            height: auto;
            /* set dynamically via JS */
        }

        .accordion .chev {
            transition: transform 0.3s ease;
        }

        .accordion.open .chev {
            transform: rotate(180deg);
        }


        .floating-badge {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes slideDown {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slideDown {
            animation: slideDown 0.3s ease-out;
        }
    </style>

    <!-- Breadcrumbs -->
    <div class="text-sm pt-6 px-6">
        <ol class="flex items-center space-x-2 text-gray-500">
            <li>
                <a href="/" class="hover:text-black">Home</a>
            </li>
            <li>
                <span class="mx-1">/</span>
            </li>
            <li class="text-black font-semibold">Product Details</li>
        </ol>
    </div>

    <div class="w-full mx-auto mt-6 flex flex-col items-center justify-center">
        <section class="flex max-md:flex-col items-start justify-center relative w-[90%] gap-0 max-md:gap-6">

            <div class="flex items-center justify-start max-md:hidden gap-2 w-[55%] max-md:w-full">
                <div class="grid grid-cols-2 gap-2 w-[96%]" id="ProductDetailImg">
                    <?php
                    if (is_array($ppimages[0])) {
                        $ppimages[0] = array_reverse($ppimages[0]);
                        // array_reverse($ppimages[0]);
                        foreach ($ppimages[0] as $key => $image) {

                    ?>
                            <div class=" overflow-hidden  cursor-pointer">
                                <img src="/<?= $image ?>" alt="View 1"
                                    class="w-full h-full object-cover image-hover cursor-zoom-in">
                            </div>
                    <?php }
                    } ?>

                </div>
            </div>

            <!-- Mobile Carousel -->
            <div class="md:hidden relative w-[65%] max-md:w-full">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <img src="/public/images/222.avif" alt="View 1"
                                class="w-full h-[400px] object-cover shadow-lg cursor-zoom-in">
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <img src="/public/images/333.avif" alt="View 2"
                                class="w-full h-[400px] object-cover shadow-lg cursor-zoom-in">
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <img src="/public/images/444.avif" alt="View 3"
                                class="w-full h-[400px] object-cover shadow-lg cursor-zoom-in">
                        </div>

                        <!-- Slide 4 -->
                        <div class="swiper-slide">
                            <img src="/public/images/7.webp" alt="View 4"
                                class="w-full h-[400px] object-cover shadow-lg cursor-zoom-in">
                        </div>
                    </div>

                    <!-- Pagination (dots) -->
                    <div class="swiper-pagination"></div>
                </div>

                <!-- Single View Similar Button -->
                <button id="viewSimilarBtn"
                    class="absolute bottom-4 left-4 px-4 py-2 z-40 bg-white/80 text-black text-sm font-medium rounded-md shadow flex items-center gap-2">
                    <i class="fas fa-layer-group"></i> View Similar
                </button>

                <!-- Bottom Bar -->
                <div id="bottomBar"
                    class="fixed bottom-0 left-0 w-full bg-white shadow-2xl rounded-t-2xl transform translate-y-full transition-transform duration-300 ease-in-out z-[9999]">

                    <!-- Handle -->
                    <div class="w-12 h-1.5 bg-gray-300 rounded-full mx-auto my-3"></div>

                    <!-- Header -->
                    <div class="flex items-center justify-between px-4 pb-3 border-b border-gray-200">
                        <h3 class="text-base font-semibold text-gray-900">Similar Products</h3>
                        <button id="closeBottomBar"
                            class="text-gray-500 hover:text-black text-lg animate-rotate-pingpong">✕</button>
                    </div>

                    <!-- Product List -->
                    <div class="p-4 grid grid-cols-2 gap-3 max-h-[60vh] overflow-y-auto">
                        <div class="border shadow-sm overflow-hidden">
                            <img src="/public/images/f5.webp" alt="Product 1" class="w-full h-44 object-cover">
                            <div class="p-2">
                                <p class="text-sm font-medium text-gray-800 truncate">Oversized Tee</p>
                                <p class="text-xs text-gray-500">$24.99</p>
                            </div>
                        </div>

                        <div class="border shadow-sm overflow-hidden">
                            <img src="/public/images/f2.webp" alt="Product 2" class="w-full h-44 object-cover">
                            <div class="p-2">
                                <p class="text-sm font-medium text-gray-800 truncate">Slim Jogger</p>
                                <p class="text-xs text-gray-500">$34.99</p>
                            </div>
                        </div>

                        <div class="border shadow-sm overflow-hidden">
                            <img src="/public/images/f8.webp" alt="Product 3" class="w-full h-44 object-cover">
                            <div class="p-2">
                                <p class="text-sm font-medium text-gray-800 truncate">Streetwear Co-ord</p>
                                <p class="text-xs text-gray-500">$49.99</p>
                            </div>
                        </div>

                        <div class="border shadow-sm overflow-hidden">
                            <img src="/public/images/f10.webp" alt="Product 4" class="w-full h-44 object-cover">
                            <div class="p-2">
                                <p class="text-sm font-medium text-gray-800 truncate">Co-ord</p>
                                <p class="text-xs text-gray-500">$49.99</p>
                            </div>
                        </div>

                        <div class="border shadow-sm overflow-hidden">
                            <img src="/public/images/f5.webp" alt="Product 1" class="w-full h-44 object-cover">
                            <div class="p-2">
                                <p class="text-sm font-medium text-gray-800 truncate">Oversized Tee</p>
                                <p class="text-xs text-gray-500">$24.99</p>
                            </div>
                        </div>

                        <div class="border shadow-sm overflow-hidden">
                            <img src="/public/images/f2.webp" alt="Product 2" class="w-full h-44 object-cover">
                            <div class="p-2">
                                <p class="text-sm font-medium text-gray-800 truncate">Slim Jogger</p>
                                <p class="text-xs text-gray-500">$34.99</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- JS -->
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const viewBtn = document.getElementById("viewSimilarBtn");
                        const bottomBar = document.getElementById("bottomBar");
                        const closeBtn = document.getElementById("closeBottomBar");

                        viewBtn.addEventListener("click", () => {
                            bottomBar.classList.remove("translate-y-full");
                        });

                        closeBtn.addEventListener("click", () => {
                            bottomBar.classList.add("translate-y-full");
                        });
                    });
                </script>

            </div>


            <!-- Product Details Section -->
            <div class="md:sticky top-32 self-start space-y-4 w-[45%] max-md:w-full">
                <form method="POST" action="/checkout-cart" class="flex flex-col" id="productDetailForm">
                    <div class="gap-3 w-full flex items-start justify-between">
                        <div class="flex flex-col items-start justify-center mb-2 w-[75%]">
                            <h2 class="w-full text-[1.7rem] max-md:text-lg leading-[2rem] uppercase"><?= $ProductData['name'] ?></h2>
                            <div class="flex items-center justify-center gap-3 mt-1 ">
                                <span class="text-gray-300 text-xl max-md:text-base line-through whitespace-nowrap">Rs. <span
                                        id="comparePrice99"><?= formatNumber($ProductData['compare_price']) ?></span></span>
                                <span
                                    class="text-[#f25b21] text-xl max-md:text-base prices">Rs.<?= formatNumber($ProductData['price']) ?></span>
                                <span class="bg-[#f25b21] text-white text-xs px-2 py-1 z-20 whitespace-nowrap">SAVE
                                    <span id="save"><?= $discountPercentage ?></span>%</span>

                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-2 w-[25%]">
                            <button class="addToWishlistBtn  rounded-full transition-all duration-500  ">
                                <img src="/public/icons/<?= !empty($data) ? 'heart-orange.png' : 'heart-black.png' ?>"
                                    class="cursor-pointer mt-1 h-8 w-8 max-md:h-6 max-md:w-6" alt="">
                            </button>
                            <input type="hidden" value="<?= $ProductData['id'] ?>" class="ProductId">

                            <img src="/public/icons/share-black.png" onclick="shareProduct()"
                                class="h-8 max-md:h-6 cursor-pointer mt-1" alt="">
                        </div>
                    </div>
                    <?php
                    if ($ProductData['id'] != 7) {
                    ?>
                        <p class="text-sm text-gray-900 mt-2 text-justify">Upgrade your casual wardrobe with our black
                            sporty deconstructed loose pants, the perfect blend of comfort and style. Designed with a
                            relaxed fit, these pants allow for effortless movement, while the deconstructed detailing adds a
                            modern, edgy vibe that sets you apart.</p>
                    <?php } ?>
                    <p class=" text-xs text-gray-600 mt-2"><a href="" class="underline">shipping</a> calculated
                        at checkout</p>
                    <!-- Size Selection -->
                    <div class="flex flex-col mt-7 max-md:mt-3" id="productDetailsVariants">

                    </div>
                    <div class="w-full flex items-center justify-start mt-4 text-sm relative">
                        <p class="text-semibold">Size not available ?</p> &ensp;<span
                            class="text-[#f25b21] cursor-pointer underline" onclick="NotifyMe()">NOTIFY ME</span>
                        <div class="hidden absolute border border-gray-300 top-[107%] flex flex-col items-start justify-center bg-white w-[25vw] z-50"
                            id="NotifyMe">
                            <div class="w-full flex items-center justify-start px-4 py-6 flex-col bg-orange-50 ">
                                <div class="w-full flex items-center justify-between">
                                    <p>Please select your size</p>
                                    <i class="fa-solid fa-x cursor-pointer"
                                        onclick="document.getElementById('NotifyMe').classList.add('hidden')"></i>
                                </div>
                                <div class="w-full flex items-center justify-start">
                                    <div class="w-full flex items-center justify-start mt-3 text-sm">
                                        <div class="border border-gray-500 flex items-center justify-center h-10 w-20"
                                            size_value="8-9 Years" size_name="size">8-9 Years</div>
                                        <div class="border border-gray-500 flex items-center justify-center h-10 w-20"
                                            size_value="9-10 Years" size_name="size">9-10 Years</div>

                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex flex-col items-start px-4 justify-start py-5 gap-3">
                                <p>Get notified once the product is back in stock.
                                </p>
                                <div class="w-full flex items-center justify-start text-sm gap-3">
                                    <input type="text" placeholder="Enter your email"
                                        class="w-[70%] border border-gray-500 py-2 px-3"> <button
                                        class="bg-black text-white text-sm font-semibold px-3 py-2 rounded-md hover:bg-gray-800 text-no-wrap">Notify
                                        Me</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function NotifyMe() {
                            document.getElementById('NotifyMe').classList.remove('hidden')
                        }
                    </script>
                    <!-- Color Selection -->

                    <div class="w-full mt-7 max-md:mt-4">
                        <!-- Title -->
                        <h3 class="font-semibold text-gray-800 mb-3">Check Delivery</h3>

                        <!-- Input + Button + Icon -->
                        <div class="flex items-center space-x-2 border-b border-gray-300 pb-2">
                            <input type="text" id="pincode" maxlength="6" value="" placeholder="Enter Pincode"
                                oninput="checkMaharashtraPincode()"
                                class="flex-1 bg-transparent outline-none text-gray-700" />
                            <!-- <button type="button"
                                class="bg-black text-white text-sm font-semibold px-3 py-1 rounded-md hover:bg-gray-800">
                                check
                            </button> -->
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>

                        <!-- Delivery Info -->
                        <p class="mt-3 text-sm">
                            <span class="font-semibold" id="deliveryStatus"></span>
                        </p>
                    </div>
                    <!-- Quantity and Add to Cart -->
                    <div class="space-y-4 max-md:space-y-2 mt-7 max-md:mt-4">
                        <div class="w-full flex items-center justify-between space-x-4">
                            <div
                                class="  flex items-center justify-center gap-7 border border-gray-800 rounded-lg py-1">
                                <span class="cursor-pointer border-r border-gray-800 px-4 py-1"
                                    onclick="countMe(this,'-')">-</span>
                                <span class="text-black counter">1</span>
                                <span class="cursor-pointer border-l border-gray-800 px-4 py-1"
                                    onclick="countMe(this,'+')">+</span>

                            </div>

                            <div class="col-span-2 max-md:order-3 w-[70%]">
                                <button type="button" onclick="ohmygod()" id="MainCartBtn"
                                    class="w-full sm:flex-1 relative rounded-lg overflow-hidden group transform hover:shadow-xl border border-black bg-transparent text-black">
                                    <span
                                        class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                                        <i class="fas fa-cart-plus"></i> Add to Cart
                                    </span>
                                    <span
                                        class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-[1.2s] ease-in-out ease-out z-0">
                                    </span>
                                </button>
                                <input type="hidden" value="<?= $ProductData["id"] ?>" class="ProductId">
                            </div>
                        </div>

                        <div class="flex w-full items-center justify-start gap-4">

                            <?php
                            if (!empty($_SESSION["userid"])) {
                            ?>
                                <input type="hidden" name="varient[]" class="sideVarientId"
                                    value="<?= $ProductData['varients'][0]["id"] ?>">
                                <input type="hidden" name="category[]" class="sideCategoryId"
                                    value="<?= $ProductData['category'] ?>">
                                <input type="hidden" name="product[]" class="sideProductId"
                                    value="<?= $ProductData['id'] ?>">
                                <input type="hidden" name="price[]" value="<?= $ProductData['varients'][0]["price"] ?>">
                                <input type="hidden" name="quantity[]" id="product_buy_count" value="1">
                                <input type="hidden" name="cartid[]" value="">
                                <button name="myForm"
                                    class="w-full relative rounded-lg overflow-hidden group transform hover:shadow-xl bg-[#f25b21] text-black mt-0 hover:border hover:border-[#f25b21] transition-all duration-700"><span
                                        class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 text-white group-hover:text-[#f25b21]">
                                        Buy It Now
                                    </span> <span
                                        class="absolute inset-0 bg-white -translate-x-full group-hover:translate-x-0 transition-transform duration-[1.2s] ease-in-out ease-out z-0">
                                    </span>

                                </button>
                            <?php
                            } else {
                            ?>
                                <input type="hidden" name="varient[]" class="sideVarientId"
                                    value="<?= $ProductData['varients'][0]["id"] ?>">
                                <input type="hidden" name="category[]" class="sideCategoryId"
                                    value="<?= $ProductData['category'] ?>">
                                <input type="hidden" name="product[]" class="sideProductId"
                                    value="<?= $ProductData['id'] ?>">
                                <input type="hidden" name="price[]" value="<?= $ProductData['varients'][0]["price"] ?>">
                                <input type="hidden" name="quantity[]" id="product_buy_count" value="1">
                                <input type="hidden" name="cartid[]" value="">
                                <button type="button" onclick="openLogin()"
                                    class="w-full relative rounded-lg overflow-hidden group transform hover:shadow-xl bg-[#f25b21] text-black mt-2 hover:border hover:border-[#f25b21] transition-all duration-700"><span
                                        class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 text-white group-hover:text-[#f25b21]">
                                        Buy It Now
                                    </span> <span
                                        class="absolute inset-0 bg-white -translate-x-full group-hover:translate-x-0 transition-transform duration-[1.2s] ease-in-out ease-out z-0">
                                    </span>

                                </button>

                            <?php
                            }
                            ?>
                            <button
                                class="relative hidden rounded-md border-2 border-gray-400 py-2 px-6 font-semibold flex items-center justify-center gap-2 text-gray-700 
                                        transition-all duration-500 hover:border-purple-500 hover:text-purple-600 hover:shadow-lg">
                                <i class="fas fa-heart"></i> WISHLIST
                            </button>
                        </div>


                        <div class="flex flex-col">
                            <div class=" border rounded-md divide-y mt-5">

                                <!-- Item 1 -->
                                <div class="accordion p-4">
                                    <button type="button"
                                        class="flex justify-between items-center w-full font-semibold text-left">
                                        <span>Description</span>
                                        <i class="fa-solid fa-chevron-down chev"></i>
                                    </button>
                                    <div class="accordion-content">
                                        <div class="pt-2 text-gray-600 max-md:text-sm">
                                            <?= $ProductData['description'] ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 2 -->
                                <div class="accordion p-4">
                                    <button type="button"
                                        class="flex justify-between items-center w-full font-semibold text-left">
                                        <span>Additional Information</span>
                                        <i class="fa-solid fa-chevron-down chev"></i>
                                    </button>
                                    <div class="accordion-content">
                                        <div class="pt-2 text-gray-600 max-md:text-sm">
                                            Extra specifications and details go here. The panel closes smoothly too.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Delivery & Return Info -->
                            <div class="mt-7 space-y-3 text-gray-700">
                                <!-- <button id="openDeliveryModal" class="cursor-pointer flex items-center gap-2">
                                <i class="fa-solid fa-truck-fast text-gray-900"></i>
                                <span class="font-semibold">Delivery & Return</span>
                            </button> -->
                                <p>
                                    <i class="fas fa-tags mr-2 text-gray-900"></i>
                                    <span class="font-semibold">Category:</span> <?= $ProductData['category_name'] ?>
                                </p>
                                <p>
                                    <i class="fa-regular fa-calendar-days mr-3 text-gray-900"></i><span
                                        class="font-semibold">Estimated Delivery:</span> Sep 13 - Sep 17
                                </p>
                                <p>
                                    <i class="fa-regular fa-eye mr-1 text-gray-900"></i>
                                    <span id="viewerCount" class="font-semibold"></span> people are viewing this right
                                    now
                                </p>

                                <script>
                                    const viewerEl = document.getElementById("viewerCount");

                                    // start with 52
                                    let currentCount = 52;
                                    viewerEl.textContent = currentCount;

                                    function updateViewerCount() {
                                        // random between 50–80
                                        currentCount = Math.floor(Math.random() * (80 - 50 + 1)) + 50;
                                        viewerEl.textContent = currentCount;
                                    }

                                    // update every 5–6 seconds
                                    setInterval(updateViewerCount, Math.floor(Math.random() * 1000) + 5000);
                                </script>


                            </div>

                            <!-- Share -->
                            <div class="mt-4 hidden">
                                <p class="font-semibold text-gray-700">SHARE:</p>
                                <div class="flex space-x-4 mt-2 text-lg">
                                    <a href="#" class="text-blue-600 hover:scale-110 transition"><i
                                            class="fab fa-facebook"></i></a>
                                    <a href="#" class="text-sky-400 hover:scale-110 transition"><i
                                            class="fab fa-twitter"></i></a>
                                    <a href="#" class="text-red-600 hover:scale-110 transition"><i
                                            class="fab fa-pinterest"></i></a>
                                    <a href="#" class="text-blue-700 hover:scale-110 transition"><i
                                            class="fab fa-linkedin"></i></a>
                                    <a href="#" class="text-green-500 hover:scale-110 transition"><i
                                            class="fab fa-whatsapp"></i></a>
                                    <a href="#" class="text-pink-600 hover:scale-110 transition"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <div class="w-full flex items-center justify-center mt-16 max-md:mt-8">
            <div class="flex items-center justify-center flex-col relative w-[90%] gap-5">

                <div
                    class="w-[80%] max-md:w-[90%] h-[28vh] bg-white rounded-lg shadow-md border border-gray-300  py-6 flex flex-col items-center justify-center">
                    <div class="text-center font-semibold text-lg mb-4">Customer Reviews</div>
                    <div class="flex max-md:flex-col items-center justify-center gap-8 max-md:gap-2">

                        <!-- Left: Stars + text -->
                        <div class="flex flex-col items-center">
                            <div class="flex text-yellow-400 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784 1.402 8.173L12 18.896l-7.336 3.862 1.402-8.173L.132 9.211l8.2-1.193z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784 1.402 8.173L12 18.896l-7.336 3.862 1.402-8.173L.132 9.211l8.2-1.193z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784 1.402 8.173L12 18.896l-7.336 3.862 1.402-8.173L.132 9.211l8.2-1.193z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784 1.402 8.173L12 18.896l-7.336 3.862 1.402-8.173L.132 9.211l8.2-1.193z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 .587l3.668 7.431 8.2 1.193-5.934 5.784 1.402 8.173L12 18.896l-7.336 3.862 1.402-8.173L.132 9.211l8.2-1.193z" />
                                </svg>
                            </div>
                            <span class="text-sm text-gray-600">Be the first to write a review</span>
                        </div>

                        <!-- Divider -->
                        <div class="h-12 w-px bg-gray-300 max-md:hidden"></div>

                        <!-- Right: Button -->
                        <button type="button"
                            onclick="<?= isset($_SESSION['userid']) && !empty($_SESSION['userid']) ? 'openReviewModal()' : 'openLogin()' ?>"
                            class="bg-black text-white font-semibold px-6 py-2 rounded-full hover:bg-gray-800 transition">
                            <?= isset($_SESSION['userid']) && !empty($_SESSION['userid']) ? 'Write a review' : 'Login to write a review' ?>
                        </button>

                    </div>
                </div>

                <div class="w-[80%] flex items-center justify-center">
                    <div class="owl-carousel reviews-sliders w-full">
                        <?php
                        foreach (getData2("SELECT tpr.*, ous.username, ous.fname, ous.lname, ous.mobile FROM `tbl_product_review` tpr LEFT JOIN online_users ous ON tpr.userid = ous.id WHERE 1 AND tpr.product_id = $ProductData[id] AND tpr.status = 1") as $key => $value) { ?>

                            <div class="p-2 bg-white border rounded-md relative m-1 h-[28vh] flex flex-col justify-between">
                                <div class="flex flex-col gap-1 items-start mb-2 text-[#f25b21]">
                                    <span> <?php for ($i = 0; $i < 5; $i++) {
                                                if ($value['rating'] > $i) {
                                                    echo '★';
                                                } else {
                                                    echo '☆';
                                                }
                                            } ?></span>
                                    <style>
                                        .review-text {
                                            display: -webkit-box;
                                            -webkit-line-clamp: 4;
                                            /* show only 4 lines */
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                        }
                                    </style>
                                    <p class="review-text text-gray-700 italic leading-relaxed md:text-sm lg:text-base">
                                        "<?= $value['reviewText'] ?>"
                                    </p>
                                </div>

                                <div class="flex gap-4 items-center">
                                    <div class="flex items-center w-10 h-10">
                                        <img src="/public/images/dp.png" alt="John D."
                                            class="w-full h-full rounded-full object-cover border mr-3">
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">
                                            <?= !empty($value['fname']) ? $value['fname'] . ' ' . $value['lname'] : 'Anonymous' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $(".reviews-sliders").owlCarousel({
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 3000,
                    smartSpeed: 1000,
                    // slideTransition: "linear",
                    responsive: {
                        0: { 
                            items: 1
                        },
                        768: { 
                            items: 2
                        }
                    }
                });
            });
        </script>


        <section class="bg-white py-14 max-md:py-8 w-full">
            <div class="w-[90vw] max-md:w-[90vw] mx-auto">
                <div class="relative">
                    <div class="flex flex items-center justify-between mb-6">
                        <h3 class="text-left text-3xl max-md:text-xl font-extrabold uppercase">YOU MAY ALSO LIKE</h3>
                        <div class="flex flex items-center gap-2 justify-center">
                            <div onclick="banner_forward(this)"
                                class=" border bg-black border-white p-2 rounded-full cursor-pointer">
                                <img src="/public/icons/backward.png"
                                    class="w-[25px] h-[25px] max-md:w-[12px] max-md:h-[12px]" alt="">
                            </div>
                            <div class="flex flex items-center gap-2 justify-center">
                                <div onclick="banner_backward(this)"
                                    class=" border bg-black border-white p-2 rounded-full cursor-pointer">
                                    <img src="/public/icons/backward.png"
                                        class="w-[25px] h-[25px] max-md:w-[12px] max-md:h-[12px] rotate-180" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="owl-carousel owl-theme like-carousel">

                        <?php foreach ($uniqueProducts as $key => $product) {
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
                            if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {


                                $data = getData2("SELECT * FROM `tbl_wishlist` WHERE `product` = " . $product['id'] . " AND `userid` = " . $_SESSION["userid"])[0];
                            } else {

                                $data = checkExisteingWishlistSession($product['id']);
                                if ($data) {
                                    $data = ['id' => $data];
                                } else {
                                    $data = [];
                                }
                            }
                            // printWithPre($images);
                        ?>
                            <a href="/products/product-details/<?= $name ?>" class="block">
                                <div class="group relative  cursor-pointer transition overflow-hidden">
                                    <!-- Discount Badge -->
                                    <span
                                        class="absolute top-2 left-2 max-md:top-0 max-md:left-0 bg-[#f25b21] text-white text-xs max-md:text-[11px] px-2 py-1 max-md:px-1.5 max-md:py-0.5 z-20">
                                        SAVE <?= $discountPercentage ?>%
                                    </span>

                                    <div class=" relative w-full h-[450px] max-md:h-[250px] overflow-hidden group">
                                        <img src="/<?= $images[0] ?>" alt="Product 1"
                                            class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                        <img src="/<?= $SecondImage ?>" alt="Product 1 Hover"
                                            class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                        <button
                                            class="addToWishlistBtn absolute top-2 right-3 h-10 w-10 max-md:h-6 max-md:w-6 flex items-center justify-center rounded-full transition-all duration-500  z-20 stop-link <?= !empty($data) ? 'bg-[#f25b21] text-white' : 'bg-black/70 text-white  hover:bg-[#f25b21]' ?>">
                                            <i class="fas fa-heart max-md:text-xs"></i>
                                        </button>

                                        <button
                                            class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                        </button>
                                        <input type="text" value="<?= $product['id'] ?>" class="ProductId">
                                    </div>

                                    <div class="pt-4 w-full ">
                                        <h3 class="text-base max-md:text-sm font-semibold uppercase"><?= $product['name'] ?></h3>
                                        <div class="flex items-center justify-start gap-3 w-full">
                                            <p class="text-gray-500 line-through text-sm">₹
                                                <?= formatNumber($product['compare_price']) ?>
                                            </p>
                                            <p class="text-[#f25b21] font-bold">₹ <?= formatNumber($product['price']) ?></p>
                                        </div>
                                        <div class="flex items-center justify-start space-x-1 hidden">
                                            <span class="text-yellow-500">★★★★★</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div id="deliveryModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-full w-[65vw] max-md:w-[94vw] shadow-lg relative p-8 max-md:p-5 animate-slideDown">
            <button id="closeDeliveryModal"
                class="absolute top-4 right-4 text-gray-600 hover:text-black animate-rotate-pingpong">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
            <h2 class="text-2xl font-bold mb-4">Delivery & Return</h2>
            <p class="text-gray-700 mb-4">
                We want you to be happy with your purchase and we apologize if it is not.
                For whatever reason that you are not satisfied, we provide exchanges and returns
                if the following conditions are met.
            </p>

            <h3 class="text-xl font-semibold mb-2">Rules</h3>
            <p class="text-gray-600 mb-4">
                All exchanges and returns must be raised within 10 days of the invoice date for
                local orders, and 20 days for overseas orde₹ For local deliveries, there is an
                option
                to exchange at any of our boutiques or through our online portal.
            </p>

            <h3 class="text-xl font-semibold mb-2">Interpretation and Definitions</h3>
            <p class="text-gray-600 mb-6">
                All requests for returns must be strictly made online. Refunds and exchanges
                will be processed according to company policy for both local and overseas
                deliveries.
            </p>

            <button onclick="window.location.href='/return-exchange'"
                class="relative font-semibold py-2 px-6 rounded-md border-2 border-black overflow-hidden group">
                <span class="relative z-10 text-white group-hover:text-black transition-colors duration-300">
                    Read More
                </span>
                <span
                    class="absolute inset-0 bg-black transition-transform duration-300 origin-left group-hover:scale-x-0 scale-x-100"></span>
            </button>
        </div>
    </div>

    <!-- Sticky Bottom Strip -->
    <div id="bottomStrip" class="fixed bottom-0 left-0 w-full bg-gray-200 shadow-lg border-t p-2 hidden z-50">
        <div class="w-[90vw] mx-auto flex max-md:flex-col items-center max-md:gap-2 max-md:items-start justify-between">
            <div class="flex items-center gap-4">
                <img src="/<?= $ppimages[0][0] ?>" alt="Product"
                    class=" h-12 max-md:w-12 max-md:h-12 object-cover border border-white" id="DownImage">
                <div>
                    <h4 class="text-sm text-black max-md:text-sm"><?= $ProductData['name'] ?></h4>
                    <p class="text-sm">
                        <span class="line-through text-black">
                            ₹<?= formatNumber($ProductData['compare_price']) ?></span>
                        <span class="text-[#f25b21] font-semibold text-sm max-md:text-base prices">
                            ₹<?= formatNumber($ProductData['price']) ?></span>
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-3 max-md:justify-end max-md:w-full">
                <div class="  flex items-center justify-center gap-7 border border-gray-800 rounded-lg py-1">
                    <span class="cursor-pointer border-r border-gray-800 px-4" onclick="countMe(this,'-')">-</span>
                    <span class="text-black counter">1</span>
                    <span class="cursor-pointer border-l border-gray-800 px-4" onclick="countMe(this,'+')">+</span>

                </div>
                <button
                    class="flex-1 relative rounded-md overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black"
                    onclick="ClickonMainCartBtn()">
                    <span
                        class="relative z-10 flex py-1.5 px-6 items-center justify-center gap-2 font-semibold text-sm max-md:text-sm transition-colors duration-700 group-hover:text-white">
                        <i class="fas fa-cart-plus" aria-hidden="true"></i> Add to Cart
                    </span>
                    <span
                        class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                    </span>
                </button>
                <input type="hidden" name="varient[]" class="sideVarientId"
                    value="<?= $ProductData['varients'][0]["id"] ?>">
                <input type="hidden" value="<?= $ProductData["id"] ?>" class="ProductId">
            </div>
        </div>
    </div>


    <div id="reviewModal"
        class="hidden fixed inset-0 bg-gradient-to-br from-black/70 via-blue-900/30 to-purple-900/30 backdrop-blur-sm flex justify-center items-center z-50 p-4">
        <div class="bg-white rounded-3xl w-full max-w-lg relative shadow-2xl animate-slideDown overflow-hidden">
            <!-- Decorative Background Pattern -->
            <div
                class="absolute top-0 right-0 w-64 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full filter blur-3xl opacity-20 -translate-y-1/2 translate-x-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 w-48 bg-gradient-to-tr from-pink-400 to-orange-500 rounded-full filter blur-3xl opacity-20 translate-y-1/2 -translate-x-1/2">
            </div>

            <!-- Content Container -->
            <div class="relative z-10">
                <!-- Header with Gradient -->
                <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-3xl font-bold text-white mb-1">Share Your Experience</h2>
                            <p class="text-blue-100 text-sm">We value your feedback</p>
                        </div>
                        <button onclick="closeReviewModal()"
                            class="text-white/80 hover:text-white transition-all duration-200 w-10 h-10 flex items-center justify-center rounded-full hover:bg-white/20 backdrop-blur-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Form Content -->
                <form id="reviewForm" class="px-8 py-6 space-y-5">
                    <!-- Name Input with Icon -->
                    <div class="group">
                        <label for="name"
                            class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Your Name
                        </label>
                        <input type="text" id="name" placeholder="John Doe"
                            class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition-all duration-300 bg-gray-50 focus:bg-white group-hover:border-gray-300"
                            required>
                    </div>
                    <input type="hidden" id="userid" name="userid" value="<?= $_SESSION["userid"] ?>">
                    <input type="hidden" id="product_id" name="product_id" value="<?= $ProductData["id"] ?>">

                    <!-- Interactive Star Rating -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            Rate Your Experience
                        </label>

                        <!-- Star Rating Container -->
                        <div class="bg-gradient-to-r from-gray-50 to-blue-50 p-6 rounded-2xl border-2 border-gray-200">
                            <div class="flex justify-center items-center gap-3 mb-3">
                                <button type="button" onclick="setRating(1)"
                                    class="star-icon text-gray-300 hover:text-yellow-400 transition-all duration-200 transform hover:scale-125">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                                <button type="button" onclick="setRating(2)"
                                    class="star-icon text-gray-300 hover:text-yellow-400 transition-all duration-200 transform hover:scale-125">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                                <button type="button" onclick="setRating(3)"
                                    class="star-icon text-gray-300 hover:text-yellow-400 transition-all duration-200 transform hover:scale-125">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                                <button type="button" onclick="setRating(4)"
                                    class="star-icon text-gray-300 hover:text-yellow-400 transition-all duration-200 transform hover:scale-125">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                                <button type="button" onclick="setRating(5)"
                                    class="star-icon text-yellow-400 hover:text-yellow-500 transition-all duration-200 transform hover:scale-125">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                            </div>
                            <p class="text-center text-sm font-medium text-gray-600" id="ratingText">Excellent</p>
                        </div>
                        <input type="hidden" id="rating" value="1" required>
                    </div>

                    <!-- Review Text with Character Count -->
                    <div class="group">
                        <label for="reviewText"
                            class="block text-sm font-semibold text-gray-700 mb-2 flex items-center justify-between">
                            <span class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                </svg>
                                Your Review
                            </span>
                            <span class="text-xs text-gray-400" id="charCount">0/500</span>
                        </label>
                        <textarea id="reviewText" rows="4" maxlength="500" oninput="updateCharCount()"
                            placeholder="Tell us about your experience. What did you like? What could be improved?"
                            class="w-full px-4 py-3.5 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 outline-none transition-all duration-300 resize-none bg-gray-50 focus:bg-white group-hover:border-gray-300"
                            required></textarea>
                    </div>

                    <!-- Submit Button with Gradient -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white font-bold py-4 rounded-xl hover:shadow-2xl hover:shadow-purple-500/50 transform hover:scale-[1.02] active:scale-[0.98] transition-all duration-300 relative overflow-hidden group">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Submit Review
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </span>
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-pink-600 via-purple-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                        </button>
                    </div>
                </form>

                <!-- Footer -->
                <div class="px-8 py-5 bg-gradient-to-r from-gray-50 to-blue-50 border-t border-gray-100">
                    <div class="flex items-center justify-center gap-2 text-sm text-gray-600">
                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        Your review is secure and helps us improve
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function ClickonMainCartBtn() {

            document.getElementById('MainCartBtn').click();
        }
        const strip = document.getElementById("bottomStrip");

        window.addEventListener("scroll", () => {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;

            if (scrollPercent >= 40 && scrollPercent <= 95) {
                strip.classList.remove("hidden");
            } else {
                strip.classList.add("hidden");
            }
        });

        function shareProduct() {
            const url = window.location.href;
            const encodedUrl = encodeURIComponent(url);
            const shareUrl = `https://wa.me/?text=${encodedUrl}`;
            window.open(shareUrl, "_blank");
        }

        async function checkMaharashtraPincode() {
            const el = document.getElementById('pincode');
            const deliveryStatus = document.getElementById('deliveryStatus');
            const pin = el.value.trim();

            // validate length
            if (pin.length !== 6 || !/^\d{6}$/.test(pin)) {
                // alert('Please enter a valid 6-digit PIN code.');
                // el.value = '';
                el.focus();
                return;
            }

            try {
                const res = await fetch(`https://api.postalpincode.in/pincode/${pin}`);
                const data = await res.json();

                if (!Array.isArray(data) || data[0].Status !== 'Success' || !data[0].PostOffice) {
                    deliveryStatus.innerText = 'Invalid PIN code.';
                    deliveryStatus.classList.add('text-red-500');
                    el.value = '';
                    el.focus();
                    return;
                }

                const isMaharashtra = data[0].PostOffice.some(po =>
                    (po.State || '').toLowerCase().includes('maharashtra')
                );

                if (isMaharashtra) {
                    // alert('✅ PIN code belongs to Maharashtra.');
                    // toastr.success('✅ PIN code belongs to Maharashtra.');
                    deliveryStatus.innerText = 'Delivery in 5-6 days';
                    deliveryStatus.classList.remove('text-red-500');
                    deliveryStatus.classList.add('text-green-500');
                } else {
                    // alert('❌ This PIN code is not from Maharashtra.');
                    // toastr.error('❌ This PIN code is not from Maharashtra.');
                    deliveryStatus.innerText = '❌ Delivery not available.';
                    deliveryStatus.classList.remove('text-green-500');
                    deliveryStatus.classList.add('text-red-500');
                    el.value = '';
                    el.focus();
                }
            } catch (e) {
                console.error(e);
                alert('Could not verify PIN code. Please try again.');
                el.value = '';
                el.focus();
            }
        }




        // Open Modal
        function openReviewModal() {
            document.getElementById("reviewModal").classList.remove("hidden");
        }

        // Close Modal
        function closeReviewModal() {
            document.getElementById("reviewModal").classList.add("hidden");
        }

        // Handle Form Submission
        document.getElementById("reviewForm").addEventListener("submit", async function(e) {
            e.preventDefault();

            const name = document.getElementById("name").value;
            const userid = document.getElementById("userid").value;
            const product_id = document.getElementById("product_id").value;
            const reviewText = document.getElementById("reviewText").value;
            const rating = document.getElementById("rating").value;

            console.log(name, reviewText, rating);

            let res = await fetch("/addReview", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    name,
                    userid,
                    product_id,
                    reviewText,
                    rating,
                }),
            })

            let data = await res.json();

            if (data.success) {
                toastr.success(data.message);
                closeReviewModal();
                this.reset();
            } else {
                toastr.error(data.message);
            }

        });



        function setRating(stars) {
            document.getElementById('rating').value = stars;

            const ratingTexts = ['Poor', 'Fair', 'Good', 'Great', 'Excellent'];
            document.getElementById('ratingText').textContent = ratingTexts[stars - 1];

            // Update star colors
            const starIcons = document.querySelectorAll('.star-icon');
            starIcons.forEach((star, index) => {
                if (index < stars) {
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-400');
                } else {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                }
            });
        }

        function updateCharCount() {
            const textarea = document.getElementById('reviewText');
            const charCount = document.getElementById('charCount');
            charCount.textContent = `${textarea.value.length}/500`;
        }

        // Initialize on hover effect
        document.addEventListener('DOMContentLoaded', function() {
            const starIcons = document.querySelectorAll('.star-icon');
            starIcons.forEach((star, index) => {
                star.addEventListener('mouseenter', function() {
                    starIcons.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.remove('text-gray-300');
                            s.classList.add('text-yellow-400');
                        }
                    });
                });

                star.addEventListener('mouseleave', function() {
                    const currentRating = parseInt(document.getElementById('rating').value);
                    starIcons.forEach((s, i) => {
                        if (i < currentRating) {
                            s.classList.add('text-yellow-400');
                            s.classList.remove('text-gray-300');
                        } else {
                            s.classList.remove('text-yellow-400');
                            s.classList.add('text-gray-300');
                        }
                    });
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".like-carousel").owlCarousel({
                loop: true,
                margin: 10,
                // nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    },
                    1280: {
                        items: 4
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".review-carousel").owlCarousel({
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                loop: true,
                dots: false,
                nav: true,
                navText: ["‹", "›"],
                animateOut: 'fadeOut',
                responsive: {
                    0: {
                        items: 1
                    }, // Mobile
                    640: {
                        items: 1
                    }, // Small tablets
                    768: {
                        items: 3
                    }, // Tablets
                    1024: {
                        items: 3
                    }, // Desktops
                    1280: {
                        items: 3
                    } // Large screens
                }
            });
        });
        $(document).ready(function() {
            $(".review-carousel1").owlCarousel({
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                loop: true,
                dots: false,
                nav: false,
                // navText: ["‹", "›"],
                animateOut: 'fadeOut',
                responsive: {
                    0: {
                        items: 1
                    }, // Mobile
                    640: {
                        items: 1
                    }, // Small tablets
                    768: {
                        items: 3
                    }, // Tablets
                    1024: {
                        items: 2
                    }, // Desktops
                    1280: {
                        items: 2
                    } // Large screens
                }
            });
        });
        $(document).ready(function() {
            $(".review-carousel2").owlCarousel({
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                loop: true,
                dots: false,
                nav: false,
                // navText: ["‹", "›"],
                // animateOut: 'fadeOut',
                responsive: {
                    0: {
                        items: 1
                    }, // Mobile
                    640: {
                        items: 1
                    }, // Small tablets
                    768: {
                        items: 3
                    }, // Tablets
                    1024: {
                        items: 1
                    }, // Desktops
                    1280: {
                        items: 1
                    } // Large screens
                }
            });
        });
    </script>



    <script>
        document.querySelectorAll('.accordion').forEach(acc => {
            const btn = acc.querySelector('button');
            const content = acc.querySelector('.accordion-content');

            btn.addEventListener('click', () => {
                const isOpen = acc.classList.contains('open');

                if (isOpen) {
                    // Closing
                    const startHeight = content.scrollHeight;
                    content.style.height = startHeight + "px";
                    requestAnimationFrame(() => {
                        content.style.height = "0px";
                    });
                    acc.classList.remove('open');
                } else {
                    // Opening
                    acc.classList.add('open');
                    const targetHeight = content.scrollHeight;
                    content.style.height = "0px";
                    requestAnimationFrame(() => {
                        content.style.height = targetHeight + "px";
                    });
                    content.addEventListener('transitionend', function handler() {
                        if (acc.classList.contains('open')) {
                            content.style.height = "auto"; // let it resize naturally
                        }
                        content.removeEventListener('transitionend', handler);
                    });
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const modal = document.getElementById('deliveryModal');
            const openBtn = document.getElementById('openDeliveryModal');
            const closeBtn = document.getElementById('closeDeliveryModal');

            openBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            closeBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // Close on background click
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>

    <!-- SwiperJS (Add in <head>) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- SwiperJS (Add before </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/specifications.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php"; ?>

    <script>
        const GLOBAL_product_VARIANT = {
            variants: {},
            selected: {}
        };
        const product_id = "<?= $ProductData['id'] ?>"
        // Smooth animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.animate-fade-in, .animate-slide-up').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease-out';
            observer.observe(el);
        });

        // Color selection functionality
        // document.querySelectorAll('.color-option').forEach(option => {
        //     option.addEventListener('click', function () {
        //         // Remove ring from all options
        //         document.querySelectorAll('.color-option').forEach(opt => {
        //             opt.classList.remove('ring-2', 'ring-[#f25b21]', 'ring-offset-4');
        //         });
        //         // Add ring to selected option
        //         this.classList.add('ring-2', 'ring-[#f25b21]', 'ring-offset-4');
        //     });
        // });

        // // Size selection functionality
        // document.querySelectorAll('.size-option').forEach(option => {
        //     option.addEventListener('click', function () {
        //         // Remove selected state from all options
        //         document.querySelectorAll('.size-option').forEach(opt => {
        //             opt.classList.remove('border-[#f25b21]', 'bg-orange-50', 'text-[#f25b21]');
        //             opt.classList.add('border-gray-300');
        //         });
        //         // Add selected state to clicked option
        //         this.classList.remove('border-gray-300');
        //         this.classList.add('border-[#f25b21]', 'bg-orange-50', 'text-[#f25b21]');
        //     });
        // });

        // Quantity controls
        // const quantityInput = document.querySelector('input[type="number"]');
        // const decreaseBtn = document.querySelector('button:has-text("−")');
        // const increaseBtn = document.querySelector('button:has-text("+")');

        // document.querySelector('button').addEventListener('click', function () {
        //     if (this.textContent === '−') {
        //         const current = parseInt(quantityInput.value);
        //         if (current > 1) quantityInput.value = current - 1;
        //     } else if (this.textContent === '+') {
        //         const current = parseInt(quantityInput.value);
        //         quantityInput.value = current + 1;
        //     }
        // });

        // document.querySelectorAll('button').forEach(btn => {
        //     if (btn.textContent === '−' || btn.textContent === '+') {
        //         btn.addEventListener('click', function () {
        //             const current = parseInt(quantityInput.value);
        //             if (this.textContent === '−' && current > 1) {
        //                 quantityInput.value = current - 1;
        //             } else if (this.textContent === '+') {
        //                 quantityInput.value = current + 1;
        //             }
        //         });
        //     }
        // });

        function countMe(ele, process) {
            // Select all counters
            const counters = document.querySelectorAll(".counter");

            counters.forEach((counterEl) => {
                let current = parseInt(counterEl.textContent);

                if (process === "+") {
                    current++;
                } else if (process === "-" && current > 1) {
                    current--;
                }

                counterEl.textContent = current;

                // Update corresponding hidden input if exists
                const inputEl = counterEl.parentElement.querySelector("#product_buy_count");
                if (inputEl) inputEl.value = current;
            });
        }


        async function getVariants() {
            const response = await axios.post("/api/get-product-data", new URLSearchParams({
                productid: product_id,
                "product_details": true
            }))
            console.log(response.data)
            GLOBAL_product_VARIANT.variants = response.data.variants;
            let firstValues = {};
            let dict = response.data.grouped
            for (let key in dict) {
                if (Array.isArray(dict[key]) && dict[key].length > 0) {
                    firstValues[key] = dict[key][0];
                }
            }

            console.log(firstValues);
            GLOBAL_product_VARIANT.selected = firstValues

            if (response.data.variants.length > 0) {
                document.getElementById("productDetailsVariants").innerHTML = response.data.html;
                const response2 = await axios.post("/api/get-variant-data", new URLSearchParams({
                    productid: product_id,
                    "product_details": true
                }))

                const ColorDiv = document.getElementById('ColorDetailsDiv');
                if (ColorDiv) {
                    ColorDiv.innerHTML = response2.data.html;

                }
            }
        }

        // function changeDetailVariant(){

        // }

        function changeDetailVariant(ele, tp, value, key1,json) {
            // console.log(ele, tp, value, key1)
            updateKey(GLOBAL_product_VARIANT.selected, tp, value);
            let divs = ele.parentElement.querySelectorAll("div")
            divs.forEach(div => {
                div.classList.remove("border-gray-900");
            });
            // console.log(divs[key1])
            divs[key1].classList.add("border-gray-900");
            // console.log("GLOBAL_VARIANT", GLOBAL_VARIANT)
            let selectedId = "";
            document.querySelector(".changeDetailVariant").innerText = json;

            GLOBAL_product_VARIANT.variants.forEach(async (ar, i) => {
                //    console.log(ar)
                if (deepEqualCaseInsensitive(JSON.parse(JSON.parse(ar.options)), GLOBAL_product_VARIANT.selected)) {
                    // console.log("matched",JSON.parse(JSON.parse(ar.options)),GLOBAL_VARIANT.selected)

                    // await changeCartSidebarImage(i)

                    selectedId = ar.id
                    // console.log()
                    let eleForm = document.getElementById("productDetailForm")
                    // eleForm.querySelector(".sideVarientId").value = selectedId

                    if (eleForm.querySelector(".sideVarientId")) {
                        eleForm.querySelector(".sideVarientId").value = selectedId;
                    } else {
                        // console.warn("No .sideVarientId element found inside:", ele.parentElement.parentElement);
                    }
                    document.querySelectorAll(".prices").forEach(el => {
                        el.innerHTML = `<span class="text-[#f25b21] text-xl prices">Rs. ${ar.price}</span>`;
                    });
                    let comparePrice99 = document.getElementById('comparePrice99');
                    // console.log(comparePrice99)
                    if (comparePrice99) {
                        let original = parseFloat(comparePrice99.innerHTML);
                        let discounted = parseFloat(ar.price);

                        if (!isNaN(original) && original > 0) {
                            let discountPercent = ((original - discounted) / original) * 100;
                            document.getElementById('save').innerHTML = `${discountPercent.toFixed(0)}`;
                        }
                    }



                    console.log(JSON.parse(ar.images))
                    let imgHtml = ""
                    let productimages = JSON.parse(ar.images).reverse()
                    productimages.forEach((imgh) => {
                        imgHtml = imgHtml + `

                            <div class=" overflow-hidden  cursor-pointer">
                                <img src="/${imgh}" alt="View 1"
                                    class="w-full h-full object-cover image-hover cursor-zoom-in">
                            </div>
                        `
                    })
                    // console.log(productimages[0])
                    document.getElementById('DownImage').src = '/' + productimages[0];
                    document.getElementById("ProductDetailImg").innerHTML = imgHtml
                }
            })

        }

        function ohmygod() {
            let eleForm = document.getElementById("productDetailForm")
            let quantity = eleForm.querySelector('.counter').innerHTML;
            addToCartSidebar(eleForm.querySelector(".sideVarientId").value, eleForm.querySelector(".sideCategoryId").value, eleForm.querySelector(".sideProductId").value, btn, quantity, false)
        }
        getVariants();
        console.log("hello")
    </script>

</body>