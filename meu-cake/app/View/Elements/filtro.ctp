

<div class="container">
    <h2>Filtro de Listagens</h2>

    <?php
    echo $this->Form->create('Post', ['url' => ['controller' => 'Posts', 'action' => 'filter']]);
    ?>

    <div class="form-group">
        <?php
        echo $this->Form->label('content', 'Título/Conteúdo:');
        echo $this->Form->input('content', ['class' => 'form-control', 'placeholder' => 'Digite o título ou conteúdo']);
        ?>
    </div>

    <div class="form-group">
        <?php
        echo $this->Form->label('create', 'Data Inicial:');
        echo $this->Form->input('create', ['class' => 'form-control', 'type' => 'date']);
        ?>
    </div>

    <div class="form-group">
        <?php
        echo $this->Form->label('end', 'Data Final:');
        echo $this->Form->input('end', ['class' => 'form-control', 'type' => 'date']);
        ?>
    </div>

    <div class="form-group">
        <?php
        echo $this->Form->label('status', 'Status dos Posts:');
        echo $this->Form->input('status', ['class' => 'form-control', 'type' => 'select', 'options' => ['1' => 'Ativo', '0' => 'Inativo']]);
        ?>
    </div>

    <?php
    echo $this->Form->button('Buscar', ['class' => 'btn btn-primary', 'type' => 'submit']);
    echo $this->Form->end();
    ?>
</div>
