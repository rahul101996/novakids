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
        background-color: #f9fafb;
        color: black;

    }

    .activeTab:hover {
        background-color: #f9fafb;
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
        class="bg-[url('/public/images/dashboard-bg-shape-1.jpg')] bg-cover bg-center bg-no-repeat w-full flex items-center justify-center flex-col bg-[#eff2fa]">

        <div class="flex max-lg:flex-col w-[80%] max-lg:w-[90%] h-auto my-14 items-start justify-start bg-white">
            <aside
                class="w-[23%] max-lg:w-full p-6 rounded-tr-2xl rounded-br-2xl md:sticky top-24 max-lg:hidden">
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
                        <span>My Profile</span>
                    </div>

                    <div class="flex items-center gap-3 px-1 py-2 hover:bg-gray-100 rounded-lg sidenav"
                        onclick="showPart('myorders',this)">
                        <div class="text-2xl"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 32 32">
                                <path d="M0 0 C0.66209473 -0.00095673 1.32418945 -0.00191345 2.00634766 -0.00289917 C3.40852961 -0.00358076 4.8107147 -0.00172792 6.21289062 0.00244141 C8.36595713 0.00779004 10.51881502 0.0024958 12.671875 -0.00390625 C14.03125046 -0.00324546 15.3906258 -0.00196429 16.75 0 C18.61785156 0.00169189 18.61785156 0.00169189 20.5234375 0.00341797 C23.375 0.1328125 23.375 0.1328125 24.375 1.1328125 C24.47512401 3.33931906 24.5058118 5.54903636 24.5078125 7.7578125 C24.50876923 8.41990723 24.50972595 9.08200195 24.51071167 9.76416016 C24.51139326 11.16634211 24.50954042 12.5685272 24.50537109 13.97070312 C24.50002246 16.12376963 24.5053167 18.27662752 24.51171875 20.4296875 C24.51105796 21.78906296 24.50977679 23.1484383 24.5078125 24.5078125 C24.50668457 25.75304687 24.50555664 26.99828125 24.50439453 28.28125 C24.375 31.1328125 24.375 31.1328125 23.375 32.1328125 C21.16849344 32.23293651 18.95877614 32.2636243 16.75 32.265625 C16.08790527 32.26658173 15.42581055 32.26753845 14.74365234 32.26852417 C13.34147039 32.26920576 11.9392853 32.26735292 10.53710938 32.26318359 C8.38404287 32.25783496 6.23118498 32.2631292 4.078125 32.26953125 C2.71874954 32.26887046 1.3593742 32.26758929 0 32.265625 C-1.24523437 32.26449707 -2.49046875 32.26336914 -3.7734375 32.26220703 C-6.625 32.1328125 -6.625 32.1328125 -7.625 31.1328125 C-7.72512401 28.92630594 -7.7558118 26.71658864 -7.7578125 24.5078125 C-7.75876923 23.84571777 -7.75972595 23.18362305 -7.76071167 22.50146484 C-7.76139326 21.09928289 -7.75954042 19.6970978 -7.75537109 18.29492188 C-7.75002246 16.14185537 -7.7553167 13.98899748 -7.76171875 11.8359375 C-7.76105796 10.47656204 -7.75977679 9.1171867 -7.7578125 7.7578125 C-7.75668457 6.51257813 -7.75555664 5.26734375 -7.75439453 3.984375 C-7.51426781 -1.30747426 -4.67358012 0.00423332 0 0 Z M-5.625 3.1328125 C-5.71258003 5.13246232 -5.73196576 7.1351736 -5.72265625 9.13671875 C-5.72015869 10.23056885 -5.71766113 11.32441895 -5.71508789 12.45141602 C-5.70598389 13.85190186 -5.69687988 15.2523877 -5.6875 16.6953125 C-5.666875 21.1296875 -5.64625 25.5640625 -5.625 30.1328125 C3.615 30.1328125 12.855 30.1328125 22.375 30.1328125 C22.375 20.8928125 22.375 11.6528125 22.375 2.1328125 C19.405 2.1328125 16.435 2.1328125 13.375 2.1328125 C13.375 5.7628125 13.375 9.3928125 13.375 13.1328125 C11.725 12.4728125 10.075 11.8128125 8.375 11.1328125 C6.395 12.1228125 6.395 12.1228125 4.375 13.1328125 C4.375 9.5028125 4.375 5.8728125 4.375 2.1328125 C-0.91426333 1.55536095 -0.91426333 1.55536095 -5.625 3.1328125 Z M6.375 2.1328125 C6.375 4.4428125 6.375 6.7528125 6.375 9.1328125 C7.695 9.1328125 9.015 9.1328125 10.375 9.1328125 C10.375 6.8228125 10.375 4.5128125 10.375 2.1328125 C9.055 2.1328125 7.735 2.1328125 6.375 2.1328125 Z " fill="#4C5D77" transform="translate(7.625,-0.1328125)"></path>
                                <path d="M0 0 C0.66 0 1.32 0 2 0 C2.02465622 4.25414623 2.04283899 8.50825498 2.05493164 12.76245117 C2.05997101 14.21070073 2.06680253 15.65894517 2.07543945 17.10717773 C2.08752247 19.18474588 2.09323211 21.26224697 2.09765625 23.33984375 C2.10551147 25.21724243 2.10551147 25.21724243 2.11352539 27.13256836 C2 30 2 30 1 31 C-1.21855264 31.08783542 -3.43988496 31.10694609 -5.66015625 31.09765625 C-6.65685585 31.09553383 -6.65685585 31.09553383 -7.6736908 31.09336853 C-9.80333899 31.08775518 -11.93288339 31.07520054 -14.0625 31.0625 C-15.50325369 31.05748671 -16.94400903 31.05292351 -18.38476562 31.04882812 C-21.92321102 31.03778145 -25.46159539 31.02050792 -29 31 C-29 30.34 -29 29.68 -29 29 C-19.43 29 -9.86 29 0 29 C0 19.43 0 9.86 0 0 Z " fill="#465672" transform="translate(30,1)"></path>
                                <path d="M0 0 C0.33 0 0.66 0 1 0 C1.33 2.31 1.66 4.62 2 7 C2.99 6.67 3.98 6.34 5 6 C5.33 4.02 5.66 2.04 6 0 C6.33 0 6.66 0 7 0 C7 3.3 7 6.6 7 10 C4.69 10.33 2.38 10.66 0 11 C0 7.37 0 3.74 0 0 Z " fill="#8691A4" transform="translate(12,2)"></path>
                                <path d="M0 0 C0.99 0 1.98 0 3 0 C3 1.65 3 3.3 3 5 C2.01 5 1.02 5 0 5 C0 3.35 0 1.7 0 0 Z " fill="#96A0B0" transform="translate(19,23)"></path>
                                <path d="M0 0 C0.66 0 1.32 0 2 0 C2 1.65 2 3.3 2 5 C1.34 5 0.68 5 0 5 C0 3.35 0 1.7 0 0 Z " fill="#6E7B91" transform="translate(26,23)"></path>
                                <path d="M0 0 C0.66 0 1.32 0 2 0 C2 1.65 2 3.3 2 5 C1.34 5 0.68 5 0 5 C0 3.35 0 1.7 0 0 Z " fill="#6A798E" transform="translate(23,23)"></path>
                            </svg></div>
                        <span>My Orders</span>
                    </div>

                    <div onclick="showPart('setting',this)"
                        class="flex items-center gap-3 px-1 py-2 hover:bg-gray-100 rounded-lg sidenav">
                        <div class="text-2xl"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 50 50">
                                <path d="M 22.205078 2 A 1.0001 1.0001 0 0 0 21.21875 2.8378906 L 20.246094 8.7929688 C 19.076509 9.1331971 17.961243 9.5922728 16.910156 10.164062 L 11.996094 6.6542969 A 1.0001 1.0001 0 0 0 10.708984 6.7597656 L 6.8183594 10.646484 A 1.0001 1.0001 0 0 0 6.7070312 11.927734 L 10.164062 16.873047 C 9.583454 17.930271 9.1142098 19.051824 8.765625 20.232422 L 2.8359375 21.21875 A 1.0001 1.0001 0 0 0 2.0019531 22.205078 L 2.0019531 27.705078 A 1.0001 1.0001 0 0 0 2.8261719 28.691406 L 8.7597656 29.742188 C 9.1064607 30.920739 9.5727226 32.043065 10.154297 33.101562 L 6.6542969 37.998047 A 1.0001 1.0001 0 0 0 6.7597656 39.285156 L 10.648438 43.175781 A 1.0001 1.0001 0 0 0 11.927734 43.289062 L 16.882812 39.820312 C 17.936999 40.39548 19.054994 40.857928 20.228516 41.201172 L 21.21875 47.164062 A 1.0001 1.0001 0 0 0 22.205078 48 L 27.705078 48 A 1.0001 1.0001 0 0 0 28.691406 47.173828 L 29.751953 41.1875 C 30.920633 40.838997 32.033372 40.369697 33.082031 39.791016 L 38.070312 43.291016 A 1.0001 1.0001 0 0 0 39.351562 43.179688 L 43.240234 39.287109 A 1.0001 1.0001 0 0 0 43.34375 37.996094 L 39.787109 33.058594 C 40.355783 32.014958 40.813915 30.908875 41.154297 29.748047 L 47.171875 28.693359 A 1.0001 1.0001 0 0 0 47.998047 27.707031 L 47.998047 22.207031 A 1.0001 1.0001 0 0 0 47.160156 21.220703 L 41.152344 20.238281 C 40.80968 19.078827 40.350281 17.974723 39.78125 16.931641 L 43.289062 11.933594 A 1.0001 1.0001 0 0 0 43.177734 10.652344 L 39.287109 6.7636719 A 1.0001 1.0001 0 0 0 37.996094 6.6601562 L 33.072266 10.201172 C 32.023186 9.6248101 30.909713 9.1579916 29.738281 8.8125 L 28.691406 2.828125 A 1.0001 1.0001 0 0 0 27.705078 2 L 22.205078 2 z M 23.056641 4 L 26.865234 4 L 27.861328 9.6855469 A 1.0001 1.0001 0 0 0 28.603516 10.484375 C 30.066026 10.848832 31.439607 11.426549 32.693359 12.185547 A 1.0001 1.0001 0 0 0 33.794922 12.142578 L 38.474609 8.7792969 L 41.167969 11.472656 L 37.835938 16.220703 A 1.0001 1.0001 0 0 0 37.796875 17.310547 C 38.548366 18.561471 39.118333 19.926379 39.482422 21.380859 A 1.0001 1.0001 0 0 0 40.291016 22.125 L 45.998047 23.058594 L 45.998047 26.867188 L 40.279297 27.871094 A 1.0001 1.0001 0 0 0 39.482422 28.617188 C 39.122545 30.069817 38.552234 31.434687 37.800781 32.685547 A 1.0001 1.0001 0 0 0 37.845703 33.785156 L 41.224609 38.474609 L 38.53125 41.169922 L 33.791016 37.84375 A 1.0001 1.0001 0 0 0 32.697266 37.808594 C 31.44975 38.567585 30.074755 39.148028 28.617188 39.517578 A 1.0001 1.0001 0 0 0 27.876953 40.3125 L 26.867188 46 L 23.052734 46 L 22.111328 40.337891 A 1.0001 1.0001 0 0 0 21.365234 39.53125 C 19.90185 39.170557 18.522094 38.59371 17.259766 37.835938 A 1.0001 1.0001 0 0 0 16.171875 37.875 L 11.46875 41.169922 L 8.7734375 38.470703 L 12.097656 33.824219 A 1.0001 1.0001 0 0 0 12.138672 32.724609 C 11.372652 31.458855 10.793319 30.079213 10.427734 28.609375 A 1.0001 1.0001 0 0 0 9.6328125 27.867188 L 4.0019531 26.867188 L 4.0019531 23.052734 L 9.6289062 22.117188 A 1.0001 1.0001 0 0 0 10.435547 21.373047 C 10.804273 19.898143 11.383325 18.518729 12.146484 17.255859 A 1.0001 1.0001 0 0 0 12.111328 16.164062 L 8.8261719 11.46875 L 11.523438 8.7734375 L 16.185547 12.105469 A 1.0001 1.0001 0 0 0 17.28125 12.148438 C 18.536908 11.394293 19.919867 10.822081 21.384766 10.462891 A 1.0001 1.0001 0 0 0 22.132812 9.6523438 L 23.056641 4 z M 25 17 C 20.593567 17 17 20.593567 17 25 C 17 29.406433 20.593567 33 25 33 C 29.406433 33 33 29.406433 33 25 C 33 20.593567 29.406433 17 25 17 z M 25 19 C 28.325553 19 31 21.674447 31 25 C 31 28.325553 28.325553 31 25 31 C 21.674447 31 19 28.325553 19 25 C 19 21.674447 21.674447 19 25 19 z"></path>
                            </svg></div>
                        <span>Settings</span>
                    </div>

                    <a href="/logout" class="flex items-center gap-3 px-1 py-1 hover:bg-gray-100 rounded-lg py-2 px-1">
                        <div class="text-2xl">
                            <img src="/public/icons/exit.png" class="h-[24px] " alt="">
                        </div>
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
            <main class="w-[77%] max-lg:w-full md:px-10 max-lg:mt-6 py-6">

                <div class="showpart myprofile flex flex-col items-center juastify-center w-full">
                    <div class="flex justify-between items-center mb-6 w-full ">
                        <h1 class="text-2xl font-bold">My Profile</h1>

                    </div>
                    <div class="w-full mx-auto max-lg:overflow-x-auto bg-white  rounded-lg overflow-hidden">
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
                                    <!-- <button class="text-sm font-medium text-[#f25b21] hover:underline">View Details</button> -->
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
                                    <button class="text-sm font-medium text-[#f25b21] hover:underline">Track Order</button>
                                </div>
                            </div> -->
                    </div>
                    <!-- </div> -->
                </div>


                <div class="showpart setting flex flex-col items-center justify-center w-full hidden">
                    <div
                        class="flex justify-between flex-col items-center mb-6 w-full bg-white  rounded-lg ">
                        <h1 class="text-2xl max-lg:text-lg font-bold w-full  px-6">Profile
                            Setting</h1>

                    </div>

                    <form action="" method="POST" class="w-full" id="profileForm">
                        <div class="w-full mx-auto p-6 bg-white rounded-md  space-y-6">
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