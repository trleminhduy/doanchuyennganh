
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <h3 class="text-center">ALL PRODUCT</h3>
    <table class=" table table-bordered mt-5 text-center">
        <thead>
            <tr>
                <th>Product id</th>
                <th>Product title</th>
                <th>Product image</th>
                <th>Product price</th>
                <th>Total sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>

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
                    <td><a href=''><i class='fa-solid fa-trash'></i></a></td>
                </tr>
                <?php
            }
            ?>


        </tbody>
    </table>
</body>

</html>