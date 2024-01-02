




    <?php echo $this->Form->create('Post', ['type' => 'post', 'class' => 'form-inline']); ?>
        <form action="content">
            <label for="birthday">Título/Conteúdo</label>
            <input type="text" id="birthday" name="birthday">
            <input type="submit">
        </form>
    
    
        <form action="create">
          <label for="birthday">Data de criação</label>
          <input type="date" id="birthday" name="birthday">
          <input type="submit">
        </form>
    
        <form action="modified">
          <label for="birthday">Data de modificação:</label>
          <input type="date" id="birthday" name="birthday">
          <input type="submit">
        </form>
    
        <form action="is_active" method="post">
        <label for="estado">Estado</label>

        <?php
        $options = ['' => '', '1' => 'Ativo', '0' => 'Inativo'];
        echo $this->Form->select('is_active', $options, ['id' => 'estado', 'class' => 'form-control', 'label' => 'Estado']);
        ?>
    
        
        </form>
        <?php
        echo $this->Form->button('Buscar', ['class' => 'btn btn-primary mt-3']);
        echo $this->Html->link('Limpar', ['?' => ['reset' => true]], ['class' => 'btn btn-primary mt-3']);
        ?>
   
    <?php echo $this->Form->end(); ?>

