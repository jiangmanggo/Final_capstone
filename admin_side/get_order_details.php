<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
session_start();
require("../logic/db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reference_no'])) {
    $admin_id = $_SESSION['id']; 
    $reference_no = $_POST['reference_no'];
    $seller_id = $_POST['seller_id'];

    $query = "SELECT * FROM `order`
        WHERE `seller_id` = '$seller_id'
        AND `reference_no` = '$reference_no'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        $orderDetails = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $orderDetails[] = array(
                'product_name' => $row['product_name'],
                'quantity' => $row['quantity'],
                'price' => $row['price']
            );
        }
        echo json_encode($orderDetails);
        exit();
    } else {
        echo json_encode(array('error' => 'Database query error'));
        exit();
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
    exit();
}

?>


