<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Category</title>
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
                margin-left: 100px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0.3, 0.3, 0.3, 0.3);
                width: 340px;
                height: 250px;
                background-color: white;
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
        <?php
        $nameErr = "";
        $name = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Category Name is required";
            }
        }
        ?>
        <div class="background-container"></div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="post" action="" name="add_category">
                        <div class="form-group">
                            <h2 style="text-align: center">Add Category</h2>
                            <label for="name" style="margin-left: 10px">Category Name:</label>
                            <input type="text" name="name" class="form-control" id="name" style="margin-left: 10px">
                            <span class="error"><?php echo $nameErr; ?></span>
                            <div class="btn_pos">
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                <button type="submit" name="submit" class="btn btn-danger">
                                    <a href="index.php">Cancel</a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Include Bootstrap JS (optional) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
