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
                <span class="text-xl font-semibold text-gray-800 flex">
                    <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Customers Reviews</span>
                <div>
                   
                </div>
            </div>
            <div class="w-full flex items-center justify-center pb-4">
                <div class="w-[97%] flex items-start justify-center gap-3 flex-col bg-white rounded-2xl">
                    <div class="w-full flex items-center justify-between mt-2 px-2">
                        <div class="relative w-[45vw]">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#626262">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" placeholder="Search Customers" class="bg-white w-full pl-10 pr-4 py-1 rounded-xl border border-gray-300 focus:border-gray-600 focus:bg-gray-200 placeholder:text-[#626262] outline-none transition">

                        </div>

                    </div>
                    <table class="w-full text-sm">
                        <!-- Table Header -->
                        <thead class="sticky top-0 left-0 shadow-sm z-10">
                            <tr class="bg-[#f7f7f7] text-[#616161] border-y border-gray-200">
                                <?php
                                $headers = ['Customer name', 'Product name', 'Rating', 'review', 'Status'];
                                foreach ($headers as $header): ?>
                                    <th class="font-semibold py-2 px-3 w-[20%] <?= ($header == 'Status' ? 'text-right' : 'text-left') ?>">
                                        <?= $header ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <?php foreach (
                                getData2("SELECT
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
                                                ORDER BY tpr.id DESC") as $key => $customer
                            ):
                                $id = $customer['id'];
                            ?>
                                <tr
                                    class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 
                           hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] 
                           transition-all duration-200 ease-in-out">
                                    <td class="font-semibold py-2 px-3 text-left"><?= htmlspecialchars($customer['fname'] . ' ' . $customer['lname']) ?></td>
                                    <td class="font-semibold py-2 px-3 text-left"><?= $customer['product_name'] ?></td>
                                    <td class="font-semibold py-2 px-3 text-left capitalize"><?= $customer['rating'] ?> Star</td>
                                    <td class="font-semibold py-2 px-3 text-left"><?= $customer['rating'] ?> Star</td>
                                    <td class="font-semibold py-2 px-3 text-right">
                                        <div
                                            class="relative inline-block w-14 mr-2 align-middle select-none">
                                            <input type="checkbox" id="togglr_<?= $customer['id'] ?>"
                                                <?= $customer['status'] == 1 ? 'checked' : '' ?>
                                                onchange="updateStatus(this, <?= $customer['id'] ?>)"
                                                class="sr-only peer">

                                            <label for="togglr_<?= $customer['id'] ?>"
                                                class="block overflow-hidden h-7 rounded-full bg-gray-200 cursor-pointer transition-all duration-300 ease-in-out peer-checked:bg-black before:content-[''] before:absolute before:top-0.5 before:left-0.5 before:bg-sky-50 before:border-2 before:border-gray-300 before:h-6 before:w-6 before:rounded-full before:transition-all before:duration-300 before:shadow-md peer-checked:before:translate-x-7 peer-checked:before:border-gray-500">
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
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- Table Footer (Pagination) -->

                    </table>



                </div>
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
                    headers: {
                        "Content-Type": "application/json"
                    },
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
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.querySelector('input[placeholder="Search Customers"]');
        const tableBody = document.querySelector("tbody");
        const tableRows = tableBody.querySelectorAll("tr");

        // Create "no results" row
        const noResultRow = document.createElement("tr");
        noResultRow.innerHTML = `<td colspan="5" class="text-center py-3 text-gray-500">No matching customers found</td>`;
        noResultRow.style.display = "none";
        tableBody.appendChild(noResultRow);

        searchInput.addEventListener("keyup", function () {
            const searchTerm = this.value.toLowerCase().trim();
            let matchCount = 0;

            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                const isMatch = rowText.includes(searchTerm);
                row.style.display = isMatch ? "" : "none";
                if (isMatch) matchCount++;
            });

            // Show/hide "no results"
            noResultRow.style.display = matchCount === 0 ? "" : "none";
        });
    });
</script>

</body>

</html>