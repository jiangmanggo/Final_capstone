<?php
    require '../../logic/db_connection.php';
    if (isset($_POST['order_id']) && isset($_POST['status'])) {
        $id = $_POST['order_id'];
        $status = $_POST['status'];

        mysqli_query($connect, "UPDATE `order` SET `status`='$status' WHERE order_id='$id'");

        $newStatusText = getStatusText($status);

        echo $newStatusText; 

        if (isset($_GET['order_id']) && isset($_GET['status'])) {
                $id = $_GET['order_id'];
                $status = $_GET['status'];
                mysqli_query($connect, "UPDATE order SET `status`='$status' WHERE order_id='$id'");
                
                echo "<script>document.getElementById('status_$id').textContent = getStatusText($status);</script>";
                
                header("location:pending_orders.php");
            }
    }
?>
