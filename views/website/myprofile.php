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

    /* ===== Base Toast Style ===== */
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
                        class="flex items-center justify-between gap-3 px-5 py-2 hover:bg-gray-100  sidenav hidden">
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
                        class="flex items-center justify-between gap-3 px-5 py-3 hover:bg-gray-100 sidenav hidden" id="ShowAddress">
                        <div class="flex items-center justify-center gap-3">

                            <div class="text-2xl">
                                <img src="/public/icons/address.png" class="h-[24px] " alt="">
                            </div>
                            <span class="uppercase text-sm">Addresses</span>
                        </div>
                        <img src="/public/icons/forward-black.png" class="h-4" alt="">

                    </div>
                    <!-- <div class="h-[1px] bg-gray-200"></div> -->

                    <a href="/logout" class="flex items-center gap-3 px-5 py-3 hover:bg-gray-100 ">
                        <div class="text-2xl">
                            <img src="/public/icons/exit-red.png" class="h-[24px] " alt="">
                        </div>
                        <span class="uppercase text-sm text-red-500 font-semibold">Logout</span>
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
                    <div class="w-[80%] max-md:w-[90%] mx-auto max-lg:overflow-x-auto bg-white overflow-hidden ">
                        <form action="" method="POST" class="w-full" id="profileForm">
                            <div class="w-full max-md:w-[90%] mx-auto py-6  bg-white rounded-md  space-y-6">
                                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
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
                    </div>
                    <div class="w-[80%] h-[1px] bg-gray-200 my-4"></div>
                    <div class="flex flex-col items-center justify-center w-full mt-3">
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
                        <?php
                        // $userAddress =[];
                        if (!empty($userAddress)) {




                        ?>
                            <div class="w-[80%] max-md:w-[90%] grid grid-cols-2 max-md:grid-cols-1 gap-2 items-center justify-center">
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
                                <?php }
                                ?>
                            </div>
                        <?php
                        } else { ?>
                            <div class="w-[80%] flex items-center justify-center flex-col min-h-[50vh]">
                                <img src="/public/icons/empty-address.png" class="h-[150px]" alt="">
                                <h2 class="font-semibold uppercase">No Address Found</h2>
                                <p class="text-sm text-gray-500 mt-3 text-center">You have not added any address yet</p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="w-full flex flex-col items-center justify-center overview showpart">
                    <div class="flex justify-start items-left w-full md:hidden border-b border-gray-300 shadow px-4 py-5">
                        <!-- Back button (only visible on mobile) -->
                        <button onclick="goBackToSidebar()" class="max-lg:flex hidden flex items-center gap-1 text-sm">
                            <i class="fas fa-chevron-left"></i> Back
                        </button>
                    </div>
                    <div class="w-full flex items-start justify-start flex-col relative h-[40vh] max-md:h-[45vh]">
                        <img src="/public/images/overviewbg.png" class="w-full h-full object-cover max-md:hidden" alt="">
                        <img src="/public/images/overviewbgmobile.png" class="w-full h-full object-cover md:hidden" alt="">

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
                        <div onclick="showPart('setting',document.getElementById('ShowSetting'))" class="flex flex-col items-center justify-center border border-gray-200 rounded-lg p-8 max-md:p-4 hover:shadow-md transition hidden">
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
                    $UserReview = getData2("SELECT tbl_product_review.*, tbl_products.name as product_name  FROM `tbl_product_review` LEFT JOIN tbl_products ON tbl_product_review.product_id = tbl_products.id where tbl_product_review.userid= $_SESSION[userid]");

                    if (!empty($UserReview)) {
                        foreach ($UserReview as $review) {
                            $name = str_replace(' ', '-', $review['product_name']);
                            $name = str_replace("'", '', $name);
                    ?>
                            <div class="border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition mt-2 w-full max-md:w-[90%]">
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
                        <?php }
                    } else { ?>
                        <div class="w-full flex items-center justify-center flex-col min-h-[50vh]">
                            <img src="/public/icons/star-rating.png" class="h-[110px] " alt="">
                            <h2 class="font-semibold mt-3">NO PRODUCTS TO REVIEW YET</h2>
                            <p class="text-sm text-gray-500 w-[50%] mt-3 text-center">You've reviewed all your past orders or haven't ordered yet. Shop now and share your feedback

                            </p>
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
                        <div class="text-center mb-10 max-md:px-4">
                            <h1 class="text-2xl font-bold text-gray-900">Wishlist</h1>
                            <p class="text-gray-600 mt-1">
                                Manage your wishlist and keep track of the products you love.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-5 max-md:gap-3 max-md:px-4">
                            <?php
                            $wishlists = getData2("SELECT * FROM `tbl_wishlist` WHERE `userid` = " . $_SESSION["userid"]);

                            foreach ($wishlists as $key => $wishlist) {
                                $product = getData2("SELECT * FROM `tbl_products` WHERE `id` = " . $wishlist['product'])[0];
                                // $images = json_decode($product['product_images'], true);
                                // $images = array_reverse($images);
                                $SecondImage = true;
                                $varients = getData2("SELECT * FROM `tbl_variants` WHERE `product_id` = $product[id]")[0];
                                // printWithPre($varients);
                                $images = json_decode($varients['images'], true);
                                $images = array_reverse($images);
                                (isset($images[1])) ? $SecondImage = $images[1] : $SecondImage = $images[0];
                                $comparePrice = floatval($product['compare_price']);
                                $price = floatval($varients['price']);
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
                                        <span class="absolute top-2 left-2 max-md:text-[11px] max-md:top-0 max-md:left-0 bg-[#f25b21] text-white text-xs px-2 py-1 z-20">
                                            SAVE <?= $discountPercentage ?>%
                                        </span>

                                        <!-- Product Images -->
                                        <div class="relative w-full h-[350px] max-md:h-[250px] overflow-hidden group">
                                            <!-- Default Image -->
                                            <img src="/<?= $images[0] ?>" alt="Product 1"
                                                class="w-full h-full object-cover transition-opacity duration-500 group-hover:opacity-0">

                                            <!-- Hover Image -->

                                            <img src="/<?= $SecondImage ?>" alt="Product 1 Hover"
                                                class="absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-500 group-hover:opacity-100">

                                            <!-- Add to favorites Icon (top-right) -->
                                            <button
                                                class="addToWishlistBtn absolute top-2 right-3 bg-[#f25b21] text-white h-10 w-10 max-md:h-6 max-md:w-6 flex items-center justify-center rounded-full  group-hover:opacity-100 z-20 stop-link">
                                                <i class="fas fa-heart max-md:text-sm"></i>
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
                                            <h3 class="text-base max-md:text-sm font-semibold uppercase"><?= $product['name'] ?></h3>
                                            <div class="flex items-center justify-start gap-3 w-full">
                                                <p class="text-gray-500 line-through text-sm">₹
                                                    <?= formatNumber($product['compare_price']) ?>.00
                                                </p>
                                                <p class="text-[#f25b21] font-bold max-md:text-sm max-md:font-semibold">₹ <?= formatNumber($price) ?>.00</p>
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
                    <?php
                    // $userAddress =[];
                    if (!empty($userAddress)) {




                    ?>
                        <div class="w-[80%] max-md:w-[90%] grid grid-cols-2 max-md:grid-cols-1 gap-2 items-center justify-center">
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
                            <?php }
                            ?>
                        </div>
                    <?php
                    } else { ?>
                        <div class="w-[80%] flex items-center justify-center flex-col min-h-[50vh]">
                            <img src="/public/icons/empty-address.png" class="h-[150px]" alt="">
                            <h2 class="font-semibold uppercase">No Address Found</h2>
                            <p class="text-sm text-gray-500 mt-3 text-center">You have not added any address yet</p>
                        </div>
                    <?php } ?>
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
                    <div class="w-[80%] max-md:w-[90%] grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-6 items-center justify-center">
                        <!-- Order Card -->

                        <?php
                        // echo "SELECT tpi.*, tp.name AS product_name, tp.price, tp.product_images FROM tbl_purchase_item tpi LEFT JOIN tbl_products tp ON tp.id = tpi.product WHERE tpi.userid = '$_SESSION[id]' ORDER BY tpi.id DESC";
                        // printWithPre($_SESSION);
                        // $orders = [];
                        if (!empty($orders)) {


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
                            <?php }
                        } else { ?>
                            <div class="w-full flex items-center justify-center flex-col">
                                <svg width="130" height="130" viewBox="0 0 114 114" fill="none">
                                    <g opacity="0.4">
                                        <mask id="path-1-inside-1_22409_2327" fill="white">
                                            <path d="M73.5644 4.18693C74.8658 5.15582 75.8244 6.40141 76.1484 8.01557C76.4221 10.3217 75.4106 12.1697 74.1445 14.0273C74.3431 13.9174 74.5418 13.8074 74.7464 13.6942C75.0096 13.55 75.2729 13.4059 75.5361 13.2619C75.6667 13.1894 75.7973 13.117 75.9319 13.0423C77.587 12.1404 79.1675 11.9883 81.0208 12.3826C82.9071 12.9789 84.2216 14.0785 85.166 15.8225C85.8008 17.481 85.799 19.3556 85.246 21.0314C84.7683 22.0509 84.3365 22.8841 83.3987 23.5319C83.2104 23.7018 83.0221 23.8718 82.8281 24.0468C82.8869 25.6096 83.2887 27.0365 83.7327 28.5286C83.8012 28.7638 83.8696 28.999 83.9402 29.2413C84.0864 29.7426 84.2333 30.2437 84.381 30.7446C84.6108 31.5246 84.8387 32.3053 85.066 33.0861C85.3674 34.121 85.6692 35.1557 85.9715 36.1903C86.4797 37.9319 86.9807 39.6756 87.4736 41.4216C87.5988 41.8643 87.7251 42.3067 87.8514 42.7491C87.9247 43.0092 87.998 43.2692 88.0736 43.5371C88.1363 43.7584 88.199 43.9797 88.2636 44.2077C88.3945 44.7539 88.3945 44.7539 88.3945 45.4218C88.5963 45.3575 88.7981 45.2932 89.006 45.227C91.9514 44.3294 91.9514 44.3294 93.5156 44.5312C94.3385 45.1779 94.6282 45.8492 94.9698 46.8239C95.0206 46.9662 95.0713 47.1086 95.1236 47.2553C95.2951 47.738 95.4629 48.222 95.6309 48.706C95.7555 49.059 95.8805 49.4119 96.0057 49.7647C96.2849 50.5525 96.5627 51.3408 96.8397 52.1293C97.3299 53.5226 97.8268 54.9135 98.3245 56.3041C98.4136 56.5531 98.5027 56.8021 98.5945 57.0586C98.7788 57.5738 98.9632 58.089 99.1476 58.6041C99.6278 59.9466 100.107 61.2895 100.586 62.6325C101.348 64.7687 102.11 66.9048 102.873 69.0408C103.011 69.4254 103.011 69.4254 103.151 69.8179C103.519 70.8487 103.887 71.8795 104.255 72.9103C105.21 75.5813 106.163 78.2523 107.116 80.9238C107.519 82.0525 107.921 83.1812 108.324 84.31C108.514 84.8432 108.704 85.3764 108.894 85.9097C109.073 86.4121 109.253 86.9145 109.432 87.4168C109.602 87.8937 109.772 88.3707 109.941 88.8478C110.326 89.9269 110.718 91.0013 111.134 92.0686C111.207 92.2592 111.281 92.4499 111.356 92.6463C111.491 92.9937 111.628 93.3402 111.769 93.6853C112.204 94.8126 112.421 95.8708 112.219 97.0781C111.578 98.1834 110.232 98.374 109.073 98.701C108.847 98.7672 108.621 98.8334 108.388 98.9016C107.662 99.1133 106.935 99.3206 106.207 99.5273C105.737 99.6625 105.267 99.7978 104.796 99.9332C103.343 100.35 101.888 100.76 100.432 101.169C99.9139 101.315 99.3959 101.462 98.8779 101.608C97.6174 101.963 96.3566 102.318 95.0958 102.673C94.454 102.854 93.8123 103.034 93.1705 103.215C91.2077 103.768 89.2447 104.32 87.2812 104.871C87.2859 105.008 87.2906 105.145 87.2954 105.286C87.3139 105.908 87.3255 106.531 87.3369 107.153C87.3444 107.369 87.3518 107.584 87.3595 107.806C87.3624 108.015 87.3653 108.223 87.3682 108.437C87.3729 108.628 87.3776 108.819 87.3824 109.016C87.2431 109.747 86.968 109.977 86.3906 110.437C85.755 110.55 85.755 110.55 85.0047 110.551C84.5776 110.554 84.5776 110.554 84.1419 110.558C83.8269 110.556 83.5119 110.555 83.1969 110.553C82.8648 110.554 82.5327 110.555 82.2005 110.557C81.2989 110.561 80.3973 110.56 79.4956 110.557C78.5522 110.555 77.6089 110.557 76.6655 110.558C75.0812 110.56 73.497 110.558 71.9128 110.554C70.0808 110.549 68.249 110.55 66.4171 110.555C64.8445 110.559 63.2721 110.56 61.6995 110.557C60.7602 110.556 59.8209 110.556 58.8815 110.559C57.9984 110.561 57.1154 110.56 56.2323 110.554C55.9081 110.553 55.5839 110.554 55.2597 110.556C54.8174 110.558 54.3751 110.554 53.9328 110.551C53.6852 110.55 53.4376 110.55 53.1825 110.55C52.3942 110.411 52.1299 110.183 51.6562 109.547C51.5849 108.924 51.5613 108.398 51.5867 107.779C51.5888 107.623 51.591 107.466 51.5932 107.305C51.6112 106.468 51.7036 105.688 51.8789 104.871C51.6594 104.858 51.6594 104.858 51.4355 104.845C49.3322 104.696 47.2718 104.362 45.194 104.017C44.8116 103.954 44.4293 103.891 44.0469 103.828C43.2508 103.697 42.4547 103.564 41.6588 103.432C40.641 103.262 39.6227 103.095 38.6043 102.929C37.8167 102.801 37.0294 102.67 36.2422 102.538C35.8669 102.476 35.4914 102.415 35.1158 102.354C34.5913 102.269 34.0673 102.181 33.5434 102.092C33.39 102.068 33.2366 102.043 33.0785 102.018C32.1219 101.853 31.34 101.581 30.5039 101.086C29.8372 99.7524 30.3728 98.0294 30.7725 96.6799C30.8253 96.4935 30.8782 96.3072 30.9327 96.1152C31.1091 95.4956 31.2893 94.8772 31.4695 94.2588C31.5973 93.8128 31.725 93.3668 31.8523 92.9206C32.1983 91.7118 32.5475 90.5039 32.8973 89.2962C33.2639 88.0285 33.6274 86.7598 33.9914 85.4913C34.6818 83.0862 35.375 80.6819 36.0692 78.2779C36.8549 75.5562 37.6375 72.8335 38.4199 70.1108C39.5762 66.0871 40.7338 62.0638 41.8943 58.0413C42.0192 57.6084 42.144 57.1756 42.2688 56.7427C42.3564 56.4389 42.3564 56.4389 42.4458 56.129C42.5026 55.932 42.5594 55.735 42.6179 55.5321C42.7278 55.1515 42.8382 54.7711 42.949 54.3909C43.2123 53.4872 43.4701 52.5827 43.7166 51.6743C43.7648 51.5005 43.813 51.3268 43.8627 51.1477C43.9526 50.8237 44.0402 50.499 44.125 50.1736C44.3821 49.2583 44.6597 48.676 45.4219 48.0937C46.3272 47.9764 47.1767 48.0538 48.0938 48.0937C48.3877 46.7711 48.6816 45.4485 48.9844 44.0859C42.0533 46.2958 42.0533 46.2958 35.4023 49.207C35.1877 49.3142 35.1877 49.3142 34.9687 49.4235C32.5845 50.6244 29.5041 52.5362 28.5761 55.193C28.4522 55.6627 28.3459 56.1331 28.246 56.6086C28.1886 56.8652 28.1886 56.8652 28.13 57.127C28.0095 57.6686 27.8929 58.2109 27.7764 58.7534C27.6949 59.1228 27.6131 59.4921 27.5311 59.8614C27.3316 60.7624 27.1356 61.6642 26.9414 62.5663C25.9818 62.789 25.3781 62.7314 24.4226 62.4689C24.1847 62.4049 23.9467 62.3409 23.7016 62.275C23.4316 62.1988 23.4316 62.1988 23.1562 62.121C23.3127 60.3905 23.6342 58.7134 23.9912 57.0139C24.0446 56.7442 24.098 56.4746 24.153 56.1967C25.0047 52.1422 27.19 49.5299 30.5822 47.2709C34.1811 44.9632 38.1588 43.5228 42.1916 42.1585C42.5826 42.0262 42.5826 42.0262 42.9814 41.8912C44.0572 41.5283 45.1334 41.1666 46.211 40.8088C50.5525 39.3645 50.5525 39.3645 54.5508 37.1835C54.9598 36.9295 55.3689 36.6756 55.778 36.4216C56.1626 36.1754 56.5467 35.9283 56.9304 35.6806C57.3548 35.4086 57.7793 35.1367 58.2037 34.8648C58.4127 34.7307 58.6216 34.5966 58.8369 34.4584C59.7574 33.869 60.6816 33.2855 61.6062 32.7026C61.778 32.5942 61.9499 32.4857 62.1269 32.374C62.4718 32.1564 62.8167 31.9388 63.1616 31.7213C64.2144 31.0571 65.2667 30.3923 66.319 29.7274C67.2275 29.1534 68.1365 28.58 69.0461 28.0077C69.2333 27.8897 69.4206 27.7717 69.6136 27.6502C69.9674 27.4273 70.3214 27.2047 70.6755 26.9822C71.7099 26.3304 72.7264 25.6584 73.7322 24.963C74.1445 24.7148 74.1445 24.7148 74.5898 24.7148C74.2389 23.0837 73.7016 21.7673 72.3633 20.707C71.6158 20.3713 71.2199 20.201 70.4255 20.4513C70.1211 20.6231 70.1211 20.6231 69.8106 20.7983C69.58 20.9255 69.3495 21.0527 69.1119 21.1837C68.8669 21.3249 68.6218 21.4661 68.3694 21.6115C68.1132 21.7544 67.8569 21.8973 67.5929 22.0445C66.805 22.4841 66.0217 22.9314 65.2383 23.3789C64.7894 23.6323 64.3403 23.8854 63.891 24.1381C63.0504 24.612 62.2106 25.0873 61.3714 25.5637C60.0753 26.2981 58.7767 27.0275 57.4731 27.7485C57.276 27.8592 57.0789 27.9698 56.8758 28.0839C56.6878 28.1873 56.4997 28.2907 56.3059 28.3973C56.1438 28.4873 55.9817 28.5773 55.8146 28.6701C53.6099 29.6882 51.4808 29.7924 49.094 29.922C48.6905 29.9458 48.287 29.9698 47.8835 29.994C47.0396 30.0441 46.1956 30.0924 45.3514 30.1393C44.2786 30.1989 43.2061 30.2617 42.1335 30.3257C41.3003 30.3752 40.467 30.4237 39.6337 30.4718C39.2387 30.4946 38.8437 30.5176 38.4488 30.5408C36.5836 30.6493 34.7191 30.7467 32.8506 30.7664C32.5896 30.7692 32.3286 30.7721 32.0596 30.775C31.4139 30.7279 31.0527 30.6642 30.5178 30.309C29.9669 29.4743 29.889 28.9843 29.9111 28.0001C30.2143 26.7391 31.2472 25.965 32.1738 25.1184C32.3713 24.9291 32.5688 24.7398 32.7722 24.5448C33.6438 23.7148 34.5337 22.9092 35.4441 22.1221C36.327 21.3573 37.1455 20.5387 37.9629 19.705C38.8444 18.8129 39.721 17.9305 40.6765 17.1166C41.5659 16.3549 42.1967 15.7592 42.5134 14.5978C42.5296 13.6755 42.3726 13.2297 41.8594 12.4687C41.2196 11.9474 40.5013 11.9312 39.6904 11.9398C38.7044 12.1037 37.9724 12.7215 37.1836 13.3037C36.999 13.4348 36.8145 13.566 36.6243 13.7011C35.3143 14.638 34.0263 15.6056 32.7454 16.5819C31.6019 17.4491 30.4265 18.2615 29.2375 19.0649C27.7571 20.0657 26.3235 21.1013 24.9201 22.2073C24.2901 22.695 23.6443 23.1482 22.9893 23.6015C16.512 28.3241 13.0103 37.4115 10.2302 44.6143C9.38616 46.7976 8.49338 48.9545 7.5564 51.0996C7.49586 51.2382 7.43532 51.3769 7.37294 51.5198C6.70296 53.0525 6.02497 54.5816 5.34375 56.1093C4.87443 55.9399 4.40611 55.7678 3.93823 55.5944C3.67733 55.4989 3.41643 55.4033 3.14763 55.3048C2.50938 55.0226 2.2381 54.8232 1.78125 54.3281C1.93401 53.9723 1.93401 53.9723 2.08985 53.6094C2.56799 52.495 3.04469 51.3799 3.52075 50.2646C3.60724 50.062 3.69372 49.8594 3.78283 49.6507C4.85236 47.1418 5.89527 44.6275 6.87451 42.082C9.59198 35.0562 12.8756 28.4327 17.9623 22.8154C18.2194 22.5308 18.4713 22.2416 18.7223 21.9516C20.0785 20.4748 21.7425 19.4371 23.3989 18.3308C24.3916 17.6651 25.3508 16.9642 26.3013 16.2399C27.6442 15.2191 29.0074 14.2338 30.3896 13.267C31.2321 12.6771 32.0693 12.0812 32.8992 11.4737C33.1638 11.2804 33.1638 11.2804 33.4338 11.0831C33.7695 10.8372 34.1047 10.5905 34.439 10.3426C36.8444 8.58382 38.6114 7.83722 41.6367 8.01557C43.102 8.27359 44.2342 9.13479 45.1992 10.2421C46.2845 11.9641 46.7686 13.6167 46.456 15.6572C46.0945 17.2053 45.3227 18.144 44.2101 19.2492C43.8037 19.6529 43.4031 20.0621 43.0022 20.4713C41.6945 21.7974 40.3841 23.0951 38.9723 24.3106C38.1942 25.0052 37.4668 25.7501 36.7383 26.496C39.9684 26.6595 42.3191 26.5861 44.787 24.3852C44.9255 24.2568 45.0641 24.1283 45.2068 23.996C45.9824 23.297 46.8195 22.6768 47.6484 22.0429C47.9872 21.7788 48.3259 21.5143 48.6643 21.2497C49.5792 20.5381 50.5041 19.8408 51.4336 19.1484C52.8586 18.0867 54.2642 17.0021 55.6614 15.9039C56.5614 15.1993 57.4697 14.511 58.396 13.8412C60.4466 12.3541 62.2347 11.0126 63.6797 8.9062C63.8648 8.64295 64.0504 8.38001 64.2363 8.11733C64.3808 7.91321 64.3808 7.91321 64.5282 7.70496C64.6247 7.56866 64.7213 7.43237 64.8208 7.29194C64.9149 7.15851 65.009 7.02508 65.106 6.88761C67.0883 4.1035 70.1592 2.11043 73.5644 4.18693ZM69.1791 7.77378C68.9574 8.07257 68.9574 8.07257 68.7312 8.37739C68.5636 8.59897 68.396 8.82054 68.2233 9.04884C68.0441 9.29774 67.8655 9.54709 67.6875 9.79682C67.4904 10.0693 67.2932 10.3419 67.0961 10.6144C66.7151 11.1435 66.3385 11.6754 65.9645 12.2095C65.1752 13.3138 64.4643 14.1607 63.3596 14.9597C63.1194 15.1355 62.8794 15.3114 62.6395 15.4876C62.5165 15.5774 62.3935 15.6672 62.2668 15.7597C61.6778 16.1938 61.0997 16.6415 60.5208 17.0888C60.2775 17.2764 60.0343 17.464 59.791 17.6515C59.6645 17.7491 59.538 17.8466 59.4076 17.9471C58.5023 18.6437 57.5943 19.3368 56.6866 20.0303C55.8644 20.6585 55.0426 21.2873 54.222 21.9177C52.4927 23.2452 50.7581 24.5601 48.9844 25.8281C51.1936 26.4836 53.1167 25.6733 55.0431 24.633C55.2097 24.5413 55.3764 24.4495 55.5482 24.3549C56.1853 24.0051 56.8264 23.6631 57.4679 23.3214C58.4644 22.7903 59.457 22.2525 60.4477 21.7107C61.35 21.2191 62.2571 20.7488 63.1822 20.3017C65.6071 19.108 66.9688 18.0173 68.2751 15.658C68.9094 14.5749 69.6457 13.556 70.3594 12.5244C70.6473 12.1036 70.9349 11.6826 71.2222 11.2615C71.3456 11.081 71.469 10.9006 71.5962 10.7146C72.2322 9.84736 72.2322 9.84736 72.3354 8.79487C72.2039 8.02711 72.2039 8.02711 71.7788 7.58417C70.8381 7.16334 69.99 7.09918 69.1791 7.77378ZM76.7329 16.9218C76.569 17.0068 76.4051 17.0917 76.2363 17.1793C75.8346 17.3879 75.4347 17.5999 75.0352 17.8124C75.1263 17.9138 75.2174 18.0152 75.3114 18.1196C76.4202 19.3614 77.3839 20.6778 77.9297 22.2656C79.4705 21.91 80.8425 20.9023 81.7148 19.5937C81.8763 18.5911 81.8484 17.814 81.3252 16.9357C80.6581 16.3243 80.2556 16.0673 79.3526 15.966C78.3403 16.0534 77.6191 16.4475 76.7329 16.9218ZM78.5977 26.496C78.2147 26.879 78.3483 27.3664 78.3473 27.8768C78.3481 28.0426 78.3489 28.2083 78.3497 28.3791C78.3497 28.5529 78.3497 28.7266 78.3496 28.9057C78.3498 29.4828 78.3515 30.0598 78.3533 30.6369C78.3537 31.036 78.354 31.435 78.3542 31.8341C78.3551 32.8864 78.3573 33.9388 78.3597 34.9912C78.362 36.0642 78.363 37.1372 78.3641 38.2103C78.3665 40.3173 78.3703 42.4242 78.375 44.5312C78.6527 44.5437 78.6527 44.5437 78.936 44.5564C79.1779 44.5711 79.4199 44.5857 79.6692 44.6008C79.9094 44.6137 80.1497 44.6266 80.3972 44.6399C81.0921 44.7618 81.3056 44.8622 81.7148 45.4218C81.9246 46.0084 82.0298 46.5914 82.1602 47.2031C83.1273 47.0893 83.9377 46.9151 84.832 46.5351C84.2186 44.014 83.5442 41.5152 82.8316 39.0205C82.728 38.6562 82.6244 38.2918 82.5209 37.9275C82.252 36.9816 81.9825 36.0358 81.7127 35.0901C81.4362 34.1198 81.1602 33.1494 80.8842 32.179C80.3453 30.2845 79.8057 28.3902 79.2656 26.496C79.0452 26.496 78.8248 26.496 78.5977 26.496ZM73.4009 29.7559C73.2028 29.8829 73.0048 30.01 72.8007 30.1409C72.5875 30.279 72.3742 30.4172 72.1545 30.5595C71.7099 30.8452 71.2651 31.1307 70.8203 31.4162C70.5951 31.5612 70.3699 31.7062 70.1378 31.8556C69.134 32.5 68.1258 33.1375 67.1169 33.7741C66.8571 33.9385 66.8571 33.9385 66.5921 34.1061C66.4298 34.2087 66.2674 34.3112 66.1002 34.4169C65.96 34.5055 65.8198 34.5941 65.6753 34.6853C65.2383 34.957 65.2383 34.957 64.6346 35.1989C64.0977 35.5616 64.0977 35.5616 64.0289 36.0283C63.9955 36.5683 64 37.0976 64.0163 37.6384C64.0174 37.8128 64.0185 37.9872 64.0197 38.1669C64.0255 38.818 64.041 39.4689 64.0554 40.1198C64.0784 41.5756 64.1013 43.0313 64.125 44.5312C67.6519 44.5312 71.1787 44.5312 74.8125 44.5312C74.8125 39.4613 74.8125 34.3914 74.8125 29.1679C74.1979 29.1679 73.9167 29.4229 73.4009 29.7559ZM59.2118 38.7734C58.8633 38.9934 58.8633 38.9934 58.5077 39.2179C58.0187 39.5278 57.5299 39.838 57.0413 40.1485C56.807 40.2963 56.5726 40.4441 56.3312 40.5964C56.1024 40.7422 55.8736 40.8881 55.6379 41.0383C55.0829 41.3632 54.5753 41.5775 53.9741 41.7932C53.3695 42.0827 53.2381 42.2491 52.9743 42.8789C52.7884 43.6133 52.6594 44.3388 52.5469 45.0878C52.5018 45.3418 52.4568 45.5959 52.4103 45.8576C52.2404 46.8413 52.1016 47.7616 52.1016 48.7617C52.7184 48.8737 53.3353 48.9849 53.9524 49.0956C54.1273 49.1275 54.3023 49.1594 54.4825 49.1922C54.6511 49.2223 54.8198 49.2525 54.9935 49.2835C55.1486 49.3115 55.3036 49.3395 55.4634 49.3683C55.9256 49.4456 55.9256 49.4456 56.5547 49.4296C56.8498 48.5444 56.861 47.6873 56.9156 46.7595C57.0002 46.0881 57.1433 45.5806 57.4453 44.9765C58.3841 44.5071 59.5165 44.6184 60.5625 44.5312C60.5625 42.4004 60.5625 40.2696 60.5625 38.0742C60.0896 38.0742 59.5898 38.5333 59.2118 38.7734ZM60.5625 48.0937C60.1829 51.1198 60.1829 51.1198 59.8861 54.1511C59.8569 54.4891 59.8569 54.4891 59.8271 54.8339C59.7632 55.5751 59.7003 56.3163 59.6374 57.0576C59.5913 57.5945 59.5452 58.1314 59.499 58.6683C59.3875 59.9661 59.2767 61.2639 59.1661 62.5618C59.0372 64.0747 58.9076 65.5876 58.7779 67.1004C58.5467 69.7985 58.3161 72.4967 58.0859 75.1949C57.8626 77.8118 57.6389 80.4288 57.4147 83.0457C57.4008 83.2073 57.387 83.3689 57.3727 83.5355C57.3519 83.7775 57.3519 83.7775 57.3308 84.0244C57.303 84.3493 57.2751 84.6742 57.2473 84.9991C57.2335 85.1593 57.2198 85.3195 57.2057 85.4846C56.9916 87.9827 56.778 90.4809 56.5644 92.979C56.4871 93.8837 56.4097 94.7884 56.3322 95.693C56.1981 97.2594 56.0643 98.8259 55.9308 100.392C55.8863 100.913 55.8418 101.434 55.7972 101.954C55.7365 102.663 55.6762 103.371 55.6159 104.08C55.5891 104.391 55.5891 104.391 55.5617 104.71C55.5457 104.899 55.5297 105.088 55.5132 105.283C55.4992 105.446 55.4853 105.61 55.4709 105.778C55.4458 106.143 55.4414 106.509 55.4414 106.875C64.6995 106.875 73.9575 106.875 83.4961 106.875C82.5461 95.2756 82.5461 95.2756 81.5709 83.6783C81.491 82.7406 81.4111 81.8029 81.3313 80.8651C81.1405 78.6235 80.9495 76.3818 80.7582 74.1402C80.5397 71.5799 80.3219 69.0196 80.1046 66.4592C79.9341 64.4515 79.7631 62.4438 79.5917 60.4362C79.4901 59.2472 79.3889 58.0582 79.2882 56.8691C79.1945 55.7631 79.1001 54.6571 79.0052 53.5511C78.9706 53.1461 78.9362 52.7411 78.9021 52.3361C78.8556 51.7847 78.8082 51.2334 78.7606 50.6822C78.7407 50.4413 78.7407 50.4413 78.7203 50.1957C78.6563 49.4654 78.5537 48.8084 78.375 48.0937C72.4969 48.0937 66.6188 48.0937 60.5625 48.0937ZM87.6818 49.561C87.2762 49.6773 86.8704 49.7931 86.4644 49.9082C85.8807 50.0737 85.2976 50.2411 84.7146 50.409C84.4415 50.4859 84.4415 50.4859 84.1629 50.5644C83.1823 50.8338 83.1823 50.8338 82.3828 51.4335C82.3917 52.0846 82.4295 52.7083 82.4899 53.3552C82.5068 53.5565 82.5237 53.7578 82.5411 53.9652C82.5986 54.6441 82.6596 55.3226 82.7206 56.0011C82.7624 56.486 82.804 56.9708 82.8454 57.4557C82.9588 58.7757 83.0751 60.0954 83.1919 61.415C83.3134 62.7928 83.4322 64.1708 83.5512 65.5489C83.7515 67.8629 83.9534 70.1768 84.1567 72.4906C84.366 74.8742 84.5744 77.2578 84.7814 79.6415C84.7941 79.7884 84.8069 79.9352 84.82 80.0866C84.884 80.8233 84.9479 81.5601 85.0119 82.2968C85.5426 88.4117 86.0769 94.5262 86.6133 100.641C87.297 100.829 87.6925 100.869 88.3787 100.673C88.6358 100.602 88.6358 100.602 88.8981 100.528C89.1769 100.447 89.1769 100.447 89.4614 100.364C89.7575 100.281 89.7575 100.281 90.0596 100.195C90.7122 100.01 91.3637 99.8225 92.0153 99.6343C92.4677 99.5051 92.9202 99.376 93.3727 99.2471C94.3207 98.9765 95.2683 98.7044 96.2156 98.4311C97.4323 98.0802 98.65 97.7329 99.8681 97.3867C100.802 97.1208 101.736 96.8531 102.67 96.585C103.119 96.4562 103.568 96.3279 104.017 96.2002C104.643 96.0217 105.269 95.841 105.895 95.6597C106.082 95.6068 106.269 95.5539 106.462 95.4994C106.901 95.3709 107.334 95.2243 107.766 95.0742C108.04 94.6452 108.04 94.6452 107.884 94.2112C107.822 94.0402 107.76 93.8691 107.696 93.6929C107.59 93.3982 107.59 93.3982 107.482 93.0975C107.403 92.8813 107.323 92.6651 107.241 92.4423C107.159 92.2151 107.077 91.9879 106.993 91.7539C106.718 90.9953 106.442 90.2377 106.165 89.4799C105.972 88.9455 105.778 88.411 105.585 87.8764C105.283 87.0404 104.981 86.2045 104.678 85.3689C103.716 82.7174 102.767 80.0617 101.82 77.405C101.45 76.3687 101.08 75.3325 100.71 74.2963C100.43 73.5117 100.15 72.727 99.8698 71.9424C99.0106 69.5355 98.151 67.1288 97.2914 64.7221C96.8304 63.4312 96.3693 62.1403 95.9083 60.8495C95.7306 60.3517 95.5528 59.854 95.375 59.3563C94.0873 55.7505 92.7995 52.1448 91.5117 48.539C90.3097 48.539 88.8401 49.2278 87.6818 49.561ZM47.6484 52.1015C46.2611 56.562 44.9809 61.0525 43.6984 65.544C43.4545 66.398 43.2104 67.2519 42.9662 68.1058C42.3905 70.1192 41.8152 72.1328 41.2403 74.1464C40.6488 76.2177 40.0566 78.2888 39.4641 80.3598C38.9525 82.1479 38.4414 83.9361 37.9306 85.7243C37.6268 86.7883 37.3227 87.8522 37.0182 88.916C36.7328 89.9133 36.4479 90.9109 36.1634 91.9086C36.0593 92.2733 35.9551 92.638 35.8505 93.0026C35.3576 94.723 34.8702 96.4367 34.5117 98.1914C36.2002 98.6535 37.9175 98.9297 39.6424 99.2159C39.9666 99.2702 40.2909 99.3244 40.6152 99.3787C41.2916 99.4919 41.9681 99.6045 42.6447 99.7167C43.5103 99.8603 44.3757 100.005 45.241 100.151C45.9093 100.263 46.5777 100.374 47.2461 100.486C47.5653 100.539 47.8844 100.592 48.2035 100.646C48.6493 100.721 49.0952 100.795 49.5412 100.868C49.7944 100.91 50.0476 100.952 50.3085 100.996C50.9171 101.076 51.4889 101.104 52.1016 101.086C52.4561 100.377 52.4384 99.5971 52.5031 98.8164C52.5197 98.6256 52.5363 98.4347 52.5533 98.2381C52.6089 97.5949 52.6631 96.9517 52.7174 96.3084C52.7568 95.8487 52.7964 95.3891 52.836 94.9295C52.9435 93.6783 53.0499 92.427 53.1561 91.1757C53.2672 89.8684 53.3793 88.5612 53.4913 87.254C53.6792 85.0583 53.8665 82.8624 54.0533 80.6666C54.2933 77.8456 54.5344 75.0248 54.7759 72.2039C54.9832 69.7824 55.19 67.3609 55.3967 64.9393C55.4633 64.1593 55.5299 63.3792 55.5966 62.5991C55.7012 61.3745 55.8056 60.1499 55.9097 58.9253C55.948 58.4749 55.9864 58.0246 56.0249 57.5743C56.0773 56.9613 56.1294 56.3482 56.1814 55.7352C56.2045 55.4657 56.2045 55.4657 56.2282 55.1907C56.2839 54.5297 56.332 53.8785 56.332 53.2148C52.0113 52.4774 52.0113 52.4774 47.6484 52.1015Z"></path>
                                        </mask>
                                        <path d="M73.5644 4.18693C74.8658 5.15582 75.8244 6.40141 76.1484 8.01557C76.4221 10.3217 75.4106 12.1697 74.1445 14.0273C74.3431 13.9174 74.5418 13.8074 74.7464 13.6942C75.0096 13.55 75.2729 13.4059 75.5361 13.2619C75.6667 13.1894 75.7973 13.117 75.9319 13.0423C77.587 12.1404 79.1675 11.9883 81.0208 12.3826C82.9071 12.9789 84.2216 14.0785 85.166 15.8225C85.8008 17.481 85.799 19.3556 85.246 21.0314C84.7683 22.0509 84.3365 22.8841 83.3987 23.5319C83.2104 23.7018 83.0221 23.8718 82.8281 24.0468C82.8869 25.6096 83.2887 27.0365 83.7327 28.5286C83.8012 28.7638 83.8696 28.999 83.9402 29.2413C84.0864 29.7426 84.2333 30.2437 84.381 30.7446C84.6108 31.5246 84.8387 32.3053 85.066 33.0861C85.3674 34.121 85.6692 35.1557 85.9715 36.1903C86.4797 37.9319 86.9807 39.6756 87.4736 41.4216C87.5988 41.8643 87.7251 42.3067 87.8514 42.7491C87.9247 43.0092 87.998 43.2692 88.0736 43.5371C88.1363 43.7584 88.199 43.9797 88.2636 44.2077C88.3945 44.7539 88.3945 44.7539 88.3945 45.4218C88.5963 45.3575 88.7981 45.2932 89.006 45.227C91.9514 44.3294 91.9514 44.3294 93.5156 44.5312C94.3385 45.1779 94.6282 45.8492 94.9698 46.8239C95.0206 46.9662 95.0713 47.1086 95.1236 47.2553C95.2951 47.738 95.4629 48.222 95.6309 48.706C95.7555 49.059 95.8805 49.4119 96.0057 49.7647C96.2849 50.5525 96.5627 51.3408 96.8397 52.1293C97.3299 53.5226 97.8268 54.9135 98.3245 56.3041C98.4136 56.5531 98.5027 56.8021 98.5945 57.0586C98.7788 57.5738 98.9632 58.089 99.1476 58.6041C99.6278 59.9466 100.107 61.2895 100.586 62.6325C101.348 64.7687 102.11 66.9048 102.873 69.0408C103.011 69.4254 103.011 69.4254 103.151 69.8179C103.519 70.8487 103.887 71.8795 104.255 72.9103C105.21 75.5813 106.163 78.2523 107.116 80.9238C107.519 82.0525 107.921 83.1812 108.324 84.31C108.514 84.8432 108.704 85.3764 108.894 85.9097C109.073 86.4121 109.253 86.9145 109.432 87.4168C109.602 87.8937 109.772 88.3707 109.941 88.8478C110.326 89.9269 110.718 91.0013 111.134 92.0686C111.207 92.2592 111.281 92.4499 111.356 92.6463C111.491 92.9937 111.628 93.3402 111.769 93.6853C112.204 94.8126 112.421 95.8708 112.219 97.0781C111.578 98.1834 110.232 98.374 109.073 98.701C108.847 98.7672 108.621 98.8334 108.388 98.9016C107.662 99.1133 106.935 99.3206 106.207 99.5273C105.737 99.6625 105.267 99.7978 104.796 99.9332C103.343 100.35 101.888 100.76 100.432 101.169C99.9139 101.315 99.3959 101.462 98.8779 101.608C97.6174 101.963 96.3566 102.318 95.0958 102.673C94.454 102.854 93.8123 103.034 93.1705 103.215C91.2077 103.768 89.2447 104.32 87.2812 104.871C87.2859 105.008 87.2906 105.145 87.2954 105.286C87.3139 105.908 87.3255 106.531 87.3369 107.153C87.3444 107.369 87.3518 107.584 87.3595 107.806C87.3624 108.015 87.3653 108.223 87.3682 108.437C87.3729 108.628 87.3776 108.819 87.3824 109.016C87.2431 109.747 86.968 109.977 86.3906 110.437C85.755 110.55 85.755 110.55 85.0047 110.551C84.5776 110.554 84.5776 110.554 84.1419 110.558C83.8269 110.556 83.5119 110.555 83.1969 110.553C82.8648 110.554 82.5327 110.555 82.2005 110.557C81.2989 110.561 80.3973 110.56 79.4956 110.557C78.5522 110.555 77.6089 110.557 76.6655 110.558C75.0812 110.56 73.497 110.558 71.9128 110.554C70.0808 110.549 68.249 110.55 66.4171 110.555C64.8445 110.559 63.2721 110.56 61.6995 110.557C60.7602 110.556 59.8209 110.556 58.8815 110.559C57.9984 110.561 57.1154 110.56 56.2323 110.554C55.9081 110.553 55.5839 110.554 55.2597 110.556C54.8174 110.558 54.3751 110.554 53.9328 110.551C53.6852 110.55 53.4376 110.55 53.1825 110.55C52.3942 110.411 52.1299 110.183 51.6562 109.547C51.5849 108.924 51.5613 108.398 51.5867 107.779C51.5888 107.623 51.591 107.466 51.5932 107.305C51.6112 106.468 51.7036 105.688 51.8789 104.871C51.6594 104.858 51.6594 104.858 51.4355 104.845C49.3322 104.696 47.2718 104.362 45.194 104.017C44.8116 103.954 44.4293 103.891 44.0469 103.828C43.2508 103.697 42.4547 103.564 41.6588 103.432C40.641 103.262 39.6227 103.095 38.6043 102.929C37.8167 102.801 37.0294 102.67 36.2422 102.538C35.8669 102.476 35.4914 102.415 35.1158 102.354C34.5913 102.269 34.0673 102.181 33.5434 102.092C33.39 102.068 33.2366 102.043 33.0785 102.018C32.1219 101.853 31.34 101.581 30.5039 101.086C29.8372 99.7524 30.3728 98.0294 30.7725 96.6799C30.8253 96.4935 30.8782 96.3072 30.9327 96.1152C31.1091 95.4956 31.2893 94.8772 31.4695 94.2588C31.5973 93.8128 31.725 93.3668 31.8523 92.9206C32.1983 91.7118 32.5475 90.5039 32.8973 89.2962C33.2639 88.0285 33.6274 86.7598 33.9914 85.4913C34.6818 83.0862 35.375 80.6819 36.0692 78.2779C36.8549 75.5562 37.6375 72.8335 38.4199 70.1108C39.5762 66.0871 40.7338 62.0638 41.8943 58.0413C42.0192 57.6084 42.144 57.1756 42.2688 56.7427C42.3564 56.4389 42.3564 56.4389 42.4458 56.129C42.5026 55.932 42.5594 55.735 42.6179 55.5321C42.7278 55.1515 42.8382 54.7711 42.949 54.3909C43.2123 53.4872 43.4701 52.5827 43.7166 51.6743C43.7648 51.5005 43.813 51.3268 43.8627 51.1477C43.9526 50.8237 44.0402 50.499 44.125 50.1736C44.3821 49.2583 44.6597 48.676 45.4219 48.0937C46.3272 47.9764 47.1767 48.0538 48.0938 48.0937C48.3877 46.7711 48.6816 45.4485 48.9844 44.0859C42.0533 46.2958 42.0533 46.2958 35.4023 49.207C35.1877 49.3142 35.1877 49.3142 34.9687 49.4235C32.5845 50.6244 29.5041 52.5362 28.5761 55.193C28.4522 55.6627 28.3459 56.1331 28.246 56.6086C28.1886 56.8652 28.1886 56.8652 28.13 57.127C28.0095 57.6686 27.8929 58.2109 27.7764 58.7534C27.6949 59.1228 27.6131 59.4921 27.5311 59.8614C27.3316 60.7624 27.1356 61.6642 26.9414 62.5663C25.9818 62.789 25.3781 62.7314 24.4226 62.4689C24.1847 62.4049 23.9467 62.3409 23.7016 62.275C23.4316 62.1988 23.4316 62.1988 23.1562 62.121C23.3127 60.3905 23.6342 58.7134 23.9912 57.0139C24.0446 56.7442 24.098 56.4746 24.153 56.1967C25.0047 52.1422 27.19 49.5299 30.5822 47.2709C34.1811 44.9632 38.1588 43.5228 42.1916 42.1585C42.5826 42.0262 42.5826 42.0262 42.9814 41.8912C44.0572 41.5283 45.1334 41.1666 46.211 40.8088C50.5525 39.3645 50.5525 39.3645 54.5508 37.1835C54.9598 36.9295 55.3689 36.6756 55.778 36.4216C56.1626 36.1754 56.5467 35.9283 56.9304 35.6806C57.3548 35.4086 57.7793 35.1367 58.2037 34.8648C58.4127 34.7307 58.6216 34.5966 58.8369 34.4584C59.7574 33.869 60.6816 33.2855 61.6062 32.7026C61.778 32.5942 61.9499 32.4857 62.1269 32.374C62.4718 32.1564 62.8167 31.9388 63.1616 31.7213C64.2144 31.0571 65.2667 30.3923 66.319 29.7274C67.2275 29.1534 68.1365 28.58 69.0461 28.0077C69.2333 27.8897 69.4206 27.7717 69.6136 27.6502C69.9674 27.4273 70.3214 27.2047 70.6755 26.9822C71.7099 26.3304 72.7264 25.6584 73.7322 24.963C74.1445 24.7148 74.1445 24.7148 74.5898 24.7148C74.2389 23.0837 73.7016 21.7673 72.3633 20.707C71.6158 20.3713 71.2199 20.201 70.4255 20.4513C70.1211 20.6231 70.1211 20.6231 69.8106 20.7983C69.58 20.9255 69.3495 21.0527 69.1119 21.1837C68.8669 21.3249 68.6218 21.4661 68.3694 21.6115C68.1132 21.7544 67.8569 21.8973 67.5929 22.0445C66.805 22.4841 66.0217 22.9314 65.2383 23.3789C64.7894 23.6323 64.3403 23.8854 63.891 24.1381C63.0504 24.612 62.2106 25.0873 61.3714 25.5637C60.0753 26.2981 58.7767 27.0275 57.4731 27.7485C57.276 27.8592 57.0789 27.9698 56.8758 28.0839C56.6878 28.1873 56.4997 28.2907 56.3059 28.3973C56.1438 28.4873 55.9817 28.5773 55.8146 28.6701C53.6099 29.6882 51.4808 29.7924 49.094 29.922C48.6905 29.9458 48.287 29.9698 47.8835 29.994C47.0396 30.0441 46.1956 30.0924 45.3514 30.1393C44.2786 30.1989 43.2061 30.2617 42.1335 30.3257C41.3003 30.3752 40.467 30.4237 39.6337 30.4718C39.2387 30.4946 38.8437 30.5176 38.4488 30.5408C36.5836 30.6493 34.7191 30.7467 32.8506 30.7664C32.5896 30.7692 32.3286 30.7721 32.0596 30.775C31.4139 30.7279 31.0527 30.6642 30.5178 30.309C29.9669 29.4743 29.889 28.9843 29.9111 28.0001C30.2143 26.7391 31.2472 25.965 32.1738 25.1184C32.3713 24.9291 32.5688 24.7398 32.7722 24.5448C33.6438 23.7148 34.5337 22.9092 35.4441 22.1221C36.327 21.3573 37.1455 20.5387 37.9629 19.705C38.8444 18.8129 39.721 17.9305 40.6765 17.1166C41.5659 16.3549 42.1967 15.7592 42.5134 14.5978C42.5296 13.6755 42.3726 13.2297 41.8594 12.4687C41.2196 11.9474 40.5013 11.9312 39.6904 11.9398C38.7044 12.1037 37.9724 12.7215 37.1836 13.3037C36.999 13.4348 36.8145 13.566 36.6243 13.7011C35.3143 14.638 34.0263 15.6056 32.7454 16.5819C31.6019 17.4491 30.4265 18.2615 29.2375 19.0649C27.7571 20.0657 26.3235 21.1013 24.9201 22.2073C24.2901 22.695 23.6443 23.1482 22.9893 23.6015C16.512 28.3241 13.0103 37.4115 10.2302 44.6143C9.38616 46.7976 8.49338 48.9545 7.5564 51.0996C7.49586 51.2382 7.43532 51.3769 7.37294 51.5198C6.70296 53.0525 6.02497 54.5816 5.34375 56.1093C4.87443 55.9399 4.40611 55.7678 3.93823 55.5944C3.67733 55.4989 3.41643 55.4033 3.14763 55.3048C2.50938 55.0226 2.2381 54.8232 1.78125 54.3281C1.93401 53.9723 1.93401 53.9723 2.08985 53.6094C2.56799 52.495 3.04469 51.3799 3.52075 50.2646C3.60724 50.062 3.69372 49.8594 3.78283 49.6507C4.85236 47.1418 5.89527 44.6275 6.87451 42.082C9.59198 35.0562 12.8756 28.4327 17.9623 22.8154C18.2194 22.5308 18.4713 22.2416 18.7223 21.9516C20.0785 20.4748 21.7425 19.4371 23.3989 18.3308C24.3916 17.6651 25.3508 16.9642 26.3013 16.2399C27.6442 15.2191 29.0074 14.2338 30.3896 13.267C31.2321 12.6771 32.0693 12.0812 32.8992 11.4737C33.1638 11.2804 33.1638 11.2804 33.4338 11.0831C33.7695 10.8372 34.1047 10.5905 34.439 10.3426C36.8444 8.58382 38.6114 7.83722 41.6367 8.01557C43.102 8.27359 44.2342 9.13479 45.1992 10.2421C46.2845 11.9641 46.7686 13.6167 46.456 15.6572C46.0945 17.2053 45.3227 18.144 44.2101 19.2492C43.8037 19.6529 43.4031 20.0621 43.0022 20.4713C41.6945 21.7974 40.3841 23.0951 38.9723 24.3106C38.1942 25.0052 37.4668 25.7501 36.7383 26.496C39.9684 26.6595 42.3191 26.5861 44.787 24.3852C44.9255 24.2568 45.0641 24.1283 45.2068 23.996C45.9824 23.297 46.8195 22.6768 47.6484 22.0429C47.9872 21.7788 48.3259 21.5143 48.6643 21.2497C49.5792 20.5381 50.5041 19.8408 51.4336 19.1484C52.8586 18.0867 54.2642 17.0021 55.6614 15.9039C56.5614 15.1993 57.4697 14.511 58.396 13.8412C60.4466 12.3541 62.2347 11.0126 63.6797 8.9062C63.8648 8.64295 64.0504 8.38001 64.2363 8.11733C64.3808 7.91321 64.3808 7.91321 64.5282 7.70496C64.6247 7.56866 64.7213 7.43237 64.8208 7.29194C64.9149 7.15851 65.009 7.02508 65.106 6.88761C67.0883 4.1035 70.1592 2.11043 73.5644 4.18693ZM69.1791 7.77378C68.9574 8.07257 68.9574 8.07257 68.7312 8.37739C68.5636 8.59897 68.396 8.82054 68.2233 9.04884C68.0441 9.29774 67.8655 9.54709 67.6875 9.79682C67.4904 10.0693 67.2932 10.3419 67.0961 10.6144C66.7151 11.1435 66.3385 11.6754 65.9645 12.2095C65.1752 13.3138 64.4643 14.1607 63.3596 14.9597C63.1194 15.1355 62.8794 15.3114 62.6395 15.4876C62.5165 15.5774 62.3935 15.6672 62.2668 15.7597C61.6778 16.1938 61.0997 16.6415 60.5208 17.0888C60.2775 17.2764 60.0343 17.464 59.791 17.6515C59.6645 17.7491 59.538 17.8466 59.4076 17.9471C58.5023 18.6437 57.5943 19.3368 56.6866 20.0303C55.8644 20.6585 55.0426 21.2873 54.222 21.9177C52.4927 23.2452 50.7581 24.5601 48.9844 25.8281C51.1936 26.4836 53.1167 25.6733 55.0431 24.633C55.2097 24.5413 55.3764 24.4495 55.5482 24.3549C56.1853 24.0051 56.8264 23.6631 57.4679 23.3214C58.4644 22.7903 59.457 22.2525 60.4477 21.7107C61.35 21.2191 62.2571 20.7488 63.1822 20.3017C65.6071 19.108 66.9688 18.0173 68.2751 15.658C68.9094 14.5749 69.6457 13.556 70.3594 12.5244C70.6473 12.1036 70.9349 11.6826 71.2222 11.2615C71.3456 11.081 71.469 10.9006 71.5962 10.7146C72.2322 9.84736 72.2322 9.84736 72.3354 8.79487C72.2039 8.02711 72.2039 8.02711 71.7788 7.58417C70.8381 7.16334 69.99 7.09918 69.1791 7.77378ZM76.7329 16.9218C76.569 17.0068 76.4051 17.0917 76.2363 17.1793C75.8346 17.3879 75.4347 17.5999 75.0352 17.8124C75.1263 17.9138 75.2174 18.0152 75.3114 18.1196C76.4202 19.3614 77.3839 20.6778 77.9297 22.2656C79.4705 21.91 80.8425 20.9023 81.7148 19.5937C81.8763 18.5911 81.8484 17.814 81.3252 16.9357C80.6581 16.3243 80.2556 16.0673 79.3526 15.966C78.3403 16.0534 77.6191 16.4475 76.7329 16.9218ZM78.5977 26.496C78.2147 26.879 78.3483 27.3664 78.3473 27.8768C78.3481 28.0426 78.3489 28.2083 78.3497 28.3791C78.3497 28.5529 78.3497 28.7266 78.3496 28.9057C78.3498 29.4828 78.3515 30.0598 78.3533 30.6369C78.3537 31.036 78.354 31.435 78.3542 31.8341C78.3551 32.8864 78.3573 33.9388 78.3597 34.9912C78.362 36.0642 78.363 37.1372 78.3641 38.2103C78.3665 40.3173 78.3703 42.4242 78.375 44.5312C78.6527 44.5437 78.6527 44.5437 78.936 44.5564C79.1779 44.5711 79.4199 44.5857 79.6692 44.6008C79.9094 44.6137 80.1497 44.6266 80.3972 44.6399C81.0921 44.7618 81.3056 44.8622 81.7148 45.4218C81.9246 46.0084 82.0298 46.5914 82.1602 47.2031C83.1273 47.0893 83.9377 46.9151 84.832 46.5351C84.2186 44.014 83.5442 41.5152 82.8316 39.0205C82.728 38.6562 82.6244 38.2918 82.5209 37.9275C82.252 36.9816 81.9825 36.0358 81.7127 35.0901C81.4362 34.1198 81.1602 33.1494 80.8842 32.179C80.3453 30.2845 79.8057 28.3902 79.2656 26.496C79.0452 26.496 78.8248 26.496 78.5977 26.496ZM73.4009 29.7559C73.2028 29.8829 73.0048 30.01 72.8007 30.1409C72.5875 30.279 72.3742 30.4172 72.1545 30.5595C71.7099 30.8452 71.2651 31.1307 70.8203 31.4162C70.5951 31.5612 70.3699 31.7062 70.1378 31.8556C69.134 32.5 68.1258 33.1375 67.1169 33.7741C66.8571 33.9385 66.8571 33.9385 66.5921 34.1061C66.4298 34.2087 66.2674 34.3112 66.1002 34.4169C65.96 34.5055 65.8198 34.5941 65.6753 34.6853C65.2383 34.957 65.2383 34.957 64.6346 35.1989C64.0977 35.5616 64.0977 35.5616 64.0289 36.0283C63.9955 36.5683 64 37.0976 64.0163 37.6384C64.0174 37.8128 64.0185 37.9872 64.0197 38.1669C64.0255 38.818 64.041 39.4689 64.0554 40.1198C64.0784 41.5756 64.1013 43.0313 64.125 44.5312C67.6519 44.5312 71.1787 44.5312 74.8125 44.5312C74.8125 39.4613 74.8125 34.3914 74.8125 29.1679C74.1979 29.1679 73.9167 29.4229 73.4009 29.7559ZM59.2118 38.7734C58.8633 38.9934 58.8633 38.9934 58.5077 39.2179C58.0187 39.5278 57.5299 39.838 57.0413 40.1485C56.807 40.2963 56.5726 40.4441 56.3312 40.5964C56.1024 40.7422 55.8736 40.8881 55.6379 41.0383C55.0829 41.3632 54.5753 41.5775 53.9741 41.7932C53.3695 42.0827 53.2381 42.2491 52.9743 42.8789C52.7884 43.6133 52.6594 44.3388 52.5469 45.0878C52.5018 45.3418 52.4568 45.5959 52.4103 45.8576C52.2404 46.8413 52.1016 47.7616 52.1016 48.7617C52.7184 48.8737 53.3353 48.9849 53.9524 49.0956C54.1273 49.1275 54.3023 49.1594 54.4825 49.1922C54.6511 49.2223 54.8198 49.2525 54.9935 49.2835C55.1486 49.3115 55.3036 49.3395 55.4634 49.3683C55.9256 49.4456 55.9256 49.4456 56.5547 49.4296C56.8498 48.5444 56.861 47.6873 56.9156 46.7595C57.0002 46.0881 57.1433 45.5806 57.4453 44.9765C58.3841 44.5071 59.5165 44.6184 60.5625 44.5312C60.5625 42.4004 60.5625 40.2696 60.5625 38.0742C60.0896 38.0742 59.5898 38.5333 59.2118 38.7734ZM60.5625 48.0937C60.1829 51.1198 60.1829 51.1198 59.8861 54.1511C59.8569 54.4891 59.8569 54.4891 59.8271 54.8339C59.7632 55.5751 59.7003 56.3163 59.6374 57.0576C59.5913 57.5945 59.5452 58.1314 59.499 58.6683C59.3875 59.9661 59.2767 61.2639 59.1661 62.5618C59.0372 64.0747 58.9076 65.5876 58.7779 67.1004C58.5467 69.7985 58.3161 72.4967 58.0859 75.1949C57.8626 77.8118 57.6389 80.4288 57.4147 83.0457C57.4008 83.2073 57.387 83.3689 57.3727 83.5355C57.3519 83.7775 57.3519 83.7775 57.3308 84.0244C57.303 84.3493 57.2751 84.6742 57.2473 84.9991C57.2335 85.1593 57.2198 85.3195 57.2057 85.4846C56.9916 87.9827 56.778 90.4809 56.5644 92.979C56.4871 93.8837 56.4097 94.7884 56.3322 95.693C56.1981 97.2594 56.0643 98.8259 55.9308 100.392C55.8863 100.913 55.8418 101.434 55.7972 101.954C55.7365 102.663 55.6762 103.371 55.6159 104.08C55.5891 104.391 55.5891 104.391 55.5617 104.71C55.5457 104.899 55.5297 105.088 55.5132 105.283C55.4992 105.446 55.4853 105.61 55.4709 105.778C55.4458 106.143 55.4414 106.509 55.4414 106.875C64.6995 106.875 73.9575 106.875 83.4961 106.875C82.5461 95.2756 82.5461 95.2756 81.5709 83.6783C81.491 82.7406 81.4111 81.8029 81.3313 80.8651C81.1405 78.6235 80.9495 76.3818 80.7582 74.1402C80.5397 71.5799 80.3219 69.0196 80.1046 66.4592C79.9341 64.4515 79.7631 62.4438 79.5917 60.4362C79.4901 59.2472 79.3889 58.0582 79.2882 56.8691C79.1945 55.7631 79.1001 54.6571 79.0052 53.5511C78.9706 53.1461 78.9362 52.7411 78.9021 52.3361C78.8556 51.7847 78.8082 51.2334 78.7606 50.6822C78.7407 50.4413 78.7407 50.4413 78.7203 50.1957C78.6563 49.4654 78.5537 48.8084 78.375 48.0937C72.4969 48.0937 66.6188 48.0937 60.5625 48.0937ZM87.6818 49.561C87.2762 49.6773 86.8704 49.7931 86.4644 49.9082C85.8807 50.0737 85.2976 50.2411 84.7146 50.409C84.4415 50.4859 84.4415 50.4859 84.1629 50.5644C83.1823 50.8338 83.1823 50.8338 82.3828 51.4335C82.3917 52.0846 82.4295 52.7083 82.4899 53.3552C82.5068 53.5565 82.5237 53.7578 82.5411 53.9652C82.5986 54.6441 82.6596 55.3226 82.7206 56.0011C82.7624 56.486 82.804 56.9708 82.8454 57.4557C82.9588 58.7757 83.0751 60.0954 83.1919 61.415C83.3134 62.7928 83.4322 64.1708 83.5512 65.5489C83.7515 67.8629 83.9534 70.1768 84.1567 72.4906C84.366 74.8742 84.5744 77.2578 84.7814 79.6415C84.7941 79.7884 84.8069 79.9352 84.82 80.0866C84.884 80.8233 84.9479 81.5601 85.0119 82.2968C85.5426 88.4117 86.0769 94.5262 86.6133 100.641C87.297 100.829 87.6925 100.869 88.3787 100.673C88.6358 100.602 88.6358 100.602 88.8981 100.528C89.1769 100.447 89.1769 100.447 89.4614 100.364C89.7575 100.281 89.7575 100.281 90.0596 100.195C90.7122 100.01 91.3637 99.8225 92.0153 99.6343C92.4677 99.5051 92.9202 99.376 93.3727 99.2471C94.3207 98.9765 95.2683 98.7044 96.2156 98.4311C97.4323 98.0802 98.65 97.7329 99.8681 97.3867C100.802 97.1208 101.736 96.8531 102.67 96.585C103.119 96.4562 103.568 96.3279 104.017 96.2002C104.643 96.0217 105.269 95.841 105.895 95.6597C106.082 95.6068 106.269 95.5539 106.462 95.4994C106.901 95.3709 107.334 95.2243 107.766 95.0742C108.04 94.6452 108.04 94.6452 107.884 94.2112C107.822 94.0402 107.76 93.8691 107.696 93.6929C107.59 93.3982 107.59 93.3982 107.482 93.0975C107.403 92.8813 107.323 92.6651 107.241 92.4423C107.159 92.2151 107.077 91.9879 106.993 91.7539C106.718 90.9953 106.442 90.2377 106.165 89.4799C105.972 88.9455 105.778 88.411 105.585 87.8764C105.283 87.0404 104.981 86.2045 104.678 85.3689C103.716 82.7174 102.767 80.0617 101.82 77.405C101.45 76.3687 101.08 75.3325 100.71 74.2963C100.43 73.5117 100.15 72.727 99.8698 71.9424C99.0106 69.5355 98.151 67.1288 97.2914 64.7221C96.8304 63.4312 96.3693 62.1403 95.9083 60.8495C95.7306 60.3517 95.5528 59.854 95.375 59.3563C94.0873 55.7505 92.7995 52.1448 91.5117 48.539C90.3097 48.539 88.8401 49.2278 87.6818 49.561ZM47.6484 52.1015C46.2611 56.562 44.9809 61.0525 43.6984 65.544C43.4545 66.398 43.2104 67.2519 42.9662 68.1058C42.3905 70.1192 41.8152 72.1328 41.2403 74.1464C40.6488 76.2177 40.0566 78.2888 39.4641 80.3598C38.9525 82.1479 38.4414 83.9361 37.9306 85.7243C37.6268 86.7883 37.3227 87.8522 37.0182 88.916C36.7328 89.9133 36.4479 90.9109 36.1634 91.9086C36.0593 92.2733 35.9551 92.638 35.8505 93.0026C35.3576 94.723 34.8702 96.4367 34.5117 98.1914C36.2002 98.6535 37.9175 98.9297 39.6424 99.2159C39.9666 99.2702 40.2909 99.3244 40.6152 99.3787C41.2916 99.4919 41.9681 99.6045 42.6447 99.7167C43.5103 99.8603 44.3757 100.005 45.241 100.151C45.9093 100.263 46.5777 100.374 47.2461 100.486C47.5653 100.539 47.8844 100.592 48.2035 100.646C48.6493 100.721 49.0952 100.795 49.5412 100.868C49.7944 100.91 50.0476 100.952 50.3085 100.996C50.9171 101.076 51.4889 101.104 52.1016 101.086C52.4561 100.377 52.4384 99.5971 52.5031 98.8164C52.5197 98.6256 52.5363 98.4347 52.5533 98.2381C52.6089 97.5949 52.6631 96.9517 52.7174 96.3084C52.7568 95.8487 52.7964 95.3891 52.836 94.9295C52.9435 93.6783 53.0499 92.427 53.1561 91.1757C53.2672 89.8684 53.3793 88.5612 53.4913 87.254C53.6792 85.0583 53.8665 82.8624 54.0533 80.6666C54.2933 77.8456 54.5344 75.0248 54.7759 72.2039C54.9832 69.7824 55.19 67.3609 55.3967 64.9393C55.4633 64.1593 55.5299 63.3792 55.5966 62.5991C55.7012 61.3745 55.8056 60.1499 55.9097 58.9253C55.948 58.4749 55.9864 58.0246 56.0249 57.5743C56.0773 56.9613 56.1294 56.3482 56.1814 55.7352C56.2045 55.4657 56.2045 55.4657 56.2282 55.1907C56.2839 54.5297 56.332 53.8785 56.332 53.2148C52.0113 52.4774 52.0113 52.4774 47.6484 52.1015Z" fill="black" stroke="white" mask="url(#path-1-inside-1_22409_2327)"></path>
                                        <path d="M67.6875 51.6562C68.8631 51.6562 70.0387 51.6562 71.25 51.6562C71.2327 52.4596 71.2327 52.4596 71.215 53.2791C71.1091 58.3336 71.0394 63.3877 71.0025 68.4431C70.9827 71.0422 70.951 73.6401 70.8904 76.2385C70.8376 78.5049 70.8079 80.7702 70.8052 83.0372C70.803 84.2369 70.7897 85.4341 70.7487 86.6332C70.3852 91.2403 70.3852 91.2403 71.7672 95.4771C73.2447 97.0311 75.2316 97.842 77.2067 98.5716C78.0979 98.9263 78.7515 99.3662 79.4883 99.9727C78.9005 101.001 78.3127 102.03 77.707 103.09C76.6197 102.872 76.0845 102.608 75.1604 102.033C75.0262 101.95 74.8921 101.868 74.7538 101.783C74.3271 101.52 73.9018 101.254 73.4766 100.989C73.0512 100.724 72.6256 100.46 72.1993 100.197C71.8123 99.9578 71.4263 99.7172 71.0404 99.4765C70.8157 99.3463 70.5909 99.2162 70.3594 99.082C70.1757 98.975 69.992 98.8681 69.8027 98.7578C68.9441 98.571 68.5415 98.9379 67.8127 99.3978C67.6786 99.4808 67.5444 99.5639 67.4062 99.6495C66.9779 99.9158 66.5535 100.188 66.1289 100.46C65.8433 100.639 65.5574 100.818 65.2713 100.996C64.7436 101.325 64.2175 101.657 63.6927 101.992C63.468 102.134 63.2433 102.276 63.0117 102.422C62.7125 102.615 62.7125 102.615 62.4072 102.813C61.8984 103.09 61.8984 103.09 61.2305 103.09C60.3487 101.547 60.3487 101.547 59.4492 99.9727C60.587 99.1427 61.6154 98.5522 62.9415 98.0731C64.7146 97.3627 66.8441 96.4987 67.6596 94.6272C68.4844 91.8726 68.2085 88.7821 68.1194 85.9457C68.0878 84.7384 68.0907 83.5312 68.0898 82.3236C68.083 80.0417 68.0456 77.7614 67.997 75.48C67.9431 72.881 67.9236 70.282 67.9069 67.6824C67.8718 62.3396 67.7927 56.9981 67.6875 51.6562Z" fill="black"></path>
                                    </g>
                                </svg>
                                <h2 class="mt-3 font-semibold">NO ORDERS YET!

                                </h2>
                                <p class="text-sm mt-4 text-gray-500 w-[60%] text-center">You haven’t placed an order with us. Start shopping to discover your style and enjoy great deals.

                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>



            </main>
        </div>
        <div id="addressModal" class=" h-full w-full fixed inset-0 top-1/2 transform -translate-y-1/2 z-[9999]  overflow-y-auto bg-black bg-opacity-50 flex items-center justify-center   items-center justify-center hidden">
            <div class="bg-white shadow-lg mx-auto w-[30%] max-md:w-[90%]">
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