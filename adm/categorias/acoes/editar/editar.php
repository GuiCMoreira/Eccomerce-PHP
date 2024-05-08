<?php
include_once '../../../../script/banco.php';
$bd = conectar();
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
$select = "SELECT * FROM categoria where id = '$id'";
$response = $bd->query($select);

if ($response->rowCount() == 0) {
    $bd = null;
    header("location:index.php");
    die();
}
$categoria = $response->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categorias</title>
</head>

<body>
    <a href="../../categoria.php"><button>Voltar</button></a>
    <form action="salvar.php" method="POST">
        <div>
            <label>ID: </label>
            <input type="text" name="id" readonly value="<?= $categoria['id']; ?>">
            <br>
            <label>Categoria: </label>
            <input type="text" name="nome" value="<?= $categoria['nome'] ?>">
            <br>
        </div>
        <input type="submit" value="Salvar">
    </form>
</body>

</html>