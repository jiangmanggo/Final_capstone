<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link href="../css/superA_sidebar.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="../image/agri.png" alt="">
                    </span>
                    <div class="text logo-text">
                        <span class="name">Office of City </span>
                        <span class="profession">Agriculture</span>
                    </div>
                </div>
                <i class='bx bx-chevron-right toggle'></i>
            </header>
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">                  
                        <li class="nav-link">
                            <a href="index.php">
                                <i class='fa fa-home' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="sales.php">
                                <i class='fa fa-coins' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Sales</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="transaction.php">
                                <i class='fa fa-truck'style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Transaction</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="accounts.php">
                                <i class='fa fa-users' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Accounts</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="farmer.php">
                                <i class='fa fa-store' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Farmer</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="buyer.php">
                                <i class='fa fa-user' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Buyer</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="admin.php">
                                <i class='fa fa-users' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Chairman</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="products.php" style="color: black;">
                                <i class="fa-solid fa-tag"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Products</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="s.a_back_up.php" style="color: black;">
                                <i class="fa-solid fa-database"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Back Up</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <li class="">
                        <a href="../logic/log_out.php?click=active">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                    <li class="mode">
                        <div class="sun-moon">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Dark mode</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>                
                </div>
            </div>
        </nav>
        <script>
            const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            searchBtn = body.querySelector(".menu"),
            modeSwitch = body.querySelector(".toggle-switch"),
            modeText = body.querySelector(".mode-text");

            toggle.addEventListener("click" , () =>{
                sidebar.classList.toggle("close");
            })

            searchBtn.addEventListener("click" , () =>{
                sidebar.classList.remove("close");
            })

            modeSwitch.addEventListener("click" , () =>{
                body.classList.toggle("dark");
                
                if(body.classList.contains("dark")){
                    modeText.innerText = "Light mode";
                }else{
                    modeText.innerText = "Dark mode";
                    
                }
            });
        </script>
    </body>
</html>
