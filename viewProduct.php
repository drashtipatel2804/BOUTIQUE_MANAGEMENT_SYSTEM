<?php
include 'dbcon.php';
require_once 'index.php';
//session_start();

if (isset($_REQUEST['update'])) {
    if (isset($_REQUEST['category_name'])) {
        $_SESSION['category_name'] = $_POST['category_name'];
        $_SESSION['id'] = $_POST['categoryid'];
        //header("Location: updateCategory.php");
        echo '<script>window.location.href = "updateProduct.php";</script>';
    } else {
        echo '<script>window.location.href = "viewProduct.php";</script>';
    }
}

if (isset($_REQUEST['delete'])) {
    if (isset($_POST['categoryid'])) {
        $categoryid = $_POST['categoryid'];
        $query_delete = "DELETE FROM tblcategory WHERE id = '$categoryid'";
        $query_run_delete = mysqli_query($con, $query_delete);

        if ($query_run_delete) {
            // Deletion was successful, you can set a success message if needed
            $_SESSION['success'] = "Category deleted successfully";
        } else {
            // Deletion failed, you can set an error message if needed
            $_SESSION['error'] = "Error deleting category: " . mysqli_error($con);
        }
    }
}

if (isset($_REQUEST['deActive'])) {
    if (isset($_POST['categoryid'])) {
        $categoryid = $_POST['categoryid'];
        $update_query = "UPDATE tblcategory SET status = 0 WHERE id = ?";
        $stmt = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt, "i", $categoryid);
        $query_run = mysqli_stmt_execute($stmt);
        if ($query_run) {
            // Update was successful
            $_SESSION['success'] = "Category deactivated successfully";
        } else {
            // Update failed
            $_SESSION['error'] = "Error deactivating category: " . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    }
}

if (isset($_REQUEST['active'])) {
    if (isset($_POST['categoryid'])) {
        $categoryid = $_POST['categoryid'];
        $update_query = "UPDATE tblcategory SET status = 1 WHERE id = ?";
        $stmt = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt, "i", $categoryid);
        $query_run = mysqli_stmt_execute($stmt);
        if ($query_run) {
            // Update was successful
            $_SESSION['success'] = "Category activated successfully";
        } else {
            // Update failed
            $_SESSION['error'] = "Error activating category: " . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>View Product</title>
        <style>
            .btn1 {
                float: right
            }

            .content-wrapper {
                margin-top: 6%;
                margin-left: 300px;
            }

            .form-group {
                background-image: url('IMG/bg.jpg'); /* Replace with the actual path to your image */
            }

            .deactivated {
                background-color: #f2f2f2; /* Light gray background */
            }

            /* Style for disabled buttons */
            .disabled-button {
                pointer-events: none; /* Disable button interactions */
                opacity: 0.6; /* Reduce opacity for disabled look */
            }
            .btn-primary{
                margin-left: 3%;
                margin-bottom: 12px;
            }
            .table-bordered{
                margin-left: 50px;
                margin-top: 80px;
                width: 120px;
            }
        </style>
    </head>
    <body>
       
        <form method="post" action="" name="viewCategory">
            <div class="content-wrapper">
                <section class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header mt-4">
                                        <h1>Products</h1>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered text-center" style="width:90%; margin: auto">
                                            <button class="btn btn-primary"><a href="product.php" style="color:white">Add</a></button>

                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category</th>
                                                    <th>Sub-Category</th>
                                                    <th>Name</th>
                                                    <th>Fabric</th>
                                                    <th>Price</th>
                                                    <th>Color</th>
                                                    <th>Size</th>
                                                    <th>Quantity</th>
                                                    <th>Image</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    <th>Active/De-Active</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM tblproduct";
                                                $query_run = mysqli_query($con, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $product) {
                                                        $category_name = $category['name'];
                                                        $categoryid = $category['id'];
                                                        $status = $category['status'];
                                                        echo "<form method='POST' action='' name='categoryForm'>";
                                                        echo "<tr";
                                                        if ($status == 0) {
                                                            echo " class='deactivated-row'";
                                                        }
                                                        echo ">";
                                                        echo "<td>{$categoryid}</td>";
                                                        echo "<td>{$category_name}</td>";
                                                        echo "<input type='hidden' name='category_name' value='$category_name'>";
                                                        echo "<input type='hidden' name='categoryid' value='$categoryid'>";
                                                        echo "<td><button class='btn btn-success";
                                                        if ($status == 0) {
                                                            echo " disabled disabled-button";
                                                        }
                                                        echo "' type='submit' name='update'>Update</button></td>";
                                                        echo "<td><button class='btn btn-danger";
                                                        if ($status == 0) {
                                                            echo " disabled disabled-button";
                                                        }
                                                        echo "' type='submit' name='delete'>Delete</button></td>";
                                                        echo "<td>";
                                                        if ($status == 1) {
                                                            echo "<button class='btn btn-success' type='submit' name='deActive'>Deactivate</button>";
                                                        } else {
                                                            echo "<button class='btn btn-primary' type='submit' name='active'>Activate</button>";
                                                        }
                                                        echo "</td>";
                                                        echo "</tr>";
                                                        echo "</form>";
                                                    }
                                                } else {
                                                    echo "<tr>";
                                                    echo "<td colspan='10'>No record found</td>";
                                                    echo "<td colspan='3'>No any Operation</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </form>
    </body>
</html>