<?php
    session_start();
    require('./db/conn.php');

    $name = isset($_SESSION['name']) ? trim($_SESSION['name']) : '';
    $username = isset($_SESSION['username']) ? trim($_SESSION['username']) : '';
    $theme = isset($_SESSION['theme']) ? trim($_SESSION['theme']) : '';
    $token = isset($_COOKIE['token']) ? $_COOKIE['token'] : '';
    $tokenVerify = $username . $name;
    $textColor = '#000543';
    $bgColor = '#000543';

    if ($theme != '') {        
        $textColor = $theme == 'dark' ? '#FFFFFF' : '#000543';
        $bgColor = $theme == 'dark' ? '#000543' : '#FFFFFF';
    }

    if ($tokenVerify != '') {
        if ($tokenVerify != $token) {
            header("Location: /PHP_LOGIN_SYSTEM/login.php");
            exit; 
        }
    }
    else {
        header("Location: /PHP_LOGIN_SYSTEM/login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/DerickCarvalho/DkStrap@main/DkStrap.css">
    <link rel="stylesheet" href="./assets/css/default.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="icon" href="./assets/img/logo.png">
    <style>
        * {
            color: <?= $textColor ?>;
        }

        body {
            background-color: <?= $bgColor ?>;
        }
    </style>
    <title>LogSys - Homepage</title>
</head>
<body>
    <?php include('./assets/components/header.php'); ?>

    <main class="flex-column-center">
        <h1>Ola, <?= $name?>!</h1>

        <h3>Seja bem vindo ao LogSys!</h3>

        <br><br>

        <p>O LogSys é um sistema simples, feito para testar meus conhecimentos em PHP puro.</p>
        <br>
        <p>Modifique seu tema abaixo</p>
        <br><br>

        <select style="color: #000543;" name="theme" id="theme">
            <?php
                if ($theme == 'dark') {
                    echo "<option value=\"$theme\">$theme</option>";
                    echo "<option value=\"light\">light</option>";
                }
                else {
                    echo "<option value=\"$theme\">$theme</option>";
                    echo "<option value=\"dark\">dark</option>";
                }
            ?>
        </select>

        <button id="modify-theme" class="button">Salvar</button>
        <br>
        <p>Clique no botão abaixo para deslogar-se</p>
        <button id="logout" class="button">Logout</button>
    </main>

    <?php include('./assets/components/footer.php'); ?>

    <script src="./assets/js/homepage.js"></script>
</body>
</html>