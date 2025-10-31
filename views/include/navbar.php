<style>
    body {
        background: #1a1a1a;
    }
</style>
<header class="w-full flex bg-[#1a1a1a] items-center justify-between fixed top-0 left-0 z-[9999] py-2">
    <div class="flex items-center justify-center px-4 py-2 gap-1">
        <img alt="Shopify" src="/<?= $companyData['logo'] ?>" class="h-[1.8rem]">
        <span class="text-white text-[1.1rem] font-semibold italic"> <?= $companyData['company'] ?> </span>
    </div>
    <div class="relative w-[45vw]">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="#d9d9d9">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input id="navbarSearch" type="text" placeholder="Search"
            class="bg-[#303030] w-full pl-10 pr-4 py-2 rounded-xl text-white border-[#303030] focus:outline-none focus:bg-black placeholder:text-[#d9d9d9] border-t border-gray-600">
        <div
            class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-[#d9d9d9] font-semibold rounded-md px-1.5 py-1.5 bg-[#373737]">
            CTRL K
        </div>

        <!-- Dropdown -->
        <div id="searchDropdown"
            class="absolute top-full left-0 w-full mt-1 bg-[#1f1f1f] text-gray-100 rounded-lg shadow-xl text-sm hidden max-h-[65vh] overflow-y-auto z-50">
        </div>
    </div>
    <div class="flex items-center space-x-5 px-4">
        <button class="text-white hover:text-gray-700">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </button>
        <div class="relative inline-block text-left">
            <!-- Profile Button -->
            <div id="profileBtn" class="flex items-center space-x-2 cursor-pointer select-none">
                <div class="w-9 h-9 bg-fuchsia-600 rounded-xl flex items-center justify-center text-white font-semibold text-sm">
                    <span><?= strtoupper($companyData['company'][0]) ?></span>
                </div>
                <span class="text-right text-sm">
                    <span class="font-semibold text-gray-200"><?= $companyData['company'] ?></span>
                </span>
            </div>

            <!-- Dropdown Menu -->
            <div id="profileDropdown"
                class="hidden absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-lg ring-1 ring-gray-200 z-50">
                <div class="p-2 border-b border-gray-100 flex flex-col">
                    <span class="text-sm font-medium text-gray-900 capitalize"><?= $_SESSION['name'] ?></span>

                    <span class="text-xs text-gray-500"><?= $_SESSION['email'] ?></span>
                    
                </div>

                <div class="p-2">
                    <a href="/logout"
                        class="flex items-center px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 6H3" />
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </div>

        <script>
            const profileBtn = document.getElementById('profileBtn');
            const profileDropdown = document.getElementById('profileDropdown');

            profileBtn.addEventListener('click', () => {
                profileDropdown.classList.toggle('hidden');
            });

            // Hide dropdown if clicked outside
            document.addEventListener('click', (e) => {
                if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });
        </script>

    </div>
</header>
<script>
    const searchInput = document.getElementById("navbarSearch");
    const dropdownn = document.getElementById("searchDropdown");

    const groupedOptions = {
        "Dashboard": [{
            label: "Home",
            desc: "Go to main dashboard",
            link: "/dashboard",
            icon: `<svg class='h-5 w-5 text-gray-300' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1V10a1 1 0 00-1-1H7a1 1 0 00-1 1v10a1 1 0 001 1h3z'/></svg>`
        }],
        "Customers": [{
                label: "All Customers",
                desc: "View all registered customers",
                link: "/admin/customers-list",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Customer Reviews",
                desc: "See customer feedback and reviews",
                link: "/admin/customer-reviews",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
        ],
        "Orders": [{
                label: "All Orders",
                desc: "Manage all placed orders",
                link: "/admin/orders",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Cancel Orders",
                desc: "View or restore cancelled orders",
                link: "/admin/cancel-orders",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
        ],
        "Products": [{
                label: "Products List",
                desc: "Manage product listings",
                link: "/admin/products-list",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Collections",
                desc: "Organize products by category",
                link: "/admin/collections",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Inventory",
                desc: "Check and update stock levels",
                link: "/admin/inventory",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
        ],
        "Marketing": [{
                label: "Coupons",
                desc: "Manage discount coupon codes",
                link: "/admin/coupons-list",
                icon: `<img src='/public/icons/coupon.png' class='h-5 invert'>`
            },
            {
                label: "Notification",
                desc: "Send notifications to customers",
                link: "/notify",
                icon: `<img src='/public/icons/notification.png' class='h-5 invert'>`
            },
            {
                label: "Sales & Offers",
                desc: "Set offer and discounts",
                link: "/admin/discount",
                icon: `<img src="/public/icons/discount.png" class="h-6 mr-2 invert" alt="">`
            },
            {
                label: "Free Shipping",
                desc: "Set free shipping conditions",
                link: "/admin/free-shipping",
                icon: `<img src='/public/icons/free-shipping.png' class='h-5 invert'>`
            },
        ],
        "Front CMS": [{
                label: "Home Banner",
                desc: "Edit homepage banner images",
                link: "/admin/front-cms/home-banner",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Product Banner",
                desc: "Customize product section banners",
                link: "/admin/front-cms/product-banner",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Navbar Heading",
                desc: "Change navigation headings",
                link: "/admin/front-cms/nav-heading",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Offer Heading",
                desc: "Edit promotional offer titles",
                link: "/admin/front-cms/offer-heading",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
        ],
        "Master": [{
                label: "Category",
                desc: "Manage product categories",
                link: "/admin/category-list",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Add Packaging",
                desc: "Add or modify packaging options",
                link: "/admin/packages-list",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Payment Gateway",
                desc: "Configure payment methods",
                link: "/admin/payment-gateway",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Add Popup",
                desc: "Create website popups and promos",
                link: "/admin/popup-list",
                icon: `<img src='/public/icons/arrow-right.png' class='h-5'>`
            },
            {
                label: "Settings",
                desc: "Adjust system and site settings",
                link: "/admin/setting",
                icon: `<svg xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 16 16' class='h-5 w-5 text-gray-300'><path fill-rule='evenodd' d='M6 2.176c0-.76.617-1.376 1.377-1.376h1.246c.76 0 1.376.616 1.376 1.376v.688c0 .19.126.396.358.517q.219.114.424.248c.221.144.465.152.632.056l.6-.347c.658-.38 1.5-.154 1.88.504l.622 1.08c.38.658.155 1.5-.503 1.88l-.648.373c-.163.094-.277.303-.269.56a5 5 0 0 1-.004.439c-.014.264.1.478.268.575l.653.377c.658.38.883 1.222.503 1.88l-.623 1.08a1.377 1.377 0 0 1-1.88.503l-.7-.405c-.164-.094-.401-.088-.62.048q-.164.102-.335.191c-.232.121-.358.326-.358.517v.811c0 .76-.616 1.376-1.376 1.376h-1.246c-.76 0-1.376-.616-1.376-1.376v-.81c0-.192-.127-.397-.359-.518a5 5 0 0 1-.333-.19c-.22-.138-.458-.143-.621-.049l-.7.405c-.659.38-1.5.154-1.88-.504l-.624-1.08a1.375 1.375 0 0 1 .504-1.879l.653-.377c.167-.097.282-.311.268-.575a5 5 0 0 1-.004-.439c.008-.257-.106-.465-.27-.56l-.647-.374a1.376 1.376 0 0 1-.504-1.88l.624-1.079a1.376 1.376 0 0 1 1.88-.504l.6.347c.166.096.41.088.631-.056q.205-.135.423-.248c.232-.121.359-.326.359-.517v-.688Z'/></svg>`
            },
        ]
    };

    let flatOptions = Object.entries(groupedOptions).flatMap(([group, items]) =>
        items.map(item => ({
            ...item,
            group
        }))
    );

    let filtered = [];
    let activeIndex = -1;

    function renderDropdown() {
        dropdownn.innerHTML = "";
        if (filtered.length === 0) {
            dropdownn.innerHTML = `<div class='px-4 py-2 text-gray-400'>No results found</div>`;
            return;
        }

        let currentGroup = "";
        filtered.forEach((item, i) => {
            if (item.group !== currentGroup) {
                currentGroup = item.group;
                const header = document.createElement("div");
                header.className = "px-4 pt-3 pb-1 text-xs font-semibold text-gray-400 uppercase";
                header.textContent = currentGroup;
                dropdownn.appendChild(header);
            }

            const div = document.createElement("div");
            div.className = `flex items-start gap-3 px-4 py-2 cursor-pointer rounded-md transition ${
        i === activeIndex ? "bg-[#333]" : "hover:bg-[#2a2a2a]"
      }`;
            div.innerHTML = `
        <div class="flex-shrink-0 mt-0.5">${item.icon}</div>
        <div>
          <div class="font-medium text-gray-100">${item.label}</div>
          <div class="text-xs text-gray-400">${item.desc}</div>
        </div>
      `;
            div.addEventListener("click", () => (window.location.href = item.link));
            dropdownn.appendChild(div);
        });
    }

    function updateDropdown() {
        const query = searchInput.value.toLowerCase().trim();
        if (!query) {
            filtered = flatOptions;
            renderDropdown();
            showDropdown();
            return;
        }
        filtered = flatOptions.filter(o =>
            o.label.toLowerCase().includes(query) ||
            o.group.toLowerCase().includes(query) ||
            o.desc.toLowerCase().includes(query)
        );
        renderDropdown();
        showDropdown();
    }

    function showDropdown() {
        dropdownn.classList.remove("hidden");
    }

    function hideDropdown() {
        dropdownn.classList.add("hidden");
        activeIndex = -1;
    }

    searchInput.addEventListener("input", updateDropdown);
    document.addEventListener("click", e => {
        if (!e.target.closest("#searchDropdown") && e.target !== searchInput) hideDropdown();
    });

    searchInput.addEventListener("keydown", e => {
        if (dropdownn.classList.contains("hidden")) return;
        if (e.key === "ArrowDown") {
            e.preventDefault();
            activeIndex = (activeIndex + 1) % filtered.length;
            renderDropdown();
        } else if (e.key === "ArrowUp") {
            e.preventDefault();
            activeIndex = (activeIndex - 1 + filtered.length) % filtered.length;
            renderDropdown();
        } else if (e.key === "Enter") {
            e.preventDefault();
            if (filtered[activeIndex]) window.location.href = filtered[activeIndex].link;
        } else if (e.key === "Escape") hideDropdown();
    });

    // Ctrl + K shortcut
    document.addEventListener("keydown", e => {
        if (e.ctrlKey && e.key.toLowerCase() === "k") {
            e.preventDefault();
            searchInput.focus();
            searchInput.select();
            filtered = flatOptions;
            renderDropdown();
            showDropdown();
        }
    });
</script>