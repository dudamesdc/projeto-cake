<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title"><?php echo h($post['Post']['title']); ?></h1>
        </div>
        <div class="panel-body">

            <p><small>Criado em: <?php echo h($post['Post']['created']); ?></small></p>
            <p><?php echo h($post['Post']['body']); ?></p>

        </div>
    </div>
</div>
