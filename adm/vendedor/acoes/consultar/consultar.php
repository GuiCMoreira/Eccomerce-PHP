<?php
include_once '../../../../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'cpf_cnpj_vend', FILTER_SANITIZE_STRING);
$select = "SELECT * FROM vendedor where cpf_cnpj_vend = '$id'";
$response = $bd->query($select);

if ($response->rowCount() == 0) {
  $bd = null;
  header("location:index.php");
  die();
}
$vendedores = $response->fetch();
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
  <a href="../../vendedor.php"><button class="btn_voltar">Voltar</button></a>
  <form action="">
    <div>
      <h3>CPF/CNPJ Vendedor: </h3>
      <p><?= $vendedores['cpf_cnpj_vend']; ?></p>
    </div>
    <div>
      <h3>Produto: </h3>
      <p><?= $vendedores['nome_vend'] ?></p>
    </div>
   
 
  </form>

</body>

</html>