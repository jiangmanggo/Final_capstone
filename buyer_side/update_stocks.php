<?php

session_start();
require("../logic/db_connection.php");

// Assuming you're passing the reference_no through POST
$reference_no = mysqli_real_escape_string($connect, $_POST['reference_no']);

$subquery = "UPDATE `product_list` AS pl
                INNER JOIN (
                    SELECT o.`product_id`, o.`seller_id`, SUM(o.`quantity`) AS `total_quantity`
                    FROM `order` AS o
                    WHERE o.`reference_no` = '$reference_no'
                    GROUP BY o.`product_id`, o.`seller_id`
                ) AS order_summary ON pl.`product_id` = order_summary.`product_id` AND pl.`seller_id` = order_summary.`seller_id`
                SET pl.`stocks` = pl.`stocks` - order_summary.`total_quantity`
                WHERE pl.`product_id` = order_summary.`product_id` AND pl.`seller_id` = order_summary.`seller_id`";

$result = mysqli_query($connect, $subquery);

if (!$result) {
    die('Error: ' . mysqli_error($connect));
} else {
    echo "Stocks updated successfully.";
}

mysqli_close($connect);
?>
