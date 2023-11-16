<?php
    require('db_connection.php');

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['address']) && isset($_POST['association']) && isset($_POST['email']) && isset($_POST['phonenumber']) && isset($_POST['farmers_identification_number']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname']; 
        $address = $_POST['address'];
        $association = $_POST['association'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];

        
        if(strlen($phonenumber) != 11 || !is_numeric($phonenumber)){
            ?>
            <script>
                alert("Invalid Phone Number. Please enter a valid 11-digit phone number.");
                window.location="../register_farmer.php";
            </script>
            <?php
            exit();
        }

        $farmers_identification_number = $_POST['farmers_identification_number'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $confirm = md5($_POST['confirm']);

        
        $identificationCheckQuery = "SELECT `farmers_identification_number` FROM `farmer` WHERE `farmers_identification_number`='$farmers_identification_number'";
        $identificationCheckResult = mysqli_query($connect, $identificationCheckQuery);
        $identificationRow = mysqli_fetch_assoc($identificationCheckResult);

        if(empty($identificationRow)){
            ?>
            <script>
                alert("Farmer's Identification Number does not exist.");
                window.location="../register_farmer.php";
            </script>
            <?php
        } elseif($password != $confirm) {
            ?>
            <script>
                alert("Password does not match.");
                window.location="../register_farmer.php";
            </script>
            <?php
        } else {
            
            $duplicateCheckQuery = "SELECT `email`, `username`, `phonenumber` FROM `farmer` WHERE `email`='$email' OR `username`='$username' OR `phonenumber`='$phonenumber'";
            $duplicateCheckResult = mysqli_query($connect, $duplicateCheckQuery);
            $duplicateRow = mysqli_fetch_assoc($duplicateCheckResult);

            if(!empty($duplicateRow)){
                if($duplicateRow['email'] == $email){
                    ?>
                    <script>
                        alert("Email is already registered.");
                        window.location="../register_farmer.php";
                    </script>
                    <?php
                } elseif($duplicateRow['username'] == $username) {
                    ?>
                    <script>
                        alert("Username is already taken.");
                        window.location="../register_farmer.php";
                    </script>
                    <?php
                } elseif($duplicateRow['phonenumber'] == $phonenumber) {
                    ?>
                    <script>
                        alert("Phone number is already registered.");
                        window.location="../register_farmer.php";
                    </script>
                    <?php
                }
            } else {
                $_SESSION['error'] = array();
                try {
                  
                    mysqli_query($connect, "UPDATE `farmer` SET `fname`='$fname',`lname`='$lname',`address`='$address',`association`='$association',`email`='$email',`phonenumber`='$phonenumber',`username`='$username',`password`='$password' WHERE `farmers_identification_number` = '$farmers_identification_number';");
                    ?>
                    <script>
                        alert("Register Success");
                        window.location="../log_in.php";
                    </script>
                    <?php
                } catch (\Throwable $th) {
                    echo $th; 
                }
            }
        }
    }
?>