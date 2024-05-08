<?php
$cpf_cnpj_vend = filter_input(INPUT_POST, 'cpf_cnpj_vend', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_vend = filter_input(INPUT_POST, 'nome_vend', FILTER_SANITIZE_SPECIAL_CHARS);


include_once "../../../../script/banco.php";
include_once "../../../../script/erros.php";
$bd = conectar();



$sql = " INSERT INTO vendedor"
  . " (cpf_cnpj_vend, nome_vend)"
  . " VALUES ('$cpf_cnpj_vend', '$nome_vend')";



$bd->beginTransaction();

try {
  $i = $bd->exec($sql);

  if ($i != 1) {
    $bd->rollBack();
  } else {
    $bd->commit();
  }
} catch (PDOException $e) {
  $bd->rollBack();
  $bd = null;
  $erro = erro_cpf_cnpj($e->getMessage());
  header("location:novo.php?cpf_cnpj_vend=$cpf_cnpj_vend& "
    . "nome_vend=$nome_vend&erro=$erro");
  die();
}

$bd = null;

header("location:../../vendedor.php");
?>