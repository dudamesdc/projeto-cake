<div class="container">
  <!-- Perfil do Administrador -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Perfil do Administrador</h3>
    </div>
    <div class="panel-body">
      
      <h4>Olá, <?php echo $admin['username']?> </h4>

      <!-- Adiciona a navegação em abas -->
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#view-all-posts">Todos os Posts</a></li>
        <li><a data-toggle="tab" href="#view-specific-posts">Meus Posts</a></li>
        <li><?php echo $this->Html->link('Perfil',['action' => 'view', $admin],['class'=>'data-toglle="tab"']); ?></li>
      </ul>

      <!-- Adiciona o formulário de filtro -->
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-inline" method="post" action="<?php echo $this->Html->url(['controller' => 'posts', 'action' => 'index']); ?>">
            <?php echo $this->Form->create('Post', ['type' => 'post']); ?>
            <div class="form-group">
              <?php echo $this->Form->input('content', ['class' => 'form-control', 'placeholder' => 'Digite o título', 'type' => 'text', 'label' => 'Título/Conteúdo', 'empty'=>true]); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('create', ['class' => 'form-control', 'type' => 'date','dateFormat'=>'DMY', 'label' => 'Data de criação','empty'=>true]); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('modified', ['class' => 'form-control', 'type' => 'date','dateFormat'=>'DMY', 'label' => 'Data de modificação','empty'=>true]); ?>
            </div>
            <div class="form-group">
              <?php
              $options = ['' => '', '1' => 'Ativo', '0' => 'Inativo'];
              echo $this->Form->select('is_active', $options, [ 'class' => 'form-control']);
              ?>
            </div>
            <?php
            echo $this->Form->button('Buscar', ['action'=>'index','class' => 'btn btn-primary mt-3']);
            echo $this->Html->link('Limpar', ['action' => 'index', '?' => ['reset'=>true]], ['class' => 'btn btn-primary mt-3']);
            echo $this->Form->end();
            ?>
          </form>
        </div>
      </div>

      <!-- Adiciona as abas de conteúdo -->
      <div class="tab-content">
        <div id="view-all-posts" class="tab-pane fade in active">
          <!-- Adicione aqui a lógica para listar todos os posts do admin -->
        </div>

        <div id="view-specific-posts" class="tab-pane fade">
          <!-- Adicione aqui a lógica para listar os posts específicos do admin -->
        </div>

        <div id="view-profile" class="tab-pane fade">
          <?php echo $this->Html->url(['action' => 'view', $admin]); ?>
        </div>
      </div>
    </div>
  </div>
</div>
