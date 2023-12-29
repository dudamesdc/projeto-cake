<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Perfil do Usuário</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="user-info">
                        <div class="info-item">
                            <dt>Nome de Usuário:</dt>
                            <?php echo h($user['User']['username']); ?>
                        </div>

                        <div class="info-item">
                            <dt>E-mail:</dt>
                            <?php echo h($user['User']['email']); ?>
                        </div>

                        <div class="info-item">
                            <dt>CPF:</dt>
                            <?php echo h($user['User']['cpf']); ?>
                        </div>

                        <div class="info-item">
                            <dt>Data de Registro:</dt>
                            <?php echo date('d-m-Y H:i:s', strtotime($user['User']['created'])); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
