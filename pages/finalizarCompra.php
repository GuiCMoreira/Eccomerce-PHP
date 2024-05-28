<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Billing Information</title>
  <link rel="stylesheet" href="../stylesheet/finalizar.css">
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
    <section class="input-section">

        <div class="container">
            <h2>Informações</h2>
            <form action="#" method="POST">
                    
                    <label for="firstName">CPF:</label>
                    <input type="text" id="firstName" name="firstName" class="input-field">
                    
                    <label for="lastName">Nome:</label>
                    <input type="text" id="lastName" name="lastName" class="input-field">
                    
                    
                    <label for="email">Número:</label>
                    <input type="email" id="email" name="email" class="input-field">
                    
                    
                    <label for="password">Bairro:</label>
                    <input type="password" id="password" name="password" class="input-field">
                    
                    <label for="password">Cidade:</label>
                    <input type="password" id="password" name="password" class="input-field">
                    
                    <label for="password">CEP:</label>
                    <input type="password" id="password" name="password" class="input-field">
                    
                    <label for="password">Estado:</label>
                    <input type="password" id="password" name="password" class="input-field">
                    
                    <label for="password">Endereço:</label>
                    <input type="password" id="password" name="password" class="input-field">
            </section>
        </div>
        
        
        <section class="resumo-pedido">
            <div class="container-pedido">
                <h2 class="titulo-pedido">Resumo do Pedido</h2>
                    <div class="Info">
                        <img class="Image" src="https://via.placeholder.com/60x60" alt="Product Image">
                        <div class="ProductName">Green Capsicum</div>
                        <div class="Quantity">x5</div>
                    <div class="Price">$70.00</div>
                </div>
           
                <div class="metodo-pagamento">
                    <h2 class="titulo-pedido">Selecionar Método de Pagamento</h2>
                    <div class="metodos">
                      <select name="" id=""></select>
                    </div>
                </div>
                <div class="Button">
                    <button type="submit" class="submit-button">Finalizar Compra</button>
                </div>
            </div>
        </form>
        
    </section>
</main>

<footer>
    <div class="Footer">
        </div>
                    <div class="Footer">
                        <div class="Logo">
                            <a href="../index.php">
                                <img src="../stylesheet/assets/logo2.svg" alt="Ecobazar Logo">
                            </a>
                        </div>
                    </div>
                    <div><br></div>
                    <div class="Footer">
                        <nav class="Menu">
                            <span>&copy; 2024 Ecobazar</span>
                        </nav>
                    </div>
                </footer>
            </body>
            </html>
            
