<div class="container mt-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo h($post['Post']['title']); ?></h3>
        </div>
        <div class="panel-body">
            <p class="post-info">
                <strong>Criado em: <?php echo date('d-m-Y H:i:s', strtotime($post['Post']['created'])); ?> 
                por: <?php echo h($post['User']['username']); ?> 
                com última atualização em: <?php echo date('d-m-Y H:i:s', strtotime($post['Post']['modified'])); ?></strong>
            </p>
            <p class="post-body">
                <?php echo nl2br(h($post['Post']['body'])); ?>
            </p>
        </div>

        <div class="panel-footer">
            <?php 
                if( $user) {
                    if($user['role'] == 'admin'){
                        echo $this->Html->link('Voltar para Lista', ['controller'=>'users','action' => 'admin_index'], ['class' => 'btn btn-default']); 
                    }else{
                        echo $this->Html->link('Voltar para Lista', ['controller'=>'users','action' => 'user_index'], ['class' => 'btn btn-default']);
                    }
                }else{
                    echo $this->Html->link('Voltar para Lista', ['action' => 'index'], ['class' => 'btn btn-default']); 
                }
            ?>
            
        </div>
    </div>
</div>