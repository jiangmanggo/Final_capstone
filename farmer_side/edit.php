<?php
    include 'includes/sidebar.php';
    require("../logic/db_connection.php");
    $id = $_GET['id'];
    try {
        $sql = mysqli_query($connect, "SELECT * FROM product_list WHERE product_id = '$id';");
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
        <link href="../css/farmer_edit_products.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
                <div class="container">
                    <div class="page-header">
                        <form action="logic/edit_product.php?id=<?=$row['product_id'] ?>" method='post' enctype="multipart/form-data">                    
                            <table class='table table-hover table-responsive table-bordered'>
                                <tr>
                                    <td class="td">Product Category</td>
                                        <div class="select">
                                            <td> 
                                                <select name="product_category" class="select" placeholder="Product Category" required> <option value="-select-" selected>-Product Category-</option>
                                                <option value="Fruits" <?php echo ($row['product_category']=="Fruits")?"selected":"" ?>>Fruits</option>
                                                <option value="Basic Commodities" <?php echo ($row['product_category']=="Basic_Commodities")?"selected":"" ?>>Basic Commodities</option>
                                                <option value="Lowland Vegetable" <?php echo ($row['product_category']=="Lowland_Vegetable")?"selected":"" ?>>Lowland Vegetable</option>
                                                <option value="Highland Vegetables" <?php echo ($row['product_category']=="Highland_Vegetables")?"selected":"" ?>>Highland Vegetables</option>
                                                <option value="Spices" <?php echo ($row['product_category']=="Spices")?"selected":"" ?>>Spices</option>
                                                <option value="Root Crops" <?php echo ($row['product_category']=="Root_Crops")?"selected":"" ?>>Root crops</option>
                                            </td>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Name</td>
                                    <td><input type='text' name='product_name' class='form-control' value="<?=$row['product_name'] ?>" required/></td>
                                </tr>
                                <tr>
                                    <td>Stocks</td>
                                    <td><input type='text' name='stocks' class='form-control' value="<?=$row['stocks'] ?>" required/></td>
                                </tr>
                                <tr>
                                    <td>Quantity</td>
                                    <td><input type='text' name='quantity' class='form-control' value="<?=$row['quantity'] ?>" required/></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><input type='number' name='price' class='form-control' value="<?=$row['price'] ?>" required/></td>
                                </tr>
                                <tr>
                                    <td class="td">Unit of Measurement</td>
                                        <div class="select">
                                            <td> <select name="unit" class="select" placeholder="Unit of Measurement" required> <option value="-select-" selected>-Unit of Measurement-</option>
                                            <option value="Kilo" <?php echo ($row['unit']=="Kilo")?"selected":"" ?>> /Kilogram</option>
                                            <option value="Piece" <?php echo ($row['unit']=="Piece")?"selected":"" ?>> /Piece</option>
                                            <option value="ML" <?php echo ($row['unit']=="ML")?"selected":"" ?>> /Milliliter (ML)</option>
                                            <option value="Sack" <?php echo ($row['unit']=="Sack")?"selected":"" ?>> /Sack</option>
                                            </select class='form-control'>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td><input type='text' name='description' class='form-control' value="<?=$row['description'] ?>" required/></td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <div class="img">
                                    <td><input type='file' name='fileImg' class='form-control' />
                                        <form action="logic/uploads/uploadimage.php" method="post" enctype="multipart form-data">
                                        <input type="hidden" name="id" value=''>
                                    </td>
                                </tr>        
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type= 'submit' value='Save Changes' class='btn btn-primary' onclick="editProduct()"/>
                                        <a href= 'index.php' class='btn btn-danger'> Back to Products</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script>
            function editProduct(rowIndex) {
                alert("Product has been successfully edited!");
            }
        </script>
    </body>
</html>