<?php
include_once '../../../../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'cpf_cnpj_trans', FILTER_SANITIZE_STRING);
$select = "SELECT * FROM transportadora where cpf_cnpj_trans = '$id'";
$response = $bd->query($select);

if ($response->rowCount() == 0) {
  $bd = null;
  header("location:index.php");
  die();
}
$transportadora = $response->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../../stylesheet/adm.css">

  <title>Editar Transportadoras</title>
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
  <a href="../../transportadora.php"><button class="btn_voltar">Voltar</button></a>
  <br>
  <form action="salvar.php" method="POST">
    <div>
      <label>ID: </label>
      <input type="text" name="cpf_cnpj_trans" readonly value="<?= $transportadora['cpf_cnpj_trans']; ?>">
      <br>
      <label>Transportadora: </label>
      <input type="text" name="nome_trans" value="<?= $transportadora['nome_trans'] ?>">
      <br>
      <label>Endereço: </label>
      <input type="text" name="endereco_trans" value="<?= $transportadora['endereco_trans'] ?>">
      <br>
      <label>Número: </label>
      <input type="text" name="numero_trans" value="<?= $transportadora['numero_trans'] ?>">
      <br>
      <label>Bairro: </label>
      <input type="text" name="bairro_trans" value="<?= $transportadora['bairro_trans'] ?>">
      <br>
      <label>Cidade: </label>
      <input type="text" name="cidade_trans" value="<?= $transportadora['cidade_trans'] ?>">
      <br>
      <label>Estado: </label>
      <input type="text" name="estado_trans" value="<?= $transportadora['estado_trans'] ?>">
      <br>
      <label>CEP: </label>
      <input type="text" name="cep_trans" value="<?= $transportadora['cep_trans'] ?>">
    </div>
    <br>
    <input type="submit" value="Salvar">
  </form>
</body>

</html>