<?php
session_start();

if (isset($_POST['update']) && !empty($_POST['senha'])) {
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
        $id = $_POST['id'];
        $imagem = $_POST['imagem'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $quantidade = $_POST['quantidade'];
        $descricao = $_POST['descricao'];


        $sqlUpdate = "UPDATE stock SET imagem='$imagem',nome='$nome',valor='$valor',quantidade='$quantidade',descricao='$descricao' WHERE id=$id";

        $result = $conexao->query($sqlUpdate);

        header('Location: estoque.php');
    }
} else {
    // Não acessa
    header('Location: estoque.php');
}
