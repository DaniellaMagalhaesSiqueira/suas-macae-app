<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(4);
loadModel('Unidade');
loadModel('Bairro');
$unidades = Unidade::get(['ativo_unidade'=> 1]);
$bairros = Bairro::get();



loadTemplateView('abrangencia', ['bairros'=> $bairros, 'unidades'=>$unidades]);