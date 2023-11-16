<?php
session_start();
require("../logic/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $reference_no = mysqli_real_escape_string($connect, $_POST['reference_no']);
    $seller_id = mysqli_real_escape_string($connect, $_POST['seller_id']);
    $new_status = mysqli_real_escape_string($connect, $_POST['new_status']);

    // Update the order status
    $queryUpdateOrderStatus = "UPDATE `order` SET `status` = '$new_status' WHERE `reference_no` = '$reference_no' AND `seller_id` = '$seller_id'";
    $updateOrderStatusResult = mysqli_query($connect, $queryUpdateOrderStatus);

    if (!$updateOrderStatusResult) {
        die('Error: ' . mysqli_error($connect));
    }

    // Send a success response
    echo "Order status updated successfully";
} else {
    // Handle invalid requests
    http_response_code(400);
    echo "Invalid request";
}
?>
