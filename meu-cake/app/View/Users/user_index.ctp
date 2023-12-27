<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                &nbsp; Bem-vindo ao Seu Perfil, <?php echo $user['username']; ?>!
            </h3>
        </div>
        <div class="panel-body">
            
            <div class="row">
                <div>
                    
                    <?php echo $this->Html->link('Editar Dados pessoais', ['action' => 'edit', $user['id']], ['class' => 'btn btn-primary btn-block', 'role' => 'button']); ?>
                </div>
                <div>
                    
                    <div class="row" style="margin-bottom: 40px;"></div>
  
                    
                    
                    <?php
                    if ($this->request->query('reset')) {
                        $this->Session->delete('filter');
                        $this->redirect(['action' => 'user_index']);
                    }
                    ?>

                    
                    <?php echo $this->element('applyFilter'); ?>
                    <div class="row" style="margin-bottom: 40px;"></div>
                    
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Criação</th>
                                <th>Última atualização</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($posts as $post): ?>
                                <tr>
                                    <td><?php echo $this->Html->link($post['Post']['title'], ['controller' => 'posts', 'action' => 'view', $post['Post']['id']]); ?></td>
                                    <td><?php echo date('d-m-Y H:i:s', strtotime($post['Post']['created'])); ?></td>
                                    <td><?php echo date('d-m-Y H:i:s', strtotime($post['Post']['modified'])); ?></td>
                                    <td>
                                        <?php
                                        
                                        echo $this->Html->link(
                                            '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                                            ['controller' => 'posts', 'action' => 'delete', $post['Post']['id']],
                                            ['escape' => false, 'confirm' => 'Tem certeza?']
                                        );

                                        echo $this->Html->link(
                                            '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
                                            ['controller' => 'posts', 'action' => 'edit', $post['Post']['id']],
                                            ['escape' => false]
                                        );
                                        ?>
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