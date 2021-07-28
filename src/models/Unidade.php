<?php
require_once(MODEL_PATH."\\Model.php");

class Unidade extends Model{

    protected static $tableName = 'unidades';
    protected static $columns = [
        'id_unidade',
        'nome_unidade',
        'id_governo',
        'capacidade_atendimento',
        'data_inauguracao',
        'horario_funcionamento',
<<<<<<< HEAD
        'bairro_unidade',
        'num_endereco',
        'logradouro',
        'tipo_unidade',
        'tel1_unidade',
        'tel2_unidade',
        'email_unidade',
        'ativo_unidade'
    ];


    public function validation(){
        $errors = [];
        if(!$this->nome_unidade){
            $errors['nome_unidade'] = 'O campo nome é obrigatório';
        }
        if(!$this->tipo_unidade){
            $errors['tipo_unidade'] = 'O tipo é um campo obrigatório';
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    public function insert(){
        $this->validation();
        return parent::insert();
    }
    public function update(){
        $this->validation();
        return parent::update();
    }
=======
        'endereco_unidade'
    ];
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
}