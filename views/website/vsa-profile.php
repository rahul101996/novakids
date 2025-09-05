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
                    <span>VSA Profile</span>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-center py-20 max-lg:py-10">
            <div class="w-[80%] flex items-center justify-center gap-[7vw] max-md:w-[85%] max-lg:w-[90%] max-lg:flex-col">
                <div class="w-[50%] flex flex-col items-start justify-center gap-7 font-semibold max-lg:w-full max-lg:items-center max-lg:text-center">
                    <h2 class="text-5xl font-bold text-gray-800 max-lg:text-3xl">VSA Profile

                    </h2>
                    <p class="text-gray-500">Vikas Sawants Academy (VSA) is India's No.1 institute for competitive exam preparation. With over 15 years of excellence, VSA has helped thousands of students achieve success in Banking (IBPS, SBI), MPSC/UPSC, MBA (CAT/CMAT), SSC, and Railway exams.
                    </p>
                    <p class="text-gray-500 mt-2">
                        Our expert faculty, structured study material, and result-oriented online and offline coaching have made VSA a trusted name across India.During the past 15 years, we have helped over thousands of students to secure jobs in Banks as probationary officers and clerks. VSA’s classroom Online coaching program has been designed to address the need of interpersonal learning.

                    </p>
                    <p class="text-gray-500 mt-2">We offer weekend batches, regular tests, and free interview guidance to ensure every student is job-ready.</p>
                    



                </div>
                                <div class="w-[50%] flex flex-col items-center justify-center gap-10 max-lg:w-full">
                    <img src="/public/images/mission-vission-1.jpeg" class="rounded-3xl shadow w-full" alt="">
                </div>
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</body>