<!DOCTYPE html>
<html lang="en">

<?php

use Google\Service\Sheets\NumberFormat;

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
                    Customers</span>
                <div>
                    <button class="bg-gray-800 text-sm font-semibold py-1 px-4 rounded-lg text-white">Import</button>
                    <button class="bg-gray-800 text-sm font-semibold py-1 px-4 rounded-lg text-white">Export</button>
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
                                $headers = ['Customer name', 'Email subscription', 'Location', 'Orders', 'Amount spent'];
                                foreach ($headers as $header): ?>
                                    <th class="font-semibold py-2 px-3 w-[20%] <?= ($header == 'Amount spent' ? 'text-right' : 'text-left') ?>">
                                        <?= $header ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <?php foreach ($customers as $customer):
                                $id = $customer['id'];

                                // Fetch purchase data
                                $PurchaseData = getData2("SELECT total_amount FROM `tbl_purchase` WHERE `userid` = $id ORDER BY `id` DESC");
                                $totalPurchase = array_sum(array_column($PurchaseData, 'total_amount'));
                                $totalOrders = count($PurchaseData);

                                // Fetch address (active or latest)
                                $addressQuery = "
                SELECT a.city, s.name AS state_name 
                FROM `tbl_user_address` a
                LEFT JOIN indian_states s ON a.state = s.id
                WHERE a.userid = $id 
                ORDER BY a.status DESC, a.id DESC 
                LIMIT 1";
                                $address = getData2($addressQuery)[0] ?? ['city' => 'N/A', 'state_name' => 'N/A'];
                            ?>
                                <tr
                                    class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 
                           hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] 
                           transition-all duration-200 ease-in-out"
                                    onclick="window.location.href='/admin/customer-info/<?= $id ?>'">
                                    <td class="font-semibold py-2 px-3 text-left"><?= htmlspecialchars($customer['fname'] . ' ' . $customer['lname']) ?></td>
                                    <td class="font-semibold py-2 px-3 text-left"><?= !empty($customer['username']) ? htmlspecialchars($customer['username']) : 'Not subscribed' ?></td>
                                    <td class="font-semibold py-2 px-3 text-left capitalize"><?= htmlspecialchars($address['city'] . ', ' . $address['state_name']) ?></td>
                                    <td class="font-semibold py-2 px-3 text-left"><?= $totalOrders ?> Orders</td>
                                    <td class="font-semibold py-2 px-3 text-right">₹<?= formatNumber($totalPurchase) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- Table Footer (Pagination) -->
                        <tfoot class="sticky bg-[#f7f7f7] bottom-0 left-0 border-t border-gray-200 shadow-sm z-10">
                            <tr>
                                <td colspan="5" class="py-3 px-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Showing 1–10 of <?= count($customers) ?> customers</span>
                                        <div class="flex items-center gap-1">
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-100 transition">Prev</button>
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg bg-gray-100 font-medium">1</button>
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-100 transition">2</button>
                                            <button class="px-3 py-1 text-sm border border-gray-300 rounded-lg hover:bg-gray-100 transition">Next</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>



                </div>
            </div>






        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
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