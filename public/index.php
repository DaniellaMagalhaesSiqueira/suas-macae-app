<?php
ini_set('display_errors',0);
require_once(dirname(__FILE__, 2). '\\src\\config\\config.php');
require_once(CONTROLLER_PATH. "\\login.php");
//loadView('login', ['texto'=>'abc123']); passando parâmetros para a tela
// require_once(MODEL_PATH."\\Login.php");

// $login = new Login (
//     ['email_funcionario' => 'daniella.siqueira80@gmail.com', 'senha_funcionario' => 'a']
// );
// try{
//     $login->checkLogin();
//     echo "Deu certo";
// }catch(Exception $e){
//     echo "Problemas com o login";
// }