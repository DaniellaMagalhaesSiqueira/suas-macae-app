<?php
class Model{
    protected static $tableName = "";
    protected static $columns = [];
    protected $values;

    function __construct($arr){
        $this->loadFromArray($arr);     
    }
// o construtor passará os valores dos campos da tabela por chave e valor
    public function loadFromArray($arr){
        if($arr){
            foreach($arr as $key => $value){
                $this->$key = $value;
            }
        }
    }

    public function __get($key){
        return $this->values[$key];
    }

    public function __set($key, $value){
        $this->values[$key] = $value;
    }

    public static function getOne($filters = [], $columns = '*', $op = '='){
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters,  $columns, $op);
        //retorno o primeiro registro obtido criando um objeto da classe desejada
        return $result ? new $class($result->fetch_assoc()) : null;
    }

    public static function get($filters = [], $columns = '*', $op="="){
        $objects = [];
        $result = static::getResultSetFromSelect($filters,  $columns, $op);
        if($result){
            $class = get_called_class();
            while ($row = $result->fetch_assoc()){
                array_push($objects, new $class($row));
            }
        }
        return $objects;
    }

    public static function getResultSetFromSelect($filters = [], $columns = '*', $op='='){
        $sql = "SELECT ${columns} FROM "
            . static::$tableName 
            . static::getFilters($filters, $op);
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            return null;
        }else{
            return $result;
        }
    }
    
    public function insert(){
        $sql = "INSERT INTO " . static::$tableName . " ("
            . implode(",", static::$columns) . ") VALUES (";
            foreach(static::$columns as $column){
                $sql .= static::getFormatedValue($this->$column) . ",";
            }
            $sql[strlen($sql) - 1] = ')';
            $id = Database::executeSql($sql);
            $this->id = $id;
    }
    
    public function update(){
        $sql = "UPDATE ". static::$tableName . " SET ";
        foreach(static::$columns as $column){
            $sql .= " ${column} = " . static::getFormatedValue($this->$column) . ",";
        }
        $sql[strlen($sql) - 1] = ' '; 
        $idColmunName = static::$columns[0];
        $sql .= "WHERE {$idColmunName} = {$this->$idColmunName}";
        Database::executeSql($sql);
        
    }

    private static function getFilters($filters, $op="="){
        $sql = '';
        if(count($filters) > 0){
            //muda nada no sql mas permite a inclusão de um and
            $sql .= " WHERE 1 = 1";
            foreach($filters as $column=> $value){
                $sql .= " AND ${column} {$op} ". static::getFormatedValue($value);
            }
        }
        return $sql;
    }


    private static function getFormatedValue($value){
        if(is_null($value)){
            return "null";
        }elseif(gettype($value) === 'string'){
            return "'${value}'";
        }else{
            return $value;
        }
    }
}