<?php
ini_set('display_errors',0);
session_start();
requiredValidSession();
loadModel('Beneficio');

$beneficios = Beneficio::get();


loadTemplateView('ver_beneficios', ['beneficios' => $beneficios]);