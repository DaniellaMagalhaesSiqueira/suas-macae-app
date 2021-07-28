<?php

require_once(realpath(MODEL_PATH . "\\Model.php"));
require_once(realpath(MODEL_PATH . "\\Unidade.php"));
require_once(realpath(MODEL_PATH . "\\BeneficioPessoa.php"));
require_once(realpath(MODEL_PATH . "\\Familia.php"));
// require_once(realpath(MODEL_PATH . "\\Familia.php"));


class Pessoa extends Model{
    protected static $tableName = 'pessoas';
    protected static $columns = [
        'id_pessoa',
        'nome_pessoa',
        'rg_pessoa',
        'cpf_pessoa',
        'nis',
        'data_nascimento',
        'ativo_pessoa',
        'com_deficiencia',
        'composicao',
        'cor',
        'escolaridade',
        'estado',
        'sexo',
        'genero',
        'gestante',
        'no_scfv',
        'prioritario_scfv',
        'homonimo',
        'nome_mae',
        'ocupacao',
        'renda',
        'data_parto',
        'ultimo_atendimento',
        'nome_pai',
        'vinculo_formal',
        'familia_pessoa',
        'rf'
    ];

    private function validate(){
        $errors = [];

        $this->homonimo = $this->homonimo === 'on' ? 1 : 0;
        $this->com_deficiencia = $this->com_deficiencia==='on'? 1 : 0;
        $this->prioritario_scfv = $this->prioritario_scfv==='on'? 1 : 0;
        $this->no_scfv = $this->no_scfv==='on'? 1 : 0;
        $this->gestante = $this->gestante==='on'? 1 : 0;
        $this->vinculo_formal = $this->vinculo_formal==='on'? 1 : 0;

        if(!$this->nome_pessoa){
            $errors['nome_pessoa'] = 'Nome é um campo obrigatório';
        
        }
        if(!$this->data_nascimento){
            $errors['data_nascimento'] = 'Data de nascimento é obrigatório';
        }elseif(!DateTime::createFromFormat('Y-m-d', $this->data_nascimento)){
            $errors ['data_nascimento'] = 'Data de nascimento deveseguir o padrão dd/mm/aaaa.';
        }
        if(!$this->nome_mae && !$this->nome_pai){
            $errors['nome_mae'] = 'Ao menos uma filiação é obrigatória';
            $errors['nome_pai'] = 'Ao menos uma filiação é obrigatória';
        }

        if(!$this->sexo){
            $errors['sexo'] = 'Informe o sexo da pessoa';
        }

        if(!$this->cor){
            $errors['cor'] = 'Informe a cor da pessoa';
        }
        if(!$this->composicao){
            $errors['composicao'] = 'Informe quem é a pessoa na família.';
        }
        if($this->gestante && !$this->data_parto){
            $errors['data_parto'] = 'Insira a data do parto.';
        }

        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    public function validateOnlyInsert(){
        $errors = [];
        $pessoas = Pessoa::get();
        $this->rf = 0;
        foreach($pessoas as $p){
            if($p->nome_pessoa === $this->nome_pessoa && !$this->homonimo){
                $errors ['nome_pessoa'] = "Esse nome já existe. Código: {$p->id_pessoa}. 
                Marque 'homônimo' ou busque a pessoa {$p->id_pessoa} para alteração.";
            }
        }
        
        if($this->cpf_pessoa){
            foreach($pessoas as $p){
                if($p->cpf_pessoa === $this->cpf_pessoa){
                    $errors['cpf_pessoa'] = 'Esse CPF já está cadastrado';
                }
            }
        }

        if(count($errors)>0){
            throw new ValidationException($errors);
        }
        
    }

    public function insert(){

        $this->validate();
        $this->validateOnlyInsert();
        if(!$this->familia_pessoa){
            $this->ativo_pessoa = 0;
        }
        return parent::insert();
    }

    public function update(){
        $this->validate();
        if(!$this->familia_pessoa){
            $this->ativo_pessoa = 0;
        }

        return parent::update();
    }

    public function getBeneficios(){
        $beneficios = BeneficioPessoa::get(['pes_ben' => $this->id_pessoa]);
        return $beneficios;
    }

    public function getUnidade(){
        if($this->familia_pessoa){
            $familia = Familia::getOne(['id_familia' => $this->familia_pessoa]);
            return $familia->unidade_familia;
        }else{
            return null;
        }
    }

    public static function getComposicao(){
        $objects = [];
        $sql = "SELECT * FROM pessoas WHERE composicao != 'Referencia Familiar'";
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            $result =  null;
        }else{
            $result = $result;
        }
        if($result){
            while ($row = $result->fetch_assoc()){
                array_push($objects, new Pessoa($row));
            }
        }
        return $objects;
    }

    public static function getDesvinculadaBanco(){
        $pessoas = [];
        $sql = "SELECT * From pessoas
        WHERE familia_pessoa IS NULL
        AND composicao != 'Referencia Familia'";
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            $result =  null;
        }else{
            $result = $result;
        }
        if($result){
            while ($row = $result->fetch_assoc()){
                array_push($pessoas, new Beneficio ($row));
            }
        }
        return $pessoas;
    }
    public static function getNomes($string){
        $objects = [];
        $sql = "SELECT * FROM pessoas WHERE nome_pessoa like '%{$string}%'";
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            $result =  null;
        }else{
            $result = $result;
        }
        if($result){
            while ($row = $result->fetch_assoc()){
                array_push($objects, new Pessoa($row));
            }
        }
        return $objects;
    }

    public function getIdade(){
        $idade = 0;
        $data = explode("-",$this->data_nascimento);
        $anoNasc = $data[0];
        $mesNasc = $data[1];
        $diaNasc = $data[3];
        $diaHoje = date('d');
        $mesHoje = date('m');
        $anoHoje = date('Y');

        $idade = $anoHoje - $anoNasc;
        
        if($mesHoje == $mesNasc){
            if($diaHoje < $diaNasc){
                $idade -=1;
            }
        }elseif($mesHoje < $mesNasc){
            $idade -= 1;
        }
        return $idade;  
    }

    public function getSiglaBeneficios(){
        $bps = $this->getBeneficios();
        $string = '';
        foreach($bps as $b){
            $string = " ".$b->getSigla();
        }
        return $string;
    }
    
}
