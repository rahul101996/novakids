<?php

?>
<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>



<body class="">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
    <div class="flex justify-start items-left w-full md:hidden border-b border-gray-300 shadow px-4 py-5">
        <!-- Back button (only visible on mobile) -->
        <button onclick="history.back()" class="max-lg:flex hidden flex items-center gap-1 text-sm">
            <i class="fas fa-chevron-left"></i> Back
        </button>
    </div>

    <div class="w-full flex items-center justify-center py-16 max-md:py-8">
        <div class="w-[80%] max-md:w-[90%] flex flex-col ">
            <div class="py-5 px-3 w-full border border-gray-300">
                <h1>Returnable/Exchangeable Products</h1>
            </div>
            <?php
            foreach ($products as $key => $product) {
                $images = json_decode($product['variant_images'], true);
                $variants = json_decode($product['variant_options'], true);
                $variants = json_decode($variants, true);
                $images = array_reverse($images);

            ?>
                <div class="w-full border border-gray-300 flex flex-col items-center">
                    <div class="w-full p-5 flex max-md:flex-col max-md:gap-3 items-center justify-between">
                        <div class="w-[80%] max-md:w-full flex items-start justify-start">
                            <img src="/<?= $images[0] ?>" class="h-24" alt="">
                            <div class="flex flex-col items-start justify-center ml-5">
                                <h3 class="font-semibold"><?= $product['product_name'] ?></h3>
                                <?php
                                foreach ($variants as $key => $variant) {
                                ?>
                                    <p class="!mb-0 text-sm text-gray-600"><?= $key ?>: <?= $variant ?></p>

                                <?php } ?>
                                <!-- <h3 class="text-sm text-gray-600">Size : XS</h3> -->
                                <h3 class="text-sm text-gray-600 mt-3"> <?= $product['quantity'] ?> x ₹<?= formatNumber($product['amount']) ?></h3>
                            </div>
                        </div>

                    </div>

                </div>
            <?php } ?>

            <div class="py-5 px-3 w-full border border-gray-300 mt-10 hidden">
                <h1>Returnable/Exchangeable Products</h1>
            </div>
            <div class="w-full border border-gray-300 flex flex-col items-center hidden">
                <div class="w-full p-5 flex items-center justify-between">
                    <div class="w-[80%] flex flex-col items-start justify-start">
                        <div class="flex items-center justify-start gap-5">
                            <span class="text-sm text-gray-500">#RET135315</span>
                            <span class="text-xs bg-yellow-100 py-1 px-2 rounded-lg">Pending Inspection</span>
                        </div>
                        <div class="flex flex-col items-start justify-center">
                            <h3 class="font-semibold"><?= $product['product_name'] ?></h3>
                            <p class="!mb-0 text-sm text-gray-600">Size: S &ensp; 1 x ₹2,499.0</p>
                            <!-- <h3 class="text-sm text-gray-600 mt-3"> </h3> -->
                            <span class="font-semibold text-sm mt-3">Your return request is approved <span class="text-gray-500 font-normal text-xs">(Request on Sep 12th 2025)</span></span>
                            <span class="text-sm text-blue-600">View Return Item</span>

                        </div>
                    </div>
                    <div class="w-[20%] flex items-center justify-center flex-col gap-2">
                        <img src="/public/uploads/product-images/68cabe12e6a6e_1744389529_7123437.avif" class="h-24" alt="">
                    </div>
                </div>
                <div class="w-full bg-blue-50 p-4 flex items-center justify-between">
                    <div class="flex items-center justify-center gap-3">
                        <img src="/public/icons/clock.png" class="h-8" alt="">
                        <div class="flex flex-col items-start justify-start">
                            <span class="text-sm">Exchange Before</span>
                            <span class="text-gray-500 text-xs">OCT 12th 2025</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-center gap-3">
                        <img src="/public/icons/clock.png" class="h-8" alt="">
                        <div class="flex flex-col items-start justify-start">
                            <span class="text-sm">Return Before</span>
                            <span class="text-gray-500 text-xs">OCT 12th 2025</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="w-[20%] max-md:w-full flex items-center justify-center md:flex-col gap-2">
                <?php
                if ($purchase["status"] == "Processing") {
                ?>
                    <button onclick="openCancelModal('<?= $purchase['id'] ?>')" class="bg-red-700 py-2 px-4 text-white w-full">
                        <i class="fa-regular fa-circle-xmark"></i> &ensp;Cancel
                    </button>
                <?php

                } else {
                ?>
                    <button class="bg-gray-900 py-2 px-4 text-white w-full"><i class="fa-solid fa-right-left"></i> &ensp;Exchange</button>
                    <button class="bg-gray-900 py-2 px-4 text-white w-full"><i class="fa-solid fa-arrow-left"></i> &ensp;Return</button>
                <?php
                }
                ?>
            </div>
        </div>
    </div>


    <!-- Cancel Reason Modal -->
    <div id="cancelModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6">
            <h2 class="text-lg font-semibold mb-4">Cancel Order</h2>
            <p class="text-sm text-gray-600 mb-4">Please tell us why you want to cancel this order:</p>

            <form id="cancelForm" onsubmit="submitCancelReason(event)">
                <textarea id="cancelReason" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-red-500 focus:outline-none" placeholder="Enter your reason..." required></textarea>

                <div class="flex justify-end gap-3 mt-5">
                    <button type="button" onclick="closeCancelModal()" class="px-4 py-2 rounded-lg border border-gray-400 text-gray-700 hover:bg-gray-100">Close</button>
                    <button type="submit" class="px-4 py-2 rounded-lg bg-red-700 text-white hover:bg-red-800">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        let currentOrderId = null; // to track which order is being canceled

        function openCancelModal(orderId) {
            currentOrderId = orderId;
            document.getElementById('cancelModal').classList.remove('hidden');
        }

        function closeCancelModal() {
            document.getElementById('cancelModal').classList.add('hidden');
            document.getElementById('cancelReason').value = '';
        }

        function submitCancelReason(event) {
            event.preventDefault();
            const reason = document.getElementById('cancelReason').value.trim();
            if (!reason) {
                alert("Please enter a reason for cancellation.");
                return;
            }

            // ✅ Call your backend or JS function
            cancelOrder(currentOrderId, reason);

            closeCancelModal();
        }

        // Example JS function that handles the cancel logic
        async function cancelOrder(orderId, reason) {
            console.log("Cancelling order:", orderId, "Reason:", reason);

            try {
                let f = new FormData();
                f.append("reason", reason)
                const res = await fetch(`/api/cancelOrder/${orderId}`, {
                    method: "POST",
                    body: f
                });

                const data = await res.json();
                if (data.success) {
                    alert("Order cancelled successfully.");
                    location.reload();
                } else {
                    alert("Error cancelling order: " + data.message);
                }
            } catch (err) {
                alert("Something went wrong!");
                console.error(err);
            }
        }
    </script>


</body>

</html>