<?php
include_once '../../../../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_STRING);

$select = "SELECT * FROM imagem where codigo_prod = :id";
$stmt = $bd->prepare($select);
$stmt->execute([':id' => $id]);
$imagem = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../../stylesheet/adm.css">
  <title>Imagens</title>
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

  <a href="../../produto.php"><button class="btn_voltar">Voltar</button></a>
  <br><br>
  <a href='acoes/inserir/novo.php?codigo_prod=<?= $id ?>'><button>Inserir nova Imagem</button></a>
  <br><br>
  <br><br>

  <?php

  if ($imagem) {
    do {
      echo "<img src='" . $imagem['nome_arquivo'] . "' alt=''>";
      echo " <a href='acoes/excluir/excluir.php?codigo_img=" . $imagem['codigo_img'] . "'><button class='btnexcluir'>Excluir</button></a>";
    } while ($imagem = $stmt->fetch());
  } else {
    echo "Não há imagens do produto.";
  }

  $stmt = null;
  $bd = null;

  ?>

</body>

</html>