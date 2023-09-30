<?php
require_once 'dbcon.php';
require 'index.php';
if (isset($_REQUEST['submit'])) {
    $selectedCategoryId = $_POST['selectedCategoryID'];
    $selectedSubcategoryId = $_POST['selectedSubcategoryID'];
    $q = "SELECT id FROM tblcategoryentry WHERE typeid='$selectedCategoryId' AND categoryid='$selectedSubcategoryId'";
    $result = mysqli_query($con, $q);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categoryentryid = $row['id'];
        }
    }
    $name = $_POST['productName'];
    $selectedFabricID = $_POST['fabric'];
    //product table add
    $insertProductQuery = "INSERT INTO tblproduct (categoryentryid, name, fabricid, status) 
    VALUES ('$categoryentryid', '$name', '$selectedFabricID', '1')";

    if (mysqli_query($con, $insertProductQuery)) {
        // Data was successfully inserted
        $productId = mysqli_insert_id($con); // Get the last inserted product ID
        //echo "Data inserted successfully! Product ID: " . $productId;

        // Process the dynamically added rows for price, color, quantity, and size
        $prices = $_POST['price'];
        $colors = $_POST['color'];
        $sizes = $_POST['size'];
        $quantities = $_POST['quantity'];

        foreach ($prices as $index => $price) {
            $colorId = $colors[$index];
            $sizeId = $sizes[$index];
            $quantity = $quantities[$index];

            // Insert data into tblProductDescription
            $insertDescriptionQuery = "INSERT INTO tblproductdescription (product_id, size_id, color_id, price, quantity) 
                                       VALUES ('$productId', '$sizeId', '$colorId', '$price', '$quantity')";

            if (!mysqli_query($con, $insertDescriptionQuery)) {
                // Error occurred during insertion
                echo "Error: " . mysqli_error($con);
                break; // Exit loop if an error occurs
            }
        }
        if (!empty($_FILES['image1']['name'])) {
            $image1_paths = []; // To store the file paths of uploaded images

            foreach ($_FILES['image1']['tmp_name'] as $key => $tmp_name) {
                $image_name = $_FILES['image1']['name'][$key];
                $image_tmp = $_FILES['image1']['tmp_name'][$key];

                // Define the directory where you want to save the uploaded images
                $upload_directory = "IMG/"; // Update with your directory path

                // Generate a unique name for each uploaded image (e.g., using a timestamp)
                $image_path = $upload_directory . time() . '_' . $image_name;

                // Move the uploaded image to the desired directory
                if (move_uploaded_file($image_tmp, $image_path)) {
                    $image1_paths[] = $image_path; // Store the file path
                } else {
                    // Handle upload errors if necessary
                    echo "Error uploading image: " . $image_name;
                }
            }

            // Insert image paths into tblimage
            foreach ($image1_paths as $image_path) {
                $insertImageQuery = "INSERT INTO tblimage (productid, imagepath) VALUES ('$productId', '$image_path')";
                if (!mysqli_query($con, $insertImageQuery)) {
                    // Error occurred during image insertion
                    echo "Error inserting image path: " . mysqli_error($con);
                }
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
    <title>Add Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+JmjzX2n/rw6Uj1j1lsofmUHCbUG5H8b5W5RdI5bh6WQFZf" crossorigin="anonymous">



    <!--<link rel="stylesheet" href="CSS/product.css">-->
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
            margin-left: 350px;
            /width: 700px;/
        }

        .container {
            padding: 20px;
        }

        .btn_poss {
            margin-left: 250px;
            margin-top: 15px;

        }

        .error-msg {
            color: red;
            font-size: 15px;
            text-align: left;
        }

        .btn-container {
            text-align: right;
            margin-right: 30px;
        }

        p {
            text-align: right;
            margin-left: 10px;
        }

        .container {
            width: 1200px;
        }
    </style>
</head>

<body>


    <div class="background-container"></div>
    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center">
            <div class="form-container">
                <form name="add_product" id="add_product" action="" method="post" enctype="multipart/form-data">
                    <h2 style="text-align:center">Add Product</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control dropdown" id="category" name="category" style="width:200px">
                                    <option value="0">Select Category</option>
                                    <?php
                                    $categoryQuery = "SELECT id, name FROM tbltype WHERE status = '1'";
                                    $result = $con->query($categoryQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="selectedCategoryID" id="selectedCategoryID" value="">

                                <p class="category-error-msg error-msg" style="color: red; display: none;">Please select a category</p>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="subCategory" class="form-label">Sub Category</label>
                                <select class="form-control dropdown" id="subCategory" name="subCategory" style="width:200px">
                                    <option value="0">Select Sub Category</option>
                                </select>
                                <p class="sub-category-error-msg error-msg" style="color: red; display: none;">Please select a sub-category</p>
                                <input type="hidden" name="selectedSubcategoryID" id="selectedSubcategoryID" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName" style="width:200px">
                                <p class="error-message product-name-error-message" style="text-align: left; color:red"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="fabric" class="form-label">Fabric</label>
                                <select class="form-control dropdown" id="fabric" name="fabric" style="width:200px">
                                    <option value="0">Select Fabric</option>
                                    <?php
                                    $categoryQuery = "SELECT id, name FROM tblfabric WHERE status = '1'";
                                    $result = $con->query($categoryQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <p class="fabric-error-msg error-msg" style="color: red; display: none;">Please select a Fabric.</p>
                            </div>
                        </div>
                    </div>

                    <div id="show_item">
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price[]">
                                <p class="error-message price-error-message" style="color: red; text-align: left;"></p>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="color" class="form-label">Color</label>
                                <select class="form-control" id="color" name="color">
                                    <option value="0">Color</option>
                                    <?php
                                    $categoryQuery = "SELECT id, name FROM tblcolor WHERE status = '1'";
                                    $result = $con->query($categoryQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <p class="color-error-msg error-msg" style="color: red; display: none;">Please select a Color.</p>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="size" class="form-label">Size</label>
                                <select class="form-control" id="size" name="size">
                                    <option value="0">Size</option>
                                    <?php
                                    $categoryQuery = "SELECT id, name FROM tblsize WHERE status = '1'";
                                    $result = $con->query($categoryQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <p class="size-error-msg error-msg" style="color: red; display: none;">Please select a Size.</p>

                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity[]">
                                <p class="error-message quantity-error-message" style="color: red; text-align: left;"></p>
                            </div>

                            <div class="col-md-2 mb-3">
                                <button type="button" class="btn btn-success add_item_btn" data-section="item" style="margin-top: 30px; width: 100px">Add more</button>

                            </div>
                        </div>
                    </div>


                    <div id="show_img">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="image1" class="form-label">Select an Image:</label>
                                    <input type="file" id="image1" name="image1[]" accept=".jpg, .jpeg, .png">
                                    <p class="error-message image-error-message" style="color: red; text-align: left;"></p>
                                    <button type="button" class="btn btn-success add_img_btn" data-section="image" style="margin-top: -90px; margin-left: 220px; width: 100px">Add more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn_poss">
                        <button type="submit" name="submit" id="submitButton" class="btn btn-primary">Add Product</button>
                        <button type="submit" name="cancel" id="cancelButton" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="js/product_validation.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $(".add_item_btn").click(function(e) {
                e.preventDefault();
                // Create a new row
                var newRow = $(`<div class="row">
            <div class="col-md-2 mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price[]">
            </div>
            <div class="col-md-2 mb-3">
                <label for="color" class="form-label">Color</label>
                <select class="form-control" name="color[]">
                    <option value="">Color</option>
                    <?php
                    // Fetch color options from the database
                    $colorQuery = "SELECT id, name FROM tblcolor WHERE status = '1'";
                    $result = $con->query($colorQuery);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="size" class="form-label">Size</label>
                <select class="form-control" name="size[]">
                    <option value="">Size</option>
                    <?php
                    // Fetch size options from the database
                    $sizeQuery = "SELECT id, name FROM tblsize WHERE status = '1'";
                    $result = $con->query($sizeQuery);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity[]">
            </div>
            <div class="col-md-2 mb-3">
                <button type="button" class="btn btn-danger remove_item_btn" style="margin-top: 30px">Remove</button>
            </div>
        </div>`);

                // Append the new row to #show_item
                $("#show_item").prepend(newRow);
            });

            // Remove the dynamically added row when clicking "Remove"
            $(document).on('click', '.remove_item_btn', function(e) {
                e.preventDefault();
                var rowItem = $(this).closest('.row');
                rowItem.remove();
            });
        });



        //for images
        $(document).ready(function() {
            $(".add_img_btn").click(function(e) {
                e.preventDefault();
                $("#show_img").prepend(`<div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="image1" class="form-label">Select an Image:</label>
                                    <input type="file" id="image1" name="image1[]" accept=".jpg, .jpeg, .png">
                                    <p class="error-message image-error-message" style="text-align: left;"></p>
                                    <button type="button" class="btn btn-danger remove_img_btn" style="margin-top: -90px; margin-left: 220px; width: 100px">Remove</button>
                                </div> 
                            </div>
                        </div>
                        `);
            });
            $(document).on('click', '.remove_img_btn', function(e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var selectedCategoryId = ''; // Initialize selectedCategoryId
            var selectedSubcategoryId = ''; // Initialize selectedSubcategoryId

            // Category Dropdown Change Event
            $('#category').change(function() {
                selectedCategoryId = $(this).val();
                $('#selectedCategoryID').val(selectedCategoryId); // Update the hidden input field
                $.ajax({
                    url: 'get_subcategories.php',
                    type: 'POST',
                    data: {
                        categoryId: selectedCategoryId
                    },
                    success: function(response) {
                        $('#subCategory').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request error: " + status + " - " + error);
                        // You can add error handling code here, e.g., displaying an error message.
                    }
                });
            });

            // Subcategory Dropdown Change Event
            $('#subCategory').change(function() {
                selectedSubcategoryId = $(this).val();
                $('#selectedSubcategoryID').val(selectedSubcategoryId); // Update the hidden input field
            });





        });
    </script>

    <!-- Validation -->



</body>

</html>