<?php
session_start();
$sistema = '../';
require_once('../logado.php');
include_once('../config.php');

if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: ../login.php');
}

$email = $_SESSION['email'];

$sqlSelect = "SELECT * FROM users WHERE email LIKE '$email'";

$result = $conexao->query($sqlSelect);

if ($result->num_rows > 0) {
    while ($user_data = mysqli_fetch_assoc($result)) {
        $id = $user_data['id'];
        $cep = $user_data['cep'];
        $numero = $user_data['numero'];
        $complemento = $user_data['complemento'];
        $referencia = $user_data['referencia'];
    }
} else {
    header('Location: ../login.php');
}

?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Area do Cliente :: Endereco';
require_once('../head.php');
?>
<style>
    .rows {
        display: flex;
        flex-wrap: nowrap;
    }

    .controle {
        width: initial;
    }

    .padd {
        padding-right: 1rem;
    }
</style>
</head>

<body onload="onLoad()">
    <div class="d-flex flex-column wrapper">
        <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm == true) {
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
                <h1>Minha Conta</h1>
                <div class="row gx-3">
                    <?php
                    $dados = '';
                    $contatos = '';
                    $endereco = 'bg-info text-light';
                    $pedidos = '';
                    $favoritos = '';
                    $alterar = '';
                    $cliente = '';
                    require_once('../cliente_barra.php');
                    ?>
                    <div class="col-8">
                        <form action="saveEndereco.php" method="POST">
                            <div class="rows">
                                <div class="padd">
                                    <div class="form-floating mb-3 col-md-6 col-lg-4">
                                        <input class="form-control controle" type="text" id="txtCEP" name="cep" placeholder=" " minlength="8" value="<?= $cep ?>" required/>
                                        <label for="txtCEP">CEP</label>
                                    </div>
                                    <div class="form-floating mb-3 col-md-4">
                                        <input class="form-control controle" type="text" id="txtNumero" name="numero" placeholder=" " value="<?= $numero ?>" required/>
                                        <label for="txtNumero">Número</label>
                                    </div>
                                </div>
                                <div class="form-floating col-md-6 col-lg-8">
                                    <div id="result" class="result">
                                        <textarea class="form-control text-muted bg-light" style="height: 58px; font-size: 14px;" disabled>Digite o CEP para buscarmos o endereço.</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3 col-md-8">
                                <input class="form-control" type="text" id="txtComplemento" name="complemento" placeholder=" " value="<?= $complemento ?>"/>
                                <label for="txtComplemento">Complemento</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" id="txtReferencia" name="referencia" placeholder=" " value="<?= $referencia ?>"/>
                                <label for="txtReferencia">Ponto de Referência</label>
                            </div>
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input class="btn btn-lg btn-info text-white" type="submit" name="update" value="Salvar dados">
                        </form>
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
    <script>
        var el = document.getElementById('txtCEP');
        var divResult = document.getElementById('result')

        el.addEventListener("keyup", get, true);


        function get() {
            get_endereco(this.value);
        }

        function get_endereco(cep) {
            if (cep.length == 0) {
                divResult.innerHTML = '<textarea class="form-control text-muted bg-light" style="height: 58px; font-size: 14px;" disabled>Digite o CEP para buscarmos o endereço.</textarea>';
            } else {
                var url = '../maps.php';
                var cepArray = {
                    "cep": cep
                };

                $.ajax({
                    type: "POST",
                    url: url,
                    data: cepArray,
                    dataType: "text",
                    success: function(result) {
                        $(".result").html(result)
                    }
                });
            }

        }

        function onLoad() {
            var cep = el.value;
            var url = '../maps.php';
            var cepArray = {
                "cep": cep
            };

            $.ajax({
                type: "POST",
                url: url,
                data: cepArray,
                dataType: "text",
                success: function(result) {
                    $(".result").html(result)
                }
            });
        }
    </script>
    <script src="../assets/js/darkmode.js"></script>
    <script src="../vendor/jquery/jquery.js"></script>
    <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>