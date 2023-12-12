<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đơn hàng</title>
</head>

<body>
    <h3 class="text-center">
        TẤT CẢ ĐƠN HÀNG
    </h3>

    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <?php
            $get_orders = "Select * from `user_orders`";
            $result = mysqli_query($con, $get_orders);
            $row_count = mysqli_num_rows($result);


            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' >KHÔNG CÓ ĐƠN HÀNG NÀO!</h2>";
            } else {
                echo "<tr>
                <th>STT</th>
                <th>ID Người đặt</th>           
                <th>Tổng tiền</th>
                <th>Số hoá đơn</th>
                <th>Tổng số lượng</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Xoá</th>
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
                <td>$user_id</td>
               
                <td>$amount_due</td>
                <td>$invoice_number</td>
                <td>$total_products</td>
                <td>$order_date </td>
                <td>$order_status</td>
               <td><a href='index.php?delete_orders=" . $order_id . "'><i class='fa-solid fa-trash text-danger'></i></a></td>
            </tr>";

                }
            }

            ?>



            </tbody>
    </table>

</body>

</html>