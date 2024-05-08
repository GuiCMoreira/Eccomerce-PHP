<?php
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

include_once "../../../../script/banco.php";
$bd = conectar();

$sql = " INSERT INTO categoria"
  . " (id, nome)"
  . " VALUES ('$id', '$nome')";

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
  header("location:novo.php?id=$id& "
    . " nome=$nome&erro=$erro");
  die();
}

$bd = null;

header("location:../../categoria.php");
?>