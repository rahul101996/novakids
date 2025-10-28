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
            <div class="w-full flex items-center justify-center p-3">
                <span class="text-xl font-semibold text-gray-800 w-[87%]">Add product banner</span>
                <!-- <a href="/admin/add-collections" class="bg-gray-800 text-sm font-semibold py-2 px-4 rounded-lg text-white">Add Collection</a> -->
            </div>
            <div class="w-full flex items-center justify-center pb-4 ">

                <form action="" method="POST" class="w-[85%]" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-[65%] pb-10 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                        <div class="lg:col-span-2 flex flex-col gap-6">

                            <div class="">
                                <label class="block text-sm font-medium text-gray-700 mb-1" for="product_id">
                                    Pointer Name
                                </label>
                                <input type="text" name="product_id" class="w-full border-[1px] border-gray-600 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 px-3 py-1" value="<?= $editData['product_id'] ?>">
                            </div>
                        </div>

                        <div class="lg:col-span-2 flex flex-col gap-6">

                            <div class="">
                                <h2 class="text-base font-medium text-gray-900">Home Banner</h2>
                                <div
                                    class="space-y-1 text-center flex flex-col items-center border-2 border-gray-300 border-dashed rounded-lg p-8">

                                    <div id="imagePreview" class="<?= isset($editData['file']) ? '' : 'hidden' ?> mb-4">
                                        <input type="hidden" name="old_image"
                                            value="<?= isset($editData['file']) ? $editData['file'] : '' ?>">
                                        <img src="/<?= isset($editData['file']) ? $editData['file'] : '' ?>" alt="Preview"
                                            class="mx-auto h-32 object-cover">
                                    </div>
                                    <svg class="mx-auto h-8 w-8 text-gray-400" stroke="currentColor" fill="none"
                                        viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="vdata_image"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                            <span>Upload a file</span>
                                            <input id="vdata_image" name="img" type="file" class="sr-only" accept="image/*"
                                                <?= isset($editData['file']) ? '' : 'required' ?>>
                                        </label>
                                        <p class="pl-1">select Image</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>

                        </div>
                        <div class="w-full flex items-center justify-center relative col-span-2 border rounded-md overflow-hidden">
                            <img src="/<?= isset($editData['file']) ? $editData['file'] : '' ?>"
                                id="frontImage" class="w-full select-none pointer-events-none" alt="">

                            <!-- Dynamic circles appear here -->
                            <div id="anchorPoints" class="absolute top-0 left-0 w-full h-full"></div>
                        </div>
                        <div class="w-full flex items-center justify-center col-span-2">
                            <div class="w-full">
                                <div class="flex items-center justify-between mb-3">
                                    <h3 class="text-gray-700 font-semibold text-base">Anchors</h3>
                                    <button id="addRowBtn" type="button"
                                        class="px-3 py-1.5 bg-blue-500 text-white text-sm rounded-md hover:bg-blue-600 transition">
                                        + Add Row
                                    </button>
                                </div>

                                <table class="w-full border border-gray-200 rounded-lg overflow-auto text-sm">
                                    <thead class="bg-gray-100 text-gray-700">
                                        <tr>
                                            <th class="px-4 py-2 text-left font-semibold">Anchor Name</th>
                                            <th class="px-4 py-2 text-left font-semibold">Top (%)</th>
                                            <th class="px-4 py-2 text-left font-semibold">Left (%)</th>
                                            <th class="px-4 py-2 text-center font-semibold w-20">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="anchorsBody" class="divide-y divide-gray-200 text-gray-700">
                                        <?php if (isset($editData['id'])): ?>
                                            <?php
                                            // echo $product_imge['id'];
                                            $anchors = getData2("SELECT * FROM `product_banner_anchors` WHERE `product_banner_id` = " . $editData['id']);
                                            foreach ($anchors as $key => $anchor):
                                                $anchorId = "anchor-" . $key;
                                            ?>
                                                <tr>
                                                    <td class="px-4 py-3">
                                                        <select name="product_name[]" class="selectElement" required>
                                                            <option value="" selected disabled>Select Product</option>
                                                            <?php foreach (getData2("SELECT * FROM `tbl_products` WHERE `status` = 1") as $key => $value) { ?>
                                                                <option
                                                                    value="<?= $value['id'] ?>"
                                                                    <?= isset($anchor['product_name']) && $anchor['product_name'] == $value['id'] ? 'selected' : '' ?>>
                                                                    <?= $value['name'] ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <input type="float" name="top_position[]" value="<?= htmlspecialchars($anchor['top_position']) ?>" placeholder="Top %"
                                                            data-id="<?= $anchorId ?>" data-pos="top"
                                                            class="positionInput w-full border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <input type="float" name="left_position[]" value="<?= htmlspecialchars($anchor['left_position']) ?>" placeholder="Left %"
                                                            data-id="<?= $anchorId ?>" data-pos="left"
                                                            class="positionInput w-full border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                                    </td>
                                                    <td class="px-4 py-3 text-center">
                                                        <button type="button" class="removeRow text-red-500 hover:text-red-700 text-sm font-semibold">✕</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="w-[85%] mt-4">
                        <button
                            class="bg-black border border-transparent rounded-md py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            name="<?= isset($homeBanner['id']) ? 'update' : 'add' ?>">Save</button>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>
        const imageInput = document.getElementById('vdata_image');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = imagePreview.querySelector('img');
        const frontImage = document.getElementById('frontImage');

        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    frontImage.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        const tbody = document.getElementById("anchorsBody");
        const addBtn = document.getElementById("addRowBtn");
        const anchorPoints = document.getElementById("anchorPoints");
        const imgContainer = document.querySelector(".col-span-2");
        let anchorIndex = document.querySelectorAll("input[data-id]").length;

        // Function to generate truly unique IDs
        function generateAnchorId() {
            return `anchor-${Date.now()}-${Math.floor(Math.random() * 1000)}`;
        }

        // Add a new anchor row and circle
        addBtn.addEventListener("click", () => {
            const id = generateAnchorId();

            // Create draggable circle
            const circle = document.createElement("div");
            circle.className = "absolute w-3 h-3 bg-red-500 rounded-full border border-white shadow-md cursor-pointer";
            circle.style.top = "0%";
            circle.style.left = "0%";
            circle.dataset.id = id;
            anchorPoints.appendChild(circle);

            // Create row
            const tr = document.createElement("tr");
            tr.innerHTML = `
        <td class="px-4 py-3">
            <label class="block text-sm font-medium text-gray-700 mb-1" for="product_id_${id}">Product</label>
            <select name="product_name[]" class="selectElement w-full " id="product_id_${id}">
                <option value="" selected disabled>Select Product</option>
                <?php foreach (getData2("SELECT * FROM tbl_products WHERE status = 1") as $key => $value) { ?>
                    <option
                        value="<?= $value['id'] ?>"
                        <?= isset($editData['product_id']) && $editData['product_id'] == $value['id'] ? 'selected' : '' ?>>
                        <?= $value['name'] ?>
                    </option>
                <?php } ?>
            </select>
        </td>
        <td class="px-4 py-3">
            <input type="float" name="top_position[]" value="0" placeholder="Top %"
                data-id="${id}" data-pos="top"
                class="positionInput w-full border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </td>
        <td class="px-4 py-3">
            <input type="float" name="left_position[]" value="0" placeholder="Left %"
                data-id="${id}" data-pos="left"
                class="positionInput w-full border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </td>
        <td class="px-4 py-3 text-center">
            <button type="button" class="removeRow text-red-500 hover:text-red-700 text-sm font-semibold">✕</button>
        </td>
    `;
            tbody.appendChild(tr);

            makeDraggable(circle, id);
            const newSelect = tr.querySelector('.selectElement');
    if (newSelect) {
        new SlimSelect({ select: newSelect });
    }
        });


        // Update circle position when inputs change
        tbody.addEventListener("input", (e) => {
            if (e.target.classList.contains("positionInput")) {
                const id = e.target.dataset.id;
                const posType = e.target.dataset.pos;
                const value = e.target.value || 0;

                const circle = anchorPoints.querySelector(`[data-id="${id}"]`);
                if (circle) {
                    if (posType === "top") circle.style.top = `${value}%`;
                    if (posType === "left") circle.style.left = `${value}%`;
                }
            }
        });

        // Remove row + circle
        tbody.addEventListener("click", (e) => {
            if (e.target.classList.contains("removeRow")) {
                const row = e.target.closest("tr");
                const topInput = row.querySelector('[data-pos="top"]');
                const id = topInput?.dataset.id;
                if (id) {
                    const circle = anchorPoints.querySelector(`[data-id="${id}"]`);
                    if (circle) circle.remove();
                }
                row.remove();
            }
        });

        // Draggable circle functionality
        function makeDraggable(circle, id) {
            let isDragging = false;

            circle.addEventListener("mousedown", (e) => {
                isDragging = true;
                e.preventDefault();
            });

            document.addEventListener("mouseup", () => {
                isDragging = false;
            });

            document.addEventListener("mousemove", (e) => {
                if (!isDragging) return;

                const rect = imgContainer.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                // Clamp within bounds
                const leftPercent = Math.min(Math.max((x / rect.width) * 100, 0), 100);
                const topPercent = Math.min(Math.max((y / rect.height) * 100, 0), 100);

                circle.style.left = `${leftPercent}%`;
                circle.style.top = `${topPercent}%`;

                // Update the corresponding input fields
                const topInput = tbody.querySelector(`input[data-id="${id}"][data-pos="top"]`);
                const leftInput = tbody.querySelector(`input[data-id="${id}"][data-pos="left"]`);
                if (topInput && leftInput) {
                    topInput.value = topPercent.toFixed(2);
                    leftInput.value = leftPercent.toFixed(2);
                }
            });
        }
        // On page load, create circles for existing anchors from DB
        window.addEventListener("DOMContentLoaded", () => {

            const existingInputs = document.querySelectorAll("input[data-id][data-pos='top']");
            existingInputs.forEach((topInput) => {
                const id = topInput.dataset.id;
                const topValue = parseFloat(topInput.value) || 0;

                const leftInput = document.querySelector(`input[data-id="${id}"][data-pos="left"]`);
                const leftValue = parseFloat(leftInput?.value || 0);

                // Create a circle for each anchor
                const circle = document.createElement("div");
                circle.className = "absolute w-3 h-3 bg-red-500 rounded-full border border-white shadow-md cursor-pointer";
                circle.style.top = `${topValue}%`;
                circle.style.left = `${leftValue}%`;
                circle.dataset.id = id;

                anchorPoints.appendChild(circle);

                // Make it draggable
                makeDraggable(circle, id);
            });
        });
    </script>

</body>

</html>