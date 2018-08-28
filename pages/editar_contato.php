<?php
    session_start();
    include_once('../php/private/conection.php');
    
    if ( isset($_GET['id']) ) {
            $id             = $_GET['id'];
            $user_id        = $_SESSION['USER-ID'];
            $query          = "SELECT * FROM contatos WHERE id = '$id' AND user_id = '$user_id';";
            $resultado      = mysqli_query($connection, $query);
            $contato        = mysqli_fetch_assoc($resultado);
        
            if ( !$resultado ) {
                $_SESSION['ALERT'] = "Falha ao realizar consulta com o banco de dados";
                header("Location: schedduler.php");
                die();
            } else {
                /*******************************************************************
                *** CASO O USUARIO TENTE ACESSAR UM ID PELA URL QUE PERTENCE A UM
                *** OUTRO CONTATO ELE SERA REDIRECIONADO PARA A PAGINA SCHEDDULER
                *** POIS ELE NAO TEM ACESSO AQUELE CONTATO - CODIGO ABAIXO
                *******************************************************************/
                if ( mysqli_affected_rows($connection) == 0 ) {
                    header("Location: schedduler.php");
                }
            }
    } else {
        header("Location: schedduler.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Cadastrar Contato</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/geral/header.css">
    <link rel="stylesheet" href="../css/private/cadastrar_contato.css">
</head>
<body>
    <?php include_once('../php/include/header_private.php') ?>
    <main>
        <div class="row">
            <div class="col-md-3 col-md-offset-1" id="contato">
                <div class="thumbnail">
                  <img src="../img/user-8.png" alt="exemplo de imagem" class="contact-img">
                  <div class="caption">
                    <h3 class="contact-name"><?php echo $contato['nome'] ?></h3>
                    <p class="contact-desc"><?php echo $contato['descricao'] ?></p>
                  </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-3" id="formulario">
                <form action="editar_contato.php" method="POST" enctype="multipart/form-data">
                    <h2 class="text-center title">Editar contato</h2>
                    <div class="text-center">
                        <i class="glyphicon glyphicon-arrow-down"></i>
                    </div>
                    
                    <div class="form-group">
                       <label for="nome">Nome:</label>
                        <input type="text" id="nome" class="form-control" name="nome" required autofocus value="<?php echo $contato['nome']?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <div class="input-group">
                            <i class="input-group-addon">@</i>
                            <input type="email" id="email" class="form-control" name="email" value="<?php echo $contato['email']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" id="celular" class="form-control" name="celular" required value="<?php echo $contato['telefone']?>">
                    </div>
                    <div class="form-group">
                       <label for="aniversario">Data de Nascimento:</label>
                        <input type="text" id="aniversario" class="form-control" name="aniversario" value="<?php echo $contato['aniversario']?>">
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem de contato:</label>
                        <input type="file" id="imagem" class="form-control" id="realupload" name="img" accept="image/*" onChange="readURL(this);">
                    </div>
                    <div class="form-group">
                       <label for="descricao">Descrição do contato:</label>
                        <textarea id="descricao" name="newDescricao" cols="30" rows="5" class="form-control" required><?php echo $contato['descricao'] ?></textarea>
                    </div>
                    
                    <button class="btn btn-default" type="submit" name="editar-contato">Salvar alterações</button>
                    <a href="schedduler.php" class="btn btn-default col-md-offset-4">Cancelar</a>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/private/cadastrar.js"></script>
        <script src="../js/alerts.js"></script>
    </footer>
</body>
</html>