



<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-inline" method="post" action="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'index']); ?>">
                <?php echo $this->Form->create('Post', ['type' => 'post']); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('content', ['class' => 'form-control', 'placeholder' => 'Digite o título', 'type' => 'text', 'label' => 'Título/Conteúdo']); ?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('create', ['class' => 'form-control', 'placeholder' => 'Digite a data inicial', 'type' => 'date', 'label' => 'Data Inicial', 'empty'=>true]); ?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('end', ['class' => 'form-control', 'placeholder' => 'Digite a data final', 'type' => 'date', 'label' => 'Data Final','empty'=>true]); ?>
                </div>

                <div class="form-group">
                    <?php
                    $options = ['' => 'Mostrar todos', '1' => 'Ativo', '0' => 'Inativo'];
                    echo $this->Form->select('is_active', $options, ['empty' => true, 'class' => 'form-control']);
                    ?>
                </div>
                <?php
                echo $this->Form->button('Buscar', ['action'=>'index','class' => 'btn btn-primary mt-3']);
                echo $this->Html->link('Limpar', ['action' => 'index'], ['class' => 'btn btn-primary mt-3', 'type' => 'reset']);
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
                            <span class="data-post"><?php echo $post['Post']['created']; ?> criado por <?php echo $post['User']['username']; ?></span>
                        <?php endif; ?>
                    </tr>
                    </tbody>
                
                
        
                
            </table>
       
</div>
<?php endforeach; ?>