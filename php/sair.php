<?php
    session_start();
    $_SESSION['LOGOUT'] = "Aguardamos seu retorno!";
    //redirecionar o usuario para a página de login
    header("Location: ../login.php");
    die();