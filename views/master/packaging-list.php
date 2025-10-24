<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-[#1a1a1a] overflow-hidden">

    <div class="flex">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');

        ?>

        <main class="flex-1 md:ml-[16.5rem] md:mt-[3.7rem] bg-[#f1f1f1] rounded-tr-3xl  h-[92vh] overflow-y-scroll">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-full flex items-center justify-between p-3">
                <span class="text-xl font-semibold text-gray-800">Packaging</span>
                <a href="/admin/add-packaging" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add Packaging</a>
            </div>
            <div class="w-full flex items-center justify-center pb-4">
                <div class="w-[97%] flex items-start justify-center gap-3 flex-col bg-white rounded-2xl">
                    <div class="w-full flex items-center justify-between mt-2 px-2">
                        <div class="relative w-[45vw]">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#626262">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" placeholder="Search Customers" class="bg-white w-full pl-10 pr-4 py-1 rounded-xl border border-gray-300 focus:border-gray-600 focus:bg-gray-200 placeholder:text-[#626262] outline-none transition">

                        </div>

                    </div>
                    <table class="w-full text-sm">
                        <!-- Table Header -->
                        <thead class="sticky top-0 left-0 shadow-sm z-10">
                            <tr class="bg-[#f7f7f7] text-[#616161] border-y border-gray-200">
                                <?php
                                $headers = ['Sr. No.', 'Package', 'Action'];
                                foreach ($headers as $header): ?>
                                    <th class="font-semibold py-2 px-3  <?= ($header == 'Action' ? 'text-right' : 'text-left') ?>">
                                        <?= $header ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <?php foreach ($packages as $key => $package) :

                            ?>
                                <tr
                                    class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] transition-all duration-200 ease-in-out">
                                    <td class="font-semibold py-2 px-3 text-left"><?= $key + 1 ?></td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <div class="flex items-center w-full justify-start rounded gap-6">
                                            <?php
                                            if ($package['package_type'] == "box") {
                                                echo '<i class="fa-solid fa-box text-gray-500 text-xl"></i>';
                                            } elseif ($package['package_type'] == "envelope") {
                                                echo '<i class="fa-solid fa-envelope-open text-gray-500 text-xl"></i>';
                                            } else {
                                                echo '<i class="fa-solid fa-door-closed text-gray-500 text-xl"></i>';
                                            }

                                            ?>
                                            <div class="flex flex-col items-start justify-start">
                                                <div class="text-gray-800 text-xl mb-0 flex items-center gap-2 justify-start">
                                                    <p class="text-sm mb-0"><?= $package['package_name'] ?></p>
                                                    <?php
                                                    if ($package['is_default'] == 1) {
                                                        echo '<span class="text-gray-500 bg-white px-3 py-1 rounded-full text-xs border border-gray-300">Store default</span>';
                                                    }
                                                    ?>
                                                </div>
                                                <div class="flex items-center justify-start mt-1 text-gray-600 gap-3 text-xs">
                                                    <span><?= $package['length'] ?></span>
                                                    <span>X</span>
                                                    <span><?= $package['width'] ?></span>
                                                    <span>X</span>
                                                    <span><?= $package['height'] ?></span> :
                                                    <span><?= $package['dimentions_unit'] ?></span>
                                                    <span class="ml-4"><?= $package['weight'] ?></span>
                                                    <span><?= $package['weight_unit'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="font-semibold py-2 px-3 text-right">
                                        <div class="flex space-x-2 justify-end">
                                            <a href="/edit-package/<?= $package['id'] ?>" class="text-black hover:text-black"><i class="fa-solid fa-pen"></i></a>
                                            <a href="/delete-package/<?= $package['id'] ?>" class="text-red-700 hover:text-red-700"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- Table Footer (Pagination) -->
                        <tfoot class="sticky bg-[#f7f7f7] bottom-0 left-0 border-t border-gray-200 shadow-sm z-10">
                            <tr>
                                <td colspan="5" class="py-3 px-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Showing 1–10 of 100 customers</span>
                                        <div class="flex items-center gap-1">
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-100 transition">Prev</button>
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg bg-gray-100 font-medium">1</button>
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-100 transition">2</button>
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-100 transition">Next</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

           


        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
</body>

</html>