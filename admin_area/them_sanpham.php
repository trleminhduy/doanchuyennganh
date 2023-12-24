<?php
include('../includes/connect.php');

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    $product_stock = $_POST['product_stock'];


    // Validate product_price to ensure it is numeric
    if (!is_numeric($product_price) || $product_price < 0 || $product_price < 1000) {
        echo "<script>alert('Giá sản phẩm không hợp lệ')</script>";
        echo "<script>window.open('them_sanpham.php','_self')</script>";
        exit(); // Stop further processing if validation fails
    }

    //validate stock
    if (!is_numeric($product_stock) || $product_stock < 0) {
        echo "<script>alert('Số lượng kho phải là số hoặc số không âm')</script>";
        echo "<script>window.open('them_sanpham.php','_self')</script>";
        exit(); // Stop further processing if validation fails
    }

    //validate description
    if (empty($description) || strlen($description) > 255) {
        echo "<script>alert('Mô tả sản phẩm không được trống và không quá 255 ký tự')</script>";
        echo "<script>window.open('them_sanpham.php','_self')</script>";
        exit(); // Stop further processing if validation fails
    }


    // Access image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // Access image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    // Check condition
    if ($product_title == '' or $description == '' or $product_keyword == '' or $product_category == '' or $product_brands == '' or $product_price == '') {
        echo "<script>alert('Hãy nhập đầy đủ!')</script>";
        echo "<script>window.open('them_sanpham.php','_self')</script>";
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        //stop sql injection
        $select_query = "SELECT * FROM `products` WHERE product_title = ?";
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, "s", $product_title);
        mysqli_stmt_execute($stmt);
        $result_select = mysqli_stmt_get_result($stmt);
        $number = mysqli_num_rows($result_select);
        if ($number > 0) {
            echo "<script>alert('Sản phẩm đã có trong hệ thống')</script>";

        } else {


            // Insert query
            $insert_products = "insert into `products` (product_title,product_description,product_keyword,nxb_id,nxb_id,product_image1,product_image2,product_image3,product_price,date,status,product_stock) values('$product_title', '$description','$product_keyword','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),$product_status,$product_stock)";
            $result_query = mysqli_query($con, $insert_products);

            if ($result_query) {
                echo "THÊM THÀNH CÔNG";
            } else {
                echo "<script>alert('Lỗi thêm')</script>";
            }
        }
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm - Admin area</title>

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- css file -->
    <link rel="stylesheet" href="../asset/style.css">
    <style>
        .admin_img {
            width: 100px;
            object-fit: contain;
        }
    </style>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center text-success">THÊM SẢN PHẨM</h1>

        <!-- form -->

        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Tên sản phẩm</label>
                <!-- dòng for và id phải giống nhau, chỉ có name là khác -->
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Thêm tên sản phẩm" autocomplete="off" required="required">



            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description class=" form-label">Mô tả sản phẩm</label>
                <!-- dòng for và id phải giống nhau, chỉ có name là khác -->
                <textarea name="description" id="description" class="form-control" placeholder="Thêm mô tả sản phẩm"
                    rows="4" autocomplete="off" required="required" style="word-wrap: break-word;"></textarea>



            </div>

            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword class=" form-label">Từ khoá tìm kiếm</label>
                <!-- dòng for và id phải giống nhau, chỉ có name là khác -->
                <input type="text" name="product_keyword" id="product_keyword" class="form-control"
                    placeholder="Thêm keyword để tìm sản phẩm" autocomplete="off" required="required">
            </div>

            <!-- danh muc -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Chọn danh mục</option>
                    <?php
                    $select_query = "Select * from `danhmuc`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $danhmuc_title = $row['danhmuc_title'];
                        $danhmuc_id = $row['danhmuc_id'];

                        echo "<option value='$danhmuc_id'>$danhmuc_title</option>";

                    }
                    ?>

                </select>
            </div>

            <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Chọn nhà xuất bản</option>
                    <?php
                    $select_query = "Select * from `theloai`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $theloai_title = $row['theloai_title'];
                        $theloai_id = $row['theloai_id'];

                        echo "<option value='$theloai_id'>$theloai_title</option>";

                    }
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1 class=" form-label">Hình 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control">
            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2 class=" form-label">Hình 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control">
            </div>

            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3 class=" form-label">Hình 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control">
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price class=" form-label">Giá tiền</label>
                <!-- dòng for và id phải giống nhau, chỉ có name là khác -->
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placeholder="Thêm giá tiền sản phẩm" autocomplete="off" required="required">
            </div>
            <!-- stock -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_stock class=" form-label">Sẵn có:</label>
                <!-- dòng for và id phải giống nhau, chỉ có name là khác -->
                <input type="text" name="product_stock" id="product_stock" class="form-control"
                    placeholder="Số lượng trong kho" autocomplete="off" required="required">
            </div>

            <!-- button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mt-3" value="Thêm sản phẩm">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <a href="./index.php">Quay về trang admin</a>
            </div>
        </form>
    </div>

</body>

</html>