<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// printWithPre($_SESSION);
$home_imges = getData2("SELECT * FROM tbl_home_banner WHERE 1 ORDER BY `id` DESC");


$product_imge = getData2("SELECT tpb.*, tp.name as product_name, tp.price, tp.product_images FROM tbl_product_banner tpb LEFT JOIN tbl_products tp ON tpb.product_id = tp.id ORDER BY tpb.id DESC Limit 1")[0];

$ppname = str_replace(' ', '-', $product_imge['product_name']);
$ppname = str_replace("'", '', $ppname);

$imags = json_decode($product_imge['product_images'], true);
$ppimg = array_reverse($imags);

// printWithPre($images);
// die();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

?>

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

    <!-- <section
        class="relative h-[88vh] max-md:h-[90vh] flex items-center bg-gradient-to-r from-red-800 to-black overflow-hidden">
        <div class="absolute inset-0 bg-[url('/<?= $image ?>')] bg-cover bg-center opacity-70"></div>
        <h2 class="absolute md:top-16 md:left-10 max-md:left-8 max-md:bottom-40 text-7xl max-md:text-5xl font-extrabold text-white"
            data-aos="fade-right" data-aos-duration="1000" data-aos-delay="100">
            NEW <br> IN <br> FOR <br> YOUNGSTARS
        </h2>

        <div class="absolute bottom-20 left-10">
            <button onclick="window.location.href = '/category/tees'"
                class="relative px-10 py-3 max-md:py-2 max-md:px-6 bg-transparent hover:bg-white text-white hover:text-black border border-white rounded-md font-semibold shadow-lg overflow-hidden group transition-all duration-700">
                <span class="relative z-10 block transition-colors duration-300 group-hover:animate-glitch">SHOP
                    NOW</span>
                <span
                    class="absolute inset-0 bg-white transform scale-x-0 origin-left transition-transform duration-700 group-hover:scale-x-100"></span>
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
    </section> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .myBanner {
            width: 100vw;
            height: 90vh;
        }

        .swiper-slide {
            transition: transform 1.5s ease, opacity 1.5s ease;
        }

        .swiper-slide-active {
            transform: scale(1.05);
            opacity: 1;
            z-index: 10;
        }

        .swiper-slide-next,
        .swiper-slide-prev {
            opacity: 0.7;
            transform: scale(0.95);
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-pagination {
            bottom: 20px !important;
        }

        .swiper-pagination-bullet {
            background: rgba(255, 255, 255, 0.6);
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background: white;
        }

        @media (max-width: 768px) {
            .myBanner {
                height: 70vh;
            }
        }

        @media (max-width: 480px) {
            .myBanner {
                height: 60vh;
            }
        }
    </style>

    <div class="swiper myBanner">
        <div class="swiper-wrapper">


            <?php foreach ($home_imges as $key => $value) { ?>
                <div class="swiper-slide">
                    <img src="/<?= $value['file'] ?>" alt="">
                </div>
            <?php } ?>

            <!-- <div class="swiper-slide">
                <img src="/public/home-banner/homepage_17_U90OqZq.avif" alt="">
            </div> -->
            <!-- <div class="swiper-slide">
                <img src="/public/home-banner/homepage_12_V3Auyr2.avif" alt="">
            </div> -->

            <!-- <div class="swiper-slide">
                <img src="/public/home-banner/homepage_copy_26.avif" alt="">
            </div>
            <div class="swiper-slide">
                <img src="/public/home-banner/homepage_17_U90OqZq.avif" alt="">
            </div>
            <div class="swiper-slide">
                <img src="/public/home-banner/homepage_12_V3Auyr2.avif" alt="">
            </div>
            <div class="swiper-slide">
                <img src="/public/home-banner/homepage_copy_26.avif" alt="">
            </div>
            <div class="swiper-slide">
                <img src="/public/home-banner/homepage_17_U90OqZq.avif" alt="">
            </div>  -->

        </div>
        <div class="swiper-pagination"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".myBanner", {
            slidesPerView: 3,
            centeredSlides: true,
            spaceBetween: 10,
            loop: true,
            speed: 3000,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            allowTouchMove: true,
            grabCursor: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    centeredSlides: true,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
            },
        });
    </script>



    <!-- <div class="owl-carousel owl-theme Home-Carousel h-auto w-[100vw] relative">
        <div class="w-full h-full">
            <img src="/public/home-banner/homepage_copy_26.avif" class="w-full h-full" alt="">
        </div>
        <div class="w-full h-full">
            <img src="/public/home-banner/homepage_17_U90OqZq.avif" class="w-full h-full" alt="">
        </div>
        <div class="w-full h-full">
            <img src="/public/home-banner/homepage_12_V3Auyr2.avif" class="w-full h-full" alt="">
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $(".Home-Carousel").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                smartSpeed: 1000,
                slideTransition: "linear",
            });

        });
    </script> -->

    <style>
        .newarrivalcarousel .owl-nav {
            position: absolute;
            top: -55px;
            left: 96%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
        }

        .newarrivalcarousel .owl-nav button span {
            font-size: 20px;
            padding: 2px 10px;
            background: #000000ff;
            color: white;
            border-radius: 9999px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .newarrivalcarousel .owl-nav button:hover span {
            background: #000000ff !important;
            color: white;
        }

        @media (max-width: 768px) {
            .newarrivalcarousel .owl-nav {
                height: auto;
                top: 350px;
                left: 50%;
            }
        }
    </style>

    <section class="bg-white pt-12 pb-6 max-md:py-8 w-full">
        <div class="w-[90vw] max-md:w-[90vw] mx-auto">
            <div class="flex flex-col mb-4 max-md:mb-6" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="100">
                <h3 class="text-center text-3xl font-extrabold mb-3 uppercase">New Arrival</h3>
                <p class="text-center mx-auto text-gray-600 text-lg max-md:text-base max-w-xl">
                    Be the first to explore our latest drop — fresh styles crafted for teens who love to stay ahead of
                    the trend.
                </p>
            </div>

            <div class="relative">
                <div class="owl-carousel owl-theme newarrivalcarousel">
                    <?php

                    foreach (getData2("SELECT * FROM `tbl_products` WHERE `status` = 1 AND `new_arrival` = 1 ORDER BY `id` DESC LIMIT 8") as $key => $product) {
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
                            <div class="group relative md:m-2 max-md:m-1 md:p-2 cursor-pointer transition overflow-hidden">
                                <!-- Discount Badge -->
                                <span
                                    class="absolute top-2 left-2 max-md:top-0 max-md:left-0 bg-[#f25b21] text-white text-xs max-md:text-[11px] px-2 py-1 max-md:px-1.5 max-md:py-0.5 z-20">
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
                                        class="addToWishlistBtn absolute top-2 right-3 h-10 w-10 max-md:h-6 max-md:w-6 flex items-center justify-center rounded-full transition-all duration-500  z-20 stop-link <?= !empty($data) ? 'bg-[#f25b21] text-white' : 'bg-black/70 text-white  hover:bg-[#f25b21]' ?>">
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
                                    <h3 class="text-base max-md:text-sm font-semibold uppercase"><?= $product['name'] ?>
                                    </h3>
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
            </div>
        </div>
    </section>

    <!-- Section -->
    <section class="md:pb-16 max-md:py-16 relative max-md:w-[90vw] mx-auto">
        <div class="absolute hidden -top-14 max-md:-top-16 -left-14 w-auto h-auto opacity-20">
            <img src="/public/images/naruto.webp" alt="" class="w-40 max-md:w-28 h-auto">
        </div>
        <div class="flex flex-col mb-10" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
            <h2 class="text-center text-3xl font-extrabold mb-3 uppercase">Categories</h2>
            <p class="text-center text-gray-600 text-lg max-md:text-base max-w-2xl max-md:px-2 mx-auto">
                Discover trendy, comfortable, and versatile outfits for teen boys — from casual wear to bold streetwear,
                Nova Universe has it all.
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-16 w-[90vw] max-md:w-[90vw] max-md:gap-6 mx-auto md:px-4">
            <!-- Tees -->
            <?php
            foreach ($categories as $key => $category) {
            ?>
                <div class="relative group overflow-hidden shadow-lg" data-aos="zoom-in" data-aos-duration="1000"
                    data-aos-delay="200">
                    <a href="/category/<?= strtolower(str_replace(' ', '-', $category['category'])) ?>">

                        <img src="/<?= $category['img'] ?>" alt="Tees"
                            class="w-full h-[400px] max-md:h-[250px] object-cover object-top transform group-hover:scale-110 transition duration-700 ease-out">
                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">
                        </div>
                        <!-- Text -->
                        <div
                            class="absolute bottom-6 pb-5 left-1/2 transform -translate-x-1/2 translate-y-6 group-hover:translate-y-0 transition-all duration-500 ease-out text-white font-extrabold text-3xl max-md:text-base tracking-wide w-full text-center">
                            <span
                                class="group-hover:text-[#f25b21] transition-colors duration-300 uppercase text-center "><?= $category['category'] ?></span>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 h-[90vh] max-md:h-[150vh] mt-12 hidden">
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

    <section class="relative w-full h-auto max-md:h-[72vh]">
        <!-- Banner Image -->
        <img src="/<?= $product_imge['file'] ?>" alt="" class="w-full h-auto max-md:h-[72vh] max-md:object-cover">

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

                    <img src="/<?= $ppimg[0] ?>" alt="<?= $product_imge['product_name'] ?>"
                        class="w-20 h-20 object-cover">
                    <div>
                        <p class="text-sm font-semibold text-gray-800"><?= $product_imge['product_name'] ?></p>
                        <p class="text-sm font-semibold text-[#f25b21]">₹ <?= formatNumber($product_imge['price']) ?>
                        </p>
                        <a href="/products/product-details/<?= $ppname ?>" class="text-sm text-gray-800 underline">View
                            Product</a>
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
                class="absolute bottom-10 -left-[120px] opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                <div class="relative bg-white shadow-lg p-2 w-64 flex items-center space-x-2">
                    <!-- Pointer -->
                    <div
                        class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-0 h-0 border-l-8 border-r-8 border-t-8 border-transparent border-t-white">
                    </div>

                    <img src="/<?= $ppimg[1] ?>" alt="<?= $product_imge['product_name'] ?>"
                        class="w-20 h-20 object-cover">
                    <div>
                        <p class="text-sm font-semibold text-gray-800"><?= $product_imge['product_name'] ?></p>
                        <p class="text-sm font-semibold text-[#f25b21]">₹ <?= formatNumber($product_imge['price']) ?>
                        </p>
                        <a href="/products/product-details/<?= $ppname ?>" class="text-sm text-gray-800 underline">View
                            Product</a>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="pb-12 pt-20 relative overflow-hidden hidden">
        <div class="absolute hidden -top-8 -right-12 w-auto h-auto opacity-20">
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

    <?php foreach (getData2("SELECT * FROM `tbl_collection` WHERE `status` = 1") as $key => $value) { ?>

        <section class="bg-white py-14 max-md:py-8 w-full relative overflow-hidden">
            <div class="absolute hidden -top-12 -right-14 max-md:-right-8 max-md:-top-10 w-auto h-auto opacity-20">
                <img src="/public/images/net.webp" alt="" class="w-48 max-md:w-32 h-auto">
            </div>
            <div class="w-[90vw] max-md:w-[90vw] mx-auto">
                <div class="flex flex-col mb-10" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <h2 class="text-center text-3xl font-extrabold mb-3 uppercase"><?= $value['name'] ?></h2>
                    <div class="!text-center text-gray-600 text-lg max-md:text-base max-w-2xl mx-auto">
                        <?= $value['description'] ?>
                    </div>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-12 max-md:gap-2">

                    <?php
                    $productIds = json_decode($value['products'], true);
                    foreach ($productIds as $key => $product) {

                        $product_details = getData2("SELECT * FROM `tbl_products` WHERE `id`='$product' AND `status` = 1")[0];
                        if (empty($product_details))
                            continue;
                        $images = json_decode($product_details['product_images'], true);
                        $images = array_reverse($images);
                        $name = str_replace(' ', '-', $product_details['name']);
                        $comparePrice = floatval($product_details['compare_price']);
                        $price = floatval($product_details['price']);
                        $discountAmount = $comparePrice - $price;
                        $discountPercentage = $comparePrice > 0 ? round(($discountAmount / $comparePrice) * 100) : 0;
                        if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {


                            $data = getData2("SELECT * FROM `tbl_wishlist` WHERE `product` = " . $product . " AND `userid` = " . $_SESSION["userid"])[0];
                        } else {

                            $data = checkExisteingWishlistSession($product);
                            if ($data) {
                                $data = ['id' => $data];
                            } else {
                                $data = [];
                            }
                        }

                    ?>
                        <a href="products/product-details/<?= $name ?>" class="block">
                            <div class="relative group changingimg w-full max-w-sm mx-auto cursor-pointer">
                                <div class="relative w-full h-[450px] max-md:h-[250px] overflow-hidden">
                                    <!-- Discount badge -->
                                    <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                        SAVE <?= $discountPercentage ?>%
                                    </span>

                                    <!-- Add to favorites Icon (top-right) -->
                                    <button
                                        class="addToWishlistBtn absolute top-2 right-3 h-10 w-10 rounded-full transition-all duration-500  z-20 stop-link <?= !empty($data) ? 'bg-[#f25b21] text-white' : 'bg-black/70 text-white  hover:bg-[#f25b21]' ?>">
                                        <i class="fas fa-heart"></i>
                                    </button>

                                    <!-- Add to Cart Icon -->
                                    <button
                                        class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                        <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                    </button>
                                    <input type="text" value="<?= $product_details['id'] ?>" class="ProductId">
                                    <!-- Multiple images stacked -->
                                    <img src="/<?= $images[0] ?>"
                                        class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-100">
                                    <!-- <img src="/<?= $images[1] ?>"
                                    class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0">
                                <img src="/<?= $images[2] ?>"
                                    class="w-full h-full object-cover absolute inset-0 transition-opacity duration-500 opacity-0"> -->

                                    <!-- Dots -->
                                    <!-- <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-20">
                                <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                                <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                                <span class="w-2 h-2 rounded-full bg-white opacity-50"></span>
                            </div> -->
                                </div>

                                <!-- Product info below the images -->
                                <div class="pt-4 text-left">
                                    <h3 class="text-base font-semibold"><?= $product_details['name'] ?></h3>
                                    <div class="flex items-center justify-start gap-3 w-full">
                                        <p class="text-gray-500 line-through text-sm">₹
                                            <?= formatNumber($product_details['compare_price']) ?>.00
                                        </p>
                                        <p class="text-[#f25b21] font-bold">₹ <?= formatNumber($product_details['price']) ?>.00
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    <?php } ?>


    <style>
        .scroll-container,
        .marquee {
            overflow: hidden;
            white-space: nowrap;
        }

        .scroll-content,
        .marquee-content {
            display: flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            will-change: transform;
        }

        .marquee-content {
            padding-left: 100%;
        }
    </style>

    <?php
    $offerheading = getData2("SELECT * FROM `tbl_offer_heading` WHERE 1");
    // printWithPre($offerheading);
    // die();
    ?>

    <div class="w-full overflow-hidden bg-white mb-8">
        <div id="bottomRow" class="marquee bg-black">
            <div class="marquee-content text-grey-700 max-md:text-sm py-1 text-nowrap">
                <div
                    class="flex items-center space-x-10 text-outline transition-all duration-700 text-white font-semibold text-xl max-md:text-base cursor-pointer">

                    <?php
                    for ($i = 0; $i < 10; $i++) {
                        foreach ($offerheading as $key => $value) { ?>
                            <span>#</span>
                            <span><?= $value['title'] ?></span>
                    <?php }
                    } ?>

                </div>
            </div>
        </div>
    </div>

    <script>
        function setupScroll(elementId, direction, speed) {
            const container = document.getElementById(elementId);
            const content = container.querySelector('.scroll-content, .marquee-content');
            let scrollPosition = 0;
            let animationFrame;

            function scroll() {
                scrollPosition += direction * speed;

                if (elementId === 'bottomRow') {
                    if (scrollPosition >= content.offsetWidth / 2) {
                        scrollPosition = 0;
                    }
                } else {
                    if (scrollPosition <= -content.offsetWidth / 2) {
                        scrollPosition = 0;
                    }
                }

                content.style.transform = `translateX(${scrollPosition}px)`;
                animationFrame = requestAnimationFrame(scroll);
            }

            // Clone content for seamless looping
            content.innerHTML += content.innerHTML;

            // Set initial position to start scrolling
            if (elementId === 'bottomRow') {
                scrollPosition = -content.offsetWidth / 2;
            }

            // Start the scrolling
            scroll();

            // Pause scrolling on hover
            container.addEventListener('mouseenter', () => cancelAnimationFrame(animationFrame));
            container.addEventListener('mouseleave', () => scroll());
        }

        setupScroll('bottomRow', 1, 0.4);
    </script>

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

    <section class="py-16 max-md:pt-6 max-md:pb-10 w-[90vw] mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
            <!-- Left Side Text (Sticky) -->
            <div class="md:sticky top-24 md:self-start max-md:items-center max-md:text-center">
                <h2 class="text-3xl md:text-6xl font-extrabold uppercase leading-tight md:mt-24">
                    Follow us <br> on
                    <span class="animated-gradient bg-clip-text text-transparent">
                        Instagram
                    </span>
                </h2>
                <p class="mt-4 text-lg max-md:text-base text-gray-600 max-w-md mb-8 max-md:mb-4">
                    Stay updated with the latest drops, streetwear vibes, and Gen-Z inspo straight from our feed.
                </p>

                <button
                    class="flex-1 relative rounded-md overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black">
                    <span
                        class="relative z-10 flex py-2 px-6 max-md:px-4 max-md:py-1 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                        @novauniverse
                    </span>
                    <span
                        class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                    </span>
                </button>

            </div>

            <div class="masonry-container  md:overflow-y-auto max-md:overflow-hidden"
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
    <?php
    // printWithPre($_SESSION);
    if (!isset($_SESSION['popup']) || $_SESSION['popup'] == 'false') {
        $popup = getData2("SELECT * FROM tbl_popup WHERE display = 1")[0];
        // var_dump($popup);
        // printWithPre($popup);
        if (count($popup) > 0) {
            // $popup = $popup[0];


    ?>
            <div id="newsletterModal" class="hidden fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50">
                <!-- Modal Content -->
                <div class="bg-white shadow-lg w-full w-[35vw] max-md:w-[85vw] relative animate-slideDown">

                    <!-- Close button -->
                    <button id="closeModal"
                        class="absolute top-3 right-3 text-white bg-black rounded-full w-8 h-8 flex items-center justify-center hover:text-black text-xl animate-rotate-pingpong">
                        ✕</button>

                    <!-- Image -->
                    <img src="/<?= $popup['img'] ?>" alt="Newsletter Banner" class="h-52 max-md:h-44 w-full object-cover">

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
                            class="relative w-full font-semibold py-2 rounded-md border-2 border-black overflow-hidden group">
                            <!-- Text -->
                            <span class="relative z-10 text-black group-hover:text-white transition-colors duration-700">
                                Subscribe
                            </span>
                            <!-- Animated BG -->
                            <span
                                class="absolute inset-0 bg-black transition-transform duration-[1.2s] origin-left scale-x-0 group-hover:scale-x-100"></span>
                        </button>

                        <!-- Social icons -->
                        <div class="flex justify-center space-x-4 mt-5 text-gray-600">
                            <a href="#" class="hover:text-black"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="hover:text-black"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#" class="hover:text-black"><i class="fab fa-pinterest"></i></a>
                            <a href="#" class="hover:text-black"><i class="fab fa-vimeo"></i></a>
                        </div>

                        <!-- Don't show again -->
                        <div class="flex items-center justify-center mt-4 hidden">
                            <input id="noPopup" type="checkbox" class="mr-2">
                            <label for="noPopup" class="text-sm text-gray-600">Don't show this popup again</label>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
    <script>
        async function close_popup() {
            const request = await axios.post("", new URLSearchParams({
                popup: 'true'
            }));
            console.log(request.data)
        }
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById('newsletterModal');
            const closeBtn = document.getElementById('closeModal');
            const noPopupCheckbox = document.getElementById('noPopup');

            // Show modal after 3s unless "Don't show again" is checked for this session
            // if (!sessionStorage.getItem('hideNewsletterModal')) {
            //     setTimeout(() => {
            //         modal.classList.remove('hidden');
            //     }, 3000);
            // }

            // Close modal
            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    modal.classList.add('hidden');
                    // if (noPopupCheckbox.checked) {
                    //     sessionStorage.setItem('hideNewsletterModal', 'true');
                    // }
                    close_popup();
                });
            }
            // Close modal if clicked outside content
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    if (noPopupCheckbox.checked) {
                        sessionStorage.setItem('hideNewsletterModal', 'true');
                    }
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $(".newarrivalcarousel").owlCarousel({
                loop: true,
                margin: 5,
                nav: true,
                dots: false,
                autoplay: false,
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
            // AddToCart();
            // AddToWishlist();
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