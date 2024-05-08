<?php
include_once '../../../../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_STRING);
$select = "SELECT * FROM produto where codigo_prod = '$id'";
$response = $bd->query($select);

if ($response->rowCount() == 0) {
    $bd = null;
    header("location:index.php");
    die();
}
$produtos = $response->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produtos</title>
</head>

<body>
    <a href="../../produto.php"><button>Voltar</button></a>
    <form action="salvar.php" method="POST">
        <div>
            <label>Código Produto</label>
            <input type="text" name="codigo_prod" readonly value="<?= $produtos['codigo_prod']; ?>">
            <br>
            <label>Produto</label>
            <input type="text" name="nome_pro" value="<?= $produtos['nome_pro'] ?>">
            <br>
            <label>Descrição</label>
            <input type="text" name="descricao" value="<?= $produtos['descricao'] ?>">
            <br>
            <label>Valor Unitario</label>
            <input type="number" name="valor_unitario" value="<?= $produtos['valor_unitario'] ?>">
            <br>
            <label>Quantidade</label>
            <input type="number" name="quantidade" value="<?= $produtos['quantidade'] ?>">
            <br>
            <label>Peso</label>
            <input type="number" name="peso" value="<?= $produtos['peso'] ?>">
            <br>
            <label>Dimensões</label>
            <input type="number" name="dimensoes" value="<?= $produtos['dimensoes'] ?>">
            <br>
            <label>Unidade de Venda</label>
            <input type="text" name="unidade_venda" value="<?= $produtos['unidade_venda'] ?>">
            <br>
            <label>Categoria</label>
            <input type="number" name="id_categoria" value="<?= $produtos['id_categoria'] ?>">
        </div>
        <input type="submit" value="Salvar">
    </form>
</body>

</html>