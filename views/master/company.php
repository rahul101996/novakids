<!DOCTYPE html>
<html lang="en">


<body class="hold-transition sidebar-mini layout-fixed">


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";
    ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper min-h-screen">
        <div class="container-fluid md:px-4 px-3 py-6">
            <!-- Modal -->
            <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        test
                    </div>
                </div>
            </div>

            <main class="max-w-full mx-auto">
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
            </main>
        </div>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>

</body>

</html>