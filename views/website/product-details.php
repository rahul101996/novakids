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
        /* Place nav buttons below the carousel */
        .like-carousel .owl-nav {
            position: absolute;
            top: -60px;
            /* push below blog cards */
            left: 90%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        /* Style smaller buttons */
        .like-carousel .owl-nav button span {
            font-size: 16px;
            padding: 6px 10px;
            background: #000000ff;
            /* Tailwind pink-500 */
            color: white;
            border-radius: 9999px;
            /* fully rounded */
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
        <section class="flex items-start justify-center relative w-[90%] gap-5">

            <div class="flex items-center justify-start max-md:hidden gap-2 w-[64%]">
                <div class="grid grid-cols-2 gap-2 w-[96%]">
                    <?php
                    foreach (array_reverse($images[0]) as $key => $image) {

                    ?>
                        <div class=" overflow-hidden  cursor-pointer">
                            <img src="/<?= $image ?>" alt="View 1"
                                class="w-full h-full object-cover image-hover cursor-zoom-in">
                        </div>
                    <?php } ?>

                </div>
            </div>


            <!-- Mobile Carousel -->
            <div class="md:hidden relative w-[65%]">
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
            <div class="md:sticky top-32 self-start space-y-4 w-[35%]">
                <div class="flex flex-col">
                    <div class="gap-3 w-full flex items-start justify-center">
                        <div class="flex flex-col items-start justify-center mb-2">
                            <h2 class="w-full text-[1.7rem] leading-[2rem] uppercase"><?= $ProductData['name'] ?></h2>
                            <div class="flex items-center justify-center gap-3 mt-4">
                                <span class="text-gray-300 text-xl line-through">Rs.<?= formatNumber($ProductData['compare_price']) ?>.00</span>
                                <span class="text-[#f25b21] text-xl">Rs.<?= formatNumber($ProductData['price']) ?>.00</span>
                                <span class="text-xs bg-[#f25b21] text-white py-1 px-2 rounded-lg">SAVE <?= $discountPercentage ?>%</span>

                            </div>
                            <p class="text-sm text-gray-900 mt-2">Upgrade your casual wardrobe with our black sporty deconstructed loose pants. These stylish pants feature a relaxed fit and a deconstructed design for a modern and edgy look</p>
                            <p class=" text-xs text-gray-600 mt-2"><a href="" class="underline">shipping</a> calculated at checkout</p>


                        </div>
                        <img src="/public/icons/heart.png" class="h-7 cursor-pointer" alt="">
                        <img src="/public/icons/share.png" class="h-7 cursor-pointer" alt="">
                    </div>

                    <!-- Size Selection -->
                    <div class="flex flex-col mt-5">

                        <div class="flex flex-wrap">
                            <?php
                            foreach ($grouped as $key => $value) {
                                $key = strtolower(str_replace(' ', '', $key));
                                // echo $key;
                                if ($key == 'size') {

                            ?>
                                    <div class="w-full flex items-center justify-between text-sm">

                                        <p class="uppercase"><?= $key ?> : <?= $value[0] ?></p>
                                        <p class="flex text-xs gap-1 cursor-pointer text-white bg-gray-800 py-1 px-3" onclick="document.getElementById('sizeChartModal').classList.remove('hidden')">
                                            <i class="fa-solid fa-ruler pr-1"></i> Sizing guide
                                        </p>
                                    </div>
                                    <div class="w-full flex items-center justify-start mt-3 text-sm">
                                        <?php
                                        $diffcolor = [];
                                        foreach ($value as $key1 => $value1) {
                                            // $diffcolor = $finalData['images'][$key1];
                                        ?>
                                            <div class="border <?= $key1 == 0 ? "border-gray-900" : "border-gray-300" ?> flex items-center justify-center h-10 w-20" size_value="<?= $value1 ?>" size_name="<?= $key ?>"><?= $value1 ?></div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php
                                } elseif ($key == 'color') {
                                ?><p class="uppercase text-sm mt-5"><?= $key ?> : <?= $value[0] ?></p>
                                    <div class="w-full flex items-center justify-start mt-3 text-sm gap-2">

                                        <?php
                                        foreach ($lastImages as $key3 => $image) {
                                            if ($key3 > 3) {
                                                break; // stop after 4 images
                                            }
                                        ?>
                                            <img src="/<?= $image ?>" class="h-[95px]" alt="">
                                        <?php } ?>

                                    </div>
                            <?php
                                }
                            } ?>
                        </div>
                    </div>
                    <div class="w-full flex items-center justify-start mt-3 text-sm relative">
                        <p class="text-semibold">Variant not available ?</p> &ensp;<span class="text-[#f25b21] cursor-pointer underline" onclick="NotifyMe()">NOTIFY ME</span>
                        <div class="hidden absolute border border-gray-300 top-[107%] flex flex-col items-start justify-center bg-white w-[25vw] z-50" id="NotifyMe">
                            <div class="w-full flex items-center justify-start px-4 py-6 flex-col bg-orange-50 ">
                                <div class="w-full flex items-center justify-between">
                                    <p>Please select your size</p>
                                    <i class="fa-solid fa-x cursor-pointer" onclick="document.getElementById('NotifyMe').classList.add('hidden')"></i>
                                </div>
                                <div class="w-full flex items-center justify-start">
                                    <div class="w-full flex items-center justify-start mt-3 text-sm">
                                        <div class="border border-gray-500 flex items-center justify-center h-10 w-20" size_value="8-9 Years" size_name="size">8-9 Years</div>
                                        <div class="border border-gray-500 flex items-center justify-center h-10 w-20" size_value="9-10 Years" size_name="size">9-10 Years</div>

                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex flex-col items-start px-4 justify-start py-5 gap-3">
                                <p>Get notified once the product is back in stock.
                                </p>
                                <div class="w-full flex items-center justify-start text-sm gap-3">
                                    <input type="text" placeholder="Enter your email" class="w-[70%] border border-gray-500 py-2 px-3"> <button class="bg-black text-white text-sm font-semibold px-3 py-2 rounded-md hover:bg-gray-800 text-no-wrap">Notify Me</button>
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

                    <div class="w-full mt-7  bg-gray-50 rounded-lg p-4 shadow-sm">
                        <!-- Title -->
                        <h3 class="font-semibold text-gray-800 mb-3">Check Delivery</h3>

                        <!-- Input + Button + Icon -->
                        <div class="flex items-center space-x-2 border-b border-gray-300 pb-2">
                            <input
                                type="text"
                                value=""
                                placeholder="Enter Pincode"
                                class="flex-1 bg-transparent outline-none text-gray-700" />
                            <button class="bg-black text-white text-sm font-semibold px-3 py-1 rounded-md hover:bg-gray-800">
                                Change
                            </button>
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>

                        <!-- Delivery Info -->
                        <p class="mt-3 text-sm">
                            <span class="text-green-600 font-semibold">Free delivery</span> | By <span class="font-semibold">Friday, 26 Sept</span>
                        </p>
                    </div>
                    <!-- Quantity and Add to Cart -->
                    <div class="space-y-4 mt-7">
                        <div class="w-full flex items-center justify-center space-x-4">
                            <div class="w-[30%]  flex items-center justify-center gap-7 border border-gray-800 p-3 px-3 rounded-lg">
                                <span class="cursor-pointer ">-</span>
                                <span class="text-black">1</span>
                                <span class="cursor-pointer ">+</span>
                            </div>

                            <div class="col-span-2 max-md:order-3 w-[70%]">
                                <button
                                    class="openCartBtn w-full sm:flex-1 relative rounded-lg overflow-hidden group transform hover:shadow-xl border border-black bg-transparent text-black">
                                    <span
                                        class="relative z-10 flex py-3 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                                        <i class="fas fa-cart-plus"></i> Add to Cart
                                    </span>
                                    <span
                                        class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-[1.2s] ease-in-out ease-out z-0">
                                    </span>
                                </button>
                            </div>


                            <div class="flex space-x-3 max-md:order-2">
                                <!-- <button
                                class="h-12 w-12 flex items-center justify-center rounded-md border hover:bg-white hover:shadow-lg transition-all duration-300 group">
                                <svg class="w-6 h-6 text-gray-600 group-hover:text-red-500 group-hover:scale-110 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button> -->
                                <!-- <button
                                class="h-12 w-12 flex items-center justify-center rounded-md border hover:bg-white hover:shadow-lg transition-all duration-300 group">
                                <svg class="w-6 h-6 text-gray-600 group-hover:text-[#f25b21] group-hover:scale-110 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                </svg>
                            </button> -->
                            </div>
                        </div>

                        <div class="flex w-full items-center justify-start gap-4">
                            <button
                                class="openCartBtn w-full py-1 relative rounded-lg overflow-hidden group transform  hover:shadow-xl border border-[#f15b21] bg-[#f15b21] text-white">
                                <span
                                    class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-[#f15b21]">
                                    <i class=""></i> Buy Now
                                </span>
                                <span
                                    class="absolute inset-0 bg-white -translate-x-full ease-in-out group-hover:translate-x-0 transition-transform duration-[1.4s]  z-0">
                                </span>
                            </button>
                            <button
                                class="relative hidden rounded-md border-2 border-gray-400 py-2 px-6 font-semibold flex items-center justify-center gap-2 text-gray-700 
                                        transition-all duration-500 hover:border-purple-500 hover:text-purple-600 hover:shadow-lg">
                                <i class="fas fa-heart"></i> WISHLIST
                            </button>
                        </div>


                        <div class="flex flex-col">
                            <div class=" border rounded-md divide-y">

                                <!-- Item 1 -->
                                <div class="accordion p-4">
                                    <button class="flex justify-between items-center w-full font-semibold text-left">
                                        <span>Description</span>
                                        <i class="fa-solid fa-chevron-down chev"></i>
                                    </button>
                                    <div class="accordion-content">
                                        <div class="pt-2 text-gray-600">
                                            <?= $ProductData['description'] ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- Item 2 -->
                                <div class="accordion p-4">
                                    <button class="flex justify-between items-center w-full font-semibold text-left">
                                        <span>Additional Information</span>
                                        <i class="fa-solid fa-chevron-down chev"></i>
                                    </button>
                                    <div class="accordion-content">
                                        <div class="pt-2 text-gray-600">
                                            Extra specifications and details go here. The panel closes smoothly too.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Delivery & Return Info -->
                            <div class="mt-6 space-y-3 text-gray-700">
                                <!-- <button id="openDeliveryModal" class="cursor-pointer flex items-center gap-2">
                                <i class="fa-solid fa-truck-fast text-gray-900"></i>
                                <span class="font-semibold">Delivery & Return</span>
                            </button> -->
                                <p>
                                    <i class="fas fa-tags mr-2 text-gray-900"></i>
                                    <span class="font-semibold">Categories:</span> <?= $ProductData['category_name'] ?>
                                </p>
                                <p>
                                    <i class="fa-regular fa-calendar-days mr-3 text-gray-900"></i><span
                                        class="font-semibold">Estimated Delivery:</span> Sep 13 - Sep 17
                                </p>
                                <p>
                                    <i class="fa-regular fa-eye mr-1 text-gray-900"></i>
                                    <span id="viewerCount" class="font-semibold"></span> people are viewing this right now
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
                </div>
        </section>

        <section class="w-[90vw] mx-auto md:mt-10 py-10  gap-10">
            <!-- Left Side -->
            <div class="md:col-span-3 w-full">
                <!-- Average Rating -->
                <h3 class="text-2xl font-bold mb-2">Customer Reviews</h3>

                <!-- Scrolling Reviews (Owl Carousel) -->
                <div class="owl-carousel owl-theme review-carousel">
                    <!-- Review 1 -->
                    <div class="p-2 bg-white border rounded-md relative m-1 h-[28vh] flex flex-col justify-between">
                        <div class="flex flex-col gap-1 items-start mb-2 text-[#f25b21]">
                            <span> ★★★★★</span>
                            <p class="text-gray-700 italic leading-relaxed md:text-sm lg:text-base">
                                "Amazing quality and fast delivery! The packaging was premium and the product
                                feels
                                luxurious."
                            </p>
                        </div>
                        <!-- Reviewer Info -->
                        <div class="flex gap-4 items-center w-full">
                            <div class="flex items-center w-10 h-10">
                                <img src="/public/images/dp.png" alt="John D."
                                    class="w-full h-full rounded-full object-cover border mr-3">
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">John D.</p>
                                <!-- <p class="text-xs text-gray-500">Verified Buyer</p> -->
                            </div>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="p-2 bg-white border rounded-md relative m-1 h-[28vh] flex flex-col justify-between">
                        <div class="flex flex-col gap-1 items-start mb-2 text-[#f25b21]">
                            <span> ★★★★★</span>
                            <p class="text-gray-700 italic leading-relaxed md:text-sm lg:text-base">
                                "Loved the fabric and the trendy style! Feels super comfortable and stylish at the same
                                time."
                            </p>
                        </div>
                        <div class="flex gap-4 items-center">
                            <div class="flex items-center w-10 h-10">
                                <img src="/public/images/dp.png" alt="John D."
                                    class="w-full h-full rounded-full object-cover border mr-3">
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Sarah M.</p>
                                <!-- <p class="text-xs text-gray-500">Fashion Enthusiast</p> -->
                            </div>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="p-2 bg-white border rounded-md relative m-1 h-[28vh] flex flex-col justify-between">
                        <div class="flex flex-col gap-1 items-start mb-2 text-[#f25b21]">
                            <span> ★★★★★</span>
                            <p class="text-gray-700 italic leading-relaxed md:text-sm lg:text-base">
                                "Great fit and excellent customer service. They really care about their customers and it
                                shows!"
                            </p>
                        </div>

                        <div class="flex gap-4 items-center">
                            <div class="flex items-center w-10 h-10">
                                <img src="/public/images/dp.png" alt="John D."
                                    class="w-full h-full rounded-full object-cover border mr-3">
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Alex P.</p>
                                <!-- <p class="text-xs text-gray-500">Loyal Customer</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="md:col-span-2 hidden">
                <!-- Overall Rating -->
                <div class="flex items-center space-x-2 mb-6">
                    <div>
                        <span class="text-2xl text-orange-500">★★★★★</span>
                    </div>
                    <div>
                        <p class="font-semibold">4.7 out of 5</p>
                        <p class="text-sm text-gray-500">Based on 37 reviews ✅</p>
                    </div>
                </div>

                <!-- 5 stars -->
                <div class="flex items-center mb-2">
                    <span class="text-orange-500 mr-2">★★★★★</span>
                    <div class="flex-1 bg-gray-200 h-3 rounded">
                        <div class="bg-orange-500 h-3 rounded" style="width: 70%;"></div>
                    </div>
                    <span class="ml-2 text-sm">26</span>
                </div>

                <!-- 4 stars -->
                <div class="flex items-center mb-2">
                    <span class="text-orange-500 mr-2">★★★★☆</span>
                    <div class="flex-1 bg-gray-200 h-3 rounded">
                        <div class="bg-orange-500 h-3 rounded" style="width: 20%;"></div>
                    </div>
                    <span class="ml-2 text-sm">7</span>
                </div>

                <!-- 3 stars -->
                <div class="flex items-center mb-2">
                    <span class="text-orange-500 mr-2">★★★☆☆</span>
                    <div class="flex-1 bg-gray-200 h-3 rounded">
                        <div class="bg-orange-500 h-3 rounded" style="width: 6%;"></div>
                    </div>
                    <span class="ml-2 text-sm">2</span>
                </div>

                <!-- 2 stars -->
                <div class="flex items-center mb-2">
                    <span class="text-orange-500 mr-2">★★☆☆☆</span>
                    <div class="flex-1 bg-gray-200 h-3 rounded">
                        <div class="bg-orange-500 h-3 rounded" style="width: 3%;"></div>
                    </div>
                    <span class="ml-2 text-sm">1</span>
                </div>

                <!-- 1 star -->
                <div class="flex items-center">
                    <span class="text-orange-500 mr-2">★☆☆☆☆</span>
                    <div class="flex-1 bg-gray-200 h-3 rounded">
                        <div class="bg-orange-500 h-3 rounded" style="width: 1%;"></div>
                    </div>
                    <span class="ml-2 text-sm">1</span>
                </div>
            </div>

        </section>

        <section class="bg-white py-14 max-md:py-8 w-full">
            <div class="w-[90vw] max-md:w-[90vw] mx-auto">
                <div class="flex flex-col mb-6">
                    <h3 class="text-left text-3xl font-extrabold uppercase">YOU MAY ALSO LIKE</h3>
                </div>

                <div class="relative">
                    <div class="owl-carousel owl-theme like-carousel">

                        <!-- Product Card -->
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[300px] max-md:h-[250px] overflow-hidden">
                                <!-- Default Image -->
                                <img src="/public/images/1.webp" alt="Product 1"
                                    class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                <!-- Hover Image -->
                                <img src="/public/images/2.webp" alt="Product 1 Hover"
                                    class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                <!-- Add to favorites Icon (top-right) -->
                                <button
                                    class="absolute top-2 right-3 bg-black/70 text-white h-10 w-10 rounded-full opacity-0 translate-x-5 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-heart"></i>
                                </button>

                                <!-- Add to Cart Icon -->
                                <button
                                    class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                </button>
                            </div>

                            <!-- Product Details -->
                            <div class="p-4 text-center">
                                <h3 class="text-sm font-semibold">GREAT MANIFESTOR POLO</h3>
                                <p class="text-gray-500 line-through text-sm">₹ 1,399.00</p>
                                <p class="text-red-600 font-bold">₹ 1,199.00</p>
                            </div>
                        </div>

                        <!-- Product 2 -->
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[300px] max-md:h-[250px] overflow-hidden">
                                <!-- Default Image -->
                                <img src="/public/images/4.webp" alt="Product 1"
                                    class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                <!-- Hover Image -->
                                <img src="/public/images/5.webp" alt="Product 1 Hover"
                                    class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                <!-- Add to favorites Icon (top-right) -->
                                <button
                                    class="absolute top-2 right-3 bg-black/70 text-white h-10 w-10 rounded-full opacity-0 translate-x-5 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-heart"></i>
                                </button>

                                <!-- Add to Cart Icon -->
                                <button
                                    class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                </button>
                            </div>

                            <!-- Product Details -->
                            <div class="p-4 text-center">
                                <h3 class="text-sm font-semibold">GREAT MANIFESTOR POLO</h3>
                                <p class="text-gray-500 line-through text-sm">₹ 1,399.00</p>
                                <p class="text-red-600 font-bold">₹ 1,199.00</p>
                            </div>
                        </div>

                        <!-- Product 3 -->
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[300px] max-md:h-[250px] overflow-hidden">
                                <!-- Default Image -->
                                <img src="/public/images/6.webp" alt="Product 1"
                                    class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                <!-- Hover Image -->
                                <img src="/public/images/7.webp" alt="Product 1 Hover"
                                    class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                <!-- Add to favorites Icon (top-right) -->
                                <button
                                    class="absolute top-2 right-3 bg-black/70 text-white h-10 w-10 rounded-full opacity-0 translate-x-5 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-heart"></i>
                                </button>

                                <!-- Add to Cart Icon -->
                                <button
                                    class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                </button>
                            </div>

                            <!-- Product Details -->
                            <div class="p-4 text-center">
                                <h3 class="text-sm font-semibold">GREAT MANIFESTOR POLO</h3>
                                <p class="text-gray-500 line-through text-sm">₹ 1,399.00</p>
                                <p class="text-red-600 font-bold">₹ 1,199.00</p>
                            </div>
                        </div>

                        <!-- Product 4 -->
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[300px] max-md:h-[250px] overflow-hidden">
                                <!-- Default Image -->
                                <img src="/public/images/2.webp" alt="Product 1"
                                    class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                <!-- Hover Image -->
                                <img src="/public/images/1.webp" alt="Product 1 Hover"
                                    class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                <!-- Add to favorites Icon (top-right) -->
                                <button
                                    class="absolute top-2 right-3 bg-black/70 text-white h-10 w-10 rounded-full opacity-0 translate-x-5 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-heart"></i>
                                </button>

                                <!-- Add to Cart Icon -->
                                <button
                                    class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                </button>
                            </div>

                            <!-- Product Details -->
                            <div class="p-4 text-center">
                                <h3 class="text-sm font-semibold">GREAT MANIFESTOR POLO</h3>
                                <p class="text-gray-500 line-through text-sm">₹ 1,399.00</p>
                                <p class="text-[#f25b21] font-bold">₹ 1,199.00</p>
                            </div>
                        </div>

                        <!-- Product 5 -->
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[300px] max-md:h-[250px] overflow-hidden">
                                <!-- Default Image -->
                                <img src="/public/images/1.webp" alt="Product 1"
                                    class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                <!-- Hover Image -->
                                <img src="/public/images/2.webp" alt="Product 1 Hover"
                                    class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                <!-- Add to favorites Icon (top-right) -->
                                <button
                                    class="absolute top-2 right-3 bg-black/70 text-white h-10 w-10 rounded-full opacity-0 translate-x-5 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-500 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-heart"></i>
                                </button>

                                <!-- Add to Cart Icon -->
                                <button
                                    class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                </button>
                            </div>

                            <!-- Product Details -->
                            <div class="p-4 text-center">
                                <h3 class="text-sm font-semibold">GREAT MANIFESTOR POLO</h3>
                                <p class="text-gray-500 line-through text-sm">₹ 1,399.00</p>
                                <p class="text-red-600 font-bold">₹ 1,199.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Size Modal -->


    <!-- Delivery Modal -->
    <div id="deliveryModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white w-full w-[65vw] max-md:w-[94vw] shadow-lg relative p-8 max-md:p-5 animate-slideDown">
            <!-- Close Button -->
            <button id="closeDeliveryModal"
                class="absolute top-4 right-4 text-gray-600 hover:text-black animate-rotate-pingpong">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            <!-- Modal Content -->
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
                <img src="/public/images/333.avif" alt="Product"
                    class="w-16 h-16 max-md:w-12 max-md:h-12 object-cover border border-white">
                <div>
                    <h4 class="font-medium text-black max-md:text-sm">BLACK EVERYDAY JOGGERS</h4>
                    <p class="text-sm">
                        <span class="line-through text-black"> ₹230.00</span>
                        <span class="text-[#f25b21] font-semibold text-lg max-md:text-base"> ₹189.00</span>
                    </p>
                </div>
            </div>

            <div class="flex items-center gap-3 max-md:justify-end max-md:w-full">
                <div class="flex items-center border border-gray-500 rounded">
                    <button class="px-3 py-1 text-black bg-transparent">-</button>
                    <input type="text" value="1"
                        class="w-10 text-center border-l border-r border-gray-500 text-black bg-transparent">
                    <button class="px-3 py-1 text-black bg-transparent">+</button>
                </div>
                <button
                    class="openCartBtn flex-1 relative rounded-md overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black">
                    <span
                        class="relative z-10 flex py-1.5 px-6 items-center justify-center gap-2 font-semibold text-base max-md:text-sm transition-colors duration-700 group-hover:text-white">
                        <i class="fas fa-cart-plus" aria-hidden="true"></i> Add to Cart
                    </span>
                    <span
                        class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                    </span>
                </button>
            </div>
        </div>
    </div>

    <script>
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
    </script>




    <script>
        $(document).ready(function() {
            $(".like-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
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

    <!-- <script>
        $(document).ready(function () {
            $(".review-carousel").owlCarousel({
                items: 2,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                loop: true,
                dots: false,
                nav: true,
                navText: ["‹", "›"], // simple arrows
                animateOut: 'fadeOut'
            });
        });
    </script> -->

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
                        items: 2
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

    <script>
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
        document.querySelectorAll('.color-option').forEach(option => {
            option.addEventListener('click', function() {
                // Remove ring from all options
                document.querySelectorAll('.color-option').forEach(opt => {
                    opt.classList.remove('ring-2', 'ring-[#f25b21]', 'ring-offset-4');
                });
                // Add ring to selected option
                this.classList.add('ring-2', 'ring-[#f25b21]', 'ring-offset-4');
            });
        });

        // Size selection functionality
        document.querySelectorAll('.size-option').forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected state from all options
                document.querySelectorAll('.size-option').forEach(opt => {
                    opt.classList.remove('border-[#f25b21]', 'bg-orange-50', 'text-[#f25b21]');
                    opt.classList.add('border-gray-300');
                });
                // Add selected state to clicked option
                this.classList.remove('border-gray-300');
                this.classList.add('border-[#f25b21]', 'bg-orange-50', 'text-[#f25b21]');
            });
        });

        // Quantity controls
        const quantityInput = document.querySelector('input[type="number"]');
        const decreaseBtn = document.querySelector('button:has-text("−")');
        const increaseBtn = document.querySelector('button:has-text("+")');

        document.querySelector('button').addEventListener('click', function() {
            if (this.textContent === '−') {
                const current = parseInt(quantityInput.value);
                if (current > 1) quantityInput.value = current - 1;
            } else if (this.textContent === '+') {
                const current = parseInt(quantityInput.value);
                quantityInput.value = current + 1;
            }
        });

        document.querySelectorAll('button').forEach(btn => {
            if (btn.textContent === '−' || btn.textContent === '+') {
                btn.addEventListener('click', function() {
                    const current = parseInt(quantityInput.value);
                    if (this.textContent === '−' && current > 1) {
                        quantityInput.value = current - 1;
                    } else if (this.textContent === '+') {
                        quantityInput.value = current + 1;
                    }
                });
            }
        });
    </script>


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/specifications.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php"; ?>
</body>