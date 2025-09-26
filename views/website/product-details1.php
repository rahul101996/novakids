
<!DOCTYPE html>
<html lang="en">


<head>
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1525213108842821');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1525213108842821&ev=PageView&noscript=1" /></noscript>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5VZ39TM5');
    </script>
    <!-- End Google Tag Manager -->
    <!-- End Meta Pixel Code -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaKids</title>
    <link rel="icon" href="/public/logos/nova_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/public/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/e645c402e0.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Birthstone+Bounce:wght@400;500&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Manrope:wght@200..800&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Oswald:wght@200..700&family=Satisfy&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <style>
        .archivo-narrow-k {
            font-family: "Archivo Narrow", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


</head>


<!-- Scroll Toggle Button -->
<button id="scrollToggleBtn"
    class="fixed bottom-6 right-4 max-md:bottom-4 max-md:right-4 z-50 bg-[#f25b21] text-white p-3 max-md:p-2 rounded-full shadow-lg hover:scale-110 transition-all duration-300"
    onclick="handleScrollToggle()" title="Scroll">
    <!-- Arrow Icon -->
    <svg id="scrollIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <!-- Down Arrow Default -->
        <path id="scrollPath" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
</button>
<script>
    const btn = document.getElementById("scrollToggleBtn");
    const path = document.getElementById("scrollPath");

    function handleScrollToggle() {
        const isAtTop = window.scrollY < 300;
        if (isAtTop) {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: "smooth"
            });
        } else {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    }

    // Toggle arrow direction on scroll
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            // Show up arrow
            path.setAttribute("d", "M5 15l7-7 7 7");
        } else {
            // Show down arrow
            path.setAttribute("d", "M19 9l-7 7-7-7");
        }
    });
</script>

<body class="overflow-x-hidden archivo-narrow-k">

    <!-- Top Bar -->
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

    <div class="w-full flex items-center justify-between py-1">
        <li class="relative group list-none max-md:hidden hidden">
            <button
                class="nav-text text-black relative px-6 py-3 text-lg font-semibold flex items-center gap-2 transition-all duration-300">
                Boys Collection
                <i class="fas fa-chevron-down text-sm group-hover:rotate-180 transition-transform duration-300"></i>
            </button>
            <!-- Mega Menu -->
            <div
                class="mega-menu absolute left-0 top-full w-screen bg-white py-8 px-8 grid grid-cols-5 gap-10 z-50 shadow-xl">
                <div class="relative overflow-hidden h-[400px] bg-gray-900">
                    <img src="/public/images/333.avif" alt="Streetwear Collection"
                        class="w-full h-full object-cover opacity-80">

                    <div class="absolute bottom-3 left-6 text-white">
                        <p class="text-base font-medium mb-3">Trending Now</p>
                        <a href="/shop"
                            class="relative inline-block px-6 py-2 rounded-lg border border-white text-white font-semibold overflow-hidden group">
                            <span class="relative z-10 transition-colors duration-500 group-hover:text-black">
                                Shop Now
                            </span>
                            <span
                                class="absolute inset-0 bg-white transform scale-x-0 origin-left transition-transform duration-500 group-hover:scale-x-100"></span>
                        </a>
                    </div>
                </div>

                <div class="relative overflow-hidden h-[400px] bg-gray-900">
                    <img src="/public/images/444.avif" alt="Streetwear Collection"
                        class="w-full h-full object-cover opacity-80 ">
                    <div class="absolute bottom-3 left-6 text-white">
                        <p class="text-base font-medium mb-3">Trending Now</p>
                        <a href="/shop"
                            class="relative inline-block px-6 py-2 rounded-lg border border-white text-white font-semibold overflow-hidden group">
                            <span class="relative z-10 transition-colors duration-500 group-hover:text-black">
                                Shop Now
                            </span>
                            <span
                                class="absolute inset-0 bg-white transform scale-x-0 origin-left transition-transform duration-500 group-hover:scale-x-100"></span>
                        </a>
                    </div>
                </div>

                <div class="space-y-4">
                    <h4 class="font-semibold text-lg text-black border-b border-gray-200 pb-2">Tees / Relaxed Tees
                    </h4>

                    <div class="space-y-3">
                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class=" text-gray-800 group-hover:text-black">Oversized Tees</span>

                            </div>
                            <p class="text-xs text-gray-500 mt-1">Relaxed fit, street ready</p>
                        </a>

                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class=" text-gray-800 group-hover:text-black">Graphic Tees</span>

                            </div>
                            <p class="text-xs text-gray-500 mt-1">Bold prints, statement pieces</p>
                        </a>

                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class=" text-gray-800 group-hover:text-black">Long Sleeves</span>

                            </div>
                            <p class="text-xs text-gray-500 mt-1">Layering essentials</p>
                        </a>

                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class=" text-gray-800 group-hover:text-black">Tank Tops</span>

                            </div>
                            <p class="text-xs text-gray-500 mt-1">Summer vibes</p>
                        </a>
                    </div>
                </div>

                <div class="space-y-4">
                    <h4 class="font-semibold text-lg text-black border-b border-gray-200 pb-2">Joggers</h4>

                    <div class="space-y-3">
                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-800 group-hover:text-black">Classic Joggers</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Everyday comfort wear</p>
                        </a>

                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-800 group-hover:text-black">Slim Fit Joggers</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Modern tapered look</p>
                        </a>

                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-800 group-hover:text-black">Cargo Joggers</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Utility meets style</p>
                        </a>

                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-800 group-hover:text-black">Athletic Joggers</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Performance-ready fit</p>
                        </a>
                    </div>
                </div>

                <div class="space-y-4">
                    <h4 class="font-semibold text-lg text-black border-b border-gray-200 pb-2">Co-ords</h4>

                    <div class="space-y-3">
                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-800 group-hover:text-black">Casual Co-ords</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Everyday comfort sets</p>
                        </a>

                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-800 group-hover:text-black">Lounge Co-ords</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Relaxed & cozy vibes</p>
                        </a>

                        <a href="#"
                            class="block p-3 rounded category-hover border border-transparent transition-all group">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-800 group-hover:text-black">Streetwear Co-ords</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Bold styles for the city</p>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <div class="flex items-center space-x-7 ml-8">
            <a href="/" class="block">
                <img src="/public/logos/brand-name.png" alt="Logo" class="h-10 max-md:hidden">
                <img src="/public/logos/nova_favicon.png" alt="Logo" class="h-10 md:hidden">
            </a>
        </div>


        <!-- Mobile Menu Toggle Button -->
        <div class="md:hidden flex items-center">
            <button id="menu-toggle" class="p-2">
                <svg xmlns="http://www.w3.org/2000/svg" height="28px" viewBox="0 -960 960 960" width="28px"
                    fill="#4b4b4bff">
                    <path
                        d="M120-240v-80h520v80H120Zm664-40L584-480l200-200 56 56-144 144 144 144-56 56ZM120-440v-80h400v80H120Zm0-200v-80h520v80H120Z" />
                </svg>
            </button>

            <button class="openSearch">
                <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="24px"
                    fill="#4b4b4bff">
                    <path
                        d="M400-320q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70Zm-42-98 226-227-57-57-169 170-85-84-57 56 142 142Zm42 178q-134 0-227-93T80-560q0-134 93-227t227-93q134 0 227 93t93 227q0 56-17.5 105.5T653-364l227 228-56 56-228-227q-41 32-90.5 49.5T400-240Zm0-320Z" />
                </svg>
            </button>
        </div>

        <div class="flex items-center absolute left-1/2 transform -translate-x-1/2 space-x-7 max-md:hidden">
                            <div class="relative group">
                    <a href="/shop" class="text-gray-800  group duration-300 cursor-pointer">Tees                        <span class="absolute -bottom-0 left-1/2 w-0 transition-all h-0.5 bg-[#f25b21] group-hover:w-3/6"></span>
                        <span class="absolute -bottom-0 right-1/2 w-0 transition-all h-0.5 bg-[#f25b21] group-hover:w-3/6"></span>
                    </a>
                </div>
                            <div class="relative group">
                    <a href="/shop" class="text-gray-800  group duration-300 cursor-pointer">Coords sets                        <span class="absolute -bottom-0 left-1/2 w-0 transition-all h-0.5 bg-[#f25b21] group-hover:w-3/6"></span>
                        <span class="absolute -bottom-0 right-1/2 w-0 transition-all h-0.5 bg-[#f25b21] group-hover:w-3/6"></span>
                    </a>
                </div>
                            <div class="relative group">
                    <a href="/shop" class="text-gray-800  group duration-300 cursor-pointer">Joggers                        <span class="absolute -bottom-0 left-1/2 w-0 transition-all h-0.5 bg-[#f25b21] group-hover:w-3/6"></span>
                        <span class="absolute -bottom-0 right-1/2 w-0 transition-all h-0.5 bg-[#f25b21] group-hover:w-3/6"></span>
                    </a>
                </div>
                    </div>

        <div class="flex md:gap-1 items-center ml-auto md:pr-12 max-md:pr-1 py-1.5">
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
            <!-- <button id="Openvariant">Open Cart</button> -->
            <button id="openLogin"
                class="nav-text text-black p-2 rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95">
                <div class="max-md:hidden">
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
                </div>
                <div class="md:hidden">
                    <svg width="22" height="22" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg"
                        id="svgkp">
                        <path
                            d="M22.9129 12.935L13.7571 23.0474C13.5348 23.2929 13.1284 23.1084 13.1669 22.7794L14.0816 14.9731H10.6991C10.4034 14.9731 10.2484 14.6219 10.4478 14.4035L20.3133 3.59739C20.5589 3.32834 20.9984 3.58134 20.8891 3.92887L18.2354 12.3664H22.6607C22.9557 12.3664 23.1109 12.7163 22.9129 12.935Z"
                            fill="#f25b21"></path>
                        <path id="svgkp-path" fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.6079 5.35819C16.4805 5.1933 16.3421 5.03582 16.1932 4.8869C15.2702 3.96387 14.0183 3.44531 12.7129 3.44531C11.4075 3.44531 10.1556 3.96387 9.2326 4.8869C8.30957 5.80993 7.79102 7.06183 7.79102 8.36719C7.79102 9.67255 8.30957 10.9244 9.2326 11.8475C9.48368 12.0986 9.75909 12.3197 10.0533 12.5086L11.0235 11.4503C10.7335 11.2914 10.4649 11.0911 10.227 10.8531C9.56766 10.1938 9.19727 9.29959 9.19727 8.36719C9.19727 7.43479 9.56766 6.54057 10.227 5.88127C10.8863 5.22196 11.7805 4.85156 12.7129 4.85156C13.6453 4.85156 14.5395 5.22196 15.1988 5.88127C15.3636 6.04604 15.5103 6.22549 15.6377 6.41654L16.6079 5.35819ZM20.6413 18.6497L19.6746 19.7132C20.1676 20.4122 20.4473 21.2264 20.4473 22.0781V23.8359C20.4473 24.2243 20.7621 24.5391 21.1504 24.5391C21.5387 24.5391 21.8535 24.2243 21.8535 23.8359V22.0781C21.8535 20.7863 21.4016 19.6103 20.6413 18.6497ZM12.3111 17.5078H10.3026C7.27113 17.5078 4.97852 19.6394 4.97852 22.0781V23.8359C4.97852 24.2243 4.66372 24.5391 4.27539 24.5391C3.88707 24.5391 3.57227 24.2243 3.57227 23.8359V22.0781C3.57227 18.6922 6.67684 16.1016 10.3026 16.1016H12.4885L12.3111 17.5078Z"
                            fill="currentColor" stroke="currentColor"></path>
                    </svg>
                </div>
            </button>

            <div class="flex items-center max-md:hidden">
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
            </div>

            <div class="relative max-md:mr-1">
                <button
                    class=" nav-text text-black p-2 rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95"
                    onclick="openCart()">
                    <div class="max-md:hidden">
                        <svg class="shopBag anarkali-svg-icon" width="24px" height="24px" fill="currentColor"
                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m26 8.9a1 1 0 0 0 -1-.9h-3a6 6 0 0 0 -12 0h-3a1 1 0 0 0 -1 .9l-1.78 17.8a3 3 0 0 0 .78 2.3 3 3 0 0 0 2.22 1h17.57a3 3 0 0 0 2.21-1 3 3 0 0 0 .77-2.31zm-10-4.9a4 4 0 0 1 4 4h-8a4 4 0 0 1 4-4zm9.53 23.67a1 1 0 0 1 -.74.33h-17.58a1 1 0 0 1 -.74-.33 1 1 0 0 1 -.26-.77l1.7-16.9h2.09v3a1 1 0 0 0 2 0v-3h8v3a1 1 0 0 0 2 0v-3h2.09l1.7 16.9a1 1 0 0 1 -.26.77z">
                            </path>
                        </svg>
                    </div>
                    <div class="md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="24px"
                            fill="#4b4b4bff">
                            <path
                                d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                        </svg>
                    </div>
                </button>
                <span
                    class="absolute -top-1 max-md:-top-2 -right-3 max-md:right-0 bg-[#f25b21] text-white text-xs h-5 w-5 flex items-center justify-center rounded-full shadow-md">
                    0
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
        <div class="border-b border-gray-200">
            <button class="accordion-header w-full flex justify-between items-center py-3 text-gray-900 font-medium">
                Tees / Relaxed Tees
                <i class="fas fa-chevron-down transition-transform duration-300"></i>
            </button>
            <div class="accordion-content hidden pl-3 pb-3 text-sm text-gray-700">
                <ul class="list-disc pl-5 space-y-2">
                    <li><a href="#" class="hover:text-black">Oversized Tees</a></li>
                    <li><a href="#" class="hover:text-black">Graphic Tees</a></li>
                    <li><a href="#" class="hover:text-black">Long Sleeves</a></li>
                    <li><a href="#" class="hover:text-black">Tank Tops</a></li>
                </ul>
            </div>
        </div>

        <div class="border-b border-gray-200">
            <button class="accordion-header w-full flex justify-between items-center py-3 text-gray-900 font-medium">
                Joggers
                <i class="fas fa-chevron-down transition-transform duration-300"></i>
            </button>
            <div class="accordion-content hidden pl-3 pb-3 text-sm text-gray-700">
                <ul class="list-disc pl-5 space-y-2">
                    <li><a href="#" class="hover:text-black">Classic Joggers</a></li>
                    <li><a href="#" class="hover:text-black">Slim Fit Joggers</a></li>
                    <li><a href="#" class="hover:text-black">Cargo Joggers</a></li>
                    <li><a href="#" class="hover:text-black">Athletic Joggers</a></li>
                </ul>
            </div>
        </div>

        <div class="border-b border-gray-200">
            <button class="accordion-header w-full flex justify-between items-center py-3 text-gray-900 font-medium">
                Co-ords
                <i class="fas fa-chevron-down transition-transform duration-300"></i>
            </button>
            <div class="accordion-content hidden pl-3 pb-3 text-sm text-gray-700">
                <ul class="list-disc pl-5 space-y-2">
                    <li><a href="#" class="hover:text-black">Casual Co-ords</a></li>
                    <li><a href="#" class="hover:text-black">Lounge Co-ords</a></li>
                    <li><a href="#" class="hover:text-black">Streetwear Co-ords</a></li>
                </ul>
            </div>
        </div>


        <div class="space-y-4">
            <h3 class="text-base font-semibold text-gray-900">Trending Products</h3>

            <div class="grid grid-cols-2 gap-2">
                <!-- Product 1 -->
                <a href="products/product-details">
                    <div class="border overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="/public/images/f5.webp" alt="Product 1" class="w-full h-36 object-cover">
                        <div class="p-2">
                            <p class="text-sm font-medium text-gray-800 truncate">Oversized Tee</p>
                            <p class="text-xs text-gray-500">$24.99</p>
                        </div>
                    </div>
                </a>

                <!-- Product 2 -->
                <a href="products/product-details">
                    <div class="border overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="/public/images/f2.webp" alt="Product 2" class="w-full h-36 object-cover">
                        <div class="p-2">
                            <p class="text-sm font-medium text-gray-800 truncate">Slim Jogger</p>
                            <p class="text-xs text-gray-500">$34.99</p>
                        </div>
                    </div>
                </a>

                <!-- Product 3 -->
                <a href="products/product-details">
                    <div class="border overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="/public/images/f8.webp" alt="Product 3" class="w-full h-36 object-cover">
                        <div class="p-2">
                            <p class="text-sm font-medium text-gray-800 truncate">Streetwear Co-ord</p>
                            <p class="text-xs text-gray-500">$49.99</p>
                        </div>
                    </div>
                </a>

                <!-- Product 4 -->
                <a href="products/product-details">
                    <div class="border overflow-hidden shadow-sm hover:shadow-md transition">
                        <img src="/public/images/f10.webp" alt="Product 3" class="w-full h-36 object-cover">
                        <div class="p-2">
                            <p class="text-sm font-medium text-gray-800 truncate">Co-ord</p>
                            <p class="text-xs text-gray-500">$49.99</p>
                        </div>
                    </div>
                </a>
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

<div id="loginModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center hidden z-50">
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
            <img src="/public/logos/logo-white.png" alt="Logo" class="mb-6 max-md:mb-2 h-24 max-md:h-20 drop-shadow-lg">
            <h2 class="text-lg md:text-4xl font-extrabold text-center leading-snug tracking-tight">
                Unlock the <span class="text-orange-400">Spirit</span><br>
                Conquer the <span class="text-orange-400">Style</span>
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

                <!-- Mobile Carousel -->
                <div class="md:hidden relative w-full overflow-hidden">
                    <div id="mobileCarousel" class="flex transition-transform duration-700 ease-in-out">
                        <div class="w-full flex-shrink-0 text-center text-sm">
                            <p class="text-2xl">⭐</p>
                            <p class="mt-2 opacity-80">1,00,000+<br>Happy Customers</p>
                        </div>
                        <div class="w-full flex-shrink-0 text-center text-sm">
                            <p class="text-2xl">⭐</p>
                            <p class="mt-2 opacity-80">Fast<br>24hr Shipping</p>
                        </div>
                        <div class="w-full flex-shrink-0 text-center text-sm">
                            <p class="text-2xl">⭐</p>
                            <p class="mt-2 opacity-80">9,820+<br>Pincodes Reached</p>
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

        <div class="flex flex-col justify-center w-full md:w-[45%] bg-white p-10 max-md:p-4 relative">
            <!-- <div
                class="absolute bottom-0 right-0 w-40 h-40 bg-gradient-to-tr from-yellow-400/20 to-orange-500/20 rounded-full blur-2xl">
            </div> -->

            <h3 class="text-2xl font-bold text-gray-900 text-center mb-6 max-md:mb-4">Start Your Style Journey</h3>

            <form action="" method="POST" id="otp-form">
                <input type="text" placeholder="" name="username" class="hidden" id="username">
                <input type="text" placeholder="" name="from" class="hidden" id="user_from" value="otp">
                <div class="flex items-center border rounded-lg overflow-hidden gap-2 mb-4" id="mobile-div">
                    <img src="/public/logos/india.png" class="h-7 pl-3" alt="">
                    <span class="pr-1 text-gray-600">+91</span> <input type="tel" placeholder="Enter mobile number" name="mobile" id="mobile"
                        class="w-full px-3 py-2 outline-none border-l">
                </div>
                <div class="relative font-inter antialiased hidden flex flex-col items-center justify-center" id="otp-div">
                    <p>We have send verification code to </p>
                    <div><span id="mobile-span" class="font-bold"></span> &ensp; <span class="text-xs text-green-500 p-1 px-2 border border-green-500 cursor-pointer" onclick="EditotpNumber()">Edit</span></div>
                    <main class="relative flex flex-col justify-center mt-2 overflow-hidden">
                        <div class="w-full max-w-6xl mx-auto">
                            <div class="flex justify-center w-full">

                                <div class="w-full mx-auto text-center bg-white  pt-5 rounded-xl">

                                    <div class="flex items-center justify-between gap-3 px-10 w-full">
                                        <input
                                            type="text"
                                            class="w-14  h-14 text-center text-2xl otp-input font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                            pattern="\d*" maxlength="1" />
                                        <input
                                            type="text"
                                            class="w-14 h-14 text-center text-2xl otp-input font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                            maxlength="1" />
                                        <input
                                            type="text"
                                            class="w-14 h-14 text-center text-2xl otp-input font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                            maxlength="1" />
                                        <input
                                            type="text"
                                            class="w-14 h-14 text-center text-2xl otp-input font-extrabold text-slate-900 bg-slate-100 border border-transparent hover:border-slate-200 appearance-none rounded p-4 outline-none focus:bg-white focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                                            maxlength="1" />
                                    </div>
                                    <div class="w-full mx-auto mt-4">
                                        <button type="button" name="login" id="verifyOtp"
                                            class="relative w-full py-2 rounded-md font-semibold overflow-hidden group border-2 border-black">Verify
                                            OTP</button>
                                    </div>
                                    <div class="text-sm text-slate-500 mt-4">Didn't receive code? <a class="font-medium text-indigo-500 hover:text-indigo-600" href="#0">Resend</a></div>
                                </div>

                            </div>
                        </div>
                    </main>

                    <!-- Page footer -->


                    <!-- Banner with links -->

                </div>
                <!-- <div class="flex items-center mb-6">
                    <input type="checkbox" id="offers" class="mr-2 rounded border-gray-400 text-black focus:ring-black">
                    <label for="offers" class="text-sm text-gray-600">Notify me with offers & updates</label>
                </div> -->

                <button
                    class="relative w-full py-2 rounded-md font-semibold overflow-hidden group border-2 border-black" id="sendOtp" type="button">
                    <span
                        class="relative z-10 text-black group-hover:text-white transition-colors duration-1500">Send OTP</span>
                    <span
                        class="absolute inset-0 bg-black scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-700"></span>
                </button>

                <div>
                    <p class="text-center text-gray-500 my-3">or</p>
                </div>

                <div id="g_id_onload" style="display:flex; align-items:center; justify-content:center; width:100%"
                    data-client_id="188574937788-fn4td4evj5cqejhrgge28pf8129sa58q.apps.googleusercontent.com"
                    data-callback="handleCredentialResponse"
                    data-auto_select="false">
                </div>
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
        class="bg-white w-[50%] max-md:w-[100%] h-[75vh] max-md:h-[105vh] relative p-8 max-md:p-4 max-md:mt-8 shadow-lg animate-slideDown flex flex-col">
        <button id="closeSearch"
            class="absolute top-4 right-6 text-2xl text-gray-700 hover:text-black animate-rotate-pingpong">
            <i class="fas fa-times"></i>
        </button>

        <div class="shrink-0">
            <h2 class="text-2xl font-semibold text-center mb-6">What are you looking for</h2>
            <div class="w-full max-w-2xl mx-auto mb-6">
                <div class="flex items-center border border-gray-300 rounded-md overflow-hidden">
                    <input type="text" placeholder="Search our store"
                        class="w-full px-4 py-2 outline-none text-gray-700">
                    <button class="px-4 text-gray-500 hover:text-black">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto pr-2">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="border overflow-hidden hover:shadow-md transition">
                    <img src="/public/images/f1.webp" alt="Product 1" class="w-full h-40 object-cover">
                    <div class="p-2">
                        <h3 class="font-semibold text-sm">Classic T-Shirt</h3>
                        <p class="text-gray-500 text-sm">₹799</p>
                    </div>
                </div>

                <div class="border overflow-hidden hover:shadow-md transition">
                    <img src="/public/images/f2.webp" alt="Product 2" class="w-full h-40 object-cover">
                    <div class="p-2">
                        <h3 class="font-semibold text-sm">Casual Polo</h3>
                        <p class="text-gray-500 text-sm">₹1,099</p>
                    </div>
                </div>

                <div class="border overflow-hidden hover:shadow-md transition">
                    <img src="/public/images/f3.webp" alt="Product 3" class="w-full h-40 object-cover">
                    <div class="p-2">
                        <h3 class="font-semibold text-sm">Denim Jacket</h3>
                        <p class="text-gray-500 text-sm">₹1,899</p>
                    </div>
                </div>

                <div class="border overflow-hidden hover:shadow-md transition">
                    <img src="/public/images/f4.webp" alt="Product 4" class="w-full h-40 object-cover">
                    <div class="p-2">
                        <h3 class="font-semibold text-sm">Summer Dress</h3>
                        <p class="text-gray-500 text-sm">₹1,499</p>
                    </div>
                </div>

                <div class="border overflow-hidden hover:shadow-md transition">
                    <img src="/public/images/f5.webp" alt="Product 5" class="w-full h-40 object-cover">
                    <div class="p-2">
                        <h3 class="font-semibold text-sm">Hoodie</h3>
                        <p class="text-gray-500 text-sm">₹1,299</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<!-- 
<script>
    google.accounts.id.initialize({
        client_id: "188574937788-fn4td4evj5cqejhrgge28pf8129sa58q.apps.googleusercontent.com",
        callback: handleCredentialResponse,
        use_fedcm_for_prompt: false // 👈 fallback if FedCM is blocked
    });
</script> -->
<script>
    const messages = [
        ' Nova Kids – Style That Moves!',
        ' Free Delivery on Orders Over Rs.2000',
        ' Trendy Threads for Legends!',
        ' Cool Clothes for Cool Boys!',
        ' Gear Up for Adventures in Style!'
    ];

    let index = 0;
    const textElement = document.getElementById("rotating-text1");

    function showMessage() {
        // Fade out
        console.log(textElement);
        textElement.classList.add("opacity-0");

        setTimeout(() => {
            // Change text
            textElement.textContent = messages[index];
            // Fade in
            textElement.classList.remove("opacity-0");
        }, 500);

        index = (index + 1) % messages.length;
    }

    // Initial text
    textElement.textContent = messages[index];
    index++;

    // Smooth transition class
    textElement.classList.add("transition-opacity", "duration-700", "opacity-100");

    // Rotate every 3s
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

    openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

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
            if (
                !/^[0-9]{1}$/.test(e.key) &&
                e.key !== 'Backspace' &&
                e.key !== 'Delete' &&
                e.key !== 'Tab' &&
                !e.metaKey
            ) {
                e.preventDefault()
            }

            if (e.key === 'Delete' || e.key === 'Backspace') {
                const index = inputs.indexOf(e.target);
                if (index > 0) {
                    inputs[index - 1].value = '';
                    inputs[index - 1].focus();
                }
            }
        }

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

    const sendOtp = document.getElementById('sendOtp');
    const mobileInput = document.getElementById('mobile');
    const OtpDiv = document.getElementById('otp-div');
    const verifyOtp = document.getElementById('verifyOtp');
    const mobileDiv = document.getElementById('mobile-div');
    const mobilespan = document.getElementById('mobile-span');
    const Username = document.getElementById('username');
    sendOtp.addEventListener('click', async () => {
        // console.log("hiiiiiiiii")
        if (mobileInput.value != "" && mobileInput.value.length == 10) {
            const response = await axios.post('/api/send-otp', new URLSearchParams({
                phone: mobileInput.value,
            }))
            // console.log(response.data)

            if (response.data.success) {
                console.log(response.data)
                mobilespan.innerHTML = '+91' + ' ' + mobileInput.value
                mobileDiv.classList.add('hidden')
                sendOtp.classList.add('hidden');
                OtpDiv.classList.remove('hidden');
                verifyOtp.addEventListener('click', async () => {
                    console.log("testing......")
                    const otpInput = inputs.map(input => input.value).join("");
                    console.log(otpInput, response.data.otp);

                    if (response.data.otp == otpInput) {
                        console.log("Matched")
                        Username.value = response.data.data.username

                        verifyOtp.type = "submit"
                        verifyOtp.click();
                    } else {
                        toastr.error("Otp Verification Fail");
                    }

                })
            } else {
                toastr.error(response.data.message);
            }
        } else {
            toastr.error("Please Enter Valid number");
        }


    })
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

        document.getElementById("passemeail").removeAttribute('required');
        document.getElementById("password").removeAttribute('required');


        document.getElementById("password").value = "zyxwvutsrqponmlkjihgfedcba";
        document.getElementById("fname").value = responsePayload.given_name
        document.getElementById("lname").value = responsePayload.family_name
        document.getElementById("mobile").value = ""
        document.getElementById("username").value = responsePayload.email
        document.getElementById("from").value = "google";
        // document.getElementById("loginform").click();
        verifyOtp1.type = "submit"
        verifyOtp1.click();


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
                            <h2 class="w-full text-[1.7rem] leading-[2rem] uppercase">Jurassic Park: Prehistoric Paradise (Vintage Wash)</h2>
                            <div class="flex items-center justify-center gap-3 mt-4">
                                <span class="text-gray-300 text-xl line-through">Rs.1,499.0.00</span>
                                <span class="text-[#f25b21] text-xl">Rs.1,049.0.00</span>
                                <span class="text-xs bg-[#f25b21] text-white py-1 px-2 rounded-lg">SAVE 30%</span>

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
                                                                <div class="w-full flex items-center justify-between text-sm">

                                        <p class="uppercase">size : 8-9 Years</p>
                                        <p class="flex text-xs gap-1 cursor-pointer text-white bg-gray-800 py-1 px-3" onclick="document.getElementById('sizeChartModal').classList.remove('hidden')">
                                            <i class="fa-solid fa-ruler pr-1"></i> Sizing guide
                                        </p>
                                    </div>
                                    <div class="w-full flex items-center justify-start mt-3 text-sm">
                                                                                    <div class="border border-gray-900 flex items-center justify-center h-10 w-20" size_value="8-9 Years" size_name="size">8-9 Years</div>
                                                                                    <div class="border border-gray-300 flex items-center justify-center h-10 w-20" size_value="9-10 Years" size_name="size">9-10 Years</div>
                                                                                    <div class="border border-gray-300 flex items-center justify-center h-10 w-20" size_value="10-11 Years" size_name="size">10-11 Years</div>
                                                                                    <div class="border border-gray-300 flex items-center justify-center h-10 w-20" size_value="11-12 Years" size_name="size">11-12 Years</div>
                                                                                    <div class="border border-gray-300 flex items-center justify-center h-10 w-20" size_value="12-13 Years" size_name="size">12-13 Years</div>
                                                                            </div>
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
                                            <p><span style="box-sizing: inherit; font-weight: 700; font-family: &quot;Source Sans Pro&quot;, sans-serif; color: rgb(88, 89, 91); font-size: 15px;">Official Licensed&nbsp;Jurassic Park&nbsp;Oversized T-Shirt.</span><span style="box-sizing: inherit; font-weight: 700; font-family: &quot;Source Sans Pro&quot;, sans-serif; color: rgb(88, 89, 91); font-size: 15px;"><br style="box-sizing: inherit;"><br style="box-sizing: inherit;"></span><span style="color: rgb(88, 89, 91); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 15px;">Shop for Jurassic Park: Prehistoric Paradise Oversized T-Shirts at The Souled Store.<br></span></p><div style="box-sizing: inherit; color: rgb(88, 89, 91); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 15px;"><span style="box-sizing: inherit; font-weight: 700;">Material &amp; Care:<br style="box-sizing: inherit;"></span>100% Cotton<br style="box-sizing: inherit;"></div><div style="box-sizing: inherit; color: rgb(88, 89, 91); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 15px;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;">Machine wash.&nbsp;<br style="box-sizing: inherit;">This garment has undergone a special process that results in variations of shading and colour. It is recommended this garment be washed separately until no further colour is released.&nbsp;<br style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700;"><br style="box-sizing: inherit;">Country of Origin:</span>&nbsp;India (and proud)</div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div></div>                                        </div>
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
                                    <span class="font-semibold">Categories:</span> Tees                                </p>
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


    <!-- Add this style -->
<style>
    @keyframes rotatePingPong {
        0% {
            transform: rotate(0deg);
        }

        50% {
            transform: rotate(90deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    .animate-rotate-pingpong {
        animation: rotatePingPong 4s ease-in-out infinite;
    }

    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>


<!-- Overlay -->
<div id="sidecartOverlay" class="fixed inset-0 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-500 z-50">
</div>

<!-- Side Cart -->
<div id="sideCart"
    class="fixed top-0 right-0 w-[32vw] max-md:w-full h-full bg-white shadow-xl transform translate-x-full transition-transform duration-500 ease-in-out z-50 flex flex-col">

    <!-- Header -->
    <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-xl font-bold">Your Cart</h2>
        <!-- Close Button -->
        <button id="closeCart" onclick="closeCartFn()" class="text-gray-500 text-2xl hover:text-black animate-rotate-pingpong">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <!-- Cart Items -->
    <div class="flex-1 overflow-y-auto p-4">
        <!-- Free shipping message + progress bar -->
        <div id="shippingMessage" class="mb-4">
            <p id="remainingText" class="text-sm">
                Buy <span id="remainingAmount" class="text-[#f25b21] font-semibold">₹261.00</span> more to enjoy
                <span class="font-semibold">FREE Shipping</span>
            </p>
            <p id="congratsMessage" class="text-sm font-semibold text-green-600 hidden">
                🎉 Congrats! You are eligible for FREE Shipping
            </p>
            <div class="relative w-[90%] h-2 bg-gray-200 rounded-full mt-6">
                <!-- progress fill -->
                <div id="progressBar" class="h-2 bg-[#f25b21] rounded-full" style="width: 0%;"></div>

                <!-- truck icon -->
                <div id="truckIcon" class="absolute -top-3" style="left: 0%;">
                    <span
                        class="flex items-center justify-center w-7 h-7 rounded-full border border-[#f25b21] bg-white">
                        <i class="fas fa-truck text-[#f25b21] text-sm"></i>
                    </span>
                </div>
            </div>
        </div>


        <!-- Cart item -->
        <div class="flex items-center gap-4 border-b py-2">
            <!-- Product image -->
            <img src="/public/images/111.avif" alt="Product" class="w-16 h-20 object-cover">

            <!-- Product details -->
            <div class="flex-1">
                <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                <p class="text-sm text-gray-500 flex gap-3">
                    <span>Size: L</span>
                    <span class="font-bold text-[#f25b21]">₹<span id="cartTotal">1199</span></span>
                </p>

                <!-- Quantity controls -->
                <div class="flex items-center mt-2">
                    <button id="qtyMinus" class="px-3 border rounded-l hover:bg-gray-100">-</button>
                    <span id="qtyDisplay" class="px-4 border-t border-b">1</span>
                    <button id="qtyPlus" class="px-3 border rounded-r hover:bg-gray-100">+</button>
                </div>
            </div>

            <!-- Delete button -->
            <button class="text-gray-500 hover:text-red-600">
                <i class="fas fa-trash"></i>
            </button>
        </div>
        <div class="flex items-center gap-4 border-b py-2">
            <!-- Product image -->
            <img src="/public/images/f5.webp" alt="Product" class="w-16 h-20 object-cover">

            <!-- Product details -->
            <div class="flex-1">
                <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                <p class="text-sm text-gray-500 flex gap-3">
                    <span>Size: L</span>
                    <span class="font-bold text-[#f25b21]">₹<span id="cartTotal">1199</span></span>
                </p>

                <!-- Quantity controls -->
                <div class="flex items-center mt-2">
                    <button id="qtyMinus" class="px-3 border rounded-l hover:bg-gray-100">-</button>
                    <span id="qtyDisplay" class="px-4 border-t border-b">1</span>
                    <button id="qtyPlus" class="px-3 border rounded-r hover:bg-gray-100">+</button>
                </div>
            </div>

            <!-- Delete button -->
            <button class="text-gray-500 hover:text-red-600">
                <i class="fas fa-trash"></i>
            </button>
        </div>

        <div class="md:border-t md:border-gray-200 md:pt-3 md:mt-16">
            <p class="text-center mt-2 max-md:mt-5 mb-1">Don't Miss Out Of These😍!</p>

            <div class="grid grid-cols-1 gap-4 mb-2">
                <div class="flex items-center gap-4 p-2 bg-gray-100 border border-gray-200">
                    <img src="/public/images/f11.webp" alt="Product" class="w-16 h-16 object-cover">
                    <div class="flex-1">
                        <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                        <p class="font-bold text-[#f25b21]">₹<span id="cartTotal">1199</span></p>
                    </div>
                    <button
                        class="relative inline-block text-sm px-2 py-1 rounded-md border border-[#f25b21] text-[#f25b21] font-semibold overflow-hidden group">
                        <i class="fas fa-plus"></i> Add
                    </button>
                </div>
                <div class="flex items-center gap-4 p-2 bg-gray-100 border border-gray-200">
                    <img src="/public/images/f13.webp" alt="Product" class="w-16 h-16 object-cover">
                    <div class="flex-1">
                        <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                        <p class="font-bold text-[#f25b21]">₹<span id="cartTotal">1199</span></p>
                    </div>
                    <button
                        class="relative inline-block text-sm px-2 py-1 rounded-md border border-[#f25b21] text-[#f25b21] font-semibold overflow-hidden group">
                        <i class="fas fa-plus"></i> Add
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <div class="px-6 py-2 border-t">
        <div class="flex justify-between font-bold text-xl mb-2">
            <span>Total</span>
            <span>₹1,199</span>
        </div>
        <div class="flex gap-6">
            <!-- <button
                class="relative w-full border-2 border-black py-2 rounded-lg overflow-hidden transition duration-300 group">
                <span
                    class="relative z-10 text-black font-semibold group-hover:text-white transition-colors duration-300">
                    View Cart
                </span>
                <span
                    class="absolute inset-0 bg-black scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
            </button> -->

            <button onclick="window.location.href='/checkout'"
                class="relative w-full font-semibold py-1.5 rounded-md border-2 border-[#f25b21] overflow-hidden group">
                <span class="relative z-10 text-white group-hover:text-[#f25b21] transition-colors duration-700">
                    Checkout
                </span>
                <span
                    class="absolute inset-0 bg-[#f25b21] transition-transform duration-700 origin-left group-hover:scale-x-0 scale-x-100"></span>
            </button>

        </div>
    </div>
</div>
<div class="h-[100vh] w-[59%] z-[50] fixed top-0 right-0 w-full flex items-center justify-center transform translate-x-full transition-transform duration-[0.6s] ease-in-out" id="AddToCartSidebar">
    <div class="w-[47%] p-3 h-full overflow-y-scroll bg-gray-200 flex flex-col items-center justify-start no-scrollbar gap-3 transform translate-x-full transition-transform duration-[0.8s] ease-in-out" id="VarImg">
        <img src="https://www.bonkerscorner.com/cdn/shop/files/SlipstreamOversizedT-shirt_1_640x_crop_center.jpg?v=1754902583" alt="">
        <img src="https://www.bonkerscorner.com/cdn/shop/files/SlipstreamOversizedT-shirt_2_640x_crop_center.jpg?v=1754902583" alt="">
        <img src="https://www.bonkerscorner.com/cdn/shop/files/SlipstreamOversizedT-shirt_6_640x_crop_center.jpg?v=1754902583" alt="">
    </div>
    <div class="w-[53%] h-full overflow-y-scroll flex flex-col items-start justify-start z-10 bg-white" id="VarDetails">
        <div class="w-full flex items-center justify-between px-7 pt-7 ">
            <span class="uppercase ">SELECT OPTIONS</span>
            <button id="closeAddToCartSidebar" class="text-gray-500 text-2xl hover:text-black animate-rotate-pingpong" onclick="CloseVariant()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <span class="w-full h-[1px] bg-gray-200 my-5"></span>
        <div class="flex flex-col items-start justify-start w-full px-7">
            <h2 class="w-full text-[1.8rem] leading-[2rem] uppercase">Black Sporty Deconstructed Loose Pants</h2>
            <div class="flex items-center justify-center gap-3 mt-7">
                <span class="text-gray-300 text-xl line-through">Rs.1,499.00</span>
                <span class="text-[#33459c] text-xl">Rs.1,199.00</span>
                <span class="text-xs bg-[#33459c] text-white py-1 px-2 rounded-lg">SAVE 20%</span>

            </div>
            <p class=" text-xs text-gray-600 mt-1"><a href="" class="underline">shipping</a> calculated at checkout</p>
            <p class="text-xs mt-1">⭐⭐⭐⭐⭐ <span class="text-sm">31 reviews</span></p>
            <div class="w-full flex items-center justify-between mt-7 text-sm">
                <p>SIZE : M</p>
                <p class="flex gap-1 cursor-pointer"><svg class="icon icon-accordion color-foreground-" aria-hidden="true" focusable="false" role="presentation" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
                        <path d="M18.9836 5.32852L14.6715 1.01638L1.01638 14.6715L5.32852 18.9836L18.9836 5.32852ZM15.3902 0.297691C14.9933 -0.0992303 14.3497 -0.0992303 13.9528 0.297691L0.297691 13.9528C-0.0992301 14.3497 -0.0992305 14.9932 0.297691 15.3902L4.60983 19.7023C5.00675 20.0992 5.65029 20.0992 6.04721 19.7023L19.7023 6.04721C20.0992 5.65029 20.0992 5.00675 19.7023 4.60983L15.3902 0.297691Z" fill-rule="evenodd"></path>
                        <path d="M11.7863 2.67056C11.9848 2.4721 12.3065 2.4721 12.505 2.67056L14.4237 4.58927C14.6222 4.78774 14.6222 5.1095 14.4237 5.30796C14.2252 5.50642 13.9035 5.50642 13.705 5.30796L11.7863 3.38925C11.5878 3.19079 11.5878 2.86902 11.7863 2.67056Z"></path>
                        <path d="M8.93891 5.36331C9.13737 5.16485 9.45914 5.16485 9.6576 5.36331L11.5763 7.28202C11.7748 7.48048 11.7748 7.80225 11.5763 8.00071C11.3779 8.19917 11.0561 8.19917 10.8576 8.00071L8.93891 6.082C8.74045 5.88354 8.74045 5.56177 8.93891 5.36331Z"></path>
                        <path d="M6.24307 8.20742C6.44153 8.00896 6.76329 8.00896 6.96175 8.20742L8.88047 10.1261C9.07893 10.3246 9.07893 10.6464 8.88047 10.8448C8.68201 11.0433 8.36024 11.0433 8.16178 10.8448L6.24307 8.92611C6.0446 8.72765 6.0446 8.40588 6.24307 8.20742Z"></path>
                        <path d="M3.37296 10.8776C3.57142 10.6791 3.89319 10.6791 4.09165 10.8776L6.01036 12.7963C6.20882 12.9948 6.20882 13.3165 6.01036 13.515C5.8119 13.7134 5.49013 13.7134 5.29167 13.515L3.37296 11.5963C3.1745 11.3978 3.1745 11.076 3.37296 10.8776Z"></path>
                    </svg> Sizing guide</p>
            </div>
            <div class="w-full flex items-center justify-start mt-3 text-sm">
                <div class="border border-gray-600 flex items-center justify-center h-12 w-12">XS</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">S</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">M</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">L</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">XL</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">XXL</div>
            </div>
            <span class="mt-6 text-sm">COLOR :</span>
            <div class="w-full flex items-center justify-start mt-3 text-sm gap-2">
                <div class="border border-gray-600 p-1 flex items-center justify-center "><img src="https://www.bonkerscorner.com/cdn/shop/files/black-sporty-deconstructed-loose-pants-xs-bonkerscorner-store-34403286876260.jpg?v=1728981039" alt="" class="h-[83px] w-[58px]"></div>
                <div class=" flex items-center justify-center "><img src="https://www.bonkerscorner.com/cdn/shop/files/white-sporty-deconstructed-loose-pants-xs-bonkerscorner-store-34410824138852.jpg?v=1728981030" alt="" class="h-[83px] w-[58px]"></div>
                <div class=" flex items-center justify-center"><img src="https://www.bonkerscorner.com/cdn/shop/files/navy-blue-sporty-deconstructed-loose-pants-xs-bonkerscorner-store-34410889838692.jpg?v=1728983441" alt="" class="h-[83px] w-[58px]"></div>

            </div>
            <div class="w-full flex items-center justify-start mt-7 gap-3">
                <div class="w-[30%]  flex items-center justify-center gap-7 border border-gray-800 p-3 px-3 rounded-lg">
                    <span class="cursor-pointer ">-</span>
                    <span class="text-black">1</span>
                    <span class="cursor-pointer ">+</span>
                </div>
                <div class="w-[80%] border border-gray-800 p-3 px-3 rounded-lg text-center cursor-pointer font-semibold text-base">
                    ADD TO CART
                </div>
            </div>
            <div class="w-full items-center justify-center text-white text-center mt-3 bg-gray-900 p-3 px-3 rounded-lg cursor-pointer">
                BUY IT NOW
            </div>


        </div>
    </div>
</div>
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
<script>
    // const openCartBtns = document.querySelectorAll('.openCartBtn');
    const sideCart = document.getElementById('sideCart');
    const closeCart = document.getElementById('closeCart');
    const cartOverlay = document.getElementById('sidecartOverlay');

    function openCart() {
        CloseVariant();
         setTimeout(() => {
        sideCart.classList.remove('translate-x-full');
        sideCart.classList.add('translate-x-0');
        cartOverlay.classList.remove('opacity-0', 'pointer-events-none');
        cartOverlay.classList.add('opacity-100');
         }, 1000);
    }

    function closeCartFn() {
        sideCart.classList.remove('translate-x-0');
        sideCart.classList.add('translate-x-full');
        cartOverlay.classList.remove('opacity-100');
        cartOverlay.classList.add('opacity-0', 'pointer-events-none');
    }

    openCartBtns.forEach(btn => btn.addEventListener('click', openCart));
    closeCart.addEventListener('click', closeCartFn);
    cartOverlay.addEventListener('click', closeCartFn);
</script>

<script>
    const targetFreeShipping = 1460; // Free shipping threshold
    const itemPrice = 1199; // Price of one item
    let quantity = 1; // default

    // Elements
    const progressBar = document.getElementById("progressBar");
    const truckIcon = document.getElementById("truckIcon");
    const remainingText = document.getElementById("remainingText");
    const remainingAmountEl = document.getElementById("remainingAmount");
    const congratsMessage = document.getElementById("congratsMessage");
    const qtyDisplay = document.getElementById("qtyDisplay");
    const cartTotalEl = document.getElementById("cartTotal");

    const qtyMinus = document.getElementById("qtyMinus");
    const qtyPlus = document.getElementById("qtyPlus");

    function updateCart() {
        const subtotal = itemPrice * quantity;
        const remaining = targetFreeShipping - subtotal;

        // Update total price
        cartTotalEl.textContent = subtotal.toLocaleString();

        // Calculate progress %
        let progress = (subtotal / targetFreeShipping) * 100;
        if (progress > 100) progress = 100;

        progressBar.style.width = progress + "%";
        truckIcon.style.left = progress + "%";

        if (remaining > 0) {
            congratsMessage.classList.add("hidden");
            remainingText.classList.remove("hidden");
            remainingAmountEl.textContent = "₹" + remaining.toLocaleString();
        } else {
            remainingText.classList.add("hidden");
            congratsMessage.classList.remove("hidden");
        }
    }

    // Quantity controls
    qtyMinus.addEventListener("click", () => {
        if (quantity > 1) {
            quantity--;
            qtyDisplay.textContent = quantity;
            updateCart();
        }
    });

    qtyPlus.addEventListener("click", () => {
        quantity++;
        qtyDisplay.textContent = quantity;
        updateCart();
    });

    updateCart(); // initial call
    const VariantSelects = document.getElementById('AddToCartSidebar');

    function CloseVariant() {

        let VarImg = document.getElementById('VarImg');

        setTimeout(() => {
            VariantSelects.classList.remove('translate-x-0');
            VariantSelects.classList.add('translate-x-full');
        }, 600);

        VarImg.classList.remove('translate-x-0');
        VarImg.classList.add('translate-x-full');

        cartOverlay.classList.remove('opacity-100');
        cartOverlay.classList.add('opacity-0', 'pointer-events-none');
    }

    function Openvariant() {
        let VarImg = document.getElementById('VarImg');

        VariantSelects.classList.remove('translate-x-full');
        VariantSelects.classList.add('translate-x-0');

        setTimeout(() => {
            VarImg.classList.remove('translate-x-full');
            VarImg.classList.add('translate-x-0');
        }, 600);

        cartOverlay.classList.remove('opacity-0', 'pointer-events-none');
        cartOverlay.classList.add('opacity-100');
    }
    document.addEventListener('DOMContentLoaded', function() {

        AddToCart();
    });

    function AddToCart() {

        const addToCartBtn = document.querySelectorAll('.openCartBtn');
        console.log(addToCartBtn);
        if (addToCartBtn) {
            addToCartBtn.forEach(function(btn) {
                btn.addEventListener('click', async function(event) {
                    console.log("hello");
                    event.preventDefault();
                    event.stopPropagation();
                    // 
                    let ee = btn.parentElement
                    // showVarients(ee.querySelector(".ProductId").value);
                    console.log(ee);
                    let product_id = parseInt(ee.querySelector(".ProductId").value);
                    const response = await axios.post("/api/get-product-data", new URLSearchParams({
                        productid: product_id,

                    }))
                    console.log(response.data)

                    if (response.data.variants.length > 0) {

                        showVarientsSidebar(response.data.html);
                        
                        // console.log('hello');


                    } else {



                    }

                    // addToCartSidebar(ee.querySelector(".sideVarientId").value, ee.querySelector(".sideCategoryId").value, ee.querySelector(".sideProductId").value, btn)


                });
            });
        }
    }

    function showVarientsSidebar(data) {
        console.log(data);
        VariantSelects.innerHTML;
        VariantSelects.innerHTML = data;
        Openvariant()

    }
</script><section class="bg-gray-100 pt-4 pb-8">
    <div class="max-w-4xl mx-auto grid grid-cols-3 md:grid-cols-3 gap-8 max-md:gap-4 text-center">
        <!-- Complimentary Shipping -->
        <div class="flex flex-col items-center">
            <img src="/public/images/gif1.webp" alt="" class="h-20 w-20 max-md:h-16 max-md:w-16">
            <p class="font-semibold text-gray-900">Complimentary Shipping</p>
        </div>

        <!-- Consciously Crafted -->
        <div class="flex flex-col items-center">
            <img src="/public/images/gif2.webp" alt="" class="h-20 w-20 max-md:h-16 max-md:w-16">
            <p class="font-semibold text-gray-900">Consciously Crafted</p>
        </div>

        <!-- Quick Easy Returns -->
        <div class="flex flex-col items-center">
            <img src="/public/images/gif3.webp" alt="" class="h-20 w-20 max-md:h-16 max-md:w-16">
            <p class="font-semibold text-gray-900">Quick Easy Returns</p>
        </div>

    </div>
</section><style>
    /* Newsletter Input Animation */
    .newsletter-input {
        position: relative;
        transition: all 0.3s ease;
        background: #fff;
        color: #000;
    }

    .newsletter-input:focus {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        outline: none;
        border-color: #000;
    }

    /* Link Hover Effects */
    .link-hover {
        position: relative;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .link-hover::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: #f25b21;
        transition: width 0.3s ease;
    }

    .link-hover:hover::after {
        width: 100%;
    }

    .link-hover:hover {
        color: #fff;
        transform: translateX(5px);
    }

    /* Payment Method Hover */
    .payment-icon {
        transition: all 0.3s ease;
    }

    .payment-icon:hover {
        transform: translateY(-3px) rotate(5deg);
        /* background: #ffffff22; */
        color: white !important;
    }

    /* Trust Badge Animation */
    .trust-badge {
        transition: all 0.3s ease;
    }

    .trust-badge:hover {
        transform: scale(1.05);
        color: #fff;
    }

    /* Footer colors */
    footer {
        background-color: #ffffffff;
        color: #000000ff;
    }

    footer a,
    footer p,
    footer span,
    footer i {
        color: #000000ff !important;
    }
</style>

<!-- Tailwind Animations -->
<style>
    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .animate-spin-slow {
        animation: spin-slow 20s linear infinite;
    }
</style>



<div class="relative bg-black py-8 overflow-hidden w-full">
    <div
        class="max-w-4xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-6">

        <!-- Text -->
        <div class="flex-1 text-center md:text-left">
            <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-2">
                Stay in the Loop!
            </h3>
            <p class="text-gray-300 text-sm md:text-base">
                Get exclusive drops & vibes straight to your inbox.
            </p>
        </div>

        <!-- Form -->
        <div class="flex-1 flex space-x-2 md:space-x-4">
            <input type="email" placeholder="Your email"
                class="flex-1 px-4 py-2 rounded-md border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition-all text-sm" />
            <a href="#"
                class="relative bg-white inline-block px-6 py-2 rounded-md border border-white text-black group-hover:text-white font-semibold overflow-hidden group">
                <span class="relative z-10 transition-colors duration-700 group-hover:text-white">
                    Subscribe
                </span>
                <span
                    class="absolute inset-0 bg-black transform scale-x-0 origin-left transition-transform duration-700 group-hover:scale-x-100"></span>
            </a>
        </div>

    </div>
</div>

<footer class="w-full overflow-hidden">
    <div class="w-[90vw] mx-auto py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 max-md:gap-6">
            <!-- Brand Section -->
            <div class="lg:col-span-2">
                <div class="mb-6">
                    <div class="flex items-center gap-2">
                        <img src="/public/logos/nova_favicon.png" alt="Brand Logo" class="w-auto h-14 rounded-md object-cover mb-4">
                        <img src="/public/logos/nova_logo-brnd-name.png" alt="Brand Logo" class="w-auto h-14 rounded-md object-cover mb-4">
                    </div>
                    

                    <p class="text-gray-600 max-w-sm  leading-relaxed">
                        Authentic streetwear for the next generation. Quality pieces that speak your language and
                        match your vibe.
                    </p>
                </div>

                <div class="text-sm text-gray-600 space-y-2 mb-6">
                    <p class="flex items-center"><i class="fas fa-envelope mr-3"></i> support@novauniverse.com</p>
                    <p class="flex items-center"><i class="fab fa-whatsapp mr-3"></i> +1 1234567890</p>
                </div>

                <div class="flex space-x-4 justify-start ">
                    <!-- Instagram -->
                    <a href="#"
                        class="group relative w-12 h-12 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                        <i class="fab fa-instagram text-black text-xl md:text-xl"></i>
                        <span
                            class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                    </a>

                    <a href="#"
                        class="group relative w-12 h-12 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                        <i class="fab fa-facebook-f text-black text-xl md:text-xl"></i>
                        <span
                            class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                    </a>

                    <!-- YouTube -->
                    <a href="#"
                        class="group relative w-12 h-12 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                        <i class="fab fa-youtube text-black text-xl md:text-xl"></i>
                        <span
                            class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                    </a>

                    <!-- Discord -->
                    <a href="#"
                        class="group relative w-12 h-12 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                        <i class="fab fa-discord text-black text-xl md:text-xl"></i>
                        <span
                            class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                    </a>
                </div>


            </div>

            <div>
                <h4 class="font-bold text-black mb-6 max-md:mb-3 text-lg">Shop</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="link-hover text-gray-600">New Arrivals</a></li>
                    <li><a href="#" class="link-hover text-gray-600">Bestsellers</a></li>
                    <li><a href="#" class="link-hover text-gray-600">T-Shirts</a></li>
                    <li><a href="#" class="link-hover text-gray-600">Bottoms</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-black mb-6 max-md:mb-3 text-lg">Customer Care</h4>
                <ul class="space-y-3">
                    <li><a href="/size-guide" class="link-hover text-gray-600">Size Guide</a></li>
                    <li><a href="/shipping-info" class="link-hover text-gray-600">Shipping Info</a></li>
                    <li><a href="/return-exchange" class="link-hover text-gray-600">Returns & Exchanges</a>
                    </li>
                    <li><a href="/contact" class="link-hover text-gray-600">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-black mb-6 max-md:mb-3 text-lg">About</h4>
                <ul class="space-y-3 mb-6">
                    <li><a href="#" class="link-hover text-gray-600">Our Story</a></li>
                    <!-- <li><a href="#" class="link-hover text-gray-600">Brand Partners</a></li> -->
                    <li><a href="#" class="link-hover text-gray-600">Client Reviews</a></li>
                </ul>

                <!-- Trust Badges -->
                <div class="space-y-3">
                    <div class="trust-badge flex items-center text-sm text-gray-500 cursor-pointer">
                        <i class="fas fa-shield-alt mr-3 text-green-500"></i>
                        <span>Secure Payments</span>
                    </div>
                    <div class="trust-badge flex items-center text-sm text-gray-500 cursor-pointer">
                        <i class="fas fa-truck mr-3 text-blue-500"></i>
                        <span>Free Shipping Rs.2000+</span>
                    </div>
                    <div class="trust-badge flex items-center text-sm text-gray-500 cursor-pointer">
                        <i class="fas fa-undo mr-3 text-purple-500"></i>
                        <span>7-Day Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bottom Bar -->
    <div class="border-t border-gray-700 py-4">
        <div class="w-[90vw] mx-auto">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-6 lg:space-y-0">
                <!-- Copyright -->
                <div class="text-sm">© 2025 Nova Universe. All rights reserved.</div>
                <!-- Payment Methods -->
                <div class="flex items-center space-x-4 hidden">
                    <span class="text-sm">We accept:</span>
                    <div class="flex space-x-3">
                        <div class="payment-icon rounded-md cursor-pointer">
                            <i class="fab fa-cc-visa text-xl"></i>
                        </div>
                        <div class="payment-icon rounded-md cursor-pointer">
                            <i class="fab fa-cc-mastercard text-xl"></i>
                        </div>
                        <div class="payment-icon rounded-md cursor-pointer">
                            <i class="fab fa-paypal text-xl"></i>
                        </div>
                        <div class="payment-icon rounded-md cursor-pointer">
                            <i class="fab fa-apple-pay text-xl"></i>
                        </div>
                    </div>
                </div>
                <!-- Legal Links -->
                <div class="flex space-x-6 text-sm">
                    <a href="/privacy-policy" class="link-hover">Privacy Policy</a>
                    <a href="/terms-and-conditions" class="link-hover">Terms of Service</a>
                    <a href="/cookies" class="link-hover">Cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
<!-- <script src="./js/script.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- jQuery & Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.9.0/axios.min.js"></script>

<!-- Include AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
    AOS.init({
        once: true, // Ensures the animation runs only once
    });
</script>

<script>
    // Stop redirection when clicking cart/heart
    document.querySelectorAll('.stop-link').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            e.stopPropagation();
            // your cart/heart logic goes here
        });
    });
</script>
<script>
    function OpenAccordian(el) {
        const content = el.querySelector('.accordion-content');
        const icon = el.querySelector('.icon-wrapper');

        // First close all other accordions if needed (optional: uncomment below if you want to allow only one open at a time)
        // document.querySelectorAll('.accordion-item').forEach(item => {
        //     if (item !== el) {
        //         item.querySelector('.accordion-content').classList.add('max-h-0');
        //         item.querySelector('.icon-wrapper').classList.remove('rotate-90');
        //     }
        // });

        if (content.classList.contains('max-h-0')) {
            content.classList.remove('max-h-0');
            content.classList.add('max-h-[1000px]'); // Adjust as needed
            icon.classList.add('-rotate-90');
        } else {
            content.classList.remove('max-h-[1000px]');
            content.classList.add('max-h-0');
            icon.classList.remove('-rotate-90');
        }
    }
            $(document).ready(function () {
        $('.home-banner-slider').owlCarousel({
            loop: true,
            items: 1, // Fade effect works best with a single item
            autoplay: true,
            autoplayTimeout: 4000, // Adjust timing as needed
            smartSpeed: 2000, // Smooth transition speed
            animateOut: 'fadeOut', // This adds the fade-out effect
            dots: false,
            nav: false
        });
    });
    $(document).ready(function () {
        $('.testimonial').owlCarousel({
            loop: true,
            items: 1, // Fade effect works best with a single item
            autoplay: true,
            autoplayTimeout: 4000, // Adjust timing as needed
            dots: false,
            nav: false
        });
    });
    $(document).ready(function () {
        $('.testimonial-video').owlCarousel({
            loop: true,
            items: 2, // Fade effect works best with a single item
            autoplay: true,
            autoplayTimeout: 4000, // Adjust timing as needed
            margin: 20,
            autoplayHoverPause: true,


            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        });
    });
    $(document).ready(function () {
        $('.PastQuiz').owlCarousel({
            loop: true,
            margin: 15,

            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    });

    function banner_forward(ele) {
        //   console.log(ele);
        //   console.log("parent",ele.parentElement)
        let bannerdiv = ele.parentElement.querySelector(".owl-carousel"); // Select the slider directly
        //   console.log(bannerdiv);
        if (bannerdiv) {
            let nextButton = bannerdiv.querySelector(".owl-next");
            if (nextButton) {
                nextButton.click();
            } else {
                console.error("Next button not found");
            }
        } else {
            console.error("Banner slider not found");
        }
    }

    function banner_backward(ele) {
        // console.log(ele);
        // console.log("parent",ele.parentElement)
        let bannerdiv = ele.parentElement.querySelector(".owl-carousel");
        //   console.log(bannerdiv);
        if (bannerdiv) {
            let prevButton = bannerdiv.querySelector(".owl-prev");
            if (prevButton) {
                prevButton.click();
            } else {
                console.error("Previous button not found");
            }
        } else {
            console.error("Banner slider not found");
        }
    }
    document.addEventListener("DOMContentLoaded", function () {
        const counters = document.querySelectorAll(".count-up");

        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        let start = parseInt(target.dataset.start) || 0;
                        let end = target.dataset.end.includes("+") ?
                            parseInt(target.dataset.end) :
                            parseInt(target.dataset.end);
                        let duration = parseInt(target.dataset.duration) || 2000;
                        let suffix = target.dataset.end.includes("+") ? "+" : ""; // Detect "+" or "%"

                        animateCount(target, start, end, duration, suffix);
                        observer.unobserve(target);
                    }
                });
            }, {
            threshold: 0.5
        }
        );

        counters.forEach((counter) => observer.observe(counter));

        function animateCount(element, start, end, duration, suffix) {
            let startTime;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                element.textContent = Math.floor(progress * (end - start) + start) + suffix;

                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            }
            requestAnimationFrame(step);
        }
    });

        
    function extractGst(inclusivePrice, gstRate = 18) {
        // Convert to number explicitly
        inclusivePrice = parseFloat(inclusivePrice);
        gstRate = parseFloat(gstRate);

        if (isNaN(inclusivePrice) || isNaN(gstRate)) {
            console.error("Invalid number input:", inclusivePrice, gstRate);
            return {
                base_price: '0.00',
                gst_amount: '0.00',
                total_price: '0.00',
                gst_rate: gstRate
            };
        }

        const basePrice = inclusivePrice * 100 / (100 + gstRate);
        const gstAmount = inclusivePrice - basePrice;

        return {
            base_price: basePrice.toFixed(2),
            gst_amount: gstAmount.toFixed(2),
            total_price: inclusivePrice.toFixed(2),
            gst_rate: gstRate
        };
    }


    const paragraphs = document.querySelectorAll(".section_paragraph");
    const fadeLeft = document.querySelectorAll(".fadeLeft");
    const fadeRight = document.querySelectorAll(".fadeRight");
    const fadeIn = document.querySelectorAll(".fadeIn");
    const fadeDown = document.querySelectorAll(".fadeDown");

    // Function to check visibility and add the relevant class
    function checkVisibility() {
        paragraphs.forEach((paragraph) => {
            if (isInView(paragraph)) {
                paragraph.classList.add("section_paragraph--visible");
            }
        });
        fadeDown.forEach((element) => {
            if (isInView(element)) {
                element.classList.add("Slidedown");
            }
        });
        fadeLeft.forEach((element) => {
            if (isInView(element)) {
                element.classList.add("fadeInLeft");
            }
        });
        fadeRight.forEach((element) => {
            if (isInView(element)) {
                element.classList.add("fadeInRight");
            }
        });
        fadeIn.forEach((element) => {
            if (isInView(element)) {
                element.classList.add("fadeInc");
            }
        });
    }

    // Function to check if an element is in view
    function isInView(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.bottom > 0 &&
            rect.top <
            (window.innerHeight - 50 || document.documentElement.clientHeight - 150)
        );
    }

    // Check visibility on page load and on scroll
    document.addEventListener("DOMContentLoaded", checkVisibility);
    document.addEventListener("scroll", checkVisibility);
</script></body>