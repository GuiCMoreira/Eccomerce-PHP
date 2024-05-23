<?php
include_once '../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_STRING);

$selectRecomendados = "SELECT p.*, i.nome_arquivo FROM produto p LEFT JOIN imagem i on p.codigo_prod = i.codigo_prod GROUP BY p.codigo_prod ORDER BY nome_pro";
$response = $bd->query($selectRecomendados);

$select = "SELECT * FROM produto where codigo_prod = :id";
$stmt = $bd->prepare($select);
$stmt->execute([':id' => $id]);
$produto = $stmt->fetch();

$selectImg = "SELECT * FROM imagem where codigo_prod = :id";
$stmtImg = $bd->prepare($selectImg);
$stmtImg->execute([':id' => $id]);
$imagem = $stmtImg->fetch();

$idCategoria = $produto['id_categoria'];
$selectCategoria = "SELECT * FROM categoria where id = :idCategoria";
$stmtCategoria = $bd->prepare($selectCategoria);
$stmtCategoria->execute([':idCategoria' => $idCategoria]);
$categoria = $stmtCategoria->fetch();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produto</title>
  <link rel="shortcut icon" href="../stylesheet/assets/logo_planta.svg" type="image/x-icon">
  <link rel="stylesheet" href="../stylesheet/produtos.css" />
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
    <div class="produtos_detalhes">

      <div class="div">
        <img class="imagem_produto" src="<?= $imagem['nome_arquivo'] ?>" alt="">
      </div>

      <div class="frame">
        <div class="frame-2">
          <div class="div-2">
            <div class="div-3">
              <div class="nome_produto"><?= $produto['nome_pro'] ?></div>
              <div class="estoque-status">
                <div class="status"><?= $produto['quantidade'] ?> unidades disponíveis</div>
              </div>
            </div>
          </div>

          <div class="preco">
            <div class="frame-3">
              <div class="preco_produto">
                R$<?= $produto['valor_unitario'] ?>
              </div>
            </div>
          </div>
            <img class="divisor" src="../stylesheet/assets/linha.svg" />
        </div>

        <div class="frame-4">
          <div class="div-3">
            <div class="vendedor">Descrição: </div>
            <div class="grupo">
              <div class="nome_vendedor"><?= $produto['descricao'] ?></div>
              <br>
            </div>
          </div>
        </div>

  <form action="adicionarCarrinho.php" method="GET">

        <div class="adicionar_carrinho">
          <div class="quantidade">
            <div class="adicionar_produto">
            <img src="../stylesheet/assets/diminuir.svg" alt="" id="diminuirBtn">
            
            </div>
            <input type="number" readonly name="quantidadeSelecionada" value="1" id="quantidadeSelecionada" class="quantidadeSelecionada">
            <div class="adicionar_produto">
            <img src="../stylesheet/assets/aumentar.svg" alt="" id="aumentarBtn">
            
            </div>
          </div>

          <script>
            const diminuirBtn = document.getElementById('diminuirBtn');
            const aumentarBtn = document.getElementById('aumentarBtn');
            const quantidadeSelecionada = document.getElementById('quantidadeSelecionada');

            diminuirBtn.addEventListener('click', function() {
                let quantidadeAtual = parseInt(quantidadeSelecionada.value);
                if (quantidadeAtual > 1) {
                    quantidadeAtual--;
                    quantidadeSelecionada.value = quantidadeAtual;
                }

            });

            aumentarBtn.addEventListener('click', function() {
                let quantidadeAtual = parseInt(quantidadeSelecionada.value);
                if (quantidadeAtual < <?= $produto['quantidade'] ?>) {
                  quantidadeAtual++;
                  quantidadeSelecionada.value = quantidadeAtual;
                }
            });

          </script>

          <input type="hidden" name="codigo_prod" value="<?= $id ?>">
          <input type="hidden" name="nome_arquivo" value="<?= $imagem['nome_arquivo'] ?>">
          <input type="hidden" name="nome_pro" value="<?= $produto['nome_pro'] ?>">
          <input type="hidden" name="valor_unitario" value="<?= $produto['valor_unitario'] ?>">
          <input name="adicionarCarrinho" type="submit" value="Adicionar ao Carrinho" class="carrinho-add">
  </form>

        </div>

        <div class="frame-4">
          <div class="div-3">
            <div class="vendedor">Categoria: </div>
            <div class="grupo">
              <div class="nome_vendedor"><?= $categoria['nome'] ?></div>
              <br>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    <section class="Products">
      <h2>Produtos Recomendados</h2>
      <div class="Product-grid">
        <?php
        $contador = 0;
        while ($contador < 3 && $produtos = $response->fetch()) {
          echo "<div class='Product'>";
          echo "<a href='produtos.php?codigo_prod=" . $produtos['codigo_prod'] . "'>";
          echo "<img src='" . $produtos["nome_arquivo"] . "' alt=''>";
          echo "<p id='nome_pro'>";
          echo $produtos["nome_pro"];
          echo "</p>";  
          echo "<p id='valor'>";
          echo "R$" . $produtos["valor_unitario"];
          echo "</p>";
          echo "<br>";
          echo " <a href='adicionarCarrinho.php?codigo_prod=" . $produtos['codigo_prod'] . "'
          ><img src='../stylesheet/assets/botao_sacola.svg' id='botao_sacola'></a>";
          echo "</a>";
          echo "</div>";
          $contador++;
        }
        $response = null;
        $bd = null;
        ?>
      </div>
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
