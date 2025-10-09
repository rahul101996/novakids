<?php

// $byCategory = str_replace('-', ' ', $category_name);
$byCategory = $category_name ?? 'new_arrivals';

?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <!-- Main Container -->
    <div class="w-full mx-auto">
        <div class="flex flex-col gap-6 w-full">
            <div class="flex items-center justify-between border-b p-6 max-md:p-4 sticky top-16 h-fit bg-white z-40 w-full">
                <div class="flex items-center justify-between w-[90vw] mx-auto">
                    <div class="flex max-md:flex-col items-start gap-4 text-sm">
                        <button id="filterToggle"
                            class="flex items-center gap-2 px-3 py-1 border rounded hover:bg-gray-100">
                            <i id="filterIcon" class="fa-solid fa-sliders"></i> Filters
                        </button>
                        <div class="flex gap-2">
                            <button class="text-sm text-gray-600 hover:underline" id="clearFiltersBtn">Clear
                                Filters</button>
                            <!-- Active Filters (Dummy Data) -->
                            <div class="flex gap-2" id="active-filters">

                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 text-sm max-md:hidden">
                        <!-- Sorting -->
                        <select id="sortSelect" onchange="handleFilterChange()"
                            class="border rounded px-2 py-1 text-sm">
                            <option value="">Default Sorting</option>
                            <option value="lowToHigh">Price: Low to High</option>
                            <option value="highToLow">Price: High to Low</option>
                            <option value="newest">Newest</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Collapsible Filter Section -->
            <div id="filterPanel" class="hidden border-b pb-8 bg-white w-full">
                <div class="grid md:grid-cols-5 gap-10 text-sm w-[90vw] mx-auto">
                    <!-- Price -->
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

                    <!-- Categories -->
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

                    <!-- Size -->
                    <div>
                        <h4 class="font-semibold mb-2">Filter by Size</h4>
                        <div id="size-filters" class="flex flex-wrap gap-3 mb-6"></div>
                    </div>
                </div>
            </div>

            <!-- Products Section -->
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


        async function setProducts(selectedSizes = [], selectedPrice = {}, sortBy = "") {
            const productsContainer = document.getElementById("product-grid");
            const sizeFilterContainer = document.getElementById("size-filters");
            const priceRange = document.getElementById("priceRange");
            const minPriceLabel = document.getElementById("minPriceLabel");
            const selectedPriceLabel = document.getElementById("selectedPriceLabel");
            const maxPriceLabelText = document.getElementById("maxPriceLabelText");

            const cat = '<?= $byCategory ?>';

            const minPrice = (selectedPrice.min ?? parseInt(priceRange.min)) || 0;
            const maxPrice = (selectedPrice.max ?? parseInt(priceRange.value)) || 999999;

            const res = await fetch("/api/get-products/" + cat, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({
                    size: selectedSizes,
                    min_price: minPrice,
                    max_price: maxPrice
                })
            });

            const data = await res.json();
            if (!data.success || !data.data.length) {
                productsContainer.innerHTML = `<p class="col-span-full text-center text-gray-500">No products found</p>`;
                return;
            }

            // ✅ SORTING LOGIC
            let products = data.data;
            if (sortBy === "lowToHigh") {
                products.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
            } else if (sortBy === "highToLow") {
                products.sort((a, b) => parseFloat(b.price) - parseFloat(a.price));
            } else if (sortBy === "newest") {
                // Assuming you have a 'created_at' or 'date_added' field
                products.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
            }

            // Update price range only once
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

            const allSizes = new Set();
            products.forEach(p => {
                (p.variants || []).forEach(v => {
                    if (!v.options) return;
                    try {
                        let opts = v.options.trim();
                        if (opts.startsWith('"') && opts.endsWith('"')) opts = JSON.parse(opts);
                        const parsedOptions = JSON.parse(opts);
                        if (parsedOptions.Size) allSizes.add(parsedOptions.Size);
                    } catch (e) {
                        console.warn("Invalid variant options:", v.options);
                    }
                });
            });

            if (sizeFilterContainer.children.length === 0) {
                renderSizeFilters([...allSizes]);
            }

            // Render sorted products
            productsContainer.innerHTML = products.map(product => {
                const images = JSON.parse(product.product_images || "[]").reverse();
                const SecondImage = images[1] || images[0];
                const comparePrice = parseFloat(product.compare_price) || 0;
                const price = parseFloat(product.price) || 0;
                const discount = comparePrice > 0 ? Math.round(((comparePrice - price) / comparePrice) * 100) : 0;
                const name = product.name.replace(/ /g, "-").replace(/'/g, "");

                return `
            <a href="/products/product-details/${name}" class="block">
                <div class="group relative cursor-pointer transition overflow-hidden">
                    ${discount > 0 ? `<span class="absolute top-2 left-2 max-md:top-0 max-md:left-0 bg-[#f25b21] text-white text-xs max-md:text-[11px] px-2 py-1 max-md:px-1.5 max-md:py-0.5 z-20">SAVE ${discount}%</span>` : ""}
                    <div class="relative w-full h-[450px] max-md:h-[200px] overflow-hidden group">
                        <img src="/${images[0]}" alt="${product.name}"
                            class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">
                        <img src="/${SecondImage}" alt="${product.name} Hover"
                            class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                        <button class="addToWishlistBtn absolute top-2 right-3 h-10 w-10 max-md:h-6 max-md:w-6 flex items-center justify-center rounded-full transition-all duration-500 z-20 stop-link ${product.wishlist ? 'bg-[#f25b21]' : 'bg-black/70 hover:bg-[#f25b21]'} text-white">
                            <i class="fas fa-heart max-md:text-xs"></i>
                        </button>
                        <button class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                            <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                        </button>
                        <input type="hidden" value="${product.id}" class="ProductId">
                    </div>
                    <div class="pt-4 max-md:pt-2 w-full">
                        <h3 class="text-base max-md:text-sm font-semibold uppercase">${product.name}</h3>
                        <div class="flex items-center justify-start gap-3 w-full">
                            <p class="text-gray-500 line-through text-sm">₹ ${formatNumber(product.compare_price)}.00</p>
                            <p class="text-[#f25b21] font-bold">₹ ${formatNumber(product.price)}.00</p>
                        </div>
                    </div>
                </div>
            </a>`;
            }).join("");
        }

        function formatNumber(num) {
            return new Intl.NumberFormat("en-IN").format(num);
        }


        // Render size filters dynamically
        function renderSizeFilters(sizes) {
            const container = document.getElementById("size-filters");
            container.innerHTML = sizes.map(size => `
                                                        <label class="flex items-center gap-2 cursor-pointer">
                                                            <input type="checkbox" name="size[]" value="${size}" class="size-filter accent-[#f25b21]">
                                                            <span>${size}</span>
                                                        </label>
                                                    `).join("");

            document.querySelectorAll('.size-filter').forEach(cb => {
                cb.addEventListener('click', handleFilterChange);
            });
        }

        function handleFilterChange() {
            const selectedSizes = Array.from(document.querySelectorAll('.size-filter:checked'))
                .map(cb => cb.value);

            const priceRange = document.getElementById("priceRange");
            const min = parseInt(priceRange.min);
            const max = parseInt(priceRange.value);
            const sortValue = document.getElementById("sortSelect").value;

            console.log(selectedSizes);

            setProducts(selectedSizes, { min, max }, sortValue);

            if (selectedSizes.length > 0) {

                setActiveFilter(selectedSizes);
            }
        }

        // Update label while sliding
        function updatePriceLabel(input) {
            const value = input.value;
            document.getElementById("selectedPriceLabel").innerText = value;
            document.getElementById("maxPriceLabelText").innerText = value;

            handleFilterChange();
        }


        function setActiveFilter(filter) {
            const activeFilters = document.getElementById('active-filters');

            let html = "";
            for (let i = 0; i < filter.length; i++) {
                html += `
            <span class="flex items-center gap-1 px-2 py-1 bg-gray-100 rounded text-gray-700">
                <span>${filter[i]}</span>
                <button class="text-gray-500 hover:text-black remove-filter" data-size="${filter[i]}">
                    <i class="fa-solid fa-xmark text-xs"></i>
                </button>
            </span>
        `;
            }

            activeFilters.innerHTML = html;

            document.querySelectorAll('.remove-filter').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const sizeToRemove = e.currentTarget.dataset.size;
                    document.querySelectorAll(`.size-filter[value="${sizeToRemove}"]`).forEach(cb => cb.checked = false);
                    handleFilterChange();
                });
            });
        }

        document.getElementById('clearFiltersBtn').addEventListener('click', () => {
            // Uncheck all size checkboxes
            document.querySelectorAll('.size-filter').forEach(cb => cb.checked = false);

            // Reset price range
            const priceRange = document.getElementById("priceRange");
            priceRange.value = priceRange.max;
            document.getElementById("selectedPriceLabel").innerText = priceRange.value;
            document.getElementById("maxPriceLabelText").innerText = priceRange.value;

            // Clear active filter tags
            document.getElementById('active-filters').innerHTML = "";

            // Re-fetch products without filters
            const sortValue = document.getElementById("sortSelect").value;
            setProducts([], { min: parseInt(priceRange.min), max: parseInt(priceRange.max) }, sortValue);
        });



        // Initial load
        setProducts();
    </script>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>