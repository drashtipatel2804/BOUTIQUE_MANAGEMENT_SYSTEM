<?php
session_start();
$email = $_SESSION['email'];
$con = mysqli_connect("localhost", "root", "", "db_boutique");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_REQUEST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    
    
    $role = 'Delivery Person';

    
    $insertQuery = "INSERT INTO tbluser (fname, lname, password, role,email) VALUES ('$fname', '$lname', '$password', '$role','$email')";

    if (mysqli_query($con, $insertQuery)) {
    
        header("Location: login.php");
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
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            />

        <link rel="stylesheet" href="CSS/Reg2.css" />
    </head>
    <body>
        <form action="" method="post">
        <div class="Reg2_form_container">
            <div class="Reg2_form">

                <div class="fotter">
                    <a href="Registration.php"><-Back</a>
                </div>

                <br>
                <label class="input"  id="fnameLabel">Enter First name</label>
                <div class="input_group">
                    <input
                        type="text"
                        placeholder="First name"
                        class="input_text"
                        autocomplete="off"
                        id="fname"
                        name="fname";
                        />
                </div>
                <span class="error" id="fnameError"></span>

                <br>
                <br>
                <label class="input"  id="lnameLabel">Enter Last name</label>
                <div class="input_group">
                    <input
                        type="text"
                        placeholder="Last name"
                        class="input_text"
                        autocomplete="off"
                        id="lname"
                        name="lname"
                        />
                </div>
                <span class="error" id="lnameError"></span>

                <br>
                <br>

                <label class="input" >Enter Password</label>
                <div class="input_group">
                    <input
                        type="password"
                        placeholder="Password"
                        class="input_text"
                        autocomplete="off"
                        id="password"
                        name="password"
                        />
                    <span class="toggle-icon" id="passwordToggle" onclick="togglePassword('password')">👁️</span>
                </div>
                <span class="error" id="passwordError"></span>

                <br>
                <label class="input" name='confirmPassword'>Confirm Password</label>
                <div class="input_group">
                    <input
                        type="password"
                        placeholder="Confirm Password"
                        class="input_text"
                        autocomplete="off"
                        id="confirmPassword"
                        />
                    <span class="toggle-icon" id="confirmPasswordToggle" onclick="togglePassword('confirmPassword')">👁️</span>
                </div>
                <span class="error" id="confirmPasswordError"></span>


                <div class="button_group">
                    <button class="login_button" type="submit" name="submit" onclick="return validateForm();">Registration</button>

                </div>
            </div>
        </div>
        </from>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="login.js"></script>
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

                                                   function validateForm() {
                                                       var fname = document.getElementById("fname").value;
                                                       var lname = document.getElementById("lname").value;
                                                       var password = document.getElementById("password").value;
                                                       var confirmPassword = document.getElementById("confirmPassword").value;
                                                       var fnameError = document.getElementById("fnameError");
                                                       var lnameError = document.getElementById("lnameError");
                                                       var passwordError = document.getElementById("passwordError");
                                                       var confirmPasswordError = document.getElementById("confirmPasswordError");
                                                       var hasError = false;

                                                       fnameError.textContent = "";
                                                       lnameError.textContent = "";
                                                       passwordError.textContent = "";
                                                       confirmPasswordError.textContent = "";

                                                       if (fname.trim() === "") {
                                                           fnameError.textContent = "First name is required.";
                                                           fnameError.style.color = "red";
                                                           hasError = true;
                                                       } else if (/\d/.test(fname)) {
                                                           fnameError.textContent = "First name cannot contain digits.";
                                                           fnameError.style.color = "red";
                                                           hasError = true;
                                                       }

                                                       if (lname.trim() === "") {
                                                           lnameError.textContent = "Last name is required.";
                                                           lnameError.style.color = "red";
                                                           hasError = true;
                                                       } else if (/\d/.test(lname)) {
                                                           lnameError.textContent = "Last name cannot contain digits.";
                                                           lnameError.style.color = "red";
                                                           hasError = true;
                                                       }

                                                       var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\/\\]).{8,}$/;


                                                       if (!pattern.test(password)) {
                                                           passwordError.textContent = "Password must contain at least one digit, one lowercase letter, one uppercase letter, one special character, and be at least 8 characters long.";
                                                           passwordError.style.color = "red";
                                                           hasError = true;
                                                       }

                                                       if (confirmPassword === "")
                                                       {
                                                           confirmPasswordError.textContent = "Password should not null.";
                                                           confirmPasswordError.style.color = "red";
                                                           hasError = true;
                                                       }
                                                       if (password !== confirmPassword) {
                                                           confirmPasswordError.textContent = "Passwords do not match.";
                                                           confirmPasswordError.style.color = "red";
                                                           hasError = true;
                                                       }

                                                       return !hasError;
                                                   }
        </script>
    </body>
</html>
