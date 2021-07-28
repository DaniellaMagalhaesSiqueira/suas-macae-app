<?php
ini_set('display_errors', 0);
loadModel('Login');
session_start();

$exception = null;

if (count($_POST) > 0) {
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        $_SESSION['user'] = $user;
        $fullName = explode(" ", $user->nome_funcionario);
        $_SESSION['name_user'] = $fullName[0];
        $unidade = Unidade::getOne(['id_unidade' => $user->unidade_funcionario]);
        if (!$unidade) {
            if ($user->nivel_acesso === "G") {
                $_SESSION['unidade'] = "Vigilância Socioassistencial de Macaé";
            } else {
                $_SESSION['unidade'] = "Proteção Social Básica de Macaé";
            }
        }
        $_SESSION['unidade'] = $unidade;
        $senha = str_replace(".", "", $user->cpf_funcionario);
        $senha = str_replace("-", "", $senha);
        
        if(password_verify($senha, $user->senha_funcionario)){
            header('Location: edit_perfil.php');
        }else{
            header('Location: home.php');

        }
    } catch (AppException $e) {
        $exception = $e;
    }
}
//podemos passar parâmetros para a view através de um array no loadView
loadView('login', $_POST + ['exception' => $exception]);
