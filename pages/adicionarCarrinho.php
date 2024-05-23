<?php
session_start();
$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_SPECIAL_CHARS);
$quantidadeSelecionada = filter_input(INPUT_GET, 'quantidadeSelecionada', FILTER_SANITIZE_SPECIAL_CHARS);

$_SESSION['carrinho'][$id] = $quantidadeSelecionada;

header("location:produtos.php?codigo_prod=$id");
?>