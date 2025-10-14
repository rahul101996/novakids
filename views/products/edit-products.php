<?php

if (!empty($editData)) {
    $variants = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = $id");
    // printWithPre($variants);
    // die();

    $optionGroups = [];
    foreach ($variants as $variant) {
        $options = json_decode($variant['options'], true);

        $optt = json_decode($options, true);
        // printWithPre($optt);

        foreach ($optt as $label => $value) {
            if (!isset($optionGroups[$label])) {
                $optionGroups[$label] = [];
            }
            if (!in_array($value, $optionGroups[$label])) {
                $optionGroups[$label][] = $value;
            }
        }
    }
    // printWithPre($optionGroups);



    $sizeChart = json_decode($editData["sizeChart"], true);
    // printWithPre($sizeChart);
    // die();
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
            <form action="" id="productForm" method="POST" enctype="multipart/form-data"
                class="w-full flex flex-col items-center justify-center">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-[85%] pb-10">
                    <div class="lg:col-span-2 flex flex-col gap-6">

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Title</label>
                            <input
                                class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                name="name" value="<?= isset($editData['name']) ? $editData['name'] : '' ?>" id="title"
                                placeholder="e.g., Summer collection, Under $100, Staff picks" type="text" required />

                            <label class="block text-sm font-medium text-gray-700 mt-6 mb-1" for="description">Short
                                Description</label>
                            <div class="border border-gray-800 rounded-md">
                                <textarea class="w-full border-0 focus:ring-0 resize-y p-3" placeholder=""
                                    name="shortDescription" id="shortDescription"
                                    required><?= !empty($editData) && !empty($editData['shortDescription']) ? $editData['shortDescription'] : '' ?></textarea>
                            </div>


                            <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                for="description">Description</label>
                            <div class="border border-gray-800 rounded-md">
                                <textarea class="w-full h-40 border-0 focus:ring-0 resize-y p-3 summernote"
                                    placeholder=""
                                    name="description"><?= !empty($editData) && !empty($editData['description']) ? $editData['description'] : '' ?></textarea>
                            </div>
                            <h2 class="text-sm font-medium mt-3">Category</h2>
                            <div class="w-full flex items-center justify-start">
                                <select name="category" class="selectElement" required>
                                    <?php
                                    foreach ($categories as $category) {
                                        ?>
                                        <option value="<?= $category['id'] ?>" <?= $editData['category'] == $category['id'] ? 'selected' : '' ?>><?= $category['category'] ?></option>

                                    <?php } ?>
                                    ?>
                                </select>

                            </div>
                            <p class="mt-2 text-sm text-gray-500">Determines tax rates and adds metafields to improve
                                search, filters, and cross-channel sales</p>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Product Tag</label>
                            <input
                                class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                value="<?= isset($editData['product_tag']) ? $editData['product_tag'] : '' ?>"
                                name="product_tag" id="title" placeholder="e.g., Only few left" type="text" />
                        </div>



                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h2 class="text-base font-medium text-gray-900">Pricing</h2>
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">

                                <div>
                                    <label for="compare-price"
                                        class="flex items-center text-sm font-medium text-gray-700">
                                        Compare-at price
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </label>
                                    <div class="relative mt-1 rounded-md">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <!-- <span class="text-gray-500 sm:text-sm">₹</span> -->
                                        </div>
                                        <input type="number"
                                            value="<?= !empty($editData) && !empty($editData['compare_price']) ? $editData['compare_price'] : '' ?>"
                                            name="compare_price" id="compare-price"
                                            class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                            placeholder="₹0.00" oninput="CalculateProfitMargin()">
                                    </div>
                                </div>

                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                    <div class="relative mt-1 rounded-md">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <!-- <span class="text-gray-500 sm:text-sm">₹</span> -->
                                        </div>
                                        <input type="number"
                                            value="<?= !empty($editData) && !empty($editData['price']) ? $editData['price'] : '' ?>"
                                            step="0.1" name="price" id="price"
                                            class="w-full border border-gray-800 rounded-md  focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                            placeholder="₹0.00" oninput="CalculateProfitMargin()">
                                    </div>
                                </div>

                            </div>
                            <div class="relative flex items-start mt-2 hidden">
                                <div class="flex h-5 items-center">
                                    <input id="charge-tax" name="charge_tax" type="checkbox" checked
                                        class="h-4 w-4 rounded border-gray-800 text-indigo-600 focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="charge-tax" class="font-medium text-gray-700">Charge tax on this
                                        product</label>
                                </div>
                            </div>
                            <hr class="my-6 border-gray-200">
                            <div class="grid grid-cols-3 gap-6">
                                <div>
                                    <label for="cost-per-item"
                                        class="flex items-center text-sm font-medium text-gray-700">
                                        Cost per item
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </label>
                                    <div class="relative mt-1 rounded-md">

                                        <input type="text"
                                            value="<?= !empty($editData) && !empty($editData['cost_per_item']) ? $editData['cost_per_item'] : '' ?>"
                                            name="cost_per_item" id="cost-per-item" oninput="CalculateProfitMargin()"
                                            class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                            placeholder="₹0.00">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Profit</label>
                                    <input type="text"
                                        value="<?= !empty($editData) && !empty($editData['profit']) ? $editData['profit'] : '' ?>"
                                        name="profit" id="profit"
                                        class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                        placeholder="₹0.00" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Margin (%)</label>
                                    <input type="text"
                                        value="<?= !empty($editData) && !empty($editData['margin']) ? $editData['margin'] : '' ?>"
                                        name="margin" id="margin"
                                        class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                        placeholder="₹0.00" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="bg-white p-6 rounded-lg shadow-sm hidden">
                            <h2 class="text-base font-medium text-gray-900">Inventory</h2>

                            <div class="relative flex items-start mt-2">
                                <div class="flex h-5 items-center">
                                    <input name="track_quantity" type="checkbox" checked
                                        class="h-4 w-4 rounded border-gray-800 text-indigo-600 focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="charge-tax" class="font-medium text-gray-700">
                                        Track quantity</label>
                                </div>
                            </div>
                            <p class=" font-semibold mt-3">Quantity</p>
                            <hr class="mt-3 mb-6 border-gray-200">
                            <div class="w-full flex items-center justify-between">
                                <p class="font-semibold">Bk. No. 1831, Shop No. 9, Avtaar Galli</p>
                                <input name="quantity" type="number"
                                    class="border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1">
                            </div>
                            <div class="relative flex items-start mt-3">
                                <div class="flex h-5 items-center">
                                    <input id="charge-tax" name="continue_selling" type="checkbox"
                                        class="h-4 w-4 rounded border-gray-800 text-indigo-600 focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="charge-tax" class="font-medium text-gray-700">
                                        Continue selling when out of stock</label>
                                </div>

                            </div>
                            <p class="text-xs text-gray-500">This won't affect Shopify POS. Staff will see a warning,
                                but can complete sales when available inventory reaches zero and below.</p>
                            <div class="relative flex items-start mt-2">
                                <div class="flex h-5 items-center">
                                    <input id="charge-tax" name="sku_barcode" type="checkbox"
                                        class="h-4 w-4 rounded border-gray-800 text-indigo-600 focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="charge-tax" class="font-medium text-gray-700">
                                        This product has a SKU or barcode</label>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-sm w-full">
                            <h2 class="text-base font-medium text-gray-900">Variants</h2>
                            <div class="w-full mx-auto">

                                <!-- Options Container -->
                                <div
                                    class="flex flex-col items-center justify-center border border-gray-200 rounded-lg w-full">
                                    <div id="optionsContainer" class="space-y-6 w-full">

                                        <?php
                                        $optionCount = 0;
                                        foreach ($optionGroups as $optionGrpkey => $optionGrpdata) {

                                            $srs = $optionCount++;
                                            ?>
                                            <div id="option-<?= $srs ?>"
                                                class="w-full flex flex-col items-center justify-center mt-2 border-b border-gray-200  rounded-md p-4 OptionDiv">
                                                <span class="w-full text-left">Option Name</span>
                                                <div class="flex justify-between items-center mb-2 w-full">
                                                    <input type="text" value="<?= $optionGrpkey ?>"
                                                        class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2"
                                                        name="options_name[]" placeholder="Eg. Size" readonly>

                                                </div>
                                                <div id="values-<?= $srs ?>" class="space-y-2 w-full mt-3">
                                                    <span class="w-full text-left mb-2">Option Values</span>
                                                    <?php foreach ($optionGrpdata as $key => $value) { ?>
                                                        <div
                                                            class="flex items-center flex-col justify-center w-full OptionValues">
                                                            <div class="w-full flex items-center justify-center w-full gap-3">
                                                                <input placeholder="Eg. Small" type="text"
                                                                    name="options_value[<?= $srs ?>][]" value="<?= $value ?>"
                                                                    class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                                                                <!-- <button onclick="removeValue(this)"><i
                                                                        class="fa-solid fa-trash-can text-gray-500"></i></button> -->
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="w-full flex items-center justify-between mt-3">
                                                    <button onclick="addValue(<?= $srs ?>)" type="button"
                                                        class="text-white bg-gray-900 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Add
                                                        Option Values</button>
                                                    <!-- <button onclick="addSizeChart()" type="button"
                                                        class="text-blue-800 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Add
                                                        Size Chart</button> -->
                                                    <!-- <button onclick="removeOption(${optionCount})" type="button"
                                                        class="text-red-800 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Delete
                                                        Option</button> -->
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>

                                    <div class="flex items-center justify-between w-[95%] py-2">
                                        <!-- <button onclick="addOption()" type="button"
                                            class="text-white bg-blue-900 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">
                                            <i class="fa-solid fa-circle-plus mr-2 border-none" aria-hidden="true"></i>
                                            Add another option
                                        </button> -->

                                        <button onclick="generateVariants()" type="button" class="text-white px-5 py-2 rounded-lg shadow-md font-medium 
                                                    bg-gradient-to-r from-red-500  to-blue-500 
                                                    bg-[length:200%_200%] animate-[gradient-move_6s_ease_infinite]
                                                    focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 
                                                    transition-all duration-300 hover:scale-105 flex items-center">

                                            <i class="fa-solid fa-layer-group mr-2"></i>
                                            Generate Variants
                                        </button>
                                    </div>
                                </div>



                                <!-- Variants Table -->
                                <div id="variantsSection" class="<?= !empty($editData) ? '' : 'hidden' ?> w-full">

                                    <table class="w-full table-auto border-collapse border border-gray-300 text-sm">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-3 py-3 text-left">Variant</th>
                                                <th class="border border-gray-300 px-3 py-3 text-left">Price</th>
                                                <th class="border border-gray-300 px-3 py-3 text-left">Available</th>
                                                <?php if (!empty($editData)) { ?>
                                                    <th class="border border-gray-300 px-3 py-3 text-left">Action</th>
                                                <?php } ?>

                                            </tr>
                                        </thead>
                                        <tbody id="variantsTableBody">


                                            <?php

                                            if (!empty($editData)) {

                                                foreach ($variants as $vkey => $vdata) {

                                                    $jsonData = json_decode($vdata['options'], true);

                                                    // printWithPre($jsonData);
                                            
                                                    $lines = explode("\n", trim($jsonData));
                                                    $pvoptions = [];
                                                    foreach ($lines as $kkey => $line) {
                                                        $pvoptions = json_decode($line, true);
                                                    }

                                                    $vvkeys = array_keys($pvoptions);
                                                    $vvdd = array_values($pvoptions);

                                                    // printWithPre($vvkeys);
                                                    // printWithPre($vvdd);
                                            
                                                    $dtdtd = "";
                                                    foreach ($vvkeys as $keyskey => $keysvalue) {
                                                        $dtdtd .= $vvdd[$keyskey] . "/";
                                                    }
                                                    $dtdtd = substr($dtdtd, 0, -1);

                                                    // printWithPre($dtdtd);
                                            
                                                    ?>

                                                    <tr class="hover:bg-gray-50 border border-gray-200">
                                                        <td class="px-3 py-3">
                                                            <div class="flex items-center justify-start gap-3">
                                                                <div class="bg-white border border-gray-300 flex items-center justify-center w-20 h-20 rounded-xl cursor-pointer image-placeholder overflow-hidden"
                                                                    data-index="<?= $vkey ?>">
                                                                    <i class="fa-solid fa-images text-xl"></i>
                                                                    <img src="" alt=""
                                                                        class="hidden w-full h-full object-contain relative z-10">
                                                                </div>
                                                                <input type="file" name="variant_images[<?= $vkey ?>][]"
                                                                    accept="image/*" class="hidden file-input" multiple
                                                                    data-index="<?= $vkey ?>">
                                                                <span><?= $dtdtd ?></span>
                                                                <input type="hidden" name="variant_options[<?= $vkey ?>]"
                                                                    value="">
                                                            </div>
                                                        </td>
                                                        <td class="px-3 py-3">
                                                            <input type="number" name="variant_prices[<?= $vkey ?>]"
                                                                value="<?= $vdata['price'] ?>"
                                                                class="w-full border bg-gray-100 border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                                                placeholder="₹ 0.00" readonly required>
                                                        </td>
                                                        <td class="px-3 py-3">
                                                            <input type="number" name="variant_quantities[<?= $vkey ?>]"
                                                                class="w-full border bg-gray-100 border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                                                value="<?= $vdata['quantity'] ?>" readonly required>
                                                        </td>
                                                        <td class="px-3 py-3">
                                                            <div class="gap-4">
                                                                <a href="/admin/edit-product-variant/<?= $vdata['id'] ?>"
                                                                    target="_blank" class="text-indigo-600 text-lg "><i
                                                                        class="fa fa-edit"></i>
                                                                </a>
                                                                <!-- <a href="/admin/edit-product-variant/<?= $vdata['id'] ?>"
                                                                    target="_blank" class="text-red-600 text-lg "><i
                                                                        class="fa fa-trash"></i>
                                                                </a> -->
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h2 class="text-base font-medium text-gray-900">Shipping</h2>

                            <div class="relative flex items-start mt-2 hidden">
                                <div class="flex h-5 items-center">
                                    <input id="physical-product" name="physical_product" type="checkbox" checked
                                        class="h-4 w-4 rounded border-gray-800 text-indigo-600 focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="charge-tax" class="font-medium text-gray-700">
                                        This is a physical product</label>
                                </div>
                            </div>

                            <hr class="mt-3 mb-6 border-gray-200">

                            <div class="w-full flex items-center justify-start gap-2 ">
                                <p class="font-semibold !mb-0">Package</p> <span
                                    class="rounded-full border-2 border-gray-300 w-5 h-5 flex items-center justify-center pt-[2px]"><i
                                        class="fa-solid fa-question text-gray-400 text-xs"></i></span>
                            </div>

                            <div class="relative flex items-start mt-3">
                                <div class="w-full bg-white rounded-lg ">

                                    <input type="hidden" name="packaging" id="packaging">
                                    <div id="dropdown" class="relative">
                                        <button id="dropdownButton" type="button"
                                            class="w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-2">
                                                    <i class="fas fa-box text-gray-400"></i>
                                                    <div>
                                                        <div class="font-medium">Store default</div>
                                                        <div class="text-xs text-gray-500">Test - 100 × 100 × 100 cm, 1
                                                            kg</div>
                                                    </div>
                                                </div>
                                                <i class="fas fa-chevron-down text-gray-400"></i>
                                            </div>
                                        </button>

                                        <div id="dropdownMenu"
                                            class="hidden absolute mt-1 w-full bg-white shadow-lg rounded-md border border-gray-200 z-10 max-h-60 overflow-y-auto px-2 py-1">
                                            <?php

                                            $selectedPackage = "";
                                            if (!empty($editData) && !empty($editData['packaging'])) {
                                                $selectedPackage = getData2("SELECT * FROM tbl_packaging WHERE id = " . $editData['packaging'])[0];
                                            }

                                            foreach ($packages as $package) { ?>
                                                <div class="p-2 hover:bg-gray-100 cursor-pointer flex items-center space-x-2"
                                                    onclick="selectPackage('<?= $package['package_name'] ?>', '<?= $package['length'] ?> × <?= $package['width'] ?> × <?= $package['height'] ?> <?= $package['dimentions_unit'] ?>, <?= $package['weight'] ?> <?= $package['weight_unit'] ?>', '<?= $package['id'] ?>')">
                                                    <?php
                                                    if ($package['package_type'] == "box") {
                                                        echo '<i class="fa-solid fa-box text-gray-400 text-xl"></i>';
                                                    } elseif ($package['package_type'] == "envelope") {
                                                        echo '<i class="fa-solid fa-envelope-open text-gray-400 text-xl"></i>';
                                                    } else {
                                                        echo '<i class="fa-solid fa-door-closed text-gray-400 text-xl"></i>';
                                                    }

                                                    ?>
                                                    <div>
                                                        <div class="font-medium"><?= $package['package_name'] ?></div>
                                                        <div class="text-xs text-gray-500"><?= $package['length'] ?> ×
                                                            <?= $package['width'] ?> × <?= $package['height'] ?>
                                                            <?= $package['dimentions_unit'] ?>, <?= $package['weight'] ?>
                                                            <?= $package['weight_unit'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>


                                            <div class="border-t mt-2 py-2 text-left px-2">
                                                <a href="#"
                                                    class="text-black font-medium text-sm hover:underline">Manage
                                                    packages</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button
                            class="text-white bg-gray-900 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm w-fit"><?= !empty($editData) ? 'Update Product' : 'Add Product' ?></button>

                    </div>

                    <div class="lg:col-span-1 flex flex-col gap-6">

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-1 relative">
                                <select id="status" name="status"
                                    class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                                    <option class="" <?= !empty($editData) && $editData['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                    <option class="" <?= !empty($editData) && $editData['status'] == 0 ? 'selected' : '' ?>>Draft</option>
                                </select>
                            </div>
                        </div>

                        <div
                            class="bg-white p-6 rounded-lg shadow-sm <?= isset($editData['product_images']) ? 'hidden' : '' ?> ">
                            <h2 class="text-base font-medium text-gray-900">Media</h2>
                            <div
                                class="space-y-1 text-center flex flex-col items-center border-2 border-gray-800 border-dashed rounded-lg p-8">

                                <div id="imagePreview"
                                    class="<?= isset($editData['product_images']) ? '' : 'hidden' ?> mb-4">
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
                </div>

                <div id="myModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/40 backdrop-blur-sm">
                    <div class="flex mt-10 justify-center p-4 w-full">
                        <div
                            class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-5xl overflow-hidden transition-all duration-300">

                            <!-- Modal Header -->
                            <div
                                class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 px-6 py-4">
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                                    Size Chart
                                </h2>
                                <button type="button" onclick="closeModal('myModal')"
                                    class="text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 text-2xl leading-none">
                                    &times;
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="p-6 text-gray-700 dark:text-gray-300 body">
                                <div class="flex gap-6">
                                    <!-- Size Description -->
                                    <div class="flex-1">
                                        <label for="sizeDescription"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                            Size Description
                                        </label>
                                        <textarea id="sizeDescription" name="sizeDescription"
                                            placeholder="Enter size description..." class="w-full h-40 border border-gray-300 dark:border-gray-600 rounded-lg p-3 resize-y
                                                    focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-800
                                                    text-gray-800 dark:text-gray-100 summernote"></textarea>
                                    </div>

                                    <!-- Size Chart Image -->
                                    <div class="flex-1">
                                        <label for="sizeImage"
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                            Upload Size Chart Image
                                        </label>

                                        <div class="flex flex-col items-center gap-2">
                                            <!-- Image Preview -->
                                            <div id="previewContainer"
                                                class="w-full h-48 flex items-center justify-center border border-gray-300 dark:border-gray-600 rounded-lg bg-gray-50 dark:bg-gray-800 overflow-hidden">
                                                <img id="sizeImagePreview" class="object-contain h-full" />
                                                <span id="defaultIcon" class="text-gray-400 text-3xl">📷</span>
                                            </div>

                                            <!-- File Input -->
                                            <input type="file" id="sizeImage" name="sizeImage" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                                                    file:rounded-lg file:border-0
                                                    file:text-sm file:font-semibold
                                                    file:bg-blue-500 file:text-white
                                                    hover:file:bg-blue-600
                                                    dark:file:bg-blue-600 dark:file:text-white" accept="image/*">
                                        </div>
                                    </div>
                                </div>

                                <div class="overflow-x-auto">
                                    <table class="w-full border-collapse text-sm text-left">
                                        <thead>
                                            <tr class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                                <th
                                                    class="px-4 py-2 font-medium border-b border-gray-200 dark:border-gray-600">
                                                    Size</th>
                                                <th
                                                    class="px-4 py-2 font-medium border-b border-gray-200 dark:border-gray-600">
                                                    <div class="flex items-center gap-2">
                                                        <input type="text" value="Chest" name="sizeType[]"
                                                            class="border border-gray-300 dark:border-gray-600 rounded-md px-2 py-1 w-full focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                                        <button type="button" onclick="removeMySize(this)"
                                                            class="text-red-600 hover:text-red-800 text-sm font-medium">✕</button>
                                                    </div>
                                                </th>
                                                <th
                                                    class="px-4 py-2 font-medium border-b border-gray-200 dark:border-gray-600">
                                                    <div class="flex items-center gap-2">
                                                        <input type="text" value="Length" name="sizeType[]"
                                                            class="border border-gray-300 dark:border-gray-600 rounded-md px-2 py-1 w-full focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                                        <button type="button" onclick="removeMySize(this)"
                                                            class="text-red-600 hover:text-red-800 text-sm font-medium">✕</button>
                                                    </div>
                                                </th>
                                                <th
                                                    class="px-4 py-2 font-medium border-b border-gray-200 dark:border-gray-600">
                                                    <div class="flex items-center gap-2">
                                                        <input type="text" value="Sleeve" name="sizeType[]"
                                                            class="border border-gray-300 dark:border-gray-600 rounded-md px-2 py-1 w-full focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                                        <button type="button" onclick="removeMySize(this)"
                                                            class="text-red-600 hover:text-red-800 text-sm font-medium">✕</button>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- JS will fill rows here -->
                                        </tbody>
                                    </table>

                                    <div>
                                        <button type="button" onclick="addColumn()"
                                            class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md mr-2">+
                                            Add Column</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div
                                class="flex justify-end gap-3 border-t border-gray-200 dark:border-gray-700 px-6 py-4 bg-gray-50 dark:bg-gray-900">
                                <button type="button" onclick="closeModal('myModal')"
                                    class="px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    Confirm
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </main>
    </div>


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>
        function generateVariants() {
            console.log("hello");
            const optionsContainer = document.getElementById('optionsContainer');
            const options = [];

            // Collect ALL options from the form (including existing ones)
            for (const optionDiv of optionsContainer.children) {
                const optionName = optionDiv.querySelector('input[type="text"]').value.trim();
                if (!optionName) continue;

                const valuesDiv = optionDiv.querySelector(`#values-${optionDiv.id.split('-')[1]}`);
                const values = Array.from(valuesDiv.querySelectorAll('input[type="text"]'))
                    .map(input => input.value.trim())
                    .filter(v => v);

                if (values.length > 0) {
                    options.push({
                        name: optionName,
                        values
                    });
                }
            }

            const variants = cartesianProduct(options);
            displayVariants(variants, options);
        }


        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const packaging = document.getElementById('packaging');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        let editData = <?= json_encode($editData) ?>;
        console.log(editData);

        let selectedPackage = <?= !empty($selectedPackage) ? json_encode($selectedPackage) : 'null' ?>;

        window.addEventListener('load', () => {
            if (selectedPackage) {
                selectPackage(
                    selectedPackage.package_name,
                    `${selectedPackage.length} × ${selectedPackage.width} × ${selectedPackage.height} ${selectedPackage.dimentions_unit}, ${selectedPackage.weight} ${selectedPackage.weight_unit}`,
                    selectedPackage.id
                );
            }
        });


        function selectPackage(name, description, id) {
            dropdownButton.innerHTML = `
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-box text-gray-400"></i>
                    <div>
                        <div class="font-medium">${name}</div>
                        <div class="text-xs text-gray-500">${description}</div>
                    </div>
                </div>
                <i class="fas fa-chevron-down text-gray-400"></i>
            </div>
        `;
            dropdownMenu.classList.add('hidden');
            packaging.value = id;
        }

        window.addEventListener('click', (e) => {
            if (!document.getElementById('dropdown').contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        let optionCount = document.querySelectorAll('.OptionValues').length;
        let isFirst = 1;

        function addOption() {
            optionCount++;
            isFirst++;
            const container = document.getElementById('optionsContainer');

            const optionDiv = document.createElement('div');

            optionDiv.className = "w-full flex flex-col items-center justify-center mt-2 border-b border-gray-200  rounded-md p-4 OptionDiv";
            optionDiv.id = `option-${optionCount}`;

            let addSize = "";
            let val = "";
            if (isFirst == 1) {
                addSize = `<button onclick="addSizeChart()" type="button" class="text-blue-800 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Add Size Chart</button>`
                val = 'value="Size"';
            }

            optionDiv.innerHTML = `
            <span class="w-full text-left">Option Name</span>
                <div class="flex justify-between items-center mb-2 w-full">
                    <input type="text" class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2" name="options_name[]" placeholder="Eg. Size" ${val}>
                    
                </div>
                <div id="values-${optionCount}" class="space-y-2 w-full mt-3">
                            <span class="w-full text-left mb-2">Option Values</span>
                </div>
                <div class="w-full flex items-center justify-between mt-3">
                    <button onclick="addValue(${optionCount})" type="button" class="text-white bg-gray-900 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Add Option Values</button>
                    ${addSize}
                    <button onclick="removeOption(${optionCount})" type="button" class="text-red-800 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Delete Option</button>
                    
                    
                </div>
            `;

            container.appendChild(optionDiv);

            // Add the first value input by default
            addValue(optionCount);

        }
        var sizeCount = true;

        function addSizeChart() {
            const modal = document.getElementById("myModal");
            const container = document.getElementById("optionsContainer");
            const optionDivValues = container.querySelector(".OptionDiv").querySelectorAll(".OptionValues");

            console.log("sizes", optionDivValues);

            let modalHtml = "";
            let trHtml = "";
            const modalTableTh = modal.querySelector("thead tr").querySelectorAll("th");

            console.log(modalTableTh.length);

            if (sizeCount) {
                // Build empty inputs for each column (except 'Size')
                for (let i = 0; i < modalTableTh.length - 1; i++) {
                    trHtml += `
                    <td class="px-4 py-2">
                        <input type="text" name="sizeValues[]"
                        class="sizeValues border border-gray-300 rounded-md px-3 py-1 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </td>
                    `;
                }

                // Generate table rows dynamically
                optionDivValues.forEach((ele) => {
                    const sizeValue = ele.querySelector("input").value.trim();

                    modalHtml += `
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">
                        <input type="text" value="${sizeValue}" name="sizeVariant[]"
                            class="border border-gray-300 rounded-md px-3 py-1 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </td>
                        ${trHtml}
                    </tr>
                    `;
                });

                modal.querySelector("tbody").innerHTML = modalHtml;
            }
            modal.classList.remove("hidden");
            sizeCount = false;
            setChartValues();
        }

        function setChartValues() {
            let modal = document.getElementById("myModal");
            let sizeChart = <?= json_encode($sizeChart) ?>;

            // Select all rows in table body
            let rows = modal.querySelectorAll("tbody tr");

            rows.forEach(row => {
                // Get all cells in the row
                let tds = row.querySelectorAll("td");

                // Get the size value (first input)
                let sizeInput = tds[0].querySelector("input");
                let sizeValue = sizeInput.value.trim();

                // Check if this size exists in sizeChart
                if (sizeChart[sizeValue]) {
                    // Fill the other inputs (Chest, Length, Sleeve)
                    let keys = Object.keys(sizeChart[sizeValue]);
                    for (let i = 0; i < keys.length; i++) {
                        let colInput = tds[i + 1].querySelector("input");
                        if (colInput) colInput.value = sizeChart[sizeValue][keys[i]];
                    }
                }
            });
        }



        function removeMySize(buttonOrEvent) {
            // Accept either the element or an event
            const button = (buttonOrEvent && buttonOrEvent.target) ? buttonOrEvent.target : buttonOrEvent;
            if (!button || !(button instanceof Element)) return;

            // 1) Walk up from the button to try to find a <TH> and the enclosing <TABLE>
            let el = button;
            let th = null;
            let table = null;
            while (el && el.nodeType === 1) {
                if (!th && el.tagName === 'TH') th = el;
                if (el.tagName === 'TABLE') {
                    table = el;
                    break;
                }
                el = el.parentNode;
            }

            // 2) If table not found yet, continue walking up to find TABLE (in case TH wasn't encountered)
            if (!table) {
                el = button.parentNode;
                while (el && el.nodeType === 1) {
                    if (el.tagName === 'TABLE') {
                        table = el;
                        break;
                    }
                    el = el.parentNode;
                }
            }

            // 3) If we have a table but no TH, try to find the TH inside this table that contains the button
            if (!th && table) {
                const thead = table.querySelector('thead');
                if (thead) {
                    const ths = thead.querySelectorAll('th');
                    for (let i = 0; i < ths.length; i++) {
                        if (ths[i].contains(button)) {
                            th = ths[i];
                            break;
                        }
                    }
                }
            }

            // 4) Final fallback: search all tables on page for a TH that contains the button
            if (!th || !table) {
                const tables = document.querySelectorAll('table');
                for (let ti = 0; ti < tables.length && (!th || !table); ti++) {
                    const t = tables[ti];
                    const ths = t.querySelectorAll('thead th');
                    for (let hi = 0; hi < ths.length; hi++) {
                        if (ths[hi].contains(button)) {
                            table = t;
                            th = ths[hi];
                            break;
                        }
                    }
                }
            }

            // If still not found, bail out
            if (!table || !th) return;

            // 5) Determine column index of the TH within its header row
            const headerRow = th.parentNode;
            let colIndex = 0;
            const headerCells = headerRow.children;
            for (let i = 0; i < headerCells.length; i++) {
                if (headerCells[i] === th) {
                    colIndex = i;
                    break;
                }
            }

            // 6) Remove the header cell
            headerRow.removeChild(th);

            // 7) Remove corresponding TD in every tbody row (handle multiple TBODYs too)
            const tbodies = table.tBodies;
            for (let bi = 0; bi < tbodies.length; bi++) {
                const rows = tbodies[bi].rows;
                for (let ri = 0; ri < rows.length; ri++) {
                    const cells = rows[ri].children;
                    if (cells[colIndex]) {
                        rows[ri].removeChild(cells[colIndex]);
                    }
                }
            }
        }


        function addColumn() {
            const modal = document.getElementById("myModal");
            const headRow = modal.querySelector("thead tr")
            const rows = modal.querySelectorAll('tbody tr');

            // Create new header cell
            const th = document.createElement('th');
            th.className = "px-4 py-2 font-medium border-b border-gray-200 dark:border-gray-600";
            th.innerHTML = `
                <div class="flex items-center gap-2">
                <input type="text" value="New Size" name="sizeType[]" class="border border-gray-300 dark:border-gray-600 rounded-md px-2 py-1 w-full focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <button onclick="removeMySize(this)" class="text-red-600 hover:text-red-800 text-sm font-medium">✕</button>
                </div>
            `;
            headRow.appendChild(th);

            // Add a column in each row
            rows.forEach(row => {
                const td = document.createElement('td');
                td.className = "px-4 py-2";
                td.innerHTML = `<input type="text" name="sizeValues[]" class="border border-gray-300 rounded-md px-3 py-1 w-full text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">`;
                row.appendChild(td);
            });
        }

        function closeModal() {
            document.getElementById("myModal").classList.add('hidden');
        }

        function removeOption(id) {
            const optionDiv = document.getElementById(`option-${id}`);
            optionDiv.remove();
            isFirst--;
        }

        function addValue(optionId) {
            const valuesDiv = document.getElementById(`values-${optionId}`);
            const valueInput = document.createElement('div');

            valueInput.className = "flex items-center flex-col justify-center w-full OptionValues";

            valueInput.innerHTML = `
            <div class="w-full flex items-center justify-center w-full gap-3">
                                <input placeholder="Eg. Small" type="text" name="options_value[${optionId}][]" class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                                <button onclick="removeValue(this)"><i class="fa-solid fa-trash-can text-gray-500"></i></button>
                                </div>
                
            `;

            valuesDiv.appendChild(valueInput);
        }

        function removeValue(button) {
            button.parentElement.remove();
        }



        // Enhanced cartesian product function to handle object structure
        function cartesianProduct(options) {
            if (options.length === 0) return [{}];

            const currentOption = options[0];
            const remainingOptions = options.slice(1);
            const remainingCombinations = cartesianProduct(remainingOptions);

            const result = [];

            currentOption.values.forEach(value => {
                remainingCombinations.forEach(combination => {
                    result.push({
                        [currentOption.name]: value,
                        ...combination
                    });
                });
            });

            return result;
        }


        function displayVariants(variants, options) {
            console.log("Generated variants:", variants);
            const tbody = document.getElementById('variantsTableBody');

            // Create a Set to track existing variants from PHP data
            const existingVariants = new Set();

            <?php if (!empty($editData)): ?>
                <?php foreach ($variants as $vkey => $vdata): ?>
                    <?php
                    $jsonData = json_decode($vdata['options'], true);
                    $lines = explode("\n", trim($jsonData));
                    $pvoptions = [];
                    foreach ($lines as $kkey => $line) {
                        $pvoptions = json_decode($line, true);
                    }
                    // Create a consistent variant string for comparison - CORRECTED PHP SYNTAX
                    $variantParts = [];
                    foreach ($pvoptions as $key => $value) {
                        $variantParts[] = $value; // Correct PHP array push syntax
                    }
                    $variantString = implode(' / ', $variantParts); // Correct PHP array join
                    ?>
                    existingVariants.add("<?= addslashes($variantString) ?>");
                <?php endforeach; ?>
            <?php endif; ?>

            // Start with existing PHP rows (don't clear them)
            let newIndex = <?= !empty($editData) ? count($variants) : 0 ?>;
            let newRowsHTML = '';

            variants.forEach((variant, index) => {
                // Convert variant object to consistent string format
                const variantText = options.map(opt => variant[opt.name]).join(' / ');

                console.log("Checking variant:", variantText, "Exists:", existingVariants.has(variantText));

                // Skip if variant already exists in edit data
                if (existingVariants.has(variantText)) {
                    return;
                }

                // This is a new variant combination
                newRowsHTML += `
            <tr class="hover:bg-gray-50 border border-gray-200">
                <td class="px-3 py-3">
                    <div class="flex items-center justify-start gap-3">
                        <div class="bg-white border border-gray-300 flex items-center justify-center w-20 h-20 rounded-xl cursor-pointer image-placeholder overflow-hidden" data-index="${newIndex}">
                            <i class="fa-solid fa-images text-xl"></i>
                            <img src="" alt="" class="hidden w-full h-full object-contain relative z-10">
                        </div>
                        <input type="file" name="variant_images[${newIndex}][]" accept="image/*" class="hidden file-input" multiple data-index="${newIndex}">
                        <span>${variantText}</span>
                        <input type="hidden" name="variant_options[${newIndex}]" value='${JSON.stringify(variant).replace(/'/g, "&apos;")}'>
                    </div>
                </td>
                <td class="px-3 py-3">
                    <input type="number" name="variant_prices[${newIndex}]" class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" placeholder="₹ 0.00" required>
                </td>
                <td class="px-3 py-3">
                    <input type="number" name="variant_quantities[${newIndex}]" class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" value="0" required>
                </td>
                <?php if (!empty($editData)): ?>
                <td class="px-3 py-3">
                    <div class="gap-4">
                        <button type="button" class="text-red-600 text-lg remove-variant"><i class="fa fa-trash"></i></button>
                    </div>
                </td>
                <?php endif; ?>
            </tr>
        `;

                newIndex++;
            });

            // Append new rows to existing table
            tbody.innerHTML += newRowsHTML;

            // Add event listeners for remove buttons
            document.querySelectorAll('.remove-variant').forEach(button => {
                button.addEventListener('click', function () {
                    this.closest('tr').remove();
                });
            });

            // Show the variants section
            document.getElementById('variantsSection').classList.remove('hidden');

            console.log("Added", newRowsHTML ? newRowsHTML.split('</tr>').length - 1 : 0, "new variants");
        }

        function CalculateProfitMargin() {
            var cost_per_item = document.getElementById("cost-per-item").value;
            var price = document.getElementById("price").value;
            var compare_price = document.getElementById("compare-price").value;
            var profit = price - cost_per_item;
            var margin = ((price - cost_per_item) / price) * 100;
            margin = margin.toFixed() + "%";
            document.getElementById("profit").value = profit;
            document.getElementById("margin").value = margin;
        }
        // toastr.error("Product added successfully");

        document.addEventListener('click', function (e) {
            const modals = document.querySelectorAll('[id^="myModal"]');
            modals.forEach(modal => {
                if (!modal.classList.contains('hidden') && e.target === modal) {
                    closeModal(modal.id);
                }
            });
        });

        document.getElementById('sizeImage').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const previewContainer = document.getElementById('previewContainer');
            const previewImage = document.getElementById('sizeImagePreview');
            const defaultIcon = document.getElementById('defaultIcon');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block";
                    defaultIcon.style.display = "none";
                };
                reader.readAsDataURL(file);
            } else {
                previewImage.src = "";
                previewImage.style.display = "none";
                defaultIcon.style.display = "block";
            }
        });

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

        document.getElementById('productForm').addEventListener('submit', function (e) {
            e.preventDefault(); // prevent actual submit first
            let tt = document.getElementById("variantsTableBody").querySelectorAll("tr")

            let compare = document.getElementById("compare-price");

            if (tt.length == 0) {
                alert("Please Create Atleas 1 Variant")
                generateVariants();
                return
            }

            // if(document.getElementById("shortDescription").value){
            //     alert("Please Enter Discription")
            //     return;
            // }

            let trs = document.getElementById("variantsTableBody").querySelectorAll("tr")

            console.log(trs)

            for (let i = 0; i < trs.length; i++) {
                const inputs = trs[i].querySelectorAll("input");

                const priceValue = inputs[2]?.value || ""; // safeguard in case input doesn’t exist
                // console.log(inputs, priceValue)
                // convert to integer safely
                const price = parseInt(priceValue, 10) || 0; // if NaN or empty => becomes 0

                if (price > compare.value) {
                    // console.log(`Row ${i + 1}: price is 0`);
                    alert("Variant price should not be greater than or equal to compare price")
                    return;
                }
            }

            let modal = document.getElementById("myModal").querySelectorAll(".sizeValues")

            console.log(modal)


            if (modal.length === 0) {
                alert("Please create size chart")
                addSizeChart();
                return;
            }

            for (let i = 0; i < trs.length; i++) {
                if (modal[i].value == "" || modal[i].value == null) {
                    alert("Please enter propper values in size chart")
                    addSizeChart();
                    return;
                }
            }


            // ✅ All validations passed — now submit
            console.log("Submitting....")

            this.submit();
        });

        // addOption();
    </script>
</body>

</html>