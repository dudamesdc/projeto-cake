<?php echo $this->Html->link(
            'Excluir',
            ['action' => 'delete', $post['Post']['id']],
            ['confirm' => 'Tem certeza que deseja excluir este post?']
        ); ?>

