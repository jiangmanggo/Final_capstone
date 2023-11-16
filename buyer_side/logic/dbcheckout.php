<?php
    require('../logic/db_connection.php');

    $client_id = $_SESSION['id'];

    $cart_query = mysqli_query($connect, "SELECT `farmer`.`address`, `cart`.`seller_id`, `cart`.`product_id`, `cart`.`client_id` ,`cart`.`product_name`, `cart`.`quantity`, `cart`.`price` FROM `farmer` INNER JOIN `cart` ON `farmer`.`seller_id` = `cart`.`seller_id` WHERE `cart`.`client_id` = '$client_id'");


?>
