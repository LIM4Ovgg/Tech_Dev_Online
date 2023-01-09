<?php
session_start();
include_once('config.php');
$sistema = '';
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Fechamento da Compra';
require_once('head.php');
?>
</head>

<body>
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
                <form action="fechamento_pagamento.php" method="POST">
                    <h1>Selecione o Endereço de Entrega</h1>
                    <h3 class="mb-4">
                        Selecione o endereço de entrega e clique em <b>Continuar</b> para prosseguir para a <b>seleção da
                            forma de pagamento</b>.
                    </h3>
                    <div class="d-flex justify-content-around flex-wrap border rounded-top pt-4 px-3">
                        <div class="mb-4 mx-2 flex-even">
                            <input type="radio" class="btn-check" name="endereco" autocomplete="off" id="end1" value="end1">
                            <label class="btn btn-outline-info p-4 h-100 w-100" for="end1">
                                <h3>
                                    <b class="text-dark">Minha Casa</b><br>
                                    <hr>
                                    <b>Ricardo Maroquio</b><br>
                                    Rua Caminho Virtual, 101<br>
                                    Compulândia/PC<br>
                                    CEP 01.010-101
                                </h3>
                            </label>
                        </div>
                        <div class="mb-4 mx-2 flex-even">
                            <input type="radio" class="btn-check" name="endereco" autocomplete="off" id="end2" value="end2">
                            <label class="btn btn-outline-info p-4 h-100 w-100" for="end2">
                                <h3>
                                    <b class="text-dark">Meu Trabalho</b><br>
                                    <hr>
                                    <b>Ricardo Maroquio</b><br>
                                    Rua Caminho Virtual, 101<br>
                                    Compulândia/PC<br>
                                    CEP 01.010-101
                                </h3>
                            </label>
                        </div>
                        <div class="mb-4 mx-2 flex-even">
                            <input type="radio" class="btn-check" name="endereco" autocomplete="off" id="end3" value="end3">
                            <label class="btn btn-outline-info p-4 h-100 w-100" for="end3">
                                <h3>
                                    <b class="text-dark">Casa de Praia</b><br>
                                    <hr>
                                    <b>Ricardo Maroquio</b><br>
                                    Rua Caminho Virtual, 101<br>
                                    Compulândia/PC<br>
                                    CEP 01.010-101
                                </h3>
                            </label>
                        </div>
                    </div>
                    <div class="text-end border border-top-0 rounded-bottom p-4 pb-0">
                        <a href="fechamento_itens.php" class="btn btn-outline-info btn-lg mb-4">
                            Voltar aos Itens
                        </a>
                        <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                        <input type="hidden" name="nome" value="<?= $_POST['nome'] ?>">
                        <input type="hidden" name="imagem" value="<?= $_POST['imagem'] ?>">
                        <input type="hidden" name="descricao" value="<?= $_POST['descricao'] ?>">
                        <input type="hidden" name="quantidade" value="<?= $_POST['quantidade'] ?>">
                        <input type="hidden" name="total" value="<?= $_POST['total'] ?>">
                        <input type="submit" class="btn btn-success btn-lg ms-2 mb-4" value="continuar">
                    </div>
                </form>
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