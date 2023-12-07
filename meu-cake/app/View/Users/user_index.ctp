

    <h1>Usuário</h1>
    <p>Olá, <?php echo $user['username']; ?>!</p>
    <?php echo $this->Html->link('Logout', ([ 'action' => 'logout'])); ?>
    
    <?php echo $this->Html->link('add post', (['controller'=>'posts', 'action' => 'add'])); ?>
    <h2>Seus Posts</h2>
    
    <table class='table'>
        <thead>
            <tr>
                <th>Título</th>
                <th>Conteúdo</th>
                <th>Data de criação</th>
                <th>Data final</th>
            </tr>
        </thead>
        <tbody>
            <?php
                

                foreach ($posts as $post):?>
                    <tr>
                        <td><?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));?></td>
                        <td><?php echo $this->Html->link('Editar', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']));?></td>
                        <td><?php echo $this->Html->link('Deletar',array('controller'=>'posts','action'=>'delete',$post['Post']['id']));?></td>
                       

                        <td><?php echo $post['Post']['created'];?></td>
                        <td><?php echo $this->Form->input('status', array('type' => 'checkbox', 'label' => 'ativo'));?></td>
                    </tr>
                
            <?php endforeach;?>
        </tbody>
    </table>

    

   
