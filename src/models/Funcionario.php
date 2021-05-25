<?php 

require_once(realpath(MODEL_PATH."\\Model.php"));

class Funcionario extends Model {
    protected static $tableName = "funcionarios";
    protected static $columns = [
        'id_funcionario',
        'nome_funcionario',
        'cpf_funcionario',
        'escolaridade_funcionario',
        'data_nascimento_funcionario',
        'email_funcionario',
        'senha_funcionario',
        'telefone_funcionario',
        'nivel_acesso',
        'profissão',
        'cargo',
        'vinculo',
        'unidade_funcionario'
    ];
}