<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <a href="../../pages/schedduler.php"><span class="navbar-brand">KONTAKTI</span></a>
            <form action="schedduler.php" method="GET" class="form-inline">
                <div class="input-group input-group-sm">
                    <input type="search" class="form-control" placeholder="Procurar contato" name="contato">
                    <div class="input-group-btn">
                        <button type="submit" class="input-group-addon">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </div>
            </form>
            <strong class="session_user text-center">
                <?php
                    // VERIFICA SE O USUARIO ESTA LOGADO
                    if (isset($_SESSION['USER-NAME'])) {
                        echo "Usuario: ".$_SESSION['USER-NAME'];
                    } else {
                        header('Location: ../../login.php');
                        die();
                    }
                ?>
            </strong>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Opções
                    <span class="caret"></span>
                </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
               <li><a href="schedduler.php">Meus contatos</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="cadastrar_contato.php">Adicionar contato</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../../php/sair.php" class='logout'>Sair</a></li>
              </ul>
            </div>
        </div>
    </nav>
</header>