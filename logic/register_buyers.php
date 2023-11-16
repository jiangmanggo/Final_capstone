<?php
    session_start(); 

    require('db_connection.php');

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['phonenumber']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $confirm = md5($_POST['confirm']);
        
        
        if(strlen($phonenumber) != 11 || !ctype_digit($phonenumber)){
            ?>
                <script>
                    alert("Invalid phone number. Please enter a valid 11-digit phone number.");
                    window.location="../register_buyer.php";
                </script>
            <?php
        } elseif($password != $confirm) {
            ?>
                <script>
                    alert("Password does not match");
                    window.location="../register_buyer.php";
                </script>
            <?php
        } else {
            $_SESSION['error'] = array();
            try {
                
                $emailResult = mysqli_query($connect, "SELECT `email` FROM `buyer` WHERE `email` = '$email';");
                $emailRow = mysqli_fetch_assoc($emailResult);

                
                $usernameResult = mysqli_query($connect, "SELECT `username` FROM `buyer` WHERE `username` = '$username';");
                $usernameRow = mysqli_fetch_assoc($usernameResult);

               
                $phoneNumberResult = mysqli_query($connect, "SELECT `phonenumber` FROM `buyer` WHERE `phonenumber` = '$phonenumber';");
                $phoneNumberRow = mysqli_fetch_assoc($phoneNumberResult);
            } catch (\Throwable $th) {
                echo $th;
            }

            if(empty($emailRow) && empty($usernameRow) && empty($phoneNumberRow)){
                try {
                    mysqli_query($connect, "INSERT INTO `buyer`(`fname`, `lname`, `address`, `email`, `phonenumber`, `username`, `password`) VALUES ('$fname','$lname','$address','$email','$phonenumber','$username','$password')");
                    echo "<script type='text/javascript'>";
                    echo "window.location='../log_in.php';";
                    echo "</script>";
                    
                } catch (\Throwable $th) {
                    echo $th;
                }
            } else {
                if (!empty($emailRow)) {
                    ?>
                    <script>
                        alert("Email is already used");
                        window.location="../register_buyer.php";
                    </script>
                    <?php
                }
                if (!empty($usernameRow)) {
                    ?>
                    <script>
                        alert("Username is already taken");
                        window.location="../register_buyer.php";
                    </script>
                    <?php
                }
                if (!empty($phoneNumberRow)) {
                    ?>
                    <script>
                        alert("Mobile number is already used");
                        window.location="../register_buyer.php";
                    </script>
                    <?php
                }
            }
        }
    }
?>
