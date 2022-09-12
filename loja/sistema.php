<?php
session_start();
include_once('config.php');
// print_r($_SESSION);
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$logado = $_SESSION['email'];
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

    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/estilos.css">

    <title>Tech Dev Online :: Página Principal</title>
    <style>
        body {
            background: linear-gradient(63.13deg, #5bc0de 30%, #FFF 30%, #FFF 70%, #5bc0de 70%);
        }

        .flex-fill {
            display: flex;
            align-items: center;
        }

        .center {
            display: flex;
            justify-content: center;
            gap: 10%;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column wrapper">
        <?php
        $sistema = '' ;
        require_once('header_logado.php');
        ?>

        <main class="flex-fill">
            <div class="container">
                <div class="center">
                    <input type="button" onClick="window.location='sistema/usuarios.php';" class="btn btn-lg btn-info text-white" value="Usuários">
                    <input type="button" onClick="window.location='sistema/estoque.php';" class="btn btn-lg btn-info text-white" value="Estoque">
                </div>
            </div>
        </main>

        <?php
        require_once('footer.php');
        ?>
    </div>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>