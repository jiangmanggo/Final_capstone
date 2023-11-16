<?php
    session_start();

    require '../logic/db_connection.php';
    $client_id = $_SESSION['id'];
    try {
       $sql=mysqli_query($connect, "SELECT `fname`,`lname`,`address`,`email`,`phonenumber`,`username`,`profile_image` FROM `buyer` WHERE `client_id`= '$client_id';");
       $row=mysqli_fetch_assoc($sql);
    } catch (\Throwable $th) {
        echo $th;
    }
?>
<?php

    if (isset($_SESSION['error_message'])) {
        echo "<script>alert('{$_SESSION['error_message']}');</script>";

        unset($_SESSION['error_message']);
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js">
        </script>

        <title>Profile</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
            .btn-rounded{
                width: 170px;
                height: 40px;
                margin-top: 15px;
            }
            .btn-save{
                width: 80px;
            }
            body {
                font-family: 'Inter';
                font-size: 22px;
                background-image: linear-gradient(to bottom right, #f2f3f4, #74c69d);
                background-attachment: fixed;
            }
            .header{
                display: flex;
                flex-direction: row;
                align-items: center;
                background-color: #9DC183;
                width: 100%;
            }
            .header img{
                max-width: 125px;
            }
            .infos{
                display: flex;
                flex-direction: column;
                width: 90%;
            }
            .info{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            .categories{
                display: flex;
                flex-direction: row;
                gap: 60px;
                font-size: 1em;
            }
            .category, .insert-info{
                cursor: pointer;
            }

            .search-form{
                width: 100%;
                margin-top: 2vh;
            }

            input{
                width: 50%;
                height: 5vh;
                padding: 10px;
            }
            .focus{
                border-bottom: 2px solid;
            }
            .btn-log{
                width: 122px;
                height: 40px;
                font-family: 'Arial'; 
                font-size: 16px;                    
                margin-left: 29em;
            }
            .container{
                width: 1200px;
                background-color:#8FBC8F;
                border-radius: 30px;
                height:70vh;
                margin-top: 30px;
                display: flex;
            }
            .card{
                width: 30%;
                height: 60vh;
                margin-left: 30px;
                margin-top: 30px;
                background-color:#f9f6ee;
            }
            .upload{
                margin-top: 7px;
            }
            .details{
                margin-top: 30px;
                margin-left: 125px;
                width: 530px;
                height: 403px;
                background-color: #f5f5f5;
                cursor: pointer;
                font-family: 'Poppins', sans-serif;
                background-color:#f9f6ee;
            }
            .button{
                width: 80px;
                height: 33px;
            }
            .header a {
                color: black;
                text-decoration: none; 
            }
        </style>
    </head>
    <body>
        <nav class="header">
            <img src="../image/logo.png" alt="">
            <div class="infos">
                <div class="info">
                    <div class="categories">
                        <div class="category" id="home"><a href="index.php">HOME</a></div>
                        <div class="category" id="order"><a href="order_history.php">ORDER</a></div>
                        <div class="category" id="cart"><a href="addcart.php">CART</a></div>
                        <div class="category focus" id="profile">PROFILE</div>
                        <div class="log">
                            <a href="../logic/log_out.php?click=active" class="btn btn-danger btn-log" style="color: #fff;">Log out</a>
                        </div>
                    </div>
                </div>
            </div>    
        </nav>
        <div class="container">
            <div class="card" style="border-radius: 20px;">
                <div class="card-body text-center">
                    <div class="upload">
                        <img src="../uploads/<?=$row['profile_image'] ?>" class="rounded-circle" style="width: 250px; height: 240px;" />
                    </div>
                    <button type="button" class="btn btn-primary btn-rounded btn-lg"  data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Image</button>
                </div>
            </div>
            <div class="details">
                <form action="logic/edit_profile.php" method='post' enctype="multipart/form-data">
                    <table class='table table-hover table-bordered '>
                        <tr>
                            <td>Full Name</td>
                            <td><input type='text' name='fname' class='form-control' value="<?=$row['fname'] .' ' . $row['lname'] ?>" required disabled/></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type='text' name='address' class='form-control' value="<?=$row['address'] ?>" required disabled/></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type='text' name='email' class='form-control' value="<?=$row['email'] ?>" required disabled/></td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td><input type='number' name='phonenumber' class='form-control disable-on-edit' value="<?=  '0' .$row['phonenumber'] ?>" required disabled/></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input type='text' name='username' class='form-control' value="<?=$row['username'] ?>" required disabled/></td>
                        </tr> 
                        <tr>
                            <td></td>
                            <td>
                                <input type='submit' value='Save' id="submit" name="submit"
                                    class='btn btn-primary button' disabled/>
                                <div class='btn btn-danger button' id='editBtn'>Edit</div>
                            </td>
                        </tr>
                    </table>  
                </form>
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
                            <div class="modal-footer">
                                <button value="submit" name= "submit" class="btn btn-primary btn-save">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>                
        <script>
            document.getElementById('editBtn').addEventListener('click', function (event) {
                var inputs = document.querySelectorAll('input[name="address"], input[name="email"], input[name="phonenumber"], input[name="username"]');
                var isDisabled = inputs[0].disabled;

                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].disabled = !isDisabled;
                }

                var saveButton = document.getElementById('submit');
                saveButton.disabled = !isDisabled;
            });
        </script>

    </body>
</html>