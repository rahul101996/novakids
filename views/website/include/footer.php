<style>
    /* Newsletter Input Animation */
    .newsletter-input {
        position: relative;
        transition: all 0.3s ease;
        background: #fff;
        color: #000;
    }

    .newsletter-input:focus {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        outline: none;
        border-color: #000;
    }

    /* Link Hover Effects */
    .link-hover {
        position: relative;
        transition: all 0.3s ease;
        display: inline-block;
    }

    .link-hover::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: #f25b21;
        transition: width 0.3s ease;
    }

    .link-hover:hover::after {
        width: 100%;
    }

    .link-hover:hover {
        color: #fff;
        transform: translateX(5px);
    }

    /* Payment Method Hover */
    .payment-icon {
        transition: all 0.3s ease;
    }

    .payment-icon:hover {
        transform: translateY(-3px) rotate(5deg);
        /* background: #ffffff22; */
        color: white !important;
    }

    /* Trust Badge Animation */
    .trust-badge {
        transition: all 0.3s ease;
    }

    .trust-badge:hover {
        transform: scale(1.05);
        color: #fff;
    }

    /* Footer colors */
    footer {
        background-color: #ffffffff;
        color: #000000ff;
    }

    footer a,
    footer p,
    footer span,
    footer i {
        color: #000000ff !important;
    }
</style>

<!-- Tailwind Animations -->
<style>
    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .animate-spin-slow {
        animation: spin-slow 20s linear infinite;
    }
</style>



<div class="relative bg-black py-8 max-md:py-4 overflow-hidden w-full">
    <div
        class="max-w-4xl mx-auto md:px-6 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-6">

        <!-- Text -->
        <div class="flex-1 text-center md:text-left">
            <h3 class="text-lg md:text-3xl font-semibold text-white mb-2">
                Stay in the Loop!
            </h3>
            <p class="text-gray-300 text-sm md:text-base">
                Get exclusive drops & vibes straight to your inbox.
            </p>
        </div>

        <!-- Form -->
        <div class="flex-1 flex space-x-2 md:space-x-4">
            <input type="email" placeholder="Your email"
                class="flex-1 px-4 py-2 max-md:py-1.5 rounded-md border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition-all text-sm" />
            <a href="#"
                class="relative bg-white inline-block px-6 py-2 max-md:py-1 max-md:px-4 rounded-md border border-white text-black group-hover:text-white font-semibold overflow-hidden group">
                <span class="relative z-10 transition-colors duration-700 group-hover:text-white">
                    Subscribe
                </span>
                <span
                    class="absolute inset-0 bg-black transform scale-x-0 origin-left transition-transform duration-700 group-hover:scale-x-100"></span>
            </a>
        </div>

    </div>
</div>

<footer class="w-full overflow-hidden">
    <div class="w-[90vw] mx-auto py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 max-md:gap-6">
            <!-- Brand Section -->
            <div class="lg:col-span-2">
                <div class="mb-6">
                    <div class="flex items-center gap-2">
                        <img src="/public/logos/novafav_png.png" alt="Brand Logo" class="w-auto h-10 rounded-md object-cover mb-4">
                        <img src="/public/logos/nova_logo-brnd-name.png" alt="Brand Logo" class="w-auto h-10 rounded-md object-cover mb-4">
                    </div>


                    <p class="text-gray-600 max-w-sm leading-relaxed">
                        Authentic streetwear for the next generation. Quality pieces that speak your language and
                        match your vibe.
                    </p>
                </div>

                <div class="text-gray-600 space-y-2 mb-6">
                    <p class="flex items-center"><i class="fas fa-envelope mr-3"></i> support@novauniverse.com</p>
                    <p class="flex items-center"><i class="fab fa-whatsapp mr-3"></i> +1 1234567890</p>
                </div>

                <div class="flex space-x-4 justify-start ">
                    <!-- Instagram -->
                    <a href="#"
                        class="group relative w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                        <i class="fab fa-instagram text-black text-sm md:text-xl"></i>
                        <span
                            class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                    </a>

                    <a href="#"
                        class="group relative w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                        <i class="fab fa-facebook-f text-black text-sm md:text-xl"></i>
                        <span
                            class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                    </a>

                    <!-- YouTube -->
                    <a href="#"
                        class="group relative w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                        <i class="fab fa-youtube text-black text-sm md:text-xl"></i>
                        <span
                            class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                    </a>

                    <!-- Discord -->
                    <a href="#"
                        class="group relative w-8 h-8 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                        <i class="fab fa-discord text-black text-sm md:text-xl"></i>
                        <span
                            class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="font-bold text-black mb-6 max-md:mb-2 text-lg">Shop</h4>
                <ul class="space-y-3 max-md:space-y-2">
                    <li><a href="/new-arrivals" class="link-hover">NEW ARRIVALS</a></li>
                    <?php
                    foreach ($categories as $key => $value) {
                        $category = strtolower(str_replace(" ", "-", $value['category']));
                    ?>
                        <li><a href="/category/<?= $category ?>" class="link-hover"><?= $value['category'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-black mb-6 max-md:mb-2 text-lg">Customer Care</h4>
                <ul class="space-y-3 max-md:space-y-2">
                    <li><a href="/size-guide" class="link-hover text-gray-600">Size Guide</a></li>
                    <li><a href="/shipping-info" class="link-hover text-gray-600">Shipping Info</a></li>
                    <li><a href="/return-exchange" class="link-hover text-gray-600">Returns & Exchanges</a>
                    </li>
                    <li><a href="/contact" class="link-hover text-gray-600">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-black mb-6 max-md:mb-2 text-lg">About</h4>
                <ul class="space-y-3 max-md:space-y-2 mb-6">
                    <li><a href="/about" class="link-hover text-gray-600">Our Story</a></li>
                    <!-- <li><a href="#" class="link-hover text-gray-600">Brand Partners</a></li> -->
                    <li><a href="#" class="link-hover text-gray-600">Client Reviews</a></li>
                </ul>

                <!-- Trust Badges -->
                <div class="space-y-3 max-md:space-y-2">
                    <div class="trust-badge flex items-center text-sm text-gray-500 cursor-pointer">
                        <i class="fas fa-shield-alt mr-3 text-green-500"></i>
                        <span>Secure Payments</span>
                    </div>
                    <div class="trust-badge flex items-center text-sm text-gray-500 cursor-pointer">
                        <i class="fas fa-truck mr-3 text-blue-500"></i>
                        <span>Free Shipping Rs.2000+</span>
                    </div>
                    <div class="trust-badge flex items-center text-sm text-gray-500 cursor-pointer">
                        <i class="fas fa-undo mr-3 text-purple-500"></i>
                        <span>7-Day Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bottom Bar -->
    <div class="border-t border-gray-700 py-4">
        <div class="w-[90vw] mx-auto">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-6 max-md:space-y-3 lg:space-y-0">
                <!-- Copyright -->
                <div class="text-sm">© <?= date('Y') ?> Nova Universe. All rights reserved.</div>
                <!-- Payment Methods -->
                <div class="flex items-center space-x-4 hidden">
                    <span class="text-sm">We accept:</span>
                    <div class="flex space-x-3">
                        <div class="payment-icon rounded-md cursor-pointer">
                            <i class="fab fa-cc-visa text-xl"></i>
                        </div>
                        <div class="payment-icon rounded-md cursor-pointer">
                            <i class="fab fa-cc-mastercard text-xl"></i>
                        </div>
                        <div class="payment-icon rounded-md cursor-pointer">
                            <i class="fab fa-paypal text-xl"></i>
                        </div>
                        <div class="payment-icon rounded-md cursor-pointer">
                            <i class="fab fa-apple-pay text-xl"></i>
                        </div>
                    </div>
                </div>
                <!-- Legal Links -->
                <div class="flex max-md:flex-wrap max-md:text-center max-md:justify-center space-x-6 max-md:space-x-0 max-md:gap-2 text-sm">
                    <a href="/privacy-policy" class="link-hover">Privacy Policy</a>
                    <a href="/terms-and-conditions" class="link-hover">Terms and Conditions</a>
                    <a href="/cancellation-and-refunds" class="link-hover">Cancellation and Refunds</a>
                    <a href="/shipping-policy" class="link-hover">Shipping Policy</a>
                    <a href="/cookies" class="link-hover">Cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footerscript.php"; ?>