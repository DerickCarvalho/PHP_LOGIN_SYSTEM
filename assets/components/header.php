<?php
    $userTheme = isset($_SESSION['theme']) ? trim($_SESSION['theme']) : '';
    $headerBg = null;

    if ($userTheme != '') {        
        $headerBg = $userTheme == 'dark' ? 'rgb(17, 75, 129)' : '#B3E5FC'; 
    }
    else {
        $headerBg = '#B3E5FC';
    }
?>

<style>
    header {
        background-color: <?= $headerBg ?>;
        padding: 10px;

        .logo {
            img {
                width: 50px;
                margin-right: 10px;
            }

            h3 {
                color: #000543;
            }
        }
        .logo:hover {
            cursor: pointer;
            transform: scale(1.02);
        }
    }
</style>

<header class="flex-row-space-between">
    <div class="logo flex-row-center">
        <img src="./assets/img/logo.png" alt="">
        <h3>LogSys</h3>
    </div>
</header>

<script>
    document.querySelector('.logo').addEventListener('click', () => {
        window.location.href = '/PHP_LOGIN_SYSTEM/homepage.php';
    });
</script>