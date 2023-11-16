<?php
    require '../logic/db_connection.php';

    $currentMonth = date('F'); 
    $currentYear = date('Y');

    if (isset($_SESSION['id'])) {
        $admin_id = $_SESSION['id'];

        $sql = "SELECT `order`.`seller_id`, `farmer`.`association`, `farmer`.`fname`, `farmer`.`lname`, COUNT(`order`.`order_id`) as sales_count FROM `order` INNER JOIN `farmer` ON `order`.`seller_id` = `farmer`.`seller_id` WHERE `order`.`status` = 'received' AND MONTH(`order`.`date_ordered`) = MONTH(CURDATE()) AND YEAR(`order`.`date_ordered`) = YEAR(CURDATE()) GROUP BY `order`.`seller_id`, `farmer`.`association`, `farmer`.`fname`, `farmer`.`lname` ORDER BY sales_count DESC";

        $result = $connect->query($sql);

        $sellerNames = [];
        $salesCounts = [];
        $associations = []; 

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $sellerNames[] = $row['fname'] . ' ' . $row['lname'];
                $salesCounts[] = $row['sales_count'];
                $associations[] = $row['association']; 
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
        <style>
            .row {
                margin-left: 4em;
                font-family: 'Poppins', sans-serif;
            }
            .graph {
                background-color: white;
                border-radius: 5px/5px;
                box-shadow: 0 1px 1px 1px #616161;
                height: 450px;
                width: 560px;
                padding: 1em;
            }
            .chart {
                height: 950px;
                width: 500px;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="graph">
                <center><h5>Farmer's Sales Chart</h5></center>
                <div class="chart">
                    <canvas id="salesChart" height="220px;"></canvas>
                </div>
            </div>
        </div>
        <script>
            var ctx = document.getElementById('salesChart').getContext('2d');
            var sellers = <?php echo json_encode($sellerNames); ?>;
            var associations = <?php echo json_encode($associations); ?>;

            var associationColors = {};

            associations.forEach(function (association) {
                if (!(association in associationColors)) {
                    associationColors[association] = getRandomColor(); 
                }
            });

            var data = {
                labels: sellers,
                datasets: [{
                    label: 'Sales Count for the Month of' + ' ' + '<?php echo $currentMonth; ?>',
                    data: <?php echo json_encode($salesCounts); ?>,
                    backgroundColor: associations.map(association => associationColors[association]),
                    hoverBackgroundColor: associations.map(association => associationColors[association]),
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
                    },
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    var label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.parsed.y + ' Farmer';
                                    var association = associations[context.dataIndex];
                                    if (association) {
                                        label += '\nAssociation: ' + association;
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            };

            var myChart = new Chart(ctx, config);

            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
