<?php
// Defina os nomes dos meses em português
$meses = [
    '01' => 'Janeiro',
    '02' => 'Fevereiro',
    '03' => 'Março',
    '04' => 'Abril',
    '05' => 'Maio',
    '06' => 'Junho',
    '07' => 'Julho',
    '08' => 'Agosto',
    '09' => 'Setembro',
    '10' => 'Outubro',
    '11' => 'Novembro',
    '12' => 'Dezembro',
];
?>

<form class="form-inline" method="post">
    <?php echo $this->Form->create('Post', ['type' => 'post', 'class' => 'form-inline']); ?>
    <div class="form-group">
        <?php echo $this->Form->input('content', ['class' => 'form-control', 'placeholder' => 'Digite o título', 'type' => 'text', 'label' => 'Título/Conteúdo', 'empty' => true]); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('create', ['class' => 'form-control', 'type' => 'date', 'dateFormat' => 'DMY', 'label' => 'Data de criação', 'empty' => true, 'monthNames' => $meses, 'locale' => 'pt_BR']); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('modified', ['class' => 'form-control', 'type' => 'date', 'dateFormat' => 'DMY', 'label' => 'Data de modificação', 'empty' => true, 'monthNames' => $meses, 'locale' => 'pt_BR']); ?>
    </div>
    <div class="form-group">
        <?php
        $options = ['' => '', true => 'Ativo', false => 'Inativo'];
        echo $this->Form->select('is_active', $options, ['class' => 'form-control']);
        ?>
    </div>
    <div class="form-group">
        <?php
        echo $this->Form->button('Buscar', ['class' => 'btn btn-primary mt-3']);
        echo $this->Html->link('Limpar', ['?' => ['reset' => true]], ['class' => 'btn btn-primary mt-3']);
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</form>
