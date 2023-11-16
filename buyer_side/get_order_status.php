<?php
ob_start();
session_start();
require("../logic/db_connection.php");

if (isset($_POST['reference_no'])) {
    $reference_no = $_POST['reference_no'];
    // Fetch the seller ID based on the reference number (you may need to adjust your query)
    $query = "SELECT `seller_id`, `status` FROM `order` WHERE reference_no = '$reference_no'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $seller_id = $row['seller_id']; // Retrieve the seller_id from the database
        $orderStatus = $row['status'];

        echo json_encode(array('status' => $orderStatus, 'seller_id' => $seller_id));
    } else {
        echo json_encode(array('status' => "Error: Unable to fetch order status."));
    }
} else {
    echo json_encode(array('status' => "Error: Reference number not provided."));
}

?>
