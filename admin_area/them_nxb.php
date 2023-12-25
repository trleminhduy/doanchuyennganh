<?php
include('../includes/connect.php');

if (isset($_POST['insert_brand'])) {
    $theloai_title = $_POST['themtl_title'];


    // Select data from the database
    $select_query = "SELECT * FROM `nhaxuatban` WHERE nxb_title='$theloai_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('Đã có nhà xuất bản trong hệ thống')</script>";
    } else {
        $insert_query = "INSERT INTO `nhaxuatban` (nxb_title) VALUES ('$theloai_title')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo "<script>
                Swal.fire({
                    title: 'Thêm thành công!',
                    
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 670
                });
              </script>";
        } else {
            echo "<script>alert('Thêm không thành công')</script>";
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