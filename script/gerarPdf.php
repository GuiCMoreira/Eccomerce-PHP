<?php
use Dompdf\Dompdf;
require '../vendor/autoload.php';

$dados = filter_input_array(INPUT_GET, FILTER_DEFAULT);
var_dump($dados);

//conteudo do pdf
$html = '<h1>Relatório de Vendas</h1>';
$html .= '<table border="1" width="100%">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>Nome</th>';
$html .= '<th>Valor</th>';
$html .= '<th>Data</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';
$html .= '<tr>';
$html .= '<td>Produto 1</td>';
$html .= '<td>R$ 100,00</td>';
$html .= '<td>01/01/2021</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Produto 2</td>';
$html .= '<td>R$ 200,00</td>';
$html .= '<td>02/01/2021</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td>Produto 3</td>';
$html .= '<td>R$ 300,00</td>';
$html .= '<td>03/01/2021</td>';
$html .= '</tr>';
$html .= '</tbody>';
$html .= '</table>';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();

?>

