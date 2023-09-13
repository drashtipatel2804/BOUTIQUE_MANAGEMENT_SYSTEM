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

    $query = "SELECT * FROM tblcategory";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $category) {

            $categoryid = $category['id'];
        }
    }
        $query_delete = "DELETE FROM tblcategory WHERE id = '$categoryid'";
        $query_run_delete = mysqli_query($con, $query_delete);

        if ($query_run_delete) {
            // Deletion was successful, you can set a success message if needed
            $_SESSION['success']= "Category deleted successfully";
        } else {
            // Deletion failed, you can set an error message if needed
            $_SESSION['error'] = "Error deleting category" . mysqli_error($con);;
        }
    
}


?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>View Category</title>
        <style>
            .btn1{
                float: right
            }

            .content-wrapper {
                margin-top: 5%;
            }
            .form-group{
                background-image: url('IMG/bg.jpg'); /* Replace with the actual path to your image */
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
            <div class="content-wrapper ">
                <section class="content ">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header mt-4">
                                        <h1>Categories </h1>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered text-center" style="width:90%; margin: auto" >
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
                                                        if($category['status']==1)
                                                        {
                                                            echo "<tr>";
                                                            echo "<td>{$category['id']}</td>";
                                                            echo "<td>{$category['name']}</td>";
                                                            echo "<td><button class='btn btn-success' type='submit' name='update'>Update</a></button></td>";
                                                            echo "<td><button class='btn btn-danger' type='submit' name='delete'>Delete</a></button></td>";
                                                            echo "<td><button class='btn btn-success' type='submit' name='deActive'>De-Active</button></td>";
                                                            echo "</tr>";
                                                        }
                                                        
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