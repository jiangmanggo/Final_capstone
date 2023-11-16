<?php 
    require('../../logic/db_connection.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        try {
            mysqli_query($connect, "DELETE FROM `product_list` WHERE product_id = '$id';");
            header("Location: ../index.php");
        } catch (\Throwable $th) {
            echo $th;
        }
    }
?>