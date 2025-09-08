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

        <main class="flex-1 md:ml-60">
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
                                <div class="w-[80%] flex items-center justify-start">
                                    <select name="products[]" class="selectElement" multiple>
                                        <option value="">-- Select a Product --</option>
                                        <option value="1">T-Shirt</option>
                                        <option value="2">Jeans</option>
                                        <option value="3">Jacket</option>
                                        <option value="4">Sweater</option>
                                        <option value="5">Shorts</option>
                                        <option value="6">Dress</option>
                                        <option value="7">Skirt</option>
                                        <option value="8">Shirt</option>
                                        <option value="9">Blazer</option>
                                        <option value="10">Hoodie</option>
                                    </select>

                                </div>
                                <div class="w-full flex flex-col items-center justify-center h-[25vh]">
                                    <?php
                                    $products = [
                                        [
                                            "id" => 1,
                                            "name" => "Blue Denim Jacket",
                                            "category" => "Clothing",
                                            "price" => 1299,
                                            "stock" => 25
                                        ],
                                        [
                                            "id" => 2,
                                            "name" => "Red T-Shirt",
                                            "category" => "Clothing",
                                            "price" => 499,
                                            "stock" => 50
                                        ],
                                        [
                                            "id" => 3,
                                            "name" => "Black Sneakers",
                                            "category" => "Footwear",
                                            "price" => 2199,
                                            "stock" => 15
                                        ],
                                        [
                                            "id" => 4,
                                            "name" => "Leather Wallet",
                                            "category" => "Accessories",
                                            "price" => 899,
                                            "stock" => 40
                                        ],
                                    ];

                                    if (isset($collection)) {

                                        if (isset($products) && !empty($products)) { ?>
                                            <ul class="w-full mt-14">

                                                <!-- Single Item -->
                                                <li class="flex items-center justify-between border-b py-2">
                                                    <div class="flex items-center space-x-3">
                                                        <span class="text-gray-600 font-medium">1.</span>
                                                        <img src="https://zenin.co.in/cdn/shop/files/IMG_7780WEB34-min.jpg?v=1743757263&width=360" alt="Classic Frost" class="w-10 h-10 rounded-md object-cover">
                                                        <span class="text-gray-800 font-medium">Classic Frost <span class="text-gray-500">(White)</span></span>
                                                    </div>
                                                    <div class="flex items-center space-x-3">
                                                        <span class="bg-green-300 text-green-600 font-semibold text-xs px-3 py-1 rounded-full">Active</span>
                                                        <button class="text-gray-400 hover:text-red-500 text-lg">&times;</button>
                                                    </div>
                                                </li>

                                                <li class="flex items-center justify-between border-b py-2">
                                                    <div class="flex items-center space-x-3">
                                                        <span class="text-gray-600 font-medium">2.</span>
                                                        <img src="https://zenin.co.in/cdn/shop/files/IMG_5779WEB-min.jpg?v=1741075748&width=360" alt="Sky Vibes" class="w-10 h-10 rounded-md object-cover">
                                                        <span class="text-gray-800 font-medium">Sky Vibes <span class="text-gray-500">(Sky Blue)</span></span>
                                                    </div>
                                                    <div class="flex items-center space-x-3">
                                                        <span class="bg-green-300 text-green-600 font-semibold text-xs px-3 py-1 rounded-full">Active</span>
                                                        <button class="text-gray-400 hover:text-red-500 text-lg">&times;</button>
                                                    </div>
                                                </li>

                                                <li class="flex items-center justify-between border-b py-2">
                                                    <div class="flex items-center space-x-3">
                                                        <span class="text-gray-600 font-medium">3.</span>
                                                        <img src="https://zenin.co.in/cdn/shop/files/IMG_4198webnew-min.jpg?v=1712388971&width=360" alt="Sandy Soul" class="w-10 h-10 rounded-md object-cover">
                                                        <span class="text-gray-800 font-medium">Sandy Soul <span class="text-gray-500">(Beige)</span></span>
                                                    </div>
                                                    <div class="flex items-center space-x-3">
                                                        <span class="bg-green-300 text-green-600 font-semibold text-xs px-3 py-1 rounded-full">Active</span>
                                                        <button class="text-gray-400 hover:text-red-500 text-lg">&times;</button>
                                                    </div>
                                                </li>

                                                <!-- Repeat for all items -->

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
                            <button class="bg-black border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                        <div class="space-y-8">

                            <div class="bg-white p-6 rounded-lg shadow-sm">
                                <h2 class="text-lg font-medium mb-4">Image</h2>
                                <div class="space-y-1 text-center flex flex-col items-center border-2 border-gray-300 border-dashed rounded-lg p-8">

                                    <div id="imagePreview" class="<?= isset($collection['image']) ? '' : 'hidden' ?> mb-4">
                                        <!-- <input type="hidden" name="old_vdata_image" value=""> -->
                                        <img src="/<?= isset($collection['image']) ? $collection['image'] : '' ?>" alt="Preview" class="mx-auto h-32 object-cover">
                                    </div>
                                    <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="vdata_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                            <span>Upload a file</span>
                                            <input id="vdata_image" name="collection_image" type="file" class="sr-only" accept="image/*" required>
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
    </script>
</body>

</html>