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
            <div class="w-[85%]">
                <div class="flex items-center my-6">
                    <button class="text-gray-500 hover:text-gray-700">
                        <span class="material-icons">arrow_back</span>
                    </button>
                    <h1 class="text-2xl font-semibold ml-2">Add Coupon</h1>
                </div>
            </div>
            <form action="" method="POST" class="w-[85%]" enctype="multipart/form-data">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-full pb-10">
                    <div class="lg:col-span-2 flex flex-col gap-6">

                        <div class="bg-white p-6 rounded-lg shadow-sm">

                            <div class="w-full flex items-center justify-center gap-6">
                                <div class="w-full">
                                    <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Coupon Name</label>
                                    <input
                                        class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" value="<?= isset($coupon['coupon_name']) ? $coupon['coupon_name'] : '' ?>" name="coupon_name"
                                        id="title" placeholder="e.g. GRAB 20% OFF" type="text" />
                                </div>
                                <div class="w-full">
                                    <label class="block text-sm font-medium text-gray-700  mb-1"
                                        for="description">Coupon Code</label>
                                    <div class="border border-gray-300 rounded-md">
                                        <input
                                            class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" value="<?= isset($coupon['coupon_secret']) ? $coupon['coupon_secret'] : '' ?>" name="coupon_secret"
                                            id="title" placeholder="e.g., GRAM, NOVA" type="text" />
                                    </div>
                                </div>

                            </div>
                            <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                for="description">Discount Price</label>
                            <div class="border border-gray-300 rounded-md">
                                <input
                                    class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" value="<?= isset($coupon['discount']) ? $coupon['discount'] : '' ?>" name="discount"
                                    id="title" placeholder="₹ 0.00" type="text" />
                            </div>
                        </div>
                    </div>


                </div>
                <div class="w-[85%]">
                    <button class="bg-black border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" name="<?= isset($coupon['id']) ? 'update' : 'add' ?>">Save</button>
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