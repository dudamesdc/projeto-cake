

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Perfil do Usuário</h3>
        </div>
        <div class="panel-body">

            <dl class="dl-horizontal">
                <dt>Nome de Usuário:</dt>
                <dd><?php echo h($user['User']['username']); ?></dd>

                <dt>E-mail:</dt>
                <dd><?php echo h($user['User']['email']); ?></dd>

                <dt>CPF:</dt>
                <dd><?php echo h($user['User']['cpf']); ?></dd>

                <dt>Data de Registro:</dt>
                <dd><?php echo h($user['User']['created']); ?></dd>
            </dl>

            <?php 
            if($this->Auth->user('role') == 'admin') {
                echo $this->Html->link('Editar Perfil', ['controller' => 'Users', 'action' => 'edit'], ['class' => 'btn btn-primary']);
            }
            ?>

        </div>
    </div>
</div>
