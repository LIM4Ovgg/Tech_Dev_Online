<?php
session_start();
include_once('../config.php');
// print_r($_SESSION);
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login.php');
}
$logado = $_SESSION['email'];

if (!empty($_GET['id'])) {
    include_once('../config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM stock WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data["nome"];
            $valor = $user_data["valor"];
            $quantidade = $user_data["quantidade"];
            $descricao = $user_data["descricao"];
            $imagem = $user_data["imagem"];
        }
    } else {
        header('Location: estoque.php');
    }
} else {
    header('Location: estoque.php');
}


?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="../vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">

    <title>Quitanda Online :: Cadastro</title>

</head>

<body style="min-width:372px;" onLoad="onStart()">
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="../sistema.php"><b>Tech Dev Sistema</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="estoque.php">Estoque</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contato.html">Contato</a>
                        </li>
                        -->
                    </ul>
                    <div class="align-self-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="cliente.php" class="nav-link text-white">
                                    <?php
                                    echo "Logado como <b>$logado</b>";
                                    ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="sair.php" class="nav-link text-white">Sair</a>
                            </li>
                            <li class="nav-item">
                                <span class="badge rounded-pill bg-light text-info position-absolute ms-4 mt-0" title="5 produto(s) no carrinho"><small>5</small></span>
                                <a href="/carrinho.html" class="nav-link text-white">
                                    <i class="bi-cart" style="font-size:24px;line-height:24px;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-fill">
            <div class="container">
                <h1>Alterando Estoque</h1>
                <hr>
                <form class="mt-3" enctype="multipart/form-data" action="saveEditEstoque.php" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <!--
                            <fieldset class="row gx-3">
                                <legend>Imagem</legend>
                                <div class="form-floating mb-3">
                                    <input type="file" name="imagem" id="imagem" placeholder=" " required />
                                </div>
                            </fieldset>
                            -->
                            <fieldset>
                                <legend>Imagem</legend>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="text" name="imagem" id="txtImagem" placeholder=" " value="<?= $imagem ?>" autofocus required />
                                    <label for="txtNome">URL</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Nome</legend>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="text" name="nome" id="txtNome" placeholder=" " value="<?= $nome ?>" required />
                                    <label for="txtNome">Nome</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Preço</legend>
                                <div class="form-floating mb-3 col-md-6">
                                    <input class="form-control" placeholder=" " name="valor" type="text" id="txtValor" value="<?= $valor ?>" required />
                                    <label for="txtValor">preço</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Quantidade</legend>
                                <div class="form-floating mb-3 col-md-6">
                                    <input class="form-control" placeholder=" " name="quantidade" type="text" id="txtQuantidade" value="<?= $quantidade ?>" required />
                                    <label for="txtValor">quantidade</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Descrição</legend>
                                <div class="form-floating mb-3 ">
                                    <textarea class="form-control" type="text" name="descricao" id="txtDescricao" cols="30" rows="5" wrap="hard" required style='height: 260px;'> </textarea>
                                    <label for="txtDescricao">Descrição</label>
                                </div>
                            </fieldset>
                            <fieldset class="row gx-3">
                                <legend>Senha do Admin</legend>
                                <div class="form-floating mb-3 col-lg-6">
                                    <input class="form-control" type="password" name="senha" id="txtSenha" placeholder=" " required />
                                    <label for="txtSenha">Senha</label>
                                </div>
                                <div class="form-floating mb-3 col-lg-6">
                                    <input class="form-control" name="confirm_senha" id="txtConfirmacaoSenha" placeholder=" " type="password" required />
                                    <label class="form-label" for="txtConfirmacaoSenha">Confirmação da Senha</label>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <hr />
                    <div class="mb-3 text-left">
                        <a class="btn btn-lg btn-light btn-outline-danger" href="estoque.php">Cancelar</a>
                        <input type="hidden" name="email" id="txtEmail" value="<?= $logado ?>" />
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="update" id="update" value="Salvar Alterações" class="btn btn-lg btn-danger" />
                    </div>
                </form>
            </div>
        </main>

        <footer class="border-top text-muted bg-light">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-md-4 text-center text-md-left">
                        &copy; 2020 - Quitanda Online Ltda ME<br>
                        Rua Virtual Inexistente, 171, Compulândia/PC <br>
                        CPNJ 99.999.999/0001-99
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="/privacidade.php" class="text-decoration-none text-dark">Política de
                            Privacidade</a><br>
                        <a href="/termos.php" class="text-decoration-none text-dark">Termos de Uso</a><br>
                        <a href="/quemsomos.php" class="text-decoration-none text-dark">Quem Somos</a><br>
                        <a href="/trocas.php" class="text-decoration-none text-dark">Trocas e Devoluções</a>
                    </div>
                    <div class="col-12 col-md-4 text-center text-md-right">
                        <a href="/contato.php" class="text-decoration-none text-dark">Contato pelo site</a><br>
                        E-mail: <a href="mailto:email@dominio.com" class="text-decoration-none text-dark">email@dominio.com</a><br>
                        Telefone: <a href="phone:28999990000" class="text-decoration-none text-dark">(28) 99999-0000</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script>
        function onStart() {
            document.getElementById("txtDescricao").value = "<?= $descricao; ?>";
        }
    </script>
</body>

</html>