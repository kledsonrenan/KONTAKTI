<?php 
    session_start();
    include_once('php/functions.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/geral/header.css">
    <link rel="stylesheet" href="../../css/cadastre_se.css">
</head>
<body>
    <?php include_once('php/include/header_public.php') ?>
    <?php
        if ( isset($_SESSION['MSG']) ) {
            alert('danger', $_SESSION['MSG']);
            unset($_SESSION['MSG']);
        }
    ?>
    <main>
        <form action="php/validation/cadastre_se_validator.php" method="post" class="col-md-4 col-md-offset-4">
            <h2 class="text-center title">Cadastre-se aqui!</h2>
            <div class="text-center">
                <i class="glyphicon glyphicon-arrow-down"></i>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nome" name="user_name" required autofocus oninvalid="this.setCustomValidity(\'Este campo é essencial para realizar seu cadastro!\')">
            </div>
            <div class="form-group">
                <div class="input-group">
                    <i class="input-group-addon">@</i>
                    <input type="email" class="form-control" placeholder="email_exemplo@mail.com" name="user_mail" required>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Telefone / Celular" name="user_phone" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Aniversario" name="user_year" required>
            </div>
            <p><span class='alert-pass'></span></p>
            <div class="pass">
                <div class="col-md-6 input-pass">
                    <div class="input-group">
                       <div class="input-group-addon">
                           <i class="glyphicon glyphicon-lock"></i>
                       </div>
                        <input type="password" class="form-control" placeholder="Senha" name="user_pass" required>
                    </div>
                </div>
                <div class="col-md-6 input-pass">
                    <input type="password" class="form-control" placeholder="Repetir senha" name="user_repeat_pass" required>
                </div>
            </div>
            <button class="btn btn-default" type="submit" name="cadastro">Finalizar Cadastro!</button>
        </form>
        <a href="login.php" class="text-center">Já tenho uma conta!</a>
    </main>
    <footer>
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="js/alerts.js"></script>
        <script src="js/cadastre_se.js"></script>
    </footer>
</body>
</html>