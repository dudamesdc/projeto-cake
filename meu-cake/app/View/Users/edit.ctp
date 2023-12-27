

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Perfil do Usuário</h3>
        </div>
        <div class="panel-body">

            <?php
            echo $this->Form->create('User', ['class' => 'form-horizontal', 'url' => ['action' => 'edit']]);
            echo $this->Form->input('cpf', ['class' => 'form-control', 'label' => 'CPF']);
            echo $this->Form->input('username', ['class' => 'form-control', 'label' => 'Nome de Usuário']);
            echo $this->Form->input('email', ['class' => 'form-control', 'label' => 'E-mail']);
            echo $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'label' => 'Senha']);
            ?>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?php
                    echo $this->Form->button('Salvar Alterações', ['class' => 'btn btn-primary']);
                     echo $this->Form->end();
                   ?>
                </div>
            </div>

            <?php
            echo $this->Form->end();
            ?>

        </div>
    </div>
</div>
