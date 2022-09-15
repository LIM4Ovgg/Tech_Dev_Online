<?php
    require_once('sessionStart.php');
    $sistema = '';

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];

    if (isset($_GET['remover'])) {
        $remove_id = $_GET['remover'];
        mysqli_query($conexao, "DELETE FROM `favorites` WHERE id = '$remove_id'");
        header('location:cliente_favoritos.php');
    }

    if (isset($_GET['adicionar'])) {
        $produto_id = $_GET['adicionar'];
        $fav = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM `favorites` WHERE id = '$produto_id'"));
        $produto_id = $fav['id'];
        $produto_nome = $fav['nome'];
        $produto_valor = $fav['valor'];
        $produto_descricao = $fav['descricao'];
        $produto_imagem = $fav['imagem'];
        $produto_quantidade = 1;
        $select_cart = mysqli_query($conexao, "SELECT * FROM `cart` WHERE nome = '$produto_nome'");
    
        if (mysqli_num_rows($select_cart) > 0) {
            $mensagem[] = 'Produto já está no carrinho';
            
        } else {
            mysqli_query($conexao, "INSERT INTO `cart`(id, nome, valor, imagem, descricao, quantidade) VALUES('$produto_id','$produto_nome','$produto_valor','$produto_imagem','$produto_descricao','$produto_quantidade')");
            $mensagem[] = 'Produto adicionado ao carrinho';
        }
    }


    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM users WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    }
    else
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Area do Cliente :: Favoritos';
require_once('head.php');
?>
</head>

<body>
<?php
    if (isset($mensagem)) {
        foreach ($mensagem as $mensagem) {
            echo '<div style="display: flex; justify-content: space-between; padding: 10px;">
                <span>
                    ' . $mensagem . '
                </span>
                <i class="bi bi-x-lg point" onclick="this.parentElement.style.display = `none`;"></i>
            </div>';
        };
    };
    ?>

    <div class="d-flex flex-column wrapper">
    <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm == true) {
                require_once('header_logado_adm.php');
            }else{
                require_once('header_logado.php');
            }
        } else {
            require_once('header.php');
        }
        ?>
 
        <main class="flex-fill">
            <div class="container">
                <h1>Minha Conta</h1>
                <div class="row gx-3 mb-3">
                    <div class="col-4">
                        <div class="list-group">
                            <a href="cliente_dados.php" class="list-group-item list-group-item-action">
                                <i class="bi-person fs-6"></i> Dados Pessoais
                            </a>
                            <a href="cliente_contatos.php" class="list-group-item list-group-item-action">
                                <i class="bi-mailbox fs-6"></i> Contatos
                            </a>
                            <a href="cliente_endereco.php" class="list-group-item list-group-item-action">
                                <i class="bi-house-door fs-6"></i> Endereço
                            </a>
                            <a href="cliente_pedidos.php" class="list-group-item list-group-item-action">
                                <i class="bi-truck fs-6"></i> Pedidos
                            </a>
                            <a href="cliente_favoritos.php" class="list-group-item list-group-item-action bg-info text-light">
                                <i class="bi-heart fs-6"></i> Favoritos
                            </a>
                            <a href="cliente_senha.php" class="list-group-item list-group-item-action">
                                <i class="bi-lock fs-6"></i> Alterar Senha
                            </a>
                            <a href="sistema/sair.php" class="list-group-item list-group-item-action">
                                <i class="bi-door-open fs-6"></i> Sair
                            </a>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row g-3">
                        <?php

                        $select_fav = mysqli_query($conexao, "SELECT * FROM `favorites`");
                        if (mysqli_num_rows($select_fav) > 0) {
                            while ($fetch_fav = mysqli_fetch_assoc($select_fav)) {
                        ?>
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                <div class="card text-center bg-light">
                                    <a href="cliente_favoritos.php?remover=<?= $fetch_fav['id'] ?>" class="position-absolute end-0 p-2 text-info" title="Remover dos favoritos">
                                        <i class="bi-x" style="font-size: 24px; line-height: 24px;"></i>
                                    </a>
                                    <img src="<?= $fetch_fav['imagem'] ?>" class="card-img-top">
                                    <div class="card-header">
                                        R$ <?= $fetch_fav['valor'] ?>
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title"><?= $fetch_fav['nome'] ?></h5>
                                      <p class="card-text truncar-3l">
                                      <?= $fetch_fav['descricao'] ?>
                                      </p>                              
                                    </div>
                                    <div class="card-footer">
                                        <a href="cliente_favoritos.php?adicionar=<?= $fetch_fav['id'] ?>" class="btn btn-info mt-2 d-block">
                                            Adicionar ao Carrinho
                                        </a>
                                        <small class="text-success"><?= $fetch_fav['quantidade'] ?> peças em estoque</small>
                                    </div>
                                  </div>
                            </div>
                             <?php }}?>
                        </div>
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
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>