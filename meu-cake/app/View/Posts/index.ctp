



<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $this->element('applyFilter'); ?>
        </div>
        <div class="panel-body">
            
                <?php foreach ($posts as $post): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo $this->Html->link($post['Post']['title'], ['action' => 'view', $post['User']['id']]); ?></h3>
                        </div>
                        <div class="panel-body">
                        <span class="data-post"><?php echo date('d-m-Y H:i:s', strtotime($post['Post']['created'])); ?> criado por <?php echo $post['User']['username']; ?></span>
                            <p class="post-body">

                                <?php echo $this->Text->truncate(
                                    $post['Post']['body'],
                                    22,
                                    array(
                                        'ellipsis' => '...' // Mantive o truncamento, ajuste conforme necessário
                                    )
                                ); ?>
                            </p>
                        </div>
                        <div class="panel-footer">
                            <?php echo $this->Html->link('Visitar Perfil', ['action' => 'view', $post['Post']['id']], ['class' => 'btn btn-primary btn-xs', 'role' => 'button']); ?>
                            
                            
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
</div>
