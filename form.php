<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Validation functions
    function is_valid_name($name)
    {
        return preg_match("/^[a-zA-Z\s]{2,50}$/", $name);
    }

    function is_valid_phone($phone)
    {
        return preg_match("/^[0-9]{10}$/", $phone);
    }

    function is_valid_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Capture fields from form
    $fullname = htmlspecialchars(trim($_POST['fullname'] ?? ''));
    $lastname = htmlspecialchars(trim($_POST['lastname'] ?? ''));
    $email    = htmlspecialchars(trim($_POST['email'] ?? ''));
    $phone    = htmlspecialchars(trim($_POST['phone'] ?? ''));
    $message  = htmlspecialchars(trim($_POST['message'] ?? ''));

    $errors = [];

    if (!is_valid_name($fullname)) $errors[] = "Invalid first name. Only letters and spaces allowed.";
    if (!empty($lastname) && !is_valid_name($lastname)) $errors[] = "Invalid last name. Only letters and spaces allowed.";
    if (!is_valid_email($email)) $errors[] = "Invalid email address.";
    if (!is_valid_phone($phone)) $errors[] = "Phone number must be exactly 10 digits.";
    if (empty($message)) $errors[] = "Message cannot be empty.";

    // If errors, redirect with error message
    if (!empty($errors)) {
        $_SESSION['flash_error'] = implode(" ", $errors);
        header("Location: /contact");
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rudratech.karthik1@gmail.com';  // Your Gmail
        $mail->Password   = 'wcco uwbe zrtp eszg';           // Gmail App password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Email settings
        $mail->setFrom('rudratech.karthik1@gmail.com', 'NovaKids');
        $mail->addAddress('swapnalirudratech@gmail.com', 'NovaKids');

        $mail->Subject = "New Contact Enquiry - NovaKids";
        $mail->isHTML(true);

        $mail->Body = "
        <div style='font-family:Arial,sans-serif;background:#f9fafb;padding:20px;border-radius:10px;border:1px solid #e2e8f0;'>
            <h2 style='color:#1e40af;'>New Enquiry Received</h2>
            <table style='width:100%;margin-top:20px;font-size:15px;'>
                <tr><td><strong>First Name:</strong></td><td>{$fullname}</td></tr>
                <tr><td><strong>Last Name:</strong></td><td>{$lastname}</td></tr>
                <tr><td><strong>Email:</strong></td><td>{$email}</td></tr>
                <tr><td><strong>Phone:</strong></td><td>{$phone}</td></tr>
                <tr><td><strong>Message:</strong></td><td>{$message}</td></tr>
            </table>
            <p style='margin-top:10px;font-size:13px;color:#64748b;'>Sent from NovaKids website.</p>
        </div>";

        $mail->AltBody = "New enquiry from $fullname $lastname ($email, $phone): $message";

        if ($mail->send()) {
            $_SESSION['flash_success'] = "Your form has been submitted successfully.";
        } else {
            $_SESSION['flash_error'] = "Something went wrong. Please try again later.";
        }

        header("Location: /contact");
        exit;
    } catch (Exception $e) {
        error_log("Email Error: " . $mail->ErrorInfo);
        $_SESSION['flash_error'] = "Mailer Error: " . $mail->ErrorInfo;
        header("Location: /contact");
        exit;
    }
} else {
    $_SESSION['flash_error'] = "Invalid request.";
    header("Location: /contact");
    exit;
}
