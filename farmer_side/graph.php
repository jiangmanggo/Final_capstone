<?php
    require '../logic/db_connection.php';

    $currentMonth = date('F');
    $currentYear = date('Y');
    

    if (isset($_SESSION['id'])) {
        $seller_id = $_SESSION['id'];
    
        $sql = "SELECT `order`.`product_name`, MONTH(`order`.`date_ordered`) AS order_month, SUM(`order`.`quantity`) AS product_count FROM `order` INNER JOIN farmer ON `order`.`seller_id` = `farmer`.`seller_id` WHERE `order`.`status` = 'received' AND `farmer`.`seller_id` = '$seller_id' AND MONTH(`order`.`date_ordered`) = MONTH(CURDATE()) AND YEAR(`order`.`date_ordered`) = YEAR(CURDATE()) GROUP BY `order`.`product_name`";

        $result = $connect->query($sql);

        $productNames = [];
        $productCounts = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $productNames[] = $row['product_name'];
                $productCounts[] = $row['product_count'];
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
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!-- <link href="../css/farmer_sales.css" rel="stylesheet"> -->
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
                width: 270px;
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
        </style> 
    </head>
    <body>
    <br><br><br><br>
                <div class="print" style="padding-left: 89%">
                    <button id="printGraphButton" class="btn btn-primary">Print Graph</button><br><br>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="data-graph">
                            <div class="d-flex flex-column btn-with-graph">
                                <div class="d-flex flex-row justify-content-around button">
                                <button class="btn-sales" id="monthly"><a href="sales.php" style="color: black; text-decoration: none;">MONTHLY</a></button>
                                    <button class="btn-sales" id="yearly"><a href="annual_sales.php" style="color: black; text-decoration: none;">YEARLY</a></button>
                                </div>
                                <div class="chart">
                                    <canvas id="myChart"></canvas>
                                    <canvas id="printChart" style="display: none;"></canvas>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            
            var productNames = <?php echo json_encode($productNames); ?>;
            var productCounts = <?php echo json_encode($productCounts); ?>;
            
            var backgroundColors = [];
            var hoverColors = [];

            function getRandomColor() {
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
            
            for (var i = 0; i < productNames.length; i++) {
                backgroundColors.push(getRandomColor());
                hoverColors.push(getRandomColor());
            }
    
            var data = {
                labels: productNames,
                datasets: [{
                    label: 'Sales Count for the Month of' + ' ' + '<?php echo $currentMonth; ?>',
                    data: productCounts,
                    backgroundColor: backgroundColors,
                    hoverBackgroundColor: hoverColors
                }]
            };
            
            var config = {
                type: 'bar',
                data: data,
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    }
                }
            };
            
            var myChart = new Chart(ctx, config);
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            // Function to handle print functionality
function printPage() {
    window.print(); // Open the print dialog
}

// Add a click event listener to the print button
document.getElementById("printGraphButton").addEventListener("click", printPage);

        </script>
    </body>
</html>