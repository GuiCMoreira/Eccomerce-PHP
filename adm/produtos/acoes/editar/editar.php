<?php
include_once '../../../../script/banco.php';
include_once '../../../../script/geral.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_STRING);

$select = "SELECT * FROM produto where codigo_prod = '$id'";
$selectCategoria = "SELECT * FROM categoria";

$response = $bd->query($select);
$responseCategoria = $bd->query($selectCategoria);

if ($response->rowCount() == 0) {
    $bd = null;
    header("location:index.php");
    die();
}
$produtos = $response->fetch();
$categoria = $responseCategoria->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../stylesheet/adm.css">

    <title>Editar Produtos</title>
    <link rel="shortcut icon" href="../../../../stylesheet/assets/logo_planta.svg" type="image/x-icon">
</head>

<body>
    <header>
        <br>
        <div class="Header">
            <div class="Logo">
                <a href="../../../../index.php">
                    <img src="../../../../stylesheet/assets/logo.svg" alt="Ecobazar Logo">
                </a>
            </div>
        </div>
        <br>
    </header>
    <a href="../../produto.php"><button class="btn_voltar">Voltar</button></a>
    <br>
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
            <label>Categoria: </label>
            <select name="id_categoria">
                <?php
                ListaSelecao($categoria, ["id", "nome"], $produtos['id_categoria']);
                ?>
            </select>
        </div>
        <br>
        <input type="submit" value="Salvar">
    </form>
</body>

</html>