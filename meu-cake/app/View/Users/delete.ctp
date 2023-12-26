<?php echo $this->Html->link(
            'Excluir',
            ['action' => 'delete', $user['User']['id']],
            ['confirm' => 'Tem certeza que deseja excluir este post?']
        ); ?>