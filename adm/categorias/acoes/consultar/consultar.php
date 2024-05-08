<?php
include_once '../../../../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$select = "SELECT * FROM categoria where id = '$id'";
$response = $bd->query($select);

if ($response->rowCount() == 0) {
  $bd = null;
  header("location:index.php");
  die();
}
$categoria = $response->fetch();
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
  <a href="../../categoria.php"><button class="btn_voltar">Voltar</button></a>
  <form action="">
    <div>
      <h3>ID: </h3>
      <p><?= $categoria['id']; ?></p>
    </div>
    <div>
      <h3>Categoria: </h3>
      <p><?= $categoria['nome'] ?></p>
    </div>
  </form>

</body>

</html>