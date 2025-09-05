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
        <div class="w-full flex items-center justify-center pt-16 max-lg:pt-5">

            <div class="w-[80%] gap-10 items-start justify-center flex ">
                <div class="w-full flex items-start justify-start gap-5 max-lg:text-xs">
                    <a href="/">
                        <img src="/public/images/home-icon.png" class="h-6 max-lg:h-4" alt="">
                    </a>
                    <img src="/public/images/forward-black.png" class="h-6 max-lg:h-4" alt="">
                    <span>Mission & Vision</span>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-center py-20 max-lg:py-10">
            <div class="w-[80%] flex items-start justify-center gap-[7vw] max-md:flex-col-reverse max-md:w-[85%] max-lg:w-[90%]">
                <div class="w-[50%] flex flex-col items-start justify-center gap-7 font-semibold max-lg:w-full">
                    <h2 class="text-5xl font-bold text-gray-800 max-lg:text-3xl">Mission And Vision
                    </h2>
                    <p class="text-gray-500"><b class="text-blue-500">We strongly believe that- ‘Ambitions are achieved by Persistent hard-work and Positive temperament which ensures Immense success’.</b> This belief comes from our vision to provide our students with the best possible knowledge and skills that are necessary to flourish in competitive exams.


                    </p>
                    <p class="text-gray-500 mt-2">
                        In today’s ever-increasing competitive nature of exams, if one aspires to succeed it is imperative to enhance one’s Aptitude and Verbal abilities. Our mission is to provide the best training and take our students to new heights of success.

                    </p>




                </div>
                <div class="w-[50%] flex flex-col items-center justify-center gap-10 max-lg:w-full">
                    <img src="/public/images/mission-vission-1.jpeg" class="rounded-3xl shadow w-full" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</body>