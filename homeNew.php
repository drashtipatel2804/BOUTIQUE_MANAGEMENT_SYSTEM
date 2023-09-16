
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Online Boutique Management System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Include Bootstrap JS and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Slick Carousel CSS -->

        <style>
            .slider-container {
                position: fixed;
                background: linear-gradient(45deg, #2196f3, #e91e63);
                ;
                color: white;
                overflow: hidden;
                height: 45px;
                margin: 0;
                z-index: 1000;
                left: 0;
                width: 100%;
            }
            .slider {
                display: flex;
                animation: rotate 30s linear infinite;
            }

            .slide {
                padding: 10px 20px;
                font-size: 18px;
                white-space: nowrap;
                margin-right: 10px;
            }
            .slider .slide:first-child {
                margin-left: 10px;
            }
            .slider .slide:last-child {
                margin-right: 0;
            }
            @keyframes rotate {
                0%, 100% {
                    transform: translateX(100%);
                }
                50% {
                    transform: translateX(-100%);
                }
            }
            h1{
                text-align: center;
            }

        </style>
    </head>
    <body>
        <div class="slider-container">
            <div class="slider">
                <div class="slide">Fast checkout</div>
                <div class="slide">Free delivery</div>
                <div class="slide">Secure Payment</div>
            </div>
        </div>
        <br>

        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="d-flex align-items-center">
                    <img src="IMG/FashionHub.jpg" alt="Logo" style="width: 50px; height: auto; margin-left: 20px">
                    <h3 class="m-0 ml-2 display-5 font-weight-semi-bold">Fashion Hub</h3>
                </div>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="" method="post" class="d-flex align-items-center"> <!-- Added class for flex alignment -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search" style="color:lightcoral"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid mb-5">
            <div class="row border-top px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                        <h6 class="m-0">Categories</h6>
                        <i class="fa fa-angle-down text-dark"></i>
                    </a>
                    <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                    <a href="" class="dropdown-item">Men's Dresses</a>
                                    <a href="" class="dropdown-item">Women's Dresses</a>
                                    <a href="" class="dropdown-item">Baby's Dresses</a>
                                </div>
                            </div>
                            <a href="" class="nav-item nav-link">Shirts</a>
                            <a href="" class="nav-item nav-link">Jeans</a>
                            <a href="" class="nav-item nav-link">Swimwear</a>
                            <a href="" class="nav-item nav-link">Sleepwear</a>
                            <a href="" class="nav-item nav-link">Sportswear</a>
                            <a href="" class="nav-item nav-link">Jumpsuits</a>
                            <a href="" class="nav-item nav-link">Blazers</a>
                            <a href="" class="nav-item nav-link">Jackets</a>
                            <a href="" class="nav-item nav-link">Shoes</a>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="" class="text-decoration-none d-block d-lg-none"></a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="homeNew.php" class="nav-item nav-link active">Home</a>
                                <a href="shop.html" class="nav-item nav-link">Men</a>
                                <a href="detail.html" class="nav-item nav-link">Women</a>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kids</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="cart.html" class="dropdown-item">Boys</a>
                                        <a href="checkout.html" class="dropdown-item">Girls</a>
                                    </div>
                                </div>
                                <a href="" class="nav-item nav-link">Contact Us</a>
                                <a href="location.html" class="nav-item nav-link">Location</a>
                                </div>
                            <div class="navbar-nav ml-auto py-0">
                                <a href="login.php" class="nav-item nav-link">Login</a>
                                <a href="Registration.php" class="nav-item nav-link">Register</a>
                                
                                
                            </div>
                        </div>
                    </nav>

                    <h1 class="heading">What's Your <em>Vibe?</em></h1>
                    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item" style="height: 410px;">
                                <img class="img-fluid" src="IMG/c2.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;"></div>
                                </div>
                            </div>
                            <div class="carousel-item active" style="height: 410px;">
                                <img class="img-fluid" src="IMG/c1.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;"></div>
                                </div>
                            </div>
                            <div class="carousel-item" style="height: 410px;">
                                <img class="img-fluid" src="IMG/c3.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <div class="p-3" style="max-width: 700px;"></div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-prev-icon mb-n2"></span>
                            </div>
                        </a>
                        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                                <span class="carousel-control-next-icon mb-n2"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="heading">Trendy <em>Products</em></h1>
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <a href="" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="img/cat-1.jpg" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">Men's dresses</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <a href="" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="img/cat-2.jpg" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">Women's dresses</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <a href="" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="img/cat-3.jpg" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">Baby's dresses</h5>
                    </div>
                </div>     
            </div>
        </div>

        <h1 class="heading">What's Your <em>Vibe?</em></h1>
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <a href="" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="img/cat-4.jpg" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">Look Elegent</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <a href="" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="img/cat-5.jpg" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">Look Divine</h5>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                        <a href="" class="cat-img position-relative overflow-hidden mb-3">
                            <img class="img-fluid" src="img/cat-6.jpg" alt="">
                        </a>
                        <h5 class="font-weight-semi-bold m-0">Look Adorable</h5>
                    </div>
                </div>     
            </div>
        </div>

        <footer class="bg-dark text-center text-white">
            <div class="container p-4">
                <section class="mb-4">
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                        <i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                        <i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                        <i class="fab fa-google"></i></a>
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                        <i class="fab fa-instagram"></i></a>
                </section>
                <section class="mb-4">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                        repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                        eum harum corrupti dicta, aliquam sequi voluptate quas.
                    </p>
                </section>
                <section class="">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase">CATEGORIES</h5>
                            <ul class="list-unstyled mb-0">
                                <li>Kurta Pajama</li>
                                <li>Kurta Jacket Sets</li>
                                <li>Only Kurtas</li>
                                <li>Nehru Jackets</li>
                                <li>Indo Western</li>
                                <li>Sherwani</li>
                                <li>Saree</li>
                                <li>Kidswear</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase">Quick Links</h5>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#!" class="text-white">About us</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase">SUPPORT</h5>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#!" class="text-white">My Account</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Home Delivery</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                            <h5 class="text-uppercase">OUR POLICIES</h5>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#!" class="text-white">FAQs</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Shiping Details</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Terms of Use</a>
                                </li>
                                <li>
                                    <a href="#!" class="text-white">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
        </footer>
        <!-- Footer -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var dropdownButton = document.getElementById("userDropdown");
                var dropdownMenu = document.querySelector(".custom-dropdown-menu");

                dropdownButton.addEventListener("click", function () {
                    dropdownMenu.classList.toggle("show");
                });
            });
        </script>


    </body>
</html>
