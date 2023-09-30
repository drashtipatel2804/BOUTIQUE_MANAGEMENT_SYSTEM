<?php
include_once 'dbcon.php';

if (isset($_POST['countryId'])) {
    $countryId = $_POST['countryId'];
    $q = "SELECT * FROM tblstate WHERE countryid='$countryId'";
    $result = mysqli_query($con, $q);

    if ($result) {
        echo '<option value="">Select state</option>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    } else {
        echo '<option>No states found</option>';
    }
} else {
    echo '<option>Error: No data received</option>';
}
?>
