<main class="content">
<?php
    renderTitle(
        'Inserir Familia',
        'Insira os dados para cadastrar uma família',
        'icofont-users'
    );
    include_once(MESSAGES_PATH);
?>

<div class="card">
  <div class="card-header">
    Inserir Nova Família
  </div>
   
    <table class="table">
        <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>Selecionar</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($pessoas as $pes):?>
                <tr>
                <td><?= $pes->id_pessoa ?></td>
                <td><?= $pes->nome_pessoa ?></td>
                <td><?= $pes->data_nascimento ?></td>
                <td><?= $pes->cpf_pessoa ?></td>
                <td>
                    <a href="form_familia.php?pessoa=<?= $pes->id_pessoa ?>" 
                        class="btn text-dark rounded-circle mr-2" title="selecionar <?= $pes->id_pessoa ?>">
                        <i class="icofont-hand-drag1"></i>
                    </a>
                </td>
                </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    
  </div>
</div>
<button type="button" class="btn btn-online-primary btn-lg mt-2 ml-2" 
     data-toggle="modal" data-target="#meuModal">Não Encontrada</button>
    <div id="meuModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">Pessoa não está disponível nessa lista?</div>
                    <div class="card-body">
                        <p class="card-text">Talvez a pessoa que procura não esteja cadastrada com sua composição como "Referência Familiar".
                            Nesse caso, vá em buscar pessoa e altere essa informação. </p>
                        <p class="card-text">Caso a pessoa não esteja em qualquer
                            listagem é necessário criá-la em "Inserir" no menu Pessoa.</p>
                    </div>
                </div>
            </div>
        </div>
</main>