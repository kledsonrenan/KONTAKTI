<?php
session_start();
require_once('../private/conection.php');

// CAMPOS PREENCHIDOS
if ( (isset($_POST['login_email'])) && (isset($_POST['login_pass'])) ) {
    
    $user = mysqli_real_escape_string($connection, $_POST['login_email']);
    $pass = mysqli_real_escape_string($connection, $_POST['login_pass']);
    // CRIPTOGRAFA A SENHA ANTES DE PESQUISAR NO BANCO DE DADOS
    $pass = md5($pass);
    
    // REALIZA BUSCA POR USUARIO NA TABELA
    $result_user = "SELECT * FROM user WHERE email = '$user' && senha = '$pass' LIMIT 1";
    $resultado_user = mysqli_query($connection, $result_user);
    $result_final   = mysqli_fetch_assoc($resultado_user);
    
    // ENCONTROU UM USUARIO
    if ( isset($result_final) ) {
        $_SESSION['USER-ID']    = $result_final['id'];
        $_SESSION['USER-NAME']  = $result_final['nome'];
        $_SESSION['USER-MAIL']  = $result_final['email'];
        
        header('Location: ../../pages/schedduler.php');
    }
    // NAO ENCONTROU UM USUARIO
    else {
        $_SESSION['USER-LOGIN'] = "Usuario não existe ou você digitou algum dado incorreto!";
        header('Location: ../../login.php');
        die();
    }
}