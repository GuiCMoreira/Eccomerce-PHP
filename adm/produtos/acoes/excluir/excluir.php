<?php
$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_STRING);

include_once "../../../../script/banco.php";
$bd = conectar();

$imgsql = "DELETE FROM imagem WHERE imagem.codigo_prod = $id";
$bd->exec($imgsql);

$prodsql = "DELETE FROM produto WHERE produto.codigo_prod = $id";
$bd->exec($prodsql);

$bd = null;

header("location:../../produto.php");
?>