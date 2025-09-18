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
            <li class="text-black font-semibold">Privacy Policy</li>
        </ol>
    </div>

    <main class="max-w-5xl mx-auto px-4 py-10 max-md:pt-6">
        <h2 class="text-3xl font-semibold mb-6">Privacy Policy</h2>
        <p class="mb-6 text-gray-700">
            At <span class="font-semibold">Nova Universe</span>, your privacy matters to us.
            This Privacy Policy explains how we collect, use, and protect your information when you shop with us.
            By using our website, you agree to the practices described below.
        </p>

        <!-- Section 1 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">1. Information We Collect</h3>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>Basic details such as your name, email address, and phone number.</li>
                <li>Shipping and billing information for your orders.</li>
                <li>Browsing behavior on our website (like pages you visit and items you view).</li>
                <li>Optional account details if you create a Nova Universe account.</li>
            </ul>
        </section>

        <!-- Section 2 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">2. How We Use Your Information</h3>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>To process and deliver your orders quickly.</li>
                <li>To improve your shopping experience with personalized suggestions.</li>
                <li>To send updates about new arrivals, offers, and promotions (only if you subscribe).</li>
                <li>To keep our website safe and prevent fraud.</li>
            </ul>
        </section>

        <!-- Section 3 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">3. Sharing of Information</h3>
            <p class="text-gray-700">
                We do <span class="font-semibold">not</span> sell your personal information.
                We only share it with trusted partners like payment providers, delivery services,
                and IT systems to complete your orders safely.
            </p>
        </section>

        <!-- Section 4 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">4. Your Privacy Rights</h3>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li>You can request access to the information we have about you.</li>
                <li>You can ask us to correct or delete your personal information.</li>
                <li>You may unsubscribe from promotional emails anytime by clicking the link at the bottom of our
                    emails.</li>
            </ul>
        </section>

        <!-- Section 5 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">5. Security</h3>
            <p class="text-gray-700">
                We use secure systems to protect your data. While no method is 100% foolproof,
                we always aim to keep your information safe.
            </p>
        </section>

        <!-- Section 6 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">6. Updates to This Policy</h3>
            <p class="text-gray-700">
                We may update this Privacy Policy from time to time. Any changes will be posted on this page,
                and the revised date will be updated below.
            </p>
            <p class="mt-2 text-sm text-gray-500">Last updated: September 2025</p>
        </section>

        <!-- Section 7 -->
        <section>
            <h3 class="text-xl font-semibold mb-2">7. Contact Us</h3>
            <p class="text-gray-700">
                If you have questions about this Privacy Policy or how your information is used,
                contact us at:
                <br />
                <span class="font-semibold">Email:</span> support@novauniverse.com
            </p>
        </section>
    </main>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>