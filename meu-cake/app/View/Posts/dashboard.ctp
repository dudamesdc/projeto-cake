

<h1>Blog posts</h1>

<?php echo $this->Html->link('sign up', ['controller' => 'Users', 'action' => 'add']); ?> 
<?php echo $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']); ?>

<?php
echo $this->Form->create('Post', ['url' => ['controller' => 'Posts', 'action' => 'filter']]);
echo $this->Form->input('content', ['label' => 'Título/conteúdo']);
echo $this->Form->input('create', ['label' => 'Data de criação', 'type' => 'date']);
echo $this->Form->input('end', ['label' => 'Data final', 'type' => 'date']);
echo $this->Form->input('status', ['label' => 'Status', 'type' => 'select', 'options' => ['1' => 'Ativo', '0' => 'Inativo']]);
echo $this->Form->submit('Search');
echo $this->Form->end();
?>

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
                            
                            <th>Criado em</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        <?php 
                        
                        foreach ($posts as $post): ?>
                            
                            <tr>
                                
                                <td><?php echo $post['User']['username']; ?></td>
                                <td>
                                    <?php echo $this->Html->link($post['Post']['title'], ['action' => 'view', $post['Post']['id']]); ?>
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
