<?php
    require '../../logic/db_connection.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $client_id = $_GET['ID'];

        function checkqr_num($connect, $qrnum){
            $getqrnum = mysqli_query($connect, "SELECT `reference_no` FROM `order`;");
            while($select_row = mysqli_fetch_assoc($getqrnum)){
                if($select_row['reference_no']==$qrnum){
                    $uni = true;
                    break;
                }else{
                    $uni = false;
                }
            }
            return $uni;
        }
        
        function generate_key($connect){
            $keylength = 10;
            $str = "1234567890";
            $randomkey = substr(str_shuffle($str), 0, $keylength);
            
            $checkkey = checkqr_num($connect, $randomkey);
        
            while($checkkey == true){
                $randomkey = substr(str_shuffle($str), 0, $keylength);
                $checkkey = checkqr_num($connect, $randomkey);
            }
        
            return $randomkey;
        }
        
        $uniq = generate_key($connect);

        try {
            $sql_prod = mysqli_query($connect, "SELECT buyer.fname, buyer.lname, buyer.phonenumber, cart.seller_id, cart.client_id, cart.product_name, cart.price, cart.quantity, cart.product_id FROM buyer JOIN cart ON buyer.client_id = cart.client_id WHERE buyer.client_id = '$client_id';");
        } catch (\Throwable $th) {
            echo $th;
        }

        $product = array();
        $quantity = array();
        $price = array();
        $seller_id = array();
        $fname = array();
        $lname = array();
        $phonenumber = array();
        $product_id = array();

        while($prod_row = mysqli_fetch_assoc($sql_prod)){
        $product[] = $prod_row['product_name'];
        $quantity[] = $prod_row['quantity'];
        $price[] = $prod_row['price']; 
        $seller_id[] = $prod_row['seller_id'];
        $fname[] = $prod_row['fname'];
        $lname[] = $prod_row['lname'];
        $phonenumber[] = $prod_row['phonenumber'];
        $product_id[] = $prod_row['product_id'];
        }

        for($i = 0; $i < count($product); $i++){
            try {
                $select_address_sql = mysqli_query($connect, "SELECT `address` FROM farmer WHERE `seller_id`=".$seller_id[$i]);
                $address_row = mysqli_fetch_assoc($select_address_sql);
            } catch (\Throwable $th) {
                echo $th;
            }
            if($_POST['select_box'] == 'pick up'){
                $address = $_POST['select_box'];
            } else {
                $address = $address_row['address'];
            }

            try {
                mysqli_query($connect, "INSERT INTO `order`(`seller_id`, `reference_no`, `product_id`, `client_id`, `fname`, `lname`, `number`, `address`, `product_name`, `quantity`, `price`, `status`, `date_ordered`) VALUES ('$seller_id[$i]', '$uniq', '$product_id[$i]', '$client_id', '$fname[$i]', '$lname[$i]', '$phonenumber[$i]', '$address', '$product[$i]', '$quantity[$i]', '$price[$i]', 'pending', NOW())");
            } catch (\Throwable $th) {
                echo $th;
            }
        }
    
    $delete_cart_query = "DELETE FROM cart WHERE client_id = '$client_id'";
    $delete_cart_result = mysqli_query($connect, $delete_cart_query);

    if ($delete_cart_result) {
        
        header('Location: ../order_history.php');
    } else {
       
        echo "Error deleting cart items: " . mysqli_error($connect);
    }
    }
?>
