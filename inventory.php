<?php
require_once 'dbcon.php';
require 'index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Inventory</title>
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
        .validation-error {
        color: red;
        }
        .form-container {
            background-color: #FFEEF4;
            padding: 20px;
            border-radius: 10px;
            margin-left: 350px;
            /width: 700px;
            /
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
                    <h2 style="text-align:center">Add Inventory</h2>
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

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="vendor" class="form-label">Vendor Name</label>
                                <select class="form-control dropdown" id="vendor" name="vendor" style="width:200px">
                                    <option value="0">Select Vendor</option>
                                    <option value="1">Ram</option>
                                </select>
                                <p class="vendor-error-msg error-msg" style="color: red; display: none;">Please select a Vendor name.</p>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="orderDate" class="form-label">Order Date Time</label>
                                <input type="datetime-local" class="form-control" id="orderDate" name="orderDate" style="width:200px">
                                <p class="orderDate-error-msg error-msg" style="color: red; display: none;">Please select a Date-Time.</p>
                            </div>
                        </div>
                    </div>


                    <div class="btn_poss">
                        <button type="submit" name="submit" id="submitButton" class="btn btn-primary">Add Stock</button>
                        <button type="submit" name="cancel" id="cancelButton" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


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
                        <option value="0">Color</option>
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
                        <option value="0">Size</option>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>>
    <script src="js/validation.js"></script>
    <script>
        $(document).ready(function() {
            $('form[name="add_product"]').submit(function(e) {
                
                var vendorSelected = $('#vendor').val() !== '0';
                var orderDate = $('#orderDate').val();
               
                if (!vendorSelected) {
                    $('.vendor-error-msg').show();
                    e.preventDefault(); // Prevent form submission
                } else {
                    $('.vendor-error-msg').hide();
                }

                if (!orderDate) {
                    $('.orderDate-error-msg').show();
                    e.preventDefault(); // Prevent form submission
                } else {
                    var selectedDate = new Date(orderDate);
                    var currentDate = new Date();
                    // Set the start of the current day
                    currentDate.setHours(0, 0, 0, 0);
                    // Set the end of the current day
                    var endOfDay = new Date(currentDate);
                    endOfDay.setHours(23, 59, 59, 999);
                    if (selectedDate < currentDate) {
                        $('.orderDate-error-msg').text('Past date is not allowed.').show();
                        e.preventDefault(); // Prevent form submission
                    } else if (selectedDate > endOfDay) {
                        $('.orderDate-error-msg').text('Future date is not allowed.').show();
                        e.preventDefault(); // Prevent form submission
                    } else {
                        $('.orderDate-error-msg').hide();
                    }
                }


            });
           
            $('#vendor').change(function() {
                if ($('#vendor').val() !== '0') {
                    $('.vendor-error-msg').hide();
                }
            });
            $('#orderDate').change(function() {
                var orderDate = $('#orderDate').val();
                var currentDate = new Date();
                var selectedDate = new Date(orderDate);
                // Set the start of the current day
                currentDate.setHours(0, 0, 0, 0);
                // Set the end of the current day
                var endOfDay = new Date(currentDate);
                endOfDay.setHours(23, 59, 59, 999);
                if (isNaN(selectedDate.getTime())) {
                    // Invalid date format
                    $('.orderDate-error-msg').text('Invalid date format.').show();
                    e.preventDefault(); // Prevent form submission
                } else if (selectedDate < currentDate || selectedDate > endOfDay) {
                    // Wrong date (past or future)
                    $('.orderDate-error-msg').text('Invalid date selected.').show();
                    e.preventDefault(); // Prevent form submission
                } else {
                    // Valid date
                    $('.orderDate-error-msg').hide(); // Hide the error message
                }
            });
        });
    </script>
</body>

</html>