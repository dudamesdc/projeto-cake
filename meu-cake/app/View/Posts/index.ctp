<h1>Blog posts</h1>
<?php
    echo $this->Form->create('Post', array('url' => 'index'));
    echo $this->Form->input('content', ['label' => 'Título/conteúdo']);
    echo $this->Form->input('create',['label' => 'Data de criação', 'type' => 'date']);
    echo $this->Form->input('end',['label' => 'Data final', 'type' => 'date']);
    echo $this->Form->end('Search');
?>
<p><?php echo $this->Html->link("Add Post", array('action' => 'add')); ?></p>
<table><p><?php echo $this->Html->link("login", array('controller'=> 'Users','action' => 'login')); ?></p>
    <tr>
        <th>criador</th>
        <th>Title</th>
        <th>Action</th>
        <th>Created</th>
    </tr>

<!-- Aqui é onde nós percorremos nossa matriz $posts, imprimindo
as informações dos posts -->

<?php foreach ($posts as $post): 
    $user = $this->Post->User->findById($post['User']['username']);
    ?>

    <tr>
        
        <td><?php echo $user; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?')
            )?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id']));?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
<?php endforeach; ?>

</table>