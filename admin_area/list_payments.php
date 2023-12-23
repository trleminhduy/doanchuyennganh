<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách cổng thanh toán</title>
</head>

<body>
    <h3 class="text-center">
        TẤT CẢ THANH TOÁN QUA CỔNG
    </h3>
    <div class="col-12 d-flex justify-content-center">
        <button class="btn"><a href="./export/payment-list.php"
                class="btn nav-link text-light bg-info my-1">EXPORT</a></button>
    </div>

    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <?php
            $get_payments = "Select * from `user_payments`  ";
            $result = mysqli_query($con, $get_payments);
            $row_count = mysqli_num_rows($result);


            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' >KHÔNG CÓ THANH TOÁN NÀO</h2>";
            } else {
                echo "<tr>
                <th>STT</th>
                <th>Số hoá đơn</th>
                <th>Tổng tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Ngày đặt</th>
                <th>Xoá</th>
            </tr>
        </thead>
        <tbody>";
                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $order_id = $row_data['order_id'];
                    //$payment_id = $row_data['payment_id'];
                    $amount = $row_data['amount'];
                    $invoice_number = $row_data['invoice_number'];
                    $payment_mode = $row_data['payment_mode'];
                    $date = $row_data['date'];
                    $number++;
                    echo "  <tr>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode </td>
                <td>$date</td>
               <td><a href='index.php?delete_payments=" . $order_id . "'><i class='fa-solid fa-trash text-danger'></i></a></td>
            </tr>";

                }
            }

            ?>



            </tbody>
    </table>

</body>

</html>