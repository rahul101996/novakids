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
            <li class="text-black font-semibold">Terms & Conditions</li>
        </ol>
    </div>

    <main class="max-w-5xl mx-auto px-4 py-10 max-md:pt-6">
        <h2 class="text-3xl font-semibold mb-6">Terms of Service</h2>
        <p class="mb-6 text-gray-700">
            Welcome to <span class="font-semibold">Nova Universe</span>!
            By using our website and services, you agree to the following Terms of Service.
            Please read them carefully before shopping with us.
        </p>

        <!-- Section 1 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">1. Eligibility</h3>
            <p class="text-gray-700">
                Our products are designed for teenagers, but you must be at least 13 years old
                to use this website. If you’re under 18, you should have permission from a parent or guardian.
            </p>
        </section>

        <!-- Section 2 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">2. Use of Website</h3>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>You agree not to misuse our website or interfere with its security.</li>
                <li>You must provide accurate and up-to-date information when placing orders.</li>
                <li>Accounts should not be shared with others without permission.</li>
            </ul>
        </section>

        <!-- Section 3 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">3. Orders & Payments</h3>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>All prices are listed in INR (₹) unless stated otherwise.</li>
                <li>Payments must be completed before orders are processed.</li>
                <li>We reserve the right to cancel any suspicious or fraudulent orders.</li>
            </ul>
        </section>

        <!-- Section 4 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">4. Shipping & Delivery</h3>
            <p class="text-gray-700">
                We offer fast 24-hour shipping for most orders. Delivery times may vary depending
                on your location. Nova Universe is not responsible for delays caused by couriers
                or external factors.
            </p>
        </section>

        <!-- Section 5 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">5. Returns & Refunds</h3>
            <p class="text-gray-700">
                If you’re not satisfied with your purchase, you can request a return or exchange
                within 7 days of delivery. Items must be unused and in original condition.
                Refunds may take 5–7 business days to process.
            </p>
        </section>

        <!-- Section 6 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">6. Intellectual Property</h3>
            <p class="text-gray-700">
                All content, logos, designs, and images on Nova Universe are our property.
                You may not copy, use, or reproduce them without our permission.
            </p>
        </section>

        <!-- Section 7 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">7. Limitation of Liability</h3>
            <p class="text-gray-700">
                Nova Universe is not responsible for damages, losses, or issues caused by misuse
                of our products or services beyond what is required by law.
            </p>
        </section>

        <!-- Section 8 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">8. Changes to Terms</h3>
            <p class="text-gray-700">
                We may update these Terms of Service at any time. Changes will be effective once
                posted on this page. Please check regularly for updates.
            </p>
            <p class="mt-2 text-sm text-gray-500">Last updated: September 2025</p>
        </section>

        <!-- Section 9 -->
        <section>
            <h3 class="text-xl font-semibold mb-2">9. Contact Us</h3>
            <p class="text-gray-700">
                If you have questions about these Terms, reach us at:
                <br />
                <span class="font-semibold">Email:</span> support@novaverse.com
            </p>
        </section>
    </main>


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>