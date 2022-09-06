<?php
    
    if(isset($_FILES['image'])) {
        $arquivo = $_FILES['image'];

        if ($arquivo['error']) {
            die("Falha ao enviar arquivo");
            echo "errado";
        }
        else{
            echo "certo";
        }
        if ($arquivo['size'] > 2097152) {
            die("Arquivo muito grande! Max: 2MB");
        }

        $pasta = "arquivos/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != "png" && $extensao != "gif")
        {
            die("Tipo de arquivo inválido");
        }
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $pasta . $novoNomeDoArquivo . "." . $extensao);
        if ($deu_certo) 
        {
            echo "arquivo enviado com sucesso <a target=\"_blank\" href=\"arquivos/$nomeDoArquivo.$extensao\" >clique aqui</a>";
        }
        else
        {
            echo "falha";
        }
    }


    
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/estilos.css">
    
    <title>Quitanda Online :: Cadastro</title>

</head>

<body style="min-width:372px;">
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <strong>Sistema</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a href="edit.php" class="nav-link text-white">Estocar</a>
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
                                <span class="badge rounded-pill bg-light text-danger position-absolute ms-4 mt-0"
                                    title="5 produto(s) no carrinho"><small>5</small></span>
                                <a href="/carrinho.php" class="nav-link text-white">
                                    <svg class="bi" width="24" height="24" fill="currentColor">
                                        <use xlink:href="/bi.svg#cart3" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-fill">
            <div class="container">
                <h1>Alterando Estoque</h1>
                <hr>
                <form class="mt-3" enctype="multipart/form-data" action="" method="POST">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Imagem</legend>
                                <div class="form-floating mb-3">
                                    <input class="arquivo" type="file" name="arquivo" id="arquivo" placeholder=" " required />
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Nome</legend>
                                <div class="form-floating mb-3 col-md-8">
                                    <input class="form-control" type="text" name="nome" id="txtNome" placeholder=" " value="<?php echo $nome ?>" autofocus required />
                                    <label for="txtNome">Nome</label>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Preço</legend>
                                <div class="form-floating mb-3 col-md-6">
                                    <input class="form-control" placeholder=" " name="valor" type="text" id="txtValor" value="<?php echo $valor ?>" required />
                                    <label for="txtValor">preço</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <fieldset class="row gx-3">
                                <legend>Descrição</legend>
                                <div class="form-floating mb-3 ">
                                    <textarea class="form-control" type="text" name="descricao" id="txtDescricao" value="<?php echo $descricao ?>" cols="30" rows="5" wrap="hard" required style='height: 260px;'> </textarea>
                                    <label for="txtDescricao">Descrição</label>
                                </div>                                
                            </fieldset>
                            <!--<fieldset class="row gx-3">
                                <legend>Senha do Admin</legend>
                                <div class="form-floating mb-3 col-lg-6">
                                    <input class="form-control" type="text" name="senha" id="txtSenha" placeholder=" " value="<?php echo $senha ?>" required />
                                    <label for="txtSenha" >Senha</label>
                                </div>
                                <div class="form-floating mb-3 col-lg-6">
                                    <input class="form-control" name="confirm_senha" id="txtConfirmacaoSenha" placeholder=" " type="text" value="<?php echo $confirm_senha ?>" required />
                                    <label class="form-label" for="txtConfirmacaoSenha">Confirmação da Senha</label>
                                </div>
                            </fieldset>-->
                        </div>
                    </div>
                    <hr />
                    <div class="mb-3 text-left">
                        <a class="btn btn-lg btn-light btn-outline-danger" href="sistema.php">Cancelar</a>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="update" id="update" value="Salvar Alterações" class="btn btn-lg btn-danger"/>
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
                        E-mail: <a href="mailto:email@dominio.com"
                            class="text-decoration-none text-dark">email@dominio.com</a><br>
                        Telefone: <a href="phone:28999990000" class="text-decoration-none text-dark">(28) 99999-0000</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>