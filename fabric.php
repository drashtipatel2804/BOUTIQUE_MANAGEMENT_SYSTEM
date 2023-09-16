<?php
require_once 'dbcon.php';
require_once 'index.php';
if (isset($_REQUEST['submit'])) {

    $name = $_REQUEST['name'];

    $sql = "select * from tblfabric";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $isSimilar = false; 

        while ($row = mysqli_fetch_assoc($result)) {
            $name1 = strtolower($row["name"]);
            $name= strtolower($name);
       
            similar_text($name, $name1, $similarity);

            if ($similarity >= 50) {
                $isSimilar = true;
                break; // Exit the loop if a similarity is found
            }
        }

        if ($isSimilar) {
            $err = "Fabric already exists";
        } else {
            $query = "insert into tblfabric (name,status) values ('$name',1)";
            mysqli_query($con, $query);
            $success = "Successfull add fabric";
             echo '<script>window.location.href = "viewFabric.php";</script>';
        }
    } else {
        $query = "insert into tblfabric (name,status) values ('$name',1)";
        mysqli_query($con, $query);
        $success = "Successfull add fabric";
         echo '<script>window.location.href = "viewFabric.php";</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Fabric</title>
    <!-- Include Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            filter: blur(2px); /* Adjust the blur radius as needed */
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
            margin-top: 200px;
            margin-bottom: 20px;
            margin-left: 230px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0.3, 0.3, 0.3, 0.3);
            width: 340px;
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
            margin-left: 95px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="background-container"></div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="" name="add_fabric" onsubmit="return validateForm()">
                    <div class="form-group">
                        <h2 style="text-align: center">Add Fabric</h2>
                        <label for="name" style="margin-left: 10px">Fabric Name:</label>
                        <input type="text" name="name" class="form-control" id="name" style="margin-left: 10px">
                        <span class="error" id="nameErr"></span>
                        <div class="btn_pos">
                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                            <button type="submit" name="cancel" class="btn btn-danger">
                                <a href="ViewFabric.php" style="color: white">Cancel</a>
                            </button>
                        </div>
                        <div class="error"><?php echo isset($err) ? $err : ''; ?></div>
                        <div class="error"><?php echo isset($success) ? $success : ''; ?></div>
                        <?php
                        if (isset($success)) {
                             echo '<script>window.location.href = "ViewFabric.php";</script>';
                            exit(); // Ensure no more output is sent to the browser
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var name = document.forms["add_fabric"]["name"].value;
            var nameErr = document.getElementById("nameErr");

            if (name === "") {
                nameErr.textContent = "Fabric Name is required";
                return false;
            }

           

            return true;
        }
    </script>
    <script src="js/common.js"></script> 
</body>
</html>
