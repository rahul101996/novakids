<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <!-- Breadcrumbs -->
    <div class="text-sm pt-6 px-6">
        <ol class="flex items-center space-x-2 text-gray-500">
            <li>
                <a href="/" class="hover:text-black">Home</a>
            </li>
            <li>
                <span class="mx-1">/</span>
            </li>
            <li class="text-black font-semibold">Returns & Exchanges</li>
        </ol>
    </div>

    <div class="max-w-3xl mx-auto px-4 pb-12">
        <h1 class="text-4xl font-semibold mb-2">Returns & Exchanges</h1>
        <p class="text-gray-500 mb-8">
            Everything you need to know about returning or exchanging your Nova Universe clothing.
        </p>

        <!-- FAQ Section -->
        <div class="space-y-4">

            <!-- FAQ Item 1 (open by default) -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer1','icon1')">
                    <span class="text-gray-900 text-lg font-semibold">What is your return policy?</span>
                    <i id="icon1" class="fa-solid fa-chevron-down transition-transform transform rotate-180"></i>
                </button>
                <div id="answer1" class="pb-4 text-gray-700">
                    You can return or exchange any item within 30 days of purchase as long as it is unworn and with
                    original tags. Refunds are processed within 5-7 business days.
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer2','icon2')">
                    <span class="text-gray-900 text-lg font-semibold">How do I request a return or exchange?</span>
                    <i id="icon2" class="fa-solid fa-chevron-down transition-transform transform"></i>
                </button>
                <div id="answer2" class="hidden pb-4 text-gray-700">
                    To request a return or exchange, go to your orders page, select the item, and click "Return or
                    Exchange." Follow the instructions provided.
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer3','icon3')">
                    <span class="text-gray-900 text-lg font-semibold">Can I exchange for a different size?</span>
                    <i id="icon3" class="fa-solid fa-chevron-down transition-transform transform"></i>
                </button>
                <div id="answer3" class="hidden pb-4 text-gray-700">
                    Yes! Exchanges for different sizes are allowed based on availability. Please submit your exchange
                    request through our online portal.
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer4','icon4')">
                    <span class="text-gray-900 text-lg font-semibold">Are there any items that cannot be
                        returned?</span>
                    <i id="icon4" class="fa-solid fa-chevron-down transition-transform transform"></i>
                </button>
                <div id="answer4" class="hidden pb-4 text-gray-700">
                    Personalized items or items on final sale cannot be returned or exchanged.
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer5','icon5')">
                    <span class="text-gray-900 text-lg font-semibold">How long does shipping take for exchanges?</span>
                    <i id="icon5" class="fa-solid fa-chevron-down transition-transform transform"></i>
                </button>
                <div id="answer5" class="hidden pb-4 text-gray-700">
                    Once your exchange is approved, shipping usually takes 5-10 business days depending on your
                    location.
                </div>
            </div>

        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 pb-12">
        <h1 class="text-4xl font-semibold mb-2">Account & Payment</h1>
        <p class="text-gray-500 mb-8">
            Learn everything about managing your Nova Universe account and making secure payments.
        </p>

        <!-- FAQ Section -->
        <div class="space-y-4">

            <!-- FAQ Item 1 (open by default) -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer6','icon6')">
                    <span class="text-gray-900 text-lg font-semibold">Do I need an account to shop?</span>
                    <i id="icon6" class="fa-solid fa-chevron-down transition-transform transform rotate-180"></i>
                </button>
                <div id="answer6" class="pb-4 text-gray-700">
                    No, you can check out as a guest. However, creating an account allows you to track orders, save
                    addresses, and view your order history.
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer7','icon7')">
                    <span class="text-gray-900 text-lg font-semibold">What payment methods do you accept?</span>
                    <i id="icon7" class="fa-solid fa-chevron-down transition-transform transform"></i>
                </button>
                <div id="answer7" class="hidden pb-4 text-gray-700">
                    We accept all major credit and debit cards, PayPal, Apple Pay, Google Pay, and gift cards issued by
                    Nova Universe.
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer8','icon8')">
                    <span class="text-gray-900 text-lg font-semibold">Is my payment information secure?</span>
                    <i id="icon8" class="fa-solid fa-chevron-down transition-transform transform"></i>
                </button>
                <div id="answer8" class="hidden pb-4 text-gray-700">
                    Absolutely! All transactions are encrypted and processed through trusted, PCI-compliant payment
                    providers to keep your information safe.
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer9','icon9')">
                    <span class="text-gray-900 text-lg font-semibold">Can I update my billing or shipping
                        information?</span>
                    <i id="icon9" class="fa-solid fa-chevron-down transition-transform transform"></i>
                </button>
                <div id="answer9" class="hidden pb-4 text-gray-700">
                    Yes, you can update your billing or shipping details anytime in your account settings. Please note
                    changes won't apply to orders already placed.
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="border-b border-gray-200">
                <button class="w-full text-left py-4 flex justify-between items-center focus:outline-none"
                    onclick="toggleAnswer('answer10','icon10')">
                    <span class="text-gray-900 text-lg font-semibold">Why was my payment declined?</span>
                    <i id="icon10" class="fa-solid fa-chevron-down transition-transform transform"></i>
                </button>
                <div id="answer10" class="hidden pb-4 text-gray-700">
                    Payments can be declined due to insufficient funds, incorrect billing details, or bank restrictions.
                    If the issue persists, please contact your bank or try another payment method.
                </div>
            </div>

        </div>
    </div>


    <script>
        function toggleAnswer(answerId, iconId) {
            const answer = document.getElementById(answerId);
            const icon = document.getElementById(iconId);
            answer.classList.toggle("hidden");
            icon.classList.toggle("rotate-180");
        }
    </script>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>