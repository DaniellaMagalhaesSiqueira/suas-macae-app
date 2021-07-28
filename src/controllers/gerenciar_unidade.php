<?php

session_start();
requiredValidSession(5);
loadModel('Unidade');
$unidades = Unidade::get(['ativo_unidade' => 1]);

loadTemplateView('gerenciar_unidade',['unidades'=>$unidades]);