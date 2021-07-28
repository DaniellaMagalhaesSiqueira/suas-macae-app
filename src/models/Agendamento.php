<?php

require_once(realpath(MODEL_PATH."\\Model.php"));
require_once(realpath(MODEL_PATH."\\Agenda.php"));
require_once(realpath(MODEL_PATH."\\Familia.php"));


class Agendamento extends Model{

    protected static $tableName = 'agendamentos';
    protected static $columns = [
        'id_agendamento',
        'agenda_agendamento',
        'familia_agendamento',
        'tecnico_agendamento',
        'fechado_agendamento',
        'unidade_agendamento'
    ];


    private function validate(){
        $errors = [];
       
        if(!$this->agenda_agendamento){
            $errors['agenda_agendamento'] = 'Escolha uma data.';
        }

        $agendam = Agendamento::get(['fechado_agendamento' => 0]);

        foreach($agendam as $a){
            if($a->familia_agendamento == $this->familia_agendamento){
                $agenda = Agenda::getOne(['id_agenda'=>$a->id_agenda]);
                $agenda->data_agenda = (new DateTime($agenda->data_agenda))->format('d/m/Y');
                $diasemana = array(' (Domingo)', ' (Segunda-feira)', ' (Terça-feira)', ' (Quarta-feira)', ' (Quinta-feira)', ' (Sexta-feira)', ' (Sábado)');
                $diaN = date('w', strtotime($agenda->data_agenda));
                $errors['familia_agendamento'] = "Família já possui um agendamento no dia {$agenda->data_agenda} {$diasemana[$diaN]}";
            }
        }

        if(count($errors)>0){
            throw new ValidationException($errors);
        }
    }

    public function insert(){
        $this->validate();
        return parent::insert();
    }

    public function pegarFamilia(){
        return Familia::getOne(['id_familia'=>$this->familia_agendamento]);
    }
    public function pegarAgenda(){
        return Agenda::getOne(['id_agenda'=>$this->agenda_agendamento]);
    }
    public function delete(){
        parent::deleteById($this->id_agendamento, 'id_agendamento');
    }
}