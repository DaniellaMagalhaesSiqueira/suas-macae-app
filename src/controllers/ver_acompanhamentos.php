<?php
ini_set('display_errors',0);
session_start();
requiredValidSession(2);
loadModel('Acompanhamento');

$exception = null;

$tecnico = $_SESSION['user'];

$acompanhamentos = Acompanhamento::registrosTecnico($tecnico->id_funcionario);


loadTemplateView('ver_acompanhamentos', ['acompanhamentos'=> $acompanhamentos]);