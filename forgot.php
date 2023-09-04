<?php
//session_start();
//if (isset($_REQUEST['submit'])) {
//
//    $email = $_POST['email'];
//    $_SESSION['email'] = $email;
//
//    header("Location: code_forgot.php");
//    exit();
//}

?>
<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "db_boutique");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_REQUEST['submit'])) {
    $email = $_POST['email'];

    $emailQuery = "SELECT email FROM tbluser WHERE email = '$email'";
    $emailResult = mysqli_query($con, $emailQuery);

    if (mysqli_num_rows($emailResult) == 0) {
        
        $_SESSION['error_message'] = "The email you entered is not registered. Please enter the email you used during registration.";
    } else {
        
        $_SESSION['email'] = $email;
        header("Location: code_forgot.php");
        exit();
    }
}

session_abort();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            />
        <link rel="stylesheet" href="CSS/forgotpassword.css" />
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
        <form action="" method="post">
        <div class="forgot_password_container">
            <div class="forgot_password_form">
                <h2 style="color:#ee00ff">Forgot Password</h2>
                <br>
                <p>Enter your email address for Verification.</p>
                <div class="input_group">
                    <i class="fa fa-envelope"></i>
                    <input
                        type="email"
                        placeholder="Email Address"
                        class="input_text"
                        autocomplete="off"
                        id="email"
                        name="email"
                        />
                </div>
                <span class="error" id="emailError"></span>
                <?php if (isset($_SESSION['error_message'])): ?>
                        <p class="error"><?php echo $_SESSION['error_message']; ?></p>
                    <?php
                        
                        unset($_SESSION['error_message']);
                    ?>
                    <?php endif; ?>
                <br>
                <br>

             
                <div class="button_group">

                    <button class="send_button" type="submit" name="submit" onclick="return validateForm();">Send OTP</button>

                </div>
            </div>
        </div>
        </form>
        <script>
            function validateForm() {
                var email = document.getElementById("email").value;
                var emailError = document.getElementById("emailError");

                emailError.textContent = "";

                if (email === "") {
                    emailError.textContent = "Email can't be blank";
                    emailError.style.color = "red";
                    return false;
                } else {
                    var mailformat = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
                    if (!email.match(mailformat)) {
                        emailError.textContent = "You have entered an invalid email address!";
                        emailError.style.color = "red";
                        return false;
                    }
                }

                return true;
            }
        </script>
    </body>
</html>