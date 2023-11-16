<?php
    require("../logic/db_connection.php");
    session_start();
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
        <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">     
        <link href="../css/superA_buyer.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
            <?php include 'includes/seller_indicator.php' ?>
                <div class="page-header">
                    <h5>Super Admin</h5>
                    <small>Accounts / Buyer</small>
                </div>
                    <div class="container">
                        <div class="card rounded shadow border-0">
                            <div class="card-body p-2 bg-white rounded">
                                <div class="table-responsive">
                                    <table id="buyer" style="width:100%" class="table table-striped table-bordered">
                                        <thead>
                                                <tr>
                                                <th>Full Name</th>
                                                <th>Address</th>
                                                <th>Email</th>
                                                <th>Mobile Number</th>
                                                <th>Username</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                            <?php 
                                                $queryGetAllBuyer="SELECT * FROM `buyer`";
                                                $buyer=mysqli_query($connect, $queryGetAllBuyer);
                                                $buyerrow=mysqli_fetch_assoc($buyer);
                                    
                                                if(mysqli_num_rows($buyer) > 0){
                                                    while($buyerrow = mysqli_fetch_assoc($buyer)){
                                            ?>
                                            
                                                <td><?php echo $buyerrow['fname']. " ". $buyerrow["lname"] ;?></td>
                                                <td><?php echo $buyerrow['address']; ?></td>
                                                <td><?php echo $buyerrow['email']; ?></td>
                                                <td><?php echo $buyerrow['phonenumber']; ?></td>
                                                <td><?php echo $buyerrow['username']; ?></td>
                                                <td><a href="delete_accounts/delete_buyer.php?remove=<?php echo $buyerrow['client_id']; ?>" onclick="return confirm('Are you sure you want to remove this account?<?php echo $buyerrow['fname']; ?>');" type="button" class="btn btn-danger btn-danger me-2"><i class="fas fa-trash"></i></a></td>
                                            </tr> 
                                            <?php 
                                                };
                                                };
                                            ?>
                                        </tbody>          
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#buyer').DataTable();
                
            });
        </script>
    </body>
</html>

