<?php
    require("../logic/db_connection.php");
?>
<!DOCTYPE html> 
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/buyer_header.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <nav class="header">
            <img src="../image/logo.png" onclick="window.location='index.php'" alt="">
            <div class="infos">
                <div class="info">
                    <div class="categories">
                    <a href="index.php"><div class="category focus" id="home">HOME</div></a>
                    <a href="order_history.php"><div class="category" id="order">ORDER</div></a>           
                    <a href="addcart.php"><div class="category-cart" id="cart">CART</div></a>
                    <a href="buyer_profile.php"><div class="category-profile" id="profile">PROFILE</div></a>
                </div>
            </div>    
        </nav>    
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
</html>
