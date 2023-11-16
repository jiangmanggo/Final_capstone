<?php
require("../../logic/db_connection.php");
session_start();

if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $admin_id = $_GET['remove'];

    // Perform an UPDATE query to disable the account
    $updateQuery = "UPDATE `association_chairman` SET `status` = 'disabled' WHERE `admin_id` = $admin_id";

    if (mysqli_query($connect, $updateQuery)) {
        // Account disabled successfully, you can redirect to the admin page or show a success message.
        header("Location: ../admin.php"); // Change this to your actual page.
        exit();
    } else {
        // Handle the error, e.g., display an error message.
        echo "Error disabling the account: " . mysqli_error($connect);
    }
}
?>
