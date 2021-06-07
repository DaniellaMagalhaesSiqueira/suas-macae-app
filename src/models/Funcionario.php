<?php 

require_once(realpath(MODEL_PATH."\\Model.php"));

class Funcionario extends Model {
    protected static $tableName = "funcionarios";
    protected static $columns = [
        'id_funcionario',
        'nome_funcionario',
        'cpf_funcionario',
        'escolaridade_funcionario',
        'data_nascimento_funcionario',
        'email_funcionario',
        'senha_funcionario',
        'telefone_funcionario',
        'nivel_acesso',
        'profissao',
        'cargo',
        'vinculo',
        'unidade_funcionario'
    ];

    public static function getAtivosTotal() {
        $funcionarios = static::get(['ativo_funcionario'=>1]);
        return $funcionarios;
    }

    public function getNivel(){
    
        switch($this->nivel_acesso){
            case '5':
                $nivel = 'Gestão';
                break;
            case '4':
                $nivel = 'Básica';
                break;
            case '3':
                $nivel = 'Coordenação';
                break;
            case '2':
                $nivel = "Técnico";
                break;
            case 1:
                $nivel = 'Médio';
                break;  
        }
        return $nivel;
    }


    public function getAtivosNivel() {
        if($this->nivel_acesso == 5){
            $funcionarios = static::get(['ativo_funcionario'=>1]);
        }else{
            $funcionarios = static::get(['ativo_funcionario'=>1,
                'nivel_acesso'=>$this->nivel_acesso-1], '*', '<=');
        }
        return $funcionarios;
    }

    public function insert(){
        $this->validate();
        $this->id_funcionario = null;  
        $senha = str_replace(".", "", $this->cpf_funcionario);
        $senha = str_replace("-", "", $senha);
        $this->senha_funcionario = $senha;
        $this->senha_funcionario = password_hash($this->senha_funcionario, PASSWORD_DEFAULT);  
        return parent::insert();
    }

    private function validate(){
        $errors = [];
        if(!$this->nome_funcionario){
            $errors ['nome_funcionario'] = 'Nome é um campo obrigatório.';
        }
        if(!$this->data_nascimento_funcionario) {
            $this->data_nascimento_funcionario = null;
        }elseif(!DateTime::createFromFormat('Y-m-d', $this->data_nascimento_funcionario)){
            $errors ['data_nascimento_funcionario'] = 'Data de nascimento deve
                seguir o padrão dd/mm/aaaa.';
        }
        if(!$this->cpf_funcionario){
            $errors['cpf_funcionario'] = 'O campo CPF é obrigatório.';
        }
        if(!$this->unidade_funcionario){
            $errors['unidade_funcionario'] = 'O campo Unidade é obrigatório.';
        }elseif(is_string($this->unidade_funcionario)){
            $this->unidade_funcionario = intval($this->unidade_funcionario);
        }
        if(!$this->email_funcionario){
            $errors ['email_funcionario'] = 'E-mail é um campo obrigatório.';
        }elseif(!filter_var($this->email_funcionario, FILTER_VALIDATE_EMAIL)){
            $errors ['email_funcionario'] = 'E-mail inválido.';   
        }
        if(!$this->nivel_acesso){
            $errors['nivel_acesso'] = 'Nível de acesso é obrigatório.';
        }elseif(is_string($this->nivel_acesso)){
            $this->nivel_acesso = intval($this->nivel_acesso);
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }
    
    private function validatePassword(){
        $errors = [];
        
        if($this->senha_funcionario && $this->confirmacao_senha && 
        $this->senha_funcionario != $this->confirmacao_senha){
                $errors ['confirmacao_senha'] = 'As senhas não são iguais.';
                $errors ['senha_funcionario'] = 'As senhas não são iguais.';
        }if(!$this->senha_funcionario){
            $errors['senha_funcionario'] = 'Campo senha obrigatório';
        }if(!$this->confirmacao_senha){
            $errors['confirmacao_senha'] = 'Campo confirmação obrigatório.';
        }
        if($this->senha_funcionario && $this->confirmacao_senha && $this->senha_funcionario == $this->confirmacao_senha){
            $this->senha_funcionario = password_hash($this->senha_funcionario, PASSWORD_DEFAULT);
        }
        if(count($errors) > 0){
            throw new ValidationException($errors);
        }
        
        
    }
    
    public function update(){
        $this->validatePassword();
        return parent::update();
    }

}