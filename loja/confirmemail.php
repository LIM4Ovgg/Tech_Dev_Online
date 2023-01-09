<?php
session_start();
include_once('config.php');
$sistema = '';

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $emailmysqli = mysqli_query($conexao, "SELECT email FROM `users` WHERE email = '$email'");
    if (mysqli_num_rows($emailmysqli) > 0) {

    } else {
        header("location: recuperarsenha.php?erro=513");
    }
} else {
    header("Location: recuperarsenha.php");
}
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Confirmação de email';
require_once('head.php');
?>
</head>

<body>
    <script>
        function sendData(path, parameters, method = 'POST') {

            const form = document.createElement('form');
            form.method = method;
            form.action = path;
            document.body.appendChild(form);

            for (const key in parameters) {
                const formField = document.createElement('input');
                formField.type = 'hidden';
                formField.name = key;
                formField.value = parameters[key];

                form.appendChild(formField);
            }
            form.submit();
        }
    </script>
    <?php
    if (isset($_POST['email'])) {
        echo "<script>sendData('confirmrecupsenha.php', {email: '$email'});</script>";
    }
    ?>
</body>

</html>