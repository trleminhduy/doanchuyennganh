<?php
// Show in input
if (isset($_GET['edit_category'])) {
    $edit_category = $_GET['edit_category'];
    $get_category = "SELECT * FROM `danhmuc` WHERE `danhmuc_id` = '$edit_category'";
    $result = mysqli_query($con, $get_category);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['danhmuc_title'];
}

if (isset($_POST['edit_cat'])) {
    $cat_title = $_POST['category_title'];

    // Validate category title (allow letters and spaces)
    if (!preg_match('/^[A-Za-z\s]+$/', $cat_title)) {
        echo "<script>alert('Danh mục chỉ được chứa chữ cái và khoảng trắng');</script>";
        echo "<script>window.location.href='index.php?view_categories'</script>";
        exit(); // Stop further processing if validation fails
    }

    $update_query = "UPDATE `danhmuc` SET `danhmuc_title` = '$cat_title' WHERE `danhmuc_id` = '$edit_category'";
    $result = mysqli_query($con, $update_query);

    if ($result) {
        echo "<script>alert('Chỉnh sửa danh mục thành công');</script>";
        echo "<script>window.location.href='index.php?view_categories'</script>";
    } else {
        echo "<script>alert('Lỗi chỉnh sửa');</script>";
        echo "<script>window.location.href='index.php?view_categories'</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center text-danger">CHỈNH SỬA DANH MỤC</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Tên danh mục</label>
            <input type="text" name="category_title" class="form-control text-center" required
                value="<?php echo $category_title ?>">
        </div>
        <input type="submit" value="UPDATE" class="btn btn-danger px-3 mb-3 mt-3" name="edit_cat">
    </form>
</div>