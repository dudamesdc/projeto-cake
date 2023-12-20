<div class="users form">
    <?php echo $this->Form->create('User', ['class' => 'form-horizontal']); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>

        <?php
            echo $this->Form->input('username', [
                'label' => ['class' => 'control-label col-md-2', 'text' => __('Username')],
                'div' => 'form-group',
                'class' => 'form-control',
                'style' => 'height: 50px;' // Ajuste a altura conforme necessário
            ]);

            echo $this->Form->input('password', [
                'label' => ['class' => 'control-label col-md-2', 'text' => __('Password')],
                'div' => 'form-group',
                'class' => 'form-control',
                'style' => 'height: 50px;' // Ajuste a altura conforme necessário
            ]);

            echo $this->Form->input('cpf', [
                'label' => ['class' => 'control-label col-md-2', 'text' => __('CPF')],
                'div' => 'form-group',
                'class' => 'form-control',
                'style' => 'height: 50px;' // Ajuste a altura conforme necessário
            ]);

            echo $this->Form->input('email', [
                'label' => ['class' => 'control-label col-md-2', 'text' => __('Email')],
                'div' => 'form-group',
                'class' => 'form-control',
                'style' => 'height: 50px;' // Ajuste a altura conforme necessário
            ]);

            echo $this->Form->input('role', [
                'label' => ['class' => 'control-label col-md-2', 'text' => __('Role')],
                'div' => 'form-group',
                'class' => 'form-control',
                'style' => 'height: 50px;', // Ajuste a altura conforme necessário
                'options' => ['admin' => 'Admin', 'author' => 'Author']
            ]);
        ?>

    </fieldset>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']); ?>
        </div>
    </div>

    <?php echo $this->Form->end(); ?>
</div>
