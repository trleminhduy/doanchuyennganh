<!-- connect file -->
<?php
include('../ECOMMERCE/includes/connect.php');
include('./functions/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CỬA HÀNG NOSTALGIA</title>
    <link rel="stylesheet" href="./asset/style.css">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .card-img-top {
            width: 270px;
            height: 270px;
        }

        .button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .img-banner {
            width: 1500px;
            height: 360px;
        }
    </style>


    <script>
        $(document).ready(function () {
            // Add smooth scrolling to all links
            $("a").on('click', function (event) {
                if (this.hash !== "") {
                    event.preventDefault();

                    var hash = this.hash;

                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {
                        window.location.hash = hash;
                    });
                }
            });
        });
    </script>



</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">

            <div class="container-fluid">
                <img src="./asset/img/CMBG.png" alt="logo" class="nav_logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/user_registration.php">Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tổng giỏ hàng:
                                <?php total_cart_price() ?>
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                            name="search_data">

                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg bg-light">
            <ul class="navbar-nav me-auto">

                <?php
                if (!isset($_SESSION['username'])) { //neu cái session chưa được active thì hiện button đăng nhập
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Xin chào: Khách</a>
                </li>";
                } else {  //nếu session đã active rồi thì show button đăng xuất
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Xin chao: " . $_SESSION['username'] . " </a>
                </li>";
                }

                //login logout session
                if (!isset($_SESSION['username'])) { //neu cái session chưa được active thì hiện button đăng nhập
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Đăng nhập</a>
                </li>";
                } else {  //nếu session đã active rồi thì show button đăng xuất
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Đăng xuất</a>
                </li>";
                }

                ?>

            </ul>
        </nav>


        <!-- Third child -->

        <div class="bg-light">
            <img src="./asset/img/Branday_T12_1920x750.jpg" alt="" class="img-banner">

        </div>

        <!-- fourth child -->
        <div class="row px-1 mt-5">
            <!-- sum up page bang 12 horizontal -->
            <div class="col-md-10">
                <!-- products -->
                <div class="row">
                    <!-- fetching products -->
                    <?php
                    // goi ham
                    get_all_products();
                    get_unique_categories();
                    get_unique_brand();


                    ?>

                    <!-- row end -->
                </div>
                <!-- column end -->
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav -->
                <!-- danhmuc displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>DANH MỤC</h4>
                        </a>
                    </li>
                    <?php
                    getCat();

                    ?>



                </ul>

                <!-- brand displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>NHÀ XUẤT BẢN</h4>
                        </a>
                    </li>

                    <?php
                    getBrands();

                    ?>

                </ul>

            </div>

        </div>





        <!-- last child -->
        <!-- include footer -->
        <?php
        include("./includes/footer.php")
            ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

        </script>


</body>

</html>