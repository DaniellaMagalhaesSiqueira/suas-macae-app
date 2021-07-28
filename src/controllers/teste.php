<?php
ini_set("display_errors", 1);
session_start();
requiredValidSession();
<<<<<<< HEAD
loadModel("Visita");
loadModel("Acompanhamento");
loadModel("Familia");

loadModel("BeneficioPessoa");

// if(!empty($_GET) && $_SERVER['REQUEST_METHOD'] == 'GET'){
//     $nome = $_GET['nome'];
//     echo 'valor recebido: '. $nome;
// }   
// ?>

<!-- // <form action="#">
//     <input type="date" name="nome" />
//     <input type="submit" />
// </form>
// -->
<form action="#" method="post">
<li class="">
                    <input class="form-check-input" type="radio" checked name="forma_ingresso" id="encaminhamentoGarantiaDireitos"
                        value="Em decorrência de encaminhamento realizado pelo Sistema de Garantia de Direitos">
                    <label class="form-check-label" for="encaminhamentoGarantiaDireitos">Em decorrência de encaminhamento realizado pelo <b>Sistema de Garantia de Direitos</b> 
                        (Defensoria Pública, Ministério Público, Delegacias, outros)</label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="outros"
                        value="Outros: <?php echo $_POST['outros']?>">
                    <label class="form-check-label" for="outros">Outros:</label>
                    <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="outros" id="outros">
                    </div>               
         </li>
         <button>Enviar</button>

</form>
<?php 
// $familias = Familia::porCpfRf('123.566.788-55');
// $unidade = $familia->getUnidade();
echo "<br>";

// $agendamento = Agendamento::getOne(['id_agendamento'=>1]);
// $mystring = "This is a PHP program.";
// echo $mystring . "<br>";
// echo mb_substr($mystring, 5, -1);
// echo $agendamento->pegarAgenda()->diaSemana();
// $senha = password_hash('a', PASSWORD_DEFAULT);
// echo $senha;

// foreach($nomesBeneficios as $nome){
//    print_r($nome);
// }
// $count2 = 0;
// $pessoas = [2,5,6,7,8,9,11,12,13,14,15,17,18,19,20,21, 22,23,26,27,29,30,31,32,33, 34,35,36,37,38,39,
//     40,41,42,43,44,45,46,47,48,49,50,54,58,60,61,62,63,64,65,66,67,68,69];
// while ($count2 < 56){
//     $familia = new Familia(
//         [
//             'data_inclusao'=> '2021-05-20',
//             'ativo_familia'=>1,
//             'unidade_familia'=> 1,
//             'bairro'=>1,
//             'referencia_familiar'=> $pessoas[$count2]

//         ]);
//         $familia->insert();
//         $count2 += 1;
// }


$cont = 1;


while ($cont < 57){
    $acompanhamento = new Acompanhamento(['inicio_acompanhamento' => '2021-06-20', 'familia_acompanhamento'=> $cont,
        'funcionario_acompanhamento'=>3, 'unidade_acompanhamento'=>1]);
    $acompanhamento->insert();
    
    $acompanhamento2 = new Acompanhamento(['inicio_acompanhamento' => '2021-05-22', 'familia_acompanhamento'=> $cont+1, 
        'funcionario_acompanhamento'=>2, 'unidade_acompanhamento'=>1,]);
    $acompanhamento2->insert();
    echo $cont."<br>";
    if($cont == 13 || $count == 16){
        $cont+=1;
    }
    $cont += 2;
}


echo "<br>";
=======

$unidade = $_SESSION['unidade'];
$user = Funcionario::getOne(['id_funcionario'=> 1]);
$hash = password_hash('a', PASSWORD_DEFAULT);
// $user->update();
echo $hash;
>>>>>>> 396e841a7fb422ccc9ad32fddea073ce75c4e97f
echo "Fim";
