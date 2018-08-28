<?php 
    include_once('../php/functions.php');
    session_start();
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
       <?php
            if (isset($_SESSION['ALERT'])) {
                alert('info', $_SESSION['ALERT']);
                unset($_SESSION['ALERT']);
            }
        ?>
        <div class="row">
            <div class="col-md-3 col-md-offset-1" id="contato">
                <div class="thumbnail">
                  <img src="../img/user-8.png" alt="exemplo de imagem" class="contact-img">
                  <div class="caption">
                    <h3 class="contact-name">Nome contato</h3>
                    <p class="contact-desc">Descrição do contato</p>
                  </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-3" id="formulario">
                <form action="../php/validation/cadastrar_contato_validator.php" method="post" enctype="multipart/form-data">
                    <h2 class="text-center title">Adicionar mais um contato</h2>
                    <div class="text-center">
                        <i class="glyphicon glyphicon-arrow-down"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nome" name="newNome" autofocus required>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <i class="input-group-addon">@</i>
                            <input type="email" class="form-control" placeholder="email_exemplo@mail.com" name="newEmail">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Telefone / Celular" name="newCelular" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Aniversario" name="newAniversario">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" id="realupload" name="img" accept="image/*" onChange="readURL(this);">
                    </div>
                    <div class="form-group">
                        <textarea name="newDescricao" cols="30" rows="5" placeholder="Descrição de seu contato" class="form-control" required></textarea>
                    </div>
                    <button class="btn btn-default" type="submit" name="new-contato">Adicionar a lista</button>
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