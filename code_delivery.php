
<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location: DRegistration.php");
}
 else 
{
    $email = $_SESSION['email'];

    $otp = random_int(100000, 999999);
    $_SESSION['otp'] = $otp;
//    $to_email = $email;
    $subject = "OTP Verification";
    $body = "Your OTP is: $otp";
    $headers = "From: patoliyadrashti111@gmail.com";

    if (mail($email, $subject, $body, $headers)) {
        header("Location: otp_delivery.php");
        exit();
    } else {
        header("Location: otp_delivery.php");
    }
}

session_unset();
session_abort();
?>

