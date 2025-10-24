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
                <span class="text-xl font-semibold text-gray-800 w-[87%]">Add Packaging</span>
                <!-- <a href="/admin/add-collections" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add Collection</a> -->
            </div>
             <div class="w-full flex items-center justify-center pb-4 ">

                <form action="" method="POST" class="w-[85%]" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-[95%] pb-10">
                    <div class="lg:col-span-2 flex flex-col gap-6">

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Package Type</label>
                            <div class="w-full flex items-center justify-start mt-2">
                                <select name="package_type" id="package_type" class="selectElement w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                                    <option value="">-- Select a Product --</option>
                                    <option value="box" <?= ($package['package_type'] == 'box') ? 'selected' : '' ?>>BOX</option>
                                    <option value="envelope" <?= ($package['package_type'] == 'envelope') ? 'selected' : '' ?>>ENVELOPE</option>
                                    <option value="soft_package" <?= ($package['package_type'] == 'soft_package') ? 'selected' : '' ?>>SOFT PACKAGE</option>

                                </select>

                            </div>
                            <div class="w-full flex items-center justify-start  gap-3">
                                <div class="w-full flex flex-col items-start justify-start">
                                    <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                        for="description">Length</label>
                                    <div class="">
                                        <input type="text" name="length" value="<?= $package['length'] ?>" id="length" class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col items-start justify-start">
                                    <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                        for="description">Width</label>
                                    <div class="">
                                        <input type="text" name="width" value="<?= $package['width'] ?>" id="width" class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col items-start justify-start">
                                    <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                        for="description">Height</label>
                                    <div class="">
                                        <input type="text" name="height" value="<?= $package['height'] ?>" id="height" class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col items-start justify-start">
                                    <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                        for="description">Unit</label>
                                    <div class="">
                                        <select name="dimentions_unit" class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                                            <option value="cm" <?= ($package['dimentions_unit'] == 'cm') ? 'selected' : '' ?>>CM</option>
                                            <option value="in" <?= ($package['dimentions_unit'] == 'in') ? 'selected' : '' ?>>IN</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex items-center justify-start  gap-3">

                                <div class="w-[33%] flex flex-col items-start justify-start">
                                    <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                        for="description">Weight</label>
                                    <div class="">
                                        <input type="text" value="<?= $package['weight'] ?>" name="weight" id="weight" class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                                    </div>
                                </div>
                                <div class="w-full flex flex-col items-start justify-start">
                                    <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                        for="description">Unit</label>
                                    <div class="">
                                        <select name="weight_unit" class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                                            <option value="gm" <?= ($package['weight_unit'] == 'gm') ? 'selected' : '' ?>>gm</option>
                                            <option value="kg" <?= ($package['weight_unit'] == 'kg') ? 'selected' : '' ?>>kg</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label class="block text-sm font-medium text-gray-700 mt-4" for="title">Package Name</label>
                            <div class="w-full flex items-center justify-start mt-2">
                                <input type="text" value="<?= $package['package_name'] ?>" name="package_name" id="package_name" class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                            </div>
                            <div class="w-full flex items-start justify-start mt-4 gap-3">
                                <input type="checkbox" name="is_default" <?= ($package['is_default'] == 1) ? 'checked' : '' ?> class="h-4 w-4 mt-2">
                                <p class="font-semibold">Use as default package <br>
                                    <span class="text-gray-500 text-sm font-normal">Used to calculate rates at checkout and pre-selected when buying labels</span>
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="lg:col-span-1 flex flex-col gap-6">










                    </div>

                </div>
                <div class="w-[85%]">
                    <button class="bg-black border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="<?= isset($package['id']) ? 'update' : 'add' ?>">Save</button>
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