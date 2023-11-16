<?php 
    session_start();
    include 'includes/sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
        <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- <link href="../css/superA_farmer.css" rel="stylesheet"> -->
        <title>BCAAOMS</title>
        <style>
            @media screen and (max-width:990px){
            .counter{ margin-bottom: 40px; }
            }
            .header{
                position: absolute;
                top: 0;
                top: 0;
                left: 250px;
                height: 100vh;
                width: calc(100% - 250px);
                background-color: var(--body-color);
                transition: var(--tran-05);
                font-family: 'Poppins', sans-serif;
            }
            .header .head{
                font-size: 20px;
                font-weight: 500;
                color: var(--text-color);
                padding: 12px 60px;
            }
            .sidebar.close ~ .header{
                left: 78px;
                height: 150vh;
                width: calc(100% - 78px);
            }
            .head{
                box-shadow: 0px 5px 5px -5px rgb(0 0 0 /100%);
            }
            .container{
                margin-top: 1em;
                width: 100%;
                font-size: 16px;
            }
            .page-header{
                margin-top: 1em;
                margin-left: 60px;
                font-size: 1em;
                color: var(--text-color);
            }

            .text-center{
                margin-top: 25px;
                font-size: 12px;
            }
            @media only screen and (min-width: 320px){
                .container{
                    padding-right: 30px;

                }
            }
            
            .user_card {
                height: 350px;
                width: 420px;
                margin-top: auto;
                margin-bottom: auto;
                background: #fff;
                position: relative;
                display: flex;
                justify-content: center;
                flex-direction: column;
                padding: 10px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius: 5px;
            }
            .brand_logo_container {
                position: absolute;
                height: 150px;
                width: 160px;
                top: -75px;
                border-radius: 50%;
                background: var(--body-color);
                padding: 10px;
                text-align: center;
            }
            .brand_logo {
                height: 135px;
                width: 150px;
            }
            .login_btn {
                width: 90%;
                background: #73a16c !important;
                color: white !important;
            }
            .login_btn:focus {
                box-shadow: none !important;
                outline: 0px !important;
            }
            .login_container {
                padding: 0 2rem;
            }
            .input-group-text {
                background: #307d7e !important;
                color: white !important;
                border: 0 !important;
                border-radius: 0.25rem 0 0 0.25rem !important;
            }
            .input_user,
            .input_pass {
                box-shadow: none !important;
                outline: 0px !important;
                border: 0.1em solid #3c565b; 
                border-radius: 0.3em;  
                outline: 0.5em;
            }
            .log{
                margin-top: 60px;
                margin-left: 75px;
            }
            .form{
                margin-top: 50px;
            }
            .container{
                margin-top: 80px;
            }
        </style> 
    </head>
    <body>
        <section class="header">
            <div class="head">Bago City Agricultural Association Online Market System</div>
            <?php include 'includes/seller_indicator.php' ?>
                <div class="page-header">
                    <h5>Super Admin</h5>
                    <small>Home / Back Up</small>
                </div>  
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <div class="user_card">
                            <div class="d-flex justify-content-center">
                                <div class="brand_logo_container">
                                    <img src="../image/agri.png" class="brand_logo" alt="Logo">
                                </div>
                            </div>
                            <div class="log">
                                <h5><b>LOGIN TO YOUR ACCOUNT<b></h5>
                            </div>
                            <div class="form">
                                <div class="d-flex justify-content-center form_container">
                                <form id="sign_in">
                                    <!-- Username input field -->
                                    <div class="input-group mb-3">
                                        <input type="text" id="username" class="form-control input_user" placeholder="Username" required autocomplete="username">
                                    </div>
                                    
                                    <!-- Password input field -->
                                    <div class="input-group mb-2">
                                        <input type="password" id="password" class="form-control input_pass" placeholder="Password" required autocomplete="current-password">
                                    </div>

                                    <!-- Login button -->
                                    <div class="d-flex justify-content-center mt-3 login_container">
                                        <button type="submit" value="submit" class="btn login_btn"><b>LOG IN</b></button>
                                    </div>
                                </form>
                                <div class="btn-modal">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
            <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column align-items-center gap-2" id="btn_content">
                </div>
            </div>
            </div>
        </div>
    </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function(){
    

    let isShow = true;
    $("#show_password").on("click",function(){
        if(isShow==true){
            $("#show_password").removeClass("fa-eye-slash");
            $("#show_password").addClass("fa-eye");
            $("#password").prop("type","text");
            isShow = false;
        }else{
            $("#show_password").addClass("fa-eye-slash");
            $("#show_password").removeClass("fa-eye");
            $("#password").prop("type","password");
            isShow = true;
        }
    })

    $("#sign_in").on("submit", function(e){
        e.preventDefault();
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            url: 'logic/confirm.php',
            type: 'POST',
            data: {username:username, password:password},
            cache: false, 
            success: function(res){
                if(res==1){
                    modalShow();
                }else{
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Invalid username or password",
                        showConfirmButton: false,
                        timer: 1000
                    });
                }
            }
        });
    })

});

function modalShow(){
    btn_modal = `
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="display: none" id="show_modal">
            Launch demo modal
        </button>`;
    $(".btn-modal").html(btn_modal);
    $("#show_modal").click();
    btn_content = `
        <b>Choose how you want to back up and restore your data:</b>
        <button class="btn btn-primary w-100" onclick="sql()">Export to SQL</button>
        <button class="btn btn-success w-100" id="excel">Export to EXCEL</button>
    `;
    $("#btn_content").html(btn_content);
}

function sql(){
    window.open('logic/back_up.php', '_self'); 
}
</script>
</html>
