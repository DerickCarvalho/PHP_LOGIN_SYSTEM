<?php
    require('./db/conn.php');
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
    <title>LogSys - Logar-se</title>
</head>
<body>
    <?php include('./assets/components/header.php'); ?>

    <main class="flex-column-center">
        <h1>Logar-se</h1>

        <?php if (isset($_GET['error'])) { include('./assets/components/errorMessage.php'); } ?>

        <form action="./backend/logar.php" method="POST" class="flex-column-center">
            <input class="text-input" type="text" name="username" id="username" placeholder="Digite seu nome de usuário" maxlength="20" required>
            <input class="text-input" type="password" name="password" id="password" placeholder="Digite sua senha" maxlength="50" required>
            <input class="button" type="submit" value="Logar">
            <br>
            <p>Não possui uma conta? <a href="./index.php">Cadastrar-se</a></p>
        </form>
    </main>

    <?php include('./assets/components/footer.php'); ?>
</body>
</html>