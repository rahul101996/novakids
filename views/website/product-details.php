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
            <li class="text-black font-semibold">Product Details</li>
        </ol>
    </div>

    <style>
        .image-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .image-hover:hover {
            transform: scale(1.05) rotate(1deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .color-option:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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

    <style>
        /* Place nav buttons below the carousel */
        .like-carousel .owl-nav {
            position: absolute;
            top: -80px;
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

        /* Hover effect */
        /* .like-carousel .owl-nav button span:hover {
            background: #fca45cff;
        } */
    </style>

    <div class="w-full mx-auto py-8">
        <section class="grid grid-cols-2 gap-16 items-start w-[90vw] h-auto mx-auto relative">
            <div class="md:h-[200vh] overflow-y-auto grid grid-cols-2 gap-2">
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
                            <span class="text-xl font-bold text-[#f25b21] mr-2">₹1,199.00</span>
                            <span class="text-sm text-gray-500 line-through">₹1,899.00</span>
                            <!-- <span
                                class="bg-orange-100 text-[#f25b21] text-xs font-semibold px-3 py-1 rounded-full animate-bounce-gentle">34%
                                OFF</span> -->
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

                    <div class="flex flex-wrap gap-3">
                        <button
                            class="size-option h-8 w-8 flex text-sm items-center justify-center border border-[#f25b21] bg-orange-50 text-[#f25b21] font-semibold transition-all duration-300 hover:shadow-lg">XS</button>
                        <button
                            class="size-option h-8 w-8 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">S</button>
                        <button
                            class="size-option h-8 w-8 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">M</button>
                        <button
                            class="size-option h-8 w-8 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">L</button>
                        <button
                            class="size-option h-8 w-8 flex text-sm items-center justify-center border border-gray-300 font-semibold transition-all duration-300">XL</button>
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
                    <div class="flex items-center space-x-6">
                        <!-- Quantity Selector -->
                        <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                            <button class="px-4 py-1.5 hover:bg-gray-100 transition-colors text-xl font-bold">−</button>
                            <input type="number" value="1" min="1"
                                class="w-16 py-1.5 text-center border-l border-r border-gray-300 focus:outline-none">
                            <button class="px-4 py-1.5 hover:bg-gray-100 transition-colors text-xl font-bold">+</button>
                        </div>

                        <!-- Add to Cart -->

                        <button
                            class="openCartBtn flex-1 relative rounded-lg overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black">
                            <span
                                class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </span>
                            <span
                                class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                            </span>
                        </button>
                        <div class="flex space-x-3">
                            <button
                                class="h-12 w-12 items-center justify-center flex rounded-md border hover:bg-white hover:shadow-lg transition-all duration-300 group">
                                <svg class="w-6 h-6 text-gray-600 group-hover:text-red-500 group-hover:scale-110 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </button>
                            <button
                                class="h-12 w-12 items-center justify-center flex rounded-md border hover:bg-white hover:shadow-lg transition-all duration-300 group">
                                <svg class="w-6 h-6 text-gray-600 group-hover:text-[#f25b21] group-hover:scale-110 transition-all"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="grid grid-cols-2 gap-4 hidden">
                        <button
                            class="relative overflow-hidden rounded-md py-2 px-6 font-semibold flex items-center justify-center gap-2 bg-gradient-to-r from-purple-800 to-orange-700 text-white">

                            <!-- Text -->
                            <span class="relative z-10 flex items-center gap-2">
                                <i class="fas fa-bolt"></i> BUY NOW
                            </span>

                            <!-- Continuous shimmer overlay -->
                            <span class="absolute inset-0 shimmer-overlay"></span>
                        </button>

                        <style>
                            /* Shimmer keyframes */
                            @keyframes shimmer {
                                0% {
                                    transform: translateX(-100%) skewX(12deg);
                                }

                                100% {
                                    transform: translateX(100%) skewX(12deg);
                                }
                            }

                            /* Overlay styling */
                            .shimmer-overlay {
                                background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, 0.3) 50%, transparent 100%);
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                transform: translateX(-100%) skewX(12deg);
                                animation: shimmer 2s infinite linear;
                                pointer-events: none;
                                /* ensure button clicks still work */
                            }
                        </style>


                        <!-- Wishlist -->
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
                            <p><i class="fa-solid fa-truck-fast mr-2 text-gray-900"></i><span
                                    class="font-semibold">Delivery & Return</span></p>
                            <!-- <p><i class="fa-solid fa-ruler mr-2 text-gray-900"></i><span class="font-semibold">Size
                                    Guide</span></p> -->
                            <p><i class="fa-regular fa-calendar-days mr-2 text-gray-900"></i><span
                                    class="font-semibold">Estimated Delivery:</span> Sep 13 - Sep 17
                            </p>
                            <p>
                                <i class="fa-regular fa-eye mr-2 text-gray-900"></i>
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

                        <!-- Categories, Tags, Brands -->
                        <div class="mt-4 text-base text-gray-900 space-y-1">
                            <p><span class="font-semibold">Categories:</span> Joggers</p>
                            <p><span class="font-semibold">Brand:</span> Nova</p>
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

        <!-- Features Section -->
        <section class="mt-20 grid md:grid-cols-4 gap-6 animate-fade-in w-[85vw] mx-auto">
            <div
                class="text-center p-6 glass-effect rounded-md hover:shadow-md transition-all duration-300 hover:scale-105 group">
                <div
                    class="w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-200 transition-colors">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">Free Shipping</h3>
                <p class="text-sm text-gray-600 mt-2">On orders above ₹999</p>
            </div>

            <div
                class="text-center p-6 glass-effect rounded-md hover:shadow-md transition-all duration-300 hover:scale-105 group">
                <div
                    class="w-12 h-12 mx-auto mb-4 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-200 transition-colors">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">Easy Returns</h3>
                <p class="text-sm text-gray-600 mt-2">30 days return policy</p>
            </div>

            <div
                class="text-center p-6 glass-effect rounded-md hover:shadow-md transition-all duration-300 hover:scale-105 group">
                <div
                    class="w-12 h-12 mx-auto mb-4 bg-purple-100 rounded-full flex items-center justify-center group-hover:bg-purple-200 transition-colors">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">Secure Payment</h3>
                <p class="text-sm text-gray-600 mt-2">100% secure checkout</p>
            </div>

            <div
                class="text-center p-6 glass-effect rounded-md hover:shadow-md transition-all duration-300 hover:scale-105 group">
                <div
                    class="w-12 h-12 mx-auto mb-4 bg-orange-100 rounded-full flex items-center justify-center group-hover:bg-orange-200 transition-colors">
                    <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.636a9.364 9.364 0 010 18.728 9.364 9.364 0 010-18.728z" />
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">24/7 Support</h3>
                <p class="text-sm text-gray-600 mt-2">Always here to help</p>
            </div>
        </section>

        <section class="bg-white py-14 w-full">
            <div class="w-[90vw] max-md:w-[90vw] mx-auto">
                <div class="flex flex-col mb-10">
                    <h3 class="text-left text-3xl font-extrabold uppercase">YOU MAY ALSO LIKE</h3>
                </div>

                <div class="relative">
                    <div class="owl-carousel owl-theme like-carousel">

                        <!-- Product Card -->
                        <div class="group relative m-2 p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[400px] overflow-hidden">
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
                                <p class="text-gray-500 line-through text-sm">Rs. 1,399.00</p>
                                <p class="text-red-600 font-bold">Rs. 1,199.00</p>
                            </div>
                        </div>

                        <!-- Product 2 -->
                        <div class="group relative m-2 p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[400px] overflow-hidden">
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
                                <p class="text-gray-500 line-through text-sm">Rs. 1,399.00</p>
                                <p class="text-red-600 font-bold">Rs. 1,199.00</p>
                            </div>
                        </div>

                        <!-- Product 3 -->
                        <div class="group relative m-2 p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[400px] overflow-hidden">
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
                                <p class="text-gray-500 line-through text-sm">Rs. 1,399.00</p>
                                <p class="text-red-600 font-bold">Rs. 1,199.00</p>
                            </div>
                        </div>

                        <!-- Product 4 -->
                        <div class="group relative m-2 p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[400px] overflow-hidden">
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
                                <p class="text-gray-500 line-through text-sm">Rs. 1,399.00</p>
                                <p class="text-[#f25b21] font-bold">Rs. 1,199.00</p>
                            </div>
                        </div>

                        <!-- Product 5 -->
                        <div class="group relative m-2 p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[400px] overflow-hidden">
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
                                <p class="text-gray-500 line-through text-sm">Rs. 1,399.00</p>
                                <p class="text-red-600 font-bold">Rs. 1,199.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div id="sizeChartModal" class="hidden fixed inset-0 flex items-center justify-center bg-black/50 z-50">
        <div class="bg-white rounded-md shadow-lg max-w-3xl w-full max-h-[90vh] relative flex flex-col">
            <!-- Close button -->
            <button onclick="document.getElementById('sizeChartModal').classList.add('hidden')"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 animate-rotate-pingpong">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>

            <!-- Header -->
            <div class="p-6 pb-2 flex-shrink-0">
                <h2 class="text-2xl font-bold mb-1">SIZE CHART</h2>
                <p class="text-sm text-gray-500">Reviews: Fits true to size</p>
            </div>

            <!-- Scrollable body -->
            <div class="p-6 pt-0 overflow-y-auto flex-1">
                <!-- Measuring unit toggle (hidden for now) -->
                <div class="flex items-center gap-2 mb-6">
                    <span class="text-gray-700 font-medium">Measuring Unit :</span>
                    <span>Inches</span>
                    <!-- <label class="flex items-center gap-1 cursor-pointer">
                        <input type="radio" name="unit" checked class="accent-blue-600"> Inches
                    </label>
                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="radio" name="unit" class="accent-blue-600"> Centimetres
                    </label> -->
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
                    </div>
                    <!-- Image -->
                    <div class="w-full md:w-[40%] flex justify-center">
                        <img src="/public/images/size.jpg" alt="How to measure T-shirt" class="h-56">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Bottom Strip -->
    <div id="bottomStrip" class="fixed bottom-0 left-0 w-full bg-gray-50 shadow-lg border-t p-2 hidden z-50">
        <div class="w-[90vw] mx-auto flex items-center justify-between">
            <!-- Product Info -->
            <div class="flex items-center gap-4">
                <img src="/public/images/333.avif" alt="Product" class="w-20 h-20 object-cover">
                <div>
                    <h4 class="font-medium text-gray-800">BLACK EVERYDAY JOGGERS</h4>
                    <p class="text-sm">
                        <span class="line-through text-gray-400">$230.00</span>
                        <span class="text-red-500 font-semibold"> $189.00</span>
                    </p>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3">
                <div class="flex items-center border rounded">
                    <button class="px-3 py-1 text-gray-600">-</button>
                    <input type="text" value="1" class="w-10 text-center border-l border-r">
                    <button class="px-3 py-1 text-gray-600">+</button>
                </div>
                <button
                    class="openCartBtn flex-1 relative rounded-lg overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black">
                    <span
                        class="relative z-10 flex py-1.5 px-6 items-center justify-center gap-2 font-semibold text-base transition-colors duration-700 group-hover:text-white">
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
                    0: { items: 1 },
                    600: { items: 2 },
                    1000: { items: 4 },
                    1280: { items: 4 }
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