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
    <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm = true) {
                require_once('header_logado_adm.php');
            }else{
                require_once('header_logado.php');
            }
        } else {
            require_once('header.php');
        }
        ?>

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
                            <input type="password" id="senha" name="senha" class="form-control" autocomplete="off" placeholder=" ">
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
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>