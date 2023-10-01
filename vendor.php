<?php
require_once 'dbcon.php';
require 'index.php';

if (isset($_POST['submit'])) {
    // Get form data
    $vendorName = $_POST['vendorName'];
    $shopName = $_POST['shopName'];
    $address = $_POST['address'];
    $selectedcityID = $_POST['city'];
    $contact = $_POST['contact'];

    // Check if the vendor with the same contact number already exists
    $checkQuery = "SELECT * FROM tblvendor WHERE contactno = '$contact'";
    $checkResult = $con->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Vendor with the same contact number already exists
        echo '<script>alert("Vendor with the same contact number already exists.");</script>';
    } else {
        // Insert data into tblVendor
        $insertQuery = "INSERT INTO tblvendor (name, shopename, shopaddress, shopcityid, contactno, status) VALUES ('$vendorName', '$shopName', '$address', '$selectedcityID', '$contact', '1')";

        // Perform the database query
        $result = $con->query($insertQuery);

        if ($result) {
            // Data inserted successfully
            echo '<script>alert("Vendor added successfully.");</script>';
            echo '<script>window.location.href = "viewVendor.php";</script>';
            // You can redirect to another page or display a success message here
        } else {
            // Error in inserting data
            echo '<script>alert("Error in adding vendor: ' . $con->error . '");</script>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vendor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+JmjzX2n/rw6Uj1j1lsofmUHCbUG5H8b5W5RdI5bh6WQFZf" crossorigin="anonymous">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            margin-top: 100px;

        }

        .container {
            padding: 20px;
        }

        .btn_poss {
            margin-left: 150px;
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
                <form name="add_vendor" id="add_vendor" action="" method="post">
                    <h2 style="text-align:center">Add Vendor</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="name" class="form-label">Vendor Name</label>
                                <input type="text" class="form-control" id="vendorName" name="vendorName">
                                <p class="error-message vendor-name-error-message" style="text-align: left; color:red"></p>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="shopName" class="form-label">Shop Name</label>
                                <input type="text" class="form-control" id="shopName" name="shopName">
                                <p class="error-message shop-name-error-message" style="text-align: left; color:red"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="address" class="form-label">Shop Address</label>
                                <textarea id="address" name="address" class="form-control"></textarea>
                                <p class="error-message address-error-message" style="text-align: left; color:red"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="city" class="form-label">City</label>
                                <select class="form-control" id="city" name="city">
                                    <option value="0">Select City</option>
                                    <?php
                                    $categoryQuery = "SELECT id, name FROM tblcity";
                                    $result = $con->query($categoryQuery);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <p class="city-error-msg error-msg" style="color: red; display: none;">Please select a City.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="contact" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" id="contact" name="contact" style="width:200px">
                            <p class="error-message contact-error-message" style="color: red; text-align: center;"></p>
                        </div>
                    </div>
                    


                    <div class="btn_poss">
                        <button type="submit" name="submit" id="submitButton" class="btn btn-primary">Add Vendor</button>
                        <!-- <button type="submit" name="cancel" id="cancelButton" class="btn btn-danger" onsubmit="viewVendor.php">Cancel</button> -->
                        <button type="submit" name="cancel" class="btn btn-danger">
                                <a href="viewVendor.php" style="color: white">Cancel</a>
                            </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('form[name="add_vendor"]').submit(function(e) {

                var vendorName = $('#vendorName').val().trim();
                var shopName = $('#shopName').val().trim();
                var address = $('#address').val().trim();
                var citySelected = $('#city').val() !== '0';
                var contact = $('#contact').val().trim();

                if (vendorName === '') {
                    $('.vendor-name-error-message').text('Vendor name is required').show();
                    e.preventDefault(); // Prevent form submission
                } else if (!/^[a-zA-Z\s]+$/.test(vendorName)) {
                    $('.vendor-name-error-message').text('Only allowed characters in Vendor name').show();
                    e.preventDefault(); // Prevent form submission
                } else {
                    $('.vendor-name-error-message').hide();
                }

                if (shopName === '') {
                    $('.shop-name-error-message').text('Shop name is required').show();
                    e.preventDefault(); // Prevent form submission
                } else if (!/^[a-zA-Z\s]+$/.test(shopName)) {
                    $('.shop-name-error-message').text('Only allowed characters in Shop name').show();
                    e.preventDefault(); // Prevent form submission
                } else {
                    $('.shop-name-error-message').hide();
                }

                if (address === '') {
                    $('.address-error-message').text('Address is required').show();
                    e.preventDefault(); // Prevent form submission
                } else {
                    $('.address-error-message').hide();
                }

                if (!citySelected) {
                    $('.city-error-msg').show();
                    e.preventDefault(); // Prevent form submission
                } else {
                    $('.city-error-msg').hide();
                }

                if (contact === '') {
                    $('.contact-error-message').text('Contact is required').show();
                    e.preventDefault(); // Prevent form submission
                } else if (contact < 10) {
                    $('.contact-error-message').text('Contact number can not be greater than 10 digits.').show();
                } else {
                    $('.contact-error-message').text('');
                }

            });

            $('#vendorName').on('input', function() {
                var vendorName = $(this).val();
                // Check Product Name
                if (vendorName === '') {
                    $('.vendor-name-error-message').text('Vendor name is required');
                } else if (!/^[a-zA-Z\s]+$/.test(vendorName)) {
                    $('.vendor-name-error-message').text('Only allowed characters in Vendor name');
                } else {
                    $('.vendor-name-error-message').text('');
                }
            });

            $('#shopName').on('input', function() {
                var shopName = $(this).val();
                // Check Product Name
                if (shopName === '') {
                    $('.shop-name-error-message').text('Shop name is required');
                } else if (!/^[a-zA-Z\s]+$/.test(shopName)) {
                    $('.shop-name-error-message').text('Only allowed characters in Shop name');
                } else {
                    $('.shop-name-error-message').text('');
                }
            });

            $('#address').on('input', function() {
                var address = $(this).val();
                // Check Product Name
                if (address === '') {
                    $('.address-error-message').text('Address  is required');
                } else {
                    $('.address-error-message').text('');
                }
            });

            $('#city').change(function() {
                if ($('#city').val() !== '0') {
                    $('.city-error-msg').hide();
                }
            });

            $('#contact').on('input', function() {
                var contact = $(this).val();
                if (contact === '') {
                    $('.contact-error-message').text('Contact is required');
                } else if (contact.length > 10) {
                    $('.contact-error-message').text('Contact number can not be greater than 10 digits.');
                } else if (/^[a-zA-Z\s]+$/.test(contact)) {
                    $('.contact-error-message').text('Only allowed Digits in Contact number.');
                } else if (contact < 0) {
                    $('.contact-error-message').text('Contact number cannot be negative.');
                } else {
                    $('.contact-error-message').text('');
                }
                $('.contact-error-message').text(errorMessage);
            });

        });
    </script>
</body>

</html>