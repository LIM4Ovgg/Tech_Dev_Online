<?php
session_start();
$sistema = '../';
require_once('../logado.php');
require_once('../adm.php');
include_once('../config.php');


if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $sql = "SELECT * FROM stock WHERE id LIKE '%$data%' or nome LIKE '%$data%' or valor LIKE '%$data%' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM stock ORDER BY id ASC";
}
$result = $conexao->query($sql);
?>
<!doctype html>
<html lang="pt-br">

<?php
$title = 'Estoques';
require_once('../head.php');
?>
<style>
    .box-search {
        display: flex;
        justify-content: center;
        gap: .1%;
    }

    .over {
        max-width: 20px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
</head>

<body>
    <div class="d-flex flex-column wrapper">

        <?php
        if ((isset($_SESSION['email']) == true) and (isset($_SESSION['senha']) == true)) {
            if ($adm == "Yes") {
                require_once('../header_logado_adm.php');
            } else {
                require_once('../header_logado.php');
            }
        } else {
            require_once('../header.php');
        }
        ?>


        <div class="box-search">
            <input type="search" class="form-control w-25" placeholder="Pesquisar" id='pesquisar'>
            <span class="visually-hidden">pesquisar</span>
            <button onclick="searchData()" class="btn btn-danger" style="color: white;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </div>
        <main class="flex-fill">
            <div class="container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Imagem (URL)</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($user_data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $user_data['id'] . "</td>";
                            echo "<td>" . $user_data['nome'] . "</td>";
                            echo "<td class='over'><a href='" . $user_data['imagem'] . "' target='_blank'>" . $user_data['imagem'] . "</a></td>";
                            echo "<td class='over'>" . $user_data['descricao'] . "</td>";
                            echo "<td>" . $user_data['valor'] . "</td>";
                            echo "<td>" . $user_data['quantidade'] . "</td>";
                            echo "<td>
                                <a class='btn btn-sm btn-primary' href='editStock.php?id=$user_data[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </a>
                                <a class='btn btn-sm btn-danger' href='deleteStock.php?id=$user_data[id]' onclick='return confirm(`Deletar item do estoque?`)'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                    </svg>
                                </a>  
                        </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="container">
                <div class="text-center">
                    <a href="addStock.php" class="btn btn-outline-success btn-lg">
                        Adicionar item no estoque
                    </a>
                </div>
            </div>
        </main>

        <footer class="border-top text-muted bg-light">
            <div class="container">
                <div class="row py-3">
                    <div class="col-12 col-md-4 text-center">
                        &copy; 2020 - Quitanda Online Ltda ME<br>
                        Rua Virtual Inexistente, 171, Compulândia/PC <br>
                        CPNJ 99.999.999/0001-99
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="privacidade.html" class="text-decoration-none text-dark">
                            Política de Privacidade
                        </a><br>
                        <a href="termos.html" class="text-decoration-none text-dark">
                            Termos de Uso
                        </a><br>
                        <a href="quemsomos.html" class="text-decoration-none text-dark">
                            Quem Somos
                        </a><br>
                        <a href="trocas.html" class="text-decoration-none text-dark">
                            Trocas e Devoluções
                        </a>
                    </div>
                    <div class="col-12 col-md-4 text-center">
                        <a href="contato.html" class="text-decoration-none text-dark">
                            Contato pelo Site
                        </a><br>
                        E-mail: <a href="mailto:email@dominio.com" class="text-decoration-none text-dark">
                            email@dominio.com
                        </a><br>
                        Telefone: <a href="phone:28999990000" class="text-decoration-none text-dark">
                            (19) 99999-0000
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        function searchData() {
            window.location = 'estoque.php?search=' + search.value;
        }
    </script>
    <script src="../assets/js/darkmode.js"></script>
    <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.js"></script>
</body>

</html>