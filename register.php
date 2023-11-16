<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/jpg" href="assets/logo.jpg"/>
        <title>BCAAOMS</title>
        <link href="css/all.min.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/register.css" rel="stylesheet">    
    </head>
    <body> 
	    <div class="main-container">
           <center><h2 class="select">SELECT USERTYPE</strong></h2></center> 	
            <div class="img">
                <div class="buyer-side">
                    <img src="image/buyer.png" class="buyer-img" onclick="window.location='register_buyer.php';">
                    <h4 class="buyer" class="buyer-text"> BUYER<h4>  
                </div>
                <div class="seller-side">               
                    <img src="image/seller.png" class="seller-img" onclick="window.location='register_farmer.php';">
                    <h4 class="seller" class="seller-text"> FARMER</h4>
                </div>
            </div>
            <center><button onclick="window.location='log_in.php';"  class="btn btn-login text-white ">LOGIN</button></center>
	    </div>
    </body>
</html>
