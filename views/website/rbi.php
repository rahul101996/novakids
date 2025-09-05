<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<style>
    .active_profile {
        font-weight: 600;
        border-bottom: 5px solid #543cdf !important;

        color: #543cdf !important;
        /* border-width: 5px; */
    }
</style>

<body>

    <div class="min-h-screen">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
          <div class="w-full flex items-center justify-center  bg-[#272c6c]">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/marquee.php'; ?>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/home-banner.php'; ?>

        <div class="w-full flex items-center justify-center py-16 max-lg:py-10">
            <div class="w-[80%] flex flex-col items-center justify-center max-md:w-[85%] max-lg:w-[90%]">
                <div class="w-full flex items-start justify-start gap-5 max-lg:text-xs max-lg:gap-2">
                    <a href="/">
                        <img src="/public/images/home-icon.png" class="h-6 max-lg:h-4" alt="">
                    </a>
                    <img src="/public/images/forward-black.png" class="h-6 max-lg:h-4" alt="">
                    <span>RBI</span>
                </div>
                <h1 class="w-full text-4xl font-semibold mt-10">RBI</h1>
                <p class="text-gray-800 font-semibold text-xl mt-5 w-full">A Banking Career with RBI
                </p>
                <p class="text-gray-500 mt-2">Building a career with Reserve Bank of India is not just another career option. It is more than a job, it is a commitment to serve the nation with the opportunity to make an impact on the financial and economic sector of the country. A career in the RBI is very rewarding and stable, it enables a person to fulfill his/her ambitions in the financial sector. An RBI job offers a number of benefits and good quality of life even in compared to most of the government jobs in India.</p>


                <div class="w-full flex items-start justify-center mt-10 gap-5 max-lg:flex-col">
                    <div class="w-[70%] flex flex-col items-center justify-center max-lg:w-full">
                        <div class="flex justify-between flex-col items-center w-full bg-white  rounded-lg border border-gray-200">
                            <h1 class="text-2xl max-lg:text-lg font-bold py-4 w-full border-b border-gray-200  px-6">
                                More Details
                            </h1>
                            <div class="w-full flex items-center justify-start px-6 text-lg    gap-3 ">
                                <span class="py-4  px-7 max-lg:px-2 max-lg:text-sm cursor-pointer hover:bg-gray-100 active_profile profile_tab edit_profile">Overview</span>
                                <span class="profile_tab py-4  px-7 max-lg:px-2 max-lg:text-sm cursor-pointer hover:bg-gray-100 change_password">Eligibility</span>
                                <span class="profile_tab py-4  px-7 max-lg:px-2 max-lg:text-sm cursor-pointer hover:bg-gray-100 key_benefits">Key Benefits</span>
                            </div>

                        </div>
                        <div class="w-full flex items-start p-6 justify-center flex-col" id="profileForm">
                            <h2 class="text-2xl font-bold">Different Roles in RBI</h2>
                            <p class="text-gray-500">Working for RBI brings you a wider canvas in finance and public policy sector. RBI gives you an opportunity to touch the lives of millions of Indians every day. Depending on the department an RBI employee works in, he/she has to deal with core financial aspects of the country e.g. ensuring the stability of interest rates & adequate supply of currency, exchange rates, and productive liquidity for productive sectors. The RBI is the central bank which controls credit flow to desired sectors and monitors financial movements, markets, and institutes.</p>


                            <div class="w-full h-[1px] bg-gray-300 my-10"></div>
                            <h2 class="text-2xl font-semibold ">RBI Job Grades


                            </h2>
                            <p class="text-gray-500 mt-2">
                                RBI employees are grouped as per their seniority level in 6 groups <b> ‘A t0 F’. Group ‘F’</b> is considered as the <b>senior most level</b> and <b>Group ‘A’</b> is the <b>junior-most grade</b>. RBI employees are divided into three different classes –<b> Class I, III and IV. There is no Class II in RBI.</b>




                            </p>
                            <p class="text-gray-500 mt-2"><b>Class I </b> employees are officers. Class I officers include <b>Governor, Deputy Governors, Chief General Managers, General Managers, Assistant General Managers, Managers</b> and more. RBI has a large number of employees working in Class III and IVwho work as service staff and other <b>subordinate level</b>. Salary, benefits, and perks are differs from Class to Class and Group to Group for RBI employees.

                            </p>


                        </div>

                        <div class="w-full flex items-start p-6 justify-center flex-col hidden gap-4" id="passwordForm">
                            <h2 class="text-3xl font-semibold max-lg:text-2xl">The candidate must fulfil the following two criteria:
                            </h2>
                            <div class="flex items-center justify-center gap-3">
                                <i class="fa-solid fa-circle-check text-[#543cdf]" aria-hidden="true"></i>
                                <p class="text-gray-500 mt-2">Educational Qualification: Candidate should have a degree (Graduation) in any discipline from a University recognized by the Govt. of India or any equivalent qualification recognized as such by the Central Government. The candidate must possess valid mark–sheet ⁄ degree certificate that he ⁄ she is a graduate on the day he ⁄ she registers and indicate the percentage of marks obtained in graduation while registering online.</p>
                            </div>

                            <div class="flex items-center justify-center gap-3 mt-2">
                                <i class="fa-solid fa-circle-check text-[#543cdf]" aria-hidden="true"></i>
                                <p class="text-gray-500 mt-2">Computer Literacy: Operating and working knowledge in computer systems is mandatory i.e. candidates should have certificate⁄diploma⁄degree in computer operations⁄language⁄ should have studied computer ⁄ information technology as one of the subjects in the high school⁄college⁄institute.



                                </p>

                            </div>
                            <div class="flex items-center justify-center gap-3 mt-2">
                                <i class="fa-solid fa-circle-check text-[#543cdf]" aria-hidden="true"></i>
                                <p class="text-gray-500 mt-2">Age: Minimum: 20 years, Maximum: 30 years i.e. A candidate must have been born not earlier than 02.07.1986 and not later than 01.07.1996 (both dates inclusive).
                                </p>

                            </div>



                        </div>
                        <div class="w-full flex items-start p-6 justify-center flex-col hidden gap-4" id="key_benefits">
                            <div class="flex items-center justify-center gap-3">
                                <i class="fa-solid fa-circle-check text-[#543cdf]" aria-hidden="true"></i>
                                <p>PO’s are benefitted with the Housing Loan, Car Loan & Personal Loans on concessionary rate of interest.

                                </p>
                            </div>
                            <div class="flex items-center justify-center gap-3">
                                <i class="fa-solid fa-circle-check text-[#543cdf]" aria-hidden="true"></i>
                                <p>Women and single men with children or aged parents have the provision to take sabbatical leave of up to 2 years.



                                </p>
                            </div>
                            <div class="flex items-center justify-center gap-3">
                                <i class="fa-solid fa-circle-check text-[#543cdf]" aria-hidden="true"></i>
                                <p>Bank employees can also be transferred to its respective foreign branches and can get a chance to work in foreign countries.
                                </p>
                            </div>


                        </div>
                    </div>
                    <form method="POST" action="/razorpay" id="paymentForm" class="w-[30%] max-lg:w-full flex flex-col items-start justify-center border border-gray-300 rounded-lg sticky top-24">
                        <div class="w-full flex flex-col items-start justify-center">
                            <img src="/<?= $course['image'] ?>" class="w-full rounded-lg" alt="">
                        </div>
                        <div class="w-full flex flex-col items-start justify-center p-3 bg-[#001e4f] text-yellow-400 font-semibold">
                            <span class="text-xs text-white bg-[#603eae] px-2 py-1 rounded-lg tracking-widest font-semibold uppercase">COURSE Description</span>
                            <h2 class="text-lg font-semibold mt-3 text-red-500 bg-yellow-400 rounded-lg px-2"><?= $course['name'] ?></h2>
                            <p class="text-sm text-gray-500 mt-1"><?= $course['description'] ?></p>
                            <p class="mt-3"><span class="line-through text-gray-100">₹<?= $course['regular_fee'] ?>.00</span>&ensp;<span class="font-semibold">₹<?= $course['discount_fee'] ?>.00</span></p>
                            <input type="price" name="price" value="<?= $course['discount_fee'] ?>" hidden>
                                                       <input type="text" name="course_id" value="<?= $course['id'] ?>" hidden>
                            <input type="text" name="course_name" value="<?= $course['name'] ?>" hidden>


                            <?php
                            if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                            ?>
                                <button name="submit" class="px-5 py-2 bg-[#603eae] text-white rounded-full hover:bg-black w-full mt-3">Buy Now</button>
                            <?php } else {
                            ?>
                                <a href="/login" class="flex items-center justify-center px-5 py-2 bg-[#603eae] text-white rounded-full hover:bg-black w-full mt-3">Buy Now</a>
                            <?php } ?>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full flex items-center justify-center">
            <div class="w-[80%] flex flex-col items-center justify-center gap-4 max-md:w-[85%] max-lg:w-[90%]">
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">Bank Exam Online Coaching
                    </h2>
                    <p class="mt-3 text-gray-500">Vikas Sawants Academy offers the Bank Exam Online Coaching to help aspiring candidates confidently crack various bank exams. Our comprehensive online coaching program is designed by faculty members who deeply understand the banking sector and exam patterns. Our Banking Online Course covers many bank exams, including the IBPS PO, IBPS CLERK, IBPS Clerk, SBI Clerk, NABARD and more. We also offer personalized guidance and mentorship to address your strengths and weaknesses, enabling you to optimize your preparation strategy for Bank PO Online Coaching.</p>
                    <p>Join Vikas Sawants Academy's Banking Online Coaching today and embark on a transformative journey toward a successful banking career.

                    </p>
                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">Course For Banking

                    </h2>
                    <p class="mt-3 text-gray-500">To prepare for banking exams, consider the Online Course for Bank Exam and Insurance Exam including IBPS RRB PO, IBPS RRB Clerk, IBPS Clerk, IBPS PO, NABARD, LIC, NICL offered by Vikas Sawants Academy. You will be guided with comprehensive courses covering all banking exams and offered specialized courses for bank exams like IBPS CLERK, IBPS PO, and RBI Assistant. All the essentials - the live classes, video lectures, mock tests, and study materials are included in the Online Coaching for Banking.

                    </p>
                    <p class="text-gray-500">Bank Mahapack is for all Banking and Insurance Exam with 6,12 & 24 months pack validity, 20+ exams covered, 100+ batches (live & recorded), 2000+ live classes, 2000+ mocks, quizzes & notes, 24*7 doubt support & More.

                    </p>
                    <p class="text-gray-500">The Coaching for Banking Online is an effective way for candidates to prepare for competitive banking with faculty guidance, comprehensive Syllabus coverage as per the latest update, and flexible learning options accessible from any device.

                    </p>
                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">IBPS Online Coaching

                    </h2>
                    <p class="mt-3 text-gray-500">IBPS Online Coaching is available at our VSA platforms that offer comprehensive preparation for the Institute of Banking Personnel Selection (IBPS) exams, including Probationary Officer (PO) and Clerk. These online coaching programs provide structured learning, Faculty guidance, and flexible study options suitable for aspirants preparing from home.

                        At online coaching for bank exam Live classes, Class Notes, Handwritten notes, 24*7 Doubt Solving Platform, Chapter-wise quizzes.



                    </p>
                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">IBPS PO Online Coaching
                    </h2>
                    <p class="mt-3 text-gray-500">The main aim of the IBPS PO Online Coaching is to achieve conceptual clarity. Through comprehensive explanations, illustrative examples, and a variety of practice questions, the study material supports aspirants in understanding fundamental principles and theories. IBPS PO Online Coaching live sessions provide an engaging and interactive educational experience for candidates preparing for IBPS PO.

                    </p>
                    <p>At IBPS Foundation Batch Basic to Advanced 2025-26, we are offering 400+ prelims + mains coverage, 400+ live classes, 3800+ practice questions, 150+ handwritten notes, and 60+ mock tests. This IBPS PO Course enable real-time interaction with VSA faculty, allowing students to resolve doubts, pose questions, and take part in discussions from the convenience of their homes.



                    </p>
                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">IBPS PO Online Coaching Fee

                    </h2>
                    <p class="mt-3 text-gray-500">VSA Offers comprehensive IBPS PO Online coaching for both Prelims and Mains at a minimum price. The IBPS PO Online courses include daily video lessons, study notes, doubt-clearing sessions, and 60+ mock tests. The IBPS PO Online Coaching Fee is at price of Rs. 1,999/-.

                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">IBPS Clerk Online Coaching

                    </h2>
                    <p class="mt-3 text-gray-500">Join our IBPS Clerk Online Coaching 2025, which includes both the latest exam pattern of the Prelims and Mains Exam. Get ready for the IBPS Clerk Exam 2025 with Faculty guidance, offering quality classes, availability of recorded classes and live lectures, professional advice, and live doubt clarification sessions. Join now in our IBPS Clerk Online Coaching Classes to enhance confidence for your IBPS Clerk Exam 2025.

                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">IBPS RRB Online Coaching


                    </h2>
                    <p class="mt-3 text-gray-500">Prepare for the IBPS RRB Exam with VSA online coaching for IBPS RRB PO and IBPS RRB Clerk for the upcoming exam. At IBPS RRB PO & Clerk Foundation Batch 2025, Our VSA team equips students with a solid foundation and practical methods to tackle the challenges of the IBPS examination. We strive to make our coaching easily comprehensible for everyone.

                    </p>
                    <p class="mt-3 text-gray-500">
                        By utilizing easy language and concepts, we guarantee that learning is both enjoyable and accessible for all. We have developed the finest modules for the upcoming IBPS RRB Online coaching classes for all IBPS RRB-based exam preparation. Our VSA faculty members for the IBPS RRB Clerk examination have crafted these modules under the IBPS RRB Syllabus.
                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">IBPS RRB PO Online Coaching


                    </h2>
                    <p class="mt-3 text-gray-500">
                        The IBPS RRB PO Online Coaching is designed to help candidates crack the IBPS RRB PO 2025 exam with guidance from VSA educators. Features included in the IBPS RRB PO Online Course are daily video lessons, study notes, doubt-clearing sessions, live classes, and access to previous years' papers.

                        At IBPS RRB PO Crash Course 2025 which is valid till 31st March 2025, you will have access to the 60+ IBPS RRB PO (Pre + Mains) Full Length and Sectional Mocks Tests Based on the latest pattern and syllabus, 3200+ Practice Questions, 20+ Monthwise Current Affairs Magazine which is accessible at the VSA App.
                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">IBPS RRB Clerk Online Coaching


                    </h2>
                    <p class="mt-3 text-gray-500">Join our IBPS Clerk Online Coaching 2025, which includes both the latest exam pattern of the Prelims and Mains Exam. Get ready for the IBPS Clerk Exam 2025 with Faculty guidance, offering quality classes, availability of recorded classes and live lectures, professional advice, and live doubt clarification sessions. Join now in our IBPS Clerk Online Coaching Classes to enhance confidence for your IBPS Clerk Exam 2025.

                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">IBPS CLERK Online Coaching



                    </h2>
                    <p class="mt-3 text-gray-500">Vikas Sawants Academy offers comprehensive bank exam coaching including the SBI Online Course for Probationary Officer posts. We provide live and recorded IBPS CLERK Online Classes, progress tracking dashboards, study notes, previous year papers and several practice questions.

                        IBPS CLERK Online Coaching Fee is Rs. 1,999/- for Full Batch including Prelims and Mains.

                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">SBI Clerk Online Coaching


                    </h2>
                    <p class="mt-3 text-gray-500">SBI Clerk Online Coaching Classes are created to offer a well-organized and adaptable method for preparing for the SBI Clerk exam. These classes provide unlimited access to live sessions, mock tests, and expert assistance from leading faculty. With the ease of studying from home, you receive 24/7 access to course materials and recorded classes.

                    </p>
                    <p class="mt-3 text-gray-500">
                        Our VSA Team has started the SBI CLERK CRASH COURSE (PRE+MAINS) for SBI Clerk Exam Preparation. It offers classes in Hinglish Medium, 250+ number of lectures, 1500+ practice questions, 120+ handwritten notes, 25 mocks (prelims+mains) mock tests, 24*7 ask doubts. The batches are structured to assist you for the SBI Clerk prelims and mains exam to help in your selection. Individuals applying for Clerk positions at the State Bank of India should enroll now for SBI Bank Course!
                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">SBI Clerk Online Coaching Fee
                    </h2>
                    <p class="mt-3 text-gray-500">Vikas Sawants Academy offers comprehensive SBI Clerk Online Course including live and recorded classes, progress tracking dashboards, and millions of practice questions. The SBI Clerk Online Coaching Fee for the SBI Clerk Crash Course for both prelims and mains exam is Rs. 1499/-
                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">RBI Grade B Online Coaching



                    </h2>
                    <p class="mt-3 text-gray-500">Enrolling in the RBI Grade B Online Coaching is the best choice for preparing for the Grade B Officer position at the Reserve Bank of India. Thus, to enhance your likelihood of being selected for the Grade B Officer role at RBI, it is essential to organize your preparation thoughtfully and begin well ahead of time. Joining RBI Grade B coaching is one of the most effective methods to organize your preparation for the forthcoming RBI Grade B Recruitment.

                        Enroll now for Samarth 2.0 RBI Grade-B Foundation Batch 2025 (Phase 1 & 2), which includes 500+ no. of lectures, 3800+ practice questions, 125+ handwritten notes, 10 mock test, 24*7 doubt clearing sessions.

                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">RBI Grade B Online Coaching Fees



                    </h2>
                    <p class="mt-3 text-gray-500">The RBI Grade B Online Coaching Fees for the Samarth 2.0 RBI Grade-B Foundation Batch 2025 (covering Phase 1 & 2) online coaching is Rs. 24,99/-. Comprehensive RBI Grade B Course covering both Phase 1 and Phase 2 preparation, including over 500 hours of lectures, 10 mock tests, handwritten notes, and doubt sessions.



                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">Bank Exam Online Coaching in India



                    </h2>
                    <p class="mt-3 text-gray-500">Our Bank Exam Online Coaching in India program is designed to cater to the needs of bank exam aspirants nationwide. With our faculty members and state-of-the-art online learning platform, we provide seamless and immersive learning right at your fingertips. Our online classes for bank exams features interactive video lectures, live doubt-solving sessions, and regular assessments to enhance your learning. We offer comprehensive study tools like e-books, sample test questions, and mock exams that mimic the actual exam setting. With our faculty, comprehensive study materials, and advanced online learning platform, you will gain the knowledge, skills, and confidence to excel in bank exams and secure a bright future in the banking industry.

                        Join our Online Coaching for Bank exams 2025 catering all the banking exams in 2025.
                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">Bank Exam Online Courses by VSA
                    </h2>
                    <p class="mt-3 text-gray-500">Our courses are designed by dedicated faculty members who deeply understand the banking sector and exam patterns. Our online learning platform allows you to access high-quality study materials, video lectures, and interactive sessions from home, making your preparation convenient and practical. We also provide regular doubt-solving sessions, personalized guidance, and mentorship to address your needs and challenges.

                        Choose VSA's Bank Exam Online Courses to unlock your potential and achieve success in bank exams.
                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">Bank Exam Online Coaching in Hindi
                    </h2>
                    <p class="mt-3 text-gray-500">We understand the importance of providing coaching in regional languages to cater to the diverse needs of bank exam aspirants. Our Bank Exam Online Coaching in Hindi provides comprehensive study materials, video lectures, and interactive sessions, ensuring you understand the concepts and topics covered in the exams. Our online platform also offers the flexibility to interact with faculty members and fellow Hindi-speaking aspirants, fostering a collaborative learning.
                    </p>

                </div>
                <div class="w-full flex flex-col items-start justify-center">
                    <h2 class="text-3xl font-semibold">Bank Exam Online Coaching Features



                    </h2>
                    <p class="mt-3 text-gray-500">Join our IBPS Clerk Online Coaching 2025, which includes both the latest exam pattern of the Prelims and Mains Exam. Get ready for the IBPS Clerk Exam 2025 with Faculty guidance, offering quality classes, availability of recorded classes and live lectures, professional advice, and live doubt clarification sessions. Join now in our IBPS Clerk Online Coaching Classes to enhance confidence for your IBPS Clerk Exam 2025.

                    </p>

                </div>
                <section class="bg-white py-12 px-4 sm:px-6 lg:px-8 max-lg:px-0">
                    <div class="max-w-7xl mx-auto max-lg:w-full">
                        <!-- Heading -->
                        <div class="text-center mb-12">
                            <h2 class="text-3xl font-bold text-gray-800 max-lg:text-2xl">Key Features of Our Bank Exam Online Coaching</h2>
                            <p class="mt-2 text-gray-600 text-lg max-w-3xl mx-auto">
                                Our coaching platform is designed to help you prepare effectively for all bank exams with the following standout features:
                            </p>
                        </div>

                        <!-- Feature Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Feature Item -->
                            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                <h3 class="text-xl font-semibold text-blue-700 mb-2">🎥 Video Lectures</h3>
                                <p class="text-gray-600">Learn from experienced faculty through engaging and educational video lectures covering key concepts.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                <h3 class="text-xl font-semibold text-blue-700 mb-2">💬 Live Sessions</h3>
                                <p class="text-gray-600">Interactive doubt-solving and discussion sessions with faculty to enhance conceptual clarity.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                <h3 class="text-xl font-semibold text-blue-700 mb-2">📘 Study Materials</h3>
                                <p class="text-gray-600">Comprehensive e-books, notes, and practice sets to help you revise and retain topics thoroughly.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                <h3 class="text-xl font-semibold text-blue-700 mb-2">📝 Mock Tests</h3>
                                <p class="text-gray-600">Real exam-like assessments and quizzes to track progress and sharpen test-taking strategies.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                <h3 class="text-xl font-semibold text-blue-700 mb-2">📊 Performance Analysis</h3>
                                <p class="text-gray-600">Detailed feedback and reports to identify your strengths and work on your weaker areas.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                <h3 class="text-xl font-semibold text-blue-700 mb-2">👨‍🏫 Faculty Guidance</h3>
                                <p class="text-gray-600">1:1 mentorship and expert tips from our top faculty to support your preparation journey.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                <h3 class="text-xl font-semibold text-blue-700 mb-2">🖥️ Flexibility & Convenience</h3>
                                <p class="text-gray-600">Access classes anytime, anywhere, and learn at your own pace with our mobile-friendly platform.</p>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg shadow hover:shadow-md transition">
                                <h3 class="text-xl font-semibold text-blue-700 mb-2">💡 Discussion Forums</h3>
                                <p class="text-gray-600">Engage in collaborative learning with peers through forums and group discussions.</p>
                            </div>
                        </div>
                    </div>
                </section>



            </div>
        </div>
    </div>
    <script>
        let profile_tabs = document.querySelectorAll('.profile_tab');
        profile_tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                profile_tabs.forEach(tab => {
                    tab.classList.remove('active_profile');
                });
                tab.classList.add('active_profile');
                if (tab.classList.contains('edit_profile')) {
                    console.log('edit_profile');
                    document.getElementById('profileForm').classList.remove('hidden');
                    document.getElementById('passwordForm').classList.add('hidden');
                    document.getElementById('key_benefits').classList.add('hidden');


                } else if (tab.classList.contains('change_password')) {

                    console.log('change_password');
                    document.getElementById('profileForm').classList.add('hidden');
                    document.getElementById('passwordForm').classList.remove('hidden');
                    document.getElementById('key_benefits').classList.add('hidden');

                } else {
                    document.getElementById('profileForm').classList.add('hidden');
                    document.getElementById('passwordForm').classList.add('hidden');
                    document.getElementById('key_benefits').classList.remove('hidden');

                }
            });
        });
    </script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</body>