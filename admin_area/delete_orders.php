<?php
if (isset($_GET['delete_orders'])) {
    $delete_id = $_GET['delete_orders'];
    //delete query
    $delete_orders = "DELETE FROM `user_orders` WHERE order_id = $delete_id";
    $result = mysqli_query($con, $delete_orders);
    if ($result) {
        echo "<script>alert('Xóa thành công');</script>";
        echo "<script>window.location.href='index.php?list_orders';</script>";
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
}

?>