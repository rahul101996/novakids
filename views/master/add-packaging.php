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
                    <h1 class="text-2xl font-semibold ml-2">Add Packaging</h1>
                </div>
            </div>
            <form action="" method="POST" class="w-[85%]" enctype="multipart/form-data">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full pb-10">
                    <div class="lg:col-span-2 flex flex-col gap-6">

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Title</label>
                            <input
                                class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" value="<?= isset($category['category']) ? $category['category'] : '' ?>" name="category"
                                id="title" placeholder="e.g., Summer collection, Under $100, Staff picks" type="text" />
                            <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                for="description">Description</label>
                            <div class="border border-gray-300 rounded-md">
                                <textarea class="w-full h-40 border-0 focus:ring-0 resize-y p-3"
                                    placeholder="" name="description"><?= isset($category['description']) ? $category['description'] : '' ?></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="lg:col-span-1 flex flex-col gap-6">


                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h2 class="text-base font-medium text-gray-900">Media</h2>
                            <div class="space-y-1 text-center flex flex-col items-center border-2 border-gray-300 border-dashed rounded-lg p-8">

                                <div id="imagePreview" class="<?= isset($category['img']) ? '' : 'hidden' ?> mb-4">
                                    <!-- <input type="hidden" name="old_vdata_image" value=""> -->
                                    <img src="/<?= isset($category['img']) ? $category['img'] : '' ?>" alt="Preview" class="mx-auto h-32 object-cover">
                                </div>
                                <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="vdata_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                        <span>Upload a file</span>
                                        <input id="vdata_image" name="img" type="file" class="sr-only" accept="image/*" <?= isset($category['img']) ? '' : 'required' ?>>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>







                    </div>

                </div>
                <div class="w-[85%]">
                    <button class="bg-black border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="<?= isset($category['id']) ? 'update' : 'add' ?>">Save</button>
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