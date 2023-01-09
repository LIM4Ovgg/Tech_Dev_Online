<?php
session_start();
include_once('config.php');
$sistema = '';
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Acessa
    include_once('config.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sqle = "SELECT * FROM users WHERE email LIKE '$email'";

    $resulte = $conexao->query($sqle);

    // print_r($sql);
    // print_r($result);

    if (mysqli_num_rows($resulte) < 1) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        unset($_SESSION['adm']);
        header("Location: login.php?erro=513");
    } else {
        $sqles = "SELECT * FROM users WHERE email LIKE '$email' and senha = $senha";

        $resultes = $conexao->query($sqles);

        // print_r($sql);
        // print_r($result);

        if (mysqli_num_rows($resultes) < 1) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['adm']);
            header("Location: login.php?erro=530");
        } else {
            $adm = mysqli_fetch_assoc($resultes)['adm'];

            if ($adm == "Yes") {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['adm'] = true;
                header('Location: sistema.php');
            } else {
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $senha;
                $_SESSION['adm'] = false;
                header('Location: index.php');
            }
        }
    }
} else {
    // Não acessa
    header('Location: login.php');
}
?>
