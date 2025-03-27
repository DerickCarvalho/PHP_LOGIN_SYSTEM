<?php
    require('../../PHP_LOGIN_SYSTEM/db/conn.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = isset($_POST['name']) ? trim($_POST['name']) : '';
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        if ($name != '' && $username != '' && $password != '') {
            $userExist = false;

            // Verificar se usuário já está cadastrado
            try {
                $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE login=:login");
                $stmt->bindParam(':login', $username);

                $stmt->execute();

                if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                    $userExist = true;
                }

            } catch (PDOException $error) {
                header("Location: /PHP_LOGIN_SYSTEM/index.php?error=server_error");
                exit;
            }

            if (!$userExist) {
                try {
                    $passwordEncripted = password_hash($password, PASSWORD_BCRYPT);

                    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, login, senha) VALUES (:name, :login, :password)");
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':login', $username);
                    $stmt->bindParam(':password', $passwordEncripted);
                    $stmt->execute();

                    header("Location: /PHP_LOGIN_SYSTEM/login.php");
                    exit;
                } catch (PDOException $error) {
                    header("Location: /PHP_LOGIN_SYSTEM/index.php?error=server_error");
                    exit;                
                }
            }
            else {
                header("Location: /PHP_LOGIN_SYSTEM/index.php?error=user_exist");
                exit;  
            }
        }
        else {
            header("Location: /PHP_LOGIN_SYSTEM/index.php?error=null_camps");
            exit;
        }
    }
    else {
        header("Location: /PHP_LOGIN_SYSTEM/index.php?error=method_post_not_found");
        exit;
    }
?>