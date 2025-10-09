<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>


    <div class="w-full flex items-center justify-center">
        <div class="w-full">
            <div class="grid md:grid-cols-2 gap-0">

                <!-- Left Side - Contact Info with Border -->
                <div class="bg-gray-50 p-8 md:p-12 relative shadow-lg">
                    <div class="relative z-10 w-[80%] mx-auto">
                        <h1 class="text-4xl md:text-6xl font-bold mb-6 text-gray-900">Contact Us</h1>
                        <p class="text-gray-600 mb-12 leading-relaxed text-sm w-3/4">
                            Have questions about our collections or need assistance? Reach out to us and our team will be happy to help!
                        </p>

                        <!-- Office Address -->
                        <div class="mb-8">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-map-marker-alt text-gray-400 mt-1"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1 text-sm">Head Office</h3>
                                    <p class="text-gray-600 text-sm">
                                        Nova Clothes HQ, 456 Fashion Ave, New York, NY 10018,<br>United States
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="mb-8">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-phone-alt text-gray-400 mt-1"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1 text-sm">Customer Care</h3>
                                    <p class="text-gray-600 text-sm">+1 (800) 555-0199</p>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-12">
                            <div class="flex items-start space-x-3">
                                <i class="fas fa-envelope text-gray-400 mt-1"></i>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1 text-sm">Email</h3>
                                    <p class="text-gray-600 text-sm">support@novaclothes.com</p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-4 text-sm">Follow us</h3>
                            <div class="flex space-x-3">
                                <a href="#" class="w-9 h-9 bg-orange-500 hover:bg-orange-600 rounded-full flex items-center justify-center transition-all duration-300">
                                    <i class="fab fa-x-twitter text-sm"></i>
                                </a>

                                <a href="#" class="w-9 h-9 bg-orange-500 hover:bg-orange-600 rounded-full flex items-center justify-center transition-all duration-300">
                                    <i class="fab fa-facebook-f text-sm"></i>
                                </a>

                                <a href="#" class="w-9 h-9 bg-orange-500 hover:bg-orange-600 rounded-full flex items-center justify-center transition-all duration-300">
                                    <i class="fab fa-instagram text-sm"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Background Image with Form Overlay -->
                <div class="relative shadow-lg">
                    <!-- Background Image -->
                    <div class="absolute inset-0 bg-cover bg-center bg-top"
                        style="background-image: url('/public/images/555.avif');">
                    </div>

                    <!-- Form Card -->
                    <div class="relative z-10 p-8 md:p-12 flex items-center justify-center min-h-full">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="bg-black/20 rounded-lg p-8 w-full max-w-md shadow-lg text-white text-xl">
                                <div>
                                    <!-- Name Fields -->
                                    <div class="mb-4">
                                        <label class="block font-medium mb-2">Name</label>
                                        <div class="grid grid-cols-2 gap-3">
                                            <input type="text" placeholder="First" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-gray-400 focus:border-gray-400 outline-none text-sm">
                                            <input type="text" placeholder="Last" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-gray-400 focus:border-gray-400 outline-none text-sm">
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-4">
                                        <label class="block font-medium mb-2">Email</label>
                                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-gray-400 focus:border-gray-400 outline-none text-sm">
                                    </div>

                                    <!-- Message -->
                                    <div class="mb-5">
                                        <label class="block font-medium mb-2">Message</label>
                                        <textarea rows="4" class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-gray-400 focus:border-gray-400 outline-none resize-none text-sm" placeholder="Your message..."></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <button
                                        class="relative w-full uppercase rounded-md overflow-hidden group border-2 border-white bg-transparent py-2 text-white font-bold text-base">
                                        <span class="relative z-10 transition-colors duration-700 group-hover:text-black">Send
                                            Message</span>
                                        <span
                                            class="absolute inset-0 bg-white -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>