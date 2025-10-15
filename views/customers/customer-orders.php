<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-gray-100">

    <div class="flex h-screen ">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');

        ?>

        <main class="flex-1 md:ml-60">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-full flex items-center justify-between p-3">
                <span class="text-xl font-semibold text-gray-800">Orders List</span>

            </div>
            <div class="w-full flex items-center justify-center flex-col gap-2">
                <?php
                foreach ($PurchaseData as $key => $LastOrder) {
                    $LastOrderid = $LastOrder["id"];
                    $products = getData2("SELECT tbl_purchase_item.*, tbl_products.name as product_name, tbl_variants.images as variant_images, tbl_variants.options as variant_options, tbl_variants.price as variant_price FROM `tbl_purchase_item` LEFT JOIN tbl_products ON tbl_purchase_item.product = tbl_products.id LEFT JOIN tbl_variants ON tbl_purchase_item.varient = tbl_variants.id WHERE tbl_purchase_item.purchase_id = $LastOrderid ORDER BY tbl_purchase_item.id DESC");
                ?>
                    <div class="p-4 w-[80%] bg-white shadow-md rounded-lg">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <span class="text-blue-600 font-medium">#<?= $LastOrder['orderid'] ?></span>
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-orange-100 text-orange-800 rounded"><?= $LastOrder['payment_status'] ?></span>
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded"><?= $LastOrder['payment_mode'] ?></span>
                            </div>
                            <span
                                class="font-semibold">₹<?= formatNumber($LastOrder['total_amount']) ?></span>
                        </div>
                        <div class="text-sm text-gray-600 mb-4">
                            <?= formatDateTime($LastOrder['created_at']) ?> from
                            <i class="fas fa-store text-green-600 mx-1"></i>
                            <span class="font-medium">Online Store</span>
                        </div>

                        <!-- Order Item -->
                        <?php
                        foreach ($products as $key => $product) {
                            $images = json_decode($product['variant_images'], true);
                            $variants = json_decode($product['variant_options'], true);
                            $variants = json_decode($variants, true);

                            $images = array_reverse($images);

                        ?>
                            <div class="w-full border border-gray-300 flex flex-col items-center">
                                <div class="w-full p-2 flex items-center justify-between">
                                    <div class="w-[80%] flex items-start justify-start">
                                        <img src="/<?= $images[0] ?>" class="h-24" alt="">
                                        <div class="flex flex-col items-start justify-center ml-3">
                                            <h3 class="font-semibold text-base !mb-0">
                                                <?= $product['product_name'] ?>
                                            </h3>
                                            <?php
                                            foreach ($variants as $key => $variant) {
                                            ?>
                                                <p class="!mb-0 text-xs text-gray-600 uppercase"><?= $key ?>:
                                                    <?= $variant ?>
                                                </p>

                                            <?php } ?>
                                            <!-- <h3 class="text-sm text-gray-600">Size : XS</h3> -->
                                            <h3 class="text-sm text-gray-600 mt-2"> <?= $product['quantity'] ?>
                                                x ₹<?= formatNumber($product['amount']) ?></h3>

                                        </div>
                                    </div>
                                    <div
                                        class="w-[20%] flex items-center justify-center flex-col gap-2 font-semibold">
                                        ₹<?= formatNumber($product['total_amount']) ?>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>

                       
                    </div>
                <?php } ?>
            </div>







        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
</body>

</html>