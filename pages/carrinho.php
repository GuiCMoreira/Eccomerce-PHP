<?php

session_start();

if (isset($_SESSION['carrinho_serializado'])) {
      $carrinho = unserialize($_SESSION['carrinho_serializado']);
  foreach ($carrinho as $item) {
      echo $item[0] . ' ' . $item[1] . ' ' . $item[2] . ' ' . $item[3] . '<br>';
  }
}

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
    <section class="itens_carrinho">

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
      <div class="carrinho-container">
        <div class="carrinho-header">
          <div class="carrinho-titulo">Produto</div>
          <div class="carrinho-titulo">Preço</div>
          <div class="carrinho-titulo">Subtotal</div>
          <div class="carrinho-titulo">Quantidade</div>
          
        </div>
        <div class="carrinho-items">
          <div class="carrinho-item">
            <div class="item-image">
               <img src="https://via.placeholder.com/100x100" alt="Product Image">
            </div>
            <div class="item-details">
              <div class="item-nome">Green Capsicum</div>
              <div class="item-preco">$14.00</div>
              <div class="item-subtotal">$70.00</div>
              <div class="item-quantidade">
                <button>-</button>
                <span>5</span>
                <button>+</button>
              </div>
            </div>
          </div>
        </div>
        <div class="carrinho-acoes">
          <button class="return-to-shop">Voltar a Comprar</button>
        </div>
      </div>
    </section>

    <section class="total">
      <div class="carrinho-container-2">
        <div class="carrinho-titulo">Cart Total</div>
        <div class="carrinho-summary">
          <div class="carrinho-subtotal">
            <div class="subtotal-label">Subtotal:</div>
            <div class="subtotal-amount">$84.00</div>
          </div>
          <div class="carrinho-total">
            <div class="total-label">Total:</div>
            <div class="total-amount">$84.00</div>
          </div>
        </div>
        <div class="checkout-button">
          <button>Proceed to Checkout</button>
        </div>
      </div>
    </section>
    </main>

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
