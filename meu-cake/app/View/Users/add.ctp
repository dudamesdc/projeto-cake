
<div class="container d-flex align-items-center vh-100">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="users form">
                <?php echo $this->Form->create('User', ['class' => 'form-horizontal']); ?>

                <div class="form-group">
                    <?php $this->Form->label('username', 'Usuário', ['class' => 'control-label']); ?>
                    <?php
                    echo $this->Form->input('username', [
                        'prepend' => '@',
                        'class' => 'form-control',
                        'required' => true,
                        'label' => 'Usuário',
                    ]);
                    ?>
                </div>

                <div class="form-group">
                    <?php  $this->Form->label('password', 'Senha', ['class' => 'control-label']); ?>
                    <?php
                    echo $this->Form->input('password', [
                        'class' => 'form-control',
                        'required' => true,
                    ]);
                    ?>
                </div>

                <div class="form-group">
                    <?php $this->Form->label('email', 'Email', ['class' => 'control-label']); ?>
                    <?php
                    echo $this->Form->input('email', [
                        'class' => 'form-control',
                        'required' => true,
                    ]);
                    ?>
                </div>

                <div class="form-group">
                    <?php  $this->Form->label('cpf', 'Cpf', ['class' => 'control-label']); ?>
                    <?php
                    echo $this->Form->input('cpf', [
                        'class' => 'form-control',
                        'required' => true,
                    ]);
                    ?>
                </div>

                <div class="form-group">
                    <?php  $this->Form->label('role', 'Função', ['class' => 'control-label']); ?>
                    <?php
                    echo $this->Form->input('role', [
                        'type' => 'select',
                        'options' => [
                            'author' => 'Usuário',
                            'admin' => 'Administrador',
                        ],
                        'class' => 'form-control',
                        'required' => true,
                    ]);
                    ?>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-5 col-md-10">
                        <?php echo $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-lg']); ?>
                    </div>
                </div>

                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
