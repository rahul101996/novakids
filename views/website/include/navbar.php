<!-- Top Bar -->
<div
    class="flex items-center justify-center w-full px-6 py-2 bg-gradient-to-tr from-gray-500 via-gray-700 to-gray-500 sticky top-0 z-50">
    <p id="rotating-text1" class="text-sm text-white font-medium tracking-wide"></p>
</div>

<style>
    .mega-menu {
        opacity: 0;
        margin-top: 14px;
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
</style>

<nav
    class="fixed w-full flex items-center justify-between py-1.5 z-50 transition-all duration-300 bg-black/70 backdrop-blur-sm">
    <!-- Left: Navigation -->
    <li class="relative group list-none">
        <button
            class="nav-text text-white relative px-6 py-3 text-lg font-semibold flex items-center gap-2 transition-all duration-300">
            Boys Collection
            <i class="fas fa-chevron-down text-sm group-hover:rotate-180 transition-transform duration-300"></i>
        </button>
        <!-- Mega Menu -->
        <div
            class="mega-menu absolute left-0 top-full w-screen bg-white py-8 px-8 grid grid-cols-5 gap-8 z-50 shadow-xl">
            <!-- Hero Section -->
            <div class="relative rounded-lg overflow-hidden h-[400px] bg-gray-900">
                <img src="/public/images/333.avif" alt="Streetwear Collection"
                    class="w-full h-full object-cover opacity-80">

                <div class="absolute bottom-10 left-6 text-white">
                    <p class="text-base font-medium mb-3 opacity-80">Trending Now</p>
                    <!-- <h3 class="text-2xl font-bold mb-3 leading-tight">
                        Urban<br>
                        Co-ords
                    </h3> -->
                    <!-- <p class="text-sm opacity-80 mb-4">Fresh fits for every vibe</p> -->
                </div>

                <button
                    class="overflow-hidden absolute bottom-2 left-6 px-5 py-2 rounded font-medium text-white bg-black transition-all duration-500 group">
                    <span class="relative z-10">Shop Now</span>
                    <span
                        class="absolute inset-0 bg-gradient-to-r from-purple-800 to-orange-700 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-700"></span>
                </button>
            </div>
            <div class="relative rounded-lg overflow-hidden h-[400px] bg-gray-900">
                <img src="/public/images/444.avif" alt="Streetwear Collection"
                    class="w-full h-full object-cover opacity-80 ">

                <div class="absolute bottom-10 left-6 text-white">
                    <p class="text-base font-medium mb-3 opacity-80">Trending Now</p>
                    <!-- <h3 class="text-2xl font-bold mb-3 leading-tight">
                        Urban<br>
                        Co-ords
                    </h3> -->
                    <!-- <p class="text-sm opacity-80 mb-4">Fresh fits for every vibe</p> -->
                </div>

                <button
                    class="overflow-hidden absolute bottom-2 left-6 px-5 py-2 rounded font-medium text-white bg-black transition-all duration-500 group">
                    <span class="relative z-10">Shop Now</span>
                    <span
                        class="absolute inset-0 bg-gradient-to-r from-purple-800 to-orange-700 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-700"></span>
                </button>

            </div>

            <!-- T-Shirts & Tops -->
            <div class="space-y-4">
                <h4 class="font-semibold text-base text-black border-b border-gray-200 pb-2">Tees / Relaxed Tees</h4>

                <div class="space-y-3">
                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Oversized Tees</span>

                        </div>
                        <p class="text-xs text-gray-500 mt-1">Relaxed fit, street ready</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Graphic Tees</span>

                        </div>
                        <p class="text-xs text-gray-500 mt-1">Bold prints, statement pieces</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Long Sleeves</span>

                        </div>
                        <p class="text-xs text-gray-500 mt-1">Layering essentials</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Tank Tops</span>

                        </div>
                        <p class="text-xs text-gray-500 mt-1">Summer vibes</p>
                    </a>
                </div>
            </div>

            <!-- Bottoms -->
            <div class="space-y-4">
                <h4 class="font-semibold text-base text-black border-b border-gray-200 pb-2">Joggers</h4>

                <div class="space-y-3">
                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-800 group-hover:text-black">Classic Joggers</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Everyday comfort wear</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-800 group-hover:text-black">Slim Fit Joggers</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Modern tapered look</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-800 group-hover:text-black">Cargo Joggers</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Utility meets style</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-800 group-hover:text-black">Athletic Joggers</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Performance-ready fit</p>
                    </a>
                </div>
            </div>

            <!-- Hoodies & Sweatshirts -->
            <div class="space-y-4">
                <h4 class="font-semibold text-base text-black border-b border-gray-200 pb-2">Co-ords</h4>

                <div class="space-y-3">
                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-800 group-hover:text-black">Casual Co-ords</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Everyday comfort sets</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-800 group-hover:text-black">Lounge Co-ords</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Relaxed & cozy vibes</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-800 group-hover:text-black">Streetwear Co-ords</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Bold styles for the city</p>
                    </a>
                </div>
            </div>
        </div>
    </li>

    <!-- Logo -->
    <div class="flex items-center absolute left-1/2 transform -translate-x-1/2">
        <a href="/" class="block">
            <img src="/public/logos/nova_logo2 (1).png" alt="Logo" class="w-36">
        </a>
    </div>


    <!-- Right: Icons -->
    <div class="flex gap-8 items-center ml-auto pr-12 py-3">
        <div class="flex items-center">
            <input type="text" placeholder="Search..."
                class="search-expand bg-white/20 text-white placeholder-white/70 px-3 py-1 rounded-full text-sm border-0 focus:outline-none focus:ring-2 focus:ring-white/30">
            <button
                class="nav-text text-white p-2 rounded-full hover:bg-white/10 transition-all duration-300 active:scale-95">
                <i class="fas fa-search text-lg"></i>
            </button>
        </div>
        <button
            class="nav-text text-white p-2 rounded-full hover:bg-white/10 transition-all duration-300 active:scale-95">
            <i class="fas fa-user text-lg"></i>
        </button>
        <div class="relative">
            <button
                class="openCartBtn nav-text text-white p-2 rounded-full hover:bg-white/10 transition-all duration-300 active:scale-95">
                <i class="fas fa-shopping-cart text-lg"></i>
            </button>
            <span
                class="absolute -top-2 -right-2 bg-[#f25b21] text-white text-xs h-5 w-5 flex items-center justify-center rounded-full shadow-md">
                0
            </span>
        </div>
    </div>
</nav>

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
    const topBar = document.querySelector('div.flex.items-center.justify-center'); // Top header
    const navbar = document.querySelector('nav'); // Main navbar

    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY || window.pageYOffset;

        if (scrollY === 0) {
            // Show top bar only at the very top
            topBar.style.transform = 'translateY(0)';
            navbar.style.top = `calc(${topBar.offsetHeight}px)`; // Push navbar below top bar
        } else {
            // Hide top bar when scrolled down
            topBar.style.transform = 'translateY(-100%)';
            navbar.style.top = '0'; // Stick navbar to top
        }
    });

    // Smooth transitions
    topBar.style.transition = 'transform 0.3s ease-in-out';
    navbar.style.transition = 'top 0.3s ease-in-out';
</script>


<script>

    // Search expand functionality
    const searchButton = document.querySelector('.fa-search').closest('button');
    const searchInput = document.querySelector('.search-expand');

    searchButton.addEventListener('click', () => {
        searchInput.classList.toggle('active');
        if (searchInput.classList.contains('active')) {
            searchInput.focus();
        }
    });
</script>