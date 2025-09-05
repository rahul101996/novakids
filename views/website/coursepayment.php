<?php
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; // Make sure you have PHPMailer installed via 

$user = "";
function sendCoursePurchaseEmail($toEmail, $userName, $courseName, $course, $link = null)
{
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rudratech.karthik1@gmail.com';
        $mail->Password   = 'wcco uwbe zrtp eszg'; // Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('info@vikassawantsacademy.com', 'Vikas Sawant\'s Academy');
        $mail->addAddress($toEmail, $userName);

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = 'Course Purchase Confirmation';

        // Conditional Google Drive button
        $googleDriveButton = '';
        if (strtolower($course) === 'correspondence') {
            $googleDriveButton = '
                <p style="text-align: center; margin-top: 20px;">
                    <a href="' . htmlspecialchars($link) . '" 
                       style="background-color: #065caa; color: white; padding: 12px 20px; text-decoration: none; font-weight: bold; border-radius: 5px;" 
                       target="_blank">
                       Access Course Material
                    </a>
                </p>
            ';
        }

        // Email Body
        $mail->Body = '
            <div style="font-family: Arial, sans-serif; max-width: 600px; margin: auto; border: 1px solid #e0e0e0; padding: 20px; background-color: #f9f9f9;">
                <div style="text-align: center; margin-bottom: 20px;">
                    <img src="https://vikassawantsacademy.com/public/logos/logo.png" alt="Vikas Sawant\'s Academy" style="max-width: 180px;">
                </div>

                <h2 style="color: #065caa; border-bottom: 1px solid #ddd; padding-bottom: 10px;">Course Purchase Confirmation</h2>
                <p style="font-size: 16px; color: #333;">Hello <strong>' . htmlspecialchars($userName) . '</strong>,</p>
                <p style="font-size: 16px; color: #333;">Thank you for purchasing the course <strong>' . htmlspecialchars($courseName) . '</strong>.</p>
                <p style="font-size: 16px; color: #333;">' . 
                    (strtolower($course) === 'correspondence'
                        ? 'Please find your course material accessible via the link below.'
                        : 'Attached is your course material or receipt (if applicable).') . 
                '</p>
                ' . $googleDriveButton . '
                <p style="font-size: 16px; color: #333;">We wish you a great learning journey!</p>
                <br>
                <p style="font-size: 16px; color: #666;">Warm regards,<br><strong>Vikas Sawant\'s Academy Team</strong></p>
                <div style="margin-top: 20px; font-size: 12px; color: #aaa; border-top: 1px solid #ddd; padding-top: 10px;">
                    This is an automated message. Please do not reply to this email.
                </div>
            </div>
        ';

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Course Mail Error: " . $mail->ErrorInfo);
        return false;
    }
}



$pageTitle = "User Orders";
// echo "<pre>";
// print_r($_POST);
// die();

if (!empty($_POST['razorpay_payment_id']) && !empty($_POST['payment_id'])) {


    // $order_data = $PurchaseController->getOnlineOrderById($_POST['payment_id']);
    $paymentdata = getData2("SELECT * FROM `before_course_payment` WHERE `payment_id` = '" . $_POST['payment_id'] . "'")[0];
        // printWithPre($order_data);
    ;
    // printWithPre($paymentdata);
    // echo "hello";
    unset($paymentdata['id']);
    $TestPayment = add($paymentdata, "course_payment");
    // die();

    $CourseData = getData2("SELECT * FROM `all_courses` WHERE `id` = '" . $paymentdata['course_id'] . "'")[0];

    $UserData = getData2("SELECT * FROM `online_users` WHERE `id` = '" . $paymentdata['user_id'] . "'")[0];
    $name = $UserData['fname'] . " " . $UserData['lname'];
    $GetPdfs = getData2("SELECT `certificate` FROM `correspondence_certificates` ORDER BY `id` DESC LIMIT 1")[0];
    // printWithPre($GetPdfs);
    // die();
    // $certificates = array_column($GetPdfs, 'certificate');


    // Convert to absolute local file paths
    // $certificates = array_map(function ($path) {
    //     return $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($path, '/');
    // }, $certificates);

    // Optional: debug output

    if ($CourseData['course'] == 'correspondence') {
        // printWithPre($purchaseid);
        sendCoursePurchaseEmail($paymentdata['user_name'], $name, $CourseData['name'], $CourseData['course'], $GetPdfs['certificate']);
    } else {
        sendCoursePurchaseEmail($paymentdata['user_name'], $name, $CourseData['name'], $CourseData['course']);
    }
    // if($)
    // printWithPre($purchaseid);
    // die();

    if ($TestPayment) {

        $_SESSION["success"] = "Exam Payment Successfully ";
        // $_SESSION["thankyou"] = 'thankyou';
        header("Location: /");
        exit();
    } else {
        // echo "Failed";
        // die();
        $_SESSION["err"] = "Something Went Wrong";
        header("Location: /");
        exit();
    }
} else {
    // Reject this call
    // echo "not done";
    $_SESSION["err"] = "Payment Failed. Can't Place Order";
    header("Location: /");
    exit();
}
