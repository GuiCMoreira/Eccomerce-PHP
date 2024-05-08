<?php
$cpf_cnpj_vend = filter_input(INPUT_POST, 'cpf_cnpj_vend', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_vend = filter_input(INPUT_POST, 'nome_vend', FILTER_SANITIZE_SPECIAL_CHARS);


include_once "../../../../script/banco.php";
$bd = conectar();

$sql = "UPDATE vendedor SET nome_vend = '$nome_vend' WHERE cpf_cnpj_vend = '$cpf_cnpj_vend'";

$bd->beginTransaction();
$i = $bd->exec($sql);
if ($i == 1) {
  $bd->commit();
} else {
  $bd->rollBack();
}

$bd = null;

header("location:../../vendedor.php");
?>