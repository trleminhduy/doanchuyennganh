<?php
//kh add them php connect do phan edit nay nam trong profile ma profile da include r cho nen kh can
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "Select * from `user_table` where username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $email = $row_fetch['user_email'];

    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
}
if (isset($_POST['user_update'])) {
    $update_id = $user_id;
    $username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    if (isset($_FILES['user_image'])) {
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    } else {
        // Use existing user image
        $user_image = $row_fetch['user_image'];
    }



    // update query
    $update_data = "UPDATE `user_table` SET username='$username',user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' where user_id='$user_id'";
    $result_query_update = mysqli_query($con, $update_data);
    if ($result_query_update) {
        echo "<script>alert('Cập nhật thành công');</script>";

        echo "<script>window.location.href='logout.php'</script>";



    } else {
        echo "<script>alert('Cập nhật thất bại');</script>";
        //echo "<script>window.location.href='profile.php?edit_account'</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chinh sua ho so</title>
</head>

<body>
    <h3 class="text-center mb-4">Edit account</h3>
    <form action="" method="post" enctype="multipart/form-data " class="text-center">
        <div class="form-outline mb-4">
            <p>Ten user</p>
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="user_username">
        </div>
        <p>Email</p>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $email ?>" name=" user_email">
        </div>
        <div class="form-outline mb-4">
            <input type="file" class="form-control w-50 m-auto" name="user_image">
            <img src="./user_images/<?php echo $user_image ?>" alt="hinh" class="edit_img">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>
        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">

    </form>
</body>

</html>