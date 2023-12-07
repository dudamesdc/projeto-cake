<h1>add Post</h1>
<?php
    echo $this->Form->create('Post', array('url' => 'add'));
    echo $this->Form->input('title');
    echo $this->Form->input('body', array('rows' => '3'));
    
    echo $this->Form->end('Save Post');