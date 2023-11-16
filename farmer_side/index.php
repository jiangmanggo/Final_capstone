<?php	
	session_start();
	require("../logic/db_connection.php");
	include 'includes/sidebar.php';	 		
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
        <link href="../css/farmer_index.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
            <?php include 'includes/seller_indicator.php' ?>
                <div class="page-header">
                    <h5>Farmer</h5>
                    <small>Home / Products</small>
                </div>
                <a href='add.php' class="btn btn-primary ">&plus; &nbsp; ADD PRODUCTS</a>    
                <div class="container">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-2 bg-white rounded">
                            <div class="table-responsive">
                                <table id="farmers" style="width:100%" class="table table-striped table-bordered">                      
                                    <thead>
                                        <tr>
                                            <th>Product Category</th>
                                            <th>Product Name</th>
                                            <th>Stocks</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Unit of Measurement</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Date Posted</th>
                                            <th>Action</th>           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            require("../logic/db_connection.php");
                                            $id = $_SESSION['id'];
                                            $queryGetAllProducts = "SELECT * FROM `product_list` WHERE `seller_id` = '$id' ORDER BY `date_posted` DESC";
                                            $product_list = mysqli_query($connect, $queryGetAllProducts);

                                            if (mysqli_num_rows($product_list) > 0) {
                                                while ($product_listrow = mysqli_fetch_assoc($product_list)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $product_listrow['product_category']; ?></td>
                                            <td><?php echo ucfirst($product_listrow['product_name']); ?></td>
                                            <td><?php echo $product_listrow['stocks']. " ". $product_listrow["unit"]; ?></td>
                                            <td><?php echo $product_listrow['quantity']; ?></td>
                                            <td><?php echo number_format($product_listrow["price"], 2, '.', ','); ?></td>
                                            <td><?php echo $product_listrow['unit']; ?></td>
                                            <td><?php echo $product_listrow['description']; ?></td>
                                            <td class="prod-img" >  
                                            <img style="width: 50px;" src="../uploads/<?php echo $product_listrow["image"]; ?>" alt="">
                                            <td><?php $date = date("Y-m-d", strtotime("+6 HOURS")); echo $date; ?></td>
                                            <td>
                                                <a href="edit.php?id=<?php echo $product_listrow['product_id']?>"><button class='btn btn-info fas fa-edit'></button></a>
                                                <a href="logic/delete_products.php?id=<?php echo $product_listrow['product_id']?>" onclick="return confirm('Are you sure you want to delete?');"><button class='btn btn-danger'>&#10005;</button></a>
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
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#farmers').DataTable();
                
            });
        </script>
    </body>
</html>



