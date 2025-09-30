<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-gray-50 bg-gray-100">

    <div class="flex h-screen ">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');


        ?>

        <main class="flex-1 md:ml-60">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>


            <div class=" mx-auto p-4 md:p-8">
                <div class="flex items-center mb-6">
                    <!-- <button class="text-gray-500 hover:text-gray-700">
                        <span class="material-icons">arrow_back</span>
                    </button> -->
                    <h1 class="text-2xl font-semibold ml-2">Home Page Setting</h1>
                </div>
                <!-- <form action="" method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        
                    </div>
                </form> -->

                <div class="p-6">

                    <div class="bg-white rounded-xl border border-gray-200 shadow-md overflow-auto mb-6">

                        <button type="button"
                            class="accordion-header w-full px-6 py-3 text-left flex items-center justify-between hover:bg-gray-50 transition-all duration-300 group"
                            onclick="toggleAccordion(1)">
                            <div>
                                <h3
                                    class="text-md font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                    Home
                                </h3>
                            </div>
                            <svg id="arrow-1" class="w-6 h-6 text-blue-600 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="content-1" class="accordion-content overflow-auto">
                            <div class="p-6 pt-0 bg-gray-50">

                                <div>
                                    <table class="hidden w-full table-auto border border-gray-300 shadow-md rounded-lg">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    #</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Challan</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Product</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Quad</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Rack</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Total Cylinder</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Return</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody1">

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- <div class="bg-white rounded-xl border border-gray-200 shadow-md overflow-auto mb-6">

                        <button type="button"
                            class="accordion-header w-full px-6 py-3 text-left flex items-center justify-between hover:bg-gray-50 transition-all duration-300 group"
                            onclick="toggleAccordion(2)">
                            <div>
                                <h3
                                    class="text-md font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                    Home
                                </h3>
                            </div>
                            <svg id="arrow-2" class="w-6 h-6 text-blue-600 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="content-2" class="accordion-content overflow-auto">
                            <div class="p-6 pt-0 bg-gray-50">

                                <div>
                                    <table class="hidden w-full table-auto border border-gray-300 shadow-md rounded-lg">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    #</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Challan</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Product</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Quad</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Rack</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Total Cylinder</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Return</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody2">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-gray-200 shadow-md overflow-auto mb-6">

                        <button type="button"
                            class="accordion-header w-full px-6 py-3 text-left flex items-center justify-between hover:bg-gray-50 transition-all duration-300 group"
                            onclick="toggleAccordion(3)">
                            <div>
                                <h3
                                    class="text-md font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                    Home
                                </h3>
                            </div>
                            <svg id="arrow-3" class="w-6 h-6 text-blue-600 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="content-3" class="accordion-content overflow-auto">
                            <div class="p-6 pt-0 bg-gray-50">

                                <div>
                                    <table class="hidden w-full table-auto border border-gray-300 shadow-md rounded-lg">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th
                                                    class="px-4 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    #</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Challan</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Product</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Rack No.</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Cylinder No.</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Total Cylinder</th>
                                                <th
                                                    class="px-6 py-3 text-sm font-bold text-gray-800 border border-gray-300">
                                                    Return</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablebody3">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>
        function toggleAccordion(id) {
            const content = document.getElementById(`content-${id}`);
            const arrow = document.getElementById(`arrow-${id}`);

            // Close all other accordions
            // for (let i = 1; i <= 2; i++) {
            //     if (i !== id) {
            //         const otherContent = document.getElementById(`content-${i}`);
            //         const otherArrow = document.getElementById(`arrow-${i}`);
            //         otherContent.classList.remove('open');
            //         otherArrow.classList.remove('rotate-180');
            //     }
            // }

            // Toggle current accordion
            if (content.classList.contains('open')) {
                content.classList.remove('open');
                arrow.classList.remove('rotate-180');
            } else {
                content.classList.add('open');
                arrow.classList.add('rotate-180');
            }
        }

    </script>
</body>

</html>