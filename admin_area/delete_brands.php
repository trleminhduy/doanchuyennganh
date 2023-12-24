<?php
include("../includes/connect.php");

if (isset($_GET['delete_brands'])) {
    $delete_id = $_GET['delete_brands'];

    // Check if the request is confirmed
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        // Delete query
        $delete_brands = "DELETE FROM `nhaxuatban` WHERE nxb_id = $delete_id";
        $result = mysqli_query($con, $delete_brands);

        if ($result) {
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='index.php?view_brands';</script>";
        } else {
            echo "<script>alert('Xóa thất bại');</script>";
        }
    } else {
        // Display confirmation message
        echo "<script>
            var confirmDelete = confirm('Bạn có chắc chắn muốn xóa nhà xuất bản này?');
            if (confirmDelete) {
                window.location.href='delete_brands.php?delete_brands=$delete_id&confirm=true';
            } else {
                window.location.href='index.php?view_brands';
            }
        </script>";
    }
}
?>