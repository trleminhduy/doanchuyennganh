<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

$get_ip_address = getIPAddress();
$total_price = 0;
$total_quantity = 0; // Tổng số lượng sản phẩm
$invoice_number = mt_rand(); // Số hoá đơn ngẫu nhiên
$status = 'pending';

$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);

while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $quantity = $row_price['quantity'];
    $total_quantity += $quantity; // Tăng tổng số lượng

    $select_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
    $run_price = mysqli_query($con, $select_product);
    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = $row_product_price['product_price'];
        $total_price += $product_price * $quantity;

        // Chèn vào orders_pending với cùng một invoice_number cho mỗi sản phẩm
        $insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) VALUES ($user_id, $invoice_number, $product_id, $quantity, '$status')";
        mysqli_query($con, $insert_pending_orders);
    }
}

// Chèn vào user_orders
$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ($user_id, $total_price, $invoice_number, $total_quantity, NOW(), '$status')";
$result_query = mysqli_query($con, $insert_orders);
if ($result_query) {
    echo "<script>alert('Order của bạn đã được ghi nhận')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

// Xóa mục khỏi giỏ hàng khi thanh toán thành công
$empty_cart = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_address'";
mysqli_query($con, $empty_cart);
?>