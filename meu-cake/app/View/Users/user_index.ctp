<!-- Sua view -->

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
                <div class="col-md-3">
                    <!-- Informações do usuário, como avatar e detalhes -->
                    <!-- Substitua este bloco com os detalhes específicos do usuário -->
                    <div>
                        <strong>Informações do Perfil:</strong>
                        <p><?php echo "ID: {$user['id']}"; ?></p>
                        <!-- Adicione mais informações conforme necessário -->
                    </div>
                    <!-- Substitua o caminho do avatar pelo caminho real do avatar ou utilize um espaço reservado -->
                    <img src="caminho/do/avatar.jpg" alt="Avatar" class="img-responsive">
                </div>
                <div class="col-md-9">
                    <!-- Link para visualizar o perfil -->
                    <p>Visualize seu perfil completo: <?php echo $this->Html->link($user['username'], ['action' => 'view', $user['id']]); ?></p>

                    <!-- Abas de navegação -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#user-posts">Meus Posts</a></li>
                        <!-- Adicione mais abas conforme necessário -->
                    </ul>

                    <!-- Conteúdo das abas -->
                    <div class="tab-content">
                        <!-- Conteúdo da Aba "Meus Posts" -->
                        <div id="user-posts" class="tab-pane fade in active">
                            <!-- Opção de resetar filtro -->
                            <?php
                            if ($this->request->query('reset')) {
                                $this->Session->delete('filter');
                                $this->redirect(['action' => 'user_index']);
                            }
                            ?>

                            <!-- Título da seção "Meus Posts" -->
                            

                            <!-- Aplicar filtro (se aplicável) -->
                            <?php echo $this->element('applyFilter'); ?>

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
                                                // Ícones do Bootstrap para deletar e editar
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
                        <!-- Adicione mais conteúdo de abas conforme necessário -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
