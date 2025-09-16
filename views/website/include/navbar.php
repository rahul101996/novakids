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
        <li class="relative group list-none max-md:hidden">
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

        <div class="flex items-center absolute md:left-1/2 transform md:-translate-x-1/2 max-md:left-2">
            <a href="/" class="block">
                <img src="/public/logos/newuniverse.png" alt="Logo" class="h-12 max-md:h-10">
            </a>
        </div>

        <div class="flex md:gap-1 items-center ml-auto md:pr-12 max-md:pr-5 py-1.5">
            <div class="flex items-center">
                <button id="openSearch"
                    class="text-black p-2 max-md:text-xs rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95">
                    <div class="max-md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="M400-320q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70Zm-42-98 226-227-57-57-169 170-85-84-57 56 142 142Zm42 178q-134 0-227-93T80-560q0-134 93-227t227-93q134 0 227 93t93 227q0 56-17.5 105.5T653-364l227 228-56 56-228-227q-41 32-90.5 49.5T400-240Zm0-320Z" />
                        </svg>
                    </div>
                    <div class="md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="M400-320q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70Zm-42-98 226-227-57-57-169 170-85-84-57 56 142 142Zm42 178q-134 0-227-93T80-560q0-134 93-227t227-93q134 0 227 93t93 227q0 56-17.5 105.5T653-364l227 228-56 56-228-227q-41 32-90.5 49.5T400-240Zm0-320Z" />
                        </svg>
                    </div>
                </button>
            </div>

            <button id="openLogin"
                class="nav-text text-black p-2 rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95">
                <div class="max-md:hidden">
                    <svg width="23" height="23" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg"
                        id="svgkp">
                        <path
                            d="M22.9129 12.935L13.7571 23.0474C13.5348 23.2929 13.1284 23.1084 13.1669 22.7794L14.0816 14.9731H10.6991C10.4034 14.9731 10.2484 14.6219 10.4478 14.4035L20.3133 3.59739C20.5589 3.32834 20.9984 3.58134 20.8891 3.92887L18.2354 12.3664H22.6607C22.9557 12.3664 23.1109 12.7163 22.9129 12.935Z"
                            fill="#f25b21"></path>
                        <path id="svgkp-path" fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.6079 5.35819C16.4805 5.1933 16.3421 5.03582 16.1932 4.8869C15.2702 3.96387 14.0183 3.44531 12.7129 3.44531C11.4075 3.44531 10.1556 3.96387 9.2326 4.8869C8.30957 5.80993 7.79102 7.06183 7.79102 8.36719C7.79102 9.67255 8.30957 10.9244 9.2326 11.8475C9.48368 12.0986 9.75909 12.3197 10.0533 12.5086L11.0235 11.4503C10.7335 11.2914 10.4649 11.0911 10.227 10.8531C9.56766 10.1938 9.19727 9.29959 9.19727 8.36719C9.19727 7.43479 9.56766 6.54057 10.227 5.88127C10.8863 5.22196 11.7805 4.85156 12.7129 4.85156C13.6453 4.85156 14.5395 5.22196 15.1988 5.88127C15.3636 6.04604 15.5103 6.22549 15.6377 6.41654L16.6079 5.35819ZM20.6413 18.6497L19.6746 19.7132C20.1676 20.4122 20.4473 21.2264 20.4473 22.0781V23.8359C20.4473 24.2243 20.7621 24.5391 21.1504 24.5391C21.5387 24.5391 21.8535 24.2243 21.8535 23.8359V22.0781C21.8535 20.7863 21.4016 19.6103 20.6413 18.6497ZM12.3111 17.5078H10.3026C7.27113 17.5078 4.97852 19.6394 4.97852 22.0781V23.8359C4.97852 24.2243 4.66372 24.5391 4.27539 24.5391C3.88707 24.5391 3.57227 24.2243 3.57227 23.8359V22.0781C3.57227 18.6922 6.67684 16.1016 10.3026 16.1016H12.4885L12.3111 17.5078Z"
                            fill="currentColor" stroke="currentColor"></path>
                    </svg>
                </div>
                <div class="md:hidden">
                    <svg width="20" height="23" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg"
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

            <div class="flex items-center">
                <button onclick="window.location.href='/wishlist'"
                    class="nav-text text-black p-2 rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95">
                    <div class="max-md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
                        </svg>
                    </div>
                    <div class="md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z" />
                        </svg>
                    </div>
                </button>
            </div>

            <div class="relative">
                <button
                    class="openCartBtn nav-text text-black p-2 rounded-full hover:bg-black/10 transition-all duration-300 active:scale-95">
                    <div class="max-md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                        </svg>
                    </div>
                    <div class="md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                        </svg>
                    </div>
                </button>
                <span
                    class="absolute -top-1 -right-3 bg-[#f25b21] text-white text-xs h-5 w-5 flex items-center justify-center rounded-full shadow-md">
                    0
                </span>
            </div>
        </div>
    </div>
</nav>

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
            <div class="mt-10 max-md:mt-4 grid grid-cols-3 gap-6 max-md:gap-2 text-center text-sm">
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
        </div>

        <div class="flex flex-col justify-center w-full md:w-[45%] bg-white p-10 max-md:p-4 relative">
            <div
                class="absolute bottom-0 right-0 w-40 h-40 bg-gradient-to-tr from-yellow-400/20 to-orange-500/20 rounded-full blur-2xl">
            </div>

            <h3 class="text-2xl font-bold text-gray-900 text-center mb-8 max-md:mb-4">Start Your Style
                Journey</h3>

            <form action="">
                <div class="flex items-center border rounded-lg overflow-hidden mb-3">
                    <span class="px-3 text-gray-600">+91</span> <input type="tel" placeholder="Enter mobile number"
                        class="w-full px-3 py-2 outline-none border-l">
                </div>

                <div>
                    <p class="text-center text-gray-500 mb-3">or</p>
                </div>

                <div class="flex flex-col justify-center mb-3">
                    <button
                        class="flex items-center justify-center gap-3 border border-gray-300 rounded-md py-2 text-gray-700 hover:bg-gray-50">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5">
                        Continue with Google
                    </button>
                </div>

                <div class="flex items-center mb-6">
                    <input type="checkbox" id="offers" class="mr-2 rounded border-gray-400 text-black focus:ring-black">
                    <label for="offers" class="text-sm text-gray-600">Notify me with offers & updates</label>
                </div>

                <button
                    class="relative w-full py-2 rounded-md font-semibold overflow-hidden group border-2 border-black">
                    <span
                        class="relative z-10 text-white group-hover:text-black transition-colors duration-300">Continue</span>
                    <span
                        class="absolute inset-0 bg-black group-hover:scale-x-0 origin-left transition-transform duration-500"></span>
                </button>
            </form>

            <p class="text-xs text-gray-500 text-center mt-6">
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
        class="bg-white w-[50%] max-md:w-[100%] h-[75vh] max-md:h-[105vh] relative p-8 shadow-lg animate-slideDown flex flex-col">
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
    const openSearch = document.getElementById("openSearch");
    const closeSearch = document.getElementById("closeSearch");
    const searchOverlay = document.getElementById("searchOverlay");

    openSearch.addEventListener("click", () => {
        searchOverlay.classList.remove("hidden");
    });

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
</script>