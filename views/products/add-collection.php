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
            <div class="p-3 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-1">
                        <button class="bg-gray-200 text-gray-800 px-3 py-1.5 rounded-md text-sm font-medium">All</button>
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
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
                <div class="grid grid-cols-[auto_minmax(0,3fr)_minmax(0,1fr)_minmax(0,2fr)] items-center gap-4 px-4 py-2 text-gray-500">
                    <input type="checkbox" class="h-4 w-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                    <span>Title</span>
                    <span>Products</span>
                    <span>Product conditions</span>
                </div>

                <div class="divide-y divide-gray-200">
                    <div class="grid grid-cols-[auto_minmax(0,3fr)_minmax(0,1fr)_minmax(0,2fr)] items-center gap-4 px-4 py-3 hover:bg-gray-50 text-gray-800">
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" class="h-4 w-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <svg class="h-4 w-4 text-gray-400 cursor-grab" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="9" cy="6" r="1.5"/>
                                <circle cx="15" cy="6" r="1.5"/>
                                <circle cx="9" cy="12" r="1.5"/>
                                <circle cx="15" cy="12" r="1.5"/>
                                <circle cx="9" cy="18" r="1.5"/>
                                <circle cx="15" cy="18" r="1.5"/>
                            </svg>
                        </div>
                        <div class="font-medium">Latest Collections</div>
                        <div>9</div>
                        <div></div>
                    </div>
                    <div class="grid grid-cols-[auto_minmax(0,3fr)_minmax(0,1fr)_minmax(0,2fr)] items-center gap-4 px-4 py-3 hover:bg-gray-50 text-gray-800">
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" class="h-4 w-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                            <svg class="h-4 w-4 text-gray-400 cursor-grab" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="9" cy="6" r="1.5"/>
                                <circle cx="15" cy="6" r="1.5"/>
                                <circle cx="9" cy="12" r="1.5"/>
                                <circle cx="15" cy="12" r="1.5"/>
                                <circle cx="9" cy="18" r="1.5"/>
                                <circle cx="15" cy="18" r="1.5"/>
                            </svg>
                        </div>
                        <div class="font-medium">Home page</div>
                        <div>1</div>
                        <div></div>
                    </div>
                </div>
            </div>

            <div class="p-6 text-center text-sm text-gray-600 border-t border-gray-200">
                Learn more about <a href="#" class="text-blue-600 hover:underline">collections</a>
            </div>

        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
</body>

</html>