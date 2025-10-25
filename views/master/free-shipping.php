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
                <span class="text-xl font-semibold text-gray-800 flex items-center w-[87%]"> <img src="/public/icons/free-shipping.png" class="h-6 mr-2" alt="">
                    Free Shipping
                </span>
                <!-- <a href="/admin/add-coupon" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Free Shipping</a> -->
            </div>
            <div class="w-full flex items-center justify-center pb-4 ">

                <form action="" method="POST" class="w-[85%]" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full pb-10">
                        <div class="lg:col-span-2 flex flex-col gap-6">

                            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Price</label>
                                <input
                                    class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1"
                                    value="<?= isset($freeshipping['price']) && !empty($freeshipping['price']) ? $freeshipping['price'] : '' ?>" name="price" id="price" type="text" />

                                <label class="block text-sm font-medium text-gray-700 mt-6 mb-1" for="description">Active Free Shipping</label>
                                <div class="border-[1px] border-gray-600 rounded-md px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        <input id="free_shipping" name="free_shipping" type="checkbox"
                                            class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500" <?= isset($freeshipping['free_shipping']) && ($freeshipping['free_shipping'] == '1') ? 'checked' : '' ?> />
                                        <label for="free_shipping" class="text-sm text-gray-700">Enable Free Shipping</label>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">If this is checked, free delivery will be applicable.</p>
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
        const imageInput = document.getElementById('vdata_image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = imagePreview.querySelector('img');



        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>