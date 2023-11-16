<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/header.css" rel="stylesheet">
        <title>BCAAOMS</title>
        <style>
             
        </style>
    </head>
    <body>
        <nav class="header">
            <img src="image/logo.png" alt="">
            <div class="infos"> 
                <div class="insert-account">
                    <div class="insert-info focus" id="login">LOGIN</div>
                    <div class="insert-info" id="register">REGISTER</div>
                </div>
            </div>      
        </nav>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){

            let info = "login";

            $("#login").on('click',function(){
                $(this).addClass("focus");
                $("#"+info).removeClass("focus");
                info = $(this).attr("id"); 
                window.location = "log_in.php";
            
            });

            $("#register").on('click',function(){
                $(this).addClass("focus");
                $("#"+info).removeClass("focus");
                info = $(this).attr("id"); 
                window.location = "register.php";
            });

        });   
    </script>
</html>