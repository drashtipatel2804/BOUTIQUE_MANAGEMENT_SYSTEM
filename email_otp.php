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
        
        $otp= random_int(100000, 999999);
        $to_email="21bmiitbscit003@gmail.com";
        $subject="OTP Varification";
        $body="Your OTP is : $otp";
        $headers="From : patoliyadrashti111@gmail.com";
        
        if(mail($to_email, $subject, $body, $headers))
        {
            echo "Success $otp";
        }
        else
        {
            echo "Email sending failed";
        }
        ?>
    </body>
</html>