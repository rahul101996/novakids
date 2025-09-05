<?php
function generateRandomString($length = 16)
{
    return random_int(100, 999);
}
if (!empty($_POST)) {
    $PaymentGateWay = 'razorpay';
    unset($_POST['submit']);

    $_POST['user_id'] = $_SESSION['userid'];
    unset($_POST['register_now']);
    if ($PaymentGateWay == 'razorpay') {
        if (1 == 1) {

            $PaymentId = generateRandomString(16) . time();
            $_POST['payment_id'] = $PaymentId;
            $_POST['created_by'] = $_SESSION['userid'];
            $_POST['user_name'] = $_SESSION['username'];
            $_POST['mobile'] = isset($_SESSION['mobile']) ? $_SESSION['mobile'] : '';
            // printWithPre($_POST);
            // echo "hello";
            // die();
            $exampay = add($_POST, "before_course_payment");


            if ($exampay) {

                $keyapi = "rzp_live_dH9H9TmE3PypV9";

?>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

                <form action="/coursepayment" method="POST">
                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?= $keyapi ?>"
                        data-amount="<?= $_POST["price"] * 100 ?>" data-currency="INR" data-id="<?= $PaymentId ?>"
                        data-buttontext="Pay with Razorpay" data-name="Abhyas Savidhanacha"
                        data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
                        data-image="https://vikassawantsacademy.com/wp-content/uploads/2024/08/cropped-Vikas-Sawants-ACADEMY-1-300x90-1.png" data-prefill.name="<?= $_SESSION["username"] ?>"
                        data-prefill.contact="<?= isset($_SESSION["mobile"]) ? $_SESSION["mobile"] : '' ?>" data-theme.color="#1d9267"></script>
                    <input type="hidden" custom="Hidden Element" name="payment_id" value="<?= $PaymentId ?>" />
                </form>

                <style>
                    .razorpay-payment-button {
                        display: none;
                    }
                </style>

                <script>
                    $(document).ready(function() {
                        $('.razorpay-payment-button').click();
                    });
                </script>
<?php
                exit();
            }
        } else {
            $_SESSION["err"] = "Enter Your Mobile Number in Profile";
            header("Location:/");
            exit();
        }
    }
}
?>