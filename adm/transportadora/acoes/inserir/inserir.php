<?php
$cpf_cnpj_trans = filter_input(INPUT_POST, 'cpf_cnpj_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_trans = filter_input(INPUT_POST, 'nome_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco_trans = filter_input(INPUT_POST, 'endereco_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$numero_trans = filter_input(INPUT_POST, 'numero_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$bairro_trans = filter_input(INPUT_POST, 'bairro_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_trans = filter_input(INPUT_POST, 'cidade_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$estado_trans = filter_input(INPUT_POST, 'estado_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$cep_trans = filter_input(INPUT_POST, 'cep_trans', FILTER_SANITIZE_SPECIAL_CHARS);

include_once "../../../../script/banco.php";
include_once "../../../../script/erros.php";
$bd = conectar();

$sql = " INSERT INTO transportadora"
  . " (cpf_cnpj_trans, nome_trans, endereco_trans, numero_trans, bairro_trans, cidade_trans, estado_trans, cep_trans)"
  . " VALUES ('$cpf_cnpj_trans', '$nome_trans', '$endereco_trans', '$numero_trans', '$bairro_trans', '$cidade_trans', '$estado_trans', '$cep_trans')";


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
  header("location:novo.php?cpf_cnpj_trans=$cpf_cnpj_trans& "
    . " nome_trans=$nome_trans&numero_trans=$numero_trans&endereco_trans=$endereco_trans&cidade_trans=$cidade_trans&bairro_trans=$bairro_trans&estado_trans=$estado_trans&cep_trans=$cep_trans&erro=$erro");
  die();
}

$bd = null;

header("location:../../transportadora.php");
?>