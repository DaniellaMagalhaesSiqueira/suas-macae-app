<?php

use Dompdf\Dompdf;

ini_set('display_errors',0);
session_start();
requiredValidSession(2);
loadModel('Familia');


$percapita = $_POST['ext_pobreza'] ? limpaValorMonetario($_POST['ext_pobreza']):89.00;
$ano = date('Y');
$meses = array('', 'Janeiro', 'Fevereiro', 
    'Março', 'Abril', 'Maio', 'Junho', 'Julho', 
    'Agosto', 'Setembro', 'Outubro', 'Novembro', 
    'Dezembro');
$mes = $_GET['mes'];
$acompa_total = Model::totalAcompanhamentos();
$acomp_novas = Model::iniciadasAcompanhamento($mes);
$familiasNovas = Model::extremaPobreza($mes);
$cont = 0;
foreach($familiasNovas as $fn){
    $f = Familia::getOne(['id_familia' => $fn]);
    if($f->getPercapita() <= $percapita){
        $cont ++;
    }
}
echo $_POST['ext_pobreza'];
$ext_pobreza = $cont;
$pbf = Model::acompPBF($mes);
$descumprimento = Model::acompPBFDesc($mes);
$bpc = Model::acompBPC($mes);
$trab_infantil = Model::trabalhoInfantil($mes);
$acolhimento = Model::acolhimento($mes);
$atend_total = Model::totalAtendimentos($mes);
$enc_cad = Model::inclusaoCad($mes);
$atual_cad = Model::atualizacaoCad($mes);
$enc_bpc = Model::acessoBPC($mes);
$enc_creas = Model::creas($mes);
$vds = Model::visitasDomiciliares($mes);
$aux_natalidade = Model::auxilioNatalidade($mes);
$aux_funeral = Model::auxilioFuneral($mes);
$outros_eventuais = Model::outrosAuxilios($mes);
$familias_grupos = null;
$zero_seis_scfv = Model::scfvZero();
$sete_quatorze_scfv = Model::scfvSete();
$quinze_dezesete_scfv = Model::scfvQuinze();
$adultos_scfv = Model::scfvAdulto();
$idosos_scfv = Model::scfvIdoso();
$pcd_scfv = Model::scfvComDeficiencia();
$html = '';

$html .= "<meta charset='UTF-8'>";
$html .= "<table border='1' style='text-align:left;'>";
$html .= "<tr><th colspan='8'>Registro Mensal de Atendimentos do CRAS</th></tr>";
$html .= "<tr><td colspan='5'>Mês e Ano de Referência:</td><td>{$meses[$_GET['mes']]}/{$ano}</td></tr>";
$html .= "<tr><td colspan='5'>Nome da Unidade: </td><td>{$_SESSION['unidade']->nome_unidade}</td></tr>";
$html .= "<tr><th colspan='8'>Volume de Famílias em Acompanhamento</th></tr>";
$html .= "<tr><td colspan='8'>Total de Famílias em Acompanhamento pelo PAIF</td><td class='centerText'>{$acompa_total}</td></tr>";
$html .= "<tr><td colspan='8'>Novas famílias inseridas no acompanhamento do PAIF durante o mês de referência</td><td class='centerText'>{$acomp_novas}</td></tr>";
$html .= "<tr><th colspan='8'>Perfil das novas famílias inseridas em acompanhamento no PAIF, no mês de referência</th></tr>";
$html .= "<tr><td colspan='8'>Famílias em situação de extrema pobreza</td><td class='centerText'>{$ext_pobreza}</td></tr>";
$html .= "<tr><td colspan='8'>Famílias beneficiárias do Programa Bolsa Família</td><td class='centerText'>{$pbf}</td></tr>";
$html .= "<tr><td colspan='8'>Famílias beneficiárias do Programa Bolsa Família em descumprimento de condicionalidades</td><td class='centerText'>{$descumprimento}</td></tr>";
$html .= "<tr><td colspan='8'>Famílias com membros beneficiários do BPC</td><td class='centerText'>{$bpc}</td></tr>";
$html .= "<tr><td colspan='8'>Famílias com crianças ou adolescentes em situação de trabalho infantil</td><td class='centerText'>{$trab_infantil}</td></tr>";
$html .= "<tr><td colspan='8'>Famílias com crianças ou adolescentes em Serviço de Acolhimento</td><td class='centerText'>{$acolhimento}</td></tr>";
$html .= "<tr><th colspan='8'>Volume de atendimentos particularizados realizados no CRAS no mês de referência</th></tr>";
$html .= "<tr><td colspan='8'>Total de atendimentos particularizados no mês de referência</td><td class='centerText'>{$atend_total}</td></tr>";
$html .= "<tr><td colspan='8'>Famílias encaminhadas para inclusão no Cadastro Único</td><td class='centerText'>{$enc_cad}</td></tr>";
$html .= "<tr><td colspan='8'>Famílias encaminhadas para atualização cadastral no Cadastro Único</td><td class='centerText'>{$atual_cad}</td></tr>";
$html .= "<tr><td colspan='8'>Indivíduos encaminhados para acesso ao BPC</td><td class='centerText'>{$enc_bpc}</td></tr>";
$html .= "<tr><td colspan='8'>Famílias encaminhadas para o CREAS</td><td class='centerText'>{$enc_creas}</td></tr>";
$html .= "<tr><td colspan='8'>Visitas domiciliares realizadas</td><td class='centerText'>{$vds}</td></tr>";
$html .= "<tr><td colspan='8'>Total de auxílios-natalidade concedidos/entregues durante o mês de referência</td><td class='centerText'>{$aux_natalidade}</td></tr>";
$html .= "<tr><td colspan='8'>Total de auxílios-funeral concedidos/entregues durante o mês de referência</td><td class='centerText'>{$aux_funeral}</td></tr>";
$html .= "<tr><td colspan='8'>Outros benefícios enventuais concedidos/entregues durante o mês de referência</td><td class='centerText'>{$outros_eventuais}</td></tr>";
$html .= "<tr><th colspan='8'>Volume de atendimentos coletivos realizados no CRAS no mês de referência</th></tr>";
$html .= "<tr><td colspan='8' colspan='8'>Famílias participando regularmente de grupos no âmbito do PAIF</td><td class='centerText'>Não disponível</td></tr>";
$html .= "<tr><td colspan='8'>Crianças de 0 a 6 anos em Serviços de Convivência e Fortalecimento de Vínculos</td><td class='centerText'>{$zero_seis_scfv}</td></tr>";
$html .= "<tr><td colspan='8'>Crianças de 7 a 14 anos em Serviços de Convivência e Fortalecimento de Vínculos</td><td class='centerText'>{$sete_quatorze_scfv}</td></tr>";
$html .= "<tr><td colspan='8'>Adolescentes de 15 a 17 anos em Serviços de Convivência e Fortalecimento de Vínculos</td><td class='centerText'>{$quinze_dezesete_scfv}</td></tr>";
$html .= "<tr><td colspan='8'>Adultos entre 18 e 59 anos em Serviços de Convivência e Fortalecimento de Vínculos</td><td class='centerText'>{$adultos_scfv}</td></tr>";
$html .= "<tr><td colspan='8'>Idosos em Serviços de Convivência e Fortalecimento de Vínculos</td><td class='centerText'>{$idosos_scfv}</td></tr>";
$html .= "<tr><td colspan='8'>Pessoas que participaram de palestras, oficinas e outras atividades coletivas de caráter não continuado</td><td class='centerText'>Não disponível</td></tr>";
$html .= "<tr><td colspan='8'>Pessoas com deficiência participando dos Serviços de Convivência ou dos frupos do PAIF</td><td class='centerText'>{$pcd_scfv}</td></tr>";
$html .= "</thead>";
$html .= "<tbody>";

echo $html;


header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename = rma{$meses[$_GET['mes']]}.xls");
