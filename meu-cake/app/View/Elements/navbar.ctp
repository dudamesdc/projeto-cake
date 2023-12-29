<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <?php echo $this->Html->link('TECNO BLOG', ['controller' => 'Posts', 'action' => 'index'], ['class' => 'navbar-brand']); ?>
        </div>
        
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->Session->read('Auth.User')): ?>
                    <li><?php echo $this->Html->link('Logout', ['controller'=>'users','action' => 'logout']); ?></li>
                    <li><?php echo $this->Html->link('Add Post', ['controller' => 'posts', 'action' => 'add_post']); ?></li>
                <?php else: ?>
                    <li><?php echo $this->Html->link('Sign Up', ['controller' => 'Users', 'action' => 'add_user']); ?></li>
                    <li><?php echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

