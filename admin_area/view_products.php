<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem danh sách sản phẩm</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- bootstrap javascript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <style>
        .button-middle {
            margin-left: auto;
            margin-right: auto;

        }
    </style>

</head>

<body>

    <div class="row">
        <h3 class="text-center text-success">DANH SÁCH SẢN PHẨM</h3>
        <div class="col-12 d-flex justify-content-center">
            <button class="btn"><a href="them_sanpham.php" class=" btn nav-link text-light bg-info my-1">Thêm sản
                    phẩm</a></button>


        </div>
    </div>


    <table class=" table table-bordered mt-5 text-center ">
        <thead>
            <tr>
                <th>ID sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh sản phẩm</th>
                <th>Giá tiền</th>
                <th>Tổng được bán ra</th>
                <th>Trạng thái</th>
                <th>Chỉnh sửa</th>
                <th>Xoá</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $get_products = "Select * from `products`";
            $result = mysqli_query($con, $get_products);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $status = $row['status'];
                $number++;
                ?>
                <tr>
                    <td>
                        <?php echo $number; ?>
                    </td>
                    <td>
                        <?php echo $product_title; ?>
                    </td>
                    <td> <img src='./product_images/<?php echo $product_image1; ?>' class='product_img'></img> </td>
                    <td>
                        <?php echo $product_price; ?>
                    </td>
                    <td class="text-danger">
                        <?php
                        $get_count = "Select * from `orders_pending` where product_id = $product_id"; //fetch check so luong da ban ra
                        $result_count = mysqli_query($con, $get_count);
                        $rows_count = mysqli_num_rows($result_count);
                        echo $rows_count;

                        ?>
                    </td>
                    <td>
                        <?php echo $status; ?>
                    </td>
                    <td><a href='index.php?edit_products=<?php echo $product_id ?>'><i
                                class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_products=<?php echo $product_id ?>'><i
                                class='fa-solid fa-trash text-danger'></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>


        </tbody>
    </table>
</body>

</html>