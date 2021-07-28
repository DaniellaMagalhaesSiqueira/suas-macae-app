<?php

require_once(realpath(MODEL_PATH."\\Model.php"));

class Beneficio extends Model{

    protected static $tableName = 'beneficios_tipo';
    protected static $columns = [
        'id_beneficio',
        'ambito_beneficio',
        'nome_beneficio',
        'ativo_beneficio',
        'sigla_beneficio',
        'criterios_elegibilidade'
    ];


    private function validateInsert(){
        $beneficios = Beneficio::get();
        $errors = [];
        foreach($beneficios as $b){
            if($b->nome_beneficio === $this->nome_beneficio){
                $errors['nome_beneficio'] = 'Já existe um benefício com esse nome';
            }
            if($b->sigla_beneficio === $this->sigla_beneficio){
                $errors['sigla_beneficio'] = 'Já existe um benefício com essa sigla';
            }
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }
    private function validate(){
        $errors = [];
        $this->ativo_beneficio = $this->ativo_beneficio === 'on'? 1 : 0;
        if(!$this->nome_beneficio){
            $errors['nome_beneficio'] = 'Por favor insira o nome do benefício';
        }
        if(!$this->ambito_beneficio){
            $errors['ambito_beneficio'] = 'Insira a Esfera de origem';
        }
        if(!$this->sigla_beneficio){
            $errors['sigla_beneficio'] = 'Insira uma sigla de identificação';
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    public function insert(){
        $this->validate();
        $this->validateInsert();
        return parent::insert();
    }
    public function update(){
        $this->validate();
        return parent::update();
    }

}