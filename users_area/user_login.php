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
    <title>Dăng nhập page</title>
    <link rel="stylesheet" href="../asset/style.css">
    <link rel="stylesheet" href="../asset/dangnhap.css">



    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <style>

    </style>
</head>


<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">ĐĂNG NHẬP</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5  ">
            <div class="lg-12 col-xl-6">
                <!-- phai co enctype de them image -->
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Nhập tên người dùng"
                            autocomplete="off" required name="user_username">
                    </div>


                    <!-- password field -->
                    <div class="form-outline mb-4 ">
                        <label for="user_password" class="form-label">Mật khẩu</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Nhập mật khẩu"
                            autocomplete="off" required name="user_password">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Đăng nhập" class=" bg-info py-2 px-3 border-0 rounded"
                            name="user_login">
                        <p class="small fw-bold mt-2 pt-1">Chưa có tài khoản? <a href="user_registration.php">Đăng
                                ký</a></p>
                    </div>


                </form>

            </div>
        </div>
    </div>



</body>

</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $user_username)) {
        echo "<script>alert('Tên người dùng không hợp lệ') </script>";
        echo "<script>window.location.href='user_login.php'</script>";
        exit;

    }

    $user_password = $_POST['user_password'];


    $select_query = "select * from `user_table` where username ='$user_username' ";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    //check cart items
    $select_query_cart = "select * from `cart_details` where ip_address ='$user_ip' ";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;

        if (password_verify($user_password, $row_data['user_password'])) {
            $redirectPage = ($row_count == 1 && $row_count_cart == 0) ? 'profile.php' : 'payment.php';
            echo "<script>
                Swal.fire({
                    title: 'Đăng nhập thành công',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1200
                }).then(() => {
                    window.location.href = '$redirectPage';
                });
              </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Lỗi!',
                    text: 'Tài khoản hoặc mật khẩu không chính xác',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1200
                });
              </script>";
        }
    } else {
        echo "<script>
            Swal.fire({
                title: 'Lỗi!',
                text: 'Tài khoản hoặc mật khẩu không chính xác',
                icon: 'error',
                showConfirmButton: false,
                timer: 1200
            });
          </script>";
    }
}

?>