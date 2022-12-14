<?php
$select_rows = mysqli_query($conexao, "SELECT * FROM `cart`");
$row_count = mysqli_num_rows($select_rows);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger border-bottom shadow-sm mb-3">
    <div class="container">
        <a class="navbar-brand" href="<?php echo $sistema ?>index.php"><b>Tech Dev Online</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav flex-grow-1">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo $sistema ?>sistema.php">Sistema</a>
                </li>
            </ul>
            <div class="align-self-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="<?php echo $sistema ?>cliente.php" class="nav-link text-white">
                            <?php
                            echo "Logado como <b>$logado</b>";
                            ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $sistema ?>sair.php" class="nav-link text-white">Sair</a>
                    </li>
                    <li class="nav-item">
                        <span class="badge rounded-pill bg-light text-danger position-absolute ms-4 mt-0" title="<?php echo $row_count ?> produto(s) no carrinho"><small><?php echo $row_count ?></small></span>
                        <a href="<?php echo $sistema ?>carrinho.php" class="nav-link text-white">
                            <i class="bi-cart" style="font-size:24px;line-height:24px;"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="darkBtn nav-item">
                <input name="theme" type="checkbox" class="checkbox toggle-dark-mode" id="chk" />
                <label class="label" for="chk">
                    <div class="ball"></div>
                </label>
            </div>
        </div>
    </div>
</nav>