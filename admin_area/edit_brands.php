<?php
// Show in input
if (isset($_GET['edit_brands'])) {
    $edit_brands = $_GET['edit_brands'];
    $get_brands = "SELECT * FROM `nhaxuatban` WHERE `nxb_id` = '$edit_brands'";
    $result = mysqli_query($con, $get_brands);
    $row = mysqli_fetch_assoc($result);
    $brands_title = $row['nxb_title'];
}

if (isset($_POST['edit_cat'])) {
    $cat_title = $_POST['brands_title'];

    // Validate brand title (allow letters and spaces)
    if (!preg_match('/^[A-Za-z\s]+$/', $cat_title)) {
        echo "<script>alert('Tên nhà xuất bản chỉ được chứa chữ cái và khoảng trắng');</script>";
        echo "<script>window.location.href='index.php?view_categories'</script>";
        exit(); // Stop further processing if validation fails
    }

    $update_query = "UPDATE `nhaxuatban` SET `nxb_title` = '$cat_title' WHERE `nxb_id` = '$edit_brands'";
    $result = mysqli_query($con, $update_query);

    if ($result) {
        echo "<script>alert('Chỉnh sửa thành công');</script>";
        echo "<script>window.location.href='index.php?view_categories'</script>";
    } else {
        echo "<script>alert('Có lỗi chỉnh sửa');</script>";
        echo "<script>window.location.href='index.php?view_categories'</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center text-danger">Chỉnh sửa nhà xuất bản</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brands_title" class="form-label">Tên nhà xuất bản</label>
            <input type="text" name="brands_title" class="form-control text-center" required
                value="<?php echo $brands_title ?>">
        </div>
        <input type="submit" value="UPDATE" class="btn btn-danger px-3 mt-3" name="edit_cat">
    </form>
</div>