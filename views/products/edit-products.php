<!DOCTYPE html>
<html lang="en">

<?php
// printWithPre($_SESSION); 
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
                    <h1 class="text-2xl font-semibold ml-2">Edit Product</h1>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data"
                class="w-full flex flex-col items-center justify-center">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 w-[85%] pb-10">
                    <div class="lg:col-span-2 flex flex-col gap-6">

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="title">Title</label>
                            <input
                                class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                value="<?= isset($productData['name']) ? $productData['name'] : '' ?>" name="name"
                                id="title" placeholder="e.g., Summer collection, Under $100, Staff picks" type="text" />
                            <label class="block text-sm font-medium text-gray-700 mt-6 mb-1"
                                for="description">Description</label>
                            <div class="border border-gray-800 rounded-md">
                                <textarea class="w-full h-40 border-0 focus:ring-0 resize-y p-3 summernote"
                                    placeholder=""
                                    name="description"><?= isset($productData['description']) ? $productData['description'] : '' ?></textarea>
                            </div>
                            <h2 class="text-sm font-medium mt-3">Category</h2>
                            <div class="w-full flex items-center justify-start">
                                <select name="category" class="selectElement">
                                    <?php
                                    foreach ($categories as $category) {
                                        ?>
                                        <option value="<?= $category['id'] ?>" <?= (isset($productData["category"]) && $productData["category"] == $category['id']) ? "selected" : "" ?>>
                                            <?= $category['category'] ?>
                                        </option>

                                    <?php } ?>
                                    ?>
                                </select>

                            </div>
                            <p class="mt-2 text-sm text-gray-500">Determines tax rates and adds metafields to improve
                                search, filters, and cross-channel sales</p>
                        </div>



                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h2 class="text-base font-medium text-gray-900">Pricing</h2>
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                    <div class="relative mt-1 rounded-md">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <!-- <span class="text-gray-500 sm:text-sm">₹</span> -->
                                        </div>
                                        <input type="number" step="0.1"
                                            value="<?= isset($productData['price']) ? $productData['price'] : '' ?>"
                                            name="price" id="price"
                                            class="w-full border border-gray-800 rounded-md  focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                            placeholder="₹0.00" oninput="CalculateProfitMargin()">
                                    </div>
                                </div>
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
                                        <input type="number" name="compare_price" id="compare-price"
                                            value="<?= isset($productData['compare_price']) ? $productData['compare_price'] : '' ?>"
                                            class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                            placeholder="₹0.00" oninput="CalculateProfitMargin()">
                                    </div>
                                </div>
                            </div>
                            <div class="relative flex items-start mt-2">
                                <div class="flex h-5 items-center">
                                    <input id="charge-tax" name="charge_tax" type="checkbox"
                                        <?= (isset($productData["charge_tax"]) && !empty($productData["charge_tax"]) ? "checked" : "") ?>
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

                                        <input type="text" name="cost_per_item"
                                            value="<?= isset($productData['cost_per_item']) ? $productData['cost_per_item'] : '' ?>"
                                            id="cost-per-item" oninput="CalculateProfitMargin()"
                                            class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                            placeholder="₹0.00">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Profit</label>
                                    <input type="text" name="profit" id="profit"
                                        value="<?= isset($productData['profit']) ? $productData['profit'] : '' ?>"
                                        class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                        placeholder="₹0.00" readonly>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Margin (%)</label>
                                    <input type="text" name="margin" id="margin"
                                        value="<?= isset($productData['margin']) ? $productData['margin'] : '' ?>"
                                        class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2"
                                        placeholder="₹0.00" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h2 class="text-base font-medium text-gray-900">Inventory</h2>

                            <div class="relative flex items-start mt-2">
                                <div class="flex h-5 items-center">
                                    <input name="track_quantity" type="checkbox"
                                        <?= (isset($productData["track_quantity"]) && !empty($productData["track_quantity"]) ? "checked" : "") ?>
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
                                        <?= (isset($productData["continue_selling"]) && !empty($productData["continue_selling"]) ? "checked" : "") ?>
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

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h2 class="text-base font-medium text-gray-900">Shipping</h2>

                            <div class="relative flex items-start mt-2">
                                <div class="flex h-5 items-center">
                                    <input id="physical-product" name="physical_product" type="checkbox"
                                        <?= (isset($productData["physical_product"]) && !empty($productData["physical_product"]) ? "checked" : "") ?>
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

                                    <input type="hidden" name="packaging" id="packaging"
                                        value="<?= isset($productData['packaging']) ? $productData['packaging'] : '' ?>">
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
                                            <?php foreach ($packages as $package) { ?>
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


                        <div class="bg-white p-6 rounded-lg shadow-sm w-full">
                            <h2 class="text-base font-medium text-gray-900">Variants</h2>
                            <div class="w-full mx-auto">

                                <!-- Options Container -->
                                <div
                                    class="flex flex-col items-center justify-center border border-gray-200 rounded-lg w-full">
                                    <div id="optionsContainer" class="space-y-6 w-full">
                                        <?php

                                        /**
                                         * Robustly decode variant options which might be:
                                         * - already an array
                                         * - a JSON object string: '{"Size":"S","Color":"Red"}'
                                         * - a double-encoded JSON string: '"{\"Size\":\"S\",\"Color\":\"Red\"}"'
                                         * - an escaped string: "{\"Size\":\"S\",\"Color\":\"Red\"}"
                                         *
                                         * Returns an associative array on success, or [] on failure.
                                         */
                                        function parse_variant_options($options)
                                        {
                                            // already decoded
                                            if (is_array($options)) {
                                                return $options;
                                            }

                                            // object -> cast to array
                                            if (is_object($options)) {
                                                return (array) $options;
                                            }

                                            // not a string -> bail
                                            if (!is_string($options) || $options === '') {
                                                return [];
                                            }

                                            // Try 1: normal json_decode
                                            $decoded = json_decode($options, true);
                                            if (json_last_error() === JSON_ERROR_NONE) {
                                                if (is_array($decoded)) {
                                                    return $decoded;
                                                }
                                                // possible double-encoded: json_decode returned a string like '{"Size":"S",...}'
                                                if (is_string($decoded)) {
                                                    $decoded2 = json_decode($decoded, true);
                                                    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded2)) {
                                                        return $decoded2;
                                                    }
                                                }
                                            }

                                            // Try 2: remove escaping (stripslashes) then decode
                                            $clean = stripslashes($options);
                                            $decoded = json_decode($clean, true);
                                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                                return $decoded;
                                            }

                                            // Try 3: trim surrounding quotes and decode
                                            $trimmed = trim($options, "\"'");
                                            $decoded = json_decode($trimmed, true);
                                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                                return $decoded;
                                            }

                                            // Try 4: fallback regex parse for "key":"value" pairs
                                            $pairs = [];
                                            if (preg_match_all('/"([^"]+)"\s*:\s*"([^"]+)"/', $options, $matches, PREG_SET_ORDER)) {
                                                foreach ($matches as $m) {
                                                    $pairs[$m[1]] = $m[2];
                                                }
                                                if (!empty($pairs)) {
                                                    return $pairs;
                                                }
                                            }

                                            // give up
                                            return [];
                                        }

                                        /**
                                         * Example grouping function that uses the parser above.
                                         */
                                        function groupOptions(array $variants)
                                        {
                                            $grouped = [];

                                            foreach ($variants as $variant) {
                                                $options = parse_variant_options($variant['options']);

                                                foreach ($options as $key => $value) {
                                                    if (!isset($grouped[$key])) {
                                                        $grouped[$key] = [];
                                                    }
                                                    if (!in_array($value, $grouped[$key], true)) {
                                                        $grouped[$key][] = $value;
                                                    }
                                                }
                                            }

                                            return $grouped;
                                        }


                                        $variantsLabel = getData2("SELECT * FROM tbl_variants where product_id='$id'");
                                        // printWithPre(json_decode($variantsLabel[0]["options"]));
                                        $vv = groupOptions($variantsLabel);
                                        // printWithPre($vv);
                                        $ii=0;
                                        foreach($vv as $key=>$oldVariant){
                                            $ii ++ ;
                                            ?>
                                            <div class="w-full flex flex-col items-center justify-center mt-2 border-b border-gray-200  rounded-md p-4"
                                                id="option-1">
                                                <span class="w-full text-left">Option Name</span>
                                                <div class="flex justify-between items-center mb-2 w-full">
                                                    <input type="text"
                                                        class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2"
                                                        name="options_name[]" value="<?=$key?>" placeholder="Eg. Size">

                                                </div>
                                                <div id="values-<?=$ii?>" class="space-y-2 w-full mt-3">
                                                    <span class="w-full text-left mb-2">Option Values</span>
                                                    <?php
                                                    foreach($oldVariant as $ov){
                                                        ?>
                                                        <div class="flex items-center flex-col justify-center w-full ">
                                                            <div class="w-full flex items-center justify-center w-full gap-3">
                                                                <input placeholder="Eg. Small" type="text"
                                                                    name="options_value[<?=$ii?>][]"
                                                                    value="<?=$ov?>"
                                                                    class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                                                                <button onclick="removeValue(this)"><i
                                                                        class="fa-solid fa-trash-can text-gray-500"
                                                                        aria-hidden="true"></i></button>
                                                            </div>

                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="w-full flex items-center justify-between mt-3">
                                                    <button onclick="removeOption(1)" type="button"
                                                        class="text-red-800 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Delete</button>
                                                    <button onclick="addValue(1)" type="button"
                                                        class="text-white bg-gray-900 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Add</button>
                                                </div>
                                            </div>
                                            <?php
                                        }

                                        ?>
                                        
                                    </div>
                                    <div class="flex items-center justify-between w-[95%] py-2">
                                        <button onclick="addOption()" type="button"
                                            class="focus:outline-none focus:ring-0">
                                            <i class="fa-solid fa-circle-plus mr-2 border-none" aria-hidden="true"></i>
                                            Add another option
                                        </button>

                                        <button onclick="generateVariants()" type="button"
                                            class="focus:outline-none focus:ring-0">
                                            <i class="fa-solid fa-layer-group mr-2 border-none" aria-hidden="true"></i>
                                            Generate Variants
                                        </button>
                                    </div>
                                </div>



                                <!-- Variants Table -->
                                <div id="variantsSection" class="hidden w-full">

                                    <table class="w-full table-auto border-collapse border border-gray-300 text-sm">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-3 py-3 text-left">Variant</th>
                                                <th class="border border-gray-300 px-3 py-3 text-left">Price</th>
                                                <th class="border border-gray-300 px-3 py-3 text-left">Available</th>
                                            </tr>
                                        </thead>
                                        <tbody id="variantsTableBody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <button
                            class="text-white bg-gray-900 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm w-fit">Add</button>



                    </div>

                    <div class="lg:col-span-1 flex flex-col gap-6">

                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-1 relative">
                                <select id="status" name="status"
                                    class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                                    <option class="">Active</option>
                                    <option class="">Draft</option>
                                </select>

                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm">
                            <h2 class="text-base font-medium text-gray-900">Media</h2>
                            <div
                                class="space-y-1 text-center flex flex-col items-center border-2 border-gray-800 border-dashed rounded-lg p-8">

                                <div id="imagePreview" class="<?= isset($productData['image']) ? '' : 'hidden' ?> mb-4">
                                    <!-- <input type="hidden" name="old_vdata_image" value=""> -->
                                    <img src="/<?= isset($productData['image']) ? $productData['image'] : '' ?>"
                                        alt="Preview" class="mx-auto h-32 object-cover">
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
                                            accept="image/*" required multiple>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
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
            // console.log("hello1", optionsContainer);
            for (const optionDiv of optionsContainer.children) {
                // console.log(optionDiv);
                const optionName = optionDiv.querySelector('input[type="text"]').value.trim();
                if (!optionName) continue;
                // console.log(optionName);

                const valuesDiv = optionDiv.querySelector(`#values-${optionDiv.id.split('-')[1]}`);
                const values = Array.from(valuesDiv.querySelectorAll('input[type="text"]'))
                    .map(input => input.value.trim())
                    .filter(v => v);
                // console.log(values)
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
        let optionCount = 0;

        function addOption() {
            optionCount++;
            const container = document.getElementById('optionsContainer');

            const optionDiv = document.createElement('div');

            optionDiv.className = "w-full flex flex-col items-center justify-center mt-2 border-b border-gray-200  rounded-md p-4";
            optionDiv.id = `option-${optionCount}`;

            optionDiv.innerHTML = `
            <span class="w-full text-left">Option Name</span>
                <div class="flex justify-between items-center mb-2 w-full">
                    <input type="text" class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2 mt-2" name="options_name[]" placeholder="Eg. Size">
                    
                </div>
                <div id="values-${optionCount}" class="space-y-2 w-full mt-3">
                            <span class="w-full text-left mb-2">Option Values</span>
</div>
                <div class="w-full flex items-center justify-between mt-3">
                                <button onclick="removeOption(${optionCount})" type="button" class="text-red-800 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Delete</button>
                                <button onclick="addValue(${optionCount})" type="button" class="text-white bg-gray-900 font-semibold text-sm py-2 px-4 rounded-md border shadow-sm">Add</button>
                            </div>
            `;

            container.appendChild(optionDiv);

            // Add the first value input by default
            addValue(optionCount);
        }

        function removeOption(id) {
            const optionDiv = document.getElementById(`option-${id}`);
            optionDiv.remove();
        }

        function addValue(optionId) {
            const valuesDiv = document.getElementById(`values-${optionId}`);
            const valueInput = document.createElement('div');

            valueInput.className = "flex items-center flex-col justify-center w-full ";

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



        function cartesianProduct(options) {
            if (!options.length) return [];

            let result = options[0].values.map(value => ({
                [options[0].name]: value
            }));

            for (let i = 1; i < options.length; i++) {
                const option = options[i];
                let temp = [];
                result.forEach(variant => {
                    option.values.forEach(value => {
                        temp.push({
                            ...variant,
                            [option.name]: value
                        });
                    });
                });
                result = temp;
            }

            return result;
        }

        function displayVariants(variants, options) {
            console.log("fbjh", variants)
            const tbody = document.getElementById('variantsTableBody');
            tbody.innerHTML = '';

            variants.forEach((variant, index) => {
                const row = document.createElement('tr');
                row.className = "hover:bg-gray-50 border border-gray-200";

                const variantText = options.map(opt => `${variant[opt.name]}`).join(' / ');

                row.innerHTML = `
            <td class="px-3 py-3">
        <div class="flex items-center justify-start gap-3">
            <div class="bg-white border border-gray-300 flex items-center justify-center w-20 h-20 rounded-xl cursor-pointer image-placeholder overflow-hidden" data-index="${index}">
                <i class="fa-solid fa-images text-xl"></i>
                <img src="" alt="" class="hidden w-full h-full object-contain relative z-10">
            </div>
            <input type="file" name="variant_images[${index}][]" accept="image/*" class="hidden file-input" multiple data-index="${index}">
            <span>${variantText}</span>
            <input type="hidden" name="variant_options[${index}]" value='${JSON.stringify(variant).replace(/'/g, "&apos;")}'>
        </div>
    </td>
    <td class="px-3 py-3">
        <input type="number" name="variant_prices[${index}]" class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" placeholder="₹ 0.00">
    </td>
    <td class="px-3 py-3">
        <input type="number" name="variant_quantities[${index}]" class="w-full border border-gray-800 rounded-md focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2" value="0">
    </td>
        `;

                tbody.appendChild(row);
            });
            console.log(tbody)
            // Add event listeners after rows are added
            document.querySelectorAll('.image-placeholder').forEach(div => {
                div.addEventListener('click', function () {
                    const index = this.getAttribute('data-index');
                    const fileInput = document.querySelector(`.file-input[data-index="${index}"]`);
                    if (fileInput) {
                        fileInput.click();
                    }
                });
            });

            document.querySelectorAll('.file-input').forEach(input => {
                input.addEventListener('change', function () {
                    const index = this.getAttribute('data-index');
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const placeholder = document.querySelector(`.image-placeholder[data-index="${index}"]`);
                            const img = placeholder.querySelector('img');
                            const icon = placeholder.querySelector('i');

                            img.src = e.target.result;
                            img.classList.remove('hidden');
                            icon.classList.add('hidden');
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });

            document.getElementById('variantsSection').classList.remove('hidden');

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
    </script>
</body>

</html>