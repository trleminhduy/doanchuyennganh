<?php
include('../includes/connect.php');
include('../functions/common_function.php');

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
            DANG KY ADMIN
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
                    <div class="form-outline mt-4  ">
                        <!-- <label for="email" class="form-label">Email</label> -->
                        <input type="email" id="email" name="admin_email" placeholder="Nhap email">
                    </div>
                    <div class="form-outline mt-4 ">
                        <!-- <label for="password" class="form-label">Password</label> -->
                        <input type="password" id="password" name="admin_password" placeholder="Nhap password">
                    </div>
                    <div class="form-outline mt-4 ">
                        <!-- <label for="confirm_password" class="form-label">Confirm Password</label> -->
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Nhap lai password">
                    </div>
                    <input type="submit" class=" btn bg-info border-0 py-2 px-3 mt-3" value="DANG KY"
                        name="admin_register">
                    <p class="small fw-bold mt-2">Da co tai khoan <a href="admin_login.php"
                            class="link-danger">LOGIN</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['admin_register'])) {
    $admin_username = $_POST['admin_username'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['confirm_password'];



    //select query de check username and password

    $select_query = "Select * from `admin_table` where admin_name ='$admin_username' or admin_email= '$admin_email' "; //checkk db
    $result = mysqli_query($con, $select_query); //neu co thi execute cau lenh
    $rows_count = mysqli_num_rows($result); //dem so dong
    if ($rows_count > 0) {
        echo "<script> alert('Username hoặc email đã tồn tại!')</script>";

    } elseif ($admin_password != $conf_admin_password) {
        echo "<script> alert('MẬT KHẨU KHÔNG TRÙNG NHAU!')</script>";

    } else {
        //insert query
        $insert_query = "insert into `admin_table`(admin_name,admin_email,admin_password) values ('$admin_username','$admin_email', '$hash_password') ";
        $sql_execute = mysqli_query($con, $insert_query);

        if ($sql_execute) {
            echo "<script> alert('Thêm data thành công')</script>";
        } else {
            echo "fail";
        }


    }
}




?>