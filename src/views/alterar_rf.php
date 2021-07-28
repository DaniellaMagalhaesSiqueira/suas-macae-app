<main class="content">
<?php 

    renderTitle(
        'Alterar Referência Familiar',
        'Para realizar esta ação é necessário que a nova referência familiar já tenha sido criada e incluída à família.',
        'icofont-exchange'
    );

    include_once(TEMPLATE_PATH."\\messages.php");

?>
<form action="" method="post">
    <h6>Pessoas da Família</h6>
        <ul>
                <?php foreach($pessoas as $p): ?>
            <li>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nome_pessoa">Nome</label>
                    <input  class="form-control" disabled name="nome_pessoa" value="<?= $p->nome_pessoa ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="id_pessoa">Composicao</label>
                    <select name="<?= $p->id_pessoa ?>" id="id_pessoa" class="form-control">
                        <optgroup>
                            <option value="null" selected disabled></option>
                            <option value="Referencia Familiar" <?= $p->composicao === 'Referencia Familiar' ? 'selected' : '' ?>>
                                Referência Familiar
                            </option>
                            <option value=" Conjuge" <?= $p->composicao === ' Conjuge' ? 'selected' : '' ?>>
                                Cônjuge
                            </option>
                            <option value="Filho(a)/Enteado(a)" <?= $p->composicao === 'Filho(a)/Enteado(a)' ? 'selected' : '' ?>>
                                Filho(a)/Enteado(a)
                            </option>
                            <option value="Mae/Pai" <?= $p->composicao === 'Mae/Pai' ? 'selected' : '' ?>>
                                Mãe/Pai
                            </option>
                            <option value="Avo" <?= $p->composicao === 'Avo' ? 'selected' : '' ?>>
                                Avô(ó)
                            </option>
                            <option value="Irmao(a)" <?= $p->composicao === 'Irmao(a)' ? 'selected' : '' ?>>
                                Irmão(ã)
                            </option>
                            <option value="Nora/Genro" <?= $p->composicao === 'Nora/Genro' ? 'selected' : '' ?>>
                                Nora/Genro
                            </option>
                            <option value="Sobrinho(a)" <?= $p->composicao === 'Sobrinho(a)' ? 'selected' : '' ?>>
                                Sobrinho(a)
                            </option>
                            <option value="Tio(a)" <?= $p->composicao === 'Tio(a)' ? 'selected' : '' ?>>
                                Tio(a)
                            </option>
                            <option value="Primo(a)" <?= $p->composicao === 'Primo(a)' ? 'selected' : '' ?>>
                                Primo(a)
                            </option>
                            <option value="Outro parente" <?= $p->composicao ==='Outro parente' ? 'selected' : '' ?>>
                                Outro parente
                            </option>
                        </optgroup>
                    </select>
            </li>
                <?php endforeach ?>
                </div>
                <div class="form-row display-flex justify-content-end">
                <div class="form-group">
                    <button class="btn btn-primary btn-lg mr-3">Alterar</button> 
                    <a href="home.php" class="btn btn-secondary btn-lg mr-3">Cancelar</a>    
                </div> 
                </div>
            </div>  
        </ul>
</form>


</main>