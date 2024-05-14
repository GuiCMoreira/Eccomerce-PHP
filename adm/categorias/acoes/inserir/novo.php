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
  <link rel="stylesheet" href="../../../../stylesheet/adm.css">
  <title>Nova Categoria</title>
<link rel="shortcut icon" href="../../../../stylesheet/assets/logo_planta.svg" type="image/x-icon">
</head>

<body>


  <a href="../../categoria.php"><button class="btn_voltar">Voltar</button></a>

  <form action="inserir.php" method="post">

    <div>
      <label>Categoria: </label>
      <input type="text" name="nome" value="<?= $nome ?>">
    </div>

    <input type="submit" value="Salvar">

  </form>

  <?php
  echo "<p>$erro</p>";
  ?>

</body>

</html>