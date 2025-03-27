<?php
    $host = "localhost";
    $dbname = "login_system";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        //Fazendo o PDO tratar erros como Exceptions
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
        $errorMessage = $ex->getMessage();
        header("Location: ./db/errorDb.php?errorMessage=$errorMessage");
        exit;
    }
?>