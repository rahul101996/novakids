<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-[#1a1a1a] overflow-hidden">

    <div class="flex">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');

        ?>

        <main class="flex-1 md:ml-[16.5rem] md:mt-[3.7rem] bg-[#f1f1f1] rounded-tr-3xl  h-[92vh] overflow-y-scroll">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-full flex items-center justify-between p-3">
                <span class="text-xl font-semibold text-gray-800">Packaging</span>
                <a href="/admin/add-packaging" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add Packaging</a>
            </div>
            <div class="p-3 border-b border-gray-200">
                <div class="flex justify-between items-center">

                    <div class="flex items-center space-x-1">
                        <button class="bg-gray-200 text-gray-800 px-3 py-1.5 rounded-md text-sm font-medium">All</button>

                    </div>
                    <div class="flex items-center space-x-1">
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h18M3 12h18M3 16h18" stroke-opacity="0.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h12M3 12h6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="w-full text-sm">
                <!-- Table Header -->
                <div class="space-y-2">
                    <!-- Table Header -->
                    <div class="grid grid-cols-[auto_minmax(0,3fr)_minmax(0,1fr)] items-center gap-10 px-4 py-2 text-gray-500 bg-gray-100 rounded">
                        <span>Sr. No</span>
                        <span>Package</span>
                        <span>Action</span>
                    </div>

                    <!-- Table Rows -->
                    <?php foreach ($packages as $key => $package) { ?>
                        <div class="grid grid-cols-[auto_minmax(0,3fr)_minmax(0,1fr)] items-center gap-10 px-4 py-3 hover:bg-gray-50 text-gray-800 rounded">
                            <!-- Sr. No -->
                            <div class="flex items-center space-x-3">
                                <span><?= $key + 1 ?></span>
                                <svg class="h-4 w-4 text-gray-400 cursor-grab" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9" cy="6" r="1.5" />
                                    <circle cx="15" cy="6" r="1.5" />
                                    <circle cx="9" cy="12" r="1.5" />
                                    <circle cx="15" cy="12" r="1.5" />
                                    <circle cx="9" cy="18" r="1.5" />
                                    <circle cx="15" cy="18" r="1.5" />
                                </svg>
                            </div>

                            <!-- Package Title and Image -->
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center w-full justify-start p-4 border border-gray-300 rounded gap-6">
                                    <?php
                                    if($package['package_type'] == "box"){
                                        echo '<i class="fa-solid fa-box text-gray-500 text-3xl"></i>';
                                    }elseif($package['package_type'] == "envelope"){
                                        echo '<i class="fa-solid fa-envelope-open text-gray-500 text-3xl"></i>';
                                    }else{
                                        echo '<i class="fa-solid fa-door-closed text-gray-500 text-3xl"></i>';
                                    }
                                    
                                    ?>
                                    <div class="flex flex-col items-start justify-start">
                                        <div class="text-gray-800 text-xl mb-0 flex items-center gap-2 justify-start">
                                            <p class=" mb-0"><?= $package['package_name'] ?></p>
                                            <?php
                                            if ($package['is_default'] == 1) {
                                                echo '<span class="text-gray-500 bg-white px-3 py-1 rounded-full text-xs border border-gray-300">Store default</span>';
                                            }
                                            ?>
                                        </div>
                                        <div class="flex items-center justify-start mt-1 text-gray-600 gap-3 text-lg">
                                            <span><?= $package['length'] ?></span>
                                            <span>X</span>
                                            <span><?= $package['width'] ?></span>
                                            <span>X</span>
                                            <span><?= $package['height'] ?></span> :
                                            <span><?= $package['dimentions_unit'] ?></span>
                                            <span class="ml-4"><?= $package['weight'] ?></span>
                                            <span><?= $package['weight_unit'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action -->
                            <div class="flex space-x-2">
                                <a href="/edit-package/<?= $package['id'] ?>" class="text-blue-500 hover:text-blue-600"><i class="fa-solid fa-pen"></i></a>
                                <a href="/delete-package/<?= $package['id'] ?>" class="text-red-500 hover:text-red-600"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>



            </div>


        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
</body>

</html>