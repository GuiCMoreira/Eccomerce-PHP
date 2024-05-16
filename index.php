<?php
include_once 'script/banco.php';
$bd = conectar();
$select = "SELECT p.*, i.nome_arquivo FROM produto p LEFT JOIN imagem i on p.codigo_prod = i.codigo_prod GROUP BY p.codigo_prod ORDER BY nome_pro";
$response = $bd->query($select);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecobazar</title>
<link rel="shortcut icon" href="stylesheet/assets/logo_planta.svg" type="image/x-icon">
  <link rel="stylesheet" href="stylesheet/style.css">
  <link rel="shortcut icon" href="../../stylesheet/assets/logo_planta.svg" type="image/x-icon">
</head>

<body>
  <header>
    <div class="Header">
      <div class="Logo">
        <a href="adm/index.php">
          <img src="stylesheet/assets/logo.svg" alt="Ecobazar Logo">
        </a>
      </div>
      <nav class="Menu">
        <ul>
          <li><a href="">Sobre nós</a></li>
          <li><a href="">Contato</a></li>
          <li><a href="pages/carrinho.php">Carrinho</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>

    <div class="Banner">
      <img src="stylesheet/assets/banner2.svg" alt="Ecobazar Banner">
    </div>

  <section class="Products">
      <h2>Nossos Produtos</h2>
      <div class="Product-grid">
        <?php
        while ($produtos = $response->fetch()) {
          if ($produtos['quantidade'] != 0) {
          echo "<div class='Product'>";
          echo "<a href='pages/produtos.php?codigo_prod=" . $produtos['codigo_prod'] . "'>";
          echo "<img src='" . $produtos["nome_arquivo"] . "' alt=''>";
          echo "<p id='nome_pro'>";
          echo $produtos["nome_pro"];
          echo "</p>";  
          echo "<p id='valor'>";
          echo "R$" . $produtos["valor_unitario"];
          echo "</p>";
          echo "<br>";
          echo "</a>";
          echo "</div>";
          }
        }
        $response = null;
        $bd = null;
        ?>
      </div>
    </section>


    <div class="Banner">
      <img src="stylesheet/assets/banner3.svg" alt="Ecobazar Banner">
    </div>
  </main>

  <footer>
    <div class="Footer">
    </div>
    <div class="Footer">
      <div class="Logo">
        <a href="index.php">
          <img src="stylesheet/assets/logo2.svg" alt="Ecobazar Logo">
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
