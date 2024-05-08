<?php
$id = filter_input(INPUT_GET, 'codigo_img', FILTER_SANITIZE_STRING);

include_once "../../../../../../script/banco.php";
$bd = conectar();

$sql = "DELETE FROM imagem WHERE codigo_img = $id";
$bd->exec($sql);

$bd = null;

header("location:../../../../produto.php");
?>