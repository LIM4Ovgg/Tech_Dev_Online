<?php
session_start();
$sistema = '../';
require_once('../logado.php');
include_once('../config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login.php');
}

$email = $_SESSION['email'];

$sqlSelect = "SELECT * FROM users WHERE email LIKE '$email'";

$result = $conexao->query($sqlSelect);

if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
        $id = $user_data['id'];
        $email = $user_data['email'];
        $telefone = $user_data['telefone'];
    }
} else {
    header('Location: ../login.php');
}
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Area do Cliente :: Contatos';
require_once('../head.php');
?>
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm = true) {
                require_once('../header_logado_adm.php');
            } else {
                require_once('../header_logado.php');
            }
        } else {
            require_once('../header.php');
        }
        ?>

        <main class="flex-fill">
            <div class="container">
                <h1>Minha Conta</h1>
                <div class="row gx-3">
                    <?php
                    $dados = '';
                    $contatos = 'bg-info text-light';
                    $endereco = '';
                    $pedidos = '';
                    $favoritos = '';
                    $alterar = '';
                    $cliente = '';
                    require_once('../cliente_barra.php');
                    ?>
                    <div class="col-8">
                        <form action="saveContatos.php" method="POST">
                            <div class="form-floating mb-3 col-md-8">
                                <input class="form-control" type="email" id="txtEmail" name="email" placeholder=" " value="<?= $email ?>" autofocus />
                                <label for="txtEmail">E-mail</label>
                            </div>
                            <div class="form-floating mb-3 col-md-6">
                                <input class="form-control" type="text" id="txtTelefone" name="telefone" minlength="14" maxlength="15" onkeyup="mascara(this)" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" placeholder=" " value="<?= $telefone ?>"/>
                                <label for="txtTelefone">Telefone</label>
                            </div>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input class="btn btn-lg btn-info text-white" type="submit" name="update" value="Salvar dados">
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
    <script src="../assets/js/telefone.js"></script>
    <script src="../assets/js/darkmode.js"></script>
    <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>