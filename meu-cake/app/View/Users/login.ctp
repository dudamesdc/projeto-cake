<div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User');?>
    <div class="container">
    <form class="form-signin">
        <h2 class="form-signin-heading"><?php echo $this->Flash->render('auth'); ?></h2>

        <?php echo $this->Form->create('User'); ?>
        
        <label for="inputEmail" class="sr-only">User</label>
        <?php
            echo $this->Form->input('username', array(
                'type' => 'text',
                'id' => 'inputEmail',
                'class' => 'form-control',
                'placeholder' => 'Email address',
                'required' => 'required',
                'autofocus' => 'autofocus'
            ));
        ?>

        <label for="inputPassword" class="sr-only">Password</label>
        <?php
            echo $this->Form->input('password', array(
                
                'class' => 'form-control',
                'placeholder' => 'Password',
                'required' => 'required'
            ));
        ?>

        

        
        <?php echo $this->Form->button(__('sign up'), ['class' => 'btn btn-lg btn-primary btn-block']); ?>
        <?php echo $this->Form->end(); ?>
    </form>
</div>

