<?php
session_start();
$sistema = '';
include_once('config.php');
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Fechamento da Compra';
require_once('head.php');
?>
<style>
    .over {
        max-width: 20px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
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
                <form action="fechamento_endereco.php" method="POST">
                    <h1>Confira os Itens</h1>
                    <h3>Confira os itens e clique em <b>Continuar</b> para prosseguir para a <b>seleção do endereço de entrega</b>.</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Imagem</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Quantidade</th>
                            </tr>
                        </thead>
                        <?php
                        $select_cart = mysqli_query($conexao, "SELECT * FROM `cart`");
                        $valor_total = 0;
                        if (mysqli_num_rows($select_cart) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        ?>

                                <tbody>
                                    <?php
                                    $sub_total = ($fetch_cart['valor'] * $fetch_cart['quantidade']);
                                    $valor_total += $sub_total;
                                    echo "<tr>";
                                    echo "<td>" . $fetch_cart['id'] . "</td>";
                                    echo "<td>" . $fetch_cart['nome'] . "</td>";
                                    echo "<td>
                                    <div style='height: 100px; width: 100px;'>
                                        <a href='#'>
                                            <img src=" . $fetch_cart['imagem'] . " class='img-thumbnail'>
                                        </a>
                                    </div>
                                </td>";
                                    echo "<td class='over'>" . $fetch_cart['descricao'] . "</td>";
                                    echo "<td>R$ " . number_format($sub_total, 2, ',', '.') . "</td>";
                                    echo "<td>" . $fetch_cart['quantidade'] . "</td>";
                                    ?>
                                    <input type="hidden" name="id" value="<?= $fetch_cart['id'] ?>">
                                    <input type="hidden" name="nome" value="<?= $fetch_cart['nome'] ?>">
                                    <input type="hidden" name="imagem" value="<?= $fetch_cart['imagem'] ?>">
                                    <input type="hidden" name="descricao" value="<?= $fetch_cart['descricao'] ?>">
                                    <input type="hidden" name="quantidade" value="<?= $fetch_cart['quantidade'] ?>">
                                </tbody>
                            <?php
                            };
                            ?>
                    </table>
                    <li class="list-group-item pt-3 pb-0 mb-3 dark">
                        <div class="text-end">
                            <h4 class="text-dark mb-3">
                                <?= "Valor Total: R$ " . number_format($valor_total, 2, ',', '.'); ?>
                            </h4>
                            <a href="carrinho.php" class="btn btn-outline-info btn-lg mb-3">
                                Voltar ao Carrinho
                            </a>
                            <input type="hidden" name="total" value="<?= $valor_total ?>">
                            <input type="submit" class="btn btn-success btn-lg ms-2 mb-3" value="Continuar">
                        </div>
                    </li>
                </form>
            <?php
                        };
            ?>
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