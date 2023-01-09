<?php
session_start();
include_once('config.php');
$sistema = '';

if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
    header('Location: sistema.php');
}

if (isset($_GET['erro']) && $_GET['erro'] == 513) { 
    $mensagem[] = '<i class="bi bi-exclamation-circle-fill" style="color:red"></i> E-mail não cadastrado';
}

if (isset($_GET['erro']) && $_GET['erro'] == 530) { 
    $mensagem[] = '<i class="bi bi-exclamation-circle-fill" style="color:red"></i> Senha Incorreta';
}

?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Login';
require_once('head.php');
?>
<style>

</style>
</head>

<body>
    <?php
    if (isset($mensagem)) {
        foreach ($mensagem as $mensagem) {
            echo '<div style="display: flex; justify-content: space-between; padding: 10px;">
                <span>
                    ' . $mensagem . '
                </span>
                <i class="bi bi-x-lg point" onclick="this.parentElement.style.display = `none`;"></i>
            </div>';
        };
    };
    ?>
    <div class="d-flex flex-column wrapper">
        <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm = true) {
                require_once('header_logado_adm.php');
            } else {
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

                        <?php if (isset($_GET['erro']) && $_GET['erro'] == 513) { ?>

                            <div class="form-floating mb-3">
                                <input type="text" id="email" name="email" class="form-control erro" placeholder=" " required autofocus>
                                <label for="email">E-mail</label>
                            </div>


                            <?php } else {
                            if (isset($_GET['erro']) && $_GET['erro'] == 530) { ?>

                                <div class="form-floating mb-3">
                                    <input type="text" id="email" name="email" class="form-control" placeholder=" " required>
                                    <label for="email">E-mail</label>
                                </div>

                            <?php } else { ?>

                                <div class="form-floating mb-3">
                                    <input type="text" id="email" name="email" class="form-control" placeholder=" " autofocus required>
                                    <label for="email">E-mail</label>
                                </div>

                            <?php } ?>
                        <?php };
                        if (isset($_GET['erro']) && $_GET['erro'] == 530) { ?>

                            <div class="form-floating mb-3">
                                <input type="password" id="senha" name="senha" class="form-control erro" autocomplete="off" required autofocus placeholder=" ">
                                <label for="senha">Senha</label>
                            </div>

                        <?php } else { ?>
                            <div class="form-floating mb-3">
                                <input type="password" id="senha" name="senha" class="form-control" autocomplete="off" required placeholder=" ">
                                <label for="senha">Senha</label>
                            </div>
                        <?php } ?>
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
    <script src="assets/js/darkmode.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>