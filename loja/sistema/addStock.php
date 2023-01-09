<?php
session_start();
$sistema = '../';
require_once('../logado.php');
require_once('../adm.php');
include_once('../config.php');
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Estoque';
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
                <h1>Alterando Estoque</h1>
                <hr>
                <form class="mt-3" enctype="multipart/form-data" action="saveAddEstoque.php" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <!--
                            <fieldset class="row gx-3">
                                <legend>Imagem</legend>
                                <div class="form-floating mb-3">
                                    <input type="file" name="imagem" id="imagem" placeholder=" " required />
                                </div>
                            </fieldset>
                            -->
                            <fieldset>
                                <legend>Imagem</legend>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="text" name="imagem" id="txtImagem" placeholder=" " autofocus required />
                                    <label for="txtNome">URL</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Nome</legend>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="text" name="nome" id="txtNome" placeholder=" " required />
                                    <label for="txtNome">Nome</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Preço</legend>
                                <div class="form-floating mb-3 col-md-6">
                                    <input class="form-control" placeholder=" " name="valor" type="text" id="txtValor" required />
                                    <label for="txtValor">preço</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Quantidade</legend>
                                <div class="form-floating mb-3 col-md-6">
                                    <input class="form-control" placeholder=" " name="quantidade" type="text" id="txtQuantidade" required />
                                    <label for="txtValor">quantidade</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Descrição</legend>
                                <div class="form-floating mb-3 ">
                                    <textarea class="form-control" type="text" name="descricao" id="txtDescricao" cols="30" rows="5" wrap="hard" required style='height: 260px;'> </textarea>
                                    <label for="txtDescricao">Descrição</label>
                                </div>
                            </fieldset>
                            <fieldset class="row gx-3">
                                <legend>Senha do Admin</legend>
                                <div class="form-floating mb-3 col-lg-6">
                                    <input class="form-control" type="password" name="senha" id="txtSenha" placeholder=" " autocomplete="off" required />
                                    <label for="txtSenha">Senha</label>
                                </div>
                                <div class="form-floating mb-3 col-lg-6">
                                    <input class="form-control" name="confirm_senha" id="txtConfirmacaoSenha" placeholder=" " autocomplete="off" type="password" required />
                                    <label class="form-label" for="txtConfirmacaoSenha">Confirmação da Senha</label>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <hr />
                    <div class="mb-3 text-left">
                        <a class="btn btn-lg btn-light btn-outline-danger" href="estoque.php">Cancelar</a>
                        <input type="hidden" name="email" id="txtEmail" value="<?= $logado ?>" />
                        <input type="submit" name="add" id="add" value="Adicionar Item" class="btn btn-lg btn-success" />
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
    <script src="../assets/js/darkmode.js"></script>
    <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>