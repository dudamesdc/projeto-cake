
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">TECNO BLOG</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse">


        <ul class="nav navbar-nav navbar-right">
            <?php if (($this->Session->read(('Auth.User')))): ?>
                <li><?php echo $this->Html->link('Logout', ([ 'action' => 'logout'])); ?></li>
                <li><?php echo $this->Html->link('add post', (['controller'=>'posts', 'action' => 'add'])); ?></li>
            
            
            <?php else: ?>
                <li><?php echo $this->Html->link('sign up', ['controller' => 'Users', 'action' => 'add']); ?> </li>
                <li><?php echo $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']); ?></li>
            <?php endif; ?>
        
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>