<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $this->fetch('title'); ?></title>

    <?php
    // Links do Bootstrap 3 via CDN
    echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    echo $this->Html->script('https://code.jquery.com/jquery-1.12.4.min.js');
    
    echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    echo $this->Js->writeBuffer();
    ?>

    <!-- Seu estilo personalizado -->
    <?php
    echo $this->Html->css('/css/styles/index.css');
    ?>
</head>
<body>
    <header class="main-header">
        <!-- Conteúdo do cabeçalho principal aqui -->
    </header>

    <nav>
        <div>
            <?php echo $this->element('navbar'); ?>
        </div>
    </nav>

    <div class="container" id="content">
        <?php echo $this->Flash->render(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>

    <footer>
        <?php $this->element('footer'); ?>
    </footer>
</body>
</html>
