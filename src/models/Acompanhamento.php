<?php
require_once(realpath(MODEL_PATH . "\\Model.php"));
require_once(realpath(MODEL_PATH . "\\Funcionario.php"));
require_once(realpath(MODEL_PATH . "\\Pessoa.php"));
require_once(realpath(MODEL_PATH . "\\Familia.php"));

class Acompanhamento extends Model{
    protected static $tableName = 'acompanhamentos';
    protected static $columns = [
        'id_acompanhamento',
        'inicio_acompanhamento',
        'fim_acompanhamento',
        'funcionario_acompanhamento',
        'familia_acompanhamento',
        'unidade_acompanhamento'
    ];
    
    public function desligar(){
        $errors = [];
        if(!$this->fim_acompanhamento){
            $errors['fim_acompanhamento'] = 'Insira a data para o fim do acompanhamento';
        }
        elseif(!DateTime::createFromFormat('Y-m-d', $this->fim_acompanhamento)){
            $errors ['fim_acompanhamento'] = 'Data deve seguir o padrão dd/mm/aaaa.';
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }
    
    public function getTecnico(){
        $tecnico = Funcionario::getOne(['id_funcionario'=> $this->funcionario_acompanhamento]);
        return $tecnico;
    }
    
    public function getFamilia(){
        return Familia::getOne(['id_familia'=> $this->familia_acompanhamento]);
    }
    
    public static function registrosPorPagina($pagina, $itens, $idUnidade = null){
        $objects = [];
        
        $sql = "SELECT a.id_acompanhamento, a.inicio_acompanhamento, f.id_familia, p.nome_pessoa,   
        from acompanhamentos as a, funcionarios as fu, unidades as u 
        WHERE fu.id_funcionario = a.funcionario_acompanhamento
        AND p.id_pessoa = f.referencia_familiar
        AND u.id_unidade = fu.unidade_funcionario
        AND a.fim_acompanhamento is NULL
        AND u.id_unidade = {$idUnidade}
        order by a.id_acompanhamento
        LIMIT {$pagina}, {$itens}";
        
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            $result =  null;
        }else{
            $result = $result;
        }
        if($result){
            while ($row = $result->fetch_assoc()){
                array_push($objects, new Acompanhamento($row));
            }
        }
        return $objects;
    }
    public static function registrosTecnico($idTecnico){
        $objects = [];
        
        $sql = "SELECT * FROM acompanhamentos 
        WHERE funcionario_acompanhamento = {$idTecnico}
        AND fim_acompanhamento is null";
        
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            $result =  null;
        }else{
            $result = $result;
        }
        if($result){
            while ($row = $result->fetch_assoc()){
                array_push($objects, new Acompanhamento ($row));
            }
        }
        return $objects;
    }
}