<?php
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true and (!isset($_SESSION['senha'])))) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['adm']);
    header('Location:'.$sistema.'login.php');
}
$logado = $_SESSION['email'];
?>