<?php

//include connection 
// include('./includes/connect.php');


//getting products
function getProducts()
{
    global $con;
    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

            $select_query = "Select * from `products` order by rand() limit 0,4";
            $result_query = mysqli_query($con, $select_query);
            //$row=mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $danhmuc_id = $row['danhmuc_id'];
                $theloai_id = $row['theloai_id'];
                echo "  <div class='col-md-4 mb-2'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description </p>
                                <p class='card-text text-danger'>Giá tiền: $product_price</p>

                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-info mt-2 bg-secondary'>Xem thêm</a>

                            </div>
                        </div>
                    </div>";
            }
        }
    }
}


// get all the products

function get_all_products()
{
    global $con;
    //condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

            $select_query = "Select * from `products` order by rand()";
            $result_query = mysqli_query($con, $select_query);
            //$row=mysqli_fetch_assoc($result_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $danhmuc_id = $row['danhmuc_id'];
                $theloai_id = $row['theloai_id'];
                echo "  <div class='col-md-4 mb-2'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description </p>
                               <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
                                                               <a href='product_details.php?product_id=$product_id' class='btn btn-info mt-2 bg-light'>Xem thêm</a>


                            </div>
                        </div>
                    </div>";
            }
        }
    }
}


//getting category
function get_unique_categories()
{
    global $con;
    //condition to check isset or not
    if (isset($_GET['category'])) {
        $danhmuc_id = $_GET['category'];
        $select_query = "Select * from `products` where danhmuc_id=$danhmuc_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>Không tìm thấy sản phẩm</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $danhmuc_id = $row['danhmuc_id'];
            $theloai_id = $row['theloai_id'];
            echo "
      <div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'> $product_title</h5>
            <p class='card-text'>$product_description </p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-info mt-2 bg-light'>Xem thêm</a>

          </div>
        </div>
      </div>
      ";
        }

    }
}


function get_unique_brand()
{
    global $con;
    //condition to check isset or not
    if (isset($_GET['brand'])) {
        $theloai_id = $_GET['brand'];
        $select_query = "Select * from `products` where theloai_id=$theloai_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>Không tìm thấy sản phẩm</h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $danhmuc_id = $row['danhmuc_id'];
            $theloai_id = $row['theloai_id'];
            echo "
      <div class='col-md-4 mb-2'>
        <div class='card' style='width: 18rem;'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'> $product_title</h5>
            <p class='card-text'>$product_description </p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
           <a href='product_details.php?product_id=$product_id' class='btn btn-info mt-2 bg-light'>Xem thêm</a>

          </div>
        </div>
      </div>
      ";
        }

    }
}





//getting brand



function getUniqueBrands()
{
    global $con;

    // Select distinct brands from the products table
    $select_brands_query = "SELECT DISTINCT theloai_id FROM `products`";
    $result_brands = mysqli_query($con, $select_brands_query);

    // Check if there are any brands
    if (mysqli_num_rows($result_brands) > 0) {
        while ($row_brand = mysqli_fetch_assoc($result_brands)) {
            $theloai_id = $row_brand['theloai_id'];

            // Fetch the brand title from the theloai table
            $select_brand_title = "SELECT theloai_title FROM `theloai` WHERE theloai_id = $theloai_id";
            $result_brand_title = mysqli_query($con, $select_brand_title);

            // Check if the brand title exists
            if ($row_brand_title = mysqli_fetch_assoc($result_brand_title)) {
                $theloai_title = $row_brand_title['theloai_title'];
                echo "<li class='nav-item'>
                        <a href='index.php?brand=$theloai_id' class='nav-link text-light'>$theloai_title</a>
                      </li>";
            }
        }
    } else {
        echo "<li class='nav-item'>
                <span class='nav-link text-light'>No brands found</span>
              </li>";
    }
}




//display danh muc
function getCat()
{
    global $con;
    $select_danhmuc = "Select * from `danhmuc`";
    $result_danhmuc = mysqli_query($con, $select_danhmuc);
    // $row_data = mysqli_fetch_assoc($result_danhmuc);
    while ($row_data = mysqli_fetch_assoc($result_danhmuc)) {
        $danhmuc_title = $row_data['danhmuc_title'];
        $danhmuc_id = $row_data['danhmuc_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?category=$danhmuc_id' class='nav-link text-light'>$danhmuc_title </a>
                            </li>";
    }
}

//display brands
function getBrands()
{
    global $con;
    $select_theloai = "Select * from `theloai`";
    $result_theloai = mysqli_query($con, $select_theloai);
    // $row_data = mysqli_fetch_assoc($result_danhmuc);
    while ($row_data = mysqli_fetch_assoc($result_theloai)) {
        $theloai_title = $row_data['theloai_title'];
        $theloai_id = $row_data['theloai_id'];
        echo "<li class='nav-item'>
                        <a href='index.php?brand=$theloai_id' class='nav-link text-light'>$theloai_title </a>
                            </li>";
    }
}

//get search products

function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        //condition to check isset or not
        $search_query = "Select * from `products` where product_keyword like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>Không tìm thấy sản phẩm</h2>";
        }

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $danhmuc_id = $row['danhmuc_id'];
            $theloai_id = $row['theloai_id'];
            echo "  <div class='col-md-4 mb-2'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description </p>
                               <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-info mt-2 bg-light'>Xem thêm</a>


                            </div>
                        </div>
                    </div>";
        }
    }
}
//view details
function view_details()
{
    global $con;
    //condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $product_id = $_GET['product_id'];

                $select_query = "Select * from `products` where product_id=$product_id ";
                $result_query = mysqli_query($con, $select_query);

                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];

                    $product_price = $row['product_price'];
                    $danhmuc_id = $row['danhmuc_id'];
                    $theloai_id = $row['theloai_id'];
                    echo "  <div class='col-md-4 mb-2'>
                        <div class='card' style='width: 18rem;'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'> $product_title</h5>
                                <p class='card-text'>$product_description </p>
                                <p class='card-text'>Price: $product_price</p>

                               <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Thêm vào giỏ hàng</a>
                                <a href='index.php' class='btn btn-info mt-2 bg-light'>Go home</a>

                            </div>
                        </div>
                    </div>
                      <div class='col-md-8'>
                        <!-- related image -->
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Related </h4>
                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title' class='card-img-top' alt='$product_title'>

                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title' class='card-img-top' alt='$product_title'>

                            </div>

                            
                        </div>
                        

                    </div>";
                }
            }
        }

    }
}


//get ip address function
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id"; //co ip address la do trong moi truong ecommerce chung ta phai tach ip cua moi nguoi khi thanh toan gio hang (neu trung ip thi them vao cart khac ip thi kh them)
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {    //lon hon kh la co 1 item trong gio hang
            echo "<script>alert('ĐÃ CÓ SẢN PHẨM ĐÓ TRONG GIỎ HÀNG!') </script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',0)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('ĐÃ THÊM VÀO GIỎ HÀNG') </script>";

            echo "<script>window.open('index.php','_self')</script>";


        }

    }


}

//function to get cart item number
function cart_item()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();

        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'"; //co ip address la do trong moi truong ecommerce chung ta phai tach ip cua moi nguoi khi thanh toan gio hang (neu trung ip thi them vao cart khac ip thi kh them)
        $result_query = mysqli_query($con, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();

        $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'"; //co ip address la do trong moi truong ecommerce chung ta phai tach ip cua moi nguoi khi thanh toan gio hang (neu trung ip thi them vao cart khac ip thi kh them)
        $result_query = mysqli_query($con, $select_query);
        $count_cart_item = mysqli_num_rows($result_query);


    }
    echo $count_cart_item;

}

//total price function 

function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "Select * from `cart_details` where ip_address = '$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];  //se chon ip cua user 1
        $select_products = "Select * from `products` where product_id = '$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total_price += $product_values;
        }

    }
    echo $total_price;

}

//func for get user orders and show orders details
function get_user_order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $get_details = "Select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con, $get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['my_orders'])) {
                    $get_orders = "Select * from `user_orders` where user_id='$user_id' and order_status='pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if ($row_count > 0) {
                        echo "<h3 class='text-center mt-5 mb-4' > Bạn có <span class='text-danger'> $row_count </span> đơn hàng đang chờ </h3>
                       <p class='text-center'><a href='profile.php?my_orders'> Chi tiết đơn hàng </a></p> ";

                    } else {
                        echo "<h3 class='text-center mt-5 mb-4 ' > Bạn không có đơn hàng nào </h3>
                       <p class='text-center'><a href='../index.php'> Khám phá kho sách </a></p> ";
                    }
                }
            }
        }
    }
}


