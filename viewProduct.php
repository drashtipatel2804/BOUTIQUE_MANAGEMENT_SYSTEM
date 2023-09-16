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
        <title>View Product</title>
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
        <?php include 'dbcon.php';?>
        <form method="post" action="" name="viewFabric">
        <div class="content-wrapper ">
            <section class="content ">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header mt-4">
                                    <h1>Product</h1>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered text-center" style="width:90%; margin: auto" >
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Color</th>
                                                <th>Size</th>
                                                <th>Fabric</th>
                                                <th>Price</th>
                                                <th>Image 1</th>
                                                <th>Image 2</th>
                                                 <th>Edit</th>
                                                <th>Delete</th>
                                                <th>Active/De-Active</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM tblproduct";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach ($query_run as $product)
                                                {
                                            ?>
                                                <tr>
                                                <td><?= $product['id']; ?></td>
                                                <td><?=  $product['name']; ?></td>
                                                <td><?=  $product['Categoryid']; ?></td>
                                                <td><?=  $product['Colorid']; ?></td>
                                                <td><?=  $product['Sizeid']; ?></td>
                                                <td><?=  $product['Fabricid']; ?></td>
                                                <td><?=  $product['price']; ?></td>
                                                <td><?=  $product['ImgPath1']; ?></td>
                                                <td><?=  $product['ImgPath2']; ?></td>
                                                <td><button class="btn btn-success" type="submit" name="update"><a href="updateProduct.php" style="color:white">Update</a></button></td>
                                                <td><button class="btn btn-danger" type="submit" name="delete"><a href="" style="color:white">Delete</a></button></td>
                                                <td><button class="btn btn-success" type="submit" name="deActive">De-Active</a></button></td>
                                                </tr>   
                                            <?php
                                                }
                                            }
                                            else{
                                              ?>
                                                <tr>
                                                    <td colspan="9">No record found</td>
                                                    <td colspan="3">No any Operation</td>
                                                </tr>
                                                <?php
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