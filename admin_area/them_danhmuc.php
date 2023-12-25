<?php
include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {
    $danhmuc_title = $_POST['themdm_title'];




    // Select data from the database
    $select_query = "SELECT * FROM `danhmuc` WHERE danhmuc_title='$danhmuc_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo "<script>alert('Danh mục đã có trong hệ thống')</script>";
    } else {
        $insert_query = "INSERT INTO `danhmuc` (danhmuc_title) VALUES ('$danhmuc_title')";
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
            echo "<script>alert('THÊM KHÔNG THÀNH CÔNG')</script>";
        }
    }
}
?>


<h2 class="text-center">Thêm Danh mục</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="themdm_title" placeholder="Thêm danh mục" aria-label="danhmuc"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">

        <input type="submit" class="btn bg-info border-0 p-2 my-3" name="insert_cat" value="Thêm danh mục">


    </div>
</form>