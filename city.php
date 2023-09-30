<?php
include_once 'dbcon.php';

if (isset($_POST['stateId'])) {
    $stateId = $_POST['stateId'];
    $q = "SELECT * FROM tblcity WHERE stateid='$stateId'";
    $result = mysqli_query($con, $q);

    if ($result) {
        echo '<option value="">Select city</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    } else {
        echo '<option>No cities found</option>';
    }
} else {
    echo '<option>Error: No data received</option>';
}
?>
