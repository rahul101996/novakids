<?php
$user = "user";
// include_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LoginController.php";

// $controller = new LoginController($conn);
// $cartController = new CartController($this->db);
$pageTitle = "Login Page";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// printWithPre($_SESSION);

if (isset($_SESSION["type"]) && $_SESSION["type"] == "User" && !empty($_SESSION["username"])) {
    header("location:/");
    exit();
}

if (!empty($_POST)) {
    // printWithPre($_POST);
    // exit();
    // die();

    $cartaratratartaratartrrat = false;
    $cartaratratartaratartrrat1 = false;
    if (isset($_POST["login"])) {

        // Sanitize the username to prevent special characters
        if ($_POST["from"] == "otp") {
            $username = htmlspecialchars(strip_tags($_POST["email"]));
            // $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->getOnlineUserAuthentication($username, $password);
            // $user = getUserByphone($this->db, $_POST["mobile"]);
        } else {
            $username = htmlspecialchars(strip_tags($_POST["username"]));
            $user = getUserByUsername($this->db, $username);
        }
        // print_r($username);
        // die();


        // Retrieve the user by username

        // printWithPre($user); 
        // die();

        // if ($user['is_active'] == 1) {
        if ($user) {
            // User found, now verify the password
            $proceed = false;
            if ($user["user_from"] == "otp") {
                // if (password_verify($_POST["password"], $user["password"])) {
                $proceed = true;
                // }
            } else if ($user["user_from"] == "google") {
                if ($_POST["password"] == "zyxwvutsrqponmlkjihgfedcba") {
                    $proceed = true;
                }
            }

            if ($proceed) {
                // echo "Login successful!";
                $_SESSION["type"] = "User";
                $_SESSION["username"] = $user["username"];
                $_SESSION["userid"] = $user["id"];
                $_SESSION["fname"] = $user["fname"];
                $_SESSION['popup'] = 'false';
                $_SESSION['profile_img'] = $user['profile_img'];
                $_SESSION['mobile'] = $user['mobile'];

                $_SESSION["success"] = "User Login Successfully";


                if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $key => $c) {
                        $cartaratratartaratartrrat = true;


                        $cartController->insertCart([
                            "variant_id" => $c["variant_id"],
                            "product_id" => $c["product"],
                            "quantity" => $c["quantity"],
                            "preview_image" => $c["image"],
                            "user_image" => $c["user_image"],
                            "userid" => $user["id"],
                            "username" => $username,
                        ]);
                    }
                    // die();
                    // unset($_SESSION["cart"]);
                } else if (isset($_SESSION["FormCartData"])) {
                    $cartaratratartaratartrrat1 = true;
                    $_SESSION["cartData"] = $_SESSION["FormCartData"];
                    unset($_SESSION["FormCartData"]);
                }
            } else {
                // echo "Invalid password.";
                $_SESSION["err"] = "Invalid Password";
            }
        } else {
            if ($_POST["from"] == "google" && !empty($_POST["username"]) && !empty($_POST["fname"])) {
                $data = [
                    "username" => $_POST["username"],
                    "fname" => $_POST["fname"],
                    "lname" => (!isset($_POST["lname"]) || $_POST["lname"] == 'undefined') ? '' : $_POST["lname"],
                    "mobile" => $_POST["mobile"],
                    "password" => "",
                    "user_from" => "google"
                ];

                // Insert the user into the database
                $userid = registerOnlineUser($this->db, $data);
                if ($userid) {
                    // echo "User registered successfully!";
                    $_SESSION["success"] = "Register Successfully";
                    $_SESSION["type"] = "User";
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["userid"] = $userid;
                    $_SESSION["fname"] = $_POST["fname"];
                    $_SESSION['popup'] = 'false';
                    $_SESSION['profile_img'] = '';
                    $_SESSION['mobile'] = $_POST['mobile'];


                    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
                        foreach ($_SESSION["cart"] as $key => $c) {
                            $cartaratratartaratartrrat = true;


                            $cartController->insertCart([
                                "variant_id" => $c["variant_id"],
                                "product_id" => $c["product"],
                                "quantity" => $c["quantity"],
                                "preview_image" => $c["image"],
                                "user_image" => $c["user_image"],
                                "userid" => $user["id"],
                                "username" => $username,
                            ]);
                        }
                        unset($_SESSION["cart"]);
                    } else if (isset($_SESSION["FormCartData"])) {
                        $cartaratratartaratartrrat1 = true;
                        $_SESSION["cartData"] = $_SESSION["FormCartData"];
                        unset($_SESSION["FormCartData"]);
                    }
                } else {
                    // echo "Failed to register user.";
                    $_SESSION["err"] = "Can't Login";
                }
            } else {
                $_SESSION["err"] = "User Not Found";
            }
        }
        // } else {
        //     $_SESSION["err"] = "Your are Temperary blocked";
        // }
        if ($cartaratratartaratartrrat) {
            header("location: /checkout");
            exit();
        } else if ($cartaratratartaratartrrat1) {
            header("location: /checkout");
            exit();
        }

        header("location: /login");
        exit();
    }
}

if (isset($_POST['newPass'], $_POST['confirmPass'], $_POST['phone'])) {
    $cart1 = false;
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];
    $phone = $_POST['phone'];

    if ($newPass === $confirmPass) {
        $result = $controller->ForgetPassword($phone, $newPass);

        if ($result['success']) {

            $_SESSION["type"] = "User";
            $_SESSION["username"] = $result['data']['username'];
            $_SESSION["userid"] = $result['data']["id"];
            $_SESSION["fname"] = $result['data']["fname"];
            $_SESSION['popup'] = 'false';

            $_SESSION["success"] = "User Login Successfully";

            if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $key => $c) {
                    $cart1 = true;
                    $data = $cartController->getCartByVarientAndUserid($c["varient"], $result['data']["id"]);
                    if ($data) {

                        $cartController->updateCart($data["id"], [
                            "quantity" => $data["quantity"] + $c["quantity"]
                        ]);
                    } else {

                        $cartController->insertCart([
                            "varient" => $c["varient"],
                            "category" => $c["category"],
                            "product" => $c["product"],
                            "quantity" => $c["quantity"],
                            "userid" => $result['data']["id"],
                            "username" => $username,
                        ]);
                    }
                }
            }
            unset($_SESSION["cart"]);

            $response = [
                "status" => "success",
                "message" => "Password updated successfully.",
                "userData" => $result['data'],
                "cart" => $cart1
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => $result['message'] ?? "Password update failed."
            ];
        }
    } else {
        $response = [
            "status" => "error",
            "message" => "Passwords do not match."
        ];
    }

    // Return JSON response
    echo json_encode($response);
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Vikas Sawants Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/e645c402e0.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.9.0/axios.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f9fafb;
            min-height: 100vh;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
            max-width: 400px;
            /* Reduced width */
        }

        .tab-active {
            position: relative;
            color: #1d4ed8;
            font-weight: 600;
        }

        .tab-active::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: #1d4ed8;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
        }

        .input-field {
            transition: all 0.2s ease;
            border-radius: 8px;
        }

        .input-field:focus {
            border-color: #1d4ed8;
            box-shadow: 0 0 0 3px rgba(29, 78, 216, 0.1);
        }

        .btn-primary {
            background-color: #1d4ed8;
            transition: all 0.2s ease;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #1e40af;
            box-shadow: 0 4px 10px rgba(29, 78, 216, 0.1);
        }

        .accent-orange {
            color: #FF9933;
        }

        .accent-green {
            color: #138808;
        }
    </style>
</head>

<body class="">
    <!-- Login/Register Card -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php'; ?>
      <div class="w-full flex items-center justify-center  bg-[#272c6c]">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/marquee.php'; ?>
        </div>
    <div class="w-full flex items-center justify-center py-20 max-md:p-4">
        <div class="card overflow-hidden backdrop-blur-2xl mx-auto w-[40%] max-md:w-[95%]">
            <!-- Header with tricolor accents -->

            <div class="w-full bg-white" id="tabs"> <!-- Reduced width -->

                <div id="LoginFormDiv" class="block px-6 py-4 w-full"> <!-- Reduced padding -->
                    <form action="#" method="POST" class="w-full flex items-center flex-col">
                        <img src="https://vikassawantsacademy.com/wp-content/uploads/2024/08/cropped-Vikas-Sawants-ACADEMY-1-300x90-1.png" class="w-[70%] mx-auto" alt="">
                        <div class=" w-full"> <!-- Reduced margin -->


                            <input type="email" id="passemeail" name="email" class="px-3 mt-10 py-2 w-full text-sm outline-none border border-gray-300 rounded " autocomplete="email" required placeholder="Email Address">
                        </div>

                        <div class="w-full relative mb-2 mt-4">
                            <div class="absolute right-0 top-1/2 translate-y-[-50%] w-12 h-12 flex items-center justify-center">
                                <i class="fas fa-eye-slash text-gray-500 cursor-pointer" aria-hidden="true" id="toggleLoginPassword"></i>
                            </div>
                            <input type="password" id="password" name="password"
                                placeholder="Enter Password"
                                autocomplete="current-password"
                                required
                                class="w-full px-3 py-2 rounded text-sm border border-gray-300 focus:outline-none focus:ring-1 focus:ring-[#f9da88] focus:border-transparent transition">

                        </div>
                        <div class="mb-4"> <!-- Reduced margin -->

                        </div>
                        <button class="w-full bg-[#030f40] text-white py-2 rounded mt-4 text-sm" type="submit" name="login" id="loginform">Login</button>
                        <p class="text-sm text-gray-500 mt-4 w-full text-xs">Don't have an account? <a href="/register" class="text-[#543cdf] semibold">Sign up</a></p>
                        <div class="w-full relative my-6">
                            <div class="w-full h-[1px] bg-gray-300"></div>
                            <div class="bg-white py-2 px-4 absolute top-1/2 left-1/2 translate-x-[-50%] translate-y-[-50%] text-sm text-gray-500">Or login with</div>
                        </div>
                        <div id="g_id_onload" style="display:flex; align-items:center; justify-content:center; width:100%"
                            data-client_id="188574937788-fn4td4evj5cqejhrgge28pf8129sa58q.apps.googleusercontent.com"
                            data-callback="handleCredentialResponse"
                            data-auto_select="false">
                        </div>
                        <div class="g_id_signin max-md:mt-[-4%]" data-type="standard"></div>
                        <input type="hidden" id="from" name="from" value="otp">
                        <input type="hidden" id="username" name="username" value="">
                        <input type="hidden" id="fname" name="fname" value="">
                        <input type="hidden" id="lname" name="lname" value="">
                        <input type="hidden" id="mobile" name="mobile" value="">
                        <input type="hidden" value="">
                    </form>
                </div>

                <!-- Register Form - Split into 2 columns -->

            </div>
            <!-- Footer -->

        </div>
    </div>
    <script>
        <?php if (isset($_SESSION['err']) && !empty($_SESSION['err'])) : ?>
            console.log("Error: <?= $_SESSION['err'] ?>");
            $(document).ready(function onDocumentReady() {
                toastr.error("<?= $_SESSION['err'] ?>");
            });
            <?php unset($_SESSION['err']); ?>
        <?php endif; ?>
        // toastr.error("ebfubwehub");
        // Tab switching functionality
        // const loginTab = document.getElementById('loginTab');
        // const registerTab = document.getElementById('registerTab');
        // const loginForm = document.getElementById('loginForm');
        // const registerForm = document.getElementById('registerForm');

        // loginTab.addEventListener('click', function() {
        //     loginTab.classList.add('tab-active');
        //     registerTab.classList.remove('tab-active');

        //     loginForm.classList.remove('hidden');
        //     loginForm.classList.add('block');
        //     registerForm.classList.remove('block');
        //     registerForm.classList.add('hidden');
        // });

        // registerTab.addEventListener('click', function() {
        //     registerTab.classList.add('tab-active');
        //     loginTab.classList.remove('tab-active');

        //     registerForm.classList.remove('hidden');
        //     registerForm.classList.add('block');
        //     loginForm.classList.remove('block');
        //     loginForm.classList.add('hidden');
        // });
        // const togglePassword = document.getElementById('togglePassword');
        // const passwordInput = document.getElementById('newpassword');
        // console.log(passwordInput);

        // togglePassword.addEventListener('click', () => {
        //     const isPassword = passwordInput.type === 'password';
        //     passwordInput.type = isPassword ? 'text' : 'password';
        //     togglePassword.classList.toggle('fa-eye');
        //     togglePassword.classList.toggle('fa-eye-slash');
        // });
        const toggleLoginPassword = document.getElementById('toggleLoginPassword');
        const password = document.getElementById('password');
        // console.log(passwordInput);

        toggleLoginPassword.addEventListener('click', () => {
            const isthisPassword = password.type === 'password';
            password.type = isthisPassword ? 'text' : 'password';
            toggleLoginPassword.classList.toggle('fa-eye');
            toggleLoginPassword.classList.toggle('fa-eye-slash');
        });
    </script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script>
        const verifyOtp1 = document.getElementById('loginform');

        function handleCredentialResponse(response) {
            // decodeJwtResponse() is a custom function defined by you
            // to decode the credential response.
            const responsePayload = decodeJwtResponse(response.credential);
            console.log(responsePayload)
            console.log("ID: " + responsePayload.sub);
            console.log('Full Name: ' + responsePayload.name);
            console.log('Given Name: ' + responsePayload.given_name);
            console.log('Family Name: ' + responsePayload.family_name);
            console.log("Image URL: " + responsePayload.picture);
            console.log("Email: " + responsePayload.email);

            document.getElementById("passemeail").removeAttribute('required');
            document.getElementById("password").removeAttribute('required');


            document.getElementById("password").value = "zyxwvutsrqponmlkjihgfedcba";
            document.getElementById("fname").value = responsePayload.given_name
            document.getElementById("lname").value = responsePayload.family_name
            document.getElementById("mobile").value = ""
            document.getElementById("username").value = responsePayload.email
            document.getElementById("from").value = "google";
            // document.getElementById("loginform").click();
            verifyOtp1.type = "submit"
            verifyOtp1.click();


        }

        function decodeJwtResponse(token) {
            var base64Url = token.split('.')[1];
            var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            var jsonPayload = decodeURIComponent(atob(base64).split('').map(function(c) {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));

            return JSON.parse(jsonPayload);
        }
    </script>

    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/footer.php'; ?>
</body>

</html>