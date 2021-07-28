<?php
ini_set('display_errors',0);
session_start();
requiredValidSession(5);
loadModel('Beneficio');

$beneficios = Beneficio::get();


loadTemplateView('gerenciar_beneficios', ['beneficios' => $beneficios]);