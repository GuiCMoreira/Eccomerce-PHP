<!DOCTYPE html>

<?php
$cpf_cnpj_vend = filter_input(INPUT_GET, 'cpf_cnpj_vend', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_vend = filter_input(INPUT_GET, 'nome_vend', FILTER_SANITIZE_SPECIAL_CHARS);
$erro = filter_input(INPUT_GET, 'erro', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
  <title>Cadastrar Vendedor</title>
</head>

<body>

  <?php
  echo "<p>$erro</p>";
  ?>

  <a href="../../vendedor.php"><button class="btn_voltar">Voltar</button></a>

  <form action="inserir.php" method="post">

    <div>
      <label>CPF / CNPJ Vendedor: </label>
      <input type="text" name="cpf_cnpj_vend" value="<?= $cpf_cnpj_vend ?>">
    </div>
    <div>
      <label>Vendedor: </label>
      <input type="text" name="nome_vend" value="<?= $nome_vend ?>">
    </div>
    <div>

    <input type="submit" value="Salvar">

  </form>


</body>

</html>