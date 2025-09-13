<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>

    <div class="w-full bg-white items-center justify-center p-8">
        <div class="w-[60%] items-center justify-center p-8 mx-auto">
            <!-- Header -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-gray-900">Sign Up</h1>
                <p class="text-gray-600 mt-2">
                    Already have an account?
                    <a href="/login" class="text-blue-600 hover:underline">Log In</a>
                </p>
            </div>

            <!-- Main Form Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Side: Form -->
                <form class="space-y-4">
                    <div class="relative">
                        <input type="name" name="name" required
                            class="peer h-12 w-full border-b border-gray-300 text-gray-900 text-base placeholder-transparent focus:outline-none focus:border-black"
                            placeholder="Name" />
                        <label for="name"
                            class="absolute left-0 -top-1 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2.5 peer-focus:-top-1 peer-focus:text-gray-600 peer-focus:text-xs">
                            Name <span class="text-red-500">*</span></label>
                    </div>

                    <div class="relative">
                        <input type="phone" name="phone" required
                            class="peer h-12 w-full border-b border-gray-300 text-gray-900 text-base placeholder-transparent focus:outline-none focus:border-black"
                            placeholder="Phone" />
                        <label for="phone"
                            class="absolute left-0 -top-1 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2.5 peer-focus:-top-1 peer-focus:text-gray-600 peer-focus:text-xs">
                            Phone <span class="text-red-500">*</span></label>
                    </div>

                    <div class="relative">
                        <input type="email" name="email" required
                            class="peer h-12 w-full border-b border-gray-300 text-gray-900 text-base placeholder-transparent focus:outline-none focus:border-black"
                            placeholder="Email" />
                        <label for="email"
                            class="absolute left-0 -top-1 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2.5 peer-focus:-top-1 peer-focus:text-gray-600 peer-focus:text-xs">
                            Email <span class="text-red-500">*</span></label>
                    </div>

                    <div class="relative">
                        <input type="password" name="password" required
                            class="peer h-12 w-full border-b border-gray-300 text-gray-900 text-base placeholder-transparent focus:outline-none focus:border-black"
                            placeholder="Password" />
                        <label for="password"
                            class="absolute left-0 -top-1 text-gray-600 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2.5 peer-focus:-top-1 peer-focus:text-gray-600 peer-focus:text-xs">
                            Password <span class="text-red-500">*</span></label>
                    </div>

                    <button type="submit"
                        class="relative w-full font-semibold py-2 rounded-md border-2 border-black overflow-hidden group">
                        <!-- Text -->
                        <span class="relative z-10 text-white group-hover:text-black transition-colors duration-300">
                            Sign Up
                        </span>
                        <!-- Animated BG -->
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
                    <!-- <button
                        class="flex items-center justify-center gap-3 border border-gray-300 rounded-md py-3 text-gray-700 hover:bg-gray-50 bg-[#1877F2] text-white">
                        <img src="https://www.svgrepo.com/show/349553/facebook.svg" alt="Facebook" class="w-5 h-5">
                        Continue with Facebook
                    </button> -->
                </div>
            </div>

            <!-- Footer -->
            <p class="text-sm text-gray-500 text-center mt-10">
                * By signing up, you agree to our
                <a href="#" class="underline">Terms of Use</a> and acknowledge you’ve read our
                <a href="#" class="underline">Privacy Policy</a>.
            </p>
        </div>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>