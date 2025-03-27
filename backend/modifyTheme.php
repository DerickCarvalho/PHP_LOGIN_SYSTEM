<?php
    session_start();

    $theme = isset($_GET['theme']) ? $_GET['theme'] : '';

    if ($theme != '') {        
        $_SESSION['theme'] = $theme;        
    }

    header("Location: /PHP_LOGIN_SYSTEM/homepage.php");
    exit;
?>