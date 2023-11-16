<?php
    if(isset($_POST['submit'])){
        
        require('db_connection.php');
        $id=$_POST['id'];
        $filename = $_FILES["choosefile"]["name"];
        $tempname = $_FILES["choosefile"]["tmp_name"];  
        $folder = "../uploads/".$filename;   

            $sql = "UPDATE `product_list` SET `image`='$filename' WHERE product_id='$product_id'";

            mysqli_query($connect, $sql);      

            if (move_uploaded_file($tempname, $folder)) {
                ?>
                <script>
                    alert('uploaded successfully');
                    window.location='../farmer_side/side/index.php?id=<?php echo $client_id?>';
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert('error');
                    window.location='../farmer_side/side/index.php?id=<?php echo $client_id?>';
                </script>
            <?php
        }
    }
?>