<?php
    session_start();
    include 'includes/sidebar.php';
    require '../logic/db_connection.php';

    $currentYear = date('Y');

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $year = date("Y"); 


    $months = [
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ];
    $productCounts = array_fill(0, 12, 0);

    if (isset($_SESSION['id'])) {
        $admin_id = $_SESSION['id'];

    $sql = "SELECT MONTH(`order`.`date_ordered`) AS order_month, SUM(`order`.`quantity`) AS product_count FROM `order` INNER JOIN farmer ON `order`.`seller_id` = `farmer`.`seller_id` INNER JOIN `association_chairman` ON `farmer`.`association` = `association_chairman`.`association` WHERE `order`.`status` = 'received' AND `association_chairman`.`admin_id` = '$admin_id' AND YEAR(`order`.`date_ordered`) = YEAR(CURDATE()) GROUP BY MONTH(`order`.`date_ordered`)";

    $result = $connect->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $monthNumber = $row['order_month'];
            $productCounts[$monthNumber - 1] = $row['product_count']; 
        }
    } else {
        echo json_encode(['error' => mysqli_error($connect)]);
        exit();
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">       
        <!-- <link href="../css/admin_annual_sales.css" rel="stylesheet"> -->
        <title>BCAAOMS</title>
        <style>
            @media screen and (max-width:990px){
            .counter{ margin-bottom: 40px; }
            }
            .header{
                position: absolute;
                top: 0;
                top: 0;
                left: 250px;
                height: 100vh;
                width: calc(100% - 250px);
                background-color: var(--body-color);
                transition: var(--tran-05);
                font-family: 'Poppins', sans-serif;
            }
            .header .head{
                font-size: 20px;
                font-weight: 500;
                color: var(--text-color);
                padding: 12px 60px;
            }
            .sidebar.close ~ .header{
                left: 78px;
                height: 120vh;
                width: calc(100% - 78px);
            }
            .head{
            box-shadow: 0px 5px 5px -5px rgb(0 0 0 /100%);
            }
            .page-header{
            margin-left: 60px;
            font-size: 1em;
            color: var(--text-color);
            }         
            .card-head {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .card-head h2 {
                color: #333;
                font-size: 1.8rem;
                font-weight: 500;
            }
            .card-head span {
                font-size: 3.2rem;
                color: var(--text-grey);
            }
            .card-progress small {
                color: #777;
                font-size: .8rem;
                font-weight: 600;
            }
            .card-indicator {
                margin: .7rem 0rem;
                height: 10px;
                border-radius: 4px;
                background: #e9edf2;
                overflow: hidden;
            }
            .indicator {
                height: 10px;
                border-radius: 4px;
            }
            .indicator.one {
                background: #22baa0;
            }
            .indicator.two {
                background: #11a8c3;
            }
            @media only screen and (max-width: 1200px) {
                .analytics {
                    grid-template-columns: repeat(2, 1fr);
                }
            }
            @media only screen and (max-width: 768px) {
                .analytics {
                    grid-template-columns: 100%;
                }
            }
            .card{
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 10px;
                width: 250px;
                margin-left: 5%;
                margin-right: 5%;
            }
            .row{
                margin-top: 0.1em;
                margin-left: 3em;
                font-family: 'Poppins', sans-serif;
            }
            .chart{
                margin-top: 1em;
            }
            .btn-with-graph{
                background-color: white;
                border-radius: 5px/5px;
                box-shadow: 0 1px 1px 1px #616161;
                height: 26em;
                
            }
            .btn-sales{
                border: none;
                background-color: white;
                margin-top: 1em;
            }
            .page-header{
                margin-top: 0.1em;
                margin-left: 60px;
                font-size: 1em;
                color: var(--text-color);
            }
            .print{
                margin-top: -2em;
            }
            @media print { 
                .print-button {
                    display: none;
                }
                .non-printable {
                    display: none;
                }
                .printable {
                    display: block;
                }
                .data-graph {
                    max-width: 88%; /* Set a maximum width for the chart */
                    height: auto; /* Let the height adjust proportionally */
                }
            }
            .focus{
                border-bottom: 1px solid;
            } 
        </style>
    </head>
    <body>
        <?php
            require '../logic/db_connection.php';

            if (isset($_SESSION['id'])) {
                $seller_id = $_SESSION['id'];
                $totalSales = 0;
                $totalOrders = 0;
                $reference_no = 'reference_no';

                $sqlSales = "SELECT `order`.`seller_id`, COUNT(`order`.`order_id`) AS total_Sales FROM `order` INNER JOIN `farmer` ON `order`.`seller_id` = `farmer`.`seller_id` INNER JOIN `association_chairman` ON `farmer`.`association` = `association_chairman`.`association` WHERE `order`.`status` = 'received' AND `association_chairman`.`admin_id` = '$admin_id' AND YEAR(`order`.`date_ordered`) = YEAR(CURDATE());";
                $resultSales = $connect->query($sqlSales);
            
                if ($resultSales && $resultSales->num_rows > 0) {
                    $row = $resultSales->fetch_assoc();
                    $totalSales = $row['total_Sales'];
                }
            
                $sqlOrders = "SELECT COUNT(*) AS total_Orders FROM ( SELECT `order`.`reference_no` FROM `order`INNER JOIN `farmer` ON `order`.`seller_id` = `farmer`.`seller_id` INNER JOIN `association_chairman` ON `farmer`.`association` = `association_chairman`.`association` WHERE `order`.`status` = 'received' AND `association_chairman`.`admin_id` = '$admin_id' AND YEAR(`order`.`date_ordered`) = YEAR(CURDATE()) GROUP BY `order`.`reference_no` ) AS subquery;";
                $resultOrders = $connect->query($sqlOrders);

                if ($resultOrders->num_rows > 0) {
                    $row = $resultOrders->fetch_assoc();
                    $totalOrders = $row['total_Orders'];
                }
            }
            $connect->close();
        ?>
        <section class="header">
            <div class="head non-printable ">Bago City Agricultural Association Online Market System</div><br>
                <div class="page-header non-printable">
                    <h5>Farmer</h5>
                    <small>Home / Sales</small>
                </div>
                <div class="print non-printable" style="padding-left: 89%">
                    <!-- <a href="#" target="_blank" class="btn btn-success">Print</a><br><br> -->
                    <button class="btn btn-success" onclick="printPage()">Print</button><br><br>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="data-graph">
                            <div class="d-flex flex-column btn-with-graph">
                                <div class="d-flex flex-row justify-content-around button">
                                <button class="btn-sales" id="monthly"><a href="sales.php" style="color: black; text-decoration: none;">MONTHLY</a></button>
                                    <button class="btn-sales focus" id="yearly"><a href="annual_sales.php" style="color: black; text-decoration: none;">YEARLY</a></button>
                                </div>
                                <div class="chart">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                <div class="data-info d-flex flex-row justify-content-between">
                    <div class="card non-printable">
                        <div class="card-head">
                            <h2><?php echo $totalSales; ?></h2>
                            <span class="las la-coins"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total Sales</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: <?php echo $totalSales; ?>%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card non-printable">
                        <div class="card-head">
                            <h2><?php echo $totalOrders; ?></h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total Orders</small>
                            <div class="card-indicator">
                                <div class="indicator two" style="width: <?php echo $totalOrders; ?>%"></div>
                            </div>
                        </div>
                    </div> 
                </div><br>
                    <div class="non-printable">
                            <?php
                            include 'recent_buyers.php';
                            ?>
                    </div>
            </div>
                </div>                
            </div>
        </section>
        <script>
            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }

            var ctx = document.getElementById('myChart').getContext('2d');

            var months = <?php echo json_encode($months); ?>;
            var productCounts = <?php echo json_encode($productCounts); ?>;

            var randomColors = Array.from({ length: months.length }, () => getRandomColor());

            var data = {
                labels: months,
                datasets: [{
                    label: 'Sales Count for the Year' + ' ' + '<?php echo $currentYear; ?>',
                    data: productCounts,
                    backgroundColor: randomColors, 
                    borderColor: randomColors, 
                    borderWidth: 1,
                    pointRadius: 5,
                    pointBackgroundColor: randomColors,
                    pointBorderColor: randomColors,
                    pointHoverRadius: 8,
                    pointHoverBackgroundColor: randomColors,
                    pointHoverBorderColor: randomColors
                }]
            };

            var config = {
                type: 'line',
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            var myChart = new Chart(ctx, config);
        </script>
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

            const totalOrders = <?php echo $totalOrders; ?>;
            const indicatorWidth = (totalOrders / maxValue) * 100;

            const indicatorElement = document.getElementById('indicator');
            const totalValueElement = document.getElementById('totalValue');
            indicatorElement.style.width = `${indicatorWidth}%`;
            totalValueElement.textContent = totalOrders;
        </script>
        <script>
            function printPage() {
                window.print(); // This will open the browser's print dialog
            }
        </script>
    </body>
</html>