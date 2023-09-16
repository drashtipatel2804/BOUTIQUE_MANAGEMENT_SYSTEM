<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Product</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+JmjzX2n/rw6Uj1j1lsofmUHCbUG5H8b5W5RdI5bh6WQFZf" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/product.css">
        <style>

            .background-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                filter: blur(1px);
                background-image: url('IMG/bg.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            .form-container {
                background-color: #FFEEF4;
                padding: 20px;
                border-radius: 10px;
                width: 700px;
                height: 700px;
            }
            .form-label{
                margin-left: 10px;
                margin-top: 2px;
            }
            .form-control {
                width: 300px;
                margin-left: 10px;
            }
            .btn_pos{
                margin-left: 250px;
                margin-top: 15px;
            }
            .error-message {
                color: red;
                font-size: 15px;
                margin-left: 10px;
            }
        </style>
    </head>
    <body>


        <div class="background-container"></div>
        <div class="container mt-5">
            <div class="d-flex justify-content-center align-items-center">
                <div class="form-container">
                    <form name="update_product" onsubmit="return validateForm()" method="post"  enctype="multipart/form-data" >
                        <h2 style="text-align:center">Update Product</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="productName" name="productName">
                                    <span class="error-message" id="productNameError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control dropdown" id="category" name="category">
                                        <option value="0">--Select Category--</option>
                                        <?php
                                        $sql_cat = "SELECT * FROM tblcategory";
                                        $result_cat = $con->query($sql_cat);

                                        if ($result_cat->num_rows > 0) {
                                            while ($row = $result_cat->fetch_assoc()) {
                                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span class="error-message" id="categoryError"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="size" class="form-label">Size</label>
                                    <select class="form-control dropdown" id="size" name="size">
                                        <option value="0">--Select Size--</option>
                                        <?php
                                        $sql_size = "SELECT * FROM tblsize";
                                        $result_size = $con->query($sql_size);

                                        if ($result_size->num_rows > 0) {
                                            while ($row = $result_size->fetch_assoc()) {
                                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span class="error-message" id="sizeError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="color" class="form-label">Color</label>
                                    <select class="form-control dropdown" id="color" name="color">
                                        <option value="0">--Select Color--</option>
                                        <?php
                                        $sql_color = "SELECT * FROM tblcolor";
                                        $result_color = $con->query($sql_color);

                                        if ($result_color->num_rows > 0) {
                                            while ($row = $result_color->fetch_assoc()) {
                                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span class="error-message" id="colorError"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fabric" class="form-label">Fabric</label>
                                    <select class="form-control dropdown" id="fabric" name="fabric">
                                        <option value="0">--Select Fabric--</option>
                                        <?php
                                        $sql_fabric = "SELECT * FROM tblfabric";
                                        $result_fabric = $con->query($sql_fabric);

                                        if ($result_fabric->num_rows > 0) {
                                            while ($row = $result_fabric->fetch_assoc()) {
                                                echo '<option value="' . $row['id'] . '">' . $row['type'] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span class="error-message" id="fabricError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="price" name="price">
                                    <span class="error-message" id="priceError"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity">
                                    <span class="error-message" id="quantityError"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image1" class="form-label">Select 1st Image:</label>
                                    <input type="file" id="image1" name="image1" accept=".jpg, .jpeg, .png">
                                    <span class="error-message" id="image1Error"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="image2" class="form-label">Select 2nd Image:</label>
                                    <input type="file" id="image2" name="image2" accept=".jpg, .jpeg, .png">
                                    <span class="error-message" id="image2Error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="btn_pos">
                            <button type="submit" name="add" class="btn btn-primary">Add</button>
                            <button type="submit" name="cancel" class="btn btn-danger" style="margin-left: 20px">
                                <a href="index.php" style="color: white">Cancel</a>
                            </button>
                        </div> 
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            var productName = document.forms["update_product"]["productName"].value;
            var category = document.forms["update_product"]["category"].value;
            var size = document.forms["update_product"]["size"].value;
            var color = document.forms["update_product"]["color"].value;
            var fabric = document.forms["update_product"]["fabric"].value;
            var price = document.forms["update_product"]["price"].value;
            var quantity = document.forms["update_product"]["quantity"].value;
            // Client-side file validation
            var image1Input = document.getElementById('image1');
            var image2Input = document.getElementById('image2');
            var allowedExtensions = ['jpg', 'jpeg', 'png'];
            var image1Path = ""; // Initialize the paths to empty strings
            var image2Path = "";
            var isValid = true;
            // Reset previous error messages
            document.getElementById("productNameError").innerHTML = "";
            document.getElementById("categoryError").innerHTML = "";
            document.getElementById("sizeError").innerHTML = "";
            document.getElementById("colorError").innerHTML = "";
            document.getElementById("fabricError").innerHTML = "";
            document.getElementById("priceError").innerHTML = "";
            document.getElementById("quantityError").innerHTML = "";
            document.getElementById('image1Error').textContent = '';
            document.getElementById('image2Error').textContent = '';
            if (productName === "") {
                document.getElementById("productNameError").innerHTML = "Product Name is required.";
                isValid = false;
            } else if (!/^[a-zA-Z]+$/.test(productName)) {
                document.getElementById("productNameError").innerHTML = "Product Name must contain only alphabets.";
                isValid = false;
            }

            if (category === "0") {
                document.getElementById("categoryError").innerHTML = "Category is required.";
                isValid = false;
            }

            if (size === "0") {
                document.getElementById("sizeError").innerHTML = "Size is required.";
                isValid = false;
            }

            if (color === "0") {
                document.getElementById("colorError").innerHTML = "Color is required.";
                isValid = false;
            }

            if (fabric === "0") {
                document.getElementById("fabricError").innerHTML = "Fabric is required.";
                isValid = false;
            }

            if (price === "") {
                document.getElementById("priceError").innerHTML = "Price is required.";
                isValid = false;
            } else if (isNaN(price) || parseFloat(price) <= 0) {
                document.getElementById("priceError").innerHTML = "Price must be a positive number.";
                isValid = false;
            }

            if (quantity === "") {
                document.getElementById("quantityError").innerHTML = "Quantity is required.";
                isValid = false;
            } else if (isNaN(quantity) || parseFloat(quantity) <= 0) {
                document.getElementById("quantityError").innerHTML = "Quantity must be a positive number.";
                isValid = false;
            }
            if (!image1Input.files.length) {
                document.getElementById('image1Error').textContent = 'Please select a file for the 1st image.';
                isValid = false;
            } else {
                var image1Extension = image1Input.value.split('.').pop().toLowerCase();
                if (!allowedExtensions.includes(image1Extension)) {
                    document.getElementById('image1Error').textContent = 'Only jpg, jpeg, and png files are allowed for the 1st image.';
                    isValid = false;
                } else {
                    // Capture the file path for the 1st image if valid
                    image1Path = 'IMG/' + image1Input.files[0].name; // Modify the path as needed
                    $.ajax({
                        type: 'POST',
                        url: 'insert_image1.php', // Replace with the correct URL for your 1st image insertion script
                        data: {image1Path: image1Path},
                        success: function (response) {
                            // Handle the server response here
                            console.log(response);
                        }
                    });
                }
            }

            if (!image2Input.files.length) {
                document.getElementById('image2Error').textContent = 'Please select a file for the 2nd image.';
                isValid = false;
            } else {
                var image2Extension = image2Input.value.split('.').pop().toLowerCase();
                if (!allowedExtensions.includes(image2Extension)) {
                    document.getElementById('image2Error').textContent = 'Only jpg, jpeg, and png files are allowed for the 2nd image.';
                    isValid = false;
                } else {
                    // Capture the file path for the 2nd image if valid
                    image2Path = 'IMG/' + image2Input.files[0].name; // Modify the path as needed
                    $.ajax({
                        type: 'POST',
                        url: 'insert_image2.php', // Replace with the correct URL for your 2nd image insertion script
                        data: {image2Path: image2Path},
                        success: function (response) {
                            // Handle the server response here
                            console.log(response);
                        }
                    });
                }
            }
            if (isValid) {
                return true; // Prevent form submission
            } else
            {
                return false;
            }
            
        }
    </script>
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+JmjzX2n/rw6Uj1j1lsofmUHCbUG5H8b5W5RdI5bh6WQFZf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+JmjzX2n/rw6Uj1j1lsofmUHCbUG5H8b5W5RdI5bh6WQFZf" crossorigin="anonymous"></script>
</body>
</html>