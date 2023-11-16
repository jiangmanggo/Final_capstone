<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">     
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
        <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
        <link href="css/register_buyer.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>      
        <form action="logic/register_buyers.php" method='post'>
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="image/agri.png" class="brand_logo" alt="Logo">
                    </div>
                </div>        
                <h5><b>CREATE YOUR ACCOUNT<b></h5>                                
                <div class="content">       
                    <div class="row"> 
                        <div class="col-md-6">
                            <input type="text"  class="form" name="fname" placeholder="First Name " autocomplete="name"><br>
                            <input type="text" class="form" name="lname" placeholder="Last Name" autocomplete="name"><br> 
                            <input type="text" class="form" name="address" placeholder="Address" autocomplete="address"><br> 
                            <input type="email" class="form" name="email" placeholder="Email" autocomplete="email"><br> 
                        </div> 
                        <div class="col-md-6">  
                            <input type="tel" maxlength="11" class="form" name="phonenumber" placeholder="Mobile number" required autocomplete="tel">
                            <br><input type="text" class="form" name="username" placeholder="Username" required autocomplete="username"><br> 
                            <input type="password" class="form" name="password" placeholder="Password" required autocomplete="new-password"><br> 
                            <input type="password" class="form" name="confirm" placeholder="Confirm password" required autocomplete="new-password"><br> 
                        </div>
                    </div> 
                </div>                          
                <button type="submit" value ='submit' class="btn regis_btn"><div class="reg"><b>REGISTER</b></div></button>          
                <div class="text"> 
                    <p>Already have an account? <a href="log_in.php">Log In</a></p> 
                </div>                       
            </div> 
        </form>       
    </body> 
</html>
