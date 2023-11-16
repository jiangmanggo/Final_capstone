<?php
    session_start();
    include 'includes/sidebar.php';
    require '../logic/db_connection.php';

    $results = array();

    if (isset($_SESSION['id'])) {
        $admin_id = $_SESSION['id'];

        $query = "SELECT farmer.`seller_id`, farmer.`fname`, `farmer`.`lname`, `farmer`.`farmers_identification_number`, `farmer`.`association` FROM farmer";

        $result = mysqli_query($connect, $query);

        if ($result) {
            while ($farmerrow = mysqli_fetch_assoc($result)) {
                $results[] = $farmerrow;
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
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="../css/superA_products.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
            <?php include 'includes/seller_indicator.php' ?>
                <div class="page-header">
                    <h5>Super Admin</h5>
                    <small>Farmer / Products</small>
                </div>
                <div class="container">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-2 bg-white rounded">
                            <div class="table-responsive">
                                <table id="products" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>    
                                            <th>Fullname</th>
                                            <th>Farmer's Identification No.</th>
                                            <th>Association</th>
                                            <th>View</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php
                                            foreach ($results as $farmerrow) {
                                        ?>
                                        <tr>
                                            <td><?php echo $farmerrow['fname'] . ' ' . $farmerrow['lname']?></td>
                                            <td><?php echo $farmerrow['farmers_identification_number']?></td>
                                            <td><?php echo $farmerrow['association']?></td></td>
                                            <td><button class="btn btn-basic"><a href="view_products.php?farmer_id=<?php echo $farmerrow['seller_id']; ?>"><i class="fa fa-eye" style="color: #000;"></i></a></button></td>
                                        </tr>
                                        <?php
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
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#products').DataTable();
                
            });
        </script>
    </body>
</html>



