<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->Html->fetch('title'); ?></title>
    <?php echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'); ?>
    <?php echo $this->Html->script('https://code.jquery.com/jquery-3.5.1.min.js'); ?>
    <?php echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'); ?>
    <?php echo $this->Html->css('styles/index'); ?>
</head>
<body>
    <!-- Navbar -->
    <?php echo $this->element('navbar'); ?>
    
    <!-- Conteúdo da Página -->
    <?php echo $this->Flash->render(); ?>
    <div class="container">
        <?php echo $this->fetch('content'); ?>
    </div>

    <!-- Rodapé -->
    <?php echo $this->element('footer'); ?>
</body>
</html>
