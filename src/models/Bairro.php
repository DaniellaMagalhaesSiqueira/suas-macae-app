<?php
require_once(MODEL_PATH."\\Model.php");
require_once(MODEL_PATH."\\Unidade.php");


class Bairro extends Model{
    protected static $tableName = "bairros";
    protected static $columns = [
        'id_bairro',
        'nome_bairro',
        'unidade_bairro'
    ];


    public function getNomeUnidade(){
        $nome = 'Sem abrangência';
        if($this->unidade_bairro){
            $unidade = Unidade::getOne(['id_unidade'  => $this->unidade_bairro]);
            $nome = $unidade->nome_unidade;
        }
        return $nome;
    }

    private function validate(){
        $errors = [];

        if(!$this->nome_bairro){
            $errors ['nome_bairro'] = 'Insira um nome para o bairro';
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    public function insert(){
        $this->validate();
        return parent::insert();
    }
    public function update(){
        $this->validate();
        return parent::update();
    }
}