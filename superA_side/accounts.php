<?php
	include 'includes/sidebar.php';			
    require '../logic/db_connection.php';

    $totalBuyers = $totalFarmers = $totalAssociationChairman = 0;

    $sqlBuyers = "SELECT COUNT(*) AS total_buyers FROM buyer"; $resultBuyers = $connect->query($sqlBuyers);

    if ($resultBuyers->num_rows > 0) {
    $row = $resultBuyers->fetch_assoc();
    $totalBuyers = $row['total_buyers'];
    }

    $sqlFarmers = "SELECT COUNT(*) AS total_farmers FROM farmer"; $resultFarmers = $connect->query($sqlFarmers);

    if ($resultFarmers->num_rows > 0) {
    $row = $resultFarmers->fetch_assoc();
    $totalFarmers = $row['total_farmers'];
    }

    $sqlAssociationChairman = "SELECT COUNT(*) AS total_association_chairman FROM association_chairman"; $resultAssociationChairman = $connect->query($sqlAssociationChairman);

    if ($resultAssociationChairman->num_rows > 0) {
    $row = $resultAssociationChairman->fetch_assoc();
    $totalAssociationChairman = $row['total_association_chairman'];
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link href="../css/superA_accounts.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>   
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
                <div class="page-header">
                    <h5>Super Admin</h5>
                    <small>Home / Accounts</small>
                </div>           
                <div class="analytics">
                    <div class="card">
                        <div class="card-head">
                            <h2><?php echo $totalBuyers; ?></h2>
                            <span class="las la-coins"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total Number of Buyers</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width:<?php echo $total_buyers; ?>%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2><?php echo $totalFarmers; ?></h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total Number of Farmers</small>
                            <div class="card-indicator">
                                <div class="indicator two" style="width:<?php echo $total_farmers; ?>%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-head">
                            <h2><?php echo $totalAssociationChairman; ?></h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Total Number of Chairman</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width:<?php echo $total_association_chairman; ?>%"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="graph">
                    <div class="chart">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                labels: ['Buyer', 'Farmer', 'Admin'],
                datasets: [{
                    label: 'No. of Users',
                    data: [<?php echo $totalBuyers; ?>,<?php echo $totalFarmers; ?>, <?php echo $totalAssociationChairman; ?>], 
                    borderWidth: 1,
                    backgroundColor: ["#86608e","#b3446c","#437c17"]
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            }); 
        </script>

<script>
    // JavaScript for Buyers Progress Indicator
    const totalBuyers = <?php echo $totalBuyers; ?>;
    const indicatorElementBuyers = document.querySelector('.indicator.one');
    const totalValueElementBuyers = document.querySelector('.indicator.one + small');

    const maxValueBuyers = 100; // Set the maximum value for Buyers
    const indicatorWidthBuyers = (totalBuyers / maxValueBuyers) * 100;

    indicatorElementBuyers.style.width = `${indicatorWidthBuyers}%`;
    totalValueElementBuyers.textContent = totalBuyers;
</script>

<script>
    // JavaScript for Farmers Progress Indicator
    const totalFarmers = <?php echo $totalFarmers; ?>;
    const indicatorElementFarmers = document.querySelector('.indicator.two');
    const totalValueElementFarmers = document.querySelector('.indicator.two + small');

    const maxValueFarmers = 100; // Set the maximum value for Farmers
    const indicatorWidthFarmers = (totalFarmers / maxValueFarmers) * 100;

    indicatorElementFarmers.style.width = `${indicatorWidthFarmers}%`;
    totalValueElementFarmers.textContent = totalFarmers;
</script>

<script>
    // JavaScript for Chairman Progress Indicator
    const totalChairman = <?php echo $totalAssociationChairman; ?>;
    const indicatorElementChairman = document.querySelector('.indicator.three');
    const totalValueElementChairman = document.querySelector('.indicator.three + small');

    const maxValueChairman = 100; // Set the maximum value for Chairman
    const indicatorWidthChairman = (totalChairman / maxValueChairman) * 100;

    indicatorElementChairman.style.width = `${indicatorWidthChairman}%`;
    totalValueElementChairman.textContent = totalChairman;
</script>

    </body>
</html>

