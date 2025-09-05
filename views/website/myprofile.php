<?php
if (!isset($_SESSION['userid']) || empty($_SESSION['userid'])) {

    header('Location:/login');
    exit();
}

// printWithPre($_SESSION);
if (isset($_POST['update_password'])) {
    unset($_POST['update_password']);
    if (password_verify($_POST['current_password'], $userData['password'])) {
        // echo "Password Match";
        $data = [
            'password' => password_hash($_POST['new_password'], PASSWORD_DEFAULT)
        ];
        // die();
        $userData = update($data, $_SESSION['userid'], "online_users");
        if ($userData) {
            $_SESSION['success'] = "Password Updated Successfully";
            header('Location:/myprofile');
            exit();
        } else {
            $_SESSION['err'] = "Failed to update password";
            header('Location:/myprofile');
            exit();
        }
    } else {
        $_SESSION['err'] = "Password Not Match";
        header('Location:/myprofile');
        exit();
    }
}
if (isset($_POST['update_profile'])) {
    unset($_POST['update_profile']);



    $user = update($_POST, $_SESSION['userid'], "online_users");
    //     printWithPre($_POST);
    // die();
    if ($user) {
        $_SESSION['success'] = "Profile Updated Successfully";
        header('Location:/myprofile');
        exit();
    } else {
        $_SESSION['err'] = "Failed to update profile";
        header('Location:/myprofile');
        exit();
    }
}



$PageTitle = "My Profile";




// printWithPre($enrolled_courses);
$NumberOfEnrolledCourses = [];


// printWithPre($quiz_attempts);

// printWithPre($NumberOfQuizAttempts);

if (!empty($_POST)) {

    if (isset($_POST['profile_form'])) {
        unset($_POST['profile_form']);
        printWithPre($_FILES['profile_image']);
        $imgpath = uploadFile($_FILES['profile_image'], "public/uploads/profile/");
        $_POST['profile_img'] = $imgpath;
        // printWithPre($_POST);
        // die();
        $user = update($_POST, $_SESSION['userid'], "online_users");
        if ($user) {
            $_SESSION['profile_img'] = $imgpath;
            $_SESSION['success'] = "Profile Updated Successfully";
            header('Location:/myprofile');
            exit();
        } else {
            $_SESSION['err'] = "Failed to update profile";
            header('Location:/myprofile');
            exit();
        }
    }
    if (isset($_POST['cover_form'])) {
        unset($_POST['cover_form']);
        // printWithPre($_FILES['cover_img']);
        $imgpath = uploadFile($_FILES['cover_img'], "public/uploads/cover/");
        $_POST['cover_img'] = $imgpath;
        // printWithPre($_POST);
        // die();
        $user = update($_POST, $_SESSION['userid'], "online_users");
        if ($user) {
            $_SESSION['cover_img'] = $imgpath;
            $_SESSION['success'] = "Profile Updated Successfully";
            header('Location:/myprofile');
            exit();
        } else {
            $_SESSION['err'] = "Failed to update profile";
            header('Location:/myprofile');
            exit();
        }
    }
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
    <div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-[999909] hidden" id="modalBackdrop">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 bg-white w-[40%] max-lg:w-[85%] min-h-[50%] flex items-center justify-center -translate-y-1/2 rounded-3xl">
            <div class="absolute top-2 right-2 ">
                <button type="button" id="closeProfileModal" onclick="CloseProfileModal()" class="text-gray-500 hover:text-gray-700 hover:rotate-[45deg] transition-transform duration-300">
                    <img src="/public/images/cross.webp" class="h-10 max-lg:h-7">
                </button>
            </div>
            <form action="" method="POST" class="w-full flex flex-col items-center justify-center" enctype="multipart/form-data">
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md w-[80%]">
                    <div class="space-y-1 text-center">
                        <div id="imagePreview" class="hidden mb-4">
                            <!-- <input type="hidden" name="old_vdata_image" value=""> -->
                            <img src="" alt="Preview" class="mx-auto h-32 object-cover">
                        </div>
                        <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="vdata_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                <span>Upload a file</span>
                                <input id="vdata_image" name="profile_image" type="file" class="sr-only" accept="image/*" required>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                <button name="profile_form" class="bg-indigo-600 border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4">Upload</button>
            </form>
        </div>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-[999909] hidden" id="CoverBackdrop">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 bg-white w-[40%] max-lg:w-[85%] min-h-[50%] flex items-center justify-center -translate-y-1/2 rounded-3xl">
            <div class="absolute top-2 right-2 ">
                <button type="button" id="closeProfileModal" onclick="CloseCoverModal()" class="text-gray-500 hover:text-gray-700 hover:rotate-[45deg] transition-transform duration-300">
                    <img src="/public/images/cross.webp" class="h-10">
                </button>
            </div>
            <form action="" method="POST" class="w-full flex flex-col items-center justify-center" enctype="multipart/form-data">
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md w-[80%]">
                    <div class="space-y-1 text-center">
                        <div id="coverimgPreview" class="hidden mb-4">
                            <!-- <input type="hidden" name="old_vdata_image" value=""> -->
                            <img src="" alt="Preview" class="mx-auto h-32 object-cover">
                        </div>
                        <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="vdata_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                <span>Upload a file</span>
                                <input id="cover_img" name="cover_img" type="file" class="" accept="image/*" required>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                <button name="cover_form" class="bg-indigo-600 border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-4">Upload</button>
            </form>
        </div>
    </div> <input type="hidden" value="/constitution-of-india/" id="url">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
    <div class="bg-[url('/public/images/dashboard-bg-shape-1.jpg')] bg-cover bg-center bg-no-repeat min-h-screen w-full flex items-center justify-center py-10 flex-col bg-[#eff2fa]">
        <div class="relative w-[80%] max-lg:w-[90%] flex flex-col items-center justify-center h-[50vh] max-lg:h-[30vh] ">
            <div class="relative w-full flex items-center justify-center h-full">
                <img src="/<?= isset($userData['cover_img']) && !empty($userData['cover_img']) ? $userData['cover_img'] : 'public/images/cover-photo.jpg' ?>" class="w-full h-full object-cover  rounded-3xl" alt="">
            </div>
            <div class="absolute lg:bottom-6  max-lg:top-2 right-6 bg-[#272c6c] py-2 px-4 text-white max-lg:text-xs rounded  flex gap-4 cursor-pointer" onclick="OpenCoverModal()">
                <img src="/public/images/camera-icon-white.png" class="w-[26px] h-[26px] max-lg:w-[16px] max-md:h-[16px] " alt="">
                Update Cover Photo
            </div>
            <div class="absolute -bottom-[20%] max-lg:-bottom-[20%] left-[5%] w-[12vw] h-[12vw] max-lg:w-[24vw] max-lg:h-[24vw] flex items-center justify-center rounded-full border-[10px] max-lg:border-[5px] border-white bg-white rounded-full  shadow-xl">
                <img src="/<?= isset($_SESSION['profile_img']) && !empty($_SESSION['profile_img']) ? $_SESSION['profile_img'] : 'public/images/profile-photo.png' ?>" class="w-full h-full object-cover rounded-full" alt="">
                <div class="absolute top-0 left-0 w-full h-full rounded-full">
                    <div class="absolute top-6 max-lg:top-2 -right-[5%] max-lg:-right-[10%] bg-white p-2 max-lg:p-1 rounded-full z-[1] cursor-pointer" onclick="OpenProfileModal()">
                        <img src="/public/images/camera-icon.png" class="w-[30px] h-[30px] max-lg:w-[24px] max-lg:h-[24px]" alt="">
                    </div>
                </div>
            </div>
            <div class="absolute bottom-[10%] max-lg:bottom-[3%] md:left-[22%] max-lg:right-[5%]  flex items-center justify-center ">
                <h2 class="text-3xl max-lg:text-xl font-semibold text-white"><?= $_SESSION['username'] ?></h2>
            </div>
        </div>
        <script>
            function OpenProfileModal() {
                document.getElementById('modalBackdrop').classList.remove('hidden');
            }

            function CloseProfileModal() {
                document.getElementById('modalBackdrop').classList.add('hidden');
            }

            function OpenCoverModal() {
                document.getElementById('CoverBackdrop').classList.remove('hidden');
            }

            function CloseCoverModal() {
                document.getElementById('CoverBackdrop').classList.add('hidden');
            }
        </script>
        <div class="flex max-lg:flex-col my-[14vh] max-lg:mt-[8vh] w-[80%] max-lg:w-[90%] items-start justify-start">
            <!-- Sidebar -->
            <aside class="w-[23%] max-lg:w-full bg-white shadow-md p-6 rounded-tr-2xl rounded-br-2xl md:sticky top-4 max-lg:hidden">
                <h2 class="text-sm text-gray-500 mb-4 uppercase tracking-wide">Welcome</h2>
                <nav class="space-y-3 text-gray-700 font-medium">
                    <div class="flex hover:bg-gray-100 items-center gap-3 activeTab px-4 py-2 rounded-lg sidenav " onclick="showPart('dashboard', this)">
                        <div class="text-xl"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M16.0041 5.216V1.584C16.0041 0.456 15.4921 0 14.2201 0H10.9881C9.7161 0 9.2041 0.456 9.2041 1.584V5.208C9.2041 6.344 9.7161 6.792 10.9881 6.792H14.2201C15.4921 6.8 16.0041 6.344 16.0041 5.216Z" fill="currentColor"></path>
                                <path d="M16.0041 14.216V10.984C16.0041 9.71195 15.4921 9.19995 14.2201 9.19995H10.9881C9.7161 9.19995 9.2041 9.71195 9.2041 10.984V14.216C9.2041 15.488 9.7161 16 10.9881 16H14.2201C15.4921 16 16.0041 15.488 16.0041 14.216Z" fill="currentColor"></path>
                                <path d="M6.8 5.216V1.584C6.8 0.456 6.288 0 5.016 0H1.784C0.512 0 0 0.456 0 1.584V5.208C0 6.344 0.512 6.792 1.784 6.792H5.016C6.288 6.8 6.8 6.344 6.8 5.216Z" fill="currentColor"></path>
                                <path opacity="0.4" d="M6.8 14.216V10.984C6.8 9.71195 6.288 9.19995 5.016 9.19995H1.784C0.512 9.19995 0 9.71195 0 10.984V14.216C0 15.488 0.512 16 1.784 16H5.016C6.288 16 6.8 15.488 6.8 14.216Z" fill="currentColor"></path>
                            </svg></div>
                        <span>Dashboard</span>
                    </div>
                    <div onclick="showPart('myprofile',this)" class="flex items-center gap-3 px-1 py-1 hover:bg-gray-100 rounded-lg sidenav">
                        <div class="text-2xl">👤</path>
                            </svg></div>
                        <span>My Profile</span>
                    </div>
                    <div class="flex items-center gap-3 px-1 py-1 hover:bg-gray-100 rounded-lg sidenav " onclick="showPart('enrolled_courses',this)">
                        <div class="text-2xl">🎓</div>
                        <span>Enrolled Courses</span>
                    </div>


                    <div onclick="showPart('setting',this)" class="flex items-center gap-3 px-1 py-1 hover:bg-gray-100 rounded-lg sidenav">
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
                    <div onclick="showPart('dashboard', this)"
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-lg activeTab sidenav">
                        <span class="text-xl">🏠</span>
                        <span>Dashboard</span>
                    </div>
                    <div onclick="showPart('myprofile', this)"
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-lg sidenav">
                        <span class="text-xl">👤</span>
                        <span>My Profile</span>
                    </div>
                    <div onclick="showPart('enrolled_courses', this)"
                        class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 rounded-lg sidenav">
                        <span class="text-xl">🎓</span>
                        <span>Enrolled Courses</span>
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
                <div class="showpart dashboard">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold">Dashboard</h1>
                        <!-- <button class="border border-indigo-500 text-indigo-500 px-4 py-2 max-lg:py-1 rounded hover:bg-indigo-100">Click Here</button> -->
                    </div>

                    <!-- Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4">
                            <div class="bg-purple-100 text-purple-600 p-3 rounded-full text-2xl">
                                🎓
                            </div>
                            <div>
                                <div class="text-2xl font-bold"><?= count($Enrolled_courses); ?></div>
                                <div class="text-gray-500 text-sm">Enrolled Courses</div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4 hidden">
                            <div class="bg-orange-100 text-orange-500 p-3 rounded-full text-2xl">
                                📘
                            </div>
                            <div>
                                <div class="text-2xl font-bold">0</div>
                                <div class="text-gray-500 text-sm">Upcoming Exams</div>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow p-6 flex items-center gap-4 hidden">
                            <div class="bg-cyan-100 text-cyan-500 p-3 rounded-full text-2xl">
                                🏆
                            </div>
                            <div>
                                <div class="text-2xl font-bold">0</div>
                                <div class="text-gray-500 text-sm">Completed Exams</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="showpart myprofile flex flex-col items-center juastify-center w-full hidden">
                    <div class="flex justify-between items-center mb-6 w-full ">
                        <h1 class="text-2xl font-bold">My Profile</h1>

                    </div>
                    <div class="w-full mx-auto max-lg:overflow-x-auto bg-white shadow-md rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700 ">
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3 w-1/3">Registration Date</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 font-semibold text-gray-900">May 26, 2025 6:54 am</td>
                                </tr>
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3"> Name</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3"><?= $userData['fname'] ?> <?= $userData['lname'] ?></td>
                                </tr>
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3">Email</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3"><?= $userData['username'] ?></td>
                                </tr>
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3">Phone Number</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 "><?= $userData['mobile'] ?></td>
                                </tr>

                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3">State</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 "><?= $userData['state_name'] ?></td>
                                </tr>
                                <tr>
                                    <td class="bg-gray-50 font-medium px-6 py-4 max-lg:px-4 max-lg:py-3">District</td>
                                    <td class="px-6 py-4 max-lg:px-4 max-lg:py-3 "><?= $userData['district_name_en'] ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>



                <div class="showpart setting flex flex-col items-center justify-center w-full hidden">
                    <div class="flex justify-between flex-col items-center mb-6 w-full bg-white  rounded-lg border border-gray-200">
                        <h1 class="text-2xl max-lg:text-lg font-bold py-4 w-full border-b border-gray-200  px-6">Profile Setting</h1>
                        <div class="w-full flex items-center justify-start px-6 text-lg  gap-3 ">
                            <span class="py-4  px-7 max-lg:text-sm cursor-pointer hover:bg-gray-100 active_profile profile_tab edit_profile">Profile</span>
                            <span class="profile_tab py-4  px-7 max-lg:text-sm cursor-pointer hover:bg-gray-100 change_password">Password</span>
                        </div>

                    </div>

                    <form action="" method="POST" class="w-full" id="profileForm">
                        <div class="w-full mx-auto p-6 bg-white rounded-md shadow-md space-y-6">
                            <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                                    <input type="text" value="<?= $userData['fname'] ?>" name="fname" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />

                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>

                                    <input type="text" value="<?= $userData['lname'] ?>" name="lname" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="text" value="<?= $userData['username'] ?>" name="email" class="w-full border border-gray-300 bg-gray-100 rounded-md px-4 py-2" disabled required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                    <input type="text" placeholder="Phone Number" name="mobile" value="<?= $userData['mobile'] ?>" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                                </div>

                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                                    <input type="date" value="<?= $userData['dob'] ?>" name="dob" class="w-full border border-gray-300  rounded-md px-4 py-2" required />
                                </div>

                            </div>


                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                                    <select type="text" value="<?= $userData['state'] ?>" name="state" class="w-full border border-gray-300  rounded-md px-4 py-2" required>
                                        <option value="">Select State</option>
                                        <?php foreach ($states as $State) { ?>
                                            <option value="<?php echo $State['id']; ?>" <?= $State['id'] == $userData['state'] ? 'selected' : ''  ?>><?php echo $State['state_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">District</label>

                                    <select name="district" id="district" class="input-field w-full px-3 py-2 border border-gray-200 focus:outline-none text-sm" required>
                                        <option value="">Select District</option>
                                        <?php foreach ($Districts as $District) { ?>
                                            <option value="<?php echo $District['id']; ?>" <?= $District['id'] == $userData['district'] ? 'selected' : ''  ?>><?php echo $District['district_name_en']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button class="bg-[#272c6c] border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  " name="update_profile">
                                    Update Profile
                                </button>
                            </div>
                        </div>

                    </form>
                    <form action="" method="POST" class="w-full hidden" id="passwordForm">
                        <div class="w-full mx-auto p-6 bg-white rounded-md shadow-md space-y-6">

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                                <input type="password" value="" name="current_password" class="w-[50%] max-lg:w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
                            </div>
                            <div class="relative w-[50%] max-lg:w-full">
                                <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                                <input type="password" name="new_password" id="newpassword" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                <i class="fa-regular fa-eye absolute right-2 top-[70%] transform -translate-y-1/2 cursor-pointer" id="togglePassword"></i>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Repeat Password</label>
                                <input type="password" name="repeat_password" id="repeatpassword" class="w-[50%] max-lg:w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                                <p id="passwordError" class="text-red-500 text-sm mt-1 hidden">Passwords do not match.</p>
                            </div>

                            <div class="mt-4">
                                <button id="submitBtn" disabled class="bg-[#272c6c] opacity-50 cursor-not-allowed border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white" name="update_password">
                                    Update Password
                                </button>
                            </div>

                        </div>
                    </form>

                </div>


                <div class="showpart enrolled_courses flex flex-col items-center justify-center w-full hidden">
                    <div class="flex justify-between items-center mb-6 w-full ">
                        <h1 class="text-2xl font-bold">Enrolled Courses</h1>

                    </div>
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 items-center justify-center gap-5">
                        <?php
                        foreach ($Enrolled_courses as $courseData) {
                            $course = getData2("SELECT * FROM `all_courses` WHERE `id` = '$courseData[course_id]'")[0];

                            // printWithPre($course);
                        ?>
                            <div class="w-full max-lg:w-full flex flex-col items-start justify-center border border-gray-300 rounded-lg ">
                                <div class="w-full flex flex-col items-start justify-center">
                                    <img src="/<?= $course['image'] ?>" class="w-full rounded-lg" alt="">
                                </div>
                                <div class="w-full flex flex-col items-start justify-center p-3 bg-[#001e4f] text-yellow-400 font-semibold">
                                    <span class="text-xs text-white bg-[#603eae] px-2 py-1 rounded-lg tracking-widest font-semibold uppercase">COURSE Description</span>
                                    <h2 class="text-lg font-semibold mt-3 text-red-500 bg-yellow-400 rounded-lg px-2"><?= $course['name'] ?></h2>
                                    <p class="text-sm text-gray-500 mt-1"><?= $course['description'] ?></p>
                                    <p class="mt-3"><span class="line-through text-gray-100">₹<?= $course['regular_fee'] ?>.00</span>&ensp;<span class="font-semibold">₹<?= $course['discount_fee'] ?>.00</span></p>
                                    <input type="price" name="price" value="<?= $course['discount_fee'] ?>" hidden>
                                    <input type="text" name="course_id" value="<?= $course['id'] ?>" hidden>
                                    <input type="text" name="course_name" value="<?= $course['name'] ?>" hidden>


                                    

                                </div>
                            </div>

                        <?php
                        }
                        ?>
                        


                    </div>


                </div>



        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

        <script>
            async function openModal(orderId) {
                document.getElementById('productModal').classList.remove('hidden');
                await getbillproduct(orderId);
            }

            function closeModal() {
                document.getElementById('productModal').classList.add('hidden');
            }

            async function getbillproduct(Order_Id) {
                console.log("Order ID is :" + Order_Id); // Debugging to check Order_Id
                try {
                    const result = await axios.post('', new URLSearchParams({
                        order_id: Order_Id, // Order ID is passed in the request body
                    }));

                    console.log(result); // Debugging to check the response data
                    let tr = '';
                    let count = 1;
                    let t = 0;
                    // Loop through the result data and create table rows dynamically
                    result.data.products.forEach((ele, i) => {
                        console.log(ele);
                        total_amount = parseInt(ele["amount"]) * parseInt(ele["quantity"]);
                        t = t + parseInt(total_amount)
                        tr += ` <tr>
                            <td class="px-4 py-2 border">${count++}</td>
                            <td class="px-4 py-2 border">
                                <div class="h-40 w-[125px] overflow-hidden">
                                    <img src="/${ele['image']}" class="w-full h-full object-cover" alt="">
                                </div>
                            </td>
                            <td class="px-4 py-2 border">${ele['title']}
                            </td>
                            
                            <td class="px-4 py-2 border">${ele['quantity']}</td>
                            <td class="px-4 py-2 border">₹${extractGst(ele['amount']).base_price}</td>
<td class="px-4 py-2 border">₹${extractGst(total_amount).base_price}</td>

                        </tr>`;


                        if (ele.coupon_secret != '') {
                            document.getElementById("coupon_secret").innerHTML = '(' + ele.coupon_secret + ')';
                            document.getElementById("discount").innerHTML = '- ' + ele.coupon_discount;
                            document.getElementById("discountRow").hidden = false;
                        } else {
                            document.getElementById("discountRow").hidden = true;
                        }


                        document.getElementById("delivery").innerHTML = '+ ' + ele.delivery_charges;


                        document.getElementById("total").innerHTML = ele.total_amount;
                        // let subtotal = ele.total_amount += ele.total_amount
                    })

                    document.getElementById("sub_total").innerHTML = extractGst(t)['base_price'];
                    document.getElementById("gst_inc").innerHTML = extractGst(t)['gst_amount'];



                    // Insert the generated rows into the table body
                    document.getElementById("productTable").innerHTML = tr;
                } catch (error) {
                    console.error("Error fetching product data:", error);
                }
            }

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

            const imageInput = document.getElementById('vdata_image');
            const imagePreview = document.getElementById('imagePreview');
            const previewImg = imagePreview.querySelector('img');

            const coverimageInput = document.getElementById('cover_img');
            const coverimagePreview = document.getElementById('coverimgPreview');
            const coverpreviewImg = coverimagePreview.querySelector('img');

            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
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
            coverimageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file && coverpreviewImg) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        coverpreviewImg.src = e.target.result;
                        coverimagePreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
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