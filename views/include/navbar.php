<style>
    body {
        background: #1a1a1a;
    }
</style>
<header class="w-full flex bg-[#1a1a1a] items-center justify-between fixed top-0 left-0 z-[9999] py-2">
    <div class="flex items-center justify-center px-4 py-2 gap-1">
        <img alt="Shopify" src="/<?= $companyData['logo'] ?>" class="h-[1.8rem]">
        <span class="text-white text-[1.1rem] font-semibold italic"> <?= $companyData['company'] ?> </span>
    </div>
    <div class="relative w-[45vw]">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke="#d9d9d9">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input type="text" placeholder="Search"
            class="bg-[#303030] w-full pl-10 pr-4 py-2 rounded-xl  border-[#303030]  focus:outline-none focus:bg-black placeholder:text-[#d9d9d9] border-t border-gray-600">
        <div
            class="absolute right-3 top-1/2 -translate-y-1/2 text-xs text-[#d9d9d9] font-semibold rounded-md px-1.5 py-1.5 bg-[#373737]">
            CTRL K
        </div>

    </div>
    <div class="flex items-center space-x-5 px-4">
        <button class="text-white hover:text-gray-700">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
        </button>
        <div class="flex items-center space-x-2">
            <div class="w-9 h-9 bg-fuchsia-600 rounded-xl flex items-center justify-center text-white font-semibold text-sm">
                <span><?= $companyData['company'][0] ?> </span>
            </div>
            <span class="text-right text-sm">
                <span class="font-semibold text-gray-300"><?= $companyData['company'] ?></span>
            </span>

        </div>
    </div>
</header>