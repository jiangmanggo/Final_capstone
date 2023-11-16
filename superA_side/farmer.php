<?php 
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
        <!-- <link href="../css/superA_farmer.css" rel="stylesheet"> -->
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
            }
            .sidebar.close ~ .header{
                left: 78px;
                height: 150vh;
                width: calc(100% - 78px);
            }
            .head{
                box-shadow: 0px 5px 5px -5px rgb(0 0 0 /100%);
            }
            .container{
                margin-top: 1em;
                width: 100%;
                font-size: 16px;
            }
            .page-header{
                margin-top: 1em;
                margin-left: 60px;
                font-size: 1em;
                color: var(--text-color);
            }
            .print{
                margin-top: -2em;
            }
        </style> 
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
            <?php include 'includes/seller_indicator.php' ?>
                <div class="page-header">
                    <h5>Super Admin</h5>
                    <small>Accounts / Farmer</small>
                </div>
                <div class="print" style="padding-left: 89%">
                    <button class="btn btn-success" onclick="printTable()">Print</button><br><br>
                </div>
                <div class="container">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-2 bg-white rounded">
                            <div class="table-responsive">
                                <table id="farmers" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Association</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Farmer's Id Number</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            require("../logic/db_connection.php");
                                            $seller_id = $_SESSION['id'];
                                            $queryGetAllFarmers = "SELECT * FROM `farmer`";
                                            $farmer = mysqli_query($connect, $queryGetAllFarmers);

                                            if (mysqli_num_rows($farmer) > 0) {
                                            while ($farmerrow = mysqli_fetch_assoc($farmer)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $farmerrow['fname'] . " " . $farmerrow["lname"]; ?></td>
                                                <td><?php echo $farmerrow['association']; ?></td>
                                                <td><?php echo $farmerrow['address']; ?></td>
                                                <td><?php echo $farmerrow['email']; ?></td>
                                                <td><?php echo '0' . $farmerrow['phonenumber']; ?></td>
                                                <td><?php echo $farmerrow['farmers_identification_number']; ?></td>
                                                <td><?php echo $farmerrow['username']; ?></td>
                                                <td><a href="delete_accounts/delete_farmer.php?remove=<?php echo $farmerrow['seller_id']; ?>" onclick="return confirm('Are you sure you want to remove this account?');" type="button" class="btn btn-danger btn-danger me-2"><i class="fas fa-trash"></i></a></td>
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
        <script>
    function printTable() {
        var printWindow = window.open('', '', 'width=800,height=600');
        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write('<style>table, th, td {border: 1px solid black; border-collapse: collapse; padding: 8px;}</style>');
        printWindow.document.write('<style>body {align-items: center; text-align: center; }</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<div style="margin-bottom: 5px;"><img src="../image/agri.png" alt="" style="width: 70px; height: auto;"></div>');
        printWindow.document.write('<div><h4>Office of the City Agriculture</h4></div>');
        printWindow.document.write('<div style="text-align: left; margin-bottom: 20px;"><h5>Farmers</h5></div>');

        var table = document.getElementById('farmers').cloneNode(true);
        var rows = table.getElementsByTagName('tr');

        var headerCells = table.querySelector('thead').getElementsByTagName('th');
        headerCells[headerCells.length - 2].style.display = 'none';
        headerCells[headerCells.length - 1].style.display = 'none'; 

        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            if (cells.length > 1) {
                cells[cells.length - 2].style.display = 'none'; 
                cells[cells.length - 1].style.display = 'none'; 
            }
        }

        printWindow.document.write(table.outerHTML);
        printWindow.document.write('</div></body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>

    </body>
</html>

