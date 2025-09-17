<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>


<body class="overflow-x-hidden archivo-narrow-k">

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <style>
        @keyframes glitch {
            0% {
                text-shadow: 2px 0 red, -2px 0 blue;
            }

            20% {
                text-shadow: -2px -2px lime, 2px 2px pink;
            }

            40% {
                text-shadow: 2px 2px cyan, -2px -2px yellow;
            }

            60% {
                text-shadow: -2px 2px magenta, 2px -2px orange;
            }

            80% {
                text-shadow: 2px -2px purple, -2px 2px teal;
            }

            100% {
                text-shadow: none;
            }
        }

        .group-hover\:animate-glitch {
            animation: glitch 0.6s steps(2, end) infinite;
        }
    </style>

    <!-- Hero Section -->
    <section
        class="relative h-[88vh] max-md:h-[90vh] flex items-center bg-gradient-to-r from-red-800 to-black overflow-hidden">
        <!-- Background Image Overlay -->
        <div class="absolute inset-0 bg-[url('/public/images/banner.webp')] bg-cover bg-center opacity-70"></div>
        <h2 class="absolute md:top-16 md:left-10 max-md:left-8 max-md:bottom-40 text-7xl max-md:text-5xl font-extrabold text-white"
            data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
            NEW <br> IN <br> FOR <br> YOUNGSTARS
        </h2>

        <div class="absolute bottom-20 left-10">
            <button onclick="window.location.href = 'shop'"
                class="relative px-10 py-3 bg-transparent hover:bg-white text-white hover:text-black border border-white rounded-md font-semibold shadow-lg overflow-hidden group transition-all duration-300">
                <span class="relative z-10 block transition-colors duration-500 group-hover:animate-glitch">SHOP
                    NOW</span>
                <span
                    class="absolute inset-0 bg-white transform scale-x-0 origin-left transition-transform duration-500 group-hover:scale-x-100"></span>
            </button>
        </div>

        <div class="absolute top-28 right-16 bg-white/10 backdrop-blur-md px-6 py-4 rounded-2xl border border-white/20 max-md:hidden"
            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
            <p class="text-white text-xl font-bold tracking-wider uppercase">
                ✦ Limited Drop
            </p>
            <span class="text-sm text-gray-300">Streetwear ’25</span>
        </div>

        <p
            class="absolute bottom-12 right-12 max-md:bottom-4 max-md:right-4 text-2xl font-bold text-white rotate-[-6deg] opacity-80 animate-fade">
            #GenZStyle
        </p>
    </section>

    <style>
        /* Place nav buttons below the carousel */
        .new-arrival-carousel .owl-nav {
            position: absolute;
            top: -55px;
            /* push below blog cards */
            left: 96%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        /* Style smaller buttons */
        .new-arrival-carousel .owl-nav button span {
            font-size: 16px;
            padding: 6px 10px;
            background: #000000ff;
            /* Tailwind pink-500 */
            color: white;
            border-radius: 9999px;
            /* fully rounded */
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .new-arrival-carousel .owl-nav {
                top: -120px;
                left: 85%;
            }
        }
    </style>

    <section class="bg-white py-14 w-full">
        <div class="w-[90vw] max-md:w-[90vw] mx-auto">
            <div class="flex flex-col mb-10 max-md:mb-2" data-aos="fade-right" data-aos-duration="1000"
                data-aos-delay="100">
                <h3 class="text-left text-3xl font-extrabold mb-3 uppercase">New Arrival</h3>
                <p class="text-left text-gray-600 text-lg max-md:text-base max-w-xl">
                    Be the first to explore our latest drop — fresh styles crafted for teens who love to stay ahead of
                    the trend.
                </p>
            </div>

            <div class="relative">
                <div class="owl-carousel owl-theme new-arrival-carousel">
                    <!-- Product 2 -->
                    <a href="products/product-details" class="block">
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden group">
                                <!-- Default Image -->
                                <img src="/public/images/111.avif" alt="Product 1"
                                    class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                <!-- Hover Image -->
                                <img src="/public/images/1112.avif" alt="Product 1 Hover"
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
                    </a>

                    <!-- Product 3 -->
                    <a href="products/product-details" class="block">
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden group">
                                <!-- Default Image -->
                                <img src="/public/images/333.avif" alt="Product 1"
                                    class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                <!-- Hover Image -->
                                <img src="/public/images/3332.avif" alt="Product 1 Hover"
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
                    </a>

                    <!-- Product 4 -->
                    <a href="products/product-details" class="block">
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden group">
                                <!-- Default Image -->
                                <img src="/public/images/4441.avif" alt="Product 1"
                                    class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                <!-- Hover Image -->
                                <img src="/public/images/4442.avif" alt="Product 1 Hover"
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
                    </a>

                    <!-- Product 5 -->
                    <a href="products/product-details" class="block">
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden group">
                                <!-- Default Image -->
                                <img src="/public/images/11.avif" alt="Product 1"
                                    class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                <!-- Hover Image -->
                                <img src="/public/images/555.avif" alt="Product 1 Hover"
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
                    </a>

                    <!-- Product Card -->
                    <a href="products/product-details" class="block">
                        <div
                            class="group relative md:m-2 md:p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                            <!-- Discount Badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                SAVE 14%
                            </span>

                            <!-- Product Images -->
                            <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden group">
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
                                <p class="text-[#f25b21] font-bold">₹ 1,199.00</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section -->
    <section class="pb-12 relative">
        <div class="absolute -top-14 -left-14 w-auto h-auto opacity-20">
            <img src="/public/images/naruto.webp" alt="" class="w-40 h-auto">
        </div>
        <div class="flex flex-col mb-10" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
            <h2 class="text-center text-3xl font-extrabold mb-3 uppercase">Categories</h2>
            <p class="text-center text-gray-600 text-lg max-md:text-base max-w-2xl max-md:px-2 mx-auto">
                Discover trendy, comfortable, and versatile outfits for teen boys — from casual wear to bold streetwear,
                Nova Universe has it all.
            </p>

        </div>


        <div class="grid grid-cols-3 md:grid-cols-3 md:gap-16 w-[90vw] max-md:w-full mx-auto md:px-4">
            <!-- Tees -->
            <div class="relative group overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-duration="1000"
                data-aos-delay="200">
                <img src="/public/images/11.avif" alt="Tees"
                    class="w-full h-[380px] max-md:h-[200px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                <!-- Overlay -->
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <!-- Text -->
                <div
                    class="absolute bottom-6 pb-5 left-1/2 transform -translate-x-1/2 translate-y-6 group-hover:translate-y-0 transition-all duration-500 ease-out text-white font-extrabold text-3xl max-md:text-base tracking-wide">
                    <span class="group-hover:text-[#f25b21] transition-colors duration-300 uppercase">Tees</span>
                </div>
            </div>

            <!-- Co-ords -->
            <div class="relative group overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-duration="1000"
                data-aos-delay="200">
                <img src="/public/images/coooo.png" alt="Co-ords"
                    class="w-full h-[380px] max-md:h-[200px] object-cover object-bottom transform group-hover:scale-110 transition duration-700 ease-out">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="absolute bottom-6 pb-5 left-1/2 transform -translate-x-1/2 translate-y-6 group-hover:translate-y-0 transition-all duration-500 ease-out text-white font-extrabold text-3xl max-md:text-base tracking-wide">
                    <span
                        class="group-hover:text-[#f25b21] transition-colors duration-300 uppercase whitespace-nowrap">Co-ords</span>
                </div>
            </div>

            <!-- Joggers -->
            <div class="relative group overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-duration="1000"
                data-aos-delay="200">
                <img src="/public/images/Joggers.avif" alt="Joggers"
                    class="w-full h-[380px] max-md:h-[200px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="absolute bottom-6 pb-5 left-1/2 transform -translate-x-1/2 translate-y-6 group-hover:translate-y-0 transition-all duration-500 ease-out text-white font-extrabold text-3xl max-md:text-base tracking-wide">
                    <span class="group-hover:text-[#f25b21] transition-colors duration-300 uppercase">Joggers</span>
                </div>
            </div>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 h-[90vh] max-md:h-[150vh] mt-12">
        <!-- Left Image Block -->
        <div class="relative bg-cover bg-center bg-top" style="background-image: url('/public/images/f5.webp');">
            <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-center text-center text-white">
                <h2 class="text-xl md:text-2xl font-semibold mb-4">
                    Stylish boys’ tees and <br> active outfits
                </h2>
                <a href="/shop"
                    class="relative inline-block px-6 py-2 rounded-md border border-white text-white font-semibold overflow-hidden group">
                    <!-- Text -->
                    <span class="relative z-10 transition-colors duration-500 group-hover:text-black">
                        Shop Now
                    </span>
                    <!-- Background overlay -->
                    <span
                        class="absolute inset-0 bg-white transform scale-x-0 origin-left transition-transform duration-500 group-hover:scale-x-100"></span>
                </a>

            </div>
        </div>

        <!-- Right Image Block -->
        <div class="relative bg-cover bg-top" style="background-image: url('/public/images/b1.jpg');">
            <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-center text-center text-white">
                <h2 class="text-xl md:text-2xl font-semibold mb-4">
                    Comfort wear for every <br> boys’ occasion
                </h2>
                <a href="/shop"
                    class="relative inline-block px-6 py-2 rounded-md border border-white text-white font-semibold overflow-hidden group">
                    <span class="relative z-10 transition-colors duration-500 group-hover:text-black">
                        Shop Now
                    </span>
                    <span
                        class="absolute inset-0 bg-white transform scale-x-0 origin-left transition-transform duration-500 group-hover:scale-x-100"></span>
                </a>
            </div>
        </div>
    </section>

    <section class="relative w-full h-auto max-md:h-[30vh]">
        <!-- Banner Image -->
        <img src="/public/images/b2.avif" alt="" class="w-full h-auto max-md:h-[30vh]">

        <!-- Hotspot 1 (bottom-left) -->
        <div class="absolute bottom-[20%] left-[30%] group max-md:hidden">
            <!-- Animated Dot -->
            <div class="relative flex items-center justify-center">
                <!-- Outer Ping -->
                <span class="absolute inline-flex h-6 w-6 rounded-full bg-orange-500 opacity-75 animate-ping"></span>
                <!-- Inner Dot -->
                <span class="relative inline-flex h-4 w-4 rounded-full bg-orange-500 border-2 border-white"></span>
            </div>

            <!-- Tooltip -->
            <div
                class="absolute bottom-10 -left-[120px] opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                <div class="relative bg-white shadow-lg p-2 w-64 flex items-center space-x-2">
                    <!-- Pointer -->
                    <div
                        class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-0 h-0 border-l-8 border-r-8 border-t-8 border-transparent border-t-white">
                    </div>

                    <img src="/public/images/f8.webp" alt="Product 1" class="w-20 h-20 object-cover">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Gotham Shirt</p>
                        <p class="text-sm font-semibold text-[#f25b21]">₹ 1,999</p>
                        <a href="#" class="text-sm text-gray-800 underline">View Product</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Hotspot 2 (center) -->
        <div class="absolute top-[27%] left-[52%] transform -translate-x-1/2 group">
            <!-- Animated Dot -->
            <div class="relative flex items-center justify-center">
                <!-- Outer Ping -->
                <span class="absolute inline-flex h-6 w-6 rounded-full bg-orange-500 opacity-75 animate-ping"></span>
                <!-- Inner Dot -->
                <span class="relative inline-flex h-4 w-4 rounded-full bg-orange-500 border-2 border-white"></span>
            </div>

            <!-- Tooltip -->
            <div
                class="absolute top-10 left-1/2 -translate-x-1/2 opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                <div class="relative bg-white shadow-lg p-2 w-64 flex items-center space-x-2">
                    <!-- Pointer -->
                    <div
                        class="absolute -top-2 left-1/2 -translate-x-1/2 w-0 h-0 border-l-8 border-r-8 border-b-8 border-transparent border-b-white">
                    </div>

                    <img src="/public/images/f9.webp" alt="Product 2" class="w-20 h-20 object-cover">
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Gotham Shirt</p>
                        <p class="text-sm font-semibold text-[#f25b21]">₹ 1,999</p>
                        <a href="#" class="text-sm text-gray-800 underline">View Product</a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="pb-12 pt-20 relative overflow-hidden hidden">
        <div class="absolute -top-8 -right-12 w-auto h-auto opacity-20">
            <img src="/public/images/net.webp" alt="" class="w-48 h-auto">
        </div>
        <div class="flex flex-col items-center mb-8" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
            <h2 class="text-center text-3xl font-extrabold mb-3">SHOP BY STYLE</h2>
            <p class="text-center text-gray-600 text-lg max-md:text-base max-md:px-2 max-w-2xl mx-auto">
                Explore a range of styles crafted for every mood and moment — from laid-back casuals to standout
                streetwear,
                Nova universe makes sure you look on point, every time.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-[90vw] mx-auto px-4">

            <!-- Korean Look -->
            <a href="products/product-details" class="block">
                <div class="relative group">
                    <img src="/public/images/img1.avif" alt="Korean Look"
                        class="w-full h-[350px] max-md:h-[250px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                </div>
            </a>

            <a href="products/product-details" class="block">
                <!-- Textured Polos -->
                <div class="relative group">
                    <img src="/public/images/img2.avif" alt="Textured Polos"
                        class="w-full h-[350px] max-md:h-[250px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                </div>
            </a>

            <a href="products/product-details" class="block">
                <!-- Plaid Shirts -->
                <div class="relative group">
                    <img src="/public/images/img3.avif" alt="Plaid Shirts"
                        class="w-full h-[350px] max-md:h-[250px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                </div>
            </a>
        </div>
    </section>

    <section class="relative w-full h-[80vh] bg-fixed bg-center bg-cover hidden"
        style="background-image: url('/public/images/123.avif');">

        <!-- Optional overlay for readability -->
        <div class="absolute inset-0 bg-black/30"></div>

        <!-- Content on top -->
        <div class="relative z-10 flex items-center justify-center h-full">
            <h2 class="text-white text-4xl font-bold">Parallax Section</h2>
        </div>
    </section>

    <section class="bg-white py-14 w-full relative overflow-hidden">
        <div class="absolute -top-12 -right-14 max-md:-right-8 max-md:-top-10 w-auto h-auto opacity-20">
            <img src="/public/images/net.webp" alt="" class="w-48 max-md:w-32 h-auto">
        </div>
        <div class="w-[90vw] max-md:w-[90vw] mx-auto">
            <div class="flex flex-col mb-10" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <h2 class="text-center text-3xl font-extrabold mb-3 uppercase">Featured Collection</h2>
                <p class="text-center text-gray-600 text-lg max-md:text-base max-w-2xl mx-auto">
                    Handpicked styles that define the season — our featured collection brings together the freshest
                    trends, bold designs, and everyday essentials crafted to elevate your wardrobe.
                </p>

            </div>

            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-12 max-md:gap-2">
                <a href="products/product-details" class="block">
                    <div class="relative group changingimg w-full max-w-sm mx-auto cursor-pointer">
                        <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden">
                            <!-- Discount badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                SAVE 23%
                            </span>

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

                            <!-- Multiple images stacked -->
                            <img src="/public/images/f1.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                            <img src="/public/images/f2.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                            <img src="/public/images/f33.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                            <!-- Dots -->
                            <!-- <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                                <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                                <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                                <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            </div> -->
                        </div>

                        <!-- Product info below the images -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                            <p class="text-gray-500 line-through text-sm">₹ 1,299.00</p>
                            <p class="text-[#f25b21] font-bold">₹ 999.00</p>
                        </div>
                    </div>
                </a>


                <a href="products/product-details" class="block">
                    <div class="relative group changingimg w-full max-w-sm mx-auto cursor-pointer">
                        <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden">
                            <!-- Discount badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">SAVE
                                23%</span>

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

                            <!-- Multiple images stacked -->
                            <img src="/public/images/f7.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                            <img src="/public/images/f8.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                            <img src="/public/images/f99.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        </div>

                        <!-- Product info below the images -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                            <p class="text-gray-500 line-through text-sm">₹ 1,299.00</p>
                            <p class="text-[#f25b21] font-bold">₹ 999.00</p>
                        </div>
                    </div>
                </a>

                <a href="products/product-details" class="block">
                    <div class="relative group changingimg w-full max-w-sm mx-auto cursor-pointer">
                        <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden">
                            <!-- Discount badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">SAVE
                                23%</span>

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

                            <!-- Multiple images stacked -->
                            <img src="/public/images/f3.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                            <img src="/public/images/f4.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                            <img src="/public/images/f55.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        </div>

                        <!-- Product info below the images -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                            <p class="text-gray-500 line-through text-sm">₹ 1,299.00</p>
                            <p class="text-[#f25b21] font-bold">₹ 999.00</p>
                        </div>
                    </div>
                </a>

                <a href="products/product-details" class="block">
                    <div class="relative group changingimg w-full max-w-sm mx-auto cursor-pointer">
                        <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden">
                            <!-- Discount badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">SAVE
                                23%</span>

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

                            <!-- Multiple images stacked -->
                            <img src="/public/images/f5.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                            <img src="/public/images/f6.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                            <img src="/public/images/f77.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        </div>

                        <!-- Product info below the images -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                            <p class="text-gray-500 line-through text-sm">₹ 1,299.00</p>
                            <p class="text-[#f25b21] font-bold">₹ 999.00</p>
                        </div>
                    </div>
                </a>

                <a href="products/product-details" class="block">
                    <div class="relative group changingimg w-full max-w-sm mx-auto cursor-pointer">
                        <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden">
                            <!-- Discount badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">SAVE
                                23%</span>

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

                            <!-- Multiple images stacked -->

                            <img src="/public/images/f9.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                            <img src="/public/images/f10.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        </div>

                        <!-- Product info below the images -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                            <p class="text-gray-500 line-through text-sm">₹ 1,299.00</p>
                            <p class="text-[#f25b21] font-bold">₹ 999.00</p>
                        </div>
                    </div>
                </a>

                <a href="products/product-details" class="block">
                    <div class="relative group changingimg w-full max-w-sm mx-auto cursor-pointer">
                        <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden">
                            <!-- Discount badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">SAVE
                                23%</span>

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

                            <!-- Multiple images stacked -->
                            <img src="/public/images/f11.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                            <img src="/public/images/f12.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        </div>

                        <!-- Product info below the images -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                            <p class="text-gray-500 line-through text-sm">₹ 1,299.00</p>
                            <p class="text-[#f25b21] font-bold">₹ 999.00</p>
                        </div>
                    </div>
                </a>

                <a href="products/product-details" class="block">
                    <div class="relative group changingimg w-full max-w-sm mx-auto cursor-pointer">
                        <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden">
                            <!-- Discount badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">SAVE
                                23%</span>

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

                            <!-- Multiple images stacked -->
                            <img src="/public/images/f13.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                            <img src="/public/images/f14.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                        </div>

                        <!-- Product info below the images -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                            <p class="text-gray-500 line-through text-sm">₹ 1,299.00</p>
                            <p class="text-[#f25b21] font-bold">₹ 999.00</p>
                        </div>
                    </div>
                </a>

                <a href="products/product-details" class="block">
                    <div class="relative group changingimg w-full max-w-sm mx-auto cursor-pointer">
                        <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden">
                            <!-- Discount badge -->
                            <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">SAVE
                                23%</span>

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

                            <!-- Multiple images stacked -->
                            <img src="/public/images/2.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                            <img src="/public/images/1.webp"
                                class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        </div>

                        <!-- Product info below the images -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                            <p class="text-gray-500 line-through text-sm">₹ 1,299.00</p>
                            <p class="text-[#f25b21] font-bold">₹ 999.00</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <style>
        @keyframes scroll {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .marquee {
            animation: scroll 12s linear infinite;
        }

        .marquee-content {
            min-width: 200%;
        }
    </style>

    <!-- Marquee Section -->
    <section class="overflow-hidden bg-gradient-to-r from-orange-50 via-transparent to-orange-50 py-2 md:my-6">
        <div class="relative w-full group">
            <div class="marquee flex whitespace-nowrap">
                <div class="marquee-content flex items-center space-x-10 px-10">
                    <!-- Repeat Content Twice for Infinite Scroll -->
                    <template id="marquee-items">
                        <div
                            class="flex items-center space-x-6 text-outline transition-all duration-300 text-gray-900 font-semibold text-2xl max-md:text-lg cursor-pointer">
                            <span>Streetwear</span>
                            <span class="text-gray-900 text-2xl max-md:text-lg">
                                #
                            </span>
                        </div>

                        <div
                            class="flex items-center space-x-6 text-outline transition-all duration-300 text-gray-900 font-semibold text-2xl max-md:text-lg cursor-pointer">
                            <span>Sneakers</span>
                            <span class="text-gray-900 text-2xl max-md:text-lg">
                                #
                            </span>
                        </div>

                        <div
                            class="flex items-center space-x-6 text-outline transition-all duration-300 text-gray-900 font-semibold text-2xl max-md:text-lg cursor-pointer">
                            <span>Oversized Fits</span>
                            <span class="text-gray-900 text-2xl max-md:text-lg">
                                #
                            </span>
                        </div>

                        <div
                            class="flex items-center space-x-6 text-outline transition-all duration-300 text-gray-900 font-semibold text-2xl max-md:text-lg cursor-pointer">
                            <span>Casual Drip</span>
                            <span class="text-gray-900 text-2xl max-md:text-lg">
                                #
                            </span>
                        </div>
                        <div
                            class="flex items-center space-x-6 text-outline transition-all duration-300 text-gray-900 font-semibold text-2xl max-md:text-lg cursor-pointer">
                            <span>Streetwear</span>
                            <span class="text-gray-900 text-2xl max-md:text-lg">
                                #
                            </span>
                        </div>

                        <div
                            class="flex items-center space-x-6 text-outline transition-all duration-300 text-gray-900 font-semibold text-2xl max-md:text-lg cursor-pointer">
                            <span>Sneakers</span>
                            <span class="text-gray-900 text-2xl max-md:text-lg">
                                #
                            </span>
                        </div>

                        <div
                            class="flex items-center space-x-6 text-outline transition-all duration-300 text-gray-900 font-semibold text-2xl max-md:text-lg cursor-pointer">
                            <span>Oversized Fits</span>
                            <span class="text-gray-900 text-2xl max-md:text-lg">
                                #
                            </span>
                        </div>

                        <div
                            class="flex items-center space-x-6 text-outline transition-all duration-300 text-gray-900 font-semibold text-2xl max-md:text-lg cursor-pointer">
                            <span>Casual Drip</span>
                            <span class="text-gray-900 text-2xl max-md:text-lg">
                                #
                            </span>
                        </div>
                    </template>

                    <!-- Inject Items Twice -->
                    <div class="flex items-center space-x-10">
                        <script>
                            const items = document.getElementById('marquee-items').content;
                            const container = document.currentScript.parentElement;
                            container.appendChild(items.cloneNode(true));
                            container.appendChild(items.cloneNode(true)); // Two copies for infinite loop
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-16 w-full">
        <div class="flex flex-col mb-10" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
            <h2 class="text-center text-3xl font-extrabold mb-3 uppercase">Our Partners</h2>
            <p class="text-center text-gray-600 text-lg max-md:text-base max-md:px-4 max-w-2xl mx-auto">
                We’re proud to work with trusted partners who share our vision and help us create lasting impact
                together.
            </p>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-5 md:gap-4 w-[80vw] mx-auto max-md:w-[90vw]">
            <div
                class="h-36 max-md:h-24 rounded-lg overflow-hidden w-full md:p-2 border border-white hover:border hover:border-gray-300">
                <img src="/public/images/partner1.png" alt="p1" class="w-full h-full object-contain">
            </div>
            <div
                class="h-36 max-md:h-24 rounded-lg overflow-hidden w-full md:p-2 border border-white hover:border hover:border-gray-300">
                <img src="/public/images/partner2.png" alt="p2" class="w-full h-full object-contain">
            </div>
            <div
                class="h-36 max-md:h-24 rounded-lg overflow-hidden w-full md:p-2 border border-white hover:border hover:border-gray-300">
                <img src="/public/images/partner3.png" alt="p3" class="w-full h-full object-contain">
            </div>
            <div
                class="h-36 max-md:h-24 rounded-lg overflow-hidden w-full md:p-2 border border-white hover:border hover:border-gray-300">
                <img src="/public/images/partner4.png" alt="p4" class="w-full h-full object-contain">
            </div>
            <div
                class="h-36 max-md:h-24 rounded-lg overflow-hidden w-full md:p-2 border border-white hover:border hover:border-gray-300">
                <img src="/public/images/partner5.png" alt="p5" class="w-full h-full object-contain">
            </div>
        </div>
    </section>


    <style>
        /* Animated gradient text */
        .animated-gradient {
            background-image: linear-gradient(270deg, #f58529, #dd2a7b, #8134af, #515bd4);
            background-size: 600% 600%;
            animation: gradientMove 4s ease infinite;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>


    <style>
        .masonry-container {
            column-count: 2;
            /* ✅ Always 2 columns */
            column-gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .masonry-item {
            display: inline-block;
            margin-bottom: 20px;
            width: 100%;
            break-inside: avoid;
            /* border-radius: 16px; */
            overflow: hidden;
        }

        .masonry-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            /* border-radius: 16px; */
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .masonry-container {
                column-count: 3;
            }
        }

        @media (max-width: 768px) {
            .masonry-container {
                column-count: 2;
                column-gap: 5px;
                padding: 0 15px;
            }

            .masonry-item {
                margin-bottom: 0px;
            }
        }

        @media (max-width: 480px) {
            .masonry-container {
                column-count: 3;
                max-width: 500px;
                padding: 0px;
            }
        }
    </style>

    <section class="py-16 max-md:pt-8 w-[90vw] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
            <!-- Left Side Text (Sticky) -->
            <div class="md:sticky top-24 self-start">
                <h2 class="text-3xl md:text-6xl font-extrabold uppercase leading-tight md:mt-24">
                    Follow us <br> on
                    <span class="animated-gradient bg-clip-text text-transparent">
                        Instagram
                    </span>
                </h2>
                <p class="mt-4 text-lg text-gray-600 max-w-md mb-8 max-md:mb-4">
                    Stay updated with the latest drops, streetwear vibes, and Gen-Z inspo straight from our feed.
                </p>

                <button
                    class="flex-1 relative rounded-md overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black">
                    <span
                        class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                        @novauniverse
                    </span>
                    <span
                        class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                    </span>
                </button>

            </div>

            <div class="masonry-container md:h-[180vh] max-md:h-[80vh] md:overflow-y-auto max-md:overflow-hidden"
                id="masonryGrid">
                <div class="masonry-item h-[360px] max-md:h-[200px]">
                    <img src="/public/images/111.avif" alt="Nature">
                </div>

                <div class="masonry-item h-[250px] max-md:h-[150px]">
                    <img src="/public/images/222.avif" alt="Ocean">
                </div>

                <div class="masonry-item h-[300px] max-md:h-[150px]">
                    <img src="/public/images/333.avif" alt="Sky">
                </div>

                <div class="masonry-item h-[130px] max-md:h-[100px]">
                    <img src="/public/images/banner.webp" alt="Forest">
                </div>
                <div class="masonry-item h-[120px] max-md:h-[200px]">
                    <img src="/public/images/banner.webp" alt="Mountain">
                </div>

                <div class="masonry-item h-[280px] max-md:h-[200px]">
                    <img src="/public/images/Joggers.avif" alt="River">
                </div>

                <div class="masonry-item h-[260px] max-md:h-[200px]">
                    <img src="/public/images/f7.webp" alt="Desert">
                </div>

                <div class="masonry-item h-[140px] max-md:h-[150px]">
                    <img src="/public/images/11.avif" alt="Beach">
                </div>

                <div class="masonry-item h-[200px] max-md:h-[150px]">
                    <img src="/public/images/f5.webp" alt="Valley">
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Background -->
    <div id="newsletterModal" class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
        <!-- Modal Content -->
        <div class="bg-white shadow-lg w-full w-[35vw] max-md:w-[85vw] relative animate-slideDown">

            <!-- Close button -->
            <button id="closeModal"
                class="absolute top-3 right-3 text-black hover:text-black text-xl animate-rotate-pingpong">
                ✕</button>

            <!-- Image -->
            <img src="/public/images/news.jpg" alt="Newsletter Banner" class="h-52 max-md:h-44 w-full object-cover">

            <!-- Content -->
            <div class="p-6 text-center w-[80%] max-md:w-full mx-auto">
                <h2 class="text-lg font-bold mb-2">NEWSLETTER</h2>
                <p class="text-gray-600 text-sm mb-4">
                    Receive our weekly newsletter.<br>
                    For dietary content, fashion insider and the best offers.
                </p>

                <!-- Email Input -->
                <input type="email" placeholder="Enter Your Email Address"
                    class="w-full border border-gray-300 rounded-md p-2 mb-4 focus:outline-none focus:ring-2 focus:ring-black">

                <button
                    class="relative w-full font-semibold py-2 rounded-lg border-2 border-black overflow-hidden group">
                    <!-- Text -->
                    <span class="relative z-10 text-white group-hover:text-black transition-colors duration-300">
                        Subscribe
                    </span>
                    <!-- Animated BG -->
                    <span
                        class="absolute inset-0 bg-black transition-transform duration-300 origin-left group-hover:scale-x-0 scale-x-100"></span>
                </button>

                <!-- Social icons -->
                <div class="flex justify-center space-x-4 mt-5 text-gray-600">
                    <a href="#" class="hover:text-black"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-black"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#" class="hover:text-black"><i class="fab fa-pinterest"></i></a>
                    <a href="#" class="hover:text-black"><i class="fab fa-vimeo"></i></a>
                </div>

                <!-- Don't show again -->
                <div class="flex items-center justify-center mt-4">
                    <input id="noPopup" type="checkbox" class="mr-2">
                    <label for="noPopup" class="text-sm text-gray-600">Don't show this popup again</label>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById('newsletterModal');
            const closeBtn = document.getElementById('closeModal');
            const noPopupCheckbox = document.getElementById('noPopup');

            // Show modal after 5s unless "Don't show again" is checked
            if (!localStorage.getItem('hideNewsletterModal')) {
                setTimeout(() => {
                    modal.classList.remove('hidden');
                }, 3000);
            }

            // Close modal
            closeBtn.addEventListener('click', () => {
                modal.classList.add('hidden');
                if (noPopupCheckbox.checked) {
                    localStorage.setItem('hideNewsletterModal', 'true');
                }
            });

            // Close modal if clicked outside content
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    if (noPopupCheckbox.checked) {
                        localStorage.setItem('hideNewsletterModal', 'true');
                    }
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {
            $(".new-arrival-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                autoplay: false,
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

    <!-- SwiperJS Script -->
    <script>
        new Swiper(".product-swiper", {
            loop: true,
            autoplay: {
                delay: 1200,
                disableOnInteraction: false,
            },
        });
    </script>

    <!-- SwiperJS Script -->
    <script>
        new Swiper(".product-swiper", {
            loop: true,
            autoplay: {
                delay: 1200,
                disableOnInteraction: false,
            },
        });
    </script>

    <script>
        const productCards = document.querySelectorAll('.changingimg');

        productCards.forEach(card => {
            const images = card.querySelectorAll('img');
            const dots = card.querySelectorAll('div.absolute.bottom-2 span');
            let currentIndex = 0;
            let interval;

            function updateDots(index) {
                dots.forEach((dot, idx) => {
                    dot.classList.toggle('opacity-100', idx === index);
                    dot.classList.toggle('opacity-50', idx !== index);
                });
            }

            updateDots(currentIndex);

            card.addEventListener('mouseenter', () => {
                interval = setInterval(() => {
                    images[currentIndex].classList.remove('opacity-100');
                    images[currentIndex].classList.add('opacity-0');

                    currentIndex = (currentIndex + 1) % images.length;

                    images[currentIndex].classList.remove('opacity-0');
                    images[currentIndex].classList.add('opacity-100');

                    updateDots(currentIndex);
                }, 1000);
            });

            card.addEventListener('mouseleave', () => {
                clearInterval(interval);

                // Reset to first image
                images.forEach((img, idx) => {
                    img.classList.toggle('opacity-100', idx === 0);
                    img.classList.toggle('opacity-0', idx !== 0);
                });
                currentIndex = 0;
                updateDots(currentIndex);
            });
        });
    </script>



    <!-- Include AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            once: true, // Ensures the animation runs only once
        });
    </script>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/specifications.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php"; ?>
</body>