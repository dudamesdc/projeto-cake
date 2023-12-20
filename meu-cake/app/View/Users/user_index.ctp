 

    <h1>Olá, <?php echo $user['username']; ?>!</h1>
    
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Perfil</h3>
            </div>
            <div class="panel-body">
                <!-- Abas de perfil e posts -->
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#view-profile">perfil </a></li>
                    <li><a data-toggle="tab" href="#user-posts">Meus Posts</a></li>
                </ul>

                <div class="tab-content">
                    <!-- Conteúdo da Aba "Ver Perfil" -->
                    <div id="view-profile" class="tab-pane fade in active">

                    <?php echo $this->Html->link('Ver Perfil', [ 'action' => 'view', $user['id']]); ?>
                       
                        
                        
                    </div>

                    <!-- Conteúdo da Aba "Meus Posts" -->
                    <div id="user-posts" class="tab-pane fade">
                        <h3>Meus Posts</h3>
                        <table class='table'>
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Conteúdo</th>
                                    <th>Data de criação</th>
                                    <th>Data final</th>
                                </tr>
                            <tbody>
                                <?php
                

                                foreach ($posts as $post):?>
                                <tr>
                                    <td><?php echo $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id']));?></td>
                                        <td><?php echo $this->Html->link('Editar', array('controller' => 'posts', 'action' => 'edit', $post['Post']['id']));?></td>
                                        <td><?php echo $this->Html->link('Deletar',array('controller'=>'posts','action'=>'delete',$post['Post']['id']));?></td>


                                        <td><?php echo $post['Post']['created'];?></td>
                                        <td><?php echo $this->Form->input('status', array('type' => 'checkbox', 'label' => 'ativo'));?></td>
                                </tr>
                
                                <?php endforeach;?>
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>



   
