<?php
    session_start();
    require 'logic/db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">     
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- <link href="css/register_farmer.css" rel="stylesheet">   -->
        <title>BCAAOMS</title> 
        <style>
            body {
                background-image: linear-gradient(to bottom right, #f2f3f4, #74c69d);
                background-attachment: fixed;
            }
            .user_card {
                height: 37em;
                width: 43em;
                margin-top: 5em;
                margin-left: 21em;
                background: #fff;
                position: relative;
                display: flex;
                justify-content: center;
                flex-direction: column;
                padding: 0.8em;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius: 1em;
            }
            .brand_logo_container {
                position: absolute;
                height: 8.6em;
                width: 9em;
                top: -75px;
                border-radius: 50%;
                background: linear-gradient(to bottom right, #f2f3f4, #74c69d);
                padding: 10px;
                margin-left: 3.9em;
            }
            .brand_logo {
                height: 8.5em;
                width: 11.5em;
                margin-left: -0.2em;
                margin-top: -0.8em;
            }         
            .regis_btn{
                width: 20em;
                height: 2.5em;
                font-family: 'Arial';
                font-size: 1em;
                background: #73a16c !important;
                color: white !important;
                margin-top: 0.2em; 
                margin-left: 11.3em; 
            }
            .regis_btn:focus {
                box-shadow: none !important;
                outline: 0px !important;
            }
            .text{ 
                margin-top: 0;
                margin-bottom: 2.5em; 
                font-size: 0.5em; 
                margin-left: 25em; 
                text-align: center; 
            } 
            @media only screen and (min-width: 320px)
            { 
                *{ padding-right: 50px; 
                    padding-top: 10px; 
                } 
            } 
            .select{
                width: 15em;
                margin-left: 5em;
                height: 2.3em;
                margin-top: 1.5em;
                margin-bottom: 0.1em;
                border: 0.1em solid #3c565b; 
                border-radius: 0.3em;  
                outline: 0.5em;
            }
            .selection{
                width: 15em;
                margin-left: 5em;
                height: 2.3em;
                margin-top: 0.1em;
                margin-bottom: 0.1em;
                border: 0.1em solid #3c565b; 
                border-radius: 0.3em;  
                outline: 0.5em;
            }
            .form{
                border: 0.1em solid #3c565b; 
                border-radius: 0.3em;  
                outline: 0.5em;
                display: flex;
                font-size: 1em;
                margin-left: 5em;         
            }    
            input {
                display: block; 
                width: 15em; 
                height: 2.3em; 
                padding: 0.5em; 
                margin: 0.1em auto;
                border-radius: 1em; 
            } 
            .form{ 
                display: flex;
                font-size: 1em;
                margin-left: 5em;
            }       
            h5{
                margin-top: 2.9em;
                margin-left: 11em;
            }
            .reg{
                margin-left: 6em;
                margin-top: -0.5em;
            }  
        </style> 
    </head>
    <body>
        <form action="logic/register_farmers.php" method='post'>
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
                            <input type="text"  class="form" name="fname" placeholder="First Name" required autocomplete="given-name"><span><br>
                            <input type="text" class="form" name="lname" placeholder="Last Name" required autocomplete="family-name"><br> 
                            <?php 
                                $query = "SELECT address FROM client_address ORDER BY address ASC";
                                $result = $connect->query($query);
                            ?>
                            <select name="address" class="selection" placeholder="Select Address" required autocomplete="address">>
                                <option value="">-Choose your Address-</option>
                                <?php
                                foreach($result as $row)
                                {
                                    echo '<option value="'.$row["address"].'">'.$row["address"].'</option>';
                                }
                                ?>
                            </select><br>
                            <select name="association" class="select" placeholder="Select Association" required autocomplete="association">> 
                            <option value="-select-" selected>-Select Association-</option> 
                            <option value="BAMAIFA">BAMAIFA</option> <option value="MOVA">MOVA</option> 
                            <option value="SFAADA">SFAADA</option> </select><br><br> 
                            <input type="email" class="form" name="email" placeholder="Email" required autocomplete="email"><br>
                        </div> 
                        <div class="col-md-6"> 
                            <input type="tel" maxlength="11" class="form" name="phonenumber" placeholder="Mobile number" required autocomplete="tel">
                            <br> <input type="text" class="form" name="farmers_identification_number" placeholder="Farmers Identification Number" required autocomplete="off"><br> 
                            <input type="text" class="form" name="username" placeholder="Username" required autocomplete="username"><br> 
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



