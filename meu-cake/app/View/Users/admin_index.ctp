<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                &nbsp; Perfil do Administrador, <?php echo $admin['username']; ?>!
            </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <?php echo $this->Html->link('<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Visualizar Perfil', ['action' => 'view', $admin['id']], ['class' => 'btn btn-primary btn-block', 'role' => 'button']); ?>
                </div>
                <div class="col-md-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#view-users">Usuários</a></li>
                        <li><?php echo $this->Html->link('Perfil', ['action' => 'view', $admin['id']], ['data-toggle' => 'tab']); ?></li>
                        <li><a data-toggle="tab" href="#view-posts">Posts</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="view-users" class="tab-pane fade in active">
                            <h3>Lista de Usuários</h3>
                            <!-- Tabela de Usuários -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Usuário</th>
                                        <th>Data de Criação</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td>
                                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                                <?php echo $this->Html->link($user['User']['username'], ['controller' => 'Users', 'action' => 'view', $user['User']['id']]) ?>
                                            </td>
                                            <td><?php echo $user['User']['created'] ?></td>
                                            <td><?php echo $this->Html->link('Deletar', ['controller' => 'Users', 'action' => 'delete', $user['User']['id']], ['confirm' => 'Você tem certeza que deseja deletar este usuário?']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="view-posts" class="tab-pane fade">
                            <h3>Lista de Posts</h3>
                            <!-- Tabela de Posts -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Data de Criação</th>
                                        <th>Última Atualização</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($posts as $post): ?>
                                        <tr>
                                            <td><?php echo $this->Html->link($post['Post']['title'], ['controller' => 'Posts', 'action' => 'view', $post['Post']['id']]) ?></td>
                                            <td><?php echo $post['Post']['created'] ?></td>
                                            <td><?php echo $post['Post']['modified'] ?></td>
                                            <td>
                                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', ['controller' => 'Posts', 'action' => 'delete', $post['Post']['id']], ['confirm' => 'Você tem certeza que deseja deletar este post?']) ?>
                                                <?php echo $this->Html->link('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', ['controller' => 'Posts', 'action' => 'edit', $post['Post']['id']]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
