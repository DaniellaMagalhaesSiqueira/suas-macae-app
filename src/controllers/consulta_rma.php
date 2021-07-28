<?php
ini_set('display_errors',0);
session_start();
requiredValidSession(2);
$mes = array('', 'Janeiro', 'Fevereiro', 
    'Março', 'Abril', 'Maio', 'Junho', 'Julho', 
    'Agosto', 'Setembro', 'Outubro', 'Novembro', 
    'Dezembro');

loadTemplateView('consulta_rma', ['mes'=>$mes]);   