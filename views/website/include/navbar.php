    <style>
        .active-cat {
            background-color: #f3f4f6;
        }

        .login_anc {
            position: relative;

            /* text-decoration: none; */
            letter-spacing: 3px;

            overflow: hidden;
        }

        .login_anc2 {
            position: relative;

            /* text-decoration: none; */
            letter-spacing: 3px;

            overflow: hidden;
        }

        .login_anc span:nth-child(1) {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, #8e96ff4f, #4739bc);
            animation: animate1 2s linear infinite;
        }

        .login_anc2 span:nth-child(1) {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, #f3f4f6, #4739bc);
            animation: animate1 2s linear infinite;
        }

        @keyframes animate1 {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        .login_anc span:nth-child(2) {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(to bottom, #8e96ff4f, #4739bc);
            animation: animate2 2s linear infinite;
            animation-delay: 1s;
        }

        .login_anc2 span:nth-child(2) {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(to bottom, #f3f4f6, #f3f4f6);
            animation: animate2 2s linear infinite;
            animation-delay: 1s;
        }

        @keyframes animate2 {
            0% {
                transform: translateY(-100%);
            }

            100% {
                transform: translateY(100%);
            }
        }

        .login_anc span:nth-child(3) {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to left, #8e96ff4f, #4739bc);
            animation: animate3 2s linear infinite;
        }

        .login_anc2 span:nth-child(3) {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to left, #4739bc, #f3f4f6);
            animation: animate3 2s linear infinite;
        }

        @keyframes animate3 {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .login_anc span:nth-child(4) {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(to top, #4739bc, #8e96ff4f);
            animation: animate4 2s linear infinite;
            animation-delay: 1s;
        }

        .login_anc2 span:nth-child(4) {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 3px;
            background: linear-gradient(to top, #4739bc, #f3f4f6);
            animation: animate4 2s linear infinite;
            animation-delay: 1s;
        }

        @keyframes animate4 {
            0% {
                transform: translateY(100%);
            }

            100% {
                transform: translateY(-100%);
            }
        }
    </style>
    <div class="w-full flex bg-white py-7 items-center justify-center relative z-[9999] max-md:py-5 max-md:sticky max-md:top-0 ">
        <div class="w-[80%] flex items-center justify-center max-md:w-[90%] max-md:justify-between max-lg:justify-between max-lg:w-[90%]">
            <a href="/" class="flex items-center justify-start gap-3 w-[20%] max-md:w-[50%] max-lg:w-[30%]">
                <img src="/public/logos/logo.png" class="w-[80%] " alt="">
            </a>
            <div class="w-[60%] flex items-center justify-center max-md:hidden max-lg:w-[50%] max-lg:text-sm max-lg:hidden relative">
                <div class="w-full border border-gray-300 p-1 rounded-full flex items-center justify-center">
                    <span class="px-3 text-gray-400 text-nowrap border-r border-gray-300">All Exams</span>

                    <input type="text" class="w-full outline-none px-2 " placeholder="What do you want to learn ? ...">
                    <button class="flex items-center justify-center bg-[#272c6c] text-white  py-2 max-lg:px-6 rounded-full px-9 gap-3">Search <img src="/public/images/search.png" class="h-5 max-lg:h-4" alt=""></button>
                </div>
                <div class="absolute top-[110%] left-0  w-full bg-white p-4 flex flex-col gap-3 items-start justify-start rounded  transition-all duration-300 z-[99999] h-[50vh] overflow-y-scroll border border-gray-300 shadow-lg " style="display: none;" id="courses-list2">
                    <a href="/banking-exams/sbi-clerk" class="w-full flex  items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                        <img src="/public/images/sbi.png" class="h-8" alt="">
                        <h2 class="uppercase text-gray-800">SBI Clerk</h2>
                    </a>
                    <a href="/banking-exams/sbi-po" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                        <img src="/public/images/sbi.png" class="h-8" alt="">

                        <h2>SBI PO</h2>
                    </a>
                    <a href="/banking-exams/ibps-clerk" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                        <img src="/public/images/ibi.png" class="h-8" alt="">
                        <h2>IBPS Clerk</h2>
                    </a>
                    <a href="/banking-exams/ibps-po" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                        <img src="/public/images/ibi.png" class="h-8" alt="">
                        <h2>IBPS PO</h2>
                    </a>
                    <a href="/banking-exams/rbi" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                        <img src="/public/images/rbi.png" class="h-8" alt="">
                        <h2>RBI</h2>
                    </a>
                    <a href="/mba-entrance-exams/mh-cet" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                        <img src="/public/images/cet.png" class="h-8" alt="">
                        <h2 class="uppercase text-gray-800">MH-CET</h2>
                    </a>
                    <a href="/mba-entrance-exams/cat" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                        <img src="/public/images/cat.jpg" class="h-8" alt="">

                        <h2>CAT</h2>
                    </a>
                    <a href="/mba-entrance-exams/cmat" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                        <img src="/public/images/cmat.png" class="h-8" alt="">
                        <h2>CMAT</h2>
                    </a>
                    <a href="/ssc-exams/cgl" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                        <img src="/public/images/ssc.png" class="h-8" alt="">
                        <h2 class="uppercase text-gray-800">CGL</h2>
                    </a>
                    <a href="/ssc-exams/mts" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                        <img src="/public/images/ssc.png" class="h-8" alt="">

                        <h2>MTS</h2>
                    </a>
                    <a href="/ssc-exams/chsl" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                        <img src="/public/images/ssc.png" class="h-8" alt="">
                        <h2>CHSL</h2>
                    </a>
                    <a href="/railways-exams" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                        <img src="/public/images/irl.png" class="h-8" alt="">
                        <h2 class="uppercase text-gray-800">Railways</h2>
                    </a>
                    <a href="/psc-exams/mpsc" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                        <img src="/public/images/mpsc.png" class="h-8" alt="">
                        <h2 class="uppercase text-gray-800">MPSC</h2>
                    </a>
                    <a href="/psc-exams/upsc" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                        <img src="/public/images/upsc.png" class="h-8" alt="">
                        <h2 class="uppercase text-gray-800">UPSC</h2>
                    </a>
                    <a href="/psc-exams/csat" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                        <img src="/public/images/upsc.png" class="h-8" alt="">
                        <h2 class="uppercase text-gray-800">CSAT</h2>
                    </a>
                    <a href="/online-vedic-math" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                        <img src="/public/images/vedic-math.jpg" class="h-8" alt="">
                        <h2 class="uppercase text-gray-800">Vedic Math</h2>
                    </a>
                    <a href="/vedic-maths-teacher-training-programme" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                        <img src="/public/images/vedic-math.jpg" class="h-8" alt="">
                        <h2 class="uppercase text-gray-800">Vedic Math Teacher Training</h2>
                    </a>
                    <div id="no-results" class="hidden text-gray-500 text-center w-full">
                        No courses found.
                    </div>

                </div>
            </div>
            <?php
            // printWithPre($_SESSION);
            if (isset($_SESSION['userid'])) { ?>

                <a href="/myprofile" class="flex items-center justify-end gap-3 w-[20%]  max-md:w-[50%] max-lg:w-[30%]">
                    <div class="w-[80%] flex items-center justify-center gap-3">
                        <div class="w-[23%]   rounded-full overflow-hidden">
                            <img src="/<?= !empty($_SESSION['profile']) ? $_SESSION['profile'] : 'public/images/profile-photo.png'  ?>" class="w-full h-full  object-cover" alt="">
                        </div>
                        <div class="w-[70%] flex flex-col items-start justify-center">
                            <span class="text-sm font-semibold"><?= $_SESSION['fname'] ?></span>
                            <p class="text-xs text-gray-500"><?= $_SESSION['username'] ?></p>
                            <span></span>
                        </div>
                    </div>
                </a>
            <?php  } else {
            ?>
                <div class="flex items-center justify-end gap-3 w-[20%] max-md:text-sm max-lg:w-[50%]  ">
                    <!-- <a href="/login" class="px-5 py-3 max-md:px-4 max-md:py-2 max-lg:py-2 bg-white border border-gray-300 rounded-full hover:bg-gray-100">Login</a> -->
                    <a href="/login" class="login_anc px-5 py-3 max-md:px-4 max-md:py-2 max-lg:py-2 bg-blue-50 " target="_blank">
                        <span> </span>
                        <span> </span>
                        <span> </span>
                        <span> </span>
                        Login
                    </a>
                    <a href="/register" class="login_anc2 px-5 py-3 max-md:px-4 max-md:py-2 max-lg:py-2 bg-[#272c6c] text-white" target="_blank">
                        <span> </span>
                        <span> </span>
                        <span> </span>
                        <span> </span>
                        Register
                    </a>
                    <!-- Hamburger Button -->
                    <button id="hamburgerBtn" class="lg:hidden text-blue-700 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            <?php } ?>

        </div>


    </div>


    <!-- Mobile Sidebar Menu -->
    <div id="mobileMenu" class="fixed inset-0 z-[9999] bg-black bg-opacity-50 backdrop-blur-sm hidden lg:hidden">
        <!-- Sidebar -->
        <div id="sidebar"
            class="w-72 max-w-full h-full bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out">

            <!-- Header -->
            <div class="flex flex-col justify-between items-center p-4 border-b">
                <div class="flex justify-between items-center  ">
                    <a href="">
                        <img src="/public/logos/logo.png" class="w-[60%]" alt="">
                    </a>
                    <button id="closeMenu" class="text-gray-700 hover:bg-gray-200 p-2 rounded-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                </div>
                <!-- Mobile Search Bar -->
                <!-- <div class="relative w-full max-w-xs mx-auto mt-4 lg:hidden">
                    <div class="relative">
                      
                        <input
                            oninput="getsearchdata(this)"
                            type="text"
                            placeholder="what do you want to learn ? ..."
                            class="w-full pl-4 pr-12 py-2.5 text-xs text-gray-700 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#1066dd] placeholder:text-gray-400">
                       
                        <button class="absolute right-2 top-1/2 -translate-y-1/2 p-2 rounded-full hover:bg-gray-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#1066dd]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>

                   
                    <div class="relative mt-2 mx-auto max-w-[370px]">
                        <div class="md:pb-3">
                            <div id="searchModal" class="absolute top-full left-0 max-h-[400px] overflow-y-auto right-0 bg-white rounded-lg shadow-lg z-50 hidden">
                               
                                <div class="sticky top-0 bg-white py-4 px-5 flex items-center justify-between border-b">
                                    <h3 class="text-base font-semibold text-[#030f40]">Course Results</h3>
                                    <button id="closesearchModalBtn" class="text-gray-500 hover:text-gray-800">
                                        <i class="fa-solid fa-xmark text-xl" aria-hidden="true"></i>
                                    </button>
                                </div>
                                
                                <div class="space-y-3 px-4 py-3" id="searchproductlist">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>

            <!-- Sidebar Nav -->
            <ul class="p-4 text-gray-800 space-y-4 text-base">
                <ul class="space-y-2" id="mobile-all-courses-wrapper">


                    <li>
                        <!-- All Courses Button -->
                        <button id="allCoursesToggle" class="w-full flex items-center justify-between px-4 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50 transition">
                            All Courses
                            <svg id="arrowAll" class="w-4 h-4 transform transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Course Categories -->
                        <div id="allCoursesDropdown" class="hidden mt-2 space-y-2 pl-2">

                            <!-- Banking Exams -->
                            <div class="border-b border-gray-400 rounded px-2 py-2">
                                <button class="flex items-center justify-between w-full font-medium text-left text-gray-800" onclick="toggleSubmenu('bankingDropdown', 'arrowBanking')">
                                    Banking Exams
                                    <svg id="arrowBanking" class="w-4 h-4 transform transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <ul id="bankingDropdown" class="hidden pl-4 mt-2 space-y-1 text-sm text-gray-700">
                                    <li><a href="/banking-exams/sbi-clerk" class="block hover:underline">SBI Clerk</a></li>
                                    <li><a href="/banking-exams/sbi-po" class="block hover:underline">SBI PO</a></li>
                                    <li><a href="/banking-exams/ibps-clerk" class="block hover:underline">IBPS Clerk</a></li>
                                    <li><a href="/banking-exams/ibps-po" class="block hover:underline">IBPS PO</a></li>
                                    <li><a href="/banking-exams/rbi" class="block hover:underline">RBI</a></li>
                                </ul>
                            </div>

                            <!-- MBA Entrance -->
                            <div class="border-b border-gray-400 rounded px-2 py-2">
                                <button class="flex items-center justify-between w-full font-medium text-left text-gray-800" onclick="toggleSubmenu('mbaDropdown', 'arrowMBA')">
                                    MBA Entrance
                                    <svg id="arrowMBA" class="w-4 h-4 transform transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <ul id="mbaDropdown" class="hidden pl-4 mt-2 space-y-1 text-sm text-gray-700">
                                    <li><a href="/mba-entrance-exams/mh-cet" class="block hover:underline">MH-CET</a></li>
                                    <li><a href="/mba-entrance-exams/cat" class="block hover:underline">CAT</a></li>
                                    <li><a href="/mba-entrance-exams/cmat" class="block hover:underline">CMAT</a></li>
                                </ul>
                            </div>

                            <div class="border-b border-gray-400 rounded px-2 py-2">
                                <button class="flex items-center justify-between w-full font-medium text-left text-gray-800" onclick="toggleSubmenu('sscDropdown', 'arrowSSC')">
                                    SSC Exams
                                    <svg id="arrowMBA" class="w-4 h-4 transform transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <ul id="sscDropdown" class="hidden pl-4 mt-2 space-y-1 text-sm text-gray-700">
                                    <li><a href="/ssc-exams/cgl" class="block hover:underline">CGL</a></li>
                                    <li><a href="/ssc-exams/mts" class="block hover:underline">MTS</a></li>
                                    <li><a href="/ssc-exams/chsl" class="block hover:underline">CHSL</a></li>
                                </ul>
                            </div>

                            <div class="border-b border-gray-400 rounded px-2 py-2">
                                <button class="flex items-center justify-between w-full font-medium text-left text-gray-800" onclick="toggleSubmenu('railwaysDropdown', 'arrowMBA')">
                                    Railways Exam
                                    <svg id="arrowMBA" class="w-4 h-4 transform transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <ul id="railwaysDropdown" class="hidden pl-4 mt-2 space-y-1 text-sm text-gray-700">
                                    <li><a href="/railways-exams" class="block hover:underline">Railways</a></li>

                                </ul>
                            </div>

                            <div class="border-b border-gray-400 rounded px-2 py-2">
                                <button class="flex items-center justify-between w-full font-medium text-left text-gray-800" onclick="toggleSubmenu('pscDropdown', 'arrowMBA')">
                                    PSC Exam
                                    <svg id="arrowMBA" class="w-4 h-4 transform transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <ul id="pscDropdown" class="hidden pl-4 mt-2 space-y-1 text-sm text-gray-700">
                                    <li><a href="/psc-exams/mpsc" class="block hover:underline">MPSC</a></li>
                                    <li><a href="/psc-exams/upsc" class="block hover:underline">UPSC</a></li>
                                    <li><a href="/psc-exams/csat" class="block hover:underline">CSAT</a></li>
                                </ul>
                            </div>
                            <!-- Online Vedic Math Dropdown -->
                            <div class="border-b border-gray-400 rounded px-2 py-2">
                                <button class="flex items-center justify-between w-full font-medium text-left text-gray-800" onclick="toggleSubmenu('vedicMathDropdown', 'arrowVedicMath')">
                                    Online Vedic Math
                                    <svg id="arrowVedicMath" class="w-4 h-4 transform transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <ul id="vedicMathDropdown" class="hidden pl-4 mt-2 space-y-1 text-sm text-gray-700">
                                    <li><a href="/vedic-math" class="block hover:underline">Vedic Math</a></li>
                                </ul>
                            </div>

                            <!-- Vedic Math Teacher Training Dropdown -->
                            <div class="border-b border-gray-400 rounded px-2 py-2">
                                <button class="flex items-center justify-between w-full font-medium text-left text-gray-800" onclick="toggleSubmenu('teacherTrainingDropdown', 'arrowTeacherTraining')">
                                    Vedic Math Teacher Training
                                    <svg id="arrowTeacherTraining" class="w-4 h-4 transform transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <ul id="teacherTrainingDropdown" class="hidden pl-4 mt-2 space-y-1 text-sm text-gray-700">
                                    <li><a href="/vedic-math-teacher-training" class="block hover:underline">Vedic Math Teacher Training</a></li>
                                </ul>
                            </div>

                        </div>
                    </li>
                </ul>


                <li><a href="/correspondence-course" class="block hover:text-blue-600">Correspondence Course</a></li>
                <li><a href="/our-offices" class="block hover:text-blue-600">Centers</a></li>
                <li><a href="/contact-us" class="block hover:text-blue-600">Contact</a></li>
                <li><a href="/blogs" class="block hover:text-blue-600">Blogs</a></li>
            </ul>
        </div>
    </div>


    <script>
        // Toggle All Courses main dropdown
        document.getElementById("allCoursesToggle").addEventListener("click", function() {
            const dropdown = document.getElementById("allCoursesDropdown");
            const arrow = document.getElementById("arrowAll");
            dropdown.classList.toggle("hidden");
            arrow.classList.toggle("rotate-180");
        });

        // Toggle submenus (Banking, MBA, etc.)
        function toggleSubmenu(menuId, arrowId) {
            const submenu = document.getElementById(menuId);
            const arrow = document.getElementById(arrowId);
            submenu.classList.toggle("hidden");
            arrow.classList.toggle("rotate-180");
        }
    </script>
    <!-- JS -->
    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const sidebar = document.getElementById('sidebar');
        const closeMenu = document.getElementById('closeMenu');

        hamburgerBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                sidebar.classList.remove('-translate-x-full');
            }, 10);
        });

        closeMenu.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        });

        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) {
                sidebar.classList.add('-translate-x-full');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        });
    </script>



    <nav class="w-full flex flex-col items-center justify-center sticky top-0 z-[9919]   bg-white border-b border-gray-100 max-md:hidden max-lg:hidden">

        <div class="w-[80%] h-[1px] bg-gray-300"></div>
        <div class="w-[80%] flex items-center justify-between py-6">
            <div class="flex items-center justify-center gap-7 font-semibold text-gray-800">
                <!-- <a href="/">Home</a> -->

                <div class="flex flex-col items-center justify-center gap-2 cursor-pointer relative" id="courses-wrapper">
                    <div class="flex items-center justify-center gap-2 border border-[#1066dd] text-[#1066dd] py-2 px-4 rounded" id="all-courses">
                        All Courses
                        <img class="h-4" src="/public/images/down-blue.png" alt="">
                    </div>
                    <div class="pt-5 absolute top-[100%] left-0  flex items-center justify-center rounded hidden transition-all duration-300 opacity-0 pointer-events-none" id="courses-list">
                        <div class=" bg-white border border-gray-300">

                            <div class="w-[60vw] min-h-[80vh]  flex items-start justify-center bg-gray-100">
                                <div class="w-[35%] bg-white h-[80vh]  flex flex-col items-start justify-start overflow-y-scroll">
                                    <div class="w-full  flex gap-3 flex items-center justify-start p-5 hover:bg-gray-100 active-cat corses-category" onmouseover="GetCourse('banking-exams', this)">
                                        <div class="w-full flex flex-col items-start justify-start">
                                            <h2 class="font-bold ">Banking Exams</h2>
                                            <span class="text-xs text-gray-500 font-normal">Prepare for top banking exams like SBI Clerk, SBI PO, IBPS PO, IBPS Clerk, and RBI</span>
                                        </div>
                                        <img src="/public/images/forward-black.png" class="h-5" alt="">
                                        <!-- <div class="w-fit"></div> -->

                                    </div>
                                    <div class="w-full flex gap-3 flex items-center justify-start p-5 hover:bg-gray-100 corses-category" onmouseover="GetCourse('mba-exams', this)">
                                        <div class="w-full flex flex-col items-start justify-start">
                                            <h2 class="font-bold ">MBA Enterance </h2>
                                            <span class="text-xs text-gray-500 font-normal">Ace your MBA entrance exams like MH-CET, CAT, and CMAT</span>
                                        </div>
                                        <img src="/public/images/forward-black.png" class="h-5" alt="">
                                        <!-- <div class="w-fit"></div> -->

                                    </div>
                                    <div class="w-full flex gap-3 flex items-center justify-start p-5 hover:bg-gray-100 corses-category" onmouseover="GetCourse('ssc-exams', this)">
                                        <div class="w-full flex flex-col items-start justify-start">
                                            <h2 class="font-bold ">SSC Exams </h2>
                                            <span class="text-xs text-gray-500 font-normal">
                                                Crack SSC exams like CGL, CHSL, and MTS with focused preparation.
                                            </span>
                                        </div>
                                        <img src="/public/images/forward-black.png" class="h-5" alt="">
                                        <!-- <div class="w-fit"></div> -->

                                    </div>
                                    <div class="w-full flex gap-3 flex items-center justify-start p-5 hover:bg-gray-100 corses-category" onmouseover="GetCourse('railways-exams', this)">
                                        <div class="w-full flex flex-col items-start justify-start">
                                            <h2 class="font-bold ">Railways Exams</h2>
                                            <span class="text-xs text-gray-500 font-normal">
                                                Get ready for Railway exams with structured courses, expert tips, and rigorous practice.
                                            </span>
                                        </div>
                                        <img src="/public/images/forward-black.png" class="h-5" alt="">
                                        <!-- <div class="w-fit"></div> -->

                                    </div>
                                    <div class="w-full flex gap-3 flex items-center justify-start p-5 hover:bg-gray-100 corses-category" onmouseover="GetCourse('upsc-exams', this)">
                                        <div class="w-full flex flex-col items-start justify-start">
                                            <h2 class="font-bold ">PSC Exams</h2>
                                            <span class="text-xs text-gray-500 font-normal">
                                                Master MPSC, UPSC, and CSAT exams with in-depth coverage, expert faculty, and strategic preparation.
                                            </span>
                                        </div>
                                        <img src="/public/images/forward-black.png" class="h-5" alt="">
                                        <!-- <div class="w-fit"></div> -->

                                    </div>
                                    <div class="w-full flex gap-3 flex items-center justify-start p-5 hover:bg-gray-100 corses-category" onmouseover="GetCourse('vedic-math',this) ">
                                        <div class="w-full flex flex-col items-start justify-start">
                                            <h2 class="font-bold ">Online Vedic Math</h2>
                                            <span class="text-xs text-gray-500 font-normal">
                                                Learn Vedic Math online to solve complex calculations faster with ancient techniques that boost speed, accuracy, and confidence in exams
                                            </span>
                                        </div>
                                        <img src="/public/images/forward-black.png" class="h-5" alt="">
                                        <!-- <div class="w-fit"></div> -->

                                    </div>
                                    <div class="w-full flex gap-3 flex items-center justify-start p-5 hover:bg-gray-100 corses-category" onmouseover="GetCourse('vedic-math-teacher',this) ">
                                        <div class="w-full flex flex-col items-start justify-start">
                                            <h2 class="font-bold ">Vedic Math Teacher Training</h2>
                                            <span class="text-xs text-gray-500 font-normal">
                                                Become a certified Vedic Math trainer with our comprehensive teacher training program—designed to help you master techniques and inspire young minds.
                                            </span>
                                        </div>
                                        <img src="/public/images/forward-black.png" class="h-5" alt="">
                                        <!-- <div class="w-fit"></div> -->

                                    </div>
                                </div>
                                <div class="w-[65%]  flex flex-col items-start justify-start gap-3 bg-gray-100 h-full p-5">
                                    <div class="w-full grid grid-cols-2 items-start justify-start gap-3 corses-name" id="banking-exams">
                                        <a href="/banking-exams/sbi-clerk" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                                            <img src="/public/images/sbi.png" class="h-8" alt="">
                                            <h2 class="uppercase text-gray-800">SBI Clerk</h2>
                                        </a>
                                        <a href="/banking-exams/sbi-po" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                                            <img src="/public/images/sbi.png" class="h-8" alt="">

                                            <h2>SBI PO</h2>
                                        </a>
                                        <a href="/banking-exams/ibps-clerk" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                                            <img src="/public/images/ibi.png" class="h-8" alt="">
                                            <h2>IBPS Clerk</h2>
                                        </a>
                                        <a href="/banking-exams/ibps-po" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                                            <img src="/public/images/ibi.png" class="h-8" alt="">
                                            <h2>IBPS PO</h2>
                                        </a>
                                        <a href="/banking-exams/rbi" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                                            <img src="/public/images/rbi.png" class="h-8" alt="">
                                            <h2>RBI</h2>
                                        </a>
                                    </div>
                                    <div class="w-full grid grid-cols-2 items-start justify-start gap-3 hidden corses-name" id="mba-exams">
                                        <a href="/mba-entrance-exams/mh-cet" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                                            <img src="/public/images/cet.png" class="h-8" alt="">
                                            <h2 class="uppercase text-gray-800">MH-CET</h2>
                                        </a>
                                        <a href="/mba-entrance-exams/cat" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                                            <img src="/public/images/cat.jpg" class="h-8" alt="">

                                            <h2>CAT</h2>
                                        </a>
                                        <a href="/mba-entrance-exams/cmat" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                                            <img src="/public/images/cmat.png" class="h-8" alt="">
                                            <h2>CMAT</h2>
                                        </a>

                                    </div>
                                    <div class="w-full grid grid-cols-2 items-start justify-start gap-3 hidden corses-name" id="ssc-exams">
                                        <a href="/ssc-exams/cgl" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                                            <img src="/public/images/ssc.png" class="h-8" alt="">
                                            <h2 class="uppercase text-gray-800">CGL</h2>
                                        </a>
                                        <a href="/ssc-exams/mts" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                                            <img src="/public/images/ssc.png" class="h-8" alt="">

                                            <h2>MTS</h2>
                                        </a>
                                        <a href="/ssc-exams/chsl" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded shadow-lg border border-gray-300">
                                            <img src="/public/images/ssc.png" class="h-8" alt="">
                                            <h2>CHSL</h2>
                                        </a>

                                    </div>
                                    <div class="w-full grid grid-cols-2 items-start justify-start gap-3 hidden corses-name" id="railways-exams">
                                        <a href="/railways-exams" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                                            <img src="/public/images/irl.png" class="h-8" alt="">
                                            <h2 class="uppercase text-gray-800">Railways</h2>
                                        </a>


                                    </div>
                                    <div class="w-full grid grid-cols-2 items-start justify-start gap-3 hidden corses-name" id="upsc-exams">
                                        <a href="/psc-exams/mpsc" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                                            <img src="/public/images/mpsc.png" class="h-8" alt="">
                                            <h2 class="uppercase text-gray-800">MPSC</h2>
                                        </a>
                                        <a href="/psc-exams/upsc" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                                            <img src="/public/images/upsc.png" class="h-8" alt="">
                                            <h2 class="uppercase text-gray-800">UPSC</h2>
                                        </a>
                                        <a href="/psc-exams/csat" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                                            <img src="/public/images/upsc.png" class="h-8" alt="">
                                            <h2 class="uppercase text-gray-800">CSAT</h2>
                                        </a>


                                    </div>
                                    <div class="w-full grid grid-cols-2 items-start justify-start gap-3 hidden corses-name" id="vedic-math">
                                        <a href="/online-vedic-math" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                                            <img src="/public/images/vedic-math.jpg" class="h-8" alt="">
                                            <h2 class="uppercase text-gray-800">Vedic Math</h2>
                                        </a>


                                    </div>
                                    <div class="w-full grid grid-cols-2 items-start justify-start gap-3 hidden corses-name" id="vedic-math-teacher">
                                        <a href="/vedic-maths-teacher-training-programme" class="w-full flex items-center justify-start gap-4 bg-white p-3 rounded border border-gray-300 shadow-lg">
                                            <img src="/public/images/vedic-math.jpg" class="h-8" alt="">
                                            <h2 class="uppercase text-gray-800">Vedic Math Teacher Training</h2>
                                        </a>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <a href="/correspondence-course">Correspondence Course</a>
                <a href="/our-offices">Centers</a>
                <a href="/contact-us">Contact</a>
                <a href="/blogs">Blogs</a>
            </div>
            <div class="flex items-center justify-center gap-7">
                <div class="w-fit flex items-center justify-center gap-2 cursor-pointer">
                    <div class="p-2 bg-gray-200 rounded-full">
                        <img src="/public/images/phone.png" class="h-7" alt="">
                    </div>
                    <div class="flex flex-col items-start justify-center">
                        <span class="text-sm text-gray-500">Call Us Now !</span>
                        <a href="phone:9702146136" class="font-semibold">+91 9702 146 136</a>
                    </div>
                </div>
                <div class="w-fit flex items-center justify-center gap-2 cursor-pointer ">
                    <div class="p-2 bg-gray-200 rounded-full hidden">
                        <img src="/public/images/mail.png" class="h-7" alt="">
                    </div>
                    <div class="flex flex-col items-start justify-center hidden">
                        <span class="text-sm text-gray-500">Mail Us Now !</span>
                        <span class="font-semibold"> info@vikassawantsacademy.com</span>
                    </div>
                    <a href="https://play.google.com/store/apps/details?id=co.jarvis.vikasa" target="_blank">
                        <img src="/public/images/Google.png" class="" alt="">
                    </a>
                </div>
            </div>
        </div>

    </nav>
    <div class="w-full bg-black/50 fixed top-0 left-0 z-[999] h-[100vh] hidden" id="bg-courses">

    </div>
    <script>
        function GetCourse(ele, thisele) {
            let Courses_name = document.querySelectorAll('.corses-name');
            Courses_name.forEach((item) => {
                if (item.id == ele) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
                let active = document.querySelectorAll('.corses-category');
                active.forEach((item) => {
                    item.classList.remove('active-cat');
                })
                thisele.classList.add('active-cat');
            })
        }
        const wrapper = document.getElementById("courses-wrapper");
        const coursesList = document.getElementById("courses-list");
        const bgCourses = document.getElementById("bg-courses");

        wrapper.addEventListener("mouseenter", () => {
            coursesList.classList.remove("hidden");
            bgCourses.classList.remove("hidden");
            setTimeout(() => {
                coursesList.classList.remove("opacity-0", "pointer-events-none");
            }, 10); // slight delay to trigger transition
        });

        wrapper.addEventListener("mouseleave", () => {
            coursesList.classList.add("opacity-0", "pointer-events-none");
            bgCourses.classList.add("hidden");
            setTimeout(() => {
                coursesList.classList.add("hidden");
            }, 200); // match duration-200
        });
    </script>
    <script>
        const searchInput = document.querySelector('input[placeholder*="learn"]');
        const courseList = document.getElementById('courses-list2');
        const courses = courseList.querySelectorAll('a');
        const noResults = document.getElementById('no-results');

        // Initially hide the course list
        courseList.style.display = 'none';

        searchInput.addEventListener('input', () => {
            const query = searchInput.value.trim().toLowerCase();
            let anyVisible = false;

            if (query.length > 0) {
                courseList.style.display = 'flex';
            } else {
                courseList.style.display = 'none';
            }

            courses.forEach(course => {
                const title = course.querySelector('h2').textContent.toLowerCase();
                if (title.includes(query)) {
                    course.style.display = 'flex';
                    anyVisible = true;
                } else {
                    course.style.display = 'none';
                }
            });

            // Show/hide "No results" message
            noResults.classList.toggle('hidden', anyVisible);
        });

        // Hide dropdown on outside click
        document.addEventListener('click', (e) => {
            if (!searchInput.contains(e.target) && !courseList.contains(e.target)) {
                courseList.style.display = 'none';
            }
        });

        // Show dropdown on focus (if input has text)
        searchInput.addEventListener('focus', () => {
            if (searchInput.value.trim() !== '') {
                courseList.style.display = 'flex';
            }
        });
    </script>