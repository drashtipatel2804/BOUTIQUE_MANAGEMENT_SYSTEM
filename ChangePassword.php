<?php
session_start();

// Database connection
$con = mysqli_connect("localhost", "root", "", "db_boutique");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_SESSION['email'];
    

    $checkPasswordQuery = "SELECT * FROM tbluser WHERE email = '$email' AND password = '$currentPassword'";
    $checkPasswordResult = mysqli_query($con, $checkPasswordQuery);
    $roleq = "select role from tbluser where email='$email'";
    $result1 = mysqli_query($con, $roleq);

    if (mysqli_num_rows($result1) > 0) {
        while ($row = mysqli_fetch_assoc($result1)) {
            $role = $row["role"];
        }
    }
    if (mysqli_num_rows($checkPasswordResult) === 1) {
        if ($currentPassword === $newPassword) {
            $_SESSION['error_message'] = "Old password and new password should not be same";
        } else {
            $updatePasswordQuery = "UPDATE tbluser SET password = '$newPassword' WHERE email = '$email'";
            if (mysqli_query($con, $updatePasswordQuery)) {

                $_SESSION['success_message'] = "Password changed successfully!";
//                if ($role == "Admin") {
//                    header('Location: index.php');
//                } elseif ($role == "Customer") {
//                    header('Location: homeNew.php');
//                } else {
//                    header('Location: deliveryPerson.php');
//                }
                header('Location: login.php');
            } else {

                $_SESSION['error_message'] = "An error occurred while changing the password.";
            }
        }
    } else {

        $_SESSION['error_message'] = "Invalid current password.";
    }
}

?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Change</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            />
        <link rel="stylesheet" href="CSS/ChangePassword.css" />
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
        <form action="" method="post" onsubmit="return validatePassword();">
            <div class="change_password_container">
                <div class="change_password_form">
                    <h2 style="color:#ee00ff">Change Password</h2>
                    <div class="input_group">
                        <i class="fa fa-lock"></i>
                        <input
                            type="password"
                            id="currentPassword"
                            placeholder="Current Password"
                            class="input_text"
                            autocomplete="off"
                            name="currentPassword"
                            />
                    </div>
                    <p class="error" id="currentPasswordError"></p>
                    <div class="input_group">
                        <i class="fa fa-lock"></i>
                        <input
                            type="password"
                            id="newPassword"
                            placeholder="New Password"
                            class="input_text"
                            name="newPassword"
                            autocomplete="off"/>
                    </div>
                    <p class="error" id="newPasswordError"></p>
                    <div class="input_group">
                        <i class="fa fa-lock"></i>
                        <input
                            type="password"
                            id="confirmPassword"
                            placeholder="Confirm New Password"
                            name="confirmPassword"
                            class="input_text"
                            autocomplete="off"/>
                    </div>
                    <p class="error" id="confirmPasswordError"></p>               
                    <div class="button_group">
                        <button class="change_button" name="submit" type="submit">Change Password</button>

                    </div>
                    <br>
                    <div>
                        <h5>Can't Remember old Password? <a href="forgot.php" style='color:#FAF9F6'>Click here</a></h5>
                    </div>
<?php if (isset($_SESSION['error_message'])): ?>
                        <p class="error"><?php echo $_SESSION['error_message']; ?></p>
    <?php
    unset($_SESSION['error_message']);
    ?>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['success_message'])): ?>
                        <p class="error1"><?php echo $_SESSION['success_message']; ?></p>
                        <?php
                        unset($_SESSION['success_message']);
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        </form>
        <script>
            function validatePassword() {
                var currentPassword = document.getElementById("currentPassword").value;
                var newPassword = document.getElementById("newPassword").value;
                var confirmPassword = document.getElementById("confirmPassword").value;

                var currentPasswordError = document.getElementById("currentPasswordError");
                var newPasswordError = document.getElementById("newPasswordError");
                var confirmPasswordError = document.getElementById("confirmPasswordError");

                currentPasswordError.innerHTML = "";
                newPasswordError.innerHTML = "";
                confirmPasswordError.innerHTML = "";
                var hasError = false;

                if (currentPassword === "") {
                    currentPasswordError.innerHTML = "Please enter your current password.";
                    hasError = true;
                }

                if (newPassword === "") {
                    newPasswordError.innerHTML = "Please enter a new password.";
                    hasError = true;
                }

                if (confirmPassword === "") {
                    confirmPasswordError.innerHTML = "Please confirm your new password.";
                    hasError = true;
                }

                if (newPassword !== confirmPassword) {
                    confirmPasswordError.innerHTML = "Passwords do not match.";
                    hasError = true;
                }

                var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\/\\]).{8,}$/;

                if (!pattern.test(newPassword)) {
                    newPasswordError.innerHTML = "Password must contain at least one digit, one lowercase letter, one uppercase letter, one special character, and be at least 8 characters long.";
                    hasError = true;
                }
                if (hasError) {
                    return false; // Prevent form submission
                } else
                {
                    return true;
                }


            }

        </script>
    </body>
</html>