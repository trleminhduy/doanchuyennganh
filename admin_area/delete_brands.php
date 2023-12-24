<?php
if (isset($_GET['delete_brands'])) {
    $delete_id = $_GET['delete_brands'];
    //delete query
    $delete_brands = "DELETE FROM `nhaxuatban` WHERE nxb_id = $delete_id";
    $result = mysqli_query($con, $delete_brands);
    if ($result) {
        echo "<script>alert('Xóa thành công');</script>";
        echo "<script>window.location.href='index.php?view_brands';</script>";
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
}

?>