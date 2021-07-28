<?php
ini_set("display_errors", 0);

session_start();
requiredValidSession();
loadModel("Familia");
loadModel("Unidade");
$subtitulo = 'Selecione um filtro';

if($_GET['atender']==1) {
    $subtitulo = 'Escolha editar uma família e clique no 
    ícone da pasta ao lado da pesso que deseja atender';
}
elseif($_GET['registrar_vd']==1){
    $subtitulo = 'Escolha o ícone para registrar visita para ser 
    direcionado ao formulário de registro de visita';
}


$familias = [];
if(count($_POST) > 0){
    if(!$_POST['filtro_pessoa']){
        addErrorMsg("Selecione um filtro para executar a busca");
    }else{
        switch ($_POST['filtro_pessoa']) {
            case 'referencia_familiar':
                $familias = Familia::porNomeRf($_POST['pesquisa_familia']);
                break;
            case 'data_nascimento':
                $familias = Familia::porDataRf($_POST['pesquisa_familia']);  
                break;
            case 'id_familia':
                $familias = Familia::get(["id_Familia" => $_POST['pesquisa_familia']]);
                break;
            case 'cpf_pessoa':
                $familias = Familia::porCpfRf($_POST['pesquisa_familia']);
                break;
            case 'desligadas':
                $familias = Familia::get(['ativo_familia'=>0]);
                break;
            case 'unidade':
                if($_POST['pesquisa_familia'] == ''){
                    $unidade = $_SESSION['unidade'];
                }else{
                    $unidade = Unidade::getOne(['id_unidade'=> $_POST['pesquisa_familia']]);
                }
                $familias = Familia::get(['unidade_familia'=> $unidade->id_unidade]);
        }
    }
}

loadTemplateView('buscar_familia', ['familias' => $familias, 'subtitulo'=>$subtitulo]);