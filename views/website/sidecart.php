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
</style>


<!-- Overlay -->
<div id="sidecartOverlay" class="fixed inset-0 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-500 z-40">
</div>

<!-- Side Cart -->
<div id="sideCart"
    class="fixed top-0 right-0 w-[32vw] max-md:w-full h-full bg-white shadow-xl transform translate-x-full transition-transform duration-500 ease-in-out z-50 flex flex-col">

    <!-- Header -->
    <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-xl font-bold">Your Cart</h2>
        <!-- Close Button -->
        <button id="closeCart" class="text-gray-500 text-2xl hover:text-black animate-rotate-pingpong">
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
                    <button id="qtyMinus" class="px-3 border rounded-l hover:bg-gray-100">-</button>
                    <span id="qtyDisplay" class="px-4 border-t border-b">1</span>
                    <button id="qtyPlus" class="px-3 border rounded-r hover:bg-gray-100">+</button>
                </div>
            </div>

            <!-- Delete button -->
            <button class="text-gray-500 hover:text-red-600">
                <i class="fas fa-trash"></i>
            </button>
        </div>
        <div class="flex items-center gap-4 border-b py-2">
            <!-- Product image -->
            <img src="/public/images/f5.webp" alt="Product" class="w-16 h-20 object-cover">

            <!-- Product details -->
            <div class="flex-1">
                <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                <p class="text-sm text-gray-500 flex gap-3">
                    <span>Size: L</span>
                    <span class="font-bold text-[#f25b21]">₹<span id="cartTotal">1199</span></span>
                </p>

                <!-- Quantity controls -->
                <div class="flex items-center mt-2">
                    <button id="qtyMinus" class="px-3 border rounded-l hover:bg-gray-100">-</button>
                    <span id="qtyDisplay" class="px-4 border-t border-b">1</span>
                    <button id="qtyPlus" class="px-3 border rounded-r hover:bg-gray-100">+</button>
                </div>
            </div>

            <!-- Delete button -->
            <button class="text-gray-500 hover:text-red-600">
                <i class="fas fa-trash"></i>
            </button>
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
                    <button
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
                    <button
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
            <span>₹1,199</span>
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

            <button
                class="relative w-full font-semibold py-1.5 rounded-md border-2 border-[#f25b21] overflow-hidden group">
                <span class="relative z-10 text-white group-hover:text-[#f25b21] transition-colors duration-300">
                    Checkout
                </span>
                <span
                    class="absolute inset-0 bg-[#f25b21] transition-transform duration-300 origin-left group-hover:scale-x-0 scale-x-100"></span>
            </button>

        </div>
    </div>
</div>

<script>
    const openCartBtns = document.querySelectorAll('.openCartBtn');
    const sideCart = document.getElementById('sideCart');
    const closeCart = document.getElementById('closeCart');
    const cartOverlay = document.getElementById('sidecartOverlay');

    function openCart() {
        sideCart.classList.remove('translate-x-full');
        sideCart.classList.add('translate-x-0');
        cartOverlay.classList.remove('opacity-0', 'pointer-events-none');
        cartOverlay.classList.add('opacity-100');
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
</script>