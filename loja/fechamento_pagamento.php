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
<style>
    .brand {
        position: absolute;
        align-self: center;
        right: 20px;
        font-size: 24px;
    }

    .amex {
        color: #016FD0
    }

    .visa {
        /*background: #F7B600;*/
        color: #1434CB
    }

    .mastercard {
        background-image: linear-gradient(to right, #EB001B, #F79E1B);
        color: black;
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .size {
        font-size: 24px;
    }

    .red {
        color: red;
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
                <h1>Selecione a Forma de Pagamento</h1>
                <h3 class="mb-4">
                    Selecione a forma de pagamento e clique em <b>Continuar</b> para prosseguir para <b>concluir o
                        pedido</b>.
                </h3>
                <div class="d-flex justify-content-between flex-wrap border rounded-top pt-4 px-3">

                    <div class="mb-4 mx-2 flex-even">
                        <input type="radio" class="btn-check" name="pagamento" autocomplete="off" id="pag1" value="1">
                        <label class="btn btn-outline-info p-4 h-100 w-100" for="pag1">
                            <h3>
                                <b class="text-dark">Cartão de Crédito</b>
                            </h3>
                            <hr>
                            <form action="fechamento_pedido.php" method="POST" id="form1">
                                <div class="form-floating mb-3">
                                    <input type="text" id="txtNome" name="nome" class="form-control" placeholder=" " required>
                                    <label for="txtNome" class="text-black-50">Nome Impresso no Cartão</label>
                                </div>

                                <div class="form-floating mb-3 d-flex">
                                    <input type="text" id="txtNumero" name="numero" class="form-control" minlength="13" maxlength="16" placeholder=" " required>
                                    <label for="txtNumero" class="text-black-50">Número do Cartão </label>
                                    <div class="brand" id="result"><i class="fa fa-credit-card" style="font-size:24px"></i></div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtValidade" name="validade" class="form-control" minlength="7" maxlength="7" onkeyup="mascara(this)" placeholder=" " required>
                                    <label for="txtValidade" class="text-black-50">Validade (mm/aa)</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" id="txtCodigo" name="codigo" minlength="3" maxlength="4" class="form-control" placeholder=" " required>
                                    <label for="txtCodigo" class="text-black-50">Código de Segurança (CVV)</label>
                                </div>

                                <div class="form-floating">
                                    <select id="selParcelas" class="form-select" name="parcelas">
                                        <option value="1" selected>À vista</option>
                                        <option value="2">2 x sem juros</option>
                                        <option value="3">3 x sem juros</option>
                                        <option value="4">4 x sem juros</option>
                                        <option value="5">5 x sem juros</option>
                                        <option value="6">6 x sem juros</option>
                                        <option value="7">7 x sem juros</option>
                                        <option value="8">8 x sem juros</option>
                                        <option value="9">9 x sem juros</option>
                                        <option value="10">10 x sem juros</option>
                                        <option value="11">11 x sem juros</option>
                                        <option value="12">12 x sem juros</option>
                                    </select>
                                    <label for="selParcelas" class="text-black-50">Parcelamento</label>
                                </div>
                            </form>
                        </label>
                    </div>

                    <div class="mb-4 mx-2 flex-even">
                        <input type="radio" class="btn-check" name="pagamento" autocomplete="off" id="pag2" value="2">
                        <label class="btn btn-outline-info p-4 h-50 w-100" for="pag2">
                            <h3>
                                <b class="text-dark">Boleto</b>
                            </h3>
                            <hr>
                            <form action="" id="form2">
                                <h4>Valor da Compra: <b>R$ <?= $_POST['total'] ?></b></h4>
                                <br>
                                <p>
                                    Vencimento em 1 dia útil. A data de entrega será alterada devido ao tempo de processamento do Boleto. Veja mais na próxima página.
                                </p>
                            </form>

                        </label>
                        <input type="radio" class="btn-check" name="pagamento" autocomplete="off" id="pag3" value="3">
                        <label class="btn btn-outline-info p-4 h-50 w-100" for="pag3">
                            <h3>
                                <b class="text-dark">Pix</b>
                            </h3>
                            <hr>
                            <form action="" id="form3">
                                <h4>Valor da Compra: <b>R$ <?= $_POST['total'] ?></b></h4>
                                <br>
                                <p>
                                    O código Pix gerado para o pagamento é válido por 30 minutos após a finalização do pedido.
                                </p>
                            </form>

                        </label>
                    </div>

                </div>

                <div class="text-end border border-top-0 rounded-bottom p-4 pb-0">
                    <a href="fechamento_endereco.php" class="btn btn-outline-info btn-lg mb-4">
                        Voltar aos Endereços
                    </a>
                    <button type="submit" id="submit" class="btn btn-success btn-lg ms-2 mb-4" disabled>Finalizar</button>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="assets/js/brand.js"></script>
    <script>
        $(document).ready(function() {

            $(document.querySelector("pagamento")).click(function() {
                if ($("#pag1").is(":checked") || $("#pag2").is(":checked") || $("#pag3").is(":checked")) {
                    $("#submit").removeAttr("disabled");
                }
            })
            if ($("#pag2").is(":checked") || $("#pag3").is(":checked")) {
                $("#txtNome").removeAttr("required");
            } else {
                $("#txtNome").attr("required");
            }
        });
    </script>
    <script>
        var form1 = document.getElementById("form1");
        var radio1 = document.getElementById("pag1").checked;
        var form2 = document.getElementById("form2");
        var radio2 = document.getElementById("pag2").checked;
        var form3 = document.getElementById("form3");
        var radio3 = document.getElementById("pag3").checked;
        var submit = document.getElementById("submit");

        var rad = document.getElementsByName("pagamento");
        var prev = null;
        for (var i = 0; i < rad.length; i++) {
            rad[i].addEventListener('change', function() {
                if (this !== prev) {
                    prev = this;
                }
                console.log(this.value)
                if (this.value == 1) {
                    submit.addEventListener("click", function() {
                        form1.submit();
                    });
                } else if ((this.value == 2)) {
                    submit.addEventListener("click", function() {
                        form2.submit();
                    });
                } else if (this.value == 3) {
                    submit.addEventListener("click", function() {
                        form3.submit();
                    });
                }
            });
        }
    </script>
    <script src="assets/js/validade.js"></script>
    <script src="assets/js/darkmode.js"></script>
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>