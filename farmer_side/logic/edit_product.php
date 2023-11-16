<?php 
    session_start();
    require ("../../logic/db_connection.php"); 
    if(isset($_POST['product_category'])&&isset($_POST['product_name'])&&isset($_POST['stocks'])&&isset($_POST['quantity'])&&isset($_POST['price'])&&isset($_POST['unit'])&&isset($_POST['description'])&&isset($_FILES['fileImg']['name'])){
        
        $id = $_GET['id'];
        $product_category = $_POST['product_category'];
        $product_name = $_POST['product_name'];
        $stocks = $_POST['stocks'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $unit = $_POST['unit'];    
        $description = $_POST['description'];  
        $imageName = $_FILES['fileImg']['name'];
        $tmpName = $_FILES['fileImg']['tmp_name'];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.',$imageName);

        $name = $imageExtension[0];
        $imageExtension = strtolower(end($imageExtension));

        if(!in_array($imageExtension, $validImageExtension)){
            echo "not_image";       
        }else{           
            $newNameImage = $name."-".uniqid();
            $newNameImage .= ".".$imageExtension;
            move_uploaded_file($tmpName, "../../uploads/".$newNameImage);
            try{
                mysqli_query($connect, "UPDATE `product_list` SET `product_category`='$product_category',`product_name`='$product_name',`stocks`='$stocks', `quantity`='$quantity',`price`='$price', `unit`='$unit', `description`='$description',`image`='$newNameImage' WHERE `product_id`='$id';");
                header('Location: ../index.php');
            }catch(\Throwable $th){
                echo $th;
            }
        }                                   
    }
        
?>

        
