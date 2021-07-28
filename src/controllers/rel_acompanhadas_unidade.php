<?php 
loadModel('Acompanhamento');


$acompanhamentos = Acompanhamento::get(['unidade_acompanhamento'=> $_GET['unidade']]);

$html .= "<meta charset='UTF-8'>";
$html .= "<table border='1'>";
$html .= "<thead>";
$html .= "<tr>";
$html .= "<th>Código da Familia</th>";
$html .= "<th>Referência Familiar</th>";
$html .= "<th>Data de Início</th>";
$html .= "<th>Renda Per Capita</th>";
$html .= "<th>Qtd Pessoas</th>";
$html .= "</tr>";
$html .= "</thead>";
$html .= "<tbody>";
foreach($acompanhamentos as $a){
    $html .= "<tr>";
    $html .= "<td>". $a->getFamilia()->id_familia."</td>";
    $html .= "<td>".$a->getFamilia()->getRF()->nome_pessoa."</td>";
    $html .= "<td>".(new DateTime($a->inicio_acompanhamento))->format('d/m/Y')."</td>";
    $html .= "<td>".$a->getFamilia()->getPercapita()."</td>";
    $html .= "<td>".$a->getFamilia()->getQuantidade()."</td>";
    $html .= "</tr>";
}
$html .= "</tbody>";
$html .= "</table>";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename = acompanhadas_unidade.xls");
echo $html;