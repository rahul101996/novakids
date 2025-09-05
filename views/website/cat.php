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
            <div class="w-[80%] flex flex-col items-center justify-center max-md:w-[85%] max-lg:w-[90%] ">
                <div class="w-full flex items-start justify-start gap-5 max-lg:text-xs max-lg:gap-2">
                    <a href="/">
                        <img src="/public/images/home-icon.png" class="h-6 max-lg:h-4" alt="">
                    </a>
                    <img src="/public/images/forward-black.png" class="h-6 max-lg:h-4" alt="">
                    <span>CAT
                    </span>
                </div>
                <h1 class="w-full text-4xl font-semibold mt-10">CAT
                </h1>
                <p class="text-gray-500 mt-5">CAT (Common Admission Test) is the premier all India management entrance exam conducted by IIMs. Last year 2,04,267 students competed for 1550+ seats making it the most competitive exam in the country.

                </p>
                <p class="text-gray-500 mt-5">The IIMs are the premier management institutes in India established by an act of Parliament. These institutes also provide consultancy and research services in various business and management globally.
                </p>

                <div class="w-full flex items-start justify-center mt-10 gap-5 max-lg:flex-col max-lg:gap-2">
                    <div class="w-[70%] flex flex-col items-center justify-center max-lg:w-full max-lg:gap-2">
                        <div class="flex justify-between flex-col items-center w-full bg-white  rounded-lg border border-gray-200">
                            <h1 class="text-2xl max-lg:text-lg font-bold py-4 w-full border-b border-gray-200  px-6">
                                More Details
                            </h1>
                            <div class="w-full flex items-center justify-start px-6 text-lg  gap-3 ">
                                <span class="py-4  px-7 max-lg:px-2 max-lg:text-sm cursor-pointer hover:bg-gray-100 active_profile profile_tab edit_profile">Overview</span>
                                <span class="profile_tab py-4  px-7 max-lg:px-2 max-lg:text-sm cursor-pointer hover:bg-gray-100 change_password">Eligibility</span>
                                <span class="profile_tab py-4  px-7 max-lg:px-2 max-lg:text-sm cursor-pointer hover:bg-gray-100 key_benefits">Key Benefits</span>
                            </div>

                        </div>
                        <div class="w-full flex items-start p-6 justify-center flex-col" id="profileForm">
                            <h2 class="text-2xl font-semibold">🧠 What is CAT?
                            </h2>
                            <p class="text-gray-500">
                                The Common Admission Test (CAT) is a national-level entrance exam conducted annually for admission into MBA and PGDM programs at prestigious B-Schools in India, including the Indian Institutes of Management (IIMs) and other top management institutes.
                            </p>
                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🏫 Conducting Body
                            </h2>
                            <p class="text-gray-500">
                                Organized by: One of the IIMs on a rotational basis
                            </p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">📅 Exam Frequency
                            </h2>
                            <p class="text-gray-500">Once a year, usually held in the last week of November

                            </p>
                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">
                                ✍️ Exam Pattern (as of recent years)
                            </h2>
                            <table class="w-full text-left rtl:text-right text-gray-500 mt-3 max-lg:text-xs">
                                <thead class=" text-gray-700 uppercase bg-gray-50  ">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Section

                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Questions

                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Time Allotted

                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Type

                                        </th>

                                    </tr>
                                    <tr class="bg-white border-b  dark:border-gray-200 border-gray-200">
                                        <td class="px-6 py-4">Verbal Ability & Reading Comprehension (VARC) </td>
                                        <td class="px-6 py-4">24

                                        </td>
                                        <td class="px-6 py-4">40 minutes

                                        </td>
                                        <td class="px-6 py-4">MCQs & TITA (non-MCQs)
                                        </td>

                                    </tr>
                                    <tr class="bg-white border-b  dark:border-gray-200 border-gray-200">
                                        <td class="px-6 py-4">Data Interpretation & Logical Reasoning (DILR) </td>
                                        <td class="px-6 py-4">20
                                        </td>
                                        <td class="px-6 py-4">40 minutes
                                        </td>
                                        <td class="px-6 py-4 text-nowrap">MCQs & TITA
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b  dark:border-gray-200 border-gray-200">
                                        <td class="px-6 py-4">Quantitative Ability (QA) </td>
                                        <td class="px-6 py-4">22</td>
                                        <td class="px-6 py-4">40 minutes </td>
                                        <td class="px-6 py-4 text-nowrap ">MCQs & TITA</td>
                                    </tr>



                                </thead>
                            </table>
                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">📝 Total Questions & Duration</h2>
                            <p class="text-gray-500">Total Questions: ~66</p>
                            <p class="text-gray-500">Total Duration: 120 minutes</p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">📊 Marking Scheme</h2>
                            <p class="text-gray-500">✅ +3 for correct answer</p>
                            <p class="text-gray-500">❌ -1 for incorrect MCQ</p>
                            <p class="text-gray-500">🚫 No negative marks for TITA (Type in The Answer)</p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">📌 Eligibility</h2>
                            <p class="text-gray-500">Bachelor’s degree with minimum 50% marks (45% for SC/ST/PwD)</p>
                            <p class="text-gray-500">Final year students can also apply</p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🧾 Registration Details</h2>
                            <p class="text-gray-500">Starts: August</p>
                            <p class="text-gray-500">Ends: September</p>
                            <p class="text-gray-500">Fees:</p>
                            <p class="text-gray-500">₹2400 (General)</p>
                            <p class="text-gray-500">₹1200 (SC/ST/PwD)</p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🎯 Who Should Take CAT?</h2>
                            <p class="text-gray-500">Students aiming for MBA/PGDM from IIMs, FMS, SPJIMR, MDI, IITs, IMT, etc.</p>
                            <p class="text-gray-500">Professionals seeking a management degree to boost career growth</p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🏆 Top Colleges Accepting CAT</h2>
                            <p class="text-gray-500">All 21 IIMs (like IIM Ahmedabad, Bangalore, Calcutta)</p>
                            <p class="text-gray-500">FMS Delhi</p>
                            <p class="text-gray-500">SPJIMR Mumbai</p>
                            <p class="text-gray-500">MDI Gurgaon</p>
                            <p class="text-gray-500">IITs' MBA programs (like DMS IIT Delhi, SJMSoM IIT Bombay)</p>
                            <p class="text-gray-500">NITIE Mumbai (Now IIM Mumbai)</p>
                            <p class="text-gray-500">IMT Ghaziabad, TAPMI, Great Lakes, etc.</p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🧮 Score vs Percentile</h2>
                            <p class="text-gray-500">CAT is percentile-based, not just raw scores. Even a modest score can translate to a high percentile depending on difficulty level and competition.</p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">📚 Preparation Tips</h2>
                            <p class="text-gray-500">Focus on concept clarity, especially in Quant and DILR</p>
                            <p class="text-gray-500">Regular practice with mock tests and sectional tests</p>
                            <p class="text-gray-500">Build a strong reading habit for VARC</p>
                            <p class="text-gray-500">Analyze previous year papers and mocks deeply</p>




                        </div>

                        <div class="w-full flex items-start p-6 justify-center flex-col hidden gap-2" id="passwordForm">
                            <h2 class="text-2xl font-semibold">The candidate must satisfy the below specified criteria’s:


                            </h2>
                            <p class="text-gray-500">
                                Hold a Bachelor’s Degree, with no less than 50% or equal CGPA (45% if there should arise an occurrence of the aspirants having a place with Scheduled Caste (SC), Scheduled Tribe (ST) and Persons with Disability (PWD)/Differently Able (DA) classification)
                            </p>
                            <p class="text-gray-500">
                                2. The degree should be granted by any of the Universities consolidated by an act of the central or state statutory body in India or other instructive organizations built up by an act of Parliament or pronounced to be considered as a University under Section 3 of the UGC Act, 1956, or possess an equivalent qualification recognized by the Ministry of HRD, Government of India.

                            </p>
                            <p class="text-gray-500">
                                3. Competitors appearing for the final year of bachelor’s degree/equivalent qualification



                            </p>
                            <p class="text-gray-500">
                                examination and the individuals who have finished degree prerequisites and are anticipating results can likewise apply. If selected, such applicants will be permitted to join the program temporarily, only if she/he presents a certificate most recent by June 30, 2018 from the Principal/Registrar of her/his College/Institute (issued at the latest June 30, 2018) expressing that the competitor has finished every one of the prerequisites for acquiring the four year college education/identical capability on the date of the issue of the certificate


                            </p>
                            <h2 class="text-2xl font-semibold mt-5">Different Sections of CAT
                            </h2>
                            <p class="text-gray-500">
                                The CAT examination is divided into three sections
                            </p>
                            <div class="relative overflow-x-auto w-full mt-5 max-lg:text-xs">
                                <table class="w-full text-left rtl:text-right text-gray-500 ">
                                    <thead class=" text-gray-700 uppercase bg-gray-50  ">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Quantitative Aptitude


                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Data Interpretation and Logical Reasoning


                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Verbal Ability


                                            </th>

                                        </tr>
                                        <tr class="bg-white border-b  dark:border-gray-200 border-gray-200">
                                            <td class="px-6 py-4">Arithmetic</td>
                                            <td class="px-6 py-4">Logical Reasoning

                                            </td>
                                            <td class="px-6 py-4">Reading Comprehension

                                            </td>

                                        </tr>
                                        <tr class="bg-white border-b  dark:border-gray-200 border-gray-200">
                                            <td class="px-6 py-4">Algebra</td>
                                            <td class="px-6 py-4">Data Interpretation, Sufficiency

                                            </td>
                                            <td class="px-6 py-4">Verbal Logic

                                            </td>
                                            <!-- <td class="px-6 py-4 text-nowrap">20 Minutes</td> -->
                                        </tr>
                                        <tr class="bg-white border-b  dark:border-gray-200 border-gray-200">
                                            <td class="px-6 py-4">Geometry</td>
                                            <td class="px-6 py-4"></td>
                                            <td class="px-6 py-4">Vocabulary</td>
                                            <!-- <td class="px-6 py-4 text-nowrap ">20 Minutes</td> -->
                                        </tr>
                                        <tr class="bg-white border-b  dark:border-gray-200 border-gray-200">
                                            <td class="px-6 py-4">Commercial Mathematics

                                            </td>
                                            <td class="px-6 py-4"></td>

                                            <td class="px-6 py-4">Grammar Correction

                                            </td>
                                            <!-- <td class="px-6 py-4 text-nowrap ">20 Minutes</td> -->
                                        </tr>
                                        <tr class="bg-white border-b  dark:border-gray-200 border-gray-200">
                                            <td class="px-6 py-4">Miscellaneous</td>

                                            <td class="px-6 py-4"></td>
                                            <td class="px-6 py-4"></td>
                                            <!-- <td class="px-6 py-4 text-nowrap ">20 Minutes</td> -->
                                        </tr>

                                </table>
                            </div>
                            <h2 class="text-2xl font-semibold mt-5">Syllabus

                            </h2>
                            <p class="text-gray-500">The Quantitative Aptitude section comprises of fundamental mathematics, based on 10 + 2 difficulty level. Problems are found to appear from various topics like Arithmetic, Algebra, Geometry and Commercial Mathematics (Word Problems). The questions are largely based on application of mathematics to solve real-time problems.
                            </p>
                            <p class="text-gray-500">
                                The Data Interpretation and Logical Reasoning section comprises of questions which are asked based on the given data. The data given might be in the form of graphs, charts, tables and paragraphs. Data Interpretation problems test the candidate’s understanding of the data and the ability to solve problems accurately. Logical Reasoning questions check the candidate’s ability to ratiocinate and evaluate problems.

                            </p>
                            <p class="text-gray-500">
                                The Verbal Ability section comprises of questions on comprehension and usage of standard English grammar. Verbal Logic questions test the candidate’s knowledge of arranging paragraphs in a logical order, determining the type of statements, completing the paragraphs in an appropriate way. In general, it is found that all the sections share an equal weight except CAT 2008 and CAT 2004 papers, which have a higher percentage of Verbal Ability problems.

                            </p>
                            <p class="text-gray-500">
                                It has to be noted that the CAT does not predefine any specific chapters or content upon which questions can occur. However, any intricate term would be well defined, if the problem requires such knowledge.


                            </p>
                            <h2>Allocation of marks</h2>
                            <p class="text-gray-500">
                                In general, every correct answer gains 4 marks whereas every wrong answer results in one negative mark.

                            </p>
                            <h2 class="text-2xl font-semibold mt-5">Cut-offs for each section
                            </h2>
                            <p class="text-gray-500">
                                Candidates must secure a minimum mark in each section to qualify for that section and eventually for the CAT. The minimum marks required to qualify varies upon the relative difficulty level of that section compared to other sections of the test. Sectional cut-offs varies mostly on the basis of the performance who appear for the exam in that year. A candidate must also secure a minimum total cut off for the entire paper to earn GD/PI calls from IIMs. It has been observed that different IIMs use different cut-offs to offer calls to selected candidates.

                            </p>
                            <h2 class="text-2xl font-semibold mt-5">Selection for Group Discussion and Personal Interview
                            </h2>
                            <p class="text-gray-500">
                                Candidates who secure the sectional cut-offs as well as the overall cut-offs in the written test are called for GD/PI by IIMs. This is the ultimate step of the selection-process.


                            </p>

                        </div>
                        <div class="w-full flex items-start p-6 justify-center flex-col hidden gap-4" id="key_benefits">

                            <h2 class="text-3xl font-semibold mt-4 max-lg:text-lg">🎯Key Benefits</h2>
                            <h2 class="text-2xl font-semibold mt-5 max-lg:text-lg">🎓 1. Gateway to Top B-Schools</h2>
                            <p class="text-gray-500">
                                CAT is the primary entrance exam for admission to all IIMs and many top MBA institutes like FMS, MDI, IITs, SPJIMR, IMT, etc.
                            </p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">💼 2. High Career Growth & Placement Opportunities</h2>
                            <p class="text-gray-500">
                                Graduates from IIMs and other CAT-accepting institutes often secure premium job roles in:
                            </p>
                            <ul class="list-disc list-inside text-gray-500">
                                <li>Consulting (e.g., McKinsey, BCG)</li>
                                <li>Investment Banking</li>
                                <li>Marketing (FMCG, Tech)</li>
                                <li>Product Management</li>
                                <li>Start-ups & Entrepreneurship</li>
                            </ul>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">💰 3. Lucrative Salary Packages</h2>
                            <p class="text-gray-500">
                                Average salary packages at top IIMs range from ₹20 to ₹35 LPA
                            </p>
                            <p class="text-gray-500">
                                Even newer IIMs and Tier-2 B-Schools offer ₹8 to ₹15 LPA
                            </p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🌍 4. Global Recognition</h2>
                            <p class="text-gray-500">
                                IIMs and premier B-Schools have a strong global alumni network
                            </p>
                            <p class="text-gray-500">
                                Some institutes are internationally accredited (AACSB, AMBA, EQUIS)
                            </p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🧠 5. Personal & Professional Development</h2>
                            <p class="text-gray-500">B-Schools offer holistic development:</p>
                            <ul class="list-disc list-inside text-gray-500">
                                <li>Leadership skills</li>
                                <li>Teamwork</li>
                                <li>Decision-making</li>
                                <li>Communication skills</li>
                                <li>Strategic thinking</li>
                            </ul>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🧳 6. Career Switch Made Easy</h2>
                            <p class="text-gray-500">
                                Ideal for engineers, science grads, and professionals who want to switch to management roles in:
                            </p>
                            <ul class="list-disc list-inside text-gray-500">
                                <li>Finance</li>
                                <li>HR</li>
                                <li>Marketing</li>
                                <li>Operations</li>
                            </ul>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">📈 7. Higher ROI (Return on Investment)</h2>
                            <p class="text-gray-500">
                                Many top B-schools offer excellent ROI: relatively low fees and high placements
                            </p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🔄 8. Multiple Admission Opportunities</h2>
                            <p class="text-gray-500">
                                A good CAT score is accepted by more than 1000 institutes, giving wide options for admission
                            </p>

                            <h2 class="text-2xl font-semibold mt-6 max-lg:text-xl ">🕒 9. Flexible Preparation</h2>
                            <p class="text-gray-500">
                                With the right plan, CAT preparation is possible alongside:
                            </p>
                            <ul class="list-disc list-inside text-gray-500">
                                <li>A full-time job</li>
                                <li>Graduation</li>
                                <li>Other exams (XAT, SNAP, NMAT)</li>
                            </ul>
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