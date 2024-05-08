<!DOCTYPE html>

<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$erro = filter_input(INPUT_GET, 'erro', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
  <title>Nova Categoria</title>
</head>

<body>

  <?php
  echo "<p>$erro</p>";
  ?>

  <a href="../../categoria.php"><button class="btn_voltar">Voltar</button></a>

  <form action="inserir.php" method="post">

    <div>
      <label>ID: </label>
      <input type="text" name="id" value="<?= $id ?>">
    </div>
    <div>
      <label>Categoria: </label>
      <input type="text" name="nome" value="<?= $nome ?>">
    </div>

    <input type="submit" value="Salvar">

  </form>


</body>

</html>