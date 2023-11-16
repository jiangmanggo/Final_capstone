<!DOCTYPE html>
<html>
    <head>
        <link href="../css/farmer_recentbuyers.css" rel="stylesheet"> 
        <title>BCAAOMS</title>
    </head>
    <body>
        <?php
            require '../logic/db_connection.php';

            $currentDate = date('Y-m-d');

            $seller_id = $_SESSION['id'];
            $recent_sql = "SELECT o.`order_id`, o.`product_id`, o.`quantity`, o.`status`, o.`client_id`, o.`date_ordered`, o.`fname`, o.`lname`, o.`price`, o.`quantity`, b.`profile_image` FROM `order` o INNER JOIN buyer b ON o.client_id = b.client_id WHERE o.status = 'received' AND o.seller_id = '$seller_id' AND DATE(o.`date_ordered`) = '$currentDate' ORDER BY o.`date_ordered` DESC LIMIT 3";

            $recentbuyerrow = $connect->query($recent_sql);

            echo '<div class="container">';
            echo '<h5>Recent Buyers</h5>';
            echo '<ul>';

            if ($recentbuyerrow->num_rows > 0) {
                while ($row = $recentbuyerrow->fetch_assoc()) {
                    echo '<li class="list-item"><img class="profile-image" src="../uploads/' . $row['profile_image'] . '" alt="Profile Image"><span>' . $row['fname'] . ' ' . $row['lname'] . ' | &nbsp ₱ ' . $sub_total = number_format($row["price"] * $row["quantity"]) . '</span></li>';
                }
            } else {
                
                echo '<li class="list-item">No orders today</li>';
            }

            echo '</ul>';
            echo '</div>';
        ?>
    </body>
</html>