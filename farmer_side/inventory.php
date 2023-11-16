<?php
    session_start();
    include 'includes/sidebar.php';
    require '../logic/db_connection.php';

    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
        exit();
    }

    $seller_id = $_SESSION['id'];

    $select_query = "SELECT pl.product_category, pl.product_name, pl.stocks AS stocks, (SELECT SUM(o.quantity) FROM `order` o  WHERE o.product_id = pl.product_id AND o.seller_id = '$seller_id' AND o.status = 'received') AS quantity_purchased, pl.date_posted, pl.unit, pl.product_id FROM product_list pl WHERE pl.seller_id = '$seller_id';";

    $result_select = $connect->query($select_query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="../css/farmer_inventory.css" rel="stylesheet"> 
        <title>BCAAOMS</title>
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
            <?php include 'includes/seller_indicator.php' ?>
                <div class="page-header">
                    <h5>Farmer</h5>
                    <small>Home / Pending Orders</small>
                </div>
                <div class="print" style="padding-left: 89%">
                    <button class="btn btn-success" onclick="printTable()">Print</button><br><br>
                </div>      
                <div class="container">
                        <div class="card rounded shadow border-0">
                            <div class="card-body p-2 bg-white rounded">
                                <div class="table-responsive">
                                    <table id="inventory" style="width:100%" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Category</th>
                                                <th>Product Name</th>
                                                <th>Quantity Purchased</th>
                                                <th>Remaining Stocks</th>
                                                <th>Date Posted</th>
                                                <th>Availability</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if ($result_select) {
                                                    while ($row = $result_select->fetch_assoc()) {
                                                        $availability = ($row['stocks'] <= 0) ? 'Out of Stock' : 'In Stock';
                                                        $availabilityClass = ($row['stocks'] <= 0) ? 'out-of-stock' : '';
                                                
                                                        echo "<tr class='$availabilityClass'>";
                                                        echo "<td>" . $row['product_category'] . "</td>";
                                                        echo "<td>" . $row['product_name'] . "</td>";
                                                        echo "<td>" . $row['quantity_purchased'] . " " . $row["unit"] . "</td>";
                                                        echo "<td>" . ($row['stocks'] ?? 'N/A') . " " . $row["unit"] . "</td>";
                                                        echo "<td>" . $row['date_posted'] . "</td>";
                                                        echo "<td>" . $availability . "</td>";
                                                        echo "</tr>";
                                                
                                                        // Check if the product is sold out and display an alert
                                                        if ($row['stocks'] <= 0) {
                                                            echo "<script type='text/javascript'>";
                                                            echo "alert('The product " . $row['product_name'] . " is sold out.');";
                                                            echo "</script>";
                                                        }
                                                    }
                                                } else {
                                                    echo "Select failed: " . $connect->error;
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#inventory').DataTable();
                
            });
        </script>
        <script>
                
            function printTable() {
                var printWindow = window.open('', '', 'width=800,height=600');
                printWindow.document.write('<html><head><title>Print</title>');
                printWindow.document.write('<style>body {  align-items: center; text-align: center; }</style>');
                printWindow.document.write('</head><body>');
                printWindow.document.write('<div style="margin-bottom: 5px;"><img src="../image/agri.png" alt="" style="width: 70px; height: auto;"></div>');
                printWindow.document.write('<div><h4>Office of the City Agriculture</h4></div>');
                printWindow.document.write('<div style="text-align: left; margin-bottom: 20px;"><h5>Inventory</h5></div>');
                printWindow.document.write(document.getElementById('inventory').outerHTML);
                printWindow.document.write('</body></html>');
                printWindow.document.write('<style>table, th, td {border: 1px solid black; border-collapse: collapse; padding: 8px;}</style>');
                printWindow.document.close();
                printWindow.print();
            }
        </script>
    </body>
</html> 