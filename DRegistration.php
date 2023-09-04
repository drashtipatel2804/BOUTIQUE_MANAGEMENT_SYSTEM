
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

    if (mysqli_num_rows($emailResult) > 0) {

        $_SESSION['error_message'] = "Email already exists. Please use a different email.";
    } else {

        $_SESSION['email'] = $email;
        header("Location: code_delivery.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Delivery Pesron Registration Form</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            />

        <link rel="stylesheet" href="CSS/Registration.css" />

        <style>
            .error {
                color: red;
            }

        </style>
    </head>
    <body>

        <form action="" method="post" >
            <div class="registration_form_container">
                <div class="registration_form">
                    <div class="sign">
                        <h2>Sign up</h2>
                    </div>
                    <br>
                    <br>
                    <label class="input"  for="email"></label>
                    <div class="input_group">
                        <input
                            type="text"
                            id="email"
                            placeholder="Email"
                            class="input_text"
                            autocomplete="off"
                            name="email"
                            />
                    </div>
                    <p class="error" id="emailError"></p>

<?php if (isset($_SESSION['error_message'])): ?>
                        <p class="error"><?php echo $_SESSION['error_message']; ?></p>
                        <?php
                        unset($_SESSION['error_message']);
                        ?>
                    <?php endif; ?>
                    <br>
                    <div class="tacbox">
                        <input id="checkbox" type="checkbox" />
                        <label for="checkbox"> I agree to these <a href="#" class="terms">Terms and Conditions</a></label>
                    </div>
                    <p class="error" id="checkboxError"></p>

                   
                    <div class="button_group">

                        <button class="login_button" type="submit" name="submit" onclick="return validateForm();">Verify</button>

                    </div>

                </div>
        </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="login.js"></script>
        <script>

                            function validateForm() {
                                var email = document.getElementById("email").value;
                                var checkbox = document.getElementById("checkbox").checked;

                                var emailError = document.getElementById("emailError");
                                var checkboxError = document.getElementById("checkboxError");

                                emailError.textContent = "";
                                checkboxError.textContent = "";
                                emailError.style.color = "red";
                                checkboxError.style.color = "red";

                                var hasError = false;

                                if (email === "") {
                                    emailError.textContent = "Please enter your email.";
                                    hasError = true;
                                } else if (!isValidEmail(email)) {
                                    emailError.textContent = "Please enter a valid email address.";
                                    hasError = true;
                                }

                                if (!checkbox) {
                                    checkboxError.textContent = "Please agree to the terms and conditions.";
                                    hasError = true;
                                }

                                if (hasError) {
                                    return false;
                                }



                                return true;
                            }

                            function isValidEmail(email) {
                                var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                return pattern.test(email);
                            }

        </script>
    </body>
</html>

