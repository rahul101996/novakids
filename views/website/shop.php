<?php

// $byCategory = str_replace('-', ' ', $category_name);
$byCategory = $category_name ?? 'tees';

?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <!-- Main Container -->
    <div class="w-full mx-auto">
        <div class="flex flex-col gap-6 w-full">

            <!-- Top bar -->
            <div class="flex items-center justify-between border-b p-6 sticky top-16 h-fit bg-white z-40 w-full">
                <div class="flex items-center justify-between w-[90vw] mx-auto">
                    <div class="flex max-md:flex-col items-start gap-4 text-sm">
                        <button id="filterToggle"
                            class="flex items-center gap-2 px-3 py-1 border rounded hover:bg-gray-100">
                            <i id="filterIcon" class="fa-solid fa-sliders"></i> Filters
                        </button>
                        <div class="flex gap-2">
                            <div class="flex gap-2">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 text-sm max-md:hidden">
                        <!-- Sorting -->
                        <select class="border rounded px-2 py-1 text-sm">
                            <option>Default Sorting</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest</option>
                        </select>

                        <!-- View options -->
                        <!-- <div class="flex gap-2 text-lg text-gray-500">
                        <i class="fa-solid fa-border-all cursor-pointer hover:text-black"></i>
                        <i class="fa-solid fa-list cursor-pointer hover:text-black"></i>
                        </div> -->

                        <!-- Show count -->
                        <!-- <select class="border rounded px-2 py-1 text-sm">
                        <option>Show 9</option>
                        <option>Show 12</option>
                        <option>Show 18</option>
                        <option>Show 24</option>
                        </select> -->
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

                        <button type="button" onclick="applyFilters()"
                            class="relative font-semibold py-1.5 px-6 rounded-md border-2 border-black overflow-hidden group mt-2">
                            <span
                                class="relative z-10 text-white group-hover:text-black transition-colors duration-300">
                                Apply Filters
                            </span>
                            <span
                                class="absolute inset-0 bg-black transition-transform duration-300 origin-left group-hover:scale-x-0 scale-x-100"></span>
                        </button>
                    </div>


                    <!-- Categories -->
                    <div>
                        <h4 class="font-semibold mb-2">Product Categories</h4>
                        <ul class="space-y-2">
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
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 max-md:gap-3" id="product-grid">

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


        async function setProducts(selectedSizes = [], selectedPrice = {}) {
            const productsContainer = document.getElementById("product-grid");
            const sizeFilterContainer = document.getElementById("size-filters");
            const priceRange = document.getElementById("priceRange");
            const minPriceLabel = document.getElementById("minPriceLabel");
            const selectedPriceLabel = document.getElementById("selectedPriceLabel");
            const maxPriceLabelText = document.getElementById("maxPriceLabelText");

            const cat = '<?= $byCategory ?>';

            // Default price range if not set
            const minPrice = (selectedPrice.min ?? parseInt(priceRange.min)) || 0;
            const maxPrice = (selectedPrice.max ?? parseInt(priceRange.value)) || 999999;


            // Fetch filtered products
            const res = await fetch("/api/get-products/" + cat, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    size: selectedSizes,
                    min_price: minPrice,
                    max_price: maxPrice
                })
            });

            const data = await res.json();
            console.log("Fetched Products:", data);

            if (!data.success || !data.data.length) {
                productsContainer.innerHTML = `<p class="col-span-full text-center text-gray-500">No products found</p>`;
                return;
            }

            // Dynamic min/max prices for slider initialization
            const prices = data.data.map(p => parseFloat(p.price));
            const minPriceValue = Math.floor(Math.min(...prices));
            const maxPriceValue = Math.ceil(Math.max(...prices));

            // Only initialize once
            if (!priceRange.dataset.initialized) {
                priceRange.min = minPriceValue;
                priceRange.max = maxPriceValue;
                priceRange.value = selectedPrice.max ?? maxPriceValue;
                priceRange.dataset.initialized = "true";
            }

            // Update price labels
            minPriceLabel.innerText = priceRange.min;
            selectedPriceLabel.innerText = priceRange.value;
            maxPriceLabelText.innerText = priceRange.value;

            // Collect all unique sizes
            const allSizes = new Set();
            data.data.forEach(p => {
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

            // Render size filters once
            if (sizeFilterContainer.children.length === 0) {
                renderSizeFilters([...allSizes]);
            }

            // Render product cards
            productsContainer.innerHTML = data.data.map(product => {
                const images = JSON.parse(product.product_images || "[]").reverse();
                const SecondImage = images[1] || images[0];
                const comparePrice = parseFloat(product.compare_price) || 0;
                const price = parseFloat(product.price) || 0;
                const discount = comparePrice > 0 ?
                    Math.round(((comparePrice - price) / comparePrice) * 100) :
                    0;

                const name = product.name.replace(/ /g, "-").replace(/'/g, "");

                return `
        <a href="/products/product-details/${name}" class="block">
            <div class="group relative cursor-pointer transition overflow-hidden">
                ${discount > 0 ? `<span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">SAVE ${discount}%</span>` : ""}
                <div class="relative w-full h-[450px] max-md:h-[250px] overflow-hidden group">
                    <img src="/${images[0]}" alt="${product.name}"
                        class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">
                    <img src="/${SecondImage}" alt="${product.name} Hover"
                        class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">
                    <button
                        class="
                            addToWishlistBtn absolute top-2 right-3 h-10 w-10 rounded-full transition-all duration-500 z-20 stop-link
                            ${product.wishlist ? 'bg-[#f25b21]' : 'bg-black/70 hover:bg-[#f25b21]'} 
                            text-white
                        ">
                        <i class="fas fa-heart"></i>
                    </button>
                    <button class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 
                        group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
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
            }).join("");
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

            // Apply both filters together
            setProducts(selectedSizes, {
                min,
                max
            });
        }

        function formatNumber(num) {
            return new Intl.NumberFormat("en-IN").format(num);
        }

        // Update label while sliding
        function updatePriceLabel(input) {
            const value = input.value;
            document.getElementById("selectedPriceLabel").innerText = value;
            document.getElementById("maxPriceLabelText").innerText = value;
        }

        // Apply filter manually (on button click)
        function applyFilters() {
            const priceRange = document.getElementById("priceRange");
            const min = parseInt(priceRange.min);
            const max = parseInt(priceRange.value);

            const selectedSizes = Array.from(document.querySelectorAll('.size-filter:checked'))
                .map(cb => cb.value);

            setProducts(selectedSizes, {
                min,
                max
            });
        }

        // Initial load
        setProducts();
    </script>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>