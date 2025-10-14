<?php

if (!empty($editData)) {

    $iimages = json_decode($editData['images'], true);

    $optionGroups = [];
    $options = json_decode($editData['options'], true);

    $optt = json_decode($options, true);
    // printWithPre($optt);

    foreach ($optt as $label => $value) {
        if (!isset($optionGroups[$label])) {
            $optionGroups[$label] = [];
        }
        if (!in_array($value, $optionGroups[$label])) {
            $optionGroups[$label] = $value;
        }
    }
    // printWithPre($optionGroups);
}


?>


<!DOCTYPE html>
<html lang="en">

<?php
// printWithPre($_SESSION); 
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<style>
    @keyframes gradient-move {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>

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
                    <h1 class="text-2xl font-semibold ml-2">Add Product</h1>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data"
                class="w-full flex flex-col items-center justify-center">

                <div class="bg-white p-6 rounded-lg shadow-sm w-[85%]">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Edit Variant</h2>

                    <!-- Hidden Fields -->
                    <input type="hidden" name="id" value="<?= htmlspecialchars($editData['id']) ?>">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($editData['product_id']) ?>">

                    <!-- Variant Options (e.g. Size, Color, etc.) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <?php foreach ($optionGroups as $key => $value): ?>
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 mb-1"><?= htmlspecialchars($key) ?></label>
                                <input type="text" name="options[<?= htmlspecialchars($key) ?>]"
                                    value="<?= htmlspecialchars($value) ?>"
                                    class="w-full border border-gray-800 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Price, Quantity, Unavailable -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price (₹)</label>
                            <input type="number" step="0.01" name="price"
                                value="<?= htmlspecialchars($editData['price']) ?>"
                                class="w-full border border-gray-800 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                            <input type="number" name="quantity" value="<?= htmlspecialchars($editData['quantity']) ?>"
                                class="w-full border border-gray-800 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Unavailable</label>
                            <select name="unavailable"
                                class="w-full border border-gray-800 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="0" <?= $editData['unavailable'] == 0 ? 'selected' : '' ?>>No</option>
                                <option value="1" <?= $editData['unavailable'] == 1 ? 'selected' : '' ?>>Yes</option>
                            </select>
                        </div>
                    </div>

                    <!-- Inventory Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Committed</label>
                            <input type="number" name="committed"
                                value="<?= htmlspecialchars($editData['committed']) ?>"
                                class="w-full border border-gray-800 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">On Hand</label>
                            <input type="number" name="on_hand" value="<?= htmlspecialchars($editData['on_hand']) ?>"
                                class="w-full border border-gray-800 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                        <!-- Existing Images -->
                        <div class="col-span-2 mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Existing Images</label>
                            <div class="flex gap-4 flex-wrap">
                                <?php if (!empty($iimages)): ?>
                                    <?php foreach ($iimages as $img): ?>
                                        <div class="relative">
                                            <img src="/<?= htmlspecialchars($img) ?>" alt="Variant Image"
                                                class="w-28 h-28 object-cover rounded-md border border-gray-300">
                                            <input type="checkbox" name="delete_images[]" value="<?= htmlspecialchars($img) ?>"
                                                class="absolute top-1 right-1 w-5 h-5 text-red-600">
                                            <input type="hidden" name="allImages[]" value="<?= htmlspecialchars($img) ?>">
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-gray-500 text-sm">No images uploaded.</p>
                                <?php endif; ?>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Tick the images you want to delete.</p>
                        </div>

                        <!-- Upload New Images -->
                        <div class="bg-white p-6 rounded-lg shadow-sm ">
                            <h2 class="text-base font-medium text-gray-900">Media</h2>
                            <div
                                class="space-y-1 text-center flex flex-col items-center border-2 border-gray-800 border-dashed rounded-lg p-8">

                                <div id="imagePreview" class="hidden mb-4">
                                    <!-- <input type="hidden" name="old_vdata_image" value=""> -->
                                    <img src="" alt="Preview" class="mx-auto h-32 object-cover">
                                </div>
                                <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    </path>
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="vdata_image"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                        <span>Upload a file</span>
                                        <input id="vdata_image" name="product_images[]" type="file" class="sr-only"
                                            accept="image/*" multiple>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>




                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-gray-900 hover:bg-gray-800 text-white font-medium py-2 px-6 rounded-md">
                            Update Variant
                        </button>
                    </div>
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

        imageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>