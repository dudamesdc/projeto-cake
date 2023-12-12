<!-- add.ctp -->

<div class="container mt-4">
    
        <?php echo $this->Form->create('Post', ['url' => ['action'=>'add'] ]); ?>
        <div class="form-group">
            <?php $this->Form->label('title', 'título'); ?>
            <?php echo $this->Form->input('title', ['class' => 'form-control', 'placeholder' => 'Digite o título', 'type' => 'text']); ?>
        </div>
        <div class="form-group">
            <?php $this->Form->label('body', 'Conteúdo'); ?>
            <?php echo $this->Form->input('body', ['class' => 'form-control', 'placeholder' => 'Digite o conteúdo', 'type' => 'text']); ?>
        </div>

        <div class="form-group">
            <?php $this->Form->label('image_path', 'Arquivo'); ?>
            <?php echo $this->Form->input('image_path', ['class' => 'form-control-file', 'type' => 'file']); ?>
        </div>

        <div class="checkbox">
            <label>
                <?php echo $this->Form->input('is_active', ['type' => 'checkbox', 'label' => 'ativo', 'hiddenField'=>'0']); ?>
            </label>
            
        </div>
        <?php echo $this->Form->button('Salvar', ['class' => 'btn btn-primary mt-3']); ?>
            <?php echo $this->Form->end(); ?>
    
    
            
        
</div>
