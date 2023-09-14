<?php
include 'dbcon.php';
session_start();

if (isset($_REQUEST['update'])) {
    if ($_SESSION['category_name']) {
        header("Location: updateCategory.php");
    } else {
        header("Location: viewCategory.php");
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
        <title>View Category</title>
        <style>
            .btn1 {
                float: right
            }

            .content-wrapper {
                margin-top: 5%;
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
        </style>
    </head>
    <body>
        <?php
// Check for success or error messages
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
            unset($_SESSION['success']); // Clear the message
        } elseif (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']); // Clear the message
        }
        ?>

        <form method="post" action="" name="viewCategory">
            <div class="content-wrapper">
                <section class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header mt-4">
                                        <h1>Categories </h1>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered text-center" style="width:90%; margin: auto">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    <th>Active/De-Active</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM tblcategory";
                                                $query_run = mysqli_query($con, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $category) {
                                                        $_SESSION['category_name'] = $category['name'];
                                                        $categoryid = $category['id'];
                                                        $_SESSION['id']=$categoryid;
                                                        $status = $category['status'];
                                                        echo "<tr";
                                                        if ($status == 0) {
                                                            echo " class='deactivated-row'";
                                                        }
                                                        echo ">";
                                                        echo "<td>{$category['id']}</td>";
                                                        echo "<td>{$category['name']}</td>";
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
                                                            echo "<input type='hidden' name='categoryid' value='$categoryid'>";
                                                            echo "<button class='btn btn-success' type='submit' name='deActive'>Deactive</button>";
                                                        } else {
                                                            echo "<input type='hidden' name='categoryid' value='$categoryid'>";
                                                            echo "<button class='btn btn-primary' type='submit' name='active'>Active</button>";
                                                        }
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr>";
                                                    echo "<td colspan='2'>No record found</td>";
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
