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
  <link rel="stylesheet" href="../../../../../../stylesheet/adm.css">
  <title>Adicionar Imagem</title>
<link rel="shortcut icon" href="../../../../../../stylesheet/assets/logo_planta.svg" type="image/x-icon">
</head>

<body>
<header>
<br>
    <div class="Header">
      <div class="Logo">
        <a href="../../../../../../index.php">
            <img src="../../../../../../stylesheet/assets/logo.svg" alt="Ecobazar Logo">
        </a>
      </div>
    </div>
    <br>
  </header>

  <?php
  echo "<p>$erro</p>";
  ?>

  <a href="../../../../produto.php"><button class="btn_voltar">Voltar</button></a>
  <br>

  <form action="inserir.php" method="post">

    <div>
      <label>ID Produto: </label>
      <input type="text" name="codigo_prod" value="<?= $codigo_prod ?>">
    </div>
    <div>
      <label>Link da Imagem: </label>
      <input type="text" name="nome_arquivo" value="<?= $nome_arquivo ?>">
    </div>
    <br>
    <input type="submit" value="Salvar">

  </form>


</body>

</html>