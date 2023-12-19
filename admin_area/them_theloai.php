<?php
include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $theloai_title = $_POST['themtl_title'];

    // Validate brand title (allow letters and spaces)
    if (!preg_match('/^[A-Za-z\s]+$/', $theloai_title)) {
        echo "<script>alert('Tên nhà xuất bản chỉ được chứa chữ cái và khoảng trắng')</script>";
        echo "<script>window.open('index.php?insert_genre','_self')</script>";
        exit(); // Stop further processing if validation fails
    } else {
        // Select data from the database
        $select_query = "SELECT * FROM `theloai` WHERE theloai_title='$theloai_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);

        if ($number > 0) {
            echo "<script>alert('Đã có nhà xuất bản trong hệ thống')</script>";
        } else {
            $insert_query = "INSERT INTO `theloai` (theloai_title) VALUES ('$theloai_title')";
            $result = mysqli_query($con, $insert_query);

            if ($result) {
                echo "Thêm thành công";
            } else {
                echo "<script>alert('Thêm không thành công')</script>";
            }
        }
    }
}
?>

<h2 class="text-center">Thêm nhà xuất bản</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="themtl_title" placeholder="Thêm nhà xuất bản" aria-label="theloai"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">

        <input type="submit" class="btn bg-info border-0 p-2 my-3" name="insert_brand" value="Thêm">

    </div>
</form>