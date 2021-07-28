<main class="content">
<script>

 
</script>

<?php
    renderTitle(
        'Cadastrar Pessoa',
        $_GET['update']?"Altere os dados da pessoa código: "
            .$_GET['update'] :'Insira os dados da pessoa.',
        'icofont-user-alt-7'
    );

    include_once(TEMPLATE_PATH.'\\messages.php');
?>
<form action="#" method="post">
    <input type="hidden" name="id_pessoa" value="<?= $id_pessoa ?>">
    <input type="hidden" name="rf" value=" <?= $rf ?>">
    <input type="hidden" name="familia_pessoa" value="<?= $familia_pessoa ?>">
    <input type="hidden" name="ativo_pessoa" value="<?= $ativo_pessoa ?>">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nome_pessoa">Nome</label>
            <input type="text" class="form-control <?= $errors['nome_pessoa'] ? 'is-invalid':''?>" 
                name="nome_pessoa" value="<?= $nome_pessoa ?>" >
            <div class="invalid-feedback">
                <?= $errors['nome_pessoa'] ?>
            </div>
        </div>
        <div class="form-group col-md-2">
            <div class="form-check">
                <input type="checkbox" class="form-input-check" 
                    name="homonimo"  <?= $homonimo ? 'checked':''?>>
                <label for="homonimo" class="form-check-label" id="homonimo">Homônimo?</label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="nome_mae">Nome da mãe</label>
            <input type="text" class="form-control <?= $errors['nome_mae'] ? 'is-invalid':''?>" 
                name="nome_mae" value="<?= $nome_mae ?>">
            <div class="invalid-feedback">
                <?= $errors['nome_mae'] ?>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="nome_pai">Nome da pai</label>
            <input type="text" class="form-control <?= $errors['nome_pai'] ? 'is-invalid':''?>" 
                name="nome_pai"  value="<?= $nome_pai ?>">
            <div class="invalid-feedback">
                <?= $errors['nome_pai'] ?>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control <?= $errors['data_nascimento'] ? 'is-invalid':''?>" 
                name = "data_nascimento"  value="<?= $data_nascimento ?>">
            <div class="invalid-feedback">
                <?= $errors['data_nascimento'] ?>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="cpf_pessoa">CPF</label>
            <input type="text" class="form-control <?= $errors['cpf_pessoa'] ? 'is-invalid': '' ?>" name = "cpf_pessoa"  
                onkeypress="$(this).mask('000.000.000-00');"  value="<?= $cpf_pessoa ?>">
            <div class="invalid-feedback">
                <?= $errors['cpf_pessoa'] ?>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="rg_pessoa">R.G.</label>
            <input type="number" class="form-control" 
                name = "rg_pessoa"  value="<?= $rg_pessoa ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="nis">NIS</label>
            <input type="text" onkeypress="$(this).mask('0 00000000 00');" class="form-control" name = "nis"  value="<?= $nis ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="sexo">Sexo</label>
            <select name="sexo" id="sexo" class="form-control" onchange="habilitarGestante()">
                <optgroup class="form-control">
                    <option value="null" selected disabled></option>
                    <option value="feminino" <?= $sexo === "feminino" ? 'selected':'' ?>>Feminino</option>
                    <option value="masculino" <?= $sexo === "masculino" ? 'selected':'' ?>>Masculino</option>
                </optgroup>
            </select>
            <div id="sexo" class="invalid-feedback d-block">
                <?= $errors['sexo'] ?>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="genero">Gênero</label>
            <input type="text" class="form-control" 
                name = "genero" value="<?= $genero ?>">
        </div>
    </div>
    <div class="form-row display-flex align-items-center">
        <div class="form-group col-md-2">
            <label for="cor">Cor/Raça</label>
            <select name="cor" id="cor" class="form-control">
                <optgroup>
                    <option value="null" selected disabled></option>
                    <option value="nao_declarada" <?= $cor === 'nao_declarada'? 'selected' : '' ?>>Não declarada</option>
                    <option value="preta" <?= $cor === 'preta'? 'selected' : '' ?>>Preta</option>
                    <option value="branca" <?= $cor === 'branca'? 'selected' : '' ?>>Branca</option>
                    <option value="parda" <?= $cor === 'parda'? 'selected' : '' ?>>Parda</option>
                    <option value="indigena" <?= $cor === 'indigena'? 'selected' : '' ?>>Indígena</option>
                    <option value="amarela" <?= $cor === 'amarela'? 'selected' : '' ?>>Amarela</option>
                </optgroup>
            </select>
            <div id="cor" class="invalid-feedback d-block">
                <?= $errors['cor'] ?>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="escolaridade">Escolaridade</label>
            <select name="escolaridade" id="escolaridade" class="form-control">
                <optgroup>
                    <option value="null" selected disabled></option>
                    <option value="nao_escolarizado" <?= $escolaridade === 'nao_escolarizado'? 'selected' : '' ?>>Não Escolarizado</option>
                    <option value="fundamental" <?= $escolaridade === 'fundamental'? 'selected' : '' ?>>Fundamental</option>
                    <option value="medio" <?= $escolaridade === 'medio'? 'selected' : '' ?>>Médio</option>
                    <option value="graduacao" <?= $escolaridade === 'graduacao'? 'selected' : '' ?>>Graduação</option>
                    <option value="pos_graduacao" <?= $escolaridade === 'pos_graduacao'? 'selected' : '' ?>>Pós-Graduação</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group col-md-2">
            <div class="form-check">
                <input type="checkbox" class="form-input-check" 
                    name="com_deficiencia" <?= $com_deficiencia ? 'checked': '' ?> id="com_deficiencia">
                <label for="com_deficiencia" class="form-check-label" id="com_deficiencia">Com Deficiência</label>
            </div>
        </div>
        <div class="form-group col-md-2">
            <div class="form-check">    
                <input type="checkbox" class="form-check-input" 
                    name = "prioritario_scfv" <?= $prioritario_scfv ? 'checked': '' ?> id="prioritario_scfv">
                <label for="prioritario_scfv">Prioritário SCFV</label>
            </div>
        </div>
        <div class="form-group col-md-2 ">
            <div class="form-check">
                <input type="checkbox" class="form-check-input"
                     name = "no_scfv" <?= $no_scfv ? 'checked':'' ?> id="no_scfv">
                <label for="no_scfv">No SCFV</label>
            </div>
        </div>
        <div class="form-group col-md-2">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" 
                    onchange=" habilitarDataParto()"
                    name = "gestante" id="gestante" <?= $gestante ? 'checked':'' ?>>
                <label for="gestante">Gestante</label>
            </div>
        </div>
    </div>
    </div>
    <div class="form-row display-flex align-items-center">
        <div class="form-group col-md-3">
            <label for="ocupacao">Ocupação/Profissão</label>
            <input type="text" class="form-control" 
                name = "ocupacao" value="<?= $ocupacao ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="renda">Renda R$</label>
            <input type="text" class="renda form-control" name ="renda" 
            onkeyup="formatarMoeda('#renda')" value="<?php echo criaValorMonetario($renda) ?>" id='renda'>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input ml-2"
                    name="vinculo_formal" <?= $vinculo_formal ? 'checked': '' ?> id="vinculo_formal">
                <label for="vinculo_formal" class="ml-5">Vínculo Formal</label>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="data_parto" habilitarDataParto()>Data prevista de Parto</label>
            <input type="date" class="form-control"
                 name = "data_parto" id="data-parto" disabled value="<? $data_parto ?>">
            <div class="invalid-feedback">
                <?= $errors['data_parto'] ?>
            </div>
        </div>
    </div>
    <div class="form-row display-flex">
        <div class="form-group col-md-3">
            <label for="composicao">Composição Familiar</label>
            <input type="hidden" class="form-control" 
                id="input_composicao" value="<? $composicao ?>" name="composicao">
            <select name="composicao" id="composicao" 
                class="form-control <?= $errors['composicao'] ? 'is-invalid':''?>">
                <optgroup>
                    <option value="null" selected disabled></option>
                    <option value="Referencia Familiar" <?= $composicao === 'Referencia Familiar' ? 'selected' : '' ?>>
                        Referência Familiar
                    </option>
                    <option value=" Conjuge" <?= $composicao === ' Conjuge' ? 'selected' : '' ?>>
                        Cônjuge
                    </option>
                    <option value="Filho(a)/Enteado(a)" <?= $composicao === 'Filho(a)/Enteado(a)' ? 'selected' : '' ?>>
                        Filho(a)/Enteado(a)
                    </option>
                    <option value="Mae/Pai" <?= $composicao === 'Mae/Pai' ? 'selected' : '' ?>>
                        Mãe/Pai
                    </option>
                    <option value="Avo" <?= $composicao === 'Avo' ? 'selected' : '' ?>>
                        Avô(ó)
                    </option>
                    <option value="Irmao(a)" <?= $composicao === 'Irmao(a)' ? 'selected' : '' ?>>
                        Irmão(ã)
                    </option>
                    <option value="Nora/Genro" <?= $composicao === 'Nora/Genro' ? 'selected' : '' ?>>
                        Nora/Genro
                    </option>
                    <option value="Sobrinho(a)" <?= $composicao === 'Sobrinho(a)' ? 'selected' : '' ?>>
                        Sobrinho(a)
                    </option>
                    <option value="Tio(a)" <?= $composicao === 'Tio(a)' ? 'selected' : '' ?>>
                        Tio(a)
                    </option>
                    <option value="Primo(a)" <?= $composicao === 'Primo(a)' ? 'selected' : '' ?>>
                        Primo(a)
                    </option>
                    <option value="Outro parente" <?= $composicao ==='Outro parente' ? 'selected' : '' ?>>
                        Outro parente
                    </option>
                </optgroup>
            </select>
            <div  id="composicao" class="invalid-feedback d-block">
                <?= $errors['composicao'] ?>
            </div>
        </div>
    </div>
    <div class="offset-md-8 mb-2 text-muted">
        Adicione benefícios no item Buscar do menu Pessoa.
    </div>
    <div class="offset-md-8">
        <button class="btn btn-primary btn-lg">Salvar</button> 
        <a href="buscar_pessoa.php" class="btn btn-secondary btn-lg">Cancelar</a>              
    </div>
</form>
</main>
