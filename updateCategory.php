<?php
session_start();
if(isset($_SESSION['category_name']))
{
    $name=$_SESSION['category_name'];
}
else
{
    
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Category</title>
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
                    <form method="post" action="" name="updateCategory" onsubmit="return validateForm()">
                        <div class="form-group">
                            <h2 style="text-align: center">Update Category</h2>
                            <div>
                            <label for="name" style="margin-left: 10px">Category Name:</label>
                            <input type="text" name="category" class="form-control" id="name" style="margin-left: 10px" value="<?php echo $name;?>">
                            <span id="categoryError" class="error"></span>
                            </div>
                            <div class="btn_pos">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                <button type="submit" name="cancel" class="btn btn-danger">
                                    <a href="viewCategory.php" style="color: white">Cancel</a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function validateForm() {
                
                var category = document.forms["updateCategory"]["category"].value;
                var isValid = true;

                // Reset previous error messages
                document.getElementById("categoryError").innerHTML = "";

                if (category === "") {
                    document.getElementById("categoryError").innerHTML = "Category name is required.";
                    isValid = false;
                } else if (!/^[a-zA-Z]+$/.test(category)) {
                    document.getElementById("categoryError").innerHTML = "Category name must contain only alphabets.";
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