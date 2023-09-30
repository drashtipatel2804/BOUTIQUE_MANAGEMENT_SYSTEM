<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country, State, and City</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form id="form1">
            <div class="form-group">
                <label for="country">Country:</label>
                <select class="form-control" id="country">
                    <option>Select country</option>
                    <?php
                    include_once 'dbcon.php';
                    $q = "SELECT * FROM tblcountry";
                    $result = mysqli_query($con, $q);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <select class="form-control" id="state">
                    <option>Select state</option>
                </select>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select class="form-control" id="city">
                    <option>Select city</option>
                </select>
            </div>
        </form>
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#country').change(function () {
                var countryId = $(this).val();
                $.ajax({
                    url: 'state.php',
                    type: 'POST',
                    data: { countryId: countryId },
                    success: function (response) {
                        $('#state').html(response);
                    }
                });
            });

            $('#state').change(function () {
                var stateId = $(this).val();
                $.ajax({
                    url: 'city.php',
                    type: 'POST',
                    data: { stateId: stateId },
                    success: function (response) {
                        $('#city').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
