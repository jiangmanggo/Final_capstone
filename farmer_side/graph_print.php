<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graph Print</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <canvas id="myChart"></canvas>
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
                label: 'Sales Count for the Month of <?php echo $currentMonth; ?>',
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
    
</body>
</html>
