<!DOCTYPE html>

<?php
$codigo_img = filter_input(INPUT_GET, 'codigo_img', FILTER_SANITIZE_SPECIAL_CHARS);
$codigo_prod = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_arquivo = filter_input(INPUT_GET, 'nome_arquivo', FILTER_SANITIZE_SPECIAL_CHARS);
$erro = filter_input(INPUT_GET, 'erro', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
  <title>Adicionar Imagem</title>
</head>

<body>

  <?php
  echo "<p>$erro</p>";
  ?>

  <a href="../../produto.php"><button class="btn_voltar">Voltar</button></a>

  <form action="inserir.php" method="post">

    <div>
      <label>ID Produto: </label>
      <input type="text" name="codigo_prod" value="<?= $codigo_prod ?>">
    </div>
    <div>
      <label>ID Imagem: </label>
      <input type="text" name="codigo_img" value="<?= $codigo_img ?>">
    </div>
    <div>
      <label>Link da Imagem: </label>
      <input type="text" name="nome_arquivo" value="<?= $nome_arquivo ?>">
    </div>
    <input type="submit" value="Salvar">

  </form>


</body>

</html>