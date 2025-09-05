<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php'; // Make sure you have PHPMailer installed via Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $email = $_POST["email"];


    $name = $_POST['name'];
    // $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    if ($email) {
        // Generate OTP

        // Email template
        ob_start();
?>
        <html>

        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    color: #333;
                    max-width: 600px;
                    margin: 0 auto;
                    padding: 20px;
                }

                .logo {
                    text-align: center;
                    margin-bottom: 20px;
                }

                .logo img {
                    max-width: 150px;
                }

                .header {
                    background: #1d9267;
                    background: linear-gradient(90deg, #1d9267 0%, #67af64 100%);
                    color: white;
                    padding: 10px;
                    text-align: center;
                    font-size: 24px;
                    margin-bottom: 20px;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th {
                    text-align: center;
                }

                th,
                td {
                    border: 1px solid #ddd;
                    padding: 10px;
                    text-align: left;
                }

                th {
                    background-color: #f2f2f2;
                }

                .subtotal {
                    font-weight: bold;
                    text-align: right;
                    padding-top: 10px;
                }

                .image {

                    width: auto;
                    height: 10vh;
                }
            </style>
        </head>

        <body>


            <div class="header">
                Contact Form
            </div>
            <center>
            <div>
                <img src="https://vikassawantsacademy.com/public/logos/logo.png" class="image" alt="">
            </div>
            </center>






            <table>
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th colspan="2">Details</th>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Name</td>
                        <td><?php echo $name; ?></td>
                    </tr>
                    
                    <tr>
                        <td>2</td>
                        <td>Email</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    
                    <tr>
                        <td>3</td>
                        <td>Message</td>
                        <td><?php echo $message; ?></td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>

                        </th>
                    </tr>
                </tfoot>
            </table>



            <div>
                Thanks for connecting <a href="https://vikassawantsacademy.com/">https://vikassawantsacademy.com</a>
            </div>

        </body>

        </html>
<?php
        $emailTemplate = ob_get_clean();
        // echo $emailTemplate;
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        // $email = "tusharkandekars1@gmail.com";

        try {
            // Server settings
            $emailUsername = 'rudratech.karthik1@gmail.com';
            $emailPassword = 'wcco uwbe zrtp eszg';
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
            $mail->SMTPAuth   = true;
            $mail->Username   = $emailUsername; // Replace with your email
            $mail->Password   = $emailPassword; // Replace with your email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('info@vikassawantsacademy.com',  'Vikas Sawants Academy');
            $mail->addAddress('info@vikassawantsacademy.com' , 'Vikas Sawants Academy');
            // $mail->addAddress($DB->getSiteEmail());
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Product Enquiry';
            $mail->Body    = $emailTemplate;

            $mail->send();


            // echo json_encode(["success" => true, "otp" => $otp]);
             $_SESSION['success'] = "Your message has been sent successfully!";
            // echo json_encode(["success" => true, "otp" => $otp]);
            header("Location: /contact-us");
            exit();
        } catch (Exception $e) {
            error_log("Mailer Error: " . $mail->ErrorInfo);
            echo json_encode(["success" => false, "message" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
        }
    } else {
        error_log("Invalid email address: " . $email);
        echo json_encode(["success" => false, "message" => "Invalid email address."]);
    }
} else {
    error_log("Invalid request method.");
    echo json_encode(["success" => false, "message" => "Server Error"]);
}
$_SESSION['success'] = "Your message has been sent successfully!";
header("Location: /");
exit();
