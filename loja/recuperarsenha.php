<?php
session_start();
include_once('config.php');
$sistema = '';
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Recuperação de Senha';
require_once('head.php');
?>
<style>
    .erro:focus{
        border-color:red;
        outline:0;
        box-shadow:0 0 0 .25rem rgba(200,13,13,0.30);
        }
</style>
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <?php
        require_once('header.php');
        ?>

        <main class="flex-fill">
            <div class="container">
                <div class="row justify-content-center">
                    <form class="col-sm-10 col-md-8 col-lg-6" action="confirmemail.php" method="POST">
                        <h1>Recuperação de Senha</h1>
                        
                        <?php if (isset($_GET['erro']) && $_GET['erro'] == 513) { ?>

                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="txtEmail" class="form-control erro" placeholder=" " autofocus required>
                                <label for="txtEmail">E-mail</label>
                            </div>
                            <div class="form-floating mb-3">
                                <p><i class="bi bi-exclamation-circle-fill" style="color:red"></i> E-mail não cadastrado</p>
                            </div>

                            <?php }else{ ?>

                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="txtEmail" class="form-control" placeholder=" " autofocus required>
                                <label for="txtEmail">E-mail</label>
                            </div>

                        <?php } ?>
                        <button type="submit" class="btn btn-lg btn-info text-white">Recuperar Senha</button>

                        <p class="mt-3">
                            Ainda não é cadastrado? <a href="cadastro.php">Clique aqui</a> para se cadastrar.
                        </p>
                    </form>
                </div>
            </div>
        </main>

        <footer class="border-top text-muted bg-light">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-md-4 text-center">
                        &copy; 2020 - Tech Dev Online Ltda ME<br>
                        Rua Virtual Inexistente, 171, Compulândia/PC <br>
                        CPNJ 99.999.999/0001-99
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="/privacidade.html" class="text-decoration-none text-dark">
                            Política de Privacidade
                        </a><br>
                        <a href="/termos.html" class="text-decoration-none text-dark">
                            Termos de Uso
                        </a><br>
                        <a href="/quemsomos.html" class="text-decoration-none text-dark">
                            Quem Somos
                        </a><br>
                        <a href="/trocas.html" class="text-decoration-none text-dark">
                            Trocas e Devoluções
                        </a>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="/contato.html" class="text-decoration-none text-dark">
                            Contato pelo Site
                        </a><br>
                        E-mail: <a href="mailto:email@dominio.com" class="text-decoration-none text-dark">
                            email@dominio.com
                        </a><br>
                        Telefone: <a href="phone:28999990000" class="text-decoration-none text-dark">
                            (28) 99999-0000
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/js/darkmode.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>