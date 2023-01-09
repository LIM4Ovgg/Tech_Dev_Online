<?php
session_start();
$sistema = '../';
require_once('../logado.php');
include_once('../config.php');

$email = $_SESSION['email'];

$sqlSelect = "SELECT * FROM users WHERE email LIKE '$email'";

$result = $conexao->query($sqlSelect);

if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
        $id = $user_data['id'];
        $nome = $user_data['nome'];
        $cpf = $user_data['cpf'];
        $data_nasc = $user_data['data_nasc'];
    }
} else {
    header('Location: ../login.php');
}
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Area do Cliente :: Dados Pessoais';
require_once('../head.php');
?>
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm == true) {
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
                    $dados = 'bg-info text-light';
                    $contatos = '';
                    $endereco = '';
                    $pedidos = '';
                    $favoritos = '';
                    $alterar = '';
                    $cliente = '';
                    require_once('../cliente_barra.php');
                    ?>
                    <div class="col-8">
                        <form action="saveDados.php" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="nome" id="txtNome" placeholder=" " value="<?= $nome ?>" autofocus required/>
                                <label for="txtNome">Nome</label>
                            </div>
                            <div class="form-floating mb-3 col-md-6 col-xl-4">
                                <input class="form-control" type="text" name="cpf" id="txtCPF" placeholder=" " value="<?= $cpf ?>" required/>
                                <label for="txtCPF">CPF</label>
                            </div>
                            <div class="form-floating mb-3 col-md-6 col-xl-4">
                                <input class="form-control" type="date" name="data_nasc" id="txtDataNascimento" placeholder=" " value="<?= $data_nasc ?>" required/>
                                <label for="txtDataNascimento">Data de Nascimento</label>
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
    <script src="../assets/js/darkmode.js"></script>
    <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>