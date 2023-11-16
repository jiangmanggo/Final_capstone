<?php
    require("../../logic/db_connection.php");
    session_start();
    if(isset($_GET['ID'])){
        $product_id = $_GET['ID'];
        $id = $_SESSION['id'];
        
        $seller_id_query = mysqli_query($connect, "SELECT `seller_id` FROM `product_list` WHERE `seller_id` = '$seller_id'");
        
        if ($seller_id_query) {
            $seller_row = mysqli_fetch_assoc($seller_id_query);
            $seller_id = $seller_row['seller_id'];
            
            $product_name;
            $price;
            $image;
            try {
                $product_info_query = mysqli_query($connect, "SELECT `product_name`, `price`, `image` FROM `product_list` WHERE `product_id` = '$product_id';");
                $row = mysqli_fetch_assoc($product_info_query);
                $product_name = $row['product_name'];
                $price = $row['price'];
                $image = $row['image'];
            } catch (\Throwable $th) {
                echo $th;
            }

            try {
                
                mysqli_query($connect, "INSERT INTO `cart`(`seller_id`, `product_id`,`client_id`, `product_name`, `image`, `price`) VALUES ('$seller_id', '$product_id','$id','$product_name','$image','$price');");
                header("Location: ../addcart.php");
            } catch (\Throwable $th) {
                echo $th;
            }
        } else {
            
            echo "Seller ID not found for product with ID: $product_id";
        }
    }
?>
