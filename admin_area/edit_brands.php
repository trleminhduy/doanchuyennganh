<?php
//show trong input
if (isset($_GET['edit_brands'])) {
    $edit_brands = $_GET['edit_brands'];
    $get_brands = "Select * from `theloai` where `theloai_id` = '$edit_brands'";
    $result = mysqli_query($con, $get_brands);
    $row = mysqli_fetch_assoc($result);
    $brands_title = $row['theloai_title'];

}
if (isset($_POST['edit_cat'])) {
    $cat_title = $_POST['brands_title'];

    $update_query = "UPDATE `theloai` SET `theloai_title` = '$cat_title' WHERE `theloai_id` = '$edit_brands'";
    $result = mysqli_query($con, $update_query);
    if ($result) {
        echo "<script>alert('Edit brands success');</script>";
        echo "<script>window.location.href='index.php?view_categories'</script>";
    } else {
        echo "<script>alert('Edit brands fail');</script>";
        echo "<script>window.location.href='index.php?view_categories'</script>";
    }

}



?>
<div class="container mt-3">
    <h1 class="text-center text-danger">EDIT brands</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brands_title" class="form-label">brands title</label>
            <input type="text" name="brands_title" class="form-control text-center" required
                value="<?php echo $brands_title ?>">
        </div>
        <input type="submit" value="UPDATE" class="btn btn-danger px-3 mb-3" name="edit_cat">
    </form>
</div>