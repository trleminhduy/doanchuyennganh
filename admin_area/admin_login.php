<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
</head>

<body class="bg-light">
    <div class="container-fluid m-3">
        <h2 class="text-center text-success mb-5">
            ADMIN DANG NHAP
        </h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-4 col-xl-3 ">
                <img src="./product_images/00-Linux.png" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-4  col-xl-3">
                <form action="" method="post">
                    <div class="form-outline mt-4   ">
                        <!-- <label for="username" class="form-label">Username</label> -->
                        <input type="text" id="username" name="admin_username" placeholder="Nhap username">
                    </div>

                    <div class="form-outline mt-4 ">
                        <!-- <label for="password" class="form-label">Password</label> -->
                        <input type="password" id="password" name="admin_password" placeholder="Nhap password">
                    </div>

                    <input type="submit" class=" btn bg-info border-0 py-2 px-3 mt-3" value="DANG NHAP"
                        name="admin_login">
                    <p class="small fw-bold mt-2">Chua co tai khoan <a href="admin_registration.php"
                            class="link-danger">DANG KY</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['admin_login'])) {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name ='$admin_username' ";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if ($row_count > 0 && password_verify($admin_password, $row_data['admin_password'])) {
        $_SESSION['admin_username'] = $admin_username;

        echo "<script>alert('Đăng nhập thành công') </script>";
        echo "<script> window.open('index.php','_self')</script>";
    } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không chính xác') </script>";
    }
}
?>