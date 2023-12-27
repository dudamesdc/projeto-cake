<form class="form-inline" method="post" >
    <?php echo $this->Form->create('Post', ['type' => 'post', 'class' => 'form-inline']); ?>
    <div class="form-group">
        <?php echo $this->Form->input('content', ['class' => 'form-control', 'placeholder' => 'Digite o título', 'type' => 'text', 'label' => 'Título/Conteúdo', 'empty' => true]); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('create', ['class' => 'form-control', 'type' => 'date', 'dateFormat' => 'DMY', 'label' => 'Data de criação', 'empty' => true]); ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('modified', ['class' => 'form-control', 'type' => 'date', 'dateFormat' => 'DMY', 'label' => 'Data de modificação', 'empty' => true]); ?>
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
