<?php

require_once('sessionStart.php');


if (isset($_POST['adicionar'])) {
    $produto_nome = $_POST['produto_nome'];
    $produto_valor =  $_POST['produto_valor'];
    $produto_descricao = $_POST['produto_descricao'];
    $produto_imagem = $_POST['produto_imagem'];
    $produto_quantidade = 1;
    $select_cart = mysqli_query($conexao, "SELECT * FROM `cart` WHERE nome = '$produto_nome'");  
       
    if (mysqli_num_rows($select_cart) > 0) {
        $mensagem[] = 'Produto já foi adicionado ao carrinho';
    } else {
        $inserir_produto = mysqli_query($conexao, "INSERT INTO `cart`(nome, valor, imagem, descricao, quantidade) VALUES('$produto_nome','$produto_valor','$produto_imagem','$produto_descricao','$produto_quantidade')");
        $mensagem[] = 'Produto adicionado ao carrinho';
    }
}



if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM stock WHERE id LIKE 'id' or nome LIKE 'nome' or valor LIKE 'valor' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM stock ORDER BY id DESC";
}
$result = $conexao->query($sql);
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Página Principal';
require_once('head.php');
?>

<body>
    <?php
    if(isset($mensagem)) {
        foreach($mensagem as $mensagem) {
            echo '<div style="display: flex; justify-content: space-between; padding: 10px;">
                <span>
                    '.$mensagem.'
                </span>
                <i class="bi bi-x-lg point" onclick="this.parentElement.style.display = `none`;"></i>
            </div>';
        };
    };
    ?>



    <div class="d-flex flex-column wrapper">
        <?php
        require_once('header.php');
        ?>

        <div class="container">
            <div id="carouselMain" class="carousel slide carousel-dark" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="assets/img/slides/slide01.jpg" class="d-none d-md-block w-100" alt="">
                        <img src="assets/img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="assets/img/slides/slide01.jpg" class="d-none d-md-block w-100" alt="">
                        <img src="assets/img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="assets/img/slides/slide01.jpg" class="d-none d-md-block w-100" alt="">
                        <img src="assets/img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
            <hr class="mt-3">
        </div>

        <main class="flex-fill">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="justify-content-center justify-content-md-start mb-3 mb-md-0">
                            <div class="input-group input-group-sm">
                                <input type="search" class="form-control" placeholder="Digite aqui o que procura" id="pesquisar" autofocus>
                                <button onclick="searchData()" class="btn btn-info text-white" id="pesquisar">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                            <form class="d-inline-block">
                                <select class="form-select form-select-sm">
                                    <option>Ordenar pelo nome</option>
                                    <option>Ordenar pelo menor preço</option>
                                    <option>Ordenar pelo maior preço</option>
                                </select>
                            </form>
                            <nav class="d-inline-block me-3">
                                <ul class="pagination pagination-sm my-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="1.php">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="2.php">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="3.php">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="4.php">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="5.php">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="6.php">6</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <hr mt-3>

                <div class="row g-3">

                    <?php

                    $select_stock = mysqli_query($conexao, "SELECT * FROM `stock`");

                    if (mysqli_num_rows($select_stock) > 0) {
                        while ($fetch_stock = mysqli_fetch_assoc($select_stock)) {
                    ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="card text-center bg-light">
                                    <a href="#" class="position-absolute end-0 p-2 text-info">
                                        <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                                    </a>
                                    <img src="<?php echo 'assets/img/produtos/' . $fetch_stock['imagem'] ?>" class="card-img-top">
                                    <div class="card-header">
                                        de <s>R$ 5.024,01</s>
                                        <h5><?php echo 'Por: R$' . number_format($fetch_stock['valor'], 2, ',', '.') ?></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $fetch_stock['nome'] ?></h5>
                                        <p class="card-text truncar-3l">
                                            <?php echo $fetch_stock['descricao'] ?>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <?php
                                        if ($fetch_stock['quantidade'] > 0) {
                                        ?>

                                            <form action="" method="POST">
                                                <input type="hidden" name="produto_nome" value="<?php echo $fetch_stock['nome'] ?>">
                                                <input type="hidden" name="produto_valor" value="<?php echo $fetch_stock['valor'] ?>">
                                                <input type="hidden" name="produto_imagem" value="<?php echo $fetch_stock['imagem'] ?>">
                                                <input type="hidden" name="produto_descricao" value="<?php echo $fetch_stock['descricao'] ?>">
                                                <button type="submit" class="btn btn-info mt-2 d-block" name="adicionar">
                                                    Adicionar ao Carrinho
                                                </button>
                                            </form>
                                            <small class="text-success"><?php echo $fetch_stock['quantidade'] . ' peças em estoque' ?></small>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="#" class="btn btn-light disabled mt-2 d-block">
                                                <small>Reabastecendo Estoque</small>
                                            </a>
                                            <small class="text-info">
                                                <b>Produto Esgotado</b>
                                            </small>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                    <?php
                        };
                    };
                    ?>
                </div>


                <hr class="mt-3">

                <div class="row pb-3">
                    <div class="col-12">
                        <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                            <form class="d-inline-block">
                                <select class="form-select form-select-sm">
                                    <option>Ordenar pelo nome</option>
                                    <option>Ordenar pelo menor preço</option>
                                    <option>Ordenar pelo maior preço</option>
                                </select>
                            </form>
                            <nav class="d-inline-block me-3">
                                <ul class="pagination pagination-sm my-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="1">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="2">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="3">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="4">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="5">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="6">6</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php
        require_once('footer.php');
        ?>
    </div>
    <script>
        var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        function searchData() {
            window.location = 'index.php?search=' + search.value;
        }
    </script>
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>