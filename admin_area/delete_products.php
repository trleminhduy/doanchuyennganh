<?php
if (isset($_GET['delete_products'])) {
    $delete_id = $_GET['delete_products'];
    //delete query
    $delete_product = "DELETE FROM `products` WHERE product_id = $delete_id";
    $result = mysqli_query($con, $delete_product);
    if ($result) {
        echo "<script>alert('Xóa thành công');</script>";
        echo "<script>window.location.href='index.php?view_products';</script>";
    } else {
        echo "<script>alert('Xóa thất bại');</script>";
    }
}

?>