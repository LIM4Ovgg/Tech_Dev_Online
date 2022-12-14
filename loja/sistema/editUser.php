<?php
session_start();
$sistema = '../';
require_once('../logado.php');
require_once('../adm.php');
include_once('../config.php');

if (!empty($_GET['id'])) {
    include_once('../config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM users WHERE id=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['nome'];
            $cpf = $user_data['cpf'];
            $data_nasc = $user_data['data_nasc'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $cep = $user_data['cep'];
            $numero = $user_data['numero'];
            $complemento = $user_data['complemento'];
            $referencia = $user_data['referencia'];
            $adm = $user_data['adm'];
        }
    } else {
        header('Location: usuarios.php');
    }
}
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Editar Usuário';
require_once('../head.php');
?>
</head>

<body style="min-width:372px;">
    <div class="d-flex flex-column wrapper">
        <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm == "Yes") {
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
                <h1>Editando Dados</h1>
                <hr>
                <form class="mt-3" action="saveEditUser.php" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Dados Pessoais</legend>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="nome" id="nome" placeholder=" " value="<?php echo $nome ?>" required />
                                    <label for="nome">Nome</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6 col-xl-4">
                                    <input class="form-control" type="text" name="cpf" id="cpf" placeholder=" " value="<?php echo $cpf ?>" required />
                                    <label for="cpf">CPF</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6 col-xl-4">
                                    <input class="form-control" type="date" name="data_nasc" id="txtDataNascimento" placeholder=" " value="<?php echo $data_nasc ?>" required />
                                    <label for="txtDataNascimento" class="d-inline d-sm-none d-md-inline d-lg-none">Data
                                        Nascimento</label>
                                    <label for="txtDataNascimento" class="d-none d-sm-inline d-md-none d-lg-inline">Data
                                        de Nascimento</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Contatos</legend>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="email" name="email" id="txtEmail" placeholder=" " value="<?php echo $email ?>" required />
                                    <label for="txtEmail">E-mail</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6">
                                    <input class="form-control" placeholder=" " name="telefone" type="text" id="txtTelefone" value="<?php echo $telefone ?>" required />
                                    <label for="txtTelefone">Telefone</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Endereço</legend>
                                <div class="form-floating mb-3 col-md-6 col-lg-4">
                                    <input class="form-control" type="text" name="cep" id="txtCEP" placeholder=" " value="<?php echo $cep ?>" required />
                                    <label for="txtCEP">CEP</label>
                                </div>
                                <div class="mb-3 col-md-6 col-lg-8 align-self-end">
                                    <div id="result" class="result">
                                        <textarea class="form-control text-muted bg-light" style="height: 58px; font-size: 14px;" disabled>Digite o CEP para buscarmos o endereço.</textarea>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-floating mb-3 col-md-4">
                                    <input class="form-control" type="text" name="numero" id="txtNumero" placeholder=" " value="<?php echo $numero ?>" required />
                                    <label for="txtNumero">Número</label>
                                </div>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="text" name="complemento" id="txtComplemento" placeholder=" " value="<?php echo $complemento ?>" />
                                    <label for="txtComplemento">Complemento</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="referencia" id="txtReferencia" placeholder=" " value="<?php echo $referencia ?>" />
                                    <label for="txtReferencia">Referência</label>
                                </div>
                            </fieldset>
                            <fieldset class="row gx-3">
                                <legend>Senha de Acesso</legend>
                                <?php if (isset($_GET['erro']) && $_GET['erro'] == 530) { ?>
                                    <div class="row gx-3">
                                        <div class="form-floating mb-3 col-lg-6">
                                            <input class="form-control erro" type="password" name="senha" id="txtSenha" placeholder=" " autocomplete="off" autofocus required />
                                            <label for="txtSenha">Senha</label>
                                        </div>
                                        <div class="form-floating mb-3 col-lg-6">
                                            <input class="form-control" name="confirm_senha" id="txtConfirmacaoSenha" placeholder=" " type="password" autocomplete="off" required />
                                            <label class="form-label" for="txtConfirmacaoSenha">Confirmação da Senha</label>
                                        </div>
                                    </div>
                                    <div class="form-floating">
                                        <p><i class="bi bi-exclamation-circle-fill" style="color:red"></i> Senha Incorreta</p>
                                    </div>
                                <?php } else { ?>
                                    <div class="row gx-3">
                                        <div class="form-floating mb-3 col-lg-6">
                                            <input class="form-control" type="password" name="senha" id="txtSenha" placeholder=" " autocomplete="off" autofocus required />
                                            <label for="txtSenha">Senha</label>
                                        </div>
                                        <div class="form-floating mb-3 col-lg-6">
                                            <input class="form-control" name="confirm_senha" id="txtConfirmacaoSenha" placeholder=" " type="password" autocomplete="off" required />
                                            <label class="form-label" for="txtConfirmacaoSenha">Confirmação da Senha</label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </fieldset>
                        </div>
                    </div>
                    <hr />
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="adm" value="<?= $adm ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Este usuário tem permissão de <strong>Administrador</strong>.
                        </label>
                    </div>
                    <div class="mb-3 text-left">
                        <a class="btn btn-lg btn-light btn-outline-danger" href="../sistema.php">Cancelar</a>
                        <input type="hidden" name="logado" id="txtLogado" value="<?= $logado ?>" />
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="update" id="update" value="Salvar Alterações" class="btn btn-lg btn-success text-white" />
                    </div>
                </form>
            </div>
        </main>

        <footer class="border-top text-muted bg-light">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-md-4 text-center text-md-left">
                        &copy; 2020 - Tech Dev Online Ltda ME<br>
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
    <script>
        var el = document.getElementById('txtCEP');
        var divResult = document.getElementById('result')

        el.addEventListener("keyup", get, true);


        function get() {
            get_endereco(this.value);
        }

        function get_endereco(cep) {
            if (cep.length == 0) {
                divResult.innerHTML = '<textarea class="form-control text-muted bg-light" style="height: 58px; font-size: 14px;" disabled>Digite o CEP para buscarmos o endereço.</textarea>';
            } else {
                var url = '../maps.php';
                var cepArray = {
                    "cep": cep
                };

                $.ajax({
                    type: "POST",
                    url: url,
                    data: cepArray,
                    dataType: "text",
                    success: function(result) {
                        $(".result").html(result)
                    }
                });
            }

        }
    </script>
    <script src="../assets/js/darkmode.js"></script>
    <script src="../vendor/jquery/jquery.js"></script>
    <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>