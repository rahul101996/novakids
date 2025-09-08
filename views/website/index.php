<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>


<body class="overflow-x-hidden lato-regular">

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="relative h-[98vh] flex items-center bg-gradient-to-r from-red-800 to-black overflow-hidden">
        <!-- Background Image Overlay -->
        <div class="absolute inset-0 bg-[url('/public/banner.webp')] bg-cover bg-center opacity-70"></div>

        <!-- Big Heading (Top Left) -->
        <h2 class="absolute top-22 left-10 text-7xl font-extrabold text-white animate-slide-left">
            NEW <br> IN <br> FOR <br> YOUNGSTARS
        </h2>

        <!-- Button (Bottom Left, off-center) -->
        <div class="absolute bottom-20 left-10">
            <button
                class="relative px-10 py-3 bg-white text-black rounded-full font-semibold shadow-lg overflow-hidden group transition-all duration-300">
                <span class="relative z-10 block group-hover:animate-glitch">SHOP NOW</span>
            </button>

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
        </div>


        <!-- Random Supporting Text (Top Right) -->
        <div
            class="absolute top-28 right-16 bg-white/10 backdrop-blur-md px-6 py-4 rounded-2xl border border-white/20 animate-rise">
            <p class="text-white text-xl font-bold tracking-wider uppercase">
                ✦ Limited Drop
            </p>
            <span class="text-sm text-gray-300">Streetwear ’25</span>
        </div>


        <!-- Another Random Tagline (Bottom Right, tilted) -->
        <p class="absolute bottom-12 right-12 text-2xl font-bold text-white rotate-[-6deg] opacity-80 animate-fade">
            #GenZStyle
        </p>
    </section>

    <style>
        @keyframes slide-left {
            0% {
                opacity: 0;
                transform: translateX(-80px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pop {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes rise {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .animate-slide-left {
            animation: slide-left 1s ease-out forwards;
        }

        .animate-pop {
            animation: pop 1s ease-out forwards;
            animation-delay: 0.3s;
        }

        .animate-rise {
            animation: rise 1.2s ease-out forwards;
            animation-delay: 0.6s;
        }

        .animate-fade {
            animation: fade 2s ease-out forwards;
            animation-delay: 1s;
        }
    </style>


    <!-- Owl Carousel CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />


    <style>
        /* Place nav buttons below the carousel */
        .new-arrival-carousel .owl-nav {
            position: absolute;
            top: -80px;
            /* push below blog cards */
            left: 90%;
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

        /* Hover effect */
        /* .new-arrival-carousel .owl-nav button span:hover {
            background: #fca45cff;
        } */
    </style>

    <section class="bg-white py-14 w-full">
        <div class="w-[90vw] max-md:w-[90vw] mx-auto">
            <div class="flex flex-col mb-10">
                <h3 class="text-left text-3xl font-extrabold uppercase">New Arrival</h3>
            </div>

            <div class="relative">
                <div class="owl-carousel owl-theme new-arrival-carousel">

                    <!-- Product Card -->
                    <div class="group relative m-2 p-2 cursor-pointer hover:shadow-md transition overflow-hidden">
                        <!-- Discount Badge -->
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">
                            SAVE 14%
                        </span>

                        <!-- Product Images -->
                        <div class="relative w-full h-[400px] overflow-hidden">
                            <!-- Default Image -->
                            <img src="/public/1.webp" alt="Product 1"
                                class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                            <!-- Hover Image -->
                            <img src="/public/2.webp" alt="Product 1 Hover"
                                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                            <!-- Add to Cart Icon (top-right) -->
                            <button
                                class="absolute top-2 right-2 bg-black/70 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition hover:bg-pink-600 z-20">
                                <i class="fas fa-shopping-cart"></i>
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
                            <img src="/public/4.webp" alt="Product 1"
                                class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                            <!-- Hover Image -->
                            <img src="/public/5.webp" alt="Product 1 Hover"
                                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                            <!-- Add to Cart Icon (top-right) -->
                            <button
                                class="absolute top-2 right-2 bg-black/70 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition hover:bg-pink-600 z-20">
                                <i class="fas fa-shopping-cart"></i>
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
                            <img src="/public/6.webp" alt="Product 1"
                                class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                            <!-- Hover Image -->
                            <img src="/public/7.webp" alt="Product 1 Hover"
                                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                            <!-- Add to Cart Icon (top-right) -->
                            <button
                                class="absolute top-2 right-2 bg-black/70 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition hover:bg-pink-600 z-20">
                                <i class="fas fa-shopping-cart"></i>
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
                            <img src="/public/2.webp" alt="Product 1"
                                class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                            <!-- Hover Image -->
                            <img src="/public/1.webp" alt="Product 1 Hover"
                                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                            <!-- Add to Cart Icon (top-right) -->
                            <button
                                class="absolute top-2 right-2 bg-black/70 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition hover:bg-pink-600 z-20">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>

                        <!-- Product Details -->
                        <div class="p-4 text-center">
                            <h3 class="text-sm font-semibold">GREAT MANIFESTOR POLO</h3>
                            <p class="text-gray-500 line-through text-sm">Rs. 1,399.00</p>
                            <p class="text-red-600 font-bold">Rs. 1,199.00</p>
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
                            <img src="/public/1.webp" alt="Product 1"
                                class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                            <!-- Hover Image -->
                            <img src="/public/2.webp" alt="Product 1 Hover"
                                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                            <!-- Add to Cart Icon (top-right) -->
                            <button
                                class="absolute top-2 right-2 bg-black/70 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transition hover:bg-pink-600 z-20">
                                <i class="fas fa-shopping-cart"></i>
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

    <!-- Section -->
    <section class="py-12">
        <h2 class="text-center text-3xl font-extrabold mb-8 uppercase">Categories</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-[90vw] mx-auto px-4">

            <!-- Tees -->
            <div class="relative group overflow-hidden rounded-xl shadow-lg">
                <img src="/public/11.avif" alt="Tees"
                    class="w-full h-[400px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                <!-- Overlay -->
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <!-- Text -->
                <div
                    class="absolute bottom-6 left-1/2 transform -translate-x-1/2 translate-y-6 group-hover:translate-y-0 transition-all duration-500 ease-out text-white font-extrabold text-3xl tracking-wide">
                    <span class="group-hover:text-pink-400 transition-colors duration-300">Tees</span>
                </div>
            </div>

            <!-- Co-ords -->
            <div class="relative group overflow-hidden rounded-xl shadow-lg">
                <img src="/public/11.avif" alt="Co-ords"
                    class="w-full h-[400px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="absolute bottom-6 left-1/2 transform -translate-x-1/2 translate-y-6 group-hover:translate-y-0 transition-all duration-500 ease-out text-white font-extrabold text-3xl tracking-wide">
                    <span class="group-hover:text-purple-400 transition-colors duration-300">Co-ords</span>
                </div>
            </div>

            <!-- Joggers -->
            <div class="relative group overflow-hidden rounded-xl shadow-lg">
                <img src="/public/11.avif" alt="Joggers"
                    class="w-full h-[400px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                </div>
                <div
                    class="absolute bottom-6 left-1/2 transform -translate-x-1/2 translate-y-6 group-hover:translate-y-0 transition-all duration-500 ease-out text-white font-extrabold text-3xl tracking-wide">
                    <span class="group-hover:text-blue-400 transition-colors duration-300">Joggers</span>
                </div>
            </div>

        </div>
    </section>

    <section class="py-12">
        <h2 class="text-center text-3xl font-extrabold mb-8">SHOP BY STYLE</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-[90vw] mx-auto px-4">

            <!-- Korean Look -->
            <div class="relative">
                <img src="/public/img1.avif" alt="Korean Look" class="w-full h-[400px] object-cover">

            </div>

            <!-- Textured Polos -->
            <div class="relative">
                <img src="/public/img2.avif" alt="Textured Polos" class="w-full h-[400px] object-cover">

            </div>

            <!-- Plaid Shirts -->
            <div class="relative">
                <img src="/public/img3.avif" alt="Plaid Shirts" class="w-full h-[400px] object-cover">

            </div>

        </div>
    </section>

    <section class="py-12 w-full h-auto">
        <div>
            <img src="/public/123.avif" alt="">
        </div>
    </section>

    <section class="bg-white py-14 w-full">
        <div class="w-[90vw] max-md:w-[90vw] mx-auto">
            <div class="flex flex-col mb-10">
                <h2 class="text-center text-3xl font-extrabold mb-8 uppercase">Featured Collection</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <div class="relative group w-full max-w-sm mx-auto cursor-pointer">
                    <div class="relative w-full h-[400px] overflow-hidden">
                        <!-- Discount badge -->
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">SAVE
                            23%</span>

                        <!-- Multiple images stacked -->

                        <img src="/public/2.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                        <img src="/public/1.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        <img src="/public/3.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                        <!-- Dots -->
                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                        </div>
                    </div>

                    <!-- Product info below the images -->
                    <div class="p-4 text-center">
                        <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                        <p class="text-gray-500 line-through text-sm">Rs. 1,299.00</p>
                        <p class="text-red-600 font-bold">Rs. 999.00</p>
                    </div>
                </div>


                <div class="relative group w-full max-w-sm mx-auto cursor-pointer">
                    <div class="relative w-full h-[400px] overflow-hidden">
                        <!-- Discount badge -->
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">SAVE
                            23%</span>

                        <!-- Multiple images stacked -->
                        <img src="/public/1.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                        <img src="/public/2.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        <img src="/public/3.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                        <!-- Dots -->
                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                        </div>
                    </div>

                    <!-- Product info below the images -->
                    <div class="p-4 text-center">
                        <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                        <p class="text-gray-500 line-through text-sm">Rs. 1,299.00</p>
                        <p class="text-red-600 font-bold">Rs. 999.00</p>
                    </div>
                </div>
                <div class="relative group w-full max-w-sm mx-auto cursor-pointer">
                    <div class="relative w-full h-[400px] overflow-hidden">
                        <!-- Discount badge -->
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">SAVE
                            23%</span>

                        <!-- Multiple images stacked -->
                        <img src="/public/3.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                        <img src="/public/1.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        <img src="/public/2.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                        <!-- Dots -->
                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                        </div>

                    </div>

                    <!-- Product info below the images -->
                    <div class="p-4 text-center">
                        <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                        <p class="text-gray-500 line-through text-sm">Rs. 1,299.00</p>
                        <p class="text-red-600 font-bold">Rs. 999.00</p>
                    </div>
                </div>
                <div class="relative group w-full max-w-sm mx-auto cursor-pointer">
                    <div class="relative w-full h-[400px] overflow-hidden">
                        <!-- Discount badge -->
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">SAVE
                            23%</span>

                        <!-- Multiple images stacked -->
                        <img src="/public/1.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                        <img src="/public/2.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        <img src="/public/3.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                        <!-- Dots -->
                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                        </div>
                    </div>

                    <!-- Product info below the images -->
                    <div class="p-4 text-center">
                        <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                        <p class="text-gray-500 line-through text-sm">Rs. 1,299.00</p>
                        <p class="text-red-600 font-bold">Rs. 999.00</p>
                    </div>
                </div>
                <div class="relative group w-full max-w-sm mx-auto cursor-pointer">
                    <div class="relative w-full h-[400px] overflow-hidden">
                        <!-- Discount badge -->
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">SAVE
                            23%</span>

                        <!-- Multiple images stacked -->

                        <img src="/public/2.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                        <img src="/public/1.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        <img src="/public/3.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                        <!-- Dots -->
                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                        </div>
                    </div>

                    <!-- Product info below the images -->
                    <div class="p-4 text-center">
                        <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                        <p class="text-gray-500 line-through text-sm">Rs. 1,299.00</p>
                        <p class="text-red-600 font-bold">Rs. 999.00</p>
                    </div>
                </div>


                <div class="relative group w-full max-w-sm mx-auto cursor-pointer">
                    <div class="relative w-full h-[400px] overflow-hidden">
                        <!-- Discount badge -->
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">SAVE
                            23%</span>

                        <!-- Multiple images stacked -->
                        <img src="/public/1.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                        <img src="/public/2.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        <img src="/public/3.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                        <!-- Dots -->
                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                        </div>
                    </div>

                    <!-- Product info below the images -->
                    <div class="p-4 text-center">
                        <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                        <p class="text-gray-500 line-through text-sm">Rs. 1,299.00</p>
                        <p class="text-red-600 font-bold">Rs. 999.00</p>
                    </div>
                </div>
                <div class="relative group w-full max-w-sm mx-auto cursor-pointer">
                    <div class="relative w-full h-[400px] overflow-hidden">
                        <!-- Discount badge -->
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">SAVE
                            23%</span>

                        <!-- Multiple images stacked -->
                        <img src="/public/3.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                        <img src="/public/1.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        <img src="/public/2.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                        <!-- Dots -->
                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                        </div>

                    </div>

                    <!-- Product info below the images -->
                    <div class="p-4 text-center">
                        <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                        <p class="text-gray-500 line-through text-sm">Rs. 1,299.00</p>
                        <p class="text-red-600 font-bold">Rs. 999.00</p>
                    </div>
                </div>
                <div class="relative group w-full max-w-sm mx-auto cursor-pointer">
                    <div class="relative w-full h-[400px] overflow-hidden">
                        <!-- Discount badge -->
                        <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-2 py-1 rounded z-20">SAVE
                            23%</span>

                        <!-- Multiple images stacked -->
                        <img src="/public/1.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                        <img src="/public/2.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                        <img src="/public/3.webp"
                            class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">

                        <!-- Dots -->
                        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                        </div>
                    </div>

                    <!-- Product info below the images -->
                    <div class="p-4 text-center">
                        <h3 class="text-sm font-semibold">SUPERMAN STRENGTH OVERSIZED T-SHIRT</h3>
                        <p class="text-gray-500 line-through text-sm">Rs. 1,299.00</p>
                        <p class="text-red-600 font-bold">Rs. 999.00</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 w-[90vw] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

            <!-- Left Side Text -->
            <div>
                <h2 class="text-5xl md:text-6xl font-extrabold uppercase leading-tight">
                    Follow us <br> on
                    <span class="animated-gradient bg-clip-text text-transparent">
                        Instagram
                    </span>
                </h2>
                <p class="mt-4 text-lg text-gray-600 max-w-md">
                    Stay updated with the latest drops, streetwear vibes, and Gen-Z inspo straight from our feed.
                </p>
                <a href="#"
                    class="mt-6 inline-block px-6 py-3 rounded-full font-semibold text-white instagram-btn transition duration-500">
                    @novakids
                </a>
            </div>

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

                /* Instagram button */
                .instagram-btn {
                    background-image: linear-gradient(45deg, #f58529, #dd2a7b, #8134af, #515bd4);
                    background-size: 300% 300%;
                    animation: gradientMove 8s ease infinite;
                }

                .instagram-btn:hover {
                    filter: brightness(1.2);
                    transform: scale(1.05);
                }
            </style>


            <!-- Right Side Grid -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Image 1 -->
                <div class="relative group overflow-hidden rounded-xl">
                    <img src="/public/111.avif" alt="Insta 1"
                        class="w-full h-[300px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                    <div
                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-500">
                        <i class="fab fa-instagram text-white text-3xl"></i>
                    </div>
                </div>
                <!-- Image 2 -->
                <div class="relative group overflow-hidden rounded-xl">
                    <img src="/public/222.avif" alt="Insta 2"
                        class="w-full h-[300px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                    <div
                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-500">
                        <i class="fab fa-instagram text-white text-3xl"></i>
                    </div>
                </div>
                <!-- Image 3 -->
                <div class="relative group overflow-hidden rounded-xl">
                    <img src="/public/333.avif" alt="Insta 3"
                        class="w-full h-[300px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                    <div
                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-500">
                        <i class="fab fa-instagram text-white text-3xl"></i>
                    </div>
                </div>
                <!-- Image 4 -->
                <div class="relative group overflow-hidden rounded-xl">
                    <img src="/public/444.avif" alt="Insta 4"
                        class="w-full h-[300px] object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                    <div
                        class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-500">
                        <i class="fab fa-instagram text-white text-3xl"></i>
                    </div>
                </div>
            </div>

        </div>
    </section>



    <!-- jQuery & Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

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
                    0: { items: 1 },
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

    <script>
        const productCards = document.querySelectorAll('.group');

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

    <?php include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php"; ?>
</body>