<?php
    session_start();
    require('db_connection.php');
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    try {
        $result=mysqli_query($connect, "SELECT * FROM `buyer` WHERE username = '$username' AND password = '$password';");
        $row = mysqli_fetch_assoc($result); 
        if(!empty($row)){
            $_SESSION['id'] = $row['client_id'];
            header('Location:   ../buyer_side/index.php?id='.$row['client_id']);
        } else { 
            try {
                $farmer=mysqli_query($connect, "SELECT * FROM `farmer` WHERE username = '$username' AND password = '$password';"); 
                $farmer_row = mysqli_fetch_assoc($farmer);
                if(!empty($farmer_row)){
                    $_SESSION['id'] = $farmer_row['seller_id'];
                    header('Location:   ../farmer_side/index.php?id='.$farmer_row['seller_id']);
                    
                } else {
                    try {
                        $city_agriculture=mysqli_query($connect, "SELECT * FROM `super_admin` WHERE username = '$username' AND password = '$password';"); 
                        $city_agriculture_row = mysqli_fetch_assoc($city_agriculture);
                        if(!empty($city_agriculture_row)){
                            $_SESSION['id'] = $city_agriculture_row['super_admin_id'];
                            header('Location:   ../superA_side/index.php?id='.$city_agriculture_row['super_admin_id']);
                        } else {
                            try {
                                $association_chairman=mysqli_query($connect, "SELECT * FROM `association_chairman` WHERE username = '$username' AND password = '$password';"); 
                                $association_chairman_row = mysqli_fetch_assoc($association_chairman);
                                if(!empty($association_chairman_row)){
                                    $_SESSION['id'] = $association_chairman_row['admin_id'];
                                    header('Location:   ../admin_side/index.php?id='.$association_chairman_row['admin_id']);
                                } else {
                                    echo "<script type='text/javascript'>";
                                    echo "alert('Wrong username or password. Please try again.');";
                                    echo "window.location='../log_in.php';";
                                    echo "</script>";
                                }
                            } catch (\Throwable $th) {
                                echo $th;
                            }
                        }
                    } catch (\Throwable $th) {
                        echo $th;
                    }
                }
            } catch (\Throwable $th) {
                echo $th;
            }
        }
    } catch (\Throwable $th) {
        echo $th;
    }
?>
