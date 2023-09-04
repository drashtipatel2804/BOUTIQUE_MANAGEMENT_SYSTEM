<?php
    $con=mysqli_connect("localhost","root","","db_boutique" );
    if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
    
?>