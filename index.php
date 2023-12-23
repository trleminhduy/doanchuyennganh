<!-- connect file -->
<?php
include('./includes/connect.php');
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
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- bootstrap javascript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">

        </script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>




    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .card-img-top {
            width: 270px;
            height: 270px;

        }

        .img-banner {
            width: 100%;
            height: 543px;
        }

        #topbTN {

            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 5px;
            border-radius: 4px;
        }

        #topbTN:hover {
            background-color: #555;
        }

        .card {
            display: flex;
            flex-direction: column;
            align-items: stretch;
            height: 100%;
        }
        
    </style>
    <!-- Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-eOJMYsd53ii+dfh6GLmZJIoU8HfAX5t9y7duGqkiWSq5I3n+oRtq4ByfG5trF5J"
        crossorigin="anonymous"></script>


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
                            <a class="nav-link active" aria-current="page" href="./index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Sản phẩm</a>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "  <li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>Trang cá nhân</a>
                        </li>";
                        } else {
                            echo "  <li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Đăng ký</a>
                        </li>";
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Liên hệ</a>
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
                        <input class="form-control me-2" type="search" placeholder="Nhập tên sản phẩm"
                            aria-label="Search" name="search_data">

                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- call cart function -->
        <?php
        cart();
        ?>
        <button onclick="topFunction()" id="topbTN" title="Go to top">TOP</button>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg bg-light">
            <ul class="navbar-nav me-auto">
                <!-- show username session -->
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
            <img src="./asset/img/YearEndSaleT1223_MainBanner_1920x700.png" alt="" class="img-banner">
            <img src="./asset/img/Branday_T12_1920x750.jpg" alt="" class="img-banner">
            <img src="./asset/img/banner3.png" alt="" class="img-banner">
            <img src="./asset/img/banner4.png" alt="" class="img-banner">

            <script>
                w3.slideshow(".img-banner", 1750);
            </script>

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
                    getProducts();
                    get_unique_categories();
                    get_unique_brand();

                    // $ip = getIPAddress();
                    // echo 'User Real IP Address - ' . $ip;
                    

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
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="./asset/script.js"></script>






</body>

</html>