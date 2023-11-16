<?php
    require_once '../logic/db_connection.php';

    if(isset($_POST['submit'])){
        $name = $_POST['query'];
        $select_products = mysqli_query($connect, "SELECT farmer.username, product_list.product_name, product_list.image, product_list.price, product_list.stocks, product_list.description, product_list.date_posted, product_list.seller_id, product_list.quantity, product_list.product_category, product_list.product_id FROM product_list INNER JOIN farmer ON farmer.seller_id = product_list.seller_id WHERE (product_list.product_name = '$name' OR farmer.username = '$name') AND product_list.stocks > 0;");
    } else {
        $select_products = mysqli_query($connect, "SELECT farmer.username, product_list.product_name, product_list.image, product_list.price, product_list.stocks, product_list.description, product_list.date_posted, product_list.seller_id, product_list.quantity, product_list.product_category, product_list.product_id FROM product_list INNER JOIN farmer ON farmer.seller_id = product_list.seller_id WHERE product_list.stocks > 0;");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" />
        <link href="../css/buyer_index.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <?php
        include 'includes/header.php';
        ?>
        <form action="" method="POST" class="search-form">
            <input type="text" name="query" placeholder="Search product" class="search-text">
            <button type="submit" name="submit"><i class="fas fa-search"></i></button>   
        </form>
        <main>
            <?php
                while($product_listrow = mysqli_fetch_assoc($select_products)){
            ?> 
            <div class="content" name="card_content">
                <div class="card" onclick="window.location='view_item.php?ID=<?php echo $product_listrow['product_id']; ?>'">
                    <div class="img">
                        <img height="160" width="170" src="../uploads/<?php echo $product_listrow["image"]; ?>" alt="NO IMAGE">
                    </div>
                    <div class="caption-1">
                        <p class="product_category"><?php echo $product_listrow["product_category"];?></p> 
                    </div>
                    <div class="caption-2">
                        <p class="product_name"><?php echo strtoupper($product_listrow["product_name"]);?></p>
                        <p class="price"><b>₱<?php echo number_format($product_listrow["price"], 2, '.', ',');?></b></p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </main>
    <?php
    include '../includes/footer.php'
    ?>
</body>
</html>
