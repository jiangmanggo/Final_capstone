<?php
session_start();


?>
<?php
    require '../logic/db_connection.php';
    $seller_id = $_SESSION['id'];
    try {
       $sql=mysqli_query($connect, "SELECT * FROM `farmer` WHERE `seller_id`= '$seller_id';");
       $row=mysqli_fetch_assoc($sql);
    } catch (\Throwable $th) {
        echo $th;
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

        <title>edit_profile</title>
        <style>
               *{
                margin:0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Arial', sans-serif;
            }
            body{
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: #eaefc8;
            }
            .container{
                position: relative;
                width: 900px;
                height: 610px;
                background: #000;
                border-radius: 15px;
            }
            .card-body 
            {
                width: 300px;
                height: 300px;
                background-color: #fff;
                border-radius: 10px;
                position: relative;
                bottom: 500;
                left: 50px; 
                /* top: 25px;*/
            }
            /* .btn
            {
                width: 50px;
                height: 50px;
            } */
            .form{

                position: relative;
                width: 280px;
                height: 40px;
                background-color: #acdf87;
                border-radius: 5px;
                justify-content: space-between;
                /* top: 5px; */
                left: 380px;
                margin: 6px 7;
            }
            .select
            {
                position: relative;
                width: 280px;
                height: 40px;
                background-color: #acdf87;
                border-radius: 5px;
                justify-content: space-between;
                /* top: 40px; */
                left: 380px;
                margin: 10px 7;
            }
            .select .form 
            {
                position: relative;
                width: 280px;
                height: 40px;
                background-color: #acdf87;
                border-radius: 5px;
                justify-content: space-between;
                /* top: 40px; */
                left: 380px;
                margin: 30px 7;
            }
            .actionBtn
            {
                position: relative;
                width: 90px;
                height: 40px;
                background-color: #fff;
                border-radius: 10px;
                display: flex; 
                align-items: center;
                justify-content: center;
                text-align: center; 
                cursor: pointer;
                top: 220;
                left: 100;
                
            }
             .btn-rounded{
                width: 170px;
                height: 40px;
                margin: 250px 7;  
            }
            .btn-save{
                width: 80px;
            }.btn-close{
                width: 80px;
            }
          
        </style>
    </head>
    <body>

        <div class="back"><br>
            <div class="container py-5 h-610">
            <div class="col-md-6 col-xl-8">
                <!-- <div class="card" style="border-radius: 20px;"> -->
                    <!-- <div class="back"  style="margin: 10px 10px;">
                </div> -->
                <nav>
              <!-- <div class="card"> -->
              <div class="row">  
                        <div class="col-md-9">
                            <input type="text"  class="form" name="fname" placeholder="First Name" required><br>
                            <input type="text" class="form" name="lname" placeholder="Last Name" required><br> 
                            <input type="text" class="form" name="address" placeholder="Address" required><br> 
                            <select name="association" class="select" placeholder="Select Association" required> 
                            <option value="-select-" selected>-Select Association-</option> 
                            <option value="BAMAIFA">BAMAIFA</option> <option value="MOVA">MOVA</option> 
                            <option value="SFAADA">SFAADA</option> </select><br><br> 
                            <input type="email" class="form" name="email" placeholder="Email" required><br> </div> 
                            <div class="col-md-7">  
                                 <input type="tel" maxlength="11" class="form" name="phonenumber" placeholder="Mobile number" required><br>
                                <input type="text" class="form" name="username" placeholder="Username" required><br> 
                                <input type="password" class="form" name="password" placeholder="Password" required><br> 
                                <input type="password" class="form" name="confirm" placeholder="Confirm password" required><br> 
                            </div>
                           <div class="actionBtn">
                    <a href="profile.php">Save</a></p>
                        
                    </div>                          
                    <!-- <button> 
                    <div class="actionBtn">
                    <a href="profile.php">Save</a></p></button>-->
                    <!-- <div class="text">  -->
                        <!-- <div class="actionBtn">
                            <button>save</button> -->
                            
                    </div>
                    </div>
                 </nav>



            <div class="card-body text-center">
                <div class="mt-1 mb-3">
                <img src="../uploads/<?=$row['profile_image'] ?>" class="square" style="width: 280px; height: 280px; border-radius:10px; margin-top: 10px;" />
                </div>
                <button type="button" class="btn btn-primary btn-rounded btn-lg"  style="width: 200px; height: 45px; border-radius:30px; margin-top: 10px;"  data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Image</button>
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
                  </div>
                  </form>
                  </div>          
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
        let focus = "home";

        $("#home").on('click',function(){
            $(this).addClass("focus");
            $("#"+focus).removeClass("focus");
            focus = $(this).attr("id");
            $(".content-view").text("home");
        });

        $("#order").on('click',function(){
            $(this).addClass("focus");
            $("#"+focus).removeClass("focus");
            focus = $(this).attr("id"); 
            $(".content-view").text("order");
        
        });

        $("#cart").on('click',function(){
            $(this).addClass("focus");
            $("#"+focus).removeClass("focus");
            focus = $(this).attr("id");
            $(".content-view").text("cart");
            
        });
        
        });

    </script>
</html>