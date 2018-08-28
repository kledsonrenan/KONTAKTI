<?php
    session_start();
    require_once('../private/conection.php');
    
    // PEGANDO OS DADOS DO FORMULARIO
    if ( isset( $_POST['new-contato']) ) {
        
        $n       = $_POST['newNome'];
        $e       = $_POST['newEmail'];
        $c       = $_POST['newCelular'];
        $a       = $_POST['newAniversario'];
        $d       = $_POST['newDescricao'];
        $user_id = $_SESSION['USER-ID'];
        $img;
        $query;
        
        // VERIFICA SE FOI SUBMETIDA UMA IMAGEM
        if (is_uploaded_file($_FILES['img']['tmp_name'])) {
            $img = file_get_contents($_FILES['img']['tmp_name']);
            
            $query = "INSERT INTO contatos(nome,email,telefone,aniversario,imagem,descricao,user_id) VALUES('$n','$e','$c','$a','$img','$d','$user_id');";
        }
        
        $query = "INSERT INTO contatos(nome,email,telefone,aniversario,descricao,user_id) VALUES('$n','$e','$c','$a','$d','$user_id');";
        
        $result = mysqli_query($connection, $query);
        
        // VERIFICA SE FOI POSSIVEL CADASTRAR O CONTATO NO BANCO
        if ($result) {
            $_SESSION['ALERT'] = 'Você adicionou um novo contato a sua agenda, parabéns!';
            header('Location: ../../pages/cadastrar_contato.php');
            die();
        } else {
            $_SESSION['ALERT'] = "Aconteceu algo de errado ao tentar cadastrar um novo contato";
            header('Location: ../../pages/cadastrar_contato.php');
            die();
        }
    }