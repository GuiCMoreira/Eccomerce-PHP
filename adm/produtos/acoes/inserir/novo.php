<!DOCTYPE html>

<?php
include_once '../../../../script/banco.php';
include_once '../../../../script/geral.php';
$bd = conectar();
$select = "SELECT * FROM categoria";
$response = $bd->query($select);

$categoria = $response->fetchAll();

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
  <link rel="stylesheet" href="../../../../stylesheet/adm.css">
  <title>Novo Produto</title>
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

  <?php
  echo "<p>$erro</p>";
  ?>

  <a href="../../produto.php"><button class="btn_voltar">Voltar</button></a>
  <br>

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
      <select name="id_categoria">
        <?php
        ListaSelecao($categoria, ["id", "nome"]);
        ?>
      </select>
    </div>
    <br>
    <input type="submit" value="Salvar">

  </form>


</body>

</html>