<?php
include("../includes/connect.php");




if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];

    // Check if the request is confirmed
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        // Delete query
        $delete_category = "DELETE FROM `danhmuc` WHERE danhmuc_id = $delete_id";
        $result = mysqli_query($con, $delete_category);

        if ($result) {
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='index.php?view_categories';</script>";
        } else {
            echo "<script>alert('Xóa thất bại');</script>";
        }
    } else {
        // Display confirmation message
        echo "<script>
            var confirmDelete = confirm('Bạn có chắc chắn muốn xóa danh mục này?');
            if (confirmDelete) {
                window.location.href='delete_category.php?delete_category=$delete_id&confirm=true';
            } else {
                window.location.href='index.php?view_categories';
            }
        </script>";
    }
}
?>