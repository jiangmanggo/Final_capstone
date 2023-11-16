<?php
    require("../../logic/db_connection.php");
    session_start();

    if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
        $admin_id = $_GET['remove'];

        $deleteQuery = "DELETE FROM `association_chairman` WHERE `admin_id` = $admin_id";

        if (mysqli_query($connect, $deleteQuery)) {

            header("Location: ../admin.php");
            exit();
        } else {

            echo "Error deleting the buyer: " . mysqli_error($connect);
        }
    }
?>

    
    

