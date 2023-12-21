



<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-inline" method="post" action="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'index']); ?>">
                <?php echo $this->Form->create('Post', ['type' => 'post']); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('content', ['class' => 'form-control', 'placeholder' => 'Digite o título', 'type' => 'text', 'label' => 'Título/Conteúdo', 'empty'=>true]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('create', ['class' => 'form-control', 'type' => 'date','dateFormat'=>'DMY', 'label' => 'Data de criação','empty'=>true]); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('modified', ['class' => 'form-control', 'type' => 'date','dateFormat'=>'DMY', 'label' => 'Data de modificação','empty'=>true]); ?>
                </div>
                <div class="form-group">
                    <?php
                    $options = ['' => '', '1' => 'Ativo', '0' => 'Inativo'];
                    echo $this->Form->select('is_active', $options, [ 'class' => 'form-control']);
                    ?>
                </div>
                <?php
                echo $this->Form->button('Buscar', ['action'=>'index','class' => 'btn btn-primary mt-3']);
                echo $this->Html->link('Limpar', ['action' => 'index', '?' => ['reset'=>true]], ['class' => 'btn btn-primary mt-3']);
                echo $this->Form->end();
                ?>
            </form>
        </div>
    </div>



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

