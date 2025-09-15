<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <div class="w-full bg-white items-center justify-center">
        <div class="w-[60%] items-center justify-center p-8 mx-auto">
            <!-- Header -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-900">Login</h1>
                <p class="text-gray-600 mt-2">
                    Don't have an account?
                    <a href="/signup" class="text-blue-600 underline">Sign Up</a>
                </p>
                  <div class="w-20 h-[3px] bg-[#f25b21] mt-3 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <form class="space-y-6">
                    <div class="relative">
                        <input type="email" name="email" required
                            class="peer h-14 w-full border-b border-gray-300 text-gray-900 text-base placeholder-transparent focus:outline-none focus:border-black"
                            placeholder="Email" />
                        <label for="email"
                            class="absolute left-0 -top-1 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2.5 peer-focus:-top-1 peer-focus:text-gray-600 peer-focus:text-xs">
                            Email <span class="text-red-500">*</span></label>
                    </div>

                    <div class="relative">
                        <input type="password" name="password" required
                            class="peer h-14 w-full border-b border-gray-300 text-gray-900 text-base placeholder-transparent focus:outline-none focus:border-black"
                            placeholder="Password" />
                        <label for="password"
                            class="absolute left-0 -top-1 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2.5 peer-focus:-top-1 peer-focus:text-gray-600 peer-focus:text-xs">
                            Password <span class="text-red-500">*</span></label>
                    </div>

                    <button type="submit"
                        class="relative w-full font-semibold py-2 rounded-lg border-2 border-black overflow-hidden group">
                        <span class="relative z-10 text-white group-hover:text-black transition-colors duration-300">
                            Login
                        </span>
                        <span
                            class="absolute inset-0 bg-black transition-transform duration-300 origin-left group-hover:scale-x-0 scale-x-100"></span>
                    </button>
                </form>

                <!-- Right Side: Social Login -->
                <div class="flex flex-col justify-center space-y-4 border-l border-gray-300 pl-6">
                    <p class="text-center text-gray-500">or</p>
                    <button
                        class="flex items-center justify-center gap-3 border border-gray-300 rounded-md py-3 text-gray-700 hover:bg-gray-50">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google" class="w-5 h-5">
                        Continue with Google
                    </button>
                </div>
            </div>

            <!-- Footer -->
            <p class="text-sm text-gray-500 text-center mt-10">
                <a href="#" class="underline">Terms of Use</a> ·
                <a href="#" class="underline">Privacy Policy</a>
            </p>
        </div>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>