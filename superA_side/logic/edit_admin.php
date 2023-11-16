<?php 
    session_start();
    require ("../../logic/db_connection.php"); 
    if(isset($_POST['association'])&&isset($_POST['full_name'])&&isset($_POST['username'])){
        
        $id = $_GET['id'];
        $association = $_POST['association'];
        $fullname = $_POST['full_name'];
        $username = $_POST['username'];
        
        try{
            mysqli_query($connect, "UPDATE `association_chairman` SET `association`='$association',`fullname`='$fullname',`username`='$username' WHERE `admin_id`='$id';");
            header('Location: ../admin.php');
        }catch(\Throwable $th){
            echo $th;
        }
                                        
    }
       
?>

        
