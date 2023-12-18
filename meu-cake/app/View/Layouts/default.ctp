<!-- default.ctp -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Seu Blog</title>
  <link rel="stylesheet" href="/css/styles/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title><?php echo $this->fetch('title'); ?></title>
</head>


    
    


<body>
    <nav>
        <div>
            <?php echo $this->element('navbar'); ?>
        </div>
    </nav>  
        
            <?php echo $this->Flash->render(); ?>
            
            <?php echo $this->fetch('content'); ?>
        
        <div>
            <?php $this->element('footer'); ?>
        </div>
    </div>
</body>
</html>
