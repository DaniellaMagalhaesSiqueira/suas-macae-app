<main class="content">
<?php
    renderTitle(
        'Formulário de Rede Socioassistencial Referenciada',
        $_GET['update'] ? 'Atualize os dados da instituição':'Insira os dados para incluir uma instituição',
        'icofont-site-map'
    );

    include_once(TEMPLATE_PATH . "\\messages.php");
?>
<form action="#" method="post">
    <input type="hidden" value="<?= $id_rede ?>" name="id_rede">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nome_rede">Nome</label>
            <input type="text" disabled class="form-control <?= $errors['nome_rede']?'is-invalid':''?>" name="nome_rede" value="<?= $nome_rede ?>">
            <div class="invalid-feedbak">
                <?= $errors['nome_rede'] ?>
            </div>
        </div>
        <div class="form-group col-md-3">
            <label for="logradouro_rede">Endereço</label>
            <input type="text" disabled class="form-control <?= $errors['logradouro_rede']?'is-invalid':''?>" name="logradouro_rede"
                placeholder="Ex. Avenida Rio Branco" value="<?= $logradouro_rede ?>">
                <div class="invalid-feedbak">
                <?= $errors['logradouro_rede'] ?>
            </div>
        </div>
        <div class="form-group col-md-1">
            <label for="num_endereco_rede">Nº</label>
            <input type="number" class="form-control" disabled name="num_endereco_rede"
                value="<?= $num_endereco_rede ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="ponto_referencia_rede">Ponto de Referência</label>
            <input type="text" class="form-control" name="ponto_referencia_rede" disabled
                 value="<?= $ponto_referencia_rede ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="bairro_rede">Bairro</label>
            <input type="text" class="form-control" name="bairro_rede" disabled value="<?= $bairro_rede ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="email_rede">E-mail</label>
            <input type="email" class="form-control  <?= $errors['email_rede']?'is-invalid':''?>" disabled name="email_rede"
                 value="<?= $email_rede ?>">
            <div class="invalid-feedback">
                <?= $errors['email_rede'] ?>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="tel1_rede">Telefone 1</label>
            <input type="text" disabled class="form-control  <?= $errors['tel1_rede']?'is-invalid':''?>" name="tel1_rede" 
            onkeypress="$(this).mask('(00)00000-0000');" value="<?= $tel1_rede ?>">
            <div class="invalid-feedback">
                <?= $errors['tel1_rede'] ?>
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="tel2_rede">Telefone 2</label>
            <input type="text" disabled class="form-control" name="tel2_rede" onkeypress="$(this).mask('(00)00000-0000');"
                value="<?= $tel2_rede ?>">
        </div>
        <div class="form-group col-md-2">
            <input type="checkbox" name="ativo_rede" disabled class="mt-5 ml-4" <?= $ativo_rede == 1 ?'checked':'' ?>>
            <label for="ativo_rede">Ativada</label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="contato_rede">Pessoa de Contato</label>
            <input type="text" name="contato_rede" id="" disabled value="<?= $contato_rede ?>" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <label for="contato_rede">Cargo do Contato</label>
            <input type="text" name="contato_rede" disabled placeholder="Ex.Coordenador" value="<?= $contato_rede ?>" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <label for="horario_funcionamento_rede">Funcionamento</label>
            <input type="text" name="horario_funcionamento_rede" disabled class="form-control"
                placeholder="Ex.de 8 as 17 hs" value="<?= $horario_funcionamento_rede ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="contato_rede">Público</label>
            <select disabled name="publico_rede" id="publico_rede" class="form-control <?= $errors['publico_rede']?'is-invalid':''?>">
                <optgroup>
                    <option value="Crianças" <?= $publico_rede === 'Crianças' ? 'selected':''?>>Crianças</option>
                    <option value="Adolescentes" <?= $publico_rede === 'Adolescentes' ? 'selected':''?>>Adolescentes</option>
                    <option value="Crianças/Adolescentes" <?= $publico_rede === 'Crianças/Adolescentes' ? 'selected':''?>>Crianças/Adolescentes</option>
                    <option value="Idosos" <?= $publico_rede === 'Idosos' ? 'selected':''?>>Idosos</option>
                    <option value="Mulheres" <?= $publico_rede === 'Mulheres' ? 'selected':''?>>Mulheres</option>
                    <option value="Adultos" <?= $publico_rede === 'Adultos' ? 'selected':''?>>Adultos</option>
                    <option value="Pessoas com Deficiência" <?= $publico_rede === 'Pessoas com Deficiência' ? 'selected':''?>>Pessoas com Deficiência</option>
                    <option value="Diverso" <?= $publico_rede === 'Diverso' ? 'selected':''?>>Diverso</option> 
                </optgroup>
            </select>
            <div class="invalid-feedback d-block" id="publico_rede"><?= $errors['publico_rede'] ?></div>
        </div>
        <div class="form-group col-md-2">
            <label for="contato_rede">Natureza</label>
            <select disabled name="natureza_rede" id="natureza_rede" class="form-control <?= $errors['natureza_rede']?'is-invalid':''?>">
                <optgroup>
                    <option value="Pública" <?= $natureza_rede === 'Pública' ? 'selected':''?>>Pública</option>
                    <option value="Privada" <?= $natureza_rede === 'Privada' ? 'selected':''?>>Privada</option>
                </optgroup>
            </select>
            <div class="invalid-feedback d-block" id="natureza_rede"><?= $errors['natureza_rede'] ?></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="contato_rede">Setor</label>
            <select disabled name="setor_rede" id="setor_rede" class="form-control <?= $errors['setor_rede']?'is-invalid':''?>">
                <optgroup>
                    <option value="Educação" <?= $setor_rede === 'Educação' ? 'selected':''?>>
                        Educação</option>
                    <option value="Saúde" <?= $setor_rede === 'Saúde' ? 'selected':''?>>
                        Saúde</option>
                    <option value="Políticas Públicas/Defesa de Direitos" <?= $setor_rede === 'Políticas Públicas/Defesa de Direitos' ? 'selected':''?>>
                        Políticas Públicas/Defesa de Direitos</option>
                    <option value="Trabalho/Renda" <?= $setor_rede === 'Trabalho/Renda' ? 'selected':''?>>
                        Trabalho/Renda</option>
                    <option value="Cultura" <?= $setor_rede === 'Cultura' ? 'selected':''?>>
                        Cultura</option>
                    <option value="Ensino/Pesquisa" <?= $setor_rede === 'Ensino/Pesquisa' ? 'selected':''?>>
                        Ensino/Pesquisa</option>
                    <option value="Esporte/Lazer" <?= $setor_rede === 'Esporte/Lazer' ? 'selected':''?>>
                        Esporte/Lazer</option>
                    <option value="Enfrentamento à Pobreza" <?= $setor_rede === 'Enfrentamento à Pobreza' ? 'selected':''?>>
                        Enfrentamento à Pobreza</option>
                    <option value="Cooperativa/Inclusão Produtiva" <?= $setor_rede === 'Cooperativa/Inclusão Produtiva' ? 'selected':''?>>
                        Cooperativa/Inclusão Produtiva</option>
                    <option value="Associação de Moradores" <?= $setor_rede === 'Associação de Moradores' ? 'selected':''?>>
                        Associação de Moradores</option>
                    <option value="ONG" <?= $setor_rede === 'ONG' ? 'selected':''?>>
                        ONG</option>
                    <option value="Segurança Pública" <?= $setor_rede === 'Segurança Pública' ? 'selected':''?>>
                        Segurança Pública</option>
                    <option value="Jurídico" <?= $setor_rede === 'Jurídico' ? 'selected':''?>>
                        Jurídico</option>
                </optgroup>
            </select>
            <div class="invalid-feedback d-block" id="setor_rede"><?= $errors['setor_rede'] ?></div>
        </div>
        <div class="form-group col-md-8">
            <label for="descricao_rede">Descrição</label>
            <textarea type="text" disabled name="descricao_rede" class="form-control" placeholder="Descreva os serviços oferecidos, condições para ingresso e forma de encaminhamentos"><?= $descricao_rede ?></textarea>
        </div>
    </div>
    <div class="form-row display-flex justify-content-end mt-4 mr-5">
        <button class="btn btn-primary btn-lg mr-3">Salvar</button> 
        <a href="home.php" class="btn btn-secondary btn-lg">Cancelar</a>              
    </div>
</form>
</main>