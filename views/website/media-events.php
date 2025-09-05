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
                    <span>Media & Events</span>
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col items-center justify-center py-20 max-lg:py-10">
            <div class="w-[80%] flex flex-col items-center justify-center">

                <h2 class="text-3xl font-semibold ">Media & Events
                </h2>
                <p class="text-gray-500 mt-5 max-lg:text-center">At VSA, we promote events in a great length.

                </p>
            </div>
            <div class="w-[80%] grid grid-cols-3 gap-5 items-center justify-center mt-10 max-lg:w-[85%] max-lg:grid-cols-2">
                <img src="/public/images/events/175-600x450.jpg" alt="">
                <img src="/public/images/events/177-600x450.jpg" alt="">
                <img src="/public/images/events/2013-08-03-11.09.10-600x450.jpg" alt="">
                <img src="/public/images/events/20160123_183250-600x338.jpg" alt="">
                <img src="/public/images/events/IMG-20131124-WA0030-600x353.jpg" alt="">
                <img src="/public/images/events/IMG-20160110-WA0006-600x450.jpg" alt="">
                <img src="/public/images/events/seminar-4-600x338.jpg" alt="">
                <img src="/public/images/events/seminar-5-600x450.jpg" alt="">
                <img src="/public/images/events/seminar-10-600x338.jpg" alt="">
                <img src="/public/images/events/seminar-9-600x338.jpg" alt="">
                <img src="/public/images/events/seminar-11-600x312.jpg" alt="">

            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</body>