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
        <link href="../css/farmer_add_products.css" rel="stylesheet">
        <title>BCAAOMS</title>  
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
                <div class="body">
                    <div class="container">
                        <div class="page-header">
                            <form action="logic/add_product.php" method='post' enctype="multipart/form-data">
                                <table class='table table-hover table-responsive table-bordered'>
                                    <tr>
                                        <td class="td">Product Category</td>
                                            <div class="select">
                                                <td> <select name="product_category" class="select" placeholder="Product Category" required> <option value="-select-" selected>-Product Category-</option>
                                                <option value="ROOTS">ROOTS</option>
                                                <option value="LEGUMES">LEGUMES</option>
                                                <option value="RICE">RICE</option>
                                                <option value="CABBAGE">CABBAGE</option>
                                                <option value="NIGHT_SHADES">NIGHT SHADES</option>
                                                <option value="FRUITS">FRUITS</option>
                                                <option value="CUCURBITA">CUCURBITA</option></select></td>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Product Name</td>
                                        <td><input type='text' name='product_name' class='form-control' required/></td>
                                    </tr>
                                    <tr>
                                        <td>Stocks Available</td>
                                        <td><input type='text' name='stocks' class='form-control' required/></td>
                                    </tr>
                                    <tr>
                                        <td>Minimum Quantity</td>
                                        <td><input type='text' name='quantity' class='form-control' required/></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td><input type='number' name='price' class='form-control' required/></td>
                                    </tr>
                                    <tr>
                                        <td class="td">Unit of Measurement</td>
                                            <div class="select">
                                                <td> <select name="unit" class="select" placeholder="Unit of Measurement" required> <option value="-select-" selected>-Unit of Measurement-</option>
                                                <option value="Kilo"> /Kilogram</option>
                                                <option value="Piece"> /Piece</option>
                                                <option value="Milliliter"> /Milliliter (ML)</option>
                                                <option value="Milliliter"> /Sack</option></select></td>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><input type='text' name='description' class='form-control' required/></td>
                                    </tr>                         
                                    <tr>
                                        <td> </td>
                                        <div class="img">
                                        <td><input type='file' name='fileImg' class='form-control' required/>                                  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type='submit' value='Submit' id="submit" name="submit" class='btn btn-primary' onclick="addProduct()"/>
                                            <a href='index.php' class='btn btn-danger'>Back to Products</a>
                                        </td>
                                    </tr>
                                </table>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function addProduct() {
                alert("Product has been added to the table!");
            }
        </script>
    </body>
</html>