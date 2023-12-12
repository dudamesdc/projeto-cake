

<div class="navbar ">
        <div class="logo">
            <h1><span class="branco">Tecno</span>-blog</h1>
        </div>
        <div class="nav nav-tabs nav-pills">
            <?php echo $this->Html->link('Home', ['controller' => 'Posts', 'action' => 'index'], ['class' => 'active']) ?>
            <?php echo  $this->Html->link('login', ['controller' => 'Users', 'action' => 'login'], ['class' => 'btn btn-primary']) ?>
            <?php echo  $this->Html->link('sign up', ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>