<?php
// printWithPre($_SESSION);
$allstates = getData("indian_states");
$getallcoupons = getData("tbl_coupons");
$page = 'checkout';
$discount = GetDiscount();
?>

<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>
<style>
    .modal {
        transition: all 0.3s ease-in-out;
        transform: translateY(-100%);
    }

    .modal.show {
        transform: translateY(0);
    }

    .modal-backdrop {
        transition: all 0.3s ease-in-out;
        opacity: 0;
        pointer-events: none;
    }

    .modal-backdrop.show {
        opacity: 1;
        pointer-events: auto;
    }
</style>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
    <!-- Breadcrumbs -->
    <div class="text-sm pt-6 px-6">
        <ol class="flex items-center space-x-2 text-gray-500">
            <li>
                <a href="/" class="hover:text-black">Home</a>
            </li>
            <li>
                <span class="mx-1">/</span>
            </li>
            <li class="text-black font-semibold">Checkout</li>
        </ol>
    </div>

    <!-- Main Layout -->
    <form action="" method="POST" class="w-full" id="checkout-form">
        <main class="w-[90vw] mx-auto py-10 grid md:grid-cols-5 gap-10">

            <!-- LEFT: Checkout Sections -->
            <section class="md:col-span-3 space-y-6">
                <!-- Step 1: Shipping -->
                <div class="bg-white">
                    <div class="w-full flex item-center justify-between">
                        <button onclick="openModal1()" type="button" class="bg-black text-white flex py-2 px-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add New Address
                        </button>
                        <button type="button" onclick="getLocation()" class="bg-[#f25b21] flex gap-2  text-white py-2 px-4 rounded  max-md:gap-0 max-md:px-1 max-md:py-1 max-md:text-xs">
                            <svg class="max-md:w-5 max-md:ml-2" xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#FFFFFF">
                                <path d="M444-48v-98q-121-14-202.5-96T146-444H48v-72h98q14-120 95.5-202T444-814v-98h72v98q121 14 202.5 96T814-516h98v72h-98q-14 120-95.5 202T516-146v98h-72Zm36-168q110 0 187-77t77-187q0-110-77-187t-187-77q-110 0-187 77t-77 187q0 110 77 187t187 77Zm0-120q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm0-65q32.59 0 55.79-23.21Q559-447.41 559-480t-23.21-55.79Q512.59-559 480-559t-55.79 23.21Q401-512.59 401-480t23.21 55.79Q447.41-401 480-401Zm1-80Z" />
                            </svg>
                            Get My Location</button>
                    </div>
                    <h2 class="text-xl font-bold mb-4 flex items-center gap-2 mt-4">
                        <span
                            class="w-8 h-8 flex items-center justify-center bg-[#f25b21] text-white rounded-full text-sm">1</span>
                        Shipping Information
                    </h2>
                    <div class="grid grid-cols-2 gap-4 mt-3">
                        <input type="text" placeholder="First Name" required class="border px-3 py-2 rounded col-span-1" value="<?= $userData['fname'] ?>" name="fname">
                        <input type="text" placeholder="Last Name" required class="border px-3 py-2 rounded col-span-1" value="<?= $userData['lname'] ?>" name="lname">
                        <input type="email" placeholder="Email Address" class="border px-3 py-2 rounded col-span-1 max-md:col-span-2" value="<?= $userData['username'] ?>" name="email">
                        <input type="text" placeholder="Phone Number" required class="border px-3 py-2 rounded col-span-1 max-md:col-span-2" value="<?= $userData['mobile'] ?>" name="mobile">
                        <input type="text" id="address2" placeholder="Apartment, Floor No, suite, etc." required class="border px-3 py-2 rounded col-span-2" name="address_line2" value="<?= $address[0]['address_line2'] ?>">
                        <input type="text" placeholder="Street Address" required
                            class="border px-3 py-2 rounded col-span-2" id="address1" value="<?= $address[0]['address_line1'] ?>" name="address_line1">
                        <div class="grid grid-cols-3 gap-4 col-span-2">
                            <input type="text" placeholder="City" id="city" value="<?= $address[0]['city'] ?>" name="city" required class="border px-3 py-2 rounded max-md:col-span-3 w-full">

                            <select class="border px-3 py-2 rounded w-full max-md:col-span-3" id="state" name="state">
                                <?php foreach ($allstates as $key => $state) {  ?>

                                    <option value="<?= $state['id'] ?>" <?= (isset($address) && $address[0]['state'] == $state['id']) ? 'selected' : '' ?>><?= $state['name'] ?></option>

                                <?php  } ?>
                            </select>

                            <input type="text" placeholder="Pincode" id="pinTest" name="pin_code" value="<?= $address[0]['pincode'] ?>" required class="border px-3 py-2 rounded max-md:col-span-3 w-full">
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 sm:p-8 w-full  shadow-md border border-gray-100">
                    <!-- Header Section -->
                    <div class="title mb-4 sm:mb-6 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-1 h-6 bg-[#f25b21] rounded-full"></div>
                            <h2 class="text-lg sm:text-xl font-semibold text-gray-800">Saved Addresses</h2>
                        </div>
                    </div>


                    <!-- Replace the Address List div with this conditional structure -->
                    <div class="min-h-[30vh] max-md:h-[35vh] overflow-y-auto space-y-3 pr-2">
                        <?php if (empty($address)) { ?>
                            <!-- Empty State -->
                            <div class="h-full flex flex-col items-center justify-center text-center">
                                <div class="w-24 h-24 mb-2 max-md:w-16 max-md:h-16">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-full h-full text-gray-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">No Addresses Saved</h3>
                                <p class="text-gray-500 mb-6 max-w-sm max-md:text-xs">Add your delivery addresses to make checkout faster and easier</p>
                                <button onclick="openModal1()" type="button" class="bg-black text-white flex py-2 px-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Add New Address
                                </button>
                            </div>
                        <?php } else { ?>
                            <?php foreach ($address as $key => $value) { ?>
                                <div class="relative">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 sm:p-5 bg-white  border border-gray-200 hover:border-pink-200 hover:shadow-md cursor-pointer transition-all duration-200" onclick="selectAddress(this)">
                                        <!-- Radio and Type Badge -->
                                        <div class="flex items-center gap-3 sm:gap-4 relative mb-3 sm:mb-0">
                                            <input
                                                type="radio"
                                                class="w-4 h-4 accent-[#1d9267] cursor-pointer shrink-0"
                                                name="selectAddress"
                                                value="<?= $value['id'] ?>"
                                                <?= ($key == 0) ? 'checked' : '' ?>>


                                        </div>

                                        <!-- Address Details -->
                                        <div class="flex-1 sm:pl-4">
                                            <div class="flex flex-col">
                                                <span class="selectedAddress1 font-medium text-gray-900 leading-tight max-md:text-sm">
                                                    <?= $value['address_line1'] ?>
                                                </span>
                                                <span class="selectedAddress2 text-sm text-gray-500 mt-0.5 mb-2 sm:mb-0">
                                                    <?= $value['address_line2'] ?>
                                                </span>

                                                <!-- City, State, Pincode -->
                                                <div class="mt-2 flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-sm">
                                                    <div class="flex items-center gap-1.5">
                                                        <span class="text-gray-500 w-16 sm:w-auto">City:</span>
                                                        <span class="selectedCity font-medium text-gray-700"><?= $value['city'] ?></span>
                                                    </div>

                                                    <div class="hidden sm:block w-1 h-1 bg-gray-300 rounded-full"></div>

                                                    <div class="flex items-center gap-1.5">
                                                        <span class="text-gray-500 w-16 sm:w-auto">State:</span>
                                                        <span class="selectedState font-medium text-gray-700"><?= $value['state'] ?></span>
                                                    </div>

                                                    <div class="hidden sm:block w-1 h-1 bg-gray-300 rounded-full"></div>

                                                    <div class="flex items-center gap-1.5">
                                                        <span class="text-gray-500 w-16 sm:w-auto">Pincode:</span>
                                                        <span class="selectedPincode font-medium text-gray-700"><?= $value['pincode'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <!-- Step 2: Delivery -->

                <!-- Step 3: Payment -->
                <div class="bg-white  pt-6">
                    <h2 class="text-xl font-bold mb-4 flex items-center gap-2">
                        <span
                            class="w-8 h-8 flex items-center justify-center bg-[#f25b21] text-white rounded-full text-sm">2</span>
                        Payment Method
                    </h2>
                    <div class="space-y-3">
                        <!-- Cash on Delivery -->
                        <label
                            class="flex items-center justify-between border p-4 rounded-md cursor-pointer hover:border-[#f25b21]">
                            <span class="flex items-center gap-2">
                                <i class="fas fa-money-bill-wave text-[#f25b21]"></i>
                                Cash on Delivery
                            </span>
                            <input type="radio" name="payment_mode" value="COD" checked>
                        </label>
                        <!-- Credit / Debit Card -->
                        <label
                            class="flex items-center max-md:items-start justify-between border p-4 rounded-md cursor-pointer hover:border-[#f25b21]">
                            <span class="flex max-md:flex-col items-center gap-2 max-md:gap-3">

                                <p class="whitespace-nowrap flex items-center gap-2">
                                    <i class="fas fa-credit-card text-[#f25b21]"></i>
                                    Credit / Debit Card / UPI / Wallet
                                </p>

                                <div class="flex gap-2 max-md:items-start max-md:w-full">
                                    <img src="/public/logos/images (3).png" alt="UPI" class="h-5 mx-1 max-md:h-4">
                                    <img src="/public/logos/visa.png" alt="VISA" class="h-5 mx-1 max-md:h-4">
                                    <img src="/public/logos/mastercard.png" alt="Mastercard" class="h-5 mx-1 max-md:h-4">
                                    <img src="/public/logos/rupay.png" alt="RuPay" class="h-5 mx-1 max-md:h-4">
                                </div>
                            </span>
                            <input type="radio" name="payment_mode" value="Prepaid" class="max-md:mt-1.5">
                        </label>



                    </div>

                </div>
            </section>

            <!-- RIGHT: Order Summary (Sticky) -->
            <aside class="bg-gray-100 shadow-md  p-6 h-fit sticky top-28 md:col-span-2">
                <h2 class="text-lg font-bold mb-4">Order Summary</h2>
                <div class="space-y-4 border-b pb-4 mb-4">
                    <!-- Product 1 -->
                    <?php
                    $totalAmount = 0;

                    foreach ($cartData["cartid"] as $key => $cid) {
                        $id = $cartData["product"][$key];
                        $ids = json_decode($discount['product_id'], true);
                        foreach ($ids as $idv) {
                            if ($idv == $id) {
                                $checked = true;
                                break;
                            } else {
                                $checked = false;
                            }
                        }
                        $variant_id = $cartData['varient'][$key];
                        $quantity = $cartData['quantity'][$key];
                        $category = $cartData['category'][$key];
                        $vdata = getData2("SELECT tbl_variants.* , tbl_products.name as product_name, tbl_products.id as product_id, tbl_products.category as category FROM `tbl_variants` LEFT JOIN tbl_products ON tbl_variants.product_id = tbl_products.id WHERE tbl_variants.id = '$variant_id'")[0];
                        if ($checked) {

                            $price = $vdata['price'];
                            $discountPercent = $discount['discount'];

                            // Subtract the discount percentage from the original price
                            $vdata['price'] = round($price - (($discountPercent / 100) * $price), 0, PHP_ROUND_HALF_UP);
                        }
                        // echo $vdata['image'];
                        // printWithPre($vdata);
                        $images = array_reverse(json_decode($vdata['images'], true));
                        $variants = json_decode($vdata['options'], true);
                        $variants = json_decode($variants, true);
                        $totalprice = $vdata['price'] * $quantity;
                        $totalAmount += $totalprice;
                    ?>
                        <div class="flex gap-4 max-md:gap-2 items-center justify-between deleteCart<?= $cartData['cartid'][$key] ?> " key="<?= $key ?>">
                            <div class="flex items-center gap-3">
                                <img src="/<?= $images[0] ?>" class="w-16 h-20 object-cover">
                                <div>
                                    <h3 class="font-semibold text-base"><?= $vdata['product_name'] ?> x <span class="text-xs  px-3 bg-black text-white rounded-lg xquantity"> <?= $quantity ?></span></h3>
                                    <div class="flex gap-3 flex-wrap items-center justify-start">
                                        <?php
                                        foreach ($variants as $key1 => $variant) {
                                        ?>
                                            <p class="!mb-0 text-xs text-gray-600 uppercase"><?= $key1 ?>: <?= $variant ?></p>
                                        <?php } ?>
                                    </div>
                                    <div class="border border-gray-500 px-2 py-1 flex gap-3 items-center mt-2 w-fit">
                                        <span class="plus checkotplus<?= $variant_id ?>" key="<?= $key ?>" price="<?= $cartData['price'][$key] ?>" onclick="checkoutPlus(this,<?= $key ?>,<?= $cartData['price'][$key] ?>)"><i class="fa fa-plus cursor-pointer"></i></span>
                                        <span class="quantity"><?= $quantity ?></span>
                                        <span class="minus checkotminus<?= $variant_id ?>" key="<?= $key ?>" price="<?= $cartData['price'][$key] ?>" onclick="checkoutMinus(this,<?= $key ?>,<?= $cartData['price'][$key] ?>)"><i class="fa fa-minus cursor-pointer"></i></span>
                                    </div>
                                </div>
                            </div>
                            <input type="text" value="<?= $variant_id ?>" class="sideVarientId hidden">
                            <input type="text" value="<?= $category ?>" class="sideCategoryId hidden">
                            <input type="text" value="<?= $id ?>" class="sideProductId hidden">
                            <p class="font-semibold xprice price" data-price="<?= $totalprice ?>">₹<?= $totalprice ?></p>
                        </div>
                    <?php } ?>
                    <!-- Product 2 -->

                </div>
                <div class="w-full flex items-center justify-center gap-2">
                    <input type="text" class="hidden" id="coupenDiscount" value="">
                    <input type="text" class=" w-full py-2 px-2 border border-gray-300 rounded-sm uppercase" name="coupon" placeholder="Enter Coupon Code" id="newDiscount">
                    <button class="bg-black py-2 px-4 text-white border-lg" type="button" onclick="applyCoupon()">Apply</button>
                </div>
                <!-- Totals -->
                <div class="space-y-2 text-sm mt-2">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span id="subTotalSpan" class="price" data-price="<?= $totalAmount ?>">₹<?= $totalAmount ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Coupon</span>
                        <span id="coupenDiscountSpan" class="price" data-price="0">₹0</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Shipping</span>
                        <span>₹0</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg border-t pt-3">
                        <span>Total</span>
                        <span id="allTotalSpan" class="price" data-price="<?= $totalAmount ?>">₹<?= $totalAmount ?></span>
                    </div>
                    <input type="text" id="subtotal" value="<?= $totalAmount ?>" class="hidden">
                    <input type="text" name="allTotal" value="<?= $totalAmount ?>" class="hidden" id="allTotal">
                </div>
                <div class="mt-3">
                    <?php foreach ($getallcoupons as $key => $value) { ?>
                        <div class="px-3 py-5 mb-3 bg-white max-md:py-2 ">
                            <div class="flex w-full justify-between ">
                                <div class="border-dashed border-2 bg-[#ebe7f5] border-gray-400 p-2 rounded text-gray-600 max-md:h-8  max-md:justify-center max-md:flex max-md:items-center" style="width: fit-content;">
                                    <span class="font-semibold text-uppercase max-md:text-xs" id='coupon_<?= $value["id"] ?>'><?= $value["coupon_secret"] ?></span> - <span class="max-md:text-xs price" data-price="<?= $value["discount"] ?>"><?= $currency ?><?= $value["discount"] ?></span>
                                </div>
                                <button type="button" class="border  px-4  bg-gray-200 hover:bg-gray-300 text-gray-500 text-sm justify-self-end max-md:text-xs"
                                    onclick="copyCoupon('<?= $value['coupon_secret'] ?>')">Add</button>
                            </div>
                            <p class="mt-4 mb-0  border-gray-300 w-1/2 max-md:text-xs max-md:w-full">📢 Get discount on your Order ✨</p>
                        </div>
                    <?php } ?>
                </div>
                <!-- Button -->
                <button type="submit"
                    class="relative mt-6 w-full font-semibold py-2 rounded-md border-2 border-black overflow-hidden group">
                    <!-- Text -->
                    <span class="relative z-10 text-white group-hover:text-black transition-colors duration-700">
                        Confirm & Place Order
                    </span>
                    <!-- Animated BG -->
                    <span
                        class="absolute inset-0 bg-black transition-transform duration-700 origin-left group-hover:scale-x-0 scale-x-100"></span>
                </button>
            </aside>
        </main>
    </form>
    <div id="addressModal" class=" h-full w-full fixed inset-0 top-1/2 transform -translate-y-1/2 z-[9999]  overflow-y-auto bg-black bg-opacity-50 flex items-center justify-center   items-center justify-center hidden">
        <div class="bg-white shadow-lg mx-auto w-[30%] max-md:w-[90%]">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Update Delivery Address</h3>
                    <button onclick="closeModal1()" type="button" class="text-gray-400 hover:text-gray-500 animate-rotate-pingpong">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Address Line 1</label>
                        <input type="text" name="addressInput1" id="addressInput1" value=""
                            class="mt-1 block w-full border border-gray-300  shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Address Line 2</label>
                        <input type="text" name="addressInput2" id="addressInput2" value=""
                            class="mt-1 block w-full border border-gray-300  shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">City</label>
                        <input type="text" name="cityInput" value="" id="cityInput"
                            class="mt-1 block w-full border border-gray-300  shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">State</label>

                        <select class="border px-3 py-2 rounded w-full" id="stateInput" name="stateInput">
                            <?php foreach ($allstates as $key => $state) {  ?>

                                <option value="<?= $state['id'] ?>"><?= $state['name'] ?></option>

                            <?php  } ?>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Zip Code</label>
                        <input type="text" name="pincodeInput" value="" id="pincodeInput"
                            class="mt-1 block w-full border border-gray-300  shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="flex justify-between space-x-3 pt-4">

                        <div>
                            <button type="button" onclick="closeModal1()"
                                class="px-4 py-2 border border-gray-300  text-sm text-white    font-medium bg-gray-600 hover:bg-gray-700 shadow-lg">
                                Cancel
                            </button>
                            <button type="button" name="submit" id="Process" value="add" onclick="updateAddress()"
                                class="px-4 py-2 border border-transparent  shadow-sm text-sm font-medium text-white bg-[#1d9267] ">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalBackdrop" class="modal-backdrop hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>
    <script>
        const addressmodal = document.getElementById('addressModal');
        const buttonValue = document.getElementById('Process');
        const backdrop = document.getElementById('modalBackdrop');
        const addressInput1 = document.getElementById('addressInput1');
        const addressInput2 = document.getElementById('addressInput2');
        const cityInput = document.getElementById('cityInput');
        const stateInput = document.getElementById('stateInput');
        const pincodeInput = document.getElementById('pincodeInput');
        const userid = document.getElementById('userid');
        // const home = document.getElementById('home');
        // const work = document.getElementById('work');
        const pinTest = document.getElementById('pinTest');
        // const productweight = document.querySelectorAll('.productweight');


        function openModal1() {
            console.log("hello");
            addressmodal.classList.add('show');
            addressmodal.classList.remove('hidden');

            console.log(addressmodal);

            // modal.style.display = 'block';
            backdrop.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeModal1() {
            addressmodal.classList.remove('show');
            addressmodal.classList.add('hidden');

            // modal.style.display = 'none';
            backdrop.classList.remove('show');
            // document.body.style.overflow = '';
        }

        function copyCoupon(coupon_secret) {

            document.getElementById('newDiscount').value = coupon_secret;
            applyCoupon();
        }
        async function applyCoupon() {
            // Get the coupon text
            const couponSecret = document.getElementById('newDiscount').value;

            const result = await axios.post('', new URLSearchParams({
                couponSecret: couponSecret
            }));

            console.log(result);

            if (result.data.success) {
                toastr.success(result.data.message);

                document.getElementById('coupenDiscount').value = result.data.discount;
                // document.getElementById('coupenDiscountSpan').innerText = '₹' + result.data.discount;
                document.getElementById('coupenDiscountSpan').setAttribute('data-price', result.data.discount);
                let subtotal = document.getElementById('subtotal').value;
                console.log(subtotal);
                // console.log(result.data.discount);
                let allTotal = document.getElementById('allTotal').value = parseFloat(subtotal) - parseFloat(result.data.discount);
                console.log(allTotal);
                // document.getElementById('allTotalSpan').innerText = '₹' + allTotal;
                document.getElementById('allTotalSpan').setAttribute('data-price', allTotal);

                loadCurrencies();

            } else {
                toastr.error(result.data.message);

            }

        }
        async function updateAddress() {
            // displayAddress.textContent = addressInput.value;
            console.log(addressInput1.value)
            console.log(addressInput2.value)
            console.log(cityInput.value)
            console.log(stateInput.value)
            console.log(pincodeInput.value)
            let delivery = '';

            console.log('this is delevry value' + delivery)

            const response = await axios.post("/user-address", new URLSearchParams({
                process: buttonValue.value,
                address_line1: addressInput1.value,
                address_line2: addressInput2.value,
                city: cityInput.value,
                state: stateInput.value,
                pincode: pincodeInput.value,
                userid: '<?php echo $_SESSION['userid']; ?>',
                created_by: '<?php echo $_SESSION['userid']; ?>',

            }))

            console.log(response);
            if (response.data.success) {

                window.location.reload();
            } else {
                toastr.error(response.data.message);
            }

            closeModal1();
        }

        async function checkoutPlus(ele, key = null, price = null) {
            console.log(ele);
            sidecart = true;
            if (key == null || price == null) {
                sidecart = false;
                key = ele.getAttribute('key');
                price = ele.getAttribute('price');
            }
            let parentElement = ele.parentElement.parentElement.parentElement.parentElement;
            console.log(parentElement);
            let quantity = ele.parentElement.querySelector(".quantity");
            let quantityValue = quantity.innerText;
            quantityValue++;

            const result = await axios.post('', new URLSearchParams({
                key: key,
                activity: 'plus',
                updateQuantity: 1
            }));
            if (result.data.success) {
                if (sidecart) {
                    const request = await axios.post("/api/add-to-cart", new URLSearchParams({
                        varient_id: parentElement.querySelector(".sideVarientId").value,
                        category_id: parentElement.querySelector(".sideCategoryId").value,
                        product_id: parentElement.querySelector(".sideProductId").value,
                        quantity: 1
                    }));

                }
                parentElement.querySelector(".xquantity").innerText = quantityValue;
                // parentElement.querySelector(".xprice").innerText = price * quantityValue;
                parentElement.querySelector(".xprice").setAttribute('data-price', price * quantityValue);
                quantity.innerText = quantityValue;
                console.log(quantityValue);
                let subtotal = document.getElementById('subtotal');

                let subtotalspan = document.getElementById('subTotalSpan');
                subtotal.value = parseFloat(subtotal.value) + parseFloat(price);
                // subtotalspan.innerText = '₹' + subtotal.value;
                subtotalspan.setAttribute('data-price', subtotal.value);
                // console.log(subtotal);
                let allTotal = parseFloat(document.getElementById('allTotal').value) + parseFloat(price);
                document.getElementById('allTotal').value = allTotal;
                console.log(allTotal);
                // document.getElementById('allTotalSpan').innerText = '₹' + allTotal;
                document.getElementById('allTotalSpan').setAttribute('data-price', allTotal);
                toastr.success(result.data.message);
                loadCurrencies();

            } else {
                toastr.error(result.data.message);
            }
        }

        async function checkoutMinus(ele, key = null, price = null) {
            sidecart = true;
            if (key == null || price == null) {
                sidecart = false;
                key = ele.getAttribute('key');
                price = ele.getAttribute('price');
            }
            let parentElement = ele.parentElement.parentElement.parentElement.parentElement;

            let quantity = ele.parentElement.querySelector(".quantity");
            let quantityValue = quantity.innerText;
            if (quantityValue > 1) {

                quantityValue--;
                const result = await axios.post('', new URLSearchParams({
                    key: key,
                    activity: 'minus',
                    updateQuantity: 1
                }));

                if (result.data.success) {

                    if (sidecart) {


                        const request = await axios.post("/api/add-to-cart", new URLSearchParams({
                            varient_id: parentElement.querySelector(".sideVarientId").value,
                            category_id: parentElement.querySelector(".sideCategoryId").value,
                            product_id: parentElement.querySelector(".sideProductId").value,
                            quantity: -1
                        }));
                    }

                    parentElement.querySelector(".xquantity").innerText = quantityValue;
                    // parentElement.querySelector(".xprice").innerText = price * quantityValue;
                    parentElement.querySelector(".xprice").setAttribute('data-price', price * quantityValue);
                    quantity.innerText = quantityValue;
                    console.log(quantityValue);
                    let subtotal = document.getElementById('subtotal');

                    let subtotalspan = document.getElementById('subTotalSpan');
                    subtotal.value = parseFloat(subtotal.value) - parseFloat(price);
                    // subtotalspan.innerText = '₹' + subtotal.value;
                    subtotalspan.setAttribute('data-price', subtotal.value);
                    // console.log(subtotal);
                    let allTotal = parseFloat(document.getElementById('allTotal').value) - parseFloat(price);
                    document.getElementById('allTotal').value = allTotal;
                    console.log(allTotal);
                    // document.getElementById('allTotalSpan').innerText = '₹' + allTotal;
                    document.getElementById('allTotalSpan').setAttribute('data-price', allTotal);
                    toastr.success(result.data.message);
                    loadCurrencies();

                } else {
                    toastr.error(result.data.message);
                }
            }

        }



        function selectAddress(div) {
            const address = div.querySelector(".selectedAddress1").innerText;
            const address2 = div.querySelector(".selectedAddress2").innerText;
            const city = div.querySelector(".selectedCity").innerText;
            const state = div.querySelector(".selectedState").innerText;
            const pincode = div.querySelector(".selectedPincode").innerText;
            // const delivery = div.querySelector(".selecteddelivery").innerText;

            console.log(address);
            console.log(address2);
            console.log(city);
            console.log(state);
            console.log(pincode);
            // console.log(delivery);

            document.getElementById("address1").value = address;
            document.getElementById("address2").value = address2;
            document.getElementById("city").value = city;
            // document.getElementById("state").value = state;
            document.getElementById("pinTest").value = pincode;
        }

        // Close modal when clicking outside
        backdrop.addEventListener('click', closeModal1);

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getAddress, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function getAddress(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            const url = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`;

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    const address = data.address;
                    const address1 = `${address.house_number || ''} ${address.road || ''}`.trim();
                    const address2 = `${address.suburb || ''}, ${address.city || address.town || ''}`.trim();
                    const city = address.city || address.town || '';
                    const state = address.state || '';
                    const country = address.country || '';
                    const postalCode = address.postcode || '';

                    // document.getElementById("address1").value = address1;
                    document.getElementById("address1").value = data.display_name;
                    document.getElementById("address2").value = '';

                    document.getElementById("city").value = city;
                    document.getElementById("pinTest").value = postalCode;

                    const stateSelect = document.getElementById("state");
                    for (let option of stateSelect.options) {
                        if (option.text === state) {
                            stateSelect.value = option.value; // Set the select to the corresponding value
                            break; // Exit the loop once the option is found
                        }
                    }
                    // document.getElementById("country").value = country;
                    // deliveryCharges();
                })
                .catch(error => console.error("Error fetching geocoding data:", error));
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }
    </script>
</body>