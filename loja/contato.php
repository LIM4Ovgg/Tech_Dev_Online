<?php
session_start();
include_once('config.php');
$sistema = '';
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Contato';
require_once('head.php');
?>
</head>

<body>
    <div class="d-flex flex-column wrapper">
    <div class="d-flex flex-column wrapper">
        <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm == "Yes") {
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
                    <form class="col-sm-10 col-md-8 col-lg-6" method="POST"
                    action="email.php">
                        <h1>Entre em Contato</h1>

                        <div class="form-floating mb-3">
                            <input type="text" id="txtNomeCompleto" class="form-control" placeholder=" " autofocus>
                            <label for="txtNomeCompleto">Nome Completo</label>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="email" id="txtEmail" class="form-control" placeholder=" ">
                            <label for="txtEmail">E-mail</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea id="txtMensagem" class="form-control" placeholder=" " style="height: 200px;"></textarea>
                            <label for="txtMensagem">Mensagem</label>
                        </div>

                        <input type="submit" class="btn btn-lg btn-info text-white" value="Enviar Mensagem">

                        <p class="mt-3">
                            Faremos nosso melhor para responder sua mensagem em até 2 dias úteis.
                        </p>

                        <p class="mt-3">
                            Atenciosamente,<br>
                            Central de Relacionamento Tech Dev Online
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
                        <a href="/privacidade.php" class="text-decoration-none text-dark">
                            Política de Privacidade
                        </a><br>
                        <a href="/termos.php" class="text-decoration-none text-dark">
                            Termos de Uso
                        </a><br>
                        <a href="/quemsomos.php" class="text-decoration-none text-dark">
                            Quem Somos
                        </a><br>
                        <a href="/trocas.php" class="text-decoration-none text-dark">
                            Trocas e Devoluções
                        </a>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="contato.php" class="text-decoration-none text-dark">
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