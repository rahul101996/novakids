<?php
// printWithPre($_SESSION);
$page = '404';
?>
<!DOCTYPE html>
<html lang="en">

<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/header.php'; ?>

<body class="overflow-x-hidden archivo-narrow-k">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/views/website/include/navbar.php';
    ?>

    <div class="w-full flex items-center justify-center flex-col h-[80vh]">
       <img src="/public/images/404-1.png" class="w-[40%]" alt="">
       <p class="w-[60%] text-center">We can’t seem to find the page you’re looking for. <br>
 Don’t worry — let’s get you back on track!</p>
 <button onclick="window.location.href='/'" class="bg-gray-800 text-white px-5 rounded-md py-2 mt-3">Go Home</button>
    </div>


    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/sidecart.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/views/website/include/footer.php";
    ?>

</body>