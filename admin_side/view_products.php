<?php
    session_start();
    require '../logic/db_connection.php';

    $results = array();

    if (isset($_SESSION['id'])) {
        $admin_id = $_SESSION['id'];
        $seller_id = $_GET['farmer_id']; 

    $query = "SELECT `product_list`.`product_id`,`product_list`.`product_category`, `product_list`.`product_name`, `product_list`.`price` ,`product_list`.`date_posted` FROM `product_list` INNER JOIN `farmer` ON `product_list`.`seller_id` = `farmer`.`seller_id` INNER JOIN `association_chairman` ON `farmer`.`association` = `association_chairman`.`association` WHERE `association_chairman`.`admin_id` = '$admin_id' AND `farmer`.`seller_id` = '$seller_id'";

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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link href="../css/admin_view_products.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
                <div class= "back">
                    <button class="btn btn-basic" style="margin-left: 4em; margin-top: 1em; font-size: 30px; color: #000; "><a href="products.php" style="text-decoration: none; color: inherit;"><i class="fa fa-arrow-left" style="color: inherit;"></i></a></button>
                </div>
                <div class="container">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-2 bg-white rounded">
                            <div class="table-responsive">
                                <table id="products" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product Category</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Date Posted</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        <?php
                                            foreach ($results as $farmerrow) {
                                        ?>
                                        <tr>
                                            <td><?php echo $farmerrow['product_category']?></td>
                                            <td><?php echo $farmerrow['product_name']?></td>
                                            <td><?php echo $farmerrow['price']?></td>
                                            <td><?php echo $farmerrow['date_posted']?></td>
                                            <td><a href="logic/delete_products.php?id=<?php echo $farmerrow['product_id']?>" onclick="return confirm('Are you sure you want to delete this product?');"><button class='btn btn-danger'><i class="fas fa-trash"></i></button></a></td>
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

