<?php

session_start();
requiredValidSession(5);
loadModel('Unidade');
$unidades = Unidade::get(['ativo_unidade'=>0]);





loadTemplateView('reativar_unidade', ['unidades' => $unidades]);