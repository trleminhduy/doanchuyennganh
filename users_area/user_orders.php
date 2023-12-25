<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    $username = $_SESSION['username'];
    $get_user = "Select * from `user_table` where username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];
    //echo $user_id;
    

    ?>

    <h3 class="text-success text-center">TẤT CẢ ĐƠN HÀNG</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th> STT</th>
                <th>Tổng tiền</th>
                <th>Tổng số lượng đơn hàng</th>
                <th>Số hoá đơn</th>
                <th>Ngày đặt</th>
                <th>Trạng thái thanh toán</th>
                <th>Trạng thái đơn hàng</th>
                <th>Xoá đơn hàng</th>


            </tr>
        </thead>
        <tbody class="bg-light text-light">
            <?php
            $get_order_details = "select * from `user_orders` where user_id='$user_id'";
            $result_orders = mysqli_query($con, $get_order_details);
            $number = 1;
            while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                $order_id = $row_orders['order_id'];
                $amount_due = $row_orders['amount_due'];
                $invoice_number = $row_orders['invoice_number'];
                $total_products = $row_orders['total_products'];
                $order_status = $row_orders['order_status'];
                if ($order_status == 'pending') {
                    $order_status_display = 'Chưa xác nhận thanh toán';
                } else {
                    $order_status_display = ' Đã thanh toán';
                }
                $order_date = $row_orders['order_date'];

                echo "<tr>
                <td> <a href='user_buy_item.php'>$number</a> </td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status_display</td>
                

                 ";

                if ($order_status == 'Complete') {
                    echo "<td>Đã xác nhận đơn hàng</td>";
                    // Không hiển thị nút xóa cho đơn hàng đã hoàn tất
                    echo "<td>Đã xác nhận</td>";
                } else {
                    echo "<td><a href='confirm_payment.php?order_id=$order_id'>Đang chờ xác nhận</a></td>";
                    // Hiển thị nút xóa cho đơn hàng chưa hoàn tất
                    echo "<td><a href='cancel_order_item.php?delete_orders=" . $row_orders['order_id'] . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa đơn hàng này không?\");'><i class='fa-solid fa-trash text-danger'></i></a></td>";
                }




                //echo "<td><a href='cancel_order_item.php?delete_orders=" . $row_orders['order_id'] . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa đơn hàng này không?\");'><i class='fa-solid fa-trash text-danger'></i></a></td></tr>";
                $number++;
            }
            ?>
        </tbody>
    </table>


</body>

</html>