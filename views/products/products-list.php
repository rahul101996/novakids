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
                <span class="text-xl font-semibold text-gray-800 flex">
                    <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Products
                </span>
                <div>
                    <button class="bg-[#d4d4d4] text-xs font-semibold py-2 px-3 rounded-lg text-gray-800">Import</button>
                    <button class="bg-[#d4d4d4] text-xs font-semibold py-2 px-3 rounded-lg text-gray-800">Export</button>
                    <button class="bg-gray-800 text-xs font-semibold py-2 px-3 rounded-lg text-white">Add Product</button>
                </div>
            </div>
            <div class="w-full flex items-center justify-center">
                <div class="w-[97%] grid grid-cols-4 items-center justify-start gap-1 bg-white rounded-xl border border-gray-300 shadow-sm">
                    <div class="w-full flex items-start justify-start flex-col  p-2 px-3  border-r border-gray-300">
                        <span class="text-sm  font-semibold ">
                            <i class="fa-regular fa-calendar" aria-hidden="true"></i> 30 Days
                        </span>

                    </div>
                    <div class="w-full flex items-start justify-start flex-col  p-2 px-3 border-r border-gray-300 h-full">
                        <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                            Active Products
                        </span>

                        <span class="mt-1 font-semibold">0 --</span>
                    </div>
                    <div class="w-full flex items-start justify-center flex-col  p-2 px-3 border-r border-gray-300 h-full">
                        <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                            New Arrivals
                        </span>

                        <span class="mt-1 font-semibold"><?= $totalTodayOrders ?>0 --</span>
                    </div>
                    <div class="w-full flex items-start justify-start flex-col  p-2 px-3 border-r border-gray-300 h-full">
                        <span class="text-sm border-b  border-dashed border-gray-500 font-semibold py-1 rounded">
                            Out of stock
                        </span>

                        <span class="mt-1 font-semibold">0 --</span>
                    </div>

                </div>
            </div>

            <div class="w-full flex items-center justify-center pb-4 mt-4">
                <div class="w-[97%] flex items-start justify-center gap-3 flex-col bg-white rounded-2xl overflow-y-auto">
                    <div class="w-full flex items-center justify-between mt-2 px-2">
                        <div class="relative w-[45vw]">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#626262">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" placeholder="Search Products" class="bg-white w-full pl-10 pr-4 py-1 rounded-xl  focus:border-gray-200 focus:bg-gray-100 placeholder:text-[#626262] outline-none transition">

                        </div>

                    </div>
                    <table class="w-full text-xs">
                        <!-- Table Header -->
                        <thead class="sticky top-0 left-0 shadow-sm z-10">
                            <tr class="bg-[#f7f7f7] text-[#616161] border-y border-gray-200">
                                <?php
                                $headers = ['Product', 'Status', 'Inventory', 'Category', 'Price', 'New Arrival', 'Action'];

                                foreach ($headers as $header): ?>
                                    <th class="font-semibold py-2 px-3 w-[20%] <?= ($header == 'Amount spent' ? 'text-right' : 'text-left') ?> text-nowrap">
                                        <?= $header ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <?php foreach (getData2("SELECT tp.*, tc.category AS category_name FROM `tbl_products` tp LEFT JOIN tbl_category tc ON tp.category = tc.id") as $key => $product):
                                $images = json_decode($product['product_images'], true);
                                $images = array_reverse($images);
                                $variants = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = '$product[id]'");
                                $TotalVariants = count($variants);
                                $quantity = 0;
                                foreach($variants as $variant){
                                    
                                    $quantity += $variant['quantity'];
                                }
                                //  printWithPre($PurchaseItems);
                            ?>
                                <tr
                                    class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 
                           hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] 
                           transition-all duration-200 ease-in-out">
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <div class="flex items-center justify-start gap-6">
                                            <img src="/<?= $images[0] ?>" class="h-10 rounded" alt="">
                                            <?= $product['name'] ?>
                                        </div>
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <div class="relative inline-block w-14 mr-2 align-middle select-none">
                                            <input type="checkbox" id="togglr_arrival_<?= $product['id'] ?>"
                                                <?= $product['new_arrival'] == 1 ? 'checked' : '' ?>
                                                onchange="updateNewArrival(this, <?= $product['id'] ?>)"
                                                class="sr-only peer">

                                            <label for="togglr_arrival_<?= $product['id'] ?>"
                                                class="block overflow-hidden h-7 rounded-full bg-gray-200 cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-[#06402b] before:content-[''] before:absolute before:top-0.5 before:left-0.5 before:bg-sky-50 before:border-2 before:border-gray-300 before:h-6 before:w-6 before:rounded-full before:transition-all before:duration-300 before:shadow-md peer-checked:before:translate-x-7 peer-checked:before:border-sky-800">
                                                <span
                                                    class="absolute inset-y-0 left-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-sky-50 peer-checked:translate-x-7">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                <span
                                                    class="absolute inset-y-0 right-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left"><?= $quantity ?> in stock for <?= $TotalVariants ?> variants</td>
                                    <td class="font-semibold py-2 px-3 text-left"><?= $product['category_name'] ?></td>
                                    <td class="font-semibold py-2 px-3 text-left text-nowrap">₹ <?= formatNumber($product['price']) ?></td>

                                    <td class="font-semibold py-2 px-3 text-left">
                                        <div class="relative inline-block w-14 mr-2 align-middle select-none">
                                            <input type="checkbox" id="togglr_status_<?= $product['id'] ?>"
                                                <?= $product['status'] == 1 ? 'checked' : '' ?>
                                                onchange="updateProductStatus(this, <?= $product['id'] ?>)"
                                                class="sr-only peer">

                                            <label for="togglr_status_<?= $product['id'] ?>"
                                                class="block overflow-hidden h-7 rounded-full bg-gray-200 cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-[#06402b] before:content-[''] before:absolute before:top-0.5 before:left-0.5 before:bg-sky-50 before:border-2 before:border-gray-300 before:h-6 before:w-6 before:rounded-full before:transition-all before:duration-300 before:shadow-md peer-checked:before:translate-x-7 peer-checked:before:border-sky-800">
                                                <span
                                                    class="absolute inset-y-0 left-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-sky-50 peer-checked:translate-x-7">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                <span
                                                    class="absolute inset-y-0 right-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-right"><a href="/admin/edit-product/<?= $product['id'] ?>"
                                            class="text-blue-500 hover:text-blue-600"><i class="fa-solid fa-pen"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- Table Footer (Pagination) -->
                        <tfoot class="sticky bg-[#f7f7f7] bottom-0 left-0 border-t border-gray-200 shadow-sm z-10">
                            <tr>
                                <td colspan="8" class="py-3 px-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Showing 1–10 of 50 customers</span>
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

    <script>
        async function updateStatusGeneric(ele, id, endpoint) {
            let data = {
                id,
                status: ele.checked ? "1" : "0"
            };

            ele.disabled = true;
            const label = ele.closest('div').querySelector('label');
            label.classList.add('opacity-70');

            try {
                let res = await fetch(endpoint, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data),
                });

                let response = await res.json();

                if (response.success) {
                    toastr.success(response.message);
                } else {
                    ele.checked = !ele.checked;
                    toastr.error(response.message);
                }
            } catch (e) {
                ele.checked = !ele.checked;
                toastr.error("Something went wrong!");
                console.error(e);
            } finally {
                ele.disabled = false;
                label.classList.remove('opacity-70');
            }
        }

        function updateNewArrival(ele, id) {
            updateStatusGeneric(ele, id, '/api/new_arrival/status');
        }

        function updateProductStatus(ele, id) {
            updateStatusGeneric(ele, id, '/api/product/status');
        }
    </script>
</body>

</html>