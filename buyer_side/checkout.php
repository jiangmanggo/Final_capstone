<?php
    session_start();
    require ('../logic/db_connection.php');
    include 'logic/dbcheckout.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">   
        <link href="../css/buyer_checkout.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <?php  
            include 'includes/header.php';
        ?>
        <div class="receipt">
            <form class="needs-validation" novalidate="" action="logic/dborder.php?ID=<?=$client_id ?>" method="post">
                <input type="hidden" id="client_id" >
                <input type="hidden" id="seller_id" >
                <input type="hidden" id="total_product" >
                <table class="item-table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <?php
                        $seller_id="";
                        $product = "";
                        $grand_total = 0;
                        while ($rows = mysqli_fetch_assoc($cart_query)) {
                            $seller_id = $rows['seller_id'];
                            $product = $rows['product_id'];
                            $itemProductName = $rows["product_name"];
                            $itemQuantity = $rows["quantity"];
                            $itemPrice = $rows["price"];
                            $subtotal = $itemPrice * $itemQuantity;
                            $grand_total += $subtotal;
                            $client_id = $rows['client_id'];
                    ?> 
                    <h6>Seller Address: Bry.<?= $rows['address']?>, Bago City</h6>
                    <tbody>
                        <tr>
                            <td><?php echo $rows['product_name']; ?></td>
                            <td><?php echo $rows["quantity"]; ?></td>
                            <td>₱ <?php echo number_format($itemPrice); ?></td>
                        </tr>
                    </tbody>                       
                    <?php
                    }
                    ?>
                </table>
                    <div class="total">
                        <p><strong>Total: &nbsp;</strong><?php echo "₱". " ". number_format($grand_total, 2, '.', ','); ?></p>
                    </div>
                </div>  
                <a href="logic/dborder.php"><button class="shop" type="submit" style="width:15em; margin-bottom:1em;">Continue to checkout <i class="fa-solid fa-arrow-right"></i></button></a>
            </form>
        </div>
        <br><br><br>
        <?php include '../includes/footer.php'; ?>
    </body>
</html>