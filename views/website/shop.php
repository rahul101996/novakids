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

            <!-- Sidebar -->
            <aside class="md:col-span-1 bg-white rounded-xl shadow p-4 sticky top-20 h-fit hidden">
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold"> <i class="fa-solid fa-sliders pr-1"></i> Filters</h3>
                    <button class="text-sm text-blue-600 hover:underline">Clear All</button>
                </div>

                <!-- Accordion Filters -->
                <div class="space-y-5">
                    <!-- Category -->
                    <details open class="border-b pb-3">
                        <summary
                            class="flex justify-between items-center cursor-pointer font-medium text-gray-800 py-2">
                            Category
                            <span class="text-gray-500 text-sm">+</span>
                        </summary>
                        <ul class="space-y-2 text-sm text-gray-700 mt-2 max-h-40 overflow-y-auto">
                            <li><label class="flex items-center"><input type="checkbox" class="mr-2"> Activewear</label>
                            </li>
                            <li><label class="flex items-center"><input type="checkbox" class="mr-2"> Hoodies</label>
                            </li>
                            <li><label class="flex items-center"><input type="checkbox" class="mr-2"> Jackets</label>
                            </li>
                            <li><label class="flex items-center"><input type="checkbox" class="mr-2"> Co-ord
                                    Sets</label></li>
                            <li><label class="flex items-center"><input type="checkbox" class="mr-2"> Denim
                                    Jackets</label></li>
                            <li><button class="text-blue-600 text-sm">+ 24 more</button></li>
                        </ul>
                    </details>

                    <!-- Stock -->
                    <details class="border-b pb-3">
                        <summary
                            class="flex justify-between items-center cursor-pointer font-medium text-gray-800 py-2">
                            Stock Status
                            <span class="text-gray-500 text-sm">+</span>
                        </summary>
                        <ul class="space-y-2 text-sm text-gray-700 mt-2">
                            <li><label class="flex items-center"><input type="radio" name="stock" class="mr-2"> In
                                    Stock</label></li>
                            <li><label class="flex items-center"><input type="radio" name="stock" class="mr-2"> Out of
                                    Stock</label></li>
                        </ul>
                    </details>

                    <!-- Price -->
                    <details class="border-b pb-3">
                        <h4 class="font-semibold mb-2">Filter by Price</h4>
                        <input id="priceRangeInput" type="range" min="" max="" step="100" value="2000"
                            class="w-full accent-[#f25b21]" oninput="updatePriceLabel(this.value)">
                        <p class="text-gray-600 my-2">₹500 — ₹<span id="priceValuedev">2000</span></p>

                        <button type="button" onclick="applyFilters()" class="...">Apply Filters</button>
                    </details>

                    <!-- Size -->
                    <details class="border-b pb-3">
                        <summary
                            class="flex justify-between items-center cursor-pointer font-medium text-gray-800 py-2">
                            Size
                            <span class="text-gray-500 text-sm">+</span>
                        </summary>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-100 text-sm">08-09 Years</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-100 text-sm">09-10 Years</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-100 text-sm">10-11 Years</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-100 text-sm">11-12 Years</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-100 text-sm">12-13 Years</button>
                            <button class="px-3 py-1 border rounded-lg hover:bg-gray-100 text-sm">13-14 Years</button>
                        </div>
                    </details>

                    <!-- Color -->
                    <details class="border-b pb-3">
                        <summary
                            class="flex justify-between items-center cursor-pointer font-medium text-gray-800 py-2">
                            Color
                            <span class="text-gray-500 text-sm">+</span>
                        </summary>
                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="w-6 h-6 bg-black border cursor-pointer"></span>
                            <span class="w-6 h-6 bg-gray-500 border cursor-pointer"></span>
                            <span class="w-6 h-6 bg-blue-500 border cursor-pointer"></span>
                            <span class="w-6 h-6 bg-green-500 border cursor-pointer"></span>
                            <span class="w-6 h-6 bg-red-500 border cursor-pointer"></span>
                        </div>
                    </details>
                </div>

                <!-- Apply Button -->
                <button
                    class="relative w-full font-semibold py-2 rounded-lg border-2 border-black overflow-hidden group">
                    <!-- Text -->
                    <span class="relative z-10 text-white group-hover:text-black transition-colors duration-300">
                        Apply Filters
                    </span>
                    <!-- Animated BG -->
                    <span
                        class="absolute inset-0 bg-black transition-transform duration-300 origin-left group-hover:scale-x-0 scale-x-100"></span>
                </button>
            </aside>

            <!-- Top bar -->
            <div class="flex items-center justify-between border-b p-6 sticky top-16 h-fit bg-white z-40 w-full">
                <div class="flex items-center justify-between w-[90vw] mx-auto">
                    <div class="flex max-md:flex-col items-start gap-4 text-sm">
                        <button id="filterToggle"
                            class="flex items-center gap-2 px-3 py-1 border rounded hover:bg-gray-100">
                            <i id="filterIcon" class="fa-solid fa-sliders"></i> Filters
                        </button>
                        <div class="flex gap-2">
                            <button class="text-sm text-gray-600 hover:underline">Clear Filters</button>
                            <!-- Active Filters (Dummy Data) -->
                            <div class="flex gap-2">
                                <span class="flex items-center gap-1 px-2 py-1 bg-gray-100 rounded text-gray-700">
                                    M
                                    <button class="text-gray-500 hover:text-black">
                                        <i class="fa-solid fa-xmark text-xs"></i>
                                    </button>
                                </span>
                                <span class="flex items-center gap-1 px-2 py-1 bg-gray-100 rounded text-gray-700">
                                    Joggers
                                    <button class="text-gray-500 hover:text-black">
                                        <i class="fa-solid fa-xmark text-xs"></i>
                                    </button>
                                </span>
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
            <div id="filterPanel" class="hidden mb-6 border-b pb-8 bg-white w-full">
                <div class="grid md:grid-cols-5 gap-10 text-sm w-[90vw] mx-auto">
                    <!-- Price -->
                    <div>
                        <h4 class="font-semibold mb-2">Filter by Price</h4>
                        <input type="range" min="500" max="5000" step="100" value="2000"
                            class="w-full accent-[#f25b21]">
                        <p class="text-gray-600 my-2">₹500 — ₹5000</p>
                        <!-- Apply Button -->
                        <button type="button" onclick="setProducts()"
                            class="relative font-semibold py-1.5 px-6 rounded-md border-2 border-black overflow-hidden group">
                            <!-- Text -->
                            <span
                                class="relative z-10 text-white group-hover:text-black transition-colors duration-300">
                                Apply Filters
                            </span>
                            <!-- Animated BG -->
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


        async function setProducts(selectedSizes = [], priceRange = {}) {
            const productsContainer = document.getElementById("product-grid");
            const sizeFilterContainer = document.getElementById("size-filters");
            const cat = '<?= $byCategory ?>';

            // Fetch products from backend
            const res = await fetch("/api/get-products/" + cat, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    size: selectedSizes,
                    min_price: priceRange.min ?? 0,
                    max_price: priceRange.max ?? 999999
                })
            });

            const data = await res.json();
            console.log("Fetched Products:", data);

            if (!data.success || !data.data.length) {
                productsContainer.innerHTML = `<p class="col-span-full text-center text-gray-500">No products found</p>`;
                return;
            }

            // Determine dynamic min and max prices for the slider
            const prices = data.data.map(p => parseFloat(p.price));

            console.log(prices)

            const minPriceValue = Math.min(...prices);
            const maxPriceValue = Math.max(...prices);

            console.log(minPriceValue, maxPriceValue)

            // Update price slider dynamically
            const priceSlider = document.getElementById("priceRangeInput");
            // if (priceSlider) {
            priceSlider.min = minPriceValue;
            priceSlider.max = maxPriceValue;
            priceSlider.value = priceRange.max ?? maxPriceValue;
            document.getElementById("priceValuedev").textContent = priceSlider.value;
            // }

            // Collect unique sizes
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

            // Render sizes only once
            if (sizeFilterContainer.children.length === 0) {
                renderSizeFilters([...allSizes]);
            }

            // Render products
            let html = "";
            data.data.forEach(product => {
                const images = JSON.parse(product.product_images || "[]").reverse();
                const SecondImage = images[1] || images[0];
                const comparePrice = parseFloat(product.compare_price) || 0;
                const price = parseFloat(product.price) || 0;
                const discountAmount = comparePrice - price;
                const discountPercentage = comparePrice > 0 ?
                    Math.round((discountAmount / comparePrice) * 100) :
                    0;

                const name = product.name.replace(/ /g, "-").replace(/'/g, "");
                const inWishlist = !!product.wishlist_id;

                html += `
                        <a href="/products/product-details/${name}" class="block">
                            <div class="group relative cursor-pointer transition overflow-hidden">
                                ${discountPercentage > 0 ? `
                                <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                    SAVE ${discountPercentage}%
                                </span>` : ""}
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


                                    <button
                                        class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 
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
            });

            productsContainer.innerHTML = html;
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
            setProducts(selectedSizes);
        }

        function formatNumber(num) {
            return new Intl.NumberFormat("en-IN").format(num);
        }

        // Price filter handler
        function updatePriceLabel(value) {
            document.getElementById("priceValue").textContent = value;
        }

        function applyFilters() {
            const max = parseInt(document.getElementById("priceRange").value);
            const min = parseInt(document.getElementById("priceRange").min);

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