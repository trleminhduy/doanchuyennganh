<?php
if (isset($_GET['delete_users'])) {
    $delete_id = $_GET['delete_users'];
    //delete query
    $delete_users = "DELETE FROM `user_table` WHERE user_id = $delete_id";
    $result = mysqli_query($con, $delete_users);
    if ($result) {
        echo "<script>alert('Xóa thành công');</script>";
        echo "<script>window.location.href='index.php?list_users';</script>";
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
}

?>