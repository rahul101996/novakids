<?php
// printWithPre($userData);
$page = "My Profile";
$allstates = getData("indian_states");

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
        background-color: #f3f4f6;
        color: black;

    }

    .activeTab:hover {
        background-color: #f3f4f6;
        color: black;
    }

    .sidenav {
        cursor: pointer;
    }

    .active_profile {
        font-weight: 600;
        border-bottom: 5px solid #f25b21 !important;

        color: #f25b21 !important;
        /* border-width: 5px; */
    }
</style>

<body class="">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <div
        class="bg-[url('/public/images/dashboard-bg-shape-1.jpg')] bg-cover bg-center bg-no-repeat w-full flex items-center justify-center flex-col bg-white">

        <div class="flex max-lg:flex-col w-[95%] max-lg:w-[90%] max-md:w-full h-auto my-14 max-md:mb-6 max-md:mt-0 items-start justify-start gap-4">
            <aside id="userSidebar"
                class="w-[23%] max-lg:w-full md:sticky top-24 bg-white md:border md:border-gray-300">
                <h2 class="text-sm max-md:text-xl max-md:font-semibold px-5 pt-5 mb-4 uppercase tracking-wide">Welcome</h2>
                <nav class="space-y-3 text-gray-700 font-medium pb-5">

                    <div onclick="showPart('overview',this)"
                        class="flex items-center justify-between gap-3 px-5 py-2 hover:bg-gray-100 activeTab sidenav ">
                        <div class="flex items-center justify-center gap-3">

                            <div class="text-2xl py-1">
                                <img src="/public/icons/home-icon.png" class="h-6" alt="">
                            </div>
                            <span class="uppercase text-sm">Overview</span>
                        </div>
                        <img src="/public/icons/forward-black.png" class="h-4" alt="">

                    </div>
                    <div onclick="showPart('myprofile',this)"
                        class="flex items-center justify-between gap-3 px-5 py-2 hover:bg-gray-100  sidenav ">
                        <div class="flex items-center justify-center gap-3">

                            <div class="text-2xl py-1"><svg class="svgUser2 anarkali-svg-icon" enable-background="new 0 0 512 512" height="24px" viewBox="0 0 512 512" width="24px" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <g>
                                            <path d="m256 253.7c-62 0-112.4-50.4-112.4-112.4s50.4-112.4 112.4-112.4 112.4 50.4 112.4 112.4-50.4 112.4-112.4 112.4zm0-195.8c-46 0-83.4 37.4-83.4 83.4s37.4 83.4 83.4 83.4 83.4-37.4 83.4-83.4-37.4-83.4-83.4-83.4z">
                                            </path>
                                        </g>
                                        <g>
                                            <path d="m452.1 483.2h-392.2c-8 0-14.5-6.5-14.5-14.5 0-106.9 94.5-193.9 210.6-193.9s210.6 87 210.6 193.9c0 8-6.5 14.5-14.5 14.5zm-377-29.1h361.7c-8.1-84.1-86.1-150.3-180.8-150.3s-172.7 66.2-180.9 150.3z">
                                            </path>
                                        </g>
                                    </g>
                                </svg></path>
                                </svg></div>
                            <span class="uppercase text-sm">My Profile</span>
                        </div>
                        <img src="/public/icons/forward-black.png" class="h-4" alt="">

                    </div>
                    <!-- <div class="h-[1px] bg-gray-200"></div> -->
                    <div class="flex items-center justify-between gap-3 px-5 py-3 hover:bg-gray-100  sidenav" id="ShowOrders"
                        onclick="showPart('myorders',this)">

                        <div class="flex items-center justify-center gap-3">

                            <div class="text-2xl"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 32 32">
                                    <path d="M0 0 C0.66209473 -0.00095673 1.32418945 -0.00191345 2.00634766 -0.00289917 C3.40852961 -0.00358076 4.8107147 -0.00172792 6.21289062 0.00244141 C8.36595713 0.00779004 10.51881502 0.0024958 12.671875 -0.00390625 C14.03125046 -0.00324546 15.3906258 -0.00196429 16.75 0 C18.61785156 0.00169189 18.61785156 0.00169189 20.5234375 0.00341797 C23.375 0.1328125 23.375 0.1328125 24.375 1.1328125 C24.47512401 3.33931906 24.5058118 5.54903636 24.5078125 7.7578125 C24.50876923 8.41990723 24.50972595 9.08200195 24.51071167 9.76416016 C24.51139326 11.16634211 24.50954042 12.5685272 24.50537109 13.97070312 C24.50002246 16.12376963 24.5053167 18.27662752 24.51171875 20.4296875 C24.51105796 21.78906296 24.50977679 23.1484383 24.5078125 24.5078125 C24.50668457 25.75304687 24.50555664 26.99828125 24.50439453 28.28125 C24.375 31.1328125 24.375 31.1328125 23.375 32.1328125 C21.16849344 32.23293651 18.95877614 32.2636243 16.75 32.265625 C16.08790527 32.26658173 15.42581055 32.26753845 14.74365234 32.26852417 C13.34147039 32.26920576 11.9392853 32.26735292 10.53710938 32.26318359 C8.38404287 32.25783496 6.23118498 32.2631292 4.078125 32.26953125 C2.71874954 32.26887046 1.3593742 32.26758929 0 32.265625 C-1.24523437 32.26449707 -2.49046875 32.26336914 -3.7734375 32.26220703 C-6.625 32.1328125 -6.625 32.1328125 -7.625 31.1328125 C-7.72512401 28.92630594 -7.7558118 26.71658864 -7.7578125 24.5078125 C-7.75876923 23.84571777 -7.75972595 23.18362305 -7.76071167 22.50146484 C-7.76139326 21.09928289 -7.75954042 19.6970978 -7.75537109 18.29492188 C-7.75002246 16.14185537 -7.7553167 13.98899748 -7.76171875 11.8359375 C-7.76105796 10.47656204 -7.75977679 9.1171867 -7.7578125 7.7578125 C-7.75668457 6.51257813 -7.75555664 5.26734375 -7.75439453 3.984375 C-7.51426781 -1.30747426 -4.67358012 0.00423332 0 0 Z M-5.625 3.1328125 C-5.71258003 5.13246232 -5.73196576 7.1351736 -5.72265625 9.13671875 C-5.72015869 10.23056885 -5.71766113 11.32441895 -5.71508789 12.45141602 C-5.70598389 13.85190186 -5.69687988 15.2523877 -5.6875 16.6953125 C-5.666875 21.1296875 -5.64625 25.5640625 -5.625 30.1328125 C3.615 30.1328125 12.855 30.1328125 22.375 30.1328125 C22.375 20.8928125 22.375 11.6528125 22.375 2.1328125 C19.405 2.1328125 16.435 2.1328125 13.375 2.1328125 C13.375 5.7628125 13.375 9.3928125 13.375 13.1328125 C11.725 12.4728125 10.075 11.8128125 8.375 11.1328125 C6.395 12.1228125 6.395 12.1228125 4.375 13.1328125 C4.375 9.5028125 4.375 5.8728125 4.375 2.1328125 C-0.91426333 1.55536095 -0.91426333 1.55536095 -5.625 3.1328125 Z M6.375 2.1328125 C6.375 4.4428125 6.375 6.7528125 6.375 9.1328125 C7.695 9.1328125 9.015 9.1328125 10.375 9.1328125 C10.375 6.8228125 10.375 4.5128125 10.375 2.1328125 C9.055 2.1328125 7.735 2.1328125 6.375 2.1328125 Z " fill="#4C5D77" transform="translate(7.625,-0.1328125)"></path>
                                    <path d="M0 0 C0.66 0 1.32 0 2 0 C2.02465622 4.25414623 2.04283899 8.50825498 2.05493164 12.76245117 C2.05997101 14.21070073 2.06680253 15.65894517 2.07543945 17.10717773 C2.08752247 19.18474588 2.09323211 21.26224697 2.09765625 23.33984375 C2.10551147 25.21724243 2.10551147 25.21724243 2.11352539 27.13256836 C2 30 2 30 1 31 C-1.21855264 31.08783542 -3.43988496 31.10694609 -5.66015625 31.09765625 C-6.65685585 31.09553383 -6.65685585 31.09553383 -7.6736908 31.09336853 C-9.80333899 31.08775518 -11.93288339 31.07520054 -14.0625 31.0625 C-15.50325369 31.05748671 -16.94400903 31.05292351 -18.38476562 31.04882812 C-21.92321102 31.03778145 -25.46159539 31.02050792 -29 31 C-29 30.34 -29 29.68 -29 29 C-19.43 29 -9.86 29 0 29 C0 19.43 0 9.86 0 0 Z " fill="#465672" transform="translate(30,1)"></path>
                                    <path d="M0 0 C0.33 0 0.66 0 1 0 C1.33 2.31 1.66 4.62 2 7 C2.99 6.67 3.98 6.34 5 6 C5.33 4.02 5.66 2.04 6 0 C6.33 0 6.66 0 7 0 C7 3.3 7 6.6 7 10 C4.69 10.33 2.38 10.66 0 11 C0 7.37 0 3.74 0 0 Z " fill="#8691A4" transform="translate(12,2)"></path>
                                    <path d="M0 0 C0.99 0 1.98 0 3 0 C3 1.65 3 3.3 3 5 C2.01 5 1.02 5 0 5 C0 3.35 0 1.7 0 0 Z " fill="#96A0B0" transform="translate(19,23)"></path>
                                    <path d="M0 0 C0.66 0 1.32 0 2 0 C2 1.65 2 3.3 2 5 C1.34 5 0.68 5 0 5 C0 3.35 0 1.7 0 0 Z " fill="#6E7B91" transform="translate(26,23)"></path>
                                    <path d="M0 0 C0.66 0 1.32 0 2 0 C2 1.65 2 3.3 2 5 C1.34 5 0.68 5 0 5 C0 3.35 0 1.7 0 0 Z " fill="#6A798E" transform="translate(23,23)"></path>
                                </svg></div>
                            <span class="uppercase text-sm">My Orders</span>
                        </div>
                        <img src="/public/icons/forward-black.png" class="h-4" alt="">

                    </div>
                    <!-- <div class="h-[1px] bg-gray-200"></div> -->
                    <div onclick="showPart('Wishlist',this)"
                        class="flex items-center justify-between gap-3 px-5 py-2 hover:bg-gray-100  sidenav " id="ShowWishlist">
                        <div class="flex items-center justify-center gap-3">

                            <div class="text-2xl py-1"><svg class="svgLove anarkali-svg-icon" width="24px" height="24px" fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m29.55 6.509c-1.73-2.302-3.759-3.483-6.031-3.509h-.076c-3.29 0-6.124 2.469-7.443 3.84-1.32-1.371-4.153-3.84-7.444-3.84h-.075c-2.273.026-4.3 1.207-6.059 3.549a8.265 8.265 0 0 0 1.057 10.522l11.821 11.641a1 1 0 0 0 1.4 0l11.82-11.641a8.278 8.278 0 0 0 1.03-10.562zm-2.432 9.137-11.118 10.954-11.118-10.954a6.254 6.254 0 0 1 -.832-7.936c1.335-1.777 2.831-2.689 4.45-2.71h.058c3.48 0 6.627 3.924 6.658 3.964a1.037 1.037 0 0 0 1.57 0c.032-.04 3.2-4.052 6.716-3.964a5.723 5.723 0 0 1 4.421 2.67 6.265 6.265 0 0 1 -.805 7.976z">
                                    </path>
                                </svg></div>
                            <span class="uppercase text-sm">Wishlist</span>
                        </div>
                        <img src="/public/icons/forward-black.png" class="h-4" alt="">

                    </div>
                    <div onclick="showPart('Rate&Review',this)"
                        class="flex items-center justify-between gap-3 px-5 py-2 hover:bg-gray-100  sidenav " id="ShowRate">
                        <div class="flex items-center justify-center gap-3">

                            <div class="text-2xl py-1">
                                <img src="/public/icons/star.png" class="h-[24px]" alt="">
                            </div>
                            <span class="uppercase text-sm">Rate & Review</span>
                        </div>
                        <img src="/public/icons/forward-black.png" class="h-4" alt="">

                    </div>
                    <div onclick="showPart('setting',this)" id="ShowSetting"
                        class="flex items-center justify-between gap-3 px-5 py-2 hover:bg-gray-100  sidenav">
                        <div class="flex items-center justify-center gap-3">
                            <div class="text-2xl"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 50 50">
                                    <path d="M 22.205078 2 A 1.0001 1.0001 0 0 0 21.21875 2.8378906 L 20.246094 8.7929688 C 19.076509 9.1331971 17.961243 9.5922728 16.910156 10.164062 L 11.996094 6.6542969 A 1.0001 1.0001 0 0 0 10.708984 6.7597656 L 6.8183594 10.646484 A 1.0001 1.0001 0 0 0 6.7070312 11.927734 L 10.164062 16.873047 C 9.583454 17.930271 9.1142098 19.051824 8.765625 20.232422 L 2.8359375 21.21875 A 1.0001 1.0001 0 0 0 2.0019531 22.205078 L 2.0019531 27.705078 A 1.0001 1.0001 0 0 0 2.8261719 28.691406 L 8.7597656 29.742188 C 9.1064607 30.920739 9.5727226 32.043065 10.154297 33.101562 L 6.6542969 37.998047 A 1.0001 1.0001 0 0 0 6.7597656 39.285156 L 10.648438 43.175781 A 1.0001 1.0001 0 0 0 11.927734 43.289062 L 16.882812 39.820312 C 17.936999 40.39548 19.054994 40.857928 20.228516 41.201172 L 21.21875 47.164062 A 1.0001 1.0001 0 0 0 22.205078 48 L 27.705078 48 A 1.0001 1.0001 0 0 0 28.691406 47.173828 L 29.751953 41.1875 C 30.920633 40.838997 32.033372 40.369697 33.082031 39.791016 L 38.070312 43.291016 A 1.0001 1.0001 0 0 0 39.351562 43.179688 L 43.240234 39.287109 A 1.0001 1.0001 0 0 0 43.34375 37.996094 L 39.787109 33.058594 C 40.355783 32.014958 40.813915 30.908875 41.154297 29.748047 L 47.171875 28.693359 A 1.0001 1.0001 0 0 0 47.998047 27.707031 L 47.998047 22.207031 A 1.0001 1.0001 0 0 0 47.160156 21.220703 L 41.152344 20.238281 C 40.80968 19.078827 40.350281 17.974723 39.78125 16.931641 L 43.289062 11.933594 A 1.0001 1.0001 0 0 0 43.177734 10.652344 L 39.287109 6.7636719 A 1.0001 1.0001 0 0 0 37.996094 6.6601562 L 33.072266 10.201172 C 32.023186 9.6248101 30.909713 9.1579916 29.738281 8.8125 L 28.691406 2.828125 A 1.0001 1.0001 0 0 0 27.705078 2 L 22.205078 2 z M 23.056641 4 L 26.865234 4 L 27.861328 9.6855469 A 1.0001 1.0001 0 0 0 28.603516 10.484375 C 30.066026 10.848832 31.439607 11.426549 32.693359 12.185547 A 1.0001 1.0001 0 0 0 33.794922 12.142578 L 38.474609 8.7792969 L 41.167969 11.472656 L 37.835938 16.220703 A 1.0001 1.0001 0 0 0 37.796875 17.310547 C 38.548366 18.561471 39.118333 19.926379 39.482422 21.380859 A 1.0001 1.0001 0 0 0 40.291016 22.125 L 45.998047 23.058594 L 45.998047 26.867188 L 40.279297 27.871094 A 1.0001 1.0001 0 0 0 39.482422 28.617188 C 39.122545 30.069817 38.552234 31.434687 37.800781 32.685547 A 1.0001 1.0001 0 0 0 37.845703 33.785156 L 41.224609 38.474609 L 38.53125 41.169922 L 33.791016 37.84375 A 1.0001 1.0001 0 0 0 32.697266 37.808594 C 31.44975 38.567585 30.074755 39.148028 28.617188 39.517578 A 1.0001 1.0001 0 0 0 27.876953 40.3125 L 26.867188 46 L 23.052734 46 L 22.111328 40.337891 A 1.0001 1.0001 0 0 0 21.365234 39.53125 C 19.90185 39.170557 18.522094 38.59371 17.259766 37.835938 A 1.0001 1.0001 0 0 0 16.171875 37.875 L 11.46875 41.169922 L 8.7734375 38.470703 L 12.097656 33.824219 A 1.0001 1.0001 0 0 0 12.138672 32.724609 C 11.372652 31.458855 10.793319 30.079213 10.427734 28.609375 A 1.0001 1.0001 0 0 0 9.6328125 27.867188 L 4.0019531 26.867188 L 4.0019531 23.052734 L 9.6289062 22.117188 A 1.0001 1.0001 0 0 0 10.435547 21.373047 C 10.804273 19.898143 11.383325 18.518729 12.146484 17.255859 A 1.0001 1.0001 0 0 0 12.111328 16.164062 L 8.8261719 11.46875 L 11.523438 8.7734375 L 16.185547 12.105469 A 1.0001 1.0001 0 0 0 17.28125 12.148438 C 18.536908 11.394293 19.919867 10.822081 21.384766 10.462891 A 1.0001 1.0001 0 0 0 22.132812 9.6523438 L 23.056641 4 z M 25 17 C 20.593567 17 17 20.593567 17 25 C 17 29.406433 20.593567 33 25 33 C 29.406433 33 33 29.406433 33 25 C 33 20.593567 29.406433 17 25 17 z M 25 19 C 28.325553 19 31 21.674447 31 25 C 31 28.325553 28.325553 31 25 31 C 21.674447 31 19 28.325553 19 25 C 19 21.674447 21.674447 19 25 19 z"></path>
                                </svg></div>
                            <span class="uppercase text-sm">Settings</span>
                        </div>
                        <img src="/public/icons/forward-black.png" class="h-4" alt="">
                    </div>
                    <!-- <div class="h-[1px] bg-gray-200"></div> -->

                    <div onclick="showPart('Addresses',this)"
                        class="flex items-center justify-between gap-3 px-5 py-3 hover:bg-gray-100 sidenav" id="ShowAddress">
                        <div class="flex items-center justify-center gap-3">

                            <div class="text-2xl">
                                <img src="/public/icons/address.png" class="h-[24px] " alt="">
                            </div>
                            <span class="uppercase text-sm">Addresses</span>
                        </div>
                        <img src="/public/icons/forward-black.png" class="h-4" alt="">

                    </div>
                    <!-- <div class="h-[1px] bg-gray-200"></div> -->

                    <a href="/logout" class="flex items-center gap-3 px-5 py-2 hover:bg-gray-100 rounded-lg">
                        <div class="text-2xl">
                            <img src="/public/icons/exit.png" class="h-[24px] " alt="">
                        </div>
                        <span class="uppercase text-sm">Logout</span>
                    </a>

                </nav>
            </aside>

            <!-- Main Content -->
            <main class="w-[77%] max-lg:w-full md:px-10 max-lg:mt-6 max-md:mt-0 md:py-6 bg-white md:border md:border-gray-300">

                <div class="showpart myprofile flex flex-col items-center juastify-center w-full hidden">
                    <div class="flex justify-start items-left mb-6 w-full md:hidden border-b border-gray-300 shadow px-4 py-5">
                        <!-- Back button (only visible on mobile) -->
                        <button onclick="goBackToSidebar()" class="max-lg:flex hidden flex items-center gap-1 text-sm">
                            <i class="fas fa-chevron-left"></i> Back
                        </button>
                    </div>

                    <div class="flex justify-center items-center mb-6 w-full ">
                        <h1 class="text-2xl uppercase font-semibold">My Profile</h1>

                    </div>
                    <div class="w-[80%] mx-auto max-lg:overflow-x-auto bg-white overflow-hidden border border-gray-300">
                        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700 ">
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3 w-1/3">
                                        Registration Date</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 font-semibold text-gray-900"><?= formatDate($userData['created_at']) ?></td>
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
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3">Address</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 ">
                                        <div class="flex items-start justify-start flex-col">
                                            <p><?= $ActiveuserAddress['address_line1'] ?> <?= $ActiveuserAddress['address_line2'] ?></p>
                                            <p><?= $ActiveuserAddress['city'] ?> -- <?= $ActiveuserAddress['pincode'] ?></p>
                                            <p class="mt-2"><?= $ActiveuserAddress['state_name'] ?></p>

                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="w-full flex flex-col items-center justify-center overview showpart">
                    <div class="flex justify-start items-left w-full md:hidden border-b border-gray-300 shadow px-4 py-5">
                        <!-- Back button (only visible on mobile) -->
                        <button onclick="goBackToSidebar()" class="max-lg:flex hidden flex items-center gap-1 text-sm">
                            <i class="fas fa-chevron-left"></i> Back
                        </button>
                    </div>
                    <div class="w-full flex items-start justify-start flex-col relative h-[40vh]">
                        <img src="/public/images/myprofile-bg.webp" class="w-full h-full object-cover" alt="">
                        <div class="w-full h-full flex flex-col items-start justify-start absolute top-0 left-0 text-white z-10 p-3">
                            <div class="w-full flex items-end justify-between">
                                <span>Welcome, <span class="font-semibold text-lg"><?= $userData['fname'] ?></span></span>
                                <img src="/public/logos/logo-white.png" class="h-12" alt="">
                            </div>
                            <span class="text-xs">Account created on <?= formatDate($userData['created_at']) ?></span>
                            <p class="text-sm mt-4 flex items-center gap-2"><svg class="svgLove anarkali-svg-icon" width="18px" height="18px" fill="white" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m29.55 6.509c-1.73-2.302-3.759-3.483-6.031-3.509h-.076c-3.29 0-6.124 2.469-7.443 3.84-1.32-1.371-4.153-3.84-7.444-3.84h-.075c-2.273.026-4.3 1.207-6.059 3.549a8.265 8.265 0 0 0 1.057 10.522l11.821 11.641a1 1 0 0 0 1.4 0l11.82-11.641a8.278 8.278 0 0 0 1.03-10.562zm-2.432 9.137-11.118 10.954-11.118-10.954a6.254 6.254 0 0 1 -.832-7.936c1.335-1.777 2.831-2.689 4.45-2.71h.058c3.48 0 6.627 3.924 6.658 3.964a1.037 1.037 0 0 0 1.57 0c.032-.04 3.2-4.052 6.716-3.964a5.723 5.723 0 0 1 4.421 2.67 6.265 6.265 0 0 1 -.805 7.976z">
                                    </path>
                                </svg><?= $TotalWishlist ?> items in your wishlist. <span class="underline italic cursor-pointer" onclick="showPart('Wishlist',document.getElementById('ShowWishlist'))">Click Here</span> to view</p>
                            <p class="text-sm mt-1 flex items-center gap-2"><svg class="shopBag anarkali-svg-icon" width="18px" height="18px" fill="white" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m26 8.9a1 1 0 0 0 -1-.9h-3a6 6 0 0 0 -12 0h-3a1 1 0 0 0 -1 .9l-1.78 17.8a3 3 0 0 0 .78 2.3 3 3 0 0 0 2.22 1h17.57a3 3 0 0 0 2.21-1 3 3 0 0 0 .77-2.31zm-10-4.9a4 4 0 0 1 4 4h-8a4 4 0 0 1 4-4zm9.53 23.67a1 1 0 0 1 -.74.33h-17.58a1 1 0 0 1 -.74-.33 1 1 0 0 1 -.26-.77l1.7-16.9h2.09v3a1 1 0 0 0 2 0v-3h8v3a1 1 0 0 0 2 0v-3h2.09l1.7 16.9a1 1 0 0 1 -.26.77z">
                                    </path>
                                </svg><?= $TotalOrders ?> orders. <span class="underline italic cursor-pointer" onclick="showPart('myorders',document.getElementById('ShowOrders'))">Click Here</span> to view</p>
                            <div class="w-full">
                                <h2 class="uppercase  mt-4">Default Address</h2>
                                <p class="text-sm"><?= $ActiveuserAddress['address_line1'] ?> <?= $ActiveuserAddress['address_line2'] ?></p>
                                <p class="text-sm"><?= $ActiveuserAddress['city'] ?> -- <?= $ActiveuserAddress['pincode'] ?></p>
                                <p class="text-sm"><?= $ActiveuserAddress['state_name'] ?></p>
                            </div>

                        </div>
                    </div>

                    <div class="w-full max-md:w-[90%] mx-auto grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-md:gap-4 mt-6">
                        <!-- Orders -->
                        <div class="flex flex-col items-center justify-center border border-gray-200 rounded-lg p-8 max-md:p-4 hover:shadow-md transition" onclick="showPart('myorders',document.getElementById('ShowOrders'))">
                            <i class="fas fa-box-open text-3xl max-md:text-2xl mb-3 max-md:mb-2"></i>
                            <h3 class="font-semibold text-lg max-md:text-base text-gray-800">Orders</h3>
                            <p class="text-gray-500 text-sm mt-1 text-center">Track and manage your purchases</p>
                        </div>

                        <!-- Wishlist -->
                        <div class="flex flex-col items-center justify-center border border-gray-200 rounded-lg p-8 max-md:p-4 hover:shadow-md transition" onclick="showPart('Wishlist',document.getElementById('ShowWishlist'))">
                            <i class="fas fa-heart text-3xl max-md:text-2xl mb-3 max-md:mb-2"></i>
                            <h3 class="font-semibold text-lg max-md:text-base text-gray-800">Wishlist</h3>
                            <p class="text-gray-500 text-sm mt-1 text-center">Save items for later and quick access</p>
                        </div>

                        <!-- Refunds -->
                        <div onclick="showPart('Rate&Review',document.getElementById('ShowAddress'))" class="flex flex-col items-center justify-center border border-gray-200 rounded-lg p-8 max-md:p-4 hover:shadow-md transition">
                            <i class="fas fa-rupee-sign text-3xl max-md:text-2xl mb-3 max-md:mb-2 rotate-180"></i>
                            <h3 class="font-semibold text-lg max-md:text-base text-gray-800">Refunds</h3>
                            <p class="text-gray-500 text-sm mt-1 text-center">Check refund status and history</p>
                        </div>

                        <!-- Gift Cards -->


                        <!-- Rate & Review -->
                        <div onclick="showPart('Rate&Review',document.getElementById('ShowRate'))" class="flex flex-col items-center justify-center border border-gray-200 rounded-lg p-8 max-md:p-4 hover:shadow-md transition">
                            <i class="fas fa-star text-3xl max-md:text-2xl mb-3 max-md:mb-2"></i>
                            <h3 class="font-semibold text-lg max-md:text-base text-gray-800">Rate & Review</h3>
                            <p class="text-gray-500 text-sm mt-1 text-center">Share your feedback and experiences</p>
                        </div>

                        <!-- Stores -->
                        <div onclick="showPart('Addresses',document.getElementById('ShowAddress'))" class="flex flex-col items-center justify-center border border-gray-200 rounded-lg p-8 max-md:p-4 hover:shadow-md transition">
                            <i class="fas fa-map-marker-alt text-3xl max-md:text-2xl mb-3 max-md:mb-2"></i>
                            <h3 class="font-semibold text-lg max-md:text-base text-gray-800">Addresses</h3>
                            <p class="text-gray-500 text-sm mt-1 text-center">Find nearest stores and directions</p>
                        </div>
                        <div onclick="showPart('setting',document.getElementById('ShowSetting'))" class="flex flex-col items-center justify-center border border-gray-200 rounded-lg p-8 max-md:p-4 hover:shadow-md transition">
                            <i class="fas fa-cog text-3xl max-md:text-2xl mb-3 max-md:mb-2"></i>
                            <h3 class="font-semibold text-lg max-md:text-base text-gray-800">Settings</h3>
                            <p class="text-gray-500 text-sm mt-1 text-center">Find nearest stores and directions</p>
                        </div>
                    </div>

                </div>
                <div class="w-full flex flex-col items-center justify-center Rate&Review showpart hidden">
                    <div class="flex justify-start items-left mb-6 w-full md:hidden border-b border-gray-300 shadow px-4 py-5">
                        <!-- Back button (only visible on mobile) -->
                        <button onclick="goBackToSidebar()" class="max-lg:flex hidden flex items-center gap-1 text-sm">
                            <i class="fas fa-chevron-left"></i> Back
                        </button>
                    </div>
                    <h2 class="text-2xl font-semibold uppercase">Rate & Review</h2>
                    <?php
                    foreach (getData2("SELECT tbl_product_review.*, tbl_products.name as product_name  FROM `tbl_product_review` LEFT JOIN tbl_products ON tbl_product_review.product_id = tbl_products.id where tbl_product_review.userid= $_SESSION[userid]") as $review) {
                        $name = str_replace(' ', '-', $review['product_name']);
                        $name = str_replace("'", '', $name);
                    ?>
                        <div class="border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition mt-2 w-full">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium">
                                        R
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-800"><?= $_SESSION['fname'] ?> <?= $_SESSION['lname'] ?></h4>
                                        <p class="text-sm text-gray-500">Reviewed on <?= formatDate($review['created_at']) ?></p>
                                    </div>
                                </div>
                                <!-- Rating Stars -->
                                <div class="flex items-center text-yellow-500">
                                    <?php
                                    $averageRating = round($review['rating'], 1);
                                    for ($i = 0; $i < floor($averageRating); $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>

                            <p class="mt-4 text-gray-700 leading-relaxed">
                                <?= $review['reviewText'] ?>
                            </p>

                            <div class="mt-4 flex items-center gap-4 text-sm text-gray-500">
                                <a href="/products/product-details/<?= $name ?>" class="flex items-center hover:text-custom-pink transition bg-black text-white py-2 px-4 rounded-md">
                                    View Product
                                </a>

                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="w-full flex flex-col items-center justify-center Wishlist showpart hidden">
                    <div class="flex justify-start items-left mb-6 w-full md:hidden border-b border-gray-300 shadow px-4 py-5">
                        <!-- Back button (only visible on mobile) -->
                        <button onclick="goBackToSidebar()" class="max-lg:flex hidden flex items-center gap-1 text-sm">
                            <i class="fas fa-chevron-left"></i> Back
                        </button>
                    </div>
                    <?php

                    if (empty($wishlists)) {
                    ?>
                        <div class="text-center py-12  w-[50%] max-md:w-[85%] mx-auto">
                            <!-- Heart Icon with Badge -->
                            <div class="relative inline-block mb-6">
                                <i class="fa-regular fa-heart text-6xl text-gray-400"></i>
                                <span
                                    class="absolute -top-2 -right-3 bg-black text-white text-xs font-semibold rounded-full h-6 w-6 flex items-center justify-center">0</span>
                            </div>

                            <!-- Message -->
                            <p class="text-lg font-medium mb-2">Your Wishlist Is Currently Empty</p>
                            <p class="text-gray-500 text-sm mb-8">Click the <i class="fa-regular fa-heart"></i> icons to add products
                            </p>

                            <button onclick="window.location.href='/'"
                                class="flex-1 relative rounded-md overflow-hidden group transform shadow-md hover:shadow-xl border-2 border-black bg-transparent text-black">
                                <span
                                    class="relative z-10 flex py-2 px-6 items-center justify-center gap-2 font-bold text-base transition-colors duration-700 group-hover:text-white">
                                    Return to Shop
                                </span>
                                <span
                                    class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0">
                                </span>
                            </button>
                        </div>
                    <?php } else { ?>
                        <div class="text-center mb-10 max-md:mt-6">
                            <h1 class="text-2xl font-bold text-gray-900">Wishlist</h1>
                            <p class="text-gray-600 mt-1">
                                Manage your wishlist and keep track of the products you love.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-5 max-md:gap-3">
                            <?php
                            $wishlists = getData2("SELECT * FROM `tbl_wishlist` WHERE `userid` = " . $_SESSION["userid"]);

                            foreach ($wishlists as $key => $wishlist) {
                                $product = getData2("SELECT * FROM `tbl_products` WHERE `id` = " . $wishlist['product'])[0];
                                $images = json_decode($product['product_images'], true);
                                $images = array_reverse($images);
                                $SecondImage = true;
                                (isset($images[1])) ? $SecondImage = $images[1] : $SecondImage = $images[0];
                                $comparePrice = floatval($product['compare_price']);
                                $price = floatval($product['price']);
                                $discountAmount = $comparePrice - $price;
                                $discountPercentage = $comparePrice > 0 ? round(($discountAmount / $comparePrice) * 100) : 0;

                                $name = str_replace(' ', '-', $product['name']);
                                $name = str_replace("'", '', $name);


                                // printWithPre($images);
                            ?>
                                <a href="/products/product-details/<?= $name ?>" class="block">
                                    <div
                                        class="group relative  cursor-pointer transition overflow-hidden">
                                        <!-- Discount Badge -->
                                        <span class="absolute top-2 left-2 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                            SAVE <?= $discountPercentage ?>%
                                        </span>

                                        <!-- Product Images -->
                                        <div class="relative w-full h-[450px] max-md:h-[250px] overflow-hidden group">
                                            <!-- Default Image -->
                                            <img src="/<?= $images[0] ?>" alt="Product 1"
                                                class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                            <!-- Hover Image -->

                                            <img src="/<?= $SecondImage ?>" alt="Product 1 Hover"
                                                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                            <!-- Add to favorites Icon (top-right) -->
                                            <button
                                                class="addToWishlistBtn absolute top-2 right-3 bg-[#f25b21] text-white h-10 w-10 rounded-full  group-hover:opacity-100 z-20 stop-link">
                                                <i class="fas fa-heart"></i>
                                            </button>

                                            <!-- Add to Cart Icon -->
                                            <button
                                                class="openCartBtn absolute py-1.5 bottom-0 right-0 bg-black/70 text-white w-full opacity-0 translate-y-5 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100 hover:bg-[#f25b21] z-20 stop-link">
                                                <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                                            </button>
                                            <input type="text" value="<?= $product['id'] ?>" class="ProductId">
                                        </div>

                                        <!-- Product Details -->
                                        <div class="pt-4 w-full ">
                                            <h3 class="text-base font-semibold uppercase"><?= $product['name'] ?></h3>
                                            <div class="flex items-center justify-start gap-3 w-full">
                                                <p class="text-gray-500 line-through text-sm">₹
                                                    <?= formatNumber($product['compare_price']) ?>.00
                                                </p>
                                                <p class="text-[#f25b21] font-bold">₹ <?= formatNumber($product['price']) ?>.00</p>
                                            </div>
                                            <!-- reviews -->
                                            <div class="flex items-center justify-start space-x-1 hidden">
                                                <span class="text-yellow-500">★★★★★</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            <?php } ?>


                        </div>

                    <?php }
                    ?>


                </div>
                <div class="showpart Addresses flex flex-col items-center justify-center w-full hidden">
                    <div class="flex justify-start items-left mb-6 w-full md:hidden border-b border-gray-300 shadow px-4 py-5">
                        <!-- Back button (only visible on mobile) -->
                        <button onclick="goBackToSidebar()" class="max-lg:flex hidden flex items-center gap-1 text-sm">
                            <i class="fas fa-chevron-left"></i> Back
                        </button>
                    </div>
                    <div class="w-[80%] flex max-md:flex-col max-md:gap-3 items-center justify-between">
                        <h2 class="text-2xl max-md:text-xl uppercase font-semibold">Saved Addresses</h2>
                        <button class="bg-[#f25b21] max-md:text-sm text-white py-2 px-4" onclick="openModal1()">Add New Address</button>
                    </div>
                    <div class="w-[80%] grid grid-cols-2 gap-2 items-center justify-center">
                        <?php
                        foreach ($userAddress as $address) {



                        ?>
                            <div class="w-full flex flex-col border border-gray-300 mt-6 ">
                                <div class="w-full flex items-start justify-between p-4">
                                    <div class="flex items-start justify-start flex-col text-gray-500">
                                        <p><?= $address['address_line1'] ?> <?= $address['address_line2'] ?></p>
                                        <p><?= $address['city'] ?> -- <?= $address['pincode'] ?></p>
                                        <p class="mt-2"><?= $address['state_name'] ?></p>

                                    </div>
                                    <?php
                                    if ($address['status'] == 1) {


                                    ?>
                                        <div class="flex items-center justify-center">
                                            <span class="text-sm text-white bg-black px-2">Default</span>
                                        </div>
                                    <?php } ?>

                                </div>
                                <div class="w-full py-2 flex items-center justify-center border-t border-gray-300 px-4">
                                    <div class="w-full flex items-center justify-center border-r border-gray-300 cursor-pointer" onclick="EditAddress(<?= $address['id'] ?>)">
                                        <span class="text-sm text-blue-500"><i class="fa-regular fa-pen-to-square"></i></span>
                                    </div>
                                    <div class="w-full flex items-center justify-center cursor-pointer" onclick="removeAddress(<?= $address['id'] ?>)">
                                        <span class="text-sm text-red-500"><i class="fa-regular fa-trash-can"></i></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                </div>
                <script>
                    async function removeAddress(id) {
                        const request = await axios.post("/delete-address", new URLSearchParams({
                            delete_id: id
                        }));
                        console.log(request);
                        if (request.data.success) {
                            location.reload();
                        } else {
                            alert("Deletion Failed");
                        }
                    }
                    async function EditAddress(id) {
                        const request = await axios.post("/edit-address", new URLSearchParams({
                            address_id: id
                        }))
                        console.log(request);
                        // console.log(request.data.address.address_line1);
                        if (request.data.success) {
                            // location.reload();
                            addressInput1.value = request.data.address.address_line1;
                            addressInput2.value = request.data.address.address_line2;
                            cityInput.value = request.data.address.city;
                            // document.getElementById("state").value = state;
                            stateInput.value = request.data.address.state;
                            pincodeInput.value = request.data.address.pincode;
                            buttonValue.value = request.data.address.id;
                            if (request.data.address.status == 1) {
                                defaultAddress.checked = true;
                            } else {
                                defaultAddress.checked = false;
                            }
                            openModal1(id);
                        }
                    }
                </script>
                <div class="showpart myorders flex flex-col items-center justify-center w-full hidden">
                    <div class="flex justify-start items-left mb-6 w-full md:hidden border-b border-gray-300 shadow px-4 py-5">
                        <!-- Back button (only visible on mobile) -->
                        <button onclick="goBackToSidebar()" class="max-lg:flex hidden flex items-center gap-1 text-sm">
                            <i class="fas fa-chevron-left"></i> Back
                        </button>
                    </div>
                    <div class="flex justify-center items-center mb-6 w-full">
                        <h1 class="text-2xl uppercase font-semibold">My Orders</h1>
                    </div>

                    <!-- <div class="bg-white p-6 rounded w-full"> -->
                    <!-- Orders List -->
                    <div class="w-[80%] grid grid-cols-2 md:grid-cols-1 lg:grid-cols-1 gap-6">
                        <!-- Order Card -->

                        <?php
                        // echo "SELECT tpi.*, tp.name AS product_name, tp.price, tp.product_images FROM tbl_purchase_item tpi LEFT JOIN tbl_products tp ON tp.id = tpi.product WHERE tpi.userid = '$_SESSION[id]' ORDER BY tpi.id DESC";
                        // printWithPre($_SESSION);
                        foreach ($orders as $key => $order) {

                        ?>
                            <div class="bg-white  rounded-lg overflow-hidden border hover:shadow-md transition">
                                <!-- Order Header -->
                                <div class="flex items-center justify-between bg-gray-50 px-4 py-2 border-b">
                                    <div></div>
                                    <span class="text-sm text-gray-600">Order #<?= $order['orderid'] ?></span>
                                    <span
                                        class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-700"><?= $order['status'] ?></span>
                                </div>

                                <!-- Product Preview -->
                                <div class="flex items-start p-4 justify-start flex-col">
                                    <div class="w-full flex items-center justify-between">
                                        <div>
                                            <span><?= $order['fname'] ?> <?= $order['lname'] ?></span>
                                        </div>
                                        <!-- <div></div> -->
                                        <span>₹<?= formatNumber($order['total_amount']) ?></span>
                                    </div>
                                    <p class="text-gray-500 mt-2"><?= $order['address_line2'] ?> <?= $order['address_line1'] ?></p>
                                    <p class="text-gray-500"><?= $order['city'] ?> -- <?= $order['pincode'] ?></p>
                                    <p class="text-gray-500"><?= $order['state_name'] ?></p>
                                    <p class="mt-2">Mobile : <?= $order['mobile'] ?></p>
                                    <a href="/order-details/<?= $order['id'] ?>" class="text-sm bg-[#f25b21] text-white px-3 py-2 rounded mt-3">Order Details</a>
                                </div>

                                <!-- Order Footer -->
                                <div class="flex items-center justify-between px-4 py-2 border-t bg-gray-50">
                                    <span class="text-xs text-gray-500">Ordered on: <?= formatDate($order['created_at']) ?></span>
                                    <!-- <button class="text-sm font-medium text-[#f25b21] hover:underline">View Details</button> -->
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </div>


                <div class="showpart setting flex flex-col items-center justify-center w-full hidden">
                    <div class="flex justify-start items-left mb-6 w-full md:hidden border-b border-gray-300 shadow px-4 py-5">
                        <!-- Back button (only visible on mobile) -->
                        <button onclick="goBackToSidebar()" class="max-lg:flex hidden flex items-center gap-1 text-sm">
                            <i class="fas fa-chevron-left"></i> Back
                        </button>
                    </div>
                    <div
                        class="flex justify-center flex-col items-center font-semibold  w-full bg-white  rounded-lg ">
                        <h1 class="text-2xl uppercase">Profile
                            Setting
                        </h1>
                    </div>

                    <form action="" method="POST" class="w-full" id="profileForm">
                        <div class="w-[80%] mx-auto py-6  bg-white rounded-md  space-y-6">
                            <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                    <input type="text" value="<?= $userData['fname'] ?>" name="fname"
                                        class="w-full border border-gray-300  px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required />

                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>

                                    <input type="text" value="<?= $userData['lname'] ?>" name="lname"
                                        class="w-full border border-gray-300  px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required />
                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="text" value="<?= $userData['username'] ?>" name="email"
                                        class="w-full border border-gray-300  px-4 py-2" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="text" placeholder="Phone Number"
                                        value="<?= $userData['mobile'] ?>" readonly
                                        class="w-full border bg-gray-100 border-gray-300  px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required />
                                </div>

                            </div>

                            
                            <div class="mt-4">
                                <button
                                    class="bg-[#f25b21] border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  "
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
                                    class="bg-[#f25b21] opacity-50 cursor-not-allowed border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white"
                                    name="update_password">
                                    Update Password
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </main>
        </div>
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
                        <div class="flex items-center justify-start">
                            <input type="checkbox" name="defaultAddress" id="defaultAddress">
                            <label for="defaultAddress" class="ml-2">Set as Default Address</label>
                        </div>
                        <div class="flex justify-between space-x-3 pt-4">

                            <div>
                                <button type="button" onclick="closeModal1()"
                                    class="px-4 py-2 border border-gray-300  text-sm text-white    font-medium bg-gray-600 hover:bg-gray-700 shadow-lg">
                                    Cancel
                                </button>
                                <button type="button" name="submit" id="Process" value="add" onclick="updateAddress()"
                                    class="px-4 py-2 border border-transparent  shadow-sm text-sm font-medium text-white bg-[#f25b21] ">
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
        include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>
        <script>
            const addressmodal = document.getElementById('addressModal');
            const defaultAddress = document.getElementById('defaultAddress');
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


            function openModal1(id = null) {
                // console.log("hello");
                addressmodal.classList.add('show');
                addressmodal.classList.remove('hidden');
                if (id == null) {
                    addressInput1.value = '';
                    addressInput2.value = '';
                    cityInput.value = '';
                    // document.getElementById("state").value = state;
                    stateInput.value = '';
                    pincodeInput.value = '';
                    buttonValue.value = 'add';
                    defaultAddress.checked = false;


                }
                // console.log(addressmodal);

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
            async function updateAddress() {
                // displayAddress.textContent = addressInput.value;
                console.log(addressInput1.value)
                console.log(addressInput2.value)
                console.log(cityInput.value)
                console.log(stateInput.value)
                console.log(pincodeInput.value)
                let delivery = '';

                console.log('this is delevry value' + delivery)
                if (defaultAddress.checked) {
                    status = 1;
                } else {
                    status = 0;
                }
                const response = await axios.post("/user-address", new URLSearchParams({
                    process: buttonValue.value,
                    address_line1: addressInput1.value,
                    address_line2: addressInput2.value,
                    city: cityInput.value,
                    state: stateInput.value,
                    pincode: pincodeInput.value,
                    userid: '<?php echo $_SESSION['userid']; ?>',
                    created_by: '<?php echo $_SESSION['userid']; ?>',
                    status: status,



                }))

                console.log(response);
                if (response.data.success) {

                    window.location.reload();
                } else {
                    toastr.error(response.data.message);
                }

                closeModal1();
            }
        </script>
        <!-- <script>
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
        </script> -->

        <script>
            let AllshowItems = document.querySelectorAll('.showpart');
            let sideNavItems = document.querySelectorAll('.sidenav');

            function showPart(part, ele) {
                // Show the selected part, hide all others
                AllshowItems.forEach(item => {
                    if (item.classList.contains(part)) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });

                // Update active nav link
                sideNavItems.forEach(item => {
                    if (item === ele) {
                        item.classList.add('activeTab');
                    } else {
                        item.classList.remove('activeTab');
                    }
                });

                if (window.innerWidth < 1024) {
                    const sidebar = document.getElementById('userSidebar');
                    sidebar.style.display = 'none';
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });

                    // Remove activeTab from other nav items but keep clicked one active
                    sideNavItems.forEach(item => {
                        if (item !== ele) item.classList.remove('activeTab');
                    });
                }
            }


           // 🟢 NEW: Back button logic for mobile
function goBackToSidebar() {
    const sidebar = document.getElementById('userSidebar');
    sidebar.style.display = 'block';
    AllshowItems.forEach(item => item.classList.add('hidden'));
    document.querySelector('.overview')?.classList.remove('hidden');

    // Refresh the page to reset everything
    window.location.reload();
}


            // Hide overview on mobile by default
            if (window.innerWidth < 1024) {
                document.querySelector('.overview')?.classList.add('hidden');
            }


            // Existing profile tab logic
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


</body>

</html>