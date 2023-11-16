<?php
session_start();
require("../logic/db_connection.php");

$reference_no = mysqli_real_escape_string($connect, $_GET['reference_no']);
$seller_id = mysqli_real_escape_string($connect, $_GET['seller_id']);

// Add the logic to fetch order details based on $reference_no
$queryGetOrderDetails = "SELECT 
                        `product_name`,
                        `quantity`,
                        `price`
                      FROM 
                        `order`
                      WHERE 
                        `reference_no` = '$reference_no' AND `seller_id` = '$seller_id'";

$orderDetailsResult = mysqli_query($connect, $queryGetOrderDetails);

if (!$orderDetailsResult) {
    die('Error: ' . mysqli_error($connect));
}

// Add the logic to fetch order status based on $reference_no
$queryGetOrderStatus = "SELECT `status` FROM `order` WHERE `reference_no` = '$reference_no' AND `seller_id` = '$seller_id'";
$orderStatusResult = mysqli_query($connect, $queryGetOrderStatus);

if (!$orderStatusResult) {
    die('Error: ' . mysqli_error($connect));
}

$row = mysqli_fetch_assoc($orderStatusResult);
$orderStatus = $row['status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">       
    <!-- Add any additional head content here -->
    <title>Order Details</title>
</head>
<body>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="orderDetailsTable" style="width:100%" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Products Ordered</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody id="orderDetailsBody">
                            <?php
                            while ($row = mysqli_fetch_assoc($orderDetailsResult)) {
                                echo '<tr>';
                                echo '<td>' . $row['product_name'] . '</td>';
                                echo '<td>' . $row['quantity'] . '</td>';
                                echo '<td>' . $row['price'] . '</td>';
                                echo '</tr>';
                            }
                            ?>
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
            <div class="modal-footer">
                <?php
                // Check the order status and activate/hide the action button accordingly
                echo '<form id="actionForm" method="post">';
                if ($orderStatus === 'pending') {
                    echo '<button type="button" class="btn btn-danger" id="actionButton" name="cancelOrder">Cancel Order</button>';
                } elseif ($orderStatus === 'CONFIRMED') {
                    echo '<button type="button" class="btn btn-success" id="actionButton" name="receiveOrder">Receive Order</button>';
                }
                echo '</form>';
                ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Include Bootstrap and any additional scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Add any additional scripts here -->

<!-- Add this script block after including Bootstrap and other scripts -->
<script>
    $(document).ready(function () {
    // Show the modal
    $('#myModal').modal('show');

    // Check the order status and activate/hide the action button accordingly
    var orderStatus = "<?php echo $orderStatus; ?>";
    if (orderStatus === 'pending' || orderStatus === 'CONFIRMED') {
        $('#actionButton').show();
        // Add click event listener to the action button
        $('#actionButton').on('click', function () {
            // Display a confirmation dialog
            var actionText = (orderStatus === 'pending') ? 'cancel' : 'receive';
            if (confirm('Are you sure you want to ' + actionText + ' this order?')) {
                // Perform AJAX request to update the order status
                var newStatus = (orderStatus === 'pending') ? 'cancelled' : 'received';
                $.ajax({
                    type: "POST",
                    url: "cancel_order.php",
                    data: {
                        reference_no: '<?php echo $reference_no; ?>',
                        seller_id: '<?php echo $seller_id; ?>',
                        new_status: newStatus
                    },
                    success: function (response) {
                        // Log or handle the response if needed
                        console.log(response);

                        // Perform AJAX request to update product stocks
                        $.ajax({
                            type: "POST",
                            url: "update_stocks.php",
                            data: {
                                reference_no: '<?php echo $reference_no; ?>'
                            },
                            success: function (stocksResponse) {
                                // Log or handle the stocks response if needed
                                console.log(stocksResponse);

                                // Reload the page after successful updates
                                location.reload();
                            },
                            error: function (stocksXhr, stocksStatus, stocksError) {
                                console.error(stocksError);
                                // Handle error if needed
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                        // Handle error if needed
                    }
                });
            }
        });
    } else {
        $('#actionButton').hide();
    }

    // Calculate and display total amount
    var totalAmount = 0;
    $('#orderDetailsBody tr').each(function () {
        var quantity = parseFloat($(this).find('td:nth-child(2)').text().trim());
        var price = parseFloat($(this).find('td:nth-child(3)').text().trim().replace(/[^\d.-]/g, '')); // Remove non-numeric characters
        console.log("Quantity:", quantity);
        console.log("Price:", price);
        if (!isNaN(quantity) && !isNaN(price)) {
            totalAmount += quantity * price;
        }
    });
    console.log("Total Amount:", totalAmount);
    $('#totalAmount').text(totalAmount.toFixed(2));

    // Listen for the modal close event
    $('#myModal').on('hidden.bs.modal', function () {
        window.location.href = 'order_history.php';
    });
});
</script>

</body>
</html>
