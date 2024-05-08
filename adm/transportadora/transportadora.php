<?php
include_once '../../script/banco.php';
$bd = conectar();
$select = "SELECT * FROM transportadora order by nome_trans";
$response = $bd->query($select);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportadoras</title>
</head>

<body>
    <a href="../index.php"><button class="btn_voltar">Voltar</button></a>
    <br>
    <table>
        <thead>
            <tr>
                <th>Transportadoras</th>
                <br>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($transportadora = $response->fetch()) {
                echo "<tr>";
                echo "<td>";
                echo $transportadora["nome_trans"];
                echo "</td>";
                echo "<td>";

                echo " <a href='acoes/editar/editar.php?cpf_cnpj_trans=" . $transportadora['cpf_cnpj_trans']. "'><button>Editar</button></a>";

                echo " <a href='acoes/consultar/consultar.php?cpf_cnpj_trans=" . $transportadora['cpf_cnpj_trans']. "'><button>Consultar</button></a>";

                echo " <a href='acoes/excluir/excluir.php?cpf_cnpj_trans=" . $transportadora['cpf_cnpj_trans']. "'><button>Excluir</button></a>";

                echo "</td>";
                echo "</tr>";
            }
            $response = null;
            $bd = null;
            ?>
        </tbody>
    </table>
    <br>
    <a href="acoes/inserir/novo.php"><button>Nova Transportadora</button></a>
</body>

</html>