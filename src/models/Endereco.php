<?php
require_once(MODEL_PATH."\\Model.php");

class Endereco extends Model{
    protected static $tableName = 'enderecos';
    protected static $columns = [
        'id_endereco',
        'tipo_endereco',
        'numero_endereco',
        'cep',
        'logradouro',
        'bairro'
    ];
}