<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only"><a>algulma</a></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">TECNO BLOG</a>
        </div>
        
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->Session->read('Auth.User')): ?>
                    <li><?php echo $this->Html->link('Logout', ['action' => 'logout']); ?></li>
                    <li><?php echo $this->Html->link('Add Post', ['controller' => 'posts', 'action' => 'add']); ?></li>
                <?php else: ?>
                    <li><?php echo $this->Html->link('Sign Up', ['controller' => 'Users', 'action' => 'add']); ?></li>
                    <li><?php echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>