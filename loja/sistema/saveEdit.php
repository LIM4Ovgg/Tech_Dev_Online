<?php

    include_once('../config.php');

    if(isset($_POST['update']))
    {
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
            $senha = $_POST['senha'];
            $confirm_senha = $_POST['confirm_senha'];
        
        $sqlUpdate = "UPDATE users SET nome='$nome',cpf='$cpf',data_nasc='$data_nasc',email='$email',telefone='$telefone',cep='$cep',numero='$numero',complemento='$complemento',referencia='$referencia',senha='$senha' WHERE id=$id";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: usuarios.php');
?>