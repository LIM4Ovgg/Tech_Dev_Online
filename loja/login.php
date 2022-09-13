<?php

require_once('sessionStart.php');
// print_r($_SESSION);
if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
    header('Location: sistema.php');
}
?>
<!doctype html>
<html lang="pt-br">

<?php
$sistema = '';
$title = 'Login';
require_once('head.php');
?>
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="index.php"><b>Tech Dev Online</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contato.php">Contato</a>
                        </li>
                    </ul>
                    <div class="align-self-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="cadastro.php" class="nav-link text-white">Quero Me Cadastrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="login.php" class="nav-link text-white">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <span class="badge rounded-pill bg-light text-info position-absolute ms-4 mt-0" title="5 produto(s) no carrinho"><small>5</small></span>
                                <a href="carrinho.php" class="nav-link text-white">
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
                <div class="row justify-content-center">
                    <form class="col-sm-10 col-md-8 col-lg-6" action="testLogin.php" method="POST">
                        <h1>Identifique-se, por favor</h1>

                        <div class="form-floating mb-3">
                            <input type="text" id="email" name="email" class="form-control" placeholder=" " autofocus>
                            <label for="email">E-mail</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" id="senha" name="senha" class="form-control" placeholder=" ">
                            <label for="senha">Senha</label>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" value="" id="chkLembrar">
                            <label for="chkLembrar" class="form-check-label">Lembrar de mim</label>
                        </div>

                        <input class="btn btn-lg btn-info text-white" type="submit" name="submit" value="Entrar">

                        <p class="mt-3">
                            Ainda não é cadastrado? <a href="cadastro.php">Clique aqui</a> para se cadastrar.
                        </p>

                        <p class="mt-3">
                            Esqueceu sua senha? <a href="recuperarsenha.php">Clique aqui</a> para recuperá-la.
                        </p>
                    </form>
                </div>
            </div>
        </main>

        <?php
        $title = 'Carrinho de compras';
        require_once('footer.php');
        ?>
    </div>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>