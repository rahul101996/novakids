<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-gray-50">

    <div class="flex h-screen bg-gray-100">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');


        ?>

        <main class="flex-1 md:ml-60">
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

            <div class="w-full text-sm">
                <!-- Table Header -->
                <div class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)] items-center gap-4 px-4 py-2 text-gray-500">
                    <span>Sr. No</span>
                    <span>Product</span>
                    <span>Status</span>
                    <span>KSU</span>
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
                        <div class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)] items-center gap-4 px-4 py-3 hover:bg-gray-50 text-gray-800">
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

                            <!-- Category -->
                            <div>
                                <p class="text-gray-500 font-semibold">0</p>
                            </div>

                            <!-- ✅ Price -->
                            <div>
                                <p class="text-gray-500 font-semibold"><?= $product['quantity'] ?></p>
                            </div>

                            <!-- Action -->
                            <div class="flex space-x-2">
                                <p class="text-gray-500 font-semibold"><?= $product['quantity'] ?></p>
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
</body>

</html>