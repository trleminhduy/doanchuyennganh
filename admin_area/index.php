<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css file -->
    <link rel="stylesheet" href="../asset/style.css">
    <style>
        .admin_img {
            width: 100px;
            object-fit: contain;
        }
    </style>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../asset/img/CMBG.png" alt="" class="nav_logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Duy</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Quản lý</h3>
        </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-primary p-1 d-flex align-items-center">
                <div>
                    <a href="#"><img src="../asset/img/CMBG.png" alt="" class="admin_img"></a>
                    <p class="text-light text-center">DUY TRẦN</p>
                </div>
                <div class="button text-center">
                    <button><a href="them_sanpham.php" class="nav-link text-light bg-info my-1">Thêm sản phẩm</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Xem sản phẩm</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Thêm danh mục</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Xem danh mục</a></button>
                    <button><a href="index.php?insert_genre" class="nav-link text-light bg-info my-1">Thêm thể loại</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Xem thể loại</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Tất cả đơn hàng</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Tất cả thanh toán</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">User lists</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Đăng xuất</a></button>
                </div>
            </div>
        </div>
        <!-- fourth child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_categories'])) {
                include('them_danhmuc.php');
            }
            if (isset($_GET['insert_genre'])) {
                include('them_theloai.php');
            }
            ?>
        </div>
    </div>








    <!-- bootstrap js link -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>