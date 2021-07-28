<?php
require_once(realpath(MODEL_PATH . "\\Model.php"));
require_once(realpath(MODEL_PATH . "\\Funcionario.php"));
require_once(realpath(MODEL_PATH . "\\Pessoa.php"));

class Atendimento extends Model{
    protected static $tableName = 'atendimentos';
    protected static $columns = [
        'id_atendimento',
        'tipo_atendimento',
        'demanda_atendimento',
        'beneficio_solicitado',
        'beneficio_concedido',
        'data_atendimento',
        'gerou_relatorio',
        'pessoa_atendimento',
        'funcionario_atendimento',
        'unidade_atendimento',
        'familia_atendimento'
    ];

    private function validate(){

        $errors = [];
        
        $this->gerou_relatorio = $this->gerou_relatorio === 'on' ? 1 : 0;

        $this->demanda_atendimento = '- ';
        $this->beneficio_solicitado = '- ';
        $this->beneficio_concedido = '- ';

        if($this->d_pbf){
            $this->demanda_atendimento .= $this->d_pbf . ', ';
        }
        if($this->d_cad){
            $this->demanda_atendimento .= $this->d_cad . ', ';
        }
        if($this->d_passe){
            $this->demanda_atendimento .= $this->d_passe . ', ';
        }
        if($this->d_nv){
            $this->demanda_atendimento .= $this->d_nv . ', ';
        }
        if($this->d_bpc){
            $this->demanda_atendimento .= $this->d_bpc . ', ';
        }
        if($this->d_ceam){
            $this->demanda_atendimento .= $this->d_ceam . ', ';
        }
        if($this->d_event){
            $this->demanda_atendimento .= $this->d_event . ', ';
        }
        if($this->d_creas){
            $this->demanda_atendimento .= $this->d_creas . ', ';
        }
        if($this->d_pop){
            $this->demanda_atendimento .= $this->d_pop . ', ';
        }
        if($this->d_acol){
            $this->demanda_atendimento .= $this->d_acol . ', ';
        }
        if($this->d_cras){
            $this->demanda_atendimento .= $this->d_cras . ', ';
        }
        $this->demanda_atendimento = substr($this->demanda_atendimento, 0, -2);

        //beneficio solicitado
        if($this->bs_cesta_basica){
            $this->beneficio_solicitado .= $this->bs_cesta_basica . ', ';
        }
        if($this->bs_natalidade){
            $this->beneficio_solicitado .= $this->bs_natalidade . ', ';
        }
        if($this->bs_funeral){
            $this->beneficio_solicitado .= $this->bs_funeral . ', ';
        }
        if($this->bs_documentacao){
            $this->beneficio_solicitado .= $this->bs_documentacao . ', ';
        }
        if($this->bs_aluguel_social){
            $this->beneficio_solicitado .= $this->bs_aluguel_social . ', ';
        }
        if($this->bs_material_contrucao){
            $this->beneficio_solicitado .= $this->bs_material_contrucao . ', ';
        }
        if($this->bs_isencao_conta){
            $this->beneficio_solicitado .= $this->bs_isencao_conta . ', ';
        }
        if($this->bs_gas){
            $this->beneficio_solicitado .= $this->bs_gas . ', ';
        }
        if($this->bs_roupas){
            $this->beneficio_solicitado .= $this->bs_roupas . ', ';
        }
        if($this->bs_moveis){
            $this->beneficio_solicitado .= $this->bs_moveis . ', ';
        }
        $this->beneficio_solicitado = substr($this->beneficio_solicitado, 0, -2);

        //beneficio concedido
        if($this->bc_cesta_basica){
            $this->beneficio_concedido .= $this->bc_cesta_basica . ', ';
        }
        if($this->bc_natalidade){
            $this->beneficio_concedido .= $this->bc_natalidade . ', ';
        }
        if($this->bc_funeral){
            $this->beneficio_concedido .= $this->bc_funeral . ', ';
        }
        if($this->bc_documentacao){
            $this->beneficio_concedido .= $this->bc_documentacao . ', ';
        }
        if($this->bc_aluguel_social){
            $this->beneficio_concedido .= $this->bc_aluguel_social . ', ';
        }
        if($this->bc_material_contrucao){
            $this->beneficio_concedido .= $this->bc_material_contrucao . ', ';
        }
        if($this->bc_isencao_conta){
            $this->beneficio_concedido .= $this->bc_isencao_conta . ', ';
        }
        if($this->bc_gas){
            $this->beneficio_concedido .= $this->bc_gas . ', ';
        }
        if($this->bc_roupas){
            $this->beneficio_concedido .= $this->bc_roupas . ', ';
        }
        if($this->bc_moveis){
            $this->beneficio_concedido .= $this->bc_moveis . ', ';
        }
        $this->beneficio_concedido = substr($this->beneficio_concedido, 0, -2);

        if(!$this->tipo_atendimento){
            $errors['tipo_atendimento'] = 'O tipo de atendimento é obrigatório';
        }

        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }


    public function insert(){
        $this->id_atendimento = null;
        $this->validate();
        return parent::insert();
    }

    public static function registrosPorPagina($pagina, $itens, $idFuncionario = null, $idUnidade = null){
        $objects = [];
        
        if($idFuncionario){
            $funcionario = Funcionario::getOne(['id_funcionario'=> $idFuncionario]);
            if($funcionario->nivel_acesso == 1){
                $sql = "SELECT a.id_atendimento, a.data_atendimento, p.nome_pessoa
                FROM atendimentos as a, pessoas as p
                inner join funcionarios as fu where fu.id_funcionario = a.funcionario_atendimento
                and fu.id_funcionario = {$idFuncionario}
                AND p.id_pessoa = a.pessoa_atendimento
                order by a.id_atendimento desc
                LIMIT {$pagina}, {$itens}";
            }else{
            $sql = "SELECT a.id_atendimento, a.data_atendimento, p.nome_pessoa, f.bairro, b.nome_bairro, fu.id_funcionario
            FROM atendimentos as a, pessoas as p, familias as f, bairros as b 
            INNER JOIN funcionarios as fu where fu.id_funcionario = a.funcionario_atendimento
            and fu.id_funcionario = {$idFuncionario}
            AND p.id_pessoa = a.pessoa_atendimento
            and f.id_familia = p.familia_pessoa
            and b.id_bairro = f.bairro
            group by a.id_atendimento
            LIMIT {$pagina}, {$itens}";
            }
           

        }elseif($idUnidade){
            $sql = "SELECT a.id_atendimento, a.data_atendimento, p.nome_pessoa, f.bairro, b.nome_bairro, fu.nome_funcionario, fu.id_funcionario, u.id_unidade
            FROM atendimentos as a, pessoas as p, familias as f, bairros as b, funcionarios as fu, unidades as u
            where u.id_unidade = a.unidade_atendimento
            AND fu.id_funcionario = a.funcionario_atendimento
            and u.id_unidade = {$idUnidade}
            AND p.id_pessoa = a.pessoa_atendimento
            and f.id_familia = p.familia_pessoa
            and b.id_bairro = f.bairro
            order by a.id_atendimento desc
            LIMIT {$pagina}, {$itens}";
        }
        else{
            $sql = "SELECT a.id_atendimento, a.data_atendimento, p.nome_pessoa, b.nome_bairro, fu.nome_funcionario, u.nome_unidade
            FROM atendimentos as a, pessoas as p, familias as f, bairros as b, unidades as u
            INNER JOIN funcionarios as fu where fu.id_funcionario = a.funcionario_atendimento
            and u.id_unidade = a.unidade_atendimento
            AND p.id_pessoa = a.pessoa_atendimento
            and f.id_familia = p.familia_pessoa
            and b.id_bairro = f.bairro
            order by a.id_atendimento
            LIMIT {$pagina}, {$itens}";
        }

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

