<?php include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php"; ?>

<body class="bg-gray-50 font-sans">
    <div class="relative min-h-screen flex flex-col items-center justify-center px-4 bg-cover bg-center" style="background-image: url('/public/images/bg16.jpg'); background: #57458F;
background: linear-gradient(87deg, rgba(87, 69, 143, 1) 25%, rgba(197, 86, 82, 1) 75%);">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-10"></div>

        <!-- Login Card -->
        <div
            class="relative z-10 w-full max-w-md bg-white/10 backdrop-blur-lg rounded-lg shadow-lg border border-white/30 overflow-hidden">


            <div class="px-6 py-4 text-center">


                <!-- Logo -->
                <div class="inline-block p-3 mb-0">
                    <a href="/">
                        <img src="/public/logos/logo-white.png" alt="Company Logo" class="h-24 max-md:h-14 rounded-lg">
                    </a>
                </div>

                <h1 class="text-white text-3xl max-md:text-2xl font-bold text-center ">Login </h1>
                <p class="text-gray-200 max-md:text-sm mt-2 mb-6">Please sign in to continue</p>

                <form id="loginForm" class="space-y-4 md:p-3" method="post" action="" enctype="multipart/form-data">
                    <!-- Email input -->
                    <div class="relative">
                        <div class="flex items-center p-2.5 bg-gray-50 rounded-lg border border-gray-200">
                            <span class="text-[#477ea1] mr-3">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" id="email" name="email" required placeholder="Email or username"
                                class="w-full bg-transparent focus:outline-none text-gray-700">
                        </div>
                    </div>

                    <!-- Password input -->
                    <div class="relative">
                        <div class="flex items-center p-2.5 bg-gray-50 rounded-lg border border-gray-200">
                            <span class="text-[#477ea1] mr-3">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" id="password" name="password" required placeholder="Password"
                                class="w-full bg-transparent focus:outline-none text-gray-700">
                            <button type="button" id="togglePassword" onclick="togglePasswordVisibility()"
                                class="text-[#477ea1] hover:text-gray-400">
                                <i class="fas fa-eye" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>

                    <input type="hidden" name="isdistributor" value="0">

                    <!-- Login button -->
                    <button type="submit" name="login"
                        class="w-full py-2.5 bg-[#4e3e80] text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Login
                    </button>
                </form>
                <div class="text-sm text-center mb-3 space-y-1 text-white border-t border-gray-300 border-dashed pt-3">
                    <p>Need help? Contact Support</p>
                    <div class="flex max-md:flex-col justify-center gap-4 max-md:gap-2 mt-2 text-gray-200">
                        <p>
                            <a href="mailto:support@teamrudra.com" class="hover:underline ">
                                <i class="fas fa-envelope mr-1"></i> support@teamrudra.com
                            </a>
                        </p>
                        <span class="max-md:hidden">|</span>
                        <p>
                            <a href="tel:+917208344434" class="hover:underline ">
                                <i class="fas fa-phone mr-1"></i> +91 7208344434
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <!-- <footer class="absolute bottom-4 w-full text-center text-xs text-gray-300">
            &copy;<?php echo date('Y'); ?> Bloomhair Clinic. All rights reserved.
        </footer> -->
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>

</body>

</html>