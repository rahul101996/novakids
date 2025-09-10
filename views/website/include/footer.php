<style>
    /* Floating Animation */
    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-5px);
        }
    }

    .float-animation {
        animation: float 3s ease-in-out infinite;
    }

    /* Gradient Text Animation */
    @keyframes gradient-shift {

        0%,
        100% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }
    }

    .gradient-text {
        background: linear-gradient(-45deg, #fff, #ccc, #fff, #999);
        background-size: 400% 400%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradient-shift 4s ease infinite;
    }

    /* Social Icon Hover Effects */
    .social-hover {
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .social-hover::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.6s;
    }

    .social-hover:hover::before {
        left: 100%;
    }

    .social-hover:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 10px 25px rgba(255, 255, 255, 0.15);
    }

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

    /* Subscribe Button Animation */
    .subscribe-btn {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .subscribe-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.6s;
    }

    .subscribe-btn:hover::before {
        left: 100%;
    }

    .subscribe-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
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
        background: #fff;
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

    /* Stagger Animation */
    .stagger-item {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.6s ease forwards;
    }

    .stagger-item:nth-child(1) {
        animation-delay: 0.1s;
    }

    .stagger-item:nth-child(2) {
        animation-delay: 0.2s;
    }

    .stagger-item:nth-child(3) {
        animation-delay: 0.3s;
    }

    .stagger-item:nth-child(4) {
        animation-delay: 0.4s;
    }

    .stagger-item:nth-child(5) {
        animation-delay: 0.5s;
    }

    .stagger-item:nth-child(6) {
        animation-delay: 0.6s;
    }

    .stagger-item:nth-child(7) {
        animation-delay: 0.7s;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Pulse Animation for Brand */
    .pulse-slow {
        animation: pulse-custom 4s ease-in-out infinite;
    }

    @keyframes pulse-custom {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.02);
        }
    }

    /* Background Pattern Animation */
    .bg-pattern {
        background-color: #d1d5db;
        /* Gray background */
        background-image: radial-gradient(circle at 20% 80%, rgba(0, 0, 0, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(0, 0, 0, 0.05) 0%, transparent 50%);
        animation: pattern-move 20s ease-in-out infinite;
    }

    @keyframes pattern-move {

        0%,
        100% {
            background-position: 0% 0%, 100% 100%;
        }

        50% {
            background-position: 100% 0%, 0% 100%;
        }
    }

    /* Footer colors */
    footer {
        background-color: #000;
        color: #fff;
    }

    footer a,
    footer p,
    footer span,
    footer i {
        color: #fff !important;
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

<section class="bg-gray-100 py-10">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">

        <!-- Complimentary Shipping -->
        <div class="flex flex-col items-center">
            <img src="/public/images/gif1.webp" alt="" class="h-24 w-24 mb-4">
            <p class="font-semibold text-gray-900">Complimentary Shipping</p>
        </div>

        <!-- Consciously Crafted -->
        <div class="flex flex-col items-center">
            <img src="/public/images/gif2.webp" alt="" class="h-24 w-24 mb-4">
            <p class="font-semibold text-gray-900">Consciously Crafted</p>
        </div>

        <!-- Quick Easy Returns -->
        <div class="flex flex-col items-center">
            <img src="/public/images/gif3.webp" alt="" class="h-24 w-24 mb-4">
            <p class="font-semibold text-gray-900">Quick Easy Returns</p>
        </div>

    </div>
</section>

<footer class="w-full overflow-hidden">
    <!-- Newsletter Section - Single Row Gen-Z Style -->
    <div class="relative bg-gray-900 py-12 overflow-hidden w-full">
        <div
            class="max-w-4xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-6">

            <!-- Text -->
            <div class="flex-1 text-center md:text-left">
                <h3 class="text-2xl md:text-3xl font-extrabold text-white mb-2">
                    Stay in the Loop!
                </h3>
                <p class="text-gray-300 text-sm md:text-base">
                    Get exclusive drops & vibes straight to your inbox.
                </p>
            </div>

            <!-- Form -->
            <div class="flex-1 flex space-x-2 md:space-x-4">
                <input type="email" placeholder="Your email"
                    class="flex-1 px-4 py-3 rounded-xl border border-gray-600 bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 transition-all text-sm" />
                <!-- <button
                    class="bg-gradient-to-r from-purple-500 to-orange-500 text-white font-bold px-6 py-3 rounded-xl shadow-md transform transition-transform hover:scale-105 hover:brightness-110 text-sm">
                    Subscribe
                </button> -->

                <button
                    class="bg-gradient-to-r from-[#57458f] to-[#bf5452] text-white font-bold px-6 py-3 rounded-lg shadow-md transform transition-transform hover:scale-105 hover:brightness-110 text-sm">
                    Subscribe
                </button>
            </div>

        </div>

        <!-- Floating Shapes -->
        <div class="absolute -top-6 -left-6 w-16 h-16 bg-pink-500 rounded-full opacity-25 animate-spin-slow"></div>
        <div class="absolute -bottom-12 -right-6 w-24 h-24 bg-purple-500 rounded-full opacity-15 animate-pulse"></div>
    </div>
    <!-- Main Footer Content (black background) -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12">
                <!-- Brand Section -->
                <div class="lg:col-span-2">
                    <div class="mb-6">
                        <div class="w-auto h-24 flex mb-4">
                            <img src="/public/logos/nova_logo2.png" alt="Brand Logo"
                                class="w-auto h-auto rounded-lg object-cover">
                        </div>
                        <p class="text-gray-600 max-w-sm  leading-relaxed">
                            Authentic streetwear for the next generation. Quality pieces that speak your language and
                            match your vibe.
                        </p>
                    </div>

                    <!-- Social Links -->
                    <!-- Social Icons - Gen-Z Style -->
                    <div class="flex space-x-4 justify-center md:justify-start mb-6">
                        <!-- Instagram -->
                        <a href="#"
                            class="group relative w-12 h-12 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                            <i class="fab fa-instagram text-white text-xl md:text-xl"></i>
                            <span
                                class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                        </a>

                        <!-- TikTok -->
                        <a href="#"
                            class="group relative w-12 h-12 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                            <i class="fab fa-facebook-f text-white text-xl md:text-xl"></i>
                            <span
                                class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                        </a>

                        <!-- YouTube -->
                        <a href="#"
                            class="group relative w-12 h-12 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                            <i class="fab fa-youtube text-white text-xl md:text-xl"></i>
                            <span
                                class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                        </a>

                        <!-- Discord -->
                        <a href="#"
                            class="group relative w-12 h-12 md:w-10 md:h-10 flex items-center justify-center rounded-full shadow-lg transform transition-transform hover:-translate-y-2 hover:scale-110">
                            <i class="fab fa-discord text-white text-xl md:text-xl"></i>
                            <span
                                class="absolute inset-0 rounded-full bg-white opacity-10 group-hover:opacity-20 transition-opacity"></span>
                        </a>
                    </div>


                    <!-- Contact Info -->
                    <div class="text-sm text-gray-600 space-y-2">
                        <p class="flex items-center"><i class="fas fa-envelope mr-3"></i> support@Nova Kids.com</p>
                        <p class="flex items-center"><i class="fab fa-whatsapp mr-3"></i> +1 (555) 123-4567</p>
                    </div>
                </div>

                <!-- Shop Links -->
                <div>
                    <h4 class="font-bold text-white mb-6 text-lg">Shop</h4>
                    <ul class="space-y-3">
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">New Arrivals</a></li>
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Bestsellers</a></li>
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">T-Shirts</a></li>
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Hoodies</a></li>
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Bottoms</a></li>
                    </ul>
                </div>

                <!-- Customer Care -->
                <div>
                    <h4 class="font-bold text-white mb-6 text-lg">Customer Care</h4>
                    <ul class="space-y-3">
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Size Guide</a></li>
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Shipping Info</a></li>
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Returns & Exchanges</a>
                        </li>
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">FAQ</a></li>
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Contact Us</a></li>
                    </ul>
                </div>

                <!-- About -->
                <div>
                    <h4 class="font-bold text-white mb-6 text-lg">About</h4>
                    <ul class="space-y-3 mb-6">
                        <!-- <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Our Story</a></li> -->
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Brand Partners</a></li>
                        <li class="stagger-item"><a href="#" class="link-hover text-gray-600">Client Reviews</a></li>
                    </ul>

                    <!-- Trust Badges -->
                    <div class="space-y-3">
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
    </div>

    <!-- Bottom Bar -->
    <div class="border-t border-gray-700 py-4">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row justify-between items-center space-y-6 lg:space-y-0">
                <!-- Copyright -->
                <div class="text-sm">© <?= date('Y') ?> Nova Kids. All rights reserved.</div>
                <!-- Payment Methods -->
                <div class="flex items-center space-x-4 hidden">
                    <span class="text-sm">We accept:</span>
                    <div class="flex space-x-3">
                        <div class="payment-icon rounded-lg cursor-pointer">
                            <i class="fab fa-cc-visa text-xl"></i>
                        </div>
                        <div class="payment-icon rounded-lg cursor-pointer">
                            <i class="fab fa-cc-mastercard text-xl"></i>
                        </div>
                        <div class="payment-icon rounded-lg cursor-pointer">
                            <i class="fab fa-paypal text-xl"></i>
                        </div>
                        <div class="payment-icon rounded-lg cursor-pointer">
                            <i class="fab fa-apple-pay text-xl"></i>
                        </div>
                    </div>
                </div>
                <!-- Legal Links -->
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="link-hover">Privacy Policy</a>
                    <a href="#" class="link-hover">Terms of Service</a>
                    <a href="#" class="link-hover">Cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footerscript.php"; ?>