
<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location: forgot.php");
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
        header("Location: otp_forgot_pass.php");
        exit();
    } else {
        header("Location: otp_forgot_pass.php");
    }
}

session_unset();
session_abort();
?>



<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        // put your code here
        ?>
    </body>
</html>