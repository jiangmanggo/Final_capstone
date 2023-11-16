<?php
    session_start();
    include 'includes/sidebar.php';
    require '../logic/db_connection.php';

    $results = array();

    if (isset($_SESSION['id'])) {
    $super_admin_id = $_SESSION['id'];
    $statusArray = array('CONFIRMED', 'CANCELLED', 'RECEIVED');
    $statusString = implode("','", $statusArray);

    $query = "SELECT `order`.`reference_no`, `order`.`date_ordered`, `order`.`status`, `order`.`seller_id`, `farmer`.`fname` AS `farmer_name`, `order`.`fname` AS `buyer_name`, `farmer`.`association`, `farmer`.`address` FROM `order` INNER JOIN `farmer` ON `farmer`.`seller_id` = `order`.`seller_id` WHERE `order`.`status` IN ('$statusString') GROUP BY `order`.`reference_no` ORDER BY `order`.`date_ordered` DESC";

    $result = mysqli_query($connect, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <link href="../css/superA_transaction.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
            <?php include 'includes/seller_indicator.php' ?>
                <div class="page-header">
                    <h5>Super Admin</h5>
                    <small>Home / Sales</small>
                </div>
                    <div class="container">
                        <div class="card rounded shadow border-0">
                            <div class="card-body p-2 bg-white rounded">
                                <div class="table-responsive">
                                    <table id="transaction" style="width:100%" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Reference no.</th>
                                                <th>Date Ordered</th>
                                                <th>Status</th>
                                                <th>Farmer Name</th>
                                                <th>Association</th>
                                                <th>Buyer Name</th>
                                                <th>Buyer Address</th>
                                                <th>view</th>
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php foreach ($results as $row): ?>
                                            <tr>
                                                <td><?= $row['reference_no'] ?></td>
                                                <td><?= $row['date_ordered'] ?></td>
                                                <td><?= $row['status'] ?></td>
                                                <td><?= $row['farmer_name'] ?></td>
                                                <td><?= $row['association'] ?></td>
                                                <td><?= $row['buyer_name'] ?></td>
                                                <td><?= $row['address'] ?></td>
                                                <td>
                                                    <div class="container mt-1">
                                                        <!-- Update the link to include the reference number -->
                                                        <a class="btn btn-basic" href="order_details.php?seller_id=<?= $row['seller_id']; ?>&reference_no=<?= $row['reference_no']; ?>">
                                                            <i class="fa fa-eye" style="color: black;"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                var table = $('#transaction').DataTable();
            });
        </script>
    </body>
</html>
<?php ob_end_flush(); ?> 



