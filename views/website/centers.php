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
                    <span>Centers</span>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-center py-16 max-lg:py-10">
            <div class="w-[80%]  items-center justify-center flex flex-col ">
                <h1 class="text-3xl font-semibold">Explore by District
                </h1>
                <p class="mt-3 text-gray-500 max-lg:text-center">Explore VSA Centres in your preferred District
                </p>
                <div class="w-[40%] max-lg:w-full shadow-xl border border-gray-300 gap-3 px-4 rounded-lg py-2 mt-7 bg-[#f9fafb] flex items-center justify-center relative">
                    <i class="fa-solid fa-location-dot text-[#272c6c] text-xl"></i>
                    <input type="text" class="w-full outline-none px-2 bg-transparent " placeholder="Search by District" id="district">
                    <div class="absolute right-0 top-[105%] z-[999] w-full transform  transform  bg-white shadow-xl border border-gray-300 gap-3  rounded-lg flex items-center justify-center h-[40vh] hidden" id="search">
                        <div class="w-full h-full flex flex-col items-center justify-start overflow-y-scroll " id="searchDiv">
                            <div class="w-full flex items-center justify-between py-2">
                                <h2 class="text-sm text-[#272c6c]">Thane</h2>
                            </div>
                            <div class="w-full flex items-center justify-between py-2">
                                <h2 class="text-sm text-[#272c6c]">Ratnagiri</h2>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="w-full grid grid-cols-4 items-center justify-center mt-10 gap-5 max-lg:grid-cols-2">
                    <a href="/our-offices/thane" class="w-full flex items-center justify-center h-[15vh] gap-2 border border-gray-300 rounded-lg p-2">
                        <div class="w-[30%] flex items-center justify-center h-full max-lg:w-1/2 max-lg:h-2/3">
                            <img src="/public/images/thane.jpg" class="w-full h-full object-cover rounded-lg" alt="">
                        </div>

                        <div class="w-[70%] flex flex-col items-start justify-start">
                            <h2 class="text-lg font-semibold">Thane</h2>
                            <span class="text-gray-500 text-sm">2 Centres</span>
                        </div>
                    </a>
                    <a href="/our-offices/mumbai" class="w-full flex items-center justify-center h-[15vh] gap-2 border border-gray-300 rounded-lg p-2">
                        <div class="w-[30%] flex items-center justify-center h-full max-lg:w-1/2 max-lg:h-2/3">
                            <img src="/public/images/mumbai.jpeg" class="w-full h-full object-cover rounded-lg" alt="">
                        </div>
                        <div class="w-[70%] flex flex-col items-start justify-start">
                            <h2 class="text-lg font-semibold">Mumbai</h2>
                            <span class="text-gray-500 text-sm">1 Centres</span>
                        </div>
                    </a>
                    <a href="/our-offices/pune" class="w-full flex items-center justify-center h-[15vh] gap-2 border border-gray-300 rounded-lg p-2">
                        <div class="w-[30%] flex items-center justify-center h-full max-lg:w-1/2 max-lg:h-2/3">
                            <img src="/public/images/pune.jpg" class="w-full h-full object-cover rounded-lg" alt="">
                        </div>
                        <div class="w-[70%] flex flex-col items-start justify-start">
                            <h2 class="text-lg font-semibold">Pune</h2>
                            <span class="text-gray-500 text-sm">2 Centres</span>
                        </div>
                    </a>
                    <a href="/our-offices/jalna" class="w-full flex items-center justify-center h-[15vh] gap-2 border border-gray-300 rounded-lg p-2">
                        <div class="w-[30%] flex items-center justify-center h-full max-lg:w-1/2 max-lg:h-2/3">
                            <img src="/public/images/jalna.jpg" class="w-full h-full object-cover rounded-lg" alt="">
                        </div>
                        <div class="w-[70%] flex flex-col items-start justify-start">
                            <h2 class="text-lg font-semibold">Jalna</h2>
                            <span class="text-gray-500 text-sm">1 Centres</span>
                        </div>
                    </a>
                </div>
                <!-- <p class="mt-3 text-gray-500 text-center w-[70%] mt-[10vh]">We have strategically located centers in Thane, Pune, Mumbai, and Jalna to ensure easy accessibility and quality education for aspiring students across Maharashtra. Each center is equipped with experienced faculty and modern learning facilities to support your success.


                </p> -->
                <a href="/all-centers" class=" text-center w-fit px-6 bg-[#272c6c] text-white py-2 rounded mt-10">View More</a>
            </div>
        </div>
        <div class="w-full flex items-center justify-center text-white py-20 bg-[url('/public/images/bg.jpg')]">
            <div class="w-[80%] flex flex-col items-center justify-center max-lg:w-[85%]">
                <div class="w-full flex flex-col items-center justify-center">
                    <h2 class="text-5xl font-semibold max-lg:text-3xl max-lg:text-center">Download Our App Now


                    </h2>
                    <p class="text-gray-300 mt-4 w-[55%] text-center max-lg:w-full">Experience seamless learning on the go. Get instant access to courses, tests, and updates—right from your mobile device. Available on the App Store.</p>
                    <a href="https://play.google.com/store/apps/details?id=co.jarvis.vikasa" target="_blank">
                        <img src="/public/images/Google.png" class="mt-7" alt="">
                    </a>
                </div>

            </div>
        </div>
        <!-- <div class="w-full flex items-center justify-center  py-20 max-lg:py-10">
            <div class="w-[80%] flex flex-col items-center justify-center max-lg:w-[85%]">
                <div class="w-[50%] flex flex-col items-center justify-center max-lg:w-full">
                    <h2 class="text-5xl font-semibold text-gray-800 max-lg:text-3xl max-lg:text-center">What Our Learners Say
                    </h2>
                    <p class="text-gray-500 mt-4 w-full text-center">Let me help you turn your dreams into reality. Take the first step now to elevate your career and life.
                    </p>
                    <div class="w-full flex items-center justify-center mt-8 ">
                        <div class="w-full flex flex-col items-center justify-center">
                            <span class="text-[#543cdf] text-[1.8vw] max-lg:text-lg">90%
                            </span>
                            <span class="uppercase text-xs font-semibold tracking-[3px] max-lg:text-[1.8vw]">
                                satisfaction
                            </span>
                        </div>
                        <div class="w-full flex flex-col items-center justify-center">
                            <span class="text-[#543cdf] text-[1.8vw] max-lg:text-lg">300k+
                            </span>
                            <span class="uppercase text-xs font-semibold tracking-[3px] max-lg:text-[1.8vw]">
                                teaching hours
                            </span>
                        </div>
                        <div class="w-full flex flex-col items-center justify-center">
                            <span class="text-[#543cdf] text-[1.8vw] max-lg:text-lg">8.5M+
                            </span>
                            <span class="uppercase text-xs font-semibold tracking-[3px] max-lg:text-[1.8vw]">
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
                        <div id="forward" onclick="banner_backward(this)" class="absolute z-[999] top-[30%] shadow left-[1vw] border bg-white border-white p-2 rounded-full cursor-pointer max-lg:top-[87%] max-lg:top-[20%] max-lg:left-[5vw]">
                            <img src="/public/images/backward-black.png" class="w-[25px] h-[25px] max-lg:w-[12px] max-lg:h-[12px]" alt="">
                        </div>
                        <div id="backward" onclick="banner_forward(this)" class="absolute z-[999] top-[30%] shadow right-[1vw] border bg-white  border-white p-2 rounded-full cursor-pointer max-lg:top-[87%] max-lg:right-[75vw] max-lg:top-[20%]  max-lg:right-[5vw]">
                            <img src="/public/images/forward-black.png" class="w-[25px] h-[25px] max-lg:w-[12px] max-lg:h-[12px]" alt="">
                        </div>
                        <div class="w-[80%] flex items-center justify-center owl-carousel testimonial owl-loaded owl-drag">




                            <div class="owl-stage-outer">
                                <div class="owl-stage" style="transform: translate3d(-2344px, 0px, 0px); transition: 0.25s; width: 4689px;">
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
                                    <div class="owl-item active" style="width: 586.125px;">
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
                        </div>
                    </div>
                </div>

            </div>
        </div> -->
 <?php include('views/website/include/testimonials.php'); ?>

    </div>
    <script>
        const centers = <?php echo json_encode($centers); ?>;

        // Create a Set of all district_name_en values from the PHP $centers array
        const phpDistricts = new Set(centers.map(center => center.district_name_en));

        document.getElementById('district').addEventListener('input', async () => {
            const district = document.getElementById('district').value;
            if (district.length > 0) {
                document.getElementById('search').classList.remove('hidden');
            } else {
                document.getElementById('search').classList.add('hidden');
            }

            const response = await axios.post("/api/getCentersByDistrict", new URLSearchParams({
                district: district,
            }));

            document.getElementById('searchDiv').innerHTML = '';
            if (response.data.length > 0) {
                let ele = '';
                response.data.forEach(center => {
                    // Check if the district is in the PHP array
                    const isInPHP = phpDistricts.has(center.district_name_en);
                    if (isInPHP) {


                        ele += `
                    <a href="/our-offices/${center.district_name_en.toLowerCase()}" class="w-full flex items-center justify-between px-3 py-2 bg-white">
                        <h2 class="text-sm text-[#272c6c]">${center.district_name_en}</h2>
                    </a>`;
                    } else {
                        ele += `
                    <div class="w-full flex items-center justify-between px-3 py-2 bg-gray-100 cursor-not-allowed opacity-50">
                        <h2 class="text-sm text-[#272c6c]">${center.district_name_en}</h2>
                        <span class="text-xs text-green-500">Comming Soon</span>
                    </div>`;
                    }
                });
                document.getElementById('searchDiv').innerHTML = ele;
            }
        });
    </script>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</body>