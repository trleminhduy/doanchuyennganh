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

    //access image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //access image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //check condition
    if ($product_title == '' or $description == '' or $product_keyword == '' or $product_category == '' or $product_brands == '' or $product_price == '') {
        echo "<script>alert('Hay nhap field')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");
        //insert query
        $insert_products = "insert into `products` (product_title,product_description,product_keyword,danhmuc_id,theloai_id,product_image1,product_image2,product_image3,product_price,date,status) values('$product_title', '$description','$product_keyword','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),$product_status)";
        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Them success')</script>";

        } else {
            echo "<script>alert('Them failed')</script>";
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
        <h1 class="text-center">THÊM SẢN PHẨM</h1>

        <!-- form -->

        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <!-- dòng for và id phải giống nhau, chỉ có name là khác -->
                <input type="text" name="product_title" id="product_title" class="form-control"
                    placeholder="Thêm tiêu đề sản phẩm" autocomplete="off" required="required">



            </div>

            <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description class=" form-label">Product description</label>
                <!-- dòng for và id phải giống nhau, chỉ có name là khác -->
                <input type="text" name="description" id="description" class="form-control"
                    placeholder="Thêm description sản phẩm" autocomplete="off" required="required">



            </div>

            <!-- keyword -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword class=" form-label">Product keyword</label>
                <!-- dòng for và id phải giống nhau, chỉ có name là khác -->
                <input type="text" name="product_keyword" id="product_keyword" class="form-control"
                    placeholder="Thêm keyword sản phẩm" autocomplete="off" required="required">
            </div>

            <!-- danh muc -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Chọn danh muc</option>
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
                    <option value="">Chọn brands</option>
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
                <label for="product_image1 class=" form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control">
            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2 class=" form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control">
            </div>

            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3 class=" form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control">
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price class=" form-label">Giá tiền</label>
                <!-- dòng for và id phải giống nhau, chỉ có name là khác -->
                <input type="text" name="product_price" id="product_price" class="form-control"
                    placeholder="Thêm giá tiền sản phẩm" autocomplete="off" required="required">
            </div>

            <!-- button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mt-3" value="Thêm sản phẩm">
            </div>
        </form>
    </div>

</body>

</html>