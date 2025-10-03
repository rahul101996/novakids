<?php

$user = "";
$fast2sms_api = getFast2SMS();

function generateOTP($length = 4)
{
    $characters = '0123456789';
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $otp;
}
$data = [
    "success" => false,
    "message" => "Something went wrong",
];

if (isset($_POST["phone"])) {

    // echo $_POST["phone"];
    // // echo "<br>";
    // // echo $otp;
    // die();

    $user = $this->getUserByphone($_POST["phone"]);

    // printwithpre($user);
    // die();
    // if (!empty($user)) {
    # code...
    $otp = generateOTP();
    $phoneNumber = strip_tags($_POST["phone"]);
    $apikey = $fast2sms_api[1];
    // print_r($apikey);
    // die();

    // $url = "https://www.fast2sms.com/dev/bulkV2?authorization=$apikey&route=otp&variables_values=$otp&flash=0&numbers=$phoneNumber";
    // $response = file_get_contents($url);
    // $response = (array) json_decode($response);



    if (1 == 1) {
        $data = [
            "success" => true,
            "message" => "Otp Sent Successfully",
            "otp" => $otp,
            "data" => $user,
        ];
    } else {
        $data = [
            "success" => false,
            "message" => "Something went wrong",
        ];
    }
    // } else {
    //     $data = [
    //         "success" => false,
    //         "message" => "User Not Found",
    //     ];
    // }
} else {
    $data = [
        "success" => false,
        "message" => "Incorrect Phone Number",
    ];
}
echo json_encode($data);
