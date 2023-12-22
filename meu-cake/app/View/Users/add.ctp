<div class="users form">
    <?php echo $this->Form->create('User', ['class' => 'form-horizontal']); ?>
    <?php echo $this->Form->create(null, ['class' => 'form-horizontal']); ?>

    

    <div class="form-group">
        <?php
        echo $this->Form->input('username', [
            'label' => ['text' => 'Usuário'],
            'prepend' => '@',
            'class' => 'form-control',
            'required' => true,
            'div' => ['class' => 'col-md-4'],
        ]);
        ?>
        
    </div>

    <div class="form-group">
        <?php
        echo $this->Form->input('password', [
            'label' => 'Senha',
            'class' => 'form-control',
            'required' => true,
            'div' => ['class' => 'col-md-6'],
        ]);
        ?>
        
    </div>

    <div class="form-group">
        <?php
            echo $this->Form->input('email', [
                'label' => ['text' => 'Email'],
                'class' => 'form-control',
                'required' => true,
                'div' => ['class' => 'col-md-3'],
            ]);
        ?>
    
    </div>

    <div class="form-group">
        <?php
            echo $this->Form->input('cpf', [
                'label' => ['text' => 'Cpf'],
                'class' => 'form-control',
                'required' => true,
                'div' => ['class' => 'col-md-3'],
            ]);
        ?>
        
    </div>


    <div class="form-group">
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>
            </div>
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
