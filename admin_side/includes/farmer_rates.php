<?php
    require '../logic/db_connection.php';
    
    if (isset($_SESSION['id'])) {
        $admin_id = $_SESSION['id'];

        $sql = "SELECT `order`.`seller_id`, `farmer`.`fname`, `farmer`.`lname`, COUNT(`order`.`order_id`) as sales_count
            FROM `order`
            INNER JOIN `farmer` ON `order`.`seller_id` = `farmer`.`seller_id`
            INNER JOIN `association_chairman` ON `farmer`.`association` = `association_chairman`.`association`
            WHERE `order`.`status` = 'received' AND `association_chairman`.`admin_id` = '$admin_id'
            GROUP BY `order`.`seller_id`, `farmer`.`fname`, `farmer`.`lname`
            ORDER BY sales_count DESC";

        $result = $connect->query($sql);

        $sellerNames = [];
        $salesCounts = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $sellerNames[] = $row['fname'] . ' ' . $row['lname'];
                $salesCounts[] = $row['sales_count'];
            }
        } else {
            
            echo "Error: " . mysqli_error($connect);
            echo "Query: " . $sql; 
        }
    }

    $connect->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>BCAAOMS</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="card" style="width: 300px;">
            <div class="card-body">
                <h5 class="card-title">Farmers Sales Chart</h5>
                <canvas id="salesChart" width="300" height="200"></canvas>
            </div>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var sellers = <?php echo json_encode($sellerNames); ?>;
        var sales = <?php echo json_encode($salesCounts); ?>;
        
        var data = {
            labels: sellers,
            datasets: [{
                label: 'Sales Count',
                data: sales,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };
        
        var config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        
        var myChart = new Chart(ctx, config);
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
