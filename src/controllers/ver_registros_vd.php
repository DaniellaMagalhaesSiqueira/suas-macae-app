<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(2);
loadModel('Visita');

$itens_por_pagina = 10;
$num_total = Visita::getCount();
$num_paginas = ceil($num_total/$itens_por_pagina);
$pagina = intval($_GET['pagina']);
$inicio = $pagina * $itens_por_pagina;
//o primeiro item não pode ser a primeira página
$vds = Visita::registrosPorPagina($inicio, $itens_por_pagina, $_SESSION['user']->id_funcionario);

loadTemplateView('ver_registros_vd', [
    'vds'=>$vds, 
    'itens_por_pagina'=>$itens_por_pagina,
    'num_paginas'=> $num_paginas,
    'pagina'=> $pagina
]);