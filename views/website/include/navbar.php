<!-- Top Bar -->
<div class="flex items-center justify-center w-full px-6 py-2 bg-black sticky top-0 z-50">
    <p id="rotating-text" class="text-sm text-white font-semibold tracking-wide"></p>
</div>

<script>
    const messages = [
        "🔥 Nova Kids",
        "💯 Refund Guarantee if you don't ❤️ the product",
        "🚚 Free delivery on orders over Rs.2000"
    ];

    let index = 0;
    const textElement = document.getElementById("rotating-text");

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

<style>
    .glass-effect {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-lift:hover {
        transform: translateY(-2px);
    }

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



<nav id="navbar"
    class="fixed w-full flex items-center justify-between py-2 z-50 transition-all duration-300 bg-white/20 backdrop-blur-sm">
    <!-- Left: Navigation -->
    <li class="relative group list-none">
        <button
            class="nav-text relative px-6 py-3 text-base font-semibold flex items-center gap-2 transition-all duration-300">
            Boys Collection
            <i class="fas fa-chevron-down text-sm group-hover:rotate-180 transition-transform duration-300"></i>
        </button>
        <!-- Mega Menu -->
        <div
            class="mega-menu absolute left-0 top-full w-screen bg-white py-8 px-8 grid grid-cols-5 gap-8 z-50 shadow-xl">
            <!-- Hero Section -->
            <div class="col-span-2 relative rounded-lg overflow-hidden h-[400px] bg-gray-900">
                <img src="https://images.unsplash.com/photo-1504593811423-6dd665756598?w=600&h=400&fit=crop"
                    alt="Streetwear Collection" class="w-full h-full object-cover opacity-80">

                <div class="absolute inset-0 bg-black/40"></div>

                <div class="absolute bottom-6 left-6 text-white">
                    <p class="text-sm font-medium mb-1 opacity-80">New Drop</p>
                    <h3 class="text-2xl font-bold mb-3 leading-tight">
                        Streetwear<br>
                        Essentials
                    </h3>
                    <p class="text-sm opacity-80 mb-4">Fresh fits for the streets</p>
                </div>

                <button
                    class="absolute bottom-6 right-6 bg-white text-black px-5 py-2 rounded font-medium hover:bg-gray-100 transition-colors">
                    Shop Now
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

            <!-- Hoodies & Sweatshirts -->
            <div class="space-y-4">
                <h4 class="font-semibold text-base text-black border-b border-gray-200 pb-2">Co-ords</h4>

                <div class="space-y-3">
                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Pullover Hoodies</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Comfort meets style</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Zip Hoodies</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Easy layering</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Crewnecks</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Classic cut, modern fit</p>
                    </a>
                </div>
            </div>

            <!-- Bottoms -->
            <div class="space-y-4">
                <h4 class="font-semibold text-base text-black border-b border-gray-200 pb-2">Joggers</h4>

                <div class="space-y-3">
                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Cargo Pants</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Utility meets streetwear</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Joggers</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Comfort on the move</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Wide Leg Jeans</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Relaxed denim vibes</p>
                    </a>

                    <a href="#" class="block p-3 rounded category-hover border border-transparent transition-all group">
                        <div class="flex items-center justify-between">
                            <span class=" text-gray-800 group-hover:text-black">Shorts</span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Summer essentials</p>
                    </a>
                </div>
            </div>
        </div>
    </li>

    <!-- Logo -->
    <div class="flex items-center absolute left-1/2 transform -translate-x-1/2">
        <img src="/public/logos/nova_logo2.png" alt="Logo" class="w-28">
    </div>

    <!-- Right: Icons -->
    <div class="flex gap-8 items-center ml-auto pr-12 py-3">
        <div class="flex items-center">
            <input type="text" placeholder="Search..."
                class="search-expand bg-white/20 text-white placeholder-white/70 px-3 py-1 rounded-full text-sm border-0 focus:outline-none focus:ring-2 focus:ring-white/30">
            <button class="nav-text p-2 rounded-full hover:bg-white/10 transition-all duration-300 active:scale-95">
                <i class="fas fa-search text-lg"></i>
            </button>
        </div>
        <!-- <button class="nav-text p-2 rounded-full hover:bg-white/10 transition-all duration-300 active:scale-95">
            <i class="fas fa-search text-lg"></i>
        </button> -->
        <button class="nav-text p-2 rounded-full hover:bg-white/10 transition-all duration-300 active:scale-95">
            <i class="fas fa-user text-lg"></i>
        </button>
        <div class="relative">
            <button class="nav-text p-2 rounded-full hover:bg-white/10 transition-all duration-300 active:scale-95">
                <i class="fas fa-shopping-cart text-lg"></i>
            </button>
            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-1 rounded-full shadow-md">
                0
            </span>
        </div>
    </div>
</nav>

<script>
    const navbar = document.getElementById('navbar');
    const navText = document.querySelectorAll('.nav-text');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('bg-white', 'shadow-md');
            navbar.classList.remove('bg-white/20', 'backdrop-blur-sm');

            navText.forEach(el => {
                el.classList.remove('text-white');
                el.classList.add('text-black');
            });
        } else {
            navbar.classList.remove('bg-white', 'shadow-md');
            navbar.classList.add('bg-white/20', 'backdrop-blur-sm');

            navText.forEach(el => {
                el.classList.remove('text-black');
                el.classList.add('text-white');
            });
        }
    });

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