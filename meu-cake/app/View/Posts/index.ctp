<?php $this->layout = 'bootstrap'; ?>



    <h1>Blog posts</h1>



    <?php
        echo $this->Form->create('Post', array('url' => 'index'));
        echo $this->Form->input('content', ['label' => 'Título/conteúdo']);
        echo $this->Form->input('create',['label' => 'Data de criação', 'type' => 'date']);
        echo $this->Form->input('end',['label' => 'Data final', 'type' => 'date']);
        echo $this->Form->end('Search');
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
                                <th>ação</th>
                                <th>criador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php>$this->start('content'); ?>
                            <ul>
                            <?php foreach ($posts as $post): ?>
                                <tr>
                                    <td><?php echo $post['User']['username']; ?></td>
                                    <td>
                                        <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $this->Form->postLink(
                                                'Delete',
                                                array('action' => 'delete', $post['Post']['id']),
                                                array('confirm' => 'Are you sure?')
                                            )
                                        ?>
                                        <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']));?>
                                    </td>
                                    <td><?php echo $post['Post']['created']; ?></td>
                            
                                </tr>
                            <?php endforeach; ?>
                            </ul>
                            <?php>$this->end(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

