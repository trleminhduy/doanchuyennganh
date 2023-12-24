<?php
include("../includes/connect.php");

if (isset($_GET['delete_users'])) {
    $delete_id = $_GET['delete_users'];

    // Check if the request is confirmed
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        // Delete query
        $delete_users = "DELETE FROM `user_table` WHERE user_id = $delete_id";
        $result = mysqli_query($con, $delete_users);

        if ($result) {
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='index.php?list_users';</script>";
        } else {
            echo "<script>alert('Xóa thất bại');</script>";
        }
    } else {
        // Display confirmation message
        echo "<script>
            var confirmDelete = confirm('Bạn có chắc chắn muốn xóa người dùng này?');
            if (confirmDelete) {
                window.location.href='delete_users.php?delete_users=$delete_id&confirm=true';
            } else {
                window.location.href='index.php?list_users';
            }
        </script>";
    }
}
?>