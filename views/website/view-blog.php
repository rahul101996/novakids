<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<style>

</style>

<body>

    <div class="min-h-screen">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
          <div class="w-full flex items-center justify-center  bg-[#272c6c]">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/marquee.php'; ?>
        </div>
        <div class="w-full bg-[url('/public/images/Rectangle-5165.png')] bg-[#030f40] flex flex-col items-center justify-center py-16 max-md:py-5  relative">


            <div class="w-[80%] flex items-start justify-center flex-col section_paragraph section_paragraph--visible max-lg:w-[90%] max-md:w-[85%]">
                <div class="w-full flex items-center justify-start">
                    <div class="w-full flex items-start justify-start gap-3 text-white">
                        <a href="/">
                            <img src="/public/images/home-white.png" class="h-4" alt="">
                        </a>
                        <img src="/public/images/forward.png" class="h-4" alt="">
                        <span class="uppercase  text-xs">Our Offices</span>
                        <img src="/public/images/forward.png" class="h-4" alt="">
                        <span class="font-semibold uppercase text-xs"> thane

                        </span>
                    </div>
                </div>
                <h1 class="text-4xl text-white font-semibold mt-5 max-lg:text-2xl"><?= $blog['name'] ?></h1>
                <p class="text-white text-lg mt-2"><?= $blog['subtitle'] ?></p>
                <p class="text-white text-sm mt-2"><?= formatDate($blog['date']) ?></p>
            </div>
        </div>
        <div class="w-full flex flex-col items-center justify-center py-16 max-md:py-5 min-h-[100vh]  relative">


            <div class="w-[80%] flex items-start justify-center gap-10 max-lg:w-[90%] max-md:w-[85%] max-lg:flex-col max-lg:gap-5">
                <div class="w-[67%] flex items-start justify-start flex-col max-lg:w-full">
                    <div class="w-full flex items-center relative justify-center rounded-lg overflow-hidden group">

                        <img src="/<?= $blog['image'] ?>" class="group-hover:scale-110 w-full h-full object-cover transition-all ease-in-out duration-500" alt="">
                    </div>
                    <div class="mt-5">
                        <?= $blog['content'] ?>
                    </div>
                </div>
                <div class="w-[33%] flex items-center justify-center flex-col sticky top-10 max-lg:w-full max-lg:top-0">
                    <!-- <div class="w-full flex items-center justify-center border border-gray-300 py-2 pl-5 rounded-lg bg-[#fdfdfd]">
                        <input type="text" class="w-full pax-3 focus:outline-none h-7" placeholder="Type keyword here">
                        <button class="border-l border-gray-300 px-2"><svg class="icon " xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ed3410">
                                <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" stroke="black"></path>
                            </svg></button>
                    </div> -->
                    <div class="w-full flex items-start justify-center flex-col mt-16">
                        <p class="text-lg font-bold pb-3">Recent Blogs</p>
                        <div class="relative w-full h-[1px] bg-gray-300">
                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-[25%] h-[2px] bg-[#ed3410]"></span>
                        </div>
                        <?php
                        foreach ($blogs as $blog) {
                            $url = str_replace(' ', '-', $blog['name']);
                            $url = str_replace('“', '', $url);
                            $url = str_replace('”', '', $url);
                            $url = str_replace('’', '', $url);
                            $url = str_replace('&', 'and', $url);
                            $url = str_replace(':', '-', $url);
                            $url = str_replace('’', '', $url);
                            $url = strtolower($url);

                        ?>
                            <a href="/blog/<?= $url ?>" class="w-full flex items-start justify-center mt-7 flex-col">
                                <div class="w-full flex items-start justify-center gap-4">
                                    <div class="w-[30%] flex items-center justify-center rounded-lg overflow-hidden">
                                        <img src="/<?= $blog['image'] ?>" class="w-full object-cover" alt="">
                                    </div>
                                    <div class="w-[70%] flex items-center justify-start flex-col">
                                        <p class="w-full text-gray-900 font- text-sm">Bhutan! The happiest country on the world</p>
                                        <p class="w-full text-gray-400 text-xs">June 9, 2025</p>
                                    </div>
                                </div>
                                <div class="w-full h-[1px] bg-gray-300 my-4"></div>

                            </a>
                        <?php } ?>
                    </div>
                    <!-- <div class="w-full flex items-start justify-center flex-col mt-16">
                        <p class="text-lg font-bold pb-3">Popular Tags</p>
                        <div class="relative w-full h-[1px] bg-gray-300">
                            <span class="absolute left-0 top-1/2 -translate-y-1/2 w-[25%] h-[2px] bg-[#ed3410]"></span>
                        </div>
                        <div class="flex flex-wrap items-center justify-start mt-8 gap-2">
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">2 columns posts</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">Art work</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">booking sponsor</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">breaking news</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">dile</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">entertainment posts list</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">environment</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">food</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">full image post</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">grandpera</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">hotdog</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">hot springs</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">latest news</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">latest news image list</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">latest news video post</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">lifestyle list 1</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">lifestyle list 2</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">must read full post</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">must read row posts</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">number posts</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">popular posts</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">sidebar posts list</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">related posts slider</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">sport posts list</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">tabs posts</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">technology</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">sponsored</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">track</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">travel posts list</span>
                            <span class="font-[300] text-sm text-gray-500 px-2 py-1 border border-gray-300 rounded">vr box</span>






                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</body>