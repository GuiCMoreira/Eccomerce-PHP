<?php
$codigo_prod = filter_input(INPUT_POST, 'codigo_prod', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_pro = filter_input(INPUT_POST, 'nome_pro', FILTER_SANITIZE_SPECIAL_CHARS);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$valor_unitario = filter_input(INPUT_POST, 'valor_unitario', FILTER_SANITIZE_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS);
$peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_NUMBER_INT);
$dimensoes = filter_input(INPUT_POST, 'dimensoes', FILTER_SANITIZE_SPECIAL_CHARS);
$unidade_venda = filter_input(INPUT_POST, 'unidade_venda', FILTER_SANITIZE_SPECIAL_CHARS);
$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_SPECIAL_CHARS);

include_once "../../../../script/banco.php";
$bd = conectar();

$sql = " INSERT INTO produto"
  . " (codigo_prod, nome_pro, descricao, valor_unitario, quantidade, peso, dimensoes, unidade_venda, id_categoria)"
  . " VALUES ('$codigo_prod', '$nome_pro', '$descricao', '$valor_unitario', '$quantidade', $peso, '$dimensoes', '$unidade_venda', $id_categoria)";

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
  $erro = erros($e->getMessage());
  header("location:novo.php?codigo_prod=$codigo_prod& "
    . " nome_pro=$nome_pro&valor_unitario=$valor_unitario&descricao=$descricao&peso=$peso&quantidade=$quantidade&dimensoes=$dimensoes&unidade_venda=$unidade_venda&id_categoria=$id_categoria&erro=$erro");
  die();
}

$bd = null;

header("location:../../produto.php");
?>