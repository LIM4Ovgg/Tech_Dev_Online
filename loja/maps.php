<?php
if (isset($_POST["cep"])) {
    $cep = $_POST["cep"];
    $cepCorrect = preg_replace("/[^0-9]/", "", $cep);
    $maps = "https://www.google.com.br/maps?q=' . $cepCorrect . ',%20Brasil&output=embed" ?>


    <iframe id='iframeCep' src="<?= $maps ?>" width='100%' height='100%' style='border:0;' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>


<?php }; ?>