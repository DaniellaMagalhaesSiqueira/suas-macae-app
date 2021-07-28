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
<<<<<<< HEAD
        'unidade_funcionario',
        'ativo_funcionario',
        'data_desligamento_funcionario',
        'desligado_por'
=======
        'unidade_funcionario'
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
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
<<<<<<< HEAD
    

    public function porNivel(){
        $objects = [];
        if($this->nivel_acesso == 5){
            return Funcionario::get();
        }else{
            $sql = "SELECT * FROM funcionarios WHERE nivel_acesso < '{$this->nivel_acesso}'";
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            if($result){
                while ($row = $result->fetch_assoc()){
                    array_push($objects, new Funcionario($row));
                }
            }
            return $objects;
        }
    }

    public function getAtivosNivel() {
        $ativos = $funcionarios = static::get(['ativo_funcionario'=>1]);

        if($this->nivel_acesso == 4){
            $ativos2 = [];
            foreach($ativos as $ativo){
                if($ativo->nivel_acesso < 4){
                    array_push($ativos2, $ativo);
                }
                $ativos = $ativos2;
            }

        }
        elseif($this->nivel_acesso == 3){
            $ativos2 = [];
            foreach($ativos as $ativo){
                if($ativo->nivel_acesso < 3){
                   array_push( $ativos2, $ativo);
                }
                $ativos = $ativos2;
            }
        }
        return $ativos;
=======


    public function getAtivosNivel() {
        if($this->nivel_acesso == 5){
            $funcionarios = static::get(['ativo_funcionario'=>1]);
        }else{
            $funcionarios = static::get(['ativo_funcionario'=>1,
                'nivel_acesso'=>$this->nivel_acesso-1], '*', '<=');
        }
        return $funcionarios;
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
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

<<<<<<< HEAD
    public function getPrimeiroNome(){
        $nomeTodo = explode(" ",$this->nome_funcionario);
        return $nomeTodo[0];
    }

    private function validate(){
        
=======
    private function validate(){
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
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
<<<<<<< HEAD
        }elseif($this->email_funcionario){
            $funcs = Funcionario::get();
            foreach($funcs as $func){
                if($func->email_funcionario === $this->email_funcionario 
                    && $func->id_funcionario !== $this->id_funcionario){
                    $errors ['email_funcionario'] = "Este e-mail já está sendo usado por outro funcionário.";
                }
            }
        }

=======
        }
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
        if(!$this->nivel_acesso){
            $errors['nivel_acesso'] = 'Nível de acesso é obrigatório.';
        }elseif(is_string($this->nivel_acesso)){
            $this->nivel_acesso = intval($this->nivel_acesso);
        }
<<<<<<< HEAD
        
=======
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }
    
<<<<<<< HEAD
    private function validatePassword($proprio = false){

        $errors = [];
        if(!$this->data_nascimento_funcionario) {
            $this->data_nascimento_funcionario = null;
        }elseif(!DateTime::createFromFormat('Y-m-d', $this->data_nascimento_funcionario)){
            $errors ['data_nascimento_funcionario'] = 'Data de nascimento deve
                seguir o padrão dd/mm/aaaa.';
        }
        if($proprio){
            if(!$this->senha_funcionario){
                $errors['senha_funcionario'] = 'Campo senha obrigatório';
            }
            if(!$this->confirmacao_senha){
                $errors['confirmacao_senha'] = 'Campo confirmação obrigatório.';
            }
            if($this->senha_funcionario && $this->confirmacao_senha &&
            $this->senha_funcionario !== $this->confirmacao_senha){
                    $errors ['confirmacao_senha'] = 'As senhas não são iguais.';
                    $errors ['senha_funcionario'] = 'As senhas não são iguais.';
            } 
            if($this->senha_funcionario && $this->confirmacao_senha && 
                $this->senha_funcionario === $this->confirmacao_senha){
                    $this->senha_funcionario = password_hash($this->senha_funcionario, PASSWORD_DEFAULT);
                }
            if(count($errors) > 0){
                throw new ValidationException($errors);
            }
        }
        
    }

    public function updateDesligamento(){
        $errors = [];
        if(!$this->data_desligamento_funcionario){
            $errors['data_desligamento_funcionario'] = 'Insira a data de desligamento.';
=======
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
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
        }
        if(count($errors) > 0){
            throw new ValidationException($errors);
        }
<<<<<<< HEAD
        $this->ativo_funcionario = 0;
        return parent::update();
    }
    
    public function update($proprio = false){
        $this->validatePassword($proprio);   
=======
        
        
    }
    
    public function update(){
        $this->validatePassword();
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
        return parent::update();
    }

}