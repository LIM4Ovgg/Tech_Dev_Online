<?php
session_start();
$sistema = '../';
require_once('../logado.php');
require_once('../adm.php');

if (isset($_POST['add']) && !empty($_POST['senha'])) {
    // Acessa
    include_once('../config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM users WHERE email = '$email' and senha = '$senha'";

    $result = $conexao->query($sql);

    // print_r($sql);
    // print_r($result);

    if (mysqli_num_rows($result) < 1) {

        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
    } else {
        $imagem = $_POST['imagem'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $quantidade = $_POST['quantidade'];
        $descricao = $_POST['descricao'];

        $sqlUpdate = "INSERT iNTO stock (nome, valor, imagem, descricao, quantidade) VALUES('$nome','$valor','$imagem','$descricao','$quantidade')";

        $result = $conexao->query($sqlUpdate);

        header('Location: estoque.php');
    }
} else {
    // Não acessa
    header('Location: estoque.php');
}