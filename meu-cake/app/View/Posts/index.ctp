



<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo $this->element('filtro'); ?>
        </div>
        <div class="panel-body">
            <?php foreach ($posts as $post): ?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <?php if (!empty($post)): ?>
                                        <h2><?php echo $this->Html->link($post['Post']['title'], ['action' => 'view', $post['Post']['id']]); ?></h2>
                                        <span class="data-post"><?php echo date('d-m-Y H:i:s', strtotime($post['Post']['created'])); ?> criado por <?php echo $post['User']['username']; ?></span>
                                    <?php endif; ?>
                                </tr>
                                </tbody>       
                        </table>         
                   </div>
                </div>
            <?php endforeach; ?>
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
