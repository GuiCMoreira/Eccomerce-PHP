<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrinho de Compras</title>
  <link rel="shortcut icon" href="../stylesheet/assets/logo_planta.svg" type="image/x-icon">
  <link rel="stylesheet" href="../stylesheet/carrinho.css">
  <link rel="stylesheet" href="../stylesheet/style.css">
</head>

<body>

  <header>

      <div class="Header">
        <div class="Logo">
          <a href="../index.php">
            <img src="../stylesheet/assets/logo.svg" alt="Ecobazar Logo">
          </a>
        </div>
        <nav class="Menu">
          <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="">Sobre nós</a></li>
            <li><a href="">Contato</a></li>
            <li><a href="carrinho.php">Carrinho</a></li>
          </ul>
        </nav>
      </div>
  </header>

  <main>
    <section class="carrinho-item">
      
      <div class="carrinho-container">
  
        <div class="carrinho-items">
          <?php
          if (isset($_SESSION['carrinho_serializado'])) {
            $carrinho = unserialize($_SESSION['carrinho_serializado']);
            $total = 0;
            foreach ($carrinho as $item) {
              echo "<div class='carrinho-item'>";
              echo "<div class='item-image'>";
              echo "<img src='$item[3]' alt='Product Image'>";
              echo "</div>";
              echo "<div class='item-details'>";
              echo "<div class='item-nome'>$item[1]</div>";
              echo "<div class='item-preco'>Preço: R$$item[2]</div>";
              $resultado = $item[0] * $item[2];
              echo "<div class='item-subtotal'>Subtotal: R$$resultado</div>";
              echo "<div class='item-quantidade'>";
              echo "<span id='$item[4]'> Quantidade: $item[0]</span>";
              echo "</div>";
              // Imagem de exclusão
              echo "<div class='item-excluir'>";
              echo "<form action='../script/removerProduto.php' method='GET'>";
              echo "<input type='hidden' name='produto_id' value='$item[4]'>";
              echo "<input type='image' src='../stylesheet/assets/remover.svg' alt='Excluir'>";
              echo "</form>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
              $total = $total + $resultado;
            }
          }
          ?>
    </section>
    
    <section class="total">
      <form action="finalizarCompra.php">
        <div class="carrinho-container-2">
          <div class="carrinho-titulo">Carrinho Total</div>
          <div class="carrinho-summary">
            <div class="carrinho-total">
              <div class="total-label">Total:</div>
              <div class="total-amount">R$<?= isset($total) ? $total : '0.00' ?></div>
            </div>
          </div>
          <input name="finalizarCompra" type="submit" value="Finalizar Compra" class="finalizarCompra">
        </div>
      </section>
    </form>
  </main>
  <br>
  <div class="carrinho-acoes">
    <a href="../index.php">
      <button class="return-to-shop">Voltar a Comprar</button>
    </a>
  </div>
</div>
  </div>
  
  <br>
  <br>
  <br>
  <br>
  
  <footer>
    <div class="Footer">
      </div>
      <div class="Footer">
        <div class="Logo">
          <a href="index.php">
            <img src="../stylesheet/assets/logo2.svg" alt="Ecobazar Logo">
        </a>
      </div>
    </div>
    <div><br></div>
    <div class="Footer">
      <nav class="Menu">
        <spam>&copy; 2024 Ecobazar</spam>
      </nav>
    </div>
  </footer>

</body>

</html>
