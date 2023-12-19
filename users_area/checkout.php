<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./asset/style.css">
    <!-- <link rel="stylesheet" href="../asset/dangnhap.css"> -->


    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .card-img-top {
            width: 286px;
            height: 200px;

            .navbar-search input,
            .navbar-search button {
                font-size: 14px;
            }
        }

        .nav_logo {
            width: 5%;
            height: 5%;
        }
    </style>

</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">

            <div class="container-fluid">
                <img src="../asset/img/CMBG.png" alt="logo" class="nav_logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_registration.php">Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
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
                if (!isset($_SESSION['username'])) { //neu cái session chưa được active thì hiện button đăng nhập
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./user_login.php'>Đăng nhập</a>
                </li>";
                } else {  //nếu session đã active rồi thì show button đăng xuất
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='logout.php'>Đăng xuất</a>
                </li>";
                }

                ?>


            </ul>
        </nav>


        <!-- Third child -->

        <div class="bg-light">
            <h3 class="text-center">
                TRANG THANH TOÁN
                <!-- </h3 class="text-center"> -->
                <!-- <p class="text-center"> </p> -->
        </div>

        <!-- fourth child -->
        <div class="row px-1">
            <!-- sum up page bang 12 horizontal -->
            <div class="col-md-12">
                <!-- products -->
                <div class="row">
                    <?php
                    if (!isset($_SESSION['username'])) { //neu user chua dang nhap redirect qua form dang nhap
                        include('user_login.php');
                    } else {
                        include('payment.php'); //else redirect qua trang payment
                    
                    }
                    ?>
                </div>
                <!-- column end -->
            </div>


        </div>




        <!-- last child -->
        <!-- include footer -->
        <?php
        include("../includes/footer.php")
            ?>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>