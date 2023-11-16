<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        display: flex;
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
        margin-top: 20px;
        color: var(--text-color);
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
      .row{
        margin-top: .5em;
        font-family: 'Poppins', sans-serif;             
      }
      .btn-with-graph{
        background-color: white;
        border-radius: 5px/5px;
        box-shadow: 0 1px 1px 1px #616161;
        height: 450px;
        width: 400px;
        padding: 1em;
      }   
    </style>
  </head>
  <body>
    <?php 
      session_start();
      include 'includes/sidebar.php';
      include '../logic/db_connection.php';
      
      $currentMonth = date('F');
      $currentYear = date('Y');

      if (isset($_SESSION['id'])) {
          $admin_id = $_SESSION['id'];
      
          $currentMonth = date('F');
          $currentYear = date('Y');

          $sql = "SELECT `farmer`.`association`, COUNT(`order`.`order_id`) as sales_count FROM `order` INNER JOIN `farmer` ON `order`.`seller_id` = `farmer`.`seller_id` WHERE `order`.`status` = 'received' AND MONTH(`order`.`date_ordered`) = MONTH(CURDATE()) AND YEAR(`order`.`date_ordered`) = YEAR(CURDATE()) GROUP BY `farmer`.`association` ORDER BY sales_count DESC";
          $result = $connect->query($sql);
      
          $associationData = [];
      
          if ($result) {
              while ($row = $result->fetch_assoc()) {
                  $associationData[] = [
                      'association' => $row['association'],
                      'sales_count' => $row['sales_count']
                  ];
              }
          } else {
              echo "Error: " . mysqli_error($connect);
              echo "Query: " . $sql; 
          }
      
          $connect->close();
      }
    ?>
    <section class="header">
          <div class="head">Bago City Agricultural Association Online Market System</div>
          <?php include 'includes/seller_indicator.php' ?>
        <div class="page-header">
            <h5>Super Admin</h5>
            <small>Home / Dashboard</small>
        </div>
        <div class="row">
            <div class="board">
                <div class="data-graph">
                    <div class="d-flex flex-column btn-with-graph">
                        <center><h5>Association's Sales Chart</h5></center>
                        <canvas id="salesPieChart"></canvas>
                    </div>
                </div>
            </div>
            <?php include 'includes/farmer_rate.php'; ?>
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

      var ctx = document.getElementById('salesPieChart').getContext('2d');

      var associationData = <?php echo json_encode($associationData); ?>;
      var colors = [];
      for (var i = 0; i < associationData.length; i++) {
          colors.push(getRandomColor());
      }

      var data = {
          labels: associationData.map(item => item.association),
          datasets: [{
              data: associationData.map(item => item.sales_count),
              backgroundColor: colors,
              hoverBackgroundColor: colors
          }]
      };

      var config = {
          type: 'pie',
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
  </body>
</html>
