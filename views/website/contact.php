<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <section class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold mb-2">Get in Touch with Nova Universe!</h2>
                <div class="w-16 h-[3px] bg-[#f25b21] mt-2 mx-auto"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    At Nova Universe, we value every interaction with our visitors, partners, and clients.
                    Whether you have a question, need support, want to collaborate, or just say hello, we’re here to
                    listen and assist.
                </p>
            </div>

            <!-- Form + Contact Info -->
            <div class="flex flex-col md:flex-row gap-12">

                <!-- Contact Form -->
                <div class="flex-1 bg-gray-50 p-8 rounded-xl shadow-md">
                    <h3 class="text-xl font-semibold mb-4">How can we help you today?</h3>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" placeholder="Your Name"
                                class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-1 focus:ring-black" />
                            <input type="email" placeholder="Your Email"
                                class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-1 focus:ring-black" />
                        </div>
                        <input type="tel" placeholder="Phone Number"
                            class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-1 focus:ring-black" />
                        <textarea placeholder="Your Message" rows="5"
                            class="border border-gray-300 rounded-md px-3 py-2 w-full focus:outline-none focus:ring-1 focus:ring-black"></textarea>

                        <button
                            class="relative w-full rounded-md overflow-hidden group border-2 border-black bg-transparent py-2 text-black font-bold text-base">
                            <span class="relative z-10 transition-colors duration-700 group-hover:text-white">Send
                                Message</span>
                            <span
                                class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0"></span>
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="flex-1 flex flex-col justify-center gap-6">

                    <!-- Address -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-black text-white text-xl flex-shrink-0">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 tracking-wide">Address</h3>
                            <p class="text-gray-700 mt-1">Mumbai</p>
                        </div>
                    </div>

                    <!-- Call Us -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-black text-white text-xl flex-shrink-0">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 tracking-wide">Call Us</h3>
                            <p class="text-gray-700 mt-1">+1 (814) 251-9966</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-black text-white text-xl flex-shrink-0">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 tracking-wide">Email</h3>
                            <p class="text-gray-700 mt-1">info@example.com</p>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-black text-white text-xl flex-shrink-0">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 tracking-wide">Follow Us</h3>
                            <div class="flex space-x-4 text-lg mt-2 text-gray-600">
                                <a href="#" class="hover:text-[#f25b21]"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="hover:text-[#f25b21]"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="hover:text-[#f25b21]"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="hover:text-[#f25b21]"><i class="fab fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>





    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>