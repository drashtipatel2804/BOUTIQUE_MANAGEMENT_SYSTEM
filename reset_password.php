<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "db_boutique");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!isset($_SESSION['email']))
{
    header("Location: forgot.php");
}
if (isset($_POST['submit'])) {
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_SESSION['email'];
    
    
    if ($newPassword === $confirmPassword) {
        
        $updatePasswordQuery = "UPDATE tbluser SET password = '$newPassword' WHERE email = '$email'";
        if (mysqli_query($con, $updatePasswordQuery)) 
        {
            
           header('Location: login.php');
      
            
        } else {
            
            $_SESSION['error_message'] = "An error occurred while resetting the password.";
        }
    } else {
        
        $_SESSION['error_message'] = "Passwords do not match.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="CSS/reset_password.css" />
      <style>
            .error1{
                color: green;
                font-size: 12px;
                margin-top: 4px;
                display: block;
            }
        </style>
</head>
<body>
    <form action="" method="post">
    <div class="reset_password_container">
        <div class="reset_password_form">
            <h2 style="color:#ee00ff">Reset Password</h2>
            <br>
            <div class="input_group">
                <i class="fa fa-lock"></i>
                <input
                    type="password"
                    id="newPassword"
                    placeholder="New Password"
                    class="input_text"
                    autocomplete="off"
                    name="newPassword"
                />
            </div>
            <p class="error" id="newPasswordError"></p>
            <div class="input_group">
                <i class="fa fa-lock"></i>
                <input
                    type="password"
                    id="confirmPassword"
                    placeholder="Re-enter New Password"
                    class="input_text"
                    autocomplete="off"
                    name="confirmPassword"
                />
            </div>
            <p class="error" id="confirmPasswordError"></p>
            <?php if (isset($_SESSION['error_message'])): ?>
                        <p class="error"><?php echo $_SESSION['error_message']; ?></p>
                    <?php
                        
                        unset($_SESSION['error_message']);
                    ?>
                    <?php endif; ?>
                                    <br>
            <br>
            <div class="button_group">
                <button class="reset_button" type="submit" name="submit" onclick="return validatePassword()">Reset Password</button>
            </div>
        </div>
    </div>
    </form>
    <script>
        function validatePassword() {
            var newPassword = document.getElementById("newPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            
            var newPasswordError = document.getElementById("newPasswordError");
            var confirmPasswordError = document.getElementById("confirmPasswordError");
            
            newPasswordError.innerHTML = "";
            confirmPasswordError.innerHTML = "";
            newPasswordError.style.color = "red"; // Set error font color to red
            confirmPasswordError.style.color = "red"; // Set error font color to red
            var hasError=false;
            
            if (newPassword === "") {
                newPasswordError.innerHTML = "Please enter a new password.";
                hasError=true;
            }
            
            if (confirmPassword === "") {
                confirmPasswordError.innerHTML = "Please re-enter the new password.";
                hasError=true;
            }

            if (newPassword !== confirmPassword) {
                confirmPasswordError.innerHTML = "Passwords do not match.";
                hasError=true;
            }
            
            var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\/\\]).{8,}$/;
            
            if (!pattern.test(newPassword)) {
                newPasswordError.innerHTML = "Password must contain at least one digit, one lowercase letter, one uppercase letter, one special character, and be at least 8 characters long.";
                hasError=true;
            }
             if (hasError) {
                    return false; // Prevent form submission
                }
                else
                {
                    return true;
                }
//            if(!hasError) {
//                // Display a success message
//                var successMessage = "Password reset successfully!";
//                alert(successMessage);
//            }
        }
    </script>
</body>
</html>