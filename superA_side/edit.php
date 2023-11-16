<?php
    include 'includes/sidebar.php';
    require("../logic/db_connection.php");
    $id = $_GET['id'];
    try {
        $sql = mysqli_query($connect, "SELECT * FROM `association_chairman` WHERE admin_id = '$id';");
        $row = mysqli_fetch_assoc($sql);
    } catch (\Throwable $th) {
        echo $th;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">       
        <link href="../css/superA_edit.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
                <div class="container">
                    <div class="page-header">
                        <form action="logic/edit_admin.php?id=<?=$row['admin_id'] ?>" method='post'>                          
                            <table class='table table-hover table-responsive table-bordered'>
                                <tr>
                                    <td class="td">Association</td>
                                        <div class="select">
                                            <td> <select name="association" class="select" placeholder="Association" required> <option value="-select-" selected>-Association-</option>
                                            <option value="BAMAIFA" <?php echo ($row['association']=="BAMAIFA")?"selected":"" ?>>BAMAIFA</option>
                                            <option value="MOVA" <?php echo ($row['association']=="MOVA")?"selected":"" ?>>MOVA</option>
                                            <option value="SFAADA" <?php echo ($row['association']=="SFAADA")?"selected":"" ?>>SFAADA</option></select         
                                            class='form-control'>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Full Name</td>
                                    <td><input type='text' name='full_name' class='form-control' value="<?=$row['fullname'] ?>" required/></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type='text' name='username' class='form-control' value="<?=$row['username'] ?>" required/></td>
                                </tr> 
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type= 'submit' value='Save Changes' class='btn btn-primary' />
                                        <a href= 'admin.php' class='btn btn-danger'> Back to Admin</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </section
    </body>
</html>