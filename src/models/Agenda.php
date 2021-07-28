<?php

require_once(realpath(MODEL_PATH . "\\Model.php"));


class Agenda extends Model{
    protected static $tableName = 'agendas';
    protected static $columns = [
        'id_agenda',
        'data_agenda',
        'quantidade_agenda',
        'vagas_agenda',
        'fechada_agenda',
        'unidade_agenda'
    ];


    private function validate(){
        $agendas = Agenda::get(['fechada_agenda' => 0]);
        $errors = [];
        if($this->id_agenda == ''){
            $this->id_agenda = null;
        }
        foreach($agendas as $a){
            if($a->data_agenda == $this->data_agenda){
                $errors['data_agenda'] = 'Já existe um agendamento para esta data';
            }
        }
        if(!$this->data_agenda){
            $errors['data_agenda'] = 'Campo obrigatório';
        }
        if(!$this->quantidade_agenda){
            $errors['quantidade_agenda'] = 'Campo obrigatório';
        }

        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    public function insert(){
        $this->validate();
        return parent::insert();
    }

    private function validateUpdate(){
        $errors = [];
        $agendas = Agenda::get(['fechada_agenda'=> 0]);
        foreach($agendas as $a){
            if($this->id_agenda != $a->id_agenda){
                if($this->data_agenda == $a->data->agenda){
                    $errors['data_agenda'] = 'Já existe um agendamento para esta data';
                }
            }
        }
        if(!$this->data_agenda){
            $errors['data_agenda'] = 'Campo obrigatório';
        }
        if(!$this->quantidade_agenda){
            $errors['quantidade_agenda'] = 'Campo obrigatório';
        }
    }

    public function update(){
        $this->validateUpdate();
        return parent::update();
    }

    public function dataFormatada(){
        $this->data_agenda = (new DateTime($this->data_agenda))->format('d/m/Y');
        return $this->data_agenda;
    }
    public function diaSemana(){
        $diasemana = array(' (Domingo)', ' (Segunda-feira)', ' (Terça-feira)', ' (Quarta-feira)', ' (Quinta-feira)', ' (Sexta-feira)', ' (Sábado)');
        $diaN = date('w', strtotime($this->data_agenda));
        // {$agenda->data_agenda} {$diasemana[$diaN]}
        return $diasemana[$diaN];
    }
}