<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<style>

</style>

<body>

    <div class="min-h-screen">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
        <div class="w-full flex items-center justify-center  bg-[#272c6c]">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/marquee.php'; ?>
        </div>

        <div class="w-full flex flex-col items-center justify-center min-h-screen" style="background-color: transparent;
    background-image: linear-gradient(180deg, #D6D7F9 0%, #D6D7F900 100%);">
            <div class="w-full flex items-center justify-center py-16 max-lg:pt-5">

                <div class="w-[80%] gap-10 items-start justify-center flex ">
                    <div class="w-full flex items-start justify-start gap-5 max-lg:text-xs">
                        <a href="/">
                            <img src="/public/images/home-icon.png" class="h-6 max-lg:h-4" alt="">
                        </a>
                        <img src="/public/images/forward-black.png" class="h-6 max-lg:h-4" alt="">
                        <span>Contact</span>
                    </div>
                </div>
            </div>
            <div class="w-[80%]  items-center justify-center flex max-lg:flex-col max-lg:w-[85%] gap-10">
                <div class="w-full flex flex-col items-start justify-center">
                    <div class="bg-white py-2 px-7 rounded-full flex items-center justify-center gap-3 max-lg:text-xs">
                        <img src="/public/images/ok.png" class="h-10 max-lg:h-6" alt="">
                        <p>Keep In Touch With Us
                        </p>
                    </div>
                    <h1 class="text-5xl font-bold mt-10 max-lg:text-3xl max-lg:mt-5">
                        We would love to <br> hear from You.

                    </h1>
                    <span class="mt-7 text-gray-500">Connecting people with knowledge
                    </span>
                    <div class="w-full flex items-start justify-center mt-10 max-lg:flex-col max-lg:items-start gap-10">
                        <div class="w-full flex flex-col items-start justify-start">
                            <div class="w-full flex items-start justify-start gap-2">
                                <img src="/public/images/mail-black.png" class="h-6" alt=""> <span class="font-semibold">MAIL</span>
                            </div>

                            <div class="w-full flex items-center justify-center gap-3 mt-3">
                                <a href="mailto:contact@vikassawantacademy.com" class="w-full">info@vikassawantacademy.com
                                </a>
                            </div>
                        </div>
                        <div class="w-full flex flex-col items-start justify-start">
                            <div class="w-full flex items-start justify-start gap-2">
                                <img src="/public/images/phone-black.png" class="h-6" alt=""> <span class="font-semibold">PHONE</span>
                            </div>
                            <div class="w-full grid grid-cols-1 items-center justify-center gap-3 mt-3">
                                <a href="phone:8652221988" class="w-full">+91-8652221988

                                </a>
                                <a href="phone:9702146136" class="w-full">+91-9702146136

                                </a>
                                <a href="phone:918169099028" class="w-full">+91-8169099028

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex items-center flex-col justify-center mt-10">
                        <div class="w-full flex items-start justify-start gap-2">
                            <img src="/public/images/address-black.png" class="h-6" alt=""> <span class="font-semibold">ADDRESS</span>
                        </div>
                        <p class="mt-3 w-full">702/5 Shiv Amrut Dham Society, Yogidham Complex, Kalyan Murbad road, Kalyan West -421301.</p>

                    </div>
                </div>
                <div class="w-full flex flex-col items-end justify-end relative max-lg:mt-10">
                    <form action="/contact-mail" method="post" class="flex items-center justify-center flex-col gap-5 bg-[#030f40] text-white rounded-[4vh] w-[80%] max-lg:w-full max-lg:p-8 p-14 relative z-[5]">
                        <h2 class="w-full font-semibold text-xl">Questions or feedback?
                        </h2>
                        <input type="text" placeholder="Name" name="name" class="w-full border text-black border-gray-300 p-3 rounded-full outline-none">
                        <input type="text" placeholder="Example@gmail.com" name="email" class="w-full border text-black border-gray-300 p-3 rounded-full outline-none">
                        <textarea name="message" placeholder="Your Message" class="w-full border text-black border-gray-300 p-3 rounded-2xl outline-none h-[200px]" id=""></textarea>
                        <button class="w-full bg-yellow-400 text-black py-3 rounded-full">Send Message</button>
                    </form>
                    <div class="absolute top-14 left-0 ">
                        <img src="/public/images/Group-9790.png" alt="">
                    </div>
                    <div class="absolute bottom-20   left-0">
                        <img src="/public/images/vector-4.png" alt="">
                    </div>
                    <div class="absolute top-24 -right-5 z-[6]">
                        <img src="/public/images/vector-8.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-center mt-14">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1639.591583274616!2d73.15263470118222!3d19.24788940603705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be79420dafddd3b%3A0xfaf809414be9b2be!2sShiv%20Amrut%20Dham%20Co-operative%20Housing%20Society.!5e0!3m2!1sen!2sin!4v1752141447160!5m2!1sen!2sin" class="w-full h-[50vh]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</body>