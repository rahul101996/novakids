<?php
// printWithPre($_SESSION);
$allstates = getData("indian_states");
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
                    <button onclick="openModal1()" type="button" class="bg-black text-white flex py-2 px-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add New Address
                    </button>
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
                            <input type="text" placeholder="City" id="city" value="<?= $address[0]['city'] ?>" name="city" required class="border px-3 py-2 rounded ">

                            <select class="border px-3 py-2 rounded w-full" id="state" name="state">
                                <?php foreach ($allstates as $key => $state) {  ?>

                                    <option value="<?= $state['id'] ?>" <?= (isset($address) && $address[0]['state'] == $state['id']) ? 'selected' : '' ?>><?= $state['name'] ?></option>

                                <?php  } ?>
                            </select>

                            <input type="text" placeholder="Pincode" id="pinTest" name="pin_code" value="<?= $address[0]['pincode'] ?>" required class="border px-3 py-2 rounded ">
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
                    <div class="min-h-[30vh] max-md:h-[40vh] overflow-y-auto space-y-3 pr-2">
                        <?php if (empty($address)) { ?>
                            <!-- Empty State -->
                            <div class="h-full flex flex-col items-center justify-center text-center max-md:p-2">
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
                <div class="bg-white  p-6">
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
                            class="flex items-center justify-between border p-4 rounded-md cursor-pointer hover:border-[#f25b21]">
                            <span class="flex max-md:flex-col items-center gap-2">

                                <p class="whitespace-nowrap flex items-center gap-2">
                                    <i class="fas fa-credit-card text-[#f25b21]"></i>
                                    Credit / Debit Card / UPI / Wallet
                                </p>

                                <div class="flex gap-2">
                                    <img src="/public/logos/images (3).png" alt="UPI" class="h-5 mx-1 max-md:h-2">
                                    <img src="/public/logos/visa.png" alt="VISA" class="h-5 mx-1 max-md:h-2">
                                    <img src="/public/logos/mastercard.png" alt="Mastercard" class="h-5 mx-1 max-md:h-2">
                                    <img src="/public/logos/rupay.png" alt="RuPay" class="h-5 mx-1 max-md:h-2">
                                </div>
                            </span>
                            <input type="radio" name="payment_mode" value="Prepaid">
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
                        $variant_id = $cartData['varient'][$key];
                        $quantity = $cartData['quantity'][$key];
                        $vdata = getData2("SELECT tbl_variants.* , tbl_products.name as product_name, tbl_products.id as product_id, tbl_products.category as category FROM `tbl_variants` LEFT JOIN tbl_products ON tbl_variants.product_id = tbl_products.id WHERE tbl_variants.id = '$variant_id'")[0];
                        // echo $vdata['image'];
                        // printWithPre($vdata);
                        $images = array_reverse(json_decode($vdata['images'], true));
                        $variants = json_decode($vdata['options'], true);
                        $variants = json_decode($variants, true);
                        $totalprice = $vdata['price'] * $quantity;
                        $totalAmount += $totalprice;
                    ?>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <img src="/<?= $images[0] ?>" class="w-16 h-20 object-cover">
                                <div>
                                    <h3 class="font-semibold text-base"><?= $vdata['product_name'] ?> x <span class="text-xs  px-3 bg-black text-white rounded-lg"> <?= $quantity ?></span></h3>
                                    <div class="flex gap-3 flex-wrap items-center justify-start">
                                        <?php
                                        foreach ($variants as $key => $variant) {
                                        ?>
                                            <p class="!mb-0 text-xs text-gray-600 uppercase"><?= $key ?>: <?= $variant ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <p class="font-semibold">₹<?= $totalprice ?></p>
                        </div>
                    <?php } ?>
                    <!-- Product 2 -->

                </div>

                <!-- Totals -->
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span>₹<?= $totalAmount ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span>Shipping</span>
                        <span>₹0</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg border-t pt-3">
                        <span>Total</span>
                        <span>₹<?= $totalAmount ?></span>
                    </div>
                    <input type="text" name="allTotal" value="<?= $totalAmount ?>" hidden class="hidden">
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
        <div class="bg-white shadow-lg mx-auto w-[30%]">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Update Delivery Address</h3>
                    <button onclick="closeModal1()" type="button" class="text-gray-400 hover:text-gray-500">
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
                document.getElementById('coupenDiscountSpan').innerText = result.data.discount;
                let subtotal = document.getElementById('subTotal').innerText;
                console.log(subtotal);
                console.log(result.data.discount);
                let allTotal = document.getElementById('allTotal').value = parseFloat(subtotal) - parseFloat(result.data.discount) + parseFloat(document.getElementById("deliveryCharges").value);
                console.log(allTotal);
                document.getElementById('allTotalSpan').innerText = allTotal;


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
    </script>
</body>