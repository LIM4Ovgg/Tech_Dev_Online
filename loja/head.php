<?php
if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
$logado = $_SESSION['email'];
$senha = $_SESSION['senha'];

$mysql = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT adm FROM users WHERE email LIKE '$logado' AND senha = $senha"));
$adm = $mysql['adm'];
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="<?= $sistema ?>assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= $sistema ?>assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $sistema ?>assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $sistema ?>assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $sistema ?>assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= $sistema ?>assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $sistema ?>assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="<?= $sistema ?>assets/css/darkmode.css">
    <link rel="stylesheet" href="<?= $sistema ?>vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $sistema ?>assets/css/estilos.css">
    

    <title>Tech Dev Online :: <?php echo $title ?></title>
