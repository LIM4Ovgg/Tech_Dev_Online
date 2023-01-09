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
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $sqlUpdate = "UPDATE users SET email='$email',telefone='$telefone' WHERE id=$id";

    $result = $conexao->query($sqlUpdate);

    header('Location: contatos.php');
} else {
    header('Location: ../login.php');
}
