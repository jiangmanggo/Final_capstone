<!DOCTYPE html>
<html>
    <head>
        <style>
            .indicator-card {
                position: fixed;
                top: 15px; 
                right: 20px;
                background-color: #B4D3B2;
                border: 1px solid #ccc;
                padding: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class="indicator-card">
            <?php
            require '../logic/db_connection.php';

            if (isset($_SESSION['id'])) {
                $super_admin_id = $_SESSION['id'];

                $adminQuery = "SELECT `username` FROM super_admin WHERE super_admin_id = '$super_admin_id'";
                $adminResult = mysqli_query($connect, $adminQuery);

                if ($adminResult) {
                    $adminRow = mysqli_fetch_assoc($adminResult);
                    $username = $adminRow['username'];

                    echo "Welcome, Super Admin: $username";
                } else {
                    echo "Unable to retrieve super admin information.";
                }
            } else {
                echo "User not logged in.";
            }
            ?>
        </div>
    </body>
</html>