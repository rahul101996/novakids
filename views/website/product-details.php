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

    <div class="w-full mx-auto max-md:mt-6">
        <section class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start w-[90vw] h-auto mx-auto relative">
            <div class="md:h-[200vh] overflow-y-auto grid grid-cols-2 max-md:hidden gap-2">
                <div class="bg-gray-200 overflow-hidden shadow-lg cursor-pointer">
                    <img src="/public/images/222.avif" alt="View 1"
                        class="w-full h-full object-cover image-hover cursor-zoom-in">
                </div>
                <div class="bg-gray-200 overflow-hidden shadow-lg cursor-pointer">
                    <img src="/public/images/333.avif" alt="View 2"
                        class="w-full h-full object-cover image-hover cursor-zoom-in">
                </div>
                <div class="bg-gray-200 overflow-hidden shadow-lg cursor-pointer">
                    <img src="/public/images/444.avif" alt="View 3"
                        class="w-full h-full object-cover image-hover cursor-zoom-in">
                </div>
                <div class="bg-gray-200 overflow-hidden shadow-lg cursor-pointer">
                    <img src="/public/images/7.webp" alt="View 4"
                        class="w-full h-full object-cover image-hover cursor-zoom-in">
                </div>
                <div class="bg-gray-200 overflow-hidden shadow-lg cursor-pointer">
                    <img src="/public/images/222.avif" alt="View 1"
                        class="w-full h-full object-cover image-hover cursor-zoom-in">
                </div>
                <div class="bg-gray-200 overflow-hidden shadow-lg cursor-pointer">
                    <img src="/public/images/333.avif" alt="View 2"
                        class="w-full h-full object-cover image-hover cursor-zoom-in">
                </div>
                <div class="bg-gray-200 overflow-hidden shadow-lg cursor-pointer">
                    <img src="/public/images/444.avif" alt="View 3"
                        class="w-full h-full object-cover image-hover cursor-zoom-in">
                </div>
                <div class="bg-gray-200 overflow-hidden shadow-lg cursor-pointer">
                    <img src="/public/images/7.webp" alt="View 4"
                        class="w-full h-full object-cover image-hover cursor-zoom-in">
                </div>
            </div>

            <!-- Mobile Carousel -->
            <div class="md:hidden relative">
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
            <div class="md:sticky top-32 self-start space-y-4">
                <div class="flex flex-col">
                    <div class="flex items-center mb-2">
                        <h1 class="text-3xl font-bold text-gray-900 tracking-tight">BLACK EVERYDAY JOGGERS</h1>
                        <div class="flex space-x-3 hidden">
                            <button
                                class="p-3 rounded-full glass-effect hover:bg-white hover:shadow-lg transition-all duration-300 group">
                                <svg class="w-6 h-6 text-gray-600 group-hover:text-red-500 group-hover:scale-110 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <button
                                class="p-3 rounded-full glass-effect hover:bg-white hover:shadow-lg transition-all duration-300 group">
                                <svg class="w-6 h-6 text-gray-600 group-hover:text-[#f25b21] group-hover:scale-110 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="flex items-center justify-between w-full space-x-4 mb-3">
                        <div class="">
                            <span class="text-sm text-gray-500 line-through">₹1,899.00</span>
                            <span class="text-xl font-bold text-[#f25b21] mr-2">₹1,199.00</span>

                            <span
                                class="bg-orange-100 text-[#f25b21] text-xs font-semibold px-3 py-1 rounded-full animate-bounce-gentle">34%
                                OFF</span>
                        </div>
                        <div>
                            <span
                                class="bg-gray-100 text-black border text-xs font-semibold px-3 py-1 rounded-full animate-bounce-gentle">453
                                in stock (can be backordered)</span>
                        </div>
                    </div>

                    <p class="text-gray-600">Roomier than your usual hoodie, this one gives you comfort,
                        layering options, and a streetwear vibe all at once. Style Tip: Contrast with fitted bottoms
                        like jeans or joggers to avoid a boxy look.
                    </p>
                </div>

                <!-- Size Selection -->
                <div class="flex flex-col">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-base font-semibold text-gray-900">Size:</h3>
                        <button onclick="document.getElementById('sizeChartModal').classList.remove('hidden')"
                            class="text-base flex items-center text-blue-600 hover:text-blue-800 underline transition-colors">
                            <i class="fa-solid fa-ruler pr-1"></i>Sizing guide</button>
                    </div>

                    <div class="flex flex-wrap">
                        <button
                            class="size-option px-6 py-2 flex text-sm items-center justify-center border border-[#f25b21] bg-orange-50 text-[#f25b21] font-semibold transition-all duration-300 hover:shadow-lg">
                            8-9 Years</button>
                        <button
                            class="size-option px-6 py-2 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">
                            9-10 Years</button>
                        <button
                            class="size-option px-6 py-2 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">
                            10-11 Years</button>
                        <button
                            class="size-option px-6 py-2 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">
                            11-12 Years</button>
                        <button
                            class="size-option px-6 py-2 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">
                            12-13 Years</button>
                        <button
                            class="size-option px-6 py-2 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">
                            13-14 Years</button>
                        <!-- <button
                            class="size-option px-6 py-2 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">
                            17-18 Years</button>
                        <button
                            class="size-option px-6 py-2 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">
                            18-19 Years</button> -->
                    </div>
                </div>

                <!-- Color Selection -->
                <div class="flex flex-col">
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Color:</h3>

                    <div class="flex flex-wrap gap-4">
                        <!-- Color Options Row 1 -->
                        <div class="color-option w-8 h-8 cursor-pointer transition-all duration-200 overflow-hidden">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' fill='%236366f1'/%3E%3C/svg%3E"
                                alt="Blue" class="w-full h-full object-cover">
                        </div>
                        <div class="color-option w-8 h-8 cursor-pointer transition-all duration-200 overflow-hidden">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' fill='%2310b981'/%3E%3C/svg%3E"
                                alt="Green" class="w-full h-full object-cover">
                        </div>
                        <div class="color-option w-8 h-8 cursor-pointer transition-all duration-200 overflow-hidden">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' fill='%23e5e7eb'/%3E%3C/svg%3E"
                                alt="Gray" class="w-full h-full object-cover">
                        </div>
                        <div class="color-option w-8 h-8 cursor-pointer transition-all duration-200 overflow-hidden">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' fill='%23312e81'/%3E%3C/svg%3E"
                                alt="Navy" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                <!-- Quantity and Add to Cart -->
                <div class="space-y-4">
                    <div class="grid grid-cols-4 max-md:grid-cols-2 max-md:gap-4 sm:items-center sm:space-x-6 w-full">
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden max-md:order-1">
                            <button class="px-4 py-1.5 hover:bg-gray-100 transition-colors text-xl font-bold">−</button>
                            <input type="number" value="1" min="1"
                                class="w-16 py-1.5 text-center border-l border-r border-gray-300 focus:outline-none">
                            <button class="px-4 py-1.5 hover:bg-gray-100 transition-colors text-xl font-bold">+</button>
                        </div>

                        <div class="col-span-2 max-md:order-3">
                            <button
                                class="openCartBtn w-full sm:flex-1 relative rounded-lg overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black">
                                <span
                                    class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </span>
                                <span
                                    class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
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
                            <button
                                class="h-12 w-12 flex items-center justify-center rounded-md border hover:bg-white hover:shadow-lg transition-all duration-300 group">
                                <svg class="w-6 h-6 text-gray-600 group-hover:text-[#f25b21] group-hover:scale-110 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <button
                            class="openCartBtn w-full sm:flex-1 relative rounded-lg overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-[#f15b21] bg-[#f15b21] text-white">
                            <span
                                class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-[#f15b21]">
                                <i class=""></i> Buy Now
                            </span>
                            <span
                                class="absolute inset-0 bg-white -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                            </span>
                        </button>
                        <button
                            class="relative rounded-md border-2 border-gray-400 py-2 px-6 font-semibold flex items-center justify-center gap-2 text-gray-700 
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
                                        Roomier than your usual hoodie, this one gives you comfort, layering options,
                                        and a streetwear vibe all at once. Style Tip: Contrast with fitted bottoms like
                                        jeans or joggers to avoid a boxy look.
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
                                <span class="font-semibold">Categories:</span> Joggers
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

        <section class="w-[90vw] mx-auto md:mt-10 py-10 grid grid-cols-1 md:grid-cols-5 gap-10">
            <!-- Left Side -->
            <div class="md:col-span-3">
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
            <div class="md:col-span-2">
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
    <div id="sizeChartModal" class="hidden fixed inset-0 flex items-center justify-center bg-black/50 z-50">
        <div class="bg-white shadow-lg w-[65%] max-md:w-[90%] max-h-[80vh] relative flex flex-col animate-slideDown">
            <!-- Close button -->
            <button onclick="document.getElementById('sizeChartModal').classList.add('hidden')"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 animate-rotate-pingpong">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>

            <!-- Header -->
            <div class="p-6 pb-2 flex-shrink-0">
                <h2 class="text-2xl max-md:text-lg font-bold mb-1">SIZE CHART</h2>
                <p class="text-sm text-gray-500">Reviews: Fits true to size</p>
            </div>

            <!-- Scrollable body -->
            <div class="p-6 pt-0 overflow-y-auto flex-1">
                <!-- Measuring unit toggle (hidden for now) -->
                <div class="flex items-center gap-2 mb-6">
                    <span class="text-gray-700 font-medium">Measuring Unit :</span>
                    <span>Inches</span>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-center text-gray-700">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3">Size</th>
                                <th class="p-3">Chest</th>
                                <th class="p-3">Length</th>
                                <th class="p-3">Sleeve</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="p-3">S</td>
                                <td class="p-3">36</td>
                                <td class="p-3">27</td>
                                <td class="p-3">8</td>
                            </tr>
                            <tr class="border-t bg-gray-50">
                                <td class="p-3">M</td>
                                <td class="p-3">38</td>
                                <td class="p-3">28</td>
                                <td class="p-3">8.5</td>
                            </tr>
                            <tr class="border-t">
                                <td class="p-3">L</td>
                                <td class="p-3">40</td>
                                <td class="p-3">29</td>
                                <td class="p-3">9</td>
                            </tr>
                            <tr class="border-t bg-gray-50">
                                <td class="p-3">XL</td>
                                <td class="p-3">42</td>
                                <td class="p-3">30</td>
                                <td class="p-3">9.5</td>
                            </tr>
                            <tr class="border-t">
                                <td class="p-3">2XL</td>
                                <td class="p-3">44</td>
                                <td class="p-3">31</td>
                                <td class="p-3">10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- How to Measure Section -->
                <div class="mt-8 border-t pt-6 flex flex-col md:flex-row items-center">
                    <!-- Text -->
                    <div class="w-full md:w-[60%]">
                        <h3 class="text-lg font-bold mb-4">HOW TO MEASURE?</h3>
                        <p class="mb-2"><span class="font-bold">CHEST</span> -
                            <span class="text-gray-600">Measure from the stitches below the armpits on one side to
                                another.</span>
                        </p>
                        <p><span class="font-bold">LENGTH</span> -
                            <span class="text-gray-600">Measure from where the shoulder seam meets the collar to the
                                hem.</span>
                        </p>
                        <p class="mb-2">
                            <span class="font-bold">SHOULDER</span> -
                            <span class="text-gray-600">Measure straight across the back, from one shoulder seam to the
                                other.</span>
                        </p>

                        <p class="mb-2">
                            <span class="font-bold">HALF SLEEVE</span> -
                            <span class="text-gray-600">Measure from the top of the shoulder seam to the end of the
                                short
                                sleeve.</span>
                        </p>

                        <p class="mb-2">
                            <span class="font-bold">3/4 SLEEVE</span> -
                            <span class="text-gray-600">Measure from the top of the shoulder seam to a point between the
                                elbow and wrist (mid-forearm).</span>
                        </p>

                        <p>
                            <span class="font-bold">FULL SLEEVE</span> -
                            <span class="text-gray-600">Measure from the shoulder seam down to the wrist.</span>
                        </p>
                    </div>
                    <!-- Image -->
                    <div class="w-full md:w-[40%] flex justify-center">
                        <img src="/public/images/shirt-size.jpg" alt="How to measure T-shirt" class="h-72 max-md:h-64">
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        $(document).ready(function () {
            $(".like-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: { items: 2 },
                    600: { items: 2 },
                    1000: { items: 4 },
                    1280: { items: 4 }
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
        $(document).ready(function () {
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
                    0: { items: 1 },     // Mobile
                    640: { items: 1 },   // Small tablets
                    768: { items: 2 },   // Tablets
                    1024: { items: 2 },  // Desktops
                    1280: { items: 2 }   // Large screens
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
            option.addEventListener('click', function () {
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
            option.addEventListener('click', function () {
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

        document.querySelector('button').addEventListener('click', function () {
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
                btn.addEventListener('click', function () {
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