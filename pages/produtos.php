<?php
include_once '../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'codigo_prod', FILTER_SANITIZE_STRING);

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
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../stylesheet/produtos.css" />
    <link rel="stylesheet" href="../stylesheet/style.css">
  </head>
  <body>
  <header>
    <div class="Header">
      <div class="Logo">
        <a href="adm/index.php">
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
   
      <a href="../index.php"><img src="../stylesheet/assets/voltar.svg" alt=""></a>
      
      <div class="frame">
        <div class="frame-2">
          <div class="div-2">
            <div class="div-3">
              <div class="nome_produto"><?= $produto['nome_pro'] ?></div>
              <div class="estoque-status"><div class="status"><?= $produto['quantidade'] ?> unidades disponíveis</div></div>
            </div>
          </div>

          <div class="preco">
            <div class="frame-3">
              <div class="preco_produto">R$<?= $produto['valor_unitario'] ?></div>
            </div>
          </div>
          <img class="divisor" src="../stylesheet/assets/linha.svg" />
        </div>

        <!-- VENDEDOR  -->
          <div class="frame-4">
            <div class="div-3">
              <div class="vendedor">Vendedor: </div>
              <div class="grupo">
                  <div class="nome_vendedor">farmary</div>
                  <br>
            </div>
              <div class="vendedor">Descrição: 
                  <p class="descricao_produto"><?= $produto['descricao'] ?></p>
            </div>

  
        </div>
        <div class="adicionar_carrinho">
          <div class="quantidade">
            <div class="adicionar_produto"><img class="selecionar" src="../stylesheet/assets/diminuir.svg" /></div>
            <div class="quantidade_selecionada">5</div>
            <div class="adicionar_produto"><img class="selecionar" src="../stylesheet/assets/aumentar.svg" /></div>
          </div>
          
          <a href="adicionarCarrinho.php">
          <button class="button">
            <div class="texto_carrinho">Adicionar ao Carrinho</div>
            <img class="rectangle" src="../stylesheet/assets/sacola.svg" />
          </button>
          </a>
      
        </div>
        <div class="div-2">
          <div class="div-4">
            <div class="categorias">Categoria: </div>
            <div class="id_categoria"><?= $categoria["nome"] ?></div>
          </div>
          <div class="div-4">
          </div>
        </div>
      </div>
    </div>
    </main>

  </body>
</html>