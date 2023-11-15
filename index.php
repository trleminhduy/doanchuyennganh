<!-- connect file -->
<?php
include('../ECOMMERCE/includes/connect.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CỬA HÀNG NOSTALGIA</title>
    <link rel="stylesheet" href="./asset/style.css">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">

            <div class="container-fluid">
                <img src="./asset/img/CMBG.png" alt="logo" class="nav_logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Đăng ký</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tổng giỏ hàng: 100/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg bg-light">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link " href="#">Xin chào: Khách</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Đăng nhập</a>
                </li>

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
            <!-- sum up page bang 12 horizontal -->
            <div class="col-md-10 ">
                <!-- products -->
                <div class="row">
                    <div class="col-md-4 mb-2 ">
                        <div class="card" style="width: 18rem;">
                            <img src="./asset/img/book1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Vũ trụ bên trong</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
                                <a href="#" class="btn btn-info mt-2 bg-light">Xem thêm</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2 ">
                        <div class="card" style="width: 18rem;">
                            <img src="./asset/img/book3.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
                                <a href="#" class="btn btn-info mt-2 bg-light">Xem thêm</a>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2 ">
                        <div class="card" style="width: 18rem;">
                            <img src="./asset/img/book2.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">68.300đ.</p>
                                <a href="#" class="btn btn-info">Thêm vào giỏ hàng </a>
                                <a href="#" class="btn btn-info mt-2 bg-light">Xem thêm</a>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2 ">
                        <div class="card" style="width: 18rem;">
                            <img src="./asset/img/book5.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Không diệt xin đừng sợ hãi</h5>
                                <p class="card-text">68.300đ.</p>
                                <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
                                <a href="#" class="btn btn-info mt-2 bg-light">Xem thêm</a>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2 ">
                        <div class="card" style="width: 18rem;">
                            <img src="./asset/img/book4.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
                                <a href="#" class="btn btn-info mt-2 bg-light">Xem thêm</a>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-2 ">
                        <div class="card" style="width: 18rem;">
                            <img src="./asset/img/book6.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Thêm vào giỏ hàng</a>
                                <a href="#" class="btn btn-info mt-2 bg-light">Xem thêm</a>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav -->
                <!-- brand displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>DANH MỤC</h4>
                        </a>
                    </li>
                    <?php

                    $select_danhmuc = "Select * from `danhmuc`";
                    $result_danhmuc = mysqli_query($con, $select_danhmuc);
                    // $row_data = mysqli_fetch_assoc($result_danhmuc);
                    while ($row_data = mysqli_fetch_assoc($result_danhmuc)) {
                        $danhmuc_title = $row_data['danhmuc_title'];
                        $danhmuc_id = $row_data['danhmuc_id'];
                        echo "<li class='nav-item'>
                        <a href='index.php?brand=$danhmuc_id' class='nav-link text-light'>$danhmuc_title </a>
                            </li>";
                    }


                    ?>



                </ul>

                <!-- Categories displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="./vpp.php" class="nav-link text-light">
                            <h4>VPP - Dụng cụ học sinh</h4>
                        </a>
                    </li>

                    <?php

                    $select_theloai = "Select * from `theloai`";
                    $result_theloai = mysqli_query($con, $select_theloai);
                    // $row_data = mysqli_fetch_assoc($result_danhmuc);
                    while ($row_data = mysqli_fetch_assoc($result_theloai)) {
                        $theloai_title = $row_data['theloai_title'];
                        $theloai_id = $row_data['theloai_id'];
                        echo "<li class='nav-item'>
                        <a href='index.php?brand=$theloai_id' class='nav-link text-light'>$theloai_title </a>
                            </li>";
                    }


                    ?>

                </ul>

            </div>

        </div>




        <!-- last child -->
        <!-- <div class="bg-light p-3 text-center">
            <p>Bản quyền của Công ty TNHH Nostalgia</p>
        </div>
    </div> -->


        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>