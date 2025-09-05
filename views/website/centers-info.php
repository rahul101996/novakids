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
        <div class="w-full flex items-center justify-center py-16 max-lg:py-10">
            <div class="w-[80%] flex flex-col items-center justify-center max-md:w-[85%] max-lg:w-[90%]">
                <div class="w-full flex items-start justify-start gap-5 max-lg:text-xs max-lg:gap-2">
                    <a href="/">
                        <img src="/public/images/home-icon.png" class="h-4" alt="">
                    </a>
                    <img src="/public/images/forward-black.png" class="h-4" alt="">
                    <span class="uppercase text-gray-500 text-xs">Our Offices</span>
                    <?php
                    if ($name != null) {
                    ?>
                        <img src="/public/images/forward-black.png" class="h-4" alt="">
                        <span class="font-semibold uppercase text-xs"> <?php echo $name; ?>
                        <?php } ?>


                        </span>
                </div>
                <div class="w-full flex items-center justify-between mt-10 max-lg:mt-5">
                    <h2 class="text-3xl font-semibold ">VSA Centers in <span class="capitalize text-[#065caa]">
                            <?php
                            if ($name != null) {
                            ?>
                                <?= $name ?>
                            <?php } else { ?>
                                Maharashtra
                            <?php } ?>

                        </span></h2>
                    <!-- <div class="flex items-center justify-between border border-gray-300 p-3 rounded w-[30%]">
                        <div class="flex items-center justify-center gap-3">
                            <img src="/public/images/address-black.png" class="h-6" alt="">

                            <span class="font-semibold capitalize"><?= $name; ?></span>
                        </div>
                        <div>
                            <img class="h-4" src="/public/images/arrow-down.png" alt="">
                        </div>
                    </div> -->
                </div>
                <div class="w-full grid grid-cols-3 gap-5 mt-10 max-lg:grid-cols-2 max-md:grid-cols-1">
                    <?php
                    foreach ($centers as $center) {


                    ?>
                        <div class="w-full flex flex-col items-center justify-center min-h-[55vh] border border-gray-300 rounded-lg overflow-hidden">
                            <div class="w-full h-[50%] flex items-center justify-center">
                                <img src="/<?= $center['image']; ?>" class="h-full object-cover w-full" alt="">
                            </div>
                            <div class="w-full h-[50%] flex items-center justify-start flex-col p-3">
                                <h2 class="text-lg font-semibold text-gray-800 w-full"><?= $center['institute_name']; ?></h2>
                                <div class="w-full h-[1px] bg-gray-200 mt-2"></div>

                                <div class="w-full flex items-center justify-start gap-2 mt-2">
                                    <div class="w-[10%] flex items-center justify-center  p-1 rounded">
                                        <img src="/public/images/address-black.png" class="w-full" alt="">
                                    </div>
                                    <p class="text-sm w-[90%]"><?= $center['address']; ?></p>
                                </div>
                                <div class="w-full flex items-center justify-start gap-2 mt-3">
                                    <div class="w-fit flex items-center justify-center  p-1 rounded">
                                        <img src="/public/images/phone-black.png" class="h-6" alt="">
                                    </div>
                                    <a href="tel:<?= $center['phone']; ?>" class="text-sm">+91 <?= $center['phone']; ?></a>
                                </div>
                                <?php
                                if ($center['address_link'] != null && $center['address_link'] != "") {
                                ?>
                                    <a href="<?= $center['address_link']; ?>" class="w-full mt-3 bg-[#030f40] text-white py-2 rounded text-center">View Location</a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>

        <!-- <div class="w-full flex items-center justify-center  py-20">
            <div class="w-[80%] flex flex-col items-center justify-center">
                <div class="w-[50%] flex flex-col items-center justify-center">
                    <h2 class="text-5xl font-semibold text-gray-800">What Our Learners Say
                    </h2>
                    <p class="text-gray-500 mt-4 w-full text-center">Let me help you turn your dreams into reality. Take the first step now to elevate your career and life.
                    </p>
                    <div class="w-full flex items-center justify-center mt-8">
                        <div class="w-full flex flex-col items-center justify-center">
                            <span class="text-[#543cdf] text-[1.8vw]">90%
                            </span>
                            <span class="uppercase text-xs font-semibold tracking-[3px]">
                                satisfaction
                            </span>
                        </div>
                        <div class="w-full flex flex-col items-center justify-center">
                            <span class="text-[#543cdf] text-[1.8vw]">300k+
                            </span>
                            <span class="uppercase text-xs font-semibold tracking-[3px]">
                                teaching hours
                            </span>
                        </div>
                        <div class="w-full flex flex-col items-center justify-center">
                            <span class="text-[#543cdf] text-[1.8vw]">8.5M+
                            </span>
                            <span class="uppercase text-xs font-semibold tracking-[3px]">
                                Student person
                            </span>
                        </div>
                    </div>


                </div>
                <div class="w-full flex items-center justify-center mt-16">
                    <div class="w-[35%] flex flex-col items-center justify-center border-r border-gray-300">
                        <div class="flex flex-col items-start justify-start">
                            <span class="text-gray-800 font-semibold text-3xl">Word from <br>Learners.</span>
                            <div class="flex items-center justify-center mt-6 gap-5">
                                <span class="text-gray-800 font-semibold text-5xl">4.8</span>
                                <div class="flex flex-col items-center justify-center">
                                    <img src="/public/images/review-list.png" class="h-10" alt="">
                                    <img src="/public/images/star-list.svg" class="h-3 mt-2" alt="">
                                    <span class="text-gray-500 text-xs mt-1">Score on App Store</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-[60%] flex flex-col items-center justify-start relative">
                        <div id="forward" onclick="banner_backward(this)" class="absolute z-[999] top-[30%] shadow left-[1vw] border bg-white border-white p-2 rounded-full cursor-pointer max-lg:top-[87%] max-md:top-[20%] max-md:left-[5vw]">
                            <img src="/public/images/backward-black.png" class="w-[25px] h-[25px] max-md:w-[12px] max-md:h-[12px]" alt="">
                        </div>
                        <div id="backward" onclick="banner_forward(this)" class="absolute z-[999] top-[30%] shadow right-[1vw] border bg-white  border-white p-2 rounded-full cursor-pointer max-lg:top-[87%] max-lg:right-[75vw] max-md:top-[20%]  max-md:right-[5vw]">
                            <img src="/public/images/forward-black.png" class="w-[25px] h-[25px] max-md:w-[12px] max-md:h-[12px]" alt="">
                        </div>
                        <div class="w-[80%] flex items-center justify-center owl-carousel testimonial owl-loaded owl-drag">




                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-5861px, 0px, 0px); transition: 0.25s; width: 9378px;">
                                    <div class="owl-item cloned" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“For Bank competitive exam the seminar was taken which encourage me to join this class. This class is very much useful to me in future. The knowledge given by Vikas Sir and Sagar Sir is very much useful. Because the explanation is good and the concept gets clear to me.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://masterlife.jwsuperthemes.com/wp-content/uploads/2023/11/client_a.png" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Deepti Tupe

                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Dombivli, IN

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“The Best Academy is Vikas Sawant’s Academy. We have got lot to learn ,besides of our book syllabus we got to gain lot of knowledge. I like the teaching of vikas sir. Sagar Sir is also good in teaching Quant, we got best training from Vikas Sir.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://masterlife.jwsuperthemes.com/wp-content/uploads/2023/11/client_a.png" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Sayli Gawade

                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Kalyan, MH
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“The 4 months programme of Banking entrance exam was being very useful to crack the exams in future. One thing I liked was there was no confusion as to what should be studied for which exam. The portion was taught in such a way that it is useful for all type of government exams.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://masterlife.jwsuperthemes.com/wp-content/uploads/2023/11/client_a.png" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Rupal Kishor Jadhav
                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Kalyan, MH
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“It was a amazing experience of learning new and old things in a different manner making it more easy for us to understand. I will always look forward to make the full out of it and make the use of learning to get placed by any bank. Thanking Vikas and Sagar Sir for their effort for teaching us in a nice manner.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://vikassawantsacademy.com/wp-content/uploads/2019/05/testimonial1-free-img.jpg" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Harshal Indulkar

                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Ambernath, IN

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="owl-item" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“The 4 months programme of Banking entrance exam was being very useful to crack the exams in future. One thing I liked was there was no confusion as to what should be studied for which exam. The portion was taught in such a way that it is useful for all type of government exams.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://masterlife.jwsuperthemes.com/wp-content/uploads/2023/11/client_a.png" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Rupal Kishor Jadhav
                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Kalyan, MH
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“It was a amazing experience of learning new and old things in a different manner making it more easy for us to understand. I will always look forward to make the full out of it and make the use of learning to get placed by any bank. Thanking Vikas and Sagar Sir for their effort for teaching us in a nice manner.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://vikassawantsacademy.com/wp-content/uploads/2019/05/testimonial1-free-img.jpg" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Harshal Indulkar

                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Ambernath, IN

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“For Bank competitive exam the seminar was taken which encourage me to join this class. This class is very much useful to me in future. The knowledge given by Vikas Sir and Sagar Sir is very much useful. Because the explanation is good and the concept gets clear to me.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://masterlife.jwsuperthemes.com/wp-content/uploads/2023/11/client_a.png" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Deepti Tupe

                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Dombivli, IN

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“The Best Academy is Vikas Sawant’s Academy. We have got lot to learn ,besides of our book syllabus we got to gain lot of knowledge. I like the teaching of vikas sir. Sagar Sir is also good in teaching Quant, we got best training from Vikas Sir.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://masterlife.jwsuperthemes.com/wp-content/uploads/2023/11/client_a.png" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Sayli Gawade

                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Kalyan, MH
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="owl-item cloned" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“For Bank competitive exam the seminar was taken which encourage me to join this class. This class is very much useful to me in future. The knowledge given by Vikas Sir and Sagar Sir is very much useful. Because the explanation is good and the concept gets clear to me.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://masterlife.jwsuperthemes.com/wp-content/uploads/2023/11/client_a.png" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Deepti Tupe

                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Dombivli, IN

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“The Best Academy is Vikas Sawant’s Academy. We have got lot to learn ,besides of our book syllabus we got to gain lot of knowledge. I like the teaching of vikas sir. Sagar Sir is also good in teaching Quant, we got best training from Vikas Sir.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://masterlife.jwsuperthemes.com/wp-content/uploads/2023/11/client_a.png" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Sayli Gawade

                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Kalyan, MH
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned active" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“The 4 months programme of Banking entrance exam was being very useful to crack the exams in future. One thing I liked was there was no confusion as to what should be studied for which exam. The portion was taught in such a way that it is useful for all type of government exams.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://masterlife.jwsuperthemes.com/wp-content/uploads/2023/11/client_a.png" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Rupal Kishor Jadhav
                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Kalyan, MH
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 586.125px;">
                                        <div class="w-full flex flex-col items-start justify-start">

                                            <p class="text-xl italic text-gray-500">“It was a amazing experience of learning new and old things in a different manner making it more easy for us to understand. I will always look forward to make the full out of it and make the use of learning to get placed by any bank. Thanking Vikas and Sagar Sir for their effort for teaching us in a nice manner.”</p>
                                            <div class="w-fit flex items-center justify-start mt-6 gap-2">
                                                <img src="https://vikassawantsacademy.com/wp-content/uploads/2019/05/testimonial1-free-img.jpg" class="!w-12" alt="">
                                                <div class="flex flex-col">
                                                    <span class="font-semibold">Harshal Indulkar

                                                    </span>
                                                    <span class="text-gray-500 text-xs">From Ambernath, IN

                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                            <div class="owl-dots disabled"></div>
                            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                            <div class="owl-dots disabled"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->

        <?php include('views/website/include/testimonials.php'); ?>


    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</body>