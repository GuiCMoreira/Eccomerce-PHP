<?php
session_start();
use Dompdf\Dompdf;

require '../vendor/autoload.php';

$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);
$carrinho = unserialize($_SESSION['carrinho_serializado']);
//conteudo do pdf

$html = '<!DOCTYPE html>';
$html .= '<html lang="pt-br">';
$html .= '<head>';
$html .= '<meta charset="UTF-8">';
$html .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
$html .= '<title>Nota Fiscal</title>';
$html .= '</head>';
$html .= '<body>';
$html .= '<h1>Nota Fiscal</h1>';
$html .= '<p>Data Compra: ' . $dados['data_compra'] . '</p>';
$html .= '<p>Nome: ' . $dados['nome_cli'] . '</p>';
$html .= '<p>CPF: ' . $dados['cpf_cnpj_cli'] . '</p>';
$html .= '<p>Telefone: ' . $dados['numero_cli'] . '</p>';
$html .= '<p>Endereço: ' . $dados['endereco_cli'] . '</p>';
$html .= '<p>Bairro: ' . $dados['bairro_cli'] . '</p>';
$html .= '<p>Cidade: ' . $dados['cidade_cli'] . '</p>';
$html .= '<p>CEP: ' . $dados['cep_cli'] . '</p>';
$html .= '<p>Estado: ' . $dados['estado_cli'] . '</p>';
$html .= '<table>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>Nome</th>';
$html .= '<th>Quantidade</th>';
$html .= '<th>Valor Unitário</th>';
$html .= '<th>Valor Total</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';
$totaldetudo = 0;
foreach ($carrinho as $item) {
  $html .= '<tr>';
  $html .= '<td>' . $item[1] . '</td>';
  $html .= '<td>' . $item[0] . '</td>';
  $html .= '<td>' . $item[2] . '</td>';
  $html .= '<td>' . $item[0] * $item[2] . '</td>';
  $totaldetudo += $item[0] * $item[2];
  $html .= '</tr>';
}
$html .= '<tr>' . '<td>' . 'Total' . '</td>' . '<td>' . '</td>' . '<td>' . '</td>' . '<td>' . $totaldetudo . '</td>' . '</tr>';
$html .= '</tbody>';
$html .= '</table>';
$html .= '</body>';
$html .= '</html>';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

unset($_SESSION['carrinho_serializado']);


?>