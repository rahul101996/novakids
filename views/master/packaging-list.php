<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-gray-50">

    <div class="flex h-screen bg-gray-100">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');


        ?>

        <main class="flex-1 md:ml-60">
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
    <div class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)] items-center gap-4 px-4 py-2 text-gray-500 bg-gray-100 rounded">
        <span>Sr. No</span>
        <span>Category</span>
        <span>Image</span>
        <span>Action</span>
    </div>

    <!-- Table Rows -->
    <?php foreach ($categories as $key => $category) { ?>
        <div class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,1fr)_minmax(0,1fr)] items-center gap-4 px-4 py-3 hover:bg-gray-50 text-gray-800 rounded">
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

            <!-- Category Title -->
            <div class="font-medium"><?= htmlspecialchars($category['category']) ?></div>

            <!-- Image -->
            <div>
                <img src="/<?= htmlspecialchars($category['img']) ?>" class="w-24 rounded" alt="Category Image">
            </div>

            <!-- Action -->
            <div class="flex space-x-2">
                <a href="/edit-category/<?= $category['id'] ?>" class="text-blue-500 hover:text-blue-600"><i class="fa-solid fa-pen"></i></a>
                <a href="/delete-category/<?= $category['id'] ?>" class="text-red-500 hover:text-red-600"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    <?php } ?>
</div>





        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
</body>

</html>