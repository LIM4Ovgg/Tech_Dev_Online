<?php
session_start();
$sistema = '../';
require_once('../logado.php');
require_once('../adm.php');
include_once('../config.php');

if (isset($_POST['update']) && !empty($_SESSION['email']) && !empty($_SESSION['senha'])) {
    // Acessa
    include_once('../config.php');
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];

    $sql = "SELECT * FROM users WHERE email = '$email' and senha = '$senha'";

    $result = $conexao->query($sql);
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nasc'];

    $sqlUpdate = "UPDATE users SET nome='$nome',cpf='$cpf',data_nasc='$data_nasc' WHERE id=$id";

    $result = $conexao->query($sqlUpdate);

    header('Location: dados.php');
} else {
    header('Location: ../login.php');
}
?>