<?php
    session_start();
    include_once('config.php');
    // print_r($_SESSION);

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM stock WHERE id LIKE '%$data%' or nome LIKE '%$data%' or valor LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM stock ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/icon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/icon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/estilos.css">

    <title>Tech Dev Online :: Página Principal</title>
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-info border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="index.php"><b>Tech Dev Online</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contato.php">Contato</a>
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
                                <span class="badge rounded-pill bg-light text-info position-absolute ms-4 mt-0"
                                    title="5 produto(s) no carrinho"><small>5</small></span>
                                <a href="carrinho.php" class="nav-link text-white">
                                    <i class="bi-cart" style="font-size:24px;line-height:24px;"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
            <div id="carouselMain" class="carousel slide carousel-dark" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="img/slides/slide01.jpg" class="d-none d-md-block w-100" alt="">
                        <img src="img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="img/slides/slide01.jpg" class="d-none d-md-block w-100" alt="">
                        <img src="img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="img/slides/slide01.jpg" class="d-none d-md-block w-100" alt="">
                        <img src="img/slides/slide01small.jpg" class="d-block d-md-none  w-100" alt="">
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
                                <button onclick="searchData()" class="btn btn-info" id="pesquisar">Buscar</button>
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
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px; color: dodgerblue;"></i>
                            </a>
                            <a href="produto.php">
                                <img src="img/produtos/000001.jpg" class="card-img-top">
                            </a>
                            <div class="card-header">
                                de <s>R$ 3.361,01</s>
                                <h5>por:R$2.579,98</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">

                                    Pc Gamer

                                </h5>
                                <p class="card-text truncar-3l">
                                    COMPUTADOR PICHAU GAMER, AMD RYZEN 5 4650G, 16GB DDR4, SSD 480GB
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">40 peças em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000002.jpg" class="card-img-top">
                            <div class="card-header">
                                de <s>R$ 5.024,01</s>
                                <h5>Por: R$3.599,87</h5>
                                    
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Pc udyat</h5>
                                <p class="card-text truncar-3l">
                                    COMPUTADOR PICHAU GAMER UDYAT, INTEL I5-10400F, GEFORCE GTX 1650 4GB, 8GB DDR4, SSD 240GB
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">300 peças em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000003.jpg" class="card-img-top">
                            <div class="card-header">
                                <h5>R$1.248,99</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Pc I5</h5>
                                <p class="card-text truncar-3l">
                                    Pc Cpu Intel Core I5 3º3470 3,2ghz+8gbram+ssd 240gb Promoção
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-light disabled mt-2 d-block">
                                    <small>Reabastecendo Estoque</small>
                                </a>
                                <small class="text-info">
                                    <b>Produto Esgotado</b>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart-fill" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000004.jpg" class="card-img-top">
                            <div class="card-header">
                                <h5>R$970,00</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Pc I5</h5>
                                <p class="card-text truncar-3l">
                                    Computador Pc Cpu Intel Core i5 Com Hdmi 8GB HD 500GB Windows 10 Wifi Desktop
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">320 peças em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000005.jpg" class="card-img-top">
                            <div class="card-header">
                                De: <s>R$1.699,00 </s>
                                <h5>por: R$1.260,21</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Moto G22</h5>
                                <p class="card-text truncar-3l">
                                    Quad Câmera com sensor de 50 MP + Selfie de 16 MP 12 horas de bateria em 30 minutos* com carregador TurboPower 20 Design elegante e moderno Navegação suave com tela imersiva de 6,5″ HD+ com 90 Hz 128 GB de armazenamento interno*
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">320,5kg em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000006.jpg" class="card-img-top">
                            <div class="card-header">
                                <h5>R$ 329,90</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">ObaZapp</h5>
                                <p class="card-text truncar-3l">
                                    o celular de barrinha com whatsApp. Simples assim.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">320,5kg em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000007.jpg" class="card-img-top">
                            <div class="card-header">
                                <h5>R$2.579,98</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Banana Prata</h5>
                                <p class="card-text truncar-3l">
                                    Banana prata da melhor qualidade possível, direto do produtor rural para a sua mesa.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">320,5kg em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000008.jpg" class="card-img-top">
                            <div class="card-header">
                                <h5>R$2.579,98</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Banana Prata</h5>
                                <p class="card-text truncar-3l">
                                    Banana prata da melhor qualidade possível, direto do produtor rural para a sua mesa.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">320,5kg em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart-fill" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000009.jpg" class="card-img-top">
                            <div class="card-header">
                                <h5>R$2.579,98</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Banana Prata</h5>
                                <p class="card-text truncar-3l">
                                    Banana prata da melhor qualidade possível, direto do produtor rural para a sua mesa.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">320,5kg em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000010.jpg" class="card-img-top">
                            <div class="card-header">
                                <h5>R$2.579,98</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Banana Prata</h5>
                                <p class="card-text truncar-3l">
                                    Banana prata da melhor qualidade possível, direto do produtor rural para a sua mesa.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">320,5kg em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000011.jpg" class="card-img-top">
                            <div class="card-header">
                                <h5>R$2.579,98</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Banana Prata</h5>
                                <p class="card-text truncar-3l">
                                    Banana prata da melhor qualidade possível, direto do produtor rural para a sua mesa.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">320,5kg em estoque</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                        <div class="card text-center bg-light">
                            <a href="#" class="position-absolute end-0 p-2 text-info">
                                <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                            </a>
                            <img src="img/produtos/000012.jpg" class="card-img-top">
                            <div class="card-header">
                                <h5>R$2.579,98</h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Banana Prata</h5>
                                <p class="card-text truncar-3l">
                                    Banana prata da melhor qualidade possível, direto do produtor rural para a sua mesa.
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="carrinho.php" class="btn btn-info mt-2 d-block">
                                    Adicionar ao Carrinho
                                </a>
                                <small class="text-success">320,5kg em estoque</small>
                            </div>
                        </div>
                    </div>
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

        <footer class="border-top text-muted bg-light">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-md-4 text-center">
                        &copy; 2020 - Tech Dev Online Ltda ME<br>
                        Rua Virtual Inexistente, 171, Compulândia/PC <br>
                        CPNJ 99.999.999/0001-99
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="privacidade.php" class="text-decoration-none text-dark">
                            Política de Privacidade
                        </a><br>
                        <a href="termos.php" class="text-decoration-none text-dark">
                            Termos de Uso
                        </a><br>
                        <a href="quemsomos.php" class="text-decoration-none text-dark">
                            Quem Somos
                        </a><br>
                        <a href="contato.php" class="text-decoration-none text-dark">
                            Trocas e Devoluções
                        </a>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="contato.php" class="text-decoration-none text-dark">
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
    <script>
        var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'index.php?search='+search.value;
    }
    </script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>