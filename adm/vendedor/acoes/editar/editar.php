<?php
include_once '../../../../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'cpf_cnpj_vend', FILTER_SANITIZE_STRING);
$select = "SELECT * FROM vendedor where cpf_cnpj_vend = '$id'";
$response = $bd->query($select);

if ($response->rowCount() == 0) {
    $bd = null;
    header("location:index.php");
    die();
}
$vendedores = $response->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vendedores</title>
</head>

<body>
    <a href="../../vendedor.php"><button>Voltar</button></a>
    <form action="salvar.php" method="POST">
        <div>
            <label>CPF / CNPJ Vendedor</label>
            <input type="text" name="cpf_cnpj_vend" readonly value="<?= $vendedores['cpf_cnpj_vend']; ?>">
            <br>
            <label>Nome do Vendedor</label>
            <input type="text" name="nome_vend" value="<?= $vendedores['nome_vend'] ?>">
            
        </div>
        <input type="submit" value="Salvar">
    </form>
</body>

</html>