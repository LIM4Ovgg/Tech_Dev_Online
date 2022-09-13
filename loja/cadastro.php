<?php

session_start();
include_once('config.php');
// print_r($_SESSION);
if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
    header('Location: sistema.php');
}


if (isset($_POST['submit'])) {

    include_once('config.php');

    $nome = $_POST['nome'];
    $cpf = $_POST['email'];
    $data_nasc = $_POST['data_nasc'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $referencia = $_POST['referencia'];
    $senha = $_POST['senha'];
    $confirm_senha = $_POST['confirm_senha'];
    $adm = 'No';

    $result = mysqli_query($conexao, "INSERT INTO users(nome,cpf,data_nasc,email,telefone,cep,numero,complemento,referencia,senha,confirm_senha,adm) VALUES ('$nome','$cpf','$data_nasc','$email','$telefone','$cep','$numero','$complemento','$referencia','$senha','$confirm_senha','$adm')");
    header('Location: login.php');
}



?>
<!doctype html>
<html lang="pt-br">

<?php
$sistema = '';
$title = 'Cadastro';
require_once('head.php');
?>
<style>
    .xx {

        display: flex;
        align-items: center;
        gap: 5%;

    }
</style>
</head>

<body style="min-width:372px;">
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <strong>Tech Dev Online</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a href="/index.html" class="nav-link text-white">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a href="/contato.html" class="nav-link text-white">Contato</a>
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
                <h1>Informe seus dados, por favor</h1>
                <hr>
                <form class="mt-3" action="cadastro.php" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Dados Pessoais</legend>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="nome" id="txtNome" placeholder=" " autofocus required />
                                    <label for="nome" class="labelInput">Nome</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6 col-xl-4">
                                    <input class="form-control" type="text" name="cpf" id="txtCPF" placeholder=" " required />
                                    <label for="txtCPF">CPF</label>
                                </div>
                                <div class="form-floating mb-3 col-md-6 col-xl-4">
                                    <input class="form-control" type="date" name="data_nasc" id="txtDataNascimento" placeholder=" " required />
                                    <label for="txtDataNascimento" class="d-inline d-sm-none d-md-inline d-lg-none">Data
                                        Nascimento</label>
                                    <label for="txtDataNascimento" class="d-none d-sm-inline d-md-none d-lg-inline">Data
                                        de Nascimento</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Contatos</legend>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="email" name="email" id="txtEmail" placeholder=" " required />
                                    <label for="txtEmail">E-mail</label>
                                </div>
                                <div class="xx">
                                    <div class="form-floating mb-3 col-md-6">
                                        <input class="form-control" placeholder=" " name="telefone" type="text" id="txtTelefone" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" required />
                                        <label for="txtTelefone">Telefone</label>

                                    </div>
                                    <h4>(xx) xxxxx-xxxx</h4>

                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Endereço</legend>
                                <div class="form-floating mb-3 col-md-6 col-lg-4">
                                    <input class="form-control" type="text" name="cep" id="txtCEP" placeholder=" " required />
                                    <label for="txtCEP">CEP</label>
                                </div>
                                <?php
                                if (isset($_POST["cep"])) {
                                    $cepIframe = $_POST["cep"];
                                    $cepCorrect = preg_replace("/[^0-9]/", "", $cepIframe);
                                    $maps = 'https://www.google.com.br/maps?q=' . $cepCorrect . ',%20Brasil&output=embed';
                                    echo  "<script>alert('foi mongoloide');</script>";
                                    if (1 == 1) {
                                ?>
                                        <div class='mb-3 col-md-6 col-lg-8 align-self-end'>
                                            <iframe id='iframeCep' src="<?= $maps ?>" width='100%' height='100%' style='border:0;' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>
                                        </div>
                                <?php };
                                }; ?>
                                <div class="clearfix"></div>
                                <div class="form-floating mb-3 col-md-4">
                                    <input class="form-control" type="text" name="numero" id="txtNumero" placeholder=" " required />
                                    <label for="txtNumero">Número</label>
                                </div>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="text" name="complemento" id="txtComplemento" placeholder=" " />
                                    <label for="txtComplemento">Complemento</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="referencia" id="txtReferencia" placeholder=" " />
                                    <label for="txtReferencia">Referência</label>
                                </div>
                            </fieldset>
                            <fieldset class="row gx-3">
                                <legend>Senha de Acesso</legend>
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
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Desejo receber informações sobre promoções.
                        </label>
                    </div>
                    <div class="mb-3 text-left">
                        <a class="btn btn-lg btn-light btn-outline-info" href="index.html">Cancelar</a>
                        <input type="submit" name="submit" id="submit" value="Criar meu cadastro" class="btn btn-lg btn-info text-white" />
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
                        <a href="privacidade.php" class="text-decoration-none text-dark">Política de
                            Privacidade</a><br>
                        <a href="termos.php" class="text-decoration-none text-dark">Termos de Uso</a><br>
                        <a href="quemsomos.php" class="text-decoration-none text-dark">Quem Somos</a><br>
                        <a href="trocas.php" class="text-decoration-none text-dark">Trocas e Devoluções</a>
                    </div>
                    <div class="col-12 col-md-4 text-center text-md-right">
                        <a href="contato.php" class="text-decoration-none text-dark">Contato pelo site</a><br>
                        E-mail: <a href="mailto:email@dominio.com" class="text-decoration-none text-dark">email@dominio.com</a><br>
                        Telefone: <a href="phone:28999990000" class="text-decoration-none text-dark">(28) 99999-0000</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        document.getElementById('txtCEP').addEventListener('input', function() {
            get_endereco(this.value);
        });

        function get_endereco(cep){
            var url = 'cadastro.php';
            var formData = new FormData();
            formData.append('cep', cep)

            $.ajax({
            url: url,
            data: formData,
            type: 'POST',
            success: function(response) {
                console.log(formData)
            }
        });
        }
        
    </script>
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>