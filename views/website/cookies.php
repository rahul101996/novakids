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
            <li class="text-black font-semibold">Cookies</li>
        </ol>
    </div>

    <main class="max-w-5xl mx-auto px-4 py-10 max-md:pt-6">
        <h2 class="text-3xl font-semibold mb-6">Cookies Policy</h2>
        <p class="mb-6 text-gray-700">
            At <span class="font-semibold">Nova Universe</span>, we use cookies to make your shopping experience
            smoother and more fun.
            This Cookies Policy explains what cookies are, how we use them, and how you can control them.
        </p>

        <!-- Section 1 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">1. What Are Cookies?</h3>
            <p class="text-gray-700">
                Cookies are small text files stored on your device when you visit our website.
                They help us remember your preferences, track your cart, and improve how the site works.
            </p>
        </section>

        <!-- Section 2 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">2. How We Use Cookies</h3>
            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                <li><span class="font-semibold">Essential Cookies:</span> Keep track of items in your cart and make
                    checkout possible.</li>
                <li><span class="font-semibold">Performance Cookies:</span> Help us understand how visitors use our site
                    so we can improve it.</li>
                <li><span class="font-semibold">Personalization Cookies:</span> Remember your preferences like size,
                    styles, or region.</li>
                <li><span class="font-semibold">Marketing Cookies:</span> Show you relevant promotions and offers (only
                    if you accept).</li>
            </ul>
        </section>

        <!-- Section 3 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">3. Managing Cookies</h3>
            <p class="text-gray-700">
                You can control or delete cookies anytime through your browser settings.
                Keep in mind that disabling some cookies may affect your shopping experience
                (like removing saved items from your cart).
            </p>
        </section>

        <!-- Section 4 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">4. Third-Party Cookies</h3>
            <p class="text-gray-700">
                We may use trusted third-party services (like Google Analytics or payment gateways)
                that set their own cookies to help us understand traffic or complete secure payments.
            </p>
        </section>

        <!-- Section 5 -->
        <section class="mb-8">
            <h3 class="text-xl font-semibold mb-2">5. Updates to This Policy</h3>
            <p class="text-gray-700">
                From time to time, we may update this Cookies Policy to reflect changes in technology
                or legal requirements. Updates will be posted here with a new “last updated” date.
            </p>
            <p class="mt-2 text-sm text-gray-500">Last updated: September 2025</p>
        </section>

        <!-- Section 6 -->
        <section>
            <h3 class="text-xl font-semibold mb-2">6. Contact Us</h3>
            <p class="text-gray-700">
                Questions about cookies? Reach out to us at:
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