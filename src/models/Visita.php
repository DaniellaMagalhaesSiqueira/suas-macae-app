<?php

require_once(MODEL_PATH . "\\Model.php");
require_once(MODEL_PATH . "\\Familia.php");
require_once(MODEL_PATH . "\\Pessoa.php");

class Visita extends Model{
    protected static $tableName = 'visitas_domiciliares';
    protected static $columns = [
        'id_vd',
        'data_vd',
        'familia_vd',
        'pessoa_vd',
        'demanda_vd',
        'efetivada_vd',
        'unidade_vd', 
        'tecnico_vd'
    ];

    private function validate(){
        $errors = [];
        $this->efetivada_vd = $this->efetivada_vd == 'on'? 1 : 0;
        $this->id_vd = null;
    }

    public function insert(){
        $this->validate();
        return parent::insert();
    }

    public function getRF(){
        $familia = Familia::getOne(['id_familia'=>$this->familia_vd]);
        $rf = Pessoa::getOne(['id_pessoa'=>$familia->referencia_familiar]);
        return $rf->nome_pessoa;
    }
    public function getNomeBairro(){
        $familia = Familia::getOne(['id_familia'=>$this->familia_vd]);
        return $familia->getNomeBairro();
    }

    public static function registrosPorPagina($pagina, $itens, $idFuncionario){
        $objects = [];
        $sql = "SELECT v.id_vd, v.data_vd, p.nome_pessoa, b.nome_bairro 
        FROM visitas_domiciliares v, familias f, pessoas p, bairros b, funcionarios fu
        WHERE v.familia_vd = f.id_familia 
        AND v.tecnico_vd = fu.id_funcionario
        AND fu.id_funcionario = {$idFuncionario}
        AND f.bairro = b.id_bairro
        AND f.referencia_familiar = p.id_pessoa
        ORDER BY id_vd DESC
        LIMIT {$pagina}, {$itens}";

        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            $result =  null;
        }else{
            $result = $result;
        }
        if($result){
            while ($row = $result->fetch_assoc()){
                array_push($objects, new Familia($row));
            }
        }
        return $objects;
    }
}