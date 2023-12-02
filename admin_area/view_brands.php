<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <h3 class="text-center">ALL CATEGORY</h3>
    <table class=" table table-bordered mt-5 text-center">
        <thead>
            <tr>
                <th>The loai id</th>
                <th>the loai title</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $get_brands = "Select * from `theloai`";
            $result = mysqli_query($con, $get_brands);
            $number = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $theloai_id = $row['theloai_id'];
                $theloai_title = $row['theloai_title'];

                $number++;
                ?>
                <tr>
                    <td>
                        <?php echo $number; ?>
                    </td>
                    <td>
                        <?php echo $theloai_title; ?>
                    </td>




                    <td><a href='index.php?edit_brands=<?php echo $theloai_id ?>'><i
                                class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='index.php?delete_brands=<?php echo $theloai_id ?>'><i class='fa-solid fa-trash'></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>


        </tbody>
    </table>


</body>

</html>