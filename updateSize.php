<?php
require_once 'dbcon.php';
require_once 'index.php';
session_start();
if (isset($_SESSION['size_name'])) {
    $name = $_SESSION['size_name'];
    $id = $_SESSION['id'];
} else {
    echo '<script>window.location.href = "viewSize.php";</script>';
    exit();
}

if (isset($_POST['submit'])) {
    $newName = mysqli_real_escape_string($con, $_POST['size']);
    
    $sql = "SELECT * FROM tblsize WHERE id != '$id'";
    $result = mysqli_query($con, $sql);

    // Define the threshold value
    $threshold = 0; // You can adjust this value as needed

    function isSimilar($name, $name1, $threshold) {
        $distance = levenshtein($name, $name1);

        // Compare the distance with the threshold
        return $distance <= $threshold;
    }

    if ($result) {
        $isSimilar = false; 

        while ($row = mysqli_fetch_assoc($result)) {
            $name1 = ($row["name"]);
            if (isSimilar($name, $name1, $threshold)) {
                $isSimilar = true;
                break; // Exit the loop as soon as a similar name is found
            }
        }

        if ($isSimilar) {
            $_SESSION['error'] = "Size name is too similar to an existing size.";
        } else {
            $query = "UPDATE tblsize SET name = '$newName' WHERE id = '$id'";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                $_SESSION['success'] = "Size updated successfully";
                // Clear session data
                unset($_SESSION['size_name']);
                unset($_SESSION['id']);
                echo '<script>window.location.href = "viewSize.php";</script>';
                exit();
            } else {
                $_SESSION['error'] = "Error updating size: " . mysqli_error($con);
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Size</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
              body {
                background-color: #f8f9fa;
                overflow: hidden; /* Prevent scrolling */
            }
            .background-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                filter: blur(1px); /* Adjust the blur radius as needed */
                background-image: url('IMG/bg.jpg'); /* Replace with the actual path to your image */
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .container {
                padding: 20px;
            }
            .error{
                color: #FF0000;
                margin-left: 10px;
            }
            .form-group {
                margin-top: 150px;
                margin-bottom: 20px;
                margin-left: 220px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0.3, 0.3, 0.3, 0.3);
                width: 350px;
                height: 250px;
                background-color: #FFEEF4;
            }
            label {
                font-weight: bold;
            }
            .form-control {
                width: 300px;
            }
            .btn_pos{
                margin-left: 110px;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>

        <div class="background-container"></div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    
                    <form method="post" action="" name="updateSize" onsubmit="return validateForm()">
                        <div class="form-group">
                            <h2 style="text-align: center">Update Size</h2>
                            <div>
                                <label for="name" style="margin-left: 10px">Size Name:</label>
                                <input type="text" name="size" class="form-control" id="name" style="margin-left: 10px" value="<?php echo $name; ?>">
                                <span id="sizeError" class="error"></span>
                            </div>
                            <div class="btn_pos">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='viewSize.php'">Cancel</button>
                            </div>
                            <div id="messageContainer">
                        <?php
                        if (isset($_SESSION['success'])) {
                            echo "<div class='alert alert-success' style='color: green;'>{$_SESSION['success']}</div>";
                            unset($_SESSION['success']); // Clear the message
                        } elseif (isset($_SESSION['error'])) {
                            echo "<div class='alert alert-danger' style='color: red;'>{$_SESSION['error']}</div>";
                            unset($_SESSION['error']); // Clear the message
                        }
                        ?>
                    </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function validateForm() {
                var size = document.forms["updateSize"]["size"].value;
                var isValid = true;

                // Reset previous error messages
                document.getElementById("sizeError").innerHTML = "";

                if (size === "") {
                    document.getElementById("sizeError").innerHTML = "Size name is required.";
                    isValid = false;
                } else if (!/^[a-zA-Z]+$/.test(size)) {
                    document.getElementById("sizeError").innerHTML = "Size name must contain only alphabets.";
                    isValid = false;
                }
                return isValid;
            }
        </script>

        <!-- Include Bootstrap JS (optional) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
