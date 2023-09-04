<?php
session_start();
require_once 'dbcon.php';
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
} else {
    $email = $_SESSION['email'];
    $sql1 = "SELECT fname, lname FROM tbluser WHERE email='$email'";
    $result1 = mysqli_query($con, $sql1);
    $name = "";

    if (mysqli_num_rows($result1) > 0) {
        $names = array();
        while ($row = mysqli_fetch_assoc($result1)) {

            $fname = $row["fname"];
            $lname = $row["lname"];

            $name = $fname . " " . $lname;
            $names[] = $name;
        }
    }
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
        <link href="assets/img/FashionHub.jpg" rel="icon">
        <link href="assets/img/FashionHub.jpg" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!--ICON LINK -->

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet">


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- =======================================================
        * Template Name: NiceAdmin
        * Updated: Jul 27 2023 with Bootstrap v5.3.1
        * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->


        <style>
            .btn-custom {
                background-color: transparent;
                border: 1px solid #000;
                color: #000;
                border-radius: 4px;
                padding: 5px 30px;
                cursor: pointer;
                width: 120px;
                margin-left: 50px;
            }

            .btn-custom:hover {
                background-color: #f0f0f0;
                border-color: #f0f0f0; /* Highlighting the border color on hover */
            }


        </style>
    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="assets/img/FashionHub.jpg" alt="Boutique Logo">
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
                            <span class="d-none d-md-block dropdown-toggle ps-2"><?php
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
                                <a class="dropdown-item d-flex align-items-center" href="admin_profile.php">
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

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link " href="index.html">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li><!-- End Dashboard Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-person-fill-add"></i>
                        <span>Delivery Person</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="DRegistration.php">
                                <i class="bi bi-circle"></i><span>Add Delivery Person</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Vendors</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="#">
                                <i class="bi bi-circle"></i><span>Add Order Details</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-circle"></i><span>Delivery Received</span>
                            </a>
                        </li>   
                    </ul>
                </li>

                <!--Category-->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter" onclick="window.location.href='category.php'">
                                Add
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter1">
                                <span>View</span>
                            </button>
                        </li>
                        <li>
                    </ul>
                </li>
                <!-- End Category-->

                <!--color-->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Color</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter3" onclick="window.location.href='color.php'">
                                <span>Add</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter4">
                                <span>View</span>
                            </button>
                        </li>
                    </ul>
                </li>
                <!-- End color-->

                <!--size-->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Size</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter6"  onclick="window.location.href='size.php'">
                                <span>Add</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter7">
                                <span>View</span>
                            </button>
                        </li>
                    </ul>
                </li>
                <!-- End size-->

                <!--fabric-->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#fabric-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Fabric</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="fabric-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter8" onclick="window.location.href='fabric.php'">
                                <span>Add</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter9">
                                <span>View</span>
                            </button>
                        </li>
                        <li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter8" onclick="window.location.href='product.php'">
                                <span>Add</span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-custom" data-toggle="modal" data-target="#exampleModalCenter9">
                                <span>View</span>
                            </button>
                        </li>
                        <li>
                    </ul>
                </li>
                <!--end fabric-->


        </aside><!-- End Sidebar-->

        <main id="main" class="main">

            <div class="pagetitle">
                <h1>Dashboard</h1>
            </div><!-- End Page Title -->

            <section class="section dashboard">
                <div class="row">

                    <!-- Left side columns -->
                    <div class="col-lg-8">
                        <div class="row">

                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Sales <span>| Today</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-cart"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>145</h6>
                                                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Revenue Card -->
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card revenue-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-currency-dollar"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>$3,264</h6>
                                                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Revenue Card -->

                            <!-- Customers Card -->
                            <div class="col-xxl-4 col-xl-12">

                                <div class="card info-card customers-card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">Customers <span>| This Year</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-people"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6>1244</h6>
                                                <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div><!-- End Customers Card -->

                            <!-- Reports -->
                            <div class="col-12">
                                <div class="card">

                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </section>

                            </main><!-- End #main -->

                            <!-- ======= Footer ======= -->

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
                            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                            <script src="assets/js/main.js"></script>
                            </body>
                            </html>