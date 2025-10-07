<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-gray-100">

    <div class="flex h-screen ">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');

        ?>

        <main class="flex-1 md:ml-60">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-full flex items-center justify-between p-3">
                <span class="text-xl font-semibold text-gray-800">Customers</span>
                <!-- <div>
                    <button class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Import</button>
                    <button class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Export</button>
                </div> -->
            </div>
            <div class="p-3 border-b border-gray-200">
                <div class="flex justify-between items-center">

                    <div class="flex items-center space-x-1">
                        <button
                            class="bg-gray-200 text-gray-800 px-3 py-1.5 rounded-md text-sm font-medium">All</button>

                    </div>
                    <!-- <div class="flex items-center space-x-1">
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <button class="text-gray-500 hover:bg-gray-100 p-2 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h18M3 12h18M3 16h18"
                                    stroke-opacity="0.5" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18M3 8h12M3 12h6" />
                            </svg>
                        </button>
                    </div> -->
                </div>
            </div>

            <div class="w-full text-sm overflow-x-scroll">
                <!-- Table Header -->
                <div
                    class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,2fr)_minmax(0,3fr)_minmax(0,1fr)_minmax(0,0.5fr)_minmax(0,0.5fr)] items-center gap-4 px-4 py-2 text-gray-500">
                    <span>Sr. No</span>
                    <span>Customer Name</span>
                    <span>Product</span>
                    <span>Rating</span>
                    <span>Review</span>
                    <span>Actions</span>
                </div>

                <?php foreach (getData2("SELECT
                                                    tpr.*,
                                                    tp.name AS product_name,
                                                    tc.fname,
                                                    tc.lname,
                                                    tc.username,
                                                    tc.mobile
                                                FROM
                                                    `tbl_product_review` tpr
                                                LEFT JOIN online_users tc ON
                                                    tpr.userid = tc.id
                                                LEFT JOIN tbl_products tp ON
                                                    tpr.product_id = tp.id
                                                ORDER BY tpr.id DESC") as $key => $customer) { ?>

                    <!-- Table Row -->
                    <div
                        class="grid grid-cols-[auto_minmax(0,2fr)_minmax(0,2fr)_minmax(0,3fr)_minmax(0,1fr)_minmax(0,0.5fr)_minmax(0,0.5fr)] items-center gap-4 px-4 py-3 hover:bg-gray-50 text-gray-800">
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

                        <div class="font-medium">
                            <div class="flex items-center justify-start gap-5">
                                <?= $customer['fname'] ?>     <?= $customer['lname'] ?> ( <?= $customer['mobile'] ?> )
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-700 font-semibold"><?= $customer['product_name'] ?> </span>
                        </div>

                        <div>
                            <span class="text-green-500 font-semibold"><?= $customer['rating'] ?> Stars</span>
                        </div>

                        <div>
                            <p class="text-gray-500 font-semibold"><?= $customer['reviewText'] ?></p>
                        </div>


                        <div class="">
                            <div
                                class="relative inline-block w-14 mr-2 align-middle select-none">
                                <input type="checkbox" id="togglr_<?= $customer['id'] ?>"
                                    <?= $customer['status'] == 1 ? 'checked' : '' ?>
                                    onchange="updateStatus(this, <?= $customer['id'] ?>)"
                                    class="sr-only peer">

                                <label for="togglr_<?= $customer['id'] ?>"
                                    class="block overflow-hidden h-7 rounded-full bg-gray-200 cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-sky-800 before:content-[''] before:absolute before:top-0.5 before:left-0.5 before:bg-sky-50 before:border-2 before:border-gray-300 before:h-6 before:w-6 before:rounded-full before:transition-all before:duration-300 before:shadow-md peer-checked:before:translate-x-7 peer-checked:before:border-sky-800">
                                    <span
                                        class="absolute inset-y-0 left-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-sky-50 peer-checked:translate-x-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                    <span
                                        class="absolute inset-y-0 right-0 flex items-center justify-center w-7 h-7 text-gray-400 transition-all duration-300 ease-in-out peer-checked:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </label>
                            </div>
                        </div>


                    </div>
                <?php } ?>
            </div>
        </main>
    </div>


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>

    <script>
        async function updateStatus(ele, id) {
            let data = {
                id,
                status: ele.checked ? "1" : "0"
            };

            ele.disabled = true;
            const label = ele.nextElementSibling;
            label.classList.add('opacity-70');

            try {
                let res = await fetch('/api/customer-reviews/status', {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(data),
                });

                let response = await res.json();

                // console.log(response);

                if (response.success) {
                    toastr.success(response.message);
                } else {
                    ele.checked = !ele.checked; // revert state
                    toastr.error(response.message);
                }
            } catch (e) {
                ele.checked = !ele.checked; // revert state on error
                toastr.error("Something went wrong!");
                // console.log(e);
            } finally {
                ele.disabled = false;
                label.classList.remove('opacity-70');
            }
        }
    </script>

</body>

</html>