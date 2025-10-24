<!DOCTYPE html>
<html lang="en">

<?php
// printWithPre($_SESSION); 
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<style>
    @keyframes gradient-move {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>

<body class="bg-[#1a1a1a] overflow-hidden">

    <div class="flex">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');

        ?>

        <main class="flex-1 md:ml-[16.5rem] md:mt-[3.7rem] bg-[#f1f1f1] rounded-tr-3xl  h-[92vh] overflow-y-scroll pb-5">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-[85%]">
                <div class="flex items-center justify-center my-6">
                    <span class="text-xl font-semibold text-gray-800 flex w-[85%] flex items-center justify-start">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Edit Variant</span>
                </div>
            </div>
                        <div class="w-full flex items-center justify-center pb-4 ">

            <form action="" method="post" enctype="multipart/form-data">
                <!-- Form Card -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Card Header -->
                    <div class="bg-sky-500 px-4 py-3 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-white mb-0"><?= $pageTitle ?> Detail</h3>
                    </div>

                    <!-- Card Body -->
                    <div class="p-4">
                        <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-3 items-center">
                            <!-- Logo Field -->
                            <div>
                                <label for="logo" class="block text-base font-medium text-gray-700">
                                    Logo<strong class="ms-1 text-red-600">*</strong>
                                </label>
                                <input
                                    type="file"
                                    name="logo"
                                    placeholder="Select logo"
                                    id="logo"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <!-- Company Name Field -->
                            <div>
                                <label for="company" class="block text-base font-medium text-gray-700">
                                    Company Name<strong class="ms-1 text-red-600">*</strong>
                                </label>
                                <input
                                    type="text"
                                    name="company"
                                    value="<?= empty($company["company"]) ? "" : $company["company"] ?>"
                                    placeholder="Enter company name"
                                    id="company"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-1 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>


                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end md:mt-4">
                            <button
                                type="submit"
                                class="bg-sky-500 hover:bg-sky-600 text-white py-2 px-4 rounded transition duration-200 ease-in-out">
                                Save
                            </button>
                        </div>
                    </div>

                </div>
            </form>
                        </div>
        </main>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>

</body>

</html>