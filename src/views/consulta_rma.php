<main class="content">
    <?php
        renderTitle(
            'Gerar Registro Mensal de Atendimento',
            'Ao selecionar o mês de referência os dados do mês do ano corrente serão obtidos',
            'icofont-search-document'
        );
        include_once(MESSAGES_PATH);
    ?>
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="mes">Mês</label>
                <select name="mes" id="mes" class="form-control">
                    <optgroup>
                        <option value="null" selected disabled>Selecione o mês</option>
                        <option value="1">Janeiro</option>
                        <option value="2">Fevereiro</option>
                        <option value="3">Março</option>
                        <option value="4">Abril</option>
                        <option value="5">Maio</option>
                        <option value="6">Junho</option>
                        <option value="7">Julho</option>
                        <option value="8">Agosto</option>
                        <option value="9">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </optgroup>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="ext_pobreza">Insira a renda de extrema pobreza</label>
                <input type="text" onkeyup="formatarMoeda('#renda')" id="renda" name="ext_pobreza"
                class="form-control" placeholder="89,00 é a per capita pré-selecionada">
            </div>
        </div>
        <div class="form-row ml-3">
            <button class="btn btn-primary mt-2">OK</button>
        </div>
        <div class="form-row ml-3 mt-3">
            <?php if($_POST['mes']){
                echo " Gerar relatório do mês de {$mes[$_POST['mes']]} com per capita de extrema pobreza de ";
                if($_POST['ext_pobreza']){
                    echo "R\${$_POST['ext_pobreza']}"
                    .'</div><a href="rel_rma.php?mes={$_POST["mes"]}" type="submit"
                    class="btn btn-lg btn-primary mt-3">Gerar Relatório</a>';
                }else{
                    echo "R$ 89,00"
                    ."</div><div class='form-row ml-3'><a href='rel_rma.php?mes={$_POST['mes']}' type='submit'
                    class='btn btn-lg btn-primary mt-3'>Gerar Relatório</a></div>";
                }
            } 
            ?>
            
        
    </form>
    
</main>