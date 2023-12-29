<!-- add.ctp -->

<div class="container mt-4">
    
        <?php echo $this->Form->create('Post', ['url' => ['action'=>'add_post'] ]); ?>
        <div class="form-group">
            <?php $this->Form->label('title', 'título'); ?>
            <?php echo $this->Form->input('title', ['class' => 'form-control', 'placeholder' => 'Digite o título', 'type' => 'text']); ?>
        </div>
        <div class="form-group">
            <?php $this->Form->label('body', 'Conteúdo'); ?>
            <?php echo $this->Form->input('body', ['class' => 'form-control', 'placeholder' => 'Digite o conteúdo', 'type' => 'text','rows'=>'4']); ?>
        </div>

       

        <div class="form-group">
                    <?php
                    $options = ['' => '', true => 'Ativo', false => 'Inativo'];
                    echo $this->Form->select('is_active', $options, [ 'class' => 'form-control']);
                    ?>
        </div>


        <?php echo $this->Form->button('Salvar', ['class' => 'btn btn-primary mt-3']); ?>
            <?php echo $this->Form->end(); ?>
    
    
            
        
</div>
