<?php
ini_set('display_errors', 0);
session_start();
requiredValidSession();
loadModel("Pessoa");

$pessoas = [];
if(count($_POST) > 0){
    if(!$_POST['filtro_pessoa']){
        addErrorMsg("Selecione um filtro para executar a busca");
    }else{
        switch ($_POST['filtro_pessoa']) {
            case 'nome_pessoa':
                $pessoas = Pessoa::getNomes($_POST['pesquisa_pessoa']);
                foreach($pessoas as $pes){
                    $pes->data_nascimento = (new DateTime($pes->data_nascimento))->format('d/m/Y');
                }
                break;
            case 'data_nascimento':
                $pessoas = Pessoa::get(["data_nascimento" => $_POST['pesquisa_pessoa']]);
                foreach($pessoas as $pes){
                    $pes->data_nascimento = (new DateTime($pes->data_nascimento))->format('d/m/Y');
                }
                break;
            case 'id_pessoa':
                $pessoas = Pessoa::get(["id_pessoa" => $_POST['pesquisa_pessoa']]);
                foreach($pessoas as $pes){
                    $pes->data_nascimento = (new DateTime($pes->data_nascimento))->format('d/m/Y');
                }
                break;
            case 'nis':
                $pessoas = Pessoa::get(["nis" => $_POST['pesquisa_pessoa']]);
                foreach($pessoas as $pes){
                    $pes->data_nascimento = (new DateTime($pes->data_nascimento))->format('d/m/Y');
                }
                break;
            case 'cpf_pessoa':
                $pessoas = Pessoa::get(["cpf_pessoa" => $_POST['pesquisa_pessoa']]);
                foreach($pessoas as $pes){
                    $pes->data_nascimento = (new DateTime($pes->data_nascimento))->format('d/m/Y');
                }
                break;
        }
    }
}
loadTemplateView("buscar_pessoa", ['pessoas' => $pessoas] );