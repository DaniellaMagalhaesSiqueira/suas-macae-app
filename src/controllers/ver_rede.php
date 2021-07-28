<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession();

loadModel('Rede');
$exception = null;
$redes = Rede::get();


loadTemplateView('ver_rede', ['redes' => $redes]);