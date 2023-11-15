<?php
include('../includes/connect.php');
if (isset($_POST['insert_brand'])) {    //will trigger if user press "insert"
    $theloai_title = $_POST['themtl_title'];      //save "themdm_title" vào biến 

    //select data from db
    $select_query = "Select * from `theloai` where theloai_title='$theloai_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('Da co trong he thong')</script>";
    } else {


        $insert_query = "insert into `theloai` (theloai_title) values ('$theloai_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('success')</script>";
        }
    }
}
?>
<h2 class="text-center">Insert The loai</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="themtl_title" placeholder="Thêm thể loại" aria-label="theloai" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">

        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="Thêm thể loại">

    </div>
</form>