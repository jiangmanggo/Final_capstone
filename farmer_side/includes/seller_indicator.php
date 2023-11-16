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
                $seller_id = $_SESSION['id'];

                $sellerQuery = "SELECT fname, lname FROM farmer WHERE seller_id = '$seller_id'";
                $sellerResult = mysqli_query($connect, $sellerQuery);

                if ($sellerResult) {
                    $sellerRow = mysqli_fetch_assoc($sellerResult);
                    $fname = $sellerRow['fname'];
                    $lname = $sellerRow['lname'];

                    echo "Welcome, Seller: $fname $lname";
                } else {
                    echo "Unable to retrieve seller information.";
                }
            } else {
                echo "User not logged in.";
            }
            ?>
        </div>
    </body>
</html>