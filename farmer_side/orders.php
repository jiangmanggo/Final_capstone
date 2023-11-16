<?php 
    ob_start();
    session_start();
    include 'includes/sidebar.php';
    require("../logic/db_connection.php");

    $seller_id = $_SESSION['id'];
    $queryGetAllOrders = "SELECT * FROM `order` WHERE seller_id = '$seller_id' ORDER BY date_ordered DESC";
    $order = mysqli_query($connect, $queryGetAllOrders);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">    
        <link href="../css/farmer_orders.css" rel="stylesheet"> 
        <title>BCAAOMS</title>
        <style>
            .indicator-container {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 999; /* Set a high z-index value to make it appear in front */
                background-color: #fff;
                border: 1px solid #ccc;
                padding: 10px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                /* Add any other styles you want for the indicator container */
            }
        </style>
    </head>
    <body> 
    <div class="indicator-container">
    <?php include 'includes/seller_indicator.php'; ?>
    </div>
        <?php
            $seller_id = $_SESSION['id'];
            $client_id = 'client_id';
            $status = 'status';
            $statusArray = array('confirm', 'pending', 'delivery', 'recieve');
            $statusString = implode("','", $statusArray);

            $queryGetAllOrders ="SELECT `order`.`reference_no`, `order`.`fname`,`order`.`lname`, `order`.`number`, `order`.`address`, `order`.`product_name`, `order`.`quantity`, `order`.`date_ordered`, `order`.`price`, `order`.`status` FROM `order`INNER JOIN `farmer` ON `farmer`.`seller_id` = `order`.`seller_id` WHERE `order`.`seller_id` = '$seller_id' AND `order`.`status` IN ('$statusString') GROUP BY `order`.`reference_no` ORDER BY `order`.`date_ordered` DESC; ";
            $order = mysqli_query($connect, $queryGetAllOrders);
        ?>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
                <div class="page-header">
                    <h5>Farmer</h5>
                    <small>Home / Pending Orders</small>
                </div>
                <div class="container">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-2 bg-white rounded">
                            <div class="table-responsive">
                                <table id="farmers" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Reference Number</th>
                                            <th>Buyer Name</th>
                                            <th>Mobile Number</th>
                                            <th>Order Time</th>
                                            <th>Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                            if (mysqli_num_rows($order) > 0) {
                                            while ($items = mysqli_fetch_assoc($order)) {
                                        ?>
                                        <tr>
                                            <td><?= $items['reference_no'];?></td>
                                            <td><?= $items['fname']. " ". $items['lname']; ?></td>
                                            <td><?= $items['number']?></td>
                                            <td><?= $items['date_ordered']?></td>                                            <td>
                                            <?php 
                                                $status = strtolower($items['status']); 

                                                switch ($status) {
                                                    case 'pending':
                                                        echo '<span class="badge badge-warning bg-gradient-warning px-3 rounded-pill">Pending</span>';
                                                        break;
                                                    case 'confirmed':
                                                        echo '<span class="badge badge-primary bg-gradient-primary px-3 rounded-pill">Confirmed</span>';
                                                        break;
                                                    case 'cancelled':
                                                        echo '<span class="badge badge-danger bg-gradient-danger px-3 rounded-pill">Cancelled</span>';
                                                        break;
                                                    default:
                                                        echo '<span class="badge badge-light bg-gradient-light border px-3 rounded-pill">N/A</span>';
                                                        break;
                                                }
                                            ?>
                                            <td>
                                                <div class="container mt-1">
                                                    <button class="btn btn-basic" data-bs-toggle="modal" data-bs-target="#myModal">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                                <div class="modal" id="myModal">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">View Order Details</h5>
                                                                <button type="button" class="btn-close fa fa-times" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table id="farmers" style="width:100%" class="table table-striped table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Products Ordered</th>
                                                                                <th>Quantity</th>
                                                                                <th>Price</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="orderDetailsBody">
                                                                            <!-- Product details will be added here dynamically -->
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <td colspan="2">Total:</td>
                                                                                <td id="totalAmount"></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="action">
                                                                <form method="post" action="confirm_order.php">
                                                                    <input type="hidden" name="reference_no" value="<?= $items['reference_no']; ?>">
                                                                    <button type="submit" name="confirm" class="btn btn-success">Confirm</button>
                                                                </form>
                                                                <form method="post" action="cancel_order.php">
                                                                    <input type="hidden" name="reference_no" value="<?= $items['reference_no']; ?>">
                                                                    <button type="submit" name="cancel" class="btn btn-danger">Cancel</button>
                                                                </form>
                                                            </div>   
                                                        </div>
                                                    </div>
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
                    </div>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                var table = $('#farmers').DataTable();

                $('.btn-basic').click(function() {
                    var referenceNo = $(this).closest('tr').find('td:first').text();
                    $.ajax({
                        url: 'get_order_details.php',
                        type: 'POST',
                        data: { reference_no: referenceNo },
                        success: function(data) {
                            var orderDetails = JSON.parse(data);
                            var html = '';
                            var totalAmount = 0; 

                            orderDetails.forEach(function(item) {
                                html += '<tr>';
                                html += '<td>' + item.product_name + '</td>';
                                html += '<td>' + item.quantity + '</td>';
                                html += '<td>' + item.price + '</td>';
                                html += '</tr>';
                                totalAmount += (item.quantity * item.price);
                            });

                            $('#orderDetailsBody').html(html);
                            $('#totalAmount').text(totalAmount.toFixed(2));

                            var modalTitle = 'View Order Details (#' + referenceNo + ')';
                            $('#myModal h5.modal-title').text(modalTitle);
                            $('#myModal').modal('show');
                        }
                    });
                });
            });
        </script>
    </body>
</html>
<?php                              
    ob_end_flush();
?>