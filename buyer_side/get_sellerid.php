<?php
session_start();
require("../logic/db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reference_no'])) {
    $client_id = $_SESSION['id'];
    $reference_no = $_POST['reference_no'];

    // Fetch seller ID based on client ID and reference number
    $sellerQuery = "SELECT seller_id FROM `order`
                    WHERE `client_id` = '$client_id'
                    AND `reference_no` = '$reference_no'";
    $sellerResult = mysqli_query($connect, $sellerQuery);

    if ($sellerResult && mysqli_num_rows($sellerResult) > 0) {
        $sellerRow = mysqli_fetch_assoc($sellerResult);
        $seller_id = $sellerRow['seller_id'];

        echo json_encode(array('seller_id' => $seller_id));
    } else {
        echo json_encode(array('error' => 'Seller ID not found for the given parameters.'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request.'));
}
?>
