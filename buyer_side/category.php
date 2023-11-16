<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <section class="category">

        <?php
            if(isset($_POST['submit'])) {
                $categories = $_POST['category'];
                echo $categories;

                foreach($categories as $key=>$values){
                    echo $values.", " ;
                }
            }
        
        
        ?>
            <form action="" method="post" class="categories">
                <input type="checkbox" name="category[]" value="Fruits">Fruits
                <input type="checkbox" name="category[]" value="Other Basic Commodities">Other Basic Commodities
                <input type="checkbox" name="category[]" value="Lowland Vegetables">Lowland Vegetables
                <input type="checkbox" name="category[]" value="Highland Vegetables">Highland Vegetables
                <input type="checkbox" name="category[]" value="Spices">Spices
                <input type="checkbox" name="category[]" value="Root Crops">Root Crops

                <input type="submit" name="submit" value="submit">
            </form>
        </section>
    </div>
</body>
</html>