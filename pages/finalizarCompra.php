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
            <form action="../script/finalizarCompra.php" method="POST">
                    
                    <label for="cpf_cnpj_cli">CPF:</label>
                    <input type="text" id="cpf_cnpj_cli" name="cpf_cnpj_cli" class="input-field">
                    
                    <label for="nome_cli">Nome:</label>
                    <input type="text" id="nome_cli" name="nome_cli" class="input-field">
                    
                    
                    <label for="numero">Número:</label>
                    <input type="numero" id="numero" name="numero_cli" class="input-field">
                    
                    
                    <label for="bairro_cli">Bairro:</label>
                    <input type="bairro_cli" id="bairro_cli" name="bairro_cli" class="input-field">
                    
                    <label for="cidade_cli">Cidade:</label>
                    <input type="cidade_cli" id="cidade_cli" name="cidade_cli" class="input-field">
                    
                    <label for="cep_cli">CEP:</label>
                    <input type="cep_cli" id="cep_cli" name="cep_cli" class="input-field">
                    
                    <label for="estado_cli">Estado:</label>
                    <input type="estado_cli" id="estado_cli" name="estado_cli" class="input-field">
                    
                    <label for="endereco_cli">Endereço:</label>
                    <input type="endereco_cli" id="endereco_cli" name="endereco_cli" class="input-field">

                    <label for="cpf_cnpj_trans">cpf_cnpj_trans</label>
                  <input type="text" name="cpf_cnpj_trans" id="cpf_cnpj_trans">

                  <label for="cpf_cnpj_vend">cpf_cnpj_vend</label>
                  <input type="text" name="cpf_cnpj_vend" id="cpf_cnpj_vend">
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
            
