<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3 class="text-center">
        ALL USERS
    </h3>

    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <?php
            $get_users = "Select * from `user_table`  ";
            $result = mysqli_query($con, $get_users);
            $row_count = mysqli_num_rows($result);


            if ($row_count == 0) {
                echo "<h2 class='text-danger text-center mt-5' >KHONG CO USER NAO</h2>";
            } else {
                echo "<tr>
                <th>N.O</th>
                <th>Username</th>
                <th>User email</th>
                <th>User address</th>
                <th>User Mobile</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>";
                $number = 0;
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $user_id = $row_data['user_id'];
                    $user_username = $row_data['username'];
                    $user_email = $row_data['user_email'];
                    $user_address = $row_data['user_address'];
                    $user_mobile = $row_data['user_mobile'];

                    $number++;
                    echo "  <tr>
                <td>$number</td>
                <td>$user_username</td>
                <td>$user_email</td>
                <td>$user_address</td>
                <td>$user_mobile </td>
                
               <td><a href='index.php?delete_users=" . $user_id . "'><i class='fa-solid fa-trash text-danger'></i></a></td>
            </tr>";

                }
            }

            ?>



            </tbody>
    </table>

</body>

</html>