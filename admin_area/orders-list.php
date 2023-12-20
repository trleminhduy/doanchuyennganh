<?php
include('')


    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách user</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <h3 class="text-center">
        TRANG XUẤT FILE EXCEL
        <div class="mt-5">
            <a href="export-user.php" class="text-danger"> <i class="fa-solid fa-download"></i> Tải</a>

        </div>

    </h3>

    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <?php
            $get_users = "Select * from `user_table`  ";
            $result = mysqli_query($con, $get_users);
            $row_count = mysqli_num_rows($result);


            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' >KHONG CO USER NAO</h2>";
            } else {
                echo "<tr>
                <th>STT</th>
                <th>Tên đăng nhập</th>
                <th>Họ và tên</th>

                <th>Email khách hàng</th>
                <th>Địa chỉ khách hàng</th>
                <th>Số điện thoại khách hàng</th>
                
            </tr>
        </thead>
        <tbody>";
                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $user_id = $row_data['user_id'];
                    $user_username = $row_data['username'];
                    $user_fullname = $row_data['user_fullname'];
                    $user_email = $row_data['user_email'];
                    $user_address = $row_data['user_address'];
                    $user_mobile = $row_data['user_mobile'];

                    $number++;
                    echo "  <tr>
                <td>$number</td>
                <td>$user_username</td>
                <td>$user_fullname</td>
                <td>$user_email</td>
                <td>$user_address</td>
                <td>$user_mobile </td>
                
               
            </tr>";

                }
            }

            ?>



            </tbody>
    </table>
    <div>
        <a href="index.php" class="">Quay về trang chủ</a>
    </div>
</body>

</html>