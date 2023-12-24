<?php
include("../includes/connect.php");

if (isset($_GET['delete_products'])) {
    $delete_id = $_GET['delete_products'];

    // Check if the request is confirmed
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        // Delete query
        $delete_products = "DELETE FROM `products` WHERE product_id = $delete_id";
        $result = mysqli_query($con, $delete_products);

        if ($result) {
            echo "<script>alert('Xóa thành công');</script>";
            echo "<script>window.location.href='index.php?view_products';</script>";
        } else {
            echo "<script>alert('Xóa thất bại');</script>";
        }
    } else {
        // Display confirmation message
        echo "<script>
            var confirmDelete = confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');
            if (confirmDelete) {
                window.location.href='delete_products.php?delete_products=$delete_id&confirm=true';
            } else {
                window.location.href='index.php?view_products';
            }
        </script>";
    }
}
?>