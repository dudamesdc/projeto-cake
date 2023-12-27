<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                &nbsp; Bem-vindo ao Perfil de <?php echo $user['User']['username']; ?>!
                
            </h3>
        </div>
        <div class="panel-body">
           
            <div class="row">
                
                <div>
                    
                    <div class="row" style="margin-bottom: 40px;"></div>
  
                    
                    <?php
                    if ($this->request->query('reset')) {
                        $this->Session->delete('filter');
                        $this->redirect(['action' => 'view_profile']);
                    }
                    ?>

                    <?php echo $this->element('applyFilter'); ?>
                    <div class="row" style="margin-bottom: 40px;"></div>
                   
                    <div class="panel-body">
                        <?php foreach ($posts as $post): ?>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <?php echo $this->Html->link($post['Post']['title'], ['action' => 'view', $post['User']['id']]); ?>
                                    </h3>
                                </div>

                                <div class="panel-body">
                                    <span class="data-post">
                                        Criado em <?php echo date('d-m-Y H:i:s', strtotime($post['Post']['created'])); ?> por 
                                        <?php echo $post['User']['username']; ?>
                                    </span>
                                    <br>
                                    <p class="post-body">
                                        <?php echo $this->Text->truncate(
                                            $post['Post']['body'],
                                            22,
                                            array('ellipsis' => '...')
                                        ); ?>
                                    </p>
                                </div>
                                <div class="panel-footer">
                                    <?php echo $this->Html->link(
                                        'Ver Post',
                                        ['action' => 'view', $post['User']['id']],
                                        ['class' => 'btn btn-primary btn-xs', 'role' => 'button']
                                    ); ?>
                                    
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>