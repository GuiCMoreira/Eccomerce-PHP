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
  <link rel="stylesheet" href="../styles/style.css">
  <title>Consultar</title>
</head>

<body>
  <a href="../../transportadora.php"><button class="btn_voltar">Voltar</button></a>
  <form action="">
    <div>
      <h3>ID: </h3>
      <p><?= $transportadora['cpf_cnpj_trans']; ?></p>
    </div>
    <div>
      <h3>Transportadora: </h3>
      <p><?= $transportadora['nome_trans'] ?></p>
    </div>
    <div>
      <h3>Endereço: </h3>
      <p><?= $transportadora['endereco_trans'] ?></p>
    </div>
    <div>
      <h3>Número: </h3>
      <p><?= $transportadora['numero_trans'] ?></p>
    </div>
    <div>
      <h3>Bairro: </h3>
      <p><?= $transportadora['bairro_trans'] ?></p>
    </div>
    <div>
      <h3>Cidade: </h3>
      <p><?= $transportadora['cidade_trans'] ?></p>
    </div>
    <div>
      <h3>Estado: </h3>
      <p><?= $transportadora["estado_trans"] ?></p>
    </div>
    <div>
      <h3>CEP: </h3>
      <p><?= $transportadora["cep_trans"] ?></p>
    </div>
  </form>

</body>

</html>