<?php
    if(isset($_POST['submit'])){
        
        require('../../logic/db_connection.php');
        $id=$_POST['id'];
        $filename = $_FILES["choosefile"]["name"];
        $tempname = $_FILES["choosefile"]["tmp_name"];  

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.',$filename);

        $name = $imageExtension[0];
        $imageExtension = strtolower(end($imageExtension));

        if(!in_array($imageExtension, $validImageExtension)){
            ?>
                <script>
                    alert('uploaded successfully');
                    window.location='../edit_profile.php?id=<?php echo $id?>';
                </script>
            <?php
        }else{   
        $newNameImage = $name."-".uniqid();
        $newNameImage .= ".".$imageExtension;
        move_uploaded_file($tempname, "../../uploads/".$newNameImage);
        try{
            $sql = "UPDATE `farmer` SET `profile_image`='$newNameImage' WHERE seller_id='$id'";
            mysqli_query($connect, $sql);
            ?>
                <script>
                    alert('uploaded successfully');
                    window.location='../edit_profile.php?id=<?php echo $id?>';
                </script>
            <?php
        }catch(\Throwable $th){
            echo $th;
        }
        
        }
    }
?>