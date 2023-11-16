<?php
    require_once '../logic/db_connection.php';
    $product_id = $_GET['ID'];
    $sql = "SELECT farmer.username, product_list.product_name, product_list.image, product_list.price, product_list.description, product_list.date_posted, product_list.seller_id, product_list.stocks, product_list.quantity, product_list.product_category, product_list.product_id, product_list.unit FROM product_list INNER JOIN farmer ON farmer.seller_id = product_list.seller_id WHERE product_list.product_id ='$product_id'";
    $queryGetAllProducts = $connect->query($sql); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet" /> 
        <link href="../css/buyer_view_item.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <?php
            include 'includes/header.php';
            while($product_listrow = mysqli_fetch_assoc($queryGetAllProducts)){
        ?>
        <link rel='stylesheet' href='https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css'>
        <div class="container-fluid mt-2 mb-3"> 
            <div class="row no-gutters"> 
                <div class="col-md-5 pr-2"> 
                    <div class="box"> 
                        <div class="demo"> 
                            <ul id="lightSlider"> 
                                    <img height="420" width="360" src="../uploads/<?php echo $product_listrow["image"]; ?> " ;/> 
                                </ul>
                        </div> 
                    </div> 
                    <div class="cards"> 
                        <div class="badges">                           
                            <span class="badge "> 
                        </div> 
                            <div class="comment-section"> 
                                <div class="d-flex justify-content-between align-items-center"> 
                                    <div class="d-flex flex-row align-items-center"> 
                                        <div class="d-flex flex-column ml-1 comment-profile"> 
                                            <div class="comment-ratings"> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                                <i class="fa fa-star"></i> 
                                            </div> 
                                        </div> 
                                    </div> 
                                </div>    
                            </div> 
                        </div> 
                    </div>  
                    <div class="col-md-7"> 
                        <div class="container">  
                            <div class="about"> 
                                <span class="font-weight-bold"><?php echo $product_listrow["product_name"]; ?> </span>
                                <h4 class="font-weight-bold"><?php echo "₱". " ".$product_listrow["price"].".00 / " . $product_listrow["unit"] ;?> </h4> 
                            </div> 
                            <div class="quantity">                                  
                                <div class="stocks"> 
                                <span class="font-weight-bold">Stocks available: &nbsp; <?php echo $product_listrow["stocks"]. " ". $product_listrow["unit"]; ?> <br>
                                <span class="font-weight-bold">Minimum Quantity: &nbsp; <?php echo $product_listrow["quantity"];?><br>                                   
                            </div> 
                            </div>
                            <div class="button"> 
                                <a href="logic/addtocart.php?ID=<?php echo $product_listrow['product_id']?>"><button class="btn btn-outline-warning btn-long cart" name="add_to_cart" type="submit" id="addToCartButton">Add to Cart</button></a>
                                <div id="cartAlert" class="alert">
                                    <?= $product_listrow["product_name"]; ?> Has been successfully added to the cart!
                                </div>
                                <a href="checkout.php?ID=<?php echo $product_listrow['product_id']?>"><button class="btn btn-warning btn-long buy">Buy it Now</button></a>
                            </div>                             
                            <div class="description"> 
                                <span class="font-weight-bold"> <b>Description</b></span> 
                                <p><?php echo $product_listrow["description"];?></p> 
                            </div> 
                            <div class="date dmt-2">Date posted:
                                    <?php echo $product_listrow["date_posted"];?></div>
                            <div class="store mt-1"> 
                                <a href="../farmer_side/visitprofile.php"><span class="font-weight-bold">Seller:  <?php echo $product_listrow["username"];?></span> </a>                              
                            </div>                                
                        </div> 
                    </div>                    
                </div> 
            </div>
        </div> 
        <?php
            }
        ?>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>
        <script src='https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js'></script>
        <script> $('#lightSlider').lightSlider({ gallery: true, item: 1, loop: true, slideMargin: 0, thumbItem: 9 });</script>
        <script>
            const addToCartButton = document.getElementById('addToCartButton');
            const cartAlert = document.getElementById('cartAlert');

            addToCartButton.addEventListener('click', function() {
            cartAlert.style.display = 'block';
            setTimeout(function() {
            cartAlert.style.display = 'none'; 
            }, 3000);
            });
        </script>
    </body>
</html>