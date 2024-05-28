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
  <link rel="stylesheet" href="../../../../stylesheet/adm.css">
  <title>Cadastrar Vendedor</title>
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

  <a href="../../vendedor.php"><button class="btn_voltar">Voltar</button></a>
  <br>

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
      <br>

      <input type="submit" value="Salvar">

  </form>


</body>

</html>