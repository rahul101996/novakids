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
                <button id="exportStockBtn" class="bg-gray-800 text-sm font-semibold py-1 px-4 rounded-lg text-white">
                    Export
                </button>

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


            <!-- old -->

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
<script>
document.getElementById("exportStockBtn").addEventListener("click", async () => {
    try {
        const response = await axios({
            url: "/admin/export-products-stock",
            method: "POST",
            responseType: "blob"
        });

        const blob = new Blob([response.data], { type: "text/csv" });
        const url = window.URL.createObjectURL(blob);

        const link = document.createElement("a");
        link.href = url;
        link.download = "products_stock.csv";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        window.URL.revokeObjectURL(url);
    } catch (error) {
        console.error("Export failed:", error);
        toastr.error("Something went wrong while exporting product stock.");
    }
});
</script>

</body>

</html>