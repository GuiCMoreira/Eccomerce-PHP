<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

$data_compra = date('Y-m-d');
$cpf_cnpj_cli = filter_input(INPUT_POST, 'cpf_cnpj_cli', FILTER_SANITIZE_SPECIAL_CHARS);
$nome_cli = filter_input(INPUT_POST, 'nome_cli', FILTER_SANITIZE_SPECIAL_CHARS);
$numero_cli = filter_input(INPUT_POST, 'numero_cli', FILTER_SANITIZE_SPECIAL_CHARS);
$bairro_cli = filter_input(INPUT_POST, 'bairro_cli', FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_cli = filter_input(INPUT_POST, 'cidade_cli', FILTER_SANITIZE_SPECIAL_CHARS);
$cep_cli = filter_input(INPUT_POST, 'cep_cli', FILTER_SANITIZE_NUMBER_INT);
$estado_cli = filter_input(INPUT_POST, 'estado_cli', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco_cli = filter_input(INPUT_POST, 'endereco_cli', FILTER_SANITIZE_SPECIAL_CHARS);
$cpf_cnpj_trans = filter_input(INPUT_POST, 'cpf_cnpj_trans', FILTER_SANITIZE_SPECIAL_CHARS);
$cpf_cnpj_vend = filter_input(INPUT_POST, 'cpf_cnpj_vend', FILTER_SANITIZE_SPECIAL_CHARS);

$total = 0;
if (isset($_SESSION['carrinho_serializado'])) {
    $carrinho = unserialize($_SESSION['carrinho_serializado']);
    foreach ($carrinho as $item) {
        $resultado = $item[0] * $item[2];
        $total += $resultado;
    }
}

$valor_comissao = $total * 0.1;
$valor_transporte = $total * 0.05;

include_once "banco.php";
$bd = conectar();

$sql_cliente = "INSERT INTO cliente (cpf_cnpj_cli, nome_cli, numero_cli, bairro_cli, cidade_cli, cep_cli, estado_cli, endereco_cli) VALUES (:cpf_cnpj_cli, :nome_cli, :numero_cli, :bairro_cli, :cidade_cli, :cep_cli, :estado_cli, :endereco_cli)";

$sql_compra = "INSERT INTO compra (data_compra, valor_comissao, valor_transporte, cpf_cnpj_vend, cpf_cnpj_trans, cpf_cnpj_cli) VALUES (:data_compra, :valor_comissao, :valor_transporte, :cpf_cnpj_vend, :cpf_cnpj_trans, :cpf_cnpj_cli)";

$sql_item = "INSERT INTO itemcompra (numero_compra, codigo_prod, valor, quantidade) VALUES (:numero_compra, :codigo_prod, :valor, :quantidade)";

$bd->beginTransaction();

// Inserção de cliente
$stmt_cliente = $bd->prepare($sql_cliente);
$stmt_cliente->bindParam(':cpf_cnpj_cli', $cpf_cnpj_cli);
$stmt_cliente->bindParam(':nome_cli', $nome_cli);
$stmt_cliente->bindParam(':numero_cli', $numero_cli);
$stmt_cliente->bindParam(':bairro_cli', $bairro_cli);
$stmt_cliente->bindParam(':cidade_cli', $cidade_cli);
$stmt_cliente->bindParam(':cep_cli', $cep_cli);
$stmt_cliente->bindParam(':estado_cli', $estado_cli);
$stmt_cliente->bindParam(':endereco_cli', $endereco_cli);
$i = $stmt_cliente->execute();

// Inserção de compra
$stmt_compra = $bd->prepare($sql_compra);
$stmt_compra->bindParam(':data_compra', $data_compra);
$stmt_compra->bindParam(':valor_comissao', $valor_comissao);
$stmt_compra->bindParam(':valor_transporte', $valor_transporte);
$stmt_compra->bindParam(':cpf_cnpj_vend', $cpf_cnpj_vend);
$stmt_compra->bindParam(':cpf_cnpj_trans', $cpf_cnpj_trans);
$stmt_compra->bindParam(':cpf_cnpj_cli', $cpf_cnpj_cli);
$j = $stmt_compra->execute();

// Obtendo o número da compra inserida
$numero_compra = $bd->lastInsertId();

if (!$i || !$j) {
    $bd->rollBack();
    echo "Erro ao inserir dados no banco de dados.";
} else {
    // Inserindo itens da compra
    foreach ($carrinho as $item) {
        $stmt_item = $bd->prepare($sql_item);
        $stmt_item->bindParam(':numero_compra', $numero_compra);
        $stmt_item->bindParam(':codigo_prod', $item[4]); // Código do produto
        $stmt_item->bindParam(':valor', $item[2]); // Valor do item
        $stmt_item->bindParam(':quantidade', $item[0]); // Quantidade do item
        $k = $stmt_item->execute();
        if (!$k) {
            $bd->rollBack();
            echo "Erro ao inserir item da compra no banco de dados.";
            exit;
        }
    }

    // Confirma a transação
    $bd->commit();

    unset($_SESSION['carrinho_serializado']);

    header("Location: gerarPdf.php?data_compra=$data_compra&cpf_cnpj_cli=$cpf_cnpj_cli&nome_cli=$nome_cli&numero_cli=$numero_cli&bairro_cli=$bairro_cli&cidade_cli=$cidade_cli&cep_cli=$cep_cli&estado_cli=$estado_cli&endereco_cli=$endereco_cli&cpf_cnpj_trans=$cpf_cnpj_trans&cpf_cnpj_vend=$cpf_cnpj_vend&numero_compra=$numero_compra");
    exit;
}

$bd = null;
?>