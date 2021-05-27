<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_TIME, 'brazil', 'pt-BR.utf-8', 'portuguese-brazilian');
// setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
//Constantes gerais

// caminhos ds pastas

define ('MODEL_PATH', realpath(dirname(__FILE__).'\\..\\models'));
define ('VIEW_PATH', realpath(dirname(__FILE__).'\\..\\views'));
define ('TEMPLATE_PATH', realpath(dirname(__FILE__).'\\..\\views\\template'));
define ('CONTROLLER_PATH', realpath(dirname(__FILE__).'\\..\\controllers'));
define ('EXCEPTION_PATH', realpath(dirname(__FILE__).'\\..\\exceptions'));

//importando arquivos
require_once(realpath(dirname(__FILE__). "\\database.php"));
require_once(realpath(dirname(__FILE__). "\\loader.php"));
require_once(MODEL_PATH. "\\Model.php");
require_once(EXCEPTION_PATH. "\\AppException.php");