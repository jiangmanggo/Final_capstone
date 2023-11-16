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
                $admin_id = $_SESSION['id'];

                $adminQuery = "SELECT `fullname` FROM association_chairman WHERE admin_id = '$admin_id'";
                $adminResult = mysqli_query($connect, $adminQuery);

                if ($adminResult) {
                    $adminRow = mysqli_fetch_assoc($adminResult);
                    $fullname = $adminRow['fullname'];

                    echo "Welcome, Chairman: '$fullname";
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