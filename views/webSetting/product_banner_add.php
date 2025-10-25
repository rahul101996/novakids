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
                <span class="text-xl font-semibold text-gray-800 w-[87%]">Add product banner</span>
                <!-- <a href="/admin/add-collections" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add Collection</a> -->
            </div>
            <div class="w-full flex items-center justify-center pb-4 ">

                <form action="" method="POST" class="w-[85%]" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-[65%] pb-10">
                        <div class="lg:col-span-2 flex flex-col gap-6">

                            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="product_id">Product</label>
                                <select name="product_id" class="selectElement" id="product_id">
                                    <option value="" selected disabled>Select Product</option>
                                    <?php foreach (getData2("SELECT * FROM `tbl_products` WHERE `status` = 1") as $key => $value) { ?>
                                        <option
                                            value="<?= $value['id'] ?>"
                                            <?= isset($editData['product_id']) && $editData['product_id'] == $value['id'] ? 'selected' : '' ?>>
                                            <?= $value['name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="lg:col-span-2 flex flex-col gap-6">

                            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                                <h2 class="text-base font-medium text-gray-900">Home Banner</h2>
                                <div
                                    class="space-y-1 text-center flex flex-col items-center border-2 border-gray-300 border-dashed rounded-lg p-8">

                                    <div id="imagePreview" class="<?= isset($editData['file']) ? '' : 'hidden' ?> mb-4">
                                        <input type="hidden" name="old_image"
                                            value="<?= isset($editData['file']) ? $editData['file'] : '' ?>">
                                        <img src="/<?= isset($editData['file']) ? $editData['file'] : '' ?>" alt="Preview"
                                            class="mx-auto h-32 object-cover">
                                    </div>
                                    <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="vdata_image"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                            <span>Upload a file</span>
                                            <input id="vdata_image" name="img" type="file" class="sr-only" accept="image/*"
                                                <?= isset($editData['file']) ? '' : 'required' ?>>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>

                        </div>
                       <div class="w-full flex items-center justify-center">
                        <div class="flex flex-col items-center justify-center">

                        </div>
                       </div>
                    </div>
                    <div class="w-[85%]">
                        <button
                            class="bg-black border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            name="<?= isset($homeBanner['id']) ? 'update' : 'add' ?>">Save</button>
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