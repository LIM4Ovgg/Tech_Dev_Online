<?php
session_start();
$sistema = '';
require_once('logado.php');
require_once('adm.php');
include_once('config.php');
?>
<!doctype html>
<html lang="pt-br">
<link rel="stylesheet" href="assets/css/sistema.css">
<?php
$title = 'Sistema';
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
                <div class="center">
                    <input type="button" onClick="window.location='sistema/usuarios.php';" class="btn btn-lg btn-danger text-white" value="Usuários">
                    <input type="button" onClick="window.location='sistema/estoque.php';" class="btn btn-lg btn-danger text-white" value="Estoque">
                </div>
            </div>
        </main>

        <?php
        require_once('footer.php');
        ?>
    </div>
    <script src="assets/js/darkmode.js"></script>
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>