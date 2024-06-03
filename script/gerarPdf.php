<?php
use Dompdf\Dompdf;
require '../vendor/autoload.php';

$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);


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
$html .= '<p>Nome: '.$dados['nome_cli'].'</p>';
$html .= '<p>CPF: '.$dados['cpf_cnpj_cli'].'</p>';
$html .= '<p>Endereço: '.$dados['endereco_cli'].'</p>';
$html .= '<p>Telefone: '.$dados['numero_cli'].'</p>';
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

header('../index.php');

?>

