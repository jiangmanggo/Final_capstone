<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
session_start();
require("../logic/db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reference_no']) && isset($_POST['order_id'])) {
    $client_id = $_SESSION['id'];
    $reference_no = $_POST['reference_no'];
    $order_id = $_POST['order_id'];

    // Fetch seller ID based on client ID and reference number
    $sellerQuery = "SELECT seller_id FROM `order`
                    WHERE `client_id` = '$client_id'
                    AND `reference_no` = '$reference_no'";
    $sellerResult = mysqli_query($connect, $sellerQuery);

    if ($sellerResult) {
        if (mysqli_num_rows($sellerResult) > 0) {
            $sellerRow = mysqli_fetch_assoc($sellerResult);
            $seller_id = $sellerRow['seller_id'];

            // Log or print received values
            echo json_encode(array(
                'seller_id' => $seller_id,
                'received_order_id' => $order_id,
                'received_reference_no' => $reference_no
            ));

            // Now that you have the seller ID, proceed with the main query
            $orderQuery = "SELECT product_name, price, quantity FROM `order` 
                            WHERE `client_id` = '$client_id' 
                            AND `seller_id` = '$seller_id' 
                            AND `reference_no` = '$reference_no' 
                            AND `order_id` = '$order_id'";
            $orderResult = mysqli_query($connect, $orderQuery);

            if ($orderResult) {
                $response = array();
                $orderDetails = array();

                while ($row = mysqli_fetch_assoc($orderResult)) {
                    $orderDetails[] = $row;
                }

                $response['orderDetails'] = $orderDetails;
                $response['status'] = isset($orderDetails[0]['status']) ? $orderDetails[0]['status'] : '';

                echo json_encode($response);
            } else {
                // Handle database query error for the main query
                echo json_encode(array('error' => 'Database query error for order details: ' . mysqli_error($connect) . ', Query: ' . $orderQuery));
            }
        } else {
            echo json_encode(array('error' => 'Seller ID not found for the given parameters. Query: ' . $sellerQuery));
        }
    } else {
        echo json_encode(array('error' => 'Database query error for fetching seller ID: ' . mysqli_error($connect) . ', Query: ' . $sellerQuery));
    }
} else {
    echo json_encode(array('error' => 'Invalid request.'));
}
?>
