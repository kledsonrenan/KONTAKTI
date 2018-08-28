<?php
    require_once('../php/private/conection.php');
    include_once('../php/functions.php');
    session_start();
    
    // VARRENDO BANCO DE DADOS A PROCURA DE CONTATOS DESTE USUARIO
    $user_id = $_SESSION['USER-ID'];
    $query = "SELECT * FROM contatos WHERE user_id = '$user_id'";
    
    /****************************************************************
    *** SE O USUARIO TIVER FEITO UMA PESQUISA, E IMPLEMENTADO MAIS
    *** CODIGO SQL E ENTAO CRIAMOS UMA SESSAO CASO NAO TENHA RETORNO,
    *** PARA RECUPERAR MAIS A FRENTE
    ****************************************************************/
    if ( isset($_GET['contato']) ) {
        $_SESSION['PESQUISA'] = "Não encontramos nenhum contato com base em sua pesquisa!";
        $search = $_GET['contato'];
        $query .= " && nome LIKE '%{$search}%';";
    }

    $query .= ";";
    $result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Schedduler</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/geral/header.css">
    <link rel="stylesheet" href="../css/private/schedduler.css">
</head>
<body>
    <main class="row">
        <?php include_once('../php/include/header_private.php') ?>
        <?php
            if ( isset( $_SESSION['ALERT']) ) {
                alert('danger', $_SESSION['ALERT']);
                unset($_SESSION['ALERT']);
            }
        ?>
       <?php
            /*****************************************************************
            *** SE NÃO RETORNAR NADA DO BANCO DE DADOS, VERIFICAMOS SE FOI
            *** RESULTADO DE UMA  PESQUISA FEITA PELO USUARIO OU SE O USUARIO
            *** NÃO TEM NENHUM CONTATO NA SUA AGENDA
            ****************************************************************/
            if ( mysqli_affected_rows($connection) == 0 ) {
                if (isset($_SESSION['PESQUISA'])) {
                    alert('info', $_SESSION['PESQUISA']);
                    unset($_SESSION['PESQUISA']);
                } else {
                    alert('info', 'Você ainda não possui contatos em sua agenda!');
                }
            }
    
            if ( mysqli_affected_rows($connection) > 0 ) {
        ?>
        <div class="container">
            <h3>
                <span class="badge badge-light">
                   Você possui 
                    <?php echo mysqli_affected_rows($connection); ?>
                    contatos
                </span>
            </h3>
        <!-- SESSÃO USER-CONTATOS RECEBE A QUANTIDADE DE CONTATOS DE UM DETERMINADO USUARIO -->
        <?php }
          // LISTAGEM DE CONTATOS
            while ($contato = mysqli_fetch_assoc($result) ) {
        ?>
                <div class="contato">
                    <div class="contato-imagem">
                        <img src="../img/user-6.png" alt="#">
                    </div>
                    <div class="contato-descricao">
                        <ul><li><h4>
                                    <?php echo  strtoupper($contato['nome']); ?>
                                </h4>
                            </li>
                            <li>
                                <?php echo $contato['telefone'] ?>
                            </li>
                            <li>
                                <a href="mailto:<?php echo $contato['email']?>"><?php echo $contato['email'] ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="contato-operation">
                        <a href="editar_contato.php?id=<?php echo $contato['id'] ?>" class="btn btn-primary">Editar</a>
                        <a href="apagar_contato.php?id=<?php echo $contato['id'] ?>" class="btn btn-danger">Remover</a>
                    </div>
                </div>
            <?php } ?>
            <!-- FIM DA LISTAGEM DE CONTATOS -->
        </div>
    </main>
    <footer>
        <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/alerts.js"></script>
    </footer>
</body>
</html>