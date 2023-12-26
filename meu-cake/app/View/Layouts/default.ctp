<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $this->fetch('title'); ?></title>

    <?php
   

   echo $this->Html->css('cake.generic');

   echo $this->fetch('meta');
   echo $this->fetch('css');
   echo $this->fetch('script');	
   
    echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    echo $this->Html->script('https://code.jquery.com/jquery-1.12.4.min.js');
    
    echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    echo $this->Js->writeBuffer();
   
		
    ?>
</head>
<body>
	
        <nav>
                <div>
                    <?php echo $this->element('navbar'); ?>
                </div>
        </nav>
		
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
			
		</div>
	</div>
	
</body>
</html>