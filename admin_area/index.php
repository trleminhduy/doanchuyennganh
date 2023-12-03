<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php"); // Redirect to login page
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- css file -->
    <link rel="stylesheet" href="../asset/style.css">
    <style>
        .admin_img {
            width: 100px;
            object-fit: contain;
        }

        .product_img {
            width: 100px;
            object-fit: contain;
        }

        .edit_image {
            width: 100px;
            object-fit: contain;
        }
    </style>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


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
                    <button><a href="them_sanpham.php" class="nav-link text-light bg-info my-1">Thêm sản
                            phẩm</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">Xem sản
                            phẩm</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Thêm danh
                            mục</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">Xem danh
                            mục</a></button>
                    <button><a href="index.php?insert_genre" class="nav-link text-light bg-info my-1">Thêm nhà xuất
                            bản</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">Xem nhà xuất
                            bản</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">Tất cả đơn
                            hàng</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">Phương thức thanh
                            toán</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">User
                            lists</a></button>
                    <button><a href="admin_logout.php" class="nav-link text-light bg-info my-1">Đăng xuất</a></button>
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
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_products'])) {
                include('delete_products.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brands'])) {
                include('edit_brands.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brands'])) {
                include('delete_brands.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['delete_orders'])) {
                include('delete_orders.php');
            }
            if (isset($_GET['list_payments'])) {
                include('list_payments.php');
            }
            if (isset($_GET['delete_payments'])) {
                include('delete_payments.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['delete_users'])) {
                include('delete_users.php');
            }




            ?>
        </div>
    </div>








    <!-- bootstrap js link -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


</body>

</html>