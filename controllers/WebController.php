<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LoginController.php";

class WebController extends LoginController
{
    private $db;
    public function __construct($db = null)
    {
        if ($db != null) {
            $this->db = $db;
        } else {
            $this->db = getDBObject()->getConnection();
        }
        parent::__construct($this->db);
    }

    public function getProductData()
    {
        $id = $_POST['productid'];
        $ProductData = getData2("SELECT tbl_products.*, tbl_category.category as category_name FROM `tbl_products` LEFT JOIN tbl_category ON tbl_products.category = tbl_category.id WHERE tbl_products.id = $id")[0];
        $varients = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = $id");
        $ProductData['varients'] = $varients;

        // Start output buffering
        ob_start();
        // printWithPre($ProductData);
        $comparePrice = floatval($ProductData['compare_price']);
        $price = floatval($ProductData['varients'][0]["price"]);
        $discountAmount = $comparePrice - $price;
        $discountPercentage = $comparePrice > 0 ? round(($discountAmount / $comparePrice) * 100) : 0;
?>

        <?php
        // printWithPre($ProductData);

        if (!empty($ProductData['varients'])) {
            $images = [];
            $options = [];
            foreach ($ProductData['varients'] as $key => $variant) {
                $images[] = json_decode($variant['images'], true);
                $options[] = json_decode($variant['options'], true);
            }
            // printWithPre($images);
            // printWithPre($options);
            $opt = [];
            $img = [];
            foreach ($options as $key => $option) {
                $opt[] = json_decode($option, true);
            }
            // printWithPre($opt);
            $grouped = groupAttributes($opt);
            // printWithPre($grouped);

            // Take only the last image from each images set
            $lastImages = array_map(function ($imgSet) {
                return end($imgSet);
            }, $images);

            // Final result
            $finalData = [
                'options' => $options,  // all JSON strings
                'images' => $lastImages
            ];

            // printWithPre($finalData);
        ?>
            <?php
            if (!isset($_POST["product_details"])) {
            ?>
                <div class="w-full flex items-center bg-white justify-between px-4 py-5 md:hidden">
                    <span class="uppercase ">SELECT OPTIONS</span>
                    <button id="closeAddToCartSidebar" class="text-gray-500 text-2xl hover:text-black animate-rotate-pingpong" onclick="CloseVariant()">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="w-[47%] max-md:w-full p-3 max-md:p-1 md:h-full md:overflow-y-scroll max-md:overflow-x-scroll bg-gray-200 flex md:flex-col items-center justify-start no-scrollbar gap-3 transform translate-x-full transition-transform duration-[0.8s] ease-in-out"
                    id="VarImg">

                    <?php
                    foreach (array_reverse($images[0]) as $key => $image) {

                    ?>
                        <img src="/<?= $image ?>" alt="" class="max-md:w-[80%] max-md:h-[80%] w-full h-full object-cover">
                    <?php } ?>
                </div>
            <?php
            }
            ?>
            <div class=" h-full <?= !isset($_POST["product_details"]) ? " w-[53%] max-md:w-full overflow-y-scroll" : "" ?> flex flex-col items-start justify-start z-10 bg-white"
                id="VarDetails">
                <?php
                if (!isset($_POST["product_details"])) {
                ?>
                    <div class="w-full flex items-center justify-between px-7 pt-7 max-md:hidden">
                        <span class="uppercase ">SELECT OPTIONS</span>
                        <button id="closeAddToCartSidebar" class="text-gray-500 text-2xl hover:text-black animate-rotate-pingpong"
                            onclick="CloseVariant()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <span class="w-full h-[1px] bg-gray-200 my-5"></span>
                <?php
                }
                ?>

                <div class="flex flex-col items-start justify-start w-full max-md:mb-8 <?= !isset($_POST["product_details"]) ? "px-7" : "" ?>">
                    <?php
                    if (!isset($_POST["product_details"])) {
                    ?>
                        <h2 class="w-full text-[1.7rem] max-md:text-lg leading-[2rem] uppercase "><?= $ProductData['name'] ?></h2>
                        <div class="flex items-center justify-center gap-3 mt-1 prices">
                            <span
                                class="text-gray-300 text-xl line-through whitespace-nowrap">Rs.<?= formatNumber($ProductData['compare_price']) ?>.00</span>
                            <span
                                class="text-[#f25b21] text-xl whitespace-nowrap">Rs.<?= formatNumber($ProductData['varients'][0]["price"]) ?>.00</span>
                            <span class="text-xs bg-[#f25b21] text-white py-1 px-2 rounded-lg whitespace-nowrap">SAVE
                                <?= $discountPercentage ?>%</span>

                        </div>
                        <p class="text-sm text-gray-900 mt-2"><?= $ProductData["shortDescription"] ?></p>
                    <?php
                    }
                    ?>

                    <?php
                    // printWithPre($grouped);
                    foreach ($grouped as $key => $value) {
                        $ogkey = $key;
                        $key = strtolower(str_replace(' ', '', $key));
                        // echo $key;
                        if ($key == 'size') {

                    ?>
                            <?php
                            $sizeChart = (array) json_decode($ProductData["sizeChart"]);
                            // printWithPre($sizeChart);    
                            if (!empty($ProductData["sizeChart"])) {

                                $sizeChartValue = $sizeChart[$value[0]];
                                $sizeChartValueString = [];
                                foreach ($sizeChartValue as $kk => $sv) {
                                    $sizeChartValueString[] = "$kk $sv inch";
                                }

                                $sizeChartValueString = implode(" | ", $sizeChartValueString)

                            ?>
                                <div class="w-full flex max-md:flex-col-reverse items-center max-md:items-start justify-between text-sm">
                                    <div class="flex max-md:flex-col items-center max-md:items-start justify-center gap-2">
                                        <p class="uppercase text-lg max-md:text-sm"><?= $key ?></p>
                                        <div
                                            class="bg-gray-100 py-[0.1rem] px-3 text-xs border border-gray-300 rounded <?= !isset($_POST["product_details"]) ? "changeSideVariant" : "changeDetailVariant" ?>">
                                            <?= $sizeChartValueString ?>
                                        </div>
                                    </div>

                                    <div class="flex gap-1 cursor-pointer items-end justify-center max-md:justify-end max-md:w-full"
                                        onclick="showSizeChart('<?= $id ?>')">
                                        <svg class="icon icon-accordion mb-1 color-foreground-" aria-hidden="true" focusable="false"
                                            role="presentation" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 20 20">
                                            <path
                                                d="M18.9836 5.32852L14.6715 1.01638L1.01638 14.6715L5.32852 18.9836L18.9836 5.32852ZM15.3902 0.297691C14.9933 -0.0992303 14.3497 -0.0992303 13.9528 0.297691L0.297691 13.9528C-0.0992301 14.3497 -0.0992305 14.9932 0.297691 15.3902L4.60983 19.7023C5.00675 20.0992 5.65029 20.0992 6.04721 19.7023L19.7023 6.04721C20.0992 5.65029 20.0992 5.00675 19.7023 4.60983L15.3902 0.297691Z"
                                                fill-rule="evenodd"></path>
                                            <path
                                                d="M11.7863 2.67056C11.9848 2.4721 12.3065 2.4721 12.505 2.67056L14.4237 4.58927C14.6222 4.78774 14.6222 5.1095 14.4237 5.30796C14.2252 5.50642 13.9035 5.50642 13.705 5.30796L11.7863 3.38925C11.5878 3.19079 11.5878 2.86902 11.7863 2.67056Z">
                                            </path>
                                            <path
                                                d="M8.93891 5.36331C9.13737 5.16485 9.45914 5.16485 9.6576 5.36331L11.5763 7.28202C11.7748 7.48048 11.7748 7.80225 11.5763 8.00071C11.3779 8.19917 11.0561 8.19917 10.8576 8.00071L8.93891 6.082C8.74045 5.88354 8.74045 5.56177 8.93891 5.36331Z">
                                            </path>
                                            <path
                                                d="M6.24307 8.20742C6.44153 8.00896 6.76329 8.00896 6.96175 8.20742L8.88047 10.1261C9.07893 10.3246 9.07893 10.6464 8.88047 10.8448C8.68201 11.0433 8.36024 11.0433 8.16178 10.8448L6.24307 8.92611C6.0446 8.72765 6.0446 8.40588 6.24307 8.20742Z">
                                            </path>
                                            <path
                                                d="M3.37296 10.8776C3.57142 10.6791 3.89319 10.6791 4.09165 10.8776L6.01036 12.7963C6.20882 12.9948 6.20882 13.3165 6.01036 13.515C5.8119 13.7134 5.49013 13.7134 5.29167 13.515L3.37296 11.5963C3.1745 11.3978 3.1745 11.076 3.37296 10.8776Z">
                                            </path>
                                        </svg>
                                        <span class="text-[1.12rem] max-md:text-sm">Size guide</span>
                                    </div>

                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="w-full flex items-center justify-between text-sm">
                                    <div class="flex items-center justify-center gap-2">
                                        <p class="uppercase text-lg max-md:text-sm"><?= $key ?></p>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                            <div class="w-full flex max-md:flex-wrap items-center justify-start mt-2 text-sm" id="SizeDiv">
                                <?php
                                $diffcolor = [];
                                foreach ($value as $key1 => $value1) {
                                    // $diffcolor = $finalData['images'][$key1];
                                    $sizeChartValueString = [];
                                    if (!empty($sizeChart)) {
                                        $sizeChartValue = $sizeChart[$value1];

                                        foreach ($sizeChartValue as $kk => $sv) {
                                            $sizeChartValueString[] = "$kk $sv inches ";
                                        }

                                        $sizeChartValueString = implode(" | ", $sizeChartValueString);
                                    }
                                ?>
                                    <div onclick='<?= !isset($_POST["product_details"]) ? "changeSideVariant" : "changeDetailVariant" ?>(this,"<?= $key ?>","<?= $value1 ?>",<?= $key1 ?>,"<?= $sizeChartValueString ?>")'
                                        class="border <?= $key1 == 0 ? "border-gray-900 selected-size" : "border-gray-300" ?>  optionDivs cursor-pointer flex items-center justify-center h-10 w-20"
                                        option_value="<?= $value1 ?>" option_name="<?= $ogkey ?>" product_id="<?= $id ?>" onclick="">
                                        <?= $value1 ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                        <?php
                        } elseif ($key == 'color') {
                        ?>
                            <p class="uppercase mt-7 text-lg"><?= $key ?></p>
                            <div class="w-full flex items-center justify-start text-sm gap-2"
                                id="<?= !isset($_POST["product_details"]) ? "ColorDiv" : "ColorDetailsDiv" ?>">

                            </div>

                        <?php } else { ?>
                            <p class="uppercase mt-7"><?= $key ?></p>
                            <div class="w-full flex items-center justify-start mt-3 text-sm">
                                <?php
                                $diffcolor = [];
                                foreach ($value as $key1 => $value1) {
                                    // $diffcolor = $finalData['images'][$key1];
                                ?>
                                    <div onclick='<?= !isset($_POST["product_details"]) ? "changeSideVariant" : "changeDetailVariant" ?>(this,"<?= $key ?>","<?= $value1 ?>",<?= $key1 ?>)'
                                        class="border <?= $key1 == 0 ? "border-gray-900" : "border-gray-300" ?> cursor-pointer flex items-center justify-center h-10 w-20"
                                        option_value="<?= $value1 ?>" option_name="<?= $ogkey ?>" product_id="<?= $id ?>"><?= $value1 ?>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                    }
                    if (!isset($_POST["product_details"])) {
                        ?>
                        <div class="w-full">
                            <div class="w-full flex items-center justify-start mt-7 gap-3">
                                <div
                                    class="  flex items-center justify-center gap-7 border border-gray-800 rounded-lg py-1 quantityDiv">
                                    <span class="cursor-pointer border-r border-gray-800 px-4 py-2" onclick="minus(this)"><i
                                            class="fa-solid fa-minus text-sm"></i></span>
                                    <span class="text-black quantity">1</span>
                                    <span class="cursor-pointer border-l border-gray-800 px-4 py-2" onclick="plus(this)"><i
                                            class="fa-solid fa-plus text-sm"></i></span>

                                </div>


                                <div class="w-[80%] relative rounded-lg overflow-hidden group transform hover:shadow-xl border border-black bg-transparent text-black"
                                    onclick="AddToCartslider(this, true)">
                                    <span
                                        class="relative z-10 flex py-3 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white cursor-pointer">
                                        <i class="fas fa-cart-plus"></i> Add to Cart
                                    </span> <span
                                        class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-[1.2s] ease-in-out ease-out z-0">
                                    </span>
                                </div>
                            </div>


                            <?php
                            if (!empty($_SESSION["userid"])) {
                            ?>
                                <form method="POST" action="/checkout-cart" class="w-full">
                                    <input type="hidden" name="varient[]" class="sideVarientId"
                                        value="<?= $ProductData['varients'][0]["id"] ?>">
                                    <input type="hidden" name="category[]" class="sideCategoryId" value="<?= $ProductData['category'] ?>">
                                    <input type="hidden" name="product[]" class="sideProductId" value="<?= $ProductData['id'] ?>">
                                    <input type="hidden" name="price[]" value="<?= $ProductData['varients'][0]["price"] ?>">
                                    <input type="hidden" name="quantity[]" id="product_buy_count1" value="1">
                                    <input type="hidden" name="cartid[]" value="">
                                    <button name="myForm"
                                        class="w-full relative rounded-lg overflow-hidden group transform hover:shadow-xl bg-[#f25b21] text-black mt-4 hover:border hover:border-[#f25b21] transition-all duration-700"><span
                                            class="relative z-10 flex py-3 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 text-white group-hover:text-[#f25b21]">
                                            Buy It Now
                                        </span> <span
                                            class="absolute inset-0 bg-white -translate-x-full group-hover:translate-x-0 transition-transform duration-[1.2s] ease-in-out ease-out z-0">
                                        </span>

                                    </button>
                                </form>
                            <?php
                            } else {
                            ?>
                                <input type="hidden" name="varient[]" class="sideVarientId"
                                    value="<?= $ProductData['varients'][0]["id"] ?>">
                                <input type="hidden" name="category[]" class="sideCategoryId" value="<?= $ProductData['category'] ?>">
                                <input type="hidden" name="product[]" class="sideProductId" value="<?= $ProductData['id'] ?>">
                                <input type="hidden" name="price[]" value="<?= $ProductData['varients'][0]["price"] ?>">
                                <input type="hidden" name="quantity[]" id="product_buy_count1" value="1">
                                <input type="hidden" name="cartid[]" value="">
                                <button onclick="openLogin()"
                                    class="w-full relative rounded-lg overflow-hidden group transform hover:shadow-xl bg-[#f25b21] text-black mt-4 hover:border hover:border-[#f25b21] transition-all duration-700"><span
                                        class="relative z-10 flex py-3 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 text-white group-hover:text-[#f25b21]">
                                        Buy It Now
                                    </span> <span
                                        class="absolute inset-0 bg-white -translate-x-full group-hover:translate-x-0 transition-transform duration-[1.2s] ease-in-out ease-out z-0">
                                    </span>

                                </button>
                            <?php
                            }
                            ?>

                        </div>


                    <?php
                    }

                    ?>



                </div>
            </div>

        <?php

        } else {
            echo "<p>No variants found</p>";
        }

        // Get the buffered content
        $html = ob_get_clean();

        // echo $html;
        echo json_encode([
            'html' => $html,
            'variants' => $varients,
            "grouped" => $grouped,
        ]);
    }
    public function NewArrivals()
    {
        $pageTitle = "New Arrivals";
        // echo $category;
        $products = getData2("SELECT tbl_products.* FROM `tbl_products` LEFT JOIN tbl_category ON tbl_products.category = tbl_category.id");
        // printWithPre($products); 
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            require 'views/website/shop.php';
        }
    }
    public function FreeDelivery()
    {

        $freeshipping = getData2("SELECT * FROM `tbl_free_shipping` WHERE `id` = 1 AND `free_shipping` = 1 ORDER BY `id` DESC LIMIT 1")[0];
        if ($freeshipping == null) {
            $freeshipping = [];
        }
        echo json_encode($freeshipping);
    }
    public function getVariantData()
    {
        $id = $_POST['productid'];
        $variants = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = $id");
        $vv = groupOptions($variants);
        // printWithPre($vv);
        $co = [];
        foreach ($vv["Color"] as $color) {
            // if(array_key_exists($color, $co)){

            // }else{
            $ar = [];
            foreach ($variants as $var) {
                $varOp = parse_variant_options($var["options"])["Color"];
                if ($varOp == $color) {
                    $ar[] = json_decode($var["images"]);
                }
            }
            $co[$color] = $ar;
            // }
        }

        ob_start();
        $i = 0;
        foreach ($co as $color => $images) {
            // printWithPre($images);

        ?>
            <div onclick='<?= !isset($_POST["product_details"]) ? "changeSideVariant" : "changeDetailVariant" ?>(this,"color","<?= $color ?>",<?= $i ?>)'
                class=" h-[95px] flex items-center justify-start mt-1 text-sm gap-2 p-1 cursor-pointer border <?= $i == 0 ? " border-gray-900 selected-color" : "" ?>"
                option_name="color" option_value="" product_id="<?= $id ?>">

                <img src="/<?= $images[0][0] ?>" class="h-full" alt="" class="optionDivs">


            </div>

        <?php
            $i++;
        }

        $html = ob_get_clean();



        // echo $html;
        echo json_encode([
            'html' => $html
        ]);
        // printWithPre($co);

    }

    public function getVariantData1()
    {
        $id = $_POST['productid'];
        $option_name = $_POST['option_name'];   // e.g. "Size"
        $option_value = $_POST['option_value']; // e.g. "8-9 Years"

        $variants = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = $id");

        $optionsArray = [];
        $matchedVariants = []; // store multiple

        foreach ($variants as $variant) {
            $opts = json_decode($variant['options'], true);

            // fix: handle double-encoded JSON
            if (is_string($opts)) {
                $opts = json_decode($opts, true);
            }

            if (is_array($opts)) {
                // build available options
                foreach ($opts as $key => $val) {
                    $optionsArray[$key][] = $val;
                }

                // check for match
                if (isset($opts[$option_name]) && $opts[$option_name] == $option_value) {
                    $matchedVariants[] = $variant; // push instead of overwrite
                }
            }
        }

        // remove duplicates in options
        foreach ($optionsArray as $key => $values) {
            $optionsArray[$key] = array_values(array_unique($values));
        }

        // printWithPre([
        //     'all_options'      => $optionsArray,
        //     'matched_variants' => $matchedVariants
        // ]);
        ob_start();

        if (!empty($matchedVariants)) {
        ?>
            <?php
            foreach ($matchedVariants as $key => $value) {
                $images = array_reverse(json_decode($value['images']));

            ?>
                <div onclick='changeSideVariant(this,"color","<?= parse_variant_options(($value["options"]))["Color"] ?>",<?= $key ?>)'
                    class=" h-[95px] flex items-center justify-start mt-3 text-sm gap-2 p-1 cursor-pointer border <?= $key == 0 ? " border-gray-900 selected-color" : "" ?>"
                    option_name="color" option_value="" product_id="<?= $id ?>">

                    <img src="/<?= $images[0] ?>" class="h-full" alt="" class="optionDivs">


                </div>


                <?php

            }
        }

        $html = ob_get_clean();



        // echo $html;
        echo json_encode([
            'html' => $html,
            '$matchedVariants' => $matchedVariants,
            '$optionsArray' => $optionsArray
        ]);
    }

    public function addToCart()
    {
        // printWithPre($_POST);
        // printWithPre($_SESSION);

        if (isset($_SESSION["userid"]) && !empty($_SESSION["userid"])) {

            $id = $_SESSION["userid"];
            $variant_id = $_POST["varient_id"];
            $quantity = $_POST["quantity"];
            $data = getData2("SELECT * FROM `tbl_cart` WHERE `varient` = '$variant_id' AND `userid` = '$id' ORDER BY `id` DESC LIMIT 1")[0];
            // $count = count($data);
            // echo $count;
            if ($data) {

                update([
                    "quantity" => $data["quantity"] + $quantity
                ], $data["id"], "tbl_cart");
            } else {
                $cartdata = [
                    "varient" => $_POST["varient_id"],
                    "category" => $_POST["category_id"],
                    "product" => $_POST["product_id"],
                    "quantity" => $_POST["quantity"],
                    "userid" => $id,
                    "username" => $_SESSION['username'],
                ];
                add($cartdata, "tbl_cart");
            }
            $count = count(getData2("SELECT * FROM `tbl_cart` WHERE `userid` = '$id'"));
            echo json_encode([
                'success' => true,
                'message' => 'Product added to cart',
                'cart_count' => $count,
            ]);
        } else {
            $data = checkExisteingCartSession($_POST["varient_id"]);
            if ($data) {
                $_SESSION["cart"][$data[0]]["quantity"] = $_SESSION["cart"][$data[0]]["quantity"] + $_POST["quantity"];
            } else {
                $_SESSION["cart"][] = [
                    "varient" => $_POST["varient_id"],
                    "category" => $_POST["category_id"],
                    "product" => $_POST["product_id"],
                    "quantity" => $_POST["quantity"],

                ];
            }


            echo json_encode([
                'success' => true,
                'message' => 'Product added to cart',
                'cart_count' => count($_SESSION['cart']),
            ]);
        }
    }

    public function getCartData()
    {

        if (isset($_SESSION["userid"]) && !empty($_SESSION["userid"])) {
            // $cartData = $cartController->getAllCartsByUserId($_SESSION["userid"]);
            // printWithPre($cartData);
            ob_start();

            $id = $_SESSION["userid"];
            $cartproducts = getData2("SELECT * FROM `tbl_cart` WHERE `userid` = " . $_SESSION['userid']);
            // printWithPre($cartproducts);
            if (!empty($cartproducts)) {

                foreach ($cartproducts as $key1 => $c) {
                    $id = $c["product"];
                    $variant_id = $c['varient'];
                    $quantity = $c['quantity'];
                    $vdata = getData2("SELECT tbl_variants.* , tbl_products.name as product_name, tbl_products.id as product_id, tbl_products.category as category FROM `tbl_variants` LEFT JOIN tbl_products ON tbl_variants.product_id = tbl_products.id WHERE tbl_variants.id = '$variant_id'")[0];
                    // echo $vdata['image'];
                    $images = array_reverse(json_decode($vdata['images'], true));
                    $variants = json_decode($vdata['options'], true);
                    $variants = json_decode($variants, true);
                    $totalprice = $vdata['price'] * $quantity;
                ?>

                    <div class="flex items-center gap-4 max-md:gap-2 border-b py-2 w-full">
                        <!-- Product image -->
                        <img src="/<?= $images[0] ?>" alt="Product" class="w-16 h-20 max-md:w-20 max-md:h-24 object-cover">

                        <!-- Product details -->
                        <div class="flex-1">
                            <h3 class="font-semibold text-base"><?= $vdata['product_name'] ?></h3>
                            <div class="flex gap-3 flex-wrap items-center justify-start">
                                <?php
                                foreach ($variants as $key => $variant) {
                                ?>
                                    <p class="!mb-0 text-xs text-gray-600 uppercase"><?= $key ?>: <?= $variant ?></p>
                                <?php } ?>
                            </div>
                            <span class="font-bold text-[#f25b21] total">₹<span><?= $totalprice ?></span></span>

                            <!-- Quantity controls -->
                            <div class="flex items-center md:mt-2 border w-fit">
                                <input type="hidden" name="cartid[]" class="cartid" value="<?= $c['id'] ?>">
                                <input type="hidden" name="varient[]" class="varient" value="<?= $variant_id ?>">
                                <input type="hidden" name="category[]" class="category" value="<?= $vdata['category'] ?>">
                                <input type="hidden" name="product[]" class="product" value="<?= $id ?>">
                                <input type="hidden" class="selling_price" name="price[]" value="<?= $vdata['price'] ?>">

                                <input type="hidden" class="quantityo" name="quantity[]" value="<?= $quantity ?>">
                                <button type="button" class="px-3  rounded-l hover:bg-gray-100 py-1"
                                    onclick="minusQuantity(this,'<?= $vdata['id'] ?>','<?= $vdata['product_id'] ?>','<?= $vdata['category'] ?>')">-</button>
                                <span class="px-4   quantity py-1"><?= $quantity ?></span>
                                <button type="button" class="px-3  rounded-r hover:bg-gray-100 py-1"
                                    onclick="plusQuantity(this,'<?= $vdata['id'] ?>','<?= $vdata['product_id'] ?>','<?= $vdata['category'] ?>')">+</button>
                            </div>
                        </div>

                        <!-- Delete button -->
                        <button type="button" class="text-gray-500 hover:text-red-600" onclick="deleteCart(this, <?= $c['id'] ?>)">
                            <i class="fas fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>

                <?php
                }
            } else {
                ?>
                <div class="flex flex-col items-center justify-center w-full h-[60vh] max-md:h-[30vh]">
                    <i class="fa-solid fa-bag-shopping text-8xl text-gray-200" aria-hidden="true"></i>

                    <p class="w-full text-center text-slate-500 font-semibold text-lg h-16 flex flex-col items-center justify-center">
                        No Products in the cart.
                    </p>
                </div>
            <?php
            }
            ?>


            <?php
            $cartHtml = ob_get_clean(); // Capture the buffer and clean it

            echo json_encode([
                'cart_div' => $cartHtml,
                'success' => true,
            ]);



            // echo $sql;

        } else {
            ob_start();
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {


                foreach ($_SESSION["cart"] as $key1 => $c) {
                    $id = $c["product"];
                    $variant_id = $c['varient'];
                    $quantity = $c['quantity'];
                    $vdata = getData2("SELECT tbl_variants.* , tbl_products.name as product_name, tbl_products.id as product_id, tbl_products.category as category FROM `tbl_variants` LEFT JOIN tbl_products ON tbl_variants.product_id = tbl_products.id WHERE tbl_variants.id = '$variant_id'")[0];
                    // echo $vdata['image'];
                    $images = array_reverse(json_decode($vdata['images'], true));
                    $variants = json_decode($vdata['options'], true);
                    $variants = json_decode($variants, true);
                    $totalprice = $vdata['price'] * $quantity;
            ?>

                    <div class="flex items-center gap-4 max-md:gap-2 border-b py-2 w-full">
                        <!-- Product image -->
                        <img src="/<?= $images[0] ?>" alt="Product" class="w-16 h-20 max-md:w-20 max-md:h-24 object-cover">

                        <!-- Product details -->
                        <div class="flex-1">
                            <h3 class="font-semibold text-base"><?= $vdata['product_name'] ?></h3>
                            <div class="flex gap-3 flex-wrap items-center justify-start">
                                <?php
                                foreach ($variants as $key => $variant) {
                                ?>
                                    <p class="!mb-0 text-xs text-gray-600 uppercase"><?= $key ?>: <?= $variant ?></p>
                                <?php } ?>
                            </div>
                            <span class="font-bold text-[#f25b21] total">₹<span><?= $totalprice ?></span></span>

                            <!-- Quantity controls -->
                            <div class="flex items-center md:mt-2 border w-fit">
                                <button type="button" class="px-3  rounded-l hover:bg-gray-100 py-1"
                                    onclick="minusQuantity(this,'<?= $vdata['id'] ?>','<?= $vdata['product_id'] ?>','<?= $vdata['category'] ?>')">-</button>
                                <span class="px-4   quantity py-1"><?= $quantity ?></span>
                                <button type="button" class="px-3  rounded-r hover:bg-gray-100 py-1"
                                    onclick="plusQuantity(this,'<?= $vdata['id'] ?>','<?= $vdata['product_id'] ?>','<?= $vdata['category'] ?>')">+</button>
                            </div>
                        </div>

                        <!-- Delete button -->
                        <button type="button" class="text-gray-500 hover:text-red-600" onclick="deleteCart(this, <?= $key1 ?>)">
                            <i class="fas fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>

                <?php


                }
            } else {

                ?>
                <div class="flex flex-col items-center justify-center w-full h-[50vh] border max-md:h-[25vh]">
                    <i class="fa-solid fa-bag-shopping text-8xl max-md:text-6xl text-gray-200" aria-hidden="true"></i>

                    <p class="w-full text-center text-slate-500 font-semibold text-lg h-16 flex flex-col items-center justify-center">
                        No Products in the cart.
                    </p>
                </div>
            <?php
            }
            ?>


            <?php
            $cartHtml = ob_get_clean(); // Capture the buffer and clean it

            echo json_encode([
                'cart_div' => $cartHtml,
                'success' => true,
            ]);

            // }else{
            //     echo json_encode([
            //         "success"=>false,
            //         "message"=>"Server Error2",
            //     ]);
            // }

        }
    }

    public function OrderDetails($id = null)
    {
        if ($id == null) {

            header("Location: /profile");
            exit();
        } else {

            $products = getData2("SELECT tbl_purchase_item.*, tbl_products.name as product_name,
            tbl_variants.images as variant_images, tbl_variants.options as variant_options, tbl_variants.price as variant_price FROM `tbl_purchase_item` LEFT JOIN tbl_products ON tbl_purchase_item.product = tbl_products.id LEFT JOIN tbl_variants ON tbl_purchase_item.varient = tbl_variants.id WHERE tbl_purchase_item.purchase_id = $id ORDER BY tbl_purchase_item.id DESC");
            // printWithPre($products);
            require 'views/website/order-details.php';
        }
    }
    public function OrderConfirmMail()
    {
        require 'views/website/order-confermation-mail.php';
    }
    public function userAddress()
    {
        $userid = $_SESSION['userid'];
        // printWithPre($_POST);
        if ($_POST['process'] == 'add') {
            unset($_POST['process']);
            $address = add($_POST, "tbl_user_address");
            if ($address) {
                $_SESSION['success'] = "Address Added Successfully";
                echo json_encode([
                    "success" => true,
                    "address" => $address
                ]);
            } else {

                echo json_encode([
                    "success" => false,
                    "message" => "Server Error"
                ]);
            }
            exit();
        } else {
            $id = $_POST['process'];
            unset($_POST['process']);
            // printWithPre($_POST);
            if ($_POST['status'] == 1) {
                updateSQL(['status' => 0], "tbl_user_address", "status = '1' AND userid = $userid");
            }
            $address = update($_POST, $id, "tbl_user_address");
            if ($address) {
                $_SESSION['success'] = "Address Update Successfully";
                echo json_encode([
                    "success" => true,
                    "address" => $address
                ]);
            } else {

                echo json_encode([
                    "success" => false,
                    "message" => "Server Error"
                ]);
            }
            exit();
        }
    }

    public function thankYou()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Thank You";
        $pageTitle = "Thank You";
        $OrderData = getData2("SELECT * FROM `tbl_purchase` WHERE `orderid` = " . $_SESSION['order_id'] . " ORDER BY `id` DESC LIMIT 1")[0];
        $PurchaseItems = getData2("SELECT * FROM `tbl_purchase_item` WHERE `purchase_id` = " . $OrderData['id']);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/thankyou.php';
        }
    }

    public function deleteCart()
    {

        if (!empty($_POST)) {
            // printWithPre($_POST);
            // die();
            if (isset($_POST["deleteMe"])) {
                if (isset($_SESSION["type"]) && !empty($_SESSION["userid"])) {

                    $delete = delete($_POST["cartid"], "tbl_cart", "id");
                    $count = count(getData2("SELECT * FROM `tbl_cart` WHERE `userid` = " . $_SESSION['userid']));
                    echo json_encode([
                        "success" => true,
                        "message" => "Item Cart Deleted",
                        "totalcart" => $count
                    ]);
                } else {
                    unset($_SESSION["cart"][$_POST["cartid"]]);
                    $totalcart = count($_SESSION["cart"]);
                    if (empty($_SESSION["cart"])) {
                        unset($_SESSION["cart"]);
                    }
                    // $totalcart = count($_SESSION["cart"]);
                    echo json_encode([
                        "success" => true,
                        "message" => "Item Cart Updated",
                        "totalcart" => $totalcart
                    ]);
                }
            }
            exit();
        }
    }

    public function checkoutCart()
    {
        // printWithPre($_POST);
        if (isset($_POST["myForm"])) {
            if (!isset(($_POST["cartid"]))) {
                $_SESSION["err"] = "Please Select Atleast One Item";
                header("Location: /");
            } else {
                // printWithPre($_POST);
                $_SESSION["cartData"] = $_POST;
                // $_SESSION["weight"] = $_POST["totalweight"];
                // $_SESSION["totalprice"] = $_POST["totalprice"];
                // $_SESSION['sampleproductid'] = $_POST['sampleproductid'];
                // $_SESSION['sampleproductquantity'] = $_POST['sampleproductquantity'];
                header("Location: /checkout");
            }
        }

        exit();
    }

    public function current_url(): string
    {
        // Detect protocol
        $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
        $scheme = $https ? 'https' : 'http';

        // Detect host (respect proxy header if present)
        $host = $_SERVER['HTTP_X_FORWARDED_HOST'] ?? $_SERVER['HTTP_HOST'];

        // Non‑standard port (e.g. :8080)
        $port = $_SERVER['SERVER_PORT'];
        $showPort = ($https && $port != 443) || (!$https && $port != 80);
        $portPart = $showPort ? ':' . $port : '';

        // Path + query string
        $requestUri = $_SERVER['REQUEST_URI']; // already contains the query part

        return $scheme . '://' . $host . $portPart . $requestUri;
    }

    public function index()
    {

        $siteName = getDBObject()->getSiteName();
        $pageModule = "Home Page";
        $pageTitle = "Home Page";

        $products = getData("tbl_products");
        $collection = getData("tbl_collection", true);
        // printWithPre($collection);
        $collection = array_reverse($collection)[0];
        $collection_products = json_decode($collection['products'], true) ?? [];
        // printWithPre($collection);


        // echo $_SERVER['REQUEST_METHOD'];
        // printWithPre($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/index.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['popup'])) {
                $_SESSION['popup'] = $_POST['popup'];
                echo "nice";
            }
            // printWithPre($_SESSION);
            if (!isset($_SESSION['userid']) && $_SESSION['type'] != "User") {
                if (!isset($_SESSION['popup'])) {
                    $_SESSION['popup'] = 'false';
                }
            }
            require 'views/website/index.php';
        }
    }

    public function removeProductFromCollection()
    {
        $collection = getData2("SELECT * FROM `tbl_collection` WHERE `id` = $_POST[id] ORDER BY `id` DESC LIMIT 1")[0];
        $collection_products = json_decode($collection['products'], true) ?? [];
        if (in_array($_POST['product_id'], $collection_products)) {
            $collection_products = array_filter($collection_products, function ($product) {
                return $product != $_POST['product_id'];
            });
            $collection_products = json_encode($collection_products);
            $data = [
                'products' => $collection_products
            ];
            $update = update($data, $_POST['id'], 'tbl_collection');
            if ($update) {
                $response = [
                    "success" => true,
                    "data" => 'Product Removed Successfully'
                ];
                echo json_encode($response);
            } else {
                $response = [
                    "success" => false,
                    "data" => 'Product Remove Failed'
                ];
                echo json_encode($response);
            }
        } else {
            $response = [
                "success" => false,
                "data" => 'Product Not Found'
            ];
            echo json_encode($response);
        }
    }

    public function Category($category_name)
    {

        // $category = str_replace('-', ' ', $category_name);
        // echo $category;
        // $products = getData2("SELECT tbl_products.* FROM `tbl_products` LEFT JOIN tbl_category ON tbl_products.category = tbl_category.id WHERE tbl_category.category = '$category'");
        // printWithPre($products); 
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            require 'views/website/shop.php';
        }
    }

    public function getFilteredProducts($category_name)
    {
        $response = [
            "success" => false,
            "message" => "No Product Found"
        ];

        $input = json_decode(file_get_contents("php://input"), true);
        $filters = $input['filters'] ?? [];
        $minPrice = $input['min_price'] ?? null;
        $maxPrice = $input['max_price'] ?? null;
        $userid = $_SESSION['userid'] ?? null;

        // ✅ Variant-based price filter
        $price_query = "";
        if (!empty($minPrice) && !empty($maxPrice)) {
            $price_query = "
            AND tbl_products.id IN (
                SELECT product_id 
                FROM tbl_variants 
                WHERE CAST(price AS DECIMAL(10,2)) BETWEEN $minPrice AND $maxPrice
            )
        ";
        }

        // ✅ Base product query
        if ($category_name == "new_arrivals") {
            $products = getData2("
            SELECT tbl_products.* 
            FROM tbl_products 
            LEFT JOIN tbl_category ON tbl_products.category = tbl_category.id 
            WHERE tbl_products.new_arrival = 1 
            AND tbl_products.status = 1
            $price_query
        ");
        } else {
            $products = getData2("
            SELECT tbl_products.* 
            FROM tbl_products 
            LEFT JOIN tbl_category ON tbl_products.category = tbl_category.id 
            WHERE tbl_category.category = '$category_name' 
            AND tbl_products.status = 1
            $price_query
        ");
        }

        // ✅ Filter variants, wishlist, and apply dynamic filters
        foreach ($products as $key => $product) {
            $variants = getData2("SELECT * FROM tbl_variants WHERE product_id = '$product[id]'");

            // If min/max price is set, only keep variants within range
            if (!empty($minPrice) && !empty($maxPrice)) {
                $variants = array_filter($variants, function ($v) use ($minPrice, $maxPrice) {
                    $price = (float) $v['price'];
                    return ($price >= $minPrice && $price <= $maxPrice);
                });

                // If no variant remains in range, skip the product
                if (empty($variants)) {
                    unset($products[$key]);
                    continue;
                }
            }

            // ✅ Apply dynamic filters
            $matchAll = true;
            foreach ($filters as $filterKey => $filterValues) {
                $filterKey = strtoupper($filterKey);
                $normalizedFilterValues = array_map('strtoupper', $filterValues);
                $matchKey = false;

                foreach ($variants as $variant) {
                    $opts = $variant['options'];
                    while (is_string($opts)) {
                        $opts = json_decode($opts, true);
                    }
                    if (!is_array($opts))
                        $opts = [];
                    $opts = array_change_key_case($opts, CASE_UPPER);
                    $variantValue = !empty($opts[$filterKey]) ? strtoupper($opts[$filterKey]) : null;

                    if ($variantValue && in_array($variantValue, $normalizedFilterValues)) {
                        $matchKey = true;
                        break;
                    }
                }

                if (!$matchKey) {
                    $matchAll = false;
                    break;
                }
            }

            if (!$matchAll) {
                unset($products[$key]);
                continue;
            }

            // ✅ Wishlist logic
            $wishlist = false;
            if ($userid) {
                $wishData = getData2("SELECT id FROM tbl_wishlist WHERE product = '$product[id]' AND userid = '$userid' LIMIT 1");
                if (!empty($wishData))
                    $wishlist = true;
            } else {
                $wishlistCheck = checkExisteingWishlistSession($product['id']);
                if ($wishlistCheck !== false)
                    $wishlist = true;
            }

            $products[$key]['wishlist'] = $wishlist;
            $products[$key]['variants'] = array_values($variants); // reindex
        }

        $products = array_values($products);

        if (count($products) > 0) {
            $response = [
                "success" => true,
                "message" => "Products Found",
                "data" => $products
            ];
        }

        echo json_encode($response);
    }


    public function productDetails($product_name = null)
    {


        // printWithPre($ProductData);  
        //  echo "hello";
        // die();
        // $this->checkSession();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            //  echo $product_name;
            if ($product_name == null) {
                http_response_code(404);
                require __DIR__ . '/../views/website/404.php';
                exit();
            } else {
                $name = str_replace('-', ' ', $product_name);
                $siteName = getDBObject()->getSiteName();
                $pageModule = "Product Page";
                $pageTitle = "Product Page";
                $ProductData = getData2("
                                    SELECT 
                                        tbl_products.*, 
                                        tbl_category.category AS category_name 
                                    FROM tbl_products 
                                    LEFT JOIN tbl_category 
                                        ON tbl_products.category = tbl_category.id 
                                    WHERE 
                                        REPLACE(REPLACE(tbl_products.name, \"'\", ''), '-', ' ') = REPLACE(REPLACE('$name', \"'\", ''), '-', ' ')
                                ")[0];
                if (empty($ProductData)) {
                    http_response_code(404);
                    require __DIR__ . '/../views/website/404.php';
                    exit();
                }
                $id = $ProductData['id'];
                $varients = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = $id");
                $similarProducts = getData2("SELECT * FROM `tbl_products` WHERE `category` = $ProductData[category] LIMIT 6");
                $ProductData['varients'] = $varients;
                $comparePrice = floatval($ProductData['compare_price']);
                $price = floatval($ProductData['varients'][0]["price"]);
                $discountAmount = $comparePrice - $price;
                $discountPercentage = $comparePrice > 0 ? round(($discountAmount / $comparePrice) * 100) : 0;

                if (!empty($ProductData['varients'])) {
                    $images = [];
                    $options = [];
                    foreach ($ProductData['varients'] as $key => $variant) {
                        $images[] = json_decode($variant['images'], true);
                        $options[] = json_decode($variant['options'], true);
                    }
                    // printWithPre($images);
                    // printWithPre($options);
                    $opt = [];
                    $img = [];
                    foreach ($options as $key => $option) {
                        $opt[] = json_decode($option, true);
                    }
                    // printWithPre($opt);
                    $grouped = groupAttributes($opt);
                    // printWithPre($grouped);

                    // Take only the last image from each images set
                    $lastImages = array_map(function ($imgSet) {
                        return end($imgSet);
                    }, $images);
                }
                $ppimages = $images;

                require 'views/website/product-details.php';
            }
        }
    }

    public function login()
    {

        $siteName = getDBObject()->getSiteName();
        $pageModule = "Login Page";
        $pageTitle = "Login Page";
        //  echo "hello";
        // die();
        // $this->checkSession();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'views/website/login.php';
        }
    }
    public function removeDisplayPopup($id)
    {
        try {
            if (empty($id)) {


                $sql = "UPDATE tbl_popup SET `display` = 0 WHERE `display` = '1'";

                $stmt = $this->db->prepare($sql);
            } else {

                $sql = "UPDATE tbl_popup SET `display` = 0 WHERE `id` = :id";

                $stmt = $this->db->prepare($sql);


                $stmt->bindValue(':id', $id);
            }

            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            // error_log($e->getMessage()); // Uncomment if you wish to log errors
            return false;
        }
    }
    public function addDisplayPopup(int $id)
    {
        try {

            $sql = "UPDATE tbl_popup SET `display` = 1 WHERE `id` = :id";

            $stmt = $this->db->prepare($sql);


            $stmt->bindValue(':id', $id);

            $stmt->execute();

            return true;
        } catch (\PDOException $e) {
            // error_log($e->getMessage()); // Uncomment if you wish to log errors
            return false;
        }
    }
    public function popupDisplay()
    {


        if (isset($_POST["id"])) {

            $id = $_POST["id"];
            $idremove = '';
            $data = $this->removeDisplayPopup($idremove);
            if ($data) {
                $displya = $this->addDisplayPopup($id);
                if ($displya) {
                    $response = [
                        "success" => true,
                        "data" => 'Popup Update Successfully'
                    ];
                    echo json_encode($response);
                }
            }
        }
        if (isset($_POST["removeid"])) {

            $id = $_POST["id"];
            $data = $this->removeDisplayPopup($id);

            if ($data) {
                $response = [
                    "success" => true,
                    "data" => 'Hide the Popup'
                ];
                echo json_encode($response);
            }
        }
    }
    public function shop()
    {

        $siteName = getDBObject()->getSiteName();
        $pageModule = "Shop Page";
        $pageTitle = "Shop Page";
        //  echo "hello";
        // die();
        // $this->checkSession();

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require 'views/website/shop.php';
        }
    }
    public function AboutUs()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "About Us";
        $pageTitle = "About Us";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/about.php';
        }
    }




    public function ContactUs()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Contact Us";
        $pageTitle = "Contact Us";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/contact.php';
        }
    }


    public function ContactUs2()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Contact Us2";
        $pageTitle = "Contact Us2";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/contact2.php';
        }
    }


    public function OurOffices()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Our Offices";
        $pageTitle = "Our Offices";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $district = getData2("SELECT * FROM `tbl_district` ORDER BY `id` ASC");
            $centers = getData2('SELECT tbl_centers.*, tbl_district.district_name_en FROM `tbl_centers` LEFT JOIN tbl_district ON tbl_centers.district = tbl_district.id ORDER BY tbl_centers.id DESC');
            // printWithPre($centers);
            require 'views/website/centers.php';
        }
    }
    public function OurOfficesName($name = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Our Offices";
        $pageTitle = "Our Offices";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($name != null) {
                $district = getData2("SELECT * FROM `tbl_district` WHERE `district_name_en` = '$name' ORDER BY `id` ASC LIMIT 1")[0];
                // printWithPre($district);
                $centers = getData2("SELECT * FROM `tbl_centers` WHERE `district` = $district[id] ORDER BY `id` ASC");
            } else {
                $centers = getData2("SELECT * FROM `tbl_centers`  ORDER BY `id` ASC");
            }
            // printWithPre($centers);
            require 'views/website/centers-info.php';
        }
    }

    public function CorrespondenceCourse()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Correspondence Course";
        $pageTitle = "Correspondence Course";
        $course = getData2("SELECT * FROM `all_courses` WHERE `course` = 'correspondence' ORDER BY `id` DESC LIMIT 1")[0];
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/correspondence-course.php';
        }
    }

    public function Blogs()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Blogs";
        $pageTitle = "Blogs";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $blogs = getData("blogs");
            require 'views/website/blogs.php';
        }
    }
    public function wishlist()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Wishlist";
        $pageTitle = "Wishlist";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            require 'views/website/wishlist.php';
        }
    }
    public function getCentersByDistrict()
    {

        $district = $_POST['district'];
        $centers = getData2("SELECT * FROM `tbl_district` WHERE `district_name_en` LIKE '%$district%' ORDER BY `id` ASC");
        // printWithPre($centers);

        echo json_encode($centers);
        // require 'api/getCentersByDistrict.php';

        // printWithPre($centers);
    }
    // public function privacyPolicy()
    // {
    //     $siteName = getDBObject()->getSiteName();
    //     $pageModule = "Privacy Policy";
    //     $pageTitle = "Privacy Policy";

    //     // $this->checkSession();
    //     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //         require 'views/website/privacy-policy.php';
    //     }
    // }
    public function termsAndConditions()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Terms And Conditions";
        $pageTitle = "Terms And Conditions";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/terms-and-conditions.php';
        }
    }
    public function cookies()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Cookies";
        $pageTitle = "Cookies";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/cookies.php';
        }
    }

    public function sizeGuide()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Size Guide";
        $pageTitle = "Size Guide";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/size-guide.php';
        }
    }

    public function shippingInfo()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Shipping Info";
        $pageTitle = "Shipping Info";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/shipping-info.php';
        }
    }



    public function checkout()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Shipping Info";
        $pageTitle = "Shipping Info";
        $cartData = $_SESSION["cartData"];
        if (empty($cartData)) {
            redirect("/");
        }
        $userData = getData2("SELECT * FROM `online_users` WHERE `id` = $_SESSION[userid]")[0];
        $address = getData2("SELECT * FROM `tbl_user_address` WHERE `userid` = $_SESSION[userid] ORDER BY `status` DESC ");

        $PaymentGateWay = getData2("SELECT * FROM `payment_gateway` WHERE `status` = 1 ORDER BY `id` ASC")[0];

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // printWithPre($_SESSION);
            require 'views/website/checkout.php';
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // printWithPre($_POST);
            // printWithPre($_SESSION);
            // die();
            $id = $_SESSION["userid"];
            $mode = $_POST["payment_mode"];
            $order_id = generateRandomString(16) . time();
            $pp = 1;
            $fields = [
                'fname' => 'fname',
                'lname' => 'lname',
                'username' => 'email',
                'mobile' => 'mobile'
            ];

            $userd = [];

            foreach ($fields as $sessionKey => $postKey) {
                if (isset($_SESSION[$sessionKey]) && $_SESSION[$sessionKey] === '' && !empty($_POST[$postKey])) {
                    $userd[$sessionKey] = $_POST[$postKey];
                    $_SESSION[$sessionKey] = $_POST[$postKey];
                }
            }

            if (!empty($userd)) {
                update($userd, $_SESSION["userid"], "online_users");
            }

            foreach ($address as $key => $value) {

                if ($_POST['address_line1'] == $value['address_line1'] && $_POST['address_line2'] == $value['address_line2']) {
                    $pp = 0;
                    break;
                }
            }
            if ($pp) {
                $addressId = [
                    "address_line1" => $_POST["address_line1"],
                    "address_line2" => $_POST["address_line2"],
                    "city" => $_POST["city"],
                    "state" => $_POST["state"],
                    "pincode" => $_POST["pin_code"],
                    "address_type" => $_POST["delivery"],
                    "mobile" => $_POST["mobile"],
                    "email" => $_POST["email"],
                    "userid" => $_SESSION["userid"],
                ];
                add($addressId, "tbl_user_address");
            }

            if ($mode == "COD") {
                // printWithPre($_POST);
                // die();
                $db = getDBCon(); // PDO instance
                // $db->beginTransaction();
                $purchaseid = [
                    "userid" => $_SESSION["userid"],
                    "username" => $_SESSION["username"],
                    "payment_mode" => $mode,
                    "payment_status" => "Pending",
                    "orderid" => $order_id,
                    "status" => "Processing",
                    "total_amount" => $_POST["allTotal"],
                    "address_line1" => $_POST["address_line1"],
                    "address_line2" => $_POST["address_line2"],
                    "city" => $_POST["city"],
                    "state" => $_POST["state"],
                    "country" => "India",
                    "pincode" => $_POST["pin_code"],
                    "mobile" => $_POST["mobile"],
                    "email" => $_POST["email"],
                    "fname" => $_POST["fname"],
                    "lname" => $_POST["lname"],
                    "created_by" => $_SESSION["userid"],
                    // "coupon_discount" => $_POST["coupenDiscount"],
                    // "coupon_secret" => $_POST["newDiscount"],
                    // "delivery_charges" => $_POST["deliveryCharges"],
                    // "courier_company" => $_POST["deliveryCompany"],
                    // "courier_company_id" => $_POST["shippingCheckbox"],
                    // "expected_date" => $_POST["deliveryDate"],

                ];

                $purchaseid = add($purchaseid, "tbl_purchase");

                // printWithPre($purchaseid);
                // die();
                if ($purchaseid) {
                    // echo "Success";
                    foreach ($_SESSION["cartData"]["varient"] as $key => $varient) {

                        $quantity = getData2("SELECT * FROM tbl_variants where id='$varient'")[0]["quantity"];
                        if ($quantity >= $_SESSION["cartData"]["quantity"][$key]) {
                            update(["quantity" => $quantity - $_SESSION["cartData"]["quantity"][$key]], $varient, "tbl_variants");
                            $insertData = [
                                "purchase_id" => $purchaseid,
                                "varient" => $varient,
                                "product" => $_SESSION["cartData"]["product"][$key],
                                "category" => $_SESSION["cartData"]["category"][$key],
                                "quantity" => $_SESSION["cartData"]["quantity"][$key],
                                "amount" => $_SESSION["cartData"]["price"][$key],
                                "total_amount" => $_SESSION["cartData"]["quantity"][$key] * $_SESSION["cartData"]["price"][$key],
                                "userid" => $_SESSION["userid"],
                                "username" => $_SESSION["username"],
                                "status" => "Processing",
                                "created_date" => date("Y-m-d"),
                                "created_time" => date("H:i:s"),
                                "created_at" => date("Y-m-d H:i"),
                                "created_by" => $_SESSION["userid"],
                            ];
                            add($insertData, "tbl_purchase_item");
                        } else {
                            $db->rollBack();
                            $_SESSION["err"] = "Product Out Of Stock";
                            header("Location: /checkout");
                            exit();
                        }
                    }



                    // echo $purchaseid[1];
                    delete($id, "tbl_cart", "userid");
                    // printWithPre($purchaseid);
                    // die();
                    $_SESSION["new_order"] = $purchaseid;
                    $_SESSION['order_id'] = $order_id;
                    $token = $this->validshiprockettoken();
                    echo $token;

                    // $placeordershiprocket = $this->placeordershiprocket($token, $purchaseid,$order_id);
                    // $placeordershiprocket = (array)$placeordershiprocket;

                    // printWithPre($placeordershiprocket);
                    // die();

                    // $this->OrderConfirmMail();
                    sendOrderMail($purchaseid);
                    $_SESSION["success"] = "Order Placed Successfully";
                    $db->commit();
                    unset($_SESSION["cartData"]);
                    header("Location: /thank-you");
                    exit();
                } else {
                    // echo "Failed";
                    // die();
                    $_SESSION["err"] = "Can't Place Order";
                    header("Location: /checkout");
                    // printWithPre($purchaseid);
                    exit();
                }
            } elseif ($mode = "Prepaid") {

                if ($PaymentGateWay['name'] == "razorpay") {

                    // print_r("mode ".$mode);
                    // die();

                    if (1 == 1) {
                        $orderId = $this->insertOnlineOrder([
                            "cartData" => json_encode($_SESSION["cartData"]),
                            "checkoutData" => json_encode($_POST),
                            "status" => "Processing",
                            "payment_mode" => $mode,
                            "userid" => $_SESSION["userid"],
                            "username" => $_SESSION["username"],
                            "amount" => $_POST["allTotal"],

                        ]);



                        if ($orderId) {
                            $keyapi = $PaymentGateWay['keyid'];

            ?>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

                            <script>
                                $(document).ready(function() {
                                    var options = {
                                        "key": "<?= $keyapi ?>",
                                        "amount": "<?= $_POST["allTotal"] * 100 ?>",
                                        "currency": "INR",
                                        "name": "Nova Kids",
                                        "description": "Authentic streetwear for the next generation. Quality pieces that speak your language and match your vibe.",
                                        "image": "https://nova.bloomcrm.in/public/logos/nova_logo.png",
                                        "handler": function(response) {
                                            // Payment successful - submit form
                                            var form = document.createElement('form');
                                            form.method = 'POST';
                                            form.action = '/thankyou';

                                            var orderInput = document.createElement('input');
                                            orderInput.type = 'hidden';
                                            orderInput.name = 'order_id';
                                            orderInput.value = '<?= $orderId ?>';
                                            form.appendChild(orderInput);

                                            var paymentInput = document.createElement('input');
                                            paymentInput.type = 'hidden';
                                            paymentInput.name = 'razorpay_payment_id';
                                            paymentInput.value = response.razorpay_payment_id;
                                            form.appendChild(paymentInput);

                                            if (response.razorpay_signature) {
                                                var signatureInput = document.createElement('input');
                                                signatureInput.type = 'hidden';
                                                signatureInput.name = 'razorpay_signature';
                                                signatureInput.value = response.razorpay_signature;
                                                form.appendChild(signatureInput);
                                            }

                                            document.body.appendChild(form);
                                            form.submit();
                                        },
                                        "prefill": {
                                            "name": "<?= $_POST["lname"] . " " . $_POST["fname"] ?>",
                                            "contact": "<?= $_POST["mobile"] ?>"
                                        },
                                        "theme": {
                                            "color": "#1774ff"
                                        },
                                        "modal": {
                                            "ondismiss": function() {
                                                // User closed the payment modal
                                                // Optional: Update order status to "Cancelled" via AJAX
                                                console.log("closing...")
                                                window.history.back();
                                            }
                                        }
                                    };

                                    var rzp = new Razorpay(options);

                                    rzp.on('payment.failed', function(response) {
                                        // Handle payment failure
                                        alert('Payment failed: ' + response.error.description);
                                        window.history.back();
                                    });

                                    rzp.open();
                                });
                            </script>
        <?php
                            exit();
                        }
                    }
                }
            }

            require 'views/website/checkout.php';
        }
    }
    public function getOnlineOrderById($id)
    {
        try {
            $sql = "SELECT * FROM online_order WHERE orderid = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function insertPurchase(array $data)
    {
        try {

            if (!isset($data['orderid']) && empty($data['orderid'])) {

                $data["orderid"] = generateRandomString(16) . time();;
                // echo $data["orderid"];
                // die();
            }


            $purchaseid = add($data, "tbl_purchase");

            foreach ($_SESSION["cartData"]["varient"] as $key => $varient) {
                $insertData = [
                    "purchase_id" => $purchaseid,
                    "varient" => $varient,
                    "product" => $_SESSION["cartData"]["product"][$key],
                    "category" => $_SESSION["cartData"]["category"][$key],
                    "quantity" => $_SESSION["cartData"]["quantity"][$key],
                    "amount" => $_SESSION["cartData"]["price"][$key],
                    "total_amount" => $_SESSION["cartData"]["quantity"][$key] * $_SESSION["cartData"]["price"][$key],
                    "userid" => $_SESSION["userid"],
                    "username" => $_SESSION["username"],
                    "status" => "Processing",
                    "created_date" => date("Y-m-d"),
                    "created_time" => date("H:i:s"),
                    "created_at" => date("Y-m-d H:i"),
                    "created_by" => $_SESSION["userid"],
                ];
                add($insertData, "tbl_purchase_item");
            }

            return [$purchaseid];
        } catch (\PDOException $e) {
            // Roll back the transaction if something failed
            echo $e->getMessage();

            return false;
        }
    }
    public function Razorpay()
    {
        // printWithPre($_POST);
        // die();
        if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['order_id'])) {

            $id = $_SESSION["userid"];

            $order_data = $this->getOnlineOrderById($_POST['order_id']);
            // printWithPre($order_data);
            $order = json_decode($order_data['checkoutData']);
            $checkoutdata = (array) $order;
            // printWithPre($checkoutdata);
            // printWithPre($_SESSION);
            // die();

            $purchaseid = $this->insertPurchase([
                "userid" => $_SESSION["userid"],
                "username" => $_SESSION["username"],
                "payment_mode" => $order_data['payment_mode'],
                "payment_status" => "Completed",
                "razorpay_payment_id" => $_POST['razorpay_payment_id'],
                "orderid" => $order_data["orderid"],
                "status" => "Processing",
                "total_amount" => $checkoutdata["allTotal"],
                "address_line1" => $checkoutdata["address_line1"],
                "address_line2" => $checkoutdata["address_line2"],
                "city" => $checkoutdata["city"],
                "state" => $checkoutdata["state"],
                "country" => $checkoutdata["country"],
                "pincode" => $checkoutdata["pin_code"],
                "mobile" => $checkoutdata["mobile"],
                "email" => $checkoutdata["email"],
                "fname" => $checkoutdata["fname"],
                "lname" => $checkoutdata["lname"],
                "additional" => $checkoutdata["additional"],
                "coupon_discount" => $checkoutdata["coupenDiscount"],
                "coupon_secret" => $checkoutdata["newDiscount"],
                "delivery_charges" => $checkoutdata["deliveryCharges"],
                "courier_company" => $_POST["deliveryCompany"],
                "courier_company_id" => $_POST["shippingCheckbox"],
                "expected_date" => $_POST["deliveryDate"],
                "created_by" => $_SESSION["userid"],

            ]);

            // printWithPre($purchaseid);
            // die();

            if ($purchaseid) {
                // echo "Success";
                delete($id, "tbl_cart", "userid");
                // printWithPre($purchaseid);
                // die();
                $_SESSION["new_order"] = $purchaseid[0];
                $_SESSION['order_id'] = $order_data["orderid"];
                $_SESSION["success"] = "Order Placed Successfully";
                unset($_SESSION["cartData"]);
                header("Location: /thank-you");
                // printWithPre($purchaseid);
                exit();
            } else {
                // echo "Failed";
                // die();
                $_SESSION["err"] = "Can't Place Order";
                header("Location: checkout.php");
                exit();
            }
        } else {
            // Reject this call
            // echo "not done";
            $_SESSION["err"] = "Payment Failed. Can't Place Order";
            header("Location: checkout.php");
            exit();
        }
    }
    public function AddToWishlist()
    {


        if (!empty($_POST)) {
            if (isset($_POST["product_id"])) {
                // printWithPre($_POST);
                if (isset($_SESSION["type"]) && $_SESSION["type"] == "User" && !empty($_SESSION["userid"])) {
                    // echo "lere";
                    $data = getData2("SELECT * FROM `tbl_wishlist` WHERE `product` = " . $_POST["product_id"] . " AND `userid` = " . $_SESSION["userid"])[0];
                    if ($data) {
                        if (
                            delete($data["id"], "tbl_wishlist", "id")
                        ) {
                            $wishlistLength = count(getData2("SELECT * FROM `tbl_wishlist` WHERE `userid` = " . $_SESSION["userid"]));

                            echo json_encode([
                                "success" => true,
                                "message" => "Remove From wishlist Successfully",
                                "data" => $data,
                                "totalwishlist" => $wishlistLength,
                            ]);
                        } else {
                            echo json_encode([
                                "success" => false,
                                "message" => "Server Error",
                            ]);
                        }
                    } else {
                        if (
                            add([
                                "product" => $_POST["product_id"],
                                "userid" => $_SESSION["userid"],
                                "username" => $_SESSION["username"],
                            ], "tbl_wishlist", false)
                        ) {
                            $wishlistLength = count(getData2("SELECT * FROM `tbl_wishlist` WHERE `userid` = " . $_SESSION["userid"]));

                            echo json_encode([
                                "success" => true,
                                "message" => "Add To wishlist Successfully",
                                "totalwishlist" => $wishlistLength,
                                "data" => $data,
                            ]);
                        } else {
                            echo json_encode([
                                "success" => false,
                                "message" => "Server Error",
                            ]);
                        }
                    }
                } else {
                    $data = checkExisteingWishlistSession($_POST["product_id"]);
                    if ($data) {
                        unset($_SESSION["wishlist"][$data[0]]);
                        $wishlistLength = count($_SESSION['wishlist']);
                        echo json_encode([
                            "success" => true,
                            "data" => $data,
                            "totalwishlist" => $wishlistLength,
                            "message" => "Remove From wishlist Successfully",
                        ]);
                    } else {
                        $_SESSION["wishlist"][] = [
                            "product" => $_POST["product_id"],
                        ];
                        $wishlistLength = count($_SESSION['wishlist']);
                        echo json_encode([
                            "success" => true,
                            "totalwishlist" => $wishlistLength,
                            "message" => "Add To wishlist Successfully",
                        ]);
                    }
                }
            }
            exit();
        }
    }
    public function insertOnlineOrder(array $data)
    {

        $data["created_date"] = date("Y-m-d");
        $data["created_time"] = date("H:i:s");
        $data["created_at"] = date("Y-m-d H:i");
        $data["orderid"] = generateRandomString(16) . time();
        // echo $data["orderid"];
        // die();
        $columns = implode(", ", array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO online_order (" . $columns . ") VALUES (" . $placeholders . ")";
        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        // $orderId = $this->db->lastInsertId();
        return $data["orderid"];
    }

    public function faq()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "FAQ";
        $pageTitle = "FAQ";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/faq.php';
        }
    }
    public function returnExchange()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Return And Exchange";
        $pageTitle = "Return And Exchange";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/return_exchange.php';
        }
    }
    public function CancellationAndRefund()
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Cancellation And Refund";
        $pageTitle = "Cancellation And Refund";

        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require 'views/website/cancellation-and-refund.php';
        }
    }
    public function UpdateOrder()
    {
        $order = $_POST['value'];
        $id = $_POST['id'];
        // echo $id;
        // echo $order;

        if ($id != null) {
            $update = update(['order_no' => $order], $id, 'tbl_home_banner');
            if ($update) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Update failed']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid ID']);
        }
    }

    public function ViewBlog($title = null)
    {
        $siteName = getDBObject()->getSiteName();
        $pageModule = "Blogs";
        $pageTitle = "Blogs";
        // $this->checkSession();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = str_replace('-', ' ', $title);
            $id = str_replace('\'', ' ', $title);

            // echo $id;
            $sql = "SELECT * FROM blogs
WHERE LOWER(
    REPLACE(
        REPLACE(
            REPLACE(
                REPLACE(
                    REPLACE(
                        REPLACE(
                            REPLACE(name, '-', ' '),
                            '“', ''
                        ),
                        '”', ''
                    ),
                    '&', 'and'
                ),
                '’', ''
            ),
            '''', ' '
        ),
        ':', ' '
    )
) = LOWER(
    REPLACE('$id', '-', ' ')
);
";
            // echo $sql;
            $blog = getData2($sql)[0];
            $blogs = getData2("SELECT * FROM blogs
WHERE LOWER(
    REPLACE(
        REPLACE(
            REPLACE(
                REPLACE(
                    REPLACE(
                        REPLACE(
                            REPLACE(name, '-', ' '),
                            '“', ''
                        ),
                        '”', ''
                    ),
                    '&', 'and'
                ),
                '’', ''
            ),
            '''', ' '
        ),
        ':', ' '
    )
) != LOWER(
    REPLACE('$id', '-', ' ')
)
ORDER BY id DESC LIMIT 5");
            // printWithPre($blogs);

            require 'views/website/view-blog.php';
        }
    }

    public function MyProfile()
    {

        if (!isset($_SESSION['userid']) && empty($_SESSION['userid'])) {
            header('Location:/');
            exit();
        }

        $siteName = getDBObject()->getSiteName();
        $pageTitle = "My Profile";

        // echo "SELECT ous.*, tua.address_line1, tua.address_line2, tua.city, tua.state, tua.pincode FROM `online_users` ous LEFT JOIN `tbl_user_address` tua ON ous.id = tua.userid WHERE ous.id = " . $_SESSION['userid'] . " AND tua.status = 1";
        $userData = getData2("SELECT * FROM online_users WHERE id = " . $_SESSION['userid'] . "")[0];
        $userAddress = getData2("SELECT tbl_user_address.*, indian_states.name AS state_name FROM tbl_user_address LEFT JOIN indian_states ON tbl_user_address.state = indian_states.id WHERE userid = " . $_SESSION['userid'] . "");
        $ActiveuserAddress = getData2("SELECT tbl_user_address.*, indian_states.name AS state_name FROM tbl_user_address LEFT JOIN indian_states ON tbl_user_address.state = indian_states.id WHERE userid = " . $_SESSION['userid'] . " AND tbl_user_address.status = 1 ORDER BY id DESC LIMIT 1")[0];
        // "SELECT * FROM online_users WHERE id = " . $_SESSION['userid'];
        // printWithPre($userData);
        // printWithPre($ActiveuserAddress);
        $orders = getData2("SELECT tbl_purchase.*, indian_states.name AS state_name FROM tbl_purchase LEFT JOIN  indian_states ON tbl_purchase.state = indian_states.id WHERE tbl_purchase.userid = '$_SESSION[userid]' ORDER BY tbl_purchase.id DESC");

        $wishlists = getData2("SELECT * FROM `tbl_wishlist` WHERE `userid` = " . $_SESSION["userid"]);

        $TotalWishlist = count($wishlists);
        $TotalOrders = count($orders);

        // echo $TotalWishlist;
        // echo $TotalOrders;

        require 'views/website/myprofile.php';
    }
    public function DeleteAddress()
    {

        $id = $_POST['delete_id'];
        $delete = delete($id, 'tbl_user_address');
        if ($delete) {
            $_SESSION['success'] = "Address Deleted Successfully";
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Update failed']);
        }
    }
    public function EditAddress()
    {
        $id = $_POST['address_id'];
        $address = getData2("SELECT * FROM tbl_user_address WHERE id = $id")[0];
        // echo json_encode($address);
        echo json_encode(['success' => true, 'address' => $address]);
    }
    public function VSAProfile()
    {
        require 'views/website/vsa-profile.php';
    }
    public function MissionVision()
    {
        require 'views/website/mission-vision.php';
    }
    public function DirectorsProfile()
    {
        require 'views/website/directors-profile.php';
    }
    public function MediaGallery()
    {
        require 'views/website/media-events.php';
    }
    public function ContactMail()
    {
        require 'views/website/contact-mail.php';
    }
    public function SendOtp()
    {
        $user = $this->getUserByphone($_POST["phone"]);
        // printWithPre($user);
        require 'api/send-otp.php';
    }










    public function searchProduct()
    {
        $response = [
            "success" => false,
            "message" => "No Product Found"
        ];

        try {
            $_POST = json_decode(file_get_contents('php://input'), true);

            // printWithPre($_POST);

            $search = $_POST['search'];

            if (empty($search)) {
                $products = getData2("SELECT * FROM `tbl_products` ORDER BY `id` DESC LIMIT 8");
            } else {
                $products = getData2("SELECT * FROM `tbl_products` WHERE `name` LIKE '%$search%'");
            }

            // printWithPre($products);

            if (!empty($products)) {
                $response = [
                    "success" => true,
                    "data" => $products
                ];
            } else {
                $response = [
                    "success" => false,
                    "message" => "No Product Found"
                ];
            }
        } catch (Exception $e) {

            $response = [
                "success" => false,
                "message" => $e->getMessage()
            ];
        }

        echo json_encode($response);
        die();
    }

 public function shippingPolicy()
    {
        require 'views/website/shipping-policy.php';
 }
 public function TermsAndPolicy()
    {
        require 'views/website/terms-and-conditions.php';
 }
 public function CancellationAndRefunds()
    {
        require 'views/website/cancellation-and-refund.php';
 }
  public function PrivacyPolicy(){
      require 'views/website/privacy-policy.php';
  }

    public function addReview()
    {
        $response = [
            "success" => false,
            "message" => "Something went wrong"
        ];

        try {
            $this->db->beginTransaction();

            $_POST = json_decode(file_get_contents('php://input'), true);
            // printWithPre($_POST);
            // die();

            $uname = $_POST['name'];
            unset($_POST['name']);

            add($_POST, "tbl_product_review");

            $userName = getData2("SELECT * FROM online_users WHERE id = " . $_POST['userid'] . " LIMIT 1")[0]['fname'];
            if (empty($userName)) {
                $_SESSION['fname'] = $uname;
                update(
                    [
                        "fname" => $uname,
                    ],
                    $_POST['userid'],
                    "online_users"
                );
            }

            $this->db->commit();

            $response = [
                "success" => true,
                "message" => "Review Added Successfully"
            ];
        } catch (Exception $e) {
            $this->db->rollBack();
            $response = [
                "success" => false,
                "message" => $e->getMessage()
            ];
        } finally {
            echo json_encode($response);
        }
    }

    public function saveToken()
    {
        $response = [
            "success" => false,
            "message" => "Something went wrong"
        ];

        try {
            $this->db->beginTransaction();

            $_POST = json_decode(file_get_contents('php://input'), true);

            $token = $_POST['token'];
            $userid = $_POST['userid'];

            if (!empty($token)) {

                $isExistToken = getData2("SELECT * FROM `tbl_tokens` WHERE `token` = '$token'");

                if (empty($isExistToken)) {
                    add([
                        "token" => $token,
                        "userid" => $userid,
                        "created_date" => date("Y-m-d"),
                        "created_time" => date("H:i:s"),
                        "created_at" => date("Y-m-d H:i:s")
                    ], "tbl_tokens", false);
                } else if (empty($isExistToken[0]['userid']) && !empty($userid)) {
                    update([
                        "userid" => $userid
                    ], $isExistToken[0]['id'], "tbl_tokens");
                }
            }

            // printWithPre($_POST);
            // die();

            $response = [
                "success" => true,
                "message" => "Token Saved Successfully"
            ];

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
            $response = [
                "success" => false,
                "message" => $e->getMessage()
            ];
        } finally {
            echo json_encode($response);
        }
    }

    public function getSizeChart()
    {
        // die();
        $id = $_GET["id"];
        $ProductData = getData2("SELECT tbl_products.*, tbl_category.category as category_name FROM `tbl_products` LEFT JOIN tbl_category ON tbl_products.category = tbl_category.id WHERE tbl_products.id = $id")[0];
        if (empty($ProductData) || empty($ProductData["sizeChart"])) {
            echo json_encode([
                "success" => false
            ]);
            die();
        }
        ob_start();
        $data = json_decode($ProductData["sizeChart"]);
        // printWithPre($data);
        ?>
        <div class="bg-white shadow-lg w-[65%] max-md:w-[90%] max-h-[80vh] relative flex flex-col animate-slideDown">
            <!-- Close button -->
            <button onclick="document.getElementById('sizeChartModal').classList.add('hidden')"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 animate-rotate-pingpong">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>

            <!-- Header -->
            <div class="p-6 pb-2 flex-shrink-0">
                <h2 class="text-2xl max-md:text-lg font-bold mb-1">SIZE CHART</h2>
                <p class="text-sm text-gray-500">Reviews: Fits true to size</p>
            </div>

            <!-- Scrollable body -->
            <div class="p-6 pt-0 overflow-y-auto flex-1">
                <!-- Measuring unit toggle (hidden for now) -->
                <div class="flex items-center gap-2 mb-6">
                    <span class="text-gray-700 font-medium">Measuring Unit :</span>
                    <span>Inches</span>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse text-center text-gray-700">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3 border-b">Size</th>
                                <?php
                                // Get first object to extract measurement keys
                                $first = reset($data);
                                if ($first && is_object($first)) {
                                    foreach ($first as $key => $val) {
                                        echo "<th class='p-3 border-b whitespace-nowrap'>" . htmlspecialchars($key) . "</th>";
                                    }
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rowClass = "border-t";
                            foreach ($data as $size => $measurements) {
                                echo "<tr class='{$rowClass}'>";
                                echo "<td class='p-3 font-medium whitespace-nowrap'>" . htmlspecialchars($size) . "</td>";

                                foreach ($measurements as $key => $value) {
                                    echo "<td class='p-3'>" . htmlspecialchars($value) . "</td>";
                                }

                                echo "</tr>";
                                $rowClass = ($rowClass === "border-t") ? "border-t bg-gray-50" : "border-t";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- How to Measure Section -->
                <div class="mt-8 border-t pt-6 flex flex-col md:flex-row items-center">
                    <!-- Text -->
                    <div class="w-full md:w-[60%]">
                        <?= $ProductData["sizeDescription"] ?>
                    </div>
                    <!-- Image -->
                    <div class="w-full md:w-[40%] flex justify-center <?= empty($ProductData["sizeImage"]) ? "hidden" : "" ?>">
                        <img src="/<?= $ProductData["sizeImage"] ?>" alt="How to measure T-shirt" class="h-72 max-md:h-64">
                    </div>
                </div>
            </div>
    <?php
        $html = ob_get_clean();

        echo json_encode([
            "success" => true,
            "data" => $html,
            "vv" => $data
        ]);
    }
}
