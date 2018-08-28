<?php
session_start();
require_once('../private/conection.php');

if ( isset($_POST['cadastro']) ) {
    // PEGANDO VALORES DOS CAMPOS
    $user_name      = $_POST['user_name'];
    $user_mail      = $_POST['user_mail'];
    $user_phone     = $_POST['user_phone'];
    $user_year      = $_POST['user_year'];
    $user_pass      = $_POST['user_pass'];
    // CRIPTOGRAFANDO A SENHA ANTES DE SALVAR NO BANCO DE DADOS
    $user_pass      = md5($user_pass);
    
    $query = "INSERT INTO user (nome, email, telefone, aniversario, senha) VALUES (
        '$user_name', '$user_mail', '$user_phone', '$user_year', '$user_pass'
    );";
    
    $result = mysqli_query($connection, $query);
    
    if ($result) {
        $_SESSION['MSG'] = 'Usuario cadastrado com sucesso!';
        header("Location: ../../login.php");
        die();
    } else {
        $_SESSION['MSG'] = 'Ocorreu um erro ao realizar cadastro! por favor tente novamente mais tarde.';
        header("Location: ../../cadastre_se.php");
        die();
    }
}
?>