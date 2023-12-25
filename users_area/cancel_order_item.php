<?php
include("../includes/connect.php");

if (isset($_GET['delete_orders'])) {
    $delete_id = mysqli_real_escape_string($con, $_GET['delete_orders']);

    // Xóa đơn hàng
    $delete_orders = "DELETE FROM `user_orders` WHERE order_id = '$delete_id'";
    $result = mysqli_query($con, $delete_orders);

    if ($result) {
        echo "<script>alert('Xóa thành công');</script>";
        echo "<script>window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
}
?>