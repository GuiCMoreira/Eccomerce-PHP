<?php
include_once '../../script/banco.php';
$bd = conectar();
$select = "SELECT * FROM vendedor order by nome_vend";
$response = $bd->query($select);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../stylesheet/adm.css">
    <title>Vendedores</title>
    <link rel="shortcut icon" href="../../stylesheet/assets/logo_planta.svg" type="image/x-icon">
</head>

<body>
    <header>
        <br>
        <div class="Header">
            <div class="Logo">
                <a href="../../index.php">
                    <img src="../../stylesheet/assets/logo.svg" alt="Ecobazar Logo">
                </a>
            </div>
        </div>
        <br>
    </header>
    <a href="../index.php"><button class="btn_voltar">Voltar</button></a>
    <br>
    <table>
        <thead>
            <tr>
                <th>Vendedores</th>
                <br>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($vendedores = $response->fetch()) {
                echo "<tr>";
                echo "<td>";
                echo $vendedores["nome_vend"];
                echo "</td>";
                echo "<td>";

                echo " <a href='acoes/editar/editar.php?cpf_cnpj_vend=" . $vendedores['cpf_cnpj_vend'] . "'><button>Editar</button></a>";

                echo " <a href='acoes/consultar/consultar.php?cpf_cnpj_vend=" . $vendedores['cpf_cnpj_vend'] . "'><button>Consultar</button></a>";

                echo " <a href='acoes/excluir/excluir.php?cpf_cnpj_vend=" . $vendedores['cpf_cnpj_vend'] . "'><button class='btnexcluir'>Excluir</button></a>";

                echo "</td>";
                echo "</tr>";
            }
            $response = null;
            $bd = null;
            ?>
        </tbody>
    </table>
    <br>
    <a href="acoes/inserir/novo.php"><button>Cadastrar Vendedor</button></a>
</body>

</html>