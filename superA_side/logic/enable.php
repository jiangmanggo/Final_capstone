<?php
require("../../logic/db_connection.php");
session_start();

if (isset($_GET['enable']) && is_numeric($_GET['enable'])) {
    $admin_id = $_GET['enable'];

    // Perform an UPDATE query to enable the account
    $updateQuery = "UPDATE `association_chairman` SET `status` = 'enabled' WHERE `admin_id` = $admin_id";

    if (mysqli_query($connect, $updateQuery)) {
        // Account enabled successfully, you can redirect to the admin page or show a success message.
        header("Location: ../admin.php"); // Change this to your actual page.
        exit();
    } else {
        // Handle the error, e.g., display an error message.
        echo "Error enabling the account: " . mysqli_error($connect);
    }
}
?>
