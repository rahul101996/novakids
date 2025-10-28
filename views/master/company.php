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

<body class="bg-[#1a1a1a] overflow-hidden">

    <div class="flex">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');

        ?>

        <main class="flex-1 md:ml-[16.5rem] md:mt-[3.7rem] bg-[#f1f1f1] rounded-tr-3xl  h-[92vh] overflow-y-scroll pb-5">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-[85%]">
                <div class="flex items-center justify-center my-6">
                    <span class="text-xl font-semibold text-gray-800 flex w-[85%] flex items-center justify-start">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <?= $pageTitle ?> Detail</span>
                </div>
            </div>
            <div class="w-full flex items-center justify-center pb-4 ">

                <form action="" method="post" class="w-[85%] flex-col flex items-start justify-stat" enctype="multipart/form-data">
                    <!-- Form Card -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm w-[55%]">
                        <!-- Card Header -->


                        <!-- Card Body -->
                        <div class="p-4">
                            <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-1 items-center">
                                <!-- Logo Field -->
                                <div class="">
                                    <h2 class="text-base font-medium text-gray-900">Navbar Logo</h2>
                                    <div class="space-y-1 text-center flex flex-col items-center border-2 border-gray-300 border-dashed rounded-lg p-8">

                                        <div id="imagePreview" class="<?= isset($company['logo']) ? '' : 'hidden' ?> mb-4">
                                            <input type="hidden" name="old_image" value="<?= isset($company['logo']) ? $company['logo'] : '' ?>">
                                            <img src="/<?= isset($company['logo']) ? $company['logo'] : '' ?>" alt="Preview" class="mx-auto h-32 object-cover">
                                        </div>
                                        <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="vdata_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                                <span>Upload a file</span>
                                                <input id="vdata_image" name="logo" type="file" class="sr-only" accept="image/*" <?= isset($company['logo']) ? '' : 'required' ?>>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                                <div class="">
                                    <h2 class="text-base font-medium text-gray-900">Footer Logo</h2>
                                    <div class="space-y-1 text-center flex flex-col items-center border-2 border-gray-300 border-dashed rounded-lg p-8">

                                        <div id="footer_logoPreview" class="<?= isset($company['footer_logo']) ? '' : 'hidden' ?> mb-4">
                                            <input type="hidden" name="old_footer_logo" value="<?= isset($company['logo']) ? $company['footer_logo'] : '' ?>">
                                            <img src="/<?= isset($company['footer_logo']) ? $company['footer_logo'] : '' ?>" alt="Preview" class="mx-auto h-32 object-cover">
                                        </div>
                                        <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="vdata_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                                <span>Upload a file</span>
                                                <input id="footer_logovdata_image" name="footer_logo" type="file" class="sr-only1 " accept="image/*" <?= isset($company['footer_logo']) ? '' : 'required' ?>>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>

                                <!-- Company Name Field -->
                                <div>
                                    <label for="company" class="block text-base font-medium text-gray-700">
                                        Company Name<strong class="ms-1 text-red-600">*</strong>
                                    </label>
                                    <input
                                        type="text"
                                        name="company"
                                        value="<?= empty($company["company"]) ? "" : $company["company"] ?>"
                                        placeholder="Enter company name"
                                        id="company"
                                        class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                                </div>


                            </div>

                            <!-- Submit Button -->

                        </div>

                    </div>
                    <div class="flex justify-start md:mt-4">
                        <button
                            type="submit"
                            class="bg-black  text-white py-2 px-4 rounded transition duration-200 ease-in-out">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>
        class ImagePreviewer {
            constructor(inputEl, previewContainer) {
                this.inputEl = inputEl;
                this.previewContainer = previewContainer;
                this.previewImg = previewContainer.querySelector('img');
                console.log(inputEl)
                this.init();
            }

            init() {
                if (!this.inputEl || !this.previewContainer || !this.previewImg) {
                    console.error("Missing elements for ImagePreviewer");
                    return;
                }

                this.inputEl.addEventListener('change', (e) => this.handleFileChange(e));
            }

            handleFileChange(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        this.previewImg.src = event.target.result;
                        this.previewContainer.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            }
        }

        // ✅ Usage:
        const imagePreviewer1 = new ImagePreviewer(
            document.getElementById('vdata_image'),
            document.getElementById('imagePreview')
        );
        // console.log(document.getElementById('footer_logovdata_image'))
        const imagePreviewer2 = new ImagePreviewer(
            document.getElementById('footer_logovdata_image'),
            document.getElementById('footer_logoPreview')
        );
    </script>
</body>

</html>