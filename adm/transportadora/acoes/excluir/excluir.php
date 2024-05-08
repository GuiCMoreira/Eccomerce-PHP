<?php
$id = filter_input(INPUT_GET, 'cpf_cnpj_trans', FILTER_SANITIZE_STRING);

include_once "../../../../script/banco.php";
$bd = conectar();

$sql = "DELETE FROM transportadora WHERE transportadora.cpf_cnpj_trans = $id";
$bd->exec($sql);

$bd = null;

header("location:../../transportadora.php");
?>