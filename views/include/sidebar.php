<aside class="w-60 bg-[#1e293b] text-gray-300 flex flex-col fixed h-full z-10 hidden md:flex">
    <div class="px-6 py-2 border-b border-gray-700 flex items-center justify-center">
        <a href="#" class="flex items-center space-x-2 text-white">
            <img src="/public/logos/logo-white.png" class="w-24" alt="Logo">
            <!-- <span class="font-bold text-lg">NovaKids</span> -->
        </a>
    </div>

    <!-- Sidebar Navigation -->
    <!-- Sidebar Navigation -->
    <nav class="flex-grow p-2 space-y-2" x-data="{ open: null }">

        <!-- Home -->
        <a href="/dashboard" class="flex items-center px-4 py-2 text-white bg-slate-700 rounded-lg">
            <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1V10a1 1 0 00-1-1H7a1 1 0 00-1 1v10a1 1 0 001 1h3z" />
            </svg>
            Home
        </a>

        <div>
            <button @click="open === 'customer' ? open = null : open = 'customer'"
                class="w-full flex items-center justify-between px-4 py-2 hover:bg-slate-700 rounded-lg">
                <span class="flex items-center">
                    <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Customers
                </span>
                <svg :class="{'rotate-180': open === 'master'}" class="h-4 w-4 transform transition-transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open === 'customer'" x-collapse class="ml-10 mt-2 space-y-1">
                <a href="/admin/customers-list"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Customers
                </a>
                <a href="/admin/customer-reviews"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Customer Reviews
                </a>
            </div>
        </div>

        <!-- <a href="/admin/customers-list" class="flex items-center px-4 py-2 hover:bg-slate-700 rounded-lg text-gray-300 hover:text-white text-decoration-none">
            <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Customers
        </a> -->


        <!-- Orders Dropdown -->
        <div>
            <button @click="open === 'Order List' ? open = null : open = 'Order List'"
                class="w-full flex items-center justify-between px-4 py-2 hover:bg-slate-700 rounded-lg">
                <span class="flex items-center">
                    <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                    </svg>
                    Orders
                </span>
                <svg :class="{'rotate-180': open === 'Order List'}" class="h-4 w-4 transform transition-transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open === 'Order List'" x-collapse class="ml-10 mt-2 space-y-1">
                <a href="/admin/orders"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    All Orders
                </a>
                <a href="/admin/cancel-orders"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Cancel Orders
                </a>
            </div>
        </div>

        <!-- Products Dropdown -->
        <div>
            <button @click="open === 'products' ? open = null : open = 'products'"
                class="w-full flex items-center justify-between px-4 py-2 hover:bg-slate-700 rounded-lg">
                <span class="flex items-center">
                    <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Products
                </span>
                <svg :class="{'rotate-180': open === 'products'}" class="h-4 w-4 transform transition-transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open === 'products'" x-collapse class="ml-10 mt-2 space-y-1">
                <a href="/admin/products-list"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Products
                </a>

                <a href="/admin/collections"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Collections
                </a>

                <a href="/admin/inventory"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Inventory
                </a>
                <a href="#categories"
                    class="hidden px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Categories
                </a>
            </div>
        </div>

        <!-- <div>
            <button @click="open === 'websetting' ? open = null : open = 'websetting'"
                class="w-full flex items-center justify-between px-4 py-2 hover:bg-slate-700 rounded-lg">
                <span class="flex items-center">
                    <i class="fas fa-gears mr-3"></i>
                    Web Setting
                </span>
                <svg :class="{'rotate-180': open === 'websetting'}"
                    class="h-4 w-4 transform transition-transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open === 'websetting'" x-collapse class="ml-10 mt-2 space-y-1">
                <a href="/admin/websetting/home" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Home
                </a>
            </div>
        </div> -->
        <div>
            <button @click="open === 'front_cms' ? open = null : open = 'front_cms'"
                class="w-full flex items-center justify-between px-4 py-2 hover:bg-slate-700 rounded-lg">
                <span class="flex items-center">
                    <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Front CMS
                </span>
                <svg :class="{'rotate-180': open === 'master'}" class="h-4 w-4 transform transition-transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open === 'front_cms'" x-collapse class="ml-10 mt-2 space-y-1">
                <a href="/admin/front-cms/home-banner"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Home Banner
                </a>
                <a href="/admin/front-cms/product-banner"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Home Banner
                </a>
                <a href="/admin/front-cms/nav-heading"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Navbar Heading
                </a>
                <a href="/admin/front-cms/offer-heading"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Offer Heading
                </a>
            </div>
        </div>
        <div>
            <button @click="open === 'master' ? open = null : open = 'master'"
                class="w-full flex items-center justify-between px-4 py-2 hover:bg-slate-700 rounded-lg">
                <span class="flex items-center">
                    <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Master
                </span>
                <svg :class="{'rotate-180': open === 'master'}" class="h-4 w-4 transform transition-transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open === 'master'" x-collapse class="ml-10 mt-2 space-y-1">
                <a href="/admin/category-list"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Category
                </a>
                <a href="/admin/packages-list"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Add Packaging
                </a>
                <a href="/admin/coupons-list"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Coupon
                </a>
                <a href="/notify" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Notification
                </a>
                <a href="/admin/payment-gateway" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Payment Gateway
                </a>
                <a href="/admin/popup-list"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Add Popup
                </a>
                <a href="/admin/free-shipping"
                    class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-slate-700 rounded">
                    Free Shipping
                </a>

            </div>
        </div>
    </nav>

    <!-- Alpine.js (needed for dropdowns) -->
    <script src="//unpkg.com/alpinejs" defer></script>



    <div class="p-4 border-t border-gray-700">
        <a href="#" class="flex items-center px-4 py-2 hover:bg-slate-700 rounded-lg">
            <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Settings
        </a>
        <a href="/logout" class="flex items-center px-4 py-2 text-red-800 font-bold bg-slate-400 hover:bg-slate-300 hover:text-red-700 rounded-lg">
            <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" y1="12" x2="9" y2="12" />
            </svg>
            Log Out
        </a>
    </div>
</aside>