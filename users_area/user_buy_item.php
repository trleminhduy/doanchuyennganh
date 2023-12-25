<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHI TIẾT ĐƠN HÀNG ĐÃ ĐẶT</title>
    <link rel="stylesheet" href="./asset/style.css">

    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>

<body>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">

            <div class="container-fluid">
                <!-- ... (existing code) ... -->
            </div>
        </nav>

        <!-- call cart function -->
        <?php
        cart();
        ?>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg bg-light">
            <ul class="navbar-nav me-auto">
                <!-- ... (existing code) ... -->
            </ul>
        </nav>

        <!-- Third child -->
        <div class="">
            <h3 class="text-center mt-5 text-success">
                CHI TIẾT ĐƠN HÀNG ĐÃ ĐẶT
            </h3>
        </div>

        <!-- fourth child table -->
        <div class="container mb-3 mt-3">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>

                                <th>Số lượng</th>
                                <th>Số hoá đơn</th>
                                <!-- <th>Số hoá đơn</th> -->

                            </tr>
                        </thead>
                        <tbody>
                            <!-- php code display dynamic data -->
                            <?php
                            global $con;
                            $cart_query = "SELECT * FROM `orders_pending`, `products` WHERE orders_pending.product_id = products.product_id ";
                            $result = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);

                            if ($result_count > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                    $product_title = $row['product_title'];
                                    $quantity = $row['quantity'];
                                    $invoice_number = $row['invoice_number'];
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $product_title ?>
                                        </td>

                                        <td>
                                            <?php echo $quantity ?>
                                        </td>
                                        <td>
                                            <?php echo $invoice_number ?>
                                        </td>

                                    </tr>
                                <?php }
                            } else {
                                echo "<h2 class='text-center text-danger'>Không có đơn hàng</h2>";
                            }
                            ?>
                        </tbody>

                    </table>
                </form>
            </div>
        </div>
    </div>

    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>