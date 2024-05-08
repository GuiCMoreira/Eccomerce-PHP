<?php
include_once '../../script/banco.php';
$bd = conectar();
$select = "SELECT * FROM categoria order by nome";
$response = $bd->query($select);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>

<body>
    <a href="../index.php"><button class="btn_voltar">Voltar</button></a>
    <br>
    <table>
        <thead>
            <tr>
                <th>Categorias</th>
                <br>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($categoria = $response->fetch()) {
                echo "<tr>";
                echo "<td>";
                echo $categoria["nome"];
                echo "</td>";
                echo "<td>";

                echo " <a href='acoes/editar/editar.php?id=" . $categoria['id']. "'><button>Editar</button></a>";

                echo " <a href='acoes/consultar/consultar.php?id=" . $categoria['id']. "'><button>Consultar</button></a>";

                echo " <a href='acoes/excluir/excluir.php?id=" . $categoria['id']. "'><button>Excluir</button></a>";

                echo "</td>";
                echo "</tr>";
            }
            $response = null;
            $bd = null;
            ?>
        </tbody>
    </table>
    <br>
    <a href="acoes/inserir/novo.php"><button>Nova Categoria</button></a>
</body>

</html>