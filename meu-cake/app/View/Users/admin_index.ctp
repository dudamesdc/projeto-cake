

<div class="container">
  <!-- Perfil do Administrador -->
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Perfil do Administrador</h3>
    </div>
    <div class="panel-body">
      <!-- Informações do Administrador -->
      <h4>Nome do Administrador: João Silva</h4>
      <h4>Email: joao.admin@example.com</h4>

      <!-- Abas de Navegação para Usuários e Perfil -->
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#view-users">Usuários</a></li>
        <li><a data-toggle="tab" href="#view-profile">Ver Perfil</a></li>
        
      </ul>

      <!-- Conteúdo das Abas -->
      <div class="tab-content">
        <!-- Conteúdo da Aba "Usuários" -->
        <div id="view-users" class="tab-pane fade in active">
          <!-- Campo de Pesquisa de Usuários -->
          <div class="form-group">
            <label for="userSearch">Pesquisar Usuário:</label>
            <input type="text" class="form-control" id="userSearch">
          </div>

          <!-- Lista de Usuários com Indicação de Ativo -->
          <ul class="list-group">
           
            <?php foreach ($users as $user): ?>
            <li class="list-group-item"><span class="active-indicator"></span><?php echo $this->Html->link($user['User']['username'],['controller'=>'Posts','action'=>'view', $user['User']['id']])?></li>
            
            <?php endforeach; ?>
            
          </ul>
        </div>

        
        <div id="view-profile" class="tab-pane fade">
       
          <p>Informações do perfil do administrador...</p>
        </div>

        
      

    </div>
  </div>
</div>