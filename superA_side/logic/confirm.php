<?php
require('../../logic/db_connection.php');
if(isset($_POST['username'])&&isset($_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    try {
        $sql = mysqli_query($connect, "SELECT * FROM super_admin WHERE username = '$username' AND password ='$password';");
        $count = mysqli_num_rows($sql);
        echo $count;
    } catch (\Throwable $th) {
        echo $th;
    }
}
?>