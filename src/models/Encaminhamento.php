<?php
require_once(realpath(MODEL_PATH . "\\Model.php"));
require_once(realpath(MODEL_PATH . "\\Funcionario.php"));
require_once(realpath(MODEL_PATH . "\\Pessoa.php"));

class Encaminhamento extends Model{
    protected static $tableName = 'encaminhamentos';
    protected static $columns = [
        'id_encaminhamento',
        'destino_encaminhamento',
        'pessoa_encaminhamento',
        'data_encaminhamento',
        'familia_encaminhamento',
        'atendimento_encaminhamento'
    ];


}