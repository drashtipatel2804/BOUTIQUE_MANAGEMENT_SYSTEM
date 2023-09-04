<?php
session_start();



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userEnteredOTP = '';
    
   
    for ($i = 1; $i <= 6; $i++) {
        $digitName = 'digit' . $i;
        if (isset($_POST[$digitName])) {
            $digit = $_POST[$digitName];
            $userEnteredOTP .= $digit;
        }
    }
  

    
    $userEnteredOTP = trim($userEnteredOTP);
 
    
    if ($userEnteredOTP == $_SESSION['otp']) {
     
        header("Location: DReg2.php");
        exit(); 
        $error_message = "OTP does nont  match";
    } else {
        
       $error_message = "OTP does not match";
       
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTP Verification</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            />
        <link rel="stylesheet" href="CSS/otp_for_forgotPass.css" />
        <style>
            .error {
                color: red;
                font-size: 12px;
                margin-top: 4px;
                display: block;
            }
        </style>
    </head>
    <body>
        <form action="#" method="post">
            <div class="otp_verification_container">
                <div class="otp_verification_form">
                    <h2>OTP Verification</h2>
                    <br>
                    <p>Enter the OTP sent to your email address.</p>
                    <div class="otp_input">
                        <input
                            type="text"
                            maxlength="1"
                            class="otp_digit"
                            autocomplete="off"
                            name="digit1"
                            />
                        <input
                            type="text"
                            maxlength="1"
                            class="otp_digit"
                            autocomplete="off"
                            name="digit2"
                            />
                        <input
                            type="text"
                            maxlength="1"
                            class="otp_digit"
                            autocomplete="off"
                            name="digit3"
                            />
                        <input
                            type="text"
                            maxlength="1"
                            class="otp_digit"
                            autocomplete="off"
                            name="digit4"
                            />
                        <input
                            type="text"
                            maxlength="1"
                            class="otp_digit"
                            autocomplete="off"
                            name="digit5"
                            />
                        <input
                            type="text"
                            maxlength="1"
                            class="otp_digit"
                            autocomplete="off"
                            name="digit6"
                            />
                    </div>
                    <span class="error"><?php echo isset($error_message) ? $error_message : ''; ?></span>
                    
                    <div class="button_group">
                       
                        <button class="verify_button" type="submit" name="varify" onclick="return validateForm();">Verify OTP</button>

                    </div>
                    </form>
                    <div class="resend_otp">
                        <p>Didn't receive OTP? <a href="code.php" style="color: #FAF9F6">Resend OTP</a></p>
                    </div>
                </div>
            </div>
            <script>
                const otpInputs = document.querySelectorAll(".otp_digit");

                otpInputs.forEach((input, index) => {
                    input.addEventListener("input", function () {
                        if (this.value.length === 1) {
                            if (index < otpInputs.length - 1) {
                                otpInputs[index + 1].focus();
                            }
                        }
                    });

                    input.addEventListener("keydown", function (event) {
                        if (event.key === "Backspace") {
                            if (this.value.length === 0 && index > 0) {
                                otpInputs[index - 1].focus();
                            }
                        }
                    });
                });
            </script>
            <script>
                function validateForm() {
                    var otpInputs = document.querySelectorAll(".otp_digit");
                    var errorMessage = document.querySelector(".error");

                    for (var i = 0; i < otpInputs.length; i++) {
                        if (otpInputs[i].value === "") {
                            errorMessage.textContent = "Please enter all digits";
                            errorMessage.style.color = "red";
                            return false;
                        }
                    }

                    errorMessage.textContent = "";
                    return true;
                }
            </script>            


    </body>
</html>
