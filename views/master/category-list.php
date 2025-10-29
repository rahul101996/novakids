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
                <span class="text-xl font-semibold text-gray-800">Categories</span>
                <a href="/admin/add-category" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add Category</a>
            </div>
            <div class="w-full flex items-center justify-center pb-4">
                <div class="w-[97%] flex items-start justify-center gap-3 flex-col bg-white rounded-2xl">
                    <div class="w-full flex items-center justify-between mt-2 px-2">
                        <div class="relative w-[45vw]">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#626262">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" placeholder="Search Category" class="bg-white w-full pl-10 pr-4 py-1 rounded-xl border border-gray-300 focus:border-gray-600 focus:bg-gray-200 placeholder:text-[#626262] outline-none transition">

                        </div>

                    </div>
                    <table class="w-full text-sm">
                        <!-- Table Header -->
                        <thead class="sticky top-0 left-0 shadow-sm z-10">
                            <tr class="bg-[#f7f7f7] text-[#616161] border-y border-gray-200">
                                <?php
                                $headers = ['Sr. No.', 'Title', 'Banner', 'Action'];
                                foreach ($headers as $header): ?>
                                    <th class="font-semibold py-2 px-3 w-[20%] <?= ($header == 'Action' ? 'text-right' : 'text-left') ?>">
                                        <?= $header ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <?php foreach ($categories as $key => $category):

                            ?>
                                <tr
                                    class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] transition-all duration-200 ease-in-out">
                                    <td class="font-semibold py-2 px-3 text-left"><?= $key + 1 ?></td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <?= htmlspecialchars($category['category']) ?>
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <img src="/<?= htmlspecialchars($category['img']) ?>" class="h-24 rounded"
                                            alt="Category Image">
                                    </td>

                                    <td class="font-semibold py-2 px-3 text-right">
                                        <div class="flex space-x-2 justify-end">
                                            <a href="/edit-category/<?= $category['id'] ?>" class="text-black hover:text-gray-600"><i class="fa-solid fa-pen"></i></a>
                                            <a href="/delete-category/<?= $category['id'] ?>" class="text-red-700 hover:text-red-700"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- Table Footer (Pagination) -->
                        <tfoot class="sticky bg-[#f7f7f7] bottom-0 left-0 border-t border-gray-200 shadow-sm z-10">
                            <tr>
                                <td colspan="5" class="py-3 px-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Showing 1–10 of 100 customers</span>
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
         function search() {
            const searchInput = document.querySelector('input[placeholder="Search Category"]');
            const tableBody = document.querySelector("tbody");
            const tableRows = tableBody.querySelectorAll("tr");
            console.log(tableRows);
            // Create "no results" row
            const noResultRow = document.createElement("tr");
            noResultRow.innerHTML = `<td colspan="5" class="text-center py-3 text-gray-500">No matching customers found</td>`;
            noResultRow.style.display = "none";
            tableBody.appendChild(noResultRow);

            searchInput.addEventListener("keyup", function() {
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
        }
        search();
    </script>
</body>

</html>