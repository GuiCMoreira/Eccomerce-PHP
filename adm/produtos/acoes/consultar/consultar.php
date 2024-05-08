<?php
include_once '../../../../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_STRING);

$select = "SELECT * FROM produto where codigo_prod = :id";
$stmt = $bd->prepare($select);
$stmt->execute([':id' => $id]);
$produto = $stmt->fetch();

$selectimg = "SELECT * FROM imagem where codigo_prod = :id";
$stmt = $bd->prepare($selectimg);
$stmt->execute([':id' => $id]);
$imagem = $stmt->fetch();

if ($produto === false && $imagem === false) {
  $bd = null;
  header("location:index.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
  <title>Consultar</title>
</head>

<body>
  <a href="../../produto.php"><button class="btn_voltar">Voltar</button></a>
  <form action="">
    <div>
      <h3>ID: </h3>
      <p><?= $produto['codigo_prod']; ?></p>
    </div>
    <div>
      <h3>Produto: </h3>
      <p><?= $produto['nome_pro'] ?></p>
    </div>
    <div>
      <h3>Descrição: </h3>
      <p><?= $produto['descricao'] ?></p>
    </div>
    <div>
      <h3>Valor unitário: </h3>
      <p><?= $produto['valor_unitario'] ?></p>
    </div>
    <div>
      <h3>Quantidade: </h3>
      <p><?= $produto['quantidade'] ?></p>
    </div>
    <div>
      <h3>Peso: </h3>
      <p><?= $produto['peso'] ?></p>
    </div>
    <div>
      <h3>Dimensões: </h3>
      <p><?= $produto["dimensoes"] ?></p>
    </div>
    <div>
      <h3>Unidade venda: </h3>
      <p><?= $produto["unidade_venda"] ?></p>
    </div>
    <div>
      <h3>ID categoria: </h3>
      <p><?= $produto["id_categoria"] ?></p>
    </div>
    <div>
      <h3>Imagem: </h3>
      <img src="<?= $imagem["nome_arquivo"] ?>" alt="Imagem">
    </div>
  </form>

</body>

</html>