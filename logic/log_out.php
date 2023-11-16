<?php
    session_start();

    $_SESSION = array();

    session_destroy();

    echo "<script type='text/javascript'>";
    echo "alert('You have logged out successfully.');";
    echo "window.location.href = '../log_in.php';";
    echo "</script>";
    exit();
?>
