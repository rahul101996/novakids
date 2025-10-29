<?php

// $byCategory = str_replace('-', ' ', $category_name);
$byCategory = $category_name ?? 'new_arrivals';
$page = "shop";
?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <!-- Main Container -->
    <div class="w-full mx-auto">
        <div class="flex flex-col gap-6 w-full">
            <div
                class="flex items-center justify-between border-b p-6 max-md:p-4 sticky top-16 h-fit bg-white z-40 w-full">
                <div
                    class="grid max-md:grid-cols-2 grid-cols-5 max-md:gap-2 items-center max-md:items-start w-[90vw] mx-auto">
                    <div class="flex flex-wrap md:flex-nowrap max-md:text-xs items-center gap-4 max-md:order-1">
                        <button id="filterToggle"
                            class="flex items-center gap-2 px-4 py-2 max-md:py-1 max-md:px-2 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 hover:shadow transition-all">
                            <i id="filterIcon" class="fa-solid fa-sliders text-blue-500"></i>
                            <span>Filters</span>
                        </button>
                    </div>

                    <div
                        class="flex flex-wrap max-md:flex-col items-center max-md:items-start max-md:gap-2 max-md:w-full gap-3 text-sm max-md:text-xs max-md:order-3 max-md:col-span-2 md:col-span-3">
                        <button id="clearFiltersBtn"
                            class="text-gray-500 hover:text-red-500 font-medium transition-all hidden">
                            <i class="fa-solid fa-xmark mr-1"></i> Clear Filters
                        </button>
                        <div id="active-filters"
                            class="flex md:flex-wrap gap-2 max-md:whitespace-nowrap max-md:w-full max-md:text-xs max-md:overflow-x-auto max-md:pb-2">
                        </div>
                    </div>

                    <div
                        class="flex items-center md:justify-end gap-3 max-md:gap-1 max-md:text-xs text-sm max-md:order-2">
                        <span class="text-gray-700 font-semibold whitespace-nowrap">Sort by:</span>
                        <div class="relative">
                            <select id="sortSelect" onchange="handleFilterChange()"
                                class="appearance-none bg-white border border-gray-300 rounded-lg px-4 max-md:px-2 max-md:pr-6 py-2 max-md:py-1 md:pr-10 text-gray-700 font-medium shadow-sm hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all cursor-pointer">
                                <option value="">Default Sorting</option>
                                <option value="lowToHigh">Price: Low to High</option>
                                <option value="highToLow">Price: High to Low</option>
                                <option value="newest">Newest</option>
                            </select>
                            <span
                                class="absolute right-3 max-md:right-1 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div id="filterPanel" class="hidden border-b pb-8 bg-white w-full">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-sm w-[90vw] mx-auto">

                    <!-- Filter by Price -->
                    <div
                        class="w-full md:w-auto p-4 bg-white rounded-xl shadow-sm border border-gray-100 transition-all hover:shadow-md">
                        <h4 class="font-semibold text-gray-800 text-base mb-3 border-b pb-2 border-gray-200">
                            Filter by Price
                        </h4>

                        <!-- Range Slider -->
                        <div class="flex items-center gap-3">
                            <span class="text-gray-700 font-medium">₹<span id="minPriceLabel"></span></span>

                            <input id="priceRange" type="range" min="0" max="0" step="100" value=""
                                class="w-44 accent-[#f25b21] cursor-pointer appearance-none h-2 bg-gray-200 rounded-lg outline-none transition-all hover:bg-orange-100 focus:ring-2 focus:ring-[#f25b21]"
                                oninput="updatePriceLabel(this)">

                            <span class="text-gray-700 font-medium">₹<span id="maxPriceLabel"></span></span>
                        </div>

                        <!-- Price Info -->
                        <p class="text-gray-600 mt-3 text-sm">
                            Showing products up to <span class="font-semibold text-gray-800">₹<span
                                    id="selectedPriceLabel">0</span></span>
                        </p>
                    </div>

                    <!-- Product Categories -->
                    <div
                        class="w-full md:w-auto p-4 bg-white rounded-xl shadow-sm border border-gray-100 transition-all hover:shadow-md">
                        <h4 class="font-semibold text-gray-800 text-base mb-3 border-b pb-2 border-gray-200">
                            Product Categories
                        </h4>

                        <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-2 gap-3">
                            <li>
                                <label
                                    class="flex items-center gap-2 px-3 py-1.5 border rounded-full cursor-pointer text-sm font-medium bg-gray-50 border-gray-200 text-gray-700 hover:bg-orange-50 hover:border-orange-300 transition-all">
                                    <input type="radio" name="category" onclick="window.location.href='/new-arrivals'"
                                        <?= $byCategory == 'new_arrivals' ? 'checked' : '' ?>
                                        class="accent-[#f25b21] cursor-pointer">
                                    <span>New Arrivals</span>
                                </label>
                            </li>

                            <?php foreach (getData2("SELECT * FROM tbl_category") as $key => $value) { ?>
                                <li>
                                    <label
                                        class="flex items-center gap-2 px-3 py-1.5 border rounded-full cursor-pointer text-sm font-medium bg-gray-50 border-gray-200 text-gray-700 hover:bg-orange-50 hover:border-orange-300 transition-all">
                                        <input type="radio" name="category"
                                            onclick="window.location.href='/category/<?= strtolower($value['category']) ?>'"
                                            <?= $byCategory == strtolower($value['category']) ? 'checked' : '' ?>
                                            class="accent-[#f25b21] cursor-pointer">
                                        <span><?= $value['category'] ?></span>
                                    </label>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <!-- Filters (col-span-2 on desktop) -->
                    <div class="col-span-1 md:col-span-2">
                        <div id="filters-container" class="flex flex-wrap gap-3"></div>
                    </div>
                </div>

            </div>

            <main class="md:col-span-3 w-[90vw] mx-auto pb-16">
                <!-- Product Grid -->
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 max-md:gap-5" id="product-grid">

                </div>
            </main>

        </div>
    </div>

    <!-- JS -->
    <script>
        const filterToggle = document.getElementById('filterToggle');
        const filterPanel = document.getElementById('filterPanel');
        const filterIcon = document.getElementById('filterIcon');

        filterToggle.addEventListener('click', () => {
            filterPanel.classList.toggle('hidden');

            if (filterPanel.classList.contains('hidden')) {
                // Panel closed → show filter icon
                filterIcon.classList.remove('fa-xmark');
                filterIcon.classList.add('fa-sliders');
            } else {
                // Panel open → show cross icon
                filterIcon.classList.remove('fa-sliders');
                filterIcon.classList.add('fa-xmark');

                // ✅ Force scroll to top of page
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });


        let activeFilters = {}; // store current active filters globally


        // ✅ Fetch and render products
        async function setProducts(selectedFilters = {}, selectedPrice = {}, sortBy = "") {
            let productsContainer = document.getElementById("product-grid");
            let FilterContainer = document.getElementById("filters-container");
            let priceRange = document.getElementById("priceRange");
            let minPriceLabel = document.getElementById("minPriceLabel");
            let selectedPriceLabel = document.getElementById("selectedPriceLabel");
            let maxPriceLabel = document.getElementById("maxPriceLabel");

            let cat = '<?= $byCategory ?>';
            let minPrice = (selectedPrice.min ?? parseInt(priceRange.min));
            let maxPrice = (selectedPrice.max ?? parseInt(priceRange.value));

            // 🔥 Fetch products with filters
            let res = await fetch("/api/get-products/" + cat, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    filters: selectedFilters,
                    min_price: minPrice,
                    max_price: maxPrice
                })
            });

            let data = await res.json();

            if (!data.success || !data.data.length) {
                productsContainer.innerHTML = `<p class="col-span-full text-center text-gray-500">No products found</p>`;
                return;
            }

            let products = data.data;

            // console.log(products);

            // ✅ Sorting
            if (sortBy === "lowToHigh") {
                products.sort((a, b) => {
                    let minA = Math.min(...a.variants.map(v => parseFloat(v.price)));
                    let minB = Math.min(...b.variants.map(v => parseFloat(v.price)));
                    return minA - minB;
                });
            } else if (sortBy === "highToLow") {
                products.sort((a, b) => {
                    let maxA = Math.max(...a.variants.map(v => parseFloat(v.price)));
                    let maxB = Math.max(...b.variants.map(v => parseFloat(v.price)));
                    return maxB - maxA;
                });
            } else if (sortBy === "newest") products.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));


            // ✅ Price Range Initialization
            let flatPrices = products.flatMap(p => p.variants.map(v => parseFloat(v.price)));
            let minPriceValue = Math.floor(Math.min(...flatPrices));
            let maxPriceValue = Math.ceil(Math.max(...flatPrices));


            // ✅ Always set slider to max value initially
            if (!priceRange.dataset.initialized) {
                // console.log(minPriceValue, maxPriceValue);

                // console.log(maxPriceValue);

                // ✅ Always set slider to max value initially
                priceRange.min = minPriceValue;
                priceRange.max = maxPriceValue;
                priceRange.value = maxPriceValue; // 👈 force default selected to max

                // console.log(priceRange.value);
                priceRange.dataset.initialized = "true";
            }

            // ✅ Update labels correctly
            minPriceLabel.innerText = priceRange.min;
            maxPriceLabel.innerText = priceRange.max;
            selectedPriceLabel.innerText = priceRange.value; // 👈 ensures shows ₹1749


            // ✅ Build and normalize filter options
            let allFilters = {};

            products.forEach(p => {
                (p.variants || []).forEach(v => {
                    if (!v.options) return;
                    try {
                        let opts = v.options.trim();
                        if (opts.startsWith('"') && opts.endsWith('"')) opts = JSON.parse(opts);
                        let parsedOptions = JSON.parse(opts);

                        Object.entries(parsedOptions).forEach(([key, value]) => {
                            // ✅ Normalize the key
                            let normalizedKey = key.trim().toLowerCase();

                            // ✅ Normalize the value (convert to string and lowercase)
                            let normalizedValue = String(value).trim().toLowerCase();

                            // Create filter group if not exists
                            if (!allFilters[normalizedKey]) {
                                allFilters[normalizedKey] = {
                                    label: key.charAt(0).toUpperCase() + key.slice(1).toLowerCase(),
                                    values: new Set()
                                };
                            }

                            // ✅ Add normalized value
                            allFilters[normalizedKey].values.add(normalizedValue);
                        });
                    } catch (e) {
                        console.warn("Invalid variant options:", v.options);
                    }
                });
            });



            // ✅ Render filters only once (first load)
            if (FilterContainer.children.length === 0) {
                Object.entries(allFilters).forEach(([key, data]) => {
                    renderDynamicFilter(data.label, [...data.values]);
                });
            }

            restoreCheckedFilters();
            setActiveFilter(activeFilters);


            // ✅ Render products
            productsContainer.innerHTML = products.map(product => renderProductHTML(product)).join("");

            // console.log(activeFilters);
            AddToCart();
            AddToWishlist();
        }

        // ✅ Render single product HTML
        function renderProductHTML(product) {
            const images = JSON.parse(product.variants[0].images || "[]").reverse();
            const SecondImage = images[1] || images[0];

            if (product.variants[0].actual_price) {
                product.compare_price = product.variants[0].actual_price
            }
            const comparePrice = parseFloat(product.compare_price) || 0;
            // console.log(product.variants[0].price);
            const price = parseFloat(product.variants[0].price) || 0;
            const discount = comparePrice > 0 ? Math.round(((comparePrice - price) / comparePrice) * 100) : 0;
            const name = product.name.replace(/ /g, "-").replace(/'/g, "");

            return `
                    <a href="/products/product-details/${name}" class="block">
                        <div class="group relative cursor-pointer transition overflow-hidden">
                            ${discount > 0 ? `<span class="absolute top-2 left-2 max-md:top-0 max-md:left-0 bg-[#f25b21] text-white text-xs max-md:text-[11px] px-2 py-1 z-20">SAVE ${discount}%</span>` : ""}
                            <div class="relative w-full h-[450px] max-md:h-[250px] overflow-hidden group">
                                <img src="/${images[0]}" alt="${product.name}" class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">
                                <img src="/${SecondImage}" alt="${product.name} Hover" class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                                <button class="addToWishlistBtn absolute top-2 right-3 h-10 w-10 max-md:h-6 max-md:w-6 items-center justify-center flex rounded-full transition-all duration-500 z-20 stop-link ${product.wishlist ? 'bg-[#f25b21]' : 'bg-black/70 hover:bg-[#f25b21]'} text-white">
                                    <i class="fas fa-heart max-md:text-sm"></i>
                                </button>
                                <button class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                </button>
                                <input type="hidden" value="${product.id}" class="ProductId">
                            </div>
                            <div class="pt-4 w-full">
                                <h3 class="text-base max-md:text-sm font-semibold uppercase">${product.name}</h3>
                                <div class="flex items-center justify-start gap-3 w-full">
                                    <p class="text-gray-500 line-through text-sm">₹ ${formatNumber(product.compare_price)}.00</p>
                                    <p class="text-[#f25b21] font-bold">
                                    ₹ ${formatNumber(Math.floor(price))}.00
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>`;
        }


        // ✅ Render dynamic filter checkboxes
        function renderDynamicFilter(key, values) {
            const container = document.getElementById("filters-container");

            // Section wrapper
            const section = document.createElement("div");
            section.classList.add(
                "filter-section",
                // "mb-6",
                "p-4",
                "bg-white",
                "rounded-xl",
                "shadow-sm",
                "border",
                "border-gray-100",
                "transition-all",
                "hover:shadow-md"
            );

            // Filter title
            const title = document.createElement("h4");
            title.textContent = `Filter by ${key}`;
            title.classList.add(
                "font-semibold",
                "text-gray-800",
                "text-base",
                "text-nowrap",
                "mb-3",
                "border-b",
                "pb-2",
                "border-gray-200"
            );

            // Container for filter options
            const optionsContainer = document.createElement("div");
            optionsContainer.classList.add(
                // "flex",
                // "flex-wrap",
                "grid",
                "grid-cols-2",
                "text-nowrap",
                "gap-2"
            );

            values.forEach(val => {
                // Label wrapper for checkbox and text
                const label = document.createElement("label");
                label.classList.add(
                    "inline-flex",
                    "items-center",
                    "gap-2",
                    "px-3",
                    "py-1.5",
                    "border",
                    "rounded-full",
                    "cursor-pointer",
                    "text-sm",
                    "font-medium",
                    "bg-gray-50",
                    "border-gray-200",
                    "text-gray-700",
                    "hover:bg-orange-50",
                    "hover:border-orange-300",
                    "transition-all"
                );

                // Checkbox
                const input = document.createElement("input");
                input.type = "checkbox";
                input.dataset.key = key.toLowerCase();
                input.dataset.value = val.toLowerCase();
                input.value = val.toLowerCase();
                input.classList.add("filter-checkbox", "accent-[#f25b21]", "cursor-pointer");
                input.addEventListener("change", handleFilterChange);

                // Append elements
                label.appendChild(input);
                const span = document.createElement("span");
                span.textContent = val;
                label.appendChild(span);
                optionsContainer.appendChild(label);
            });

            section.appendChild(title);
            section.appendChild(optionsContainer);
            container.appendChild(section);
        }



        // ✅ Handle checkbox changes
        function handleFilterChange() {
            document.getElementById('clearFiltersBtn').classList.remove('hidden');

            const newFilters = {};
            document.querySelectorAll('.filter-checkbox:checked').forEach(cb => {
                const key = cb.dataset.key.toLowerCase(); // 👈 lowercase
                if (!newFilters[key]) newFilters[key] = [];
                newFilters[key].push(cb.dataset.value.toLowerCase()); // 👈 lowercase
            });

            activeFilters = newFilters;

            const priceRange = document.getElementById("priceRange");
            const min = parseInt(priceRange.min);
            const max = parseInt(priceRange.value);
            const sortValue = document.getElementById("sortSelect")?.value || "";

            setProducts(activeFilters, {
                min,
                max
            }, sortValue);
            setActiveFilter(activeFilters);
        }


        // ✅ Update price labels dynamically
        function updatePriceLabel(input) {
            document.getElementById("selectedPriceLabel").innerText = input.value;
            handleFilterChange();
        }



        // ✅ Show active filter tags
        function setActiveFilter(filters) {
            const activeFiltersContainer = document.getElementById('active-filters');
            let html = "";

            Object.entries(filters).forEach(([key, values]) => {
                values.forEach(value => {
                    html += `
                            <span class="flex items-center gap-1 px-2 py-1 bg-gray-100 rounded text-gray-700">
                                <span>${key.toUpperCase()}: ${value.toUpperCase()}</span>
                                <button class="text-gray-500 hover:text-black remove-filter" data-key="${key}" data-value="${value}">
                                    <i class="fa-solid fa-xmark text-xs"></i>
                                </button>
                            </span>`;
                });
            });

            activeFiltersContainer.innerHTML = html;

            document.querySelectorAll('.remove-filter').forEach(btn => {
                btn.addEventListener('click', e => {
                    const {
                        key,
                        value
                    } = e.currentTarget.dataset;

                    document.querySelectorAll(`.filter-checkbox[data-key="${key}"][data-value="${value}"]`)
                        .forEach(cb => cb.checked = false);

                    handleFilterChange();
                });

                hideClearFiltersBtn();
            });
        }

        function hideClearFiltersBtn() {
            let btns = document.querySelectorAll('.remove-filter');

            console.log(btns);
            if (btns.length == 0) {
                document.getElementById('clearFiltersBtn').classList.add('hidden');
            }
        }



        // ✅ Restore checkbox state after re-render
        function restoreCheckedFilters() {
            Object.entries(activeFilters).forEach(([key, values]) => {
                values.forEach(val => {
                    const checkbox = document.querySelector(`.filter-checkbox[data-key="${key}"][value="${val}"]`);
                    if (checkbox) checkbox.checked = true;
                });
            });
        }

        // ✅ Clear all filters
        document.getElementById('clearFiltersBtn').addEventListener('click', () => {
            document.querySelectorAll('.filter-checkbox').forEach(cb => cb.checked = false);

            const priceRange = document.getElementById("priceRange");
            priceRange.value = priceRange.max; // 👈 reset to max price
            document.getElementById("selectedPriceLabel").innerText = priceRange.value;

            activeFilters = {};
            document.getElementById('active-filters').innerHTML = "";

            const sortValue = document.getElementById("sortSelect")?.value || "";
            setProducts({}, {
                min: parseInt(priceRange.min),
                max: parseInt(priceRange.max)
            }, sortValue);

            document.getElementById('clearFiltersBtn').classList.add('hidden');
        });

        // ✅ Format price numbers
        function formatNumber(num) {
            return new Intl.NumberFormat("en-IN").format(num);
        }

        setProducts(); // Ensures DOM ready before setting labels
        // ✅ Initial load
        // document.addEventListener("DOMContentLoaded", () => {
        // });
    </script>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>