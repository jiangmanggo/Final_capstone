<?php
session_start();
require("../logic/db_connection.php");

$reference_no = mysqli_real_escape_string($connect, $_GET['reference_no']);
$seller_id = mysqli_real_escape_string($connect, $_GET['seller_id']);

// Add the logic to update order status to 'received'
$queryUpdateOrderStatus = "UPDATE `order` SET `status` = 'received' WHERE `reference_no` = '$reference_no' AND `seller_id` = '$seller_id'";
$updateResult = mysqli_query($connect, $queryUpdateOrderStatus);

if (!$updateResult) {
    die('Error: ' . mysqli_error($connect));
}

// Check if the main query was successful before executing the subquery
if ($updateResult) {
    // Your subquery to update the product_list table
    $subquery = "UPDATE `product_list` AS pl
                INNER JOIN (
                    SELECT o.`product_id`, o.`seller_id`, SUM(o.`quantity`) AS `total_quantity`
                    FROM `order` AS o
                    WHERE o.`reference_no` = '$reference_no'
                    GROUP BY o.`product_id`, o.`seller_id`
                ) AS order_summary ON pl.`product_id` = order_summary.`product_id` AND pl.`seller_id` = order_summary.`seller_id`
                SET pl.`stocks` = pl.`stocks` - order_summary.`total_quantity`
                WHERE pl.`product_id` = order_summary.`product_id` AND pl.`seller_id` = order_summary.`seller_id`";

    $subresult = mysqli_query($connect, $subquery);

    if (!$subresult) {
        die('Error in subquery: ' . mysqli_error($connect));
    }
}

// Redirect back to the order details page
header('Location: order_details.php?reference_no=' . $reference_no . '&seller_id=' . $seller_id);
exit();
?>
