<div class="container">
    <div class="panel panel-default">
        <?php if($nada):?>
            <div class="panel-heading">
                <?php echo $this->element('applyFilter'); ?>
            </div>
        <?php endif ?>
            <div class="panel-body">
                <?php foreach ($posts as $post): ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            
                            <h3 class="panel-title">
                                <?php echo $this->Html->link($post['Post']['title'], ['action' => 'view', $post['Post']['id']]); ?>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <?php if($post['Post']['is_active']):?>
                                <p>Estado: <span class="text-success"><i class="fas fa-check-circle"></i> Ativo</span></p>

                            <?php else:?>
                                <p>Estado: <span class="text-muted"><i class="fas fa-times-circle"></i> Inativo</span></p>
                            <?php endif ?>
                            <span class="data-post">
                                <strong>Criado em <?php echo date('d-m-Y H:i:s', strtotime($post['Post']['created'])); ?> por 
                                <?php echo $post['User']['username']; ?> com última atualização em <?php echo date('d-m-Y H:i:s', strtotime($post['Post']['modified'])); ?></strong>
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
                                ['action' => 'view', $post['Post']['id']],
                                ['class' => 'btn btn-primary btn-xs', 'role' => 'button']
                            ); ?>
                            <?php echo $this->Html->link(
                                'Visitar Perfil',
                                ['action' => 'view_profile', $post['User']['id']],
                                ['class' => 'btn btn-primary btn-xs', 'role' => 'button']
                            ); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center">
                <ul class="pagination">
                    <li><?php echo $this->Paginator->prev('« Anterior'); ?></li>
                    <li><?php echo $this->Paginator->numbers(); ?></li>
                    <li><?php echo $this->Paginator->next('Próximo »'); ?></li>
                </ul>
            </div>
       
        
    </div>
</div>
