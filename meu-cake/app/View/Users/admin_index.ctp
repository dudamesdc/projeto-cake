

<h1>portal do administrador</h1>
<p>
    olá <?php echo $admin['username']  ?>
</p>
<?php echo $this->Html->link('Add Post', ['action' => 'add']); ?>
<?php echo $this->Html->link('logout', ['controller' => 'Users', 'action' => 'add']); ?> 


<div class="row">
    <div class="col-md-8">
        <h2>Posts Recentes</h2>
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Criador</th>
                            <th>Título</th>
                            <th>Ação</th>
                            <th>Criado em</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                            <td>
                                    <?php
                                    echo $this->Form->postLink(
                                        'Delete user',
                                        ['action' => 'deleteUser', $post['Post']['id']],
                                        ['confirm' => 'Are you sure?']
                                    );?>
                                </td>
                                <td><?php echo $post['User']['username']; ?></td>
                                <td>
                                    <?php echo $this->Html->link($post['Post']['title'], ['action' => 'view', $post['Post']['id']]); ?>
                                </td>
                                <td>
                                    <?php
                                    echo $this->Form->postLink(
                                        'Delete',
                                        ['action' => 'delete', $post['Post']['id']],
                                        ['confirm' => 'Are you sure?']
                                    );
                                    echo $this->Html->link('Edit', ['action' => 'edit', $post['Post']['id']]);
                                    ?>
                                </td>
                                <td><?php echo $post['Post']['created']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
