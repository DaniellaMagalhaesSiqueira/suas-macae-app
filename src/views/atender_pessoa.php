<main class="content">
    <?php
    renderTitle(
        'Formulário de Atendimento à pessoa',
        $tipoFuncionario,
        'icofont-ui-folder'
    );

    include_once(MESSAGES_PATH);
    ?>
    <form action="" method="post" id="form1">
        <input type="hidden" name="id_atendimento" id="" value="<?= $atendimento->id_atendimento ?>">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nome_pessoa">Nome da Pessoa Atendida</label>
                <input type="text" value="<?= $pessoa->nome_pessoa ?>" class="form-control" name="nome_pessoa" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="nome_funcionario">Responsável pelo Atendimento</label>
                <input type="text" value="<?= $funcionario->nome_funcionario ?>" class="form-control" name="nome_funcionario" disabled>
            </div>
            <div class="form-group col-md-2">
                <label for="data_atendimento">Data do Atendimento</label>
                <input type="date" value="<?= $atendimento->data_atendimento? $atendimento->data_atendimento:$today ?>" class="form-control" name="data_atendimento">
            </div>
            <div class="form-group col-md-2">
                <label for="familia_pessoa">Código da Família: <?= $pessoa->familia_pessoa ?></label>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="tipo_atendimento">Tipo de Atendimento</label>
                <select name="tipo_atendimento" id="tipo_atendimento" class="form-control <?= $erros['tipo_atendimento']?'is-invalid':'' ?>">
                    <optgroup>
                        <option value="null" selected disabled>Tipo de Atendimento</option>
                        <option value="Inclusão de CAD Único" <?= $atendimento->tipo_atendimento === 'Inclusão de CAD Único'?'selected':''?>>Inclusão de CAD Único</option>
                        <option value="Atualização de CAD Único" <?= $atendimento->tipo_atendimento === 'Atualização de CAD Único' ? 'selected':''?>>Atualização de CAD Único</option>
                        <option value="Acesso a BPC" <?= $funcionario->nivel_acesso == 1 ? 'disabled' : '' ?> <?= $atendimento->tipo_atendimento === 'Acesso a BPC'?'selected':''?>>Acesso a BPC</option>
                        <option value="Solicitação de Benefício Eventual" <?= $funcionario->nivel_acesso == 1 ? 'disabled' : '' ?> <?= $atendimento->tipo_atendimento === 'Solicitação de Benefício Eventual'?'selected':''?>>Solicitação de Benefício Eventual</option>
                        <option value="Técnico Particularizado" <?= $funcionario->nivel_acesso == 1 ? 'disabled' : '' ?> <?= $atendimento->tipo_atendimento === 'Técnico Particularizado'?'selected':''?>>Técnico Particularizado</option>
                    </optgroup>
                </select>
                <div class="invalid-feedback d-block" id="tipo_atendimento">
                    <?= $errors['tipo_atendimento'] ?>
                </div>
            </div>   
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <div class="jumbotron p-2">
                    <div class="container">
                        <h1 class="lead">Demandas deste atendimento:</h1>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, "Programa Bolsa Fam") ? 'checked' : '' ?> type="checkbox" value="Programa Bolsa Família" name="pbf">
                            <label class="form-check-label" for="d_pbf">Programa Bolsa Família</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled checked':'' ?>
                                 <?= strpos($demanda_atendimento, "CAD ") ? 'checked' : '' ?> type="checkbox" value="CAD Único" name="cad">
                            <label class="form-check-label" for="d_cad">CAD Único</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, "Passe Social") ? 'checked' : '' ?> type="checkbox" value="Passe Social" name="passe">
                            <label class="form-check-label" for="d_passe">Passe Social</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, "Programa Nova Vida") ? 'checked' : '' ?> type="checkbox" value="Programa Nova Vida" name="nv">
                            <label class="form-check-label" for="d_nv">Programa Nova Vida</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, "BPC") ? 'checked' : '' ?> type="checkbox" value="BPC" name="bpc">
                            <label class="form-check-label" for="d_bpc">BPC</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, "Demandas CEAM") ? 'checked' : '' ?> type="checkbox" value="Demandas CEAM" name="ceam">
                            <label class="form-check-label" for="d_ceam">Demandas CEAM</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, " por Benefícios Eventuais") ? 'checked' : '' ?> type="checkbox" value="Solicitação por Benefícios Eventuais" name="event">
                            <label class="form-check-label" for="d_event">Solicitação por Benefícios Eventuais</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, "Demandas CREAS") ? 'checked' : '' ?> type="checkbox" value="Demandas CREAS" name="creas">
                            <label class="form-check-label" for="d_creas">Demandas CREAS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, "Demandas Centro POP") ? 'checked' : '' ?> type="checkbox" value="Demandas Centro POP" name="pop">
                            <label class="form-check-label" for="d_pop">Demandas Centro POP</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, "Demandas Acolhimento") ? 'checked' : '' ?> type="checkbox" value="Demandas Acolhimento" name="acol">
                            <label class="form-check-label" for="d_acol">Demandas Acolhimento</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($demanda_atendimento, "Demandas CRAS") ? 'checked' : '' ?> type="checkbox" value="Demandas CRAS" name="cras">
                            <label class="form-check-label" for="d_cras">Demandas CRAS</label>
                        </div>
                    </div>
                </div>
                <div class="invalid-feedback">
                    <?= $errors['demanda_atendimento'] ?>
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="jumbotron p-2">
                    <div class="container">
                        <h1 class="lead">Benefícios Solicitados:</h1>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "uxilio alimentar") ? 'checked' : '' ?> type="checkbox" value="Cesta Básica/Auxílio alimentar" name="bs_cesta_basica">
                            <label class="form-check-label" for="bs_cesta_basica">Cesta Básica/Auxílio alimentar</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "natalidade") ? 'checked' : '' ?> type="checkbox" value="Auxílio natalidade" name="bs_natalidade">
                            <label class="form-check-label" for="bs_natalidade">Auxílio natalidade</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "funeral") ? 'checked' : '' ?> type="checkbox" value="Auxílio funeral" name="bs_funeral">
                            <label class="form-check-label" for="bs_funeral">Auxílio funeral</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "passagens") ? 'checked' : '' ?> type="checkbox" value="Auxílio para deslocamento / passagens" name="bs_passagem">
                            <label class="form-check-label" for="bs_passagem">Auxílio para deslocamento / passagens (vale-transporte)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "retirada de documenta") ? 'checked' : '' ?> type="checkbox" value="Auxílio/Isenção para retirada de documentação" name="bs_documentacao">
                            <label class="form-check-label" for="bs_documentacao">Auxílio/Isenção para retirada de documentação</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "luguel Social") ? 'checked' : '' ?> type="checkbox" value="Aluguel social" name="bs_aluguel_social">
                            <label class="form-check-label" for="bs_aluguel_social">Aluguel social</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "aterial de constru") ? 'checked' : '' ?> type="checkbox" value="Material de construção" name="bs_material_construcao">
                            <label class="form-check-label" for="bs_material_construcao">Material de construção</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "o de contas de ") ? 'checked' : '' ?> type="checkbox" value="Pagamento/ Isenção de contas de água e luz" name="bs_isencao_conta">
                            <label class="form-check-label" for="bs_isencao_conta">Pagamento/ Isenção de contas de água e luz</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "lio g") ? 'checked' : '' ?> type="checkbox" value="Auxílio gás" name="bs_gas">
                            <label class="form-check-label" for="bs_gas">Auxílio gás</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "Roupa") ? 'checked' : '' ?> type="checkbox" value="Vestimentas/ Roupas" name="bs_roupas">
                            <label class="form-check-label" for="bs_roupas">Vestimentas/ Roupas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"   <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                 <?= strpos($beneficio_solicitado, "veis e Eletrodom") ? 'checked' : '' ?> type="checkbox" value="Móveis e Eletrodomésticos" name="bs_moveis">
                            <label class="form-check-label" for="bs_moveis">Móveis e Eletrodomésticos</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="jumbotron p-2">
                    <div class="container">
                        <h1 class="lead">Benefícios Concedidos:</h1>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "uxilio alimentar") ? 'checked' : '' ?> type="checkbox" value="Cesta Básica/Auxílio alimentar" name="bc_cesta_basica">
                            <label class="form-check-label" for="bc_cesta_basica">Cesta Básica/Auxílio alimentar</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "natalidade") ? 'checked' : '' ?> type="checkbox" value="Auxílio natalidade" name="bc_natalidade">
                            <label class="form-check-label" for="bc_natalidade">Auxílio natalidade</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "funeral") ? 'checked' : '' ?> type="checkbox" value="Auxílio funeral" name="bc_funeral">
                            <label class="form-check-label" for="bc_funeral">Auxílio funeral</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "passagens") ? 'checked' : '' ?> type="checkbox" value="Auxílio para deslocamento / passagens" name="bc_passagem">
                            <label class="form-check-label" for="bc_passagem">Auxílio para deslocamento / passagens (vale-transporte)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "retirada de documenta") ? 'checked' : '' ?> type="checkbox" value="Auxílio/Isenção para retirada de documentação" name="bc_documentacao">
                            <label class="form-check-label" for="bc_documentacao">Auxílio/Isenção para retirada de documentação</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "luguel Social") ? 'checked' : '' ?> type="checkbox" value="Aluguel social" name="bc_aluguel_social">
                            <label class="form-check-label" for="bc_aluguel_social">Aluguel social</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "aterial de constru") ? 'checked' : '' ?> type="checkbox" value="Material de construção" name="bc_material_construcao">
                            <label class="form-check-label" for="bc_material_construcao">Material de construção</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "o de contas de ") ? 'checked' : '' ?> type="checkbox" value="Pagamento/ Isenção de contas de água e luz" name="bc_isencao_conta">
                            <label class="form-check-label" for="bc_isencao_conta">Pagamento/ Isenção de contas de água e luz</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "lio g") ? 'checked' : '' ?> type="checkbox" value="Auxílio gás" name="bc_gas">
                            <label class="form-check-label" for="bc_gas">Auxílio gás</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input"  <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "Roupa") ? 'checked' : '' ?> type="checkbox" value="Vestimentas/ Roupas" name="bc_roupas">
                            <label class="form-check-label" for="bc_roupas">Vestimentas/ Roupas</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>
                                <?= strpos($beneficio_concedido, "veis e Eletrodom") ? 'checked' : '' ?> type="checkbox" value="Móveis e Eletrodomésticos" name="bc_moveis">
                            <label class="form-check-label" for="bc_moveis">Móveis e Eletrodomésticos</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3"> 
                <div class="jumbotron p-3 mb-1">
                    <div class="container">
                        <label for="acompanhamento"><?php
                        if($familia->acompanhamento_familia) {
                            if($proprio){
                                echo $acompanhamento->getTecnico()->getPrimeiroNome()
                                .'<b>, deseja encerrar o acompanhamento</b> da família?';
                            }else{
                                echo 'Família em acompanhamento pela(o) técnica(o) '. $acompanhamento->getTecnico()->getPrimeiroNome().'.';
                            }
                        }else{
                            echo 'Inserir essa família em <b>acompanhamento?';
                        }
                         ?></b></label>
                        <input type="checkbox" name="acompanhamento"  
                            <?= $funcionario->nivel_acesso == 1 || (!$proprio && $familia->acompanhamento_familia) || $familia == null ? 'disabled':'' ?>>
                        <label for="check">Sim</label><br>
                        <label for="data_acompanhamento" ><?= $familia->acompanhamento_familia  ? 'Data de Encerramento' : 'Data Início' ?></label>
                        <input type="date" name="data_acompanhamento" class="form-control" value="<?= $today ?>">
                        
                    </div>
                </div>
            </div>
            <div class="form-group col-md-2">
                <input type="checkbox" name="gerou_relatorio" id="relatorio"
                     <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?> <?= $atendimento->gerou_relatorio == 1 ? 'checked':''?>>
                <label for="relatorio">Gerou relatório?</label>
            </div>
            <div class="form-group col-md-5">
                <label for="enc_1">Encaminhamento</label>
                <select class="form-control" id="enc_1" name="enc_1" <?= $funcionario->nivel_acesso == 1 ? 'disabled':'' ?>>
                    <optgroup>
                        <option value="null" selected disabled>Selecione o destino do encaminhamento</option>
                        <option value="Rede de Proteção Básica" >Rede de Proteção Básica</option>
                        <option value="Inclusão no CAD Único" >Inclusão no CAD Único</option>
                        <option value="Atuliazação do CAD Único" >Atuliazação do CAD Único</option>
                        <option value="Acesso ao BPC" >Acesso ao BPC</option>
                        <option value="CREAS" >CREAS</option>
                        <option value="Rede de Proteção Especial" >Rede de Proteção Especial</option>
                        <option value="Área da Saúde">Área da Saúde</option>
                        <option value="Área da Educação">Área da Educação</option>
                        <option value="Políticas Públicas">Políticas Públicas</option>
                        <option value="Defesa de Direitos">Defesa de Direitos</option>
                        <option value="Trabalho e Renda">Trabalho e Renda</option>
                        <option value="Cultura">Cultura</option>
                        <option value="Ensino e Pesquisa">Ensino e Pesquisa</option>
                        <option value="Esporte e Lazer">Esporte e Lazer</option>
                        <option value="Enfrentamento à Pobreza">Segurança Alimentar</option>
                        <option value="Inclusão Produtiva">Inclusão Produtiva</option>
                        <option value="Associações/ONGs">Associações/ONGs</option>
                    </optgroup>
                </select>
                <div class="add" id="div-add">
                </div>
                    <a class="btn btn-primary text-light mt-1" id="<?= $funcionario->nivel_acesso == 1 ?'':'add'?>">+</a><span class="ml-3">Clique para mais de um encaminhamento</span>
                </div>
            <input type="hidden" id="contador" name="contador">
        </div>
        
        <div>
            <?php if(count($encaminhamentos)>0)
                echo 'Encaminhamentos realizados neste atendimento' ?>
                <?php foreach($encaminhamentos as $e):?>
                   $e->destino_encaminhamento;
                <?php endforeach ?>
        </div>


        <!-- Submeter -->
        <div class="form-row display-flex justify-content-end">
            <div class="form-group">
                <button class="btn btn-primary btn-lg mx-3" id="salvar">Salvar</button> 
                <a href="buscar_pessoa.php" class="btn btn-secondary btn-lg mr-3">Cancelar</a>
            </div>
        </div> 
        
    </form>
</main>