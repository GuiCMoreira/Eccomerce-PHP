<?php
session_start();


include_once '../script/banco.php';
include_once '../script/geral.php';
$bd = conectar();
$select = "SELECT * FROM vendedor";
$response = $bd->query($select);

$vendedor = $response->fetchAll();

$select = "SELECT * FROM transportadora";
$response = $bd->query($select);

$transportadora = $response->fetchAll();
?>

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
        <h2>Dados do Cliente</h2>
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
    </section>
    </div>


    <section class="resumo-pedido">
      <div class="container-pedido">
        <h2 class="titulo-pedido">Resumo do Pedido</h2>
        <?php
        if (isset($_SESSION['carrinho_serializado'])) {
          $carrinho = unserialize($_SESSION['carrinho_serializado']);
          $total = 0;
          foreach ($carrinho as $item) {
            echo "<div class='Info'>";
            echo "<img class='Image' src='$item[3]' alt='Product Image'>";
            echo "<div class='ProductName'>" . $item[1] . "</div>";
            echo "<div class='Quantity'>x" . $item[0] . "</div>";
            echo "<div class='Price'>R$" . $item[2] . "</div>";
            echo "</div>";
            $total = $total + $item[0] * $item[2];
          }
        }
        ?>

        <div class="metodo-pagamento">
          <div>
          </div>
          <h2 class="titulo-pedido">Selecionar Vendedor</h2>
          <div class="metodos">
            <select name="cpf_cnpj_vend">
              <?php
              ListaSelecao($vendedor, ["cpf_cnpj_vend", "nome_vend"]);
              ?>
            </select>
          </div>
        </div>

        <div class="metodo-pagamento">
          <div>
          </div>
          <h2 class="titulo-pedido">Selecionar Transportadora</h2>
          <div class="metodos">
            <select name="cpf_cnpj_trans">
              <?php
              ListaSelecao($transportadora, ["cpf_cnpj_trans", "nome_trans"]);
              ?>
            </select>
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