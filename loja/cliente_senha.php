<?php
require_once('sessionStart.php');
$sistema = '';

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$logado = $_SESSION['email'];
if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM users WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM users ORDER BY id DESC";
}
$result = $conexao->query($sql);
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Area do Cliente :: Alteração de Senha';
require_once('head.php');
?>
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm == true) {
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
                <h1>Minha Conta</h1>
                <div class="row gx-3">
                    <div class="col-4">
                        <div class="list-group">
                            <a href="cliente_dados.php" class="list-group-item list-group-item-action">
                                <i class="bi-person fs-6"></i> Dados Pessoais
                            </a>
                            <a href="cliente_contatos.php" class="list-group-item list-group-item-action">
                                <i class="bi-mailbox fs-6"></i> Contatos
                            </a>
                            <a href="cliente_endereco.php" class="list-group-item list-group-item-action">
                                <i class="bi-house-door fs-6"></i> Endereço
                            </a>
                            <a href="cliente_pedidos.php" class="list-group-item list-group-item-action">
                                <i class="bi-truck fs-6"></i> Pedidos
                            </a>
                            <a href="cliente_favoritos.php" class="list-group-item list-group-item-action">
                                <i class="bi-heart fs-6"></i> Favoritos
                            </a>
                            <a href="cliente_senha.php" class="list-group-item list-group-item-action bg-info text-light">
                                <i class="bi-lock fs-6"></i> Alterar Senha
                            </a>
                            <a href="sistema/sair.php" class="list-group-item list-group-item-action">
                                <i class="bi-door-open fs-6"></i> Sair
                            </a>
                        </div>
                    </div>
                    <div class="col-8">
                        <form class="col-sm-12 col-md-8 col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="password" id="txtSenhaAtual" class="form-control" placeholder=" " autofocus>
                                <label for="txtSenhaAtual">Digite aqui sua senha atual</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" id="txtSenha" class="form-control" placeholder=" ">
                                <label for="txtSenha">Digite aqui sua nova senha</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" id="txtConfSenha" class="form-control" placeholder=" ">
                                <label for="txtConfSenha">Redigite aqui a nova senha</label>
                            </div>

                            <button type="button" onclick="window.location.href='/confirmcadastrosenha.php'" class="btn btn-lg btn-info">Alterar Senha</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <footer class="border-top text-muted bg-light">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-md-4 text-center">
                        &copy; 2020 - Quitanda Online Ltda ME<br>
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
                        <a href="/contato.php" class="text-decoration-none text-dark">
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
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>