<?php require "../../logic/db_connection.php"; 
    if(isset($_POST['submit'])){
        $association= $_POST['association'];
        $fullname= $_POST['fullname'];
        $username= $_POST['username'];
        $password = md5($_POST['password']);

        $sql="INSERT INTO `association_chairman`(`association`, `fullname`, `username`, `password`) VALUES ('$association', '$fullname', '$username', '$password')";
        $result=mysqli_query($connect,$sql);
            if($result){
             
                header('location:../admin.php');
            }else{
                die(mysqli_error($connect));
        }
    }
 ?>
