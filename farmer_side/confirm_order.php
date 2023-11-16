<?php
    session_start();
    require("../logic/db_connection.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
        $seller_id = $_SESSION['id']; // Get seller ID from the session
    $reference_no = $_POST['reference_no'];
        $new_status = 'CONFIRMED'; 

        $queryUpdateStatus = "UPDATE `order` SET `status` = '$new_status' WHERE `reference_no` = '$reference_no' AND seller_id = '$seller_id'";
        if (mysqli_query($connect, $queryUpdateStatus)) {
            
            header("Location: orders.php"); 
            exit();
        } else {
            
            echo "Error confirming order: " . mysqli_error($connect);
        }
    } else {
        
        header("Location: error.php");
        exit();
    }
?>

