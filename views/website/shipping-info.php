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
            <li class="text-black font-semibold">Shipping Info</li>
        </ol>
    </div>
    <main class="max-w-4xl mx-auto px-4 py-10 space-y-6">

        <!-- Processing Time -->
        <section>
            <h2 class="text-xl font-semibold mb-3">Order Processing</h2>
            <p class="text-gray-700 leading-relaxed">
                All orders are processed within <span class="font-bold">24–48 business hours</span>. Orders placed on
                weekends
                or public holidays will be processed on the next business day.
            </p>
        </section>

        <!-- Shipping Options -->
        <section>
            <h2 class="text-xl font-semibold mb-3">Shipping Options & Delivery Time</h2>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li><span class="font-bold">Standard Shipping:</span> 4–7 business days (available for all serviceable
                    pincodes).</li>
                <li><span class="font-bold">Express Shipping:</span> 2–4 business days (extra charges may apply).</li>
                <li><span class="font-bold">Same-Day / Next-Day Delivery:</span> Available only in select metro cities.
                </li>
            </ul>
        </section>

        <!-- Shipping Charges -->
        <section>
            <h2 class="text-xl font-semibold mb-3">Shipping Charges</h2>
            <p class="text-gray-700 leading-relaxed">
                We offer <span class="font-bold">Free Shipping</span> on all orders above ₹999. For orders below this
                amount,
                a flat shipping fee of ₹79 will be applied.
            </p>
        </section>

        <!-- Tracking -->
        <section>
            <h2 class="text-xl font-semibold mb-3">Tracking Your Order</h2>
            <p class="text-gray-700 leading-relaxed">
                Once your order has been shipped, you will receive a confirmation email with a tracking link. You can
                also
                track your order directly through the <a href="#" class="text-black underline">Order Tracking</a> page
                by
                entering your order number and email address.
            </p>
        </section>

        <!-- Restrictions -->
        <section>
            <h2 class="text-xl font-semibold mb-3">Shipping Restrictions</h2>
            <p class="text-gray-700 leading-relaxed">
                Currently, Nova Universe delivers only within India. We are working on expanding to international
                locations soon!
            </p>
        </section>

        <!-- Delays -->
        <section>
            <h2 class="text-xl font-semibold mb-3">Delays</h2>
            <p class="text-gray-700 leading-relaxed">
                Please note that delivery times may be affected during high-volume sales, festivals, or due to
                unforeseen
                circumstances such as weather disruptions or courier delays.
            </p>
        </section>
    </main>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>