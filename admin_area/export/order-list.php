<?php
include('../../includes/connect.php')


    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
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
            <a href="export-orders.php" class="text-danger"> <i class="fa-solid fa-download"></i> Tải</a>

        </div>

    </h3>

    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <?php
            $get_users = "Select * from `user_orders`  ";
            $result = mysqli_query($con, $get_users);
            $row_count = mysqli_num_rows($result);


            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' >KHÔNG CÓ ĐƠN HÀNG NÀO</h2>";
            } else {
                echo "<tr>
                <th>STT</th>
                <th>ID đơn hàng</th>
                <th>ID người dùng</th>
                <th>Tổng tiền</th>
                <th>Số hoá đơn</th>
                <th>Tổng sản phẩm</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>

                
            </tr>
        </thead>
        <tbody>";
                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $order_id = $row_data['order_id'];
                    $user_id = $row_data['user_id'];
                    $amount_due = $row_data['amount_due'];
                    $invoice_number = $row_data['invoice_number'];
                    $total_products = $row_data['total_products'];
                    $order_date = $row_data['order_date'];
                    $order_status = $row_data['order_status'];

                    $number++;
                    echo "  <tr>
                <td>$number</td>
                <td>$order_id</td>
                <td>$user_id</td>
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products </td>
                <td>$order_date </td>
                <td>$order_status </td>


                
               
            </tr>";

                }
            }

            ?>



            </tbody>
    </table>
    <div>
        <a href="../index.php" class="">Quay về trang chủ</a>
    </div>
</body>

</html>