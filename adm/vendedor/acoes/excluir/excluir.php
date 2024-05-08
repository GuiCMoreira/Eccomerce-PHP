<?php
$id = filter_input(INPUT_GET, 'cpf_cnpj_vend', FILTER_SANITIZE_STRING);

include_once "../../../../script/banco.php";
$bd = conectar();

$sql = "DELETE FROM vendedor WHERE vendedor.cpf_cnpj_vend = $id";
$bd->exec($sql);

$bd = null;

header("location:../../vendedor.php");
?>