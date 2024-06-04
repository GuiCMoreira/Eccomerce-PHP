<?php
session_start();

$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_SPECIAL_CHARS);

$valor_unitario = filter_input(INPUT_GET, 'valor_unitario', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_arquivo = filter_input(INPUT_GET, 'nome_arquivo', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_pro = filter_input(INPUT_GET, 'nome_pro', FILTER_SANITIZE_SPECIAL_CHARS);
$quantidadeSelecionada = filter_input(INPUT_GET, 'quantidadeSelecionada', FILTER_SANITIZE_SPECIAL_CHARS);

include_once '../script/banco.php';
$bd = conectar();
$select = "SELECT quantidade FROM produto WHERE codigo_prod = :id";
$stmt = $bd->prepare($select);
$stmt->execute([':id' => $id]);
$produto = $stmt->fetch();

$quantidadeDisponivel = $produto['quantidade'];

if (isset($_SESSION['carrinho_serializado'])) {
    $carrinho = unserialize($_SESSION['carrinho_serializado']);
} else {
    $carrinho = array();
}

$totalNoCarrinho = 0;
for ($i = 0; $i < count($carrinho); $i++) {
    if ($carrinho[$i][4] == $id) {
        $totalNoCarrinho += $carrinho[$i][0];
    }
}

if ($totalNoCarrinho + $quantidadeSelecionada > $quantidadeDisponivel) {
    header("location: ../pages/produtos.php?codigo_prod=$id&erro=quantidade_excedida");
    exit();
}

$produtoNoCarrinho = false;
for ($i = 0; $i < count($carrinho); $i++) {
    if ($carrinho[$i][4] == $id) {
        $carrinho[$i][0] += $quantidadeSelecionada;
        $produtoNoCarrinho = true;
        break;
    }
}

if (!$produtoNoCarrinho) {
    $item = array($quantidadeSelecionada, $nome_pro, $valor_unitario, $nome_arquivo, $id);
    array_push($carrinho, $item);
}

$_SESSION['carrinho_serializado'] = serialize($carrinho);

header("location: ../pages/produtos.php?codigo_prod=$id&adicionado=1");
exit();
?>
