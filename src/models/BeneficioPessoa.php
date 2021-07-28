<?php 
require_once(realpath(MODEL_PATH."\\Model.php"));
require_once(realpath(MODEL_PATH."\\Pessoa.php"));
require_once(realpath(MODEL_PATH."\\Beneficio.php"));

class BeneficioPessoa extends Model{
    protected static $tableName = 'beneficio_pessoa';
    protected static $columns = [
        'id_beneficio_pessoa',
        'ben_pes',
        'pes_ben',
        'valor_beneficio'
    ];
    private $pessoa;
    private $beneficio;

    public function getPessoa(){
        $this->pessoa = Pessoa::getOne(['id_pessoa' => $this->pes_ben]);
        return $this->pessoa;
    }
    public function getBeneficio(){
        $this->beneficio = Pessoa::getOne(['id_beneficio' => $this->ben_pes]);
        return $this->beneficio;
    }

    public function getNome(){
        $bs = Beneficio::get();
        foreach($bs as $b){
            if($this->ben_pes === $b->id_beneficio){
                return $b->nome_beneficio;
            }
        }
    }
    public function getSigla(){
        $bs = Beneficio::get();
        foreach($bs as $b){
            if($this->ben_pes === $b->id_beneficio){
                return $b->sigla_beneficio;
            }
        }
    }

    public static function deleteById($id, $coluna){
        $sql = "DELETE FROM ".static::$tableName . " WHERE {$coluna} = {$id}";
        Database::executeSql($sql);
    }
    public function delete(){
        parent::deleteById($this->id_beneficio_pessoa, 'id_beneficio_pessoa');
    }

}