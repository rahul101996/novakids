<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <section class="bg-white grid grid-cols-1 md:grid-cols-5 w-full h-auto mx-auto">
        <div class="w-full h-[90vh] col-span-2">
            <img src="/public/images/contactbg.png" alt="" class="h-full">
        </div>

        <div class="w-full mx-auto text-center items-center justify-center flex flex-col col-span-2">
            <div class="w-full mx-auto text-center items-center justify-center flex flex-col">
                <!-- Heading -->
                <h2 class="text-3xl font-extrabold text-gray-900 mb-10 tracking-wide">
                    GET IN TOUCH
                    <div class="w-20 h-[3px] bg-[#f25b21] mt-3 mx-auto"></div>
                </h2>

                <!-- Contact Form -->
                <form class="space-y-8 w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="text-left">
                            <label class="block text-sm font-medium text-gray-700">Your Name</label>
                            <input type="text"
                                class="w-full border-b border-gray-400 focus:border-black outline-none py-2" />
                        </div>
                        <div class="text-left">
                            <label class="block text-sm font-medium text-gray-700">Your Email</label>
                            <input type="email"
                                class="w-full border-b border-gray-400 focus:border-black outline-none py-2" />
                        </div>
                    </div>

                    <div class="text-left">
                        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="text"
                            class="w-full border-b border-gray-400 focus:border-black outline-none py-2" />
                    </div>

                    <div class="text-left">
                        <label class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea rows="2"
                            class="w-full border-b border-gray-400 focus:border-black outline-none py-2"></textarea>
                    </div>

                    <button
                        class="flex relative mx-auto overflow-hidden group transform border-2 border-black bg-transparent text-black">
                        <span
                            class="relative z-10 flex py-2 px-6 items-center justify-center text-center mx-auto gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                            Send Message
                        </span>
                        <span
                            class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                        </span>
                    </button>
                </form>

            </div>
            <div class="w-full mx-auto flex items-center justify-center gap-12 text-center py-16">
                <!-- Call Us -->
                <div>
                    <div class="flex justify-center mb-3 group">
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-black">
                            <i class="fas fa-phone text-xl group-hover:text-white"></i>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-2 uppercase tracking-wide">Call Us</h3>
                    <p class="text-gray-900 font-medium">+1 (814) 251-9966</p>
                </div>

                <!-- Address -->
                <div>
                    <div class="flex justify-center mb-3 group">
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-black">
                            <i class="fas fa-map-marker-alt text-xl group-hover:text-white"></i>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-2 uppercase tracking-wide">Address</h3>
                    <p class="text-gray-900 font-medium">info@example.com</p>
                </div>

                <!-- Social Media -->
                <div>
                    <div class="flex justify-center mb-3 group">
                        <div
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-100 group-hover:bg-black">
                            <i class="fas fa-share-alt text-xl group-hover:text-white"></i>
                        </div>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-2 uppercase tracking-wide">Follow Us</h3>
                    <div class="flex justify-center space-x-5 mt-2 text-gray-600">
                        <a href="#" class="hover:text-black"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-black"><i class="fab fa-pinterest"></i></a>
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