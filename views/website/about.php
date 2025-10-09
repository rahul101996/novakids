<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>


    <section
        class="relative text-center py-32 max-md:py-20 bg-cover bg-center bg-no-repeat"
        style="background-image: url('/public/images/about.avif');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10">
            <h1 class="text-6xl max-md:text-4xl font-light text-white mb-4">About Us</h1>
            <p class="text-gray-200 text-lg max-w-2xl mx-auto leading-relaxed">
                Where fashion meets attitude — Nova Universe redefines men’s style with confidence and creativity.
            </p>
        </div>
    </section>


    <section class="py-16 text-center max-md:px-4">
        <h3 class="text-sm tracking-widest uppercase text-gray-900 mb-4">Who We Are</h3>
        <h2 class="text-3xl md:text-5xl leading-snug max-w-3xl mx-auto">
            At <span class="font-semibold text-dark">Nova Universe</span>, we craft
            <span class="italic">modern styles for the new generation</span> — merging
            comfort, trend, and individuality to create fashion that fits every mood.
        </h2>
        <p class="max-w-3xl mx-auto text-gray-600 mt-6 text-lg leading-relaxed">
            From minimal streetwear to expressive urban looks, Nova Universe celebrates bold self-expression.
            Every piece we create is designed to inspire confidence, comfort, and style that speaks louder than words.
        </p>
        <div class="mt-8">
            <a href="/new-arrivals"
                class="relative inline-block uppercase rounded-md overflow-hidden group border-2 border-black bg-transparent px-6 py-2 text-black font-bold text-base">
                <span class="relative z-10 transition-colors duration-700 group-hover:text-white">Explore Collection
                </span>
                <span
                    class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0"></span>
            </a>
        </div>
    </section>


    <section class="py-10 bg-gray-50">
        <div class="w-[90%] mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="col-span-1 grid grid-cols-2 gap-3">
                    <img src="/public/images/11.avif" alt="Nova Universe Outfit" class="rounded-2xl object-cover w-full h-[50vh]">
                    <img src="/public/images/45.png" alt="Streetwear Style" class="rounded-2xl object-cover w-full h-[50vh]">
                    <img src="/public/images/7.webp" alt="Casual Wear" class="rounded-2xl object-cover w-full h-[50vh]">
                    <img src="/public/images/5.webp" alt="Trendy Look" class="rounded-2xl object-cover w-full h-[50vh]">
                </div>
                <div class="flex flex-col justify-center items-start p-6 space-y-6">
                    <h3 class="text-3xl md:text-6xl font-semibold mb-2">Style That Defines You</h3>

                    <p class="text-gray-600 leading-relaxed text-lg max-w-xl">
                        Every outfit in our collection tells a story — one of confidence, comfort, and creativity.
                        <span class="font-medium text-gray-800">Nova Universe</span> is more than clothing;
                        it’s your personality in motion — designed for those who dare to be different.
                    </p>

                    <p class="text-gray-600 leading-relaxed max-w-xl">
                        From laid-back casuals to bold statement streetwear, we create pieces that blend
                        <span class="italic text-gray-800">trend, comfort, and individuality</span>.
                        Our designs are made to move with you — whether you’re out with friends, at college, or making a statement online.
                    </p>

                    <div class="flex flex-wrap gap-4 mt-4">
                        <!-- Primary Button -->
                        <a href="/shop"
                            class="relative inline-block uppercase rounded-md overflow-hidden group border-2 border-black bg-transparent px-8 py-3 text-black font-bold text-base">
                            <span class="relative z-10 transition-colors duration-700 group-hover:text-white">
                                Shop Now
                            </span>
                            <span
                                class="absolute inset-0 bg-black -translate-x-full group-hover:translate-x-0 transition-transform duration-700 ease-out z-0"></span>
                        </a>


                    </div>



                </div>

            </div>
        </div>
    </section>


    <section class="py-16 text-center bg-white">
        <h3 class="text-sm tracking-widest uppercase text-gray-900 mb-4">Our Philosophy</h3>
        <h2 class="text-3xl md:text-5xl font-light max-w-4xl mx-auto leading-snug">
            Fashion that speaks for you — <span class="font-semibold">bold, effortless, and timeless.</span>
        </h2>
        <p class="max-w-3xl mx-auto text-gray-600 mt-6 text-lg leading-relaxed">
            We believe in empowering individuality through design. Every collection is a reflection of our passion for
            creativity, sustainability, and authenticity. Because at Nova Universe — style never fades, it evolves.
        </p>
    </section>




    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>
</body>

</html>