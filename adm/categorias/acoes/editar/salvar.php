<?php
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

include_once "../../../../script/banco.php";
$bd = conectar();

$sql = "UPDATE categoria SET nome = '$nome',
id = '$id'
 WHERE id = '$id'";

$bd->beginTransaction();
$i = $bd->exec($sql);
if ($i == 1) {
  $bd->commit();
} else {
  $bd->rollBack();
}

$bd = null;

header("location:../../categoria.php");
?>