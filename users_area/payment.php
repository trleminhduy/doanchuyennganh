<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../asset/style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG THANH TOAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    img {
        width: 30%;
    }
</style>

<body>
    <!-- php code to access user id // dung de xac dinh order cua user nao de thanh toan -->
    <?php
    $user_ip = getIPAddress();
    $get_user = "Select * from `user_table` where user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id']; //user id
    
    ?>
    <div class="container">
        <h2 class="text-center text-info">PHUONG THUC THANH TOAN</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
                <a href="https://momo.vn"><img src="../asset/img/MoMo_Logo.png" alt="momo_img"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>">
                    <h2 class="text-center">THANH TOAN OFFLINE</h2>
                </a>
            </div>

        </div>
    </div>

</body>

</html>