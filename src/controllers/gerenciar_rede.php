<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession(2);

loadModel('Rede');
$exception = null;
$redes = Rede::get();


loadTemplateView('gerenciar_rede', ['redes' => $redes]);