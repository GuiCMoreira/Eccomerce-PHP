<!DOCTYPE html>

<?php
$codigo_prod = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_pro = filter_input(INPUT_GET, 'nome_pro', FILTER_SANITIZE_SPECIAL_CHARS);
$descricao = filter_input(INPUT_GET, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
$valor_unitario = filter_input(INPUT_GET, 'valor_unitario', FILTER_SANITIZE_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_GET, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS);
$peso = filter_input(INPUT_GET, 'peso', FILTER_SANITIZE_NUMBER_INT);
$dimensoes = filter_input(INPUT_GET, 'dimensoes', FILTER_SANITIZE_SPECIAL_CHARS);
$unidade_venda = filter_input(INPUT_GET, 'unidade_venda', FILTER_SANITIZE_SPECIAL_CHARS);
$id_categoria = filter_input(INPUT_GET, 'id_categoria', FILTER_SANITIZE_SPECIAL_CHARS);
$erro = filter_input(INPUT_GET, 'erro', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
  <title>Novo Produto</title>
</head>

<body>

  <?php
  echo "<p>$erro</p>";
  ?>

  <a href="../../produto.php"><button class="btn_voltar">Voltar</button></a>

  <form action="inserir.php" method="post">

    <div>
      <label>ID: </label>
      <input type="text" name="codigo_prod" value="<?= $codigo_prod ?>">
    </div>
    <div>
      <label>Produto: </label>
      <input type="text" name="nome_pro" value="<?= $nome_pro ?>">
    </div>
    <div>
      <label>Descrição: </label>
      <input type="text" name="descricao" value="<?= $descricao ?>">
    </div>
    <div>
      <label>Valor Unitário: </label>
      <input type="number" name="valor_unitario" value="<?= $valor_unitario ?>">
    </div>
    <div>
      <label>Quantidade: </label>
      <input type="number" name="quantidade" value="<?= $quantidade ?>">
    </div>
    <div>
      <label>Peso: </label>
      <input type="number" name="peso" value="<?= $peso ?>">
    </div>
    <div>
      <label>Dimensões: </label>
      <input type="text" name="dimensoes" value="<?= $dimensoes ?>">
    </div>
    <div>
      <label>Unidade Venda: </label>
      <input type="number" name="unidade_venda" value="<?= $unidade_venda ?>">
    </div>
    <div>
      <label>Categoria: </label>
      <input type="number" name="id_categoria" value="<?= $id_categoria ?>">
    </div>
    <input type="submit" value="Salvar">

  </form>


</body>

</html>