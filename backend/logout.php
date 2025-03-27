<?php
    session_start();

    $_SESSION['name'] = '';
    $_SESSION['username'] = '';
    $_SESSION['theme'] = '';

    setcookie('token', $token, -1);

    header("Location: /PHP_LOGIN_SYSTEM/homepage.php");
    exit;
?>