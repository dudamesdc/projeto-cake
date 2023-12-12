

<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php $this->fetch('header');?>
     <link rel="stylesheet" href="meu-cake/app/webroot/css/styles/index.css">
</head>
<body>
    <div id="container">
        <div>
            <?php echo $this->element('navbar'); ?>
        </div>
        <div id="content">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        <div>
            <?php echo $this->element('footer'); ?>
        </div>
    </div>
</body>
</html>
