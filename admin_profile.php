<?php
session_start();
require_once 'dbcon.php';
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
} else {
    $email = $_SESSION['email'];
}
$sql1 = "select * from tbluser where email='$email'";
// $sql1 = "select * from tbluser where email = 'patoliyadrashti111@gmail.com'";
$result1 = mysqli_query($con, $sql1);
$name = "";

if (mysqli_num_rows($result1) > 0) {
    $names = array();
    while ($row = mysqli_fetch_assoc($result1)) {
        // print_r($row);
        $fname = $row["fname"];
        $lname = $row["lname"];
        $email1 = $row["email"];
        $address = $row["address"];
        $cityid = $row["cityid"];
        $contact = $row["contactno"];
        $pincode = $row["pincode"];
        $name = $fname . " " . $lname;
        $names[] = $name;
    }
}
$countryQuery = "SELECT id, name FROM tblcountry";
$countryResult = mysqli_query($con, $countryQuery);

// Fetch the list of states and cities
$stateQuery = "SELECT id, name, countryid FROM tblstate";
$stateResult = mysqli_query($con, $stateQuery);

$cityQuery = "SELECT id, name, stateid FROM tblcity";
$cityResult = mysqli_query($con, $cityQuery);

// Create associative arrays to store state and city data
$states = array();
$cities = array();

while ($row = mysqli_fetch_assoc($stateResult)) {
    $states[$row['countryid']][] = $row;
}

while ($row = mysqli_fetch_assoc($cityResult)) {
    $cities[$row['stateid']][] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="IMG/FashionHub.jpg" rel="icon">
    <link href="IMG/FashionHub.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!--ICON LINK -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="IMG/FashionHub.jpg" alt="logo">
                <span class="d-none d-lg-block">Fashion Hub</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="IMG/FashionHub.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php
                            if (count($names) > 0) {
                                foreach ($names as $name) {
                                    echo $name . "<br>";
                                }
                            }
                            ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php
                                if (count($names) > 0) {
                                    foreach ($names as $name) {
                                        echo $name . "<br>";
                                    }
                                }
                                ?></h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="ChangePassword.php">
                                <i class="fa-solid fa-key"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="forgot.php">
                                <i class="fa-solid fa-key"></i>
                                <span>Forgot Password</span>
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="signout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="IMG/FashionHub.jpg" alt="Profile" class="rounded-circle">
                            <h2><?php
                                if (count($names) > 0) {
                                    foreach ($names as $name) {
                                        echo $name . "<br>";
                                    }
                                }
                                ?></h2>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                                        View Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                                        <a href="ChangePassword.php">Change Password</a></button>
                                </li>
                            </ul>

                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Profile Details</h5>
                                    <?php
                                    $sql = "SELECT *from tbluser where email='$email'";

                                    $result = mysqli_query($con, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<div class='user-info'>";
                                            echo "<p><strong>First Name:</strong> " . $row["fname"] . "</p>";
                                            echo "<p><strong>Last Name:</strong> " . $row["lname"] . "</p>";
                                            echo "<p><strong>Address:</strong> " . $row["address"] . "</p>";
                                            echo "<p><strong>Contact No:</strong> " . $row["contactno"] . "</p>";
                                            echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
                                            $cityid = $row["cityid"];
                                            $cityshow = "select name from tblcity where id='$cityid'";
                                            $result_cityshow = mysqli_query($con, $cityshow);
                                            if (mysqli_num_rows($result_cityshow) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($result_cityshow)) {
                                                    echo "<p><strong>City:</strong> " . $row1["name"] . "</p>";
                                                }

                                                echo "</div>";
                                            }
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                            <form method="post" action="" name="editProfile" onsubmit="return validateForm()">
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->

                                    <div class="row mb-3">
                                        <label for="firstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="firstName" type="text" class="form-control" id="firstName" value="<?php echo $fname; ?>">
                                            <div class="error-message" id="firstNameError"></div>
                                        </div>

                                    </div>

                                    <div class="row mb-3">
                                        <label for="lastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="lastName" type="text" class="form-control" id="lastName" value="<?php echo $lname; ?>">
                                            <div class="error-message" id="lastNameError"></div>

                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="address" type="text" class="form-control" id="Address" value="<?php echo $address; ?>">
                                            <div class="error-message" id="addressError"></div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select id="country" name="country">
                                                <option value="">Select Country</option>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($countryResult)) {
                                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="error-message" id="countryError"></div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="state" class="col-md-4 col-lg-3 col-form-label">State</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select id="state" name="state">
                                                <option value="">Select State</option>

                                            </select>
                                            <div class="error-message" id="stateError"></div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="city" class="col-md-4 col-lg-3 col-form-label">City</label>
                                        <div class="col-md-8 col-lg-9">
                                            <select id="city" name="city">

                                                <option value="">Select City</option>

                                            </select>
                                            <div class="error-message" id="cityError"></div>
                                            <input type="hidden" id="selectedCityId" name="selectedCityId" value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="pincode" class="col-md-4 col-lg-3 col-form-label">PinCode</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="pincode" type="text" class="form-control" id="pincode" value="<?php echo $pincode; ?>">
                                            <div class="error-message" id="pincodeError"></div>

                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="tel" class="form-control" id="Phone" value="<?php echo $contact ?>">
                                            <div class="error-message" id="phoneError"></div>
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                                    </div>

                            </form><!-- End Profile Edit Form -->
                            <?php
                            $selectedCityId = NULL;
                            if (isset($_POST['submit'])) {
                                $fname = $_POST['firstName'];
                                $lname = $_POST['lastName'];
                                $add = $_POST['address'];
                                $pincode = $_POST['pincode'];
                                $phone = $_POST['phone'];
                                $selectedCityId = $_POST['selectedCityId'];

                                $sql2 = "UPDATE tbluser SET fname = '$fname' , lname = '$lname' ";
                                if (empty($cityid)) {
                                    if (!empty($selectedCityId)) {
                                        $sql2 .= ",cityid= $selectedCityId";
                                    } else {
                                        $sql2 .= ",cityid= NULL ";
                                    }
                                } else {
                                    $sql2 .= ",cityid= $cityid";
                                }

                                if (!empty($add)) {
                                    $sql2 .= ",address = '$add'";
                                } else {
                                    $sql2 .= ",address = NULL";
                                }

                                if (!empty($pincode)) {
                                    $sql2 .= ",pincode= $pincode";
                                } else {
                                    $sql2 .= ",pincode= NULL";
                                }

                                if (!empty($phone)) {
                                    $sql2 .= ",contactno= $phone";
                                } else {
                                    $sql2 .= ",contactno= NULL";
                                }
                                $sql2 .= " WHERE email = '$email' ";

                                // echo $sql2;
                                $result = mysqli_query($con, $sql2);

                                // if ($result) {
                                //     echo "<script>alert('update')</script>";
                                // }
                                echo "<meta http-equiv='refresh' content='0'>";
                            }
                            ?>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const countrySelect = document.getElementById('country');
                                    const stateSelect = document.getElementById('state');
                                    const citySelect = document.getElementById('city');

                                    countrySelect.addEventListener('change', function() {
                                        // Filter states based on the selected country and populate the state dropdown
                                        const selectedCountryId = this.value;
                                        populateStates(selectedCountryId);
                                    });

                                    stateSelect.addEventListener('change', function() {
                                        // Filter cities based on the selected state and populate the city dropdown
                                        const selectedStateId = this.value;
                                        populateCities(selectedStateId);
                                    });
                                    citySelect.addEventListener('change', function() {
                                        // Get the selected city ID from the value of the selected option
                                        const selectedCityId = this.value;

                                        // Update the hidden input field with the selected city ID
                                        document.getElementById('selectedCityId').value = selectedCityId;
                                    });


                                    function populateStates(countryId) {
                                        // Clear the state dropdown
                                        stateSelect.innerHTML = '<option value="">Select State</option>';

                                        // Populate the state dropdown based on the selected country
                                        if (countryId !== '') {
                                            const statesForCountry = <?php echo json_encode($states); ?>;
                                            const countryStates = statesForCountry[countryId];
                                            if (countryStates) {
                                                countryStates.forEach(function(state) {
                                                    stateSelect.innerHTML += '<option value="' + state['id'] + '">' + state['name'] + '</option>';
                                                });
                                            }
                                        }
                                    }

                                    function populateCities(stateId) {
                                        // Clear the city dropdown
                                        citySelect.innerHTML = '<option value="">Select City</option>';

                                        // Populate the city dropdown based on the selected state
                                        if (stateId !== '') {
                                            const citiesForState = <?php echo json_encode($cities); ?>;
                                            const stateCities = citiesForState[stateId];
                                            if (stateCities) {
                                                stateCities.forEach(function(city) {
                                                    citySelect.innerHTML += '<option value="' + city['id'] + '">' + city['name'] + '</option>';
                                                });
                                            }
                                        }
                                    }
                                });
                            </script>

                            <script>
                                function validateForm() {
                                    var firstName = document.getElementById("firstName").value;
                                    var lastName = document.getElementById("lastName").value;
                                    var address = document.getElementById("Address").value;
                                    var country = document.getElementById("country").value;
                                    var state = document.getElementById("state").value;
                                    var city = document.getElementById("city").value;
                                    var pincode = document.getElementById("pincode").value;
                                    var gender = document.querySelector('input[name="gender"]:checked');
                                    var phone = document.getElementById("Phone").value;
                                    //var email = document.getElementById("Email").value;

                                    // Validation for First Name
                                    var firstNameError = document.getElementById("firstNameError");
                                    firstNameError.textContent = "";

                                    if (firstName.trim() === "") {
                                        firstNameError.textContent = "First Name is required.";
                                        return false;
                                    }
                                    if (/\d/.test(firstName)) {
                                        firstNameError.textContent = "First name cannot contain digits.";
                                        return false;
                                    }
                                    // Validation for Last Name
                                    var lastNameError = document.getElementById("lastNameError");
                                    lastNameError.textContent = "";
                                    if (lastName.trim() === "") {
                                        lastNameError.textContent = "Last Name is required.";
                                        return false;
                                    }
                                    if (/\d/.test(lastName)) {
                                        lastNameError.textContent = "Last name cannot contain digits.";
                                        return false;
                                    }



                                    // Validation for Pincode
                                    var pincodeError = document.getElementById("pincodeError");
                                    pincodeError.textContent = "";

                                    if (pincode !== "" && !/^\d{6}$/.test(pincode)) {
                                        pincodeError.textContent = "PIN code must be a 6-digit number.";
                                        return false;
                                    }

                                    var phoneError = document.getElementById("phoneError");
                                    phoneError.textContent = "";

                                    if (phone !== "" && !/^\d{10}$/.test(phone)) {
                                        phoneError.textContent = "Phone number must be a 10-digit number.";
                                        return false;
                                    }



                                    return true;
                                }
                            </script>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script src="js/common.js"></script>


                        </div>
                    </div>
                </div><!-- End Bordered Tabs -->
            </div>
            </div>
        </section>

    </main><!-- End #main -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


</body>

</html>