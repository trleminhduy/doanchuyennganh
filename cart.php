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
    <title>CHI TIẾT ĐƠN HÀNG</title>
    <link rel="stylesheet" href="./asset/style.css">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>

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

                    </ul>

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

        <div class="">
            <h3 class="text-center mt-5 text-success">



        </div>

        <!-- fourth child table -->
        <div class="container mb-3 mt-3">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">

                        <tbody>
                            <!-- php code display dynamic data -->
                            <?php
                            global $con;
                            $get_ip_add = getIPAddress();
                            $total_price = 0;
                            $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                            $result = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo "  <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Hình sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền </th>
                                <th>Xoá khỏi giỏ hàng</th>
                                <th colspan='2'>Hành động</th>
                            </tr>
                        </thead>";
                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id'];  //se chon ip cua user 1
                                    $select_products = "Select * from `products` where product_id = '$product_id'";
                                    $result_products = mysqli_query($con, $select_products);
                                    while ($row_product_price = mysqli_fetch_array($result_products)) {
                                        $product_price = array($row_product_price['product_price']);
                                        $price_table = $row_product_price['product_price'];
                                        $product_title = $row_product_price['product_title'];
                                        $product_image1 = $row_product_price['product_image1'];
                                        $product_values = array_sum($product_price);
                                        $total_price += $product_values;
                                        ?>

                                        <tr>
                                            <td>
                                                <?php echo $product_title ?>
                                            </td>
                                            <td><img src="./asset/img/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                            <td><input type="text" name="qty" class="form-input w-50"
                                                    value="<?php echo $row['quantity']; ?>"></td>

                                            <?php
                                            $get_ip_add = getIPAddress();
                                            if (isset($_POST['update_cart'])) {
                                                $quantities = $_POST['qty'];
                                                $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                                                $result_products_quantity = mysqli_query($con, $update_cart);
                                                $total_price = $total_price * intval($quantities);

                                            }


                                            ?>
                                            <td>
                                                <?php echo $price_table ?>
                                            </td>
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                            <td>
                                                <!-- <button class="bg-info px-3 py-1 border-0 mx-2 "> Update</button> -->
                                                <input type="submit" value="Cập nhật giỏ hàng"
                                                    class="btn bg-info px-3 py-1 border-0 mx-2 text-light   " name="update_cart">

                                            </td>
                                            <td>
                                                <!-- <button class="bg-info px-3 py-1 border-0 mx-2 "> Xoa</button> -->
                                                <input type="submit" value="Xoá khỏi giỏ hàng"
                                                    class="btn bg-danger text-light px-3 py-1 border-0 mx-2" name="remove_cart">

                                            </td>
                                        </tr>
                                    <?php }

                                }
                            } else {
                                echo "<h2 class='text-center text-danger'>Giỏ hàng rỗng </h2>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div class="d-flex mb-5 mt-5">
                        <?php
                        global $con;
                        $get_ip_add = getIPAddress();

                        $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<h4 class='px-3'></h4>Tổng số tiền:  <strong class='text-danger'> 
                                 $total_price 
                            </strong> </h4>
                         <input type='submit' value='Tiếp tục mua sắm' class='btn bg-secondary text-light px-3 py-1 border-0 mx-2'
                                                    name='continue_shopping'>
                        <button class='btn bg-danger  px-3 py-2 border-0 text-light '><a href='./users_area/checkout.php' class=' text-light text-decoration-none'>Thanh toán giỏ hàng</button>";
                        } else {
                            echo " <input type='submit' value='Tiếp tục mua sắm' class='btn bg-info px-3 py-1 border-0 mx-2'
                                                    name='continue_shopping'>";
                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>



                    </div>
            </div>
        </div>
        </form>

        <!-- function to remove item -->

        <?php
        
        function remove_cart_item()
        {
            global $con;

            if (isset($_POST['remove_cart'])) {
                if (empty($_POST['removeitem'])) {
                    echo "<script>alert('Hãy chọn vào checkbox trước khi xoá')</script>";
                } else {
                    foreach ($_POST['removeitem'] as $remove_id) {
                        echo $remove_id;
                        $delete_query = "Delete from `cart_details` where product_id = $remove_id";
                        $run_delete = mysqli_query($con, $delete_query);
                        if ($run_delete) {
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
        }

        echo $remove_item = remove_cart_item();
        ?>



        ?>




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
</body>

</html>