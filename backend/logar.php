<?php
    session_start();
    require('../../PHP_LOGIN_SYSTEM/db/conn.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        if ($username != '' && $password != '') {
            // Puxa as informações do usuário e valida o login
            try {
                $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE login=:login");
                $stmt->bindParam(':login', $username);

                $stmt->execute();
                
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    if (password_verify($password, $user['senha'])) {
                        $token = "$username" . $user['nome'];
                        setcookie('token', $token, time() + (60*60), "/");

                        $_SESSION['name'] = $user['nome'];
                        $_SESSION['username'] = $username;
                        $_SESSION['theme'] = 'light';

                        header("Location: /PHP_LOGIN_SYSTEM/homepage.php");
                        exit;
                    }
                    else {
                        header("Location: /PHP_LOGIN_SYSTEM/login.php?error=wrong_password");
                        exit;
                    }
                }
                else {
                    header("Location: /PHP_LOGIN_SYSTEM/login.php?error=user_not_found");
                    exit;
                }

            } catch (PDOException $error) {
                header("Location: /PHP_LOGIN_SYSTEM/login.php?error=server_error");
                exit;
            }
        }
        else {
            header("Location: /PHP_LOGIN_SYSTEM/login.php?error=null_camps");
            exit;
        }
    }
    else {
        header("Location: /PHP_LOGIN_SYSTEM/login.php?error=method_post_not_found");
        exit;
    }
?>