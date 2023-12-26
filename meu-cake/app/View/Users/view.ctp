<table class='table'>
    <thead>
        <tr>
            <th>Título</th>
            <th>Criação</th>
            <th>Última atualização</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?php echo $this->Html->link($post['Post']['title'], ['controller' => 'posts', 'action' => 'view', $post['Post']['id']]); ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($post['Post']['created'])); ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($post['Post']['modified'])); ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>