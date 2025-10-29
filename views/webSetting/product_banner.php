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
                <span class="text-xl font-semibold text-gray-800">Product Banner</span>
                <!-- <a href="/admin/front-cms/product-banner/add" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add
                    Product Banner</a> -->
            </div>
            <div class="w-full flex items-center justify-center pb-4">
                <div class="w-[97%] flex items-start justify-center gap-3 flex-col bg-white rounded-2xl">
                    <div class="w-full flex items-center justify-between mt-2 px-2">
                        
                    </div>
                    <table class="w-full text-sm">
                        <!-- Table Header -->
                        <thead class="sticky top-0 left-0 shadow-sm z-10">
                            <tr class="bg-[#f7f7f7] text-[#616161] border-y border-gray-200">
                                <?php
                                $headers = ['Sr. No.', 'Product', 'Banner', 'Action'];
                                foreach ($headers as $header): ?>
                                    <th class="font-semibold py-2 px-3 w-[20%] <?= ($header == 'Action' ? 'text-right' : 'text-left') ?>">
                                        <?= $header ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <?php foreach (getData2("SELECT tpb.*, tp.name AS product_name FROM `tbl_product_banner` tpb LEFT JOIN tbl_products tp on tpb.product_id = tp.id WHERE 1") as $key => $banner):

                            ?>
                                <tr
                                    class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] transition-all duration-200 ease-in-out">
                                    <td class="font-semibold py-2 px-3 text-left"><?= $key + 1 ?></td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <?= htmlspecialchars($banner['product_id']) ?>
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <img src="/<?= htmlspecialchars($banner['file']) ?>" class="h-24 rounded"
                                            alt="Category Image">
                                    </td>

                                    <td class="font-semibold py-2 px-3 text-right">
                                        <div class="flex space-x-2 justify-end">
                                            <a href="product-banner/edit/<?= $banner['id'] ?>"
                                                class="text-black text-sm hover:text-black"><i class="fa-solid fa-pen"></i></a>
                                            <!-- <a href="/delete/<?= $banner['id'] ?>" class="text-red-500 hover:text-red-600"><i
                                        class="fa-solid fa-trash"></i></a> -->
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