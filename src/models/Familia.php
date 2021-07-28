<?php

require_once(realpath(MODEL_PATH . "\\Model.php"));
require_once(realpath(MODEL_PATH . "\\Unidade.php"));
require_once(realpath(MODEL_PATH . "\\Pessoa.php"));
require_once(realpath(MODEL_PATH . "\\Agendamento.php"));
require_once(realpath(MODEL_PATH . "\\Bairro.php"));

class Familia extends Model{
    protected static $tableName = "familias";
    protected static $columns = [
        'id_familia',
        'referencia_familiar',
        'data_inclusao',
        'ativo_familia',
        'data_desligamento',
        'motivo_desligamento',
        'mulher_chefe',
        'perfil_creas',
        'trabalho_infantil',
        'acolhimento',
        'tipo_moradia',
        'valor_moradia',
        'unidade_familia',
        'descumprimento',
        'num_endereco',
        'tipo_endereco',
        'logradouro',
        'complemento_endereco',
        'cep',
        'bairro',
        'ponto_referencia',
        'telefone1',
        'telefone2',
        'telefone3',
        'nome1',
        'nome2',
        'nome3',
        'forma_ingresso',
        'demandas_iniciais',
        'acompanhamento_familia'
    ];
    protected $totalBeneficio;
    protected $totalRenda;

    public function getPessoas(){
        $pes = Pessoa::get(['familia_pessoa' => $this->id_familia]);
        return $pes;
    }

    public function getTotalRenda(){
        $pes = $this->getPessoas();
        $total = 0;
        foreach($pes as $p){
            $total += $p->renda;
        }
        return $total;
    }

    public function getPercapita(){
        $result = 0;
        $pes = $this->getPessoas();
        $qtd = count($pes);
        if($qtd > 0){
            $result = ($this->getTotalRenda())/$qtd;
        }else{
            $result = $this->getTotalRenda();
        }
        return $result;

    }

    public function getTotalBeneficios(){
        $beneficios = $this->pegarNomesBeneficios();
        $total = 0;
        foreach($beneficios as $b){
            $total += $b->valor_beneficio;
        }
        return $total;
    }


    private function validate(){
        $errors = [];

        $this->demandas_iniciais = '- ';
        $this->mulher_chefe = $this->mulher_chefe==='on' ? 1: 0;
        $this->perfil_creas = $this->perfil_creas==='on' ? 1: 0;
        $this->descumprimento = $this->descumprimento==='on' ? 1: 0;
        $this->acolhimento = $this->acolhimento ==='on' ? 1: 0;
        $this->trabalho_infantil = $this->trabalho_infantil ==='on' ? 1: 0;

        if(strpos($this->forma_ingresso, 'utros:')){
            $this->forma_ingresso = "Outros: ".$this->outros . ".";
        }else{
            $this->outros = " ";
        }

        if($this->pbf){
            $this->demandas_iniciais .= $this->pbf . ', ';
        }
        if($this->cad){
            $this->demandas_iniciais .= $this->cad . ', ';
        }
        if($this->passe){
            $this->demandas_iniciais .= $this->passe . ', ';
        }
        if($this->nv){
            $this->demandas_iniciais .= $this->nv . ', ';
        }
        if($this->bpc){
            $this->demandas_iniciais .= $this->bpc . ', ';
        }
        if($this->ceam){
            $this->demandas_iniciais .= $this->ceam . ', ';
        }
        if($this->event){
            $this->demandas_iniciais .= $this->event . ', ';
        }
        if($this->creas){
            $this->demandas_iniciais .= $this->creas . ', ';
        }
        if($this->pop){
            $this->demandas_iniciais .= $this->pop . ', ';
        }
        if($this->acol){
            $this->demandas_iniciais .= $this->acol . ', ';
        }
        if($this->cras){
            $this->demandas_iniciais .= $this->cras . ', ';
        }
        $this->demandas_iniciais = substr($this->demandas_iniciais, 0, -2);

        if(!$this->bairro){
            $errors['bairro'] = 'O campo bairro é obrigatório';
        }
        if($this->id_familia === ''){
            $this->id_familia = null;
        }
        if(!$this->num_endereco === ''){
            $this->num_endereco = null;
        }
        if(count($errors)>0){
            throw new ValidationException;
        }

    }
    
    public function getRF(){
        $pessoa = Pessoa::getOne(['id_pessoa' => $this->referencia_familiar]);
        return $pessoa;
    }

    public function getQuantidade(){
        $pes = $this->getPessoas();
        return count($pes);
    }
    public function insert(){
        $this->acompanhamento_familia = 0;
        $this->validate();

        return parent::insert();
    }

    public function getNomeBairro(){
        $bairro = Bairro::getOne(['id_bairro'=> $this->bairro]);
        return $bairro->nome_bairro;
    }

    public function validateDesligamento(){
        $errors = [];
        if(!$this->motivo_desligamento){
            $errors['motivo_desligamento'] = 'O motivo do desligamento é obrigatório';
        }
        if(!$this->data_desligamento){
            $errors ['data_desligamento'] = 'Insira uma data de desligamento';
        }
        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    public function updateDesligamento(){
        $this->validateDesligamento();
        return parent::update();
    }

    public function update(){
        $this->validate();
        return parent::update();
    }

    public function pegarNomesBeneficios(){
        $beneficios = [];
        $sql = "Select nome_beneficio, valor_beneficio From beneficios_tipo b, pessoas p, beneficio_pessoa bp, familias f
        where p.id_pessoa = bp.pes_ben
        and b.id_beneficio = bp.ben_pes
        and p.familia_pessoa = f.id_familia
        and id_familia = {$this->id_familia}; ";
        $result = Database::getResultFromQuery($sql);
        if($result->num_rows == 0){
            $result =  null;
        }else{
            $result = $result;
        }
        if($result){
            while ($row = $result->fetch_assoc()){
                array_push($beneficios, new Beneficio ($row));
            }
        }
        return $beneficios;
    }

    public static function porNomeRf($string){
        $objects = [];
        $sql = "SELECT * FROM familias f, pessoas p 
        WHERE f.referencia_familiar = p.id_pessoa
        AND p.nome_pessoa LIKE '%{$string}%'";
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
    public static function porDataRf($string){
        $objects = [];
        $sql = "SELECT f.* FROM familias f, pessoas p 
        WHERE f.referencia_familiar = p.id_pessoa
        AND p.data_nascimento = '{$string}'";
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
    public static function porCpfRf($string){
        $objects = [];
        $sql = "SELECT f.* FROM familias f, pessoas p 
        WHERE f.referencia_familiar = p.id_pessoa
        AND p.cpf_pessoa = '{$string}'";
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

    public function getUnidade(){
        $unidade = Unidade::getOne(['id_unidade' => $this->unidade_familia]);
        return $unidade;
    }

    public function getBairro(){
        $bairro = Bairro::getOne(['id_bairro' => $this->bairro]);
        return $bairro->nome_bairro;
    }

    public function verificaAgendamento(){
        $agendamentos = Agendamento::get(['fechado_agendamento'=>0]);
        foreach($agendamentos as $a){
            if($a->familia_agendamento === $this->id_familia){
                return true;
            }
        }
        return false;
    }

}