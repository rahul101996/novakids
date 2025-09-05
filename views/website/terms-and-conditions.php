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
                    <span>Privacy Policy</span>
                </div>
            </div>
        </div>
        <div class="min-h-screen">
            <!-- Header -->
            <header class="border-b bg-white">
                <div class="mx-auto max-w-4xl px-6 py-8">
                    <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Vikas Sawants Academy</h1>
                    <p class="mt-1 text-sm text-gray-600">Terms & Conditions</p>
                </div>
            </header>

            <!-- Main Content -->
            <main class="mx-auto max-w-4xl px-6 py-10">
                <article class="bg-white rounded-2xl shadow-sm ring-1 ring-black/5 p-6 md:p-10">
                    <!-- 1. Introduction -->
                    <section id="introduction">
                        <h2 class="text-xl font-semibold">1. Introduction</h2>
                        <p class="mt-4 leading-relaxed">These terms and conditions govern your use of Bank Exam Preparation Course, an online course provided by VIKAS SAWANTS ACADEMY. By enrolling in this course, you agree to abide by these terms and conditions.</p>
                    </section>

                    <hr class="my-8 border-gray-200" />

                    <!-- 2. Enrollment -->
                    <section id="enrollment">
                        <h2 class="text-xl font-semibold">2. Enrollment</h2>
                        <p class="mt-4 leading-relaxed">2.1. To enroll in the course, you must complete the registration process and provide accurate and complete information.</p>
                    </section>

                    <hr class="my-8 border-gray-200" />

                    <!-- 3. Payment -->
                    <section id="payment">
                        <h2 class="text-xl font-semibold">3. Payment</h2>
                        <p class="mt-4 leading-relaxed">3.1. Payment for the course must be made in full at the time of enrollment unless otherwise specified.</p>
                        <p class="mt-3 leading-relaxed">3.2. All payments are non-refundable.</p>
                    </section>

                    <hr class="my-8 border-gray-200" />

                    <!-- 4. Access and Participation -->
                    <section id="access-and-participation">
                        <h2 class="text-xl font-semibold">4. Access and Participation</h2>
                        <p class="mt-4 leading-relaxed">4.1. Upon successful enrollment and payment, you will be granted access to the course materials for the specified duration.</p>
                        <p class="mt-3 leading-relaxed">4.2. You are responsible for maintaining the confidentiality of your login credentials and must not share them with third parties.</p>
                        <p class="mt-3 leading-relaxed">4.3. You agree to participate in the course actively and to complete all assignments and assessments within the specified deadlines.</p>
                    </section>

                    <hr class="my-8 border-gray-200" />

                    <!-- 5. Intellectual Property -->
                    <section id="intellectual-property">
                        <h2 class="text-xl font-semibold">5. Intellectual Property</h2>
                        <p class="mt-4 leading-relaxed">5.1. All course materials, including but not limited to videos, lectures, documents, and assignments, are the intellectual property of VIKAS SAWANTS ACADEMY and are protected by copyright laws.</p>
                        <p class="mt-3 leading-relaxed">5.2. You may not reproduce, distribute, or transmit any course materials without prior written consent from VIKAS SAWANTS ACADEMY.</p>
                    </section>
                </article>

                <!-- Quick Nav -->
                <nav class="mt-8 flex flex-wrap gap-2">
                    <a href="#introduction" class="px-3 py-2 rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-sm hover:bg-gray-50">Intro</a>
                    <a href="#enrollment" class="px-3 py-2 rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-sm hover:bg-gray-50">Enrollment</a>
                    <a href="#payment" class="px-3 py-2 rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-sm hover:bg-gray-50">Payment</a>
                    <a href="#access-and-participation" class="px-3 py-2 rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-sm hover:bg-gray-50">Access</a>
                    <a href="#intellectual-property" class="px-3 py-2 rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-sm hover:bg-gray-50">Intellectual Property</a>
                </nav>
            </main>

            <!-- Footer -->
             
        </div>

        <script>
            document.getElementById('year').textContent = new Date().getFullYear();
        </script>


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