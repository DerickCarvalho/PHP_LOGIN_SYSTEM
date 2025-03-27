<?php
    $errorMessage = $_GET['errorMessage'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginSystem - DbError</title>
</head>
<body>
    <h3>Erro na conexão com o DB</h3>
    <br><br>

    <pre>
        Erro:

        <?= $errorMessage; ?>
    </pre>
</body>
</html>