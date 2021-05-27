<?php

loadModel('Funcionario');

class Login extends Model {

    public function checkLogin(){
        $func = Funcionario::getOne(['email_funcionario' => $this->email_funcionario]);
        if($func){

            if(!$func->ativo_funcionario){

                throw new AppException('Funcionario desligado. Não foi possível realizar o login.');
            }
            if(password_verify($this->senha_funcionario, $func->senha_funcionario)){
                return $func;
            }
        }
        throw new AppException('E-mail e/ou senha inválidos.');
    }
}