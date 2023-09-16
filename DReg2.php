<?php
session_start();

require_once 'dbcon.php';
if(!isset($_SESSION['email']))
{
//    header('Location: DRegistration.php');
    echo"hii";
}
else
{
    $email = $_SESSION['email'];
}
if (isset($_REQUEST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];


    $role = 'Delivery Person';


    $insertQuery = "INSERT INTO tbluser (fname, lname, password, role,email) VALUES ('$fname', '$lname', '$password', '$role','$email')";

    if (mysqli_query($con, $insertQuery)) {

        if (isset($_SESSION['temp_mail'])) {
            $_SESSION['email'] = $_SESSION['temp_mail']; 
        }else{
            unset($_SESSION['email']);
        }
        header("Location: index.php");
        exit();
    } else {

        $_SESSION['error_message'] = "Registration failed. Please try again later.";
    }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="CSS/Reg2.css" />
</head>

<body>
    <form action="" method="post" name="myForm" id="myForm">
        <div class="Reg2_form_container">
            <div class="Reg2_form">
                <div class="fotter">
                    <a href="Registration.php">Back</a>
                </div>

                <br>
                <label class="input" id="fnameLabel">Enter First name</label>
                <div class="input_group">
                    <input type="text" placeholder="First name" class="input_text" autocomplete="off" id="firstName" name="fname" />
                </div>
                <span class="error" id="firstNameError"></span>

                <br>
                <br>
                <label class="input" id="lnameLabel">Enter Last name</label>
                <div class="input_group">
                    <input type="text" placeholder="Last name" class="input_text" autocomplete="off" id="lastName" name="lname" />
                </div>
                <span class="error" id="lastNameError"></span>

                <br>
                <br>

                <label class="input">Enter Password</label>
                <div class="input_group">
                    <input type="password" placeholder="Password" class="input_text" autocomplete="off" id="password" name="password" />
                    <span class="toggle-icon" id="passwordToggle" onclick="togglePassword('password')">👁️</span>
                </div>
                <span class="error" id="passwordError"></span>

                <br>
                <label class="input" name='confirmPassword'>Confirm Password</label>
                <div class="input_group">
                    <input type="password" placeholder="Confirm Password" class="input_text" autocomplete="off" id="confirmPassword" />
                    <span class="toggle-icon" id="confirmPasswordToggle" onclick="togglePassword('confirmPassword')">👁️</span>
                </div>
                <span class="error" id="confirmPasswordError"></span>

                <div class="button_group">
                    <button class="login_button" type="submit" name="submit">Registration</button>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        function togglePassword(inputId) {
            var input = document.getElementById(inputId);
            var toggleIcon = document.getElementById(inputId + "Toggle");
            if (input.type === "password") {
                input.type = "text";
                toggleIcon.textContent = "👁️";
            } else {
                input.type = "password";
                toggleIcon.textContent = "👁️";
            }
        }

        $(document).ready(function() {
            $("#myForm").submit(function(event) {
                var fname = $("#firstName").val();
                var lname = $("#lastName").val();
                var password = $("#password").val();
                var confirmPassword = $("#confirmPassword").val();
                var firstNameError = $("#firstNameError");
                var lastNameError = $("#lastNameError");
                var passwordError = $("#passwordError");
                var confirmPasswordError = $("#confirmPasswordError");
                var hasError = false;

                firstNameError.text("");
                lastNameError.text("");
                passwordError.text("");
                confirmPasswordError.text("");

                if (fname.trim() === "") {
                    firstNameError.text("First name is required.");
                    firstNameError.css("color", "red");
                    hasError = true;
                } else if (/\d/.test(fname)) {
                    firstNameError.text("First name cannot contain digits.");
                    firstNameError.css("color", "red");
                    hasError = true;
                }

                if (lname.trim() === "") {
                    lastNameError.text("Last name is required.");
                    lastNameError.css("color", "red");
                    hasError = true;
                } else if (/\d/.test(lname)) {
                    lastNameError.text("Last name cannot contain digits.");
                    lastNameError.css("color", "red");
                    hasError = true;
                }

                var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\/\\]).{8,}$/;

                if (!pattern.test(password)) {
                    passwordError.text("Password must contain at least one digit, one lowercase letter, one uppercase letter, one special character, and be at least 8 characters long.");
                    passwordError.css("color", "red");
                    hasError = true;
                }

                if (confirmPassword === "") {
                    confirmPasswordError.text("Password should not be null.");
                    confirmPasswordError.css("color", "red");
                    hasError = true;
                }
                if (password !== confirmPassword) {
                    confirmPasswordError.text("Passwords do not match.");
                    confirmPasswordError.css("color", "red");
                    hasError = true;
                }

                if (hasError) {
                    event.preventDefault();
                }
            });
        });
    </script>
    <script src="js/common.js"></script>
</body>

</html>
