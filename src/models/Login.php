<?php
class Login extends Model {

    public function validate(){
        $errors = [];
        if(!$this->email_funcionario){
            $errors['email_funcionario'] = 'Informe o e-mail.';
        }
        if(!$this->senha_funcionario){
            $errors['senha_funcionario'] = 'Informe a senha.';
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    public function checkLogin(){
        $this->validate();
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