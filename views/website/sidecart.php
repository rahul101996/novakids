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
    <div class="flex-1 overflow-y-auto p-4 space-y-4">
        <div class="flex items-center gap-4 border-b pb-3">
            <img src="/public/images/111.avif" alt="Product" class="w-20 h-24 object-cover">
            <div class="flex-1">
                <h3 class="font-semibold text-base">The Great Manifestor Polo</h3>
                <p class="text-sm text-gray-500">Size: L</p>
                <p class="font-bold text-[#f25b21]">Rs. 1,199</p>
            </div>
            <button class="text-gray-500 hover:text-red-600">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </div>

    <!-- Footer -->
    <div class="p-4 border-t">
        <div class="flex justify-between font-bold text-lg mb-4">
            <span>Total</span>
            <span>Rs. 1,199</span>
        </div>
        <button class="w-full bg-black text-white py-2 rounded-lg hover:bg-[#f25b21] transition">Checkout</button>
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