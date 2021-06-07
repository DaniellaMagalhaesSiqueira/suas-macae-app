<?php
require_once(MODEL_PATH."\\Model.php");

class Unidade extends Model{

    protected static $tableName = 'unidades';
    protected static $columns = [
        'id_unidade',
        'nome_unidade',
        'id_governo',
        'capacidade_atendimento',
        'data_inauguracao',
        'horario_funcionamento',
        'endereco_unidade'
    ];
}