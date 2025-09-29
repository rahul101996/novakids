<?php
// echo "nnndn";
// printWithPre($_SESSION);
// printWithPre($_POST);
// die();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
// if (isset($_SESSION["type"]) && $_SESSION["type"] == "User" && !empty($_SESSION["username"])) {
//     header("location:/");
//     exit();
// }
if (!empty($_POST)) {
    // printWithPre($_SESSION);
    // exit();
    // printWithPre($_POST);
    // die();
    $cartaratratartaratartrrat = false;
    $cartaratratartaratartrrat1 = false;
    if (isset($_POST["login"])) {


        // Sanitize the username to prevent special characters
        if ($_POST["from"] == "otp") {
            // $username = htmlspecialchars(strip_tags($_POST["email"]));
            $user = $this->getUserByphone($_POST["mobile"]);
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
                // echo "Login successful!";
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
                $_SESSION["lname"] = $user["lname"];
                $_SESSION['popup'] = 'false';
                $_SESSION['mobile'] = $user['mobile'];
                $_SESSION["success"] = "User Login Successfully";


                if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $key => $c) {
                        $cartaratratartaratartrrat = true;

                        $data = getData2("SELECT * FROM `tbl_cart` WHERE `varient` = $c[varient] AND `userid` = $user[id] ORDER BY `id` DESC LIMIT 1")[0];
                        if ($data) {

                            update([
                                "quantity" => $data["quantity"] + $c["quantity"]
                            ],  $data["id"], "tbl_cart");
                        } else {

                            $cartdata = [
                                "varient" => $c["varient"],
                                "category" => $c["category"],
                                "product" => $c["product"],
                                "quantity" => $c["quantity"],
                                "userid" => $user["id"],
                                "username" => $username,
                            ];
                            add($cartdata, "tbl_cart");
                        }
                    }
                    unset($_SESSION["cart"]);
                } else if (isset($_SESSION["FormCartData"])) {
                    $cartaratratartaratartrrat1 = true;
                    $_SESSION["cartData"] = $_SESSION["FormCartData"];
                    unset($_SESSION["FormCartData"]);
                }



                // $this->updateUser($user["id"], [
                //     "last_login" => date("Y-m-d H:i:s")
                // ]);
                // echo "hii";
                header("location: /");
                exit();
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
                $userid = add($data, "online_users");
                if ($userid) {
                    // echo "User registered successfully!";
                    $_SESSION["success"] = "Register Successfully";
                    $_SESSION["type"] = "User";
                    $_SESSION["username"] = $_POST["username"];
                    $_SESSION["userid"] = $userid;
                    $_SESSION["fname"] = $_POST["fname"];
                    $_SESSION["lname"] = (!isset($_POST["lname"]) || $_POST["lname"] == 'undefined') ? '' : $_POST["lname"];
                    $_SESSION['popup'] = 'false';
                    $_SESSION['mobile'] = $_POST['mobile'];

                    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
                        foreach ($_SESSION["cart"] as $key => $c) {

                                $cartdata = [
                                    "varient" => $c["varient"],
                                    "category" => $c["category"],
                                    "product" => $c["product"],
                                    "quantity" => $c["quantity"],
                                    "userid" => $userid,
                                    "username" => $_POST["username"],
                                ];
                                add($cartdata, "tbl_cart");
                            
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
            } elseif ($_POST["from"] == "otp") {

                $data = [

                    'mobile' => $_POST["mobile"],
                ];
                // printWithPre($data);
                // die();
                $adduser = add($data, "online_users");
                if ($adduser) {
                    $_SESSION["success"] = "Register Successfully";
                    $_SESSION["type"] = "User";
                    $_SESSION["username"] = '';
                    $_SESSION["userid"] = $adduser;
                    $_SESSION["fname"] = '';
                    $_SESSION["lname"] = '';
                    $_SESSION['popup'] = 'false';
                    $_SESSION['mobile'] = $user['mobile'];

                    header("location: /");
                    exit();
                }
            } else {
                $_SESSION["err"] = "User Not Found";
            }
        }
        // } else {
        //     $_SESSION["err"] = "Your are Temperary blocked";
        // }
        if ($cartaratratartaratartrrat) {
            header("location: /");
            exit();
        } else if ($cartaratratartaratartrrat1) {
            header("location: /checkout.php");
            exit();
        }
        // echo "gandu";
        header("location: /");
        exit();
    }
}
?>

<head>
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1525213108842821');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1525213108842821&ev=PageView&noscript=1" /></noscript>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5VZ39TM5');
    </script>
    <!-- End Google Tag Manager -->
    <!-- End Meta Pixel Code -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaKids</title>
    <link rel="icon" href="/public/logos/nova_favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/public/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/e645c402e0.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Birthstone+Bounce:wght@400;500&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Manrope:wght@200..800&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Oswald:wght@200..700&family=Satisfy&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400..700;1,400..700&display=swap"
        rel="stylesheet">

    <style>
        .archivo-narrow-k {
            font-family: "Archivo Narrow", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

         .S9gUrf-YoZ4jf{

        display:flex ! important;
    }
    .g_id_signin {
        display:flex ! important;
        justify-content: center ! important;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


</head>


<!-- Scroll Toggle Button -->
<button id="scrollToggleBtn"
    class="fixed bottom-6 right-4 max-md:bottom-4 max-md:right-4 z-50 bg-[#f25b21] text-white p-3 max-md:p-2 rounded-full shadow-lg hover:scale-110 transition-all duration-300"
    onclick="handleScrollToggle()" title="Scroll">
    <!-- Arrow Icon -->
    <svg id="scrollIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
        stroke="currentColor">
        <!-- Down Arrow Default -->
        <path id="scrollPath" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
</button>
<script>
    const btn = document.getElementById("scrollToggleBtn");
    const path = document.getElementById("scrollPath");

    function handleScrollToggle() {
        const isAtTop = window.scrollY < 300;
        if (isAtTop) {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: "smooth"
            });
        } else {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    }

    // Toggle arrow direction on scroll
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            // Show up arrow
            path.setAttribute("d", "M5 15l7-7 7 7");
        } else {
            // Show down arrow
            path.setAttribute("d", "M19 9l-7 7-7-7");
        }
    });
   
</script>