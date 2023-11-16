<?php
    session_start();
    include 'includes/sidebar.php';
    require '../logic/db_connection.php';
     
    $currentMonth = date('F'); 
    $currentYear = date('Y');

    if (isset($_SESSION['id'])) {
        $admin_id = $_SESSION['id'];
    
        $sql = "SELECT `order`.`seller_id`, `farmer`.`fname`, `farmer`.`lname`, COUNT(`order`.`order_id`) as sales_count
            FROM `order`
            INNER JOIN `farmer` ON `order`.`seller_id` = `farmer`.`seller_id`
            INNER JOIN `association_chairman` ON `farmer`.`association` = `association_chairman`.`association`
            WHERE `order`.`status` = 'received' AND `association_chairman`.`admin_id` = '$admin_id'  AND MONTH(`order`.`date_ordered`) = MONTH(CURDATE()) AND YEAR(`order`.`date_ordered`) = YEAR(CURDATE())
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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="../css/admin_index.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <?php
            require '../logic/db_connection.php';

            if (isset($_SESSION['id'])) {
                $admin_id = $_SESSION['id'];
                $totalFarmers = 0;
                $totalProducts = 0;
            
                $sqlFarmers = "SELECT COUNT(*) AS total_farmers FROM farmer INNER JOIN association_chairman ON farmer.association = association_chairman.association WHERE association_chairman.admin_id = $admin_id";
                $resultFarmers = $connect->query($sqlFarmers);
            
                if ($resultFarmers && $resultFarmers->num_rows > 0) {
                    $row = $resultFarmers->fetch_assoc();
                    $totalFarmers = $row['total_farmers'];
                }
            
                $sqlProducts = "SELECT `product_list`.`product_id`, SUM(`product_list`.`quantity`) AS total_Products FROM `product_list` INNER JOIN farmer ON `product_list`.`seller_id` = `farmer`.`seller_id` INNER JOIN `association_chairman` ON `farmer`.`association` = `association_chairman`.`association` WHERE `association_chairman`.`admin_id` = '$admin_id';";
                $resultProducts = $connect->query($sqlProducts);

                if ($resultProducts->num_rows > 0) {
                    $row = $resultProducts->fetch_assoc();
                    $totalProducts = $row['total_Products'];
                }
            }
            $connect->close();
        ?>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div><br>
            <?php include 'includes/seller_indicator.php' ?>
                <div class="page-header">
                    <h5>Association Chairman</h5>
                    <small>Home / Dashboard</small>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="data-graph">
                            <div class="d-flex flex-column btn-with-graph">
                                  <center><h5>Farmer's Sales Chart</h5></center>
                                  <canvas id="salesChart"></canvas>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 p-3">
                        <div class="data-info">
                            <div class="card">
                                <div class="card-head">
                                    <h2><?php echo $totalFarmers; ?></h2>
                                    <span class="las la-coins"></span>
                                </div>
                                <div class="card-progress">
                                    <small>Total Farmers</small>
                                    <div class="card-indicator">
                                        <div class="indicator one" style="width: <?php echo $totalFarmers; ?>%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-head">
                                    <h2><?php echo $totalProducts; ?></h2>
                                    <span class="las la-shopping-cart"></span>
                                </div>
                                <div class="card-progress">
                                    <small>Total Products</small>
                                    <div class="card-indicator">
                                        <div class="indicator two" style="width: <?php echo $totalProducts; ?>%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
            }

            var ctx = document.getElementById('salesChart').getContext('2d');
            var sellers = <?php echo json_encode($sellerNames); ?>;
            var sales = <?php echo json_encode($salesCounts); ?>;

            var backgroundColors = sellers.map(function() {
                return getRandomColor(); 
            });

            var data = {
                labels: sellers,
                datasets: [{
                    label: 'Sales Count for the Month of' + ' ' + '<?php echo $currentMonth; ?>',
                    data: sales,
                    backgroundColor: backgroundColors,
                    borderColor: backgroundColors, 
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
                    }
                }                     
                        
            };

          var myChart = new Chart(ctx, config);
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            const maxValue = 100;

            Use the PHP variables for the totalFarmers and indicatorWidth
            const totalFarmers = <?php echo $totalFarmers; ?>;
            const indicatorWidth = (totalFarmers / maxValue) * 100;

            const indicatorElement = document.getElementById('indicator');
            const totalValueElement = document.getElementById('totalValue');
            indicatorElement.style.width = `${indicatorWidth}%`;
            totalValueElement.textContent = totalFarmers;

            const maxValue = 100;

            const totalProducts = <?php echo $totalProducts; ?>;
            const indicatorWidth = (totalProducts / maxValue) * 100;

            const indicatorElement = document.getElementById('indicator');
            const totalValueElement = document.getElementById('totalValue');
            indicatorElement.style.width = `${indicatorWidth}%`;
            totalValueElement.textContent = totalProducts;
        </script>
    </body>
</html>