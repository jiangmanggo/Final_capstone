<?php 
ob_start();
session_start();
require("../logic/db_connection.php");

$client_id = $_SESSION['id'];

$queryGetAllOrders = "SELECT 
                    `farmer`.`username`,
                    `order`.`reference_no`,
                    `order`.`date_ordered`,
                    `order`.`status`,
                    `order`.`seller_id`
                  FROM 
                    `order` 
                  INNER JOIN 
                    `farmer` ON `farmer`.`seller_id` = `order`.`seller_id` 
                  WHERE 
                    `order`.`client_id` = $client_id
                  ORDER BY 
                    `farmer`.`username`, `order`.`reference_no`, `order`.`date_ordered`"; // Sort by seller's name, reference number, and then by date_ordered

$order = mysqli_query($connect, $queryGetAllOrders);

$currentSellerId = null;
$currentReferenceNo = null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">       
    <link href="../css/buyer_order_history.css" rel="stylesheet">
    <title>BCAAOMS</title>
</head>
<body>
    <?php 
    include 'includes/header.php';
    ?>
    <div class="container">
        <div class="card-body p-2 bg-white rounded">
            <div class="table-responsive">
                <table id="history" style="width:100%" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Reference No.</th>
                            <th>Shop</th>
                            <th>Date Ordered</th>
                            <th><center>Status<center></th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while ($row = mysqli_fetch_assoc($order)) {
                            if ($currentSellerId !== $row['seller_id']) {
                                echo '<tr><th colspan="6">' . $row['username'] . '</th></tr>';
                                $currentSellerId = $row['seller_id'];
                                $currentReferenceNo = null;
                            }

                            if ($currentReferenceNo !== $row['reference_no']) {
                                $currentReferenceNo = $row['reference_no'];
                                ?>
                                <tr>
                                    <td><?php echo $row['reference_no']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['date_ordered']; ?></td>
                                    <td id="status-cell">
                                        <center>
                                            <?php 
                                            $status = strtolower($row['status']);
                                            switch ($status) {
                                                case 'pending':
                                                    echo '<span class="badge badge-warning bg-gradient-secondary px-3 rounded-pill">Pending</span>';
                                                    // echo '<a class="btn btn-danger cancel-product ml-3" style="width: 5em;" href="cancel_order.php?seller_id=' . $row['seller_id'] . '&reference_no=' . $row['reference_no'] . '">Cancel</a>';
                                                    break;
                                                case 'confirmed':
                                                    echo '<span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Confirmed</span>';
                                                    // echo '<button class="btn btn-danger ml-3" style="width: 5em;" disabled>Cancel</button>';
                                                    break;
                                                case 'cancelled':
                                                    echo '<span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Cancelled</span>';
                                                    // echo '<button class="btn btn-danger ml-3" style="width: 5em;" disabled>Cancel</button>';
                                                    break;
                                                case 'received':
                                                    echo '<span class="badge badge-success bg-gradient-danger px-3 rounded-pill">Received</span>';
                                                    // echo '<button class="btn btn-danger ml-3" style="width: 5em;" disabled>Cancel</button>';
                                                    break;
                                                default:
                                                    echo '<span class="badge badge-light bg-gradient-light border px-3 rounded-pill">N/A</span>';
                                                    // echo '<button class="btn btn-danger ml-3" style="width: 5em;" disabled>Cancel</button>';
                                                    break;
                                            }
                                            ?></center>
                                    <td>
                                        <div class="container mt-1">
                                            <!-- Update the link to include the reference number -->
                                            <a class="btn btn-basic" href="order_details.php?seller_id=<?php echo $row['seller_id']; ?>&reference_no=<?php echo $row['reference_no']; ?>">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                            }
                        }
                        ?>
                    </tbody>  
                </table>
            </div>
        </div>
    </div><br><br>
    <?php
    include '../includes/footer.php'
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
