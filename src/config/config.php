<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_TIME, 'brazil', 'pt-BR.utf-8', 'portuguese-brazilian');
<<<<<<< HEAD

=======
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
// setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
//Constantes gerais

// caminhos ds pastas

define ('MODEL_PATH', realpath(dirname(__FILE__).'\\..\\models'));
define ('VIEW_PATH', realpath(dirname(__FILE__).'\\..\\views'));
define ('TEMPLATE_PATH', realpath(dirname(__FILE__).'\\..\\views\\template'));
<<<<<<< HEAD
define ('MESSAGES_PATH', realpath(dirname(__FILE__).'\\..\\views\\template\\messages.php'));
=======
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
define ('CONTROLLER_PATH', realpath(dirname(__FILE__).'\\..\\controllers'));
define ('EXCEPTION_PATH', realpath(dirname(__FILE__).'\\..\\exceptions'));

//importando arquivos
require_once(realpath(dirname(__FILE__). "\\database.php"));
require_once(realpath(dirname(__FILE__). "\\loader.php"));
require_once(realpath(dirname(__FILE__). "\\session.php"));
require_once(realpath(dirname(__FILE__). "\\date_utils.php"));
require_once(realpath(dirname(__FILE__). "\\utils.php"));
require_once(MODEL_PATH. "\\Model.php");
require_once(MODEL_PATH. "\\Funcionario.php");
require_once(MODEL_PATH. "\\Unidade.php");
require_once(EXCEPTION_PATH. "\\AppException.php");
require_once(EXCEPTION_PATH. "\\ValidationException.php");