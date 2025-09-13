<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>


    <div class="max-w-3xl mx-auto px-4 py-12">
        <h1 class="text-4xl font-semibold mb-2">Returns & Exchanges</h1>
        <p class="text-gray-500 mb-8">Everything you need to know about returning or exchanging your Nova Universe
            clothing.</p>

        <!-- FAQ Section -->
        <div class="space-y-4">

            <!-- FAQ Item -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer1')">
                    <span>What is your return policy?</span>
                    <span id="icon1" class="transform transition-transform">&#9654;</span>
                </button>
                <div id="answer1" class="hidden pb-4 text-gray-700">
                    You can return or exchange any item within 30 days of purchase as long as it is unworn and with
                    original tags. Refunds are processed within 5-7 business days.
                </div>
            </div>

            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer2')">
                    <span>How do I request a return or exchange?</span>
                    <span id="icon2" class="transform transition-transform">&#9654;</span>
                </button>
                <div id="answer2" class="hidden pb-4 text-gray-700">
                    To request a return or exchange, go to your orders page, select the item, and click "Return or
                    Exchange." Follow the instructions provided.
                </div>
            </div>

            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer3')">
                    <span>Can I exchange for a different size?</span>
                    <span id="icon3" class="transform transition-transform">&#9654;</span>
                </button>
                <div id="answer3" class="hidden pb-4 text-gray-700">
                    Yes! Exchanges for different sizes are allowed based on availability. Please submit your exchange
                    request through our online portal.
                </div>
            </div>

            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer4')">
                    <span>Are there any items that cannot be returned?</span>
                    <span id="icon4" class="transform transition-transform">&#9654;</span>
                </button>
                <div id="answer4" class="hidden pb-4 text-gray-700">
                    Personalized items or items on final sale cannot be returned or exchanged.
                </div>
            </div>

            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer5')">
                    <span>How long does shipping take for exchanges?</span>
                    <span id="icon5" class="transform transition-transform">&#9654;</span>
                </button>
                <div id="answer5" class="hidden pb-4 text-gray-700">
                    Once your exchange is approved, shipping usually takes 5-10 business days depending on your
                    location.
                </div>
            </div>

        </div>
    </div>

    <script>
        function toggleAnswer(id) {
            const answer = document.getElementById(id);
            const icon = document.getElementById('icon' + id.slice(-1));
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-90');
        }
    </script>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>