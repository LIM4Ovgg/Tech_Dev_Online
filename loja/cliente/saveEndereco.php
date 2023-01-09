<?php
session_start();
$sistema = '../';
require_once('../logado.php');
require_once('../adm.php');
include_once('../config.php');

if (isset($_POST['update']) && !empty($_SESSION['email']) && !empty($_SESSION['senha'])) {
    // Acessa
    include_once('../config.php');
    $emailS = $_SESSION['email'];
    $senha = $_SESSION['senha'];

    $sql = "SELECT * FROM users WHERE email = '$emailS' and senha = '$senha'";

    $result = $conexao->query($sql);

    $id = $_POST['id'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $referencia = $_POST['referencia'];

    $sqlUpdate = "UPDATE users SET cep='$cep',numero='$numero',complemento='$complemento',referencia='$referencia' WHERE id=$id";

    $result = $conexao->query($sqlUpdate);

    header('Location: endereco.php');
} else {
    header('Location: ../login.php');
}
