<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link href="../css/farmer_sidebar.css" rel="stylesheet">
        <title>BCAAOMS</title>
    </head>
    <body>
    <?php
require '../logic/db_connection.php'; // Include the database connection

$seller_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Query to retrieve stock from product_list
$queryStocks = "SELECT stocks FROM product_list WHERE seller_id = '$seller_id'";
$resultStocks = mysqli_query($connect, $queryStocks);

// Query to check for pending orders
$queryPending = "SELECT status FROM `order` WHERE seller_id = '$seller_id' AND status = 'pending'";
$resultPending = mysqli_query($connect, $queryPending);

$stocksIndicator = false; // Initialize a variable to track if the stocks indicator should be displayed
$pendingOrdersIndicator = false; // Initialize a variable to track if the pending orders indicator should be displayed

if ($resultStocks) {
    while ($row = mysqli_fetch_assoc($resultStocks)) {
        $stocks = $row['stocks'];
        if ($stocks <= 0) {
            $stocksIndicator = true; // Set the stocks indicator to true if any product has zero stocks
            break; // Exit the loop as soon as one product with zero stocks is found
        }
    }
}

if ($resultPending) {
    $row = mysqli_fetch_assoc($resultPending);
    if ($row) {
        $pendingOrdersIndicator = true; // Set the pending orders indicator to true if there are pending orders
    }
}

mysqli_close($connect);
?>
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
                        <span class="text nav-text">&nbsp; &nbsp; &nbsp;Products</span>
                        <!-- Indicator will be displayed conditionally -->
                        <?php
                        if ($stocks <= 0) {
                            echo '<span class="stock-indicator">';
                            echo '<i class="fas fa-exclamation-circle" style="color: red;"></i>';
                            echo '</span>';
                        }
                        ?>
                    </a>
                        </li>
                        <li class="nav-link">
                            <a href="orders.php">
                                <i class='fa fa-tasks' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Pending Orders</span>
                                <!-- Pending orders indicator will be displayed conditionally -->
                                <?php
                                if ($pendingOrdersIndicator) {
                                    echo '<span class="order-indicator">';
                                    echo '<i class="fas fa-exclamation-circle" style="color: red;"></i>';
                                    echo '</span>';
                                }
                                ?>
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
                                <i class='fa fa-truck' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Transaction</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="inventory.php">
                                <i class='fa fa-database' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Inventory</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="profile.php">
                                <i class='fa fa-users' style="color: black;"></i>
                                <span class="text nav-text">&nbsp; &nbsp; &nbsp;Profile</span>
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
const body = document.querySelector('body');
const sidebar = body.querySelector('nav');
const toggle = body.querySelector(".toggle");
const searchBtn = body.querySelector(".menu");
const modeSwitch = body.querySelector(".toggle-switch");
const modeText = body.querySelector(".mode-text");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

searchBtn.addEventListener("click", () => {
    sidebar.classList.remove("close");
});

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
        modeText.innerText = "Light mode";
    } else {
        modeText.innerText = "Dark mode";
    }
});
</script>
    </body>
</html>
