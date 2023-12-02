<?php
include('../includes/connect.php');
include('../functions/common_function.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="/asset/style.css">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>


<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">REGISTER</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <!-- phai co enctype de them image -->
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Nhập Username"
                            autocomplete="off" required name="user_username">
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4 ">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Nhập Email"
                            autocomplete="off" required name="user_email">
                    </div>
                    <!-- image field -->
                    <div class="form-outline mb-4 ">
                        <label for="user_image" class="form-label">Hình đại diện</label>
                        <input type="file" id="user_image" class="form-control" name="user_image">
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4 ">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Nhập mật khẩu"
                            autocomplete="off" required name="user_password">
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4 ">
                        <label for="conf_user_password" class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" id="conf_user_password" class="form-control"
                            placeholder="Nhập lại mật khẩu" autocomplete="off" required name="conf_user_password">
                    </div>
                    <!-- address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Địa chỉ</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Nhập địa chỉ"
                            autocomplete="off" required name="user_address">
                    </div>
                    <!-- contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Số điện thoại </label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Nhập số điện thoại"
                            autocomplete="off" required name="user_contact">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0 rounded"
                            name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Đã có tài khoản? <a href="user_login.php">Đăng nhập</a></p>
                    </div>


                </form>

            </div>
        </div>
    </div>



</body>

</html>

<!-- php code -->

<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name']; //alot of extension on img like png jpeg
    $user_ip = getIPAddress();

    //select query de check username and password

    $select_query = "Select * from `user_table` where username ='$user_username' or user_email= '$user_email' "; //checkk db
    $result = mysqli_query($con, $select_query); //neu co thi execute cau lenh
    $rows_count = mysqli_num_rows($result); //dem so dong
    if ($rows_count > 0) {
        echo "<script> alert('Username hoặc email đã tồn tại!')</script>";

    } elseif ($user_password != $conf_user_password) {
        echo "<script> alert('MẬT KHẨU KHÔNG TRÙNG NHAU!')</script>";

    } else {
        //insert query
        $insert_query = "insert into `user_table`(username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email', '$hash_password','$user_image','$user_ip','$user_address','$user_contact') ";
        $sql_execute = mysqli_query($con, $insert_query);
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        if ($sql_execute) {
            echo "<script> alert('Tạo tài khoản thành công!')</script>";
        } else {
            echo "fail";
        }


    }
    //selecting cart items
    $_SESSION['username'] = $user_username;
    $select_cart_item = "Select * from `cart_details` where ip_address='$user_ip'  "; //neu user chua login ma` user them cart items van se luu trong cart, neu user login thi hien thong bao va chuyen sang trang thong bao, truong hop user new thi redirect qua trang register
    $result_cart = mysqli_query($con, $select_cart_item);
    $rows_count = mysqli_num_rows($result_cart); //dem so dong
    if ($rows_count > 0) {
        echo "<script> alert('Bạn có sách trong giỏ hàng, hãy đăng nhập để thanh toán')</script>";
        echo "<script> window.open('checkout.php','_self')</script>";


    } else {
        echo "<script> window.open('../index.php','_self')</script>";

    }



}


?>