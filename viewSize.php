<?php
include 'dbcon.php';
require_once 'index.php';


if (isset($_REQUEST['update'])) {
    if (isset($_REQUEST['size_name'])) {
        $_SESSION['size_name'] = $_POST['size_name'];
        $_SESSION['id'] = $_POST['sizeid'];
        //header("Location: updateSize.php");
        echo '<script>window.location.href = "updateSize.php";</script>';
    } else {
        echo '<script>window.location.href = "viewSize.php";</script>';
    }
}

if (isset($_REQUEST['delete'])) {
    if (isset($_POST['sizeid'])) {
        $sizeid = $_POST['sizeid'];
        $query_delete = "DELETE FROM tblsize WHERE id = '$sizeid'";
        $query_run_delete = mysqli_query($con, $query_delete);

        if ($query_run_delete) {
            // Deletion was successful, you can set a success message if needed
            $_SESSION['success'] = "Size deleted successfully";
        } else {
            // Deletion failed, you can set an error message if needed
            $_SESSION['error'] = "Error deleting size: " . mysqli_error($con);
        }
    }
}

if (isset($_REQUEST['deActive'])) {
    if (isset($_POST['sizeid'])) {
        $sizeid = $_POST['sizeid'];
        $update_query = "UPDATE tblsize SET status = 0 WHERE id = ?";
        $stmt = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt, "i", $sizeid);
        $query_run = mysqli_stmt_execute($stmt);
        if ($query_run) {
            // Update was successful
            $_SESSION['success'] = "Size deactivated successfully";
        } else {
            // Update failed
            $_SESSION['error'] = "Error deactivating size: " . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
    }
}

if (isset($_REQUEST['active'])) {
    if (isset($_POST['sizeid'])) {
        $sizeid = $_POST['sizeid'];
        $update_query = "UPDATE tblsize SET status = 1 WHERE id = ?";
        $stmt = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt, "i", $sizeid);
        $query_run = mysqli_stmt_execute($stmt);
        if ($query_run) {
            // Update was successful
            $_SESSION['success'] = "Size activated successfully";
        } else {
            // Update failed
            $_SESSION['error'] = "Error activating size: " . mysqli_error($con);
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
        <title>View Size</title>
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
        <?php
// Check for success or error messages
//        if (isset($_SESSION['success'])) {
//            echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
//            unset($_SESSION['success']); // Clear the message
//        } elseif (isset($_SESSION['error'])) {
//            echo "<div class='alert alert-danger'>{$_SESSION['error']}</div>";
//            unset($_SESSION['error']); // Clear the message
//        }
        ?>

        <form method="post" action="" name="viewSize">
            <div class="content-wrapper">
                <section class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header mt-4">
                                        <h1>Size </h1>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered text-center" style="width:90%; margin: auto">
                                            <button class="btn btn-primary"><a href="size.php" style="color:white">Add</a></button>

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
                                                $query = "SELECT * FROM tblsize";
                                                $query_run = mysqli_query($con, $query);

                                                if (mysqli_num_rows($query_run) > 0) {
                                                    foreach ($query_run as $size) {
                                                        $size_name = $size['name'];
                                                        $sizeid = $size['id'];
                                                        $status = $size['status'];
                                                        echo "<form method='POST' action='' name='sizeForm'>";
                                                        echo "<tr";
                                                        if ($status == 0) {
                                                            echo " class='deactivated-row'";
                                                        }
                                                        echo ">";
                                                        echo "<td>{$sizeid}</td>";
                                                        echo "<td>{$size_name}</td>";
                                                        echo "<input type='hidden' name='size_name' value='$size_name'>";
                                                        echo "<input type='hidden' name='sizeid' value='$sizeid'>";
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
