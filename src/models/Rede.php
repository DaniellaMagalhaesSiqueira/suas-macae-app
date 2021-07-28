<?php

require_once(MODEL_PATH . "\\Model.php");

class Rede extends Model{
    protected static $tableName = 'rede_referenciada';
    protected static $columns = [
        'id_rede',
        'nome_rede',
        'tel1_rede',
        'tel2_rede',
        'logradouro_rede',
        'num_endereco_rede',
        'bairro_rede',
        'ponto_referencia_rede',
        'contato_rede',
        'cargo_contato',
        'email_rede',
        'horario_funcionamento_rede',
        'publico_rede',
        'descricao_rede',
        'natureza_rede',
        'setor_rede',
        'ativo_rede'
    ];

    private function validate(){
        $errors = [];

        if(!$this->nome_rede){
            $errors['nome_rede'] = 'O campo nome é obrigatório';
        }
        if(!$this->tel1_rede && !$this->tel2_rede && !$this->email_rede){
            $errors['tel1_rede'] = 'Ao menos uma forma de contato é obrigatória';
            $errors['email_rede'] = 'Ao menos uma forma de contato é obrigatória';
        }
        if(!$this->logradouro_rede || !$this->num_endereco_rede || !$this->ponto_referencia_rede || !$this->bairro_rede){
            $errors['logradouro_rede'] = 'Insira um endereço completo';
        }
        if(!$this->publico_rede){
            $errors['publico_rede'] = 'Informar o público ou marcar "diverso"';
        }
        if(!$this->natureza_rede){
            $errors['natureza_rede'] = 'Campo obrigatório';
        }
        if(!$this->setor_rede){
            $errors['setor_rede'] = 'Campo obrigatório';
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    private function validateOnlyInsert(){
        $errors = [];

        $redes = Rede::get();
        foreach($redes as $r){
            if($this->nome_rede === $r->nome_rede){
                $errors['nome_rede'] = "A instituição de código {$r->id_rede} foi cadastrada com esse mesmo nome";
            }
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    public function insert(){
        $this->ativo_rede = 1;
        $this->validateOnlyInsert();
        $this->validate();
        return parent::insert();
    }
    public function update(){
        $this->ativo_rede = $this->ativo_rede === 'on' ? 1 : 0;
        $this->validate();
        return parent::update();
    }

    public static function getNomes($string, $coluna='nome_rede'){
        $objects = [];
        $sql = "SELECT * FROM rede_referenciada WHERE {$coluna} like '%{$string}%'";
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            $result =  null;
        }else{
            $result = $result;
        }
        if($result){
            while ($row = $result->fetch_assoc()){
                array_push($objects, new Rede($row));
            }
        }
        return $objects;
    }
}