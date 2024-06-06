<?php
session_start();

if (isset($_GET['produto_id'])) {
  $produto_id = $_GET['produto_id'];

  if (isset($_SESSION['carrinho_serializado'])) {
    $carrinho = unserialize($_SESSION['carrinho_serializado']);

    foreach ($carrinho as $key => $item) {
      if ($item[4] == $produto_id) { // Assumindo que $item[4] é o ID do produto
        unset($carrinho[$key]);
        break;
      }
    }

    // Reindexa o array para garantir que as chaves estejam sequenciais
    $carrinho = array_values($carrinho);
    $_SESSION['carrinho_serializado'] = serialize($carrinho);
  }
}

header('Location: ../pages/carrinho.php');
exit;
?>