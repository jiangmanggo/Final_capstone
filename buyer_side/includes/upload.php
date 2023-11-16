<?php
    require '../logic/db_connection.php';
    $client_id=$_GET['id'];
    try {
       $sql=mysqli_query($connect, "SELECT * FROM `buyer` WHERE `client_id`= '$client_id';");
       $row=mysqli_fetch_assoc($sql);
    } catch (\Throwable $th) {
        echo $th;
    }
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            .btn-rounded{
                width: 170px;
                height: 40px;
            }
            .btn-save{
                width: 80px;
            }.btn-close{
                width: 80px;
            }
            .log{
                padding-left: 90%;
            }
        </style>
    </head>
    <body>
        <div class="container py-5 h-100">
            <div class="col-md-12 col-xl-4">
                <div class="card" style="border-radius: 5px;">
                    <div class="back"  style="margin: 10px 10px;">
                </div>
            <div class="card-body text-center">
                <div class="mt-3 mb-4">
                    <img src="../uploads/<?=$row['profile_image'] ?>" class="rounded-circle" style="width: 250px;" />
                </div>
                <button type="button" class="btn btn-primary btn-rounded btn-lg"  data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Image</button>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="logic/uploadimage.php" method="post" enctype="multipart/form-data">
                            <input type="file" class="form-control" name="choosefile" />
                            <input type="hidden" name="id" value='<?php echo $_SESSION['id'] ?>'> 
                    </div>
                            <div class="modal-footer">
                            <button value="submit" name= "submit" class="btn btn-primary btn-save">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>