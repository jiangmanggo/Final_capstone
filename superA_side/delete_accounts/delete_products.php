<?php
require("../../logic/db_connection.php");
session_start();

if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $product_id = $_GET['remove'];

    // Perform a DELETE query to remove the buyer from the database
    $deleteQuery = "DELETE FROM `product_list` WHERE `product_id` = $product_id";

    if (mysqli_query($connect, $deleteQuery)) {
        // Account deleted successfully, you can redirect to the buyer list page or show a success message.
        header("Location: ../products.php"); // Change this to your actual page.
        exit();
    } else {
        // Handle the error, e.g., display an error message.
        echo "Error deleting the buyer: " . mysqli_error($connect);
    }
}
?>

    
    

