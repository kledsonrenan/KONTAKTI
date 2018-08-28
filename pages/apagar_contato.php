<?php
    require_once('../php/private/conection.php');
    session_start();
    // ID DO USUARIO
    $user_id = $_SESSION['USER-ID'];
    // ID DO CONTATO A SER DELETADO
    $id = $_GET['id'];

    $query = "DELETE FROM contatos WHERE id = '$id' && user_id = '$user_id';";

    $result = mysqli_query($connection, $query);
    $rows = mysqli_affected_rows($connection);
    
    if ($rows == -1) {
        $_SESSION['ALERT'] = "Ocorreu um erro ao exluir este contato!";
        header('Location: schedduler.php');
        die();
    } else if ($rows > 0) {
        $_SESSION['ALERT'] = "Contato exluido com sucesso!";
        header('Location: schedduler.php');
        die();
    }
?>