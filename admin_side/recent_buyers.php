<!DOCTYPE html>
<html>
    <head>
        <!-- <link href="../css/farmer_recentbuyers.css" rel="stylesheet">  -->
        <title>BCAAOMS</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
            .container {
                border: 1px solid #e8e8e8;
                width: 360px;
                padding-right: 5px;
                border-radius: 15px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                font-family: 'Poppins', sans-serif;
                background-color: #fff;
            }
            .container h5 {
                margin-bottom: 15px;
                margin-top: 3px;
                text-align: center;
                color: #818589
            }
            .list-item {
                list-style-type: none;
                margin-right: 2em;
                padding: 10px;
                background-color: #f9f9f9;
                border-bottom: 1px solid #e8e8e8;
                color: #333;
                display: flex;
                align-items: center;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);  
                width: 330px;            
            }
            .list-item img.profile-image {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                object-fit: cover;
                margin-right: 10px;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            .list-price{
                list-style-type: none;
                margin: 0;
                padding:5px;
            }
            .list-item:last-child {
                border-bottom: none;
            }
        </style> 
    </head>
    <body>
        <?php
            require '../logic/db_connection.php';

            $currentDate = date('Y-m-d');

            $seller_id = $_SESSION['id'];
            $recent_sql = "SELECT o.`order_id`, o.`product_id`, o.`price`,o.`quantity`, o.`status`, o.`client_id`, o.`date_ordered`, o.`fname` AS buyer_fname, o.`lname` AS buyer_lname, b.`profile_image`, f.`fname` AS farmer_fname, f.`lname` AS farmer_lname, f.`association` AS farmer_association FROM `order` o INNER JOIN buyer b ON o.client_id = b.client_id INNER JOIN farmer f ON o.seller_id = f.seller_id INNER JOIN `association_chairman` ON f.`association` = `association_chairman`.`association` AND `association_chairman`.`admin_id` = '$admin_id' WHERE o.status = 'received' AND DATE(o.`date_ordered`) = '$currentDate' ORDER BY o.`date_ordered` DESC LIMIT 3";
 
            $recentbuyerrow = $connect->query($recent_sql);

            echo '<div class="container">';
            echo '<h5>Recent Buyers</h5>';
            echo '<ul>';

            if ($recentbuyerrow->num_rows > 0) {
                while ($row = $recentbuyerrow->fetch_assoc()) {
                    echo '<li class="list-item"><img class="profile-image" src="../uploads/' . $row['profile_image'] . '" alt="Profile Image"><span>' . $row['buyer_fname'] . ' ' . $row['buyer_lname'] . ' | &nbsp ₱ ' . $sub_total = number_format($row["price"] * $row["quantity"]) . ' | &nbsp ' .  $row['farmer_fname'] . ' ' . $row['farmer_lname'] . '</span></li>';
                }
            } else {
                
                echo '<li class="list-item">No orders today</li>';
            }

            echo '</ul>';
            echo '</div>';
        ?>
    </body>
</html>