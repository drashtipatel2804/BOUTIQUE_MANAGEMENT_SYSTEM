<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "db_boutique");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $loginQuery = "SELECT * FROM tbluser WHERE email = '$email'";
    $loginResult = mysqli_query($con, $loginQuery);
    if (mysqli_num_rows($loginResult) > 0) {
        while ($row = mysqli_fetch_assoc($loginResult)) {
            $role = $row["role"];
        }
    }
    if ($role == "Customer") {
        header('Location: customer_dash.php');
    } else if ($role == "Admin") {
        header('Location: index.php');
    } else {
        header('Location: deliveryPerson.php');
    }
    exit();
} else {
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;
        $password = $_POST['password'];

        $loginQuery = "SELECT * FROM tbluser WHERE email = '$email' AND password = '$password'";
        $loginResult = mysqli_query($con, $loginQuery);

        if (mysqli_num_rows($loginResult) == 1) {


            if (mysqli_num_rows($loginResult) > 0) {
                while ($row = mysqli_fetch_assoc($loginResult)) {
                    $role = $row["role"];
                }
            }
            if (isset($_POST['remember_me'])) {
                setcookie('emailcookie', $email);
                setcookie('passwordcookie', $password);
                if ($role == "Customer") {
                    header('Location: customer_dash.php');
                } else if ($role == "Admin") {
                    header('Location: index.php');
                } else {
                    header('Location: deliveryPerson.php');
                }
                exit();
            } else {
                if ($role == "Customer") {
                    header('Location: customer_dash.php');
                } else if ($role == "Admin") {
                    header('Location: index.php');
                } else {
                    header('Location: deliveryPerson.php');
                }
                exit();
            }
        } else {

            $_SESSION['error_message'] = "Invalid email address or password.";

            header("Location: login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            />
        <link rel="stylesheet" href="CSS/login.css" />
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <form  action="" method="post">
            <div class="login_form_container">
                <div class="login_form">
                    <h2 style="color:#ee00ff">Login</h2>
                    <div class="input_group">
                        <i class="fa fa-user"></i>
                        <input
                            type="text"
                            id="email"
                            placeholder="Email Address"
                            class="input_text"
                            autocomplete="off"
                            name="email"
                            value="<?php
                            if (isset($_COOKIE['emailcookie'])) {
                                echo $_COOKIE['emailcookie'];
                            }
                            ?>"
                            />
                    </div>
                    <p class="error" id="emailError"></p>
                    <div class="input_group">
                        <i class="fa fa-unlock-alt"></i>
                        <input
                            type="password"
                            id="password"
                            placeholder="Password"
                            class="input_text"
                            name="password"
                            value="<?php
                            if (isset($_COOKIE['passwordcookie'])) {
                                echo $_COOKIE['passwordcookie'];
                            }
                            ?>"

                            autocomplete="off"/>

                    </div>
                    <p class="error" id="passwordError"></p>
                    <div class="input_group">
                        <input
                            type="checkbox"
                            id="remember_me"
                            name="remember_me"
                            />
                        <label for="remember_me">Remember Me</label>
                    </div>

                    <?php if (isset($_SESSION['error_message'])): ?>
                        <p class="error"><?php echo $_SESSION['error_message']; ?></p>
                        <?php
                        unset($_SESSION['error_message']);
                        ?>
                    <?php endif; ?>
                    <br>

                    <div class="button_group">
                        <button class="login_button" type="submit" name="submit" onclick="return validateLogin()">Login</button>
                    </div>


                    <div class="fotter">
                        <a href="forgot.php" style="color:#FAF9F6">Forgot Password</a>
                        <a href="Registration.php" style="color:#FAF9F6">SignUp</a>
                    </div>
                </div>
            </div>
        </form>
        <script>
            function validateLogin() {
                var email = document.getElementById("email").value;
                var password = document.getElementById("password").value;

                var emailError = document.getElementById("emailError");
                var passwordError = document.getElementById("passwordError");

                emailError.innerHTML = "";
                passwordError.innerHTML = "";
                emailError.style.color = "red";
                passwordError.style.color = "red";
                var hasError = false;

                if (email === "") {
                    emailError.innerHTML = "Please enter your Email Address.";
                    hasError = true;
                }

                if (password === "") {
                    passwordError.innerHTML = "Please enter your password.";
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
