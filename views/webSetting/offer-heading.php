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


            <div class="mb-4 bg-white rounded-lg shadow-md m-6">
                <!-- Card Header - Changed from amber to sky -->
                <div class="bg-sky-900 px-4 py-3 rounded-t-lg">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white mb-0"><?= htmlspecialchars($pageTitle) ?></h3>
                        <!-- <a href="/in-out/out/list" class="bg-white text-sky-600 hover:bg-sky-50 px-3 py-2 rounded flex items-center text-sm font-medium transition-colors duration-200">
                                <i class="fa fa-bars"></i>&emsp; List
                            </a> -->
                    </div>
                </div>

                <div class=" p-6 rounded-lg shadow-md">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="grid grid-cols-1 gap-x-6 gap-y-5 md:grid-cols-2 lg:grid-cols-3">

                            <div class="space-y-1">
                                <label for="title" class="block text-sm font-medium text-gray-700">
                                    Title <span class="text-red-600 ml-1">*</span>
                                </label>
                                <input type="text" name="title" id="title"
                                    value="<?= !empty($editData) ? $editData['title'] : '' ?>" placeholder="Enter Title"
                                    class="border border-gray-300 rounded-md shadow-md text-sm py-2 px-3 w-full focus:outline-none focus:border-blue-500"
                                    required>
                            </div>

                        </div>

                        <div class="flex justify-end max-md:justify-center pt-4">
                            <button type="submit"
                                class="bg-sky-900 hover:bg-sky-600 text-white mr-4 px-5 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                <?= !empty($editData) ? "Update" : "Submit" ?>
                            </button>
                            <button type="button" onclick="history.back()"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mb-4 bg-white rounded-lg shadow-md m-6">
                <!-- Card Header - Changed from amber to sky -->
                <div class="bg-sky-900 px-4 py-3 rounded-t-lg">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-white mb-0"><?= htmlspecialchars($pageTitle) ?> List</h3>
                        <!-- <a href="/in-out/out/list" class="bg-white text-sky-600 hover:bg-sky-50 px-3 py-2 rounded flex items-center text-sm font-medium transition-colors duration-200">
                                <i class="fa fa-bars"></i>&emsp; List
                            </a> -->
                    </div>
                </div>

                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border border-gray-300 shadow-md rounded-lg" id="myTable">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-bold text-gray-800 border border-gray-300">
                                        #</th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-bold text-gray-800 border border-gray-300">
                                        Heading</th>
                                    <th
                                        class="px-6 py-3 text-left text-sm font-bold text-gray-800 border border-gray-300">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (getData2("SELECT * FROM tbl_offer_heading ORDER BY id DESC") as $key => $value) {
                                    ?>
                                    <tr class="border border-gray-300">
                                        <td class="px-6 py-2 text-sm border border-gray-300"><?= $key + 1 ?></td>
                                        <td class="px-6 py-2 text-sm border border-gray-300">
                                            <?= $value["title"] ?>
                                        </td>
                                        <td class="px-6 py-2 text-sm border border-gray-300">
                                            <div class="flex space-x-2">
                                                <a href="/admin/front-cms/offer-heading/edit/<?= $value["id"] ?>"
                                                    class="bg-sky-500 hover:bg-sky-600 px-3 py-2 rounded text-white">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a onclick="return confirm('Are you sure?')"
                                                    href="/admin/front-cms/offer-heading/delete/<?= $value["id"] ?>"
                                                    class="bg-red-500 hover:bg-red-600 px-3 py-2 rounded text-white">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>

    </script>
</body>

</html>