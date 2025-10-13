<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
    <!-- Breadcrumbs -->
    <div class="text-sm pt-6 px-6">
        <ol class="flex items-center space-x-2 text-gray-500">
            <li>
                <a href="/" class="hover:text-black">Home</a>
            </li>
            <li>
                <span class="mx-1">/</span>
            </li>
            <li class="text-black font-semibold">Size Guide</li>
        </ol>
    </div>
    <main class="max-w-5xl mx-auto px-4 py-10">
        <h2 class="text-3xl font-semibold mb-6">Size Guide</h2>
        <p class="mb-6 text-gray-700">
            Use this guide to find your perfect size. We’ve added visuals to help you measure your body correctly.
            All measurements are in <span class="font-semibold">inches</span> and based on body size, not garment size.
        </p>

        <!-- Measurement Guide with Images -->
        <section class="mb-12">
            <div class="mt-8 border-y py-6 flex flex-col md:flex-row items-center">
                <!-- Text -->
                <div class="w-full md:w-[60%]">
                    <h3 class="text-lg font-bold mb-4">HOW TO MEASURE T-Shirt / Shirt / Hoodies?</h3>
                    <p class="mb-2"><span class="font-bold">CHEST</span> -
                        <span class="text-gray-600">Measure from the stitches below the armpits on one side to
                            another.</span>
                    </p>
                    <p><span class="font-bold">LENGTH</span> -
                        <span class="text-gray-600">Measure from where the shoulder seam meets the collar to the
                            hem.</span>
                    </p>
                    <p class="mb-2">
                        <span class="font-bold">SHOULDER</span> -
                        <span class="text-gray-600">Measure straight across the back, from one shoulder seam to the
                            other.</span>
                    </p>

                    <p class="mb-2">
                        <span class="font-bold">HALF SLEEVE</span> -
                        <span class="text-gray-600">Measure from the top of the shoulder seam to the end of the short
                            sleeve.</span>
                    </p>

                    <p class="mb-2">
                        <span class="font-bold">3/4 SLEEVE</span> -
                        <span class="text-gray-600">Measure from the top of the shoulder seam to a point between the
                            elbow and wrist (mid-forearm).</span>
                    </p>

                    <p>
                        <span class="font-bold">FULL SLEEVE</span> -
                        <span class="text-gray-600">Measure from the shoulder seam down to the wrist.</span>
                    </p>
                </div>
                <!-- Image -->
                <div class="w-full md:w-[40%] flex justify-center">
                    <img src="/public/images/shirt-size.jpg" alt="How to measure T-shirt" class="h-72">
                </div>
            </div>
            <div class="py-6 flex flex-col md:flex-row items-center">
                <!-- Text -->
                <div class="w-full md:w-[60%]">
                    <h3 class="text-lg font-bold mb-4">HOW TO MEASURE Joggers / Bottom Wears?</h3>

                    <p class="mb-2">
                        <span class="font-bold">WAIST</span> -
                        <span class="text-gray-600">Measure around the waistband, keeping the tape measure straight and
                            snug but not too tight. For elastic waists, measure when relaxed.</span>
                    </p>

                    <p class="mb-2">
                        <span class="font-bold">LENGTH</span> -
                        <span class="text-gray-600">Measure from the top of the waistband down to the bottom hem of the
                            joggers.</span>
                    </p>

                    <p>
                        <span class="font-bold">INSEAM</span> -
                        <span class="text-gray-600">Measure from the crotch seam straight down to the bottom hem along
                            the inside leg.</span>
                    </p>
                </div>

                <!-- Image -->
                <div class="w-full md:w-[40%] flex justify-center">
                    <img src="/public/images/size2.webp" alt="How to measure joggers" class="h-72 object-contain">
                </div>
            </div>
        </section>

        <!-- Tees / Shirt / Hoodies Table -->
        <section class="mb-12 hidden">
            <h3 class="text-xl font-semibold mb-4">T-Shirts & Hoodies</h3>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 text-sm text-center">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border p-3">Size</th>
                            <th class="border p-3">Chest (in)</th>
                            <th class="border p-3">Length (in)</th>
                            <th class="border p-3">Shoulder (in)</th>
                            <th class="border p-3">Half Sleeve (in)</th>
                            <th class="border p-3">3/4 Sleeve (in)</th>
                            <th class="border p-3">Full Sleeve (in)</th>
                            <th class="border p-3">Recommended Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border p-3 font-medium">S</td>
                            <td class="border p-3 whitespace-nowrap">34 - 36</td>
                            <td class="border p-3">25</td>
                            <td class="border p-3">15</td>
                            <td class="border p-3">8</td>
                            <td class="border p-3">15</td>
                            <td class="border p-3">22</td>
                            <td class="border p-3 whitespace-nowrap">13 - 14 yrs</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border p-3 font-medium">M</td>
                            <td class="border p-3">36 - 38</td>
                            <td class="border p-3">26</td>
                            <td class="border p-3">16</td>
                            <td class="border p-3">8.5</td>
                            <td class="border p-3">16</td>
                            <td class="border p-3">23</td>
                            <td class="border p-3">15 - 16 yrs</td>
                        </tr>
                        <tr>
                            <td class="border p-3 font-medium">L</td>
                            <td class="border p-3">38 - 40</td>
                            <td class="border p-3">27</td>
                            <td class="border p-3">17</td>
                            <td class="border p-3">9</td>
                            <td class="border p-3">17</td>
                            <td class="border p-3">24</td>
                            <td class="border p-3">16 - 17 yrs</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border p-3 font-medium">XL</td>
                            <td class="border p-3">40 - 42</td>
                            <td class="border p-3">28</td>
                            <td class="border p-3">18</td>
                            <td class="border p-3">9.5</td>
                            <td class="border p-3">18</td>
                            <td class="border p-3">25</td>
                            <td class="border p-3">17 - 18 yrs</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Joggers / Pants / Bottom Wears Table -->
        <section class="mb-12 hidden">
            <h3 class="text-xl font-semibold mb-4">Joggers / Pants / Bottom Wears</h3>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-200 text-sm text-center">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="border p-3">Size</th>
                            <th class="border p-3">Waist (in)</th>
                            <th class="border p-3">Length (in)</th>
                            <th class="border p-3">Inseam (in)</th>
                            <th class="border p-3">Hip (in)</th>
                            <th class="border p-3">Thigh (in)</th>
                            <th class="border p-3">Recommended Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border p-3 font-medium">S</td>
                            <td class="border p-3 whitespace-nowrap">26 - 28</td>
                            <td class="border p-3">36</td>
                            <td class="border p-3">27</td>
                            <td class="border p-3 whitespace-nowrap">34 - 36</td>
                            <td class="border p-3">20</td>
                            <td class="border p-3 whitespace-nowrap">13 - 14 yrs</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border p-3 font-medium">M</td>
                            <td class="border p-3">28 - 30</td>
                            <td class="border p-3">37</td>
                            <td class="border p-3">28</td>
                            <td class="border p-3">36 - 38</td>
                            <td class="border p-3">21</td>
                            <td class="border p-3">15 - 16 yrs</td>
                        </tr>
                        <tr>
                            <td class="border p-3 font-medium">L</td>
                            <td class="border p-3">30 - 32</td>
                            <td class="border p-3">38</td>
                            <td class="border p-3">29</td>
                            <td class="border p-3">38 - 40</td>
                            <td class="border p-3">22</td>
                            <td class="border p-3">16 - 17 yrs</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border p-3 font-medium">XL</td>
                            <td class="border p-3">32 - 34</td>
                            <td class="border p-3">39</td>
                            <td class="border p-3">30</td>
                            <td class="border p-3">40 - 42</td>
                            <td class="border p-3">23</td>
                            <td class="border p-3">17 - 18 yrs</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

    </main>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>