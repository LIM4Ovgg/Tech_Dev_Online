<?php
$adm = $_SESSION['adm'];
if ($adm == false) {
    echo "<script>window.history.back();</script>";
 }
?>