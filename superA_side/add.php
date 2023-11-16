<?php
    include 'includes/sidebar.php';
    require("../logic/db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">       
        <link href="../css/superA_add.css" rel="stylesheet">
        <title>BCAAOMS</title> 
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
                <div class="bod">
                    <div class="container">
                        <div class="page-header">
                            <form action="logic/add_admin.php" method='post'>
                                <table class='table table-hover table-responsive table-bordered'>
                                    <tr>
                                        <td class="td">Association</td>
                                            <div class="select">
                                                <td> <select name="association" class="select" placeholder="Association" required> <option value="-select-" selected>-Association-</option>
                                                <option value="BAMAIFA">BAMAIFA</option>
                                                <option value="MOVA">MOVA</option>
                                                <option value="SFAADA">SFAADA</option></select         
                                                class='form-control'>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Full Name</td>
                                        <td><input type='text' name='fullname' class='form-control' required/></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><input type='text' name='username' class='form-control' required/></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td><input type='text' name='password' class='form-control' required/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type='submit' value='Submit' id="submit" name="submit" class='btn btn-primary' />
                                            <a href='admin.php' class='btn btn-danger'>Back to Admin</a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section
    </body>
</html>
