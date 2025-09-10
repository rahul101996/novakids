<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black/50 opacity-0 pointer-events-none transition-opacity duration-500 z-40">
</div>

<!-- Side Cart -->
<div id="sideCart"
    class="fixed top-0 right-0 w-[35vw] h-full bg-white shadow-xl transform translate-x-full transition-transform duration-500 ease-in-out z-50 flex flex-col">

    <!-- Header -->
    <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-xl font-bold">Your Cart</h2>
        <!-- Close Button -->
        <button id="closeCart" class="text-gray-500 text-2xl hover:text-black animate-rotate-pingpong">
            <i class="fas fa-times"></i>
        </button>

        <!-- Add this style -->
        <style>
            @keyframes rotatePingPong {
                0% {
                    transform: rotate(0deg);
                }

                50% {
                    transform: rotate(45deg);
                }

                100% {
                    transform: rotate(0deg);
                }
            }

            .animate-rotate-pingpong {
                animation: rotatePingPong 2s ease-in-out infinite;
            }
        </style>

    </div>

    <!-- Cart Items -->
    <div class="flex-1 overflow-y-auto p-4 space-y-6">
        <!-- Free shipping message + progress bar -->
        <div>
            <p class="text-sm mb-2">
                Buy <span class="text-[#f25b21] font-bold">₹261.00</span> more to enjoy
                <span class="font-semibold">FREE Shipping</span>
            </p>
            <div class="relative w-full h-2 bg-gray-200 rounded-full mt-6">
                <!-- progress fill -->
                <div class="h-2 bg-[#f25b21] rounded-full" style="width: 42%;"></div>

                <!-- truck icon -->
                <div class="absolute -top-3" style="left: 42%;">
                    <span
                        class="flex items-center justify-center w-7 h-7 rounded-full border border-[#f25b21] bg-white">
                        <i class="fas fa-truck text-[#f25b21] text-sm"></i>
                    </span>
                </div>
            </div>

        </div>

        <!-- Cart item -->
        <div class="flex items-center gap-4 border-b py-4">
            <!-- Product image -->
            <img src="/public/images/111.avif" alt="Product" class="w-20 h-24 object-cover">

            <!-- Product details -->
            <div class="flex-1">
                <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                <p class="text-sm text-gray-500">Size: L</p>
                <p class="font-bold text-[#f25b21]">₹1,199</p>

                <!-- Quantity controls -->
                <div class="flex items-center mt-2">
                    <button class="px-3  border rounded-l hover:bg-gray-100">-</button>
                    <span class="px-4  border-t border-b">1</span>
                    <button class="px-3  border rounded-r hover:bg-gray-100">+</button>
                </div>
            </div>

            <!-- Delete button -->
            <button class="text-gray-500 hover:text-red-600">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </div>


    <!-- Footer -->
    <div class="p-4 border-t">
        <div class="flex justify-between font-bold text-xl mb-4">
            <span>Total</span>
            <span>₹1,199</span>
        </div>
        <div class="flex gap-6">
            <button
                class="relative w-full border-2 border-black py-2 rounded-lg overflow-hidden transition duration-300 group">
                <!-- Text -->
                <span
                    class="relative z-10 text-black font-semibold group-hover:text-white transition-colors duration-300">
                    View Cart
                </span>
                <!-- Animated BG -->
                <span
                    class="absolute inset-0 bg-black scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></span>
            </button>

            <button class="relative w-full font-semibold py-2 rounded-lg border-2 border-[#f25b21] overflow-hidden group">
                <!-- Text -->
                <span class="relative z-10 text-white group-hover:text-[#f25b21] transition-colors duration-300">
                    Checkout
                </span>
                <!-- Animated BG -->
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
    const overlay = document.getElementById('overlay');

    function openCart() {
        sideCart.classList.remove('translate-x-full');
        sideCart.classList.add('translate-x-0');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100');
    }

    function closeCartFn() {
        sideCart.classList.remove('translate-x-0');
        sideCart.classList.add('translate-x-full');
        overlay.classList.remove('opacity-100');
        overlay.classList.add('opacity-0', 'pointer-events-none');
    }

    openCartBtns.forEach(btn => btn.addEventListener('click', openCart));
    closeCart.addEventListener('click', closeCartFn);
    overlay.addEventListener('click', closeCartFn);
</script>