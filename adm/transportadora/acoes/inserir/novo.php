<!DOCTYPE html>

<?php
$cpf_cnpj_trans = filter_input(INPUT_POST, 'cpf_cnpj_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_trans = filter_input(INPUT_POST, 'nome_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco_trans = filter_input(INPUT_POST, 'endereco_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$numero_trans = filter_input(INPUT_POST, 'numero_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$bairro_trans = filter_input(INPUT_POST, 'bairro_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_trans = filter_input(INPUT_POST, 'cidade_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$estado_trans = filter_input(INPUT_POST, 'estado_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$cep_trans = filter_input(INPUT_POST, 'cep_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$erro = filter_input(INPUT_GET, 'erro', FILTER_SANITIZE_SPECIAL_CHARS);
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/style.css">
  <title>Nova Transportadora</title>
</head>

<body>

  <?php
  echo "<p>$erro</p>";
  ?>

  <a href="../../transportadora.php"><button class="btn_voltar">Voltar</button></a>

  <form action="inserir.php" method="post">

    <div>
      <label>ID: </label>
      <input type="text" name="cpf_cnpj_trans" value="<?= $cpf_cnpj_trans ?>">
    </div>
    <div>
      <label>Transportadora: </label>
      <input type="text" name="nome_trans" value="<?= $nome_trans ?>">
    </div>
    <div>
      <label>Endereço: </label>
      <input type="text" name="endereco_trans" value="<?= $endereco_trans ?>">
    </div>
    <div>
      <label>Número: </label>
      <input type="text" name="numero_trans" value="<?= $numero_trans ?>">
    </div>
    <div>
      <label>Bairro: </label>
      <input type="text" name="bairro_trans" value="<?= $bairro_trans ?>">
    </div>
    <div>
      <label>Cidade: </label>
      <input type="text" name="cidade_trans" value="<?= $cidade_trans ?>">
    </div>
    <div>
      <label>Estado: </label>
      <input type="text" name="estado_trans" value="<?= $estado_trans ?>">
    </div>
    <div>
      <label>CEP: </label>
      <input type="text" name="cep_trans" value="<?= $cep_trans ?>">
    </div>
    <input type="submit" value="Salvar">

  </form>


</body>

</html>