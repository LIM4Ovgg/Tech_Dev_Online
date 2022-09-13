<?php

require_once('sessionStart.php');

if (isset($_POST['update_update_btn'])) {
    $update_valor = $_POST['update_quantidade'];
    $update_id = $_POST['update_quantidade_id'];
    $update_quantidade_query = mysqli_query($conexao, "UPDATE `cart` SET quantidade = '$update_valor' WHERE id = '$update_id'");
    if ($update_quantidade_query) {
        header('location:carrinho.php');
    }
}

if (isset($_GET['remover'])) {
    $remove_id = $_GET['remover'];
    mysqli_query($conexao, "DELETE FROM `cart` WHERE id = '$remove_id'");
    header('location:carrinho.php');
}

if (isset($_GET['aumentar'])) {
    $aumentar_id = $_GET['aumentar'];
    $aumentar_valor = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM `cart` Where id = '$aumentar_id'"))['quantidade'] + 1;
    $update_quantidade_query = mysqli_query($conexao, "UPDATE `cart` SET quantidade = '$aumentar_valor' WHERE id = '$aumentar_id'");
    if ($update_quantidade_query) {
        header('location:carrinho.php');
    }
}

if (isset($_GET['diminuir'])) {
    $diminuir_id = $_GET['diminuir'];
    $diminuir_valor = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM `cart` Where id = '$diminuir_id'"))['quantidade'] - 1;
    $update_quantidade_query = mysqli_query($conexao, "UPDATE `cart` SET quantidade = '$diminuir_valor' WHERE id = '$diminuir_id'");
    if ($update_quantidade_query) {
        header('location:carrinho.php');
    }
}

?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Carrinho de Compras';
$sistema = '';
require_once('head.php');
?>
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <?php
        require_once('header.php');
        ?>

        <main class="flex-fill">
            <div class="container">
                <h1>Carrinho de Compras</h1>
                <ul class="list-group mb-3">

                    <?php

                    $select_cart = mysqli_query($conexao, "SELECT * FROM `cart`");
                    $valor_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                    ?>

                            <li class="list-group-item py-3">
                                <div class="row g-3">
                                    <div class="col-4 col-md-3 col-lg-2">
                                        <a href="#">
                                            <img src="<?php echo $fetch_cart['imagem'] ?>" class="img-thumbnail">
                                        </a>
                                    </div>
                                    <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                                        <h4>
                                            <b><a href="#" class="text-decoration-none text-info">
                                                    <?php echo $fetch_cart['nome'] ?></a></b>
                                        </h4>
                                        <h5 class="truncar-3l">
                                            <?= $fetch_cart['descricao'] ?>
                                        </h5>
                                    </div>
                                    <div class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-0 col-xl-2 align-self-center mt-3">
                                        <form action="" method="POST">
                                            <div class="input-group">
                                                <a class="btn btn-outline-dark btn-sm" href="carrinho.php?diminuir=<?php echo $fetch_cart['id'] ?>">
                                                    <i class="bi-caret-down" style="font-size: 16px; line-height: 16px;"></i>
                                                </a>

                                                <input type="hidden" min="1" name="update_quantidade_id" value="<?php echo $fetch_cart['id'] ?>">
                                                <input type="text" class="form-control text-center border-dark" min="1" name="update_quantidade" value="<?php echo $fetch_cart['quantidade'];
                                                                                                                                                        if ($fetch_cart['quantidade'] <= 0) {
                                                                                                                                                            $id = $fetch_cart['id'];
                                                                                                                                                            mysqli_query($conexao, "DELETE FROM `cart` WHERE id = '$id'");
                                                                                                                                                            header('location:carrinho.php');
                                                                                                                                                        }
                                                                                                                                                        ?>">
                                                <input type="submit" name="update_update_btn" hidden />

                                                <a class="btn btn-outline-dark btn-sm" href="carrinho.php?aumentar=<?php echo $fetch_cart['id'] ?>">
                                                    <i class="bi-caret-up" style="font-size: 16px; line-height: 16px;"></i>
                                                </a>
                                                <a class="btn btn-outline-info border-dark btn-sm" href="carrinho.php?remover=<?php echo $fetch_cart['id'] ?>" onclick="return confirm('Remover item do carrinho?')">
                                                    <i class="bi-trash" style="font-size: 16px; line-height: 16px;"></i>
                                                </a>
                                            </div>
                                        </form>
                                        <div class="text-end mt-2">
                                            <small class="text-secondary"><?php echo 'Valor unidade: R$' . number_format($fetch_cart['valor'], 2, ',', '.') ?></small><br>
                                            <span class="text-dark"><?php
                                                                    $sub_total = ($fetch_cart['valor'] * $fetch_cart['quantidade']);
                                                                    echo 'Valor Itens: R$' . number_format($sub_total, 2, ',', '.') ?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                        <?php
                        };
                        ?>
                        <li class="list-group-item py-3">
                            <div class="text-end">
                                <h4 class="text-dark mb-3">
                                    <?php
                                    $valor_total += $sub_total;
                                    echo 'Valor Total: R$ ' . number_format($valor_total, 2, ',', '.');
                                    ?>
                                </h4>
                                <a href="index.php" class="btn btn-outline-success btn-lg">
                                    Continuar Comprando
                                </a>
                                <a href="fechamento_itens.html" class="btn btn-info btn-lg ms-2 mt-xs-3 text-white">Fechar Compra</a>
                            </div>
                        </li>
                    <?php
                    } else {
                    ?>

                        <li class="list-group-item py-3">
                            <div class="text-center">
                                <h4 class="text-dark mb-3">
                                    Carrinho Vazio
                                </h4>
                                <a href="index.php" class="btn btn-outline-success btn-lg">
                                    Voltar para a pagina de compras.
                                </a>
                            </div>
                        </li>

                    <?php
                    }
                    ?>


                </ul>
            </div>
        </main>

        <?php
        require_once('footer.php');
        ?>
    </div>
    <script type="text/javascript">
        // Using jQuery.

        $(function() {
            $('form').each(function() {
                $(this).find('input').keypress(function(e) {
                    // Enter pressed?
                    if (e.which == 10 || e.which == 13) {
                        this.form.submit();
                    }
                });

                $(this).find('input[type=submit]').hide();
            });
        });
    </script>
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>