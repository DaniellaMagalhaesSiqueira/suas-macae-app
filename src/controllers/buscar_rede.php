<?php
ini_set("display_errors", 0);
session_start();
requiredValidSession();
loadModel('Rede');


$exception = null;

$redes = [];
if(count($_POST) > 0){
    if(!$_POST['filtro_pessoa']){
        addErrorMsg("Selecione um filtro para executar a busca");
    }else{
        switch ($_POST['filtro_pessoa']) {
            case 'nome_rede':
                $redes = Rede::getNomes($_POST['pesquisa_rede']);
                break;
            case 'setor_rede':
                $redes = Rede::getNomes($_POST['pesquisa_rede'], 'setor_rede');
                break;
            case 'id_rede':
                $redes = Rede::get(["id_rede" => $_POST['pesquisa_rede']]);
                break;
            case 'publico_rede':
                $redes = Rede::getNomes($_POST['pesquisa_rede'], 'publico_rede');
                break;
            case 'contato_rede':
                $redes = Rede::getNomes($_POST['pesquisa_rede'], 'contato_rede');
                break;
        }
    }
}


loadTemplateView('buscar_rede',['redes'=>$redes]);