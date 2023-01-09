<?php
session_start();
$sistema = '../';
require_once('../logado.php');
require_once('../adm.php');
include_once('../config.php');

if (isset($_POST['update']) && !empty($_POST['logado']) && !empty($_POST['senha'])) {
    // Acessa
    include_once('../config.php');
    $email = $_POST['logado'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM users WHERE email = '$email' and senha = '$senha'";

    $result = $conexao->query($sql);

    // print_r($sql);
    // print_r($result);

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nasc'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $referencia = $_POST['referencia'];

    if (mysqli_num_rows($result) < 1) {
        header(sprintf('location: editUser.php?id='.$id.'&erro=530'));
    } else {
        if (isset($_POST['adm'])) {
            $adm = $_POST['adm'];
        } else {
            $adm = 'No';
        }
        $sqlUpdate = "UPDATE users SET nome='$nome',cpf='$cpf',data_nasc='$data_nasc',email='$email',telefone='$telefone',cep='$cep',numero='$numero',complemento='$complemento',referencia='$referencia',adm='$adm' WHERE id=$id";

        $result = $conexao->query($sqlUpdate);

        header('Location: usuarios.php');
    }
} else {
    header('Location: usuarios.php');
}
?>