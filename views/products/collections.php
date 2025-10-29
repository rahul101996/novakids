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
                <span class="text-xl font-semibold text-gray-800">Collections</span>
                <div class="flex items-center justify-center gap-3">
                    <button id="exportCollectionsBtn" class="bg-gray-800 text-sm font-semibold py-1 px-4 rounded-lg text-white">
                        Export
                    </button>
                    <a href="/admin/add-collections"
                        class="bg-gray-800 text-sm font-semibold py-1 px-4 rounded-lg text-white">Add Collection</a>
                </div>
            </div>
            <div class="w-full flex items-center justify-center pb-4 mt-2">
                <div class="w-[97%] flex items-start justify-center gap-3 flex-col bg-white rounded-2xl overflow-y-auto">
                    <div class="w-full flex items-center justify-between mt-2 px-2">
                        <div class="relative w-[45vw]">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#626262">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" placeholder="Search Collection" class="bg-white w-full pl-10 pr-4 py-1 rounded-xl  focus:border-gray-200 focus:bg-gray-100 placeholder:text-[#626262] outline-none transition">

                        </div>

                    </div>
                    <table class="w-full text-xs">
                        <!-- Table Header -->
                        <thead class="sticky top-0 left-0 shadow-sm z-10">
                            <tr class="bg-[#f7f7f7] text-[#616161] border-y border-gray-200">
                                <?php
                                $headers = ['Image', 'Title', 'Status', 'Action'];

                                foreach ($headers as $header): ?>
                                    <th class="font-semibold py-2 px-3 w-[20%] <?= ($header == 'Action' ? 'text-right' : 'text-left') ?> text-nowrap">
                                        <?= $header ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            <?php foreach ($collections as $key => $collection) : ?>
                                <tr
                                    class="cursor-pointer bg-white text-[#4b4b4b] border-b border-gray-200 
                           hover:bg-[#f7f7f7] hover:shadow-md hover:scale-[1.01] 
                           transition-all duration-200 ease-in-out">
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <img src="/<?= $collection['image'] ?>" class="w-24 rounded" alt="">
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <?= $collection['name'] ?>
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-left">
                                        <div
                                            class="relative inline-block w-14 mr-2 align-middle select-none">
                                            <input type="checkbox" id="togglr_<?= $collection['id'] ?>"
                                                <?= $collection['status'] == 1 ? 'checked' : '' ?>
                                                onchange="updateStatus(this, <?= $collection['id'] ?>)"
                                                class="sr-only peer">

                                            <label for="togglr_<?= $collection['id'] ?>"
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
                                    </td>
                                    <td class="font-semibold py-2 px-3 text-right"><a href="/edit-collection/<?= $collection['id'] ?>"
                                            class="text-black hover:text-black"><i class="fa-solid fa-pen"></i></a>
                                        <a onclick="return confirm('Are you sure you want to delete this collection?')" href="/delete-collection/<?= $collection['id'] ?>"
                                            class="text-red-700 hover:text-red-700"><i class="fa-solid fa-trash"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <!-- Table Footer (Pagination) -->
                        <tfoot class="sticky bg-[#f7f7f7] bottom-0 left-0 border-t border-gray-200 shadow-sm z-10">
                            <tr>
                                <td colspan="8" class="py-3 px-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-500">Showing 1–10 of 50 customers</span>
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
            const searchInput = document.querySelector('input[placeholder="Search Collection"]');
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
        async function updateStatus(ele, id) {
            let data = {
                id,
                status: ele.checked ? "1" : "0"
            };

            ele.disabled = true;
            const label = ele.nextElementSibling;
            label.classList.add('opacity-70');

            try {
                let res = await fetch('/api/collection/status', {
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
document.getElementById("exportCollectionsBtn").addEventListener("click", async () => {
    try {
        const response = await axios({
            url: "/admin/export-collections",
            method: "POST",
            responseType: "blob"
        });

        const blob = new Blob([response.data], { type: "text/csv" });
        const url = window.URL.createObjectURL(blob);

        const link = document.createElement("a");
        link.href = url;
        link.download = "collections.csv";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        window.URL.revokeObjectURL(url);
    } catch (error) {
        console.error("Export failed:", error);
        toastr.error("Something went wrong while exporting collections.");
    }
});
</script>

</body>

</html>