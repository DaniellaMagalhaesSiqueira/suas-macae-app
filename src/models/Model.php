<?php
class Model{
    protected static $tableName = "";
    protected static $columns = [];
    protected $values;
<<<<<<< HEAD
    
    function __construct($arr, $sanitize = true){
        $this->loadFromArray($arr, $sanitize);     
    }
    // o construtor passará os valores dos campos da tabela por chave e valor
    public function loadFromArray($arr, $sanitize = true){
        if($arr){
            $conn = Database::getConnection();
            foreach($arr as $key => $value){
                $cleanValue= $value;
                if($sanitize && isset($cleanValue)){
                    $cleanValue = strip_tags(trim($cleanValue));
                    // $cleanValue = htmlentities($cleanValue, ENT_NOQUOTES);
                    $cleanValue = mysqli_real_escape_string($conn, $cleanValue);
                    $this->$key = $cleanValue;
                }
            }
            $conn->close();
        }
    }
    
    public function __get($key){
        return $this->values[$key];
    }
    
    public function __set($key, $value){
        $this->values[$key] = $value;
    }
    
    public function getValues(){
        return $this->values;
    }
    
=======

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

>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
    public static function getOne($filters = [], $columns = '*', $op = '='){
        $class = get_called_class();
        $result = static::getResultSetFromSelect($filters,  $columns, $op);
        //retorno o primeiro registro obtido criando um objeto da classe desejada
        return $result ? new $class($result->fetch_assoc()) : null;
    }
<<<<<<< HEAD
    
=======

>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
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
<<<<<<< HEAD
    
    public static function getResultSetFromSelect($filters = [], $columns = '*', $op='='){
        $sql = "SELECT ${columns} FROM "
        . static::$tableName 
        . static::getFilters($filters, $op);
=======

    public static function getResultSetFromSelect($filters = [], $columns = '*', $op='='){
        $sql = "SELECT ${columns} FROM "
            . static::$tableName 
            . static::getFilters($filters, $op);
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            return null;
        }else{
            return $result;
        }
    }
    
    public function insert(){
        $sql = "INSERT INTO " . static::$tableName . " ("
<<<<<<< HEAD
        . implode(",", static::$columns) . ") VALUES (";
        foreach(static::$columns as $column){
            $sql .= static::getFormatedValue($this->$column) . ",";
        }
        $sql[strlen($sql) - 1] = ')';
        $id = Database::executeSql($sql);
        return $this->id = $id;
=======
            . implode(",", static::$columns) . ") VALUES (";
            foreach(static::$columns as $column){
                $sql .= static::getFormatedValue($this->$column) . ",";
            }
            $sql[strlen($sql) - 1] = ')';
            $id = Database::executeSql($sql);
            $this->id = $id;
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
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
<<<<<<< HEAD
        return $this->id;
    }
    
    public static function getCount($filters=[]){
        $result = static::getResultSetFromSelect(
            $filters, 'count(*) as count');
            return $result->fetch_assoc()['count'];
        }
        
        public function delete(){
            static::deleteById($this->id, 'id');
        }
        
        public static function deleteById($id, $columnId){
            $sql = "DELETE FROM ".static::$tableName . " WHERE {$columnId} = {$id}";
            Database::executeSql($sql);
        }
        
        protected static function getFilters($filters, $op="="){
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
        
        
        protected static function getFormatedValue($value){
            if(is_null($value)){
                return "null";
            }elseif(gettype($value) === 'string'){
                return "'${value}'";
            }else{
                return $value;
            }
        }
        public static function totalAcompanhamentos(){  
            $count = 0;
            $sql = "SELECT COUNT(a.id_acompanhamento) as count FROM acompanhamentos as a, unidades as u
            WHERE a.unidade_acompanhamento = u.id_unidade
            AND a.fim_acompanhamento IS NULL";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        
        public static function iniciadasAcompanhamento($mes){  
            $count = 0;
            $sql = "SELECT COUNT(a.id_acompanhamento) FROM acompanhamentos as a, unidades as u
            WHERE u.id_unidade = a.unidade_acompanhamento
            AND YEAR(a.inicio_acompanhamento) = YEAR(CURRENT_DATE)
            AND MONTH(a.inicio_acompanhamento) = {$mes}
            AND a.fim_acompanhamento IS NULL";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        
        public static function extremaPobreza($mes){
            $objects = [];
            $familias = [];
            $sql = "SELECT distinct f.id_familia FROM acompanhamentos AS a, familias AS f, unidades as u
            WHERE u.id_unidade = a.unidade_acompanhamento
            AND f.id_familia = a.familia_acompanhamento
            AND YEAR(a.inicio_acompanhamento) = YEAR(CURRENT_DATE)
            AND MONTH(a.inicio_acompanhamento) = {$mes}
            AND a.fim_acompanhamento IS NULL";
            
            $result = Database::getResultFromQuery($sql);
            
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            if($result){
                while ($row = $result->fetch_assoc()){
                    array_push($objects, $row);
                }
            }
            foreach($objects as $o){
                array_push($familias, $o['id_familia']);
            }
            
            return $familias;
            
        }
        
        public static function acompPBF($mes){  
            $count = 0;
            $sql = "SELECT COUNT(a.id_acompanhamento) AS count FROM acompanhamentos AS a, familias AS f, unidades as u,
            pessoas AS p, beneficio_pessoa as bp, beneficios_tipo as b
            WHERE u.id_unidade = a.unidade_acompanhamento
            AND f.id_familia = a.familia_acompanhamento
            AND YEAR(a.inicio_acompanhamento) = YEAR(CURRENT_DATE)
            AND MONTH(a.inicio_acompanhamento) = {$mes}
            AND a.fim_acompanhamento IS NULL
            AND p.familia_pessoa = f.id_familia
            AND p.id_pessoa = bp.pes_ben
            AND b.id_beneficio = bp.ben_pes
            AND b.nome_beneficio LIKE  '%Bolsa Fam%'";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function acompPBFDesc($mes){  
            $count = 0;
            $sql = "SELECT COUNT(a.id_acompanhamento) AS count FROM acompanhamentos AS a, familias AS f, unidades as u,
            pessoas AS p, beneficio_pessoa as bp, beneficios_tipo as b
            WHERE u.id_unidade = a.unidade_acompanhamento
            AND f.id_familia = a.familia_acompanhamento
            AND YEAR(a.inicio_acompanhamento) = YEAR(CURRENT_DATE)
            AND MONTH(a.inicio_acompanhamento) = {$mes}
            AND a.fim_acompanhamento IS NULL
            AND p.familia_pessoa = f.id_familia
            AND p.id_pessoa = bp.pes_ben
            AND b.id_beneficio = bp.ben_pes
            AND b.nome_beneficio LIKE  '%Bolsa Fam%'
            AND f.descumprimento = 1";
                
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function acompBPC($mes){  
            $count = 0;
            $sql = "SELECT COUNT(a.id_acompanhamento) AS count FROM acompanhamentos AS a, familias AS f, unidades as u,
            pessoas AS p, beneficio_pessoa as bp, beneficios_tipo as b
            WHERE u.id_unidade = a.unidade_acompanhamento
            AND f.id_familia = a.familia_acompanhamento
            AND YEAR(a.inicio_acompanhamento) = YEAR(CURRENT_DATE)
            AND MONTH(a.inicio_acompanhamento) = {$mes}
            AND a.fim_acompanhamento IS NULL
            AND p.familia_pessoa = f.id_familia
            AND p.id_pessoa = bp.pes_ben
            AND b.id_beneficio = bp.ben_pes
            AND b.nome_beneficio LIKE '%Prestação Continuada%'";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function trabalhoInfantil($mes){  
            $count = 0;
            $sql = "SELECT COUNT(a.id_acompanhamento) AS count FROM acompanhamentos AS a, familias AS f, unidades as u
            WHERE u.id_unidade = a.unidade_acompanhamento
            AND f.id_familia = a.familia_acompanhamento
            AND YEAR(a.inicio_acompanhamento) = YEAR(CURRENT_DATE)
            AND MONTH(a.inicio_acompanhamento) = {$mes}
            AND a.fim_acompanhamento IS NULL
            AND f.trabalho_infantil = 1";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function acolhimento($mes){  
            $count = 0;
            $sql = "SELECT COUNT(a.id_acompanhamento) AS count FROM acompanhamentos AS a, familias AS f, unidades as u
            WHERE u.id_unidade = a.unidade_acompanhamento
            AND f.id_familia = a.familia_acompanhamento
            AND YEAR(a.inicio_acompanhamento) = YEAR(CURRENT_DATE)
            AND MONTH(a.inicio_acompanhamento) = {$mes}
            AND a.fim_acompanhamento IS NULL
            AND f.acolhimento = 1";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function totalAtendimentos($mes){  
            $count = 0;
            $sql = "SELECT COUNT(id_atendimento) FROM atendimentos as a, unidades as u
            WHERE u.id_unidade = a.unidade_atendimento
            AND YEAR(data_atendimento) = YEAR(CURRENT_DATE)
            AND MONTH(data_atendimento) = {$mes}";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function inclusaoCad($mes){  
            $count = 0;
            $sql = "SELECT COUNT(e.id_encaminhamento) as count FROM encaminhamentos as e, unidades as u, atendimentos as a
            WHERE u.id_unidade = a.unidade_atendimento
            AND a.id_atendimento = e.atendimento_encaminhamento
            AND YEAR(e.data_encaminhamento) = YEAR(CURRENT_DATE)
            AND MONTH(e.data_encaminhamento) = {$mes}
            AND e.destino_encaminhamento LIKE '%Inclusão no CAD%'";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function atualizacaoCad($mes){  
            $count = 0;
            $sql = "SELECT COUNT(e.id_encaminhamento) as count FROM encaminhamentos as e, unidades as u, atendimentos as a
            WHERE u.id_unidade = a.unidade_atendimento
            AND a.id_atendimento = e.atendimento_encaminhamento
            AND YEAR(e.data_encaminhamento) = YEAR(CURRENT_DATE)
            AND MONTH(e.data_encaminhamento) = {$mes}
            AND e.destino_encaminhamento LIKE '%Atualização do CAD%'";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function acessoBPC($mes){  
            $count = 0;
            $sql = "SELECT COUNT(e.id_encaminhamento) as count FROM encaminhamentos as e, unidades as u, atendimentos as a
                WHERE u.id_unidade = a.unidade_atendimento
                AND a.id_atendimento = e.atendimento_encaminhamento
                AND YEAR(e.data_encaminhamento) = YEAR(CURRENT_DATE)
                AND MONTH(e.data_encaminhamento) = {$mes}
                AND e.destino_encaminhamento LIKE '%Acesso ao BP%'";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function creas($mes){  
            $count = 0;
            $sql = "SELECT COUNT(e.id_encaminhamento) as count FROM encaminhamentos as e, unidades as u, atendimentos as a
                WHERE u.id_unidade = a.unidade_atendimento
                AND a.id_atendimento = e.atendimento_encaminhamento
                AND YEAR(e.data_encaminhamento) = YEAR(CURRENT_DATE)
                AND MONTH(e.data_encaminhamento) = {$mes}
                AND e.destino_encaminhamento LIKE '%Inclusão no CAD%' 'CREAS'";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function visitasDomiciliares($mes){  
            $count = 0;
            $sql = "SELECT COUNT(v.id_vd) as count FROM visitas_domiciliares as v, unidades as u
            WHERE u.id_unidade = v.unidade_vd
            AND YEAR(v.data_vd) = YEAR(CURRENT_DATE)
            AND MONTH(v.data_vd) = {$mes} ";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function auxilioNatalidade($mes){  
            $count = 0;
            $sql = "SELECT COUNT(a.beneficio_concedido) from atendimentos as a, unidades as u
            WHERE u.id_unidade = a.unidade_atendimento
            AND YEAR(a.data_atendimento) = YEAR(CURRENT_DATE)
            AND MONTH(a.data_atendimento) = {$mes}
            AND a.beneficio_concedido like '%natalidade%'";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function auxilioFuneral($mes){  
            $count = 0;
            $sql = "SELECT COUNT(a.beneficio_concedido) from atendimentos as a, unidades as u
            WHERE u.id_unidade = a.unidade_atendimento
            AND YEAR(a.data_atendimento) = YEAR(CURRENT_DATE)
            AND MONTH(a.data_atendimento) = {$mes}
            AND a.beneficio_concedido like '%funeral%'";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }

        public static function outrosAuxilios($mes){
            $count = 0;
            $total = 0;
            $auxs = ['%Cesta%', '%passagens%', '%retirada de documenta%', '%aluguel social%', '%aterial constr%',
            '%o de contas de %', '%xílio gás%', '%Roupas%', '%Móveis%'];
            for($i = 0; $i < count($auxs); $i++){

                $sql = "SELECT COUNT(a.beneficio_concedido) from atendimentos as a, unidades as u
                WHERE u.id_unidade = a.unidade_atendimento
                AND YEAR(a.data_atendimento) = YEAR(CURRENT_DATE)
                AND MONTH(a.data_atendimento) = {$mes}
                AND a.beneficio_concedido like '{$auxs[$i]}'";

                $result = Database::getResultFromQuery($sql);
                if($result->num_rows == 0){
                    $result =  null;
                }else{
                    $result = $result;
                }
                $count =  $result->fetch_assoc();
                $total += intval($count['count']);
            }

            return  $total;
        }

        public static function scfvZero(){  
            $count = 0;
            $sql = "SELECT  COUNT(f.id_familia) AS count
            from familias as f, pessoas as p, unidades as u
            Where u.id_unidade = f.unidade_familia
            AND p.familia_pessoa = f.id_familia
            AND p.no_scfv = 1
            AND  TIMESTAMPDIFF(YEAR, p.data_nascimento, curdate()) <= 6";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function scfvSete(){  
            $count = 0;
            $sql = "SELECT  COUNT(f.id_familia) AS count
            from familias as f, pessoas as p, unidades as u
            Where u.id_unidade = f.unidade_familia
            AND p.familia_pessoa = f.id_familia
            AND p.no_scfv = 1
            AND  TIMESTAMPDIFF(YEAR, p.data_nascimento, curdate()) <= 14
            AND TIMESTAMPDIFF(YEAR, p.data_nascimento, curdate()) >= 7";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function scfvQuinze(){  
            $count = 0;
            $sql = "SELECT  COUNT(f.id_familia) AS count
            from familias as f, pessoas as p, unidades as u
            Where u.id_unidade = f.unidade_familia
            AND p.familia_pessoa = f.id_familia
            AND p.no_scfv = 1
            AND  TIMESTAMPDIFF(YEAR, p.data_nascimento, curdate()) <= 15
            AND TIMESTAMPDIFF(YEAR, p.data_nascimento, curdate()) >= 17";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function scfvAdulto(){  
            $count = 0;
            $sql = "SELECT  COUNT(f.id_familia) AS count
            from familias as f, pessoas as p, unidades as u
            Where u.id_unidade = f.unidade_familia
            AND p.familia_pessoa = f.id_familia
            AND p.no_scfv = 1
            AND  TIMESTAMPDIFF(YEAR, p.data_nascimento, curdate()) <= 18
            AND TIMESTAMPDIFF(YEAR, p.data_nascimento, curdate()) >= 59";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function scfvIdoso(){  
            $count = 0;
            $sql = "SELECT  COUNT(f.id_familia) AS count
            from familias as f, pessoas as p, unidades as u
            Where u.id_unidade = f.unidade_familia
            AND p.familia_pessoa = f.id_familia
            AND p.no_scfv = 1
            AND  TIMESTAMPDIFF(YEAR, p.data_nascimento, curdate()) >= 60";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
        public static function scfvComDeficiencia(){  
            $count = 0;
            $sql = "SELECT  COUNT(f.id_familia) AS count
            from familias as f, pessoas as p, unidades as u
            Where u.id_unidade = f.unidade_familia
            AND p.familia_pessoa = f.id_familia
            AND p.no_scfv = 1
            AND  p.com_deficiencia = 1";
            
            $result = Database::getResultFromQuery($sql);
            if($result->num_rows == 0){
                $result =  null;
            }else{
                $result = $result;
            }
            $count =  $result->fetch_assoc();
            return  $count['count'];
        }
    }
=======
        
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
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
