<?php 
    session_start();
    require '../logic/db_connection.php';
    
    if(isset($_POST['update_update_btn'])){
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];

        $seller_id = $_SESSION['id'];
        $product_id = $_POST['product_id']; 

        $fetch_product_list_query = mysqli_query($connect, "SELECT seller_id FROM product_list WHERE product_id = $product_id");
        var_dump($fetch_product_list_query);
        if ($fetch_product_list_query) {
            
            $product_list_row = mysqli_fetch_assoc($fetch_product_list_query);
            $update_seller_id = $product_list_row['seller_id'];

            $update_quantity_query = mysqli_query($connect, "UPDATE cart SET quantity = '$update_value', seller_id = '$update_seller_id' WHERE cart_id = '$update_id'");

            if ($update_quantity_query) {
                header('location:addcart.php');
            }
        }
    }
    if(isset($_GET['remove'])){
        $remove_id = $_GET['remove'];
        mysqli_query($connect, "DELETE FROM cart WHERE cart_id = '$remove_id'");
        header('location:addcart.php');
    };
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../css/buyer_addcart.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">         
        <title>BCAAOMS</title>
    </head>
    <body>
        <?php 
            include 'includes/header.php';
        ?><br>
        <div class="container">
            <section class="shopping-cart">
                <table>
                    <thead>
                        <th>Image</th>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                        <th>Action</th>
                    </thead>
                    <tbody>    
                        <?php 
                            $client_id = $_SESSION['id'];
                            $grand_total = 0;
                            $select_cart_query = "SELECT * FROM cart WHERE client_id = $client_id";
                            $select_cart = mysqli_query($connect, $select_cart_query);

                            if (!$select_cart) {
                                die("Query failed: " . mysqli_error($connect));
                            }

                            if (mysqli_num_rows($select_cart) > 0){
                                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                        ?>      
                        <tr> 
                            <td><img src="../uploads/<?php echo $fetch_cart["image"]; ?>" height="100"></td>
                            <td><?php echo $fetch_cart["product_name"];?></td>
                            <td>₱<?php echo number_format($fetch_cart["price"], 2, '.', ',' ); ?></td>
                            <td>
                                <form action="" method="post">
                                    <p>
                                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['cart_id']; ?>">
                                        <input type="number" name="update_quantity" value="<?php echo max($fetch_cart["quantity"], 1); ?>" min="1">
                                        <input type="hidden" name="product_id"  value="<?php echo $fetch_cart["product_id"]; ?>" >
                                        <input type="submit" value="&#8635;" min="1" name="update_update_btn" class="update-btn update" >
                                    </p>
                                </form>
                            </td>
                            <td>₱<?php echo $sub_total = number_format($fetch_cart["price"] * $fetch_cart["quantity"]); ?> </td>
                            <td><a href="addcart.php?remove=<?php echo $fetch_cart['cart_id']; ?>" onclick="return confirm('Are you sure you want to remove item in the cart?');" type="button" class="btn btn-danger btn-danger me-2"><i class="fas fa-trash"></i> Remove</a></td>

                        </tr>
                        <?php 
                           $grand_total += $sub_total;
                            };
                            };
                            
                            if (mysqli_num_rows($select_cart) > 0) {
                                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                };
                            };
                        ?>
                        <div class="table-bottom">
                            <td colspan="7">Grand total : 
                            <?php echo number_format($grand_total, 2, '.', ','); ?></td>
                        </div>        
                    </tbody>
                </table>
            </section>
        </div>
        <div class="bod">
            <div class="back" ><td colspan="7"> <a href="index.php" class="option-btn btn btn-success buy">Continue Shopping</a></div> 
            <div class="check">
            <?php
                if (mysqli_num_rows($select_cart) > 0) {
                    ?>
                        <a href="checkout.php?ID=<?=$client_id ?>" type="button" class="btn btn-primary check-out <?php echo ($cart_empty); ?>">Checkout order</a>
                    <?php
               
                } else {
                    
                    echo '<input type="submit" class="btn" name="checkout_selected_btn" value="Checkout order" disabled>';
                }
            
            ?> 

        </div>
        <script>
            function checkoutSelectedProducts() {
                var selectedProducts = document.querySelectorAll('input[name="selected_products[]"]:checked');
                var productIds = [];

                for (var i = 0; i < selectedProducts.length; i++) {
                    productIds.push(selectedProducts[i].value);
                }

                if (productIds.length > 0) {
                    
                    var client_id = <?php echo $client_id; ?>;
                    window.location.href = 'checkout.php?client_id=' + client_id + '&selected_products=' + productIds.join(',');
                } else {
                    alert('Please select at least one product to checkout.');
                }
            }
        </script>
    </body>
</html>