<!-- Add this style -->
<style>
    @keyframes rotatePingPong {
        0% {
            transform: rotate(0deg);
        }

        50% {
            transform: rotate(90deg);
        }

        100% {
            transform: rotate(0deg);
        }
    }

    .animate-rotate-pingpong {
        animation: rotatePingPong 4s ease-in-out infinite;
    }

    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>


<!-- Overlay -->
<div id="sidecartOverlay" class="fixed inset-0 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-500 z-50">
</div>

<!-- Side Cart -->
<div id="sideCart"
    class="fixed top-0 right-0 w-[32vw] max-md:w-full h-full bg-white shadow-xl transform translate-x-full transition-transform duration-500 ease-in-out z-50 flex flex-col">
    <form action="/checkout-cart" class="w-full h-full overflow-y-scroll" method="post">
        <!-- Header -->
        <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-xl font-bold">Your Cart</h2>
            <!-- Close Button -->
            <button id="closeCart" onclick="closeCartFn()" type="button" class="text-gray-500 text-2xl hover:text-black animate-rotate-pingpong">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Cart Items -->
        <div class="flex-1 overflow-y-auto p-4">
            <!-- Free shipping message + progress bar -->
            <div id="shippingMessage" class="mb-4">
                <p id="remainingText" class="text-sm">
                    Buy <span id="remainingAmount" class="text-[#f25b21] font-semibold">₹261.00</span> more to enjoy
                    <span class="font-semibold">FREE Shipping</span>
                </p>
                <p id="congratsMessage" class="text-sm font-semibold text-green-600 hidden">
                    🎉 Congrats! You are eligible for FREE Shipping
                </p>
                <div class="relative w-[90%] h-2 bg-gray-200 rounded-full mt-6">
                    <!-- progress fill -->
                    <div id="progressBar" class="h-2 bg-[#f25b21] rounded-full" style="width: 0%;"></div>

                    <!-- truck icon -->
                    <div id="truckIcon" class="absolute -top-3" style="left: 0%;">
                        <span
                            class="flex items-center justify-center w-7 h-7 rounded-full border border-[#f25b21] bg-white">
                            <i class="fas fa-truck text-[#f25b21] text-sm"></i>
                        </span>
                    </div>
                </div>
            </div>


            <!-- Cart item -->
            <div class="flex items-start w-full justify-start flex-col" id="cartItems">
                <div class="flex items-center gap-4 border-b py-2">
                    <!-- Product image -->
                    <img src="/public/images/111.avif" alt="Product" class="w-16 h-20 object-cover">

                    <!-- Product details -->
                    <div class="flex-1">
                        <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                        <p class="text-sm text-gray-500 flex gap-3">
                            <span>Size: L</span>
                            <span class="font-bold text-[#f25b21]">₹<span id="cartTotal">1199</span></span>
                        </p>

                        <!-- Quantity controls -->
                        <div class="flex items-center mt-2">
                            <button id="qtyMinus" type="button" class="px-3 border rounded-l hover:bg-gray-100">-</button>
                            <span id="qtyDisplay" class="px-4 border-t border-b">1</span>
                            <button id="qtyPlus" type="button" class="px-3 border rounded-r hover:bg-gray-100">+</button>
                        </div>
                    </div>

                    <!-- Delete button -->
                    <button class="text-gray-500 hover:text-red-600" type="button">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>


            <div class="md:border-t md:border-gray-200 md:pt-3 md:mt-16">
                <p class="text-center mt-2 max-md:mt-5 mb-1">Don't Miss Out Of These😍!</p>

                <div class="grid grid-cols-1 gap-4 mb-2">
                    <div class="flex items-center gap-4 p-2 bg-gray-100 border border-gray-200">
                        <img src="/public/images/f11.webp" alt="Product" class="w-16 h-16 object-cover">
                        <div class="flex-1">
                            <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                            <p class="font-bold text-[#f25b21]">₹<span id="cartTotal">1199</span></p>
                        </div>
                        <button type="button"
                            class="relative inline-block text-sm px-2 py-1 rounded-md border border-[#f25b21] text-[#f25b21] font-semibold overflow-hidden group">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div>
                    <div class="flex items-center gap-4 p-2 bg-gray-100 border border-gray-200">
                        <img src="/public/images/f13.webp" alt="Product" class="w-16 h-16 object-cover">
                        <div class="flex-1">
                            <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                            <p class="font-bold text-[#f25b21]">₹<span id="cartTotal">1199</span></p>
                        </div>
                        <button type="button"
                            class="relative inline-block text-sm px-2 py-1 rounded-md border border-[#f25b21] text-[#f25b21] font-semibold overflow-hidden group">
                            <i class="fas fa-plus"></i> Add
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <div class="px-6 py-2 border-t">
            <div class="flex justify-between font-bold text-xl mb-2">
                <span>Total</span>
                <span id="All_Side_Total"></span>
            </div>
            <div class="flex gap-6">
                <!-- <button
                class="relative w-full border-2 border-black py-2 rounded-lg overflow-hidden transition duration-300 group">
                <span
                    class="relative z-10 text-black font-semibold group-hover:text-white transition-colors duration-300">
                    View Cart
                </span>
                <span
                    class="absolute inset-0 bg-black scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
            </button> -->
                <?php
                if (isset($_SESSION['userid']) && !empty($_SESSION['userid']) && $_SESSION['type'] == "User") {            ?>
                    <input type="hidden" name="myForm" id="">

                    <button  type="submit"
                        class="relative w-full font-semibold py-1.5 rounded-md border-2 border-[#f25b21] overflow-hidden group">
                        <span class="relative z-10 text-white group-hover:text-[#f25b21] transition-colors duration-700">
                            Checkout
                        </span>
                        <span
                            class="absolute inset-0 bg-[#f25b21] transition-transform duration-700 origin-left group-hover:scale-x-0 scale-x-100"></span>
                    </button>
                <?php
                } else {
                ?>
                    <button onclick="modal.classList.remove('hidden')" type="button"
                        class="relative w-full font-semibold py-1.5 rounded-md border-2 border-[#f25b21] overflow-hidden group">
                        <span class="relative z-10 text-white group-hover:text-[#f25b21] transition-colors duration-700">
                            Checkout
                        </span>
                        <span
                            class="absolute inset-0 bg-[#f25b21] transition-transform duration-700 origin-left group-hover:scale-x-0 scale-x-100"></span>
                    </button>
                <?php } ?>
            </div>
        </div>
    </form>
</div>
<div class="h-[100vh] w-[59%] z-[50] fixed top-0 right-0 w-full flex items-center justify-center transform translate-x-full transition-transform duration-[0.6s] ease-in-out" id="AddToCartSidebar">
    <div class="w-[47%] p-3 h-full overflow-y-scroll bg-gray-200 flex flex-col items-center justify-start no-scrollbar gap-3 transform translate-x-full transition-transform duration-[0.8s] ease-in-out" id="VarImg">
        <img src="https://www.bonkerscorner.com/cdn/shop/files/SlipstreamOversizedT-shirt_1_640x_crop_center.jpg?v=1754902583" alt="">
        <img src="https://www.bonkerscorner.com/cdn/shop/files/SlipstreamOversizedT-shirt_2_640x_crop_center.jpg?v=1754902583" alt="">
        <img src="https://www.bonkerscorner.com/cdn/shop/files/SlipstreamOversizedT-shirt_6_640x_crop_center.jpg?v=1754902583" alt="">
    </div>
    <div class="w-[53%] h-full overflow-y-scroll flex flex-col items-start justify-start z-10 bg-white" id="VarDetails">
        <div class="w-full flex items-center justify-between px-7 pt-7 ">
            <span class="uppercase ">SELECT OPTIONS</span>
            <button id="closeAddToCartSidebar" class="text-gray-500 text-2xl hover:text-black animate-rotate-pingpong" onclick="CloseVariant()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <span class="w-full h-[1px] bg-gray-200 my-5"></span>
        <div class="flex flex-col items-start justify-start w-full px-7">
            <h2 class="w-full text-[1.8rem] leading-[2rem] uppercase">Black Sporty Deconstructed Loose Pants</h2>
            <div class="flex items-center justify-center gap-3 mt-7">
                <span class="text-gray-300 text-xl line-through">Rs.1,499.00</span>
                <span class="text-[#33459c] text-xl">Rs.1,199.00</span>
                <span class="text-xs bg-[#33459c] text-white py-1 px-2 rounded-lg">SAVE 20%</span>

            </div>
            <p class=" text-xs text-gray-600 mt-1"><a href="" class="underline">shipping</a> calculated at checkout</p>
            <p class="text-xs mt-1">⭐⭐⭐⭐⭐ <span class="text-sm">31 reviews</span></p>
            <div class="w-full flex items-center justify-between mt-7 text-sm">
                <p>SIZE : M</p>
                <p class="flex gap-1 cursor-pointer"><svg class="icon icon-accordion color-foreground-" aria-hidden="true" focusable="false" role="presentation" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
                        <path d="M18.9836 5.32852L14.6715 1.01638L1.01638 14.6715L5.32852 18.9836L18.9836 5.32852ZM15.3902 0.297691C14.9933 -0.0992303 14.3497 -0.0992303 13.9528 0.297691L0.297691 13.9528C-0.0992301 14.3497 -0.0992305 14.9932 0.297691 15.3902L4.60983 19.7023C5.00675 20.0992 5.65029 20.0992 6.04721 19.7023L19.7023 6.04721C20.0992 5.65029 20.0992 5.00675 19.7023 4.60983L15.3902 0.297691Z" fill-rule="evenodd"></path>
                        <path d="M11.7863 2.67056C11.9848 2.4721 12.3065 2.4721 12.505 2.67056L14.4237 4.58927C14.6222 4.78774 14.6222 5.1095 14.4237 5.30796C14.2252 5.50642 13.9035 5.50642 13.705 5.30796L11.7863 3.38925C11.5878 3.19079 11.5878 2.86902 11.7863 2.67056Z"></path>
                        <path d="M8.93891 5.36331C9.13737 5.16485 9.45914 5.16485 9.6576 5.36331L11.5763 7.28202C11.7748 7.48048 11.7748 7.80225 11.5763 8.00071C11.3779 8.19917 11.0561 8.19917 10.8576 8.00071L8.93891 6.082C8.74045 5.88354 8.74045 5.56177 8.93891 5.36331Z"></path>
                        <path d="M6.24307 8.20742C6.44153 8.00896 6.76329 8.00896 6.96175 8.20742L8.88047 10.1261C9.07893 10.3246 9.07893 10.6464 8.88047 10.8448C8.68201 11.0433 8.36024 11.0433 8.16178 10.8448L6.24307 8.92611C6.0446 8.72765 6.0446 8.40588 6.24307 8.20742Z"></path>
                        <path d="M3.37296 10.8776C3.57142 10.6791 3.89319 10.6791 4.09165 10.8776L6.01036 12.7963C6.20882 12.9948 6.20882 13.3165 6.01036 13.515C5.8119 13.7134 5.49013 13.7134 5.29167 13.515L3.37296 11.5963C3.1745 11.3978 3.1745 11.076 3.37296 10.8776Z"></path>
                    </svg> Sizing guide</p>
            </div>
            <div class="w-full flex items-center justify-start mt-3 text-sm">
                <div class="border border-gray-600 flex items-center justify-center h-12 w-12">XS</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">S</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">M</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">L</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">XL</div>
                <div class="border border-gray-200 flex items-center justify-center h-12 w-12">XXL</div>
            </div>
            <span class="mt-6 text-sm">COLOR :</span>
            <div class="w-full flex items-center justify-start mt-3 text-sm gap-2">
                <div class="border border-gray-600 p-1 flex items-center justify-center "><img src="https://www.bonkerscorner.com/cdn/shop/files/black-sporty-deconstructed-loose-pants-xs-bonkerscorner-store-34403286876260.jpg?v=1728981039" alt="" class="h-[83px] w-[58px]"></div>
                <div class=" flex items-center justify-center "><img src="https://www.bonkerscorner.com/cdn/shop/files/white-sporty-deconstructed-loose-pants-xs-bonkerscorner-store-34410824138852.jpg?v=1728981030" alt="" class="h-[83px] w-[58px]"></div>
                <div class=" flex items-center justify-center"><img src="https://www.bonkerscorner.com/cdn/shop/files/navy-blue-sporty-deconstructed-loose-pants-xs-bonkerscorner-store-34410889838692.jpg?v=1728983441" alt="" class="h-[83px] w-[58px]"></div>

            </div>
            <div class="w-full flex items-center justify-start mt-7 gap-3">
                <div class="w-[30%]  flex items-center justify-center gap-7 border border-gray-800 p-3 px-3 rounded-lg">
                    <span class="cursor-pointer ">-</span>
                    <span class="text-black">1</span>
                    <span class="cursor-pointer ">+</span>
                </div>
                <div class="w-[80%] border border-gray-800 p-3 px-3 rounded-lg text-center cursor-pointer font-semibold text-base">
                    ADD TO CART
                </div>
            </div>
            <div class="w-full items-center justify-center text-white text-center mt-3 bg-gray-900 p-3 px-3 rounded-lg cursor-pointer">
                BUY IT NOW
            </div>


        </div>
    </div>
</div>
<div id="sizeChartModal" class="hidden fixed inset-0 flex items-center justify-center bg-black/50 z-50">
    <div class="bg-white shadow-lg w-[65%] max-md:w-[90%] max-h-[80vh] relative flex flex-col animate-slideDown">
        <!-- Close button -->
        <button onclick="document.getElementById('sizeChartModal').classList.add('hidden')"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 animate-rotate-pingpong">
            <i class="fa-solid fa-xmark text-2xl"></i>
        </button>

        <!-- Header -->
        <div class="p-6 pb-2 flex-shrink-0">
            <h2 class="text-2xl max-md:text-lg font-bold mb-1">SIZE CHART</h2>
            <p class="text-sm text-gray-500">Reviews: Fits true to size</p>
        </div>

        <!-- Scrollable body -->
        <div class="p-6 pt-0 overflow-y-auto flex-1">
            <!-- Measuring unit toggle (hidden for now) -->
            <div class="flex items-center gap-2 mb-6">
                <span class="text-gray-700 font-medium">Measuring Unit :</span>
                <span>Inches</span>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-center text-gray-700">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-3">Size</th>
                            <th class="p-3">Chest</th>
                            <th class="p-3">Length</th>
                            <th class="p-3">Sleeve</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="p-3">S</td>
                            <td class="p-3">36</td>
                            <td class="p-3">27</td>
                            <td class="p-3">8</td>
                        </tr>
                        <tr class="border-t bg-gray-50">
                            <td class="p-3">M</td>
                            <td class="p-3">38</td>
                            <td class="p-3">28</td>
                            <td class="p-3">8.5</td>
                        </tr>
                        <tr class="border-t">
                            <td class="p-3">L</td>
                            <td class="p-3">40</td>
                            <td class="p-3">29</td>
                            <td class="p-3">9</td>
                        </tr>
                        <tr class="border-t bg-gray-50">
                            <td class="p-3">XL</td>
                            <td class="p-3">42</td>
                            <td class="p-3">30</td>
                            <td class="p-3">9.5</td>
                        </tr>
                        <tr class="border-t">
                            <td class="p-3">2XL</td>
                            <td class="p-3">44</td>
                            <td class="p-3">31</td>
                            <td class="p-3">10</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- How to Measure Section -->
            <div class="mt-8 border-t pt-6 flex flex-col md:flex-row items-center">
                <!-- Text -->
                <div class="w-full md:w-[60%]">
                    <h3 class="text-lg font-bold mb-4">HOW TO MEASURE?</h3>
                    <p class="mb-2"><span class="font-bold">CHEST</span> -
                        <span class="text-gray-600">Measure from the stitches below the armpits on one side to
                            another.</span>
                    </p>
                    <p><span class="font-bold">LENGTH</span> -
                        <span class="text-gray-600">Measure from where the shoulder seam meets the collar to the
                            hem.</span>
                    </p>
                    <p class="mb-2">
                        <span class="font-bold">SHOULDER</span> -
                        <span class="text-gray-600">Measure straight across the back, from one shoulder seam to the
                            other.</span>
                    </p>

                    <p class="mb-2">
                        <span class="font-bold">HALF SLEEVE</span> -
                        <span class="text-gray-600">Measure from the top of the shoulder seam to the end of the
                            short
                            sleeve.</span>
                    </p>

                    <p class="mb-2">
                        <span class="font-bold">3/4 SLEEVE</span> -
                        <span class="text-gray-600">Measure from the top of the shoulder seam to a point between the
                            elbow and wrist (mid-forearm).</span>
                    </p>

                    <p>
                        <span class="font-bold">FULL SLEEVE</span> -
                        <span class="text-gray-600">Measure from the shoulder seam down to the wrist.</span>
                    </p>
                </div>
                <!-- Image -->
                <div class="w-full md:w-[40%] flex justify-center">
                    <img src="/public/images/shirt-size.jpg" alt="How to measure T-shirt" class="h-72 max-md:h-64">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // const openCartBtns = document.querySelectorAll('.openCartBtn');
    const sideCart = document.getElementById('sideCart');
    const cartItems = document.getElementById('cartItems');
    const closeCart = document.getElementById('closeCart');
    const cartOverlay = document.getElementById('sidecartOverlay');

    async function openCart() {

        sideCart.classList.remove('translate-x-full');
        sideCart.classList.add('translate-x-0');
        cartOverlay.classList.remove('opacity-0', 'pointer-events-none');
        cartOverlay.classList.add('opacity-100');
        const request = await axios.post("/api/get-cart-data", new URLSearchParams({
            'getdata': 1
        }));
        // console.log(request.data)
        if (request.data.success) {
            cartItems.innerHTML = '';
            cartItems.innerHTML = request.data.cart_div;
            setTotal();
        }

    }

    function closeCartFn() {
        sideCart.classList.remove('translate-x-0');
        sideCart.classList.add('translate-x-full');
        cartOverlay.classList.remove('opacity-100');
        cartOverlay.classList.add('opacity-0', 'pointer-events-none');
    }

    openCartBtns.forEach(btn => btn.addEventListener('click', openCart));
    closeCart.addEventListener('click', closeCartFn);
    cartOverlay.addEventListener('click', closeCartFn);
</script>

<script>
    const targetFreeShipping = 1460; // Free shipping threshold
    const itemPrice = 1199; // Price of one item
    let quantity = 1; // default

    // Elements
    const progressBar = document.getElementById("progressBar");
    const truckIcon = document.getElementById("truckIcon");
    const remainingText = document.getElementById("remainingText");
    const remainingAmountEl = document.getElementById("remainingAmount");
    const congratsMessage = document.getElementById("congratsMessage");
    const qtyDisplay = document.getElementById("qtyDisplay");
    const cartTotalEl = document.getElementById("cartTotal");

    const qtyMinus = document.getElementById("qtyMinus");
    const qtyPlus = document.getElementById("qtyPlus");

    const GLOBAL_VARIANT = {
        variants : {},
        selected : {}
    };

    function updateCart() {
        const subtotal = itemPrice * quantity;
        const remaining = targetFreeShipping - subtotal;

        // Update total price
        cartTotalEl.textContent = subtotal.toLocaleString();

        // Calculate progress %
        let progress = (subtotal / targetFreeShipping) * 100;
        if (progress > 100) progress = 100;

        progressBar.style.width = progress + "%";
        truckIcon.style.left = progress + "%";

        if (remaining > 0) {
            congratsMessage.classList.add("hidden");
            remainingText.classList.remove("hidden");
            remainingAmountEl.textContent = "₹" + remaining.toLocaleString();
        } else {
            remainingText.classList.add("hidden");
            congratsMessage.classList.remove("hidden");
        }
    }

    // Quantity controls
    qtyMinus.addEventListener("click", () => {
        if (quantity > 1) {
            quantity--;
            qtyDisplay.textContent = quantity;
            updateCart();
        }
    });

    qtyPlus.addEventListener("click", () => {
        quantity++;
        qtyDisplay.textContent = quantity;
        updateCart();
    });

    updateCart(); // initial call
    const VariantSelects = document.getElementById('AddToCartSidebar');

    function CloseVariant() {

        let VarImg = document.getElementById('VarImg');

        setTimeout(() => {
            VariantSelects.classList.remove('translate-x-0');
            VariantSelects.classList.add('translate-x-full');
        }, 600);

        VarImg.classList.remove('translate-x-0');
        VarImg.classList.add('translate-x-full');

        cartOverlay.classList.remove('opacity-100');
        cartOverlay.classList.add('opacity-0', 'pointer-events-none');
    }


    function Openvariant() {
        let VarImg = document.getElementById('VarImg');

        VariantSelects.classList.remove('translate-x-full');
        VariantSelects.classList.add('translate-x-0');

        setTimeout(() => {
            VarImg.classList.remove('translate-x-full');
            VarImg.classList.add('translate-x-0');
        }, 600);

        cartOverlay.classList.remove('opacity-0', 'pointer-events-none');
        cartOverlay.classList.add('opacity-100');
    }
    document.addEventListener('DOMContentLoaded', function() {

        AddToCart();
    });

    function AddToCart() {

        const addToCartBtn = document.querySelectorAll('.openCartBtn');
        // console.log(addToCartBtn);
        if (addToCartBtn) {
            addToCartBtn.forEach(function(btn) {
                btn.addEventListener('click', async function(event) {
                    console.log("hello");
                    event.preventDefault();
                    event.stopPropagation();
                    // 
                    let ee = btn.parentElement
                    // showVarients(ee.querySelector(".ProductId").value);
                    // console.log(ee);
                    let product_id = parseInt(ee.querySelector(".ProductId").value);
                    const response = await axios.post("/api/get-product-data", new URLSearchParams({
                        productid: product_id,

                    }))
                    console.log(response.data)
                    GLOBAL_VARIANT.variants = response.data.variants;
                    let firstValues = {};
                    let dict = response.data.grouped
                    for (let key in dict) {
                        if (Array.isArray(dict[key]) && dict[key].length > 0) {
                            firstValues[key] = dict[key][0];
                        }
                    }

                    console.log(firstValues);
                    GLOBAL_VARIANT.selected = firstValues

                    if (response.data.variants.length > 0) {

                        // showVarientsSidebar(response.data.html);
                        // VariantSelects.innerHTML;
                        VariantSelects.innerHTML = response.data.html;
                        Openvariant()
                        let options = document.querySelectorAll('.optionDivs');

                        console.log("options",options);

                        let FirstOption = options[0];

                        // // console.log(FirstOption);
                        let OptionName = FirstOption.getAttribute('option_name');
                        let OptionValue = FirstOption.getAttribute('option_value');
                        let product_id = FirstOption.getAttribute('product_id');
                        console.log(OptionName, OptionValue, product_id);
                        const response2 = await axios.post("/api/get-variant-data", new URLSearchParams({
                            productid: product_id,
                            option_name: OptionName,
                            option_value: OptionValue

                        }))
                        // console.log("response2.data",response2.data)
                        const ColorDiv = document.getElementById('ColorDiv');
                        if (ColorDiv) {
                            ColorDiv.innerHTML = response2.data.html;

                        }


                    } else {



                    }

                    // addToCartSidebar(ee.querySelector(".sideVarientId").value, ee.querySelector(".sideCategoryId").value, ee.querySelector(".sideProductId").value, btn)


                });
            });
        }
    }

    function updateKey(dict, key, value) {
        let foundKey = Object.keys(dict).find(k => k.toLowerCase() === key.toLowerCase());
        if (foundKey) {
            dict[foundKey] = value; // update existing
        } else {
            dict[key] = value; // add new
        }
    }

    function changeSideVariant(ele,tp,value,key1){
        console.log("parent",ele.parentElement,key1)
        updateKey(GLOBAL_VARIANT.selected,tp,value);
        let divs = ele.parentElement.querySelectorAll("div")
        divs.forEach(div => {
        div.classList.remove("border-gray-900");
        });
        // console.log(divs[key1])
        divs[key1].classList.add("border-gray-900");
        console.log("GLOBAL_VARIANT",GLOBAL_VARIANT)
        
    }

    function AddToCartslider(btn, sidecart = false) {
        // 
        let ee = btn.parentElement
        // showVarients(ee.querySelector(".sideProductId").value)
        addToCartSidebar(ee.querySelector(".sideVarientId").value, ee.querySelector(".sideCategoryId").value, ee.querySelector(".sideProductId").value, btn, 1, sidecart)

    }

    async function addToCartSidebar(varient_id, category_id, product_id, ele, quantity = 1, sidecart = false) {

        if (sidecart) {
            quantity = parseInt(ele.parentElement.querySelector('.quantity').innerText);
        }
        // console.log("hello")
        const request = await axios.post("/api/add-to-cart", new URLSearchParams({
            varient_id: varient_id,
            category_id: category_id,
            product_id: product_id,
            quantity: quantity
        }));
        console.log(request.data)
        if (request.data.success) {
            // window.location.href="cart.php";?

            toastr.options = {
                "toastClass": "bg-pink-toast",
                "progressBar": true,
                "positionClass": "toast-bottom-right" // Add a custom class
            };

            toastr.success(request.data.message);
        }
        document.getElementById('cart-count').innerText = request.data.cart_count;
        if (sidecart) {
            CloseVariant();
            setTimeout(() => {
                openCart();
            }, 1000);

        } else {
            openCart();
        }


    }

    // function showVarientsSidebar(data) {
    //     // console.log(data);
        

    // }

    async function minusQuantity(ele, varient_id, category_id, product_id) {
        const row = ele.parentElement;
        const current = row.querySelector(".quantity");
        if (parseInt(current.innerText) > 1) {
            current.innerText = parseInt(current.innerText) - 1;
            await addToCartSidebar(varient_id, category_id, product_id, ele, -1)

        }
    }


    async function plusQuantity(ele, varient_id, category_id, product_id) {
        const row = ele.parentElement;
        const max = 10;
        const current = row.querySelector(".quantity");
        if (parseInt(current.innerText) < max) {
            current.innerText = parseInt(current.innerText) + 1;
            await addToCartSidebar(varient_id, category_id, product_id, ele)

        }
    }


    function minus(ele) {
        const row = ele.parentElement;
        const current = row.querySelector(".quantity");
        if (parseInt(current.innerText) > 1) {
            current.innerText = parseInt(current.innerText) - 1;
        }
    }

    function plus(ele) {
        const row = ele.parentElement;
        const max = 10;
        const current = row.querySelector(".quantity");
        if (parseInt(current.innerText) < max) {
            current.innerText = parseInt(current.innerText) + 1;
        }
    }


    async function deleteCart(ele, cartid) {
        const response = await axios.post("/api/delete-cart", new URLSearchParams({
            cartid: cartid,
            "deleteMe": ""
        }))
        // console.log(response.data)
        if (response.data.success) {
            // console.log(ele, ele.parentElement)
            ele.parentElement.remove();

            toastr.options = {
                "toastClass": "bg-pink-toast",
                "progressBar": true,
                "positionClass": "toast-bottom-right" // Position the toast at the bottom right
            };

            toastr.success("Product removed from Cart");

            openCart();
            document.getElementById('cart-count').innerText = response.data.totalcart;
            // document.getElementById("myTbody").removeChild
        }
    }

    function setTotal() {
        // console.log("grande")
        const totalarray = sideCart.querySelectorAll(".total")
        // console.log(totalarray)
        let total = 0;

        totalarray.forEach(element => {
            let amount = element.innerText
            amount = amount.replace('<?= $currency ?>', '')
            total += parseInt(amount)
        });

        document.getElementById("All_Side_Total").innerText = '<?= $currency ?>' + total
        return total
    }
</script>