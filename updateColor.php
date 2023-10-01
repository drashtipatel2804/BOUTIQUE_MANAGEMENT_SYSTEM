<?php
require_once 'dbcon.php';
require_once 'index.php';
session_start();

if (isset($_SESSION['color_name'])) {
    $name = $_SESSION['color_name'];
    $id = $_SESSION['id'];
} else {
    echo '<script>window.location.href = "viewColor.php";</script>';
    exit();
}

// if (isset($_POST['submit'])) {
//     $newName = mysqli_real_escape_string($con, $_POST['color']);
    
//     $sql = "SELECT * FROM tblcolor WHERE id != '$id'";
//     $result = mysqli_query($con, $sql);

//     if ($result) {
//         $isSimilar = false;

//         while ($row = mysqli_fetch_assoc($result)) {
//             $name1 = strtolower($row["name"]);
//             $newNameLower = strtolower($newName);

//             similar_text($newNameLower, $name1, $similarity);

//             if ($similarity >= 50) {
//                 $isSimilar = true;
//                 break;
//             }
//         }

//         if ($isSimilar) {
//             $_SESSION['error'] = "Color name is too similar to an existing color.";
//         } else {
//             $query = "UPDATE tblcolor SET name = '$newName' WHERE id = '$id'";
//             $query_run = mysqli_query($con, $query);

//             if ($query_run) {
//                 $_SESSION['success'] = "Color updated successfully";
//                 // Clear session data
//                 unset($_SESSION['color_name']);
//                 unset($_SESSION['id']);
//                 echo '<script>window.location.href = "viewColor.php";</script>';
//                 exit();
//             } else {
//                 $_SESSION['error'] = "Error updating color: " . mysqli_error($con);
//             }
//         }
//     }
// }
if (isset($_POST['submit'])) {
    $newName = mysqli_real_escape_string($con, $_POST['color']);
    
    $sql = "SELECT * FROM tblcolor WHERE id != '$id'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $isSimilar = false;

        while ($row = mysqli_fetch_assoc($result)) {
            $name1 = strtolower($row["name"]);
            $newNameLower = strtolower($newName);

            $levenshteinDistance = levenshtein($newNameLower, $name1);

            // You can adjust this threshold as needed
            if ($levenshteinDistance <= 2) {
                $isSimilar = true;
                break;
            }
        }

        if ($isSimilar) {
            $_SESSION['error'] = "Color name is too similar to an existing color.";
        } else {
            $query = "UPDATE tblcolor SET name = '$newName' WHERE id = '$id'";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                $_SESSION['success'] = "Color updated successfully";
                // Clear session data
                unset($_SESSION['color_name']);
                unset($_SESSION['id']);
                echo '<script>window.location.href = "viewColor.php";</script>';
                exit();
            } else {
                $_SESSION['error'] = "Error updating color: " . mysqli_error($con);
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
        <title>Update Color</title>
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
                margin-left: 100px;
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
                    
                    <form method="post" action="" name="updateColor" onsubmit="return validateForm()">
                        <div class="form-group">
                            <h2 style="text-align: center">Update Color</h2>
                            <div>
                                <label for="name" style="margin-left: 10px">Color Name:</label>
                                <input type="text" name="color" class="form-control" id="name" style="margin-left: 10px" value="<?php echo $name; ?>">
                                <span id="colorError" class="error"></span>
                            </div>
                            <div class="btn_pos">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='viewColor.php'">Cancel</button>
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
                var color = document.forms["updateColor"]["color"].value;
                var isValid = true;

                // Reset previous error messages
                document.getElementById("colorError").innerHTML = "";

                if (color === "") {
                    document.getElementById("colorError").innerHTML = "Color name is required.";
                    isValid = false;
                } else if (!/^[a-zA-Z]+$/.test(color)) {
                    document.getElementById("colorError").innerHTML = "Color name must contain only alphabets.";
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
