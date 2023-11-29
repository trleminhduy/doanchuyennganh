<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome
        <?php echo $_SESSION['username'] ?>
    </title>
    <link rel="stylesheet" href="../asset/style.css">

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
            margin: auto;
            height: 200px;
            object-fit: contain;

        }
    </style>

</head>
<style>
    .img-user {
        width: 100px;
        height: 100px;
    }
</style>

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
                            <a class="nav-link" href="../display_all.php">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                    <?php cart_item(); ?>
                                </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tổng giỏ hàng:
                                <?php total_cart_price() ?>
                            </a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search"
                            name="search_data">

                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- call cart function -->
        <?php
        cart();
        ?>


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
                    <a class='nav-link' href='user_login.php'>Đăng nhập</a>
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
                CỬA HÀNG NOSTALGIA
            </h3 class="text-center">
            <p class="text-center"> ĐẶT SỰ TRẢI NGHIỆM CỦA BẠN LÊN HÀNG ĐẦU</p>
        </div>

        <!-- fourth child -->
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center ">
                    <li class="nav-item bg-info text-light">
                        <a class="nav-link" href="#">
                            <h4>Hồ sơ cá nhân</h4>
                        </a>
                    </li>
                    <!-- fetch hinh anh cua nguoi dung vao  -->
                    <?php
                    $username = $_SESSION['username'];
                    $user_image = "Select * from `user_table` where username='$username'";
                    $user_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($user_image);
                    $user_image = $row_image['user_image'];
                    echo " <li class='nav-item'>
                        <img class='img-user my-4' src='./user_images/$user_image' alt=''>
                    </li>";

                    ?>

                    <li class="nav-item  text-light">
                        <a class="nav-link" href="profile.php">
                            Đơn hàng đang chờ
                        </a>
                    </li>
                    <li class="nav-item text-light">
                        <a class="nav-link" href="profile.php?edit_account">
                            Chỉnh sửa tài khoản
                        </a>
                    </li>
                    <li class="nav-item  text-light">
                        <a class="nav-link" href="profile.php?my_orders">
                            Đơn hàng chi tiết
                        </a>
                    </li>
                    <li class="nav-item  text-light">
                        <a class="nav-link" href="profile.php?delete_account">
                            Xoá tài khoản
                        </a>
                    </li>
                    <li class="nav-item  text-light">
                        <a class="nav-link" href="logout.php">
                            Đăng xuất
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php
                get_user_order_details()
                    ?>
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