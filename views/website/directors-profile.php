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
                <div class="w-full flex items-start justify-start gap-5 max-lg:text-xs max-lg:gap-2">
                    <a href="/">
                        <img src="/public/images/home-icon.png" class="h-6 max-lg:h-4" alt="">
                    </a>
                    <img src="/public/images/forward-black.png" class="h-6 max-lg:h-4" alt="">
                    <span>Director's Message</span>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-center py-20">
            <div class="w-[80%] flex items-start justify-center gap-[7vw] max-md:w-[85%] max-lg:w-[90%] max-lg:flex-col">
                <div class="w-[50%] flex flex-col items-center justify-center relative max-lg:w-full">
                    <div class="w-full flex relative items-center justify-center"> <img src="/public/images/vikas-sir.png" class="w-[55%]" alt="">
                        <img src="/public/images/profile-bg.png" class="absolute bottom-0 left-[50%] translate-x-[-50%] z-[-1] w-[70%]" alt="">
                    </div>
                    <h3 class="text-xl font-semibold mt-6">Mr. Vikas Sawant</h3>
                    <p class="text-blue-500 mt-2 font-semibold">(Founder &amp; CEO Of VSA)</p>
                </div>
                <div class="w-[50%] flex flex-col items-start justify-center gap-7 max-lg:w-full max-lg:mt-5 max-lg:items-center max-lg:text-center max-lg:gap-2">
                    <h2 class="text-5xl font-bold text-gray-800 max-lg:text-3xl">Director's Message

                    </h2>
                    <p class="text-gray-500 mt-2">
                        I founded this institute on the belief that every student has the ability to learn and get their dream banking jobs.This institute lays greater emphasis on the value of education. Our education system shapes the personality and character of an individual and cultivates life skills. We are fully aware of the responsibility and the expectations that students and parents have from us. To prove their expectations right, we offer unique and comprehensive offering to our students so that they stay ahead of the competition and achieve their career goals. Because of excellent results and selections, we have emerged as a leader in this domain and have continuously received appreciation from many students.



                    </p>




                </div>

            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</body>