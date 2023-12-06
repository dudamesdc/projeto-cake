<?php
echo $this->Form->create('Post', ['url' => ['controller' => 'Posts', 'action' => 'filter']]);
echo $this->Form->input('content', ['label' => 'Título/conteúdo']);
echo $this->Form->input('create', ['label' => 'Data de criação', 'type' => 'date']);
echo $this->Form->input('end', ['label' => 'Data final', 'type' => 'date']);
echo $this->Form->submit('Search');
echo $this->Form->end();
?>