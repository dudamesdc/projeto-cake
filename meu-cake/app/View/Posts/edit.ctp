<h1>Edit Post</h1>
<?php
    echo $this->Form->create('Post', array('url' => 'edit'));
    echo $this->Form->input('title');
    echo $this->Form->input('body', array('rows' => '3'));
    echo $this->Form->input('id', array('type' => 'hidden'));
    echo $this->Form->input('is_active', array(
        'label' => 'Estado',
        'type' => 'select',
        'options' => array(
            '1' => 'Ativo',
            '0' => 'Inativo'
        )
    ));
    echo $this->Form->end('Save Post');