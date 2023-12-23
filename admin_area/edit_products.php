<?php
if (isset($_GET['edit_products'])) {
    $edit_id = $_GET['edit_products'];
    $get_data = "Select * from `products` where product_id = $edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keyword'];
    $danhmuc_id = $row['danhmuc_id'];
    $theloai_id = $row['theloai_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];
}


//fetching category name
$select_category = "select * from `danhmuc` where danhmuc_id=$danhmuc_id";
$result_category = mysqli_query($con, $select_category);
$row_category = mysqli_fetch_assoc($result_category);
$danhmuc_title = $row_category['danhmuc_title'];
// echo $danhmuc_title;


//fetching the loai name
$select_brands = "select * from `theloai` where theloai_id=$theloai_id";
$result_brands = mysqli_query($con, $select_brands);
$row_brands = mysqli_fetch_assoc($result_brands);
$theloai_title = $row_brands['theloai_title'];
// echo $theloai_title;


?>





<div class="container mt-4">
    <h1 class="text-center text-danger">CHỈNH SỬA SẢN PHẨM</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label"> Tiêu đề sản phẩm </label>
            <input type="text" name="product_title" value="<?php echo $product_title ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4 mt-2">
            <label for="product_title" class="form-label mt-2"> Mô tả sản phẩm </label>
            <input type="text" name="product_description" value="<?php echo $product_description ?>"
                class="form-control" required>


        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label mt-2"> Từ khoá tìm kiếm </label>
            <input type="text" value="<?php echo $product_keywords ?>" name="product_keywords" class="form-control"
                required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label mt-2"> Thuộc danh mục? </label>
            <select name="product_category" id="" class="form-select">
                <option value="<?php echo $danhmuc_title ?>">
                    <?php echo $danhmuc_title ?>
                </option>
                <?php
                $select_category_all = "select * from `danhmuc`";
                $result_category_all = mysqli_query($con, $select_category_all);
                while ($row_category_all = mysqli_fetch_assoc($result_category_all)) {
                    $danhmuc_title = $row_category_all['danhmuc_title'];
                    $danhmuc_id = $row_category_all['danhmuc_id'];
                    echo "<option value='$danhmuc_id'>$danhmuc_title</option>";
                }

                ?>

            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label mt-2"> Thuộc NXB? </label>
            <select name="product_brands" id="" class="form-select">
                <option value="<?php echo $theloai_title ?>">
                    <?php echo $theloai_title ?>
                </option>

                <?php
                $select_brands_all = "select * from `theloai`";
                $result_brands_all = mysqli_query($con, $select_brands_all);
                while ($row_brands_all = mysqli_fetch_assoc($result_brands_all)) {
                    $theloai_title = $row_brands_all['theloai_title'];
                    $theloai_id = $row_brands_all['theloai_id'];
                    echo "<option value='$theloai_id'>$theloai_title</option>";
                }

                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label "> Hình 1</label>
            <div class="d-flex">
                <input type="file" name="product_image1" class="form-control w-90 m-auto" required>
                <img src="../asset/img/<?php echo $product_image1 ?>" alt="" class="edit_image">

            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label "> Hình 2</label>
            <div class="d-flex">
                <input type="file" name="product_image2" class="form-control w-90 m-auto" required>
                <img src="../asset/img/<?php echo $product_image2 ?>" alt="" class="edit_image">

            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label "> Hình 3</label>
            <div class="d-flex">
                <input type="file" name="product_image3" class="form-control w-90 m-auto" required>
                <img src="../asset/img/<?php echo $product_image3 ?>" alt="" class="edit_image">

            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label "> Giá tiền </label>
            <input type="text" value="<?php echo $product_price ?>" name="product_price" class="form-control " required>
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Cập nhật" class="btn btn-danger border-0 px-3 py-2 mt-2 ">
        </div>
    </form>
</div>

<!-- cap nhat product thong qua nut cap nhat -->
<?php
if (isset($_POST['edit_product'])) {
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    if (!preg_match('/^[A-Za-z\s]+$/', $product_title)) {
        echo "<script>alert('Tên sản phẩm chỉ được chứa chữ cái và khoảng trắng');</script>";
        echo "<script>window.location.href='index.php?view_products'</script>";
        exit(); // Stop further processing if validation fails
    }

    // Validate required fields
    if (empty($product_title) || empty($product_description) || empty($product_category) || empty($product_brands) || empty($product_price)) {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin.');</script>";
        exit();
    }
    // Validate product_price to ensure it is numeric
    if (!is_numeric($product_price) || $product_price < 0) {
        echo "<script>alert('Giá sản phẩm không hợp ê');</script>";
        exit();
    }





    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //checking condition






    move_uploaded_file($temp_image1, "./product_images/$product_image1");
    move_uploaded_file($temp_image2, "./product_images/$product_image2");
    move_uploaded_file($temp_image3, "./product_images/$product_image3");

    //query
    // Prepare the update query with parameter binding
    $update_product = "UPDATE `products` SET product_title=?, product_description=?, product_keyword=?, danhmuc_id=?, theloai_id=?, product_image1=?, product_image2=?, product_image3=?, product_price=? WHERE product_id = ?";
    $stmt = mysqli_prepare($con, $update_product);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "sssiisssdi", $product_title, $product_description, $product_keywords, $product_category, $product_brands, $product_image1, $product_image2, $product_image3, $product_price, $edit_id);

    // Execute the statement
    $result_update = mysqli_stmt_execute($stmt);

    // Check for success
    if ($result_update) {
        echo "<script>alert('Cập nhật thành công');</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    } else {
        echo "<script>alert('Cập nhật không thành công');</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);


}

?>