<h3 class="text-danger text-center">XOÁ TÀI KHOẢN</h3>
<form action="" method="post" class="mt-5">
    <div class="form-outline mb-4 d-flex  ">
        <input type="submit" class=" btn   m-auto bg-danger text-light  " name="delete" value="Đồng ý">
    </div>
    <div class="form-outline mb-4 d-flex ">
        <input type="submit" class="btn   m-auto bg-info text-light " name="dont_delete" value="Không xoá tài khoản">
    </div>
</form>


<?php
$username_session = $_SESSION['username'];
if(isset($_POST['delete'])) {
    $delete_query = "Delete from `user_table` where username='$username_session'";
    $result_query_delete = mysqli_query($con, $delete_query);
    if($result_query_delete) {
        session_destroy();
        echo "<script>alert('Xóa thành công')</script>";
        echo "<script>window.open('../index.php','_self') </script>";
    } else {

    }
}
if(isset($_POST['dont_delete'])) {
    echo "<script>window.open('profile.php','_self') </script>";

}

?>