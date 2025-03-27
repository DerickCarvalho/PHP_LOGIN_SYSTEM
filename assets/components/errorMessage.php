<?php
    $errorMessage = null;
    
    if (isset($_GET['error'])) {
        $error = $_GET['error'];

        switch ($error) {
            case 'method_post_not_found':
                $errorMessage = 'Erro ao enviar formulário';
            break;

            case 'null_camps':
                $errorMessage = 'Preencha todos os campos!';
            break;

            case 'server_error':
                $errorMessage = 'Erro ao realizar cadastro!';
            break;

            case 'user_exist':
                $errorMessage = 'Usuário já cadastrado!';
            break;

            case 'user_not_found':
                $errorMessage = 'Usuário não encontrado!';
            break;

            case 'wrong_password':
                $errorMessage = 'Senha incorreta';
            break;
        }
    }
?>

<style>
    .error-message {
        background-color:#FF0000;
        font-size: 18px;
        font-weight: 600px;
        padding: 10px;
        margin: 0 0 30px 0;
        border-radius: 5px;
    }
</style>

<div class="error-message flex-row-center">
    <p style="color: #FFFFFF;"><?= $errorMessage; ?></p>
</div>