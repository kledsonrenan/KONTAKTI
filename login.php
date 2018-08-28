<?php
    session_start();
    include_once('php/functions.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Login</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/geral/header.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main>
      <?php include_once('php/include/header_public.php') ?>
       <?php         
            if ( isset($_SESSION['MSG']) ) {
                alert('success', $_SESSION['MSG']);
                unset($_SESSION['MSG']);
            }
            // Alerta sobre encontrar usuario na base de dados ou senha invalida
            if ( isset( $_SESSION['USER-LOGIN']) ) {
                alert('danger', $_SESSION['USER-LOGIN']);
                unset($_SESSION['USER-LOGIN']);
            }
            // Verifica a realizacao do logout do usuario e exclui a sua sessão
            if( isset($_SESSION['LOGOUT']) ) {
                alert('success', $_SESSION['LOGOUT']);
                session_destroy();
            }
        ?>
        <form action="php/validation/login_validation.php" method="post" class="col-md-4 col-md-offset-4">
            <h2 class="title text-center title">Login</h2>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input type="email" name="login_email" placeholder="email.exemplo@mail.com" class="form-control" required autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" name="login_pass" placeholder="Senha" class="form-control" required>
                </div>
            </div>
            <button class="btn btn-default" type="submit">Entrar</button>
            </div>
        </form>
        <a href="cadastre_se.php" class="text-center">Não tenho uma conta!</a>
    </main>
    <footer>
        <script src="js/alerts.js"></script>
    </footer>
</body>
</html>