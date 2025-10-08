<?php
        // printWithPre($freeshipping);
        // die();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-gray-50 bg-gray-100">

    <div class="flex h-screen ">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');


        ?>

        <main class="flex w-full flex-col items-center justify-start md:ml-60">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-[85%]">
                <div class="flex items-center my-6">
                    <button class="text-gray-500 hover:text-gray-700">
                        <span class="material-icons">arrow_back</span>
                    </button>
                    <h1 class="text-2xl font-semibold ml-2">Free shipping</h1>
                </div>
            </div>
            <form action="" method="POST" class="w-[85%]" enctype="multipart/form-data">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full pb-10">
                    <div class="lg:col-span-2 flex flex-col gap-6">

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Price</label>
                            <input
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                value="<?= isset($freeshipping['price']) && !empty($freeshipping['price']) ? $freeshipping['price'] : '' ?>" name="price" id="price" type="text" />

                            <label class="block text-sm font-medium text-gray-700 mt-6 mb-1" for="description">Active Free Shipping</label>
                            <div class="border border-gray-300 rounded-md px-4 py-3">
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