<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession();
loadModel('Unidade');
$unidades = Unidade::get(['ativo_unidade' => 1]);

loadTemplateView('ver_unidade',['unidades'=>$unidades]);