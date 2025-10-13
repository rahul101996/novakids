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
            <li class="text-black font-semibold">Shipping Policy</li>
        </ol>
    </div>
    <main class="max-w-4xl mx-auto px-4 py-10 space-y-6">

        <!-- Processing Time -->
        <section>
            <h2 class="text-xl font-semibold mb-3">Shipping Policy</h2>
          <p>
                    For international buyers, orders are shipped and delivered through registered international courier companies and/or international speed post only. For domestic buyers, orders are shipped through registered domestic courier companies and/or speed post only. Orders are shipped within 3-5 days or as per the delivery date agreed at the time of order confirmation, subject to courier company/post office norms.

                    <strong>NOVAKIDS</strong> is not liable for any delay in delivery by the courier company or postal authorities and only guarantees to hand over the consignment to the courier company or postal authorities within 3-5 days from the date of the order and payment, or as per the delivery date agreed at the time of order confirmation. Delivery of all orders will be to the address provided by the buyer. Delivery of our services will be confirmed on your email ID as specified during registration.

                    For any issues in utilizing our services, you may contact our helpdesk at <a href="tel:9136450358">9136450358</a> or <a href="mailto:support@theconstitutionstudy.com">support@theconstitutionstudy.com</a>.
                </p>
        </section>
    </main>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>