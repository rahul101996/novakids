<?php
// printWithPre($freeshipping);
// die();
?>
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
            <div class="w-full flex items-center justify-center p-3">
                <span class="text-xl font-semibold text-gray-800 flex items-center w-[87%]"> <img src="/public/icons/discount.png" class="h-6 mr-2" alt="">
                    Discount
                </span>
                <!-- <a href="/admin/add-coupon" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Free Shipping</a> -->
            </div>
            <div class="w-full flex items-center justify-center pb-4 ">

                <form action="" method="POST" class="w-[85%]" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full pb-10">
                        <div class="lg:col-span-2 flex flex-col gap-6">

                            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Discount Percentage</label>
                                <input
                                    class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1" placeholder="%"
                                    value="<?= isset($discount['discount']) && !empty($discount['discount']) ? $discount['discount'] : '' ?>" name="discount" id="discount" type="text" />

                                <label class="block text-sm font-medium text-gray-700 mt-3" for="title">Select Products</label>
                                <div class="w-full flex items-center justify-center pb-4 ">
                                    <div class="w-[97%] flex items-start justify-center gap-3 flex-col bg-white rounded-2xl overflow-y-auto">
                                        <div class="w-full flex items-center justify-between mt-2 ">
                                            <div class="relative w-[45vw]">
                                                <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#626262">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                                <input type="text" placeholder="Search Products" class="bg-white w-full pl-10 pr-4 py-1 rounded-xl  focus:border-gray-200 border-[1px] border-gray-600 focus:bg-gray-100 placeholder:text-[#626262] outline-none transition">

                                            </div>

                                        </div>
                                        <table class="w-full text-xs">
                                            <!-- Table Header -->
                                            <thead class="sticky top-0 left-0 shadow-sm z-10">
                                                <tr class="bg-[#f7f7f7] text-[#616161] border-y border-gray-200">
                                                    <th class="font-semibold py-2 px-3  text-nowrap">
                                                        <div class="flex items-center justify-center">
                                                            <input type="checkbox" id="selectAll" class="filter-checkbox accent-[#f25b21] cursor-pointer">
                                                        </div>
                                                    </th>
                                                    <?php
                                                    $headers = ['Product', 'Inventory', 'Category', 'Price'];

                                                    foreach ($headers as $header): ?>
                                                        <th class="font-semibold py-2 px-3  <?= ($header == 'Amount spent' ? 'text-right' : 'text-left') ?> text-nowrap">
                                                            <?= $header ?>
                                                        </th>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </thead>

                                            <!-- Table Body -->
                                            <tbody id="TableBody">
                                                <?php foreach ($products as $key => $product):
                                                    $images = json_decode($product['product_images'], true);
                                                    $images = array_reverse($images);
                                                    $variants = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = '$product[id]'");
                                                    $TotalVariants = count($variants);
                                                    $quantity = 0;
                                                    foreach ($variants as $variant) {

                                                        $quantity += $variant['quantity'];
                                                    }
                                                    $ids = json_decode($discount['product_id'], true);
                                                    // printWithPre($ids)
                                                    foreach ($ids as $id) {
                                                        if ($id == $product['id']) {
                                                            $checked = 'checked';
                                                            break;
                                                        } else {
                                                            $checked = '';
                                                        }
                                                    }
                                                    //  printWithPre($PurchaseItems);
                                                ?>
                                                    <tr
                                                        class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 
                                                        hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] 
                                                        transition-all duration-200 ease-in-out">
                                                        <td>
                                                            <div class="flex items-center justify-center">
                                                                <input type="checkbox" value="<?= $product['id'] ?>" name="product_id[]" <?= $checked ?> class="variant-checkbox accent-[#f25b21]">
                                                            </div>
                                                        </td>
                                                        <td class="font-semibold py-2 px-3 text-left">
                                                            <div class="flex items-center justify-start gap-6">
                                                                <img src="/<?= $images[0] ?>" class="h-10 rounded" alt="">
                                                                <?= $product['name'] ?>
                                                            </div>
                                                        </td>

                                                        <td class="font-semibold py-2 px-3 text-left"><?= $quantity ?> in stock for <?= $TotalVariants ?> variants</td>
                                                        <td class="font-semibold py-2 px-3 text-left"><?= $product['category_name'] ?></td>
                                                        <td class="font-semibold py-2 px-3 text-left text-nowrap">₹ <?= formatNumber($product['price']) ?></td>



                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>

                                            <!-- Table Footer (Pagination) -->

                                        </table>



                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>

                    <?php

                    if (isset($freeshipping['free_shipping'])) {
                    ?>
                        <input type="hidden" value="<?= $freeshipping['id'];  ?>" name="id">
                    <?php } ?>
                    <div class="w-[85%]">
                        <button class="bg-black border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="<?= isset($freeshipping['free_shipping']) ? 'update' : 'add' ?>">Save</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
   
    <script>
        // Get the Select All checkbox
        const selectAllCheckbox = document.getElementById('selectAll');
        // Get all individual variant checkboxes
        const variantCheckboxes = document.querySelectorAll('.variant-checkbox');

        // Function to update Select All state
        function updateSelectAllState() {
            const allChecked = Array.from(variantCheckboxes).every(cb => cb.checked);
            selectAllCheckbox.checked = allChecked;
        }

        // On load: check initial state
        updateSelectAllState();

        // When Select All is changed
        selectAllCheckbox.addEventListener('change', function() {
            variantCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        // When any checkbox changes
        variantCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectAllState);
        });
    </script>

</body>

</html>