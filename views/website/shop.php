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
                <div class="flex items-center justify-between w-[90vw] mx-auto">
                    <div class="flex max-md:flex-col items-start gap-4 text-sm">
                        <button id="filterToggle"
                            class="flex items-center gap-2 px-3 py-1 border rounded hover:bg-gray-100">
                            <i id="filterIcon" class="fa-solid fa-sliders"></i> Filters
                        </button>
                        <div class="flex gap-2">
                            <button class="text-sm text-gray-600 hover:underline" id="clearFiltersBtn">Clear
                                Filters</button>
                            <div class="flex gap-2" id="active-filters">

                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 text-sm max-md:hidden">
                        <span class="text-gray-700 font-medium">Sort by:</span>
                        <select id="sortSelect" onchange="handleFilterChange()"
                            class="bg-white border border-gray-300 rounded-lg px-4 py-2.5 text-sm text-gray-700 font-medium shadow-sm hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all cursor-pointer appearance-none bg-[url('data:image/svg+xml;charset=UTF-8,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 24 24%27 fill=%27none%27 stroke=%27currentColor%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-linejoin=%27round%27%3e%3cpolyline points=%276 9 12 15 18 9%27%3e%3c/polyline%3e%3c/svg%3e')] bg-[length:20px] bg-[right_0.5rem_center] bg-no-repeat pr-10">
                            <option value="">Default Sorting</option>
                            <option value="lowToHigh">Price: Low to High</option>
                            <option value="highToLow">Price: High to Low</option>
                            <option value="newest">Newest</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="filterPanel" class="hidden border-b pb-8 bg-white w-full">
                <div class="grid md:grid-cols-5 gap-10 text-sm w-[90vw] mx-auto">
                    <div>
                        <h4 class="font-semibold mb-2">Filter by Price</h4>

                        <div class="flex items-center gap-3">
                            <span>₹<span id="minPriceLabel">0</span></span>
                            <input id="priceRange" type="range" min="0" max="0" step="100" value="0"
                                class="w-full accent-[#f25b21]" oninput="updatePriceLabel(this)">
                            <span>₹<span id="selectedPriceLabel">0</span></span>
                        </div>

                        <p class="text-gray-600 mt-2 text-sm">
                            Showing products up to ₹<span id="maxPriceLabelText">0</span>
                        </p>

                    </div>

                    <div>
                        <h4 class="font-semibold mb-2">Product Categories</h4>
                        <ul class="space-y-2">
                            <li>
                                <label><input type="radio" onclick="window.location.href='/new-arrivals'"
                                        <?= $byCategory == 'new_arrivals' ? 'checked' : '' ?> name="category"
                                        class="mr-2 accent-[#f25b21]"> New Arrivals </label>
                            </li>
                            <li>
                                <label><input type="radio" onclick="window.location.href='/category/tees'"
                                        <?= $byCategory == 'tees' ? 'checked' : '' ?> name="category"
                                        class="mr-2 accent-[#f25b21]"> Tees / Relaxed
                                    Tees</label>
                            </li>
                            <li>
                                <label><input type="radio" onclick="window.location.href='/category/joggers'"
                                        <?= $byCategory == 'joggers' ? 'checked' : '' ?> name="category"
                                        class="mr-2 accent-[#f25b21]">Joggers</label>
                            </li>
                            <li>
                                <label><input type="radio" onclick="window.location.href='/category/co-ords'"
                                        <?= $byCategory == 'co-ords' ? 'checked' : '' ?> name="category"
                                        class="mr-2 accent-[#f25b21]">Co-ords</label>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <div id="filters-container" class="flex gap-3 mb-6"></div>
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
            const productsContainer = document.getElementById("product-grid");
            const FilterContainer = document.getElementById("filters-container");
            const priceRange = document.getElementById("priceRange");
            const minPriceLabel = document.getElementById("minPriceLabel");
            const selectedPriceLabel = document.getElementById("selectedPriceLabel");
            const maxPriceLabelText = document.getElementById("maxPriceLabelText");

            const cat = '<?= $byCategory ?>';
            const minPrice = (selectedPrice.min ?? parseInt(priceRange.min)) || 0;
            const maxPrice = (selectedPrice.max ?? parseInt(priceRange.value)) || 999999;

            // 🔥 Fetch products with filters
            const res = await fetch("/api/get-products/" + cat, {
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

            const data = await res.json();

            if (!data.success || !data.data.length) {
                productsContainer.innerHTML = `<p class="col-span-full text-center text-gray-500">No products found</p>`;
                return;
            }

            let products = data.data;

            // ✅ Sorting
            if (sortBy === "lowToHigh") products.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
            else if (sortBy === "highToLow") products.sort((a, b) => parseFloat(b.price) - parseFloat(a.price));
            else if (sortBy === "newest") products.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));

            // ✅ Price Range Initialization
            const prices = products.map(p => parseFloat(p.price));
            const minPriceValue = Math.floor(Math.min(...prices));
            const maxPriceValue = Math.ceil(Math.max(...prices));

            if (!priceRange.dataset.initialized) {
                priceRange.min = minPriceValue;
                priceRange.max = maxPriceValue;
                priceRange.value = selectedPrice.max ?? maxPriceValue;
                priceRange.dataset.initialized = "true";
            }

            minPriceLabel.innerText = priceRange.min;
            selectedPriceLabel.innerText = priceRange.value;
            maxPriceLabelText.innerText = priceRange.value;

            // ✅ Build and normalize filter options
            const allFilters = {};

            products.forEach(p => {
                (p.variants || []).forEach(v => {
                    if (!v.options) return;

                    try {
                        let opts = v.options.trim();
                        if (opts.startsWith('"') && opts.endsWith('"')) opts = JSON.parse(opts);
                        const parsedOptions = JSON.parse(opts);

                        Object.entries(parsedOptions).forEach(([key, value]) => {
                            // Normalize the key (so "Size" and "SIZE" are same)
                            const normalizedKey = key.trim().toLowerCase();

                            // Create filter group if not exists
                            if (!allFilters[normalizedKey]) {
                                allFilters[normalizedKey] = {
                                    label: key.charAt(0).toUpperCase() + key.slice(1).toLowerCase(),
                                    values: new Set()
                                };
                            }

                            allFilters[normalizedKey].values.add(value);
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

            console.log(activeFilters);
            AddToCart();
            AddToWishlist();


        }

        // ✅ Render single product HTML
        function renderProductHTML(product) {
            const images = JSON.parse(product.product_images || "[]").reverse();
            const SecondImage = images[1] || images[0];
            const comparePrice = parseFloat(product.compare_price) || 0;
            const price = parseFloat(product.price) || 0;
            const discount = comparePrice > 0 ? Math.round(((comparePrice - price) / comparePrice) * 100) : 0;
            const name = product.name.replace(/ /g, "-").replace(/'/g, "");

            return `
                    <a href="/products/product-details/${name}" class="block">
                        <div class="group relative cursor-pointer transition overflow-hidden">
                            ${discount > 0 ? `<span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">SAVE ${discount}%</span>` : ""}
                            <div class="relative w-full h-[450px] max-md:h-[250px] overflow-hidden group">
                                <img src="/${images[0]}" alt="${product.name}" class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">
                                <img src="/${SecondImage}" alt="${product.name} Hover" class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                                <button class="addToWishlistBtn absolute top-2 right-3 h-10 w-10 rounded-full transition-all duration-500 z-20 stop-link ${product.wishlist ? 'bg-[#f25b21]' : 'bg-black/70 hover:bg-[#f25b21]'} text-white">
                                    <i class="fas fa-heart"></i>
                                </button>
                                <button class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                </button>
                                <input type="hidden" value="${product.id}" class="ProductId">
                            </div>
                            <div class="pt-4 w-full">
                                <h3 class="text-base font-semibold uppercase">${product.name}</h3>
                                <div class="flex items-center justify-start gap-3 w-full">
                                    <p class="text-gray-500 line-through text-sm">₹ ${formatNumber(product.compare_price)}.00</p>
                                    <p class="text-[#f25b21] font-bold">₹ ${formatNumber(product.price)}.00</p>
                                </div>
                            </div>
                        </div>
                    </a>`;
        }


        // ✅ Render dynamic filter checkboxes
        function renderDynamicFilter(key, values) {
            const container = document.getElementById("filters-container");
            const section = document.createElement("div");
            section.classList.add("filter-section", "mb-3");

            const title = document.createElement("h4");
            title.textContent = `Filter by ${key}`;
            title.classList.add("font-semibold", "mb-2");

            const optionsContainer = document.createElement("div");
            values.forEach(val => {
                const label = document.createElement("label");
                label.classList.add("inline-flex", "items-center", "mr-2");

                const input = document.createElement("input");
                input.type = "checkbox";
                input.dataset.key = key;
                input.dataset.value = val.toUpperCase(); // normalized value for backend
                input.value = val; // display value
                input.classList.add("filter-checkbox", "mr-1", "accent-[#f25b21]");
                input.addEventListener("change", handleFilterChange);

                label.appendChild(input);
                label.appendChild(document.createTextNode(val));
                optionsContainer.appendChild(label);
            });

            section.appendChild(title);
            section.appendChild(optionsContainer);
            container.appendChild(section);
        }


        // ✅ Handle checkbox changes
        function handleFilterChange() {
            const newFilters = {};
            document.querySelectorAll('.filter-checkbox:checked').forEach(cb => {
                const key = cb.dataset.key.toUpperCase(); // normalize key
                if (!newFilters[key]) newFilters[key] = [];
                newFilters[key].push(cb.dataset.value.toUpperCase()); // already uppercase

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

            console.log(activeFilters);

        }

        // ✅ Update price labels dynamically
        function updatePriceLabel(input) {
            document.getElementById("selectedPriceLabel").innerText = input.value;
            document.getElementById("maxPriceLabelText").innerText = input.value;
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
                                <span>${key}: ${value}</span>
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
                    document.querySelectorAll(`.filter-checkbox[data-key="${key}"][value="${value}"]`)
                        .forEach(cb => cb.checked = false);
                    handleFilterChange();
                });
            });
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
            priceRange.value = priceRange.max;
            document.getElementById("selectedPriceLabel").innerText = priceRange.value;
            document.getElementById("maxPriceLabelText").innerText = priceRange.value;

            activeFilters = {};
            document.getElementById('active-filters').innerHTML = "";

            const sortValue = document.getElementById("sortSelect")?.value || "";
            setProducts({}, {
                min: parseInt(priceRange.min),
                max: parseInt(priceRange.max)
            }, sortValue);
        });

        // ✅ Format price numbers
        function formatNumber(num) {
            return new Intl.NumberFormat("en-IN").format(num);
        }

        // ✅ Initial load
        setProducts();
    </script>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>