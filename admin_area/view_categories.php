<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem danh sách danh mục</title>
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
</head>

<body>
    <div class="row">
        <h3 class="text-center text-success">DANH SÁCH DANH MỤC</h3>
        <div class="col-12 d-flex justify-content-center">
            <button class="btn"><a href="index.php?insert_categories" class="btn nav-link text-light bg-info my-1">Thêm
                    danh
                    mục</a></button>
        </div>
    </div>
    <table class=" table table-bordered mt-5 text-center">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Chỉnh sửa</th>
                <th>Xoá</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $get_category = "Select * from `danhmuc`";
            $result = mysqli_query($con, $get_category);
            $number = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['danhmuc_id'];
                $category_title = $row['danhmuc_title'];

                $number++;
                ?>
                <tr>
                    <td>
                        <?php echo $number; ?>
                    </td>
                    <td>
                        <?php echo $category_title; ?>
                    </td>




                    <td><a href='index.php?edit_category=<?php echo $category_id ?>'><i
                                class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_category=<?php echo $category_id ?>'><i
                                class='fa-solid fa-trash  text-danger'></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>


        </tbody>
    </table>

</body>

</html>