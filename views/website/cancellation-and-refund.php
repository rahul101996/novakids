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
          <p class="mt-1 text-sm text-gray-600">Cancellation & Refund Policy</p>
        </div>
      </header>

      <!-- Main Content -->
      <main class="mx-auto max-w-4xl px-6 py-10">
        <article class="bg-white rounded-2xl shadow-sm ring-1 ring-black/5 p-6 md:p-10">
          <!-- 1. Enrollment Cancellation -->
          <section id="enrollment-cancellation">
            <h2 class="text-xl font-semibold">1. Enrollment Cancellation</h2>
            <p class="mt-4 leading-relaxed">1.1. You may request to cancel your enrollment in a course offered by Vikas Sawants Academy at any time before the course begins.</p>
            <p class="mt-3 leading-relaxed">1.2. To cancel your enrollment, you must submit a cancellation request through our website or contact our customer support team.</p>
            <p class="mt-3 leading-relaxed">1.3. Once your cancellation request is received and processed, your enrollment will be canceled, and you will no longer have access to the course materials or services.</p>
          </section>

          <hr class="my-8 border-gray-200" />

          <!-- 2. Refund Policy -->
          <section id="refund-policy">
            <h2 class="text-xl font-semibold">2. Refund Policy</h2>
            <p class="mt-4 leading-relaxed font-semibold text-red-600">No Refund: No refund will be provided at any cost under any circumstances.</p>
          </section>

          <hr class="my-8 border-gray-200" />

          <!-- 3. Course Changes or Cancellations by Academy -->
          <section id="course-changes">
            <h2 class="text-xl font-semibold">3. Course Changes or Cancellations by Vikas Sawants Academy</h2>
            <p class="mt-4 leading-relaxed">3.1. Vikas Sawants Academy reserves the right to cancel or reschedule courses, change instructors, or modify course content at any time, for any reason.</p>
            <p class="mt-3 leading-relaxed">3.2. In the event that we cancel a course for which you are enrolled, you will be notified promptly, and you may choose to receive a full refund or transfer your enrollment to a future course.</p>
          </section>

          <hr class="my-8 border-gray-200" />

          <!-- 4. Contact Us -->
          <section id="contact-us">
            <h2 class="text-xl font-semibold">4. Contact Us</h2>
            <p class="mt-4 leading-relaxed">4.1. If you have any questions or concerns about our cancellation and refund policy, please contact us at <span class="font-medium">8169099028</span>.</p>
          </section>
        </article>

        <!-- Quick Nav -->
        <nav class="mt-8 flex flex-wrap gap-2">
          <a href="#enrollment-cancellation" class="px-3 py-2 rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-sm hover:bg-gray-50">Enrollment Cancellation</a>
          <a href="#refund-policy" class="px-3 py-2 rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-sm hover:bg-gray-50">Refund Policy</a>
          <a href="#course-changes" class="px-3 py-2 rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-sm hover:bg-gray-50">Course Changes</a>
          <a href="#contact-us" class="px-3 py-2 rounded-xl bg-white shadow-sm ring-1 ring-gray-200 text-sm hover:bg-gray-50">Contact</a>
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