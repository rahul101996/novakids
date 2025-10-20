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
                <span class="text-xl font-semibold text-gray-800">Inventory</span>
                <!-- <a href="/admin/add-collections" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add Collection</a> -->
            </div>
            <div class="p-3 border-b border-gray-200">
                <div class="flex justify-between items-center">

                    <div class="flex items-center space-x-1">
                        <button class="bg-gray-200 text-gray-800 px-3 py-1.5 rounded-md text-sm font-medium">All</button>

                    </div>
                    <div class="flex items-center space-x-1">
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h18M3 12h18M3 16h18" stroke-opacity="0.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h12M3 12h6" />
                            </svg>
                        </button>
                    </div>
                </div>
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
                                $headers = ['Product', 'Unavailable', 'Committed', 'Available', 'On Hand'];
                                foreach ($headers as $header): ?>
                                    <th class="font-semibold py-2 px-3 w-[20%] <?= ($header == 'Amount spent' ? 'text-right' : 'text-left') ?>">
                                        <?= $header ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <?php foreach ($products as $key => $product):
                                $images = json_decode($product['images'], true);
                                $variants = json_decode($product['options'], true);
                                $variants = json_decode($variants, true);
                                $images = array_reverse($images);
                            ?>
                                <tr
                                    class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] transition-all duration-200 ease-in-out">
                                    
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <div class="flex items-center justify-start gap-1">
                                            <img src="/<?= $images[0] ?>" class="w-16 rounded" alt="">
                                            <div class="flex flex-col gap-1">
                                                <p class="!mb-0"><?= $product['product_name'] ?></p>
                                                <?php
                                                foreach ($variants as $key => $variant) {
                                                ?>
                                                    <p class="!mb-0"><?= $key ?>: <?= $variant ?></p>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <input
                                            type="number"
                                            value="<?= $product['unavailable'] ?>"
                                            class="border rounded px-2 py-1 w-20 text-gray-700"
                                            oninput="updateQuantity(<?= $product['id'] ?>, this.value, 'unavailable')">
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <?= $product["committed"] ?>
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <input
                                            type="number"
                                            value="<?= $product['quantity'] ?>"
                                            class="border rounded px-2 py-1 w-20 text-gray-700"
                                            oninput="updateQuantity(<?= $product['id'] ?>, this.value, 'quantity')">
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <input
                                            type="number"
                                            value="<?= $product['on_hand'] ?>"
                                            class="border rounded px-2 py-1 w-20 text-gray-700"
                                            oninput="updateQuantity(<?= $product['id'] ?>, this.value, 'on_hand')">
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- Table Footer (Pagination) -->
                        <tfoot class="sticky bg-[#f7f7f7] bottom-0 left-0 border-t border-gray-200 shadow-sm z-10">
                            <tr>
                                <td colspan="5" class="py-3 px-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Showing 1–10 of <?= count($customers) ?> customers</span>
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


            <!-- old -->
            <div class="w-full text-sm">
                <!-- Table Header -->
                <div class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)_minmax(0,1fr)] items-center gap-4 px-4 py-2 text-gray-500">
                    <span>Sr. No</span>
                    <span>Product</span>
                    <span>Status</span>
                    <span>SKU</span>
                    <span>Unavailable</span>
                    <span>Committed</span>
                    <span>Available</span>
                    <span>On Hand</span>
                </div>

                <?php foreach ($products as $key => $product) {
                    $images = json_decode($product['images'], true);
                    $variants = json_decode($product['options'], true);
                    $variants = json_decode($variants, true);
                    // printWithPre($variants);


                    // printWithPre($var);

                    $images = array_reverse($images);
                ?>
                    <div class="divide-y divide-gray-200">
                        <!-- Table Row -->
                        <div class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)_minmax(0,1fr)] items-center gap-4 px-4 py-3 hover:bg-gray-50 text-gray-800">
                            <!-- Sr. No -->
                            <div class="flex items-center space-x-3">
                                <span><?= $key + 1 ?></span>
                                <svg class="h-4 w-4 text-gray-400 cursor-grab" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="6" r="1.5" />
                                    <circle cx="15" cy="6" r="1.5" />
                                    <circle cx="9" cy="12" r="1.5" />
                                    <circle cx="15" cy="12" r="1.5" />
                                    <circle cx="9" cy="18" r="1.5" />
                                    <circle cx="15" cy="18" r="1.5" />
                                </svg>
                            </div>

                            <!-- Product -->
                            <div class="font-medium">
                                <div class="flex items-center justify-start gap-1">
                                    <img src="/<?= $images[0] ?>" class="w-16 rounded" alt="">
                                    <div class="flex flex-col gap-1">
                                        <p class="!mb-0"><?= $product['product_name'] ?></p>
                                        <?php
                                        foreach ($variants as $key => $variant) {
                                        ?>
                                            <p class="!mb-0"><?= $key ?>: <?= $variant ?></p>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div>

                            </div>

                            <!-- Inventory -->
                            <div>
                                <p class="text-gray-500 font-semibold"></p>
                            </div>

                            <div>
                                <input
                                    type="number"
                                    value="<?= $product['unavailable'] ?>"
                                    class="border rounded px-2 py-1 w-20 text-gray-700"
                                    oninput="updateQuantity(<?= $product['id'] ?>, this.value, 'unavailable')">
                            </div>

                            <!-- Category -->
                            <div>
                                <p class="text-gray-500 font-semibold"><?= $product["committed"] ?></p>
                            </div>

                            <!-- ✅ Price -->
                            <div>
                                <input
                                    type="number"
                                    value="<?= $product['quantity'] ?>"
                                    class="border rounded px-2 py-1 w-20 text-gray-700"
                                    oninput="updateQuantity(<?= $product['id'] ?>, this.value, 'quantity')">
                            </div>

                            <!-- ✅ On Hand -->
                            <div>
                                <input
                                    type="number"
                                    value="<?= $product['on_hand'] ?>"
                                    class="border rounded px-2 py-1 w-20 text-gray-700"
                                    oninput="updateQuantity(<?= $product['id'] ?>, this.value, 'on_hand')">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>
        async function updateQuantity(productId, value, type) {
            try {
                let formData = new FormData();
                formData.append("id", productId);
                formData.append("quantity", value);
                formData.append("field", type);

                let response = await fetch("/admin/api/update-quantity", {
                    method: "POST",
                    body: formData
                });


                let data = await response.json();

                if (data.success) {
                    // console.log("Updated successfully");
                    toastr.success("Updated successfully");

                } else {
                    // console.error("Update failed:", data.message);
                    toastr.error("Something wen't wrong");
                }
            } catch (error) {
                console.error("Error:", error);
            }
        }
    </script>

</body>

</html>