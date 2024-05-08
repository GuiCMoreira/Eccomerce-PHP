<?php
$codigo_img = filter_input(INPUT_POST, 'codigo_img', FILTER_SANITIZE_SPECIAL_CHARS);
$codigo_prod = filter_input(INPUT_POST, 'codigo_prod', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_arquivo = filter_input(INPUT_POST, 'nome_arquivo', FILTER_SANITIZE_SPECIAL_CHARS);

include_once "../../../../script/banco.php";
include_once "../../../../script/erros.php";
$bd = conectar();

$sql = " INSERT INTO imagem (codigo_img, codigo_prod, nome_arquivo) VALUES ('$codigo_img', '$codigo_prod', '$nome_arquivo')";

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
  header("location:novo.php?codigo_prod=$codigo_prod&codigo_img=$codigo_img&erro=$erro");
  die();
}

$bd = null;

header("location:../../produto.php");
?>