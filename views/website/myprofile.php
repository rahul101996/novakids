<?php

// printWithPre($_SESSION);
// if (isset($_POST['update_password'])) {
//     unset($_POST['update_password']);
//     if (password_verify($_POST['current_password'], $userData['password'])) {
//         // echo "Password Match";
//         $data = [
//             'password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT)
//         ];
//         // die();
//         $userData = update($data, $_SESSION['userid'], "online_users");
//         if ($userData) {
//             $_SESSION['success'] = "Password Updated Successfully";
//             header('Location:/profile');
//             exit();
//         } else {
//             $_SESSION['err'] = "Failed to update password";
//             header('Location:/profile');
//             exit();
//         }
//     } else {
//         $_SESSION['err'] = "Password Not Match";
//         header('Location:/profile');
//         exit();
//     }
// }

if (isset($_POST['update_profile'])) {
    unset($_POST['update_profile']);

    // printWithPre($_POST);
    // die();

    try {
        $this->db->beginTransaction();

        $data = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'username' => $_POST['email'],
        ];

        $userData = update($data, $_SESSION['userid'], "online_users");
        if ($userData) {

            updateSQL(
                [
                    'address_line1' => $_POST['address_line1'],
                    // 'address_line2' => $_POST['address_line2'],
                    'city' => $_POST['city'],
                    'state' => $_POST['state'],
                    'pincode' => $_POST['pincode'],
                ],
                "tbl_user_address",
                "status = 1 AND userid = " . $_SESSION['userid']
            );

            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['lname'] = $_POST['lname'];
            $_SESSION['username'] = $_POST['email'];

            $_SESSION['success'] = "Profile Updated Successfully";
        }

        $this->db->commit();
    } catch (Exception $e) {
        $this->db->rollBack();
        $_SESSION['err'] = $e->getMessage();
        redirect('/profile');
    }

    redirect('/profile');
}

?>
<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<style>
.text-outline {
    -webkit-text-stroke: 1px #80808070;
    /* border effect */
    color: transparent;
    /* use with background clipping */
    background: linear-gradient(to right, #fe7f30, white, #429c3d);
    -webkit-background-clip: text;
    background-clip: text;
}

.activeTab {
    background-color: #272c6c;
    color: white;

}

.activeTab:hover {
    background-color: #272c6c;
    color: white;
}

.sidenav {
    cursor: pointer;
}

.active_profile {
    font-weight: 600;
    border-bottom: 5px solid #272c6c !important;

    color: #272c6c !important;
    /* border-width: 5px; */
}
</style>

<body class="">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <div
        class="bg-[url('/public/images/dashboard-bg-shape-1.jpg')] bg-cover bg-center bg-no-repeat w-full flex items-center justify-center flex-col bg-[#eff2fa]">

        <div class="flex max-lg:flex-col w-[80%] max-lg:w-[90%] h-auto my-14 items-start justify-start">
            <aside
                class="w-[23%] max-lg:w-full bg-white shadow-md p-6 rounded-tr-2xl rounded-br-2xl md:sticky top-4 max-lg:hidden">
                <h2 class="text-sm text-gray-500 mb-4 uppercase tracking-wide">Welcome</h2>
                <nav class="space-y-3 text-gray-700 font-medium">
                    <!-- <div class="flex hover:bg-gray-100 items-center gap-3 activeTab px-4 py-2 rounded-lg sidenav "
                        onclick="showPart('dashboard', this)">
                        <div class="text-xl"><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4"
                                    d="M16.0041 5.216V1.584C16.0041 0.456 15.4921 0 14.2201 0H10.9881C9.7161 0 9.2041 0.456 9.2041 1.584V5.208C9.2041 6.344 9.7161 6.792 10.9881 6.792H14.2201C15.4921 6.8 16.0041 6.344 16.0041 5.216Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M16.0041 14.216V10.984C16.0041 9.71195 15.4921 9.19995 14.2201 9.19995H10.9881C9.7161 9.19995 9.2041 9.71195 9.2041 10.984V14.216C9.2041 15.488 9.7161 16 10.9881 16H14.2201C15.4921 16 16.0041 15.488 16.0041 14.216Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M6.8 5.216V1.584C6.8 0.456 6.288 0 5.016 0H1.784C0.512 0 0 0.456 0 1.584V5.208C0 6.344 0.512 6.792 1.784 6.792H5.016C6.288 6.8 6.8 6.344 6.8 5.216Z"
                                    fill="currentColor"></path>
                                <path opacity="0.4"
                                    d="M6.8 14.216V10.984C6.8 9.71195 6.288 9.19995 5.016 9.19995H1.784C0.512 9.19995 0 9.71195 0 10.984V14.216C0 15.488 0.512 16 1.784 16H5.016C6.288 16 6.8 15.488 6.8 14.216Z"
                                    fill="currentColor"></path>
                            </svg></div>
                        <span>Dashboard</span>
                    </div> -->

                    <div onclick="showPart('myprofile',this)"
                        class="flex items-center gap-3 px-1 py-1 hover:bg-gray-100 rounded-lg activeTab sidenav">
                        <div class="text-2xl">👤</path>
                            </svg></div>
                        <span>My Profile</span>
                    </div>

                    <div class="flex items-center gap-3 px-1 py-1 hover:bg-gray-100 rounded-lg sidenav "
                        onclick="showPart('myorders',this)">
                        <div class="text-2xl">🎓</div>
                        <span>My Orders</span>
                    </div>

                    <div onclick="showPart('setting',this)"
                        class="flex items-center gap-3 px-1 py-1 hover:bg-gray-100 rounded-lg sidenav">
                        <div class="text-2xl">⚙️</div>
                        <span>Settings</span>
                    </div>

                    <a href="/logout" class="flex items-center gap-3 px-1 py-1 hover:bg-gray-100 rounded-lg">
                        <div class="text-2xl">↩️</div>
                        <span>Logout</span>
                    </a>

                </nav>
            </aside>

            <!-- Toggle Button -->
            <div class="md:hidden fixed bottom-5 right-5 z-[9999]">
                <button id="openMobileSidebar"
                    class="bg-orange-600 text-white p-4 rounded-full shadow-lg hover:bg-[#002a4d] transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Bottom Sidebar -->
            <div id="mobileSidebarBottom"
                class="fixed bottom-0 left-0 w-full bg-white z-[9999] rounded-t-2xl shadow-xl transform translate-y-full transition-transform duration-300 ease-in-out md:hidden">
                <div class="flex justify-between items-center p-4 border-b">
                    <h2 class="text-sm text-gray-600 uppercase">Menu</h2>
                    <button id="closeMobileSidebar" class="text-gray-500 text-lg">✕</button>
                </div>
                <nav class="p-4 space-y-3 text-gray-700 font-medium">
                    <!-- <div onclick="showPart('dashboard', this)"
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-lg activeTab sidenav">
                        <span class="text-xl">🏠</span>
                        <span>Dashboard</span>
                    </div> -->
                    <div onclick="showPart('myprofile', this)"
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-lg activeTab sidenav">
                        <span class="text-xl">👤</span>
                        <span>My Profile</span>
                    </div>
                    <div onclick="showPart('myorders', this)"
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-lg sidenav">
                        <span class="text-xl">🎓</span>
                        <span>My Orders</span>
                    </div>

                    <div onclick="showPart('setting', this)"
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-lg sidenav">
                        <span class="text-xl">⚙️</span>
                        <span>Settings</span>
                    </div>
                    <a href="/logout" class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-lg sidenav">
                        <span class="text-xl">↩️</span>
                        <span>Logout</span>
                    </a>
                </nav>
            </div>

            <!-- Main Content -->
            <main class="w-[77%] max-lg:w-full md:px-10 max-lg:mt-6">

                <div class="showpart myprofile flex flex-col items-center juastify-center w-full">
                    <div class="flex justify-between items-center mb-6 w-full ">
                        <h1 class="text-2xl font-bold">My Profile</h1>

                    </div>
                    <div class="w-full mx-auto max-lg:overflow-x-auto bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700 ">
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3 w-1/3">
                                        Registration Date</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 font-semibold text-gray-900">May 26,
                                        2025 6:54 am</td>
                                </tr>
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3"> Name</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3"><?= $userData['fname'] ?>
                                        <?= $userData['lname'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3">Email</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3"><?= $userData['username'] ?></td>
                                </tr>
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3">Phone Number
                                    </td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 "><?= $userData['mobile'] ?></td>
                                </tr>

                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3">State</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 "><?= $userData['state_name'] ?></td>
                                </tr>
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3">Address</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 "><?= $userData['address_line1'] ?>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="showpart myorders flex flex-col items-center justify-center w-full hidden">
                    <div class="flex justify-between items-center mb-6 w-full">
                        <h1 class="text-2xl font-bold">My Orders</h1>
                    </div>

                    <!-- <div class="bg-white p-6 rounded w-full"> -->
                        <!-- Orders List -->
                        <div class="w-full grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6">
                            <!-- Order Card -->

                            <?php 
                            // echo "SELECT tpi.*, tp.name AS product_name, tp.price, tp.product_images FROM tbl_purchase_item tpi LEFT JOIN tbl_products tp ON tp.id = tpi.product WHERE tpi.userid = '$_SESSION[id]' ORDER BY tpi.id DESC";
                            // printWithPre($_SESSION);
                            foreach (getData2("SELECT tpi.*, tp.name AS product_name, tp.price, tp.product_images FROM tbl_purchase_item tpi LEFT JOIN tbl_products tp ON tp.id = tpi.product WHERE tpi.userid = '$_SESSION[userid]' ORDER BY tpi.id DESC") as $key => $order) { 

                                // Decode JSON into array
                                $images = json_decode($order['product_images'], true);

                                // Get first image if available
                                $firstImage = !empty($images) ? $images[0] : null;
                                
                                $purchaseData = getData2("SELECT * FROM tbl_purchase WHERE id = '$order[purchase_id]'")[0];
                                ?>
                                <div class="bg-white shadow-md rounded-lg overflow-hidden border hover:shadow-lg transition">
                                    <!-- Order Header -->
                                    <div class="flex items-center justify-between bg-gray-50 px-4 py-2 border-b">
                                        <span class="text-sm text-gray-600">Order #<?= $purchaseData['orderid'] ?></span>
                                        <span
                                            class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-700"><?= $order['status'] ?></span>
                                    </div>

                                    <!-- Product Preview -->
                                    <div class="flex items-center gap-4 p-4">
                                        <div class="w-20 h-20 rounded overflow-hidden border">
                                            <img src="/<?= $firstImage ?>" alt="Product"
                                                class="w-full h-full object-cover" />
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-800"><?= $order['product_name'] ?></h3>
                                            <p class="text-sm text-gray-500">Quantity: <?= $order['quantity'] ?></p>
                                            <p class="text-sm font-semibold text-gray-700">₹<?= $order['price'] ?></p>
                                        </div>
                                    </div>

                                    <!-- Order Footer -->
                                    <div class="flex items-center justify-between px-4 py-2 border-t bg-gray-50">
                                        <span class="text-xs text-gray-500">Ordered on: <?= formatDate($purchaseData['created_at']) ?></span>
                                        <!-- <button class="text-sm font-medium text-[#272c6c] hover:underline">View Details</button> -->
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- Another Order Example -->
                            <!-- <div class="bg-white shadow-md rounded-lg overflow-hidden border hover:shadow-lg transition">
                                <div class="flex items-center justify-between bg-gray-50 px-4 py-2 border-b">
                                    <span class="text-sm text-gray-600">Order #12346</span>
                                    <span
                                        class="text-xs px-2 py-1 rounded-full bg-yellow-100 text-yellow-700">Processing</span>
                                </div>
                                <div class="flex items-center gap-4 p-4">
                                    <div class="w-20 h-20 rounded overflow-hidden border">
                                        <img src="/public/images/sample-product-2.jpg" alt="Product"
                                            class="w-full h-full object-cover" />
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Smart Watch</h3>
                                        <p class="text-sm text-gray-500">Quantity: 2</p>
                                        <p class="text-sm font-semibold text-gray-700">₹2,999</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between px-4 py-2 border-t bg-gray-50">
                                    <span class="text-xs text-gray-500">Ordered on: Sep 25, 2025</span>
                                    <button class="text-sm font-medium text-[#272c6c] hover:underline">Track Order</button>
                                </div>
                            </div> -->
                        </div>
                    <!-- </div> -->
                </div>


                <div class="showpart setting flex flex-col items-center justify-center w-full hidden">
                    <div
                        class="flex justify-between flex-col items-center mb-6 w-full bg-white  rounded-lg border border-gray-200">
                        <h1 class="text-2xl max-lg:text-lg font-bold py-4 w-full border-b border-gray-200  px-6">Profile
                            Setting</h1>
                        <div class="w-full flex items-center justify-start px-6 text-lg  gap-3 ">
                            <span class="py-4  px-7 max-lg:text-sm cursor-pointer hover:bg-gray-100 active_profile profile_tab edit_profile">
                                Profile
                            </span>
                        </div>

                    </div>

                    <form action="" method="POST" class="w-full" id="profileForm">
                        <div class="w-full mx-auto p-6 bg-white rounded-md shadow-md space-y-6">
                            <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                    <input type="text" value="<?= $userData['fname'] ?>" name="fname"
                                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required />

                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>

                                    <input type="text" value="<?= $userData['lname'] ?>" name="lname"
                                        class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required />
                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="text" value="<?= $userData['username'] ?>" name="email"
                                        class="w-full border border-gray-300 rounded-md px-4 py-2" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="text" placeholder="Phone Number"
                                        value="<?= $userData['mobile'] ?>" readonly
                                        class="w-full border bg-gray-100 border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required />
                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                                    <select type="text" value="<?= $userData['state'] ?>" name="state"
                                        class="w-full border border-gray-300  rounded-md px-4 py-2" required>
                                        <option value="">Select State</option>
                                        <?php foreach (getData2("SELECT * FROM `tbl_state`") as $key => $state) { ?>
                                        <option value="<?= $state['id']; ?>"
                                            <?= $state['id'] == $userData['state'] ? 'selected' : '' ?>>
                                            <?= $state['state_name']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                    <input type="text" name="city" value="<?= $userData['city'] ?>"
                                        class="w-full border border-gray-300  rounded-md px-4 py-2" id="">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Pincode</label>
                                    <input type="text" name="pincode" value="<?= $userData['pincode'] ?>"
                                        class="w-full border border-gray-300  rounded-md px-4 py-2" id="">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                                    <textarea name="address_line1"
                                        class="w-full border border-gray-300  rounded-md px-4 py-2" id="" cols="30"
                                        rows="2"><?= $userData['address_line1'] ?></textarea>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button
                                    class="bg-[#272c6c] border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  "
                                    name="update_profile">
                                    Update Profile
                                </button>
                            </div>
                        </div>

                    </form>

                    <form action="" method="POST" class="w-full hidden" id="passwordForm">
                        <div class="w-full mx-auto p-6 bg-white rounded-md shadow-md space-y-6">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                                <input type="password" value="" name="current_password"
                                    class="w-[50%] max-lg:w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required />
                            </div>
                            <div class="relative w-[50%] max-lg:w-full">
                                <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                                <input type="password" name="new_password" id="newpassword"
                                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                <i class="fa-regular fa-eye absolute right-2 top-[70%] transform -translate-y-1/2 cursor-pointer"
                                    id="togglePassword"></i>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Repeat Password</label>
                                <input type="password" name="repeat_password" id="repeatpassword"
                                    class="w-[50%] max-lg:w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                <p id="passwordError" class="text-red-500 text-sm mt-1 hidden">Passwords do not match.
                                </p>
                            </div>

                            <div class="mt-4">
                                <button id="submitBtn" disabled
                                    class="bg-[#272c6c] opacity-50 cursor-not-allowed border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white"
                                    name="update_password">
                                    Update Password
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </main>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

        <script>
        // async function getbillproduct(Order_Id) {
        //     console.log("Order ID is :" + Order_Id); // Debugging to check Order_Id
        //     try {
        //         const result = await axios.post('', new URLSearchParams({
        //             order_id: Order_Id, // Order ID is passed in the request body
        //         }));

        //         console.log(result); // Debugging to check the response data
        //         let tr = '';
        //         let count = 1;
        //         let t = 0;
        //         // Loop through the result data and create table rows dynamically
        //         result.data.products.forEach((ele, i) => {
        //             console.log(ele);
        //             total_amount = parseInt(ele["amount"]) * parseInt(ele["quantity"]);
        //             t = t + parseInt(total_amount)
        //             tr += ` <tr>
        //                 <td class="px-4 py-2 border">${count++}</td>
        //                 <td class="px-4 py-2 border">
        //                     <div class="h-40 w-[125px] overflow-hidden">
        //                         <img src="/${ele['image']}" class="w-full h-full object-cover" alt="">
        //                     </div>
        //                 </td>
        //                 <td class="px-4 py-2 border">${ele['title']}
        //                 </td>

        //                 <td class="px-4 py-2 border">${ele['quantity']}</td>
        //                 <td class="px-4 py-2 border">₹${extractGst(ele['amount']).base_price}</td>
        //                 <td class="px-4 py-2 border">₹${extractGst(total_amount).base_price}</td>

        //             </tr>`;


        //             if (ele.coupon_secret != '') {
        //                 document.getElementById("coupon_secret").innerHTML = '(' + ele.coupon_secret + ')';
        //                 document.getElementById("discount").innerHTML = '- ' + ele.coupon_discount;
        //                 document.getElementById("discountRow").hidden = false;
        //             } else {
        //                 document.getElementById("discountRow").hidden = true;
        //             }


        //             document.getElementById("delivery").innerHTML = '+ ' + ele.delivery_charges;


        //             document.getElementById("total").innerHTML = ele.total_amount;
        //             // let subtotal = ele.total_amount += ele.total_amount
        //         })

        //         document.getElementById("sub_total").innerHTML = extractGst(t)['base_price'];
        //         document.getElementById("gst_inc").innerHTML = extractGst(t)['gst_amount'];



        //         // Insert the generated rows into the table body
        //         document.getElementById("productTable").innerHTML = tr;
        //     } catch (error) {
        //         console.error("Error fetching product data:", error);
        //     }
        // }

        let AllshowItems = document.querySelectorAll('.showpart');
        let sideNavItems = document.querySelectorAll('.sidenav');

        function showPart(part, ele) {
            AllshowItems.forEach(item => {
                if (item.classList.contains(part)) {
                    item.classList.remove('hidden');

                } else {
                    item.classList.add('hidden');
                }

                sideNavItems.forEach(item => {
                    if (item == ele) {
                        item.classList.add('activeTab');
                    } else {
                        item.classList.remove('activeTab');
                    }
                })
            });
        }

        let profile_tabs = document.querySelectorAll('.profile_tab');
        profile_tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                profile_tabs.forEach(tab => {
                    tab.classList.remove('active_profile');
                });
                tab.classList.add('active_profile');
                if (tab.classList.contains('edit_profile')) {
                    console.log('edit_profile');
                    document.getElementById('profileForm').classList.remove('hidden');
                    document.getElementById('passwordForm').classList.add('hidden');
                } else {
                    console.log('change_password');
                    document.getElementById('profileForm').classList.add('hidden');
                    document.getElementById('passwordForm').classList.remove('hidden');
                }
            });
        });


        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('newpassword');
        // console.log(passwordInput);

        togglePassword.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });
        const newPassword = document.getElementById('newpassword');
        const repeatPassword = document.getElementById('repeatpassword');
        const passwordError = document.getElementById('passwordError');
        const submitBtn = document.getElementById('submitBtn');

        function validatePasswords() {
            const newVal = newPassword.value;
            const repeatVal = repeatPassword.value;

            if (newVal && repeatVal && newVal === repeatVal) {
                passwordError.classList.add('hidden');
                submitBtn.disabled = false;
                submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
            } else {
                passwordError.classList.remove('hidden');
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }
        }

        newPassword.addEventListener('input', validatePasswords);
        repeatPassword.addEventListener('input', validatePasswords);
        </script>

        <script>
        const openBtn = document.getElementById('openMobileSidebar');
        const closeBtn = document.getElementById('closeMobileSidebar');
        const mobileSidebar = document.getElementById('mobileSidebarBottom');

        openBtn.addEventListener('click', () => {
            mobileSidebar.classList.remove('translate-y-full');
        });

        closeBtn.addEventListener('click', () => {
            mobileSidebar.classList.add('translate-y-full');
        });

        // Close when clicking outside
        window.addEventListener('click', (e) => {
            if (!mobileSidebar.contains(e.target) && !openBtn.contains(e.target)) {
                mobileSidebar.classList.add('translate-y-full');
            }
        });

        // Close when any nav item is clicked inside the mobile sidebar
        const navLinks = mobileSidebar.querySelectorAll('nav > div, nav > a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileSidebar.classList.add('translate-y-full');
            });
        });

        <?php
            if (isset($_SESSION['new_order'])) {
                ?>

        function OpenOrderModal() {
            document.getElementById('OpenOrderHistory').click();
        }
        OpenOrderModal();

        <?php } ?>
        </script>
</body>

</html>