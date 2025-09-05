<?php
$user = "user";

// include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/CartController.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LoginController.php";

$controller = new LoginController($this->db);
// $cartController = new CartController($this->db);

$pageTitle = "Register";


ini_set('display_errors', 1);
error_reporting(E_ALL);

// printWithPre($_SESSION);

$step = 1;
$cart1 = false;
$cart2 = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // if (isset($_POST["sendOtp"])) {
    // printWithPre($_SESSION);
    if (isset($_POST["phone"])) {
        // printWithPre($_POST);
        // die();

        $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $username = strip_tags($_POST["email"]);
        $fname = strip_tags($_POST["fname"]);
        $lname = strip_tags($_POST["lname"]);
        $phoneNumber = strip_tags($_POST["phone"]);

        $data = [
            "username" => $username,
            "fname" => $fname,
            "lname" => $lname,
            "mobile" => $phoneNumber,
            "password" => $hashedPassword,
        ];

        $userid = $controller->registerOnlineUser($data);

        if ($userid) {
            $_SESSION['success'] = "Register And Login Successfully";
            $_SESSION['type'] = "User";
            $_SESSION['username'] = $username;
            $_SESSION["userid"] = "$userid";
            $_SESSION['fname'] = $fname;
            $_SESSION['mobile'] = $phoneNumber;



            if ($cart1) {
                header("Location: /cart.php");
                exit();
            } else if ($cart2) {
                header("location: /checkout.php");
                exit();
            } else {
                header("Location: /");
                exit();
            }
        } else {
            $_SESSION['err'] = "Invalid OTP. Please try again.";
            header("Location: /register.php");
            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vikassawantsacademy | Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js"
        integrity="sha512-JSCFHhKDilTRRXe9ak/FJ28dcpOJxzQaCd3Xg8MyF6XFjODhy/YMCM8HW0TFDckNHWUewW+kfvhin43hKtJxAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/f364b180c9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
    <!-- <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-auth.js"></script> -->

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'float': 'float 10s infinite ease-in-out',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translate(0, 0)'
                            },
                            '25%': {
                                transform: 'translate(100px, 100px)'
                            },
                            '50%': {
                                transform: 'translate(200px, 0)'
                            },
                            '75%': {
                                transform: 'translate(100px, -100px)'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .otp-container {
            display: flex;
            justify-content: space-around;
        }

        .g_id_signin {
            width: 100%;
        }

        .nsm7Bb-HzV7m-LgbsSe {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .otp-input {
            width: 2rem;
            height: 2rem;
            text-align: center;
            font-size: 1.25rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            margin: 0 0.25rem;
            box-sizing: border-box;
        }

        .otp-input::placeholder {
            color: #999;
        }

        /* New styles for animated background */
        .animated-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .animated-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.5;
            animation: float 10s infinite ease-in-out;
        }

        .circle1 {
            width: 300px;
            height: 300px;
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
            left: -150px;
            top: -150px;
        }

        .circle2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, #a18cd1, #fbc2eb);
            right: -100px;
            top: 20%;
            animation-delay: 2s;
        }

        .circle3 {
            width: 250px;
            height: 250px;
            background: linear-gradient(45deg, #84fab0, #8fd3f4);
            left: 20%;
            bottom: -125px;
            animation-delay: 4s;
        }


        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }
    </style>

    <script>
        // JavaScript to toggle between forms
        function showOtpForm() {
            // document.getElementById('registerForm').classList.add('hidden');
            // document.getElementById('otpForm').classList.remove('hidden');
        }
    </script>

</head>

<body class="bg-white pb-16">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
    <div class="animated-background">
        <div class="animated-circle circle1"></div>
        <div class="animated-circle circle2"></div>
        <div class="animated-circle circle3"></div>
    </div>

    <div class="flex justify-center items-center py-10">
        <div class="bg-white p-8 rounded-lg w-[40%]  relative z-10 max-md:w-[100%] max-md:p-2">
            <h2 class="text-3xl font-bold text-center golden mb-2">Register</h2>
            <h2 class="text-sm text-gray-500 text-center mb-6 ">If you have an account with us, please log in.</h2>

            <form class="w-full flex flex-col items-center justify-center gap-3 max-md:w-full" action="" method="post" id="registerForm">

                <div id="mainForm" class="w-full max-md:w-[90%]" style="display: block;">
                    <div class="flex items-center justify-center gap-2 w-full 
                     max-md:flex-col ">
                        <input type="text" placeholder="Enter First Name" name="fname" required
                            class="w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#f9da88] focus:border-transparent transition">
                        <input type="text" placeholder="Enter Last Name" name="lname" required
                            class="w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#f9da88] focus:border-transparent transition">
                    </div>
                    <div class="flex items-center mt-2 mb-2 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#f9da88] focus:border-transparent transition">
                        <span class="text-gray-400 pl-2 py-2">+91</span>
                        <input type="number" placeholder="Enter Phone Number" name="phone" required id="phone"
                            class="w-full px-2 ml-4 py-2 border-none focus:outline-none focus:ring-1 focus:ring-[#f9da88] focus:border-transparent transition">
                    </div>

                    <input type="email" placeholder="Enter Email ID" name="email" required id="email"
                        class="w-full px-3 py-2 mb-2 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#f9da88] focus:border-transparent transition">
                    <div class="w-full relative mb-2">
                        <div class="absolute right-0 top-1/2 translate-y-[-50%] w-12 h-12 flex items-center justify-center">
                            <i id="eye" class="fas fa-eye-slash text-gray-500 cursor-pointer"></i>
                        </div>
                        <input type="password" id="password" placeholder="Enter Password" name="password" required
                            class="w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#f9da88] focus:border-transparent transition">
                    </div>
                    <div id="recaptcha-container"></div>
                    <h2 class="text-xl mt-4" id="timer" style="display: none;">Wait For <span id="countdownDisplay">0</span> seconds</h2>
                    <button type="submit" name="sendOtp" onclick="sendotp()" id="sendOtpBtn"
                        class="w-full bg-[#030f40] text-white py-2 mb-2   transition duration-300">Register </button>
                    <div id="g_id_onload"
                        data-client_id="667809024970-vrnjffsnh4u6oospgpp69of0vuv8qhof.apps.googleusercontent.com"
                        data-callback="handleCredentialResponse">
                    </div>
                    <div class="g_id_signin" data-type="standard"></div>
                </div>





            </form>
            <div class="flex justify-between mt-4 text-sm">
                <a href="/login" class="text-gray-500 hover:text-pink-800 transition w-full text-center">
                    Already have an account? Login
                </a>
            </div>


        </div>
    </div>




    <
        </body>
        <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
        <script src="https://accounts.google.com/gsi/client" async defer></script>

        <script>
            const eye = document.getElementById("eye");
            const password = document.getElementById("password");

            eye.addEventListener("click", () => {
                if (eye.classList.contains("fa-eye-slash")) {
                    eye.classList.remove("fa-eye-slash");
                    eye.classList.add("fa-eye");
                    password.setAttribute("type", "text");
                } else {
                    eye.classList.remove("fa-eye");
                    eye.classList.add("fa-eye-slash");
                    password.setAttribute("type", "password");
                }
            });

            let otp = "";
            let countdown;

            async function sendotp() {

                let phone = document.getElementById("phone");
                let email = document.getElementById("email");
                if (phone.value != "" && email.value != "") {
                    // console.log(phone.value);

                    if (email.value.endsWith("@gmail.com")) {
                        const result = await axios.post("/verifyotp", new URLSearchParams({
                            email: email.value,
                            phone: phone.value
                        }))
                        console.log(result);
                        if (result.data.success) {
                            otp = result.data.otp;
                            document.getElementById("mainForm").style.display = "none";
                            document.getElementById("verifyForm").style.display = "block";

                        } else {
                            toastr.error(result.data.message);

                            let seconds = parseInt(60);
                            document.getElementById("timer").style.display = "block";
                            document.getElementById("sendOtpBtn").disabled = true;
                            document.getElementById("countdownDisplay").textContent = seconds;

                            clearInterval(countdown);

                            if (isNaN(seconds) || seconds <= 0) {
                                alert("Please enter a valid number of seconds.");
                                return;
                            }

                            countdown = setInterval(function() {
                                seconds--;
                                document.getElementById("countdownDisplay").textContent = seconds; // Update the display

                                if (seconds <= 0) {
                                    clearInterval(countdown);
                                    // alert("Time's up!");
                                    document.getElementById("sendOtpBtn").disabled = false;
                                    document.getElementById("timer").style.display = "none";


                                }
                            }, 1000);
                        }
                    } else {
                        alert("Please enter a valid email address");
                        return;
                    }
                } else {
                    alert("Please enter a valid email address");
                    return;
                }

            }

            function handleCredentialResponse() {
                if (otp == document.getElementById("otp").value) {
                    document.getElementById("registerForm").submit()
                }
            }


            <?php if (isset($_SESSION['err']) && !empty($_SESSION['err'])): ?>
                console.log("Error: <?= $_SESSION['err'] ?>");
                $(document).ready(function onDocumentReady() {
                    toastr.error("<?= $_SESSION['err'] ?>");
                });
                <?php unset($_SESSION['err']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])): ?>
                console.log("Error: <?= $_SESSION['success'] ?>");
                $(document).ready(function onDocumentReady() {
                    toastr.success("<?= $_SESSION['success'] ?>");
                });
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
        </script>

        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>

</html>