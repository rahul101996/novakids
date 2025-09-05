<?php
$sidebarModules = getSidbarData();
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/CompanyController.php";
$ccontroller = new CompanyController(getDBObject()->getConnection());
$companyData = $ccontroller->getCompanyDetail();
?>

<!-- Main Navigation -->
<nav class="w-full bg-white border-b border-gray-200 px-4  py-3  shadow-sm ">
    <div class="flex w-full justify-between items-center">
        <!-- Logo Section -->
        <a href="/dashboard" class="flex items-center ">
            <img src="/<?= $companyData["logo"] ?>" alt="Company Logo" class="h-8 w-8 rounded-full mr-2">
            <span class="font-bold text-xl text-gray-800"><?= $companyData["company"] ?></span>
        </a>

        <!-- Mobile menu button -->
        <!-- <div class="flex items-center md:hidden">
            <button onclick="toggleFullScreen()" class="mr-2 focus:outline-none">
                <i class="fas fa-expand-arrows-alt text-gray-600 text-2xl"></i>
            </button>
            <button type="button" class="inline-flex items-center p-2 text-gray-500 hover:bg-gray-100 rounded-lg"
                onclick="document.getElementById('navbar-menu').classList.toggle('hidden')">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"></path>
                </svg>
            </button>
        </div> -->


        <!-- Navigation Menu -->
        <div class=" w-[80%]  flex items-center justify-between  " id="navbar-menu">
            <ul class="flex  max-md:hidden items-center justify-around w-[85%]  mb-0 gap-2  text-md ">
                <!-- Mobile Profile Section -->
                <li class="md:hidden border-b border-gray-200 pb-3 mb-1">
                    <div class="flex items-center px-1" onclick="toggleMobileProfileMenu()">
                        <img src="/<?= $companyData["logo"] ?>" class="h-8 w-8 rounded-full" alt="User Image">
                        <span class="ml-2 text-gray-700 font-semibold">Super Admin</span>
                        <svg class="w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path>
                        </svg>
                    </div>
                    <div id="mobileProfileDropdown" class="hidden mt-2 bg-gray-50 rounded-md">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-user mr-2"></i>My Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-cog mr-2"></i>Settings
                        </a>
                        <hr class="my-1">
                        <a href="/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </div>
                </li>

                <!-- Dashboard Link -->
                <li>
                    <a href="/dashboard"
                        class="flex items-center  justify-center  <?= $pageTitle == 'Dashboard' ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' ?> rounded-md">
                        <i class="fa-solid fa-gauge-high mr-2 "></i>Dashboard
                    </a>
                </li>

                <!-- Dynamic Navigation Links -->
                <?php foreach ($sidebarModules as $key => $module) {
                    if (count($module) == 1) {
                        if (checkPageAccess($module[0][0])) { ?>
                            <li>
                                <a href="<?= $module[0][1] ?>"
                                    class="block py-2 px-1 <?= $pageTitle == $module[0][0] ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' ?> rounded-md">
                                    <i class="<?= $module[0][2] ?> mr-2"></i><?= $module[0][0] ?>
                                </a>
                            </li>
                        <?php }
                    } elseif (checkModuleAccess($module)) {
                        $active = checkActiveModule($pageTitle, $module); ?>
                        <li class="relative group">
                            <button class="flex items-center py-2 px-1 <?= ($active) ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' ?> rounded-md" onclick="toggleDropdown(this)">
                                <i class="<?= $module[1] ?> mr-2"></i>
                                <?= $key ?>
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path>
                                </svg>
                            </button>
                            <div class="hidden absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                                <?php foreach ($module[0] as $page) {
                                    if (checkPageAccess($page[0])) { ?>
                                        <a href="<?= $page[1] ?>"
                                            class="block px-4 py-2 text-sm <?= $pageTitle == $page[0] ? 'text-blue-600 bg-gray-200' : 'text-gray-700 hover:bg-gray-100' ?>">
                                            <?= $page[0] ?>
                                        </a>
                                <?php }
                                } ?>
                            </div>
                        </li>
                <?php }
                } ?>


            </ul>

            <div class=" max-md:hidden">
                <a href="/logout" class="flex items-center justify-center px-4 py-2 bg-red-400 text-sm text-white ">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </a>
            </div>

        </div>


        <style>
            .submenu {
                overflow: hidden;
                transition: all 0.3s ease-in-out;
            }

            .submenu:not(.active) {
                display: none;
            }

            .fa-chevron-right {
                transition: transform 0.3s ease;
            }

            .nav-item.active .fa-chevron-right {
                transform: rotate(90deg);
            }
        </style>

        <!-- Hamburger Menu Button -->
        <button id="hamburgerMenu" class=" text-blue-500 p-2  md:hidden flex-end">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M4 6h16M4 12h16m-16 6h16"></path>
            </svg>
        </button>

        <!-- Mobile Menu -->
        <div id="mobileMenu"
            class="fixed inset-0 bg-white z-50 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden flex flex-col">
            <div class="flex justify-between p-4  border-b border-gray-300">
                <!-- Logo Section -->
                <a href="/dashboard" class="flex items-center">
                    <img src="/<?= $companyData["logo"] ?>" alt="Company Logo" class="h-8 w-8 rounded-full mr-1">
                    <span class="font-bold text-xl text-gray-800">RudraTech</span>
                </a>
                <button id="closeMenu" class="text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="flex-grow overflow-y-auto">
                <ul class="flex flex-col">
                    <li>
                        <a href="/dashboard" class="block flex justify-between py-3 px-4 border-b border-gray-200 <?= $pageTitle == 'Dashboard' ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' ?> hover:bg-blue-50 transition-colors duration-200">
                            Dashboard
                        </a>
                    </li>


                    <?php foreach ($sidebarModules as $key => $module) { ?>
                        <?php if (count($module) == 1) { ?>
                            <?php if (checkPageAccess($module[0][0])) { ?>
                                <li>
                                    <a href="<?= $module[0][1] ?>"
                                        class="block flex justify-between py-3 px-4 border-b border-gray-200 hover:bg-blue-50 transition-colors duration-200 <?= $pageTitle == $module[0][0] ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' ?>">
                                        <?= $module[0][0] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } elseif (checkModuleAccess($module)) { ?>
                            <?php $active = checkActiveModule($pageTitle, $module); ?>
                            <li class="sidebar-nav-item">
                                <a class="nav-item block flex justify-between py-3 px-4 border-b border-gray-200 hover:bg-blue-50 transition-colors duration-200 <?= ($active) ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' ?>">
                                    <?= $key ?>
                                    <span class="menu-item-icon text-blue-500">
                                        <i class="fa-solid fa-chevron-right transition-transform duration-200"></i>
                                    </span>
                                </a>
                                <ul class="submenu  pl-8" style="display: <?= $active ? 'block' : 'none' ?>;">
                                    <?php foreach ($module[0] as $page) { ?>
                                        <?php if (checkPageAccess($page[0])) { ?>
                                            <li>
                                                <a href="<?= $page[1] ?>"
                                                    class="block py-2 px-4 <?= $pageTitle == $page[0] ? 'text-blue-600 bg-gray-100' : 'text-gray-700 hover:bg-gray-100' ?>">
                                                    <?= $page[0] ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>

                    <!-- Add this in your <head> section -->
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




                    <!-- <li>
                        <a href="#" class="nav-item block flex justify-between py-3 px-4 border-b border-gray-200 text-gray-700 hover:bg-blue-50 transition-colors duration-200">
                            Purchase
                            <span class="menu-item-icon text-blue-500"><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                        <ul class="submenu bg-gray-50 pl-8">
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Purchase List</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Purchase Add</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-item block flex justify-between py-3 px-4 border-b border-gray-200 text-gray-700 hover:bg-blue-50 transition-colors duration-200">
                            Sale
                            <span class="menu-item-icon text-blue-500"><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                        <ul class="submenu bg-gray-50 pl-8">
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Sale List</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Sale Add</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-item block flex justify-between py-3 px-4 border-b border-gray-200 text-gray-700 hover:bg-blue-50 transition-colors duration-200">
                            Payment
                            <span class="menu-item-icon text-blue-500"><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                        <ul class="submenu bg-gray-50 pl-8">
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Supplier Payment</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Customer Payment </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="block flex justify-between py-3 px-4 border-b border-gray-200 text-gray-700 hover:bg-blue-50 transition-colors duration-200">
                            Cashbook
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block flex justify-between py-3 px-4 border-b border-gray-200 text-gray-700 hover:bg-blue-50 transition-colors duration-200">
                            Income & Expense
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-item block flex justify-between py-3 px-4 border-b border-gray-200 text-gray-700 hover:bg-blue-50 transition-colors duration-200">
                            Reports
                            <span class="menu-item-icon text-blue-500"><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                        <ul class="submenu bg-gray-50 pl-8">
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Supplier Ledger</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Customer Ledger</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-item block flex justify-between py-3 px-4 border-b border-gray-200 text-gray-700 hover:bg-blue-50 transition-colors duration-200">
                            Master
                            <span class="menu-item-icon text-blue-500"><i class="fa-solid fa-chevron-right"></i></span>
                        </a>
                        <ul class="submenu bg-gray-50 pl-8">
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Supplier</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Customer</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Agent</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Transport</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">User</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Roles</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Product</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Unit</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Opening Balance</a></li>
                            <li><a href="#" class="block py-2 px-4 text-gray-600 hover:text-blue-500">Company</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>

            <script>
                $(document).ready(function() {
                    // Set initial state based on active class
                    $('.nav-item').each(function() {
                        if ($(this).hasClass('text-blue-600')) {
                            $(this).siblings('.submenu').show();
                            $(this).find('.fa-chevron-right').addClass('fa-rotate-90');
                        }
                    });

                    // Handle click events
                    $('.nav-item').click(function(e) {
                        e.preventDefault();

                        const submenu = $(this).siblings('.submenu');
                        const icon = $(this).find('.fa-chevron-right');
                        const isOpen = submenu.is(':visible');

                        // Close all other submenus
                        $('.nav-item').not(this).removeClass('active');
                        $('.submenu').not(submenu).slideUp(300);
                        $('.fa-chevron-right').not(icon).removeClass('fa-rotate-90');

                        // Toggle current submenu
                        $(this).toggleClass('active');
                        if (isOpen) {
                            submenu.slideUp(300);
                            icon.removeClass('fa-rotate-90');
                        } else {
                            submenu.slideDown(300);
                            icon.addClass('fa-rotate-90');
                        }
                    });
                });
            </script>


            <div class="border-t border-gray-200">
                <a href="/logout" class="block py-4 px-4 text-red-500 hover:bg-red-50 transition-colors duration-200">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </a>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const hamburgerMenu = document.getElementById('hamburgerMenu');
                const mobileMenu = document.getElementById('mobileMenu');
                const closeMenu = document.getElementById('closeMenu');

                hamburgerMenu.addEventListener('click', function() {
                    mobileMenu.classList.remove('-translate-x-full');
                    mobileMenu.classList.add('translate-x-0');
                });

                closeMenu.addEventListener('click', function() {
                    mobileMenu.classList.remove('translate-x-0');
                    mobileMenu.classList.add('-translate-x-full');
                });
            });
        </script>



        <!-- User Profile with Dropdown -->
        <!-- <div class="hidden w-[10%] md:flex items-center relative">
                        <button onclick="toggleFullScreen()" class="flex items-center space-x-3 focus:outline-none mr-3"><i class="fas fa-expand-arrows-alt text-gray-600 text-2xl"></i></button>
                        <button onclick="toggleProfileMenu()" class="flex items-center space-x-3 focus:outline-none">
                            <img src="/<?= $companyData["logo"] ?>" class="h-4 w-4 rounded-full" alt="User Image">
                            <span class="ml-2 text-gray-700 font-semibold"><?= $_SESSION['name'] ?></span>
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path>
                            </svg>
                        </button> -->

        <!-- Profile Dropdown -->
        <!-- <div id="profileDropdown" class="hidden absolute right-0 mt-48 w-48 bg-white rounded-md shadow-lg z-50">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>My Profile
                            </a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <hr class="my-1">
                            <a href="/logout" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </a>
                                </div>
                            </div>
                        </div> -->

    </div>
</nav>







<script>
    // Track active dropdown
    let activeDropdown = null;

    function toggleDropdown(button) {
        const dropdown = button.nextElementSibling;

        // If clicking the same dropdown that's already open, close it
        if (dropdown === activeDropdown) {
            dropdown.classList.add('hidden');
            activeDropdown = null;
            return;
        }

        // Close any other open dropdown
        if (activeDropdown) {
            activeDropdown.classList.add('hidden');
        }

        // Open the clicked dropdown
        dropdown.classList.remove('hidden');
        activeDropdown = dropdown;
    }

    // Close dropdown only when clicking outside both the button and dropdown
    document.addEventListener('click', function(event) {
        if (activeDropdown &&
            !event.target.closest('button') &&
            !activeDropdown.contains(event.target)) {
            activeDropdown.classList.add('hidden');
            activeDropdown = null;
        }
    });

    function toggleProfileMenu() {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    }

    function toggleMobileProfileMenu() {
        const dropdown = document.getElementById('mobileProfileDropdown');
        dropdown.classList.toggle('hidden');
    }
</script>

<script>
    function toggleFullScreen() {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen();
        } else if (document.exitFullscreen) {
            document.exitFullscreen();
        }
    }
</script>