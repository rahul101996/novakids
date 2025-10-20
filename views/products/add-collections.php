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


            <div class="container mx-auto p-4 md:p-8">
                <div class="flex items-center mb-6">
                    <button class="text-gray-500 hover:text-gray-700">
                        <span class="material-icons">arrow_back</span>
                    </button>
                    <h1 class="text-2xl font-semibold ml-2">Add collection</h1>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <div class="lg:col-span-2 space-y-8">
                            <div class="bg-white p-6 rounded-lg shadow-sm">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Title</label>
                                <input
                                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" value="<?= isset($collection['name']) ? $collection['name'] : '' ?>" name="name"
                                    id="title" placeholder="e.g., Summer collection, Under $100, Staff picks" type="text" />
                                <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                    for="description">Description</label>
                                <div class="border border-gray-300 rounded-md">
                                    <textarea class="w-full h-40 border-0 focus:ring-0 resize-y p-3 summernote"
                                        placeholder="" name="description"><?= isset($collection['description']) ? $collection['description'] : '' ?></textarea>
                                </div>
                            </div>

                            <div class="bg-white p-6 rounded-lg shadow-sm">
                                <h2 class="text-lg font-medium">Products</h2>
                                <div class="w-[100%] flex items-center justify-start">
                                    <select name="products[]" class="selectElement" multiple>
                                        <?php
                                        foreach ($products as $key => $product) {
                                            $images = json_decode($product['product_images'], true);
                                        ?>
                                            <option value="<?= $product['id'] ?>">
                                                <div>
                                                    <div class="flex items-center gap-2 justify-between">
                                                        <img src="/<?= $images[0] ?>" alt="Product 1" class="w-12 h-12 rounded">
                                                        <div></div>
                                                        <p class="text-sm font-semibold text-gray-800"><?= $product['name'] ?></p>

                                                    </div>
                                                </div>
                                            </option>
                                        <?php }
                                        ?>
                                    </select>

                                </div>
                                <div class="w-full flex flex-col items-center justify-start overflow-y-scroll h-[30vh] mt-3">
                                    <?php

                                    if (isset($collection)) {

                                        if (isset($inProducts) && !empty($inProducts)) {
                                    ?>
                                            <ul class="w-full ">

                                                <!-- Single Item -->
                                                 
                                                <?php
                                                $sr = 1;
                                                foreach ($inProducts as $key => $product) {
                                                    $images = json_decode($product['product_images'], true);
                                                    $images = array_reverse($images);   
                                                    $active = $product['status'] == '1' ? true : false;

                                                ?>
                                                    <li class="flex items-start justify-between border-b py-2 px-2 product-card">
                                                        <div class="flex items-center space-x-3">
                                                            <span class="text-gray-600 font-medium"><?= $sr++ ?></span>
                                                            <img src="/<?= $images[0] ?>" alt="Classic Frost" class="w-14 h-14 rounded-md object-cover">
                                                            <span class="text-gray-800 font-medium"><?= $product['name'] ?></span>
                                                        </div>
                                                        <div class="flex items-center space-x-3">
                                                            <span class="<?= $active ? 'text-green-600 bg-green-100' : 'text-red-600 bg-red-100' ?> font-semibold text-xs px-3 py-1 rounded-full"><?= $active ? 'Active' : 'Inactive' ?></span>
                                                            <button type="button" onclick="RemoveProduct(<?= $collection['id'] ?>,<?= $product['id'] ?>,this)" class="text-gray-400 hover:text-red-500 text-lg">&times;</button>
                                                        </div>
                                                    </li>
                                                <?php } ?>


                                            </ul>
                                        <?php } else { ?>
                                            <svg class="h-14 w-14 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="gray">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                            </svg>
                                            <p class="text-sm text-gray-500 font-semibold text-center mt-2">There are no products in this collection. <br>
                                                Search or browse to add products.</p>
                                        <?php  }   ?>

                                    <?php
                                    } else {
                                    ?>
                                        <svg class="h-14 w-14 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="gray">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                        <p class="text-sm text-gray-500 font-semibold text-center mt-2">There are no products in this collection. <br>
                                            Search or browse to add products.</p>
                                    <?php } ?>
                                </div>
                            </div>
                            <button class="bg-black border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="<?= isset($collection['id']) ? 'update' : 'add' ?>">Save</button>
                        </div>
                        <div class="space-y-8">

                            <div class="bg-white p-6 rounded-lg shadow-sm">
                                <h2 class="text-lg font-medium mb-4">Image</h2>
                                <div class="space-y-1 text-center flex flex-col items-center border-2 border-gray-300 border-dashed rounded-lg p-8">

                                    <div id="imagePreview" class="<?= isset($collection['image']) ? '' : 'hidden' ?> mb-4">
                                        <input type="" name="old_vdata_image" value="<?= isset($collection['image']) ? $collection['image'] : '' ?>">
                                        <img src="/<?= isset($collection['image']) ? $collection['image'] : '' ?>" alt="Preview" class="mx-auto h-32 object-cover">
                                    </div>
                                    <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="vdata_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                            <span>Upload a file</span>
                                            <input id="vdata_image" name="collection_image" type="file" class="sr-only" accept="image/*" <?= isset($collection['image']) ? '' : 'required' ?>>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>

                        </div>
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
       async function RemoveProduct(collection_id, product_id, element) {
           
            const request = await axios.post("/api/removeProductFromCollection", new URLSearchParams({
            id : collection_id,
            product_id : product_id
        }));
        console.log(request.data)
        if (request.data.success) {
           
            toastr.success(request.data.data);
            // element.closest(".product-card").remove();
            location.reload()
        }
    }
    </script>
</body>

</html>