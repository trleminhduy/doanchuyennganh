<?php
if (isset($_GET['delete_category'])) {
    $delete_id = $_GET['delete_category'];
    //delete query
    $delete_category = "DELETE FROM `danhmuc` WHERE danhmuc_id = $delete_id";
    $result = mysqli_query($con, $delete_category);
    if ($result) {
        echo "<script>alert('Xóa thành công');</script>";
        echo "<script>window.location.href='index.php?view_categories';</script>";
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
}

?>