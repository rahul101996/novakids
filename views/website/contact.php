<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>




    <style>
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(2deg);
            }
        }

        @keyframes parallax {
            0% {
                transform: translateY(0px);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .animate-slideInLeft {
            animation: slideInLeft 1s ease-out forwards;
        }

        .animate-slideInRight {
            animation: slideInRight 1s ease-out forwards;
        }

        .animate-scaleIn {
            animation: scaleIn 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .delay-100 {
            animation-delay: 0.1s;
            opacity: 0;
        }

        .delay-200 {
            animation-delay: 0.2s;
            opacity: 0;
        }

        .delay-300 {
            animation-delay: 0.3s;
            opacity: 0;
        }

        .delay-400 {
            animation-delay: 0.4s;
            opacity: 0;
        }

        .delay-500 {
            animation-delay: 0.5s;
            opacity: 0;
        }

        .delay-600 {
            animation-delay: 0.6s;
            opacity: 0;
        }

        .image-overlay {
            position: relative;
            overflow: hidden;
        }

        .image-overlay::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3));
            transition: opacity 0.3s;
        }

        .image-overlay:hover::after {
            opacity: 0.5;
        }

        .diagonal-section {
            clip-path: polygon(0 5%, 100% 0, 100% 95%, 0 100%);
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: #000;
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        input,
        textarea {
            transition: all 0.3s ease;
        }

        .btn-hover {
            position: relative;
            overflow: hidden;
        }

        .btn-hover::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-hover:hover::before {
            width: 300px;
            height: 300px;
        }

        .product-image {
            transition: transform 0.5s ease;
        }

        .product-image:hover {
            transform: scale(1.05) rotate(2deg);
        }
    </style>

    
    <div class="relative py-10 px-6 bg-gray-100 overflow-hidden">

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center animate-scaleIn">
                <div class="inline-block mb-4 px-6 py-2 bg-black text-white text-xs font-bold tracking-widest rounded-full">
                    LET'S CONNECT
                </div>
                <h1 class="text-6xl md:text-8xl font-black mb-6 tracking-tighter leading-none">
                    Get In Touch

                </h1>
                <p class="text-gray-600 text-lg md:text-xl max-w-2xl mx-auto font-light">
                    Questions about our collection? Want to collaborate?<br />We're here to help bring your style vision to life.
                </p>
            </div>
        </div>
    </div>

    <!-- <div class="w-full h-px bg-gradient-to-r from-transparent via-black to-transparent"></div> -->

    <div class="w-full bg-gray-100 flex flex-col sm:flex-row items-center justify-center gap-24 py-6 ">

        <!-- Address -->
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 flex items-center justify-center rounded-full bg-black text-white text-2xl mb-3 shadow-lg">
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <p class="text-gray-700 font-medium">123 Main Street City, Country</p>
        </div>

        <!-- Call -->
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 flex items-center justify-center rounded-full bg-black text-white text-2xl mb-3 shadow-lg">
                <i class="fa-solid fa-phone"></i>
            </div>
            <p class="text-gray-700 font-medium">+1 (555) 000-0000</p>
        </div>

        <!-- Email -->
        <div class="flex flex-col items-center text-center">
            <div class="w-16 h-16 flex items-center justify-center rounded-full bg-black text-white text-2xl mb-3 shadow-lg">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <p class="text-gray-700 font-medium">info@example.com</p>
        </div>
    </div>





    
    <div class="w-[85%] mx-auto  py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

          
            <div class=" space-y-6">

               
                <div class="animate-slideInLeft delay-100 image-overlay rounded-3xl overflow-hidden relative h-full  bg-gradient-to-br from-gray-900 to-gray-600">
                    <img src="/public/images/5.webp" alt="Product Image" class="w-full h-full object-cover rounded-3xl">
                </div>


                
                <!-- <div class="grid grid-cols-2 gap-6">
                    <div class="animate-slideInLeft delay-200 image-overlay rounded-3xl h-64 bg-gradient-to-br from-gray-700 to-gray-500 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <img src="/public/images/5.webp" alt="">
                        </div>
                    </div>
                    <div class="animate-slideInLeft delay-300 image-overlay rounded-3xl h-64 bg-gradient-to-br from-gray-600 to-gray-800 relative overflow-hidden">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <img src="/public/images/5.webp" alt="">
                        </div>
                    </div>
                </div> -->
            </div>

            <div class=" space-y-6 ">

                
                <div class="animate-slideInRight delay-200 bg-white rounded-3xl px-12 py-8 max-md:px-0 max-md:py-0">
                    <h2 class="text-4xl font-black mb-8 tracking-tight uppercase">Send us a message</h2>

                    <div class="space-y-3">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-xs font-bold mb-3 uppercase tracking-wider text-gray-700">First Name</label>
                                <input type="text"
                                    class="w-full px-5 py-1 bg-white border-2 border-gray-200 rounded font-medium"
                                    placeholder="John">
                            </div>
                            <div>
                                <label class="block text-xs font-bold mb-3 uppercase tracking-wider text-gray-700">Last Name</label>
                                <input type="text"
                                    class="w-full  px-5 py-1 bg-white border-2 border-gray-200 rounded font-medium"
                                    placeholder="Doe">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold mb-3 uppercase tracking-wider text-gray-700">Email Address</label>
                            <input type="email"
                                class="w-full  px-5 py-1 bg-white border-2 border-gray-200 rounded font-medium"
                                placeholder="john@example.com">
                        </div>

                        <div>
                            <label class="block text-xs font-bold mb-3 uppercase tracking-wider text-gray-700">Phone Number</label>
                            <input type="tel"
                                class="w-full  px-5 py-1 bg-white border-2 border-gray-200 rounded font-medium"
                                placeholder="+1 (555) 000-0000">
                        </div>

                        <div>
                            <label class="block text-xs font-bold mb-3 uppercase tracking-wider text-gray-700">What can we help you with?</label>
                            <textarea
                                class="w-full  px-5 py-1 bg-white border-2 border-gray-200 rounded resize-none font-medium"
                                rows="4"
                                placeholder="Tell us about your inquiry..."></textarea>
                        </div>

                        <button
                            class="relative w-full uppercase rounded-md overflow-hidden group border-2 border-black bg-transparent py-2 text-black font-bold text-base">
                            <span class="relative z-10 transition-colors duration-700 group-hover:text-white">Send
                                Message</span>
                            <span
                                class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0"></span>
                        </button>
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