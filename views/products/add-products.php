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
                    <h1 class="text-2xl font-semibold ml-2">Add Product</h1>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-[85%] pb-10">
                <div class="lg:col-span-2 flex flex-col gap-6">

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
                        <h2 class="text-base font-medium text-gray-900">Pricing</h2>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <!-- <span class="text-gray-500 sm:text-sm">₹</span> -->
                                    </div>
                                    <input type="text" name="price" id="price" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" placeholder="₹0.00">
                                </div>
                            </div>
                            <div>
                                <label for="compare-price" class="flex items-center text-sm font-medium text-gray-700">
                                    Compare-at price
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <!-- <span class="text-gray-500 sm:text-sm">₹</span> -->
                                    </div>
                                    <input type="text" name="compare-price" id="compare-price" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" placeholder="₹0.00">
                                </div>
                            </div>
                        </div>
                        <div class="relative flex items-start mt-6">
                            <div class="flex h-5 items-center">
                                <input id="charge-tax" name="charge-tax" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="charge-tax" class="font-medium text-gray-700">Charge tax on this product</label>
                            </div>
                        </div>
                        <hr class="my-6 border-gray-200">
                        <div class="grid grid-cols-3 gap-6">
                            <div>
                                <label for="cost-per-item" class="flex items-center text-sm font-medium text-gray-700">
                                    Cost per item
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">

                                    <input type="text" name="cost-per-item" id="cost-per-item" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" placeholder="₹0.00">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Profit</label>
                                <input type="text" name="cost-per-item" id="cost-per-item" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" placeholder="₹0.00">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Margin</label>
                                <input type="text" name="cost-per-item" id="cost-per-item" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" placeholder="₹0.00">
                            </div>
                        </div>
                    </div>




                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h2 class="text-base font-medium text-gray-900">Variants</h2>
                        <div class="relative w-fit px-2 py-1 flex items-center mt-4 hover:cursor-pointer hover:bg-gray-100" id="add-options">
                            <div class="flex  items-center">
                                <i class="fa-solid fa-circle-plus"></i>
                            </div>
                            <div class="ml-2 text-sm">
                                <span for="add-options" class="font-medium text-gray-700">Add options like size or color</span> 
                            </div>
                        </div>
                        <div class="w-full flex flex-col items-center justify-center mt-2 border border-gray-300 rounded-md p-4">
                            <span class="w-full text-left">Option Name</span>
                            <input type="text" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">

                            <span class="w-full text-left mt-3 mb-2">Option Values</span>
                            <div class="flex items-center justify-center w-full gap-3">
                                <input type="text" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">
                                <button><i class="fa-solid fa-trash-can text-gray-500"></i></button>
                            </div>
                            <div class="flex items-center justify-center w-full gap-3">
                                <input type="text" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">
                                <button><i class="fa-solid fa-trash-can text-gray-500"></i></button>
                            </div>
                            <input type="text" placeholder="Add another option" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">
                            <div class="w-full flex items-center justify-between mt-3">
                                <button class="text-red-800 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Delete</button>
                                <button class="text-white bg-gray-900 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Save</button>
                            </div>
                        </div>
                        <div class="pb-6 ">
                            <div class="grid grid-cols-12 gap-4 py-4 border-b border-gray-200 text-gray-500 text-sm font-medium bg-gray-100 items-center justify-center px-3">
                                
                                <div class="col-span-5">Variant</div>
                                <div class="col-span-3">Price</div>
                                <div class="col-span-3">Available</div>
                            </div>

                            <div class="space-y-4 pt-4">
                                <div class="grid grid-cols-12 gap-4 items-center">
                                    
                                    <div class="col-span-5 flex items-center space-x-2">
                                        <button class="text-blue-500 bg-blue-100 rounded-full p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 3a1 1 0 011 1v2a1 1 0 11-2 0V4a1 1 0 011-1zm0 14a1 1 0 011 1v2a1 1 0 11-2 0v-2a1 1 0 011-1zM3 10a1 1 0 011-1h2a1 1 0 110 2H4a1 1 0 01-1-1zm14 0a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" />
                                            </svg>
                                        </button>
                                        <span>Medium</span>
                                    </div>
                                    <div class="col-span-3">
                                        <div class="relative rounded-md shadow-sm">
                                           
                                            <input type="text" value="0.00" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">
                                        </div>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="text" value="0" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-4 items-center">
                                   
                                    <div class="col-span-5 flex items-center space-x-2">
                                        <button class="text-blue-500 bg-blue-100 rounded-full p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 3a1 1 0 011 1v2a1 1 0 11-2 0V4a1 1 0 011-1zm0 14a1 1 0 011 1v2a1 1 0 11-2 0v-2a1 1 0 011-1zM3 10a1 1 0 011-1h2a1 1 0 110 2H4a1 1 0 01-1-1zm14 0a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" />
                                            </svg>
                                        </button>
                                        <span>Small</span>
                                    </div>
                                    <div class="col-span-3">
                                        <div class="relative rounded-md shadow-sm">
                                            
                                            <input type="text" value="0.00" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">
                                        </div>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="text" value="0" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-4 items-center">
                                    
                                    <div class="col-span-5 flex items-center space-x-2">
                                        <button class="text-blue-500 bg-blue-100 rounded-full p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 3a1 1 0 011 1v2a1 1 0 11-2 0V4a1 1 0 011-1zm0 14a1 1 0 011 1v2a1 1 0 11-2 0v-2a1 1 0 011-1zM3 10a1 1 0 011-1h2a1 1 0 110 2H4a1 1 0 01-1-1zm14 0a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" />
                                            </svg>
                                        </button>
                                        <span>s</span>
                                    </div>
                                    <div class="col-span-3">
                                        <div class="relative rounded-md shadow-sm">
                                           
                                            <input type="text" value="0.00" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">
                                        </div>
                                    </div>
                                    <div class="col-span-3">
                                        <input type="text" value="0" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 pt-4 border-t border-gray-200">
                                <p class="text-sm text-gray-500">Total inventory at Bk. No. 1831, Shop No. 9, Avtaar Galli: 0 available</p>
                            </div>
                        </div>

                    </div>



                </div>

                <div class="lg:col-span-1 flex flex-col gap-6">

                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1 relative">
                            <select id="status" name="status" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                                <option class="">Active</option>
                                <option class="">Draft</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-2">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h2 class="text-base font-medium text-gray-900">Media</h2>
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

                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h2 class="text-base font-medium text-gray-900">Inventory</h2>
                        <div class="relative flex items-start mt-4">
                            <div class="flex h-5 items-center">
                                <input id="track-quantity" name="track-quantity" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="track-quantity" class="font-medium text-gray-700">Track quantity</label>
                            </div>
                        </div>
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                            <div class="flex justify-between items-center p-3 border-t border-gray-200">
                                <!-- <span class="text-sm text-gray-800">Bk. No. 1831, Shop No. 9, Avtaar Galli</span> -->
                                <input type="number" value="0" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                            </div>
                        </div>

                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h2 class="text-base font-medium text-gray-900">Shipping</h2>

                        <hr class="my-6 border-gray-200">
                        <div>
                            <label for="package" class="block text-sm font-medium text-gray-700">Package</label>
                            <select id="package" name="package" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                                <option>Store default</option>
                            </select>
                            <p class="text-xs text-gray-500 mt-1">Sample box - 22 x 13.7 x 4.2 cm, 0 kg</p>
                        </div>
                        <div class="mt-4">
                            <label for="weight" class="block text-sm font-medium text-gray-700">Product weight</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input type="text" name="weight" id="weight" value="0.0" class="w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm" id="weight-unit">kg</span>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-4 inline-flex items-center text-indigo-600 hover:text-indigo-500 text-sm font-medium ">
                            <div class="flex h-5 items-center mr-2">
                                <i class="fa-solid fa-circle-plus"></i>
                            </div>
                            Add customs information
                        </button>
                    </div>



                </div>
            </div>
        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
</body>

</html>