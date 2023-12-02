<?php
if (isset($_GET['delete_payments'])) {
    $delete_id = $_GET['delete_payments'];
    //delete query
    $delete_payments = "DELETE FROM `user_payments` WHERE order_id = $delete_id";
    $result = mysqli_query($con, $delete_payments);
    if ($result) {
        echo "<script>alert('Xóa thành công');</script>";
        echo "<script>window.location.href='index.php?list_payments';</script>";
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
}

?>