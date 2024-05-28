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
if (isset($_SESSION['carrinho_serializado'])) {
    $carrinho = unserialize($_SESSION['carrinho_serializado']);
    $total = 0;
    foreach ($carrinho as $item) {
        $resultado = $item[0] * $item[2];
        $total = $total + $resultado;
    }
}
$valor_comissao = $total * 0.1;
$valor_transporte = $total * 0.05;

include_once "banco.php";
$bd = conectar();

$sql = "INSERT INTO cliente (cpf_cnpj_cli, nome_cli, numero_cli, bairro_cli, cidade_cli, cep_cli, estado_cli, endereco_cli) VALUES ('$cpf_cnpj_cli', '$nome_cli', '$numero_cli', '$bairro_cli', '$cidade_cli', '$cep_cli', '$estado_cli', '$endereco_cli')";

$sql2 = "INSERT INTO compra (data_compra, valor_comissao, valor_transporte, cpf_cnpj_vend, cpf_cnpj_trans, cpf_cnpj_cli) VALUES ('$data_compra', '$valor_comissao', '$valor_transporte', '$cpf_cnpj_vend', '$cpf_cnpj_trans', '$cpf_cnpj_cli')";

try {
    $bd->beginTransaction();
    $i = $bd->exec($sql);
    $j = $bd->exec($sql2);

    if ($i != 1 || $j != 1) {
        $bd->rollBack();
        echo "Erro ao inserir dados.";
    } else {
        $bd->commit();
        header("Location: ../pages/finalizarCompra.php?cpf_cnpj_cli=$cpf_cnpj_cli&cpf_cnpj_trans=$cpf_cnpj_trans&cpf_cnpj_vend=$cpf_cnpj_vend");
        exit;
    }
} catch (PDOException $e) {
    $bd->rollBack();
    echo "Erro: " . $e->getMessage();
    $bd = null;
    header("Location: ../pages/finalizarCompra.php?cpf_cnpj_cli=$cpf_cnpj_cli&nome_cli=$nome_cli&numero_cli=$numero_cli&bairro_cli=$bairro_cli&cidade_cli=$cidade_cli&cep_cli=$cep_cli&estado_cli=$estado_cli&endereco_cli=$endereco_cli&cpf_cnpj_trans=$cpf_cnpj_trans&cpf_cnpj_vend=$cpf_cnpj_vend&erro=1");
    exit;
}

$bd = null;
?>