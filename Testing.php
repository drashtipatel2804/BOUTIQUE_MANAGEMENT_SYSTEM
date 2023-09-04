<?php
//$s1="xl";
//$s2="xxl";
//similar_text($s2, $s1,$similarity);
//echo $similarity;
?>
<?php

//function isSimilar($str1, $str2, $threshold =0) {
//    $distance = levenshtein($str1, $str2);
//
//    // Compare the distance with the threshold
//    if ($distance <= $threshold) {
//        return true;
//    }
//
//    return false;
//}
//
//$newString = "l";
//$existingString = "xxl";
//
//if (isSimilar($newString, $existingString)) {
//    echo "Strings are similar.";
//} else {
//    echo "Strings are not similar.";
//}

?>

<?php
require_once 'dbcon.php';
if (isset($_POST['add'])) {
    $product_name = $_POST['product_name'];
    $category_name = $_POST['category'];
    $size_name = $_POST['size'];
    $color_name = $_POST['color'];
    $fabric_name = $_POST['fabric'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
//    $uploadDir = 'IMG/'; // Directory where files will be uploaded
//
//    // Handle the first file
//    if (!empty($_FILES['fileToUpload1']['name'])) {
//        $fileName1 = $_FILES['fileToUpload1']['name'];
//        $targetFilePath1 = $uploadDir . $fileName1;
//
//        // Move the uploaded file to the 'uploads' directory
//        if (move_uploaded_file($_FILES['fileToUpload1']['tmp_name'], $targetFilePath1)) {
//            // File 1 was successfully uploaded
//            $uploadedFilePath1 = $targetFilePath1;
//            echo "File 1 uploaded successfully: " . $uploadedFilePath1;
//        } else {
//            // Error occurred while uploading File 1
//            echo "Error uploading File 1.";
//        }
//    }
//
//    // Handle the second file (similar to the first file)
//    if (!empty($_FILES['fileToUpload2']['name'])) {
//        $fileName2 = $_FILES['fileToUpload2']['name'];
//        $targetFilePath2 = $uploadDir . $fileName2;
//
//        // Move the uploaded file to the 'uploads' directory
//        if (move_uploaded_file($_FILES['fileToUpload2']['tmp_name'], $targetFilePath2)) {
//            // File 2 was successfully uploaded
//            $uploadedFilePath2 = $targetFilePath2;
//            echo "File 2 uploaded successfully: " . $uploadedFilePath2;
//        } else {
//            // Error occurred while uploading File 2
//            echo "Error uploading File 2.";
//        }
//    }
//    $i1=$uploadedFilePath1;
//    $i2=$uploadedFilePath2;


    function getIDByName($tableName, $name, $con) {
        $name = mysqli_real_escape_string($con, $name); 
        $sql = "SELECT id FROM $tableName WHERE name = '$name'";
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['id'];
        }
        return 0; // Return 0 if name is not found
    }

    // Get the IDs based on the selected names
    $category_id = getIDByName("tblcategory", $category_name, $con);
    echo $category_id;
    $size_id = getIDByName("tblsize", $size_name, $con);
    $color_id = getIDByName("tblcolor", $color_name, $con);
    $fabric_id = getIDByName("tblfabric", $fabric_name, $con);

    
//    $sql_insert = "INSERT INTO tblproduct (name, Categoryid, Colorid, Sizeid, Fabricid, price, ImgPath1, ImgPath2) VALUES ('$product_name', '$category_id', '$color_id', '$size_id', '$fabric_id', '$price', '$i1', '$i2')";
//    if (mysqli_query($con, $sql_insert)) {
//        // Insertion successful
//        echo "Product added successfully!";
//    } else {
//        // Insertion failed
//        echo "Error: " . mysqli_error($con);
//    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Product</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        </style>
    </head>
    <body>

        <?php
        $target_dir = "IMG/";
        $uploadOk = 1;
        $error_message = ""; // Initialize an empty error message
        // Validation and processing for the first image
        if (isset($_POST["submit"])) {
            $target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
            $imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));

            // Check if image file is a valid image
            $check1 = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
            if ($check1 !== false) {
                $uploadOk = 1;
            } else {
                $error_message .= "1st Image is not an image.<br>"; // Append error message
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file1)) {
                $error_message .= "Sorry, 1st file already exists.<br>"; // Append error message
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload1"]["size"] > 500000) {
                $error_message .= "Sorry, 1st file is too large.<br>"; // Append error message
                $uploadOk = 0;
            }

            // Allow certain file formats for the first image
            if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg") {
                $error_message .= "Sorry, only JPG, JPEG & PNG files are allowed.<br>"; // Append error message
                $uploadOk = 0;
            }

            // Validation and processing for the second image (similar to the first image)
            $target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
            $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

            // Check if image file is a valid image
            $check2 = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
            if ($check2 !== false) {
                $uploadOk = 1;
            } else {
                $error_message .= "2nd Image is not an image.<br>"; // Append error message
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file2)) {
                $error_message .= "Sorry, 2nd file already exists.<br>"; // Append error message
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload2"]["size"] > 500000) {
                $error_message .= "Sorry, 2nd file is too large.<br>"; // Append error message
                $uploadOk = 0;
            }

            // Allow certain file formats for the second image
            if ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
                $error_message .= "Sorry, only JPG, JPEG & PNG files are allowed.<br>"; // Append error message
                $uploadOk = 0;
            }
        }
        ?>
        <div class="background-container"></div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="post" action="" name="add_product" enctype="multipart/form-data">

                        <div class="form-group">
                            <h2 style="text-align: center">Add Product</h2>
                            <div style="display: flex; align-items: center;">
                                <div>
                                    <label for="product_name" class="form-label" id="name">Product Name :</label>
                                    <input type="text" name="product_name" class="form-control" id="product_name">
                                    <span class="error-message" id="product_name_error" style="margin-left:50px"></span>
                                </div>
                                <div style="margin-left: 10px;">
                                    <label for="category" class="form-label">Category :</label>
                                    <select name="category" class="form-control dropdown" id="category">
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
                                    <span class="error-message" id="category_error"></span>
                                </div>
                            </div>

                            <div style="display: flex; align-items: center; gap: 20px;">
                                <div>
                                    <label for="size" class="form-label">Size :</label>
                                    <select name="size" class="form-control dropdown" id="size">
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
                                    <span class="error-message" id="size_error"></span>
                                </div>

                                <div>
                                    <label for="color" class="form-label">Color :</label>
                                    <select name="color" class="form-control dropdown" id="color">
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
                                    <span class="error-message" id="color_error"></span>
                                </div>
                            </div>

                            <div style="display: flex; align-items: center; gap: 20px;">
                                <div>
                                    <label for="fabric" class="form-label">Fabric :</label>
                                    <select name="fabric" class="form-control dropdown" id="fabric">
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
                                    <span class="error-message" id="fabric_error"></span>
                                </div>

                                <div>
                                    <label for="price" class="form-label">Price :</label>
                                    <input type="number" name="price" class="form-control" id="price">
                                    <span class="error-message" id="price_error" style="margin-left:50px"></span>
                                </div>
                            </div>

                            <label for="quantity" class="form-label">Quantity :</label>
                            <input type="number" name="quantity" class="form-control" id="quantity">
                            <span class="error-message" id="quantity_error" style="margin-left:50px"></span>
                            <br>
                            <div>
                                <label for="img1" class="form-label">Select 1st image:</label>
                                <input type="file" name="fileToUpload1" id="fileToUpload1">
                                <span class="error-message" id="fileToUpload1_error" style="margin-left:-80px"></span>
                            </div>

                            <div style="margin-top: 10px;">
                                <label for="img2" class="form-label">Select 2nd image:</label>
                                <input type="file" name="fileToUpload2" id="fileToUpload2">
                                <span class="error-message" id="fileToUpload2_error" style="margin-left:-80px"></span>
                            </div>

                            <div class="error-message"><?php echo $error_message; ?></div>
                            <div class="btn_pos">
                                <button type="submit" name="add" class="btn btn-primary">Add</button>
                                <button type="submit" name="cancel" class="btn btn-danger" style="margin-left: 20px">
                                    <a href="index.php" style="color: white">Cancel</a></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <script>
                // Function to validate the form before submission
                function validateForm() {
                    var productName = document.getElementById("product_name").value;
                    var category = document.getElementById("category").value;
                    var size = document.getElementById("size").value;
                    var color = document.getElementById("color").value;
                    var fabric = document.getElementById("fabric").value;
                    var price = document.getElementById("price").value;
                    var quantity = document.getElementById("quantity").value;
                    var fileToUpload1 = document.getElementById("fileToUpload1").value;
                    var fileToUpload2 = document.getElementById("fileToUpload2").value;

                    // Clear previous error messages
                    clearErrorMessages();

                    var isValid = true;

                    if (productName === "") {
                        displayErrorMessage("product_name_error", "Product Name is required.");
                        isValid = false;
                    }

                    if (category === "0") {
                        displayErrorMessage("category_error", "Category is required.");
                        isValid = false;
                    }

                    if (size === "0") {
                        displayErrorMessage("size_error", "Size is required.");
                        isValid = false;
                    }

                    if (color === "0") {
                        displayErrorMessage("color_error", "Color is required.");
                        isValid = false;
                    }

                    if (fabric === "0") {
                        displayErrorMessage("fabric_error", "Fabric is required.");
                        isValid = false;
                    }

                    if (price === "") {
                        displayErrorMessage("price_error", "Price is required.");
                        isValid = false;
                    }

                    if (quantity === "") {
                        displayErrorMessage("quantity_error", "Quantity is required.");
                        isValid = false;
                    }

                    if (fileToUpload1 === "") {
                        displayErrorMessage("fileToUpload1_error", "Please select the 1st image.");
                        isValid = false;
                    }

                    if (fileToUpload2 === "") {
                        displayErrorMessage("fileToUpload2_error", "Please select the 2nd image.");
                        isValid = false;
                    }

                    return isValid;
                }

// Function to display an error message below an input field
                function displayErrorMessage(inputId, message) {
                    var errorSpan = document.getElementById(inputId);
                    errorSpan.innerHTML = message;
                }

// Function to clear error messages
                function clearErrorMessages() {
                    var errorSpans = document.querySelectorAll(".error-message");
                    for (var i = 0; i < errorSpans.length; i++) {
                        errorSpans[i].innerHTML = "";
                    }
                }

// Add a submit event listener to the form
                document.querySelector("form[name='add_product']").addEventListener("submit", function (event) {
                    if (!validateForm()) {
                        event.preventDefault(); // Prevent form submission if validation fails
                    }
                });
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
