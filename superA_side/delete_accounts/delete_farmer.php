<?php
    session_start();

    if (!isset($_SESSION['id'])) {

        header("Location: ../farmer.php");
        exit;
    }
 
    if (isset($_GET['remove'])) {

        $farmerIdToRemove = $_GET['remove'];

        require("../../logic/db_connection.php");

        $queryDeleteFarmer = "DELETE FROM `farmer` WHERE `seller_id` = $farmerIdToRemove";

        if (mysqli_query($connect, $queryDeleteFarmer)) {

            header("Location: ../farmer.php"); 
            exit;
        } else {

            echo "Error: " . mysqli_error($connect);
        }

        mysqli_close($connect);
    } else {

        echo "Invalid request.";
    }
?>
