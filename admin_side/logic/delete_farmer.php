<?php 
    require('../../logic/db_connection.php');
    if(isset($_GET['id'])){
        $seller_id = $_GET['id'];
        try {
            mysqli_query($connect, "DELETE FROM `farmer` WHERE seller_id = '$seller_id';");
            header("Location: ../farmer.php");
        } catch (\Throwable $th) {
            echo $th;
        }
    }
?>