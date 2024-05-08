<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

include_once "../../../../script/banco.php";
$bd = conectar();

$sql = "DELETE FROM categoria WHERE categoria.id = $id";
$bd->exec($sql);

$bd = null;

header("location:../../categoria.php");
?>