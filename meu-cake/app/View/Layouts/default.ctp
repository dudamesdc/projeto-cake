<!-- default.ctp -->
<!DOCTYPE html>
<html>
	
<head>
<?php
echo $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
echo $this->Html->script('https://code.jquery.com/jquery-3.3.1.slim.min.js');
echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
echo $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
echo  $this->Html->css('styles/index.css');
?>

    
    <title><?php echo $this->fetch('title'); ?></title>
    <link rel="stylesheet" href="meu-cake/app/webroot/css/styles/index.css">
</head>
<body>
    <div id="container">
        <div>
            <?php $this->element('navbar'); ?>
        </div>
        <div id="content">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <div>
            <?php $this->element('footer'); ?>
        </div>
    </div>
</body>
</html>
