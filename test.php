<?php
    session_start();
    echo gettype($_SESSION["activated"]);

    // if (!isset($_SESSION['user']) || isset($_SESSION['activated']) == 0) {
    //     header('Location: login.php');
    //     exit();
    // }
?>