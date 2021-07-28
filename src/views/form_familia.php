<main class="content">
<?php
    renderTitle(
        'Formulário para preenchimento de Família',
        $_GET['update'] ? "Altere os dados da família de código: 
            {$_GET['update']}":'Insira os dados da família',
        'icofont-users'
    );
    include_once(TEMPLATE_PATH."\\messages.php");
?>
    <form action="" method="post">
        <input type="hidden" name="id_familia" id="id_familia" value="<?= $id_familia ?>">
        <input type="hidden" name="id_pessoa" id="id_pessoa" value="<?= $pessoa->id_pessoa ?>">
        <input type="hidden" name="referencia_familiar" id="referencia_familiar" value="<?= $pessoa->id_pessoa ?>">
        <input type="hidden" name="unidade_familia" id="unidade_familia" value="<?= $unidade_familia ?>">
            <div class="form-row">
            <div class="form-group col-md-3">
                <label for="referencia_familiar" class="ml-2">Pessoa de Referência</label><br>
                <input type="text" class="form-control" value="<?= $pessoa->nome_pessoa?>" disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="data_inclusao">Data de Inclusão</label>
                <input type="date" class="form-control" name="data_inclusao" value="<?= $_GET['update'] ? $data_inclusao : $today ?>">
            </div>
            <div class="form-group col-md-2">
               
            </div>
            <div class="form-group col-md-2">
                
            </div>
            <div class="form-group col-md-1 mt-3">
                <label for="id_familia" class="">Código: <?= $id_familia ?></label>
            </div>
            <div class="form-group col-md-2 mt-3">
                <label for="unidade_familia" class=""><?= $nomeUnidade ?></label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-1">
                <label for="tipo_endereco">Tipo</label>
                <select name="tipo_endereco" id="tipo_endereco" class="form-control">
                    <optgroup>
                        <option value="null" selected disabled>Tipo</option>
                        <option value="Avenida" <?= $tipo_endereco === 'Avenida'? 'selected':'' ?>>Avenida</option>
                        <option value="Estrada" <?= $tipo_endereco === 'Estrada'? 'selected':'' ?>>Estrada</option>
                        <option value="Fazenda" <?= $tipo_endereco === 'Fazenda'? 'selected':'' ?>>Fazenda</option>
                        <option value="Jardim" <?= $tipo_endereco === 'Jardim'? 'selected':'' ?>>Jardim</option>
                        <option value="Loteamento" <?= $tipo_endereco === 'Loteamento'? 'selected':'' ?>>Loteamento</option>
                        <option value="Morro" <?=  $tipo_endereco === 'Morro'? 'selected':'' ?>>Morro</option>
                        <option value="Parque" <?= $tipo_endereco === 'Parque'? 'selected':'' ?>>Parque</option>
                        <option value="Quadra" <?= $tipo_endereco === 'Quadra'? 'selected':'' ?>>Quadra</option>
                        <option value="Rua" <?= $tipo_endereco === 'Rua'? 'selected':'' ?>>Rua</option>
                        <option value="Travessa" <?= $tipo_endereco === 'Travessa'? 'selected':'' ?>>Travessa</option>
                        <option value="Trevo" <?= $tipo_endereco=== 'Trevo'? 'selected':'' ?>>Trevo</option>
                        <option value="Viaduto" <?= $tipo_endereco=== 'Viaduto'? 'selected':'' ?>>Viaduto</option>
                        <option value="Vila" <?= $tipo_endereco=== 'Vila'? 'selected':'' ?>>Vila</option>
                    </optgroup>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="logradouro">Logradouro</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?= $logradouro ?>">
            </div>
            <div class="form-group col-md-1">
                <label for="num_endereco">Nº</label>
                <input type="number" name="num_endereco" id="num_endereco" 
                    class="form-control" value="<?= intval($num_endereco) ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="complemento_endereco">Complemento</label>
                <input type="text" name="complemento_endereco" id="complemento_endereco" class="form-control" value="<?= $complemento_endereco ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="bairro">Bairro</label>
                <select name="bairro" id="bairro" class="form-control">
                    <optgroup>
                        <option value="null" selected disabled>Selecione o Bairro</option>
                        <?php foreach($bairros as $b): ?>
                        <option value="<?= $b->id_bairro ?>" <?= $bairro === $b->id_bairro ? 'selected':''?>>
                            <?= $b->nome_bairro ?>
                        </option>
                        <?php endforeach ?>
                        <option value="<?= $semAbrangencia ?>">Fora da abrangência</option>
                    </optgroup>
                </select>
                <div  id="bairro" class="invalid-feedback d-block">
                    <?= $errors['bairro'] ?>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="ponto_referencia">Ponto de Referência</label>
                <input type="text" name="ponto_referencia" id="ponto_referencia" class="form-control" value="<?= $ponto_referencia ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="tipo_moradia">Tipo de Moradia</label>
                <select name="tipo_moradia" id="tipo_moradia" class="form-control" onchange="habilitarValorAluguel()">
                    <optgroup>
                        <option value="null" selected disabled>Tipo de Moradia</option>
                        <option value="propria" <?= $tipo_moradia==='propria'? 'selected': '' ?>>Própria</option>
                        <option value="cedida" <?= $tipo_moradia==='cedida'? 'selected': '' ?>>Cedida</option>
                        <option value="alugada" <?= $tipo_moradia==='alugada'? 'selected': '' ?>>Alugada</option>
                        <option value="aluguel_social" <?= $tipo_moradia==='aluguel_social'? 'selected': '' ?>>Aluguel Social</option>
                    </optgroup>
                </select>
            </div>
            <div class="form-group col-md-1">
                <label for="valor_moradia">aluguel R$</label>
                <input type="text" name="valor_moradia" class="form-control" placeholder="0.00"
                    id="valor_moradia" onkeyup="formatarMoeda('#valor_moradia')" value="<?= $valor_moradia?>">
            </div>
            <div class="form-group col-md-2">
                <label for="telefone">Telefone 1</label>
                <input type="text" class="form-control" onkeypress="$(this).mask('(00) 0000-00009')"
                    name="telefone1" placeholder="(00)00000-0000" value="<?= $telefone1 ?>">
                <input type="text" class="form-control" name="nome1" placeholder="nome" value="<?= $nome1 ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="telefone">Telefone 2</label>
                <input type="text" class="form-control" onkeypress="$(this).mask('(00) 0000-00009')"
                    name="telefone2" placeholder="(00)00000-0000" value="<?= $telefone2 ?>">
                <input type="text" class="form-control" name="nome2" placeholder="nome" value="<?= $nome2 ?>">
            </div>
            <div class="form-group col-md-2">
                <label for="telefone">Telefone 3</label>
                <input type="text" class="form-control" onkeypress="$(this).mask('(00) 0000-00009')"
                    name="telefone3" placeholder="(00)00000-0000" value="<?= $telefone3 ?>">
                <input type="text" class="form-control" name="nome3" placeholder="nome" value="<?= $nome3 ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="renda_total">Renda Total</label>
                <input type="text" class="form-control" id="renda_total" placeholder="0.00"
                    name="renda_total" disabled value="<?= $rendaTotal ?>">
                    <label for="renda_percapita">Renda Percapita</label>
                <input type="text" class="form-control" id="renda_percapita" placeholder="0.00"
                    name="renda_percapita" disabled value="<?= $percapita ?>">
                    <label for="total_beneficio">Total Beneficio</label>
                <input type="text" class="form-control" id="total_beneficio" placeholder="0.00"
                    name="total_beneficio" disabled value="<?= $totalBeneficios ?>">
            </div>
            <div class="form-group col-md-4 mt-4">
                <ul class="list-group">
                    <li class="list-group-item active" aria-disabled="true">Benefícios da Família</li>
                    <?php foreach($nomesBeneficios as $b): ?>
                    <li class="list-group-item"><span><?= $b->nome_beneficio." R$ ".$b->valor_beneficio ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="form-group col-md-6 mt-4">
                <div class="jumbotron p-2">
                    <div class="container ">
                    <h1 class="lead">Situações Constatadas:</h1>
                        <input type="checkbox" name="descumprimento" 
                            classe="form-check-input mt-3" id="descumprimento" <?= $descumprimento ?'checked':''?>>
                        <label for="descumprimento" class="form-check-label  mr-5" id="descumprimento">
                            Em Descumprimento de Condicionalidades</label>
                        <input type="checkbox" name="trabalho_infantil" 
                            classe="form-check-input " id="trabalho_infantil" <?= $trabalho_infantil ?'checked':''?>>
                        <label for="trabalho_infantil" class="form-check-label mr-5" id="trabalho_infantil">
                            Trabalho Infantil</label>
                        <input type="checkbox" name="acolhimento" 
                            classe="form-check-input mt-3 ml-5" id="acolhimento" <?= $acolhimento ?'checked':''?>>
                        <label for="acolhimento" class="form-check-label mt-3" id="acolhimento">
                            Situação de Acolhimento</label>
                        <input type="checkbox" class="input-check ml-2"  name="perfil_creas" <?= $perfil_creas ?'checked':'' ?>>
                        <label for="perfil_creas" class="label-check mr-2">
                            Perfil CREAS</label>
                        <input type="checkbox" class="input-check" <?= $mulher_chefe ? 'checked':'' ?> name="mulher_chefe">
                        <label for="mulher_chefe" class="label-check">
                            Mulher Chefe de Família</label>
                    </div>        
                </div>
            </div>
        </div>   
        <div class="jumbotron p-2">
            <div class="container ">
                <h1 class="lead">Demandas que Motivaram o Primeiro Atendimento:</h1>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "Programa Bolsa Fam")?'checked':'' ?> 
                        type="checkbox" value="Programa Bolsa Família" name="pbf">
                    <label class="form-check-label" for="pbf">Programa Bolsa Família</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "CAD ") ? 'checked' :'' ?> 
                        type="checkbox" value="CAD Único" name="cad">
                    <label class="form-check-label" for="cad">CAD Único</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "Passe Social")?'checked':'' ?> 
                        type="checkbox" value="Passe Social" name="passe">
                    <label class="form-check-label" for="passe">Passe Social</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "Programa Nova Vida")?'checked':'' ?> 
                        type="checkbox" value="Programa Nova Vida" name="nv">
                    <label class="form-check-label" for="nv">Programa Nova Vida</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "BPC")?'checked':'' ?> 
                   type="checkbox"      value="BPC" name="bpc">
                    <label class="form-check-label" for="bpc">BPC</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "Demandas CEAM")?'checked':'' ?> 
                        type="checkbox" value="Demandas CEAM" name="ceam">
                    <label class="form-check-label" for="ceam">Demandas CEAM</label>
                </div>  
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, " por Benefícios Eventuais")?'checked':'' ?> 
                        type="checkbox" value="Solicitação por Benefícios Eventuais" name="event">
                    <label class="form-check-label" for="event">Solicitação por Benefícios Eventuais</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "Demandas CREAS")?'checked':'' ?> 
                        type="checkbox" value="Demandas CREAS" name="creas">
                    <label class="form-check-label" for="creas">Demandas CREAS</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "Demandas Centro POP")?'checked':'' ?> 
                        type="checkbox" value="Demandas Centro POP" name="pop">
                    <label class="form-check-label" for="pop">Demandas Centro POP</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "Demandas Acolhimento")?'checked':'' ?> 
                        type="checkbox" value="Demandas Acolhimento" name="acol">
                    <label class="form-check-label" for="acol">Demandas Acolhimento</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" <?= strpos($demandas_iniciais, "Demandas CRAS")?'checked':'' ?> 
                        type="checkbox" value="Demandas CRAS" name="cras">
                    <label class="form-check-label" for="cras">Demandas CRAS</label>
                </div>
            </div>
        </div>
        <div class="jumbotron p-2">
            <div class="container ">
                <h1 class="lead">De que forma a família (ou membro da família) acessou a unidade para o primeiro atendimento:</h1>
                <ul>
                <li class="">
                    <input class="form-check-input" type="radio"  name="forma_ingresso" <?= strpos($forma_ingresso, 'demanda espont')? 'checked':'' ?>
                        id="demandaEspontanea" value="Por demanda espontânea">
                    <label class="form-check-label" for="demandaEspontanea">Por <b>demanda espontânea</b></label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" <?= strpos($forma_ingresso, 'busca ativa')? 'checked':'' ?>
                        id="buscaAtiva" value="Em decorrência de busca ativa realizada pela equipe da unidade">
                    <label class="form-check-label" for="buscaAtiva">Em decorrência de <b>busca ativa</b> realizada pela equipe da unidade</label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="ecaminhamentoBasica" <?= strpos($forma_ingresso, 'Proteção Social B')? 'checked':'' ?>
                        value="Em decorrência de encaminhamento realizado por outros serviços/unidades da Proteção Social Básica">
                    <label class="form-check-label" for="ecaminhamentoBasica">Em decorrência de encaminhamento realizado por outros serviços/unidades da <b>Proteção Social Básica</b></label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="encaminhamentoEspecial" <?= strpos($forma_ingresso, 'Proteção Social Especial')? 'checked':'' ?>
                        value="Em decorrência de encaminhamento realizado por outros serviços/unidades da Proteção Social Especial">
                    <label class="form-check-label" for="encaminhamentoEspecial">Em decorrência de encaminhamento realizado por outros serviços/unidades da <b>Proteção Social Especial</b></label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="ecaminhamentoSaude" <?= strpos($forma_ingresso, 'rea da Sa')? 'checked':'' ?>
                        value="Em decorrência de encaminhamento realizado pela área da Saúde">
                    <label class="form-check-label" for="ecaminhamentoSaude">Em decorrência de encaminhamento realizado pela área da <b>Saúde</b></label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="encaminhamentoEducacao" <?= strpos($forma_ingresso, 'rea da Educa')? 'checked':'' ?>
                        value="Em decorrência de encaminhamento realizado pela área da Educação">
                    <label class="form-check-label" for="encaminhamentoEducacao">Em decorrência de encaminhamento realizado pela área da <b>Educação</b></label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="encaminhamentoOutrasPoliticas" <?= strpos($forma_ingresso, 'outras pol')? 'checked':'' ?>
                        value="Em decorrência de encaminhamento realizado por outras políticas">
                    <label class="form-check-label" for="encaminhamentoOutrasPoliticas">Em decorrência de encaminhamento realizado por <b>outras políticas</b></label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="encaminhamentoConselho" <?= strpos($forma_ingresso, 'pelo Conselho Tutelar')? 'checked':'' ?>
                        value="Em decorrência de encaminhamento realizado pelo Conselho Tutelar">
                    <label class="form-check-label" for="encaminhamentoConselho">Em decorrência de encaminhamento realizado pelo <b>Conselho Tutelar</b></label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="encaminhamentoJuridico" <?= strpos($forma_ingresso, 'Poder Judici')? 'checked':'' ?>
                        value="Em decorrência de encaminhamento realizado pelo Poder Judiciário">
                    <label class="form-check-label" for="encaminhamentoJuridico">Em decorrência de encaminhamento realizado pelo <b>Poder Judiciário</b></label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="encaminhamentoGarantiaDireitos" <?= strpos($forma_ingresso, 'Sistema de Garantia de Direitos')? 'checked':'' ?>
                        value="Em decorrência de encaminhamento realizado pelo Sistema de Garantia de Direitos">
                    <label class="form-check-label" for="encaminhamentoGarantiaDireitos">Em decorrência de encaminhamento realizado pelo <b>Sistema de Garantia de Direitos</b> 
                        (Defensoria Pública, Ministério Público, Delegacias, outros)</label>
                </li>
                <li class="">
                    <input class="form-check-input" type="radio" name="forma_ingresso" id="outros" <?= strpos($forma_ingresso, 'utros:')? 'checked':'' ?>
                        value="Outros: <?= $_POST['outros'] ?>">
                    <label class="form-check-label" for="outros">Outros:</label>
                    <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="outros" id="inputOutro" 
                        value="<?= $outros ?>">
                    </div>               
                </li>
                </ul>
            </div>
        </div>

        <div class="form-row">
        <h6>Pessoas da Família</h6>
        </div>
    <div class="show-list">
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Composição Familiar</th>
                <th>Renda</th>
                <th>Beneficios</th>
                <th>Atender</th>
                <th>Editar</th>
                <th>Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pessoas as $pes):?>
                <tr>
                <td><?= $pes->id_pessoa ?></td>
                <td><?= $pes->nome_pessoa ?></td>
                <td><?= $pes->getIdade()?> anos</td>
                <td><?= $pes->composicao ==="RF"?"Referência Familiar":$pes->composicao ?></td>
                <td><?= $pes->renda ?></td>
                <td><?= $pes->getSiglaBeneficios() ?></td>
                <td>
                    <a href="atender_pessoa.php?pessoa=<?= $pes->id_pessoa ?>"
                        class="btn text-dark" title="atender">
                        <i class="icofont-folder-open text-dark"></i>
                    </a>
                </td>
                <td>
                    <a href="inserir_pessoa.php?update=<?= $pes->id_pessoa ?>" 
                        class="btn text-dark mr-2 rounded-circle" title="editar">
                        <i class="icofont-edit"></i>
                    </a>
                </td>
                <td>
                    <a href="remover_pessoa.php?pessoa=<?= $pes->id_pessoa ?>&familia=<?= $id_familia ?>" 
                        class="btn text-dark mr-2 rounded-circle" title="remover da família">
                        <i class="icofont-trash"></i>
                    </a>
                </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div>
        <a href="inserir_pessoa.php?familia=<?= $id_familia ?>" 
            class="btn btn-outline-primary mr-2">Inserir Pessoa Nova</a>
        <a href="inserir_pessoa_banco.php?familia=<?= $id_familia ?>" 
            class="btn btn-outline-primary mr-2">Inserir Pessoa do Banco</a>
        <a href="alterar_rf.php?familia=<?= $id_familia ?>" 
            class="btn btn-outline-warning">Alterar Referência Familiar</a>
        <a href="desligar_familia.php?familia=<?= $id_familia ?>" 
            class="btn btn-outline-danger">Desligar Familia</a>
    </div>
    <div class="form-row display-flex justify-content-end mt-2">
        <button class="btn btn-primary btn-lg mr-3">Salvar</button> 
        <a href="buscar_pessoa.php" class="btn btn-secondary btn-lg">Cancelar</a>              
    </div>
    </form>
</main>