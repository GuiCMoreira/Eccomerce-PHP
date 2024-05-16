<?php
$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_SPECIAL_CHARS);
$quantidadeSelecionada = filter_input(INPUT_GET, 'quantidadeSelecionada', FILTER_SANITIZE_SPECIAL_CHARS);

include_once "../script/banco.php";
$bd = conectar();

$sql = "INSERT INTO itemcompra (codigo_prod, quantidade) VALUES ('$id', '$quantidadeSelecionada')";

$bd->beginTransaction();
$i = $bd->exec($sql);
if ($i == 1) {
  $bd->commit();
} else {
  $bd->rollBack();
}

$bd = null;

header("location:produtos.php?codigo_prod=$id");
?>