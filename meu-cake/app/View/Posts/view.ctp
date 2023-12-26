<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                &nbsp; Bem-vindo ao Perfil de <?php echo $user['User']['username']; ?>!
                
            </h3>
        </div>
        <div class="panel-body">
            <!-- Informações do usuário, como avatar e detalhes -->
            <div class="row">
                <div>
                    
                    <?php echo $this->Html->link('Visualizar Perfil', ['action' => 'view', $user['User']['id']], ['class' => 'btn btn-primary btn-block', 'role' => 'button']); ?>
                </div>
                <div>
                    <!-- Título da seção "Meus Posts" -->
                    <div class="row" style="margin-bottom: 40px;"></div>
  
                    
                    <!-- Opção de resetar filtro -->
                    <?php
                    if ($this->request->query('reset')) {
                        $this->Session->delete('filter');
                        $this->redirect(['action' => 'user_index']);
                    }
                    ?>

                    <!-- Aplicar filtro (se aplicável) -->
                    <?php echo $this->element('applyFilter'); ?>
                    <div class="row" style="margin-bottom: 40px;"></div>
                    <!-- Tabela de Posts -->
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