<?php

include_once 'dbcon.php';

if (isset($_POST['categoryId'])) {
    $categoryId = $_POST['categoryId'];
    $q = "SELECT categoryid FROM tblcategoryentry WHERE typeid='$categoryId'";
    $result = mysqli_query($con, $q);
    
    if ($result) {
        echo '<option value="0">Select SubCategory</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            $typeid = $row['categoryid'];
            $q1 = "SELECT * FROM tblcategory WHERE id='$typeid' AND status='1'";
            $result1 = mysqli_query($con, $q1);
            
            while ($subRow = mysqli_fetch_assoc($result1)) {
                echo '<option value="' . $subRow['id'] . '">' . $subRow['name'] . '</option>';
            }
        }
    } else {
        echo '<option>No subcategories found</option>';
    }
} else {
    echo '<option>Error: No data received</option>';
}
?>

