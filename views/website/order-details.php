<?php

?>
<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>



<body class="">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <div class="w-full flex items-center justify-center py-16">
        <div class="w-[80%] flex flex-col ">
            <div class="py-5 px-3 w-full border border-gray-300">
                <h1>Returnable/Exchangeable Products</h1>
            </div>
            <?php
            foreach ($products as $product) {



            ?>
                <div class="w-full border border-gray-300 flex flex-col items-center">
                    <div class="w-full p-5 flex items-center justify-between">
                        <div class="w-[80%] flex items-start justify-start">
                            <img src="/public/uploads/category/68d4df5947a16_olive-faded-loose-fit-pants-xs-bonkerscorner-store-33693672439908_960x_crop_center.webp" class="h-24" alt="">
                            <div class="flex flex-col items-start justify-center ml-5">
                                <h3 class="font-semibold">Olive Faded Loose Fit Pants</h3>
                                <h3 class="text-sm text-gray-600">Size : XS</h3>
                                <h3 class="text-sm text-gray-600 mt-3"> 1 x ₹1,999</h3>

                            </div>
                        </div>
                        <div class="w-[20%] flex items-center justify-center flex-col gap-2">
                            <button class="bg-gray-900 py-2 px-4 text-white w-full"><i class="fa-solid fa-right-left"></i> &ensp;Exchange</button>
                            <button class="bg-gray-900 py-2 px-4 text-white w-full"><i class="fa-solid fa-arrow-left"></i> &ensp;Return</button>
                        </div>
                    </div>
                    <div class="w-full bg-blue-50 p-4 flex items-center justify-between">
                        <div class="flex items-center justify-center gap-3">
                            <img src="/public/icons/clock.png" class="h-8" alt="">
                            <div class="flex flex-col items-start justify-start">
                                <span class="text-sm">Exchange Before</span>
                                <span class="text-gray-500 text-xs">OCT 12th 2025</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-center gap-3">
                            <img src="/public/icons/clock.png" class="h-8" alt="">
                            <div class="flex flex-col items-start justify-start">
                                <span class="text-sm">Exchange Before</span>
                                <span class="text-gray-500 text-xs">OCT 12th 2025</span>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


</body>

</html>