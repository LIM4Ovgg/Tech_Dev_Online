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
$title = 'Area do Cliente :: Pedidos';
require_once('head.php');
?>
</head>

<body>
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
                <div class="row gx-3">
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
                            <a href="cliente_pedidos.php" class="list-group-item list-group-item-action bg-info text-light">
                                <i class="bi-truck fs-6"></i> Pedidos
                            </a>
                            <a href="cliente_favoritos.php" class="list-group-item list-group-item-action">
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
                        <form class="row mb-3">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-floating">
                                    <select class="form-select">
                                        <option value="30">Últimos 30 dias</option>
                                        <option value="60">Últimos 60 dias</option>
                                        <option value="90">Últimos 90 dias</option>
                                        <option value="180">Últimos 180 dias</option>
                                        <option value="360" selected>Últimos 360 dias</option>
                                        <option value="9999">Todo o período</option>
                                    </select>
                                    <label>Período</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-floating">
                                    <select class="form-select">
                                        <option value="1" selected>Mais novos primeiro</option>
                                        <option value="2">Mais antigos primeiro</option>
                                    </select>
                                    <label>Ordenação</label>
                                </div>
                            </div>
                        </form>
                        <div class="accordion" id="divPedidos">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#pedido000010">
                                        <b>Pedido 000010</b>
                                        <span class="mx-1">(realizado em 11/10/2020)</span>
                                    </button>
                                </h2>
                                <div id="pedido000010" class="accordion-collapse collapse" data-bs-parent="#divPedidos">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th class="text-end">R$ Unit.</th>
                                                    <th class="text-center">Qtde.</th>
                                                    <th class="text-end">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Abacate Manteiga</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Banana Prata</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Mamão Papaya</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor dos Produtos:</th>
                                                    <td class="text-end">26,91</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor do Frete:</th>
                                                    <td class="text-end">7,50</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor a Pagar:</th>
                                                    <td class="text-end">34,41</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Forma de Pagamento:</th>
                                                    <td class="text-end">Crédito VISA 1x</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#pedido000009">
                                        <b>Pedido 000009</b>
                                        <span class="mx-1">(realizado em 11/10/2020)</span>
                                    </button>
                                </h2>
                                <div id="pedido000009" class="accordion-collapse collapse" data-bs-parent="#divPedidos">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th class="text-end">R$ Unit.</th>
                                                    <th class="text-center">Qtde.</th>
                                                    <th class="text-end">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Abacate Manteiga</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Banana Prata</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Mamão Papaya</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor dos Produtos:</th>
                                                    <td class="text-end">26,91</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor do Frete:</th>
                                                    <td class="text-end">7,50</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor a Pagar:</th>
                                                    <td class="text-end">34,41</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Forma de Pagamento:</th>
                                                    <td class="text-end">Crédito VISA 1x</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#pedido000008">
                                        <b>Pedido 000008</b>
                                        <span class="mx-1">(realizado em 11/10/2020)</span>
                                    </button>
                                </h2>
                                <div id="pedido000008" class="accordion-collapse collapse" data-bs-parent="#divPedidos">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th class="text-end">R$ Unit.</th>
                                                    <th class="text-center">Qtde.</th>
                                                    <th class="text-end">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Abacate Manteiga</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Banana Prata</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Mamão Papaya</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor dos Produtos:</th>
                                                    <td class="text-end">26,91</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor do Frete:</th>
                                                    <td class="text-end">7,50</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor a Pagar:</th>
                                                    <td class="text-end">34,41</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Forma de Pagamento:</th>
                                                    <td class="text-end">Crédito VISA 1x</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#pedido000007">
                                        <b>Pedido 000007</b>
                                        <span class="mx-1">(realizado em 11/10/2020)</span>
                                    </button>
                                </h2>
                                <div id="pedido000007" class="accordion-collapse collapse" data-bs-parent="#divPedidos">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th class="text-end">R$ Unit.</th>
                                                    <th class="text-center">Qtde.</th>
                                                    <th class="text-end">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Abacate Manteiga</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Banana Prata</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Mamão Papaya</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor dos Produtos:</th>
                                                    <td class="text-end">26,91</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor do Frete:</th>
                                                    <td class="text-end">7,50</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor a Pagar:</th>
                                                    <td class="text-end">34,41</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Forma de Pagamento:</th>
                                                    <td class="text-end">Crédito VISA 1x</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#pedido000006">
                                        <b>Pedido 000006</b>
                                        <span class="mx-1">(realizado em 11/10/2020)</span>
                                    </button>
                                </h2>
                                <div id="pedido000006" class="accordion-collapse collapse" data-bs-parent="#divPedidos">
                                    <div class="accordion-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Produto</th>
                                                    <th class="text-end">R$ Unit.</th>
                                                    <th class="text-center">Qtde.</th>
                                                    <th class="text-end">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Abacate Manteiga</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Banana Prata</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                                <tr>
                                                    <td>Mamão Papaya</td>
                                                    <td class="text-end">2,99</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-end">8,97</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor dos Produtos:</th>
                                                    <td class="text-end">26,91</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor do Frete:</th>
                                                    <td class="text-end">7,50</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Valor a Pagar:</th>
                                                    <td class="text-end">34,41</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end" colspan="3">Forma de Pagamento:</th>
                                                    <td class="text-end">Crédito VISA 1x</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
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