<aside class="w-[16.5rem] bg-[#ebebeb] text-gray-300 flex flex-col fixed h-full z-10  md:flex rounded-tl-3xl mt-[3.7rem] px-3 py-3">
    <nav class="flex-grow p-2 space-y-2 h-[65vh] overflow-y-auto" x-data="{ open: null }">
        <a href="/dashboard" class="flex items-center px-2 py-1 text-[#303030] hover:text-[#303030] text-decoration-none rounded-xl font-semibold hover:bg-[#f1f1f1] bg-white">
            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1V10a1 1 0 00-1-1H7a1 1 0 00-1 1v10a1 1 0 001 1h3z" />
            </svg>
            Home
        </a>
        <div class="text-[#303030] font-semibold mt-1">
            <button @click="open === 'customer' ? open = null : open = 'customer'"
                class="w-full flex items-center justify-between px-2 py-1  rounded-lg hover:bg-[#f1f1f1] focus:outline-none">
                <span class="flex items-center">
                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
            <div x-show="open === 'customer'" x-collapse class="mt-2 space-y-1 ">
                <a href="/admin/customers-list"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">
                    <span>All Customers</span>
                </a>
                <a href="/admin/customer-reviews"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">
                    <span>Customer Reviews</span>
                </a>
            </div>
        </div>
        <div class="text-[#303030] font-semibold mt-1 w-full">
            <button @click="open === 'Order List' ? open = null : open = 'Order List'"
                class="w-full flex items-center justify-between px-2 py-1  rounded-lg hover:bg-[#f1f1f1] focus:outline-none">
                <span class="flex items-center">
                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
            <div x-show="open === 'Order List'" x-collapse class="mt-2 space-y-1 w-full">
                <a href="/admin/orders"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">
                    <span> All Orders
                    </span>
                </a>
                <a href="/admin/cancel-orders"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">
                    <span> Cancel Orders
                    </span>
                </a>
            </div>
        </div>
        <div class="text-[#303030] font-semibold mt-1 w-full">
            <button @click="open === 'products' ? open = null : open = 'products'"
                class="w-full flex items-center justify-between px-2 py-1  rounded-lg hover:bg-[#f1f1f1] focus:outline-none">
                <span class="flex items-center">
                    <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
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
            <div x-show="open === 'products'" x-collapse class=" mt-2 space-y-1">
                <a href="/admin/products-list"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">
                    Products
                </a>

                <a href="/admin/collections"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">
                    Collections
                </a>

                <a href="/admin/inventory"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">
                    Inventory
                </a>

            </div>
        </div>
        <a href="/admin/coupons-list" class="flex items-center px-2 py-1 text-[#303030] hover:text-[#303030] text-decoration-none rounded-xl font-semibold hover:bg-[#f1f1f1]">
            <img src="/public/icons/coupon.png" class="h-6 mr-2" alt="">

            Coupons
        </a>
        <a href="/notify" class="flex items-center px-2 py-1 text-[#303030] hover:text-[#303030] text-decoration-none rounded-xl font-semibold hover:bg-[#f1f1f1]">
            <img src="/public/icons/notification.png" class="h-6 mr-2" alt="">

            Notification
        </a>
        <a href="/admin/free-shipping" class="flex items-center px-2 py-1 text-[#303030] hover:text-[#303030] text-decoration-none rounded-xl font-semibold hover:bg-[#f1f1f1]">
            <img src="/public/icons/free-shipping.png" class="h-6 mr-2" alt="">

            Free Shipping
        </a>
        <div class="text-[#303030] font-semibold mt-1 w-full">
            <button @click="open === 'front_cms' ? open = null : open = 'front_cms'"
                class="w-full flex items-center justify-between px-2 py-1  rounded-lg hover:bg-[#f1f1f1] focus:outline-none">
                <span class="flex items-center">
                    <img src="/public/icons/fron-cms.png" class="h-5 mr-2" alt="">
                    Front CMS
                </span>
                <svg :class="{'rotate-180': open === 'master'}" class="h-4 w-4 transform transition-transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open === 'front_cms'" x-collapse class=" mt-2 space-y-1">
                <a href="/admin/front-cms/home-banner"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">

                    Home Banner
                </a>
                <a href="/admin/front-cms/product-banner"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">

                    Product Banner
                </a>
                <a href="/admin/front-cms/nav-heading"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">

                    Navbar Heading
                </a>
                <a href="/admin/front-cms/offer-heading"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">

                    Offer Heading
                </a>
            </div>
        </div>
        <div class="text-[#303030] font-semibold mt-1 w-full">
            <button @click="open === 'master' ? open = null : open = 'master'"
                class="w-full flex items-center justify-between px-2 py-1  rounded-lg hover:bg-[#f1f1f1] focus:outline-none">
                <span class="flex items-center">
                    <img src="/public/icons/graduation.png" class="mr-2 h-6" alt="">
                    Master
                </span>
                <svg :class="{'rotate-180': open === 'master'}" class="h-4 w-4 transform transition-transform"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open === 'master'" x-collapse class=" mt-2 space-y-1">
                <a href="/admin/category-list"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">

                    Category
                </a>
                <a href="/admin/packages-list"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">

                    Add Packaging
                </a>

                <a href="/admin/payment-gateway" class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">

                    Payment Gateway
                </a>
                <a href="/admin/popup-list"
                    class="block px-2 py-1 text-[#686868] rounded hover:bg-[#f1f1f1] hover:text-[#303030] text-decoration-none rounded-xl flex items-center justify-start gap-2 w-full">
                    <img src="/public/icons/arrow-right.png" class="h-5" alt="">

                    Add Popup
                </a>


            </div>
        </div>
        <p class="text-xs text-gray-600 font-semibold mt-7">SETTING</p>

        <a href="/admin/setting" class="flex items-center px-2 py-1 text-[#303030] hover:text-[#303030] text-decoration-none rounded-xl font-semibold hover:bg-[#f1f1f1]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-5 w-5 mr-2">
                <path fill-rule="evenodd" d="M6 2.176c0-.76.617-1.376 1.377-1.376h1.246c.76 0 1.376.616 1.376 1.376v.688c0 .19.126.396.358.517q.219.114.424.248c.221.144.465.152.632.056l.6-.347c.658-.38 1.5-.154 1.88.504l.622 1.08c.38.658.155 1.5-.503 1.88l-.648.373c-.163.094-.277.303-.269.56a5 5 0 0 1-.004.439c-.014.264.1.478.268.575l.653.377c.658.38.883 1.222.503 1.88l-.623 1.08a1.377 1.377 0 0 1-1.88.503l-.7-.405c-.164-.094-.401-.088-.62.048q-.164.102-.335.191c-.232.121-.358.326-.358.517v.811c0 .76-.616 1.376-1.376 1.376h-1.246c-.76 0-1.376-.616-1.376-1.376v-.81c0-.192-.127-.397-.359-.518a5 5 0 0 1-.333-.19c-.22-.138-.458-.143-.621-.049l-.7.405c-.659.38-1.5.154-1.88-.504l-.624-1.08a1.375 1.375 0 0 1 .504-1.879l.653-.377c.167-.097.282-.311.268-.575a5 5 0 0 1-.004-.439c.008-.257-.106-.465-.27-.56l-.647-.374a1.376 1.376 0 0 1-.504-1.88l.624-1.079a1.376 1.376 0 0 1 1.88-.504l.6.347c.166.096.41.088.631-.056q.205-.135.423-.248c.232-.121.359-.326.359-.517v-.688Zm2 7.324a1.5 1.5 0 1 0-.001-3.001 1.5 1.5 0 0 0 .001 3.001"></path>
            </svg>
            Settings
        </a>
    </nav>
    <script src="//unpkg.com/alpinejs" defer></script>




</aside>